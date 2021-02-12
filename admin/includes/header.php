<?php

include "connection.php";

include "functions.php";

session_start();

if(empty($_SESSION['u_mail'])){

  echo "<script type='text/javascript'>alert('Please Login First');
              window.location='index.php';
              </script>";

}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    Our Times
  </title>
  <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">

  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
  <!-- CSS Files -->
  <link href="assets/css/material-dashboard.css" rel="stylesheet" />
</head>

<body class="">
  <?php
  ob_start();
  ?>
  <div >
    <div class="sidebar" data-color="purple" data-background-color="white" data-image="assets/img/sidebar-1.jpg">
      <div class="logo"><a href="../index.php" target="_blank" class="simple-text logo-normal">
          Our Times
        </a></div>
      <div class="sidebar-wrapper">
        <ul class="nav">
          
          <?php

          if($_SESSION['u_type'] == 0){
            ?>

            <li class="nav-item active">
            <a class="nav-link" href="profile.php">
              <i class="material-icons">dashboard</i>
              <p>Dashboard</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="category.php">
              <i class="material-icons">category</i>
              <p>Category</p>
            </a>
          </li>
          
          <div class="dropdown show">
          <li class="nav-item ">
          <a class="nav-link" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" href="./user.php">
          <i class="material-icons">supervisor_account</i>
          <p>User</p>
          </a>

          <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
            <a class="dropdown-item nav-link" href="user.php?do=view_all">All Users</a>
            <a class="dropdown-item nav-link" href="user.php?do=add_new">Add New User</a>
          </div>
          </li>
          </div>
          
          <div class="dropdown show">
          <li class="nav-item ">
          <a class="nav-link" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" href="./post.php">
          <i class="material-icons">article</i>
          <p>Post</p>
          </a>

          <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
            <a class="dropdown-item nav-link" href="post.php?do=view_all">All Posts</a>
            <a class="dropdown-item nav-link" href="post.php?do=add_new_post">Add New Post</a>

            <?php
          }


          if($_SESSION['u_type'] == 2){
            ?>
            <div class="dropdown show">
          <li class="nav-item ">
          <a class="nav-link" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" href="./post.php">
          <i class="material-icons">article</i>
          <p>Post</p>
          </a>

          <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
            <a class="dropdown-item nav-link" href="post.php?do=view_all">All Posts</a>
            <a class="dropdown-item nav-link" href="post.php?do=add_new_post">Add New Post</a>
            <?php
          }

          if($_SESSION['u_type'] == 1){
            ?>
            <a style="display: flex;align-items: center;" class="nav-link" href="post.php?do=add_new_post">
          <i 
          class="material-icons"
          style="font-size: 30px;
          margin-right: 6px;"
          >
          post_add
          </i>

          <p
          style="color: rgba(102, 112, 124, 1);
          font-size: 20px;"
          >
          Add New Post
          </p>

          </a>

            <?php
          }

          ?>
          
          </div>
          </li>
          </div>
          <?php 

          if(($_SESSION['u_type'] == 0) || ($_SESSION['u_type'] == 2)){
            ?>
            <li class="nav-item ">
            <a class="nav-link" href="comment.php">
              <i class="material-icons">comment_bank</i>
              <p>Comment</p>
            </a>
          </li>
            <?php
          }else{

          }

          ?>
       </ul>
      </div>
    </div>
    <div class="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <a class="navbar-brand" href="javascript:;">Dashboard</a>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="sr-only">Toggle navigation</span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end">
            <form class="navbar-form">
              <div class="input-group no-border">
                <input type="text" value="" class="form-control" placeholder="Search">
                <button type="submit" class="btn btn-white btn-round btn-just-icon">
                  <i class="material-icons">search</i>
                  <div class="ripple-container"></div>
                </button>
              </div>
            </form>
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link" href="javascript:;">
                  <i class="material-icons">dashboard</i>
                  <p class="d-lg-none d-md-block">
                    Stats
                  </p>
                </a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="material-icons">notifications</i>
                  <span class="notification">5</span>
                  <p class="d-lg-none d-md-block">
                    Some Actions
                  </p>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                  <a class="dropdown-item" href="#">Mike John responded to your email</a>
                  <a class="dropdown-item" href="#">You have 5 new tasks</a>
                  <a class="dropdown-item" href="#">You're now friend with Andrew</a>
                  <a class="dropdown-item" href="#">Another Notification</a>
                  <a class="dropdown-item" href="#">Another One</a>
                </div>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link" href="javascript:;" id="navbarDropdownProfile" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="material-icons">person</i>
                  <p class="d-lg-none d-md-block">
                    Account
                  </p>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownProfile">
                  <a class="dropdown-item" href="#">Settings</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="profile.php">Profile</a>
                  <a class="dropdown-item" href="includes/logout.php">Log out</a>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      <!-- End Navbar -->
