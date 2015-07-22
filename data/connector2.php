<?php 
session_start();
require_once("../codebase/connector/scheduler_connector.php");
 
$res=mysql_connect("localhost","root","");
mysql_select_db("calendar");

// $conn = new SchedulerConnector($res);



$details = new  DataConnector($res);
$details->configure("cus","c_id","c_id,c_fname");

$conn = new  SchedulerConnector($res);
$conn->mix("cus", $details, array(
    "c_id" => "c_id"
));

// function my_update($data){
//     $data->add_field("c_id",1); 
//  $data->set_value("c_id","10");
//     //will be included in update processing
// } 
// $conn->event->attach("beforeUpdate","my_update");
$conn->enable_log("temp.log");
 $c_id=$_SESSION["login"];
 $type=$_GET['type'];
  $eid=$_GET['eid'];
// $conn->render_table("bookevent","event_id","start_date,end_date,event_name");
  function insert_session($action){
            $action->add_field("cid", $_SESSION["login"]);
             $action->add_field("eid", $_GET["eid"]);
   }
   $conn->event->attach("beforeProcessing", "insert_session");

 // $conn->event->attach("Select","select * from bookevent where c_id={c_id}");


// $conn->render_table("bookevent","event_id","start_date,end_date,event_name,cid");
// $conn->render_sql("select * from bookevent where c_id = ".$c_id." AND `start_date` >= '2015-07-08 00:00:00' AND `end_date` <= '2015-07-11 00:00:00' ","event_id","start_date,end_date,event_name,rec_type,event_pid,event_length,details,event_location,lat,lng");

if ($type==1) {
	
// $conn->render_sql("select * from bookevent where c_id = ".$c_id." AND `start_date` >= '2015-07-08 00:00:00' AND `end_date` <= '2015-07-11 00:00:00' ","event_id","start_date,end_date,event_name,rec_type,event_pid,event_length,details,event_location,lat,lng");

} else {

$conn->sql->attach("Update","UPDATE bookevent SET event_name='{event_name}',start_date='{start_date}',end_date='{end_date}' WHERE event_id={event_id}");

$conn->sql->attach("Delete","DELETE FROM bookevent WHERE event_id={event_id}");

$conn->sql->attach("Insert","INSERT INTO `calendar`.`bookevent` (`event_id`, `event_name`, `start_date`, `end_date` ,`cid`,`eid`  ) 
										VALUES (NULL, '{event_name}', '{start_date}', '{end_date}' , ".$c_id." ,".$eid.")");

// $conn->sql->attach("Select","SELECT * FROM bookevent WHERE eid=".$eid);
$conn->render_sql("SELECT * FROM bookevent WHERE eid=".$eid,"event_id","start_date,end_date,event_name,readonly,cid,eid", "", "");
// $conn->render_sql("SELECT bookevent.*,cus.c_id,cus.c_fname FROM bookevent INNER JOIN cus ON bookevent.c_id=cus.c_id INNER JOIN friends on friends.c_id_1= bookevent.c_id OR friends.c_id_2=bookevent.c_id WHERE bookevent.Privacy=2 or bookevent.c_id=".$c_id,"event_id","start_date,end_date,event_name,rec_type,event_pid,event_length,event_location,lat,lng,readonly,priority,Privacy,c_id,c_fname", "", "");
// $conn->render_table("bookevent","event_id","start_date,end_date,event_name,rec_type,event_pid,event_length,details,event_location,lat,lng,subject");
// $sql = "SELECT * FROM bookevent WHERE ( bookevent.c_id = 2) or bookevent.c_id=(SELECT c_id_2 FROM friends where c_id_1=2)";
 // $conn->sql->attach("Select","Select * FROM bookevent   ");
//SELECT * FROM bookevent WHERE `bookevent`.`c_id` = ".$c_id." or bookevent.c_id=(SELECT c_id_2 FROM friends where c_id_1=".$c_id."   ) 
}


?>