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
    <li class="active">Appointments</li>
   </ol>  

  <body>
  
<div class="well well-sm">
<h3>Appointments</h3>
</div>


  <div class="row">
  <div class="col-md-3 ">
<div class="well well-sm">
<table class="table table-bordered">
  <tr> <td>
 <label><h4><a href="bookings.php"  > My Appointments</a> </h4></label>
 </td> </tr>
  <tr><td>
    <label><h4> <a href="../frndbookings.php"  style="pointer-events: none; cursor: default;"> Friend's Appointments<span class="glyphicon glyphicon-play"></span></a> </h4></label>
  </td></tr>
 
</table>
  </div>
  </div>

<?php

 session_start();
 include('../checklogin.php');
include('../database_connection.php');

$a=$_SESSION['login'];
 
 // $a=2;
// $result = mysqli_query($bd, "SELECT * FROM cus WHERE `c_id` = '$a' ");

// $result = mysqli_query($bd, "SELECT * FROM  events WHERE `privacy` = '3' and c_id='$a'");

// if ($row = mysqli_fetch_array($result)) {
 
?>


  <div class="col-md-9 ">
<div class="well well-sm">

<h3>Events with time slot booking</h3>
<!-- <form name="myForm" action="update.php?c_id=<?php echo $row['c_id']; ?>" method="post" onsubmit="return validateForm()" data-toggle="validator" role="form"> -->
<table  class="table table-condensed">

 <?php
 $result = mysqli_query($bd, "SELECT * FROM `friends` WHERE `c_id_1` = '$_SESSION[login]' AND `status` = '1' OR `c_id_2`='$_SESSION[login]' AND `status` = '1' ");
  while ( $row = mysqli_fetch_array($result)) {
    if($row['c_id_1']==$_SESSION['login']){

      $result1 = mysqli_query($bd, "SELECT * FROM `cus` WHERE `c_id` = '$row[c_id_2]' ");
      $row1 = mysqli_fetch_array($result1);
    $cid1= $row1['c_id'];
    $sqlslot4 = mysqli_query($bd, "SELECT * FROM events WHERE `c_id` =$cid1 AND `Privacy` = 3 ");
     ?>

<div class="row">
  <div class="col-md-8">By:-<?php echo $row1['c_fname'].'&nbsp'.$row1['c_lname'];   ?></div>
   
</div>
 
<?php
            while ( $row4 = mysqli_fetch_array($sqlslot4)) {
               // $eid4=$row4['event_id'];
               ?>
  <a href="../web/bookcal.php?eid=<?php echo $row4['event_id']; ?>"><?php echo $row4['event_name']; ?> - - <?php echo $row4['start_date']; ?> To <?php echo $row4['end_date']; ?></a><br>
              <?php
               
                            
            }
            echo "<br>";
  
}else{

      $result2 = mysqli_query($bd, "SELECT * FROM cus WHERE `c_id` = '$row[c_id_1]' ");
      $row2 = mysqli_fetch_array($result2);
       $cid2= $row2['c_id'];
$sqlslot5 = mysqli_query($bd, "SELECT * FROM events WHERE `c_id` = $cid2 AND `Privacy` = 3 ");
   ?>
<div class="row">
  <div class="col-md-8">By:-<?php echo $row2['c_fname'].'&nbsp'.$row2['c_lname'];   ?></div>
  
</div>
 

<?php
            while ( $row5 = mysqli_fetch_array($sqlslot5)) {
             // $eid5=$row5['event_id'];
              ?>
                <a href="../web/bookcal.php?eid=<?php echo $row5['event_id']; ?>"><?php echo $row5['event_name']; ?> - - <?php echo $row5['start_date']; ?> To <?php echo $row5['end_date']; ?></a><br>
              <?php
               
                          }
                          echo "<br>";

}
}
?>

  
<!-- <tr><td>  <label class="control-label" type="password">Password : </label></td>
      <td > <input type="password" value="<?php echo $row['pw']; ?>" readonly="readonly">  </td></tr>
     -->  
</table>
 
 
<!-- <div class="form-group">
<a href="accountedit.php"> <button type="button" class="btn btn-primary">Edit Account</button></a>
 
</div> -->

<!-- </form> -->
<?php
// } else {
//  echo "no results found";
// }

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