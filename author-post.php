<?php

     include "includes/header.php";

?>
<div class="container">

<div class="row">
  <div class="col-lg-4 mb-5 mb-sm-2">
    <div class="author-box border p-5">
              <div class="text-center">

                <?php

                if(isset($_GET['author_id'])){

                  $author_id = $_GET['author_id'];

                  // Read Operation For User

                $query1 = "SELECT * FROM user WHERE u_id='$author_id'";
                $send1 = mysqli_query($db,$query1);

                while($response1 = mysqli_fetch_assoc($send1)){

                  $u_id = $response1['u_id'];
                  $u_photo = $response1['u_photo'];
                  $u_name = $response1['u_name'];
                  $u_pass = $response1['u_pass'];
                  $u_address = $response1['u_address'];
                  $u_mail = $response1['u_mail'];
                  $u_contact = $response1['u_contact'];
                  $u_type = $response1['u_type'];
                  $u_about = $response1['u_about'];

                  ?>

                  <img
                  src="admin/assets/img/users/<?php echo $u_photo; ?>"
                  alt="Author"
                  class="img-lg img-fluid img-rounded mb-3"
                />
                <p class="fs-12 m-0">
                  <?php

                if($u_type == 0){
                  echo '<span class="badge badge-danger">Admin</span>';
                }
                elseif ($u_type == 1) {
                  echo '<span class="badge badge-success">Subscriber</span>';
                }
                elseif ($u_type == 2) {
                  echo '<span class="badge badge-dark">Editor</span>';
                }

                ?>
                </p>
                <h5 class="mb-2 font-weight-medium"><?php echo $u_name; ?></h5>
                <ul class="social-media justify-content-center p-0 mt-3 mb-4">
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
              <p style="text-align: center;">
                <?php echo $u_about; ?>
              </p>
               </div>
              </div>
              <div class="col-lg-8">
                <div class="row mb-4">

                  <?php

                  // Read operation of post 

                  $query2 = "SELECT * FROM post WHERE author_id='$u_id' ORDER BY p_id DESC";
                  $send2 = mysqli_query($db,$query2);

                  while($response2 = mysqli_fetch_assoc($send2)){

                    $p_id = $response2['p_id'];
                    $p_thumbnail = $response2['p_thumbnail'];
                    $p_title = $response2['p_title'];
                    $p_des = $response2['p_des'];
                    $p_date = $response2['p_date'];
                    $cat_id = $response2['cat_id'];
                    $author_id = $response2['author_id'];
                    $comment_id = $response2['comment_id'];
                    $p_status = $response2['p_status'];

                    //Category Name Read operation

                    $query3 = "SELECT cat_name FROM category WHERE cat_id='$cat_id'";
                    $send3 = mysqli_query($db,$query3);

                    while($response3 = mysqli_fetch_assoc($send3)){

                      $cat_name = $response3['cat_name'];

                      ?>

                    <div class="col-sm-6  mb-5 mb-sm-2">
                    <div class="position-relative image-hover">
                      <img
                        src="admin/assets/img/posts/<?php echo $p_thumbnail; ?>"
                        class="img-fluid"
                        alt="world-news"
                      />
                      <span class="thumb-title"><?php echo $cat_name; ?></span>
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
              </div>
                  <?php

                }

                }

                ?>

                
           
</div>

</div>
<!-- main-panel ends -->
<!-- container-scroller ends -->

<?php

include "includes/footer.php";

?>