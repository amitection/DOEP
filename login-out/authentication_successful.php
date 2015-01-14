
<!-- Checking for the department and then redirecting the authenticated user to the respective page -->

<?php
	session_start();
	try{
	
	//creating a Connection to MongoDB
	$con = new MongoClient('localhost');
	
			
	//Selecting a Database
	$db = $con->doep;
	
	
	//Selecting A Collection
	$collection = "user"; //
	
	}catch(MongoConnectionException $e)
	{
		die('Error Connecting to MongoDB Server');
	}catch(MongoException $e)
	{
		die('Error:'.$e->getMessage());
	}
?>


<?php 
	//Checking for the department of the logged in user
	$dept = $db->$collection->findOne(array("prn"=>$_SESSION['prn']),array("_id"=>0,"personal_info.dept"=>1))['personal_info']['dept'];
	echo $dept;
	$_SESSION['dept'] = $dept;
	
	switch($dept)
	{
		case 'cse':
			header('Location:/DOEP/main/comp/index.php');
	}
	
?>