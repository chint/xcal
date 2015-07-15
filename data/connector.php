<?php 
session_start();
require_once("../codebase/connector/scheduler_connector.php");
 
$res=mysql_connect("localhost","root","");
mysql_select_db("calendar");

$conn = new SchedulerConnector($res);
$conn->enable_log("temp.log");
// function my_update($data){
//     $data->add_field("c_id",1); 
//  $data->set_value("c_id","10");
//     //will be included in update processing
// } 
// $conn->event->attach("beforeUpdate","my_update");

//$uid=$_SESSION['login'];
 // $sql="SELECT * FROM javacalendar.events WHERE c_id='$uid'";
 $c_id=$_SESSION["login"];
 $type=$_GET['type'];
// $conn->render_table("events","event_id","start_date,end_date,event_name");
  function insert_session($action){
            $action->add_field("c_id", $_SESSION["login"]);
   }
   $conn->event->attach("beforeProcessing", "insert_session");

 // $conn->event->attach("Select","select * from events where c_id={c_id}");


// $conn->render_table("events","event_id","start_date,end_date,event_name,rec_type,event_pid,event_length,details,event_location,lat,lng");
// $conn->render_sql("select * from events where c_id = ".$c_id." AND `start_date` >= '2015-07-08 00:00:00' AND `end_date` <= '2015-07-11 00:00:00' ","event_id","start_date,end_date,event_name,rec_type,event_pid,event_length,details,event_location,lat,lng");

if ($type==1) {
	
$conn->render_sql("select * from events where c_id = ".$c_id." AND `start_date` >= '2015-07-08 00:00:00' AND `end_date` <= '2015-07-11 00:00:00' ","event_id","start_date,end_date,event_name,rec_type,event_pid,event_length,details,event_location,lat,lng");

} else {
	$conn->render_sql("select * from events where c_id = ".$c_id ,"event_id","start_date,end_date,event_name,rec_type,event_pid,event_length,details,event_location,lat,lng,readonly");

}


?>