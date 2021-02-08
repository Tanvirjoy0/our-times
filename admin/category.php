<?php

include "includes/header.php";

?>

<div class="content">
        <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6 col-md-12">
              <div class="card">
                <div class="card-header card-header-tabs card-header-primary">
                  <div class="nav-tabs-navigation">
                    <div class="nav-tabs-wrapper">
                      <span class="nav-tabs-title">All Categories</span>
                      <ul class="nav nav-tabs" data-tabs="tabs">
                      </ul>
                    </div>
                  </div>
                </div>
                <div class="card-body table-responsive">
                  <table class="table table-hover">
                    <thead style="text-align: center;" class="text-warning">
                      <th>Serial</th>
                      <th>Name</th>
                      <th>Description</th>
                      <th>Action</th>
                    </thead>
                    <tbody style="text-align: center;">

                    	<!-- Read Operation Start from here -->

                    	<?php

                    	$query1 = "SELECT * FROM category";
                    	$send1 = mysqli_query($db,$query1);
                    	$i = 0;

                    	while($response = mysqli_fetch_assoc($send1)){
                    		$cat_id = $response['cat_id'];
                    		$cat_name = $response['cat_name'];
                    		$cat_des = $response['cat_des'];
                    		$i++;

                    	?>

                    	<tr>
                        <td><?php echo $i; ?></td>
                        <td><?php echo $cat_name; ?></td>
                        <td><?php echo $cat_des; ?></td>
                        <td class="td-actions">
                          <button type="button" rel="tooltip" title="Edit Task" class="btn btn-primary btn-link btn-sm">
                            <a href="category.php?editId=<?php echo $cat_id; ?>"><i class="material-icons">edit</i></a>
                          </button>
                            <!-- Trigger the modal with a button -->
  
    <a data-toggle="modal" data-target="#<?php echo $cat_id; ?>" type="button" rel="tooltip" title="Remove" class="btn btn-danger btn-link btn-sm">
            <i class="material-icons">close</i>
          </a>
    

  <!-- Modal -->
  <div class="modal fade" id="<?php echo $cat_id; ?>" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div style="margin-top: 15px;">
          <h4 style="text-align: center;" class="modal-title">Are you sure you want to delete this category<?php echo ' ('.$cat_name.')'; ?>?</h4>
        </div>
        <div class="modal-body">
          <a class="btn-danger btn1" href="category.php?deleteId=<?php echo $cat_id; ?>">
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
                          </button>

                        <!-- Delete Operation Start here -->
                        <?php

                        if(isset($_GET['deleteId'])){

                          $deleteId = $_GET['deleteId'];

                          $table_name = 'category';
                          $table_id   = 'cat_id';
                          $removeId   = $deleteId;
                          $page_url   = 'category.php';

                          delete($table_name,$table_id,$removeId,$page_url);

                        }

                        ?>


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

            <!-- Add New Category -->

            <div class="col-lg-6 col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title">Add New Category</h4>
                </div>
                <div class="card-body">
                  <form method="POST">
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">Category Name*</label>
                          <input type="text" class="form-control" name="cat_name" required="required">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label>Category Description*</label>
                          <div class="form-group">
                            <textarea class="form-control" rows="3" name="cat_des" required="required"></textarea>
                          </div>
                        </div>
                      </div>
                    </div>
                    <input type="submit" name="cat_btn" class="btn btn-primary" value="ADD">
                  </form>

                  <!-- Create Operation Start Here -->

                  <?php

                  if(isset($_POST['cat_btn'])){
                  	$c_name = $_POST['cat_name'];
                  	$c_des = $_POST['cat_des'];

                  	$query2 = "INSERT INTO category(cat_name,cat_des) VALUES ('$c_name','$c_des')";
                  	$send2 = mysqli_query($db,$query2);

                  	if($send2){
                  		header('LOCATION: category.php');
                  	}else{
                  		die("Create Category Operation Error".mysqli_error($db));
                  	}
                  }

                  ?>

                </div>
              </div>

              <!-- Edit Category -->

              <?php

              if(isset($_GET['editId'])){

              $editId = $_GET['editId'];

              $query3 = "SELECT * FROM category WHERE cat_id='$editId'";
              $send3 = mysqli_query($db,$query3);

              while($response3 = mysqli_fetch_assoc($send3)){

                $cat_name3 = $response3['cat_name'];
                $cat_des3 = $response3['cat_des'];

              }


              ?>

                <div class="card">
                <div class="card-header card-header-primary">
                <h4 class="card-title">Edit Your Category</h4>
                </div>
                <div class="card-body">
                  <form method="POST">
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">Category Name*</label>
                          <input value="<?php echo $cat_name3; ?>" type="text" class="form-control" name="cat_name_u" required="required">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label>Category Description*</label>
                          <div class="form-group">
                            <textarea class="form-control" rows="3" name="cat_des_u" required="required"><?php echo $cat_des3; ?></textarea>
                          </div>
                        </div>
                      </div>
                    </div>
                    <input type="submit" name="cat_confirm" class="btn btn-primary" value="Confirm">
                  </form>

                  <!-- Update Operation Start Here -->

                  <?php

                  if(isset($_POST['cat_confirm'])){
                    $c_name = $_POST['cat_name_u'];
                    $c_des = $_POST['cat_des_u'];

                    $query2 = "UPDATE category SET cat_name='$c_name',cat_des='$c_des' WHERE cat_id='$editId'";
                    $send2 = mysqli_query($db,$query2);

                    if($send2){
                      header('LOCATION: category.php');
                    }else{
                      die("Update Category Operation Error".mysqli_error($db));
                    }
                  }

                  ?>

                </div>
              </div>


              <?php


              }

              ?>

            </div>
          </div>
        </div>
      </div>


<?php

include "includes/footer.php";

?>