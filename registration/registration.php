<!DOCTYPE html>
<html>
<head>
<title>Registration with DOEP</title>
	<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7; IE=EmulateIE9">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no"/>
    <link rel="stylesheet" type="text/css" href="style.css" media="all" />
    <link rel="stylesheet" type="text/css" href="demo.css" media="all" />
	<style>
		.error {color: #FF0000;}
	</style>
</head>
<body>

<?php
	session_start();
	
	try{
	
	//creating a Connection to MongoDB
	$con = new MongoClient('localhost');
			
	//Selecting a Database
	$db = $con->doep;
	
	$auth_coll = "authentication";
	
	$user_coll = "user";
	
	$passErr = $prnErr=$deptErr=$registration_success = $yearErr = $secErr = "";
	if($_SERVER["REQUEST_METHOD"]=="POST")
	{
		//checking for correct prn sequence
		if (!preg_match("/[0-9][A-Z]/",$_POST['prn']) or strlen($_POST['prn'])!=9)
			$prnErr = "<br>Please Enter The Correct PRN no.";
			
		//check for duplicate prn
		if(preg_match("/[0-9][A-Z]/",$_POST['prn']) and strlen($_POST['prn'])==9)
			if($db->user->findOne(array("prn"=>$_POST['prn'])))
				$prnErr="<br>PRN already in use by someone else.";
	
		//checking for password match
		if($_POST['password'] != $_POST['repassword'])
			$passErr= '<br>Passwords do not match';
			
		//checking if department is unentered	
		if($_POST['dept']=='none')
			$deptErr="<br>Warning:Selecting the CORRECT Department is Very Important";
			
		//checking if department is unentered	
		if($_POST['year']=='none')
			$yearErr="<br>Warning:Selecting the CORRECT YEAR is Very Important";
			
		//checking if department is unentered	
		if($_POST['sec_quest']=='none')
			$secErr="<br>Warning:Please select a security question";
			
		//If all entered information is correct then successfull registration
		if($passErr =="" and $prnErr= "" and $deptErr = "")
		{
			//Migrate to Login Page
			$registration_success = "Registration Successfull";
			
			//Enter all the information from the form into the Database
			$fname = $_POST['fname'];
			
			if(empty($_POST['lname']))
				$lname = " ";
			else
				$lname = $_POST['lname'];
			
			$prn = $_POST['prn'];
			
			$gender = $_POST['gender'];
			
			$dept = $_POST['dept'];
			
			$age = $_POST['age'];
			
			$year = $_POST['year'];
			
			
		}
		
		
	}
	}catch(MongoConnectionException $e)
	{
		die('Error Connecting to MongoDB Server');
	}catch(MongoException $e)
	{
		die('Error:'.$e->getMessage());
	}
?>
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
    		<form id="contactform" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST"> 
    			<p class="contact">
    			  <label for="fname">* First Name</label></p> 
    			<input id="fname" name="fname" placeholder="First Name" required tabindex="1" type="text">
					
    			 
				 
    			<p class="contact">
    			  <label for="lname">Last Name</label></p> 
    			<input id="lname" name="lname" placeholder="Last Name" tabindex="2" type="text">
    			
				
				<p class="contact">
                  <label for="prn">* PRN</label></p> 
    			<input id="prn" name="prn" placeholder="12345678A" required tabindex="3" type="text"> 
				<font size="1"><span class="error"><?php echo $prnErr;?></span></font>
								    			 
                
				<p class="contact"><label for="password">Create a password</label></p> 
    			<input type="password" id="password" name="password" required tabindex="4"> 
                <p class="contact"><label for="repassword">Confirm your password</label></p> 
    			<input type="password" id="repassword" name="repassword" required tabindex="5"> 
				<font size="1"><span class="error"><?php echo $passErr;?></span></font>
        
               <fieldset>

			      <label class="gender"> 
                  <select class="select-style" name="gender">
             
                  <option  value="none">Gender</option>
                  <option  value="m">Male</option>
                  <option  value="f">Female</option>
                  
                  </label>
                  </select>
				 
				 
                  <label class="age"> 
                  <select class="select-style" name="AGE">
             
                  <option  value="none">Age</option>
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
                  <select class="select-style" name="year">
             
                  <option  value="none">YEAR</option>
                  <option  value="fe">FE</option>
                  <option  value="se">SE</option>
                  <option  value="te">TE</option>
                  			  
                  </label>
                 </select>
						
				 
				 
				 
                  <label class="dept"> 
                  <select class="select-style" name="dept">
             
                  <option  value="none">DEPT</option>
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
				  <font size="1"><span class="error"><?php echo $deptErr;?></span></font>
  				  <font size="1"><span class="error"><?php echo $yearErr;?></span></font>

              </fieldset>
			  <br>
			  <font size="1">Note: Selecting a security question is important. If you ever forget your password
			  you can use this to retrieve your password.</font>
			  <br>
			  <label class="sec_quest"> 
                  <select class="select-style" name="sec_quest">
             
                  <option  value="none">Select a security question.....</option>
                  <option  value="s1">What is the name of your childhood hero?</option>
                  <option  value="s2">Whats was your childhood fantasy?</option>
                  <option  value="s3">Whats is your favourite cartoon?</option>
               </label>
			   <font size="1"><span class="error"><?php echo $secErr;?></span></font>
                 </select>
				 <p class="contact"><label for="ans">Answer</label></p> 
				<input id="sec_ans" name="sec_ans" placeholder="Enter here..." required type="text">
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
