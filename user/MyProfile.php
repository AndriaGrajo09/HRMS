<?php
    include "database.php";
?>  

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>My Profile</title>
</head>
<body>
    <!-- <div class="header"> -->
        
        <div class ="profile">
            <h1>My Profile</h1>
            <h2 style="margin-top: -100px;">Employee Information</h2>
            <p><strong>Name:</strong> John Doe</p>
            <p><strong>Employee ID:</strong> E12345</p>
            <p><strong>Department:</strong> Human Resources</p>
        <!-- Add more employee details here -->
            <br>
            <h2>Contact Information</h2>
            <p><strong>Email:</strong> john.doe@example.com</p>
            <p><strong>Phone:</strong> (123) 456-7890</p>
        <!-- Add more contact details here -->
            <br>
            <h2>Address</h2>
            <p><strong>Street:</strong> 123 Main Street</p>
            <p><strong>City:</strong> Anytown</p>
            <p><strong>State:</strong> Stateville</p>
            <p><strong>ZIP:</strong> 12345</p>
        <!-- Add more address details here -->

        <!-- You can display additional employee information as needed -->
        </div>
    
    <style>
            h1 {
                text-align: left;
                padding-bottom: 100px;
                padding-left: 100px;
                margin-left: 20px;
                position: relative;
                top: 0px;
                left: 150px;
                font-size: 40px;
                padding-top: 0px;
                color: #1e0ef3;
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
            p{
                text-align: justify;
                font-family: serif;
            }
            .sidebar {
            height: 100%;
            color: white;
            background: #333744;
            width: 250px;
            left: 0;
            position: fixed;
            top: 0;
            overflow-y: scroll;
            display: block;
            text-align: left;
            }
            .sidebar a{
            padding: 15px;
            text-decoration: none;
            font-size: 16px;
            color: #fff;
            display: block;
            transition: 0.3s;
             }


        </style>
        <div class = "sidebar">
            <br><br><p1>HUMAN RESOURCE <br>MANAGEMENT SYSTEM</p1><br><br><br>
            <img src="images/2.png" alt=""><br><br><br><br>
            <a href="employeeDashboard.php">Dashboard</a>
            <a href="Leave.php">Leave</a>
            <a href="Attendance.php">Attendance</a>
            <a href="Resignation.php">Resignation</a>
            <a href="Promotion.php">Promotion</a>
            <a href="SALN.php">SALN</a>
            <a href="logout.php">Logout</a>
        </div>
            
    </div>
    <style>
        /* Add your CSS styles for the employee profile page here */

        /* Example styles for the header */
        /*.header {
            background-color:#ccc;
            color: black;
            text-align: center;
            padding: 0px;
            position:relative;
        }
*/
        /* Example styles for the profile section */
        .profile {
            margin: 20px;
            padding: 20px;
            border: 1px solid #ccc;
            background-color: #f9f9f9;
            margin-left: 200px;
            position: relative;
            margin-bottom: 150px;
            margin-top: -150px;
        }
            
    </style>
    
</div>
<div>
        
</body>
</html>
