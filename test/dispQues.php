<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Online-Test</title>
<link href="css/heading.css" rel="stylesheet" type="text/css" /><link href="css/question.css" rel="stylesheet" type="text/css" />
</head>


<h5>&nbsp;</h5>
<h2 class="heading">Padmashree Dr. D.Y. Patil Institute of Engineering and Technology</h2>


<p>
  <?php  

	session_start();
	
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
	
				
		if($_SERVER['REQUEST_METHOD'] == 'POST')
		{	
			echo "inside request method";
			//increment/decrement counter question counter
			if(isset($_POST['prev']))
			{
				$_SESSION['q_no'] = $_SESSION['q_no'] - 1;
				echo "Prev Pressed";
			}	
			if(isset($_POST['next']))
			{
				$_SESSION['q_no'] = $_SESSION['q_no'] +1;
				echo "Next Pressed";
			}
			
			if(isset($_POST['first']))
			{
				$_SESSION['q_no'] = 1;
				echo "First Pressed";
			}
			
			if(isset($_POST['last']))
			{
				$_SESSION['q_no'] = 30;
				echo "Last Pressed";
			}
		}
		
		$qid_array = $_SESSION['qid_array'];
		
		$qid = $qid_array[$_SESSION['q_no']];
		
		$curr_quest = $db->$collection->findOne(array("qid"=>$qid));
		//var_dump($curr_quest);
		
		 
	
	/*$curr_quest = $db->$collection->find()->limit(-1)->skip($R)->getNext();
	var_dump($curr_quest);
	if($curr_quest==null)
		goto repeat;
	//var_dump($curr_quest);
	echo $curr_quest['quest']; */
?>
</p>
<p>&nbsp; </p>
<form class ="question">
  <span class="question"><?php echo "Q".$_SESSION['q_no'].":"; echo " ".$curr_quest['quest'] ?><br><br>
<input type="radio"><?php echo $curr_quest['op1']; ?><br><br>
<input type="radio"><?php echo $curr_quest['op2']; ?><br><br>
<input type="radio"><?php echo $curr_quest['op3']; ?><br><br>
<input type="radio"><?php echo $curr_quest['op4']; ?></span>
</form>
<form method="POST" action="<?php $_SERVER['PHP_SELF']; ?>">
	<?php   if($_SESSION['q_no'] != 1)
			{
		     echo '<button type="submit" name="first">First</button>'; 
	         echo '<button type="submit" name="prev">Previous</button>';
			}?>
	
	<?php   if($_SESSION['q_no'] != 30) 
			{
			 echo '<button type="submit" name="next">Next</button>';
		     echo '<button type="submit" name="last">Last</button>'; 
			}?>
	<button type="submit" name="submit">Submit</button>
</form>

<?php $con->close(); ?>

