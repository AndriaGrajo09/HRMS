<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Dashboard - SALN</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>SALN</h1>
        <div class = "sidebar">
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
                padding-top: 10px;
                padding-left: 45px;
            }


        </style>
            <br><br><br><br><br>
            <img src="images/2.png" alt=""><br>
            <a href="Department.php">Department</a>
            <a href="Designation.php">Designation</a>
            <a href="Leave.php">Leave</a>
            <a href="Evaluation.php">Evaluation</a>
            <a href="Resignation.php">Resignation</a>
            <a href="Promotion.php">Promotion</a>
            <a href="logout.php">Logout</a>
        </div>

        <div class="content">
            <h2>Statement of Assets Liabilities and Net worth Form</h2>
            <div><P>Submit SALN form? <a href="salnSubmitForm.php">Submit here</a></P></div>
        </div>
</body>
</html>