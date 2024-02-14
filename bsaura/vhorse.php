<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include_once("connection.php");

$id = $_GET["id"];

$sql = "SELECT * FROM animal_tbl WHERE animal_id = ?";
$stmt = $connection->prepare($sql);
$stmt->bind_param("s", $id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $animalid = $row["animal_id"];
    $oldId = $row["oldAnimal_id"];
    $category = $row["category"];
    $sex = $row["sex"];
    $status = $row["status"];
    $breed = $row["breed"];
    $source = $row["source"];
  } else {
    echo "No data found for ID: " . $id;
    echo "<script>alert('No data found for ID: $id'); window.history.back();</script>";
    exit; 
  }
$stmt->close();
?>

<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>HORSE TABLE</title>
      <link rel="icon" href="wimg/CA.png" type="image/x-icon">
  <!--style-->
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
  <link rel="stylesheet" href="css/view.css">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<style>
        .animal-pic{
          text-align: center;
        }
        .img-horse {
          max-width: 100%;
          height: 300px;
          border: 2px solid #333; /* Border style, thickness, and color */
          box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
          border-radius: 20px 20px 20px 20px;
          margin-bottom: 30px;
          margin-top: 30px;
        }
        
    </style>
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
                  <a href="dashboard.php">
                    <span class="menu-icon">
                      <i class="ri-home-4-fill"></i>
                    </span>
                    <span class="menu-title">Dashboard</span>
                    <span class="menu-suffix">
                     <!-- <span class="badge secondary">Beta</span>
                    </span>-->
                  </a>
                </li>
                <li class="menu-item sub-menu">
                  <a href="#">
                    <span class="menu-icon">
                      <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABkAAAAZCAYAAADE6YVjAAAACXBIWXMAAAsTAAALEwEAmpwYAAADA0lEQVR4nJ1Wa4iMYRQeIpcIud9ShPyRouSPpfxDkR8kf5B1KZdtCTvnzJs551sUSi61Ekm7054zi7TuaZFflHJbUy5tKSS5sxSNzlx2Zr/5Zs3sW6dm3vd5z3POec/lC4V8C6LxJaFkskeohIUcX1YKrvAi6U/wpDr7P0yxSUgaM3F74xNz+7IRWP8619KrbBIgeYysSSC5Cqz7keUJkkRMgPQpkuxDlksZzMvuerLdFHQISWPuTBrzz4AVS1K6a2/9kAjJcohqFbJucJ5OB9LrSPoHWY9XHZR+Waxzp/sC6TE7A9JbjmVGKmxRrTIdpivYcpa2TpanrNfPuEdnO+d6oicVyLIpJZ5UpPZqZQ6wfim4x9JWjOSGHwyshCwLkfVFwRnpczsDFi+A5FogSQ03jUbWK8DajqwJJP1uXgDJs0IlmpWEeZPCsibsLpBcdk5GlZzCzskAYPlRjARY23fsvzDQsCUpDSB5v9uT4cD6tlC57HDuYn/wZIVzTeOQ9GO3SIDkbpjiCyIka5Hkax7JTYjKVGB5jV58PkTjk4G0uZieMMXnIusrVxubEuTJdiQ9kwFOsKo2kgjJaiA9kgnXtzDJ+sq6ut5BBGkDU+9liXKkAJCOtbyxenGufliHJ1GZCSz3fIV61vaA9XdaUr9P+jD3A11N14XeDJPOy4JrWGfZhS4yrojIg0ASC0OmRhIdj+7pKmQ5VDYJ6YGiCYCsrb4Lrc41jUCW26USAMkdK4fiJCS/Aqq92Vp7KWEDkoddj4FksgeSvgtwvcZqpIz3qPzf1FsMLJ/yCvHHrtpzQ/0N1WYKktalhPWVL7M+bD58uU+XRBZPZFmKLNvAk5VWpL72csr6lVlssttrGImkpzthorooVM4CT6rzPUgT5KwP2kPWLd0mQdI6q3pkfZQvEdJ1wHIi54lsLYskTLHxuXeSo6YwiMTOsm9io6QsElvWbpClxQrVurUvERLWimwW2QiHaGxa2QSdyFzDmJ37ZJBlXObzaI1z5web1LCMzQf/A+btjXmgoZ32AAAAAElFTkSuQmCC">
                    </span>
                    <span class="menu-title">CA Animals</span>
                  </a>
                  <div class="sub-menu-list">
                    <ul>
                      <li class="menu-item">
                        <a href="carabao.php">
                          <span class="menu-icon">
                      <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAB4AAAAeCAYAAAA7MK6iAAAACXBIWXMAAAsTAAALEwEAmpwYAAACC0lEQVR4nO2VP2gVQRDGD9RCFFRQRGxsFCOWdhaCaC3in8o6RRoV0Zh7M6zczJqgpBMhghaG+OCbCxaCiIUpohER0ojGTgXhgaKIf7DRKPvuAmLuOH3vIgjvg4Fb+PZ+s7Ozu1HUU0//k0hxmhUH/zmYFbMs9s157HBuajkl6dYjwLLSCQ3BXla8JMUXEnvFYo9YcYsFV1nsAgtGQpDiCqsZCe6R2FMWfGSx9yw4E/5DaqOs9oPUWqT2NXyzYLwUTGIv2qZOQzDfkHTfkMcGUntX4DlQUqIuoHmQYK5/bGwFi51bnJh9oKTZtyTgDG53We15SVUeFoJJ8KSuBErAj4tXLBYvHdQ+s8f+YrBPd9cJowSHS7s5g+JBMDo3sb4+MGajKlF25lrOYXWNpY2rwQmOs+KEO9/cVhfY+XR7JXhBrOgv6cb5dvw5+HL0NyLB/cImEdxxw80tpGiQ2AypfSr0qb0t7Nwqhcs93583rDYdjkCAxorNZXOcn9wZ7vccjEpIkX7J/FpUIVIbJG/HsnmYyitzuzuwt6OxTm5qv0hqNuRvbCz0ir3OwZcysM10B06afYMjWENq38M4VttV5j07PLGOFQP5iue6Ajt3c20+zi/79NDv3oWk2kfQY0++Ra1OwdPhB+Fpy8YYCI85Kfwir2A8NOPJUaw8dfH6KlZ7FrwdgXvqKapJPwFia3orGotdegAAAABJRU5ErkJggg==">
                    </span>
                          <span class="menu-title">Carabao</span>
                        </a>
                      </li>
                      <li class="menu-item">
                        <a href="cattle.php">
                          <span class="menu-icon">
                      <i class="fa-solid fa-cow"></i>
                    </span>
                          <span class="menu-title">Cattle</span>
                        </a>
                      </li>
                      <li class="menu-item">
                        <a href="goat.php">
                          <span class="menu-icon">
                      <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABoAAAAaCAYAAACpSkzOAAAACXBIWXMAAAsTAAALEwEAmpwYAAACpUlEQVR4nN1WO2sUURSeRHwVgm8tFBtBkFj5Fg0q+hPstBPFQkRUTHbvySV77iQIJmilqZTARvnOrhGLFFpEQazERwS1ESyCiFWMihITV87M7GuyG2dxbTwwxT13vvvd853HjOf915Zm2WMchohlnFimiPGBWLLWz7fVw1g/3xZignenImyWerC7JoBYnHEyQ04K8SfwszivUGgpAQqFFuOE58LofpzkfK2XZz/oPzEwMN9a20osl5NgjI9zkVy5DcT4kYwouOkXYvnYwPvf03xrvWec9JY2WAZsDzae7cPiNGMvOTxKfCDjXsrJNmtvLLI+NhsnqDjXeeTwLHJIPG8qEzkMJyC6XpW/KIfkMBrtP9WIPgeLDLbqvmF5GPowqlF19GaXzS0t3luLBeTnDpSx8jZMCw5GEU14xuGbLi5curskLAxkyiErAfr/kIMZYkkZh58VMj7Ws4JLhkRfPcN4owt16qbmhxxeJM0N1SgWk8GmoMcslkf+1yrdoC60WYvydvpDawzL84aJWCZU7vIA0IJSctzUabA/uklfZS5PXx1ZaBxsA1U3oq1S1Z9OroRB5NojB4aJMdnpY9XsiYFJ6s5vp27ZOYugu+zXtqgaTTa/OpCRkatwZlcaxiudWXEiw3iXctiRcvldcaJU0c/4VSymEs7JbXIy1tFzZ0XVgRoNOTwwTi7GAIMJZHsZU6HDsNyvpVAUmW3tYhwjX/aVQD4OJ6g0KhdArt34clTP8hoxnQ7FXqv7ZMJm/2szLE/mKOnxhm9fz9KMk3Vly+CM1ywLhivLtCbd2vw6a7G2OIxNBlu8ZpqWeRTFmLZCJNu0tcNLm0qUZpyqUdbXvGabftCI5VNFEUzHp0HTLM25Q/q3E4wWh+P/hKRoR4B5+qFrFPgb/2B9zgkHzz4AAAAASUVORK5CYII=">
                    </span>
                          <span class="menu-title">Goat</span>
                        </a>
                      </li>
                      <li class="menu-item">
                        <a href="horse.php">
                          <span class="menu-icon">
                      <i class="fa-solid fa-horse"></i>
                    </span>
                          <span class="menu-title">Horse</span>
                        </a>
                      </li>
                      <li class="menu-item">
                        <a href="rabbit.php">
                          <span class="menu-icon">
                              <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABkAAAAZCAYAAADE6YVjAAAACXBIWXMAAAsTAAALEwEAmpwYAAABuElEQVR4nO1UPUskQRScyEDEVLnEQxMxMpYDBQ/ExC/8B15gIoiZzOvrY98bFMQ/IAiK4GK9SRQMBFNFEDPRUEWWzbxQ5ViVXleZGVadmTU6LBiGnq7q6nrT/Tzvv4bPOmACHcymCX+aAP2pBUZwaRgPhjGXjq/TRvSRWC/SmzDuqiLRihEdft8gHCLBP8d3utQmJPhbFT3v7sraneZ6PGvRQoLrF65hvUlvwjh5FYo++oyZ+ikwG+UZxnGGJLocEwtO65voWZRHgqXUJjZAT/XHRxawC8XvMc5C2JlI8WCDsDu1STUNYz+RZjw2X8BkYn7Pywqf8SOeBrtGdJsER+5dG9fKpBWftc/LA8NYje9W6z4kWPHywtqNVhItvW+gJcdrwGTzG4nef2By73i5TQzrespyreVMgfbkMTZvp6nMB5tt2VOIjkbuwJYV9MbujaCXRPFqVMBIDhOMR8rh+pMmdo9o36JCOJbZxMUn0dtEac5c6yDGecLwNle5HEjwK366cOBz2EGsh9HT9Zsx5TUCn4tdhrFIouVaO/9TW7zsvrse5n0WrEUTFXTCtRv3duNPW/wLXgRPUuvysIK0VfsAAAAASUVORK5CYII=">
                          </span>
                          <span class="menu-title">Rabbit</span>
                        </a>
                      </li>
                      <li class="menu-item">
                        <a href="sheep.php">
                          <span class="menu-icon">
                      <i class="fa-solid fa-democrat"></i>
                    </span>
                          <span class="menu-title">Sheep</span>
                        </a>
                      </li>
                    </ul>
                  </div>
                </li>
                <li class="menu-item">
                  <a href="medical.php">
                    <span class="menu-icon">
                      <i class="fa fa-file-medical"></i>
                    </span>
                    <span class="menu-title">Medical Record</span>
                  </a>
                      </li>
                <li class="menu-item">
                  <a href="genealogical.php">
                    <span class="menu-icon">
                      <i class="fab fa-pagelines"></i>
                    </span>
                    <span class="menu-title">Genealogical Tree</span>
                  </a>
                      </li>
                <li class="menu-item">
                  <a href="dietchart.php">
                    <span class="menu-icon">
                      <i class="fa fa-pie-chart"></i>
                    </span>
                    <span class="menu-title">Diet Chart</span>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="table.php">
                    <span class="menu-icon">
                      <i class="fa fa-area-chart"></i>
                    </span>
                    <span class="menu-title">Statistics and Postmortem</span>
                  </a>
                </li>
                <li class="menu-header" style="padding-top: 20px"><span> EXTRA </span></li>
                <li class="menu-item">
                  <a href="report.php">
                    <span class="menu-icon">
                      <i class="ri-book-2-fill"></i>
                    </span>
                    <span class="menu-title">Reports</span>
                    <span class="menu-suffix">
                     <!-- <span class="badge secondary">Beta</span>
                    </span>-->
                  </a>
                </li>
                <li class="menu-item">
                  <a href="user.php">
                    <span class="menu-icon">
                      <i class="ri-user-fill"></i>
                    </span>
                    <span class="menu-title">User</span>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="/bascruminant/index.php" onclick="return confirm('Do you want to log out?');">
                    <span class="menu-icon">
                      <i class="ri-logout-box-r-line"></i>
                    </span>
                    <span class="menu-title">Logout</span>
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
            <div style="position: fixed; top: 20%; left: 60%; z-index: -2; opacity: 0.2;">
                <img src="wimg/CA.png" alt="California Image" style="width: 200%; height: 200%;">
            </div> 
            <div class="animal-pic">
              <?php echo "<img class='img-horse' src='" . htmlspecialchars($row['image']) . "?v=" . time() . "'>" ?>
              <h2><?php echo "$animalid"?></h2>
          </div>
          <table style="width:70%;" class="table table-striped">
        <tr>
            <th>Animal ID</th>
            <td><?php echo $animalid; ?></td>
        </tr>
        <tr>
            <th>Old Animal ID</th>
            <td><?php echo $oldId; ?></td>
        </tr>
        <tr>
            <th>Animal Category</th>
            <td><?php echo $category; ?></td>
        </tr>
        <tr>
            <th>Sex</th>
            <td><?php echo $sex; ?></td>
        </tr>
        <tr>
            <th>Status</th>
            <td><?php echo $status; ?></td>
        </tr>
        <tr>
            <th>Breed</th>
            <td><?php echo $breed; ?></td>
        </tr>
        <tr>
            <th>Source</th>
            <td><?php echo $source; ?></td>
        </tr>
    </table>
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