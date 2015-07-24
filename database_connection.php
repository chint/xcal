<?php
$mysql_hostname = "localhost";
$mysql_user = "root";
$mysql_password = "";
$mysql_database = "calendar";

// $mysql_hostname = "mysql2.000webhost.com";
// $mysql_database = "a6477626_cal";
// $mysql_user = "a6477626_admin";
// $mysql_password = "xcalpass123";

$prefix = "";
$bd = mysqli_connect($mysql_hostname, $mysql_user, $mysql_password, $mysql_database) or die("Opps some thing went wrong");
// mysql_select_db($mysql_database, $bd) or die("Opps some thing went wrong");

?>