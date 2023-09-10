<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Dashboard - Leave Request</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1>Submit Leave Request</h1>
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


    </style>
        <div class = "sidebar">
            <br><br><br><br><br>
            <a href="Department.php">Department</a>
            <a href="Designation.php">Designation</a>
            <a href="Evaluation.php">Evaluation</a>
            <a href="Resignation.php">Resignation</a>
            <a href="Promotion.php">Promotion</a>
            <a href="SALN.php">SALN</a>
            <a href="logout.php">Logout</a>
        </div>

        <div class="content">
        <h2>Leave Request Form</h2>

             <form action="leaveController.php" method="POST" enctype="multipart/form-data">
                <label for="leaveType">Leave Type:</label>
                    <select id="leaveType" name="leaveType" required>
                        <option value="Sick Leave">Sick Leave</option>
                        <option value="Vacation">Vacation</option>
                     <!-- Add more leave types as needed -->
                    </select><br><br>

                <label for="startDate">Start Date:</label>
                     <input type="date" id="startDate" name="startDate" required><br><br>
                <label for="endDate">End Date:</label>
                     <input type="date" id="endDate" name="endDate" required> <br><br>
                <label for="leaveReason">Leave Reason:</label>
                    <textarea id="leaveReason" name="leaveReason" rows="4" required></textarea><br><br>
                <label for="attachment">Attachment (if any):</label>
                    <input type="file" id="attachment" name="attachment"><br><br>
                    <input type="submit" value="Submit Leave Request">

            </form>
        </div>
</body>
</html>