<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);

if (isset($_POST["reset"])) {
    include('bsaura/connection.php');
    $newPassword = $_POST["password"];

    // Get email from the session
    $email = $_SESSION['email'];

    // Proceed with password change

    // Hash the new password
    $hash = password_hash($newPassword, PASSWORD_DEFAULT);

    // Update the password in the database
    $updateQuery = mysqli_query($connection, "UPDATE user_tbl SET password='$hash' WHERE email='$email'");

    if ($updateQuery) {
        ?>
        <script>
            alert("<?php echo "Your password has been successfully reset." ?>");
            window.location.replace("index.php");
        </script>
        <?php
        exit;
    } else {
        ?>
        <script>
            alert("<?php echo "Please try again." ?>");
        </script>
        <?php
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="bsaura/wimg/CA.png" type="image/x-icon">
    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

    <link rel="stylesheet" href="style.css">

    <link rel="icon" href="Favicon.png">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" />
    <link rel="stylesheet" href="login.css">

    <style>
        body {
            background-color: white;
            background-image: url('bsaura/bascimg/login.png');
            color: #ffffff;
            font-family: 'Raleway', sans-serif;
        }

        .california-image img {
            width: 200%;
            height: 200%;
        }

        .navbar-laravel {
            background-color: #e9ecef; /* Adjust navbar background color */
        }

        .navbar-brand {
            color: #343a40; /* Adjust navbar brand color */
            font-size: 1.5rem;
            font-weight: 600;
        }

        .navbar-toggler-icon {
            border-color: #343a40; /* Adjust navbar toggle icon color */
        }

        .login-form {
            margin-top: 50px;
        }

        .card-header {
            background-color: #12694f; /* Adjust card header background color */
            color: #fff; /* Adjust card header text color */
            font-size: 1.25rem;
            font-weight: 600;
            text-align: center;
        }

        .card-body {
            padding: 20px;
        }

        label {
            color:black;
            font-weight: 600;
        }

        #password {
            margin-bottom: 15px;
        }

        #togglePassword {
            cursor: pointer;
        }

        input[type="submit"] {
            background-color: #12694f; /* Adjust submit button background color */
            color: #fff; /* Adjust submit button text color */
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #12694f;; /* Adjust submit button hover background color */
        }
    </style>

    <title>Login Form</title>
</head>
<body>
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
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Reset Your Password</div>
                    <div class="card-body">
                        <form action="" method="POST" name="login">

                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">New Password</label>
                                <div class="col-md-6">
                                    <input type="password" id="password" class="form-control" name="password" placeholder="Enter New Password" required autofocus>
                                    <i class="bi bi-eye-slash" id="togglePassword"></i>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-6 offset-md-4">
                                    <input type="submit" value="Reset" name="reset">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<script>
    const toggle = document.getElementById('togglePassword');
    const password = document.getElementById('password');

    toggle.addEventListener('click', function(){
        if(password.type === "password"){
            password.type = 'text';
        }else{
            password.type = 'password';
        }
        this.classList.toggle('bi-eye');
    });
</script>

</body>
</html>
