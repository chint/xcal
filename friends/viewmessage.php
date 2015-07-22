<?php
include('../database_connection.php'); 


$result = mysqli_query($bd, "SELECT * FROM `calendar`.`messages` WHERE `id` = '$_GET[id]' ");
 $row = mysqli_fetch_assoc($result);

 echo 'Subject :'.$row['head'].'<br>';

 echo 'Message :'.$row['body'];


$sql = "UPDATE `messages` SET `status`='1' WHERE `id`=$_GET[id]";

if (!mysqli_query($bd, $sql))
  {
  die('Error: ' . mysqli_error($bd));
  }


?>

<script>
    window.onunload = refreshParent;
    function refreshParent() {
        window.opener.location.reload();
    }
</script>