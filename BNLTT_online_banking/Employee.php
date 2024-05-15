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

        .form-group input[type="text"]{
          font-family: 'Open Sans', sans-serif;
          font-family: 'Ubuntu', sans-serif;
        },
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
                    
					 <h2>Employee</h2> 


           <?php
$con = mysqli_connect("localhost", "root", "", "online_bank");

// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

if (empty($_POST['Employee_First_Name'])) {
  echo "Please input data for FirstName.";
} elseif (empty($_POST['Employee_Last_Name'])) {
  echo "Please input data for LastName.";
} elseif (empty($_POST['branch'])) {
  echo "Please input data for branch.";
} elseif (empty($_POST['Sex'])) {
  echo "Please input data for Sex.";
} elseif (empty($_POST['street'])) {
  echo "Please input data for Street.";
} elseif (empty($_POST['city'])) {
  echo "Please input data for City.";
} elseif (empty($_POST['state'])) {
  echo "Please input data for State.";
} elseif (empty($_POST['postal_code'])) {
  echo "Please input data for Postalcode.";
} elseif (empty($_POST['country'])) {
  echo "Please input data for Country.";
} elseif (empty($_POST['Employee_Email'])) {
  echo "Please input data for Employee_Email.";
} elseif (empty($_POST['Employee_Phone_Number'])) {
  echo "Please input data for Phone Number.";
} elseif (empty($_POST['password1']) || empty($_POST['password2'])) {
  echo "Please input data for Password.";
} elseif ($_POST['password1'] !== $_POST['password2']) {
  echo "Passwords do not match. Please try again.";
} else {
    $Employee_First_Name = mysqli_real_escape_string($con, $_POST['Employee_First_Name']);
    $Employee_Last_Name = mysqli_real_escape_string($con, $_POST['Employee_Last_Name']);
    $Branch_ID = mysqli_real_escape_string($con, $_POST['branch']);
    $Employee_Sex = mysqli_real_escape_string($con, $_POST['Sex']);
    $Employee_street = mysqli_real_escape_string($con, $_POST['street']);
    $Employee_city = mysqli_real_escape_string($con, $_POST['city']);
    $Employee_state = mysqli_real_escape_string($con, $_POST['state']);
    $Employee_postalcode = mysqli_real_escape_string($con, $_POST['postal_code']);
    $Employee_country = mysqli_real_escape_string($con, $_POST['country']);
    $Employee_Email = mysqli_real_escape_string($con, $_POST['Employee_Email']);
    $Employee_Phone_Number = mysqli_real_escape_string($con, $_POST['Employee_Phone_Number']);
    $thisDate = date('Y-m-d');

    $Employee_Password = mysqli_real_escape_string($con, $_POST['password1']);

    $query1 = "INSERT INTO employee (Employee_First_Name, Employee_Last_Name, Branch_ID, Employee_Sex, Employee_Start_Date, Employee_Password)
    VALUES ('$Employee_First_Name', '$Employee_Last_Name', '$Branch_ID', '$Employee_Sex', '$thisDate', '$Employee_Password')";

    if (mysqli_query($con, $query1)) {
        $Employee_ID = mysqli_insert_id($con);

        $query2 = "INSERT INTO employee_address (Employee_ID, Employee_street, Employee_city, Employee_state, Employee_postalcode, Employee_country)
                    VALUES ('$Employee_ID', '$Employee_street', '$Employee_city', '$Employee_state', '$Employee_postalcode', '$Employee_country')";

        $query3 = "INSERT INTO employee_contact (Employee_ID, Employee_Email, Employee_Phone_Number)
                    VALUES ('$Employee_ID', '$Employee_Email', '$Employee_Phone_Number')";

        if (mysqli_query($con, $query2) && mysqli_query($con, $query3)) {
            echo "Success!";
        } else {
            echo "Error: " . mysqli_error($con);
        }
    } else {
        echo "Error: " . mysqli_error($con);
    }
}

mysqli_close($con);
?>


                    

                    <form name="inpfrm" method="post" action="EmployeeForm.php">
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

