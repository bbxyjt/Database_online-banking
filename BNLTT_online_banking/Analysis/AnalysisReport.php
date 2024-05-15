<?php
$con = mysqli_connect("localhost", "root", "", "online_bank");
// Check connection
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

// Query #1
$sql1 = "
    SELECT C.Customer_First_Name, C.Customer_Last_Name, A.Account_ID, A.Account_Number, A.Account_type, IFNULL(CD.Card_Number, ' ') AS Card_Number, A.Balance
    FROM Customer AS C
    INNER JOIN Account AS A ON C.Customer_ID = A.Customer_ID
    LEFT JOIN Card AS CD ON A.Account_ID = CD.Account_ID
    ORDER BY A.Balance DESC
    LIMIT 10
";

// Execute query #1
$result1 = mysqli_query($con, $sql1);

// Query #2
$sql2 = "
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

// Execute query #2
$result2 = mysqli_query($con, $sql2);

// Query #3
$sql3 = "SELECT Account.Account_ID, Account.Customer_ID, Account.Account_Number, Account.Account_Type, 
        COUNT(Card.Card_ID) AS Card_Count, Customer.Customer_First_Name, Customer.Customer_Last_Name, Card.Card_Type, Account.Account_Status
        FROM Account
        INNER JOIN Customer ON Account.Customer_ID = Customer.Customer_ID
        LEFT JOIN Card ON Account.Account_ID = Card.Account_ID
        WHERE Account.Account_Status = 'Suspended'
        GROUP BY Account.Account_ID";

// Execute query #3
$result3 = mysqli_query($con, $sql3);

// Query #4
$sql4 = "
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

// Execute query #4
$result4 = mysqli_query($con, $sql4);

// Query #5
$sql5 = "SELECT a.Branch_ID, COUNT(*) AS Card_Count, AVG(a.Balance) AS Average_Balance
        FROM Card c
        INNER JOIN Account a ON c.Account_ID = a.Account_ID
        WHERE c.Card_Status = 'Active'
        GROUP BY a.Branch_ID
        ORDER BY Card_Count DESC
        LIMIT 3";

// Execute query #5
$result5 = mysqli_query($con, $sql5);

?>


<link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;500;600;700;800&family=Ubuntu:ital,wght@0,300;1,300&display=swap" rel="stylesheet">

<style>
    .styled-table {
        font-family: 'Open Sans', sans-serif;
      font-family: 'Ubuntu', sans-serif;
        width: 100%;
        border-collapse: collapse;
    }
    .styled-table th,
    .styled-table td {
        font-family: 'Open Sans', sans-serif;
      font-family: 'Ubuntu', sans-serif;
        padding: 8px;
        text-align: center;
        border-bottom: 1px solid #ddd;
    }
    .styled-table th {
        font-family: 'Open Sans', sans-serif;
      font-family: 'Ubuntu', sans-serif;
        background-color: #bb3636;
        color: white;
    }
    .styled-table tbody tr:nth-child(even) {
        font-family: 'Open Sans', sans-serif;
      font-family: 'Ubuntu', sans-serif;
        background-color: #f9f9f9;
    }
    .styled-table tbody tr:last-child td {
        font-family: 'Open Sans', sans-serif;
      font-family: 'Ubuntu', sans-serif;
        border-bottom: none;
    }
    .table-title {
        font-family: 'Open Sans', sans-serif;
      font-family: 'Ubuntu', sans-serif;
        text-align: center;
    }
    .back-button {
        font-family: 'Open Sans', sans-serif;
      font-family: 'Ubuntu', sans-serif;
        background-color: #bb3636;
        color: #fff;
        border: none;
        padding: 10px 20px;
        border-radius: 4px;
        cursor: pointer;
    }
    /* Navbar container */
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
        font-family: 'Open Sans', sans-serif;
      font-family: 'Ubuntu', sans-serif;
      background-color: #ffffff
    }
</style>


<!-- Query #1: Top 10 Accounts with Highest Balance -->
<div class="navbar">
    <a href="AnalysisReport.php">Analysis Report</a>
    <a href="toptendeposit.php">Highest Balance</a>
    <a href="Topspender.php">Average Transaction Amount</a>
    <a href="SuspendedAnalysis.php">Suspended Account</a>
    <a href="Top3country.php">Highest Total Transaction Amount</a>
    <a href="Top3branches.php">Branches with Highest Card Count</a>
</div>

<?php if ($result1 && mysqli_num_rows($result1) > 0): ?>
    <h2 class="table-title">Top 10 Accounts with Highest Balance</h2>
    <table class="styled-table">
        <thead>
            <tr>
                <th>Customer Name</th>
                <th>Account ID</th>
                <th>Account Number</th>
                <th>Account Type</th>
                <th>Card Number</th>
                <th>Balance</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row1 = mysqli_fetch_assoc($result1)): ?>
                <tr>
                    <td><?php echo $row1['Customer_First_Name'] . ' ' . $row1['Customer_Last_Name']; ?></td>
                    <td><?php echo $row1['Account_ID']; ?></td>
                    <td><?php echo $row1['Account_Number']; ?></td>
                    <td><?php echo $row1['Account_type']; ?></td>
                    <td><?php echo $row1['Card_Number']; ?></td>
                    <td><?php echo $row1['Balance']; ?></td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
