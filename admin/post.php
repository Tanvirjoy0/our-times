<?php

include "includes/header.php";

?>

<div class="content">
<div class="container-fluid">

<?php

$do = isset($_GET['do'])?$_GET['do']:'view_all';

// View All Post

if($do == 'view_all'){

	if(($_SESSION['u_type'] == 0) || ($_SESSION['u_type'] == 2)){

    ?>

  <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title ">Details Of All Post</h4>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table">
                      <thead class=" text-primary" style="text-align: center;">
                        <th>
                          Serial
                        </th>
                        <th>
                          Thumbnail
                        </th>
                        <th>
                          Title
                        </th>
                        <th>
                          Description
                        </th>
                        <th>
                          Date
                        </th>
                        <th>
                          Category
                        </th>
                        <th>
                          Author
                        </th>
                        <th>
                          Comment
                        </th>
                        <th>
                          Status
                        </th>
                        <th>
                          Action
                        </th>
                      </thead>
                      <tbody style="text-align: center;">

              <?php

  // Read operation of post 

  $query1 = "SELECT * FROM post";
  $send1 = mysqli_query($db,$query1);
  $i = 0;

  while($response1 = mysqli_fetch_assoc($send1)){

    $p_id = $response1['p_id'];
    $p_thumbnail = $response1['p_thumbnail'];
    $p_title = $response1['p_title'];
    $p_des = $response1['p_des'];
    $p_date = $response1['p_date'];
    $cat_id = $response1['cat_id'];
    $author_id = $response1['author_id'];
    $comment_id = $response1['comment_id'];
    $p_status = $response1['p_status'];
    $i++;

    ?>

    <tr>
        <td>
          <?php echo $i; ?>
        </td>
        <td>
          <img src="assets/img/posts/<?php echo $p_thumbnail; ?>" width="100px">
        </td>
        <td>
          <?php echo $p_title; ?>
        </td>
        <td>
          <?php echo substr($p_des, 0, 20); ?>
        </td>
        <td>
          <?php echo $p_date; ?>
        </td>
        <td>
          <?php

          //Category Name Read operation

          $query2 = "SELECT cat_name FROM category WHERE cat_id='$cat_id'";
          $send2 = mysqli_query($db,$query2);

          while($response2 = mysqli_fetch_assoc($send2)){

            $cat_name = $response2['cat_name'];

            echo $cat_name;
          }

          ?>
        </td>
        <td>
          <?php

          //User Name Read operation

          $query3 = "SELECT u_name FROM user WHERE u_id='$author_id'";
          $send3 = mysqli_query($db,$query3);

          while($response3 = mysqli_fetch_assoc($send3)){

            $u_name = $response3['u_name'];

            echo $u_name;
          }

          ?>
        </td>
        <td>
          <?php echo $comment_id; ?>
        </td>
        <td>
          <div>
            <?php

          if($p_status == 0){
            echo '<span class="badge badge-danger">Pending</span>';
          }
          elseif ($p_status == 1) {
            echo '<span class="badge badge-success">Published</span>';
          }

          ?>
          </div>
        </td>
        <td class="td-actions">
          <a href="post.php?do=edit_post&post_e_id=<?php echo $p_id; ?>" type="button" rel="tooltip" title="Edit Task" class="btn btn-primary btn-link btn-sm">
            <i class="material-icons">edit</i>
          </a>
  <!-- Trigger the modal with a button -->
  
    <a data-toggle="modal" data-target="#<?php echo $p_id;?>" type="button" rel="tooltip" title="Remove" class="btn btn-danger btn-link btn-sm">
            <i class="material-icons">close</i>
          </a>
    

  <!-- Modal -->
  <div class="modal fade" id="<?php echo $p_id;?>" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div style="margin-top: 15px;">
          <h4 style="text-align: center;" class="modal-title">Are you sure you want to delete this post<?php echo ' ('.$p_title.')'; ?>?</h4>
        </div>
        <div class="modal-body">
          <a class="btn-danger btn1" href="post.php?do=delete&delete_post=<?php echo $p_id;?>">
            Yes
          </a>
          <a class="btn-dark btn2" data-dismiss="modal">
            No
          </a>
          <style>
              .modal-body{
                text-align: center!important;
              }
              .btn1{
                padding: 10px 12px;
                margin-right: 5px;
              }

              .btn2{
                padding: 10px 16px;
                margin-left: 5px;
                color: white!important;
              }

              .btn2:hover{
                cursor: pointer;
              }

          </style>
        </div>
      </div>
      
    </div>
  </div>
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
          </div>

  <?php

  }else{
    echo "<script type='text/javascript'>alert('You Are Not Authorized');
              window.location='profile.php';
              </script>";
  }

}


// Add New Post

if($do == 'add_new_post'){

?>

<div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                <h4 class="card-title">Add New Post</h4>
                </div>
                <div class="card-body">
                  <div class="row">
                  	<div class="col-lg-12 col-md-12">

                  	<form method="POST" action="post.php?do=add_new_code" enctype="multipart/form-data">

                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Title</label>
                          <input type="text" class="form-control" name="p_title" required="required">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <!-- <label class="bmd-label-floating">Category</label> -->
                          <select required="required" class="form-control" name="p_category" style="margin-top: -4px;">
                          	
                          	<option>Select A Category</option>

                          	<?php

                          	// Category Read Operation

                          	$query4 = "SELECT * FROM category";
                          	$send4 = mysqli_query($db,$query4);

                          	while($response4 = mysqli_fetch_assoc($send4)){
                              $cat_id = $response4['cat_id'];
                          		$cat_name = $response4['cat_name'];

                          		?>

                          		<option value="<?php echo $cat_id; ?>"><?php echo $cat_name; ?>
                              </option>

                          		<?php

                          	}

                          	?>
                          </select>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">Description</label>
                          <div class="form-group">
                            <textarea name="p_des" class="form-control" rows="10"></textarea>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                    <div class="col-md-12">
						        <div>
                          <input type="file" name="p_image" required="required">
                      </div>
                      </div>
                    </div>
                    <div class="row">
                	<div class="col-md-12" class="form-group">
                		<input type="submit" name="" value="Add Post" style="background: #a03ab5; color: white; border: none; border: 1px solid #a03ab5; padding: 10px 10px; margin-top: 20px;">
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


// Edit Post code

if($do == 'edit_post'){

  if(isset($_GET['post_e_id'])){
    $post_e_id = $_GET['post_e_id'];

  // Read operation 

  $query5 = "SELECT * FROM post WHERE p_id='$post_e_id'";
  $send5 = mysqli_query($db,$query5);

  while($response5 = mysqli_fetch_assoc($send5)){

    $p_id = $response5['p_id'];
    $p_thumbnail = $response5['p_thumbnail'];
    $p_title = $response5['p_title'];
    $p_des = $response5['p_des'];
    $p_date = $response5['p_date'];
    $cat_id = $response5['cat_id'];
    $author_id = $response5['author_id'];
    $comment_id = $response5['comment_id'];
    $p_status = $response5['p_status'];

  }

  ?>

  <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title">Edit Post</h4>
                </div>
                <div class="card-body">
                  <div class="row">
                    <div class="col-lg-12 col-md-12">

                    <form method="POST" action="post.php?do=update_post" enctype="multipart/form-data">

                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">Title</label>
                          <input type="hidden" name="update_id" value="<?php echo $p_id; ?>">
                          <input type="text" class="form-control" name="edit_title" value="<?php echo $p_title; ?>">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Category</label>
                          <select class="form-control" name="edit_category" style="margin-top: -4px;">

                            <?php

                            // Category Read Operation

                            $query4 = "SELECT * FROM category";
                            $send4 = mysqli_query($db,$query4);

                            while($response4 = mysqli_fetch_assoc($send4)){
                              $c_id = $response4['cat_id'];
                              $cat_name = $response4['cat_name'];

                              ?>

                              <option value="<?php echo $c_id; ?>"

                                <?php

                                if($c_id == $cat_id){
                                  echo 'selected';
                                }

                                ?>

                              ><?php echo $cat_name; ?>
                              </option>

                              <?php

                            }

                            ?>
                          </select>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Status</label>
                          <select class="form-control" name="edit_status">
                            <option value="0"

                            <?php

                            if($p_status == 0){
                              echo "selected";
                            }

                            ?>

                            >Pending</option>
                            <option value="1"

                            <?php

                            if($p_status == 1){
                              echo "selected";
                            }

                            ?>

                            >Published</option>
                          </select>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">Description</label>
                          <div class="form-group">
                            <textarea name="edit_des" class="form-control" rows="10"><?php echo $p_des; ?></textarea>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                    <div>
                      <label class="bmd-label-floating">Thumbnail</label><br>
                        <img src="assets/img/posts/<?php echo $p_thumbnail; ?>" width="300px"><br>
                        <input style="margin-top: 10px;" type="file" name="edit_image">
                      </div>
                    </div>
                    </div>
                    <div class="row">
                  <div class="col-md-12" class="form-group">
                    <input type="submit" name="" value="Update Post" style="background: #a03ab5; color: white; border: none; border: 1px solid #a03ab5; padding: 10px 10px; margin-top: 20px;">
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

// Update Post Code

if($do == 'update_post'){

  if($_SERVER['REQUEST_METHOD'] == 'POST'){

    // Read the information from input field

    $update_id = $_POST['update_id'];
    $e_title = mysqli_real_escape_string($db,$_POST['edit_title']);
    $e_status = $_POST['edit_status'];
    $e_category = $_POST['edit_category'];
    $e_des = mysqli_real_escape_string($db,$_POST['edit_des']);
    $e_image = $_FILES['edit_image']['name'];
    $tmp_e_image = $_FILES['edit_image']['tmp_name'];

    if(!empty($e_image)){

      // Checking file format

      // 01. Declare the file format extensions

      $extensions = array('jpg','jpeg','png');

      // 02. Check user input file format

     $divide = explode('.', $e_image);
     $end = end($divide);
     $extn = strtolower($end);

      if(in_array($extn,$extensions) === false){

        echo '<div class="alert alert-danger">Please Enter An Image With The Following Extensions (png,jpg or jpeg)</div>';

      }else{

        $update_e_image = rand().'_'.$e_image;

        // Move user input image to server

        move_uploaded_file($tmp_e_image, 'assets/img/posts/'.$update_e_image);

        // Read operation for delete old image

  $query3 = "SELECT p_thumbnail FROM post WHERE p_id='$update_id'";
  $send3 = mysqli_query($db,$query3);

    while($response3 = mysqli_fetch_assoc($send3)){

     $backdated = $response3['p_thumbnail'];

     // Photo delete from server

     unlink('assets/img/posts/'.$backdated);

    }

      // Update Query

      $query6 = "UPDATE post SET p_thumbnail='$update_e_image', p_title='$e_title', p_des='$e_des', cat_id='$e_category', p_status='$e_status' WHERE p_id='$update_id'";

      $send6 = mysqli_query($db,$query6);

      if($send6){
        header('LOCATION: post.php');
      }else{
        die("Update Post Error".mysqli_error($db));
      }

    }

  }else{

    // Update Query

      $query7 = "UPDATE post SET p_title='$e_title', p_des='$e_des', cat_id='$e_category', p_status='$e_status' WHERE p_id='$update_id'";

      $send7 = mysqli_query($db,$query7);

      if($send7){
        header('LOCATION: post.php');
      }else{
        die("Update Post Error".mysqli_error($db));
      }

  }

}

}
// Add New Post Code

if($do == 'add_new_code'){
  
  if($_SERVER['REQUEST_METHOD'] == 'POST'){

    $p_title = mysqli_real_escape_string($db,$_POST['p_title']);
    $p_category = $_POST['p_category'];
    $p_des = mysqli_real_escape_string($db,$_POST['p_des']);
    $p_image = $_FILES['p_image']['name'];
    $tmp_p_image = $_FILES['p_image']['tmp_name'];

    if(empty($p_title) || empty($p_category) || empty($p_des) || empty($p_image)){

      echo '<div class="alert alert-danger">Please Fullfil All The Information</div>';

    }else{

      // Checking file format

      // 01. Declare the file format extensions

      $extensions = array('jpg','jpeg','png');

      // 02. Check user input file format

     $divide = explode('.', $p_image);
     $end = end($divide);
     $extn = strtolower($end);

      if(in_array($extn,$extensions) === false){

        echo '<div class="alert alert-danger">Please Enter An Image With The Following Extensions (png,jpg or jpeg)</div>';

      }else{

        $update_p_image = rand().'_'.$p_image;

        // Move user input image to server

        move_uploaded_file($tmp_p_image, 'assets/img/posts/'.$update_p_image);

        // Insert Into Database

        $user_name = $_SESSION['u_id'];

        $query5 = "INSERT INTO post(p_thumbnail,p_title,p_des,p_date,cat_id,author_id,comment_id,p_status) VALUES ('$update_p_image','$p_title','$p_des',now(),'$p_category','$user_name','0','0')";

        $send5 = mysqli_query($db,$query5);

        if($send5){
          header('LOCATION: profile.php');
        }else{
          die("Insert New Post Into Database Error".mysqli_error($db));
        }

      }

    }

  }

}


// Delete Operation

if($do == 'delete'){

	if(isset($_GET['delete_post'])){

	$delete_post = $_GET['delete_post'];

	// Read operation for delete old image

	$query3 = "SELECT p_thumbnail FROM post WHERE p_id='$delete_post'";
	$send3 = mysqli_query($db,$query3);

	  while($response3 = mysqli_fetch_assoc($send3)){

	   $backdated = $response3['p_thumbnail'];

	   // Photo delete from server

	   unlink('assets/img/posts/'.$backdated);

	  }

	$deleteId = $delete_post;

	$table_name = 'post';
	$table_id   = 'p_id';
	$removeId   = $deleteId;
	$page_url   = 'post.php';

	delete($table_name,$table_id,$removeId,$page_url);
	}

}

?>

</div>
</div>


<?php

include "includes/footer.php";

?>