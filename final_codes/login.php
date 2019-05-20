  <?php
include "config.php";


  
 if(isset($_POST['login_but'])){




    $uname = mysqli_real_escape_string($con,$_POST['username']);
    $password = mysqli_real_escape_string($con,$_POST['pass']);

 if ($uname != "" && $password != ""){

        $uname=strtolower($uname);
        //does it exists in the database
        $sql_query = "select count(*) as cntUser from general_user where lower(username)='".$uname."' and password='".$password."'";
        $result = mysqli_query($con,$sql_query);
        $row = mysqli_fetch_array($result);

        $count = $row['cntUser'];

        //is it a user
        $sql_User = "select id as choose from general_user where lower(username)='".$uname."'";

        $result1 = mysqli_query($con,$sql_User);
        $row1 = mysqli_fetch_array($result1);


        $count1 = $row1['choose'];
        $_SESSION['Id'] = $count1;
        //Is it a editor

        $sql_Editor = "select count(*) as edit from editor where id='".$count1."'";

        $result2 = mysqli_query($con,$sql_Editor);
        $row2 = mysqli_fetch_array($result2);

        $count2 = $row2['edit'];
        //Is it a company
         $sql_Comp = "select count(*) as comp from company where id='".$count1."'";

        $result3 = mysqli_query($con,$sql_Comp);
        $row3 = mysqli_fetch_array($result3);

        $count3 = $row3['comp'];


        if($count > 0){
          //this is an editor
          if($count2 > 0){
            $_SESSION['uname'] = $uname;
             $_SESSION['editId'] = $count1;
            header('Location: EditorMainPage.php');
          }
          //this is a comp
          else if($count3 > 0)
          {

             $_SESSION['uname'] = $uname;
             $_SESSION['userId'] = $count1;
   $val = "select validation from company where id = '".$count1."'";
           $result4 = mysqli_query($con,$val);
             $row4 = mysqli_fetch_array($result4);
               $val55 = $row4['validation'];
            if($val55 == 1){
            header('Location: CompanyMainPage.php');
          }else {
            $mes = "YOU ARE NOT VALIDATED";
    echo "<script type=\"text/javascript\"> alert('$mes'); <script>";
          }
          }
          else{
             $_SESSION['uname'] = $uname;
             $_SESSION['userId'] = $count1;
            header('Location: userMainPage.php');

          }
            
        }else{
            echo "Invalid username and password";
        }

    }

}






 
?>



</
<!doctype html>
<html lang="en">
<head>

<script language="javascript">
function validate()
    {
        var x = document.forms["myform"]["pass"].value;
        var y = document.forms["myform"]["username"].value;
        if(x == "")
        {
             alert("PLEASE ENTER PASSWORD");
             return false;
        }
         if(y == "")
        {
             alert("PLEASE ENTER USERNAME");
             return false;
        }
         

        return true;
    }
 

</script>

	<title>Login</title>
	<meta charset="UTF-8">

</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100 p-t-85 p-b-20">
				<form class="login100-form validate-form " name="myform" method="post" action="" onsubmit="return validate()">
					
					<!-- This is the CODEINT SYMBOL-->
					<span class="login100-form-avatar">
						<img src="images/codeint.png" alt="AVATAR">
					</span>
					<!-- This is the USERNAME-->
					<div class="wrap-input100 validate-input m-t-85 m-b-35" data-validate = "Enter username">
						<input class="input100" type="text" name="username"  placeholder="Username" >
						<span class="focus-input100"></span>
					</div>
							<!-- This is the PASSWORD-->
					<div class="wrap-input100 validate-input m-b-50" data-validate="Enter password">
						<input class="input100" type="password" name="pass" placeholder="Password"  >
						<span class="focus-input100"  ></span>
					</div>
            
						<!-- This is the LOGIN BUTTON
					<div class="container-login100-form-btn">
            <form>
						<input type="button" value="LOGIN" class="login100-form-btn" onclick="loginfunc()" />
				
          </form>
					</div> 
  -->
            
      
						<div class="container-login100-form-btn">
						 <!-- <form name="myform" method="post" action="" onsubmit="return validate()" >-->

            		<input type="submit" class="login100-form-btn" id="login_but" 
            		name = "login_but" value= "LOGIN"/>
                  </form>
        					</div>
                   


					<ul class="login-more p-t-190">
						<li class="m-b-8">
							<span class="txt1">
								Forgot
							</span>

							<a href="#" class="txt2">
								Username / Password?
							</a>
						</li>

						<li>
							<span class="txt1">
								Don’t have an account?
							</span>

              <?php echo  "<a href='MainSignUp.php?' class='txt2' >SignUp</a>";?>
							
						</li>
					</ul>
				
        </div>
		</div>
	</div>
	

	<div id="dropDownSelect1"></div>
	

