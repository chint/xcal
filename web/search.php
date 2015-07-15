<?php

include('../database_connection.php');
//Include The Database Connection File 
 session_start();
if(isset($_POST['key']))//If a username has been submitted 
{
	
$key = mysqli_real_escape_string($bd, $_POST['key']);//Some clean up :)

// echo $c_email;
 $c_id=$_SESSION["login"];
$sqlq="SELECT * FROM `events` WHERE c_id = ".$c_id." AND `event_name` LIKE '%$key%'";

$check_for_key = mysqli_query($bd,$sqlq);
//Query to check if username is available or not 

 



if(mysqli_num_rows($check_for_key)==1)
{
$r = mysqli_fetch_assoc($check_for_key);

 $event_id = $r['event_id'];
 $event_name = $r['event_name']; 
 $key=0;
 echo $key.",".$event_id.",".$event_name;

//echo $r['event_id'].",".$r['event_name'];//If there is a  record match in the Database - Not Available

}
else if(mysqli_num_rows($check_for_key)>=1)
{
// $key= "1,";
 echo  "1," ;
// echo 'many'; 
//  $array = array(
//     "id"    => $id,
//     "name"  => $name,
// );
// print json_encode($array);


while($r = mysqli_fetch_array($check_for_key)) 
{
	   echo  $r['event_name']."%".$r['event_id']."%".$r['start_date']."%".$r['end_date']."#" ;
}

}else
{

$key=2;
 echo $key;

}

 }

?>