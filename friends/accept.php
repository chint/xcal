<?php
include('../database_connection.php'); 

if(isset($_GET['status'])){
$sql = "UPDATE `friends` SET `status` = '$_GET[status]' WHERE `friends`.`id` = '$_GET[id]'";
}else{
$sql = "DELETE FROM `friends` WHERE `friends`.`id` = '$_GET[id]' ";	
}
if (!mysqli_query($bd, $sql))
  {
  die('Error: ' . mysqli_error($bd));
  }

mysqli_close($bd);

header("location: friends.php");

?>