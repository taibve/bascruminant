<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);

include_once("connection.php");
include_once("function.php");

$carabao_counts = getAnimalCounts($connection, 'carabao');
$cattle_counts = getAnimalCounts($connection, 'cattle');
$rabbit_counts = getAnimalCounts($connection, 'rabbit');
$horse_counts = getAnimalCounts($connection, 'horse');
$sheep_counts = getAnimalCounts($connection, 'sheep');
$goat_counts = getAnimalCounts($connection, 'goat');


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
        <link rel="icon" href="wimg/CA.png" type="image/x-icon">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BSAU RUMINANT ANIMALS</title>
    <link rel="stylesheet" href=" css/webpage.css">

    <script>
        //JavaScript to toggle the 'scrolled' class on scroll
        window.addEventListener('scroll', function(){
        const navbar =  document.querySelector('.navbar');
        if (window.scrollY > 50){
            navbar.classList.add('scrolled');
            } else {
            navbar.classList.remove('scrolled');
    
        }
        
        });
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
</head>
<body>
    <div class="navbar-wrapper">
        <nav class="navbar">
            <div class="logo">
                <a href="webpage.php"><img src=" wimg\logo.png" alt="logo" class="logoimg"><img src=" wimg\CA.png" alt="logo" class="calogoi">BULACAN AGRICULTURAL STATE COLLEGE
                <p><br>NEW SITE CAMPUS</p></a>
            </div>
            <button class="nav-toggler">
                <span></span>
              </button>
            <ul class="nav-links">
                <li><a href="webpage.php">Home</a></li>
                <li><a href="scanner.php" onclick="return confirm('Are you sure you want to leave the page?');">Scan QR Code</a></li>
                <li><a href="medicaluser.php" onclick="return confirm('Are you sure you want to leave the page?');">Medical Rerord</a></li>
                <li><a href="dietchartuser.php" onclick="return confirm('Are you sure you want to leave the page?');">Diet Chart</a></li>
                <li><a href="/bascruminant/index.php" onclick="return confirm('Do you want to Logout?');">Logout</a></li>
            </ul> 
        </nav>
    </div>
</div>
<!--image start slider-->
<div id="con1" class="slider">
    <div class="slides">
        <input type="radio" name="radio-btn" id="radio1">
        <input type="radio" name="radio-btn" id="radio2">
        <input type="radio" name="radio-btn" id="radio3">
        <input type="radio" name="radio-btn" id="radio4">

        <div class="slide first">
            <img src=" bascimg\one.jpg" alt="img-image1">
        </div>
        <div class="slide">
            <img src=" bascimg\anscie.jpg" alt="img-image2">
        </div>
        <div class="slide">
            <img src=" bascimg\five.jpg" alt="img-image3">
        </div>
        <div class="slide">
            <img src=" bascimg\vet.jpg" alt="img-image4">
        </div>

    </div>

  
</div>
<div class="animals" >
<div id="con4" class="card">
    <a href="vcattle.php"></a>
    <div class="imgBx">
        <img src=" bascimg\carabaoweb.JPG">
    </div>
    <div class="content">
        <div class="details">
            <h2>Carabao <br><span>BASC New Site Campus</span></h2>
            <div class="data">
            <h3><?php echo $carabao_counts['alive']; ?><br><span>Total Carabao</span></h3>
            </div>
        </div>
    </div>
</div>

