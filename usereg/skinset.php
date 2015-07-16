
<script>
    window.onunload = refreshParent;
    function refreshParent() {
        window.opener.location.reload();
    }

    window.close();
</script>

<?php

session_start();
 

include('../database_connection.php');

$c_id=$_SESSION["login"];


$skin=$_POST['optradio']; 

$sql = "UPDATE   `calendar`.`cus` SET  `skin` = '$skin'
 WHERE  `cus`.`c_id` =$c_id;";


if(isset($_POST['optradio']))
{

if (!mysqli_query($bd, $sql))
  {
  die('Error: ' . mysqli_error($bd));
  }
echo "record updated";
 header("location: account.php");
mysqli_close($bd);

}



/* 
$sql = "UPDATE   `calendar`.`cus` SET  `c_fname` =  '$_POST[c_fname]',
`c_lname` =  '$_POST[c_lname]',
`c_email` =  '$_POST[c_email]',
`c_dob` =  '$_POST[c_dob]',
`c_tp` =  '$_POST[c_tp]',
`un` =  '$_POST[un]',
`pw` =  '$pw' WHERE  `cus`.`c_id` =$_GET[c_id];";

if (!mysqli_query($bd, $sql))
  {
  die('Error: ' . mysqli_error($bd));
  }
echo "record updated";
 header("location: account.php");
mysqli_close($bd); */

// if($suser == 1) {
// 	header("location: ../admin/adminaddcus.php");
// }else if($suser == 2) {
// 	header(" ");
// }

header("Location: ../web/");
die();
?>

