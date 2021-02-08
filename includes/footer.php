<!-- partial:partials/_footer.html -->
        <footer>
          <div class="container">
            <div class="row">
              <div class="col-sm-12">
                <div class="border-top"></div>
              </div>
              <div class="col-sm-3 col-lg-3">
                <ul class="footer-vertical-nav">
                  <li class="menu-title"><a hr>Recent Posts</a></li>

                  <?php
                  
          $query1 = "SELECT * FROM post WHERE p_status=1 ORDER BY p_id ASC LIMIT 5";
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

              <li><a href=""><?php echo $p_title; ?></a></li>

              <?php
            }
          ?>

                  
                </ul>
              </div>
              <div class="col-sm-3 col-lg-3">
                <ul class="footer-vertical-nav">
                  <li class="menu-title"><a>Category</a></li>

                  <!-- Read Operation Start from here -->

                  <?php

                      $query1 = "SELECT * FROM category";
                      $send1 = mysqli_query($db,$query1);

                      while($response = mysqli_fetch_assoc($send1)){
                        $cat_id1 = $response['cat_id'];
                        $cat_name = $response['cat_name'];
                        $cat_des = $response['cat_des'];

                        // Read Post From Database

                        $query2 = "SELECT * FROM post WHERE cat_id='$cat_id1'";
                        $send2 = mysqli_query($db,$query2);
                        $count2 = mysqli_num_rows($send2);

                        ?>

                      <li>
                        <a href="#"><?php echo $cat_name; ?>
                      <span>
                        <?php echo '('.$count2.')' ?>
                      </span>
                      </a>
                      </li>

                        <?php

                      }


                  ?>

                  
                </ul>
              </div>
              <div class="col-sm-3 col-lg-3">
                <ul class="footer-vertical-nav">
                  <li class="menu-title"><a href="#">Features</a></li>
                  <li><a href="#">Photography</a></li>
                  <li><a href="#">Video</a></li>
                  <li><a href="pages/news-post.html">Newsletters</a></li>
                  <li><a href="#">Live Events</a></li>
                  <li><a href="#">Stores</a></li>
                  <li><a href="#">Jobs</a></li>
                </ul>
              </div>
              <div class="col-sm-3 col-lg-3">
                <ul class="footer-vertical-nav">
                  <li class="menu-title"><a href="#">More</a></li>
                  <li><a href="#">RSS</a></li>
                  <li><a href="#">FAQ</a></li>
                  <li><a href="#">User Agreement</a></li>
                  <li><a href="#">Privacy</a></li>
                  <li><a href="pages/aboutus.html">About us</a></li>
                  <li><a href="pages/contactus.html">Contact</a></li>
                </ul>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-12">
                <div class="d-flex justify-content-between">
                  <div>
                  <a class="navbar-brand"
                    style="font-weight: bold;font-size: 30px;"
                    >OUR TIMES</a>
                </div>

                  <div class="d-flex justify-content-end footer-social">
                    <h5 class="m-0 font-weight-600 mr-3 d-none d-lg-flex">Follow on</h5>
                    <ul class="social-media">
                      <li>
                        <a href="#">
                          <i class="mdi mdi-instagram"></i>
                        </a>
                      </li>
                      <li>
                        <a href="#">
                          <i class="mdi mdi-facebook"></i>
                        </a>
                      </li>
                      <li>
                        <a href="#">
                          <i class="mdi mdi-youtube"></i>
                        </a>
                      </li>
                      <li>
                        <a href="#">
                          <i class="mdi mdi-linkedin"></i>
                        </a>
                      </li>
                      <li>
                        <a href="#">
                          <i class="mdi mdi-twitter"></i>
                        </a>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-12">
                <div
                  class="d-lg-flex justify-content-between align-items-center border-top mt-5 footer-bottom"
                >
                  <ul class="footer-horizontal-menu">
                    <li><a href="#">Terms of Use.</a></li>
                    <li><a href="#">Privacy Policy.</a></li>
                    <li><a href="#">Accessibility & CC.</a></li>
                    <li><a href="#">AdChoices.</a></li>
                    <li><a href="#">Advertise with us Transcripts.</a></li>
                    <li><a href="#">License.</a></li>
                    <li><a href="#">Sitemap</a></li>
                  </ul>
                  <p class="font-weight-medium">
                    © 2020 <a target="_blank" class="text-dark">Tanvir Alam Joy.All Rights Reserved</a>
                  </p>
                </div>
              </div>
            </div>
          </div>
        </footer>
        <!-- partial -->
      </div>
    </div>
    <!-- inject:js -->
    <script src="assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- plugin js for this page -->
    <script src="./assets/vendors/owl.carousel/dist/owl.carousel.min.js"></script>
    <!-- End plugin js for this page -->
    <!-- Custom js for this page-->
    <script src="./assets/js/demo.js"></script>
    <!-- End custom js for this page-->
  </body>
</html>