<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<link href="../web/web/css/style.css" rel="stylesheet" type="text/css" media="all"/>
<link href="../web/web/css/slider.css" rel="stylesheet" type="text/css" media="all"/>
<script type="text/javascript" src="../web/web/js/jquery-1.7.2.min.js"></script> 
<script type="text/javascript" src="../web/web/js/move-top.js"></script>
<script type="text/javascript" src="http://localhost/bootstrap/js/jquery-1.7.2.min.js"></script> 
<script type="text/javascript" src="http://localhost/bootstrap/js/move-top.js"></script>
<script type="text/javascript" src="http://localhost/bootstrap/js/easing.js"></script>
<script type="text/javascript" src="http://localhost/bootstrap/js/startstop-slider.js"></script>
<!--    <script type="text/javascript" src="http://localhost/bootstrap/js/bootstrap.min.js"></script>   -->

<script type="text/javascript" src="http://localhost/bootstrap/js/bootstrap.min.js"></script>
  <link href="http://localhost/bootstrap/css/bootstrap.min.css" rel="stylesheet">
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

include('database_connection.php');
$a=0;


// echo $_POST['email1'];

$result = mysqli_query($bd, "SELECT * FROM `calendar`.`cus` WHERE `c_email` = '$_POST[email1]' ");

if ($row = mysqli_fetch_array($result)) {
      
      $rand=rand();
$_SESSION['rand']=$rand;
    $body="Username - ".$row['un']. "  Password Reset Link : -  http://localhost/shop/logorreg/resetpw.php?r=".$rand."&cid=".$row['c_id'];
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