<?php

	session_start();
	
	try{
	
	//creating a Connection to MongoDB
	$con = new MongoClient('localhost');
	
			
	//Selecting a Database
	$db = $con->doep;
	
	
	//Selecting A Collection
	$collection = "authentication";
	
	$prn = $_POST['prn'];
	$pass = hash('sha512',$_POST['pass']);
	
	$user = $db->$collection->findOne(array('prn'=>$prn,'pass'=>$pass)); //findOne.({})
	
	if($user)
		{	
			$_SESSION['prn'] = $prn;
			echo "User Authenticated";
			echo "<br>";
			echo "Redirecting to User Home Page!";
			header('Location:/DOEP/main/index.php');
		}
	else
		echo "Failure";
	
	}
	catch(MongoConnectionException $e)
	{
		die('Error Connecting to MongoDB Server');
	}catch(MongoException $e)
	{
		die('Error:'.$e->getMessage());
	}
?>