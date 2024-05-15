<!DOCTYPE html>
<html>

<head>
    <title>Home</title>
    <link rel="preconnect" href="https://fonts.googleapis.com%22%3E/
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
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
            color: #333;
            text-align: center;
            padding: 10px 0;
            margin-bottom: 10px;
        }

        .container {
            display: flex;
            justify-content: center;
            align-items: flex-start;
            flex-wrap: wrap;
            margin-top: 20px;
        }

        .logo-container {
            width: 200px;
            padding: 20px;
            text-align: center;
        }

       <!-- .logo-container img {
            max-width: 100px;
            height: auto;
        }

        .form-container {
            width: 300px;
            padding: 20px;
            border-radius: 5px;
            background-color: #ffffff;
        }
        .transaction-image {
            display: flex;
            /* align-items: center; */
            margin-bottom: 20px;
        }

        .transaction-image img {
            max-width: 300px;
            height: auto;
            margin-right: 10px;
        }

        input[type="submit"] {
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
    <h1>Transfer</h1>
    <div class="container">
        <div class="form-container">
            <div class="transaction-image">
                <img src="transaction.png" alt="Transaction">
            </div>

            <form method="POST" action="WithInsertForm.php">
                <input type="submit" name="With credit/debit card" value="With credit/debit card" class="button">
            </form>

            <form method="POST" action="WithoutInsertForm.php">
                <input type="submit" name="Without credit/debit card" value="Without credit/debit card" class="button">
            </form>

            <form method="POST" action="home.php">
                <input type="submit" name="Back" value="Back" class="button">
            </form>
        </div>
    </div>

</body>

</html>