<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);

include_once("connection.php");


$sql = 'SELECT * FROM animal_tbl';
$result = $connection->query($sql);
?>

<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>DASHBOARD</title>
  <!--style-->
      <link rel="icon" href="wimg/CA.png" type="image/x-icon">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net\npm/remixicon@12.3.1/fonts/remixicon.css">
  <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/remixicon@2.2.0/fonts/remixicon.css'>
  <link rel='stylesheet' href='https://unpkg.com/css-pro-layout@1.1.0/dist/css/css-pro-layout.css'>
  <link rel='stylesheet' href='https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&amp;display=swap'>
  <link rel="stylesheet"  href="https://cdnjs.cloudflare.com//libs/fajaxont-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet"  href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
  <link rel="stylesheet"  href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="css/medical.css">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  </head>
<body>
<!-- partial:index.partial.html -->
<div class="layout has-sidebar fixed-sidebar fixed-header">
<aside id="sidebar" class="sidebar break-point-sm has-bg-image">
        <!--sidebar arrow-->
        <a id="btn-collapse" class="sidebar-collapser"><i class="ri-arrow-left-s-line"></i></a>
        <div class="image-wrapper">
          <img src="assets/images/sidebar-bg.jpg" alt="sidebar background" />
        </div>
        <div class="sidebar-layout">
          <div class="sidebar-header">
            <!--para sa kulay orange na box sa logo-->
            <div class="pro-sidebar-logo">
              <img src="dimg/basclogo.png" alt="Logo" class="logo">
              <!--para sa letter na nasa box na logo &emsp para sa tab(space)-->
              <div><br><br>&emsp;New Site Campus, Poblacion, San Ildefonso, Bulacan</div>
              <h4>Bulacan State Agricultural<br>University<br><br></h4>
             <!-- <h5><br><br><br>&emsp;Ruminants Animals.</h5>-->
            </div>
            <!--end ng logo-->
          </div>
          <div class="sidebar-content">
            <nav class="menu open-current-submenu">
              <ul>
                <li class="menu-header"><span> GENERAL </span></li>
                <li class="menu-item">
                  <a href="dashboarduser.php">
                  <span class="menu-icon">
                      <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAB4AAAAeCAYAAAA7MK6iAAAACXBIWXMAAAsTAAALEwEAmpwYAAACC0lEQVR4nO2VP2gVQRDGD9RCFFRQRGxsFCOWdhaCaC3in8o6RRoV0Zh7M6zczJqgpBMhghaG+OCbCxaCiIUpohER0ojGTgXhgaKIf7DRKPvuAmLuOH3vIgjvg4Fb+PZ+s7Ozu1HUU0//k0hxmhUH/zmYFbMs9s157HBuajkl6dYjwLLSCQ3BXla8JMUXEnvFYo9YcYsFV1nsAgtGQpDiCqsZCe6R2FMWfGSx9yw4E/5DaqOs9oPUWqT2NXyzYLwUTGIv2qZOQzDfkHTfkMcGUntX4DlQUqIuoHmQYK5/bGwFi51bnJh9oKTZtyTgDG53We15SVUeFoJJ8KSuBErAj4tXLBYvHdQ+s8f+YrBPd9cJowSHS7s5g+JBMDo3sb4+MGajKlF25lrOYXWNpY2rwQmOs+KEO9/cVhfY+XR7JXhBrOgv6cb5dvw5+HL0NyLB/cImEdxxw80tpGiQ2AypfSr0qb0t7Nwqhcs93583rDYdjkCAxorNZXOcn9wZ7vccjEpIkX7J/FpUIVIbJG/HsnmYyitzuzuwt6OxTm5qv0hqNuRvbCz0ir3OwZcysM10B06afYMjWENq38M4VttV5j07PLGOFQP5iue6Ajt3c20+zi/79NDv3oWk2kfQY0++Ra1OwdPhB+Fpy8YYCI85Kfwir2A8NOPJUaw8dfH6KlZ7FrwdgXvqKapJPwFia3orGotdegAAAABJRU5ErkJggg==">
                    </span>
                    <span class="menu-title">CA ANIMALS</span>
                  </a>
                      </li>
                <li class="menu-item">
                  <a href="medicaluser.php">
                    <span class="menu-icon">
                      <i class="fa fa-file-medical"></i>
                    </span>
                    <span class="menu-title">Medical Record</span>
                  </a>
                      </li>
                <li class="menu-item">
                  <a href="dietchartuser.php">
                    <span class="menu-icon">
                      <i class="fa fa-pie-chart"></i>
                    </span>
                    <span class="menu-title">Diet Chart</span>
                  </a>
                      </li>
                <li class="menu-item">
                  <a href="webpage.php" onclick="return confirm('Do you want to go back to BASC RUMINANT WEBSITE?');">
                    <span class="menu-icon">
                      <i class="ri-logout-box-r-line"></i>
                    </span>
                    <span class="menu-title">Website</span>
                  </a>
                </li>
              </ul>
            </nav>
          </div>
        </div>
      </aside>   
      <div id="overlay" class="overlay"></div>
      <div class="layout" style="background-color:#e6e6fa;">
        <main class="content">
        <div>
            <a id="btn-toggle" href="#" class="sidebar-toggler break-point-sm">
              <i class="ri-menu-line ri-xl"style="color: #0c1e35;"></i>
            </a>
      <div class="col-sm-6 text-center">
        <form action="dashboarduser.php" method="post">
        <select id="animalSelect" name="selectedAnimal">
            <option value="all">All Animals</option>
            <option value="carabao">Carabao</option>
            <option value="rabbit">Rabbit</option>
            <option value="sheep">Sheep</option>
            <option value="horse">Horse</option>
            <option value="goat">Goat</option>
            <option value="cattle">Cattle</option>
        </select>
        <input type="submit" class="btn btn-primary" value="Filter" style="display: block; width: 100%; margin-top: 10px;">
    </form>
