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
	                      <a href="user.php" type="button" rel="tooltip" title="Edit Task" class="btn btn-primary btn-link btn-sm">
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

			if(in_array($extn,$extensions) == false){
				echo '<div class="alert alert-danger">Please Enter An Image With The Following Extensions (png,jpg or jpeg)</div>';
			}

			if(($password == $re_pass) && (in_array($extn,$extensions) == true)){

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
echo "Edit";
}

// Delete User

if($do == 'dlt_user'){


	if(isset($_GET['deleteId'])){

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