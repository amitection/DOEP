<?php
//config.php
try{
	
	//creating a Connection to MongoDB
	$con = new MongoClient('localhost');
			
	//Selecting a Database
	$db = $con->doep;
	}catch(MongoConnectionException $e)
	{
		die('Error Connecting to Database Server');
	}

?>