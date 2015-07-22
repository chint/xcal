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
 <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
  <!-- // <script src="//code.jquery.com/jquery-1.10.2.js"></script> -->
   <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>    
     <script src="http://maps.google.com/maps/api/js?sensor=false" type="text/javascript"></script>
	<script src="../codebase/dhtmlxscheduler.js" type="text/javascript" charset="utf-8"></script>
	  <script src="../codebase/ext/dhtmlxscheduler_map_view.js" type="text/javascript" charset="utf-8"></script>
	<!-- <link rel="stylesheet" href="../codebase/dhtmlxscheduler.css" type="text/css" media="screen" title="no title" charset="utf-8"> -->
	<script src='../codebase/ext/dhtmlxscheduler_minical.js' type="text/javascript"></script>
	<script src="../codebase/ext/dhtmlxscheduler_year_view.js" type="text/javascript" charset="utf-8"></script>
	<script src="../codebase/ext/dhtmlxscheduler_agenda_view.js" type="text/javascript" charset="utf-8"></script>
	<script src='../codebase/ext/dhtmlxscheduler_recurring.js' type="text/javascript"></script>
	<script src="../codebase/ext/dhtmlxscheduler_pdf.js" type="text/javascript" charset="utf-8"></script>
<script src="../codebase/ext/dhtmlxscheduler_editors.js"></script>
	  <script src="../codebase/ext/dhtmlxscheduler_readonly.js" type="text/javascript" charset="utf-8"></script>
<!-- <script src=" ../codebase/ext/dhtmlxscheduler_quick_info.js" type="text/javascript" charset="utf-8"></script> -->
	<script src=" ../codebase/ext/dhtmlxscheduler_active_links.js" type="text/javascript" charset="utf-8"></script>

 <!-- <link rel="stylesheet" href="../codebase/dhtmlxscheduler_flat.css" type="text/css" media="screen" title="no title" charset="utf-8"> -->

<?php

session_start();
 
include('../checklogin.php');
include('../database_connection.php');

$c_id=$_SESSION["login"];

$result = mysqli_query($bd, "SELECT skin FROM `calendar`.`cus` WHERE `c_id` = '$c_id'");

