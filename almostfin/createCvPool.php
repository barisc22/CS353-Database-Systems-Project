<?php
include "config.php";


if(isset($_POST['submit_but'])){
$compId = $_SESSION['Id'];

//$compId = 14 ;

$title= $_POST['name'];
$desc =  $_POST['phone'];
$req =  $_POST['message'];
$op_no =  $_POST['service'];
$min_score =  $_POST ['range'];

 $sql_Q = "insert into cv_pool (c_id, job_title, job_desc, requirements, opening_no, min_score)values( '".$compId."', '".$title."', '".$desc."', '".$req."', '".$op_no."', '".$min_score."' )";
 
 //$accexist = $result->num_rows;
if($result = mysqli_query($con,$sql_Q) )
    {
     echo '<script type="text/javascript">alert("ADDED");</script>';
    //check account
     header('Location: login.php');
    }
    else {
    	echo '<script type="text/javascript">alert("NOT NOT NOT ADDED");</script>';
    }

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Create CvPool</title>
</head>
<body>

	<div class="container-contact100">
		<div class="wrap-contact100">
			<form class="contact100-form validate-form" method="POST">
				<span class="contact100-form-title">
					Start Recruitment Process
				</span>



				<div class="wrap-input100 validate-input bg1" data-validate="Please Type Your Name">
					<span class="label-input100">Job Title *</span>
					<input class="input100" type="text" name="name" placeholder="Enter Job Title" required>
				</div>


				<div class="wrap-input100 bg1 rs1-wrap-input100">
					<span class="label-input100">Job Description</span>
					<input class="input100" type="text" name="phone" placeholder="Enter Job Description" required>
				</div>

				<div class="wrap-openings input100-select bg1">

					<span class="label-input1001">Number Of Openings *</span>
					<div>
						<br>
						<select class="js-select2" name="service">
							<?php
    					for ($i=1; $i<=100; $i++)
    					{
       					 ?>
         			   <option value="<?php echo $i;?>"><?php echo $i;?></option>
       					 <?php
  						  }
						?>
						</select>
					

					</div>
					</div>
							<div class="wrap-openings input100-select bg1">
					<div class="cont2">
						<span class="label-input1001">Set Minimum Score for Applicants </span>
  					<div class="range-slider">
   					<span id="rs-bullet" class="rs-label">0</span>

   					<br> <input id="rs-range-line" class="rs-range" name="range" type="range" value="0" min="0" max="100"></div>
					</div>
				
						</div>
				<div class="wrap-input100 validate-input bg0 rs1-alert-validate" data-validate = "Please Type Your Message">
					<span class="label-input100">Requirements</span>
					<textarea class="input100" name="message" placeholder="Your message here..." required></textarea>
				</div>

				<div class="container-contact100-form-btn">
					<div class="contact100-form-btn">
						  <input type="submit" class="contact100-form-btn" id="submit_but" 
            		name = "submit_but" value= "CREATE"/>
						
					</div>
				</div>
			</form>
		</div>
	</div>


<!--===============================================================================================--><script language="javascript">
var rangeSlider = document.getElementById("rs-range-line");
var rangeBullet = document.getElementById("rs-bullet");

rangeSlider.addEventListener("input", showSliderValue, false);

function showSliderValue() {
  rangeBullet.innerHTML = rangeSlider.value;
  var bulletPosition = (rangeSlider.value /rangeSlider.max);
  rangeBullet.style.left = (bulletPosition * 95) + "%";
}
</script>

</body>
</html>
<style >
	
.cont2 {
   
    flex-direction: column;
    align-items: center;
    
   
    font-family: 'Roboto',sans-serif;
}

.range-slider {
    margin-top: 8vh;
    
}

input[type=range] {
  -webkit-appearance: none;
  width: 100%;
  margin: 13.8px 0;
}
input[type=range]:focus {
  outline: none;
}
input[type=range]::-webkit-slider-runnable-track {
  width: 100%;
  height: 8.4px;
  cursor: pointer;
  box-shadow: 1px 1px 1px #000000, 0px 0px 1px #0d0d0d;
  background: #AE13AE;
  border-radius: 1.3px;
  border: 0.2px solid #010101;
}
input[type=range]::-webkit-slider-thumb {
  box-shadow: 0.4px 0.4px 1px #000000, 0px 0px 0.4px #0d0d0d;
  border: 1px solid #000000;
  height: 36px;
  width: 16px;
  border-radius: 3px;
  background: #ffffff;
  cursor: pointer;
  -webkit-appearance: none;
  margin-top: -14px;
}
input[type=range]:focus::-webkit-slider-runnable-track {
  background: #AE13AE;
}
input[type=range]::-moz-range-track {
  width: 100%;
  height: 8.4px;
  cursor: pointer;
  box-shadow: 1px 1px 1px #000000, 0px 0px 1px #0d0d0d;
  background: ##AE13AE;
  border-radius: 1.3px;
  border: 0.2px solid #010101;
}
input[type=range]::-moz-range-thumb {
  box-shadow: 0.4px 0.4px 1px #000000, 0px 0px 0.4px #0d0d0d;
  border: 1px solid #000000;
  height: 36px;
  width: 16px;
  border-radius: 3px;
  background: #ffffff;
  cursor: pointer;
}
input[type=range]::-ms-track {
  width: 100%;
  height: 8.4px;
  cursor: pointer;
  background: transparent;
  border-color: transparent;
  color: transparent;
}
input[type=range]::-ms-fill-lower {
  background: ##AE13AE;
  border: 0.2px solid #010101;
  border-radius: 2.6px;
  box-shadow: 1px 1px 1px #000000, 0px 0px 1px #0d0d0d;
}
input[type=range]::-ms-fill-upper {
  background: #AE13AE;
  border: 0.2px solid #010101;
  border-radius: 2.6px;
  box-shadow: 1px 1px 1px #000000, 0px 0px 1px #0d0d0d;
}
input[type=range]::-ms-thumb {
  box-shadow: 0.4px 0.4px 1px #000000, 0px 0px 0.4px #0d0d0d;
  border: 1px solid #000000;
  height: 36px;
  width: 16px;
  border-radius: 3px;
  background: #ffffff;
  cursor: pointer;
  height: 8.4px;
}
input[type=range]:focus::-ms-fill-lower {
  background: #AE13AE;
}
input[type=range]:focus::-ms-fill-upper {
  background: #AE13AE;
}



.rs-label {
    position: relative;
    transform-origin: center center;
    display: block;
    width: 40px;
    height: 40px;
    background: transparent;
    border-radius: 50%;
    line-height: 30px;
    text-align: center;
    font-weight: bold;
    padding-top: 10px;
    box-sizing: border-box;
    border: 2px solid #AE13AE;
    margin-top: 10px;
    margin-left: -20px;
    left: attr(value);
    color: #AE13AE;
    font-style: normal;
    font-weight: normal;
    line-height: normal;
    font-size: 18px;
   
    
}


/*//////////////////////////////////////////////////////////////////
[ FONT ]*/

@font-face {
  font-family: Montserrat-Regular;
  src: url('../fonts/montserrat/Montserrat-Regular.ttf'); 
}

@font-face {
  font-family: Montserrat-Bold;
  src: url('../fonts/montserrat/Montserrat-Bold.ttf'); 
}

@font-face {
  font-family: Montserrat-Black;
  src: url('../fonts/montserrat/Montserrat-Black.ttf'); 
}

@font-face {
  font-family: Montserrat-SemiBold;
  src: url('../fonts/montserrat/Montserrat-SemiBold.ttf'); 
}

@font-face {
  font-family: Montserrat-Medium;
  src: url('../fonts/montserrat/Montserrat-Medium.ttf'); 
}



/*//////////////////////////////////////////////////////////////////
[ RESTYLE TAG ]*/

* {
	margin: 0px; 
	padding: 0px; 
	box-sizing: border-box;
}

body, html {
	height: 100%;
	font-family: Poppins-Regular, sans-serif;
}

/*---------------------------------------------*/
a {
	font-family: Poppins-Regular;
	font-size: 14px;
	line-height: 1.7;
	color: #666666;
	margin: 0px;
	transition: all 0.4s;
	-webkit-transition: all 0.4s;
  -o-transition: all 0.4s;
  -moz-transition: all 0.4s;
}

a:focus {
	outline: none !important;
}

a:hover {
	text-decoration: none;
}

/*---------------------------------------------*/
h1,h2,h3,h4,h5,h6 {
	margin: 0px;
}

p {
	font-family: Poppins-Regular;
	font-size: 14px;
	line-height: 1.7;
	color: #666666;
	margin: 0px;
}

ul, li {
	margin: 0px;
	list-style-type: none;
}


/*---------------------------------------------*/
input {
	outline: none;
	border: none;
}

input[type="number"] {
    -moz-appearance: textfield;
    appearance: none;
    -webkit-appearance: none;
}

input[type="number"]::-webkit-outer-spin-button,
input[type="number"]::-webkit-inner-spin-button {
    -webkit-appearance: none;
}

textarea {
  outline: none;
  border: none;
}

textarea:focus, input:focus {
  border-color: transparent !important;
}

input:focus::-webkit-input-placeholder { color:transparent; }
input:focus:-moz-placeholder { color:transparent; }
input:focus::-moz-placeholder { color:transparent; }
input:focus:-ms-input-placeholder { color:transparent; }

textarea:focus::-webkit-input-placeholder { color:transparent; }
textarea:focus:-moz-placeholder { color:transparent; }
textarea:focus::-moz-placeholder { color:transparent; }
textarea:focus:-ms-input-placeholder { color:transparent; }

input::-webkit-input-placeholder { color: #adadad;}
input:-moz-placeholder { color: #adadad;}
input::-moz-placeholder { color: #adadad;}
input:-ms-input-placeholder { color: #adadad;}

textarea::-webkit-input-placeholder { color: #adadad;}
textarea:-moz-placeholder { color: #adadad;}
textarea::-moz-placeholder { color: #adadad;}
textarea:-ms-input-placeholder { color: #adadad;}

/*---------------------------------------------*/
button {
	outline: none !important;
	border: none;
	background: transparent;
}

button:hover {
	cursor: pointer;
}

iframe {
	border: none !important;
}


/*---------------------------------------------*/
.container {
	max-width: 1200px;
}


/*//////////////////////////////////////////////////////////////////
[ Utility ]*/

.bg0 {background-color: #fff;}
.bg1 {background-color: #f7f7f7;}


/*//////////////////////////////////////////////////////////////////
[ Contact ]*/

.container-contact100 {
  width: 100%;  
  min-height: 100vh;
  display: -webkit-box;
  display: -webkit-flex;
  display: -moz-box;
  display: -ms-flexbox;
  display: flex;
  flex-wrap: wrap;
  justify-content: center;
  align-items: center;
  padding: 15px;
  background: #e6e6e6;
  
}

.wrap-contact100 {
  width: 920px;
  background: #fff;
  border-radius: 10px;
  overflow: hidden;
  padding: 62px 55px 90px 55px;
}


/*------------------------------------------------------------------
[  ]*/

.contact100-form {
  width: 100%;
  display: -webkit-box;
  display: -webkit-flex;
  display: -moz-box;
  display: -ms-flexbox;
  display: flex;
  flex-wrap: wrap;
  justify-content: space-between;
}

.contact100-form-title {
  display: block;
  width: 100%;
  font-family: Montserrat-Black;
  font-size: 39px;
  color: #333333;
  line-height: 1.2;
  text-align: center;
  padding-bottom: 59px;
}


.wrap-input100 {
  width: 100%;
  position: relative;
  border: 1px solid #e6e6e6;
  border-radius: 13px;
  padding: 10px 30px 9px 22px;
  margin-bottom: 20px;
}



}
.label-input100 {
  font-family: Montserrat-SemiBold;
  font-size: 10px;
  color: #393939;
  line-height: 1.5;
  text-transform: uppercase;
}
.label-input1001 {
  font-family: Montserrat-SemiBold;
  font-size: 15px;
  color: #393939;
  line-height: 1.5;

  text-transform: uppercase;
}
.wrap-openings {
  width: 100%;
  position: relative;
  border: 1px solid #e6e6e6;
  border-radius: 13px;
  padding: 10px 30px 9px 22px;
  margin-bottom: 20px;
}
.input100 {
  display: block;
  width: 100%;
  background: transparent;
  font-family: Montserrat-SemiBold;
  font-size: 18px;
  color: #555555;
  line-height: 1.2;
  padding-right: 15px;
}


/*---------------------------------------------*/
input.input100 {
  height: 40px;
}


textarea.input100 {
  min-height: 120px;
  padding-top: 9px;
  padding-bottom: 13px;
}


.input100:focus + .focus-input100::before {
  width: 100%;
}

.has-val.input100 + .focus-input100::before {
  width: 100%;
}


/*------------------------------------------------------------------
[ Button ]*/
.container-contact100-form-btn {
  display: -webkit-box;
  display: -webkit-flex;
  display: -moz-box;
  display: -ms-flexbox;
  display: flex;
  flex-wrap: wrap;
  justify-content: center;
  padding-top: 20px;
  width: 100%;
}

.contact100-form-btn {
  display: -webkit-box;
  display: -webkit-flex;
  display: -moz-box;
  display: -ms-flexbox;
  display: flex;
  justify-content: center;
  align-items: center;
  padding: 0 20px;
  width: 100%;
  height: 50px;
  background-color: #AE13AE;
  border-radius: 25px;

  font-family: Montserrat-Medium;
  font-size: 16px;
  color: #fff;
  line-height: 1.2;

  -webkit-transition: all 0.4s;
  -o-transition: all 0.4s;
  -moz-transition: all 0.4s;
  transition: all 0.4s;
}

.contact100-form-btn i {
  -webkit-transition: all 0.4s;
  -o-transition: all 0.4s;
  -moz-transition: all 0.4s;
  transition: all 0.4s;
}

.contact100-form-btn:hover {
  background-color: #00ad5f;
}

.contact100-form-btn:hover i {
  -webkit-transform: translateX(10px);
  -moz-transform: translateX(10px);
  -ms-transform: translateX(10px);
  -o-transform: translateX(10px);
  transform: translateX(10px);
}

/*------------------------------------------------------------------
[ Responsive ]*/

@media (max-width: 768px) {
  .rs1-wrap-input100 {
    width: 100%;
  }

}

@media (max-width: 576px) {
  .wrap-contact100 {
    padding: 62px 15px 90px 15px;
  }

  .wrap-input100 {
    padding: 10px 10px 9px 10px;
  }
}



/*------------------------------------------------------------------
[ Alert validate ]*/

.validate-input {
  position: relative;
}

.alert-validate::before {
  content: attr(data-validate);
  display: -webkit-box;
  display: -webkit-flex;
  display: -moz-box;
  display: -ms-flexbox;
  display: flex;
  align-items: center;
  position: absolute;
  width: 100%;
  min-height: 40px;
  background-color: #f7f7f7;
  top: 35px;
  left: 0px;
  padding: 0 45px 0 22px;
  pointer-events: none;

  font-family: Montserrat-SemiBold;
  font-size: 18px;
  color: #fa4251;
  line-height: 1.2;
}

.btn-hide-validate {
  font-family: Material-Design-Iconic-Font;
  font-size: 18px;
  color: #fa4251;
  cursor: pointer;
  display: -webkit-box;
  display: -webkit-flex;
  display: -moz-box;
  display: -ms-flexbox;
  display: flex;
  align-items: center;
  justify-content: center;
  position: absolute;
  width: 40px;
  height: 40px;
  top: 35px;
  right: 12px;
}

.rs1-alert-validate.alert-validate::before {
  background-color: #fff;
}

.true-validate::after {
  content: "\f26b";
  font-family: Material-Design-Iconic-Font;
  font-size: 18px;
  color: #00ad5f;
  display: -webkit-box;
  display: -webkit-flex;
  display: -moz-box;
  display: -ms-flexbox;
  display: flex;
  align-items: center;
  justify-content: center;
  position: absolute;
  width: 40px;
  height: 40px;
  top: 35px;
  right: 10px;
}

/*---------------------------------------------*/
@media (max-width: 576px) {
  .alert-validate::before {
    padding: 0 10px 0 10px;
  }

  .true-validate::after,
  .btn-hide-validate {
    right: 0px;
    width: 30px;
  }
}


/*==================================================================
[ Restyle Select2 ]*/

.select2-container {
  display: block;
  max-width: 100% !important;
  width: auto !important;
}

.select2-container .select2-selection--single {
  display: -webkit-box;
  display: -webkit-flex;
  display: -moz-box;
  display: -ms-flexbox;
  display: flex;
  align-items: center;
  background-color: transparent;
  border: none;
  height: 40px;
  outline: none;
  position: relative;
}

/*------------------------------------------------------------------
[ in select ]*/
.select2-container .select2-selection--single .select2-selection__rendered {
  font-family: Montserrat-SemiBold;
  font-size: 18px;
  color: #555555;
  line-height: 1.2;
  padding-left: 0px ;
  background-color: transparent;
}

.select2-container--default .select2-selection--single .select2-selection__arrow {
  height: 100%;
  top: 50%;
  transform: translateY(-50%);
  right: 0px;
  display: -webkit-box;
  display: -webkit-flex;
  display: -moz-box;
  display: -ms-flexbox;
  display: flex;
  align-items: center;
  justify-content: flex-end;
}

.select2-selection__arrow b {
  display: none;
}

.select2-selection__arrow::before {
  content: '\f312';
  font-family: Material-Design-Iconic-Font;
  font-size: 18px;
  color: #555555;
}


/*------------------------------------------------------------------
[ Dropdown option ]*/
.select2-container--open .select2-dropdown {
  z-index: 1251;
  width: calc(100% + 2px);
  border: 0px solid transparent;
  border-radius: 10px;
  overflow: hidden;
  background-color: white;
  left: -24px;

  box-shadow: 0 3px 10px 0px rgba(0, 0, 0, 0.2);
  -moz-box-shadow: 0 3px 10px 0px rgba(0, 0, 0, 0.2);
  -webkit-box-shadow: 0 3px 10px 0px rgba(0, 0, 0, 0.2);
  -o-box-shadow: 0 3px 10px 0px rgba(0, 0, 0, 0.2);
  -ms-box-shadow: 0 3px 10px 0px rgba(0, 0, 0, 0.2);
}

@media (max-width: 576px) {
  .select2-container--open .select2-dropdown {
    left: -12px;
  }
}

.select2-dropdown--above {top: -38px;}
.select2-dropdown--below {top: 10px;}

.select2-container .select2-results__option[aria-selected] {
  padding-top: 10px;
  padding-bottom: 10px;
  padding-left: 24px;
}

@media (max-width: 576px) {
  .select2-container .select2-results__option[aria-selected] {
    padding-left: 12px;
  }
}

.select2-container .select2-results__option[aria-selected="true"] {
  background: #00ad5f;
  color: white;
}

.select2-container .select2-results__option--highlighted[aria-selected] {
  background: #00ad5f;
  color: white;
}

.select2-results__options {
  font-family: Montserrat-SemiBold;
  font-size: 14px;
  color: #555555;
  line-height: 1.2;
}

.select2-search--dropdown .select2-search__field {
  border: 1px solid #aaa;
  outline: none;
  font-family: Poppins-Regular;
  font-size: 15px;
  color: #333333;
  line-height: 1.2;
}



/*==================================================================
[ Restyle Radio ]*/
.wrap-contact100-form-radio {
  width: 100%;
  padding: 15px 25px 0 25px;
}

.contact100-form-radio {
  padding-bottom: 5px;
}

.input-radio100 {
  display: none;
}

.label-radio100 {
  display: block;
  position: relative;
  padding-left: 28px;
  cursor: pointer;
  font-family: Montserrat-SemiBold;
  font-size: 18px;
  color: #555555;
  line-height: 1.2;
}

.label-radio100::before {
  content: "";
  display: block;
  position: absolute;
  width: 20px;
  height: 20px;
  border-radius: 50%;
  border: 1px solid #cdcdcd;
  background: #fff;
  left: 0;
  top: 50%;
  -webkit-transform: translateY(-50%);
  -moz-transform: translateY(-50%);
  -ms-transform: translateY(-50%);
  -o-transform: translateY(-50%);
  transform: translateY(-50%);
}

.label-radio100::after {
  content: "";
  display: block;
  position: absolute;
  width: 20px;
  height: 20px;
  border-radius: 50%;
  border: 6px solid transparent;
  background: #00ad5f;
  -moz-background-clip: padding;     
  -webkit-background-clip: padding;  
  background-clip: padding-box; 
  left: 0;
  top: 50%;
  -webkit-transform: translateY(-50%);
  -moz-transform: translateY(-50%);
  -ms-transform: translateY(-50%);
  -o-transform: translateY(-50%);
  transform: translateY(-50%);
  display: none;

}

.input-radio100:checked + .label-radio100::after {
  display: block;
}


/*==================================================================
[ rs NoUI ]*/
.wrap-contact100-form-range {
  width: 100%;
  padding: 20px 25px 57px 25px;
}

.contact100-form-range-value {
  font-family: Montserrat-SemiBold;
  font-size: 18px;
  color: #555555;
  line-height: 1.2;
  padding-top: 10px;
  padding-bottom: 30px;
}

.contact100-form-range-value input {
  display: none;
}

#filter-bar {
  height: 20px;
  border: 1px solid #e6e6e6;
  border-radius: 9px;
  background-color: #f7f7f7;
}
#filter-bar .noUi-connect {
  border: 1px solid #e6e6e6;
  border-radius: 9px;
  background-color: #00ad5f;
  box-shadow: none;
}
#filter-bar .noUi-handle {
  width: 40px;
  height: 36px;
  border: 1px solid #cccccc;
  border-radius: 9px;
  background: #f5f5f5;
  cursor: pointer;
  box-shadow: none;
  outline: none;
  top: -8px;
  display: -webkit-box;
  display: -webkit-flex;
  display: -moz-box;
  display: -ms-flexbox;
  display: flex;
  justify-content: center;
  align-items: center;
}

#filter-bar .noUi-handle.noUi-handle-lower {
  left: -1px;
}

#filter-bar .noUi-handle.noUi-handle-upper {
  left: -39px;
}

#filter-bar .noUi-handle:before {
  content: "";
  display: block;
  position: unset;
  height: 12px;
  width: 9px;
  background-color: transparent;
  border-left: 2px solid #cccccc;
  border-right: 2px solid #cccccc;
}
#filter-bar .noUi-handle:after {
  display: none;
}

@media (max-width: 576px) {
  .wrap-contact100-form-range {
    padding: 20px 0px 57px 0px;
  }

  .wrap-contact100-form-radio {
    padding: 15px 0px 0 0px;
  }
}
</style>