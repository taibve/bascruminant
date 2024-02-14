<!DOCTYPE html>
<html>

<head>
    <link rel="icon" href="wimg/CA.png" type="image/x-icon">
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/webrtc-adapter/3.3.3/adapter.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.1.10/vue.min.js"></script>
    <script type="text/javascript" src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js"></script>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<style>
body {
    margin: 0;
    padding: 0;
    font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
    background-color: #494949;
    background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='100%25'%3E%3Cdefs%3E%3ClinearGradient id='a' gradientUnits='userSpaceOnUse' x1='0' x2='0' y1='0' y2='100%25' gradientTransform='rotate(360,720,412)'%3E%3Cstop offset='0' stop-color='%23494949'/%3E%3Cstop offset='1' stop-color='%23081D1C'/%3E%3C/linearGradient%3E%3Cpattern patternUnits='userSpaceOnUse' id='b' width='300' height='250' x='0' y='0' viewBox='0 0 1080 900'%3E%3Cg fill-opacity='0.02'%3E%3Cpolygon fill='%23444' points='90 150 0 300 180 300'/%3E%3Cpolygon points='90 150 180 0 0 0'/%3E%3Cpolygon fill='%23AAA' points='270 150 360 0 180 0'/%3E%3Cpolygon fill='%23DDD' points='450 150 360 300 540 300'/%3E%3Cpolygon fill='%23999' points='450 150 540 0 360 0'/%3E%3Cpolygon points='630 150 540 300 720 300'/%3E%3Cpolygon fill='%23DDD' points='630 150 720 0 540 0'/%3E%3Cpolygon fill='%23444' points='810 150 720 300 900 300'/%3E%3Cpolygon fill='%23FFF' points='810 150 900 0 720 0'/%3E%3Cpolygon fill='%23DDD' points='990 150 900 300 1080 300'/%3E%3Cpolygon fill='%23444' points='990 150 1080 0 900 0'/%3E%3Cpolygon fill='%23DDD' points='90 450 0 600 180 600'/%3E%3Cpolygon points='90 450 180 300 0 300'/%3E%3Cpolygon fill='%23666' points='270 450 180 600 360 600'/%3E%3Cpolygon fill='%23AAA' points='270 450 360 300 180 300'/%3E%3Cpolygon fill='%23DDD' points='450 450 360 600 540 600'/%3E%3Cpolygon fill='%23999' points='450 450 540 300 360 300'/%3E%3Cpolygon fill='%23999' points='630 450 540 600 720 600'/%3E%3Cpolygon fill='%23FFF' points='630 450 720 300 540 300'/%3E%3Cpolygon points='810 450 720 600 900 600'/%3E%3Cpolygon fill='%23DDD' points='810 450 900 300 720 300'/%3E%3Cpolygon fill='%23AAA' points='990 450 900 600 1080 600'/%3E%3Cpolygon fill='%23444' points='990 450 1080 300 900 300'/%3E%3Cpolygon fill='%23222' points='90 750 0 900 180 900'/%3E%3Cpolygon points='270 750 180 900 360 900'/%3E%3Cpolygon fill='%23DDD' points='270 750 360 600 180 600'/%3E%3Cpolygon points='450 750 540 600 360 600'/%3E%3Cpolygon points='630 750 540 900 720 900'/%3E%3Cpolygon fill='%23444' points='630 750 720 600 540 600'/%3E%3Cpolygon fill='%23AAA' points='810 750 720 900 900 900'/%3E%3Cpolygon fill='%23666' points='810 750 900 600 720 600'/%3E%3Cpolygon fill='%23999' points='990 750 900 900 1080 900'/%3E%3Cpolygon fill='%23999' points='180 0 90 150 270 150'/%3E%3Cpolygon fill='%23444' points='360 0 270 150 450 150'/%3E%3Cpolygon fill='%23FFF' points='540 0 450 150 630 150'/%3E%3Cpolygon points='900 0 810 150 990 150'/%3E%3Cpolygon fill='%23222' points='0 300 -90 450 90 450'/%3E%3Cpolygon fill='%23FFF' points='0 300 90 150 -90 150'/%3E%3Cpolygon fill='%23FFF' points='180 300 90 450 270 450'/%3E%3Cpolygon fill='%23666' points='180 300 270 150 90 150'/%3E%3Cpolygon fill='%23222' points='360 300 270 450 450 450'/%3E%3Cpolygon fill='%23FFF' points='360 300 450 150 270 150'/%3E%3Cpolygon fill='%23444' points='540 300 450 450 630 450'/%3E%3Cpolygon fill='%23222' points='540 300 630 150 450 150'/%3E%3Cpolygon fill='%23AAA' points='720 300 630 450 810 450'/%3E%3Cpolygon fill='%23666' points='720 300 810 150 630 150'/%3E%3Cpolygon fill='%23FFF' points='900 300 810 450 990 450'/%3E%3Cpolygon fill='%23999' points='900 300 990 150 810 150'/%3E%3Cpolygon points='0 600 -90 750 90 750'/%3E%3Cpolygon fill='%23666' points='0 600 90 450 -90 450'/%3E%3Cpolygon fill='%23AAA' points='180 600 90 750 270 750'/%3E%3Cpolygon fill='%23444' points='180 600 270 450 90 450'/%3E%3Cpolygon fill='%23444' points='360 600 270 750 450 750'/%3E%3Cpolygon fill='%23999' points='360 600 450 450 270 450'/%3E%3Cpolygon fill='%23666' points='540 600 630 450 450 450'/%3E%3Cpolygon fill='%23222' points='720 600 630 750 810 750'/%3E%3Cpolygon fill='%23FFF' points='900 600 810 750 990 750'/%3E%3Cpolygon fill='%23222' points='900 600 990 450 810 450'/%3E%3Cpolygon fill='%23DDD' points='0 900 90 750 -90 750'/%3E%3Cpolygon fill='%23444' points='180 900 270 750 90 750'/%3E%3Cpolygon fill='%23FFF' points='360 900 450 750 270 750'/%3E%3Cpolygon fill='%23AAA' points='540 900 630 750 450 750'/%3E%3Cpolygon fill='%23FFF' points='720 900 810 750 630 750'/%3E%3Cpolygon fill='%23222' points='900 900 990 750 810 750'/%3E%3Cpolygon fill='%23222' points='1080 300 990 450 1170 450'/%3E%3Cpolygon fill='%23FFF' points='1080 300 1170 150 990 150'/%3E%3Cpolygon points='1080 600 990 750 1170 750'/%3E%3Cpolygon fill='%23666' points='1080 600 1170 450 990 450'/%3E%3Cpolygon fill='%23DDD' points='1080 900 1170 750 990 750'/%3E%3C/g%3E%3C/pattern%3E%3C/defs%3E%3Crect x='0' y='0' fill='url(%23a)' width='100%25' height='100%25'/%3E%3Crect x='0' y='0' fill='url(%23b)' width='100%25' height='100%25'/%3E%3C/svg%3E");
    background-attachment: fixed;
    background-size: cover;
    color: white;
    word-spacing: 5px;
}
.logoimg{
    width: 65px;
    height: 65%;
    margin-right: 45px;
    margin-left: 0;
    z-index: 1;
}
.logo {
    flex: 1;
    display: flex;
    align-items: center;
    position: relative;
}
.logo a{
    text-decoration: none;
    color: #000;
    padding-left: 10px;
    margin-bottom: 15px;
    padding-top: 20px;
    font-size: 20px;
    text-transform: uppercase;
}
.logo p{
    font-size: 15px;
    margin-left: -300px;
    padding-top: 15px;
    z-index: 3;
    margin-top: 25px;
}
.calogoi{
    width: 60px;
    height: 45%;
    margin-right: 15px;
    position: absolute;
    left: 55px;
    z-index: 2;
   padding-top: 25px;
}
.navbar-wrapper {
    position: relative;
}
.nav-links{
    z-index: 4;
    display: flex;
}
nav {
    background-color: #fff;
    padding: 30px;
    width: 100%;
    position: fixed;
    z-index: 100;
}
.navbar{    
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 15px 30px;
    background-color: rgb(6, 24, 1);
    background-image: linear-gradient(rgb(6, 24, 1), rgb(57, 80, 57));
    height: 100px;
    transition: height 1s;
}
.navbar a{
    text-decoration: none;
    color: #fff;
    align-items: center;
    display: flex; /* Make the text and image container a flex container */
    align-items: center; /* Center the items vertically within the flex container */
}
.login{
    background-color: none;
    display: flex;
    justify-content: flex-end;
}
/* Styles for the navigation links (ul) */
ul {
    list-style: none;
    margin: 0;
    padding: 0;
    display: flex;
    align-items: center; /* Center the items vertically within the flex container */
}
li {
    display: inline-block;
    margin-right: 60px;
    padding-top: 30px;
}

