<!DOCTYPE html>
<html>
<head>
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
            background-color: #f2f2f2;
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

        /* Add the background color to the first row */
        .styled-table thead tr:first-child th {
            color: white;
            background-color: #bb3636;
        }
    </style>
</head>
<body>
    <div class="navbar">
        <a href="AnalysisReport.php">Analysis Report</a>
        <a href="toptendeposit.php">Highest Balance</a>
        <a href="Topspender.php">Average Transaction Amount</a>
        <a href="SuspendedAnalysis.php">Suspended Account</a>
        <a href="Top3country.php">Highest Total Transaction Amount</a>
        <a href="Top3branches.php">Branches with Highest Card Count</a>
    </div>

    <?php
        $con = mysqli_connect("localhost", "root", "", "online_bank");

        if (mysqli_connect_errno()) {
            echo "Failed to connect to MySQL: " . mysqli_connect_error();
        }

        $sql = "SELECT a.Branch_ID, COUNT(*) AS Card_Count, AVG(a.Balance) AS Average_Balance
                FROM Card c
                INNER JOIN Account a ON c.Account_ID = a.Account_ID
                WHERE c.Card_Status = 'Active'
                GROUP BY a.Branch_ID
                ORDER BY Card_Count DESC
                LIMIT 3";

        $result = mysqli_query($con, $sql);

        if ($result) {
            if (mysqli_num_rows($result) > 0) {
                echo "<h2 class='table-title'>Top 3 Branches with Most Active Cards</h2>";
                echo "<table class='styled-table'>";
                echo "<thead><tr><th>Rank</th><th>Branch</th><th>Amount of Card</th><th>Account</th><th>Average Balance</th></tr></thead>";
                echo "<tbody>";

                $rank = 1;

                while ($row = mysqli_fetch_assoc($result)) {
                    $branchID = $row['Branch_ID'];
                    $cardCount = $row['Card_Count'];
                    $averageBalance = $row['Average_Balance'];

                    echo "<tr>";
                    echo "<td>" . $rank . "</td>";
                    echo "<td>" . $branchID . "</td>";
                    echo "<td>" . $cardCount . "</td>";
                    echo "<td>";

                    $accountQuery = mysqli_query($con, "SELECT Account_ID FROM Account WHERE Branch_ID = '$branchID'");

                    if ($accountQuery) {
                        $accountIDs = array();
                        while ($accountRow = mysqli_fetch_assoc($accountQuery)) {
                            $accountIDs[] = $accountRow['Account_ID'];
                        }
                        echo implode(", ", $accountIDs);
                    } else {
                        echo "No accounts found.";
                    }

                    echo "</td>";
                    echo "<td>" . $averageBalance . "</td>";
                    echo "</tr>";

                    $rank++;
                }

                echo "</tbody>";
                echo "</table>";
            } else {
                echo "No records found.";
            }
        } else {
            echo "Error: " . mysqli_error($con);
        }

        mysqli_close($con);
    ?>
</body>
</html>
