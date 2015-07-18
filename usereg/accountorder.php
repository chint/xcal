 <link href="http://localhost/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="stylee1.css">
   <script src="../bootstrap/jquery/jquery-1.11.2.js"></script> 
<script type="text/javascript" src="http://localhost/bootstrap/js/move-top.js"></script>
<script type="text/javascript" src="../bootstrap/js/easing.js"></script>
<script type="text/javascript" src="../bootstrap/js/startstop-slider.js"></script>
  <!-- // <script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script> -->
<!-- <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script> -->
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
<!-- <link rel="stylesheet" type="text/css" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css"> -->
        <script>
            $(function(){
  $("#header").load("../headerfooter/header.php"); 
  $("#footer").load("../headerfooter/footer.php"); 
    $("#caro").load("../caros/dfs.php"); 
    $("#pag").load("../product/pag.php"); 
    $("#cat").load("../product/cat.php"); 
  });
        </script>
  <div id="header"></div>   
   <div class="wrap">

<div class="well well-sm">

<h3>My Dashboard</h3>
  </div>


  <div class="row">
  <div class="col-md-3 ">
<div class="well well-sm">
<table class="table table-bordered">
  <tr> <td>
 <label><h4><a href="account.php">My Account Details</a> </h4></label>
 </td> </tr>
  <tr><td>
    <label><h4>  My Orders  <span class="glyphicon glyphicon-play"></span> </h4> </label>
  </td></tr>
</table>
  </div>
  </div>

   <div class="col-md-8 ">
<div class="well well-sm">


<table  class="table table-striped">
<tr>

<td><label class="control-label">Order ID</label></td>
<td><label class="control-label">Order Date</label></td>
<td><label class="control-label">No. of Products</label></td>
<td><label class="control-label">Total</label></td>
<td><label class="control-label">Status </label></td>

</tr>
<?php

include('database_connection.php');

session_start();
include('../checklogin.php');
if( empty($_SESSION['logins']))
{
header('Location:../logorreg/logreg.php');
}else{
$a=$_SESSION['logins'];
}
 
 
$result = mysqli_query($bd, "SELECT * FROM `shop`.`order` WHERE `c_id` = '$a' ");

while ($row = mysqli_fetch_array($result)) {

 $crt=$row['crt_ID'];
 $payid=$row['pay_ID'];

$result2 = mysqli_query($bd, "SELECT COUNT(p_ID) AS counts FROM `shop`.`cart_product` WHERE `crt_ID` = '$crt' ");
$r2 = mysqli_fetch_assoc($result2);
$result3 = mysqli_query($bd, "SELECT * FROM `shop`.`payment` WHERE `pay_ID` = '$payid' ");
$r3 = mysqli_fetch_assoc($result3);
         $shipre= mysqli_query($bd,"SELECT `ship_status` FROM `shipping` WHERE `ship_ID` = '$row[ship_ID]'");
        $ship1=mysqli_fetch_assoc($shipre);
 echo '<tr>';
?>


<td>#<?php echo $row['or_ID']; ?></td> 
<td> <?php echo $row['or_date']; ?></td> 
<td> <?php echo $r2['counts']; ?></td> 
<td>RS. <?php echo $r3['pay_amount']; ?>.00</td> 
<td> 
<?php

if ($ship1['ship_status']==1) {
  echo 'shipped';
} else  {
echo $row['status'];
}

 
 ?>
</td> 
<td> <a href="cusordview.php?oid=<?php echo $row['or_ID']; ?>">View</a> </td> 
<?php
 echo '</tr>'; 
}  
mysqli_close($bd);
?>

</table>
 </div>
  </div>

 
</div>

   

  
  <!-- </div> -->

  
 </div>
 
</div>
   

</body>
<div id="footer"></div>
</html>