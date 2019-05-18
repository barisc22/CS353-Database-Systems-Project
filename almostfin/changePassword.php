<?php
include "config.php";
$usId =  $_SESSION['Id'];
echo "in change";
if (isset($_POST['password'])) {
	
	$pass = strip_tags($_POST['password']);
	if($pass != ""){
	 $up2 = "update general_user set password = '".$pass."'  where  id = '".$usId."'";
	  $result12 = mysqli_query($con,$up2);

	}
	}

 ?>
