<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet" type="text/css" href="styles/w3.css">
	<title>CodeInt - Send Interview</title>

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
	
</body>
</html>

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


