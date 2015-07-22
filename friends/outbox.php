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
    <li>Messages</li>
 </ol>  


  <body>
<!-- <script type="text/javascript" src="http://localhost/bootstrap/js/bootstrap.min.js"></script> -->
<!-- <link href="http://localhost/bootstrap/css/bootstrap.min.css" rel="stylesheet"> -->

<div class="well well-sm">

<h3>Messages</h3>
  </div>


  <div class="row">

  <div class="col-md-3 ">
<div class="well well-sm">
<table class="table table-bordered">
  <tr> <td>
 <label><h4><a href="friends.php" >Friends</a> </h4></label>
 </td> </tr>
</table>
  </div>
  </div>


<div class="col-md-9 ">
<div class="well well-sm">

<?php      //send email to friend

session_start();
include('../checklogin.php');
include('../database_connection.php'); 

?>

 
<div> 
 <ul class="nav nav-tabs">
    <li ><a href="message.php">Inbox</a></li>
    <li class="active"><a href="#">Outbox</a></li>
  </ul>

</div>
<table class="table">
<tr>&nbsp</tr>
<?php 

 $result = mysqli_query($bd, "SELECT * FROM `calendar`.`messages` WHERE `from_cid` = '$_SESSION[login]'  AND  `deleted` <> '2' ");
 if($row = mysqli_fetch_array($result)){

$result = mysqli_query($bd, "SELECT * FROM `calendar`.`messages` WHERE `from_cid` = '$_SESSION[login]' AND  `deleted` <> '2' ORDER BY `id` DESC");

  while ( $row = mysqli_fetch_array($result)) {
   

      $result1 = mysqli_query($bd, "SELECT * FROM `calendar`.`cus` WHERE `c_id` = '$row[to_cid]' ");
      $row1 = mysqli_fetch_array($result1);
    ?>

    
      <tr>
        <td>&nbsp <?php echo $row1['c_fname']."&nbsp".$row1['c_lname']; ?></td><td><a href="#" onClick="popitup('viewmessage.php?id=<?php echo $row['id']; ?>')"><?php echo $row['head'] ; ?></a></td><td><a href="#" onClick="popitup('deletemsg.php?f=2&x=<?php echo $row['deleted']; ?>&id=<?php echo $row['id']; ?>')" type="button" class="glyphicon glyphicon-remove btn-danger"></a></td>
      </tr>
   
<?php
}
}else{
?>

<tr><td>&nbsp No Messages</td></tr>

<?php
}
?>
 </table>


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

<script>
  
function popitup(url) {
       newwindow=window.open(url,'windowName','height=450,width=650');
       if (window.focus) {newwindow.focus()}
       return false;
     }


 

</script>