 

 
<html lang="en">
  <head>
  

    <title>Online Calendar</title>
<!-- <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet"> -->
  
   <!-- // <script type="text/javascript" src="../js/jquery-1.11.3.min.js"></script>  -->
       <!-- 
          <script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.js"></script> 
 -->
<!--  
<script type="text/javascript" src="../bootstrap/js/move-top.js"></script>
<script type="text/javascript" src="../bootstrap/js/easing.js"></script>
<script type="text/javascript" src="../bootstrap/js/startstop-slider.js"></script>
   <script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>
 
 -->
   
   
 
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


 <script type="text/javascript">
   function myFunction1() {
    
  
      // scheduler.load("../data/connector.php?type=1");
// scheduler.updateView();
//      scheduler.getEvent(1).colour = "yellow";
// scheduler.updateEvent(1);
}
        </script>



  <body>

    <nav class="navbar navbar-custom  ">
      <div class="container-fluid">

        <div class="navbar-header">
        <a class="navbar-brand" href="./index.php">
        <img alt="Brand" width="20" height="20" src=" ./header/icon.ico">
      </a>
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="../web">Online Calendar</a>
        </div>
     <?php
 session_start();
 if(!empty($_SESSION['login']))
     {

echo 
'

	<div id="navbar" class="navbar-collapse collapse navbar-right"  t>
			   <form class="navbar-form navbar-left"  >
        <div class="form-group">
          <input type="text" class="form-control" id="myText"   placeholder="Search">
        <a onclick="myFunction()" class="btn btn-info" role="button">Search</a>
         
        </div>
      </form>

          <form class="navbar-form navbar-right" action="../usereg/logout.php" method="post">
 			Welcome:'.$_SESSION['name'].'
 			 <a href="../usereg/account.php" class="btn btn-success" role="button">My Account</a>
            
            <button type="submit" class="btn btn-success">Logout</button>
            
          </form>
        
 
      
';

     }else{



           echo '

 			<div id="navbar" class="navbar-collapse collapse">
			

          <form class="navbar-form navbar-right" action="../usereg/login.php" method="post">
            <div class="form-group">
              <input type="text" placeholder="Email or User Name" name="userormail" class="form-control">
            </div>
            <div class="form-group">
              <input type="password" placeholder="Password" name="password" class="form-control">
            </div>
            <button type="submit" class="btn btn-success">Sign in</button>
            <a href="../usereg/adduser.php" class="btn btn-info" role="button">Register</a>
            <a onclick="myFunction()" class="btn btn-info" role="button">Search</a>
          </form>
           ';
  

			} ?>

       

        </div><!--/.navbar-collapse -->
      </div>
    </nav>

    
 
 
    
  </body>
</html>

	
