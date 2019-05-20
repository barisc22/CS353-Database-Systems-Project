<?php
include "config.php";
$challenge = $_GET['challenge'];
$user = $_GET['user'];
$editId =  $_SESSION['Id'];

$q1 = "select title, question from coding_challenge where challenge_id = '".$challenge."' ";
$q2 = "select submission from submit where challenge_id = '".$challenge."' and user_id = '".$user."' ";
$result1 = mysqli_query($con, $q1);
$row1 = mysqli_fetch_assoc($result1);
$result2 = mysqli_query($con, $q2);
$row2 = mysqli_fetch_assoc($result2);

if(isset($_POST['grade'])){
	$grade =  $_POST['grade'];
 	if(isset($_POST['submit_but'])){

		$q3 = "insert into controls values('".$editId."', '".$user."', '".$challenge."')";
		$result3 = mysqli_query($con, $q3);

		$q4 = "update user set total_score = total_score + $grade where id = '$user' ";
		$result4 = mysqli_query($con, $q4);

		$q5 = "delete from submit where user_id = '$user' and challenge_id = '$challenge' ";
		$result5 = mysqli_query($con, $q5);

 		header('Location: EditorMainPage.php');
	}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet" type="text/css" href="../codeint/styles/w3.css">
	<title>CodeInt - CV Pool</title>
	<style>
	/* width */
	::-webkit-scrollbar {
	  width: 20px;
	}

	/* Track */
	::-webkit-scrollbar-track {
	  box-shadow: inset 0 0 5px grey; 
	  border-radius: 10px;
	}
	 
	/* Handle */
	::-webkit-scrollbar-thumb {
	  background: purple; 
	  border-radius: 10px;
	}

	/* Handle on hover */
	::-webkit-scrollbar-thumb:hover {
	  background: #000; 
	}
	</style>
</head>
<body>
	<div class="w3-container">
		<img src="images/codeint.png" class="w3" style="padding:10px; width:15%; margin: auto;">
	</div>
	<div class="w3-container w3-center" style="margin-top: 50px; width: 100%; margin: auto; ">

		<h2 style="font-weight: bold; ">Checking Question</h2>
		<div class="w3-container" style="width: 60%; height: 80%; text-align: center; padding:10px; margin: auto; display: inline-block; padding-top: 2%;">
		<h2 style="float: left; font-size: 20px;">UserID: <?php echo $user ?> </h2>
			<div style="width: 100%; height: 100px; border: 1px solid grey; margin: 10px; padding: 10px; overflow: auto;">Question: <?php echo $row1['question'] ?> </div>
			<div style="width: 100%; height: 200px; border: 1px solid grey; margin: 10px; padding: 10px; overflow: auto;">Answer: <?php echo $row2['submission'] ?></div>


			<div style="float: right; font-size: 24px;"> /100</div>
			<form method="POST">
                        <div class="input-group">
                   <input class= "w3-input w3-border w3-round-large" type="text" style="height: 40px; width: 80px; float: right;"" placeholder=" " name="grade">
                        </div>
			
			<br><br>
			<p>
				
  <input type="submit" class="contact100-form-btn" id="submit_but" 
            	style="clear: both; float: right;"	name = "submit_but" value= "Grade"/>
				</p>
		</div>
	</div>


	<script>
	function searchCompany() {
	  var input, filter, ul, li, a, i;
	  input = document.getElementById("cvPoolInput");
	  filter = input.value.toUpperCase();
	  ul = document.getElementById("myUL");
	  li = ul.getElementsByTagName("label");
	  li2 = ul.getElementsByTagName("input");
	  for (i = 0; i < li.length; i++) {
	    txtValue = li[i].textContent || li[i].innerText;
	    if (txtValue.toUpperCase().indexOf(filter) > -1) {
	      li[i].style.display = "";
	      li2[i].style.display = "";
	    } else {
	      li[i].style.display = "none";
	      li2[i].style.display = "none";
	    }
	  }
	}
	</script>
	
</body>
</html>