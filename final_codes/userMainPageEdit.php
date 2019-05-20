<?php
include "config.php";
$usId =  $_SESSION['Id'];



if (isset($_POST['email'])) {
	
	$email = strip_tags($_POST['email']);
	if($email != ""){
	 $up2 = "update general_user set email = '".$email."'  where  id = '".$usId."'";
	  $result12 = mysqli_query($con,$up2);

	}
	}
 if(isset($_POST['name'])){
 $name = strip_tags($_POST['name']);
 if($name != ""){
$up1 = "update general_user set username = '".$name."'  where  id = '".$usId."'";
	 $result11 = mysqli_query($con,$up1);

}
}
if (isset($_POST['message'])){

	$message = strip_tags($_POST['message']);
	if($message != ""){
	  $up3 = "update user set user_bio = '".$message."'  where  id = '".$usId."'";
	    $result13 = mysqli_query($con,$up3);
	   
	}
}
	if(isset($_POST['date'])){
	$date = strip_tags($_POST['date']);
	if($date != ""){
	  $up4 = "update user set birth_date = '".$date."'  where  id = '".$usId."'";
	   $result14 = mysqli_query($con,$up4);
	 
	}}
?>