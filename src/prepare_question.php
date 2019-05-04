<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet" type="text/css" href="../baris/styles/w3.css">
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
	<h3 style="font-weight: bold;">Challenge</h3>
	<div class="center" align="center">
	 <select onchange="location = this.value;">
	  <option value="prepare_question.php">Challenge</option>
	  <option value="noncoding.php">NonCoding</option>
	  <option value="contest.php">Contest</option>
	</select> 

	 <select>
	  <option value="easy">Easy</option>
	  <option value="medium">Medium</option>
	  <option value="hard">Hard</option>
	  <option value="ultimate">Ultimate</option>
	</select> 

	 <select>
	  <option value="hop">Hop</option>
	  <option value="hop">Hop</option>
	  <option value="hop">Hop</option>
	  <option value="hop">Hop</option>
	</select> 
	</div>

	<script type="text/javascript"></script>

	<form method="post"><!-- Php dosyası buraya gelecek. -->
	<label for="question_title" id="example1" style="width: 45%; height: 200px; margin-left: 15%;">Question Title</label>
	<input class="w3-input w3-border w3-padding w3-round-xxlarge" name="question" type="text" placeholder="Question" id="question" style="width: 40%; height: 200px; margin-left: 15%;">

	 <input class="w3-input w3-border w3-padding w3-round-xxlarge" name = "test_case" type="text" placeholder="Test Cases" id="test_cases" style="width: 40%; height: 200px; margin-left: 15%; margin-top: 0%;">

	  <input class="w3-button w3-purple w3-round-large" type="submit" name = "bok" value = "Save" style="width: 5%; height: 30px; margin-left: 55%; 
	  margin-top: -4%;">

	 </form>
<!--
	

	 <form action="/action_page.php" style="width: 20%; height: 30px; margin-left: 60%; margin-top: -20%;">
	  Start Date: <input class="w3-input w3-border w3-padding w3-round-xxlarge" type="date" name="start_date">
	  <input class="w3-button w3-purple w3-round-large" type="submit" value = "Submit" name = "start_date">
	</form>

	<form action="/action_page.php" style="width: 20%; height: 30px; margin-left: 60%; margin-top:5%;">
	  End Date: <input class="w3-input w3-border w3-padding w3-round-xxlarge" type="date" name="start_date">
	  <input class="w3-button w3-purple w3-round-large" type="submit" value = "Submit" name = "end_date">
	</form>

	<form action="/action_page.php" style="width: 10%; height: 30px; margin-left: 60%; margin-top: -14%;">
	  <input class="w3-input w3-border w3-padding w3-round-xxlarge" type="text" placeholder="Duration" id="duration" ">
	  <input class="w3-button w3-purple w3-round-large" type="submit" value = "Submit" name = "duration">
	</form>
-->
<!--
	<div class="w3-container w3-center" style="margin-top: 20%; width: 100%;">
		<p><button class="w3-button w3-purple w3-round-large" style="margin-left: 600px;">Continue with Application</button></p>
	</div>
-->
</body>
</html>

<?php
include "config.php";
	if(isset($_POST['bok'])){
		echo "Hop";
		$name = $_POST['question'];
		$password = $_POST['test_case'];

		$sql = "INSERT INTO coding_challenge VALUES (0, 24, '$name', 0, 'bok', 'bok2', 'bok4', 'bok3')";
        $result = mysqli_query($con, $sql);
        echo $result;

        $sql = "INSERT INTO test_cases VALUES (0, '$password')";
        $result = mysqli_query($con, $sql);
	}

?>