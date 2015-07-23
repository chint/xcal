 

 
<html lang="en">
  <head>
  

    <title>Online Calendar</title>
<!-- <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css"> 

 
<link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">

<script type="text/javascript" src="../bootstrap/js/move-top.js"></script>
<script type="text/javascript" src="../bootstrap/js/easing.js"></script>
<script type="text/javascript" src="../bootstrap/js/startstop-slider.js"></script>
 -->
<!-- <script type="text/javascript" src="../js/jquery-1.11.3.min.js"></script>  -->
   
   
 
  </head>
<style type="text/css">
 
  .navbar-top {
  background-color:#428bca;
    color:#ffffff;
    border-radius:0;
}

/*.btn-margin-left {
    margin-left: 2px;
}
.btn-margin-right {
    margin-right: 2px;
}*/
.navbar-top .navbar-nav > li > a {
    color:#fff;
    padding-left:9px;
    padding-right:9px;
}

.navbar-top .navbar-nav > li > a:hover, .nav > li > a:focus {
    text-decoration:none;
    background-color: #3399FF;
}

.navbar-top {
    min-height: 1px;
}

.navbar-top ul li a {
  font-size:      0.9em;
    line-height: 20px;
    height: 25px;
    padding-top: 1 ;
}

.navbar-top  > li > a {
    color:#fff;
    padding-left:20px;
    padding-right:20px;
}

/*.navbar-top {
    min-height: 0px;
}
 .navbar-top  {
    height: 20px;  
}*/

  .navbar-custom {
  background-color:#428bca;
    color:#ffffff;
    border-radius:0;
}
  
.navbar-custom .navbar-nav > li > a {
    color:#fff;
    padding-left:20px;
    padding-right:20px;
}
.navbar-custom .navbar-nav > .active > a, .navbar-nav > .active > a:hover, .navbar-nav > .active > a:focus {
    color: #ffffff;
  background-color:transparent;
}
      
.navbar-custom .navbar-nav > li > a:hover, .nav > li > a:focus {
    text-decoration: none;
    background-color: #3399FF;
}
      
.navbar-custom .navbar-brand {
    color:#eeeeee;
}
.navbar-custom .navbar-toggle {
    background-color:#eeeeee;
}
.navbar-custom .icon-bar {
    background-color:#33aa33;
}
</style>
  <body>

    <nav class="navbar navbar-custom  ">
      <div class="container-fluid">

        <div class="navbar-header">
        <a class="navbar-brand" href="./index.php">
        <img alt="Brand" width="20" height="20" src=" icon.ico">
        </a>
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="../web">Online Calendar</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
     <?php
 session_start();
 if(!empty($_SESSION['login']))
     {
include('../database_connection.php'); 



echo 
'

	  <form class="navbar-form navbar-right"  >
        <div class="form-group">
          <input type="text" class="form-control" id="myText"   placeholder="Search">
        <a onclick="myFunction()" class="btn btn-info" role="button">Search</a>
         
        </div>
      </form>
			

          <form class="navbar-form navbar-right" action="../usereg/logout.php" method="post">
 			Welcome:'.$_SESSION['name'].'
 			 <a href="../usereg/account.php" class="btn btn-success" role="button">My Account</a>
             <a href="../usereg/bookings.php" class="btn btn-success" role="button">Appointments</a>
            <button type="submit" class="btn btn-info">Logout</button>

         </form> 
        
 
      
';

$result = mysqli_query($bd, "SELECT COUNT(id) AS `count`  FROM `calendar`.`friends` WHERE `c_id_2` = '$_SESSION[login]' AND `status` = '0' ");
$row = mysqli_fetch_array($result); 

$result1 = mysqli_query($bd, "SELECT COUNT(id) AS `count`  FROM `calendar`.`messages` WHERE `to_cid` = '$_SESSION[login]' AND `status` = '0' ");
$row1 = mysqli_fetch_array($result1); 

$count=$row['count']+$row1['count'];


	if($count!=0){

echo '
<div class="navbar-form navbar-right">
<div class="btn-group">
  <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="badge">
   '.$count.'</span><span class="caret"></span>
  </button>
  <ul class="dropdown-menu">';

  $result = mysqli_query($bd, "SELECT * FROM `calendar`.`friends` WHERE `c_id_2` = '$_SESSION[login]' AND `status` = '0' ");
  while ( $row = mysqli_fetch_array($result)) {

  $result1 = mysqli_query($bd, "SELECT * FROM `calendar`.`cus` WHERE  `c_id`= '$row[c_id_1]'  ");  // to get friends name
  $row1 = mysqli_fetch_assoc($result1);

  echo '<li><a>Friend request from: '.$row1['c_fname'].'</a></li>
  		<div class="row">
  		<div class="col text-center">
        <a href="../friends/accept.php?id='.$row['id'].'" "><button type="button" class="btn btn-danger">Reject</button></a>
        <a href="../friends/accept.php?status=1&id='.$row['id'].'" "><button type="button" class="btn btn-success">Accept</button></a>
        </div>
        </div>
        <li class="divider"></li>
  ';
  }

  $result = mysqli_query($bd, "SELECT * FROM `calendar`.`messages` WHERE `to_cid` = '$_SESSION[login]' AND `status` = '0' ");
  while ( $row = mysqli_fetch_array($result)) {

  $result1 = mysqli_query($bd, "SELECT * FROM `calendar`.`cus` WHERE  `c_id`= '$row[from_cid]'  ");  // to get friends name
  $row1 = mysqli_fetch_assoc($result1);

  echo '<li><a>Message from: '.$row1['c_fname'].'</a></li>
      <div class="row">
      <div class="col text-center">'; ?>
        <a><button onClick="popitup('../friends/deletemsg.php?f=1&x=<?php echo $row['deleted']; ?>&id=<?php echo $row['id']; ?>')" type="button" class="btn btn-danger">Delete</button></a>
        <a><button onClick="popitup('../friends/viewmessage.php?id=<?php echo $row['id']; ?>')" type="button" class="btn btn-info">Read</button></a>
  <?php      
  echo '  </div>
        </div>
        <li class="divider"></li>
  ';
  }


echo   '
  </ul>
</div>
</div>
';

}






     }else{



           echo '

 			
			

          <form class="navbar-form navbar-right" action="../usereg/login.php" method="post">
            <div class="form-group">
              <input type="text" placeholder="Email or User Name" name="userormail" class="form-control">
            </div>
            <div class="form-group">
              <input type="password" placeholder="Password" name="password" class="form-control">
            </div>
            <button type="submit" class="btn btn-success">Sign in</button>
            <a href="../usereg/adduser.php" class="btn btn-info" role="button">Register</a>
          </form>
           ';
  

			} ?>

       

        </div><!--/.navbar-collapse -->
      </div>
    </nav>   
</body>
</html>

<script>
  
function popitup(url) {
       newwindow=window.open(url,'windowName','height=450,width=650');
       if (window.focus) {newwindow.focus()}
       return false;
     }

</script>

	
