<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta charset="UTF-8">

<style type="text/css">
.cop1 {
	width: 250px;
	height: auto;
	margin-left: 220px;
	float: left;

}
/* Social - footer
========================== */

ul.social-networks {
	overflow: hidden;
	margin: 0px 0 0 0px;
	padding: 0 0 0 0px;
	float:right;

}
ul.social-networks li {
	float: left;
	margin: 20px 1px 0;
	list-style: none;
	border: none;
}

.icon-twitter a, .icon-facebook a, .icon-pinterest a, .icon-linkedin a, .icon-flickr a, .icon-dribbble a {
	float: left;
	
	text-indent: 8000px;
	width: 40px;
	height: 30px;
	-webkit-transition: all 0.3s ease-in-out;
	-moz-transition: all 0.3s ease-in-out;
	-o-transition: all 0.3s ease-in-out;
	transition: all 0.3s ease-in-out;
}
.icon-twitter a:hover, .icon-facebook a:hover, .icon-pinterest a:hover, .icon-linkedin a:hover, .icon-flickr a:hover, .icon-dribbble a:hover {
	background: url(images/social-sprite.png) no-repeat left top;
	-webkit-transition: all 0.3s ease-in-out;
	-moz-transition: all 0.3s ease-in-out;
	-o-transition: all 0.3s ease-in-out;
	transition: all 0.3s ease-in-out;
}

.icon-facebook, .icon-facebook a {
	background-position: -120px top;
}
.icon-facebook a:hover {
	background-position: -120px bottom;
}
.icon-twitter, .icon-twitter a {
	background-position: -80px top;
}
.icon-twitter a:hover {
	background-position: -80px bottom;
}
.icon-dribbble, .icon-dribbble a {
	background-position: -40px top;
}
.icon-dribbble a:hover {
	background-position: -40px bottom;
}
.icon-linkedin, .icon-linkedin a {
	background-position: 0px top;
}
.icon-linkedin a:hover {
	background-position: 0px bottom;
}
.
</style>
 <script type="text/javascript">
    $(function () {
      $(document).bind('contextmenu',function(e){
        e.preventDefault();
       
      });
    });
  </script>


</head>

<body onload = "setCountDown();">
<div id="wrp">
  <div class="inr">
    <div class="inr"> 
      <!-- header -->
      <div id="headar">
        <div class="logo"><img src="./1_files/logo.png" alt="image" title=""></div>
		<span style="margin-left: 60px;">
			<script async="" src="./1_files/adsbygoogle.js"></script>
				<!-- big horizontal72090 -->
				
		</span>	   
    </div>
  </div>
  </div>
	

    <link rel="stylesheet" type="text/css" href="./1_files/style.css">
    <script language="JavaScript" type="text/JavaScript"></script>
    

    <style type="text/css">