<!-- Duplicate the structure for 5 more animals -->
    <div id="con5" class="card1">
        <div class="imgBx1">
            <img src=" bascimg\goatweb.JPG">
        </div>
        <div class="content">
            <div class="details">
                <h2>Goat <br><span>BASC New Site Campus</span></h2>
                <div class="data">
                <h3><?php echo $goat_counts['alive']; ?><br><span>Total Goat</span></h3>
                </div>
            </div>
        </div>
    </div>
    <div id="con6" class="card2">
        <div class="imgBx2">
            <img src=" bascimg\horseweb.JPG">
        </div>
        <div class="content">
            <div class="details">
                <h2>Horse<br><span>BASC New Site Campus</span></h2>
                <div class="data">
                <h3><?php echo $horse_counts['alive']; ?><br><span>Total Horses</span></h3>
                </div>
            </div>
        </div>
    </div>
    <hr>
    <div id="con3" class="card3">
        <div class="imgBx3">
            <img src=" bascimg\cattleweb.JPG">
        </div>
        <div class="content">
            <div class="details">
                <h2>Cattle <br><span>BASC New Site Campus</span></h2>
                <div class="data">
                <h3><?php echo $cattle_counts['alive']; ?><br><span>Total Cattle</span></h3>
                </div>
            </div>
        </div>
    </div>
    <div id="con8" class="card4">
        <div class="imgBx4">
            <img src=" dimg\rabbit.jpeg">
        </div>
        <div class="content">
            <div class="details">
                <h2>Rabbit<br><span>BASC Main Campus</span></h2>
                <div class="data">
                <h3><?php echo $rabbit_counts['alive']; ?><br><span>Total Rabbits</span></h3>
                </div>
            </div>
        </div>
    </div>
    <div id="con9" class="card5">
        <div class="imgBx5">
            <img src=" bascimg\sheepweb.JPG">
        </div>
        <div class="content">
            <div class="details">
                <h2>Sheep<br><span>BASC New Site Campus</span></h2>
                <div class="data">
                <h3><?php echo $sheep_counts['alive']; ?><br><span>Total Sheep</span></h3>
                </div>
            </div>
        </div>
    </div>  
    </div>
<!--For location-->
<div id="con7" class="con7">
    <div class="location">
        <h2>Location</h2>
        <h3>Poblacion, San Ildefonso, Bulacan</h3>  
    </div>
    <div class="map"><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3852.452790700261!2d120.945211488855!3d15.07835350000002!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x339703ff3eab5855%3A0xa1bb39bd4912b05a!2sCollege%20of%20Agriculture%20-%20Bulacan%20Agriculture%20State%20College%20(Newsite)!5e0!3m2!1sen!2sph!4v1696781230650!5m2!1sen!2sph" width="800" height="600" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    
    </div>
        <div class="text-box"><img src=" bascimg\caaaa.png"></div>
</div>
<div id ="news" class="container">
<div class="column larger">
        <h1>Online BASC: Keeping You Updated</h1><div class="line"></div>
    <div class="news-card">
        <img src=" wimg/palayan.png" alt="News Image">
        <div class="news-content">
            <h2>Palayamanan Project adjudged as 2023 Regional Pagasa Award winners</h2>
            <p>Published on: May 9, 2023</p>
            <p>Palayamanan Project adjudged as 2023 Regional Pagasa Award</p>
            <a href="https://basc.edu.ph/news/palayamanan-project-adjudged-as-2023-regional-pagasa-award-winners/">Read More</a>
        </div>
    </div>
    <div class="news-card">
        <img src=" bascimg/thailand.jpg" alt="News Image">
        <div class="news-content">
            <h2>BASC triumphs in Thailand</h2>
            <p>Published on: November 17, 2022</p>
            <p>BASC triumphs in Thailand Vice President for Academic</p>
            <a href="https://basc.edu.ph/news/basc-triumphs-in-thailand/">Read More</a>
        </div>
    </div>
    <div class="news-card">
        <img src=" bascimg/lead.jpg" alt="News Image">
        <div class="news-content">
            <h2>Student leaders assure good governance in AY 22-23</h2>
            <p>Published on: October 20, 2022</p>
            <p>  Student leaders assure good governance in AY 22-23</p>
            <a href="https://basc.edu.ph/news/student-leaders-assure-good-governance-in-ay-22-23/">Read More</a>
        </div>
</div>
<div class="news-card">
        <img src=" bascimg/palayamanan.jpg" alt="News Image">
        <div class="news-content">
            <h2>BASC Launches New Palayamanan Project</h2>
            <p>Published on: October 7, 2022</p>
            <p>BASC launches new Palayamanan project Another Palayamanan project entitled “Upscaling of Rice-Based Integrated Farming System in Bulacan” was officially launched</p>
            <a href="https://basc.edu.ph/news/basc-launches-new-palayamanan-project/">Read More</a>
        </div>
    </div>
