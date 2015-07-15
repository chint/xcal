<?php

include('../database_connection.php');
//Include The Database Connection File 
 

if(isset($_POST['c_email']))//If a username has been submitted 
{
	
$c_email = mysqli_real_escape_string($bd, $_POST['c_email']);//Some clean up :)


$sqlq="SELECT * FROM `calendar`.`cus` WHERE `c_email`='$c_email'";

$check_for_username = mysqli_query($bd,$sqlq);
//Query to check if username is available or not 

if(mysqli_num_rows($check_for_username))
{
echo '1';//If there is a  record match in the Database - Not Available
}
else
{
echo '0';//No Record Found - Username is available 
}

}

?>