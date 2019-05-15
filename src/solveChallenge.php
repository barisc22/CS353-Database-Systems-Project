<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet" type="text/css" href="styles/w3.css">
	<title>CodeInt - Solve Challenge</title>
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
		<p><h2 style="font-weight: bold; text-align: center; width: 100%;">Challenge Title</h2>
		<div class="w3-container" style="display: inline-block; width: 30%; height: 500px;">
			<div style="width: 90%; height: 300px; border: 1px solid grey; margin: 10px; padding: 10px;">Question</div>
			<div style="width: 90%; height: 120px; border: 1px solid grey; margin: 10px; padding: 10px;">Test Cases</div>
		</div>
		<div class="w3-container" style="width: 40%; height: 500px; text-align: center; padding:10px; margin: auto; display: inline-block; padding-top: 2%; padding-right: 10%;">
			
			<textarea class="w3-input w3-border" rows="4" cols="50" style="height: 80%; width: 130%;">
			</textarea>
			<br>
			<div style=" display: inline-block; padding-left: 30%; padding-right: 20%;">
				<button class="w3-button w3-purple w3-round-large">Save</button>
			</div>
			<div style=" display: inline-block;">
				<button class="w3-button w3-purple w3-round-large">Submit</button>
			</div>
		</div>
		<div class="w3-container" style="position:fixed; width: 30%; height: 50%; float: right; text-align: center; padding:10px; margin: auto; display: inline-block; padding-top: 3%; padding: 5%; height: 500px;">
			<select>
				<option hidden selected disabled=>Programming Languages</option>
				<option value="Java">Java</option>
				<option value="C++">C++</option>
			</select>
			<br><br><br><br><br>
			<ul class="w3-ul w3-margin-top" style="height: 250px; margin: auto; overflow: auto;">
				<table class="w3-table-all w3-hoverable">
				    <tr>
				      <td style="text-align: center;">Attempt 1</td>
				      <td style="text-align: center;">50%</td>
				    </tr>
				    <tr>
				      <td style="text-align: center;">Attempt 2</td>
				      <td style="text-align: center;">94%</td>
				    </tr>
				    <tr>
				      <td style="text-align: center;">Attempt 3</td>
				      <td style="text-align: center;">67%</td>
				    </tr>
				    <tr>
				      <td style="text-align: center;">Attempt 4</td>
				      <td style="text-align: center;"> </td>
				    </tr>
				    <tr>
				      <td style="text-align: center;">Attempt 5</td>
				      <td style="text-align: center;"> </td>
				    </tr>
			  </table>
			</ul>
		</div>
	</div>




</body>
</html>