<?php else: ?>
    <p>No records found.</p>
<?php endif; ?>

<!-- Query #2: Top 10 Customers with Highest Average Transaction Amount -->
<?php if ($result2 && mysqli_num_rows($result2) > 0): ?>
    <h2 class="table-title">Top 10 Customers with Highest Average Transaction Amount</h2>
    <table class="styled-table">
        <thead>
            <tr>
                <th>Ranking</th>
                <th>Account ID</th>
                <th>Customer ID</th>
                <th>ID Number</th>
                <th>Customer Name</th>
                <th>Total Amount</th>
                <th>Transaction Count</th>
                <th>Average Amount</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row2 = mysqli_fetch_assoc($result2)): ?>
                <tr>
                    <td><?php echo $row2['Ranking']; ?></td>
                    <td><?php echo $row2['Account_ID']; ?></td>
                    <td><?php echo $row2['Customer_ID']; ?></td>
                    <td><?php echo $row2['ID_number']; ?></td>
                    <td><?php echo $row2['Customer_First_Name'] . ' ' . $row2['Customer_Last_Name']; ?></td>
                    <td><?php echo $row2['Total_Amount']; ?></td>
                    <td><?php echo $row2['Transaction_Count']; ?></td>
                    <td><?php echo $row2['Average_Amount']; ?></td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
<?php else: ?>
    <p>No records found.</p>
<?php endif; ?>

<!-- Query #3: Accounts with Suspended Status -->
<?php if ($result3 && mysqli_num_rows($result3) > 0): ?>
    <h2 class="table-title">Accounts with Suspended Status</h2>
    <table class="styled-table">
        <thead>
            <tr>
                <th>Account ID</th>
                <th>Customer ID</th>
                <th>Account Number</th>
                <th>Account Type</th>
                <th>Card Count</th>
                <th>Customer Name</th>
                <th>Card Type</th>
                <th>Account Status</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row3 = mysqli_fetch_assoc($result3)): ?>
                <tr>
                    <td><?php echo $row3['Account_ID']; ?></td>
                    <td><?php echo $row3['Customer_ID']; ?></td>
                    <td><?php echo $row3['Account_Number']; ?></td>
                    <td><?php echo $row3['Account_Type']; ?></td>
                    <td><?php echo $row3['Card_Count']; ?></td>
                    <td><?php echo $row3['Customer_First_Name'] . ' ' . $row3['Customer_Last_Name']; ?></td>
                    <td><?php echo $row3['Card_Type']; ?></td>
                    <td><?php echo $row3['Account_Status']; ?></td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
<?php else: ?>
    <p>No records found.</p>
<?php endif; ?>

<!-- Query #4: Top 3 Accounts with Highest Total Transaction Amount by Country -->
<?php if ($result4 && mysqli_num_rows($result4) > 0): ?>
    <h2 class="table-title">Top 3 Accounts with Highest Total Transaction Amount by Country</h2>
    <table class="styled-table">
        <thead>
            <tr>
                <th>Rank</th>
                <th>Account ID</th>
                <th>Country</th>
                <th>Total Amount</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row4 = mysqli_fetch_assoc($result4)): ?>
                <tr>
                    <td><?php echo $row4['Rank']; ?></td>
                    <td><?php echo $row4['Account_ID']; ?></td>
                    <td><?php echo $row4['Country']; ?></td>
                    <td><?php echo $row4['Amount']; ?></td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
<?php else: ?>
    <p>No records found.</p>
<?php endif; ?>

<!-- Query #5: Top 3 Branches with Highest Card Count and Average Balance -->
<?php if ($result5 && mysqli_num_rows($result5) > 0): ?>
    <h2 class="table-title">Top 3 Branches with Highest Card Count and Average Balance</h2>
    <table class="styled-table">
        <thead>
            <tr>
                <th>Branch ID</th>
                <th>Card Count</th>
                <th>Average Balance</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row5 = mysqli_fetch_assoc($result5)): ?>
                <tr>
                    <td><?php echo $row5['Branch_ID']; ?></td>
                    <td><?php echo $row5['Card_Count']; ?></td>
                    <td><?php echo $row5['Average_Balance']; ?></td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
<?php else: ?>
    <p>No records found.</p>
<?php endif; ?>

<div class="back-button-container">
  <input type="button" value="Back" onclick="window.location.href='/BNLTT_online_banking/employhome.php'" class="back-button">
</div>


<?php mysqli_close($con); ?>