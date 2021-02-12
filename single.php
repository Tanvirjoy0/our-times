<?php

     include "includes/header.php";

?>
<div class="container">

<?php

if(isset($_GET['p_id'])){
 
	$post_no = $_GET['p_id'];

	?>

<div class="row">
<div class="col-lg-8">
<div class="container">
  <div class="row">
    <div class="col-sm-12">

      <?php

      // Read Post Information From Database

    $query1 = "SELECT * FROM post WHERE p_id='$post_no'";
	  $send1 = mysqli_query($db,$query1);

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

	    ?>
	    <div>
        <div class="news-post-wrapper-sm ">
        <img
          src="admin/assets/img/posts/<?php echo $p_thumbnail; ?>"
          alt="news"
          class="img-fluid mb-4"
        />
          <h1 class="text-center">
            <?php echo $p_title; ?>
          </h1>

          <?php

          // Read User Info From Database

        $query2 = "SELECT * FROM user WHERE u_id='$author_id'";
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

          ?>

          <p
            class="fs-15 d-flex justify-content-center align-items-center m-0"
          >
            <img
              src="admin/assets/img/users/<?php echo $u_photo; ?>"
              alt=""
              class="img-xs img-rounded mr-2"
            />
            <?php echo $u_name; ?> | <?php echo $p_date; ?>
          </p>
          </div>
        <div class="news-post-wrapper-sm mt-5 border-bottom">
          <p class="mb-5 pb-5">
            <?php echo $p_des; ?>
          </p>
          <div class="text-center mb-5 border-bottom">
          </div>
          <div class="text-center">
            <img
              src="admin/assets/img/users/<?php echo $u_photo; ?>"
              alt="news"
              class="img-lg img-rounded img-fluid mb-3"
            />
            <p class="fs-12 mb-1">Author</p>
            <p class="fs-12 font-weight-medium mb-2"><?php echo $u_name; ?></p>
          </div>
          <p class="px-5 text-center" style="margin-bottom: 40px;">
            <?php echo $u_about; ?>
          </p>
        </div>
        </div>
        </div>
      </div>
      <!-- Comment Section -->

      <hr class="invis1">

            <div class="custombox clearfix">
                <h4 class="small-title">Leave A Comment</h4>
                <div class="row">
                    <div class="col-lg-12">
                        <form class="form-wrapper" method="POST">
                          <input type="mail" name="comment_mail" class="form-control mb-4" placeholder="Your Email">
                          <input type="password" name="comment_pass" class="form-control mb-4" placeholder="Your Password">
                            <textarea rows="6" name="comment_info" class="form-control" placeholder="Your comment"></textarea>
                            <button style="margin-top: 15px;padding: 10px 10px;" type="submit" name="submit_cmnt" class="btn btn-dark">Submit Comment</button>
                        </form>

                        <?php 

                        if(isset($_POST['submit_cmnt'])){

                        if(isset($_GET['p_id'])){

                        $post_num = $_GET['p_id'];

                         $comment_info = $_POST['comment_info'];
                         $comment_mail = $_POST['comment_mail'];
                         $comment_pass = $_POST['comment_pass'];
                         $comment_hash = sha1($comment_pass);

                          // Read Visitor info

                          $query11 = "SELECT * FROM user WHERE u_mail='$comment_mail'";
                          $send11  = mysqli_query($db,$query11);

                          if(!empty(mysqli_num_rows($send11))){

                            while($response11 = mysqli_fetch_assoc($send11)){

                            $visitor_id = $response11['u_id'];
                            $visitor_photo = $response11['u_photo'];
                            $visitor_name = $response11['u_name'];
                            $visitor_pass = $response11['u_pass'];
                            $visitor_address = $response11['u_address'];
                            $visitor_mail = $response11['u_mail'];
                            $visitor_contact = $response11['u_contact'];
                            $visitor_type = $response11['u_type'];
                            $visitor_about = $response11['u_about'];


                            if(($comment_mail == $visitor_mail) && ($comment_hash == $visitor_pass)){

                                // Insert Comment Into Database

                                 $query10 = "INSERT INTO comment(comment_author, comment_data, comment_date, comment_post) VALUES('$visitor_id', '$comment_info', now(), '$p_id')";

                                 $send10 = mysqli_query($db,$query10);

                                 if($send10){
                                  echo "<script type='text/javascript'>
                          window.location='single.php?p_id=$post_num';
                          </script>";
                                 }else{
                                  die('Insert Comment Into Database Error'.mysqli_error());
                                 }

                            }else{
                                
                                echo "<script type='text/javascript'>alert('Incorrect Password');
                          window.location='single.php?p_id=$post_num';
                          </script>";

                            }

                            
                          }

                          

                          }else{

                            echo "<script type='text/javascript'>alert('Incorrect Email');
                          window.location='single.php?p_id=$post_num';
                          </script>";

                          }
                        }
                        }
                        ?>

                    </div>
                </div>
            </div>
<hr class="invis1">
<div class="custombox clearfix">
<h4 class="small-title">All Comments</h4>
<div class="row">
    <div class="col-lg-12">
        <div class="comments-list">

          <?php

          // Read All Comment

          $query8 = "SELECT * FROM comment WHERE comment_post='$p_id'";
          $send8  = mysqli_query($db,$query8);
          $count8 = mysqli_num_rows($send8);

          if(empty($count8)){
            echo "<center>No Comments Are Available For This This Post</center>";
          }else{
            while($response8 = mysqli_fetch_assoc($send8)){

            $comment_author = $response8['comment_author'];
            $comment_data = $response8['comment_data'];
            $comment_date = $response8['comment_date'];
            $comment_post = $response8['comment_post'];

            ?>

            <div class="media">
              <div class="media-body">
                <h5>
                  <div class="news-post-wrapper-sm ">

                <?php 

                // Read Data Of the user who commented

                $query9 = "SELECT * FROM user WHERE u_id='$comment_author'";
                $send9 = mysqli_query($db,$query9);

                while($response9 = mysqli_fetch_assoc($send9)){

                  $u_id9 = $response9['u_id'];
                  $u_photo9 = $response9['u_photo'];
                  $u_name9 = $response9['u_name'];
                  $u_pass9 = $response9['u_pass'];
                  $u_address9 = $response9['u_address'];
                  $u_mail9 = $response9['u_mail'];
                  $u_contact9 = $response9['u_contact'];
                  $u_type9 = $response9['u_type'];
                  $u_about9 = $response9['u_about'];

                  ?>

                  <p
                  class="fs-15 d-flex align-items-center m-0"
                >
                  <img
                    src="admin/assets/img/users/<?php echo $u_photo9; ?>"
                    alt=""
                    class="img-xs img-rounded mr-2"
                  />
                  <?php echo $u_name9; ?> | <?php echo $comment_date; ?>
                </p>
              </div>
                </h5>
                  <p><?php echo $comment_data; ?></p>
                  <a href="#" class="btn btn-dark">Reply</a>
              </div>
          </div>

          <?php

          }

          }
          }

          ?>

          
        </div>
    </div><!-- end col -->
</div><!-- end row -->
</div><!-- end custom-box-->

  <style type="text/css">
    hr.invis1 {
    border: 0;
    margin: 4rem 0;
    }

    .custombox {
    position: relative;
    padding: 3rem 2rem;
    border: 1px dashed #dadada;
    }

    .small-title {
    background: #edeff2 none repeat scroll 0 0;
    font-size: 16px;
    left: 5%;
    line-height: 1;
    margin: 0;
    padding: 0.6rem 1.5rem;
    position: absolute;
    text-align: center;
    top: -18px;
    }

    .comments-list p {
    margin-bottom: 1rem
}

.tag-cloud-single a,
.comments-list .media-right,
.comments-list small {
    color: #999 !important;
    font-size: 11px;
    letter-spacing: 2px;
    margin-top: 5px;
    padding-left: 10px;
    text-transform: uppercase;
}

.comments-list .media {
    padding: 1rem;
    margin-bottom: 15px;
}

.media-body a .btn-primary {
    padding: 5px 15px !important;
    font-size: 11px !important;
}

.user_name {
    font-size: 16px;
    font-weight: 500;
}

.comments-list img {
    max-width: 80px;
    margin-right: 30px;
}
  </style>

              <!-- end -->
       <h1 style="margin-top: 15px;margin-bottom: 20px;" class="font-weight-600 text-center">
                You may also like
              </h1>

      <?php

      // Select similar category post from database

      $cat_a = $cat_id;

      $query5 = "SELECT * FROM post WHERE cat_id='$cat_a' ORDER BY p_id ASC LIMIT 2";

      $send5 = mysqli_query($db,$query5);

      while($response5 = mysqli_fetch_assoc($send5)){
      $p_id5 = $response5['p_id'];
      $p_thumbnail5 = $response5['p_thumbnail'];
      $p_title5 = $response5['p_title'];
      $p_des5 = $response5['p_des'];
      $p_date5 = $response5['p_date'];
      $cat_id5 = $response5['cat_id'];
      $author_id5 = $response5['author_id'];
      $comment_id5 = $response5['comment_id'];
      $p_status5 = $response5['p_status'];

       $query6 = "SELECT * FROM category WHERE cat_id='$cat_id5'";
    $send6 = mysqli_query($db,$query6);

    while($response6 = mysqli_fetch_assoc($send6)){
      $cat_id6 = $response6['cat_id'];
      $cat_name6 = $response6['cat_name'];
      $cat_des6 = $response6['cat_des'];

       // Read User Info From Database

            $query7 = "SELECT * FROM user WHERE u_id='$author_id5'";
            $send7 = mysqli_query($db,$query7);

            while($response7 = mysqli_fetch_assoc($send7)){

              $u_id7 = $response7['u_id'];
              $u_photo7 = $response7['u_photo'];
              $u_name7 = $response7['u_name'];
              $u_pass7 = $response7['u_pass'];
              $u_address7 = $response7['u_address'];
              $u_mail7 = $response7['u_mail'];
              $u_contact7 = $response7['u_contact'];
              $u_type7 = $response7['u_type'];
              $u_about7 = $response7['u_about'];

      ?>

     
              <div class="py-5">
                <div class="row">
                  <div class="col-sm-4">
                    <div class="position-relative image-hover">
                      <img
                        src="admin/assets/img/posts/<?php echo $p_thumbnail5; ?>"
                        alt="news"
                        class="img-fluid"
                      />
                      <span class="thumb-title"><?php echo $cat_name6; ?></span>
                    </div>
                  </div>
                  <div class="col-sm-8">
                    <div class="position-relative image-hover" style="display: flex;flex-direction: column;">
                      <h1 class="font-weight-600">
                        <a style="color: black;" href="single.php?p_id=<?php echo $p_id5; ?>"><?php echo $p_title5; ?></a>
                      </h1>
                      <p style="align-self: flex-start;" 
                class="fs-15 d-flex justify-content-center align-items-center m-0"
              >
                <img
                  src="admin/assets/img/users/<?php echo $u_photo7; ?>"
                  alt=""
                  class="img-xs img-rounded mr-2"
                />
                <?php echo $u_name7; ?> | <?php echo $p_date5; ?>
              </p>
                    </div>
                  </div>
                </div>
              </div>

      <?php
        }
    }

      }

      }

		}

        ?>

      
            </div>

	</div>
	<?php include "includes/sidebar.php"; ?>
</div>

	<?php

}else{
	header('LOCATION: 404.php');
}

?>

</div>
<!-- main-panel ends -->
<!-- container-scroller ends -->

<?php

include "includes/footer.php";

?>