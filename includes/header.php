<?php

include "admin/includes/connection.php";

ob_start();
session_start();

?>

<!DOCTYPE html>
<html lang="zxx">
  <head>
    <!-- Required meta tags -->
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Our Times</title>
    <!-- plugin css for this page -->
    <link
      rel="stylesheet"
      href="./assets/vendors/mdi/css/materialdesignicons.min.css"
    />
    <link rel="stylesheet" href="./assets/vendors/aos/dist/aos.css/aos.css" />
    <link
      rel="stylesheet"
      href="./assets/vendors/owl.carousel/dist/assets/owl.carousel.min.css"
    />
    <link
      rel="stylesheet"
      href="./assets/vendors/owl.carousel/dist/assets/owl.theme.default.min.css"
    />
    <!-- End plugin css for this page -->
    <!-- <link rel="shortcut icon" href="assets/images/favicon.png" /> -->
    <!-- inject:css -->
    <link rel="stylesheet" href="assets/css/style.css">
    <!-- endinject -->
  </head>

  <body>
    <div class="container-scroller">
      <div class="main-panel">
      <header id="header">
          <div class="container">
            <!-- partial:partials/_navbar.html -->
            <nav class="navbar navbar-expand-lg navbar-light">
              <div class="d-flex justify-content-between align-items-center navbar-top">
                <ul class="navbar-left">
                  <!-- <li>Wed, March 4, 2020</li>
                  <li>30°C,London</li> -->
                </ul>
                <div>
                  <a class="navbar-brand" href="index.php"
                    style="font-weight: bold;font-size: 30px;"
                    >OUR TIMES</a>
                </div>
                <div class="d-flex">
                  <ul class="navbar-right">
                    <!-- <li>
                      <a href="#">ENGLISH</a>
                    </li>
                    <li>
                      <a href="#">ESPAÑOL</a>
                    </li> -->
                  </ul>
                  <ul class="social-media">
                    <li>
                      <a href="admin/index.php" target="_blank" style="font-size: 10px;">Log In</a>
                    </li>
                    <li>
                      <a href="admin/regestration.php" target="_blank" style="font-size: 10px;">Sign Up</a>
                    </li>
                  </ul>
                </div>
              </div>
              <div class="navbar-bottom-menu">
                <button
                  class="navbar-toggler"
                  type="button"
                  data-target="#navbarSupportedContent"
                  aria-controls="navbarSupportedContent"
                  aria-expanded="false"
                  aria-label="Toggle navigation"
                >
                  <span class="navbar-toggler-icon"></span>
                </button>

                <div
                  class="navbar-collapse justify-content-center collapse"
                  id="navbarSupportedContent"
                >
                  <ul
                    class="navbar-nav d-lg-flex justify-content-between align-items-center"
                  >
                    <li>
                      <button class="navbar-close">
                        <i class="mdi mdi-close"></i>
                      </button>
                    </li>
                    <li class="nav-item active">
                      <a class="nav-link active" href="index.php">Home</a>
                    </li>

                    <?php

                    // Read All Category From The Database

                    $query1 = "SELECT * FROM category ORDER BY cat_name ASC";

                    $send1 = mysqli_query($db,$query1);

                    while($response = mysqli_fetch_assoc($send1)){
                      $cat_id = $response['cat_id'];
                      $cat_name = $response['cat_name'];
                      $cat_des = $response['cat_des'];

                      ?>

                      <li class="nav-item">
                      <a class="nav-link" href="archive.php?cat_no=<?php echo $cat_id; ?>"><?php echo $cat_name; ?></a>
                      </li>

                      <?php

                      }

                    ?>
                    <li class="nav-item">
                      <a class="nav-link" href="author.php">Author</a>
                    </li>
                  </ul>
                </div>
              </div>
            </nav>

            <!-- partial -->
          </div>
      </header>