</div>
<div class="vertical-line"></div>
<div class="column smaller">
<h1>Announcement</h1><div class="line"></div>
<div class="news-card">
        <img src=" bascimg/call.jpg" alt="News Image">
        <div class="news-content">
            <h2>Calling All BASC Alumni: Reconnect, Reflect, and Elect at Our General Assembly!</h2>
            <p>Published on: August 23, 2023</p>
            <p>Calling All BASC Alumni: Reconnect, Reflect, and Elect at</p>
            <a href="https://basc.edu.ph/announcements/calling-all-basc-alumni-reconnect-reflect-and-elect-at-our-general-assembly/">Read More</a>
        </div>
</div>
    <div  class="news-card">
        <img src=" wimg/logo.png" alt="News Image">
        <div class="news-content">
            <h2>Memorandum No. 03-02, s. 2023 – Settlement of Outstanding Loans</h2>
            <p>Published on: March 22, 2023</p>
            <p>Memorandum No. 03-02, s. 2023</p>
            <a href="https://basc.edu.ph/memo/memorandum-no-03-02-s-2023-settlement-of-outstanding-loans/">Read More</a>
        </div>
    </div>
    <div class="news-card">
        <img src=" bascimg/6.png" alt="News Image">
        <div class="news-content">
            <h2>6th BASC Regional Research Conference – Call for Papers</h2>
            <p>Published on: Septwmbwr 23, 2022</p>
            <p>6th BASC Regional Research Conference – Call for Papers</p>
            <a href="https://basc.edu.ph/announcements/6th-basc-regional-research-conference-call-for-papers/">Read More</a>
        </div>
    </div>
</div>
</div>

<script>
    let slideIndex = 1;
    showSlide(slideIndex);

    function showSlide(n) {
        const slides = document.getElementsByClassName("slide");

        if (n > slides.length) {
            slideIndex = 1;
        }
        if (n < 1) {
            slideIndex = slides.length;
        }

        for (let i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";
        }

        slides[slideIndex - 1].style.display = "block";
    }

    // Automatic slideshow every 3 seconds
    let slideInterval = setInterval(function () {
        changeSlide(1);
    }, 2000);

    function changeSlide(n) {
        showSlide((slideIndex += n));
    }

    // Pause the slideshow on hover
    const slider = document.querySelector(".slider");
    slider.addEventListener("mouseenter", function () {
        clearInterval(slideInterval);
    });
    slider.addEventListener("mouseleave", function () {
        slideInterval = setInterval(function () {
            changeSlide(1);
        }, 2000);
    });
</script>
<!-- <script src="dashboard.js"></script>--> 
</body>
<footer>
        <div id ="announce" class="footer-content">
            <div class="footers-sections">
                    <h2>About Us</h2></a>
                <a href = "https://basc.edu.ph/bids-and-awards/">Bids and Awards<br></a><br>
                <a href = "https://basc.edu.ph/job-vacancies/"> Job Vacancies<br></a><br>
                <a href = "https://basc.edu.ph/wp-content/uploads/2022/12/Bulacan-Agricultural-State-College-Citizens-Charter.pdf">Citizen's Charter<br></a><br>
                <a href = "https://basc.edu.ph/wp-content/uploads/2021/11/BASC-IP-Policy-as-amended-2021.pdf">Intellectual Property Policy<br></a><br>
                <a href = "https://basc.edu.ph/wp-content/uploads/2021/12/BASC_Data__Privacy_Manual.pdf">Data Privacy Manual<br></a><br>
                <a href = "https://basc.edu.ph/wp-content/uploads/2021/12/QMDI-MP-COTO03-001_Scope-and-Aplication-of-the-Quality-Management-System.pdf">Scope and Application of QMS<br></a><br>
            </div>
    
            <div class="footer-section">
                <h2>Contact Information</h2>
                <p>Poblacion, San Ildefonso, Bulacan </p>
                    <h4>BASC</h4>
                    <p>PHONE:   044 792 4409 . 044 816 7121</p>
                    <p> EMAIL:     info@basc.edu.ph</p>
                    <h4> REGISTRAR</h4>
                    <p>PHONE:   044 697 1727</p>
                    <p>EMAIL:     registrar@basc.edu.ph</p>
            </div>
           
    </footer>
</body>
</html>
