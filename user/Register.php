<?php
require_once 'database.php';

if (isset($_POST["Register"])) {
    $full_name = $_POST["full_name"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $passwordRepeat = $_POST["repeat_password"];
    $user_type = $_POST["user_type"];
    $passwordHash = password_hash($password, PASSWORD_DEFAULT);

    // Check for duplicate username or email
    $duplicate = mysqli_query($conn, "SELECT * FROM `users` WHERE full_name = '$full_name' OR email = '$email' ");

    if (mysqli_num_rows($duplicate) > 0) {
        echo "<script>alert('Username or Email has already been taken');</script>";
    } else {
        if ($password == $passwordRepeat) {
            // Use prepared statement to insert user data
            $query = "INSERT INTO users (full_name, email, password, user_type) VALUES (?, ?, ?, ?)";
            $stmt = $conn->prepare($query);
            if ($stmt) {
                $stmt->bind_param("ssss", $full_name, $email, $passwordHash, $user_type);
                if ($stmt->execute()) {
                    echo "<script>alert('Registration successful');</script>";
                } else {
                    echo "<script>alert('Registration failed');</script>";
                }
                $stmt->close();
            } else {
                echo "<script>alert('Prepare statement failed');</script>";
            }
        } else {
            echo "<script>alert('Password does not match');</script>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
            <div class="container-registration">
                <h1>HUMAN RESOURCE MANAGEMENT SYSTEM</h1>
            </div>
            <div class="log_img">
                <style>
                     body{
                    margin: 0;
                    padding: 0;
                    background-image: url("images/4.jpg");
                    background-size: cover;
                    background-position: center center;
                    min-height: 100vh;
                    display: -webkit-box;
                     } 
                     .h1, h1 {
                        font-size: calc(1.375rem + 1.5vw);
                        font-style: normal;
                        font-family: serif;
                        text-align: center;
                        text-emphasis: inherit;
                        text-shadow: 0 0 black;
                        padding-top: 300px;
                        margin-top: -200px;
                       }

                </style>
            </div>
            <form action="Register.php" method="POST">
          
                <div class="form group">
                    <br><br>
                    <input style = "width: 300px; height:35px; border-radius: 10px;"type="text"  name="full_name" placeholder="Full Name: " required = "">
                    <br><br>
                    <input style = "width: 300px; height:35px; border-radius: 10px;"type="email" name="email" placeholder="Email: " required = "">
                    <br><br>
                    <input style = "width: 300px; height:35px; border-radius: 10px;"type="password" name="password" placeholder="Password: " required = "">
                    <br><br>
                    <input style = "width: 300px; height:35px; border-radius: 10px;"type="text"  name="repeat_password" placeholder="Repeat Password: " required = "">
                    <br><br>
                    <select style = "width: 300px; height:35px; border-radius: 10px;" name="user_type"> Select user type
                        <option style = "width: 300px; height:35px; border-radius: 10px;" value="user">User</option>
                        <option style = "width: 300px; height:35px; border-radius: 10px;" value="admin">Admin</option>
                    </select>
                    <br><br>
                </div>
                <div class="form-btn">
                    <input class="btn btn-primary" type="submit" name="Register" value="Register" style="color: black; width: 80px; height: 35px;">
                </div>
            </form>
            <div><P style = "font-weight: 900; font-size: larger; color:black;">Already Registered? <a href="login.php">Login here</a></P></div>
    </div>
</body>
</html>