</div>

<div class="container">
    <h2>DASHBOARD</h2>
            <div style="position: fixed; top: 20%; left: 60%; z-index: -2; opacity: 0.2;">
                <img src="wimg/CA.png" alt="California Image" style="width: 200%; height: 200%;">
            </div> 
    <div>
        <table class="table table-striped" style="margin-top: 60px; text-align: center;">
            <thead>
                <tr>
                    <th>Animal ID</th>
                    <th>Sex</th>
                    <th>Category</th>
                    <th>Breed</th>
                    <th>Source</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        if (isset($_POST['selectedAnimal']) && $_POST['selectedAnimal'] !== 'all') {
                            $selectedAnimal = $_POST['selectedAnimal'];
                            $animalType = strtolower($row['category']); // Get animal type from the database
                            if ($selectedAnimal !== $animalType) {
                                continue;
                            }
                        }

                        echo "<tr>";
                        echo "<td>" . htmlspecialchars($row['animal_id']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['sex']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['category']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['breed']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['source']) . "</td>";
                        echo "<td>";
                        echo "<a class='btn btn-success btn-sm' href='v" . strtolower($row['category']) . "user.php?id=" . htmlspecialchars($row['animal_id']) . "'><i class='fa-solid fa-eye'></i></a><br>";
                        //echo "<a class='btn btn-secondary btn-sm' href='" . htmlspecialchars($row['qr']) . "'><i class='fa-solid fa-qrcode'></i>&nbsp;</a><br>";
                        echo "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='7'>No records found.</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</div>

        <footer class="footer">
            <small style="margin-bottom: 20px; display: inline-block; margin-top: 10px;  " >
              © 2023 made with developers by -
              <a target="_blank" href="https://basc.edu.ph/"style="color: #708090;"> Bulacan State Agricultural University </a>
            </small>
            <br />
            <div class="social-links">
            <a href="https://www.facebook.com/bascofficeofthecollegeregistrar?mibextid=D4KYlr" target="_blank">
              <i class="fa-brands fa-facebook"></i>
              </a>
              <a href="https://basc.edu.ph/contact-us/" target="_blank">
              <i class="fa-solid fa-envelope"></i>
              </a>
              <a href="https://basc.edu.ph/contact-us/" target="_blank">
              <i class="fa-solid fa-phone"></i>
              </a>
            </div>
          </footer>
        </main>
        <div class="overlay"></div>
      </div>
    </div>
  <script src='https://unpkg.com/@popperjs/core@2'></script>
  <script src="template.js"></script>
</body>
</html>