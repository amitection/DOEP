<?php
	try{
	
	//creating a Connection to MongoDB
	$con = new MongoClient('localhost');
	
			
	//Selecting a Database
	$db = $con->doep;
	
	
	//Selecting A Collection
	$collection = "cse_cs";
	
	}catch(MongoConnectionException $e)
	{
		die('Error Connecting to MongoDB Server');
	}catch(MongoException $e)
	{
		die('Error:'.$e->getMessage());
	}
	
	
	session_start();
	
	$countFunc = "count()";
	$N = $db->$collection->count();
	//repeat:
	$R = rand(1,$N);
	var_dump($R);
	
	
	//logic for filling the qid_array with random questions
	$qid_array[0] = " ";
	for($i=1;$i<=30;$i++)
	{

		repeat:
		$R = rand(1,$N);
		$curr_quest = $db->$collection->findOne(array("qid"=>"cse_cs".$R));
		 
		if($curr_quest==null)
			goto repeat;
		if(!in_array($curr_quest['qid'],$qid_array))	
			$qid_array[$i] = $curr_quest['qid'];
		else
			goto repeat;
	}
	$_SESSION['qid_array'] = $qid_array;
	var_dump($qid_array);
	//$curr_quest = $db->$collection->findOne(array("qid"=>"cse_cs".$R));
	//$qid = 1;
	$_SESSION['q_no'] = '1';
	header('Location: dispQues.php');
?>