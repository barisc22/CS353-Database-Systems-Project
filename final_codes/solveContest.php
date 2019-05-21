<?php
include "config.php";
$user_id = $_SESSION["Id"];
$start = $milliseconds = round(microtime(true) * 1000);
$sql = "SELECT contest_id  FROM coding_contest WHERE contest_id =(SELECT max(contest_id) FROM coding_contest)";
$result2 = mysqli_query($con, $sql);
$row = mysqli_fetch_assoc($result2);
$contest_id = implode(",", $row);

$sql = "INSERT INTO contest_user (id, contest_id) VALUES ('".$user_id."', '".$contest_id."')";
$result = mysqli_query($con, $sql);

$sql = "DROP TABLE IF EXISTS contest_table";
$result = mysqli_query($con, $sql);
	
$view = "CREATE VIEW contest_table as select title as title, question as question, challenge_id as challenge_id, test_case as test_case 
from contest_question  Natural JOIN coding_challenge NATURAL JOIN test_cases";
   
$myview = mysqli_query($con, $view);

$current = "select * from contest_table where contest_id = '".$contest_id."'";

$final = mysqli_query($con, $current);

$i = 0;
while($row = $final->fetch_assoc()) {
    $question = $row["question"];
    $questions[$i] = $question;

    $title = $row["title"];
    $titles[$i] = $title;

	$current = "select test_case from test_cases T Natural JOIN contest_question C Natural JOIN coding_challenge CH where C.contest_id = '".$contest_id."' and CH.question = '".$question."'";

	$result2 = mysqli_query($con, $current);
	$row = mysqli_fetch_assoc($result2);
	$test_case = implode(",", $row);
	$test_cases[$i] = $test_case;
	$i++;
}
if(isset($_POST['counter'])){
	$count = $_POST['counter'];
	$count = $count + 1;
}else{
	$count = 0;
}

if(isset($_POST['answer'])){
	$solution =  $_POST['answer'];
	if(isset($_POST['submit'])){
		$end = $milliseconds = round(microtime(true) * 1000);
		$finish_time = $end - $start;

		$current = "UPDATE contest_user SET submission = '".$solution."' and finish_time = '".$finish_time."' where contest_id = '".$contest_id."' AND id = '".$user_id."'";
		$result2 = mysqli_query($con, $current);
		if($count == $i){
			echo "<script type='text/javascript'>alert('No more question.');</script>";
			header("Location: userMainPage.php");
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
	<title>CodeInt - Solve Contest</title>
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
	<div class="w3-container" style="width: 100%; display: inline-block;">
		<p><h2 style="font-weight: bold; text-align: center; width: 100%;"><?php echo $titles[$count] ?></h2>
		<div class="w3-container" style="display: inline-block; width: 30%; height: 500px;">
			<div style="width: 90%; height: 300px; border: 1px solid grey; margin: 10%; ">Question: <?php echo $questions[$count] ?> </div>
			<div style="width: 90%; height: 120px; border: 1px solid grey; margin: 10%;">
                <?php
					echo $test_cases[$count];
                ?>
            </div>
		</div>
        <form method = "post" style="width: 40%; height: 500px; text-align: center; padding:10px; margin: auto; display: inline-block; padding-top: 2%; padding-right: 10%;">
            <br>
            <input class="w3-input w3-border" style="height: 80%; width: 130%;" name="answer" type="text" id="answer">
            <br>
            <input class="w3-button w3-purple w3-round-large" type="submit" name ="submit" value = "Submit" >
            <input type = "hidden" name = "counter" value = "<?php print $count; ?>"; />
        </form>
    </div>
</body>
</html>