if ($row = mysqli_fetch_array($result)) {

$skin = $row['skin'];


   
if ($skin==1)
{

 ?>
 
<link rel="stylesheet" href="../codebase/dhtmlxscheduler_flat.css" type="text/css" media="screen" title="no title" charset="utf-8"> 
   
<?php 
 }
 else if($skin==2)
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
	html, body{
		margin:1px;
		padding:1px;
		height:100%;
		width: 100%;
	

	}	
	.dhx_cal_event div.dhx_footer,
		.dhx_cal_event.past_event div.dhx_footer,
		.dhx_cal_event.event_english div.dhx_footer,
		.dhx_cal_event.event_math div.dhx_footer,
		.dhx_cal_event.event_science div.dhx_footer{
			background-color: transparent !important;
		}
		.dhx_cal_event .dhx_body{
			-webkit-transition: opacity 0.1s;
			transition: opacity 0.1s;
			opacity: 0.7;
		}
		.dhx_cal_event .dhx_title{
			line-height: 12px;
		}
		.dhx_cal_event_line:hover,
		.dhx_cal_event:hover .dhx_body,
		.dhx_cal_event.selected .dhx_body,
		.dhx_cal_event.dhx_cal_select_menu .dhx_body{
			opacity: 1;
		}

	
		
		.dhx_cal_event.event_math div, .dhx_cal_event_line.event_1{
			background-color: orange !important;
			border-color: #a36800 !important;
		}
		.dhx_cal_event_clear.event_1{
			color:orange !important;
		}

		.dhx_cal_event.event_science div, .dhx_cal_event_line.event_2{
			background-color: #36BD14 !important;
			border-color: #698490 !important;
		}
		.dhx_cal_event_clear.event_2{
			color:#36BD14 !important;
		}

		.dhx_cal_event.event_english div, .dhx_cal_event_line.event_3{
			background-color: #FC5BD5 !important;
			border-color: #839595 !important;
		}
		.dhx_cal_event_clear.event_3{
			color:#B82594 !important;
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

   
 
<script type="text/javascript" charset="utf-8">

	function init() {

 
	 scheduler.templates.event_class=function(start, end, event){
var tag=0;

				 var css = "";
				 if(event.priority) 
					css += "event_"+event.priority;
				if(event.Privacy==2 && event.c_id!="<?php echo $c_id;?>") // if event has priority property then special class should be assigned
					{
						// event.text="";
						css += "event_"+event.Privacy;
	  				scheduler.getEvent(event.id).readonly = true;
	 				var i= scheduler.getEvent(event.id).c_id;
	 				//var name=nameFunction(i);
	 				// alert(i);
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


 scheduler.templates.event_classs=function(start, end, event){
				var css = "";
				if(event.priority) 
					css += "event_"+event.priority;
				if(event.id == scheduler.getState().select_id){
					css += " selected";
				}
				return css; // default return
			};

		function block_readonly(id){
			if (!id) return true;
			return !this.getEvent(id).readonly;
		}
		scheduler.attachEvent("onBeforeDrag",block_readonly)
		scheduler.attachEvent("onClick",block_readonly)

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		scheduler.config.xml_date="%Y-%m-%d %H:%i";
		// scheduler.config.prevent_cache = true;
		scheduler.config.repeat_date = "%m/%d/%Y";
		// export to pdf 
		 scheduler.config.touch = "force";

		 
		// scheduler.config.readonly_form = true;
// scheduler.config.readonly = false;


		scheduler.config.include_end_by = true;
		scheduler.locale.labels.map_tab = "Map";
		scheduler.locale.labels.section_location = "Location";
		scheduler.xy.map_date_width = 180;
		scheduler.xy.map_description_width = 400;
		scheduler.config.map_start = new Date(2014, 8, 1);
			scheduler.config.map_end = new Date();

			var Privacy = [
    { key: 1, label: 'Private' },
    { key: 2, label: 'Public (Visible to your friends)' },
    { key: 3, label: 'Time slot Booking (Allow your friends add events within this range)' },
];
 
			var priority = [
	{ key: 1, label: '&nbsp;Normal&nbsp;&nbsp;&nbsp;' },
    { key: 2, label: '&nbsp;High &nbsp;&nbsp;&nbsp;' },
	{ key: 3, label: '&nbsp;Low &nbsp;&nbsp;&nbsp;' },
    
];
			scheduler.config.lightbox.sections=[	
				{ name:"description", height:50, map_to:"text", type:"textarea", focus:true },
				{ name:"location", height:43, map_to:"event_location", type:"textarea"  },
				{name:"recurring", height:115, type:"recurring", map_to:"rec_type",button:"recurring"},
				{ name:"Privacy", height:65, options:Privacy, map_to:"Privacy", type:"radio", vertical:true, default_value: "1"},
					{ name:"priority", height:25, options:priority, map_to:"priority", type:"radio", vertical:false},
				{ name:"time", height:72, type:"time", map_to:"auto"}	
			]
			scheduler.config.map_inital_zoom = 8;
			scheduler.locale.labels.section_priority = 'Priority';
		// scheduler.attachEvent("onBeforeDrag",block_readonly )
		// scheduler.attachEvent("onClick",block_readonly )
    
	// scheduler.xy.menu_width = 0;
	// 	scheduler.config.details_on_dblclick = true;
	// 	scheduler.config.details_on_create = true;
	// 	scheduler.attachEvent("onClick",function(){ return false; });

	scheduler.init('scheduler_here',new Date(),"month");
		scheduler.load("../data/connector.php");
 
		var dp = new dataProcessor("../data/connector.php");
			dp.init(scheduler);
			

			 tag=-1;

		 	}

 	function show_minical(){
    if (scheduler.isCalendarVisible()){
        scheduler.destroyCalendar();
    } else {
        scheduler.renderCalendar({
            position:"dhx_minical_icon",
            date:scheduler._date,
            navigation:true,
            handler:function(date,calendar){
                scheduler.setCurrentView(date);
                scheduler.destroyCalendar();
            }
        });
    }
}

function myFunction() {
  var key = document.getElementById("myText").value;

if(key=="")
{
alert("Enter An Event Name For Searching!")
}else
{
	
$.ajax({   
    type: "POST",  
    url: "search.php",
    data: "key="+ key, //data   
      success: function(server_response)
{  
		 var data = server_response.toString().split(",");
 
     	 if(data[0] == 0) 
  	{        // alert("0");
  		// scheduler.showEvent(data[1],'month');
  		scheduler.showLightbox(data[1]);

  		document.getElementById("myText").value = "";
     }  
  		else  if(data[0] == 1)  
 	 { 
			$('#dialog').remove();
			var iDiv = document.createElement('div');
			iDiv.id = 'dialog';
			iDiv.className = 'dialog';
			iDiv.style.display='none';
			 // iDiv.innerHTML ="stuff<br>";
			// iDiv.style.width = 500;
			// Then append the whole thing onto the body
			document.getElementsByTagName('body')[0].appendChild(iDiv);
			 var data2 = data[1].toString().split("#");
			  // alert(data2);
			iDiv.innerHTML ="Click an event to view on Calendar<br><br>";
			// iDiv.innerHTML = server_response;
			for (i = 0; i < data2.length-1; i++  ) { 
				  var dat=data2[i].split("%");
		 iDiv.innerHTML  +=   " <a href='#' onclick='closeFunction("+dat[1]+");'> <b>Event Name</b>:-"+dat[0] +"<b> Start</b>:-"+dat[2]+"<b> End<b>:-"+dat[3]+"</a><br>";
			   	}
			   $(function() {
			    $( "#dialog" ).dialog({width: 750,title: "Search Results for:-\""+key+"\""});
				  });

     } else
     {     	alert("No Results Found!,Try a Different Keyword");
     }     

}   
  }); 
}

}
function closeFunction(dat ) {
$( "#dialog" ).dialog( "close" );
// scheduler.showEvent(dat,'month');
scheduler.showLightbox(dat);

document.getElementById("myText").value = "";
}
</script>

  <div id="calbody"></div>
<body onload="init();">
<!-- <div id="calbody"></div>  -->
 
 <!-- <p><a href="#" onclick="scheduler.showEvent(120,'month')">Show event  </a></p> -->

	<div id="scheduler_here" class="dhx_cal_container" style='width:100%; height:100%; overflow:auto; border: 1px solid #cecece;  '>
		<div class="dhx_cal_navline">
		<div class='dhx_cal_export pdf' id='export_pdf' title='Export to PDF' onclick='scheduler.toPDF("http://dhtmlxscheduler.appspot.com/export/pdf", "color")'>&nbsp;</div>
		<div class="dhx_cal_tab" name="map_tab" style="right:280px;"></div>
		<div class="dhx_cal_date"></div>
<!-- <div class="dhx_cal_tab" name="custom_tab" style="right:270px;"  ></div> -->

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