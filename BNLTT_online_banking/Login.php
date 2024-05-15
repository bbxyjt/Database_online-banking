<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   
    <!-- CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;500;600;700;800&family=Ubuntu:ital,wght@0,300;1,300&display=swap" rel="stylesheet">
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
                     
					 <h2>Login</h2> 

                     <?php
// Database connection
$con = mysqli_connect("localhost", "root", "", "online_bank");
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    exit();
}

// Start session
session_start();

// Define error message variable
$errorMsg = '';


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $accountNumber = mysqli_real_escape_string($con, $_POST['account_number']);
    $password = mysqli_real_escape_string($con, $_POST['password']);

    
    $query = "SELECT ac.Password, ac.Account_Number
              FROM account AS ac
              WHERE ac.Account_Number = '$accountNumber'";
    $result = mysqli_query($con, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $storedPassword = $row['Password'];
        $targetAccountNumber = $row['Account_Number'];

        
        if ($password === $storedPassword) {
            // Passwords match

            // Store Account_Number in session
            $_SESSION["account_number"] = $accountNumber;

            mysqli_close($con);
            header("Location: home.php");
            exit();
        } else {
            // Invalid password
            echo "Incorrect password. Please try again.";
             
        }
    } else {
        // Account number not found
        echo "Invalid account number or password.";
    }
}

mysqli_close($con);
?>

                     
                    <form name="inpfrm" method="post" action="LoginForm.php">
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









