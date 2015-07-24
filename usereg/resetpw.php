 <script type="text/javascript" src="../js/jquery-1.11.3.js"></script> 
      <!-- // <script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.js"></script>  -->

      <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
<script type="text/javascript" src="../bootstrap/js/move-top.js"></script>
<script type="text/javascript" src="../bootstrap/js/easing.js"></script>
<script type="text/javascript" src="../bootstrap/js/startstop-slider.js"></script>
   <script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>
      <script>
            $(function(){
  $("#header").load("../headerfooter/header.php"); 
  $("#footer").load("../headerfooter/footer.php"); 
 
  });
        </script>

 <div id="header"></div> 
<div class="wrap">
 <body>
     
<div class='alert alert-primary' role='alert'> </div>

<?php
// Pear Mail Library
 session_start();
include('../database_connection.php');
 
 if(!isset($_SESSION['rand']))
 {
   header("location: ../web/");
   
 }
 //  echo "here";
 // }
// header('Refresh: 3;url=../web/');
if(isset($_GET["r"]) && trim($_GET["r"]) == $_SESSION['rand']){
   echo "enter new pw";
?>
 <div class="row">
 <div class=" col-md-12">
  <div class='alert alert-warning' role='alert'>Enter new Password</div>

</div>


 <div class=" col-md-4">
</div>

 <div class=" col-md-4">
<div class="well ">

  <form name="myForm" action="savepw.php?cid=<?php echo $_GET['cid']; ?>" method="post" onsubmit="return validateForm()" data-toggle="validator" >

<div class="form-group">
    <label class="control-label">New Password</label>
    <input type="password" name="pw" id="pw" class="form-control"  placeholder="Enter A Password" onchange="form.pw2.pattern = this.value;" required/></div>
   <div class="form-group">  <input type="password" name="pw2" id="pw2" class="form-control"  placeholder="Enter A Password" required/>
</div>
 <div class="form-group">
   
<td align="center"><input type="submit"  class="btn btn-primary btn-xs"  value="Confirm New Password" /></td>
</div>

 

</form>

 </div>
</div>
</div>
<?php
}
else{
  echo "error";
  ?>

<?php
}
?>

 </body>  
 </div>   