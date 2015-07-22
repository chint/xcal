<!DOCTYPE html>
<script type="text/javascript" src="../js/jquery-1.11.3.js"></script> 
<link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
<script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>


<?php
include('../database_connection.php');
session_start();


if (isset($_POST['submit'])) {

$sql = "INSERT INTO `calendar`.`messages` (`id`, `from_cid`, `to_cid`, `head`, `body`, `status`)
 VALUES (NULL,'$_SESSION[login]','$_POST[to_cid]','$_POST[head]','$_POST[body]','0') ";

if (!mysqli_query($bd, $sql))
  {
  die('Error: ' . mysqli_error($bd));
  }else {
  	
  
	echo $_POST['to_cid'];
	echo $_POST['head'];
	echo $_POST['body'];
}
	
}else{

?>

<html>
<head>
	<title></title>
</head>
<body>

<div class="row">
  <div class="col-md-1 "></div>
  <div class="col-md-10 ">

  <div class="panel panel-primary">
  <div class="panel-heading">
    <h3 class="panel-title">Send Message</h3>
  </div>
  <div class="panel-body">
 
 
<form name="myForm" action="<?php $_SERVER['PHP_SELF']?>" method="post" data-toggle="validator" role="form">
<table class="table">

	<tr>
		<td>To</td><td><input type="text" name="" id="" class="form-control"  value="<?php echo $_GET['name']; ?>" readonly="readonly" />
		<input type="hidden" name="to_cid" id="to_cid" class="form-control"  value="<?php echo $_GET['cid']; ?>" readonly="readonly" /></td>
	</tr>

	<tr>
		<td>Subject</td><td><input type="text" name="head" id="head" class="form-control"  placeholder="Enter Subject" required/></td>
	</tr>
	
	<tr>
		<td>Message</td><td><textarea class="form-control" rows="5" id="body" name="body" placeholder="Type Your Message..."></textarea></td>
	</tr>

	<tr>
		<td></td><td><input type="submit" class="btn btn-primary" name="submit" ></td>
	</tr>		

</table>
</form>

 </div>
</div>


	</div>
	<div class="col-md-1 "></div>
</div>



</body>
</html>

<?php
}
?>