</body>

</html>


<style>


/*//////////////////////////////////////////////////////////////////
[ FONT ]*/

@font-face {
  font-family: Poppins-Regular;
  src: url('../fonts/poppins/Poppins-Regular.ttf'); 
}

@font-face {
  font-family: Poppins-Medium;
  src: url('../fonts/poppins/Poppins-Medium.ttf'); 
}

@font-face {
  font-family: Poppins-Bold;
  src: url('../fonts/poppins/Poppins-Bold.ttf'); 
}

@font-face {
  font-family: Poppins-SemiBold;
  src: url('../fonts/poppins/Poppins-SemiBold.ttf'); 
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
  color: #333333;
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


/*//////////////////////////////////////////////////////////////////
[ Utility ]*/
.txt1 {
  font-family: Poppins-Regular;
  font-size: 15px;
  color: 	#000000;
  line-height: 1.5;
}

.txt2 {
  font-family: Poppins-Regular;
  font-size: 15px;
  color: #AE13AE;
  line-height: 1.5;
}

/*//////////////////////////////////////////////////////////////////
[ login ]*/

.limiter {
  width: 100%;
  margin: 0 auto;
}

.container-login100 {
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
  background: #fff;  
}

.wrap-login100 {
  width: 390px;
  background: #fff;
}


/*------------------------------------------------------------------
[ Form ]*/

.login100-form {
  width: 100%;
}

.login100-form-title {
  display: block;
  font-family: Poppins-Bold;
  font-size: 39px;
  color: #333333;
  line-height: 1.2;
  text-align: center;
}

.login100-form-avatar {
  display: block;
  width: 200px;
  height: 120px;
  
  overflow: hidden;
  margin: 0 auto;
}

.login100-form-avatar img {
  width: 100%;
}

/*------------------------------------------------------------------
[ Input ]*/

.wrap-input100 {
  width: 100%;
  position: relative;
  border-bottom: 2px solid #AE13AE;
}

.input100 {
  font-family: Poppins-SemiBold;
  font-size: 18px;
  color: #555555;
  line-height: 1.2;

  display: block;
  width: 100%;
  height: 52px;
  background: transparent;
  padding: 0 5px;
}

/*---------------------------------------------*/ 
.focus-input100 {
  position: absolute;
  display: block;
  width: 100%;
  height: 100%;
  top: 0;
  left: 0;
  pointer-events: none;
}

.focus-input100::before {
  content: "";
  display: block;
  position: absolute;
  bottom: -2px;
  left: 0;
  width: 0;
  height: 2px;

  -webkit-transition: all 0.4s;
  -o-transition: all 0.4s;
  -moz-transition: all 0.4s;
  transition: all 0.4s;

  background: #57b846;
}

.focus-input100::after {
  font-family: Poppins-Medium;
  font-size: 18px;
  color: #999999;
  line-height: 1.2;

  content: attr(data-placeholder);
  display: block;
  width: 100%;
  position: absolute;
  top: 15px;
  left: 0px;
  padding-left: 5px;

  -webkit-transition: all 0.4s;
  -o-transition: all 0.4s;
  -moz-transition: all 0.4s;
  transition: all 0.4s;
}

.input100:focus + .focus-input100::after {
  top: -20px;
  font-size: 15px;
}

.input100:focus + .focus-input100::before {
  width: 100%;
}

.has-val.input100 + .focus-input100::after {
  top: -20px;
  font-size: 15px;
}

.has-val.input100 + .focus-input100::before {
  width: 100%;
}


/*------------------------------------------------------------------
[ Button ]*/
.container-login100-form-btn {
	padding-top: 5%;
	padding-bottom: 4%;
  width: 100%;
  display: -webkit-box;
  display: -webkit-flex;
  display: -moz-box;
  display: -ms-flexbox;
  display: flex;
  flex-wrap: wrap;
  justify-content: center;
}

.login100-form-btn {
  font-family: Poppins-Medium;
  font-size: 16px;
  color: #fff;
  line-height: 1.2;
  text-transform: uppercase;

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

  box-shadow: 0 10px 30px 0px rgba(128, 0, 128, 0.5);
  -moz-box-shadow: 0 10px 30px 0px  rgba(128, 0, 128, 0.5);
  -webkit-box-shadow: 0 10px 30px 0px  rgba(128, 0, 128, 0.5);
  -o-box-shadow: 0 10px 30px 0px  rgba(128, 0, 128, 0.5);
  -ms-box-shadow: 0 10px 30px 0px  rgba(128, 0, 128, 0.5);

  -webkit-transition: all 0.4s;
  -o-transition: all 0.4s;
  -moz-transition: all 0.4s;
  transition: all 0.4s;
}

.login100-form-btn:hover  {
  background-color: #333333;
  box-shadow: 0 10px 30px 0px rgba(128, 0, 128, 0.5);
  -moz-box-shadow: 0 10px 30px 0px rgba(128, 0, 128, 0.5);
  -webkit-box-shadow: 0 10px 30px 0px rgba(128, 0, 128, 0.5);
  -o-box-shadow: 0 10px 30px 0px rgba(128, 0, 128, 0.5);
  -ms-box-shadow: 0 10px 30px 0px rgba(128, 0, 128, 0.5);
}



/*------------------------------------------------------------------
[ Alert validate ]*/

.validate-input {
  position: relative;
}

.alert-validate::before {
  content: attr(data-validate);
  position: absolute;
  max-width: 70%;
  background-color: #fff;
  border: 1px solid #c80000;
  border-radius: 2px;
  padding: 4px 25px 4px 10px;
  top: 50%;
  -webkit-transform: translateY(-50%);
  -moz-transform: translateY(-50%);
  -ms-transform: translateY(-50%);
  -o-transform: translateY(-50%);
  transform: translateY(-50%);
  right: 0px;
  pointer-events: none;

  font-family: Poppins-Regular;
  color: #c80000;
  font-size: 13px;
  line-height: 1.4;
  text-align: left;

  visibility: hidden;
  opacity: 0;

  -webkit-transition: opacity 0.4s;
  -o-transition: opacity 0.4s;
  -moz-transition: opacity 0.4s;
  transition: opacity 0.4s;
}

.alert-validate::after {
  content: "\f06a";
  font-family: FontAwesome;
  font-size: 16px;
  color: #c80000;

  display: block;
  position: absolute;
  background-color: #fff;
  top: 50%;
  -webkit-transform: translateY(-50%);
  -moz-transform: translateY(-50%);
  -ms-transform: translateY(-50%);
  -o-transform: translateY(-50%);
  transform: translateY(-50%);
  right: 5px;
}

.alert-validate:hover:before {
  visibility: visible;
  opacity: 1;
}

@media (max-width: 992px) {
  .alert-validate::before {
    visibility: visible;
    opacity: 1;
  }
}


/*//////////////////////////////////////////////////////////////////
[ Login more ]*/
.login-more li {
  position: relative;
  padding-left: 16px;
}

.login-more li::before {
  content: "";
  display: block;
  position: absolute;
  width: 5px;
  height: 5px;
  border-radius: 50%;
  background-color: #cccccc;
  top: 45%;
  -webkit-transform: translateY(-50%);
  -moz-transform: translateY(-50%);
  -ms-transform: translateY(-50%);
  -o-transform: translateY(-50%);
  transform: translateY(-50%);
  left: 0;
}
</style>

 