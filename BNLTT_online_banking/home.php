<?php
// Database connection
$con = mysqli_connect("localhost", "root", "", "online_bank");
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    exit();
}

// Start the session
session_start();

if (isset($_SESSION["account_number"])) {
    $accountNumber = $_SESSION["account_number"];
} else {
    
    header("Location: Login.php");
    exit();
}

$query = "SELECT Customer_First_Name, a.Balance
            FROM Customer c
            JOIN account a ON a.Customer_ID = c.Customer_ID
            WHERE a.Account_Number = '$accountNumber'";
$result = mysqli_query($con, $query);

if ($result && mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $firstName = $row['Customer_First_Name'];
    $balance = $row['Balance'];
} else {
    
    $firstName = "Unknown";
    $balance = "N/A";
}

mysqli_close($con);
?>

<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Home</title>
    <!-- CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;500;600;700;800&family=Ubuntu:ital,wght@0,300;1,300&display=swap" rel="stylesheet" />

    <style>
        .header {
            font-family: 'Open Sans', sans-serif;
            font-family: 'Ubuntu', sans-serif;
            background-color: #bb3636;
            color: #fff;
            padding: 50px;
            text-align: center;
            font-family: 'Open Sans', sans-serif;
            font-family: 'Ubuntu', sans-serif;
        }
        
        .header p {
            font-family: 'Open Sans', sans-serif;
            font-family: 'Ubuntu', sans-serif;
            font: 'Open Sans', sans-serif;
            font: 'Ubuntu', sans-serif;
        }
        
        .body {
            background-color: #000000;
            color: #fff;
            padding: 50px;
            text-align: center;
            font-family: 'Open Sans', sans-serif;
            font-family: 'Ubuntu', sans-serif;
        }

        .button {
            background-color: #bb3636;
            border-color: #bb3636;
            padding: 7px;
            font-family: 'Open Sans', sans-serif;
            font-family: 'Ubuntu', sans-serif;
            width:100%;
        }

        .button:hover {
            background-color: #ad2d2d;
            border-color: #ad2d2d;
            font-family: 'Open Sans', sans-serif;
            font-family: 'Ubuntu', sans-serif;
        }

        .card {
            border: none;
            border-radius: 1rem;
            margin-bottom: 5rem;
            box-shadow: 0 1rem 3rem rgba(0, 0, 0, 0.175) !important;
            margin-top: 2rem;
            font-family: 'Open Sans', sans-serif;
            font-family: 'Ubuntu', sans-serif;
        }
        
        .card-header {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            text-align: center;
            font-family: 'Open Sans', sans-serif;
            font-family: 'Ubuntu', sans-serif;
        }

        .card-header span {
            font-size:40px;

            margin-top: 40px;
            
            font-family: 'Open Sans', sans-serif;
            font-family: 'Ubuntu', sans-serif;
        }
        
        .card-footer {
            display: none; /* Hide the card footer */
            font-family: 'Open Sans', sans-serif;
            font-family: 'Ubuntu', sans-serif;
            
        }
        
        .dropbtn {
            background-color: #bb3636;
            color: white;
            padding: 7px;
            font-size: 16px;
            border-radius: 0.25rem;
            border: none;
            width:100%;
        }
        
        .dropdown {
            position: relative;
            display: inline-block;
            font-family: 'Open Sans', sans-serif;
            font-family: 'Ubuntu', sans-serif;
            width:100%;
            font-family: 'Open Sans', sans-serif;
            font-family: 'Ubuntu', sans-serif;
        }

        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #f1f1f1;
            min-width: 160px;
            box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
            z-index: 1;
            font-family: 'Open Sans', sans-serif;
            font-family: 'Ubuntu', sans-serif;
            width:100%;
        }

        .dropdown-content a {
            color: black;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
            font-family: 'Open Sans', sans-serif;
            font-family: 'Ubuntu', sans-serif;
        }

        .dropdown-content a:hover {
            background-color: #ddd;
            font-family: 'Open Sans', sans-serif;
            font-family: 'Ubuntu', sans-serif;
        }

        .dropdown:hover .dropdown-content {
            display: block;
            font-family: 'Open Sans', sans-serif;
            font-family: 'Ubuntu', sans-serif;
        }

        .dropdown:hover .dropbtn {
            background-color: #bb3636;
            font-family: 'Open Sans', sans-serif;
            font-family: 'Ubuntu', sans-serif;
        }
        .cocktainer{
            background-color: #ffffff;
        }

        
    </style>
</head>

<body>
    <!-- Header -->
    <div class="header">
        <img src="logo1.png" alt="Logo" width="150">

        <h1>Welcome, <?php echo $firstName; ?>! Account Number: <?php echo $accountNumber; ?></h1>
        <p>Always serve the right choice</p>
    </div>

    <!-- Page content -->
    <div class="cocktainer">
        <div class="row justify-content-center w-screen" >
            <div class="col-lg-4 col-md-6">
                <div class="card">
                    <div class="card-header bg-transparent pb-5">
                        <span>Balance: <?php echo $balance; ?>$</span>
                    </div>
                    <div class="card-body px-lg-5 py-lg-5">
                        
                        <form method="POST" action="PayForm.php" role="form">
                            <input type="hidden" name="account_number" value="<?php echo $accountNumber; ?>">
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary my-4 button" name="PayAlert">PayAlert</button>
                            </div>
                        </form>
                        
                        <form method="POST" action="buttonlink.php" role="form">
                            <input type="hidden" name="account_number" value="<?php echo $accountNumber; ?>">
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary my-4 button" name="Transfer">Transfer</button>
                            </div>
                        </form>
                        <form method="POST" role="form">
                            <input type="hidden" name="account_number" value="<?php echo $accountNumber; ?>">
                            <div class="text-center">
                                <div class="dropdown">
                                    <button class="dropbtn">Loan</button>
                                    <div class="dropdown-content">
                                        <a href="InsertLoanForm.php">Loan Request</a>
                                        <a href="InsertLoanTransactionForm.php">Loan Payment</a>
                                    </div>
                                </div>
                            </div>
                        </form>

                        <form method="POST" action="VerifyForm.php" role="form">
                            <input type="hidden" name="account_number" value="<?php echo $accountNumber; ?>">
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary my-4 button" name="Change Information">Change Information</button>
                            </div>
                        </form>
                        <form method="POST" action="LoginForm.php" role="form">
                            <input type="hidden" name="account_number" value="<?php echo $accountNumber; ?>">
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary my-4 button" name="Logout">Logout</button>
                            </div>
                        </form>
                    </div>
                    <div class="card-footer py-4"></div>
                </div>
            </div>
        </div>
    </div>

    <!-- JavaScript -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>

</html>
