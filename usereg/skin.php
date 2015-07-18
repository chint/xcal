 <link href="http://localhost/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="stylee1.css">
   <script src="../bootstrap/jquery/jquery-1.11.2.js"></script> 
<script type="text/javascript" src="http://localhost/bootstrap/js/move-top.js"></script>
<script type="text/javascript" src="../bootstrap/js/easing.js"></script>
<script type="text/javascript" src="../bootstrap/js/startstop-slider.js"></script>
  <!-- // <script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script> -->
<!-- <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script> -->
<script src="../js/jquery-1.11.3.min.js"></script>
<!-- <link rel="stylesheet" type="text/css" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css"> -->
        <script>
            $(function(){
  $("#header").load("../header/header.php"); 
   
    
  });
        </script>
  <div id="header"></div> 

  <div class="row">
  <div class="col-md-1 "></div>
  <div class="col-md-10 ">

 

  <ol class="breadcrumb">
    <li><a href="../web">Home</a></li>
    <li><a href="../usereg/account.php">My Account</a></li>
    <li>Skin</li>
 </ol>  

<div class="wrap">
<div class="well well-sm">

<h3>My Account</h3>
  </div>


  <div class="row">
  <div class="col-xs-3 ">
<div class="well well-sm">
<table class="table table-bordered">
  <tr> <td>
 <label><h4> Edit Account Details </span> </h4></label>
 </td> </tr>
  <tr><td>
    <label><a href="accountorder.php"><h4>under construction</h4></a></label>
  </td></tr>
  <tr> <td>
 <label><h4><a href="skin.php">Edit My Skin</a> <span class="glyphicon glyphicon-play"></span> </h4></label>
 </td> </tr>
</table>
  </div>
  </div>
  <div class="col-xs-9 ">
<div class="well well-sm">
 
      <div class="well">
<form name="myForm" action="../usereg/skinset.php" method="post" role="form">
<!--<form class="form-horizontal" role="form" method="post" action="../usereg/skinset.php">-->
<div class="container">
  <h2>Change Calender Skins</h2>
  <p>you can select one of these skins :</p>
  
    <div class="radio">
      <label><input type="radio" name="optradio" value="1">Default skin</label>
    </div>
    <div class="radio">
      <label><input type="radio" name="optradio"value="2">Glossy skin</label>
    </div>
    <div class="radio">
      <label><input type="radio" name="optradio"value="3">Classic skin</label>
    </div>
	<div class="radio">
      <label><input type="radio" name="optradio"value="4">Flat skin</label>
    </div>
 
</div>
<div class="form-group">
  <!-- <input name="submit" type="submit" id="submit"  > -->
  <button class="btn btn-primary" name="name"id="submit" type="submit">Save Changes <span class="glyphicon glyphicon-ok"></span></button>
   <!-- <button class="btn btn-warning"  href="skinset.php" >Cancel<span class="glyphicon glyphicon-remove"></span></button> -->
 
</div>

</form>
  </div>
 
</div>


<?php
 session_start();
 include('../checklogin.php');
?>
  

</div>
</div>
    
</body>
<div id="footer"></div>
</html>