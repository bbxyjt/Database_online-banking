<!DOCTYPE html>
<html>

<script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;500;600;700;800&family=Ubuntu:ital,wght@0,300;1,300&display=swap" rel="stylesheet">


<head>
    <title>Transfer Form</title>
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
            width: 50%;
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

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var TypeSelect = document.querySelector('select[name="Transaction_Type"]');
            TypeSelect.addEventListener('change', function() {
                var selectedValue = this.value;
                var EnteringType = document.getElementById('EnteringType');
                if (selectedValue === 'Payment' || selectedValue === 'Swipe card' || selectedValue === 'Transferring') {
                    EnteringType.style.display = 'table-row';
                } else {
                    EnteringType.style.display = 'none';
                }
            });
        });
    </script>
</head>

<body>
    <div class="container">
        <h2>Transfer Form <box-icon name='money' size = 'lg' border='circle'></h2>
        <form name="inpfrm" method="post" action="WithInsert.php">
            <div class="form-group">
                <label class="label">Card Number:</label>
                <input class="input-field" name="Card_Number" type="text" id="Card_Number" size="20" value="" maxlength="">
            </div>
            <div class="form-group">
                <label class="label">Transaction Type:</label>
                <select class="input-field" name="Transaction_Type">
                    <option value="Withdraw">Withdraw</option>
                    <option value="Payment">Payment</option>
                    <option value="Swipe card">Swipe card</option>
                    <option value="Transferring">Transferring</option>
                </select>
            </div>
            <div class="form-group" id="EnteringType" style="display: none;">
                <label class="label">Recipient Number:</label>
                <input class="input-field" type="text" name="Recipient_Account" id="Recipient_Account" placeholder="Type Recipient Number here" style="width: 250px;">
            </div>
            <div class="form-group">
                <label class="label">Amount:</label>
                <input class="input-field" name="Amount" type="text" id="Amount" size="10" value="" maxlength=""> Baht
            </div>
            <div class="form-group">
                <label class="label">Transaction Detail:</label>
                <input class="input-field" name="Transaction_Detail" type="text" id="Transaction_Detail" size="10" value="" maxlength="">
            </div>
            <div class="form-group">
                <label class="label">Password:</label>
                <input class="input-field" name="Password" type="text" id="Password" size="10" value="" maxlength="">
            </div>
            <div class="button-container">
                <input class="button" name="Transfer" type="submit" id="Transfer" value="Transfer">
            </div>
        </form>
    </div>

    <div class="button-container" style="text-align: center; margin-top: 30px;">
        <a href="buttonlink.php" class="button">Back</a>
    </div>
</body>

</html>
