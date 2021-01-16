<?php

$db = mysqli_connect('localhost', 'root', '', 'ourtimes');

if($db){
  // echo "Database Connection Sucessful";
}else{
  die("Database Connection Error".mysqli_error($db));
}

?>