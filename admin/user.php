<?php

include "includes/header.php";

?>

<div class="content">
<div class="container-fluid">

<?php

$do = isset($_GET['do'])?$_GET['do']:'view_all';

// View All Users

if($do == 'view_all'){

?>

<div class="row">
            <div class="col-lg-12 col-md-12">
              <div class="card">
                <div class="card-header card-header-warning">
                  <h4 class="card-title">All Users List</h4>
                </div>
                <div class="card-body table-responsive">
                  <table class="table table-hover">
                    <thead class="text-warning">
                      <th>Serial</th>
                      <th>Photo</th>
                      <th>Name</th>
                      <th>Address</th>
                      <th>Email</th>
                      <th>Contact No</th>
                      <th>User Type</th>
                      <th>About</th>
                      <th>Action</th>
                    </thead>
                    <tbody>

                    <?php 

                    // Read Operation

                    $query1 = "SELECT * FROM user";
                    $send1 = mysqli_query($db,$query1);
                    $i = 0;

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
                    	$i++;

                    	?>

                    	<tr>
                        <td><?php echo $i; ?></td>
                        <td>
                        <img src="assets/img/users/<?php echo $u_photo; ?>" width="100px">
                    	</td>
                        <td><?php echo $u_name; ?></td>
                        <td><?php echo $u_address; ?></td>
                        <td><?php echo $u_mail; ?></td>
                        <td><?php echo $u_contact; ?></td>
                        <td>
                        	<div>
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
                            </div>
                        </td>

                        <td><?php echo substr($u_about, 0, 20); ?></td>

                        <td class="td-actions">
	                      <a href="user.php?do=edit_user&editID=<?php echo $u_id; ?>" type="button" rel="tooltip" title="Edit Task" class="btn btn-primary btn-link btn-sm">
	                        <i class="material-icons">edit</i>
	                      </a>
	                      <a href="user.php?do=dlt_user&deleteId=<?php echo $u_id; ?>" type="button" rel="tooltip" title="Remove" class="btn btn-danger btn-link btn-sm">
	                        <i class="material-icons">close</i>
	                      </a>
	                    </td>
                      </tr>

                    	<?php
                    }

                    ?>

                      
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>

<?php


}

// Add User

if($do == 'add_new'){

?>

<div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title">Add New User</h4>
                </div>
                <div class="card-body">
                  <div class="row">
                  	<div class="col-lg-12 col-md-12">

                  	<form method="POST" action="user.php?do=add_new_code" enctype="multipart/form-data">

                    <div class="row">
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Name</label>
                          <input type="text" class="form-control" name="name" required="required">
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Password</label>
                          <input type="password" class="form-control" name="password" required="required">
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Confirm Password</label>
                          <input type="password" class="form-control" name="re_pass" required="required">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Email</label>
                          <input type="email" class="form-control" required="required" name="email">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Contact No</label>
                          <input type="tel" class="form-control" required="required" name="phone">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">Address</label>
                          <input type="text" class="form-control" required="required" name="address">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                    	<div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">User Type</label>
                          <select class="form-control" name="role" required="required">
                          <option value="1">Subscriber</option>
                          <option value="2">Editor</option>
                          <option value="0">Admin</option>
                          </select>
                        </div>
                      </div>
                      <div class="col-md-6">
                          <label class="bmd-label-floating" style="margin-top: 18px!important">Image</label>

                        <div>
                          <input type="file" name="image" required="required">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label>About</label>
                          <div class="form-group">
                            <textarea name="about" class="form-control" rows="5"></textarea>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                    	<div class="col-md-12" class="form-group">
                    		<input type="submit" name="add_btn" value="Add User" style="background: #a03ab5; color: white; border: none; border: 1px solid #a03ab5; padding: 10px 10px;">
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


}

// Add User Code

if($do == 'add_new_code'){
  
	if($_SERVER['REQUEST_METHOD'] == 'POST'){

		$name = $_POST['name'];
		$password = $_POST['password'];
		$re_pass = $_POST['re_pass'];
		$email = $_POST['email'];
		$phone = $_POST['phone'];
		$address = $_POST['address'];
		$role = $_POST['role'];
		$about = $_POST['about'];
		$file = $_FILES['image']['name'];
		$tmp_file = $_FILES['image']['tmp_name'];

		// Array decleration of image file

		$extensions = array('png','jpg','jpeg');

		$extn = strtolower(end(explode('.', $_FILES['image']['name'])));

			if(in_array($extn,$extensions) === false){
				echo '<div class="alert alert-danger">Please Enter An Image With The Following Extensions (png,jpg or jpeg)</div>';
			}

			if(($password == $re_pass) && (in_array($extn,$extensions) === true)){

			if(strlen($password) < 5){
				echo '<div class="alert alert-danger">Please Enter At Least 5 Digit/Character!</div>';
			}else{

				$hashpassword = sha1($password);

				$update_name = rand().'_'.$file;

				move_uploaded_file($tmp_file, "assets/img/users/".$update_name);

				// Insert Operation

		$query2 = "INSERT INTO user(u_name,u_photo,u_pass,u_address,u_mail,u_contact,u_type,u_about) VALUES ('$name','$update_name','$hashpassword','$address','$email','$phone','$role','$about')";
		$send2 = mysqli_query($db,$query2);

		if($send2){
			header('LOCATION: user.php');
		}else{
			die("Insert User Info Into Database Error".mysqli_error($db));
		}

			}

		}else{
			echo '<div class="alert alert-danger">Please Enter Same Password!</div>';
		}


	}

}


