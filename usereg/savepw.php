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

<script>
    window.onunload = refreshParent;
    function refreshParent() {
        window.opener.location.reload();
    }

    window.close();
</script>

<?php

session_start();
 

include('database_connection.php');
$pw=md5($_POST['pw']);
// echo $_GET['cid'];
$sql = "UPDATE   cus SET `pw` =  '$pw' WHERE  `cus`.`c_id` =$_GET[cid];";

if (!mysqli_query($bd, $sql))
  {
  die('Error: ' . mysqli_error($bd));
  }
?>
 <div id="header"></div> 
    <div class="wrap">
<body>
 <div class="row">
 <table class="table table-bordered ">


<tr>
  <td  class="col-md-2">
    <img  class="img-thumbnail"  alt="Responsive image" src="../web/images/ok.png" />
  </td>
 <td class="col-md-10">
 <div class="alert alert-success" role="alert">Password change success. <span class="glyphicon glyphicon-ok" aria-hidden="true"></span></div>
 <div class="alert alert-info" role="alert">Use your new Passowrd to login<a href="../logorreg/logreg.php"> <strong>Login Page</strong></a> </div>
  <div class="alert alert-info" role="alert"><a href="../web">Click here to return to  <strong>Home Page </strong></a> </div>
 
  </td>
   
</tr>
</table>
 
  
</div>

</body>
 </div>
 <div id="footer"></div>
<?php

$_SESSION['rand']=-1;

mysqli_close($bd);

// if($suser == 1) {
// 	header("location: ../admin/adminaddcus.php");
// }else if($suser == 2) {
// 	header(" ");
// }
?>

