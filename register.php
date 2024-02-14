<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);

include('bsaura/connection.php');
include('bsaura/function.php');

if (isset($_POST["register"])) {
    $idNum = $_POST["id_num"];
    $password = $_POST["password"];
    $email = $_POST["email"];

    $usertype = 'user';
    $user_id = random_num(40);


    $check_query = mysqli_query($connection, "SELECT * FROM user_tbl where email ='$email'");

    // Check for query execution errors
    if (!$check_query) {
?>
        <script>
            alert("Query failed: <?php echo mysqli_error($connection); ?>");
        </script>
<?php
    } else {
        $rowCount = mysqli_num_rows($check_query);

        if (!empty($idNum) && !empty($email) && !empty($password)) {
            if ($rowCount > 0) {
?>
                <script>
                    alert("User with email already exists!");
                </script>
<?php
            } else {
                $password_hash = password_hash($password, PASSWORD_BCRYPT);

                $insert_query = "INSERT INTO user_tbl (user_id, id_num, email, password, status, user_type) VALUES ('$user_id', '$idNum', '$email', '$password_hash', 0, '$usertype')";

                // Execute the query and check for errors
                $result = mysqli_query($connection, $insert_query);

                if (!$result) {
?>
                    <script>
                        alert("Insert query failed: <?php echo mysqli_error($connection); ?>");
                    </script>
<?php
                } else {
                    $otp = rand(100000, 999999);
                    $_SESSION['otp'] = $otp;
                    $_SESSION['mail'] = $email;

                    require "Mail/phpmailer/PHPMailerAutoload.php";
                    $mail = new PHPMailer;

                    $mail->isSMTP();
                    $mail->Host = 'smtp.gmail.com';
                    $mail->Port = 587;
                    $mail->SMTPAuth = true;
                    $mail->SMTPSecure = 'tls';

                    $mail->Username = 'bascruminant@gmail.com';
                    $mail->Password = 'vymg zsth qvgq pkoa';

                    $mail->setFrom('bascruminant@gmail.com', 'OTP Verification');
                    $mail->addAddress($_POST["email"]);

                    $mail->isHTML(true);
                    $mail->Subject = "Your verify code";
                    $mail->Body = "<p>Dear $email, </p> <h3>Your verify OTP code is $otp <br></h3>
                        <br>dont share this code<br>
                        <p>Thank you for trusting,</p>
                        <b> $email for </b>
                        https://bascruminant.online/bsaura/webpage.php";

                    if (!$mail->send()) {
?>
                        <script>
                            alert("Register Failed, Invalid Email");
                        </script>
<?php
                    } else {
?>
                        <script>
                            alert("Register Successfully, OTP sent to <?php echo $email; ?>");
                            window.location.replace('verification.php');
                        </script>
<?php
                    }
                }
            }
        }
    }
}

// Close the database connection
mysqli_close($connection);
?>


<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" />
<!------ Include the above in your HEAD tag ---------->
<!doctype html>
<html lang="en">
<head>
    <link rel="icon" href="bsaura/wimg/CA.png" type="image/x-icon">
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">
    <link rel="icon" href="Favicon.png">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="register.css">
    <title>Register Form</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light navbar-laravel">
        <div class="container">
            <div class="logo">
                <a href="index.php"><img src="bsaura/wimg\logo.png" alt="logo" class="logoimg"><img src="bsaura/wimg\CA.png" alt="logo" class="calogoi"></a>
            </div>
            <a class="navbar-brand" href="register.php" style="color:white; font-size: 30px;"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php" style="color:white;">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="register.php" style="font-weight:bold; color:black; text-decoration:underline; color:white;">Register</a>
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
                        <div class="card-header">Register</div>
                        <div class="card-body">
                            <form action="#" method="POST" name="register">
                            <div class="image-container">
                                <a href="register.php"><img src="bsaura/wimg/CA.png" style="width:20%;height:30%;z-index:1; "></a>
                            </div>
                                <div class="form-group row">
                                    <label for="id_num" class="col-md-4 col-form-label text-md-right">ID Number :</label>
                                    <div class="col-md-6">
                                        <input type="text" id="id_num" class="form-control" name="id_num" placeholder="Enter your Student Number" required>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="email_address" class="col-md-4 col-form-label text-md-right">E-Mail Address :</label>
                                    <div class="col-md-6">
                                        <input type="text" id="email_address" class="form-control" name="email" placeholder="Enter Your email account" required autofocus>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="password" class="col-md-4 col-form-label text-md-right">Password :</label>
                                    <div class="col-md-6">
                                        <input type="password" id="password" class="form-control" name="password" placeholder="Enter your password" required>
                                        <button class="eye" type="button" id="togglePassword" onclick="togglePasswordVisibility()">
                                        <i class="bi bi-eye-slash"></i>
                                    </button>
                                    </div>
                                </div>
                                <div class="col-md-6 offset-md-4">
                                    <input type="submit" value="Register" name="register">
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
            document.addEventListener("DOMContentLoaded", function () {
            var studentNumberInput = document.getElementById("id_num");

            studentNumberInput.addEventListener("input", function () {
                var inputValue = this.value;
                // Replace any non-numeric characters with an empty string
                var numericValue = inputValue.replace(/[^0-9]/g, '');
                // Update the input value with the numeric-only value
                this.value = numericValue;
            });
        });

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
