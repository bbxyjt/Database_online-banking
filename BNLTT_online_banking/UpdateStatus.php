<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- <title>Register Form</title>-->
    <title>Update Email</title>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;500;600;700;800&family=Ubuntu:ital,wght@0,300;1,300&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <style>
        body {
            font-family: 'Open Sans', sans-serif;
            font-family: 'Ubuntu', sans-serif;
            background-color: #f8f9fa;
        }

        .header {
            font-family: 'Open Sans', sans-serif;
            font-family: 'Ubuntu', sans-serif;
            background-color: #bb3636;
            color: #fff;
            padding: 50px;
            text-align: center;
        }

        .form-container {
            font-family: 'Open Sans', sans-serif;
            font-family: 'Ubuntu', sans-serif;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            margin-top: 50px;
            padding: 30px;
        }

        .form-container h2 {
            font-family: 'Open Sans', sans-serif;
            font-family: 'Ubuntu', sans-serif;
            color: #bb3636;
            margin-bottom: 30px;
        }

        .form-group label {
            font-family: 'Open Sans', sans-serif;
            font-family: 'Ubuntu', sans-serif;
            color: #bb3636;
        }

        .form-group input[type="text"],
        .form-group input[type="password"] {
            border-color: #bb3636;
        }

        .form-group input[type="submit"] {
            background-color: #bb3636;
            border-color: #bb3636;
        }

        .form-group input[type="submit"]:hover {
            background-color: #ad2d2d;
            border-color: #ad2d2d;
        }
    </style>
</head>

<body>
    <!-- Header -->
    <div class="header">
        <!--<h1>Registration Form</h1> -->
    </div>

    <!-- Form -->
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="form-container">
                     <!-- <h2>Register</h2> -->
					 <h2>Loan Status</h2> 

                     <?php
$con = mysqli_connect("localhost", "root", "", "online_bank");

// Check connection
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    exit();
}

if (empty($_POST['Loan_ID'])) {
    echo "Please input Loan ID.";
} else {
    $Loan_ID = mysqli_real_escape_string($con, $_POST['Loan_ID']);
    
    // Check if Loan ID exists
    $checkLoanQuery = mysqli_query($con, "SELECT * FROM loan WHERE Loan_ID = '$Loan_ID'");
    
    if ($checkLoanQuery) {
        $numRows = mysqli_num_rows($checkLoanQuery);
        
        if ($numRows === 0) {
            echo "Invalid Loan ID.";
        } else {
            $Loan_Status = $_POST['Loan_Status'];
            
            //Check if there is the first loan transaction or not
            $loanIDQuery = "SELECT Loan_ID FROM loan_transaction WHERE Loan_ID = '$Loan_ID'";
            $loanIDResult = mysqli_query($con, $loanIDQuery);
            
            if ($Loan_Status == "Approve") {
                // Update the Loan_Status in the loan table
                $updateQuery = "UPDATE loan
                                SET Loan_Status = '$Loan_Status',
                                    Payment_Status = 'Incompleted' 
                                WHERE Loan_ID = '$Loan_ID' ";

                if (mysqli_num_rows($loanIDResult) === 0) {
                    $loanInfoQuery = mysqli_query($con, "SELECT Interest_Rate, Loan_In_Term_Year, Loan_Amount FROM Loan WHERE Loan_ID = $Loan_ID");

                    if ($loanInfoQuery) {
                        $loanInfoRow = mysqli_fetch_assoc($loanInfoQuery);

                        if ($loanInfoRow) {
                            $initial_Amount = $loanInfoRow['Loan_Amount'];
                            $interestRate = $loanInfoRow['Interest_Rate'];
                            $loanTermYear = $loanInfoRow['Loan_In_Term_Year'];

                            $principleOfLoan = $initial_Amount / ($loanTermYear * 12);
                            $currentDate = date('Y-m-d H:i:s');

                            $sql = "INSERT INTO loan_transaction (Loan_ID, Balance_Loan, Payment_Date, Number_of_Days, Interest_Per_Period, Principle_of_Loan, Total_Payment)
                                    VALUES ($Loan_ID, $initial_Amount-$principleOfLoan, '$currentDate', 0, 0, $principleOfLoan, $principleOfLoan)";
                            
                            // Execute the query to insert into loan_transaction table
                            if (mysqli_query($con, $sql)) {
                                // Rest of your code after successful insertion
                            } else {
                                die('Error inserting loan transaction: ' . mysqli_error($con));
                            }
                        } else {
                            die('Loan information not found.');
                        }
                    } else {
                        die('Error retrieving loan information: ' . mysqli_error($con));
                    }
                }

                if (mysqli_query($con, $updateQuery)) {
                    echo "Loan status updated successfully.";
                } else {
                    echo "Error updating loan status: " . mysqli_error($con);
                }
            } else {
                // Update the Loan_Status in the loan table
                $updateQuery = "UPDATE loan
                                SET Loan_Status = '$Loan_Status', 
                                Payment_Status = NULL
                                WHERE Loan_ID = '$Loan_ID' ";
            
                if (mysqli_query($con, $updateQuery)) {
                    echo "Loan status updated successfully.";
                } else {
                    echo "Error updating loan status: " . mysqli_error($con);
                }
            }
            
        }
    } else {
        echo "Error checking Loan ID: " . mysqli_error($con);
    }
}

mysqli_close($con);
?>
                    

                    <form name="inpfrm" method="post" action="UpdateStatusForm.php">
                        <table border='0' align='center' class='table table-hover'>
                            <tr>
                                <td><input name="reset" type="submit" id="Back" value="Back" /></td>
                            </tr>
                        </table>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- JavaScript -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>