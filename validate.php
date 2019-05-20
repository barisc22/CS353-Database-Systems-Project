<?php 
include "config.php";

$email = 1;
$compname = $_GET['comp']; 
echo $compname;
//$editId = $_SESSION['comp'];
$validate = "update company set validation = '".$email."'  where  id = '".$compname."'";
$r4 = mysqli_query($con, $validate);
  header('Location: EditorMainPage.php');    
?>