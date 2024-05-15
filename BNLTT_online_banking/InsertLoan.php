<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;500;600;700;800&family=Ubuntu:ital,wght@0,300;1,300&display=swap" rel="stylesheet" />
  
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
            font-family: 'Open Sans', sans-serif;
            font-family: 'Ubuntu', sans-serif;
            border-color: #bb3636;
        }

        .form-group input[type="submit"] {
            font-family: 'Open Sans', sans-serif;
            font-family: 'Ubuntu', sans-serif;
            background-color: #bb3636;
            border-color: #bb3636;
        }

        .form-group input[type="submit"]:hover {
            font-family: 'Open Sans', sans-serif;
            font-family: 'Ubuntu', sans-serif;
            background-color: #ad2d2d;
            border-color: #ad2d2d;
        }
    </style>
</head>

<body>
    <!-- Header -->
    <div class="header">
        
    </div>

    <!-- Form -->
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="form-container">
                     
					 <h2>Loan Request</h2> 
                     <?php
// Start the session
session_start();

$con = mysqli_connect("localhost", "root", "", "online_bank");
// Check connection
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$accountNumber = $_SESSION["account_number"];


$query = "SELECT Account_ID FROM account WHERE Account_Number = '$accountNumber'";
$result = mysqli_query($con, $query);

if (empty($_POST['Credit_Bureau'])) {
    echo "Please select Credit Bureau";
} elseif (empty($_POST['Loan_Type'])) {
    echo "Please select Type of Loan";
} elseif (empty($_POST['Amount'])) {
    echo "Please input Amount";
} elseif (empty($_POST['Loan_Year'])) {
    echo "Please input Loan Year";
} else {
    
    $Credit_Bureau = mysqli_real_escape_string($con, $_POST['Credit_Bureau']);
    $Loan_Type = mysqli_real_escape_string($con, $_POST['Loan_Type']);
    $Amount = mysqli_real_escape_string($con, $_POST['Amount']);
    $Loan_Year = mysqli_real_escape_string($con, $_POST['Loan_Year']);
    
    $Loan_Start_Date = mysqli_real_escape_string($con, $_POST['Start_Date']);

    
    $planDetails = getPlanDetails($Loan_Type);

    
    $Interest_Rate = isset($planDetails['Interest_Rate']) ? $planDetails['Interest_Rate'] : 0;
    $Duration = isset($planDetails['Duration']) ? $planDetails['Duration'] : 0;
    $Minimum_Loan = isset($planDetails['Minimum_Loan']) ? $planDetails['Minimum_Loan'] : 0;

    if ($Loan_Type == 'Plan 1' && ($Amount < 50000 || $Amount > 100000 || $Loan_Year < 2)) {
            echo "Amount or Loan Year is not in the range of Plan 1";
    } elseif ($Loan_Type == 'Plan 2' && ($Amount < 50000 || $Amount > 100000 || $Loan_Year < 6)) {
            echo "Amount or Loan Year is not in the range of Plan 2";
    } elseif ($Loan_Type == 'Plan 3' && ($Amount < 10000 || $Amount > 30000 || $Loan_Year < 1)) {
            echo "Amount or Loan Year is not in the range of Plan 3";
    }else{
         
    $endLoanDate = date('Y-m-d', strtotime("+$Loan_Year years", strtotime($Loan_Start_Date)));

    $sql = "INSERT INTO Loan (Date, Account_ID, Credit_Bureau, Loan_Amount, Interest_Rate, Loan_In_Term_Year, Loan_Start_Date, Loan_End_Date, Loan_Status, Payment_Status)
    VALUES (CURRENT_TIMESTAMP, (SELECT Account_ID FROM account WHERE Account_Number = '$accountNumber'), '$Credit_Bureau', '$Amount', '$Interest_Rate'/100, '$Loan_Year', '$Loan_Start_Date', '$endLoanDate', 'Pending', NULL)";

    if (!mysqli_query($con, $sql)) {
        die('Error: ' . mysqli_error($con));
    }
    echo "Success";
}


    }

   


// Function to get plan details based on Loan_Type
function getPlanDetails($loanType) {
    // You can modify this function to fetch plan details from your database
    // based on the Loan_Type. For simplicity, I'm providing static details here.
    $details = array();
    // Extract plan details

    if ($loanType == 'Plan 1') {
        $details['Interest_Rate'] = 2; // Example interest rate for Plan 1
        $details['Duration'] = 6; // Example duration in years for Plan 1
        $details['Minimum_Loan'] = 50000; // Example minimum loan amount for Plan 1
    } elseif ($loanType == 'Plan 2') {
        $details['Interest_Rate'] = 6.5; // Example interest rate for Plan 2
        $details['Duration'] = 6; // Example duration in months for Plan 2
        $details['Minimum_Loan'] = 50000; // Example minimum loan amount for Plan 2
    } elseif ($loanType == 'Plan 3') {
        $details['Interest_Rate'] = 3.87; // Example interest rate for Plan 3
        $details['Duration'] = 1; // Example duration in months for Plan 3
        $details['Minimum_Loan'] = 10000; // Example minimum loan amount for Plan 3
    }
    return $details;
}

mysqli_close($con);
?>



                    <form name="inpfrm" method="post" action="InsertLoanForm.php">
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