<!DOCTYPE html>
<html>
<script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
<link rel="preconnect" href="https://fonts.googleapis.com%22%3E/
<link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;500;600;700;800&family=Ubuntu:ital,wght@0,300;1,300&display=swap" rel="stylesheet">
<head>
    <title>Payment Alert Form</title>
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
            width: 20%;
            padding: 10px;
            border: none;
            background-color: #f2f2f2;
            color: #000000; 
            border-radius: 5px;
        }
        .input-field1{
            width: 30%;
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
        <h2>Payment Alert Form <box-icon name='bell' size = 'lg' border='circle'></box-icon></h2>
        <form name="PayAlertFrm" method="post" action="Pay.php">
            <div class="form-group">
                <label class="label">Account Number:</label>
                <input class="input-field1" name="AccountNumber" type="text" id="AccountNumber" size="15" value="" maxlength="15" placeholder="Input Account Number">
            <div class="form-group">
                <label class="label">Amount ($):</label>
                <input class="input-field"name="Amount" type="number" id="Amount" size="15" value="" maxlength="10" placeholder="0" min="0" step="1">
            </div>
            <div class="form-group">
                <label class="label">Due Date:</label>
                <input class="input-field" type="date" name="Due_Date">
            </div>
            <div class="button-container">
                <input class="button" name="Insert" type="submit" id="Insert" value="Insert">
            </div>
        </form>
    </div>
    
    <div class="button-container" style="text-align: center; margin-top: 30px;">
        <form action="home.php" method="get">
            <button class="button" type="submit">Back</button>
        </form>
    </div>
</body>

</html>