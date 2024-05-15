<?php
$con=mysqli_connect("localhost","root","","online_bank");

// Check connection
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$employeeEmail = isset($_POST['Employee_Email']) ? $_POST['Employee_Email'] : '';

?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Employee Login Page</title>
  <!-- CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;500;600;700;800&family=Ubuntu:ital,wght@0,300;1,300&display=swap" rel="stylesheet">

    <style>
    body {
      font-family: 'Open Sans', sans-serif;
      font-family: 'Ubuntu', sans-serif;
      background-color: #bb3636;
      color: #fff;
      padding: 50px;
      text-align: center;
    }

    .card {
      font-family: 'Open Sans', sans-serif;
      font-family: 'Ubuntu', sans-serif;
      border: none;
      border-radius: 1rem;
      margin-bottom: 5rem;
      box-shadow: 0 1rem 3rem rgba(0, 0, 0, 0.175) !important;
      margin-top: 2rem; /* Added margin to the top */
    }

    .btn-primary {
      background-color: #bb3636;
      border-color: #bb3636;
    }

    .text-light {
      display: none; /* Removed "Forgot password?" and "Create new account" links */
    }
        .header {
            font-family: 'Open Sans', sans-serif;
            font-family: 'Ubuntu', sans-serif;
            background-color: #bb3636;
            color: #fff;
            padding: 50px;
            text-align: center;
        }

        .login-form {
            background-color: #ffffff;
            max-width: 400px;
            margin: 0 auto;
            padding: 30px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .form-group {
            margin-bottom: 20px;
            text-align: left;
        }

        .form-group label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
            color: #333;
        }

        .form-group input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .form-group input[type="submit"] {
            background-color: #bb3636;
            color: #fff;
            cursor: pointer;
            transition: background-color 0.3s ease;
            width: 100%;
            padding: 10px;
            border: none;
            border-radius: 4px;
            font-size: 16px;
        }

        .form-group input[type="submit"]:hover {
            background-color: #a63030;
        }

        .back-button {
            margin-top: 20px;
        }

        .back-button a {
            background-color: #bb3636;
            color: #fff;
            cursor: pointer;
            transition: background-color 0.3s ease;
            width: 26%;
            padding: 8px;
            border: none;
            border-radius: 4px;
            font-size: 16px;
        }

        .back-button a:hover {
            background-color: #a63030;
        }
    </style>
</head>
<body>
    <!-- Header -->
    <div class="header">
        <img src="logo1.png" alt="Logo" width="150">
        <h1>Employee Login</h1>
        <p>Always serve the right choice</p>
    </div>

    <!-- Login form -->
    <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-4 col-md-6">
        <div class="card">
          <div class="card-header bg-transparent pb-5">
          </div>
          <div class="card-body px-lg-5 py-lg-5">
                    <form method="POST" action="EmployeeLogin.php">
                        <div class="form-group mb-3">
                            <div class="input-group input-group-alternative">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-envelope"></i></span>
                                </div>
                                <input class="form-control" placeholder="Employee Email" type="text" name="Employee_Email" required value="<?php echo $employeeEmail; ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="input-group input-group-alternative">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-lock"></i></span>
                                </div>
                                <input class="form-control" placeholder="Employee Password" type="password" name="Employee_Password" required>
                            </div>
                        </div>
                        <!-- Error message -->
              <?php
                if (isset($_POST['password'])) {
                  $password = $_POST['password'];
                  if ($password !== 'correct_password') {
                    echo '<p style="color: red;">Incorrect password. Please try again.</p>';
                  }
                }
              ?>
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary my-4">Login</button>
                        </div>

                        <div class="back-button">
                        <a href="indexEmployee.php" class="btn btn-primary my-4">Back</a>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</body>
</html>



