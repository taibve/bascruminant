<?php session_start() ?>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

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

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="login.css">
    <style>
        body {
            background-color: white;
            background-image: url('bsaura/bascimg/login.png');
            color: black;
            font-family: 'Raleway', sans-serif;
        }

        .navbar {
            background-color: #e9ecef; /* Adjust navbar background color */
        }

        .login-form {
            margin-top: 50px;
        }

        .card {
            border: none;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .card-header {
            background-color: #12694f; /* Set your desired background color */
            color: #fff;
            text-align: center;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-control {
            border-radius: 0;
        }

        .col-md-6.offset-md-4 {
            text-align: center;
        }

        input[type="text"],
        input[type="password"] {
            border-radius: 5px; /* Set your desired border radius */
            padding: 8px; /* Adjust padding as needed */
        }

        input[type="submit"] {
            background-color: #12694f; /* Set your desired background color */
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px; /* Set your desired border radius */
            cursor: pointer;
            transition: background-color 0.3s; /* Add smooth transition for hover effect */
        }

        input[type="submit"]:hover {
            background-color: #0d4a35; /* Set your desired hover color */
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
    <div class="cotainer">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Password Recover</div>
                    <div class="card-body">
                        <form action="#" method="POST" name="recover_psw">
                            <div class="form-group row">
                                <label for="email_address" class="col-md-4 col-form-label text-md-right">E-Mail Address: </label>
                                <div class="col-md-6">
                                    <input type="text" id="email_address" class="form-control" name="email" required autofocus placeholder="Enter Email Address">
                                </div>
                            </div>

                            <div class="col-md-6 offset-md-4">
                                <input type="submit" value="Recover" name="recover">
                            </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>

</main>
</body>
</html>

<?php 
    if(isset($_POST["recover"])){
        include('bsaura/connection.php');
        $email = $_POST["email"];

        $sql = mysqli_query($connection, "SELECT * FROM user_tbl WHERE email='$email'");
        $query = mysqli_num_rows($sql);
  	    $fetch = mysqli_fetch_assoc($sql);

        if(mysqli_num_rows($sql) <= 0){
            ?>
            <script>
                alert("<?php  echo "Sorry, no emails exists "?>");
            </script>
            <?php
        }else if($fetch["status"] == 0){
            ?>
               <script>
                   alert("Sorry, your account must verify first, before you recover your password !");
                   window.location.replace("index.php");
               </script>
           <?php
        }else{
            // generate token by binaryhexa 
            $token = bin2hex(random_bytes(50));

            //session_start ();
            $_SESSION['token'] = $token;
            $_SESSION['email'] = $email;

            require "Mail/phpmailer/PHPMailerAutoload.php";
            $mail = new PHPMailer;

            $mail->isSMTP();
            $mail->Host='smtp.gmail.com';
            $mail->Port=587;
            $mail->SMTPAuth=true;
            $mail->SMTPSecure='tls';

            // h-hotel account
            $mail->Username='bascruminant@gmail.com';
            $mail->Password='vymg zsth qvgq pkoa';

            // send by h-hotel email
            $mail->setFrom('bascruminant@gmail.com', 'Password Reset');
            // get email from input
            $mail->addAddress($_POST["email"]);

            // HTML body
            $mail->isHTML(true);
            $mail->Subject="Recover your password";
            $mail->Body="<b>Dear User</b>
            <h3>We received a request to reset your password.</h3>
            <p>Kindly click the below link to reset your password</p>
            http://bascruminant.online/bascruminant/reset_psw.php
            <br><br>
            <p>With regrads,</p>
            <b>Bascruminant.online</b>";

            if(!$mail->send()){
                ?>
                    <script>
                        alert("<?php echo " Invalid Email "?>");
                    </script>
                <?php
            }else{
                ?>
                    <script>
                        window.location.replace("notification.html");
                    </script>
                <?php
            }
        }
    }


?>
