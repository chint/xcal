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
// $conn->render_table("events","event_id","start_date,end_date,event_name");
  // function insert_session($action){
  //           $action->add_field("c_id", $_SESSION["login"]);
  //  }
  //  $conn->event->attach("beforeProcessing", "insert_session");

 // $conn->event->attach("Select","select * from events where c_id={c_id}");


// $conn->render_table("events","event_id","start_date,end_date,event_name,rec_type,event_pid,event_length,details,event_location,lat,lng");
// $conn->render_sql("select * from events where c_id = ".$c_id." AND `start_date` >= '2015-07-08 00:00:00' AND `end_date` <= '2015-07-11 00:00:00' ","event_id","start_date,end_date,event_name,rec_type,event_pid,event_length,details,event_location,lat,lng");

if ($type==1) {
	
// $conn->render_sql("select * from events where c_id = ".$c_id." AND `start_date` >= '2015-07-08 00:00:00' AND `end_date` <= '2015-07-11 00:00:00' ","event_id","start_date,end_date,event_name,rec_type,event_pid,event_length,details,event_location,lat,lng");

} else {

$conn->sql->attach("Update","Update events set event_name='{event_name}',start_date='{start_date}',end_date='{end_date}',rec_type='{rec_type}',event_pid='{event_pid}',event_length='{event_length}',event_location='{event_location}',lat='{lat}',lng='{lng}',readonly='{readonly}',priority='{priority}',Privacy='{Privacy}',c_id='{c_id}',priority='{priority}' where event_id={event_id}");

$conn->sql->attach("Delete","DELETE FROM events WHERE event_id={event_id}");

$conn->sql->attach("Insert","INSERT INTO `calendar`.`events` (`event_id`, `event_name`, `start_date`, `end_date`, `event_length`, `event_pid`, `rec_type`, `details`, `event_location`, `lat`, `lng`, `c_id`, `readonly`, `priority`, `Privacy`) 
															VALUES (NULL, '{event_name}', '{start_date}', '{end_date}', '{event_length}', '{event_pid}', '{rec_type}', '{details}', '{event_location}', '{lat}', '{lng}', '{c_id}', '{readonly}', '{priority}', '{Privacy}')");

$conn->render_sql("SELECT events.*,cus.c_id,cus.c_fname FROM events INNER JOIN cus ON events.c_id=cus.c_id INNER JOIN friends on friends.c_id_1= events.c_id OR friends.c_id_2=events.c_id WHERE events.Privacy=2 or events.c_id=".$c_id,"event_id","start_date,end_date,event_name,rec_type,event_pid,event_length,event_location,lat,lng,readonly,priority,Privacy,c_id,c_fname", "", "");
// $conn->render_table("events","event_id","start_date,end_date,event_name,rec_type,event_pid,event_length,details,event_location,lat,lng,subject");
// $sql = "SELECT * FROM events WHERE ( events.c_id = 2) or events.c_id=(SELECT c_id_2 FROM friends where c_id_1=2)";
 
//SELECT * FROM events WHERE `events`.`c_id` = ".$c_id." or events.c_id=(SELECT c_id_2 FROM friends where c_id_1=".$c_id."   ) 
}


?>