<script type="text/javascript" src="http://localhost/bootstrap/js/jquery-1.11.2.min.js"></script> 
<link href="http://localhost/bootstrap/css/bootstrap.min.css" rel="stylesheet">

<link rel="stylesheet" href="stylee1.css">
<!-- <script src="../bootstrap/jquery/jquery-1.11.2.js"></script>  -->
<script type="text/javascript" src="http://localhost/bootstrap/js/move-top.js"></script>
<script type="text/javascript" src="../bootstrap/js/easing.js"></script>
<script type="text/javascript" src="../bootstrap/js/startstop-slider.js"></script>

  <!-- // <script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script> -->
<!-- <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script> -->

<!-- <link rel="stylesheet" type="text/css" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css"> -->
       <script>
  //            $(function(){
  // $("#header").load("../header/header.php"); 
   
    
  // });
      </script>
  <div id="header"></div>   
   <div class="wrap">

<?php

include('../database_connection.php');

session_start();
include('../checklogin.php');
if( empty($_SESSION['login']))
{
header('Location:../usereg/logreg.php');
}else{
$a=$_SESSION['login'];
 }
 
$result = mysqli_query($bd, "SELECT * FROM  `calendar`.`cus` WHERE `c_id` = '$a' ");

if ($row = mysqli_fetch_array($result)) {
 
?>

<script type="text/javascript">

        $(function(){
  $("#header").load("../header/header.php"); 
  
  });


$(document).ready(function()//When the dom is ready 
{
$("#un").blur(function() 
{ //if theres a change in the username textbox

var un = $("#un").val();
var idd ="<?php echo $row['un']; ?>";
//var id ="<?php echo $row['c_id']; ?>";
//Get the value in the username textbox
if(un == idd)//if the lenght greater than 3 characters
{

 $("#availability_status").html('<img src="available.png" align="absmiddle"> <font color="Green"> not changed </font> ');
//if in case the username is less than or equal 3 characters only 


}
else
 //
//Add a loading image in the span id="availability_status"

{
   $("#availability_status").html('<img src="loader.gif" align="absmiddle">&nbsp;Checking availability...');
$.ajax({  //Make the Ajax Request
    type: "POST",  
    url: "ajax_check_username.php",  //file name
    data:{"un": un,"idd":idd} ,//"un="+ un,  //data
    success: function(server_response){  
   //alert("The response is [" + server_response + "]");
   $("#availability_status").ajaxComplete(function(event, request){ 

  if(server_response == '0')//if ajax_check_username.php return value "0"
  { 
  $("#availability_status").html('<img src="available.png" align="absmiddle"> <font color="Green"> Available </font> ');
    document.getElementById("submit").disabled = false;
  //add this image to the span with id "availability_status"
  }  
  else  if(server_response == '1')//if it returns "1"
  {  
   $("#availability_status").html('<img src="not_available.png" align="absmiddle"> <font color="red">Not Available </font>');
     document.getElementById("submit").disabled = true;
  }  
   
   });
   } 
   
  }); 

}



return false;
});

$("#c_email").blur(function() 
{ //if theres a change in the username textbox

var email = $("#c_email").val();
var idde ="<?php echo $row['c_email']; ?>";
//var id ="<?php echo $row['c_id']; ?>";
//Get the value in the username textbox
if(email == idde)//if the lenght greater than 3 characters
{

 $("#availability_status1").html('<img src="available.png" align="absmiddle"> <font color="Green"> not changed </font> ');
//if in case the username is less than or equal 3 characters only 


}
else

//Add a loading image in the span id="availability_status"

{
    $("#availability_status1").html('<img src="loader.gif" align="absmiddle">&nbsp;Checking availability...');
    $.ajax({  //Make the Ajax Request


    type: "POST",  
    url: "ajax_check_email.php",
      // data:{"un": un,"idd":idd} ,  //file name
    data: "c_email="+email, //data

    

    success: function(server_response){ 
   // alert("The response is [" + server_response + "]");
   // alert(server_response);
   // $("#availability_status1").ajaxComplete(function(event, request){ 

  if(server_response == '0')//if ajax_check_username.php return value "0"
  {  
   // alert("have");
  $("#availability_status1").html('<img src="available.png" align="absmiddle"> <font color="Green"> Available </font> ');
  document.getElementById("submit").disabled = false;
  //add this image to the span with id "availability_status"
  }  
  else  if(server_response == '1')//if it returns "1"
  {  
  
   $("#availability_status1").html('<img src="not_available.png" align="absmiddle"> <font color="red">Not Available </font>');
   document.getElementById("submit").disabled = true;
  }  
   
   // });
   } 
   
  }); 

}
 
return false;
});



});
</script>


 <div id="header"></div> 

   <div class="row">
  <div class="col-md-1"></div>
  <div class="col-md-10">

  <ol class="breadcrumb">
    <li><a href="../web">Home</a></li>
    <li><a href="../usereg/account.php">My Account</a></li>
    <li>Edit Account</li>
 </ol>   
 
<div class="well well-sm">

<h3>My Account</h3>
  </div>


  <div class="row">
  <div class="col-xs-3 ">
<div class="well well-sm">
<table class="table table-bordered">
  <tr> <td>
 <label><h4> Edit Account Details <span class="glyphicon glyphicon-play"></span> </h4></label>
 </td> </tr>
  <!-- <tr><td>
    <label><a href="accountorder.php"><h4>under construction</h4></a></label>
  </td></tr> -->
</table>
  </div>
  </div>
  <div class="col-xs-9 ">
<div class="well well-sm">
 
      <div class="well">
<form name="myForm" action="../usereg/update.php?c_id=<?php echo $row['c_id']; ?>" method="post" onsubmit="return validateForm()" data-toggle="validator" role="form">
<div class="form-group">
    <label class="control-label">First Name </label>
    <input type="text" name="c_fname" id="c_fname" class="form-control"  placeholder="Enter First Name" value="<?php echo $row['c_fname']; ?>" required/>
</div> 

<div class="form-group">
    <label class="control-label">Last Name </label>
    <input type="text" name="c_lname" id="c_lname" class="form-control"  placeholder="Enter Last Name" value="<?php echo $row['c_lname']; ?>"  required/>
</div>

<div class="form-group">
    <label class="control-label">E-mail</label>
    <input type="email" name="c_email" id="c_email" class="form-control"  placeholder="Enter E mail" value="<?php echo $row['c_email']; ?>" required/>
    <span id="availability_status1"></span>
</div>

<div class="form-group">
    <label class="control-label">Date of Birth</label>
    <input type="date" name="c_dob" id="c_dob" class="form-control"  placeholder="Enter Date of Birth" value="<?php echo $row['c_dob']; ?>" required/>
</div>
 
 <div class="form-group">
    <label class="control-label">Telephone No.</label>
    <input type="number" min="100000000" max="999999999" name="c_tp" id="c_tp" class="form-control" placeholder="Enter Telephone Number" oninvalid="setCustomValidity('Plz enter valid telephone number ')"
    onchange="try{setCustomValidity('')}catch(e){}" value="<?php echo $row['c_tp']; ?>" required/>
</div>
  
  
 
<div class="form-group">
    <label class="control-label">User Name </label>
    <input type="text" name="un" id="un" class="form-control"  placeholder="Enter A user Name" value="<?php echo $row['un']; ?>"  required readonly="readonly"/>
    <span id="availability_status"></span>
</div>

<div class="form-group">
    <label class="control-label">Password</label>
    <input type="password" name="pw" id="pw" class="form-control"  placeholder="Enter New Password" onchange="form.pw2.pattern = this.value;"    /></div>
   <div class="form-group">  <input type="password" name="pw2" id="pw2" class="form-control"  placeholder="Enter New Password"    />
</div>

  
<div class="form-group">
  <!-- <input name="submit" type="submit" id="submit"  > -->
  <button class="btn btn-primary" name="name" value="value" id="submit" type="submit">Save Changes <span class="glyphicon glyphicon-ok"></span></button>
   <!-- <button class="btn btn-warning"  href="account.php" >Cancel<span class="glyphicon glyphicon-remove"></span></button> -->
   <a class="btn btn-warning"  href="account.php"> Cancel <span class="glyphicon glyphicon-remove"></span> </a>
</div>

</form>
  </div>
 
</div>
    



 


<?php
} else {
 echo "no results found";
}

 

mysqli_close($bd);
?>
  
  <!-- </div> -->

  
 </div>
 
</div>

</div>
<div class="col-md-1 "></div>
</div>
    
</body>
<div id="footer"></div>
</html>