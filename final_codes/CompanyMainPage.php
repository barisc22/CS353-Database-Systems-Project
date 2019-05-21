<?php
include "config.php";

//$compId= 2;
$compId = $_SESSION['Id'];
$finished = "select interview_id from interview where c_id = '".$compId."'";


    
// Check user login or not
if(isset($_POST['create'])){
   
    header('Location: createCvPool.php');    
}
else if(isset($_POST['create2'])){
   
   header('Location: interview.php');    
}
else if(isset($_POST['leader'])){
   
   header('Location: leaderboard.php');    
}else if(isset($_POST['grade']))
{
	
	//notify grade 
}
else if (isset($_POST['decision']))
{
	//notify decision
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
	<title>CodeInt - Company Main Page</title>
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
	<script type='text/javascript'>
		
$(document).ready(function(){ 
  $("#contactForm").submit(function(event){
    submitForm();
    return false;

  });



});</script>
</head>
<body>
	<div class="w3-container" style="position: fixed; width:100%; max-height: 15%; padding:10px; margin: auto; float: left; background-color: rgb(255,255,255);">
		<img src="images/codeint.png" style="width:15%; margin: auto;">
	</div>
	<form method='post' action="">
	<div class="w3-container" style="width: 100%; display: inline-block;  margin-top: 8%; padding-bottom: 4%;">
		<div style="display: inline-block; width: 70%; max-height: 8%;">
			<div class="w3-container" style="text-align: center;">
				<div style=" display: inline-block; padding-right: 10%;">
					<input type="submit" name="create2"  class="w3-button w3-purple w3-round-large" value = "Create Interview">
				</div>
				<div style=" display: inline-block;">
					<input type="submit" name="create"  class="w3-button w3-purple w3-round-large" value = "Create CV Pool">
				</div>

				<p><h2 style="font-weight: bold; display: inline-block;">Finished Interviews</h2>
				<ul class="w3-ul w3-margin-top" style="width: 60%; height: 200px; margin: auto; overflow: auto;">
				
						
						<?php
						 $result = mysqli_query($con,$finished);
						 	if(mysqli_num_rows($result) > 0){
							while ($row = mysqli_fetch_assoc($result))
								{
								 $int_id = $row['interview_id'];
								//echo $int_id;
								$que1 = "select user_id, grade from solves where interview_id = '".$int_id."'";
								 $result2 = mysqli_query($con,$que1);
								 while($row2 = mysqli_fetch_array($result2)){
								 
								 $grade2 = $row2['grade'];
								 	//echo $grade2;

								 	 $userid = $row2['user_id'];
								 	 //echo $userid;
								 	 $que2 = "select username as choose from general_user where id = '".$userid."'";
						 	$res =  mysqli_query($con,$que2);

      
       						 $row1 = mysqli_fetch_array($res);
       						  $userN = $row1['choose'];
       						  if($grade2 > 0){
       						$pool2=array($userN, $grade2);
       						echo "<p><li class= \"w3-border\" style=\"width: 30%; display: inline-block;\">".$userN. "
       						</li>
       						<li class=\"w3-border w3-round-large\" style= \"width: 10%; display: inline-block; background-color: rgba(128,0,128,0.3); font-style: italic;\"> ".$grade2." </li></p>"; 
       					}
       						}
							}
						}
						else 
							echo "No result";
						?>
					
						
					</ul>


                <p><h2 style="font-weight: bold; display: inline-block;">CV Pool Applicants</h2>
                <ul class="w3-ul w3-margin-top" style="width: 60%; height: 200px; margin: auto; overflow: auto; text-align: center;">
                    <?php
                    $sql = "SELECT A.user_id, G.username, A.job_title FROM applies A NATURAL JOIN general_user G WHERE A.c_id = '$compId' AND G.id = A.user_id";
                    $result = mysqli_query($con, $sql);
                    echo "<table id=\"table1\" align=\"center\" cellspacing=\"20\">";
                    echo "<tr><th>User</th><th>Job Title</th></tr>";
                    while($row = $result->fetch_assoc()) {
                        $username = $row["username"];
                        $job_title = $row["job_title"];
                        echo "<tr>
                                <td>".$row["username"]."</td>
                                <td>".$row["job_title"]."</td>
                                <td><a href='sendInterview.php?user_id=".$row["user_id"]."'>Send Interview</a></td>
                              </tr>";

                    }
                    echo "</table>";

      
                    ?>

                </ul>

				<p><h2 style="font-weight: bold; display: inline-block;">Waiting Interviews</h2>
				<ul class="w3-ul w3-margin-top" style="width: 60%; height: 200px; margin: auto; overflow: auto; text-align: center;">
						<?php
						$finished2= "select interview_id from interview where c_id = '".$compId."'";
						 $result = mysqli_query($con,$finished);
						 	if(mysqli_num_rows($result) > 0){
							while ($row = mysqli_fetch_assoc($result))
								{
								 $int_id2 = $row['interview_id'];
								//echo $int_id;
								 $finished2 = "select end_date from interview where c_id = '".$compId."'";
								 	 $result0 = mysqli_query($con,$finished2);
								 	 $ro0w = mysqli_fetch_assoc($result0);
								 $enddate = $ro0w['end_date'];

								$que2= "select user_id, grade from solves where interview_id = '".$int_id2."'";

								 $result3 = mysqli_query($con,$que2);
								    echo "<table id=\"table1\" align=\"center\" cellspacing=\"20\">";
                    echo "<tr><th>User</th><th>End Date</th></tr>";
								 while($row3 = mysqli_fetch_assoc($result3)){
								 
								// $end = $row2['end_date'];
								 	//echo $grade2;
								 $grade2 = $row3['grade'];
								 	 $userid = $row3['user_id'];
								 	 //echo $userid;
								 	 $que4 = "select username as choose from general_user where id = '".$userid."'";
						 	$res =  mysqli_query($con,$que4);

      
       						 $row1 = mysqli_fetch_array($res);
       						  $userN = $row1['choose'];
       						  if($grade2 <= 0){
       						
       						echo "<tr>
                                <td>".$userN."</td>
                                <td>".$enddate."</td>
                              
                              </tr>";

                    }
                    echo "</table>";
       					}
       						}
							}
						
						else 
							echo "No result";
						?>
					
			  	</ul>

				<p><h2 style="font-weight: bold;">Waiting Responses</h2>
				<ul class="w3-ul w3-margin-top" style="width: 60%; height: 200px; margin: auto; overflow: auto;">
					
					<?php
						$finished2= "select interview_id from interview where c_id = '".$compId."'";
						 $result = mysqli_query($con,$finished);
						 	if(mysqli_num_rows($result) > 0){
							while ($row = mysqli_fetch_assoc($result))
								{
								 $int_id2 = $row['interview_id'];
								//echo $int_id;
								 $finished2 = "select end_date from interview where c_id = '".$compId."'";
								 	 $result0 = mysqli_query($con,$finished2);
								 	 $ro0w = mysqli_fetch_assoc($result0);
								 $enddate = $ro0w['end_date'];

								$que2= "select user_id, grade from solves where interview_id = '".$int_id2."'";

								 $result3 = mysqli_query($con,$que2);

								 while($row3 = mysqli_fetch_assoc($result3)){
								 
								// $end = $row2['end_date'];
								 	//echo $grade2;
								 $grade2 = $row3['grade'];
								 	 $userid = $row3['user_id'];
								 	 //echo $userid;
								 	 $que4 = "select username as choose from general_user where id = '".$userid."'";
						 	$res =  mysqli_query($con,$que4);

      						//$user
       						 $row1 = mysqli_fetch_array($res);
       						  $userN = $row1['choose'];
       						  if($grade2 <= 0){
       						$enddate = "NOTIFY";
       						echo "<p><li class= \"w3-border\" style=\"width: 30%; display: inline-block;\">".$userN. "</li>
       					<input type=\"button\" class=\"w3-button w3-purple w3-round-large\" id = \" contact\" value = ".$enddate. "  data-toggle=\"modal\" data-target=\"#contact-modal\"></p>"; 
       				}

       					else if($grade2 > 0){
       						$enddate = "NOTIFY";
       						echo "<p><li class= \"w3-border\" style=\"width: 30%; display: inline-block;\">".$userN. "</li>
       						<input type=\"button\" class=\"w3-button w3-purple w3-round-large\" id = \" contact\" value = ".$enddate. "  data-toggle=\"modal\" data-target=\"#contact-modal\"></p>"; 
       					}
       						}
							}
						}
						else 
							echo "No result";
						?>
					
					



			  	</ul>
			</div>
		</div>
		<div class="w3-container" style="position:fixed; width: 30%; height: 50%; float: right; text-align: center; padding:10px; margin: auto; display: inline-block; padding-top: 3%; padding-right: 10%;">
			<h2 style="font-weight: bold;">View the LeaderBoard</h2>
			<ul class="w3-ul w3-margin-top" style="height: 250px; margin: auto; overflow: auto;">
				<input type="submit" name="leader"  class="w3-button w3-purple w3-round-large" value = "LEADERBOARD">
			</ul>
		</div>
	</div>
</form>

<div id="contact-modal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <a class="close" data-dismiss="modal">×</a>
        <h3>NOTIFY USER</h3>
      </div>
      <form id="contactForm" name="contact" role="form">
        <div class="modal-body">        
          <div class="form-group">
            <label for="name">UserName</label>
            <input type="text" name="name" class="form-control">
          </div>
          <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" class="form-control">
          </div>
          <div class="form-group">
            <label for="message">Your Message</label>
            <textarea name="message" class="form-control"></textarea>
          </div>          
        </div>
        <div class="modal-footer">          
          <button type="button" class="btn btn-default" data-dismiss="modal" onclick="window.location.href=window.location.href" >Close</button>
          <input type="submit" value="SEND" class="btn btn-success" id="submit" onclick="window.location.href=window.location.href" >
        </div>
      </form>
    </div>
  </div>
</div>

</body>
</html>
<style>
table {
  border-collapse: collapse;
  width: 100%;
}

th, td {
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {background-color: #f2f2f2;}
	</style>