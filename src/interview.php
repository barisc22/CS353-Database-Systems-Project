<?php
include "config.php";
if(isset($_POST['solution'])){
	$solution =  $_POST['solution'];
	echo "Solution";

	if(isset($_POST['category'])){
		$category =  $_POST['category'];
		echo "Category";

		if(isset($_POST['duration'])){
			$duration =  $_POST['duration'];
			echo "$duration";

			if(isset($_POST['start_date']) && isset($_POST['end_date'])){
				$start_date =  $_POST['start_date'];
				$end_date =  $_POST['end_date'];
				echo "$start_date";

				if(isset($_POST['title'])){
					$title =  $_POST['title'];
					echo "Title";

					if(isset($_POST['difficulty'])){
						$difficulty =  $_POST['difficulty'];
						echo "Difficulty";

						if(isset($_POST['type'])){
							$type = $_POST['type'];
							echo "Type";

							if(isset($_POST['add'])){
								echo "Hop";
								$question = $_POST['question'];
								$test_case = $_POST['test_case'];
								$sql = "INSERT INTO interview VALUES (0, 2, 'Hop', 'Bok', '$start_date', $end_date, '$duration')";
						        $result = mysqli_query($con, $sql);
						        echo "Interview";
						       	echo $result;

						       	$sql = "INSERT INTO coding_challenge VALUES (0, 1, '$question', 0, '$difficulty', '$title', '$solution', '$category')";
						        $result = mysqli_query($con, $sql);
						        echo "Challange";
						        echo $result;

						     	$sql = "SELECT interview_id  FROM interview WHERE interview_id =(SELECT max(interview_id) FROM interview)";
						        $result = mysqli_query($con, $sql);
								$row = mysqli_fetch_assoc($result);
								$interview_id = implode(",", $row);
								echo "First:";
								echo $interview_id;
								$interview_id = (int)$interview_id;
								$interview_id = $interview_id - 1;
								echo $interview_id;
								//echo "<p class='paragraph $interview_id'></p>";

						       	$sql = "SELECT challenge_id  FROM coding_challenge WHERE challenge_id =(SELECT max(challenge_id) FROM coding_challenge)";
						        $result = mysqli_query($con, $sql);
								$row = mysqli_fetch_assoc($result);
								$challenge_id = implode(",", $row);
								echo $challenge_id;

								$sql = "SELECT question_id   FROM noncoding_question WHERE question_id  =(SELECT max(question_id) FROM noncoding_question)";
						        $result = mysqli_query($con, $sql);
								$row = mysqli_fetch_assoc($result);
								$question_id = implode(",", $row);
								echo $question_id;

						        if($type == "challenge"){
						        	echo "Bok2";
							       	$sql = "INSERT INTO consist_of VALUES ('$interview_id', '$challenge_id')";
							        $result = mysqli_query($con, $sql);
							        echo $result;

						        }else{
						        	echo "Bok3";
							       	$sql = "INSERT INTO includes VALUES ('$interview_id', '$question_id')";
							        $result = mysqli_query($con, $sql);
							        echo $result;
						        }

							}else if(isset($_POST['bok'])){
								echo "Bok";
								$question = $_POST['question'];
								$test_case = $_POST['test_case'];
								$sql = "INSERT INTO interview VALUES (0, 2, 'Hop', 'Bok', '$start_date', $end_date, '$duration')";
						        $result = mysqli_query($con, $sql);
						        echo "Interview";
						       	echo $result;

						       	$sql = "INSERT INTO coding_challenge VALUES (0, 1, '$question', 0, '$difficulty', '$title', '$solution', '$category')";
						        $result = mysqli_query($con, $sql);
						        echo "Challange";
						        echo $result;

						     	$sql = "SELECT interview_id  FROM interview WHERE interview_id =(SELECT max(interview_id) FROM interview)";
						        $result = mysqli_query($con, $sql);
								$row = mysqli_fetch_assoc($result);
								$interview_id = implode(",", $row);

								//echo "<p class='paragraph $interview_id'></p>";

						       	$sql = "SELECT challenge_id  FROM coding_challenge WHERE challenge_id =(SELECT max(challenge_id) FROM coding_challenge)";
						        $result = mysqli_query($con, $sql);
								$row = mysqli_fetch_assoc($result);
								$challenge_id = implode(",", $row);
								echo $challenge_id;

								$sql = "SELECT question_id   FROM noncoding_question WHERE question_id  =(SELECT max(question_id) FROM noncoding_question)";
						        $result = mysqli_query($con, $sql);
								$row = mysqli_fetch_assoc($result);
								$question_id = implode(",", $row);
								echo $question_id;

						        if($type == "challenge"){
						        	echo "Bok2";
							       	$sql = "INSERT INTO consist_of VALUES ('$interview_id', '$challenge_id')";
							        $result = mysqli_query($con, $sql);
							        echo $result;

						        }else{
						        	echo "Bok3";
							       	$sql = "INSERT INTO includes VALUES ('$interview_id', '$question_id')";
							        $result = mysqli_query($con, $sql);
							        echo $result;
						        }
						    }
						}
					}
				}
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

	<input class="w3-button w3-purple w3-round-large" type="submit" name = "bok" value = "Save" style="width: 5%; height: 30px; margin-left: 55%; margin-top: -5%;">

	<input class="w3-button w3-purple w3-round-large" type="submit" value = "Add Question" name = "add" style="margin-top: -5%;">
	</form>
</body>
</html>