a {
    text-decoration: none;
    color: black;
    padding: 5px 5px;
}

a:hover {
    color: black;
    text-decoration: underline;
}

/* Push the ul to the right corner of the navbar */
.navbar .nav-links {
    margin-left: -250px;
    margin-bottom: 20px;
}
/*kapag scrolled down*/
.navbar.scrolled {
    background-color: transparent; /* Initial background color (transparent) */
    height: 100px;
    justify-content: center;
    padding-top: 10px;
}
/* nav-toggler css start */
.nav-toggler {
    border: 3px solid #fff;
    padding: 5px;
    background-color: transparent;
    cursor: pointer;
    height: 39px;
    display: none;
    margin-right: 50px;
  }
  .nav-toggler span, 
  .nav-toggler span:before, 
  .nav-toggler span:after {
    width: 28px;
    height: 3px;
    background-color: #fff;
    display: block;
    transition: .3s;
  }
  .nav-toggler span:before {
    content: '';
    transform: translateY(-9px);
  }
  .nav-toggler span:after {
    content: '';
    transform: translateY(6px);
  }
  .nav-toggler.toggler-open span {
    background-color: transparent;

  }
  .nav-toggler.toggler-open span:before {
    transform: translateY(0px) rotate(45deg);
  }
  .nav-toggler.toggler-open span:after {
    transform: translateY(-3px) rotate(-45deg);
  }
  .container {
    max-width: 600px; /* Set a max-width for the container */
    margin: 0 auto; /* Center the container horizontally */
    padding: 50px;
    background-color: rgba(255, 255, 255, 0.9);
    border-radius: 10px;
    box-shadow: 0 0 5px rgba(255, 255, 255, 0.9);
    /* Center the container using flexbox */
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
}
@media only screen and (max-width: 600px) {
    nav {
    background-color: #fff;
    padding: 30px;
    width: 89%;
    position: fixed;
    z-index: 100;
}
    .navbar{    
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 20px 30px;
    background-color: rgb(6, 24, 1);
    transition: background-color 0.3s ease; 
    height: 90px;
}
    
.nav-toggler{
        display: block;
        position: absolute;
        top: 30px; 
        right: 0px; 
        z-index: 2; 
      }
      .navbar .nav-links {
        position: absolute;
        width: 150px;
        height: calc(100vh - 60px);
        left:120%;
        top: 90px;
        flex-direction: column;
        align-items: center;
        background-color: rgba(2, 19, 5, 0.925);
        max-height: 0;
        overflow: hidden;
        transition: .3s;
        opacity: 5;
        align-content: center;
      }

    .navbar .nav-links li {
        display: block; 
        margin-right: 0; 
        padding: 5px 10px;
        text-align: center;
        width: 50%;
    }
    .navbar .nav-links li a{
        padding: 10px;
    }
    .navbar .nav-links li a:hover{
        background-color: rgba(255,255,255,.1);
    }
    .navbar .nav-links.open {
        max-height: 50vh;
        overflow: visible;
    }
      .navbar .logo a {
        padding-top: 10px; 
        margin: 0;
        padding-left:0;
    }
    .logo a{
        text-decoration: none;
        color: white;
        margin-bottom: 20px;
        padding-top: 10px;
        font-size: 10px;
    }
    .logo p{
        text-decoration: none;
        color: #0000;
        margin-bottom: 15px;
        padding-top: 20px;
        font-size: 10px;
    }
    .container{
        padding: 20px;
        margin-bottom: 0px; /* Adjust margin for smaller screens */
        margin-right: auto; /* Remove margin-right for smaller screens */
        font-size: 10px;
        width: 80%;
    }
}


