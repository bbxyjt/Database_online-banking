<div class="navbar">
  <a href="AnalysisReport.php">Analysis Report</a>
  <a href="toptendeposit.php">Highest Balance</a>
  <a href="Topspender.php">Average Transaction Amount</a>
  <a href="SuspendedAnalysis.php">Suspended Account</a>
  <a href="Top3country.php">Highest Total Transaction Amount</a>
  <a href="Top3branches.php">Branches with Highest Card Count</a>
</div>

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;500;600;700;800&family=Ubuntu:ital,wght@0,300;1,300&display=swap" rel="stylesheet">

<style>
    .navbar {
        font-family: 'Open Sans', sans-serif;
        font-family: 'Ubuntu', sans-serif;
        overflow: hidden;
        background-color: #bb3636;
        font-family: Arial;
    }

    
    .navbar a {
        font-family: 'Open Sans', sans-serif;
        font-family: 'Ubuntu', sans-serif;
        float: left;
        font-size: 16px;
        color: black;
        text-align: center;
        padding: 14px 16px;
        text-decoration: none;
    }
    
    .navbar a:hover, .dropdown:hover .dropbtn {
        background-color: #ffffff;
    }
</style>

<?php
$con = mysqli_connect("localhost", "root", "", "online_bank");

// Check connection
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$sql = "SELECT Account.Account_ID, Account.Customer_ID, Account.Account_Number, Account.Account_Type, 
        COUNT(Card.Card_ID) AS Card_Count, Customer.Customer_First_Name, Customer.Customer_Last_Name, Card.Card_Type, Account.Account_Status
        FROM Account
        INNER JOIN Customer ON Account.Customer_ID = Customer.Customer_ID
        LEFT JOIN Card ON Account.Account_ID = Card.Account_ID
        WHERE Account.Account_Status = 'Suspended'
        GROUP BY Account.Account_ID";

$result = mysqli_query($con, $sql);

if ($result) {
    if (mysqli_num_rows($result) > 0) {
        echo "<style>
                table {
                    font-family: 'Open Sans', sans-serif;
                    font-family: 'Ubuntu', sans-serif;
                    border-collapse: collapse;
                    width: 100%;
                    margin: 0 auto;
                }
                th, td {
                    font-family: 'Open Sans', sans-serif;
                    font-family: 'Ubuntu', sans-serif;
                    border: 1px solid #ddd;
                    padding: 8px;
                    text-align: center;
                }
                th {
                    font-family: 'Open Sans', sans-serif;
                    font-family: 'Ubuntu', sans-serif;
                    background-color: #bb3636;
                    color: white;
                }
                h2 {
                    font-family: 'Open Sans', sans-serif;
                    font-family: 'Ubuntu', sans-serif;
                    text-align: center;
                }
              </style>";

        echo "<h2>People with Suspended Account</h2>";
        echo "<table>";
        echo "<tr><th>Customer ID</th><th>First Name</th><th>Last Name</th><th>Account ID</th><th>Account Number</th><th>Type Of Account</th><th>Number of Own Cards</th><th>Type of Own Cards</th><th>Status</th></tr>";
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $row['Customer_ID'] . "</td>";
            echo "<td>" . $row['Customer_First_Name'] . "</td>";
            echo "<td>" . $row['Customer_Last_Name'] . "</td>";
            echo "<td>" . $row['Account_ID'] . "</td>";
            echo "<td>" . $row['Account_Number'] . "</td>";
            echo "<td>" . $row['Account_Type'] . "</td>";
            echo "<td>" . $row['Card_Count'] . "</td>";
            echo "<td>" . $row['Card_Type'] . "</td>";
            echo "<td>" . $row['Account_Status'] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "<h2>No records found.</h2>";
    }
} else {
    echo "<h2>Error: " . mysqli_error($con) . "</h2>";
}

mysqli_close($con);
?>