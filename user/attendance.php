
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Dashboard - Attendance</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1>Attendance</h1>
    </header>
    <style>
            h1 {
                text-align: left;
                padding-bottom: 1000px;
                padding-left: 100px;
                margin-left: 20px;
                margin-top: 20px;
                position: fixed;
                display: block;
                top: 0px;
                left: 150px;
                font-size: 25px;
            }
            body {
                text-align: center;
                margin: 0;
                padding: 200px;
                font-family: var(--bs-font-sans-serif);
                font-size: 1rem;
                font-weight: 400;
                color: #212529;
                background-color: #fff;
                font-family: math;
            }
            img{
                position: absolute;
                top: 0;
                left: 0;
                height: 150px;
                border-radius: 50%;
                padding-top: 20px;
                padding-left: 45px;
                margin-top: 25px;
            }
            p1{
                text-align: center;
                padding-bottom: 1000px;
                padding-left: 0px;
                margin-left: 35px;
                margin-top: 10px;
                position: fixed;
                display: block;
                font-family: serif;
                top: 0px;
                left: 0px;
                font-size: 15px;
            }
    </style>
        <div class = "sidebar">
            <br><br><p1>HUMAN RESOURCE <br>MANAGEMENT SYSTEM</p1><br><br><br>
            <img src="images/2.png" alt=""><br><br>
            <a href="employeeDashboard.php">Dashboard</a>
            <a href="MyProfile.php">My Profile</a>
            <a href="Leave.php">Leave</a>
            <a href="Resignation.php">Resignation</a>
            <a href="Promotion.php">Promotion</a>
            <a href="SALN.php">SALN</a>
            <a href="logout.php">Logout</a>
        </div>

        <form method="post">
        <label for="report_date">Select Report Date:</label>
        <select name="report_date" id="report_date">
            <!-- PHP code to populate dropdown options will go here -->
            <?php
                // Establish a database connection (include your database connection code)
                require_once 'database.php';
                // Query to fetch unique report dates from the database
                $query = "SELECT DISTINCT report_date FROM attendance_reports";
                $result = mysqli_query($conn, $query);

                // Populate the dropdown menu with report dates
                echo '<option value="">Select a Date</option>';
                while ($row = mysqli_fetch_assoc($result)) {
                    echo '<option value="' . $row['report_date'] . '">' . $row['report_date'] . '</option>';
                }

                // Close the database connection
                mysqli_close($conn);
                ?>
        </select>
        <button type="submit" name="view_report">View Report</button>
    </form>
    <hr>
    <div id="report_display">
        <!-- PHP code to display the selected report will go here -->
        <?php
            if (isset($_POST['view_report'])) {
                // Get the selected report date from the form
                $selectedDate = $_POST['report_date'];

                // Establish a database connection (include your database connection code)

                // Query to fetch the report for the selected date
                $query = "SELECT report_content FROM attendance_reports WHERE report_date = ?";
                $stmt = mysqli_prepare($conn, $query);
                mysqli_stmt_bind_param($stmt, "s", $selectedDate);
                mysqli_stmt_execute($stmt);
                mysqli_stmt_bind_result($stmt, $reportContent);
                mysqli_stmt_fetch($stmt);

                // Display the selected report
                echo '<h2>Report for ' . $selectedDate . '</h2>';
                echo '<pre>' . $reportContent . '</pre>';

                // Close the statement and the database connection
                mysqli_stmt_close($stmt);
                mysqli_close($conn);
}
?>
    </div>
</body>
</html>