.common_data, .img-s,/* .pagination */{
	float: left;
	width: 100%;
}
.q_dv  {
	width: 960px;
	float: left;
}
.ans_dv{
	width: 486px;
	float: left;
}
.q_pagin {
	background-color: #000000;
}
.q_skipped {
	background-color: #FF0000;
}
.q_attempt {
	background-color: #006600;
}
</style>
<style type="text/css">
.tg  {border-collapse:collapse;border-spacing:0;}
.tg td{font-family:Arial, sans-serif;font-size:14px;padding:10px 14px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;}
.tg th{font-family:Arial, sans-serif;font-size:14px;font-weight:normal;padding:10px 14px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;}
.tg .tg-78dq{font-family:Arial, Helvetica, sans-serif !important;;background-color:#329a9d;color:#ffffff;text-align:center}
.tg .tg-ql64{font-family:Arial, Helvetica, sans-serif !important;;background-color:#329a9d;color:#ffffff}
.tg .tg-94g7{font-family:Arial, Helvetica, sans-serif !important;;background-color:#329a9d;color:#ffffff}
.tg{
	position:fixed;left:1100px;top:300px; display:none;
}
.listOfQuestions{
	position:fixed;
	left:1220px;
	top:280px;
}
.listOfQuestions:hover .tg{
	display:block;
}
</style>



<?php
	session_start();
	
	
	try{
	
	//creating a Connection to MongoDB
	$con = new MongoClient('localhost');
	
			
	//Selecting a Database
	$db = $con->doep;
	
	
	
	
	/*if(empty($_SESSION['dept']) and empty($_SESSION['prn']) and !isset($_SESSION['sub_code']) )
		header('Location: /DOEP/index.html');
	
	$sub_code = $_SESSION['sub_code'];*/
	
	//Selecting A Collection
	$sub_code = "cse_cs";
	$_SESSION['sub_code']=$sub_code;
	$collection = $sub_code;
	
	}catch(MongoConnectionException $e)
	{
		die('Error Connecting to MongoDB Server');
	}catch(MongoException $e)
	{
		die('Error:'.$e->getMessage());
	}
	
	
	
	if($_SERVER['REQUEST_METHOD'] != 'POST')
	{
		$countFunc = "count()";
		$N = $db->$collection->count();
		
		$R = rand(1,$N);
		//var_dump($R);
	
	
	
		//logic for filling the qid_array with random questions
		$qid_array[0] = " ";
		$qid_ans[0]= " ";
		for($i=1;$i<=30;$i++)
		{
			$qid_ans[$i]= "none";
			repeat:
			$R = rand(1,$N);
			$curr_quest = $db->$collection->findOne(array("qid"=>$sub_code.$R));
		 
			if($curr_quest==null)
				goto repeat;
			if(!in_array($curr_quest['qid'],$qid_array))	
				$qid_array[$i] = $curr_quest['qid'];
			else
				goto repeat;
		}
		$_SESSION['qid_ans'] = $qid_ans;
		$_SESSION['qid_array'] = $qid_array;
		//var_dump($qid_array);
		
		$_SESSION['q_no'] = '1';
		
		//Timer Logic
		$dateFormat = "d F Y";
		$_SESSION['endDate'] = time() + (30*60);//Change the 30 to however many minutes you want to countdown
		$startDate = time();
		$secondsDiff = $_SESSION['endDate'] - $startDate;
		$remainingDay     = floor($secondsDiff/60/60/24);
		$remainingHour    = floor(($secondsDiff-($remainingDay*60*60*24))/60/60);
		$_SESSION['remainingMinutes'] = floor(($secondsDiff-($remainingDay*60*60*24)-($remainingHour*60*60))/60);
		$_SESSION['remainingSeconds'] = floor(($secondsDiff-($remainingDay*60*60*24)-($remainingHour*60*60))-($_SESSION['remainingMinutes']*60));
		date_default_timezone_set('Asia/Kolkata');
		$_SESSION['actualStartDate'] = date("d F Y",$startDate);// Use for future:: Noting when the exam was given
		$_SESSION['actualStartTime'] = date("h:i:s A",$startDate);


	}
	
	//==========================
	//AFTER RETRIEVING QUESTIONS
	
	$qid_ans = $_SESSION['qid_ans'];
		
		function storeAndSaveDataInDatabase()
		{
			try{
				//save the answered option
				
				global $db;
				$db->user->update(array("prn"=>$_SESSION['prn']),
									array('$set'=>array(
														"current_test"=>array(
																				//Storing the current quest
																				'curr_quest'=>$_SESSION['qid_array'][$_SESSION['q_no']],
																				'qid_array'=>$_SESSION['qid_array'],
																				'qid_ans'=>$_SESSION['qid_ans']
																			 )
														)
										 ));
				
				}catch(MongoException $e)
				{
					die('Error:'.$e->getMessage());
				}
		}
		if($_SERVER['REQUEST_METHOD'] == 'POST')
		{	
			//Timer Logic

			$startDate = time();
			$secondsDiff = $_SESSION['endDate'] - $startDate;
			$remainingDay     = floor($secondsDiff/60/60/24);
			$remainingHour    = floor(($secondsDiff-($remainingDay*60*60*24))/60/60);
			$_SESSION['remainingMinutes'] = floor(($secondsDiff-($remainingDay*60*60*24)-($remainingHour*60*60))/60);
			$_SESSION['remainingSeconds'] = floor(($secondsDiff-($remainingDay*60*60*24)-($remainingHour*60*60))-($_SESSION['remainingMinutes']*60));
			
			
			
			
			echo "inside request method";
			//increment/decrement counter question counter
			if(isset($_POST['prev']))
			{
				
				//Storing the select ans in an array
				if(isset($_POST['op']))
					$selected_radio = $_POST['op'];
				else
					$selected_radio = 'none';
				
				$qid_ans[$_SESSION['q_no']] = $selected_radio;
				
				$_SESSION['qid_ans'] = $qid_ans;
				
				storeAndSaveDataInDatabase();
				
				//Redirecting to previous question
				$_SESSION['q_no'] = $_SESSION['q_no'] - 1;
				
				echo "Prev Pressed";
			}	
			if(isset($_POST['next']))
			{
				//Storing the select ans in an array
				if(isset($_POST['op']))
					$selected_radio = $_POST['op'];
				else
					$selected_radio = 'none';
				
				$qid_ans[$_SESSION['q_no']] = $selected_radio;
		
				$_SESSION['qid_ans'] = $qid_ans;
				storeAndSaveDataInDatabase();
					
				//Redirecting to next question
				$_SESSION['q_no'] = $_SESSION['q_no'] +1;
				echo "Next Pressed";
		
			}
			
			if(isset($_POST['first']))
			{

				//Storing the select ans in an array
				if(isset($_POST['op']))
					$selected_radio = $_POST['op'];
				else
					$selected_radio = 'none';
				
				$qid_ans[$_SESSION['q_no']] = $selected_radio;
				$_SESSION['qid_ans'] = $qid_ans;
				storeAndSaveDataInDatabase();
				
				//Redirecting to first question
				$_SESSION['q_no'] = 1;
				echo "First Pressed";
			}
			
			if(isset($_POST['last']))
			{
				
				//Storing the select ans in an array
				if(isset($_POST['op']))
					$selected_radio = $_POST['op'];
				else
					$selected_radio = 'none';
				
				$qid_ans[$_SESSION['q_no']] = $selected_radio;
				$_SESSION['qid_ans'] = $qid_ans;
				storeAndSaveDataInDatabase();
				
				//Redirecting to last question
				$_SESSION['q_no'] = 30;
				echo "Last Pressed";
			}
			
			if(isset($_POST['submit']))
			{
				header('Location:res.php');
				/*$user_ans = $db->user->findOne(array("prn"=>$_SESSION['prn']),array("_id"=>0,"current_test.qid_ans"=>1));
				$user_ques = $db->user->findOne(array("prn"=>$_SESSION['prn']),array("_id"=>0,"current_test.qid_array"=>1));
				//var_dump($user_ans);
				echo "Submit Pressed";
				$count = 0;
				for($i=1;$i<=30;$i++)
				{
					//Extract from current_test document and match with ori database document
					$ori_ans = $db->$collection->findOne(array("qid"=>$user_ques['current_test']['qid_array'][$i]),array("_id"=>0,"ans"=>1));
					
					echo $user_ans['current_test']['qid_ans'][$i];
						echo "   =  ".$ori_ans['ans']."<br>";
					if($user_ans['current_test']['qid_ans'][$i] == $ori_ans['ans'])
					{	
						echo "Inside Count";
						$count=$count+1;
					}
					
					echo "\n\nCorrect Ans: ".$count;
				}
				echo "\n\nCorrect Ans: ".$count;*/
				
			}
			
		}
		
		$qid_array = $_SESSION['qid_array'];
		
		$qid = $qid_array[$_SESSION['q_no']];
		
		$curr_quest = $db->$collection->findOne(array("qid"=>$qid));
	
		//When we display the questions and the server fails
		//We need to backup the 'qid_array' 'qid_ans' 'current_question' and need to reload the radio buttons on 
		//already answered questions
?>  
  
<form name="myForm" id="myForm" target="" action="" method="POST">
      <div id="wrp">
      <div class="inr">
    <div class="inr"> 
          <!-- header -->
          <div id="headar">
        <div class="q-lft-u">
<div>Questions <span id="question_inc" style="color:#F00; font-weight:600;"><?php echo $_SESSION['q_no'];?></span> of 30</div>
                          </div>
      </div>
        </div>
  </div>
      <!-- nav --> 
      
      <!-- content -->
      <div class="inr">
      <!--  <div id="inr-content">-->
      <div class="inr-content" style="border:solid 1px #ccc;">

            <div class="admin">
      <div id="question">
      <div class="q-lft">
      <div class="q-lft-n">
            <div id="container">
      <div style="float:left; width:932px; margin-bottom:50px">
    <div class="question_dv" qid="2735" qno="1" style=" ">
   
          
	 <div class="q_dv">
        <table>
              <tbody><tr>
            <td align="left" valign="top"><p><?php echo "Q".$_SESSION['q_no'].":";  ?></p></td>
            <td align="left" valign="top"><p>




</p><p><?php echo " ".$curr_quest['quest'] ?></p>

<p></p></td>
          </tr>
            </tbody></table>
      </div>
      
          <div class="ans_dv">
                <table width="600px" border="0" cellspacing="0" cellpadding="0">
              <tbody><tr>
            <td width="4%" valign="top"><input type="radio" name="op" qno="1" id="answec1_1" value="op1" <?php if($qid_ans[$_SESSION['q_no']]=='op1') echo 'checked'; ?>></td>
            <td width="96%" valign="top"><p style="width:450px; margin:0px; padding:0px 0px 20px 0px; font:normal 13px Ebrima, Arial, Helvetica, sans-serif;">
            <span style="color:#00F; font-size:14px;  font-family:Embrima;">A) </span><?php echo $curr_quest['op1']; ?> </p></td>
          </tr>
            </tbody></table>
                <table width="600px" border="0" cellspacing="0" cellpadding="0">
              <tbody><tr>
            <td width="4%" valign="top"><input type="radio" name="op" qno="1" id="answec1_2" value="op2" <?php if($qid_ans[$_SESSION['q_no']]=='op2') echo 'checked'; ?>></td>
            <td width="96%" valign="top"><p style="width:450px; margin:0px; padding:0px 0px 20px 0px; font:normal 13px Ebrima, Arial, Helvetica, sans-serif;">
            <span style="color:#00F; font-size:14px;  font-family:Embrima;">B) </span><?php echo $curr_quest['op2']; ?> </p></td>
          </tr>
            </tbody></table>
                <table width="600px" border="0" cellspacing="0" cellpadding="0">
              <tbody><tr>
            <td width="4%" valign="top"><input type="radio" name="op" qno="1" id="answec1_3" value="op3" <?php if($qid_ans[$_SESSION['q_no']]=='op3') echo 'checked'; ?>></td>
            <td width="96%" valign="top"><p style="width:450px; margin:0px; padding:0px 0px 20px 0px; font:normal 13px Ebrima, Arial, Helvetica, sans-serif;">
            <span style="color:#00F; font-size:14px;  font-family:Embrima;">C) </span><?php echo $curr_quest['op3']; ?>  </p></td>
          </tr>
            </tbody></table>
                <table width="600px" border="0" cellspacing="0" cellpadding="0">
              <tbody><tr>
            <td width="4%" valign="top"><input type="radio" name="op" qno="1" id="answec1_4" value="op4" <?php if($qid_ans[$_SESSION['q_no']]=='op4') echo 'checked'; ?>></td>
            <td width="96%" valign="top"><p style="width:450px; margin:0px; padding:0px 0px 20px 0px; font:normal 13px Ebrima, Arial, Helvetica, sans-serif;">
            <span style="color:#00F; font-size:14px;  font-family:Embrima;">D) </span><?php echo $curr_quest['op4']; ?> </p></td>
          </tr>
            </tbody></table>
            
			<form class ="question" method="POST" action="<?php $_SERVER['PHP_SELF']; ?>">
				<div class="pagination" style="width:100%;">
					<ul>
		
		
			<?php   if($_SESSION['q_no'] != 1)
			{
                echo '<button name = "first" class="button">First</button>';
					
				echo '<button name = "prev" class="button">Previous</button>';
			}?>
					
			<?php   if($_SESSION['q_no'] != 30)
			{
				echo '<button name = "next" class="button">Next	</button>';
                       
				echo '<button name = "last" class="button">Last	</button>';
            }?> 
		
             <div style="position:fixed;left:1200px;top:550px;">       
			<button name = "submit" class="button">Submit</button>
             </div>

			 
					</ul>
                </div>
