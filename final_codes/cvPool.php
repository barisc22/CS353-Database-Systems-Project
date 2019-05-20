<?php
include "config.php";

if(isset($_POST['submit'])){
    if(!empty($_POST['selected_jobs'])) {
        foreach($_POST['selected_jobs'] as $selected) {
            $pieces = explode(",", $selected);

            $username = $pieces[0];
            $job_title = $pieces[1];

            $sql = "SELECT id FROM general_user WHERE username = '$username'";
            $result = mysqli_query($con, $sql);
            while($row = mysqli_fetch_assoc($result)) {
                $c_id = $row["id"];
            }

            $user_id = $_SESSION['Id'];
            
            $sql = "INSERT INTO applies VALUES ('$user_id', '$c_id', '$job_title', 'CV')";
            $result = mysqli_query($con, $sql);
	    
	    if($result == 1){
		echo "<script type='text/javascript'>alert('Your job applications are saved.');</script>";
		header("Location: userMainPage.php");
	    }
	    else{
		echo "<script type='text/javascript'>alert('Oops! Something went wrong.');</script>";
		header("Location: userMainPage.php");
	    }
        }

    }
    else{
        echo "<b>No selection.</b>";
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
	<title>CodeInt - CV Pool</title>
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

		<h2 style="font-weight: bold;">CV Pool</h2>
		<input class="w3-input w3-border w3-padding w3-round-xxlarge" type="text" placeholder="Search for companies..." id="cvPoolInput" onkeyup="searchCompany()" style="width: 45%; margin: auto; ">

        <ul class="w3-ul w3-margin-top" id="myUL" style="width: 40%; height: 300px; margin: auto; overflow: auto;">

            <?php
            $sql = "SELECT CO.username, CP.job_title, CP.opening_no FROM cv_pool CP NATURAL JOIN general_user CO WHERE CP.c_id = CO.id";
            $result = mysqli_query($con, $sql);

            if (mysqli_num_rows($result) > 0) {
                // output data of each row
                echo "<form action=\"cvPool.php\" method=\"post\">";
                while($row = mysqli_fetch_assoc($result)) {

                    $pool = array($row["username"], $row["job_title"]);
                    echo
                    "<p>
					    <input value='".implode(",", $pool)."' name=\"selected_jobs[]\" class=\"w3-check\" type=\"checkbox\">
					    <label>Company: ".$row["username"].", Job Title: ".$row["job_title"].", Openings: ".$row["opening_no"]."  </label>
				    </p>";
                }

                echo "<p><input type=\"submit\" name=\"submit\" class=\"w3-button w3-purple w3-round-large\" style=\"margin-left: 400px;\"</input></p>";
                echo "</form>";
            } else {
                echo "0 results";
            }
            ?>

	  	</ul>

	</div>

	<script>
	function searchCompany() {
	  var input, filter, ul, li, a, i;
	  input = document.getElementById("cvPoolInput");
	  filter = input.value.toUpperCase();
	  ul = document.getElementById("myUL");
	  li = ul.getElementsByTagName("label");
	  li2 = ul.getElementsByTagName("input");
	  for (i = 0; i < li.length; i++) {
	    txtValue = li[i].textContent || li[i].innerText;
	    if (txtValue.toUpperCase().indexOf(filter) > -1) {
	      li[i].style.display = "";
	      li2[i].style.display = "";
	    } else {
	      li[i].style.display = "none";
	      li2[i].style.display = "none";
	    }
	  }
	}
	</script>
	
</body>
</html>