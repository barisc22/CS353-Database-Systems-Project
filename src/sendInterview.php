<?php
include "config.php";
$c_id = $_SESSION["Id"];
if(isset($_GET['user_id'])){
    $user_id = $_GET['user_id'];
    $sql = "SELECT interview_id, start_date, end_date, duration FROM interview WHERE c_id = '$c_id'";
    $result = mysqli_query($con, $sql);
    echo "<table id=\"bok\" align=\"center\" cellspacing=\"20\">";
    echo "<tr><th>Interview ID</th><th>Start Date</th><th>End Date</th><th>Duration</th></tr>";
    while($row = $result->fetch_assoc()) {
        $username = $row["username"];
        $job_title = $row["job_title"];
        echo "<tr>
                <td>".$row["interview_id"]."</td>
                <td>".$row["start_date"]."</td>
                <td>".$row["end_date"]."</td>
                <td>".$row["duration"]."</td>
                <td><a href='sendThisInterview.php?interview_id=".$row["interview_id"]."&user_id=".$user_id."'>Send This Interview</a></td>
              </tr>";
    }
    echo "</table>";
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
	<h3 style="font-weight: bold;">Contest</h3>


	<script type="text/javascript"></script>

	<form method = "post">



	<div class="center" align="center">

	<select name = "type">
	 <option value="type">Select Question Type</option>
	  <option value="challenge">Challenge</option>
	  <option value="nc">Non Coding Question</option>
	</select> 

	<select name = "difficulty">
	 <option value="difficulty">Select Difficulty</option>
	  <option value="easy">Easy</option>
	  <option value="medium">Medium</option>
	  <option value="hard">Hard</option>
	  <option value="ultimate">Ultimate</option>
	</select> 

	<select name = "category">
	 <option value="category">Select Category</option>
	  <option value="c1">C1</option>
	  <option value="c2">C2</option>
	  <option value="c3">C3</option>
	  <option value="c4">C4</option>
	</select> 

	<select name = "question_count">
	 <option value="question_count">Select Question Count</option>
	  <option value="one">1</option>
	  <option value="two">2</option>
	  <option value="three">3</option>
	  <option value="four">4</option>
	</select> 
	</div>

	
	Duration:<input class="w3-input w3-border w3-padding w3-round-xxlarge" name= "duration" type="text" style="width: 15%; height: 20; margin-top : -2%; margin-left: 7%;">

	Start Date:<input class="w3-input w3-border w3-padding w3-round-xxlarge" name= "start_date" type="date" style="width: 15%; height: 20; margin-top : -1%; margin-left: 7%;">

	End Date:<input class="w3-input w3-border w3-padding w3-round-xxlarge" name = "end_date" type="date" style="width: 15%; height: 20; margin-top : -1%; margin-left: 7%;">

	<input class="w3-input w3-border w3-padding w3-round-xxlarge" name="title" type="text" placeholder="Title" id="title" style="width: 40%; height: 20; margin-left: 15%;">

	<input class="w3-input w3-border w3-padding w3-round-xxlarge" name="question" type="text" placeholder="Question" id="question" style="width: 40%; height: 130px; margin-left: 15%;">

	<input class="w3-input w3-border w3-padding w3-round-xxlarge" name = "test_case" type="text" placeholder="Test Cases" id="test_cases" style="width: 40%; height: 130px; margin-left: 15%; margin-top: 0%;">

	<input class="w3-input w3-border w3-padding w3-round-xxlarge" name = "solution" type="text" placeholder="Solution" id="solution" style="width: 40%; height: 130px; margin-left: 15%; margin-top: 0%;">

	<input class="w3-button w3-purple w3-round-large" type="submit" name = "save" value = "Save" style="width: 5%; height: 30px; margin-left: 55%; margin-top: -5%;">

	<input class="w3-button w3-purple w3-round-large" type="submit" value = "Add Question" name = "add" style="margin-top: -5%;">

	<input class="w3-button w3-purple w3-round-large" type="submit" value = "Send This Interview" name = "send" style="margin-top: -5%;">
	</form>
</body>
</html>
