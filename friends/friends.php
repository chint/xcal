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

  
function popitup(url) {
       newwindow=window.open(url,'windowName','height=450,width=650');
       if (window.focus) {newwindow.focus()}
       return false;
     }


 
 
        </script>
  <div id="header"></div> 

  <div class="row">
  <div class="col-md-1 "></div>
  <div class="col-md-10 ">

 <ol class="breadcrumb">
    <li><a href="../web">Home</a></li>
    <li><a href="../usereg/account.php">My Account</a></li>
    <li>Friends</li>
 </ol>  


  <body>
<!-- <script type="text/javascript" src="http://localhost/bootstrap/js/bootstrap.min.js"></script>
<link href="http://localhost/bootstrap/css/bootstrap.min.css" rel="stylesheet"> -->

<div class="well well-sm">

<h3>Add Friends</h3>
  </div>


  <div class="row">
  <div class="col-md-3 ">
<div class="well well-sm">
<table class="table table-bordered">
  <tr> <td>
 <label><h4><a href="sendfriendrequest.php" >Add Friends</a> </h4></label>
 </td> </tr>
  <tr><td>
    <label><h4> <a href="message.php" >Messages</a> </h4></label>
  </td></tr>
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

?>

 
<div class="row"> 
<div class="col-md-8"><h3>Friends</h3></div>
</div>

<?php
 $result = mysqli_query($bd, "SELECT * FROM `friends` WHERE `c_id_1` = '$_SESSION[login]' AND `status` = '1' OR `c_id_2`='$_SESSION[login]' AND `status` = '1' ");
  while ( $row = mysqli_fetch_array($result)) {
    if($row['c_id_1']==$_SESSION['login']){

      $result1 = mysqli_query($bd, "SELECT * FROM `cus` WHERE `c_id` = '$row[c_id_2]' ");
      $row1 = mysqli_fetch_array($result1);
    // $cid1= $row1['c_id'];
    // $sqlslot = mysqli_query($bd, "SELECT * FROM events WHERE `c_id` =$cid1 AND `Privacy` = 3 ");
   
            // while ( $row = mysqli_fetch_array($sqlslot)) {
            //   // echo " slot available";
               
            // }
    ?>

<div class="row">
  <div class="col-md-8"><?php echo $row1['c_fname'].'&nbsp'.$row1['c_lname'];   ?></div>
   <div class="col-md-2"><a onClick="popitup('sendmessage.php?cid=<?php echo $row1['c_id']; ?>&name=<?php echo $row1['c_fname']; ?>')" ><button class="btn btn-info">Send Message</button></a></div>
  <div class="col-md-2"><a href="accept.php?id=<?php echo $row['id']; ?>"><button class="btn btn-warning">Unfriend</button></a></div>
</div>
<br>
<?php
}else{

      $result2 = mysqli_query($bd, "SELECT * FROM cus WHERE `c_id` = '$row[c_id_1]' ");
      $row2 = mysqli_fetch_array($result2);
       // $cid2= $row2['c_id'];
// $sqlslot = mysqli_query($bd, "SELECT * FROM events WHERE `c_id` = $cid2 AND `Privacy` = 3 ");
   
            // while ( $row = mysqli_fetch_array($sqlslot)) {
            //   // echo " slot available";

            // }
?>
<div class="row">
  <div class="col-md-8"><?php echo $row2['c_fname'].'&nbsp'.$row2['c_lname'];   ?></div>
   <div class="col-md-2"><a  onClick="popitup('sendmessage.php?cid=<?php echo $row2['c_id']; ?>&name=<?php echo $row2['c_fname']; ?>')" ><button class="btn btn-info">Send Message</button></a></div>
  <div class="col-md-2"><a href="accept.php?id=<?php echo $row['id']; ?>"><button class="btn btn-warning">Unfriend</button></a></div>
</div>
<br>

<?php
}
}
?>


</div>
</div>
</div>
</div>
<div class="col-md-1 "></div>
</div>

</body>
   
</body>
<div id="footer"></div>
</html>