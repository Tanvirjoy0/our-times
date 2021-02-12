<?php

     include "includes/header.php";

?>
<div class="container">

<div class="row">
  <div class="col-lg-12">
    <div class="row">

      <?php

      // Read Operation For User

      $query1 = "SELECT * FROM user ORDER BY u_name ASC";
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

        <div class="col-lg-4  mb-5 mb-sm-2">
            <div class="author-box border p-5">
              <div class="text-center">
                <img
                  src="admin/assets/img/users/<?php echo $u_photo; ?>"
                  alt="news"
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
              <center>
                <button class="btn btn-dark">
                  <a style="color: white;cursor: pointer;font-weight: 500px" href="author-post.php?author_id=<?php echo $u_id; ?>">
                  View Author's Post
                </a>
                </button>
              </center>
            </div>
      </div>

        <?php

      }

      ?>

      
    </div>
  </div>
</div>

</div>
<!-- main-panel ends -->
<!-- container-scroller ends -->

<?php

include "includes/footer.php";

?>