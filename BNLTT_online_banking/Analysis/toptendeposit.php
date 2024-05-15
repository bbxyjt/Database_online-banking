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

    /* Links inside the navbar */
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
    /* Add a red background color to navbar links on hover */
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

// Retrieve data from the database
$sql = "
    SELECT C.Customer_First_Name, C.Customer_Last_Name, A.Account_ID, A.Account_Number, A.Account_type, IFNULL(CD.Card_Number, ' ') AS Card_Number, A.Balance
    FROM Customer AS C
    INNER JOIN Account AS A ON C.Customer_ID = A.Customer_ID
    LEFT JOIN Card AS CD ON A.Account_ID = CD.Account_ID
    ORDER BY A.Balance DESC
    LIMIT 10
";


// Execute the query
$result = mysqli_query($con, $sql);

// Check if the query executed successfully
if ($result) {
    // Start the table markup with enhanced CSS styles
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
                font-family: 'Open Sans', sans-serif;
        font-family: 'Ubuntu', sans-serif;
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
    //echo "<br>"; // Add a line break for spacing
    echo "<table>";
    echo "<caption>Top 10 Balance Users</caption>";
    echo "<br><tr><th>First Name</th><th>Last Name</th><th>Account ID</th><th>Account Number</th><th>Account Type</th><th>Card Number</th><th>Balance</th></tr>";

    // Fetch the rows from the result set
    while ($row = mysqli_fetch_assoc($result)) {
        // Access the values from each row
        $firstName = $row['Customer_First_Name'];
        $lastName = $row['Customer_Last_Name'];
        $accountID = $row['Account_ID'];
        $accountNumber = $row['Account_Number'];
        $accountType = $row['Account_type'];
        $cardNumber = $row['Card_Number'];
        $balance = $row['Balance'];

        // Add a new row to the table
        echo "<tr>";
        echo "<td>$firstName</td>";
        echo "<td>$lastName</td>";
        echo "<td>$accountID</td>";
        echo "<td>$accountNumber</td>";
        echo "<td>$accountType</td>";
        echo "<td>$cardNumber</td>";
        echo "<td>$balance</td>";
        echo "</tr>";
    }

    // End the table markup
    echo "</table>";

    // Free the result set
    mysqli_free_result($result);
} else {
    // Handle the case where the query execution failed
    echo "Error executing the query: " . mysqli_error($con);
}

// Close the database connection
mysqli_close($con);
?>