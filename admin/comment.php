<?php

include "includes/header.php";

?>

<div class="content">
<div class="container-fluid">

<?php

if(($_SESSION['u_type'] == 0) || ($_SESSION['u_type'] == 2)){

?>

<div class="row">
            <div class="col-lg-12 col-md-12">
              <div class="card">
                <div class="card-header card-header-warning">
                  <h4 class="card-title">All Comments List</h4>
                </div>
                <div class="card-body table-responsive">
                  <table class="table table-hover">
                    <thead style="text-align: center;" class="text-warning">
                      <th>Serial</th>
                      <th>Author</th>
                      <th>Post</th>
                      <th>Comment</th>
                      <th>Date</th>
                      <th>Action</th>
                    </thead>
                    <tbody style="text-align: center;">

        <?php

    // Read Comments From Database

    $query1 = "SELECT * FROM comment";

    $send1  = mysqli_query($db,$query1);

    $i = 0;

    while($response1 = mysqli_fetch_assoc($send1)){

      $c_id = $response1['comment_id'];
      $comment_author = $response1['comment_author'];
      $comment_data = $response1['comment_data'];
      $comment_date = $response1['comment_date'];
      $comment_post = $response1['comment_post'];
          $i++;         

    // Read User Data From Database

      $query2 = "SELECT * FROM user WHERE u_id='$comment_author'";
        $send2 = mysqli_query($db,$query2);

        

        while($response2 = mysqli_fetch_assoc($send2)){

          $u_id = $response2['u_id'];
          $u_photo = $response2['u_photo'];
          $u_name = $response2['u_name'];
          $u_pass = $response2['u_pass'];
          $u_address = $response2['u_address'];
          $u_mail = $response2['u_mail'];
          $u_contact = $response2['u_contact'];
          $u_type = $response2['u_type'];
          $u_about = $response2['u_about'];
          

          // Read Post From Database

          $query3 = "SELECT * FROM post WHERE p_id='$comment_post'";
      $send3 = mysqli_query($db,$query3);

      while($response3 = mysqli_fetch_assoc($send3)){

        $p_id = $response3['p_id'];
        $p_thumbnail = $response3['p_thumbnail'];
        $p_title = $response3['p_title'];
        $p_des = $response3['p_des'];
        $p_date = $response3['p_date'];
        $cat_id = $response3['cat_id'];
        $author_id = $response3['author_id'];
        $comment_id = $response3['comment_id'];
        $p_status = $response3['p_status'];

          ?>

        <tr>
        <td><?php echo $i; ?></td>
          <td><?php echo $u_name; ?></td>
      <td><?php echo $p_title; ?></td>
        <td><?php echo $comment_data; ?></td>
        <td><?php echo $c_id; ?></td>

        <td class="td-actions">
        <!-- <a href="comment.php?" type="button" rel="tooltip" title="Edit Task" class="btn btn-primary btn-link btn-sm">
          <i class="material-icons">edit</i>
        </a> -->
  
    <!-- Trigger the modal with a button -->
  
    <a data-toggle="modal" data-target="#<?php echo $c_id;?>" type="button" rel="tooltip" title="Remove" class="btn btn-danger btn-link btn-sm">
            <i class="material-icons">close</i>
          </a>
    

  <!-- Modal -->
  <div class="modal fade" id="<?php echo $c_id;?>" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div style="margin-top: 15px;">
          <h4 style="text-align: center;" class="modal-title">Are you sure you want to delete this comment?</h4>
        </div>
        <div class="modal-body">
          <a class="btn-danger btn1" href="comment.php?do=delete&deleteC=<?php echo $c_id; ?>">
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

      <?php

      // Delete comment operation

      if(isset($_GET['deleteC'])){

        $deleteId = $_GET['deleteC'];

        $table_name = 'comment';
        $table_id   = 'comment_id';
        $removeId   = $deleteId;
        $page_url   = 'comment.php';

        delete($table_name,$table_id,$removeId,$page_url);
        
    }

    }
    }
    }

    ?>        
        
    </div>
  </div>
  </td>
  </tr>            
</tbody>
</table>

<?php




?>

</div>
</div>
</div>
</div>

<?php

}else{
  echo "<script type='text/javascript'>alert('You Are Not Authorized');
              window.location='index.php';
              </script>";
}

?>

</div>
</div>


<?php

include "includes/footer.php";

?>