</form>		
				
<div class="tableHover">
<div class="listOfQuestions">
<a href="#">List of Questions</a>				

<div >
				 
<table class="tg">
  <tr>
    <th class="tg-ql64"><a style="color:rgb(210,210,210)" href="#">1</a></th>
    <th class="tg-ql64"><a href="#">2</a></th>
    <th class="tg-ql64"><a href="#">3</a></th>
    <th class="tg-ql64"><a href="#">4</a></th>
    <th class="tg-78dq"><a href="#">5</a></th>
  </tr>
  <tr>
    <td class="tg-ql64"><a href="#">6</a></td>
    <td class="tg-94g7"><a href="#">7</a></td>
    <td class="tg-ql64"><a href="#">8</a></td>
    <td class="tg-94g7"><a href="#">9</a></td>
    <td class="tg-78dq"><a href="#">10</a></td>
  </tr>
  <tr>
    <td class="tg-ql64"><a href="#">11</a></td>
    <td class="tg-94g7"><a href="#">12</a></td>
    <td class="tg-ql64"><a href="#">13</a></td>
    <td class="tg-94g7"><a href="#">14</a></td>
    <td class="tg-78dq"><a href="#">15</a></td>
  </tr>
  <tr>
    <td class="tg-ql64"><a href="#">16</a></td>
    <td class="tg-94g7"><a href="#">17</a></td>
    <td class="tg-ql64"><a href="#">18</a></td>
    <td class="tg-94g7"><a href="#">19</a></td>
    <td class="tg-78dq"><a href="#">20</a></td>
  </tr>
  <tr>
    <td class="tg-ql64"><a href="#">21</a></td>
    <td class="tg-94g7"><a href="#">22</a></td>
    <td class="tg-ql64"><a href="#">23</a></td>
    <td class="tg-94g7"><a href="#">24</a></td>
    <td class="tg-78dq"><a href="#">25</a></td>
  </tr>
  <tr>
    <td class="tg-ql64"><a href="#">26</a></td>
    <td class="tg-94g7"><a href="#">27</a></td>
    <td class="tg-ql64"><a href="#">28</a></td>
    <td class="tg-94g7"><a href="#">29</a></td>
    <td class="tg-78dq"><a href="#">30</a></td>
  </tr>
  </div>