// Edit User

if($do == 'edit_user'){

if(isset($_GET['editID'])){
  $editID = $_GET['editID'];

// Read Operation

  $query4 = "SELECT * FROM user WHERE u_id='$editID'";
  $send4 = mysqli_query($db,$query4);
  while($response4 = mysqli_fetch_assoc($send4)){

    $e_id = $response4['u_id'];
    $e_name = $response4['u_name'];
    $e_pass = $response4['u_pass'];
    $e_address = $response4['u_address'];
    $e_mail = $response4['u_mail'];
    $e_contact = $response4['u_contact'];
    $e_type = $response4['u_type'];
    $e_about = $response4['u_about'];
    $e_file = $response4['u_photo'];

  }

?>

  <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title">Edit User</h4>
                </div>
                <div class="card-body">
                  <div class="row">
                    <div class="col-lg-12 col-md-12">

                    <form method="POST" action="user.php?do=update" enctype="multipart/form-data">

                    <div class="row">
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Name</label>
                          <input type="text" class="form-control" name="up_name" value="<?php echo $e_name; ?>">
                          <input type="hidden" name="up_user_id" value="<?php echo $e_id; ?>">
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Password</label>
                          <input type="password" class="form-control" name="up_password">
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Confirm Password</label>
                          <input type="password" class="form-control" name="up_re_pass">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Email</label>
                          <input type="e_email" class="form-control" name="up_email" value="<?php echo $e_mail; ?>">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Contact No</label>
                          <input type="tel" class="form-control" name="up_phone" value="<?php echo $e_contact; ?>">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">Address</label>
                          <input type="text" class="form-control" name="up_address" value="<?php echo $e_address; ?>">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">User Type</label>
                          <select class="form-control" name="up_role">
                          <option value="1"
                          <?php 
                          if($e_type == 1){
                            echo "selected";
                          }
                          ?>
                          >Subscriber</option>
                          <option value="2"
                          <?php 
                          if($e_type == 2){
                            echo "selected";
                          }
                          ?>>Editor</option>
                          <option value="0"
                          <?php 
                          if($e_type == 0){
                            echo "selected";
                          }
                          ?>>Admin</option>
                          </select>
                        </div>
                      </div>
                      <div class="col-md-6">
                          <label class="bmd-label-floating" style="margin-top: 18px!important">Image</label>
                        <div>
                          <img src="assets/img/users/<?php echo $e_file; ?>" width="100px">
                        </div>
                        <div>
                          <input style="margin-top: 5px;" type="file" name="up_image">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label>About</label>
                          <div class="form-group">
                            <textarea name="up_about" class="form-control" rows="5"><?php echo $e_about; ?></textarea>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12" class="form-group">
                        <input type="submit" name="up_btn" value="Update User" style="background: #a03ab5; color: white; border: none; border: 1px solid #a03ab5; padding: 10px 10px;">
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


}


}


// Update User

