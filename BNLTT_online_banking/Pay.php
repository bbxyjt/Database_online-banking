<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
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
                    
                    <h2>Pay Alert Form</h2> 

                    <?php
                    $con = mysqli_connect("localhost", "root", "", "online_bank");
                    // Check connection
                    if (mysqli_connect_errno()) {
                        echo "Failed to connect to MySQL: " . mysqli_connect_error();
                    }

                    if (empty($_POST['AccountNumber'])) {
                        echo "Please input the Account Number.";
                    } elseif (empty($_POST['Amount'])) {
                        echo "Please input the Amount.";
                    } elseif (empty($_POST['Due_Date'])) {
                        echo "Please input the Due Date.";
                    } else {
                        $AccountNumber = mysqli_real_escape_string($con, $_POST['AccountNumber']);
                        $amount = mysqli_real_escape_string($con, $_POST['Amount']);
                        $DueDate = mysqli_real_escape_string($con, $_POST['Due_Date']);

                        $accountQuery = "SELECT Account_ID, Balance FROM account WHERE Account_Number = '$AccountNumber'";
                        $accountResult = mysqli_query($con, $accountQuery);

                        if ($accountResult && mysqli_num_rows($accountResult) > 0) {
                            
                            $accountRow = mysqli_fetch_assoc($accountResult);
                            $accountId = $accountRow['Account_ID'];
                            $currentBalance = $accountRow['Balance'];

                            
                            $currentDate = date('Y-m-d');
                            if ($DueDate === $currentDate) {
                                if ($currentBalance >= $amount) {
                                    
                                    $deductQuery = "UPDATE account SET Balance = Balance - '$amount' WHERE Account_ID = '$accountId'";
                                    if (mysqli_query($con, $deductQuery)) {
                                        echo "Amount deducted from the account balance. ";
                                        $preTransStatus = "Complete";
                                    } else {
                                        echo "Error deducting amount: " . mysqli_error($con);
                                        $preTransStatus = "Incomplete";
                                    }
                                } else {
                                    echo "Insufficient balance in the account.";
                                    $preTransStatus = "Incomplete";
                                }
                            } else {
                                $preTransStatus = "Incomplete";
                            }

                            
                            $sql = "INSERT INTO pre_transaction (Account_ID, Payer_Account_number, Set_date, Payback_Date, Pre_Trans_Amount, Pre_Trans_Status) VALUES ('$accountId', '$AccountNumber', NOW(), '$DueDate', '$amount', '$preTransStatus')";
                            if (mysqli_query($con, $sql)) {
                                echo "Success!";
                            } else {
                                echo "Error: " . mysqli_error($con);
                            }
                        } else {
                            echo "Account not found for the given Account Number.";
                        }
                    }

                    mysqli_close($con);
                    ?>

                    <form name="inpfrm" method="post" action="PayForm.php">
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

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>

