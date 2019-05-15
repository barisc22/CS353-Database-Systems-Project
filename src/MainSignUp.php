<?php

  
 if(isset($_POST['company'])){
   header('Location: CompanySignUp.php');
          }else  
 if(isset($_POST['user'])){
   header('Location: UserSignUp.php');
          }else  
 if(isset($_POST['editor'])){
   header('Location: EditorSignUp.php');
          }


?>

<!doctype html>
<html>
<head></head>
    <body>
    	<div align ="center" class="title">
    	<p2> Choose Account Type </p2>
    </div>
    	<div class="buttons">
      	<form class="login100-form validate-form " name="myform" method="post" action="" ">
				<div class="container-login100-form-btn">	
					
            		<input type="submit" class="login100-form-btn" id="user" 
            		name = "user" value= "USER"/>
            	</div>
            		<div class="container-login100-form-btn">
            		<input type="submit" class="login100-form-btn" id="company" 
            		name = "company" value= "COMPANY"/>
            	</div>
            		<div class="container-login100-form-btn">

            		<input type="submit" class="login100-form-btn" id="editor" 
            		name = "editor" value= "EDITOR"/>
            	</div>
                  </form>
        					</div>

    	</body></html>

    	<style>
    	
    	.title{
    		padding-top: 10%;
    		padding-bottom: 5%;
    		font-family: Poppins-Medium;
 			font-size: 30px;
 			justify-content: center;

    	}
    	.buttons{
    		padding-bottom: 10%;
    	}
    .container-login100-form-btn {
	padding-bottom: 5%;
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
  width: 20%;
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



    	</style>