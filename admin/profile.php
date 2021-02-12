<?php

include "includes/header.php";

?>

<link rel="stylesheet" type="text/css" href="assets/css/profile.css">

<div class="content">
        <div class="container-fluid">
          <?php 

          // Read User Info From Database

          $user0 = $_SESSION['u_id'];

          $query0 = "SELECT * FROM user WHERE u_id='$user0'";

          $send0 = mysqli_query($db,$query0);

          while($result0 = mysqli_fetch_assoc($send0)){

            $id0 = $result0['u_id'];
            $photo0 = $result0['u_photo'];
            $name0 = $result0['u_name'];
            $pass0 = $result0['u_pass'];
            $address0 = $result0['u_address'];
            $mail0 = $result0['u_mail'];
            $contact0 = $result0['u_contact'];
            $type0 = $result0['u_type'];
            $about0 = $result0['u_about'];

            ?>

          <div class="main-content">
    
    <!-- Header -->
    <div class="header pb-8 pt-5 pt-lg-8 d-flex align-items-center" style="background-image: url(assets/img/profile.jpg); background-size: cover; background-position: center top;">
      <!-- Mask -->
      <span class="mask bg-gradient-default opacity-8"></span>
      <!-- Header container -->
      <div class="container-fluid d-flex align-items-center">
        <div class="row">
    <div class="col-lg-12 col-md-12">
            <h1 class="display-2 text-white">Hello <br> <?php echo $name0; ?></h1>
            <p class="text-white mt-0 mb-5">This is your profile page.Here you can see all the information about you.</p>
            <a href="edit.php?do=edit_user&editID=<?php echo $id0;?>" class="btn btn-info">Edit profile</a>
          </div>
        </div>
      </div>
    </div>
    <!-- Page content -->
    <div class="container-fluid mt--7">
      <div class="row">
        <div class="col-xl-4 order-xl-2 mb-5 mb-xl-0">
          <div class="card card-profile shadow">
            <div class="row justify-content-center">
              <div class="col-lg-3 order-lg-2">
                <div class="card-profile-image">
                  <a href="#">
                    <img src="assets/img/users/<?php echo $photo0; ?>">
                  </a>
                </div>
              </div>
            </div>
            <div class="card-body pt-0 pt-md-4">
              <div class="row">
                <div class="col">
                  <div class="card-profile-stats d-flex justify-content-center mt-md-5">
                  </div>
                </div>
              </div>
              <div class="text-center info">
                <h3>
                  <?php echo $name0; ?>
                </h3>
                <h3>
                  <?php

                  $role = $type0;

                  if($role == 0){
                                echo '<span class="badge badge-danger">Admin</span>';
                              }
                              elseif ($role == 1) {
                                echo '<span class="badge badge-success">Subscriber</span>';
                              }
                              elseif ($role == 2) {
                                echo '<span class="badge badge-dark">Editor</span>';
                              }

                  ?>
                </h3>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-8 order-xl-1">
          <div class="card bg-secondary shadow">
            <div class="card-header bg-white border-0">
              <div class="row align-items-center">
                <div class="col-8">
                  <h3 class="mb-0">My account</h3>
                </div>
              </div>
            </div>
            <div class="card-body">
              <form>
                <h6 class="heading-small text-muted mb-4">User information</h6>
                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group focused">
                        <label class="form-control-label" for="input-username">User Name</label>
                        <p class="form-control form-control-alternative">
                          <?php echo $name0; ?>
                        </p>
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group focused">
                        <label class="form-control-label" for="input-username">Email</label>
                        <p class="form-control form-control-alternative">
                          <?php echo $mail0; ?>
                        </p>
                      </div>
                    </div>
                  </div>
                </div>
                <hr class="my-4">
                <!-- Address -->
                <h6 class="heading-small text-muted mb-4">Contact information</h6>
                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group focused">
                        <label class="form-control-label" for="input-username">Contact No</label>
                        <p class="form-control form-control-alternative">
                          <?php echo $contact0; ?>
                        </p>
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group focused">
                        <label class="form-control-label" for="input-username">Address</label>
                        <p class="form-control form-control-alternative">
                          <?php echo $address0; ?>
                        </p>
                      </div>
                    </div>
                  </div>
                </div>
                <hr class="my-4">
                <!-- Description -->
                <h6 class="heading-small text-muted mb-4">About me</h6>
                <div class="col-lg-12">
                  <div class="form-group focused">
                    <p class="form-control form-control-alternative"><?php echo $about0; ?></p>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

        </div>

            <?php

          }

          ?>
          
          
      </div>


<?php

include "includes/footer.php";

?>