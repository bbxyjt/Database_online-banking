<!DOCTYPE html>
<html>
<head>
    <title>First Page</title>

    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;500;600;700;800&family=Ubuntu:ital,wght@0,300;1,300&display=swap" rel="stylesheet" />
    <style>

    <style>
        body {
            font-family: 'Open Sans', sans-serif;
            font-family: 'Ubuntu', sans-serif;
            background-color: #f3f3f3;
            margin: 0;
            padding: 0;
        }

        .container {
            font-family: 'Open Sans', sans-serif;
            font-family: 'Ubuntu', sans-serif;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        h1 {
            font-family: 'Open Sans', sans-serif;
            font-family: 'Ubuntu', sans-serif;
            color: #333;
            font-size: 32px;
            margin-bottom: 20px;
        }

        .button-container {
            font-family: 'Open Sans', sans-serif;
            font-family: 'Ubuntu', sans-serif;
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }

        input[type="submit"] {
            font-family: 'Open Sans', sans-serif;
            font-family: 'Ubuntu', sans-serif;
            background-color: #bb3636;
            color: #fff;
            padding: 10px 20px;
            border: none;
            cursor: pointer;
            margin: 0 10px;
            font-size: 16px;
            width: 120px; /* Added width */
        }

        .logo-container {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-bottom: 20px;
        }

        .logo-container img {
            width: 80px;
        }

        .logo-container p {
            font-size: 16px;
            color: #333;
            text-align: center;
            margin: 0 auto;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="logo-container">
            <img src="Logo.png" alt="Logo" style="width:150px">
        
        </div>

        <h1>Welcome to the BNLTT</h1>

        <div class="button-container">
            <form method="POST" action="LoginForm.php">
                <input type="submit" name="login" value="Login" class="block-button">
            </form>

            <form method="POST" action="RegisterForm.php">
                <input type="submit" name="signup" value="Sign Up" class="block-button">
            </form>
        </div>
    </div>
</body>
