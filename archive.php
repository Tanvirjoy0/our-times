<?php

     include "includes/header.php";

?>
<div class="container">

<div class="row">
<div class="col-lg-8">
<div class="row">

<?php

if(isset($_GET['cat_no'])){

  $cat_no = $_GET['cat_no'];

  // Read Post Of Same Category

  $query1 = "SELECT * FROM post WHERE cat_id='$cat_no'";
  $send1 = mysqli_query($db,$query1);

  while($response1 = mysqli_fetch_assoc($send1)){

    $p_id = $response1['p_id'];
    $p_thumbnail = $response1['p_thumbnail'];
    $p_title = $response1['p_title'];
    $p_des = $response1['p_des'];
    $p_date = $response1['p_date'];
    $cat_id5 = $response1['cat_id'];
    $author_id = $response1['author_id'];
    $comment_id = $response1['comment_id'];
    $p_status = $response1['p_status'];

     $query6 = "SELECT * FROM category WHERE cat_id='$cat_id5'";
    $send6 = mysqli_query($db,$query6);

    while($response6 = mysqli_fetch_assoc($send6)){
      $cat_id6 = $response6['cat_id'];
      $cat_name6 = $response6['cat_name'];
      $cat_des6 = $response6['cat_des'];

      ?>

      <div class="col-sm-4  mb-5 mb-sm-2">
          <div class="position-relative image-hover">
            <img
              src="admin/assets/img/posts/<?php echo $p_thumbnail; ?>"
              class="img-fluid"
              alt="world-news"
            />
            <span class="thumb-title"><?php echo $cat_name6; ?></span>
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

}else{
  header('LOCATION: 404.php');
}

?>


</div>
</div>
  <?php include "includes/sidebar.php"; ?>
</div>

</div>
<!-- main-panel ends -->
<!-- container-scroller ends -->

<?php

include "includes/footer.php";

?>