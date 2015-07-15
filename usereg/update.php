
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

if($_POST['pw']==''){

$sql = "UPDATE   `calendar`.`cus` SET  `c_fname` =  '$_POST[c_fname]',
`c_lname` =  '$_POST[c_lname]',
`c_email` =  '$_POST[c_email]',
`c_dob` =  '$_POST[c_dob]',
`c_tp` =  '$_POST[c_tp]',
`un` =  '$_POST[un]'
WHERE  `cus`.`c_id` =$_GET[c_id];";

if (!mysqli_query($bd, $sql))
  {
  die('Error: ' . mysqli_error($bd));
  }
echo "record updated";
 header("location: account.php");
mysqli_close($bd);
}else{



$pw=md5($_POST['pw']);
echo $_GET['c_id'];
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
mysqli_close($bd);

}
?>

