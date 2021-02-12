<?php

     include "includes/header.php";

?>
<div class="container">
<!-- <div class="banner-top-thumb-wrap">
  <div class="d-lg-flex justify-content-between align-items-center">
    <div class="d-flex justify-content-between  mb-3 mb-lg-0">
      <div>
        <img
          src="assets/images/dashboard/star-magazine-1.jpg"
          alt="thumb"
          class="banner-top-thumb"
        />
      </div>
      <h5 class="m-0 font-weight-bold">
        The morning after: What people
      </h5>
    </div>
    <div class="d-flex justify-content-between mb-3 mb-lg-0">
      <div>
        <img
          src="assets/images/dashboard/star-magazine-2.jpg"
          alt="thumb"
          class="banner-top-thumb"
        />
      </div>
      <h5 class="m-0 font-weight-bold">How Hungary produced the</h5>
    </div>
    <div class="d-flex justify-content-between mb-3 mb-lg-0">
      <div>
        <img
          src="assets/images/dashboard/star-magazine-3.jpg"
          alt="thumb"
          class="banner-top-thumb"
        />
      </div>
      <h5 class="m-0 font-weight-bold">
        A sleepy island paradise's most
      </h5>
    </div>
    <div class="d-flex justify-content-between mb-3 mb-lg-0">
      <div>
        <img
          src="assets/images/dashboard/star-magazine-4.jpg"
          alt="thumb"
          class="banner-top-thumb"
        />
      </div>
      <h5 class="m-0 font-weight-bold">
        America's most popular national
      </h5>
    </div>
  </div>
</div> -->
<div class="row">
  <div class="col-lg-8">
    <div class="owl-carousel owl-theme" id="main-banner-carousel">
      <?php

          // Read Post From Database

          $query1 = "SELECT * FROM post WHERE p_status=1 ORDER BY p_id ASC";
          $send1 = mysqli_query($db,$query1);

          while($response1 = mysqli_fetch_assoc($send1)){

            $p_id = $response1['p_id'];
            $p_thumbnail = $response1['p_thumbnail'];
            $p_title = $response1['p_title'];
            $p_des = $response1['p_des'];
            $p_date = $response1['p_date'];
            $cat1_id = $response1['cat_id'];
            $author_id = $response1['author_id'];
            $comment_id = $response1['comment_id'];
            $p_status = $response1['p_status'];

            ?>
            
            <div class="item">
        <div class="carousel-content-wrapper mb-2">
          <div class="carousel-content">
            <h1 class="font-weight-bold">
              <a style="color: white" href="single.php?p_id=<?php echo $p_id; ?>">
                <?php echo $p_title; ?>
                </a>
            </h1>
            <!-- <h5 class="font-weight-normal  m-0">
              <?php echo $p_des; ?>
            </h5> -->
            <p class="text-color m-0 pt-2 d-flex align-items-center">
              <span class="fs-10 mr-1"><?php echo $p_date; ?></span>
              <i class="mdi mdi-bookmark-outline mr-3"></i>
              <span class="fs-10 mr-1">
              
              <?php

              // Read Category Name From Database

              $query2 = "SELECT * FROM category WHERE cat_id='$cat1_id'";
                      $send2 = mysqli_query($db,$query2);
                      $i = 0;

                      while($response = mysqli_fetch_assoc($send2)){
                        $cat2_id = $response['cat_id'];
                        $cat_name = $response['cat_name'];
                        $cat_des = $response['cat_des'];
                        }

                        echo $cat_name;

              ?>
                
              </span>
              <i class="mdi mdi-comment-outline"></i>
            </p>
          </div>
          <div class="carousel-image">
            <img style="max-height: 500px;" src="admin/assets/img/posts/<?php echo $p_thumbnail; ?>" />
          </div>
        </div>
      </div>
      

            <?php

            }

          ?>
      </div>
    
  </div>
  <div class="col-lg-4">
    <div class="row">
      <div>
      <form method="POST" action="search.php" class="search-container" style="margin-top: 0!important;margin-bottom: 10px!important;width: 350px!important;" method="POST">
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

     <div class="row">
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
  </div>
