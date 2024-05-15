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
        color: Black;
        text-align: center;
        padding: 14px 16px;
        text-decoration: none;
    }
    
    .navbar a:hover, .dropdown:hover .dropbtn {
        font-family: 'Open Sans', sans-serif;
        font-family: 'Ubuntu', sans-serif;
        background-color: #ffffff;
    }
  
    table {
        border-collapse: collapse;
        width: 100%;
    }
    th, td {
        font-family: 'Open Sans', sans-serif;
        font-family: 'Ubuntu', sans-serif;
        text-align: left;
        padding: 8px;
    }
    th {
        font-family: 'Open Sans', sans-serif;
        font-family: 'Ubuntu', sans-serif;
        background-color: #bb3636;
        color: white;
    }
    tr:nth-child(even) {
        font-family: 'Open Sans', sans-serif;
        font-family: 'Ubuntu', sans-serif;
        background-color: #f2f2f2;
    }
    .table-name {
        font-family: 'Open Sans', sans-serif;
        font-family: 'Ubuntu', sans-serif;
        font-weight: bold;
        margin-top: 20px;
        text-align: center;
        font-size: 24px; 
        margin-bottom: 20px;
    }
</style>

<?php
$con = mysqli_connect("localhost", "root", "", "online_bank");
// Check connection
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$query = "
    SELECT 
        ROW_NUMBER() OVER (ORDER BY subquery.Amount DESC) AS Rank,
        a.Account_ID,
        ca.customer_country AS Country,
        subquery.Amount
    FROM
        account a
        JOIN customer_address ca ON a.customer_id = ca.customer_id
        JOIN (
            SELECT t.Account_ID, SUM(t.Amount) AS Amount
            FROM transactions t
            GROUP BY t.Account_ID
        ) AS subquery ON a.Account_ID = subquery.Account_ID
    ORDER BY subquery.Amount DESC
    LIMIT 3;
";

$result = mysqli_query($con, $query);

if (!$result) {
    die('Error: ' . mysqli_error($con));
}


echo "<div class='table-name'>Top 3 Accounts by Total Transaction Amount</div>";
echo "<table>";
echo "<tr><th>Rank</th><th>Account ID</th><th>Country</th><th>Amount</th></tr>";
while ($row = mysqli_fetch_assoc($result)) {
    echo "<tr>";
    echo "<td>" . $row['Rank'] . "</td>";
    echo "<td>" . $row['Account_ID'] . "</td>";
    echo "<td>" . $row['Country'] . "</td>";
    echo "<td>" . $row['Amount'] . "</td>";
    echo "</tr>";
}
echo "</table>";

mysqli_close($con);
?>
