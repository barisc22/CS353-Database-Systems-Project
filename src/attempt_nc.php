<?php
include "config.php";
$user_id = 11;#$_SESSION["Id"];
if(isset($_GET['question_id'])){
    $question_id = $_GET['question_id'];
    $sql = "SELECT attempt  FROM nc_saved WHERE question_id = '$question_id' AND user_id = '$user_id'";
    $result = mysqli_query($con, $sql);
    while($row = $result->fetch_assoc()) {
        $answer = $row["attempt"];
    }
}
else{
    echo "Failed";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet" type="text/css" href="styles/w3.css">
	<title>CodeInt - Attempt</title>
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

		<h2 style="font-weight: bold; ">Previous Attempt</h2>
		<div class="w3-container" style="width: 60%; height: 80%; text-align: center; padding:10px; margin: auto; display: inline-block; padding-top: 2%;">
			<p><a href='solveNoncodingQuestion.php?challenge_id=<?php echo $challenge_id ?>'>Go back to question</a></p>
			<br><br>
			<div style="width: 100%; height: 350px; border: 1px solid grey; margin: 10px; padding: 10px; overflow: auto;"><?php echo $answer ?></div>

		</div>
	</div>
</body>
</html>