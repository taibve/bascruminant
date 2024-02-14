<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include('bsaura/connection.php');

session_start(); // Start the session at the beginning of the script

if (isset($_POST["login"])) {
    $identifier = mysqli_real_escape_string($connection, trim($_POST['email']));
    $password = trim($_POST['password']);

    $stmt = mysqli_prepare($connection, "SELECT * FROM user_tbl WHERE email = ? OR id_num = ?");
    mysqli_stmt_bind_param($stmt, "ss", $identifier, $identifier);
    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($result)) {
        $hashpassword = $row["password"];
        $usertype = $row["user_type"];

        if ($row["status"] == 0) {
            echo "<script>alert('Please verify email account before login.');</script>";
        } else if (password_verify($password, $hashpassword)) {
            $_SESSION['user_id'] = $row['user_id'];
            
            // Check user type and redirect accordingly
            if ($usertype == 'admin' || $usertype == 'personnel' || $usertype == 'vetmed') {
                echo "<script>alert('Login successful'); window.location.replace('bsaura/dashboard.php');</script>";
            } else {
                echo "<script>alert('Login successful'); window.location.replace('bsaura/webpage.php');</script>";
            }
        } else {
            echo "<script>alert('Email or password invalid, please try again.');</script>";
        }
    } else {
        echo "<script>alert('User not found. Please check your email or ID number.');</script>";
    }

    mysqli_stmt_close($stmt);
}

if (isset($_POST["register"])) {
    $idNum = $_POST["id_num"];
    $password = $_POST["password"];
    $email = $_POST["email"];
    $status = 1;
    $usertype = "default";

    $check_query = mysqli_query($connection, "SELECT * FROM user_tbl WHERE email = '$email'");

    if (!$check_query) {
        echo "<script>alert('Query failed: " . mysqli_error($connection) . "');</script>";
    } else {
        $rowCount = mysqli_num_rows($check_query);

        if (!empty($idNum) && !empty($email) && !empty($password)) {
            if ($rowCount > 0) {
                echo "<script>alert('User with email already exists!');</script>";
            } else {
                $password_hash = password_hash($password, PASSWORD_BCRYPT);

                $insert_query = "INSERT INTO user_tbl (user_id, id_num, email, password, status, user_type) VALUES (NULL, '$idNum', '$email', '$password_hash', $status, '$usertype')";

                $result = mysqli_query($connection, $insert_query);

                if (!$result) {
                    echo "<script>alert('Insert query failed: " . mysqli_error($connection) . "');</script>";
                } else {
                    $otp = rand(100000, 999999);

                    echo "<script>alert('Register Successfully, OTP sent to $email'); window.location.replace('verification.php');</script>";
                }
            }
        }
    }
}
?>
<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="bsaura/wimg/CA.png" type="image/x-icon">
    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" />
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="icon" href="Favicon.png">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="login.css">
    <title>Login Form</title>
</head>
<nav class="navbar navbar-expand-lg navbar-light navbar-laravel">
    <div class="container">
        <div class="logo">
            <a href="index.php"><img src="bsaura/wimg\logo.png" alt="logo" class="logoimg"><img src="bsaura/wimg\CA.png" alt="logo" class="calogoi"></a>
        </div>
        <a class="navbar-brand" href="index.php" style="color:white;"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="index.php" style="font-weight:bold; color:white; text-decoration:underline; color:white;">Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="register.php" style="color:white; text-decoration:none;">Register</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<main class="login-form"> 
    <div class="cotainer">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Login</div>
                    <div class="card-body">
                        <form action="#" method="POST" name="login">
                        <div class="image-container">
                                <a href="index.php"><img src="bsaura/wimg/CA.png" style="width:20%;height:35%;z-index:1; "></a>
                            </div>
                            <div class="form-group row">
                                <label for="email_address" class="col-md-4 col-form-label text-md-right">Student ID: </label>
                                <div class="col-md-6">
                                    <input type="text" id="email_address" class="form-control" name="email" placeholder="Enter Student ID or Email" required autofocus>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">Password: </label>
                                <div class="col-md-6">
                                    <input type="password" id="password" class="form-control" name="password" placeholder="Enter Password" required>
                                    <button class="eye" type="button" id="togglePassword" onclick="togglePasswordVisibility()">
                                        <i class="bi bi-eye-slash"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-6 offset-md-4">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="remember"> Remember Me
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6 offset-md-4">
                                <input type="submit" value="Login" name="login">
                                <a href="recover_psw.php" class="btn btn-link">
                                    Forgot Your Password?
                                </a>
                            </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>

</main>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</body>
</html>
<script>
    const toggle = document.getElementById('togglePassword');
    const password = document.getElementById('password');

    toggle.addEventListener('click', function(){
        if(password.type === "password"){
            password.type = 'text';
            this.querySelector('i').classList.remove('bi-eye-slash');
            this.querySelector('i').classList.add('bi-eye');
        } else {
            password.type = 'password';
            this.querySelector('i').classList.remove('bi-eye');
            this.querySelector('i').classList.add('bi-eye-slash');
        }
    });
</script>
