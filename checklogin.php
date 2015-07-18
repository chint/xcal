<?php
if (isset( $_SESSION['login'])) {
	// echo $_SESSION['login'];
}
else{
header("location: ../home.html");
}
?>