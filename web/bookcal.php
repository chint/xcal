<!doctype html>
<head>
	<meta http-equiv="Content-type" content="text/html; charset=utf-8">
	<title>Online Calendar</title>
	</head>
<script type="text/javascript" src="../js/jquery-1.11.3.js"></script> 
      <!-- // <script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.js"></script>  -->

      <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
<script type="text/javascript" src="../bootstrap/js/move-top.js"></script>
<script type="text/javascript" src="../bootstrap/js/easing.js"></script>
<script type="text/javascript" src="../bootstrap/js/startstop-slider.js"></script>
   <script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>
    
  
    <!-- // <script src="http://maps.google.com/maps/api/js?sensor=false" type="text/javascript"></script> -->
	<script src="../codebase/dhtmlxscheduler.js" type="text/javascript" charset="utf-8"></script>
	  <!-- // <script src="../codebase/ext/dhtmlxscheduler_map_view.js" type="text/javascript" charset="utf-8"></script> -->
	<link rel="stylesheet" href="../codebase/dhtmlxscheduler.css" type="text/css" media="screen" title="no title" charset="utf-8">

<!-- <script src="../codebase/ext/dhtmlxscheduler_units.js" type="text/javascript" charset="utf-8"></script> -->
	<!-- // <script src='../codebase/ext/dhtmlxscheduler_minical.js' type="text/javascript"></script> -->
	<script src="../codebase/ext/dhtmlxscheduler_year_view.js" type="text/javascript" charset="utf-8"></script>
   <script src="../codebase/ext/dhtmlxscheduler_readonly.js" type="text/javascript" charset="utf-8"></script>
	<script src="../codebase/ext/dhtmlxscheduler_limit.js" type="text/javascript" charset="utf-8"></script>
	
	  <script src="../codebase/ext/dhtmlxscheduler_serialize.js" type="text/javascript" charset="utf-8"></script>
 	<script src="../codebase/ext/dhtmlxscheduler_collision.js" type="text/javascript" charset="utf-8"></script>
<?php

session_start();
 
include('../checklogin.php');
include('../database_connection.php');

$c_id=$_SESSION["login"];
$result = mysqli_query($bd, "SELECT skin FROM `calendar`.`cus` WHERE `c_id` = '$c_id'");
if ($row = mysqli_fetch_array($result)) {
$skin = $row['skin'];
  
if ($skin==1)
{ ?>
 <link rel="stylesheet" href="../codebase/dhtmlxscheduler_flat.css" type="text/css" media="screen" title="no title" charset="utf-8"> 
   <?php 
 } else if($skin==2)
{
?>   
<link rel="stylesheet" href="../codebase/dhtmlxscheduler_glossy.css" type="text/css" media="screen">
 <?php
}
else if($skin==3)
{
 ?> 
<link rel="stylesheet" href="../codebase/dhtmlxscheduler_classic.css" type="text/css" media="screen" title="no title" charset="utf-8">
<?php
}
else
{
?> 
<link rel="stylesheet" href="../codebase/dhtmlxscheduler.css" type="text/css" media="screen" title="no title" charset="utf-8">
<?php
}
}
else {
 echo "no results found";
}
mysqli_close($bd);
    ?> 
 
  <script>
            $(function(){
  $("#calbody").load("../header/header.php"); 
  
  });        </script>

   <style type="text/css" media="screen">
/*	html, body{
		margin:1px;
		padding:1px;
		height:100%;
		width: 100%;
	

	}	
		.dhx_cal_container #scheduler_here {
			height: 700px;
			width: 100%;
			border: 1px solid #cecece;
		}
		#scheduler_here {
			border-radius: 4px;
		}*/
</style>
<style media="screen">
		html, body{
		margin:0px;
		padding:0px;
		height:100%;
		overflow:hidden;
	}

	 .dhx_scale_holder_now.weekday, .dhx_scale_holder.weekday,  .dhx_month_body{
		background-image:url(./imgs/week_bg.png);

	}

	/*.dhx_scheduler_month .dhx_marked_timespan.dhx_now_time{
		display: none;
	}
	.dhx_scheduler_month .dhx_marked_timespan{
		display: block;
	}
	.gray_section{
		background-color:#CCC;

	}

	.dhx_cal_event_clear, .dhx_cal_event_line{
		z-index: 1;
	}*/
	/*.good_day .dhx_month_body{
		background-color: #FFFF80;
	}
	.good_day .dhx_month_head{
		background-color: #EE91EC;
	}*/
	/*.good_day .dhx_week_body{
		background-color: #FFFF80;
	}
	.good_day .dhx_week_head{
		background-color: #EE91EC;
	}*/



	</style>

   <?php
// session_start();
include('../database_connection.php');
// $eid=195;
$eid=$_GET["eid"];
// include('../check4frnd.php');

$result = mysqli_query($bd, "SELECT * FROM  events WHERE `privacy` = '3' and event_id=$eid");
if ($row = mysqli_fetch_array($result)) {
 
$event_id=$row['event_id'];
$event_name=$row['event_name'];
$start_date=$row['start_date'];
$end_date=$row['end_date'];
// print_r(date_parse_from_format("Y-m-d", $start_date));
$sd=date_parse_from_format("Y-m-d", $start_date);
$ed=date_parse_from_format("Y-m-d", $end_date);
// echo $sd ['year'];
// echo $row['event_id']."-".$row['event_name']."-".$row['start_date']."-".$row['end_date'];
}else{
echo ("nothing");
}

   ?>
 
