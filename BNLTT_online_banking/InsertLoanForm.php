<!DOCTYPE html>
<html>

<head>
    <title>LOAN FORM</title>
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;500;600;700;800&family=Ubuntu:ital,wght@0,300;1,300&display=swap" rel="stylesheet">

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

        .radio-label {
            color: #000000;
            margin-right: 10px;
        }

        select {
            width: 100%;
            padding: 10px;
            border: none;
            background-color: #f2f2f2;
            color: #000000; 
            border-radius: 5px;
        }

        input[type="date"] {
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
            font-family: 'Open Sans', sans-serif;
            font-family: 'Ubuntu', sans-serif;
        }

        .button:hover {
            background-color: #e9e9e9;
        }
    </style>
</head>

<body>
    
    <div class="container">
        
        <h2>LOAN FORM <box-icon type='solid' name='bank' size = 'lg' border='circle'></box-icon></h2>
        <form name="loanForm" method="post" action="InsertLoan.php">
    
            <div class="form-group">
                <label class="label">Credit Bureau:</label>
                <input type="radio" name="Credit_Bureau" value="AA" id="radio-aa"><label for="radio-aa" class="radio-label">AA</label>
                <input type="radio" name="Credit_Bureau" value="BB" id="radio-bb"><label for="radio-bb" class="radio-label">BB</label>
                <input type="radio" name="Credit_Bureau" value="CC" id="radio-cc"><label for="radio-cc" class="radio-label">CC</label>
                <input type="radio" name="Credit_Bureau" value="DD" id="radio-dd"><label for="radio-dd" class="radio-label">DD</label>
                <input type="radio" name="Credit_Bureau" value="EE" id="radio-ee"><label for="radio-ee" class="radio-label">EE</label>
                <input type="radio" name="Credit_Bureau" value="AA" id="radio-aa"><label for="radio-ff" class="radio-label">FF</label>
                <input type="radio" name="Credit_Bureau" value="BB" id="radio-bb"><label for="radio-gg" class="radio-label">GG</label>
                <input type="radio" name="Credit_Bureau" value="CC" id="radio-cc"><label for="radio-hh" class="radio-label">HH</label>
            </div>
            <div class="form-group">
                <label class="label">Loan Type:</label>
                <select name="Loan_Type">
                    <option value="Plan 1">WealthWave: Interest Rate 2% per year, 2 years of contract, Minimum 50000$ Not Exceed 100000$</option>
                    <option value="Plan 2">Golden Gate Wealth: Interest Rate 6.5% per year, 6 years of contract, Minimum 50000$ Not Exceed 100000$</option>
                    <option value="Plan 3">Fortune Finances: Interest Rate 3.87% per year, 1 years of contract, Minimum 10000$ Not Exceed 30000$</option>
                </select>
            </div>
            <div class="form-group">
                <label class="label">Loan Amount:</label>
                <input class="input-field" type="text" name="Amount">
            </div>
            <div class="form-group">
                <label class="label">Loan Year:</label>
                <input class="input-field" type="text" name="Loan_Year">
            </div>
            <div class="form-group">
                <label class="label">Start Date:</label>
                <input type="date" name="Start_Date">
            </div>
            <div class="button-container">
                <input class="button" type="submit" value="Submit">
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