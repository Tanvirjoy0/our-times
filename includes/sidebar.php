<div class="col-lg-4">
    <div class="row">
      <div>
      <form class="search-container" style="margin-top: 0!important;margin-bottom: 10px!important;width: 350px!important;" method="POST">
        <input type="text" placeholder="Search.." name="search" />
      <button type="submit"><i class="mdi mdi-magnify"></i></button>
      </form>
    </div>
    </div>
    <div class="row">
      <div class="d-flex position-relative float-left">
      <h3 class="section-title" style="margin-bottom: 5px!important;">Recent Post</h3>
    </div>
    </div>

     <div class="row" style="margin-bottom: 25px">
      <?php

    // Read Post From Database

          $query3 = "SELECT * FROM post WHERE p_status=1 ORDER BY p_id DESC LIMIT 6";
          $send3 = mysqli_query($db,$query3);
          $i = 0;

          while($response1 = mysqli_fetch_assoc($send3)){

            $p_id = $response1['p_id'];
            $p_thumbnail = $response1['p_thumbnail'];
            $p_title = $response1['p_title'];
            $p_des = $response1['p_des'];
            $p_date = $response1['p_date'];
            $cat1_id = $response1['cat_id'];
            $author_id = $response1['author_id'];
            $comment_id = $response1['comment_id'];
            $p_status = $response1['p_status'];

            // User Info from database

            $query4 = "SELECT * FROM user WHERE u_id='$author_id'";
            $send4 = mysqli_query($db,$query4);
            $i = 0;

            while($response4 = mysqli_fetch_assoc($send4)){

              $u_id = $response4['u_id'];
              $u_photo = $response4['u_photo'];
              $u_name = $response4['u_name'];
              $u_pass = $response4['u_pass'];
              $u_address = $response4['u_address'];
              $u_mail = $response4['u_mail'];
              $u_contact = $response4['u_contact'];
              $u_type = $response4['u_type'];
              $u_about = $response4['u_about'];


              ?>

              <div class="col-sm-6">
        <div class="py-3">
          <div class="d-flex align-items-center pb-2">
            <img
              src="admin/assets/img/users/<?php echo $u_photo; ?>"
              class="img-xs img-rounded mr-2"
              alt="thumb"
            />
            <span class="fs-12 text-muted"><?php echo $u_name; ?></span>
          </div>
          <p class="fs-14 m-0 font-weight-medium line-height-sm">
            <a style="color: black" href="single.php?p_id=<?php echo $p_id; ?>">
                <?php echo $p_title; ?>
                </a>
          </p>
        </div>
      </div>

              <?php
            
          }

          }


    ?>
      
    </div>
    <div class="row">
    <div class="col-sm-12">
          <div class="d-flex position-relative float-left">
            <h3 class="section-title">Recent Comments</h3>
          </div>
        </div>
        <div class="col-sm-12">
          <div class="border-bottom pb-3">
            <h5 class="font-weight-600 mt-0 mb-0">
              South Korea’s Moon Jae-in sworn in vowing address
            </h5>
            <p class="text-color m-0 d-flex align-items-center">
              <span class="fs-10 mr-1">2 hours ago</span>
              <i class="mdi mdi-bookmark-outline mr-3"></i>
              <span class="fs-10 mr-1">126</span>
              <i class="mdi mdi-comment-outline"></i>
            </p>
          </div>
        </div>
        <div class="col-sm-12">
          <div class="border-bottom pt-4 pb-3">
            <h5 class="font-weight-600 mt-0 mb-0">
              South Korea’s Moon Jae-in sworn in vowing address
            </h5>
            <p class="text-color m-0 d-flex align-items-center">
              <span class="fs-10 mr-1">2 hours ago</span>
              <i class="mdi mdi-bookmark-outline mr-3"></i>
              <span class="fs-10 mr-1">126</span>
              <i class="mdi mdi-comment-outline"></i>
            </p>
          </div>
        </div>
        <div class="col-sm-12">
          <div class="border-bottom pt-4 pb-3">
            <h5 class="font-weight-600 mt-0 mb-0">
              South Korea’s Moon Jae-in sworn in vowing address
            </h5>
            <p class="text-color m-0 d-flex align-items-center">
              <span class="fs-10 mr-1">2 hours ago</span>
              <i class="mdi mdi-bookmark-outline mr-3"></i>
              <span class="fs-10 mr-1">126</span>
              <i class="mdi mdi-comment-outline"></i>
            </p>
          </div>
        </div>
        <div class="col-sm-12">
          <div class="pt-4">
            <h5 class="font-weight-600 mt-0 mb-0">
              South Korea’s Moon Jae-in sworn in vowing address
            </h5>
            <p class="text-color m-0 d-flex align-items-center">
              <span class="fs-10 mr-1">2 hours ago</span>
              <i class="mdi mdi-bookmark-outline mr-3"></i>
              <span class="fs-10 mr-1">126</span>
              <i class="mdi mdi-comment-outline"></i>
            </p>
          </div>
        </div>
    </div>
  </div>