/* Style for buttons within the container */
.container button {
    background-color: #007BFF;
    color: white;
    border: none;
    padding: 10px 20px;
    margin-top: 10px;
    cursor: pointer;
    border-radius: 5px;
}

.container button:hover {
    background-color: #0056b3;
}

/* Style for video within the container */
.container .video {
    border: 2px solid #006600;
    width: 85%;
    margin-top: 20px;
}
@media only screen and (max-width: 600px) {
    .container .video{
        padding: 10px;
        width: 90%;
        height: auto;
        margin-bottom: 10px; /* Adjust margin for smaller screens */
        margin-right: 0; /* Remove margin-right for smaller screens */
        font-size: 10px;
    }
}
/* Additional styling for select and input */
.container select,
.container input {
    margin-top: 10px;
    padding: 8px;
    width: 80%;
}


/* Additional styling for label */
.container label {
    margin-top: 20px;
    font-size: 18px;
    color: black;
}

@media (min-width: 769px) {
    .navbar .nav-links {
        display: flex; 
    }

    .navbar .nav-links li {
        margin-right: 60px; 
    }

    .navbar .nav-links a {
        padding: 5px 5px; 
    }
}

/* Media queries for smaller screens (tablets and laptops) */
@media (max-width: 768px) {
    .navbar {
        padding: 15px 20px;
        height: 60px; 
    }
    .logoimg{
        width: 55px;
        height: 45%;
        margin-right: 45px;
        margin-left: 0;
        z-index: 1;
    }
    .logo a {
        text-decoration: none;
        padding-left: 10px;
        padding-top: 10px; 
        margin-bottom: 15px;
        font-size: 10px;
    }

    .logo p {
        font-size: 15px; 
        margin-left: -178px; 
        padding-top: 12px; 
        z-index: 3;
        margin-top: 15px; 
    }

    .calogoi {
        width: 45px; 
        height: 35%;
        margin-right: 10px;
        position: absolute;
        left: 45px; 
        z-index: 2;
        padding-top: 10px;
    }
    .nav-toggler{
        display: block;
        position: absolute;
        top: 25px; 
        right: -20px; 
        z-index: 2; 
      }
   
    .navbar .nav-links {
        position: absolute;
        width: 200px;
        height: calc(80vh - 60px);
        left:120%;
        top: 90px;
        flex-direction: column;
        align-items: center;
        background-color: rgba(2, 19, 5, 0.925);
        max-height: 0;
        overflow: hidden;
        transition: .3s;
        opacity: 5;
        align-content: center;
      }

    .navbar .nav-links li {
        display: block; 
        margin-right: 0; 
        padding: 10px 20px;
        text-align: center;
        width: 100%;
    }
    .navbar .nav-links li a{
        padding: 25px;
    }
    .navbar .nav-links li a:hover{
        background-color: rgba(255,255,255,.1);
    }
    .navbar .nav-links.open {
        max-height: 100vh;
        overflow: visible;
    }
    
    .navbar .calogoi {
        width: 40px;
        height: auto;
        margin-right: 10px;
    }

    .navbar .logo a {
        padding-top: 20px; 
    }
}
#cameraIndicator {
        display: flex;
        align-items: center;
        margin-top: 20px;
        color: #006600;
        margin-left: 25%;
        margin-bottom: 10px;
    }

    #cameraIndicator i {
        margin-right: 20px;
    }
