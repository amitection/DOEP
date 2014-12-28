<!DOCTYPE html>
<html>
<head>
<title>Registration with DOEP</title>
	<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7; IE=EmulateIE9">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no"/>
    <link rel="stylesheet" type="text/css" href="style.css" media="all" />
    <link rel="stylesheet" type="text/css" href="demo.css" media="all" />
</head>
<body>
<div class="container">
			<!-- freshdesignweb top bar -->
            <div class="freshdesignweb-top">
                <a href="#">Contact Us</a>
                <span class="right">
                    <a href="/DOEP/login-out/login.php">
                        <strong>Back to the Login Page</strong>
                    </a>
                </span>
                <div class="clr"></div>
            </div><!--/ freshdesignweb top bar -->
			<header>
				<h1><span>DOEP</span> Welcome To The Registration Page</h1>
            </header>       
      <div  class="form">
    		<form id="contactform" action="checkRegistration.php" method="POST"> 
    			<p class="contact">
    			  <label for="fname">* First Name</label></p> 
    			<input id="fname" name="fname" placeholder="First Name" required tabindex="1" type="text">
					
    			 
				 
    			<p class="contact">
    			  <label for="lname">Last Name</label></p> 
    			<input id="lname" name="lname" placeholder="Last Name" tabindex="2" type="text"> 
					<?php 
						if(empty($_POST['lname']))
							$lname = " ";
						else
							$lname = $_POST['lname'];
					?>
    			 
				 
                <p class="contact">
                  <label for="prn">* PRN</label></p> 
    			<input id="prn" name="prn" placeholder="12345678A" required tabindex="3" type="text"> 
					<?php 
						$fname = $_POST['prn'];
						if (!preg_match("/^[0-9A-Z ]*$/",$fname))
							echo "Please enter the correct PRN no";
					?>
    			 
								    			 
                <p class="contact"><label for="password">Create a password</label></p> 
    			<input type="password" id="password" name="password" required tabindex="4"> 
                <p class="contact"><label for="repassword">Confirm your password</label></p> 
    			<input type="password" id="repassword" name="repassword" required tabindex="5"> 
        
               <fieldset>

			      <label class="gender"> 
                  <select class="select-style" name="gender">
             
                  <option  value="">Gender</option>
                  <option  value="m">Male</option>
                  <option  value="f">Female</option>
                  
                  </label>
                  </select>
				 
				 
                  <label class="age"> 
                  <select class="select-style" name="AGE">
             
                  <option  value="">Age</option>
                  <option  value="18">18</option>
                  <option  value="19">19</option>
                  <option  value="20">20</option>
                  <option  value="21">21</option>
                  <option  value="22">22</option>
                  <option  value="23">23</option>
                  <option  value="24">24</option>
                  			  
                  </label>
                 </select>    
                
                 
                
                  <label class="year"> 
                  <select class="select-style" name="Year">
             
                  <option  value="">YEAR</option>
                  <option  value="fe">FE</option>
                  <option  value="se">SE</option>
                  <option  value="te">TE</option>
                  			  
                  </label>
                 </select> 
				 
				 
				 
                  <label class="dept"> 
                  <select class="select-style" name="dept">
             
                  <option  value="">DEPT</option>
                  <option  value="cse">Computer</option>
                  <option  value="it">IT</option>
                  <option  value="me">Mechanical</option>
                  <option  value="civil">Civil</option>
                  <option  value="elec">Electrical</option>
                  <option  value="entc">ENTC</option>
                  <option  value="elex">Electronics</option>
                  <option  value="instru">Instrumentation</option>
                  <option  value="maths">Mathematics</option>
                  			  
                  </label>
                 </select>    
              </fieldset>
		<br>
            <p class="contact"><label for="phone">Email-ID</label></p> 
            <input id="email" name="email" placeholder="someone@example.com" required type="email"> <br>
            
            
            <p class="contact"><label for="phone">Mobile phone</label></p> 
            <input id="phone" name="phone" placeholder="phone number" required type="text"> <br>
            <input class="buttom" name="submit" id="submit" tabindex="5" value="Sign me up!" type="submit"> 	 
   </form> 
</div>      
</div>

</body>
</html>

<?php

?>
