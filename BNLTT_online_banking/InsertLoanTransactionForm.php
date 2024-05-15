<head>
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com%22%3E/
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;500;600;700;800&family=Ubuntu:ital,wght@0,300;1,300&display=swap" rel="stylesheet">
</head>
<style>
    body {
        background-color: #bb3636;
        font-family: 'Open Sans', sans-serif;
        font-family: 'Ubuntu', sans-serif;
    }
    .form-container {
        ont-family: 'Open Sans', sans-serif;
        font-family: 'Ubuntu', sans-serif;
        background-color: #fff;
        border-radius: 5px;
        padding: 20px;
        width: 400px;
        margin: 0 auto;
        margin-top: 100px;
    }
    .form-container h2 {
        ont-family: 'Open Sans', sans-serif;
        font-family: 'Ubuntu', sans-serif;
        text-align: center;
        margin-bottom: 20px;
        color: #000000;
        font-family: 'Open Sans', sans-serif;
        font-family: 'Ubuntu', sans-serif;
    }
    .form-container td {
        ont-family: 'Open Sans', sans-serif;
        font-family: 'Ubuntu', sans-serif;
        padding: 10px;
        text-align: right;
        font-family: 'Open Sans', sans-serif;
        font-family: 'Ubuntu', sans-serif;
    }
    .form-container input[type="text"] {
        ont-family: 'Open Sans', sans-serif;
        font-family: 'Ubuntu', sans-serif;
        padding: 5px;
        border: 1px solid #ccc;
        border-radius: 3px;
        width: 200px;
    }
    .form-container input[type="submit"] {
        ont-family: 'Open Sans', sans-serif;
        font-family: 'Ubuntu', sans-serif;
        padding: 10px 20px;
        background-color: #bb3636;
        color: #fff;
        border: none;
        border-radius: 3px;
        cursor: pointer;
    }
    .form-container input[type="submit"]:hover {
        background-color: #ad2d2d;
    }
    .form-container .text-center {
        text-align: center;
    }
    .button-container {
        text-align: center;
        margin-top: 20px;
        font-family: 'Open Sans', sans-serif;
        font-family: 'Ubuntu', sans-serif;
    }
    .button {
        padding: 10px 20px;
        background-color: #fff;
        color: #000;
        border: none;
        border-radius: 3px;
        cursor: pointer;
        text-decoration: none;
        font-family: 'Open Sans', sans-serif;
        font-family: 'Ubuntu', sans-serif;
    }
    .button {
        display: inline-block;
        padding: 10px 20px;
        background-color: #fff;
        border: 1px solid #ccc;
        text-decoration: none;
        color: #333;
        font-weight: bold;
        font-family: 'Open Sans', sans-serif;
        font-family: 'Ubuntu', sans-serif;
  }
    .button:hover {
        background-color: #e9e9e9;
    }
</style>


<div class="form-container">
    <h2>Loan Payment         <box-icon type='solid' name='bank'></box-icon></h2>
    <form name="inpfrm" method="post" action="InsertLoanTransaction.php">
        <table>
            <tr>
                <td>Loan ID:</td>
                <td><input type="text" name="Loan_ID"></td>
            </tr>
            <tr>
                <td>Payment Date:</td>
                <td><?php echo date('Y-m-d'); ?></td>
            </tr>
            <tr>

            <tr>
                <td colspan="2" class="text-center">
                    <input type="submit" value="Confirm Payment">
                </td>
            </tr>
            <tr>
                <td colspan="2" class="text-center">
                    <a href="home.php" class="button">Back</a>
                </td>
            </tr>
        </table>
    </form>
</div>
