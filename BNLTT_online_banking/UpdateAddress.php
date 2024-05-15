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
                     
					 <h2>Address</h2> 
                    
					 <?php
session_start();

$con=mysqli_connect("localhost","root","","online_bank");
// Check connection
if (mysqli_connect_errno()) {
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
// Check if the account number is stored in the session
if (isset($_SESSION["account_number"])) {
    $accountNumber = $_SESSION["account_number"];
	
	if(empty($_POST['Customer_Street'])){
		echo "Please Input data Customer_Street" ;
	
	}elseif(empty($_POST['Customer_City'])){
		echo "Please Input data Customer_City" ;
	
	}elseif(empty($_POST['Customer_State'])){
		echo "Please Input data Customer_State" ;
	
	}elseif(empty($_POST['Customer_Postal_Code'])){
		echo "Please Input data Customer_Postal_Code" ;
	}elseif(empty($_POST['Customer_Country'])){
		echo "Please Input data Customer_Country" ;
	}else{
		$Customer_Street = mysqli_real_escape_string($con, $_POST['Customer_Street']);
		$Customer_City = mysqli_real_escape_string($con, $_POST['Customer_City']);
		$Customer_State = mysqli_real_escape_string($con, $_POST['Customer_State']);
		$Customer_Postal_Code = mysqli_real_escape_string($con, $_POST['Customer_Postal_Code']);
		$Customer_Country = mysqli_real_escape_string($con, $_POST['Customer_Country']);

		
        $query = "SELECT customer_id FROM account WHERE account_number = '$accountNumber' LIMIT 1";
        $result = mysqli_query($con, $query);
		if (mysqli_num_rows($result) === 0) {
            echo "Invalid account number.";
        } else {
			$row = mysqli_fetch_assoc($result);
            $customer_id = $row['customer_id'];

			
            $updateQuery = "UPDATE customer_address
							SET Customer_Street = '$Customer_Street', Customer_City = '$Customer_City', Customer_State = '$Customer_State', Customer_Postal_Code = '$Customer_Postal_Code', Customer_Country = '$Customer_Country'  
							WHERE customer_ID = '$customer_id'";
            if (mysqli_query($con, $updateQuery)) {
                echo "Customer Address updated successfully.";
            } else {
                echo "Error updating Customer Address: " . mysqli_error($con);
            }

		}
	}

} else {
    
    header("Location: verify.php");
    exit();
}	

mysqli_close($con);
?>

                    <form name="inpfrm" method="post" action="UpdateAddressForm.php">
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