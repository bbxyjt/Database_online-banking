<?php
$con = mysqli_connect("localhost", "root", "", "online_bank");
// Check connection
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
?>

<head>
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;500;600;700;800&family=Ubuntu:ital,wght@0,300;1,300&display=swap" rel="stylesheet">
</head>

<style>
    body {
        background-color: #f8f9fa;
        font-family: 'Open Sans', sans-serif;
        font-family: 'Ubuntu', sans-serif;
    }

    .container {
        margin-top: 50px;
        font-family: 'Open Sans', sans-serif;
        font-family: 'Ubuntu', sans-serif;
    }

    .form-header {
        font-family: 'Open Sans', sans-serif;
        font-family: 'Ubuntu', sans-serif;
        background-color: #bb3636;
        color: #fff;
        padding: 10px;
        text-align: center;
        font-weight: bold;
        font-size: 20px;
        margin-bottom: 20px;
        border-top-left-radius: 10px;
        border-top-right-radius: 10px;
    }

    .form-table {
        width: 500px;
        margin: 0 auto;
        border: 1px solid #ccc;
        border-radius: 10px;
        padding: 10px;
        background-color: #fff;
        font-family: 'Open Sans', sans-serif;
        font-family: 'Ubuntu', sans-serif;
    }

    .form-table td {
        padding: 10px;
        font-family: 'Open Sans', sans-serif;
        font-family: 'Ubuntu', sans-serif;
    }

    .form-table td input[type="text"],
    .form-table td select {
        width: 100%;
        padding: 5px;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
        font-family: 'Open Sans', sans-serif;
        font-family: 'Ubuntu', sans-serif;
    }

    .form-table td input[type="submit"] {
        font-family: 'Open Sans', sans-serif;
        font-family: 'Ubuntu', sans-serif;
        background-color: #bb3636;
        color: #fff;
        border: none;
        padding: 10px 20px;
        border-radius: 4px;
        cursor: pointer;
    }

    .form-table td input[type="submit"]:hover {
        background-color: #ad2d2d;
        font-family: 'Open Sans', sans-serif;
        font-family: 'Ubuntu', sans-serif;
    }

    .form-table td input[type="button"] {
        font-family: 'Open Sans', sans-serif;
        font-family: 'Ubuntu', sans-serif;
        background-color: #bb3636;
        color: #fff;
        border: none;
        padding: 10px 20px;
        border-radius: 4px;
        cursor: pointer;
        margin-right: 10px;
    }

    .form-table td input[type="button"]:hover {
        background-color: #ad2d2d;
        font-family: 'Open Sans', sans-serif;
        font-family: 'Ubuntu', sans-serif;
    }
</style>


<div class="container">
    <form name="inpfrm" method="post" action="UpdateStatus.php">
        <table class="form-table"> 
            <tr>
                <td colspan="2" class="form-header">Update Loan Status <box-icon type='card' name='edit' color = 'white'></box-icon></td>
            </tr>
            <tr>
                <td align="right">Loan ID:</td>
                <td align="left"><input name="Loan_ID" type="text" id="Loan_ID" size="30" value="" maxlength="30"></td>
            </tr>
            <tr>
                <td align="right">Loan Status:</td>
                <td>
                    <select name="Loan_Status">
                        <option value="Approve">Approve</option>
                        <option value="Pending">Pending</option>
                        <option value="Reject">Reject</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td align="right"></td>
                <td align="right">
                    <input name="Update" type="submit" id="Update" value="Update">
                    <input type="button" value="Back" onclick="window.location.href='employhome.php'">

                </td>
            </tr>
        </table>
    </form>
</div>