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
     
<div class='alert alert-primary' role='alert'>Recovery mail is sent to  ,please check you E-mail.</div>

<?php
session_start();
// Pear Mail Library
require_once "Mail.php";

include('../database_connection.php');
$a=0;


// echo $_POST['email1'];

$result = mysqli_query($bd, "SELECT * FROM  cus WHERE `c_email` = '$_POST[email1]' ");

if ($row = mysqli_fetch_array($result)) {
      
      $rand=rand();
$_SESSION['rand']=$rand;
    $body="Username - ".$row['un']. "  Password Reset Link : -  hhttp://xcal.net46.net/usereg/resetpw.php?r=".$rand."&cid=".$row['c_id'];
    $a=1;

} else {

    $body= "error";
}


// var_dump($_POST);
$from = '<from@gmail.com>';
$to = '<'.$_POST['email1'].'>';
$subject = 'Your username and password';


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

if($a==1){
$mail = $smtp->send($to, $headers, $body);
 
echo " <div class='alert alert-primary' role='alert'>Recovery mail is sent to ". $_POST['email1']." ,please check you E-mail.</div>";
$a=0;} else {


    echo "Email not in use";
}
header('Refresh: 3;url=../web/');

?>

 </body>  
 </div>   