<script type="text/javascript" charset="utf-8">


	function init() {
  scheduler.templates.event_class=function(start, end, event){
var tag=0;

				 var css = "";
				if(   event.cid!="<?php echo $c_id;?>"  ) // if event has priority property then special class should be assigned
					{
						if(!event.cid)
						{

						}else{
							scheduler.getEvent(event.id).readonly = true;
	 				var i= scheduler.getEvent(event.id).c_id;
						}
						// event.text="";
						// css += "event_"+event.Privacy;
	  				
	 				//var name=nameFunction(i);
	 				// alert(event.cid);
// $.when(nameFunction(i,event)).then(function(res,event){
     
//     // alert(cache[ i ]);
//     // event.text+=res;
//     // scheduler.getEvent(event.id).event_name=res;
// // event.text+=res;
// });
 // event.text+=i;
					// alert(tag);

				var desc = scheduler.getEvent(event.id).text;
			var t=	desc.split(" By:- ");

					// var desc2=desc.split("--");
					 if(t.length==1  )
					 {
					 	// alert(tag);
					 	event.text  = scheduler.getEvent(event.id).text + " By:- " + event.c_fname;
					 	
					 }

					 else

					 {

					 }


					

				}else{
					scheduler.getEvent(event.id).c_id = "<?php echo $c_id ;?>";
				}

				// if(event.id == scheduler.getState().select_id){
				// 	css += " selected";
				// }
				 
				return css; // default return
 					
			};
// var sdate="<?php echo $start_date ; ?>";

var sm=Number("<?php echo $sd ['month']; ?>")-1;
var sd=Number("<?php echo $sd ['day']; ?>");
var sy=Number("<?php echo $sd ['year']; ?>");
 
var em=Number("<?php echo $ed ['month']; ?>")-1 ;
var ed=Number("<?php echo $ed ['day']; ?>");
var ey=Number("<?php echo $ed ['year']; ?>");

// alert(em);
scheduler.config.xml_date="%Y-%m-%d %H:%i";
 
		// scheduler.parse([
		// 	{ start_date:"2015-7-1 4:00", end_date:"2015-7-1 6:00", text:"You can create events only"},
		// 	{ start_date:"2015-7-1 6:00", end_date:"2015-7-1 8:00", text:"From June 15"},
		// 	{ start_date:"2015-7-2 6:00", end_date:"2015-7-2 8:00", text:"To July 15"}
		// ],"json")

		scheduler.templates.week_date_class=function(date,today){
			 
			if ( (date.getDate() >= sd && date.getDate() <= ed ) && (date.getMonth() == sm )   ){
				// if ( date.getDate() == sd     ){
					 return "weekday";	
			}
			return "";
		}
scheduler.init('scheduler_here',new Date(sy,sm,sd),"week");
		scheduler.config.limit_start = new Date(sy,sm ,sd);
		scheduler.config.limit_end = new Date (ey,em ,ed+1);

		scheduler.xy.menu_width = 0;
		scheduler.config.details_on_dblclick = true;
		scheduler.config.details_on_create = true;
	scheduler.config.lightbox.sections=[	
				{ name:"description", height:50, map_to:"text", type:"textarea", focus:true }
			]
		scheduler.load("../data/connector2.php?eid=<?php echo $eid; ?>");
 
		var dp = new dataProcessor("../data/connector2.php?eid=<?php echo $eid; ?>");
			dp.init(scheduler);
			
function block_readonly(id){
			if (!id) return true;
			return !this.getEvent(id).readonly;
		}
		scheduler.attachEvent("onBeforeDrag",block_readonly)
		scheduler.attachEvent("onClick",block_readonly)
		scheduler.attachEvent("onClick",function(){ return false; });

		
		scheduler.attachEvent("onLimitViolation", function  (id, obj){
			dhtmlx.message('The date is not allowed');
		});	
 
		 	}

  
 function myFunction(){
			alert("Search not available is time slot booking");
		}
</script>

  <div id="calbody"></div>
<body onload="init();">
<!-- <div id="calbody"></div>  -->
 
 <!-- <p><a href="#" onclick="scheduler.showEvent(120,'month')">Show event  </a></p> -->

	<div id="scheduler_here" class="dhx_cal_container" style='width:100%; height:100%; overflow:auto; border: 1px solid #cecece;  '>
		<div class="dhx_cal_navline">
		<!-- <div class='dhx_cal_export pdf' id='export_pdf' title='Export to PDF' onclick='scheduler.toPDF("http://dhtmlxscheduler.appspot.com/export/pdf", "color")'>&nbsp;</div> -->
		<!-- <div class="dhx_cal_tab" name="map_tab" style="right:280px;"></div> -->
		<div class="dhx_cal_date"></div>
 

    <!-- <div class="dhx_minical_icon" id="dhx_minical_icon"  onclick="show_minical()"> </div> -->
			<div class="dhx_cal_prev_button">&nbsp;</div>
			<div class="dhx_cal_next_button">&nbsp;</div>
			<div class="dhx_cal_today_button"></div>
			<div class="dhx_cal_date"></div>
			
			 <div class="dhx_cal_tab" name="year_tab" style="right:330px;"></div>
			 
			
			<div class="dhx_cal_tab" name="day_tab" style="right:204px;"></div>
			<div class="dhx_cal_tab" name="week_tab" style="right:140px;"></div>
			<div class="dhx_cal_tab" name="month_tab" style="right:76px;"></div>
		</div>
		<div class="dhx_cal_header">
		</div>
		<div class="dhx_cal_data">
		</div>
	</div>
</body>