<?php
include "config.php";
$e_id = $_SESSION["Id"];

if(isset($_POST['solution'])){
	$solution =  $_POST['solution'];
	if(isset($_POST['category'])){
		$category =  $_POST['category'];
		if(isset($_POST['title'])){
			$title =  $_POST['title'];
			if(isset($_POST['difficulty'])){
				$difficulty =  $_POST['difficulty'];
				if(isset($_POST['save'])){
					$question = $_POST['question'];
					$test_case = $_POST['test_case'];

					$sql = "INSERT INTO coding_challenge VALUES (0, '$e_id', '$question', 0, '$difficulty', '$title', '$solution', '$category')";
			        $result = mysqli_query($con, $sql);

			        $sql = "SELECT challenge_id  FROM coding_challenge WHERE challenge_id =(SELECT max(challenge_id) FROM coding_challenge)";
			        $result = mysqli_query($con, $sql);
					$row = mysqli_fetch_assoc($result);
					$challenge_id = implode(",", $row);

			        $sql = "INSERT INTO test_cases VALUES ('$challenge_id', '$test_case')";
			        $result = mysqli_query($con, $sql);
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
	<h3 style="font-weight: bold;">Challenge</h3>

	<script type="text/javascript"></script>

	<form method="post">

	<div class="center" align="center">
	 <select onchange="location = this.value;">
	  <option value="prepare_question.php">Challenge</option>
	  <option value="noncoding.php">NonCoding</option>
	  <option value="contest.php">Contest</option>
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
	<input class="w3-input w3-border w3-padding w3-round-xxlarge" name="title" type="text" placeholder="Title" id="title" style="width: 40%; height: 20; margin-left: 15%; margin-top: 2%;">

	<input class="w3-input w3-border w3-padding w3-round-xxlarge" name="question" type="text" placeholder="Question" id="question" style="width: 40%; height: 150px; margin-left: 15%;">

	<input class="w3-input w3-border w3-padding w3-round-xxlarge" name = "test_case" type="text" placeholder="Test Cases" id="test_case" style="width: 40%; height: 150px; margin-left: 15%; margin-top: 0%;">

	<input class="w3-input w3-border w3-padding w3-round-xxlarge" name = "solution" type="text" placeholder="Solution" id="solution" style="width: 40%; height: 150px; margin-left: 15%; margin-top: 0%;">

	  <input class="w3-button w3-purple w3-round-large" type="submit" name = "save" value = "Save" style="width: 5%; height: 30px; margin-left: 55%; 
	  margin-top: -4%;">

	 </form>
	<div >
 	<form method='post' action="">
            <input type="submit" value="Return" class="but1" name="getback"/>
        </form>
	</div>
</body>
</html>

