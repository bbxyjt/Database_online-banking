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
                     
					 <h2>Employee Login</h2> 
                    
                    
                    <?php

// Database connection
$con = mysqli_connect("localhost", "root", "", "online_bank");
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    exit();
}

// Start session
session_start();


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $Employee_Email = mysqli_real_escape_string($con, $_POST['Employee_Email']);
    $Employee_Password = mysqli_real_escape_string($con, $_POST['Employee_Password']);


    $query = "SELECT e.Employee_Password, ec.Employee_Email
          FROM employee AS e
          JOIN employee_contact AS ec ON e.Employee_ID = ec.Employee_ID
          WHERE e.Employee_Password = '$Employee_Password'";
    $result = mysqli_query($con, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $storedPassword = $row['Employee_Password'];
        $targetEmail = $row['Employee_Email'];

        
        if ($Employee_Password === $storedPassword) {
            // Passwords match

            mysqli_close($con);
            header("Location: employhome.php");
            exit();
        } else {
            // Invalid password
            echo "Invalid email or password.";
            ;
        }
    } else {
        // Account number not found
        echo "Invalid email or password.";
        
    }
}

mysqli_close($con);
?>


                    <form name="inpfrm" method="post" action="EmployeeLoginForm.php">
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









