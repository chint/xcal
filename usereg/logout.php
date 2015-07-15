<?php 
session_start();
if($_SERVER["REQUEST_METHOD"] == "POST")
{
if(session_destroy())
{
  
  header("Location: ../home.html");
}
}

?>