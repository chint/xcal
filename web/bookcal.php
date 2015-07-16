<!doctype html>
<head>
	<meta http-equiv="Content-type" content="text/html; charset=utf-8">
	<title>Online Calendar</title>
	</head>
<script type="text/javascript" src="../js/jquery-1.11.3.js"></script> 
      <!-- // <script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.js"></script>  -->
<!-- 
      <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
<script type="text/javascript" src="../bootstrap/js/move-top.js"></script>
<script type="text/javascript" src="../bootstrap/js/easing.js"></script>
<script type="text/javascript" src="../bootstrap/js/startstop-slider.js"></script>
   <script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>
 <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
 
  <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>    
   -->
    <!-- // <script src="http://maps.google.com/maps/api/js?sensor=false" type="text/javascript"></script> -->
	<script src="../codebase/dhtmlxscheduler.js" type="text/javascript" charset="utf-8"></script>
	  <!-- // <script src="../codebase/ext/dhtmlxscheduler_map_view.js" type="text/javascript" charset="utf-8"></script> -->
	<link rel="stylesheet" href="../codebase/dhtmlxscheduler.css" type="text/css" media="screen" title="no title" charset="utf-8">

<script src="../codebase/ext/dhtmlxscheduler_units.js" type="text/javascript" charset="utf-8"></script>


	<script src='../codebase/ext/dhtmlxscheduler_minical.js' type="text/javascript"></script>
	<script src="../codebase/ext/dhtmlxscheduler_year_view.js" type="text/javascript" charset="utf-8"></script>
	<script src="../codebase/ext/dhtmlxscheduler_agenda_view.js" type="text/javascript" charset="utf-8"></script>
	<script src='../codebase/ext/dhtmlxscheduler_recurring.js' type="text/javascript"></script>
	<script src="../codebase/ext/dhtmlxscheduler_pdf.js" type="text/javascript" charset="utf-8"></script>

		  <script src="../codebase/ext/dhtmlxscheduler_readonly.js" type="text/javascript" charset="utf-8"></script>

 <!-- <link rel="stylesheet" href="../codebase/dhtmlxscheduler_flat.css" type="text/css" media="screen" title="no title" charset="utf-8"> -->
	<script src="../codebase/ext/dhtmlxscheduler_limit.js" type="text/javascript" charset="utf-8"></script>
	
	  <script src="../codebase/ext/dhtmlxscheduler_serialize.js" type="text/javascript" charset="utf-8"></script>
 
  <script>
            $(function(){
  $("#calbody").load("../header/header.php"); 
  
  });        </script>

   <style type="text/css" media="screen">
	html, body{
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
		}
</style>
<style media="screen">
		html, body{
		margin:0px;
		padding:0px;
		height:100%;
		overflow:hidden;
	}

	.dhx_scheduler_month .dhx_marked_timespan.dhx_now_time{
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
	}
	</style>

   <?php
session_start();
   ?>
 
<script type="text/javascript" charset="utf-8">

	function init() {

 
// $.ajax({   
//     type: "POST",  
//     url: "checksession.php",   
//       success: function(server_response){  
//       if(server_response == 0) 
//   {       window.location="usereg/logreg.php";
//      }  
//   else  if(server_response == 1) 
//   {  
// alert("1");
//      }      }      }); 
// 	function readonly_check(id){
// var ev = scheduler.getEvent(id);
// return !ev.readonly;
// }

// scheduler.attachEvent("onClick", readonly_check);
// scheduler.attachEvent("onDblClick", readonly_check);

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		scheduler.config.xml_date="%Y-%m-%d %H:%i";
		// scheduler.config.prevent_cache = true;
		scheduler.config.repeat_date = "%m/%d/%Y";
		// export to pdf 
		 
	
	scheduler.config.limit_time_select = true;

		// scheduler.config.readonly_form = true;

		// scheduler.config.include_end_by = true;
		// scheduler.locale.labels.map_tab = "Map";
		// scheduler.locale.labels.section_location = "Location";
		// scheduler.xy.map_date_width = 180;
		// scheduler.xy.map_description_width = 400;
		// scheduler.config.map_start = new Date(2014, 8, 1);
		// 	scheduler.config.map_end = new Date();
			
			scheduler.config.lightbox.sections=[	
				{ name:"description", height:50, map_to:"text", type:"textarea", focus:true },
				{ name:"location", height:43, map_to:"event_location", type:"textarea"  },
				{name:"recurring", height:115, type:"recurring", map_to:"rec_type",button:"recurring"},
				{ name:"time", height:72, type:"time", map_to:"auto"}	
			]
			scheduler.config.map_inital_zoom = 8;
			
		// scheduler.attachEvent("onBeforeDrag",block_readonly )
		// scheduler.attachEvent("onClick",block_readonly )
	var config ={
   start_date: new Date(2000,01,10),
   end_date:   new Date( ),
  	zones: "fullday",
	css: "gray_section",
	type:"dhx_time_block"
   
}
 


	  scheduler.addMarkedTimespan(config);
         // scheduler.updateView();
scheduler.init('scheduler_here',new Date(),"month");
		scheduler.load("../data/connector.php");
// scheduler.getEvent(126).readonly = true;
		var dp = new dataProcessor("../data/connector.php");
			dp.init(scheduler);

			 // scheduler.getEvent(126).readonly = true;
		 	// 	scheduler.config.limit_start = new Date(2015,7,10);
				// scheduler.config.limit_end = new Date (2015,7,20);

			//  scheduler.attachEvent("onLimitViolation", function  (id, obj){
			// dhtmlx.message('The date is not allowed');
		// });


		 	}

  
 
</script>

  <div id="calbody"></div>
<body onload="init();">
<!-- <div id="calbody"></div>  -->
 
 <!-- <p><a href="#" onclick="scheduler.showEvent(120,'month')">Show event  </a></p> -->

	<div id="scheduler_here" class="dhx_cal_container" style='width:100%; height:100%; overflow:auto; border: 1px solid #cecece;  '>
		<div class="dhx_cal_navline">
		<div class='dhx_cal_export pdf' id='export_pdf' title='Export to PDF' onclick='scheduler.toPDF("http://dhtmlxscheduler.appspot.com/export/pdf", "color")'>&nbsp;</div>
		<!-- <div class="dhx_cal_tab" name="map_tab" style="right:280px;"></div> -->
		<div class="dhx_cal_date"></div>
<div class="dhx_cal_tab" name="custom_tab" style="right:270px;"  ></div>

    <div class="dhx_minical_icon" id="dhx_minical_icon"  onclick="show_minical()"> </div>
			<div class="dhx_cal_prev_button">&nbsp;</div>
			<div class="dhx_cal_next_button">&nbsp;</div>
			<div class="dhx_cal_today_button"></div>
			<div class="dhx_cal_date"></div>
			
			 <div class="dhx_cal_tab" name="year_tab" style="right:330px;"></div>
			<div class="dhx_cal_tab" name="agenda_tab" style="right:265px;"></div>
			
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