</style>
<body>
<script>
        // Function to display the alert
        function showAlert() {
            alert("Welcome to Bascruminant.online! This page will help you to find animal using scanner. (1) You can scan the QR code in your camera. Just make sure that it will fit in scanner. Choose your animal category first before you proceed in scanning. It will automatically view the animal information. (2) if you want to search the animal by its animal id, just choose animal category then insert the number into Eartag Number and hit the view. Press OK to continue.");
        }

        // Event listener to trigger the alert when the page is loaded
        window.addEventListener('load', showAlert);

        document.addEventListener("DOMContentLoaded", function () {
        // Get the toggler button and the navigation links
        const navToggler = document.querySelector('.nav-toggler');
        const navLinks = document.querySelector('.nav-links');

        // Add a click event listener to the toggler button
        navToggler.addEventListener('click', function () {
        // Toggle the "open" class on the navigation links
        navLinks.classList.toggle('open');
        });
    });
    </script>
<div class="navbar-wrapper">
        <nav class="navbar">
            <div class="logo">
                <a href="webpage.php"><img src="wimg\logo.png" alt="logo" class="logoimg"><img src="wimg\CA.png" alt="logo" class="calogoi">Bulacan Agricultural State  College
                <p><br>New Site Campus</p></a>
            </div>
            <button class="nav-toggler">
                <span></span>
              </button>
            <ul class="nav-links">
            <li><a href="webpage.php">Home</a></li>
                <li><a href="scanner.php">Scan QR Code</a></li>
                <li><a href="medicaluser.php">Medical Record</a></li>
                <li><a href="dietchart.php">Diet Chart</a></li>
                <li><a href="/bascruminant/index.php" onclick="return confirm('Do you want to log out?');">Logout</a></li>
            </ul>
        </nav>
    </div>
