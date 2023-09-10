<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
            <div class="container-registration">
                <h1>HUMAN RESOURCE MANAGEMENT SYSTEM</h1>
            </div>
        <?php
        if (isset($_POST["login"])) {
            $email = $_POST["email"];
            $password = $_POST["password"];
            require_once "database.php";
            $sql = "SELECT * FROM users WHERE email = '$email' ";
            $result = mysqli_query($conn, $sql);
            $user = mysqli_fetch_array($result, MYSQLI_ASSOC);
            if ($user) {
                if (password_verify($password, $user['password'])) {
                    session_start();
                    $_SESSION["user"] = "yes";
                    header("Location: employeeDashboard.php");
                    die();
                } else {
                    echo "<div class= 'alert alert-danger'>Password does not match!</div>";
                }
            } else {
                echo "<div class= 'alert alert-danger'>Email does not match!</div>";
            }
        }

        ?>
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
            </style>
       <form action="login.php" method="post">
            <div class="form-group">
                <style>
                    body{
                        display: flex;
                        justify-content: center;
                        align-items: center;
                        height: 100vh;
                        margin: 0;
                    }
                    .login-container{
                        text-align: center;
                    }
                    .login-form{
                        width: 300px;
                        padding: 20px;
                        border: 1px solid #ccc;
                        background-color: #f9f9f9;
                    }
                    .p {
                    margin-top: 0;
                    margin-bottom: 1rem;
                    text-align: inherit;
                    color:#fff;
                    font-weight: 600;
                     }

                </style>
                <br><br>
                <input style = "width: 300px; height:35px; border-radius: 10px;"type="email" placeholder="Enter Email: " name="email" ><br><br>
                <input style = "width: 300px; height:35px; border-radius: 10px;"type="password" placeholder="Enter Password: " name="password">
            </div>
            <div class="form-btn">
                <input class="btn btn-primary" type="submit" name="login" value="Login" style="color: black; width: 80px; height: 35px">
            </div>
            <br>
        </form>
        <div style="font-size: 20px; font-family:'Times New Roman', Times, serif;"><P>Not registered yet? <a href="registration.php">Register here</a></P></div>
    </div>
    </div>
</body>
</html>