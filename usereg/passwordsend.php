<link href="http://localhost/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="stylee1.css">
   <script src="../bootstrap/jquery/jquery-1.11.2.js"></script> 
<script type="text/javascript" src="http://localhost/bootstrap/js/move-top.js"></script>
<script type="text/javascript" src="../bootstrap/js/easing.js"></script>
<script type="text/javascript" src="../bootstrap/js/startstop-slider.js"></script>
 
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
 
        <script>
            $(function(){
  $("#header").load("../headerfooter/header.php"); 
  $("#footer").load("../headerfooter/footer.php"); 
  
  });
        </script>
  <div id="header"></div>   
   <div class="wrap">

<body>



 <div class="row">
 <div class=" col-md-12">
  <div class='alert alert-warning' role='alert'>Enter Email address to recover you password.</div>

</div>


 <div class=" col-md-4">
</div>

 <div class=" col-md-4">
<div class="well ">



  <form name="myForm" action="sendemail.php" method="post" onsubmit="return validateForm()" data-toggle="validator" >



  <div class="form-group">
  <label class="control-label">Your Email Address</label>
   <input class="form-control" type="email" id="email" name="email1"  placeholder="Email" required/>

</div>
 <div class="form-group">
   
<td align="center"><input type="submit"  class="btn btn-primary btn-xs"  value="Request Login Details" /></td>
</div>

 

</form>

 </div>
</div>
</div>
 </body>
</div>
 

<div id="footer"></div>
</html>

