<?php

include "connection.php";

ob_start();


// Delete Function 

function delete($table_name,$table_id,$removeId,$page_url){

global $db;

// table_name, table_id, removeId, page_url

$query3 = "DELETE FROM $table_name WHERE $table_id='$removeId'";
                        	$send3 = mysqli_query($db,$query3);

                        	if($send3){
                        		header('LOCATION: '.$page_url);
                        	}else{
                        		die("Delete Category Operation Error".mysqli_error($db));
                        	}


}



ob_end_flush();

?>