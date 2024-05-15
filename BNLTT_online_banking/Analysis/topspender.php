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
        font-family: 'Open Sans', sans-serif;
        font-family: 'Ubuntu', sans-serif;
        background-color: #ffffff;
    }
</style>
<?php
$con = mysqli_connect("localhost", "root", "", "online_bank");

// Check connection
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$sql = "
    SELECT 
        a.Account_ID, a.Customer_ID, c.ID_number, c.Customer_First_Name, c.Customer_Last_Name, t.Amount,
        SUM(t.Amount) AS Total_Amount, COUNT(t.Amount) AS Transaction_Count,
        AVG(t.Amount) AS Average_Amount,
        @rank := @rank + 1 AS Ranking
    FROM
        Account AS a
        INNER JOIN Customer AS c ON a.Customer_ID = c.Customer_ID
        INNER JOIN transactions AS t ON t.Account_ID = a.Account_ID
        CROSS JOIN (SELECT @rank := 0) AS r
    GROUP BY
        a.Account_ID, a.Customer_ID, c.ID_number, c.Customer_First_Name, c.Customer_Last_Name
    ORDER BY
        Average_Amount DESC
    LIMIT 10
";

// Execute the query
$result = mysqli_query($con, $sql);


if ($result) {
    
    echo "<style>
            table {
                font-family: 'Open Sans', sans-serif;
        font-family: 'Ubuntu', sans-serif;
                width: 100%;
                border-collapse: collapse;
                font-family: Arial, sans-serif;
                color: #333;
            }
            th {
                font-family: 'Open Sans', sans-serif;
        font-family: 'Ubuntu', sans-serif;
                background-color: #bb3636;
                color: white;
                border-bottom: 2px solid #ddd;
                text-align: left;
                padding: 12px;
            }
            td {

                border-bottom: 1px solid #ddd;
                padding: 8px;
            }
            tr:nth-child(even) {
                font-family: 'Open Sans', sans-serif;
        font-family: 'Ubuntu', sans-serif;
                background-color: #f9f9f9;
            }
            tr:hover {
                font-family: 'Open Sans', sans-serif;
        font-family: 'Ubuntu', sans-serif;
                background-color: #f5f5f5;
            }
            caption {
                font-family: 'Open Sans', sans-serif;
                font-family: 'Ubuntu', sans-serif;
                font-size: 1.5rem;
                font-weight: bold;
                margin-bottom: 20px;
                text-align: center;
            }
          </style>";
    echo "<table>";
    echo "<caption>Top 10 Spenders Average Amount</caption>";
    echo "<br><tr><th>Ranking</th><th>Account Number</th><th>Customer ID</th><th>ID Card</th><th>First Name</th><th>Last Name</th><th>Amount</th><th>Total Amount</th><th>Transaction Count</th><th>Average Amount</th></tr>";

    
    $rank = 1; 
    while ($row = mysqli_fetch_assoc($result)) {
        
        $accountID = $row['Account_ID'];
        $customerID = $row['Customer_ID'];
        $idCard = $row['ID_number'];
        $firstName = $row['Customer_First_Name'];
        $lastName = $row['Customer_Last_Name'];
        $amount = $row['Amount'];
        $totalAmount = $row['Total_Amount'];
        $transactionCount = $row['Transaction_Count'];
        $averageAmount = $row['Average_Amount'];

        
        echo "<tr>";
        echo "<td>$rank</td>";
        echo "<td>$accountID</td>";
        echo "<td>$customerID</td>";
        echo "<td>$idCard</td>";
        echo "<td>$firstName</td>";
        echo "<td>$lastName</td>";
        echo "<td>$amount</td>";
        echo "<td>$totalAmount</td>";
        echo "<td>$transactionCount</td>";
        echo "<td>$averageAmount</td>";
        echo "</tr>";

        $rank++; 
    }

  
    echo "</table>";

    
    mysqli_free_result($result);
} else {
    
    echo "Error executing the query: " . mysqli_error($con);
}


mysqli_close($con);
?>