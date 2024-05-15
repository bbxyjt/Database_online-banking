<?php
session_start();

$con = mysqli_connect("localhost", "root", "", "online_bank");
// Check connection
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Update Email</title>
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
            font-family: 'Open Sans', sans-serif;
            font-family: 'Ubuntu', sans-serif;
            width: 500px;
            margin: auto;
            background-color: #ffffff;
            padding: 40px;
            border-radius: 15px;
            text-align: left;
            margin-top: 50px;
        }

        h2 {
            font-family: 'Open Sans', sans-serif;
            font-family: 'Ubuntu', sans-serif;
            color: #000000;
            font-size: 30px;
            margin-bottom: 20px;
        }

        .form-group {
            font-family: 'Open Sans', sans-serif;
            font-family: 'Ubuntu', sans-serif;
            margin-bottom: 20px;
        }

        .label {
            font-family: 'Open Sans', sans-serif;
            font-family: 'Ubuntu', sans-serif;
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
            color: #000000;
        }

        .input-field {
            font-family: 'Open Sans', sans-serif;
            font-family: 'Ubuntu', sans-serif;
            width: 100%;
            padding: 10px;
            border: none;
            background-color: #f2f2f2;
            color: #000000;
            border-radius: 5px;
        }

        .button-container {
            font-family: 'Open Sans', sans-serif;
            font-family: 'Ubuntu', sans-serif;
            text-align: center;
            margin-top: 30px;
        }

        .button {
            font-family: 'Open Sans', sans-serif;
            font-family: 'Ubuntu', sans-serif;
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
            font-family: 'Open Sans', sans-serif;
            font-family: 'Ubuntu', sans-serif;
            background-color: #e9e9e9;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Update Email <box-icon name='message' size = 'lg' border='circle'></h2>
        <form name="inpfrm" method="post" action="UpdateEmailProcess.php">
            <div class="form-group">
                <label class="label">Old Email:</label>
                <input class="input-field" name="OldEmail" type="text" id="OldEmail" size="30" value="<?php
                $accountId = $_SESSION['account_number'];
                $query = "SELECT Customer_Email FROM customer_contact WHERE Customer_ID = (SELECT Customer_ID FROM account WHERE Account_Number = '$accountId')";
                $result = mysqli_query($con, $query);
                
                if ($result && mysqli_num_rows($result) > 0) {
                    $row = mysqli_fetch_assoc($result);
                    $oldEmail = $row['Customer_Email'];
                    echo $oldEmail;
                }
                ?>" readonly>
            </div>
            <div class="form-group">
                <label class="label">New Email:</label>
                <input class="input-field" name="NewEmail" type="text" id="NewEmail" size="30" value="" maxlength="30">
            </div>
            <div class="button-container">
                <input class="button" name="Update" type="submit" id="Update" value="Update" />
            </div>
        </form>
    </div>

    <div class="button-container" style="text-align: center; margin-top: 30px;">
        <a href="change.php" class="button">Back</a>
    </div>

</body>
</html>

<?php
mysqli_close($con);
?>

