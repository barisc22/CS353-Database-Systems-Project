<?php
include "config.php";
$c_id = $_SESSION["Id"];
if(isset($_GET['user_id']) && isset($_GET['interview_id'])){
    $user_id = $_GET['user_id'];
    $interview_id = $_GET['interview_id'];
    $sql = "INSERT INTO solves VALUES ('$user_id', '$interview_id', NULL, NULL)";
    $result = mysqli_query($con, $sql);
    if($result == 1){
    	echo "<script type='text/javascript'>alert('Interview is sent to user.');</script>";
	}
	header( "Location: sendInterview.php?user_id=".$user_id."");
    
}
?>
