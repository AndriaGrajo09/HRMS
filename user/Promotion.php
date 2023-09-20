<?php
    include "database.php";
?>  

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Dashboard - Promotion</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1>Promotion</h1>
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
            <a href="Attendance.php">Attendance</a>
            <a href="Resignation.php">Resignation</a>
            <a href="SALN.php">SALN</a>
            <a href="logout.php">Logout</a>
        </div>

        <div class="content">
       
                <h2>Promotion Request Form</h2>

                <form action="PromotionProcess.php" method="POST" enctype="multipart/form-data">
                    <label for="employee_name">Employee Name:</label>
                    <input type="text" id="employee_name" name="employee_name" required>
                    <br><br>

                    <label for="current_designation">Current Designation:</label>
                    <input type="text" id="current_designation" name="current_designation" required>
                    <br><br>

                    <label for="submission_date">Submission Date:</label>
                    <input type="date" id="submission_date" name="submission_date" required = "">
                    <br><br>

                    <label for="attachment">Attachment (if any):</label>
                    <input type="file" id="attachment" name="attachment">
                    <br><br>

                    <div class="form-btn">
                    <input class="btn btn-primary" type="submit" name="Submit" value="Submit" style="color: black; width: 80px; height: 35px;">
                    </div>
                </form>
        </div>
</body>
</html>