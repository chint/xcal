<?php
include('../database_connection.php');


if($_GET['f']==2){

if($_GET['x']==1){


$sql = "DELETE FROM `messages` WHERE `id`=$_GET[id]";
}else{

$sql = "UPDATE `messages` SET `deleted`='$_GET[f]'  WHERE `id`=$_GET[id]";
}

if (!mysqli_query($bd, $sql))
  {
  die('Error: ' . mysqli_error($bd));
  }

}elseif ($_GET['f']==1) {

	if($_GET['x']==2){


$sql = "DELETE FROM `messages` WHERE `id`=$_GET[id]";
}else{

$sql = "UPDATE `messages` SET `deleted`='$_GET[f]', `status`='1' WHERE `id`=$_GET[id]";
}

if (!mysqli_query($bd, $sql))
  {
  die('Error: ' . mysqli_error($bd));
  }
	
}
?>



<script>
    window.onunload = refreshParent;
    function refreshParent() {
        window.opener.location.reload();
    }
    window.close()
</script>