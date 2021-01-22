<?php

include "includes/header.php";

?>

<div class="content">
<div class="container-fluid">

<?php

$do = isset($_GET['do'])?$_GET['do']:'view_all';

// View All Post

if($do == 'view_all'){

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

              // Read operation 

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
	        <?php echo $cat_id; ?>
	      </td>
	      <td>
	        <?php echo $author_id; ?>
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
	                      <a href="post.php" type="button" rel="tooltip" title="Edit Task" class="btn btn-primary btn-link btn-sm">
	                        <i class="material-icons">edit</i>
	                      </a>
	                      <a href="post.php" type="button" rel="tooltip" title="Remove" class="btn btn-danger btn-link btn-sm">
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
          </div>

	<?php

}


// Add New Post

if($do == 'add_new'){

	echo "Add New Post";

}

?>

</div>
</div>


<?php

include "includes/footer.php";

?>