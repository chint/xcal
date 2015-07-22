 <script type="text/javascript" src="../js/jquery-1.11.3.js"></script> 
      <!-- // <script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.js"></script>  -->

      <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
<script type="text/javascript" src="../bootstrap/js/move-top.js"></script>
<script type="text/javascript" src="../bootstrap/js/easing.js"></script>
<script type="text/javascript" src="../bootstrap/js/startstop-slider.js"></script>
   <script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>
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
	  <li class="active">My Account</li>
   </ol>  

  <body>
  
<div class="well well-sm">
<h3>My Dashboard</h3>
</div>


  <div class="row">
  <div class="col-md-3 ">
<div class="well well-sm">
<table class="table table-bordered">
  <tr> <td>
 <label><h4><a href="accountedit.php">Edit My Account Details</a> </h4></label>
 </td> </tr>
  <tr><td>
    <label><h4> <a href="../friends/friends.php" >My Friends</a> </h4></label>
  </td></tr>
  <tr> <td>
 <label><h4><a href="../friends/message.php">Messages</a> </h4></label>
 </td> </tr>
   <tr> <td>
 <label><h4><a href="skin.php">Edit My Skin</a> </h4></label>
 </td> </tr>
</table>
  </div>
  </div>

<?php

 session_start();
 include('../checklogin.php');
include('../database_connection.php');

$a=$_SESSION['login'];
 
 // $a=2;
$result = mysqli_query($bd, "SELECT * FROM `calendar`.`cus` WHERE `c_id` = '$a' ");

if ($row = mysqli_fetch_array($result)) {
 
?>


  <div class="col-md-9 ">
<div class="well well-sm">

<h3>My Account Details</h3>
<!-- <form name="myForm" action="update.php?c_id=<?php echo $row['c_id']; ?>" method="post" onsubmit="return validateForm()" data-toggle="validator" role="form"> -->
<table  class="table table-condensed">

  <tr><td>  <label class="control-label">First Name: </label></td>
    <td><?php echo $row['c_fname']; ?>  </td></tr>

   <tr><td>  <label class="control-label">Last Name: </label></td>
    <td><?php echo $row['c_lname']; ?>  </td></tr>

 <tr><td>  <label class="control-label">E-mail: </label></td>
    <td><?php echo $row['c_email']; ?>  </td></tr>

    <tr><td>  <label class="control-label">Date of Birth: </label></td>
    <td><?php echo $row['c_dob']; ?>  </td></tr>

        <tr><td>  <label class="control-label">Telephone No.: </label></td>
    <td><?php echo $row['c_tp']; ?>  </td></tr>

    <tr><td>  <label class="control-label">Date of Birth: </label></td>
      <td><?php echo $row['c_dob']; ?>  </td></tr>

<tr><td>  <label class="control-label">User Name : </label></td>
      <td><?php echo $row['un']; ?>  </td></tr>
<!-- <tr><td>  <label class="control-label" type="password">Password : </label></td>
      <td > <input type="password" value="<?php echo $row['pw']; ?>" readonly="readonly">  </td></tr>
     -->  
</table>
 
 
<div class="form-group">
<a href="accountedit.php"> <button type="button" class="btn btn-primary">Edit Account</button></a>
 
</div>

<!-- </form> -->
<?php
} else {
 echo "no results found";
}

mysqli_close($bd);
?>

  </div>
  </div>
</div>

</div>
<div class="col-md-1 "></div>
</div>
</div>

 

 


   
</body>
<div id="footer"></div>
</html>