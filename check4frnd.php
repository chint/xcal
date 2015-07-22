<?php
include('database_connection.php');
 // $c_id=$_SESSION['login'];
// echo "bdf";
if($eid)//If a username has been submitted 
{
			$eid = mysqli_real_escape_string($bd, $eid);
			$sql = "SELECT * FROM `events` WHERE `event_id` ='$eid'";
			$get_owner_id = mysqli_query($bd,$sql);
			$r = mysqli_fetch_assoc($get_owner_id);
			$own_id=$r['c_id'];
			
						if(isset($_SESSION['login']))//If a username has been submitted 
						{
							echo $c_id;
							echo $own_id;

								// $c_id = mysqli_real_escape_string($bd, $_SESSION['login']);//Some clean up :)
			 $sqlq="SELECT * FROM `friends` WHERE(`c_id_1` ='$c_id' AND `c_id_2` ='$own_id') OR (`c_id_2`='$c_id' AND `c_id_1`='$own_id')";
								$check_for_frnd = mysqli_query($bd,$sqlq);
						//Query to check if username is available or not 
						if(mysqli_num_rows($check_for_frnd))
							{
									// header("location: ../ok.html");
							}
						else
							{
									header("location: ../nopermission.html");
							}

						}else
						{

						}
}
else
	{
		//if no eid
	}



?>