</div>
<br>
<div class="container" style="margin-top: 150px;">
        <form id="animalForm" method="GET">
            <div class="inputs">
                <center>
                <br>
                    <h3 style="color: black;"> Scan your QR CODE here: </h3>
                    <div class="video">
                        <video style='border: 2px solid #006600;' class="video" id="preview" width="80%"></video>
                    </div>

                    <!-- Camera Indicator Icons -->
                    <div id="cameraIndicator">
                        <i class="fas fa-camera"></i>
                        Front Camera
                    </div>
                    <select id="animalCategory" name="category" onchange="updateFormAction()">
                        <option value="carabao">Carabao</option>
                        <option value="rabbit">Rabbit</option>
                        <option value="cattle">Cattle</option>
                        <option value="sheep">Sheep</option>
                        <option value="goat">Goat</option>
                        <option value="horse">Horse</option>
                    </select>
                    <input placeholder="Eartag Number" type="search" name="id" id="qrCode" />
                    <button type="button" name="search" onclick="redirectToAnimal()">View</button>
                </center>

                <script>
                    document.addEventListener('DOMContentLoaded', function () {
                        Instascan.Camera.getCameras().then(function (cameras) {
                            if (cameras.length > 1) {
                                scanner.start(cameras[1]); // Use the second camera (back camera)
                                updateCameraIndicator('Back Camera');
                            } else if (cameras.length > 0) {
                                scanner.start(cameras[0]); // Use the first camera if only one is available
                                updateCameraIndicator('Front Camera');
                            } else {
                                alert('No cameras found');
                            }
                        }).catch(function (e) {
                            console.error(e);
                        });
                    });

                    let scanner = new Instascan.Scanner({ video: document.getElementById('preview') });

                    scanner.addListener('scan', function (c) {
                        document.getElementById('qrCode').value = c;
                        redirectToAnimal();
                    });

                    function updateFormAction() {
                        var animalCategory = document.getElementById('animalCategory').value;
                        document.getElementById('animalForm').action = 'v' + animalCategory + 'user.php';
                    }

                    function redirectToAnimal() {
                        updateFormAction(); // Ensure form action is updated based on category
                        var eartagNumber = document.getElementById('qrCode').value;
                        if (eartagNumber) {
                            var animalId = pad(parseInt(eartagNumber), 2); // Assuming eartag numbers are numeric
                            window.location.href = document.getElementById('animalForm').action + '?id=' + animalId;
                        }
                    }

                    function updateCameraIndicator(cameraType) {
                        var cameraIndicator = document.getElementById('cameraIndicator');
                        cameraIndicator.innerHTML = `<i class="fas fa-camera"></i>${cameraType}`;
                    }

                    // Function to pad a number with leading zeros
                    function pad(number, length) {
                        var str = '' + number;
                        while (str.length < length) {
                            str = '0' + str;
                        }
                        return str;
                    }
                </script>
            </div>
        </form>
    </div>
</body>

</html>