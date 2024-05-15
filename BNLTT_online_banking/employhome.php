<!DOCTYPE html>
<html>
<head>
    <title>Home</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;500;600;700;800&family=Ubuntu:ital,wght@0,300;1,300&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Open Sans', sans-serif;
            font-family: 'Ubuntu', sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 0;
        }

        h1 {
            font-family: 'Open Sans', sans-serif;
            font-family: 'Ubuntu', sans-serif;
            color: #333;
            text-align: center;
            padding: 10px 0;
            margin-bottom: 10px;
        }

        .container {
            font-family: 'Open Sans', sans-serif;
            font-family: 'Ubuntu', sans-serif;
            display: flex;
            justify-content: center;
            align-items: flex-start;
            flex-wrap: wrap;
            margin-top: 20px;
        }

        .form-container {
            width: 300px;
            padding: 20px;
            border-radius: 5px;
            background-color: #ffffff;
        }
        .transaction-image {
            display: flex;
            margin-bottom: 20px;
        }
        .transaction-image img {
            max-width: 300px;
            height: auto;
            margin-right: 10px;
        }


        input[type="submit"] {
            font-family: 'Open Sans', sans-serif;
            font-family: 'Ubuntu', sans-serif;
            background-color: #bb3636;
            color: white;
            border: none;
            padding: 10px 0;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 10px 0;
            cursor: pointer;
            border-radius: 5px;
            width: 100%;
        }

        input[type="submit"]:hover {
            background-color: #a82c2c;
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
            border: none;
            font-family: 'Ubuntu', sans-serif;
        }
    </style>
</head>
<body>
    <h1>Welcome, Employee</h1>
    <div class="container">
        <div class="form-container">
            <div class="transaction-image">
                <img src="image1.png" alt="Transaction">
            </div>
    <div class="container">
        <div class="form-container">
            <form action="Analysis/AnalysisReport.php" method="post">
                <input type="submit" name="Account Analysis" value="Account Analysis">
            </form>

            <form action="UpdateStatusForm.php" method="post">
                <input type="submit" name="Update Loan Status" value="Update Loan Status">
            </form>

            <form action="UpdateCardStatus_Form.php" method="post">
                <input type="submit" name="Update CardStatus" value="Update Card Status">
            </form>

            <form action="EmployeeLoginForm.php" method="post">
                <input type="submit" name="Logout" value="Logout">
            </form>
        </div>
    </div>
</body>
</html>
