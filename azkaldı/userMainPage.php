<?php
include "config.php";
{
	$usId = $_SESSION['Id'];
// $usId = $_SESSION['Id'];
$sql = "select c_id, job_title from applies where user_id = '".$usId."'";
$complete = "select  grade, interview_id from solves where user_id = '".$usId."'";
$profilegen = "select * from general_user where id = '".$usId."'";
$profileus = "select * from user where id = '".$usId."'";

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
  
	<title>CodeInt - User Main Page</title>
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

  $("#contactForm2").submit(function(event){
    change();
    return false;

  });

});

function submitForm(){
   $.ajax({
    type: "POST",
    url: "userMainPageEdit.php",
    cache:false,
    data: $('form#contactForm').serialize(),
    success: function(response){
      $("#contact").html(response)
      $("#contact-modal").modal('hide');
      //windows.location.reload(true);
    },
    error: function(){
      alert("Error");
    }
  });
}

function change()
{
	
	$.ajax({
    type: "POST",
    url: "changePassword.php",
    cache:false,
    data: $('form#contactForm2').serialize(),
    success: function(response){
      $("#contact2").html(response)
      $("#contact-modal2").modal('hide');
    },
    error: function(){
      alert("Error");
    }
  });
}
  

  </script>
</head>
<body>
	<div class="w3-container" style="padding-top: 10px;">
		<div class="w3-container" style="position: fixed; width:78.3%; max-height: 23%; margin: auto; display: inline-block; height: 15%; background-color: rgb(255,255,255);"">
			<div style="display: inline-block; ">
				<img src="images/codeint2.png" style="padding-bottom:28%; width:50%; margin: auto;">
			</div>
			<div class="w3-bar" style="display: inline-block; width: 50%; margin-top: 10px; font-size: 20px; height: 80%; padding-top: 5px; color: purple">
				<a style="width: 30%;" href="<?php echo " contest.php?Id = {$usId}"?>"  class="w3-bar-item w3-button">Join Contest</a>
			  	<a style="width: 30%;" href="<?php echo " ShowChallenges.php?Id = {$usId}"?>"  class="w3-bar-item w3-button">Challenges</a>
			  	<a style="width: 30%;" href="<?php echo " cvPool.php?Id = {$usId}'"?>" class="w3-bar-item w3-button">Join CV Pool</a>
			</div>
		</div>
		<div style="display: inline-block; width:80%; margin-top: 5%; padding-bottom: 4%; text-align: center;">
			<div class="w3-container" style="text-align: center; padding: 50px; display: inline-block; width: 60%;">
				<h2 style="font-weight: bold;">Job Applications</h2>
				<ul class="w3-ul w3-margin-top" style="width: 100%; height: 200px; margin: auto; overflow: auto;">
						<p>
							<?php
						 $result = mysqli_query($con,$sql);
						 	if(mysqli_num_rows($result) > 0){
							while ($row = mysqli_fetch_assoc($result))
							{
								 $job = $row['job_title'];
								 $comp = $row['c_id'];
							 $sql2 = "select username from general_user where id = '".$comp. "'";
								  $result2 = mysqli_query($con,$sql2);
								 while($row2 = mysqli_fetch_array($result2)){

								 	 $compname = $row2['username'];
								 	 echo "<li> ".$job." BY: " .$compname." </li>";
								 }
							}
						}
						?>
						
						</p>
			  	</ul>
				<br><br>
				<h2 style="font-weight: bold;">Completed Interviews</h2>
				<ul class="w3-ul w3-margin-top" style="width: 100%; height: 200px; margin: auto; overflow: auto;">
					<?php

					$result2 = mysqli_query($con,$complete);
						 	if(mysqli_num_rows($result2) > 0){
							while ($row = mysqli_fetch_assoc($result2))
							{
								
								 $interview = $row['interview_id'];
								 $grade = $row['grade'];
							 $sql3 = "select c_id from interview where interview_id = '".$interview. "'";
								  $result3 = mysqli_query($con,$sql3);
								 while($row3 = mysqli_fetch_array($result3)){
								 	$comp2 = $row3['c_id'];
								 	 $sql5 = "select username from general_user where id = '".$comp2. "'";
								  $result5 = mysqli_query($con,$sql5);
								 $row4 = mysqli_fetch_array($result5);
								 	 $compname2 = $row4['username'];
								 	 if($grade > 0){
								 	 echo "<li> Company Name: ".$compname2." Your Grade: " .$grade." </li>";
								 	}
								 }
							}
						}
					?>
					
				
				</ul>
			</div>
		</div>
		<div class="w3-container w3-border" style="position:fixed; width: 20%; min-height: 10px; text-align: center; padding:10px; margin: auto; display: inline-block;">
			<img src="images/user1.png" style="width: 50%; height: 100%; padding-top: 50px;">
			<?php  
			$result6 = mysqli_query($con,$profilegen);
				$row6 = mysqli_fetch_assoc($result6);
							$result7 = mysqli_query($con,$profileus);
				$row7 = mysqli_fetch_assoc($result7);
								
								$name = $row6['username'];
								 $mail = $row6['email'];
								 $bio = $row7['user_bio'];
								 $score = $row7['total_score'];
								 $date = $row7['birth_date'];
							echo "<p><label>Name: ".$name." </label>
							<p><label>Score: ".$score."</label> <p><label>Email: ".$mail." </label><p><label>Birth Date: ".$date." </label><p><label> ".$bio." </label>"
								 ?>
			
			<br><br><br><br><br><br><br><br><br>
				

<div id="contact"><button type="button" class="w3-button w3-purple w3-round-large" data-toggle="modal" data-target="#contact-modal">EDIT PROFILE</button></div>
<br>
<div id="contact2"><button type="button" class="w3-button w3-purple w3-round-large" data-toggle="modal" data-target="#contact-modal2">CHANGE PASSWORD</button></div>

</div>


		
	

 
<div id="contact-modal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <a class="close" data-dismiss="modal">×</a>
        <h3>Edit Your Profile</h3>
      </div>
      <form id="contactForm" name="contact" role="form">
        <div class="modal-body">        
          <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" class="form-control">
          </div>
          <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" class="form-control">
          </div>
          <div class="form-group">
            <label for="date">Birth Date</label>
           <input type="text" name="date" class="form-control">
          </div>      
          <div class="form-group">
            <label for="message">BIO</label>
            <textarea name="message" class="form-control"></textarea>
          </div>          
        </div>
        <div class="modal-footer">          
          <button type="button" class="btn btn-default" data-dismiss="modal" onclick="window.location.href=window.location.href" >Close</button>
          <input type="submit" value="SAVE" class="btn btn-success" id="submit" onclick="window.location.href=window.location.href" >
        </div>
      </form>
    </div>
  </div>
</div>

<div id="contact-modal2" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <a class="close" data-dismiss="modal">×</a>
        <h3>Change Your Password</h3>
      </div>
      <form id="contactForm2" name="contact2" role="form">
        <div class="modal-body">        
          <div class="form-group">
            <label for="password">Password</label>
            <input type="password" name="password" class="form-control">
          </div>
 <div class="modal-footer">          
          <button type="button" class="btn btn-default" data-dismiss="modal" >Close</button>
          <input type="submit" value="SAVE" class="btn btn-success" id="Submit"  >
        </div>
      </form>
    </div>
  </div>
</div>
</body>
</html>