if($do == 'update'){

if($_SERVER['REQUEST_METHOD'] == 'POST'){

  $up_user_id = $_POST['up_user_id'];

  $up_name = $_POST['up_name'];
  $up_password = $_POST['up_password'];
  $up_re_pass = $_POST['up_re_pass'];
  $up_email = $_POST['up_email'];
  $up_phone = $_POST['up_phone'];
  $up_address = $_POST['up_address'];
  $up_role = $_POST['up_role'];
  $up_about = $_POST['up_about'];
  $up_file = $_FILES['up_image']['name'];
  $up_tmp_file = $_FILES['up_image']['tmp_name'];


  // Let's think user change both password and image

  if(!empty($up_password) && !empty($up_re_pass) && !empty($up_file)){

    // Array decleration for extensions

    $extensions2 = array('png','jpg','jpeg');

    // File format check

    $extns = strtolower(end(explode('.', $up_file)));

    if(in_array($extns, $extensions2) === false){

  echo '<div class="alert alert-danger">Please Enter An Image With The Following Extensions (png,jpg or jpeg)</div>';      

    }

    if(in_array($extns, $extensions2) === true && $up_password==$up_re_pass){

      if(strlen($up_password) < 5){
        echo '<div class="alert alert-danger">Please Enter At Least 5 Digit/Character!</div>';
      }else{

        // Encrypt password

        $hash_up_password = sha1($up_password);

        $final_up_file = rand().'_'.$up_file;

        // Move new file into folder

        move_uploaded_file($up_tmp_file, 'assets/img/users/'.$final_up_file);

        // Delete old file

        // 01 : Read the old photo file from database

        $query3 = "SELECT u_photo FROM user WHERE u_id='$up_user_id'";
        $send2 = mysqli_query($db,$query3);

        while($response2 = mysqli_fetch_assoc($send2)){

         $backdated = $response2['u_photo'];

         // Photo delete from server

         unlink('assets/img/users/'.$backdated);

        }

        // Update Query

        $query6 = "UPDATE user SET u_name='$up_name',u_photo='$final_up_file',u_pass='$hash_up_password',u_address='$up_address',u_mail='$up_email',u_contact='$up_phone',u_type='$up_role',u_about='$up_about' WHERE u_id='$up_user_id'";

        $send6 = mysqli_query($db,$query6);

        if($send6){
          header('LOCATION: user.php');
        }else{
          die("Update User Info Into Database Error".mysqli_error($db));
        }

      }

    }else{
      echo '<div class="alert alert-danger">Please Enter Same Password!</div>';
    }

  }

  // Let's think user only change password 

  if(!empty($up_password) && !empty($up_re_pass) && empty($up_file)){

    if($up_password==$up_re_pass){

      if(strlen($up_password) < 5){
        echo '<div class="alert alert-danger">Please Enter At Least 5 Digit/Character!</div>';
      }else{

        // Encrypt password

        $hash_up_password = sha1($up_password);

        // Update Query

        $query6 = "UPDATE user SET u_name='$up_name',u_pass='$hash_up_password',u_address='$up_address',u_mail='$up_email',u_contact='$up_phone',u_type='$up_role',u_about='$up_about' WHERE u_id='$up_user_id'";

        $send6 = mysqli_query($db,$query6);

        if($send6){
          header('LOCATION: user.php');
        }else{
          die("Update User Info Into Database Error".mysqli_error($db));
        }

      }

    }else{
      echo '<div class="alert alert-danger">Please Enter Same Password!</div>';
    }

  }

  // Let's think user only change photo

  if(!empty($up_file) && empty($up_password) && empty($up_re_pass)){

    // Array decleration for extensions

    $extensions2 = array('png','jpg','jpeg');

    // File format check

    $extns = strtolower(end(explode('.', $up_file)));

    if(in_array($extns, $extensions2) === false){

  echo '<div class="alert alert-danger">Please Enter An Image With The Following Extensions (png,jpg or jpeg)</div>';      

    }

    else{

      $final_up_file = rand().'_'.$up_file;

        // Move new file into folder

        move_uploaded_file($up_tmp_file, 'assets/img/users/'.$final_up_file);

        // Delete old file

        // 01 : Read the old photo file from database

        $query3 = "SELECT u_photo FROM user WHERE u_id='$up_user_id'";
        $send2 = mysqli_query($db,$query3);

        while($response2 = mysqli_fetch_assoc($send2)){

         $backdated = $response2['u_photo'];

         // Photo delete from server

         unlink('assets/img/users/'.$backdated);

        }

        // Update Query

        $query6 = "UPDATE user SET u_name='$up_name',u_photo='$final_up_file',u_address='$up_address',u_mail='$up_email',u_contact='$up_phone',u_type='$up_role',u_about='$up_about' WHERE u_id='$up_user_id'";

        $send6 = mysqli_query($db,$query6);

        if($send6){
          header('LOCATION: user.php');
        }else{
          die("Update User Info Into Database Error".mysqli_error($db));
        }


    }

  }

  // Let's think user didn't change anything

  else{

    // Update Query

        $query6 = "UPDATE user SET u_name='$up_name',u_address='$up_address',u_mail='$up_email',u_contact='$up_phone',u_type='$up_role',u_about='$up_about' WHERE u_id='$up_user_id'";

        $send6 = mysqli_query($db,$query6);

        if($send6){
          header('LOCATION: user.php');
        }else{
          die("Update User Info Into Database Error".mysqli_error($db));
        }

  }

}

}


// Delete User

if($do == 'dlt_user'){


	if(isset($_GET['deleteId'])){

  $ph_id = $_GET['deleteId'];

  $query3 = "SELECT u_photo FROM user WHERE u_id='$ph_id'";
  $send2 = mysqli_query($db,$query3);

  while($response2 = mysqli_fetch_assoc($send2)){

   $backdated = $response2['u_photo'];

   // Photo delete from server

   unlink('assets/img/users/'.$backdated);

  }

	$deleteId = $_GET['deleteId'];

	$table_name = 'user';
	$table_id   = 'u_id';
	$removeId   = $deleteId;
	$page_url   = 'user.php';

	delete($table_name,$table_id,$removeId,$page_url);

	}

                      

}

?>

</div>
</div>


<?php

include "includes/footer.php";

?>