</div>
<!-- <div class="world-news">
  <div class="row">
    <div class="col-sm-12">
      <div class="d-flex position-relative  float-left">
        <h3 class="section-title">World News</h3>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-lg-3 col-sm-6 grid-margin mb-5 mb-sm-2">
      <div class="position-relative image-hover">
        <img
          src="assets/images/dashboard/travel.jpg"
          class="img-fluid"
          alt="world-news"
        />
        <span class="thumb-title">TRAVEL</span>
      </div>
      <h5 class="font-weight-bold mt-3">
        Refugees flood Turkey's border with Greece
      </h5>
      <p class="fs-15 font-weight-normal">
        Lorem Ipsum has been the industry's standard dummy text
      </p>
      <a href="#" class="font-weight-bold text-dark pt-2"
        >Read Article</a
      >
    </div>
    <div class="col-lg-3 col-sm-6 mb-5 mb-sm-2">
      <div class="position-relative image-hover">
        <img
          src="assets/images/dashboard/news.jpg"
          class="img-fluid"
          alt="world-news"
        />
        <span class="thumb-title">NEWS</span>
      </div>
      <h5 class="font-weight-bold mt-3">
        South Korea’s Moon Jae-in sworn in vowing address
      </h5>
      <p class="fs-15 font-weight-normal">
        Lorem Ipsum has been the industry's standard dummy text
      </p>
      <a href="#" class="font-weight-bold text-dark pt-2"
        >Read Article</a
      >
    </div>
    <div class="col-lg-3 col-sm-6 mb-5 mb-sm-2">
      <div class="position-relative image-hover">
        <img
          src="assets/images/dashboard/art.jpg"
          class="img-fluid"
          alt="world-news"
        />
        <span class="thumb-title">ART</span>
      </div>
      <h5 class="font-weight-bold mt-3">
        These puppies are training to assist in avalanche rescue
      </h5>
      <p class="fs-15 font-weight-normal">
        Lorem Ipsum has been the industry's standard dummy text
      </p>
      <a href="#" class="font-weight-bold text-dark pt-2"
        >Read Article</a
      >
    </div>
    <div class="col-lg-3 col-sm-6 mb-5 mb-sm-2">
      <div class="position-relative image-hover">
        <img
          src="assets/images/dashboard/business.jpg"
          class="img-fluid"
          alt="world-news"
        />
        <span class="thumb-title">BUSINESS</span>
      </div>
      <h5 class="font-weight-bold mt-3">
        'Love Is Blind' couple opens up about their first year
      </h5>
      <p class="fs-15 font-weight-normal">
        Lorem Ipsum has been the industry's standard dummy text
      </p>
      <a href="#" class="font-weight-bold text-dark pt-2"
        >Read Article</a
      >
    </div>
  </div>
</div>
<div class="editors-news">
  <div class="row">
    <div class="col-lg-3">
      <div class="d-flex position-relative float-left">
        <h3 class="section-title">Popular News</h3>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-lg-6  mb-5 mb-sm-2">
      <div class="position-relative image-hover">
        <img
          src="assets/images/dashboard/glob.jpg"
          class="img-fluid"
          alt="world-news"
        />
        <span class="thumb-title">NEWS</span>
      </div>
      <h1 class="font-weight-600 mt-3">
        Melania Trump speaks about courage at State Department
      </h1>
      <p class="fs-15 font-weight-normal">
        Lorem Ipsum has been the industry's standard dummy text ever
        since the 1500s, when an unknown printer took a galley of type
        and
      </p>
    </div>
    <div class="col-lg-6  mb-5 mb-sm-2">
      <div class="row">
        <div class="col-sm-6  mb-5 mb-sm-2">
          <div class="position-relative image-hover">
            <img
              src="assets/images/dashboard/star-magazine-5.jpg"
              class="img-fluid"
              alt="world-news"
            />
            <span class="thumb-title">POLITICS</span>
          </div>
          <h5 class="font-weight-600 mt-3">
            A look at California's eerie plane graveyards
          </h5>
          <p class="fs-15 font-weight-normal">
            Lorem Ipsum has been the industry's standard dummy text
          </p>
        </div>
        <div class="col-sm-6  mb-5 mb-sm-2">
          <div class="position-relative image-hover">
            <img
              src="assets/images/dashboard/star-magazine-6.jpg"
              class="img-fluid"
              alt="world-news"
            />
            <span class="thumb-title">TRAVEL</span>
          </div>
          <h5 class="font-weight-600 mt-3">
            The world's most beautiful racecourses
          </h5>
          <p class="fs-15 font-weight-normal">
            Lorem Ipsum has been the industry's standard dummy text
          </p>
        </div>
      </div>
      <div class="row mt-3">
        <div class="col-sm-6  mb-5 mb-sm-2">
          <div class="position-relative image-hover">
            <img
              src="assets/images/dashboard/star-magazine-7.jpg"
              class="img-fluid"
              alt="world-news"
            />
            <span class="thumb-title">POLITICS</span>
          </div>
          <h5 class="font-weight-600 mt-3">
            Japan cancels cherry blossom festivals over virus fears
          </h5>
          <p class="fs-15 font-weight-normal">
            Lorem Ipsum has been the industry's standard dummy text
          </p>
        </div>
        <div class="col-sm-6">
          <div class="position-relative image-hover">
            <img
              src="assets/images/dashboard/star-magazine-8.jpg"
              class="img-fluid"
              alt="world-news"
            />
            <span class="thumb-title">TRAVEL</span>
          </div>
          <h5 class="font-weight-600 mt-3">
            Classic cars reborn as electric vehicles
          </h5>
          <p class="fs-15 font-weight-normal">
            Lorem Ipsum has been the industry's standard dummy text
          </p>
        </div>
      </div>
    </div>
  </div>
