<script type="text/javascript" src="../js/jquery-1.11.3.js"></script> 
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
    <li><a href="../usereg/account.php">My Account</a></li>
    <li><a href="../friends/friends.php">Friends</a></li>
    <li>Add Friends</li>
 </ol> 


  <body>
<!-- <script type="text/javascript" src="http://localhost/bootstrap/js/bootstrap.min.js"></script> -->
<!-- <link href="http://localhost/bootstrap/css/bootstrap.min.css" rel="stylesheet"> -->

<div class="well well-sm">

<h3>Add Friends</h3>
  </div>


  <div class="row">
  <div class="col-md-3 ">
<div class="well well-sm">
<table class="table table-bordered">
  <tr> <td>
 <label><h4><a href="friends.php">Friends</a> </h4></label>
 </td> </tr>
  <!-- <tr><td> -->
    <!-- <label><h4> <a href="accountorder.php" >Under construction</a> </h4></label> -->
  <!-- </td></tr> -->
</table>
  </div>
  </div>


<div class="col-md-9 ">
<div class="well well-sm">

<?php      //send email to friend

session_start();
include('../checklogin.php');
require_once "Mail.php";
include('../database_connection.php'); 

if(isset($_POST['submit'])){


$result = mysqli_query($bd, "SELECT * FROM `calendar`.`cus` WHERE `c_email` = '$_POST[femail]' ");
if ($row = mysqli_fetch_array($result)) {

$result1 = mysqli_query($bd, "SELECT `status` FROM `calendar`.`friends` WHERE `c_id_1` = '$_SESSION[login]' AND `c_id_2` = '$row[c_id]' OR `c_id_2` = '$_SESSION[login]' AND `c_id_1` = '$row[c_id]'");
if ($row1 = mysqli_fetch_array($result1)) {

  if($row1['status']==0){

echo '<div class="alert alert-info" role="alert"> Already Sent  A Request !!!</div>';

}elseif ($row1['status']==1) {
echo '<div class="alert alert-info" role="alert">Already Your Friend !!!</div>'; 
}

}else{

$from = '<from@gmail.com>';
$to = '<'.$_POST['femail'].'>';
$subject = 'Your username and password';
$body="Your have frned request";


$headers = array(
    'From' => $from,
    'To' => $to,
    'Subject' => $subject
);

$smtp = Mail::factory('smtp', array(
        'host' => 'ssl://smtp.gmail.com',
        'port' => '465',
        'auth' => true,
        'username' => 'mycartsl@gmail.com',
        'password' => 'b5EfjInIDuWX'
    ));


$mail = $smtp->send($to, $headers, $body);

$sql = "INSERT INTO `calendar`.`friends` (`c_id_1`, `c_id_2`) VALUES ('$_SESSION[login]','$row[c_id]')";

 if (!mysqli_query($bd, $sql)){die('Error: ' . mysqli_error($bd)); }

echo '<div class="alert alert-success" role="alert">Successful</div>';


}

}else{

echo '<div class="alert alert-danger" role="alert">User Not Found</div>';
}

}

?>


<h3>Enter Friend Email</h3>
<form name="myForm" action="<?php $_SERVER['PHP_SELF']?>" method="post" onsubmit="return validateForm()" data-toggle="validator" role="form">
<table  class="table table-condensed">

  <tr><td>  <label class="control-label">Email</label></td>
    <td> <input type="email" name="femail" id="femail" class="form-control"  placeholder="Enter Email" required/></td></tr>

</table>
 

  

  
<div class="form-group">
<input type="submit" class="btn btn-primary" name="submit" >
 
</div>

</form>


 </div>
</div>
</div>

</div>
<div class="col-md-1 "></div>
</div>

   
</body>
<div id="footer"></div>
</html>