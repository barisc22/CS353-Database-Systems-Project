<?php

include "config.php";
$editId = $_SESSION['Id'];

$editname = "select username from general_user where id= '".$editId."'";
$r1 = mysqli_query($con, $editname);
$row2 = mysqli_fetch_assoc($r1);
$name = $row2['username'];

$poi = "select question_count, penalty_points from editor where id= '".$editId."'";
$r4 = mysqli_query($con, $poi);
$row4 = mysqli_fetch_assoc($r4);
$points = $row4['penalty_points'];
$count =  $row4['question_count'];

$totQuestion= "SELECT count(challenge_id) FROM coding_challenge WHERE e_id = '".$editId."' ";
$tot = mysqli_query($con, $totQuestion);
$q = mysqli_fetch_assoc($tot);
$q1 = implode(",", $q);

if(array_key_exists('val', $_POST))
{
	validate();
}
function validate()
{
	echo" doing thism";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet" type="text/css" href="styles/w3.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<title>CodeInt - Editor Main Page</title>
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
	<div class="w3-container" style="padding-top: 10px;">
		<div class="w3-container" style="position: fixed; width:78.3%; max-height: 23%; margin: auto; display: inline-block; height: 15%; background-color: rgb(255,255,255);"">
			<div style="display: inline-block; ">
				<img src="images/codeint2.png" style="padding-bottom:28%; width:50%; margin: auto;">
			</div>
			<div class="w3-bar" style="display: inline-block; width: 50%; margin-top: 10px; font-size: 20px; height: 80%; padding-top: 5px; color: purple">
<a style="width: 30%;" href="<?php echo " prepare_question.php?Id = {$editId}"?>" class="w3-bar-item w3-button">Write a Question</a>
			  	
			</div>
		</div>
		<div style="display: inline-block; width:80%; margin-top: 5%; padding-bottom: 4%; text-align: center;">
			<form method='post' action="">
			<div class="w3-container" style="text-align: center; padding: 50px; display: inline-block; width: 60%; padding-top: 7%;">
				<h2 style="font-weight: bold;">Evaluate Questions</h2>
				<ul class="w3-ul w3-margin-top" style="width: 90%; height: 300px; margin: auto; overflow: auto;">

					<?php
						$all = "select user_id, challenge_id from submit";
						$result = mysqli_query($con, $all);
							if(mysqli_num_rows($result) > 0){
							while ($row = mysqli_fetch_assoc($result))
								{
									$user = $row['user_id'];

									$challenge = $row['challenge_id'];

									echo "<p><li class= \"w3-border\" style=\"width: 30%; display: inline-block;\">".$user. "</li>
       					<li class= \"w3-border\" style=\"width: 30%; display: inline-block;\">".$challenge. "
       						</li>";

       						echo " <a  class= \"w3-button w3-purple w3-round-large\" style=\"width: 30%;\" href=' checkQuestion.php?challenge={$challenge} & user={$user} '  class=\"w3-bar-item w3-button\">Grade</a>";
						}	
					}
					?>
					

					</ul>
					<br><br>
					<h2 style="font-weight: bold;">Companies for Validation</h2>
				<ul class="w3-ul w3-margin-top" style="width: 100%; height: 200px; margin: auto; overflow: auto;">
						<?php
						$bos = 0;
						$allComp = "select id from general_user";
						$result7 = mysqli_query($con, $allComp);
						if(mysqli_num_rows($result7) > 0){
							while ($row7= mysqli_fetch_assoc($result7))
						{
						$allname = "select id from company where id = '".$row7['id']."' and validation = '".$bos."'";

						$result8 = mysqli_query($con, $allname);
							if(mysqli_num_rows($result8) > 0){
						while ($row8 = mysqli_fetch_assoc($result8))
								{
									$comp = $row8['id'];
									$allname2 = "select username from general_user where id = '".$comp."'";
									$result9 = mysqli_query($con, $allname2);
									$row9 = mysqli_fetch_assoc($result9);
									$compN = $row9['username'];

									echo "<p><li class= \"w3-border\" style=\"width: 30%; display: inline-block;\">".$compN. "</li>
       					<li class= \"w3-border\" style=\"width: 30%; display: inline-block;\">".$comp. "
       						</li>";
       					
     echo "<a  class= \"w3-button w3-purple w3-round-large\" style=\"width: 30%;\" href='validate.php?comp= {$comp}' class= \" w3-bar-item w3-button\" >VALIDATE</a>";

						}	
					}
				}
			}
					?>
				
				</ul>
			</div>
		</div>
		<div class="w3-container w3-border" style="position:fixed; width: 20%; min-height: 10px; text-align: center; padding:10px; margin: auto; display: inline-block;">
			<br>
			<img src="images/user1.png" style="width: 50%; height: 100%; padding-top: 50px;">
			<p><label>Name : <?php echo "$name" ?></label>
				<p><label>Challenge # : <?php echo "$q1" ?></label>
			<p><label style="background-color: red">Penalty Points: <?php echo "$points" ?></label>
			<br><br><br><br><br><br><br><br><br><br><br><br><br>
			
			

</div>
	
</body>
</html>
