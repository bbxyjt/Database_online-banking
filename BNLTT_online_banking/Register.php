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
            background-color: #f8f9fa;
        }

        .header {
            background-color: #bb3636;
            color: #fff;
            padding: 50px;
            text-align: center;
        }

        .form-container {
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
                     
					 <h2>Register</h2> 
                    <?php
                    $con = mysqli_connect("localhost", "root", "", "online_bank");
                    // Check connection
                    if (mysqli_connect_errno()) {
                        echo "Failed to connect to MySQL: " . mysqli_connect_error();
                    }

                    if (empty($_POST['Account_type'])) {
                        echo "Please Input data Account_type";
                    } elseif (empty($_POST['ID_type'])) {
                        echo "Please Input data ID_type";
                    } elseif (empty($_POST['ID_number'])) {
                        echo "Please Input data ID_number";
                    } elseif (empty($_POST['Customer_First_Name'])) {
                        echo "Please Input data Customer_First_Name";
                    } elseif (empty($_POST['Customer_Last_Name'])) {
                        echo "Please Input data Customer_Last_Name";
                    } elseif (empty($_POST['Customer_Sex'])) {
                        echo "Please Input data Customer_Sex";
                    } elseif (empty($_POST['street'])) {
                        echo "Please Input data street";
                    } elseif (empty($_POST['city'])) {
                        echo "Please Input data city";
                    } elseif (empty($_POST['state'])) {
                        echo "Please Input data state";
                    } elseif (empty($_POST['postal_code'])) {
                        echo "Please Input data postal_code";
                    } elseif (empty($_POST['Branch_ID'])) {
                        echo "Please Input data Branch_ID";
                    } elseif (empty($_POST['Customer_Phone_Number'])) {
                        echo "Please Input data Customer_Phone_Number";
                    } elseif (empty($_POST['country'])) {
                        echo "Please Input data country";
                    } elseif (empty($_POST['Customer_Email'])) {
                        echo "Please Input data Customer_Email";
                    } elseif (empty($_POST['Customer_Date_of_Birth'])) {
                        echo "Please Input data Customer_Email";
                    } else {
                        
                        $Account_type = mysqli_real_escape_string($con, $_POST['Account_type']);
                        $ID_type = mysqli_real_escape_string($con, $_POST['ID_type']);
                        $ID_number = mysqli_real_escape_string($con, $_POST['ID_number']);
                        $Customer_First_Name = mysqli_real_escape_string($con, $_POST['Customer_First_Name']);
                        $Customer_Last_Name = mysqli_real_escape_string($con, $_POST['Customer_Last_Name']);
                        $Customer_Sex = mysqli_real_escape_string($con, $_POST['Customer_Sex']);
                        $Customer_Date_of_Birth = mysqli_real_escape_string($con, $_POST['Customer_Date_of_Birth']);
                        $Customer_Street = mysqli_real_escape_string($con, $_POST['street']);
                        $Customer_City = mysqli_real_escape_string($con, $_POST['city']);
                        $Customer_State = mysqli_real_escape_string($con, $_POST['state']);
                        $Customer_Postal_Code = mysqli_real_escape_string($con, $_POST['postal_code']);
                        $Branch_ID = mysqli_real_escape_string($con, $_POST['Branch_ID']);
                        $Customer_Phone_Number = mysqli_real_escape_string($con, $_POST['Customer_Phone_Number']);
                        $Customer_Email = mysqli_real_escape_string($con, $_POST['Customer_Email']);
                        $Customer_Country = mysqli_real_escape_string($con, $_POST['country']);
                        $thisDate = date('Y-m-d');
                        $password1 = $_POST['password1'];
                        $password2 = $_POST['password2'];

                        
                        if ($password1 !== $password2) {
                            echo "Passwords do not match. Please try again.";
                            echo '<form name="inpfrm" method="post" action="RegisterForm.php">
                                    <table border="0" align="center" class="table table-hover">
                                        <tr>
                                            <td><input name="reset" type="submit" id="Back" value="Back"/></td>
                                        </tr>
                                    </table>
                                  </form>';
                            die();
                        } else {
                            $Password = mysqli_real_escape_string($con, $_POST['password1']);

                            
                            $sql = "INSERT INTO customer (ID_type,ID_number,Customer_First_Name,Customer_Last_Name,Customer_Sex,Customer_Date_of_Birth)
                                    VALUES ('$ID_type','$ID_number','$Customer_First_Name','$Customer_Last_Name','$Customer_Sex','$Customer_Date_of_Birth');";
                            if (!mysqli_query($con, $sql)) {
                                die('Error: ' . mysqli_error($con));
                            } else {
                                
                                $Customer_ID = mysqli_insert_id($con);

                               
                                function generateAccountNumber($connection)
                                {
                                    $accountNumber = '';
                                    $sections = [3, 1, 5, 1]; 

                                    do {
                                        foreach ($sections as $length) {
                                            $section = '';
                                            for ($i = 0; $i < $length; $i++) {
                                                $section .= mt_rand(0, 9);
                                            }
                                            $accountNumber .= $section . '-';
                                        }

                                        $accountNumber = rtrim($accountNumber, '-');

                                        
                                        $query = "SELECT COUNT(*) AS count FROM account WHERE Account_Number = '$accountNumber'";
                                        $result = mysqli_query($connection, $query);
                                        $row = mysqli_fetch_assoc($result);
                                        
                                        $count = $row['count'];
                                    } while ($count > 0);

                                    return $accountNumber;
                                }


                                $accountNumber = generateAccountNumber($con);

                                
                                if($Account_type == 'Fixed deposit'){
                                    $Interest_rate =  0.0075;
                                }
                                elseif($Account_type == 'Salary'){
                                    $Interest_rate =  0.0025;
                                }
                                elseif($Account_type == 'Saving'){
                                    $Interest_rate =  0.0025;
                                }

                                $accountQuery = "INSERT INTO account (account_type, Customer_ID, Branch_ID, Password,Account_Open_Date,Account_Number,Interest_Rate_Year)
                                                VALUES ('$Account_type', '$Customer_ID', '$Branch_ID','$Password','$thisDate','$accountNumber','$Interest_rate')";
                                if (!mysqli_query($con, $accountQuery)) {
                                    die('Error: ' . mysqli_error($con));
                                }
                                
                                $addressQuery = "INSERT INTO customer_address (Customer_Street, Customer_City, Customer_State, Customer_Postal_Code, Customer_Country, Customer_ID)
                                                VALUES ('$Customer_Street', '$Customer_City', '$Customer_State', '$Customer_Postal_Code', '$Customer_Country', '$Customer_ID')";
                                if (!mysqli_query($con, $addressQuery)) {
                                    die('Error: ' . mysqli_error($con));
                                }

                                
                                $contactQuery = "INSERT INTO customer_contact (Customer_Email, Customer_Phone_Number, Customer_ID)
                                                VALUES ('$Customer_Email', '$Customer_Phone_Number', '$Customer_ID')";
                                if (!mysqli_query($con, $contactQuery)) {
                                    die('Error: ' . mysqli_error($con));
                                }
                            }
                        }
                        echo "Success";
                    }

                    mysqli_close($con);
                    ?>
                    <form name="inpfrm" method="post" action="RegisterForm.php">
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

