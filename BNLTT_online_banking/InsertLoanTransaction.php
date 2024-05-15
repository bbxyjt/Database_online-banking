<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com%22%3E/
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;500;600;700;800&family=Ubuntu:ital,wght@0,300;1,300&display=swap" rel="stylesheet">
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
            color: #bb3636;
            margin-bottom: 30px;
        }

        .form-group label {
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
    
    </div>

    <!-- Form -->
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="form-container">
                    
					 <h2>Loan Payment</h2> 
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
$accountRow = mysqli_fetch_assoc($result);
$Account_ID = $accountRow['Account_ID'];

if (empty($_POST['Loan_ID'])) {
    echo "Please select Loan ID";
} else {
    
    $Loan_ID = mysqli_real_escape_string($con, $_POST['Loan_ID']);

    $loanCheckQuery = mysqli_query($con, "SELECT l.Account_ID
                                          FROM Loan l
                                          INNER JOIN Loan_Transaction lt ON l.Loan_ID = lt.Loan_ID
                                          WHERE l.Loan_ID = $Loan_ID AND l.Account_ID = (SELECT Account_ID FROM account WHERE Account_Number = '$accountNumber')");

    if ($loanCheckQuery) {
        $loanCheckRow = mysqli_fetch_assoc($loanCheckQuery);
        if ($loanCheckRow) {
           
            $loanStatusQuery = mysqli_query($con, "SELECT Loan_Status, Payment_Status FROM Loan WHERE Loan_ID = $Loan_ID");
            if ($loanStatusQuery) {
                $loanStatusRow = mysqli_fetch_assoc($loanStatusQuery);
                if ($loanStatusRow) {
                    $loanStatus = $loanStatusRow['Loan_Status'];
                    $paymentStatus = $loanStatusRow['Payment_Status'];
                    if ($loanStatus === 'Approve' && $paymentStatus === 'Incompleted') {
                        
                        $loanInfoQuery = mysqli_query($con, "SELECT Interest_Rate, Loan_In_Term_Year, Loan_Amount FROM Loan WHERE Loan_ID = $Loan_ID");
                        if ($loanInfoQuery) {
                            $loanInfoRow = mysqli_fetch_assoc($loanInfoQuery);
                            if ($loanInfoRow) {
                                $initial_Amount = $loanInfoRow['Loan_Amount'];
                                $interestRate = $loanInfoRow['Interest_Rate'];
                                $loanTermYear = $loanInfoRow['Loan_In_Term_Year'];
                            } else {
                                die('Loan information not found.');
                            }
                        } else {
                            die('Error retrieving loan information: ' . mysqli_error($con));
                        }

                        
                        $latestBalanceQuery = mysqli_query($con, "SELECT Balance_Loan FROM Loan_Transaction WHERE Loan_ID = $Loan_ID ORDER BY Balance_Loan ASC LIMIT 1");
                        if ($latestBalanceQuery) {
                            $latestBalanceRow = mysqli_fetch_assoc($latestBalanceQuery);
                            if ($latestBalanceRow) {
                                if ($latestBalanceRow['Balance_Loan'] === NULL) {
                                    
                                    $loanAmountQuery = mysqli_query($con, "SELECT Loan_Amount FROM Loan WHERE Loan_ID = $Loan_ID");
                                    if ($loanAmountQuery) {
                                        $loanAmountRow = mysqli_fetch_assoc($loanAmountQuery);
                                        if ($loanAmountRow) {
                                            $latestBalance = $loanAmountRow['Loan_Amount'];
                                        } else {
                                            die('Loan amount not found.');
                                        }
                                    } else {
                                        die('Error retrieving loan amount: ' . mysqli_error($con));
                                    }
                                } else {
                                    $latestBalance = $latestBalanceRow['Balance_Loan'];
                                }
                            } else {
                                
                                $loanAmountQuery = mysqli_query($con, "SELECT Loan_Amount FROM Loan WHERE Loan_ID = $Loan_ID");
                                if ($loanAmountQuery) {
                                    $loanAmountRow = mysqli_fetch_assoc($loanAmountQuery);
                                    if ($loanAmountRow) {
                                        $latestBalance = $loanAmountRow['Loan_Amount'];
                                    } else {
                                        die('Loan amount not found.');
                                    }
                                } else {
                                    die('Error retrieving loan amount: ' . mysqli_error($con));
                                }
                            }
                        } else {
                            die('Error retrieving the latest balance: ' . mysqli_error($con));
                        }

                        // Get the current date
                        $currentDate = date('Y-m-d H:i:s');

                        
                        $latestPaidDateQuery = mysqli_query($con, "SELECT Payment_Date AS Latest_Paid_Date FROM Loan_Transaction WHERE Loan_ID = $Loan_ID ORDER BY Balance_Loan ASC LIMIT 1;");
                        if ($latestPaidDateQuery) {
                            $latestPaidDateRow = mysqli_fetch_assoc($latestPaidDateQuery);
                            if ($latestPaidDateRow) {
                                $latestPaidDate = $latestPaidDateRow['Latest_Paid_Date'];
                                $numberOfDays = floor((strtotime($currentDate) - strtotime($latestPaidDate)) / (60 * 60 * 24));
                            } else {
                                $latestPaidDate = $currentDate;
                                $numberOfDays = 1;
                            }
                        } else {
                            die('Error retrieving the latest paid date: ' . mysqli_error($con));
                        }

                        
                        $interestPerPeriod = $latestBalance * ($interestRate / 365) * $numberOfDays;
                        $principleOfLoan = $initial_Amount / ($loanTermYear * 12);
                        $totalPayment = $principleOfLoan + $interestPerPeriod;

                        $newBalance = $latestBalance - $principleOfLoan;

                        if ($newBalance <= 0) {
                            $newBalance = 0;
                            $principleOfLoan = $latestBalance;
                            $totalPayment = $principleOfLoan + $interestPerPeriod;
                            $updatePaymentStatusQuery = mysqli_query($con, "UPDATE Loan SET Payment_Status = 'Completed' WHERE Loan_ID = $Loan_ID");
                            if (!$updatePaymentStatusQuery) {
                                die('Error updating payment status: ' . mysqli_error($con));
                            }
                        }
                        // Insert the transaction into the database
                        $sql = "INSERT INTO loan_transaction (Loan_ID, Balance_Loan, Payment_Date, Number_of_Days, Interest_Per_Period, Principle_of_Loan, Total_Payment)
                        VALUES ($Loan_ID, $newBalance, '$currentDate', $numberOfDays, $interestPerPeriod, $principleOfLoan, $totalPayment)";

                        if (!mysqli_query($con, $sql)) {
                            die('Error: ' . mysqli_error($con));
                        }

                        echo "Success";
                        
                        $interestRatePercent = $interestRate * 100;
                        echo "<br>";
                        echo "Total Loan: $initial_Amount<br>";
                        echo "Interest Rate: $interestRatePercent%<br>";
                        echo "Loan Term (Years): $loanTermYear<br>";
                        echo "Latest Balance: $latestBalance<br>";
                        echo "Number of Days: $numberOfDays<br>";
                        echo "Interest Per Period: $interestPerPeriod<br>";
                        echo "Principle of Loan: $principleOfLoan<br>";
                        echo "Total Payment: $totalPayment<br>";
                        echo "New Balance: $newBalance<br>";
                    } else {
                        echo "The loan has been rejected or has a completed payment status";
                    }
                } else {
                    die('Loan status not found.');
                }
            } else {
                die('Error retrieving loan status: ' . mysqli_error($con));
            }
        } else {
            echo "Can only pay on your own Loan";
        }
    } else {
        die('Error checking loan ownership: ' . mysqli_error($con));
    }
}

mysqli_close($con);
?>

                    <form name="inpfrm" method="post" action="InsertLoanTransactionForm.php">
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