</div> -->
<div class="popular-news">
  <div class="row">
    <div class="col-lg-3">
      <div class="d-flex position-relative float-left">
        <h3 class="section-title">All Posts</h3>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-lg-9">
      <div class="row">

        <?php

        // Read operation 

  $query5 = "SELECT * FROM post WHERE p_status=1 ORDER BY p_id DESC";
  $send5 = mysqli_query($db,$query5);

  while($response5 = mysqli_fetch_assoc($send5)){

    $p_id = $response5['p_id'];
    $p_thumbnail = $response5['p_thumbnail'];
    $p_title = $response5['p_title'];
    $p_des = $response5['p_des'];
    $p_date = $response5['p_date'];
    $cat_id5 = $response5['cat_id'];
    $author_id = $response5['author_id'];
    $comment_id = $response5['comment_id'];
    $p_status = $response5['p_status'];

    $query6 = "SELECT * FROM category WHERE cat_id='$cat_id5'";
    $send6 = mysqli_query($db,$query6);

    while($response6 = mysqli_fetch_assoc($send6)){
      $cat_id6 = $response6['cat_id'];
      $cat_name6 = $response6['cat_name'];
      $cat_des6 = $response6['cat_des'];

      ?>

      <div class="col-sm-4  mb-5 mb-sm-2">
          <div class="position-relative image-hover img1">
            <img
              src="admin/assets/img/posts/<?php echo $p_thumbnail; ?>"
              class="img-fluid"
              alt="world-news"
            />
            <span class="thumb-title"><?php echo $cat_name6; ?></span>
          </div>
          <h5 class="font-weight-600 mt-3">
            <a style="color: black" href="single.php?p_id=<?php echo $p_id; ?>">
                <?php echo $p_title; ?>
                </a>
          </h5>
        </div>

      <?php
    }
    }
        ?>

        
      </div>
      <!-- <div class="row mt-3">
        <div class="col-sm-4 mb-5 mb-sm-2">
          <div class="position-relative image-hover">
            <img
              src="assets/images/dashboard/star-magazine-12.jpg"
              class="img-fluid"
              alt="world-news"
            />
            <span class="thumb-title">NEWS</span>
          </div>
          <h5 class="font-weight-600 mt-3">
            Japanese chef carves food into incredible pieces of art
          </h5>
        </div>
        <div class="col-sm-4 mb-5 mb-sm-2">
          <div class="position-relative image-hover">
            <img
              src="assets/images/dashboard/star-magazine-13.jpg"
              class="img-fluid"
              alt="world-news"
            />
            <span class="thumb-title">NEWS</span>
          </div>
          <h5 class="font-weight-600 mt-3">
            The Misanthrope Society: A Taipei bar for people who
          </h5>
        </div>
        <div class="col-sm-4 mb-5 mb-sm-2">
          <div class="position-relative image-hover">
            <img
              src="assets/images/dashboard/star-magazine-14.jpg"
              class="img-fluid"
              alt="world-news"
            />
            <span class="thumb-title">TOURISM</span>
          </div>
          <h5 class="font-weight-600 mt-3">
            From Pakistan to the Caribbean: Curry's journey
          </h5>
        </div>
      </div> -->
    </div>
    <div class="col-lg-3">
      <!-- <div class="position-relative mb-3">
        <img
          src="assets/images/dashboard/star-magazine-15.jpg"
          class="img-fluid"
          alt="world-news"
        />
        <div class="video-thumb text-muted">
          <span><i class="mdi mdi-menu-right"></i></span>LIVE
        </div>
      </div> -->
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
  </div>
</div>
</div>
<!-- main-panel ends -->
<!-- container-scroller ends -->

        <?php

        include "includes/footer.php";

        ?>
