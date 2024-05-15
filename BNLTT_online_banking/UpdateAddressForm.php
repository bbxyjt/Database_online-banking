<?php
$con = mysqli_connect("localhost", "root", "", "online_bank");
// Check connection
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Change Address</title>
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;500;600;700;800&family=Ubuntu:ital,wght@0,300;1,300&display=swap" rel="stylesheet" />
    <style>
        body {
            font-family: 'Open Sans', sans-serif;
            font-family: 'Ubuntu', sans-serif;
            background-color: #bb3636;
            color: #ffffff;
            padding: 20px;
        }

        .container {
            width: 500px;
            margin: auto;
            background-color: #ffffff;
            padding: 40px;
            border-radius: 15px;
            text-align: left;
            margin-top: 50px;
        }

        h2 {
            color: #000000;
            font-size: 30px;
            margin-bottom: 20px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
            color: #000000;
        }

        .input-field {
            width: 100%;
            padding: 10px;
            border: none;
            background-color: #f2f2f2;
            color: #000000;
            border-radius: 5px;
        }

        .button-container {
            text-align: center;
            margin-top: 30px;
        }

        .button {
            display: inline-block;
            padding: 10px 20px;
            background-color: #ffffff;
            color: #000000;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s ease;
            font-size: 16px;
            cursor: pointer;
        }

        .button:hover {
            background-color: #e9e9e9;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Change Address <box-icon name='world' size = 'lg' border='circle'></box-icon></h2>
        <form name="inpfrm" method="post" action="UpdateAddress.php">
            <div class="form-group">
                <label class="label">Street:</label>
                <input class="input-field" name="Customer_Street" type="text" id="Customer_Street" size="30" value="" maxlength="30">
            </div>
            <div class="form-group">
                <label class="label">City:</label>
                <input class="input-field" name="Customer_City" type="text" id="Customer_City" size="30" value="" maxlength="30">
            </div>
            <div class="form-group">
                <label class="label">State:</label>
                <input class="input-field" name="Customer_State" type="text" id="Customer_State" size="30" value="" maxlength="30">
                <label class="label">Postal Code:</label>
                <input class="input-field" name="Customer_Postal_Code" type="text" id="Customer_Postal_Code" size="5" value="" maxlength="5">
            </div>
            <div class="form-group">
                <label class="label">Country:</label>
                <input class="input-field" name="Customer_Country" type="text" id="Customer_Country" size="30" value="" maxlength="30">
            </div>
            <div class="button-container">
                <input class="button" name="Update" type="submit" id="Update" value="Update" />
            </div>
        </form>
    </div>

	<div class="button-container" style="text-align: center; margin-top: 30px;">
        <form action="change.php" method="get">
            <button class="button" type="submit">Back</button>
        </form>
    </div>
	
</body>
</html>