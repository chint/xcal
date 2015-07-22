<link href="http://localhost/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="stylee1.css">
   <script src="../bootstrap/jquery/jquery-1.11.2.js"></script> 
<script type="text/javascript" src="../bootstrap/js/move-top.js"></script>
<script type="text/javascript" src="../bootstrap/js/easing.js"></script>
<script type="text/javascript" src="../bootstrap/js/startstop-slider.js"></script>
 
 <script type="text/javascript" src="../js/jquery-1.7.2.min.js"></script> 
        <script>
            $(function(){
  $("#header").load("../header/header.php"); 
  // $("#footer").load("../headerfooter/footer.php"); 
 
  });
        </script>
  <div id="header"></div>	  
   <div class="wrap">

<body>

 <div class="row">


 <div class=" col-md-12">


<div class="panel panel-primary">
    <div class="panel-heading">Login or Create an Account</div>


<table class="table table-bordered ">


<tr>
  <td  class="col-md-2">
    
  </td>
 <td class="col-md-4">
  Registered Customers
  </td>
   <td class="col-md-4">
   New Customers
  </td>
</tr>


<tr>
  <td >
     <img  class="img-thumbnail"  alt="Responsive image" src="login.png" alt=""    />
 
     </td>

   <td > 

   <form role="form-inline" role="form" action="" method="post">
  <div class="form-group">
<label   for="un">UserName :</label>
<input class="form-control input-sm " id="un" type="text" name="username" placeholder="Enter User Name" required/>
</div>  <div class="form-group">
<label  >Password :</label>
<input class="form-control input-sm" type="password" name="password"  placeholder="Enter User Password" required/>
</div> <div class="form-group">
<input type="submit" value=" Login " class="btn btn-primary     pull-right" />
</div>
</form>

 <a href="../logorreg/passwordsend.php"><font size="2">Forgotten Password</font></a >

   </td>
  
   
<td    class="text-center">
  <div class='alert alert-info' role='alert'> If you are a new user please <a  href="adduser.php"><button type="button" class="btn btn-success" >Register</button></a> </div>


     </td>
</tr>
</table>



</div>


</div>

  </div>
<?php
include('../database_connection.php');
session_start();
if(isset($_SESSION['login']))
{
     header("location: ../web/");
}
if($_SERVER["REQUEST_METHOD"] == "POST")
{
// username and password sent from Form
$myusername=mysqli_real_escape_string($bd,$_POST['username']); 
$pw=mysqli_real_escape_string($bd,$_POST['password']); 


$mypassword=md5($pw);

// $sql="SELECT * FROM `cus` WHERE 'un'='$myusername' and 'pw'='$mypassword'";
$sql = "SELECT * FROM `cus` WHERE `un` LIKE '$myusername' AND `pw` LIKE '$mypassword'";


$result=mysqli_query($bd,$sql);

$row=mysqli_fetch_array($result,MYSQLI_ASSOC);


$count=mysqli_num_rows($result);


echo $row['un'];
$stat=$row['cus_status'];
 
// If result matched $myusername and $mypassword, table row must be 1 row
if (($count==1) && ($stat==0))
{
  echo "<script type='text/javascript'>window.parent.location.replace('../web/banned.php')</script>";
echo "ur banned";

}
else if($count==1)
{
// session_register("myusername");
$_SESSION['OK']=1;
$_SESSION['logins']=$row['c_id'];
$_SESSION['un']=$row['c_fname'];
// echo 'login success';
  // echo "<script type='text/javascript'>window.parent.location.reload(true)</script>";
// header("location: http://localhost/shop/customer/welcome.php");

  if($row['type']==1)
  {
    $_SESSION['Admin']=$row['un'];
  }
header("location: ../home.html");
}
else 
{
   echo ' ' . mysqli_error($bd);
   echo "<div class='alert alert-danger' role='alert'>Invalid UN/PW combination.Check your Username and Password</div>";
   // echo '  <a class="btn btn-default" href="http://localhost/shop/customer/tryagain.php" >Try Again</a> ';
// header("location: http://localhost/shop/customer/tryagain.php");
}
}
?>


<!-- <div class="col-md-6"> -->
      <!-- <div class="well"> -->
  

<!-- </div> -->
<!-- </div> -->
 

 </div>

 
 </div>
  </div>
</div>
 
</body>
<div id="footer"></div>
</html>

