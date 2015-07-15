<?php
include('../database_connection.php'); 

if(isset($_GET['status'])){
$sql = "UPDATE `calendar`.`friends` SET `status` = '$_GET[status]' WHERE `friends`.`id` = '$_GET[id]'";
}else{
$sql = "DELETE FROM `calendar`.`friends` WHERE `friends`.`id` = '$_GET[id]' ";	
}
if (!mysqli_query($bd, $sql))
  {
  die('Error: ' . mysqli_error($bd));
  }
echo "1 record added";

mysqli_close($bd);



?>