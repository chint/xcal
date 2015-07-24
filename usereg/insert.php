<?php

include('../database_connection.php');

$pw=md5($_POST['pw']);

$sql = "INSERT INTO  cus (`c_fname`, `c_lname`, `c_email`, `c_dob`, `un`, `pw`)
 VALUES ('$_POST[c_fname]','$_POST[c_lname]','$_POST[c_email]','$_POST[c_dob]','$_POST[un]','$pw') ";

if (!mysqli_query($bd, $sql))
  {
  die('Error: ' . mysqli_error($bd));
  }

 header("location: ../index.html");
mysqli_close($bd);
?>