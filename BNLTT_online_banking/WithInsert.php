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
                    <h2>Payment</h2>
                    <?php
                    $con = mysqli_connect("localhost", "root", "", "online_bank");
                    // Check connection
                    if (mysqli_connect_errno()) {
                        echo "Failed to connect to MySQL: " . mysqli_connect_error();
                    }

                    if (empty($_POST['Transaction_Type'])) {
                        echo "Please input data Transaction Type.";
                    } elseif (empty($_POST['Amount'])) {
                        echo "Please input data Amount.";
                    } elseif (empty($_POST['Transaction_Detail'])) {
                        echo "Please input data Transaction Detail.";
                    } else {
                        
                        $Card_Number = mysqli_real_escape_string($con, $_POST['Card_Number']);
                        $Transaction_Type = $_POST['Transaction_Type'];
                        $Amount = mysqli_real_escape_string($con, $_POST['Amount']);
                        $Transaction_Detail = mysqli_real_escape_string($con, $_POST['Transaction_Detail']);
                        $Transaction_Date = date('Y-m-d');
                        $Password = mysqli_real_escape_string($con, $_POST['Password']);

                        if ($Transaction_Type === 'Withdraw') {
                           
                            $Recipient_Account = ''; 
                        } else {
                            $Recipient_Account = mysqli_real_escape_string($con, $_POST['Recipient_Account']);
                            if (empty($Recipient_Account)) {
                                echo "Recipient number is required for Payment, Swipe card, and Transferring transactions.";
                                echo '<form name="inpfrm" method="post" action="WithInsertForm.php">';
                                echo '<table border="0" align="center" class="table table-hover">';
                                echo '<tr>';
                                echo '<td><input name="reset" type="submit" id="Back" value="Back" /></td>';
                                echo '</tr>';
                                echo '</table>';
                                echo '</form>';
                                mysqli_close($con);
                                exit(); 
                            }
                        }

                        
                        $accountQuery = "SELECT Account_ID FROM account WHERE Password = '$Password' LIMIT 1";
                        $accountResult = mysqli_query($con, $accountQuery);

                        
                        $cardQuery = "SELECT a.Account_ID FROM account a INNER JOIN card c ON a.Account_ID = c.Account_ID WHERE c.Card_Number = '$Card_Number' LIMIT 1";
                        $cardResult = mysqli_query($con, $cardQuery);

                        if (mysqli_num_rows($cardResult) === 0) {
                            echo "Invalid Card Number.";
                        } elseif (!$accountResult || mysqli_num_rows($accountResult) === 0) {
                            echo "Incorrect Password.";
                        } else {
                            $cardRow = mysqli_fetch_assoc($cardResult);
                            $cardAccountID = $cardRow['Account_ID'];

                            $accountRow = mysqli_fetch_assoc($accountResult);
                            $accountID = $accountRow['Account_ID'];

                            if ($cardAccountID !== $accountID) {
                                echo "Incorrect Password.";
                            } else {
                                $balanceQuery = "SELECT Balance FROM account WHERE Password = '$Password' LIMIT 1";
                                $result = mysqli_query($con, $balanceQuery);
                                $row = mysqli_fetch_assoc($result);
                                $currentBalance = $row['Balance'];
                                $updatedBalance = $currentBalance - $Amount;

                                if ($updatedBalance >= 0) {
                                    $updateQuery = "UPDATE account SET Balance = $updatedBalance WHERE Password = '$Password'";
                                    mysqli_query($con, $updateQuery);
                                    echo "Transaction successful. <br>";
                                    echo "Updated balance: $updatedBalance  <br>";

                                    
                                    $sql = "INSERT INTO transactions (Account_ID, Card_Number, Transaction_Type, Amount, Recipient_Account, Transaction_Detail, Transaction_Date)
                                    VALUES ('$accountID', '$Card_Number', '$Transaction_Type', '$Amount', '$Recipient_Account', '$Transaction_Detail', '$Transaction_Date')";

                                    if (!mysqli_query($con, $sql)) {
                                        die('Error: ' . mysqli_error($con));
                                    }

                                    echo "Thank you for using BNLTT";
                                } else {
                                    echo "Insufficient funds. Current balance: $currentBalance";
                                }
                            }
                        }
                    }

                    mysqli_close($con);
                    ?>
                    <form name="inpfrm" method="post" action="WithInsertForm.php">
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
