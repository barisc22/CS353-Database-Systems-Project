<?php
include "config.php";

$id = $_SESSION["Id"];
if(isset($_GET['question_id'])){
    $question_id = $_GET['question_id'];
    $sql = "SELECT question, title FROM noncoding_question WHERE question_id  = '$question_id '";
    $result = mysqli_query($con, $sql);	
    while($row = $result->fetch_assoc()) {
        $question = $row["question"];
        $title = $row["title"];
    }
}else{
    echo "Failed";
}

$i = 0;
$sql = "SELECT * FROM ncquestion_choices WHERE question_id = '".$question_id."'";
$result = mysqli_query($con, $sql);

while($row = $result->fetch_assoc()) {
    $choice = $row["choice"];
    $choices[$i] = $choice;
	$i = $i + 1;
}

if(isset($_POST['mult_answers'])){
	$mult_answers =  $_POST['mult_answers'];

	if(isset($_POST['answer'])){
		$answer =  $_POST['answer'];

		if(isset($_POST['submit'])){
			$sql = "INSERT INTO nc_submit VALUES ('$id', '$question_id', '$answer', 0)";
	        $result = mysqli_query($con, $sql);
	        echo $result;
			
			if($result == 1){
	            echo "<script type='text/javascript'>alert('Your answer is submitted.');</script>";
	        }else{
	            $sql = "DELETE FROM nc_submit WHERE question_id = '$question_id' AND user_id = '$id'";
	            $result = mysqli_query($con, $sql);

	            $sql = "INSERT INTO nc_submit VALUES ('$id', '$question_id', '$answer', 0)";
	            $result = mysqli_query($con, $sql);

	            if($result == 1){
	                echo "<script type='text/javascript'>alert('Your new answer is submitted.');</script>";
				}
			}
		}else if(isset($_POST['save'])){
			$sql = "INSERT INTO nc_saved VALUES ('$question_id', '$id', '$answer')";
	        $result = mysqli_query($con, $sql);
	        echo $result;

		    if($result == 1){
	            echo "<script type='text/javascript'>alert('Your answer is submitted.');</script>";
	        }else{
	            $sql = "DELETE FROM nc_saved WHERE question_id = '$question_id' AND user_id = '$id'";
	            $result = mysqli_query($con, $sql);
	            $sql = "INSERT INTO nc_saved VALUES ('$question_id', '$id','$answer')";
	            $result = mysqli_query($con, $sql);

	            if($result == 1){
	                echo "<script type='text/javascript'>alert('Your new answer is submitted.');</script>";
			    }
			}
		}
	}
}
function goBack()

  {
    //echo "going back";
      header('Location:userMainPage.php');
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
	<title>CodeInt - Solve Noncoding Question</title>
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
	<div class="w3-container" style="position: fixed; width:100%; max-height: 15%; padding:10px; margin: auto; float: left; background-color: rgb(255,255,255);">
		<img src="images/codeint.png" style="padding:10px;width:15%; margin: auto;">
	</div>
	<div class="w3-container" style="width: 100%; display: inline-block;  margin-top: 5%;">
		<p><h2 style="font-weight: bold; text-align: center; width: 100%;"><?php echo $title ?></h2>
		<div class="w3-container" style="width: 70%; height: 550px; text-align: center; padding:10px; margin: auto; display: inline-block;">
			<div class="w3-input w3-border w3-padding w3-round-xxlarge" style="width: 100%; height: 30%; border: 1px solid grey; padding: 10px; margin-bottom: 10px; ">
				<?php
                    $sql = "select question from noncoding_question where question_id = '$question_id'";
                    $result = mysqli_query($con, $sql);
                    if (mysqli_num_rows($result) > 0) {
		                while($row = mysqli_fetch_assoc($result)) {
		                    echo "<tr>
		                    <td>".$row["question"]."</td>
		                  </tr>";
		                }
                    }
                    else {
                        echo "0 results";
                }                    	
                ?></div>

			<div class="w3-container" style="height: 60%; width: 100%;">
				<br><br>
			 	<p>
			 	<form action="" method="post">
			 		<input class="w3-input w3-border w3-padding w3-round-xxlarge" name="answer" type="text" placeholder="Answer" id="answer" style="width: 105%; height: 200px; margin-left: -2%; margin-top: -7%;">

				  	<input class="w3-radio" type="radio" name="mult_answers" value="a1" placeholder="Hop" checked><?php echo $choices[0] ?><p>
				  	<input class="w3-radio" type="radio" name="mult_answers" value="a2"><?php echo $choices[1] ?><p>
				  	<input class="w3-radio" type="radio" name="mult_answers" value = "a3"><?php echo $choices[2] ?><p>
				  	<input class="w3-radio" type="radio" name="mult_answers" value = "a4"><?php echo $choices[3] ?><br><br>
				<a href='attempt_nc.php?question_id=<?php echo $question_id ?>'>See previous attempts</a>
				<input type="submit" name="save" value="Save"/>
				<input type="submit" name="submit" value="Submit"/>
			</form>
			</div>
			<br>
		</div>
<div >
 	<form method='post' action="">
            <input type="submit" value="Return" class="but1" name="getback"/>
        </form>
	</div>
</body>
</html>
	