<?php

include "includes/connection.php";

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Our Times Sign Up Form</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="assets/fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body style="background-image: url(assets/img/signup-bg.jpg);">

    <div class="main">

        <section class="signup">
            <!-- <img src="images/signup-bg.jpg" alt=""> -->
            <div class="container">
                <div class="signup-content">
                    <form method="POST" id="signup-form" class="signup-form" enctype="multipart/form-data">
                        <h2 class="form-title">Create account</h2>
                        <div class="form-group">
                            <input type="text" class="form-input" name="name" id="name" placeholder="Your Name"/>
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-input" name="email" id="email" placeholder="Your Email"/>
                        </div>
                        <div class="form-group">
                            <input type="tel" class="form-input" name="phone" id="phone" placeholder="Your Contact No"/>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-input" name="address" id="address" placeholder="Your Address"/>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-input" name="password" id="password" placeholder="Password"/>
                            <span toggle="#password" class="zmdi zmdi-eye field-icon toggle-password"></span>
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-input" name="re_pass" id="re_pass" placeholder="Repeat your password"/>
                        </div>
                        <div class="form-group">
                            <textarea rows="4" class="form-input" name="about" id="about" placeholder="Little Description About You"></textarea>
                        </div>
                        <div style="margin-bottom: 5px;">
                            <label>Profile Picture</label><br>
                            <input style="margin-top: 10px;" type="file" name="image">
                        </div>
                        <div class="form-group" style="margin-bottom: 10px!important;">
                            <input type="checkbox" name="agree-term" id="agree-term" class="agree-term" />
                            <label for="agree-term" class="label-agree-term"><span><span></span></span>I agree all statements in  <a href="#" class="term-service">Terms of service</a></label>
                        </div>
                        <div class="form-group">
                            <input style="cursor: pointer;" type="submit" name="submit" id="submit" class="form-submit" value="Sign up"/>
                        </div>
                    </form>

            <?php

            // Read All Info From The Input

            if(isset($_POST['submit'])){

            $name = mysqli_real_escape_string($db,$_POST['name']);
            $email = mysqli_real_escape_string($db,$_POST['email']);
            $phone = mysqli_real_escape_string($db,$_POST['phone']);
            $address = mysqli_real_escape_string($db,$_POST['address']);
            $about = mysqli_real_escape_string($db,$_POST['about']);
            $file = $_FILES['image']['name'];
            $tmp_file = $_FILES['image']['tmp_name'];
            $password = mysqli_real_escape_string($db,$_POST['password']);
            $re_pass = mysqli_real_escape_string($db,$_POST['re_pass']);

            // Read From Database

            $query1 = "SELECT * FROM user WHERE u_mail='$email'";
            $send1 = mysqli_query($db,$query1);

            $chk = mysqli_num_rows($send1);

            if($chk > 0){
                echo '<div class="alert alert-danger">This Email Already Exits In Database.Try Another Email</div>';
            }else{

                if(empty($name) || empty($email) || empty($password) || empty($re_pass) || empty($phone) || empty($address) || empty($about) || empty($file)){

                   echo '<div class="alert alert-danger">Please Fullfil All The Information (Make Sure You Agree With Term & Conditions)</div>';

                }else{

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

        $query2 = "INSERT INTO user(u_name,u_photo,u_pass,u_address,u_mail,u_contact,u_type,u_about) VALUES ('$name','$update_name','$hashpassword','$address','$email','$phone','1','$about')";
        $send2 = mysqli_query($db,$query2);

        if($send2){
            header('LOCATION: index.php');
        }else{
            die("Insert User Info Into Database Error".mysqli_error($db));
        }

            }

        }else{
            echo '<div class="alert alert-danger">Please Enter Same Password!</div>';
        }

                }

            }

            }

            ?>

                    <p class="loginhere">
                        Have already an account ? <a href="index.php" class="loginhere-link">Login here</a>
                    </p>
                </div>
            </div>
        </section>

    </div>

    <!-- JS -->
    <script src="assets/vendor/jquery/jquery.min.js"></script>
    <script src="assets/js/main-reg.js"></script>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>