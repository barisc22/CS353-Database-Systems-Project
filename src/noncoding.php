<?php
include "config.php";
if(isset($_POST['category'])){
	$category =  $_POST['category'];

	if(isset($_POST['title'])){
		$title =  $_POST['title'];

		if(isset($_POST['save'])){
			$question = $_POST['question'];
			if(isset($_POST['mc1']) && isset($_POST['mc2']) && isset($_POST['mc3']) && isset($_POST['mc4'])){
				$mc1 =  $_POST['mc1'];
				$mc2 =  $_POST['mc2'];
				$mc3 =  $_POST['mc3'];
				$mc4 =  $_POST['mc4'];
				$sql = "INSERT INTO noncoding_question VALUES (0, '$question', 0, '$title', '$category', 1, 1)";
		        $result = mysqli_query($con, $sql);

		        $sql = "SELECT question_id FROM noncoding_question WHERE question_id=(SELECT max(question_id) FROM noncoding_question)";
		        $result = mysqli_query($con, $sql);
				$row = mysqli_fetch_assoc($result);
				$id = implode(",", $row);

		        $sql = "INSERT INTO ncquestion_choices VALUES ($id, '$mc1')";
		        $result = mysqli_query($con, $sql);
		        $sql = "INSERT INTO ncquestion_choices VALUES ($id, '$mc2')";
		        $result = mysqli_query($con, $sql);
		        $sql = "INSERT INTO ncquestion_choices VALUES ($id, '$mc3')";
		        $result = mysqli_query($con, $sql);
		        $sql = "INSERT INTO ncquestion_choices VALUES ($id, '$mc4')";
		        $result = mysqli_query($con, $sql);

		    }else{
		    	$sql = "INSERT INTO noncoding_question VALUES (0, '$question', 0, '$title', '$category', 1, 0)";
		        $result = mysqli_query($con, $sql);

		    }
		}
	}
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet" type="text/css" href="styles/w3.css">
	<title>Prepare Question</title>

	<style>
	.blocktext {
    position: relative;
    display: inline-block;
	}

	.center {
	  margin: auto;
	  width: 40%;
	  padding: 10px;
	}

	</style>
</head>
<body>
	<div class="w3-container">
		<img src="images/codeint.png" class="w3" style="padding:10px; width:15%; margin: auto;">
	</div>
	<h3 style="font-weight: bold;">Noncoding Question</h3>
	<script type="text/javascript"></script>

	<form method="post">

	<div class="center" align="center">
	 <select onchange="location = this.value;">
	 <option value="noncoding.php">NonCoding</option>
	  <option value="prepare_question.php">Challenge</option>
	  <option value="contest.php">Contest</option>
	</select> 

	<select name = "category">
	 <option value="category">Select Category</option>
	  <option value="c1">C1</option>
	  <option value="c2">C2</option>
	  <option value="c3">C3</option>
	  <option value="c4">C4</option>
	</select> 
	</div>

	<input class="w3-input w3-border w3-padding w3-round-xxlarge" name="title" type="text" placeholder="Title" id="title" style="width: 40%; height: 20; margin-left: 15%; margin-top: 1%;">

	<input class="w3-input w3-border w3-padding w3-round-xxlarge" name="question" type="text" placeholder="Question" id="question" style="width: 40%; height: 200px; margin-left: 15%;">

	<input class="w3-input w3-border w3-padding w3-round-xxlarge" name="mc1" type="text" placeholder="mc1" id="mc1" style="width: 40%; height: 20; margin-left: 15%; margin-top: 2%;">
	<input class="w3-input w3-border w3-padding w3-round-xxlarge" name="mc2" type="text" placeholder="mc2" id="mc2" style="width: 40%; height: 20; margin-left: 15%;">
	<input class="w3-input w3-border w3-padding w3-round-xxlarge" name="mc3" type="text" placeholder="mc3" id="mc3" style="width: 40%; height: 20; margin-left: 15%;">
	<input class="w3-input w3-border w3-padding w3-round-xxlarge" name="mc4" type="text" placeholder="mc4" id="mc4" style="width: 40%; height: 20; margin-left: 15%;">

<input class="w3-button w3-purple w3-round-large" type="submit" name = "save" value = "Save" style="width: 5%; height: 30px; margin-left: 55%; 
	  margin-top: -4%;">
</body>
</html>