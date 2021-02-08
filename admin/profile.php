<?php

include "includes/header.php";

?>

<link rel="stylesheet" type="text/css" href="assets/css/profile.css">

<div class="content">
        <div class="container-fluid">
          
        	<div class="main-content">
    
    <!-- Header -->
    <div class="header pb-8 pt-5 pt-lg-8 d-flex align-items-center" style="background-image: url(assets/img/profile.jpg); background-size: cover; background-position: center top;">
      <!-- Mask -->
      <span class="mask bg-gradient-default opacity-8"></span>
      <!-- Header container -->
      <div class="container-fluid d-flex align-items-center">
        <div class="row">
		<div class="col-lg-7 col-md-10">
            <h1 class="display-2 text-white">Hello <?php echo $_SESSION['u_name']; ?></h1>
            <p class="text-white mt-0 mb-5">This is your profile page.Here you can see all the information about you.</p>
            <a href="edit.php?do=edit_user&editID=<?php echo $_SESSION['u_id'];?>" class="btn btn-info">Edit profile</a>
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
                    <img src="assets/img/users/<?php echo $_SESSION['u_photo']; ?>">
                  </a>
                </div>
              </div>
            </div>
            <!-- <div class="card-header text-center border-0 pt-8 pt-md-4 pb-0 pb-md-4">
              <div class="d-flex justify-content-between">
                <a href="#" class="btn btn-sm btn-info mr-4">Connect</a>
                <a href="#" class="btn btn-sm btn-default float-right">Message</a>
              </div>
            </div> -->
            <div class="card-body pt-0 pt-md-4">
              <div class="row">
                <div class="col">
                  <div class="card-profile-stats d-flex justify-content-center mt-md-5">
                    <!-- <div>
                      <span class="heading">22</span>
                      <span class="description">Friends</span>
                    </div>
                    <div>
                      <span class="heading">10</span>
                      <span class="description">Photos</span>
                    </div>
                    <div>
                      <span class="heading">89</span>
                      <span class="description">Comments</span>
                    </div> -->
                  </div>
                </div>
              </div>
              <div class="text-center info">
                <h3>
                  <?php echo $_SESSION['u_name']; ?>
                </h3>
                <h3>
                	<?php

                	$role = $_SESSION['u_type'];

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
                <!-- <div class="h5 mt-4">
                  <i class="ni business_briefcase-24 mr-2"></i>Solution Manager - Creative Tim Officer
                </div>
                <div>
                  <i class="ni education_hat mr-2"></i>University of Computer Science
                </div>
                <hr class="my-4">
                <p>Ryan — the name taken by Melbourne-raised, Brooklyn-based Nick Murphy — writes, performs and records all of his own music.</p>
                <a href="#">Show more</a> -->
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
                <!-- <div class="col-4 text-right">
                  <a href="#!" class="btn btn-sm btn-primary">Settings</a>
                </div> -->
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
                        	<?php echo $_SESSION['u_name']; ?>
                        </p>
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group focused">
                        <label class="form-control-label" for="input-username">Email</label>
                        <p class="form-control form-control-alternative">
                        	<?php echo $_SESSION['u_mail']; ?>
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
                        	<?php echo $_SESSION['u_contact']; ?>
                        </p>
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group focused">
                        <label class="form-control-label" for="input-username">Address</label>
                        <p class="form-control form-control-alternative">
                        	<?php echo $_SESSION['u_address']; ?>
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
                    <p class="form-control form-control-alternative"><?php echo $_SESSION['u_about']; ?></p>
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
      </div>


<?php

include "includes/footer.php";

?>