</table> 
			
</div>
</div>
      </div>
      </div>

    </div>
</div>
 </form>
<!--######################################################-->
<!-- Clock Logic -->


<div style="position:fixed;left:1200px;top:50px;">       
			<img src="1_files/clock.png">
</div>
<div style="position:fixed;left:1270px;top:42px;"><font color = "#A80000" size = "5"><p id="remain"></p></font></div>

<script type="text/javascript">
  var days = <?php echo $remainingDay; ?>  
  var hours = <?php echo $remainingHour; ?>  
  var minutes = <?php echo $_SESSION['remainingMinutes']; ?>  
  var seconds = <?php echo $_SESSION['remainingSeconds']; ?> 
function setCountDown ()
{
  seconds--;
  if (seconds < 0){
      minutes--;
      seconds = 59
  }
  if (minutes < 0){
      hours--;
      minutes = 59
  }
 // if (hours < 0){
 //     days--;
 //     hours = 23
 // }
  document.getElementById("remain").innerHTML = minutes+" : "+seconds+"";
  SD=window.setTimeout( "setCountDown()", 1000 );
  if (minutes == '00' && seconds == '00') { seconds = "00"; window.clearTimeout(SD);
   		window.alert("Time is up. Press OK to continue."); // change timeout message as required
  		window.location = "res.php" // Add your redirect url
 	} 

}
</script>


 



