<?php
include "config.php";
if(isset($_POST['solution'])){
	$solution =  $_POST['solution'];

	if(isset($_POST['test_case'])){
		$test_case =  $_POST['test_case'];

		if(isset($_POST['category'])){
			$category =  $_POST['category'];

			if(isset($_POST['start_date']) && isset($_POST['end_date'])){
				$start_date =  $_POST['start_date'];
				$end_date =  $_POST['end_date'];

				if(isset($_POST['title'])){
					$title =  $_POST['title'];

					if(isset($_POST['difficulty'])){
						$difficulty =  $_POST['difficulty'];

						if(isset($_POST['save'])){
							$question = $_POST['question'];
							$test_case = $_POST['test_case'];
							$sql = "INSERT INTO coding_contest VALUES (0, '$start_date', $end_date, '$title')";
					        $result = mysqli_query($con, $sql);

					       	$sql = "INSERT INTO coding_challenge VALUES (0, 2, '$question', 0, '$difficulty', '$title', '$solution', '$category')";
					        $result = mysqli_query($con, $sql);

					       	$sql = "SELECT challenge_id  FROM coding_challenge WHERE challenge_id =(SELECT max(challenge_id) FROM coding_challenge)";
					        $result = mysqli_query($con, $sql);
							$row = mysqli_fetch_assoc($result);
							$challenge_id = implode(",", $row);

							$sql = "SELECT contest_id   FROM coding_contest WHERE contest_id  =(SELECT max(contest_id) FROM coding_contest)";
					        $result = mysqli_query($con, $sql);
							$row = mysqli_fetch_assoc($result);
							$contest_id = implode(",", $row);

							$sql = "INSERT INTO test_cases VALUES ('$challenge_id', '$test_case')";
				        	$result = mysqli_query($con, $sql);

					       	$sql = "INSERT INTO contest_question VALUES ('$challenge_id', '$contest_id')";
					        $result = mysqli_query($con, $sql);
						}else if (isset($_POST['add'])){

							$question = $_POST['question'];
							$test_case = $_POST['test_case'];

							$sql = "SELECT challenge_id  FROM coding_challenge WHERE challenge_id =(SELECT max(challenge_id) FROM coding_challenge)";
					        $result = mysqli_query($con, $sql);
							$row = mysqli_fetch_assoc($result);
							$challenge_id = implode(",", $row);

					       	$sql = "INSERT INTO coding_challenge VALUES (0, 2, '$question', 0, '$difficulty', '$title', '$solution', '$category')";
					        $result = mysqli_query($con, $sql);

					       	$sql = "SELECT challenge_id  FROM coding_challenge WHERE challenge_id =(SELECT max(challenge_id) FROM coding_challenge)";
					        $result = mysqli_query($con, $sql);
							$row = mysqli_fetch_assoc($result);
							$challenge_id = implode(",", $row);

							$sql = "SELECT contest_id   FROM coding_contest WHERE contest_id  =(SELECT max(contest_id) FROM coding_contest)";
					        $result = mysqli_query($con, $sql);
							$row = mysqli_fetch_assoc($result);
							$contest_id = implode(",", $row);

							$sql = "INSERT INTO test_cases VALUES ('$challenge_id', '$test_case')";
				        	$result = mysqli_query($con, $sql);

					       	$sql = "INSERT INTO contest_question VALUES ('$challenge_id', '$contest_id')";
					        $result = mysqli_query($con, $sql);
						}
					}
				}
			}
		}
	}
}
function goBack()

  {
    //echo "going back";
      header('Location:EditorMainPage.php');
  }

//logout
if(array_key_exists('getback', $_POST))
    {
      goBack();
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
	 <select onchange="location = this.value;">
	 <option value="contest.php">Contest</option>
	  <option value="prepare_question.php">Challenge</option>
	  <option value="noncoding.php">NonCoding</option>
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
</div>

	Start Date:<input class="w3-input w3-border w3-padding w3-round-xxlarge" name= "start_date" type="date" style="width: 15%; height: 20; margin-top : -2%; margin-left: 7%;">

	End Date:<input class="w3-input w3-border w3-padding w3-round-xxlarge" name = "end_date" type="date" style="width: 15%; height: 20; margin-top : -2%; margin-left: 7%;">

	<input class="w3-input w3-border w3-padding w3-round-xxlarge" name="title" type="text" placeholder="Title" id="title" style="width: 40%; height: 20; margin-left: 15%; margin-top: 1%;">

	<input class="w3-input w3-border w3-padding w3-round-xxlarge" name="question" type="text" placeholder="Question" id="question" style="width: 40%; height: 150px; margin-left: 15%;">

	<input class="w3-input w3-border w3-padding w3-round-xxlarge" name = "test_case" type="text" placeholder="Test Cases" id="test_cases" style="width: 40%; height: 140px; margin-left: 15%; margin-top: 0%;">

	<input class="w3-input w3-border w3-padding w3-round-xxlarge" name = "solution" type="text" placeholder="Solution" id="solution" style="width: 40%; height: 150px; margin-left: 15%; margin-top: 0%;">

	<input class="w3-button w3-purple w3-round-large" type="submit" name = "save" value = "Save" style="width: 5%; height: 30px; margin-left: 55%; 
	  margin-top: -5%;">
	<input class="w3-button w3-purple w3-round-large" type="submit" value = "Add Question" name = "add" style=" margin-top: -5%;">

	</form>
<div >
 	<form method='post' action="">
            <input type="submit" value="Return" class="but1" name="getback"/>
        </form>
	</div>
</body>
</html>