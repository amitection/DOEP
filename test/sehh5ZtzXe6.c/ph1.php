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
.tg td{font-family:Arial, sans-serif;font-size:14px;padding:0px 0px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;}
.tg th{font-family:Arial, sans-serif;font-size:14px;font-weight:normal;padding:0px 0px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;}
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
		
		//##########################Timer Logic#####################################
		
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
		
		//##############################################################################
		
		//Setting Marking State of Question initially False
		for($k=1;$k<=30;$k++)
		{
				$qid_mark[$k] = false;
		}
			$_SESSION['qid_mark'] = $qid_mark;
		
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
			echo "inside request method";
			
			//######################Timer Logic#############################
			
			$startDate = time();
			$secondsDiff = $_SESSION['endDate'] - $startDate;
			$remainingDay     = floor($secondsDiff/60/60/24);
			$remainingHour    = floor(($secondsDiff-($remainingDay*60*60*24))/60/60);
			$_SESSION['remainingMinutes'] = floor(($secondsDiff-($remainingDay*60*60*24)-($remainingHour*60*60))/60);
			$_SESSION['remainingSeconds'] = floor(($secondsDiff-($remainingDay*60*60*24)-($remainingHour*60*60))-($_SESSION['remainingMinutes']*60));
			
			//################################################################
			
			
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
			
			if(isset($_POST['mark']))
			{
				//Marking and Unmarking a Question
				$qid_mark = $_SESSION['qid_mark'];
				if($qid_mark[$_SESSION['q_no']] == false)
				{
					$qid_mark[$_SESSION['q_no']] = true;
					$_SESSION['qid_mark'] = $qid_mark;
				}
				else
				{
					$qid_mark[$_SESSION['q_no']] = false;
					$_SESSION['qid_mark'] = $qid_mark;
				}
				
				
			}
			
			if(isset($_POST['q_button']))
			{
				//CODE FOR DIRECTLY JUMPING TO QUESTIONS
				
				//Storing the select ans in an array
				if(isset($_POST['op']))
					$selected_radio = $_POST['op'];
				else
					$selected_radio = 'none';
				
				$qid_ans[$_SESSION['q_no']] = $selected_radio;
		
				$_SESSION['qid_ans'] = $qid_ans;
				storeAndSaveDataInDatabase();
					
				//Redirecting to next question
				
				echo "Question Button Pressed";
				
				switch($_POST['q_button']){
					case '1':
						$_SESSION['q_no'] = '1';
						break;
						
					case '2':
						$_SESSION['q_no'] = '2';
						break;
						
					case '3':
						$_SESSION['q_no'] = '3';
						break;
						
					case '4':
						$_SESSION['q_no'] = '4';
						break;
					
					case '5':
						$_SESSION['q_no'] = '5';
						break;
						
					case '6':
						$_SESSION['q_no'] = '6';
						break;
						
					case '7':
						$_SESSION['q_no'] = '7';
						break;
						
					case '8':
						$_SESSION['q_no'] = '8';
						break;
						
					case '9':
						$_SESSION['q_no'] = '9';
						break;
						
					case '10':
						$_SESSION['q_no'] = '10';
						break;
						
					case '11':
						$_SESSION['q_no'] = '11';
						break;
						
					case '12':
						$_SESSION['q_no'] = '12';
						break;
						
					case '13':
						$_SESSION['q_no'] = '13';
						break;
						
					case '14':
						$_SESSION['q_no'] = '14';
						break;
						
					case '15':
						$_SESSION['q_no'] = '15';
						break;
						
					case '16':
						$_SESSION['q_no'] = '16';
						break;
						
					case '17':
						$_SESSION['q_no'] = '17';
						break;
						
					case '18':
						$_SESSION['q_no'] = '18';
						break;
						
					case '19':
						$_SESSION['q_no'] = '19';
						break;
						
					case '20':
						$_SESSION['q_no'] = '20';
						break;
						
					case '21':
						$_SESSION['q_no'] = '21';
						break;
						
					case '22':
						$_SESSION['q_no'] = '22';
						break;
						
					case '23':
						$_SESSION['q_no'] = '23';
						break;
						
					case '24':
						$_SESSION['q_no'] = '24';
						break;
						
					case '25':
						$_SESSION['q_no'] = '25';
						break;
						
					case '26':
						$_SESSION['q_no'] = '26';
						break;
						
					case '27':
						$_SESSION['q_no'] = '27';
						break;
						
					case '28':
						$_SESSION['q_no'] = '28';
						break;
						
					case '29':
						$_SESSION['q_no'] = '29';
						break;
						
					case '30':
						$_SESSION['q_no'] = '30';
						break;
						
				}
				
					
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
			<div>Questions <span id="question_inc" style="color:#F00; font-weight:600;"><?php echo $_SESSION['q_no'];
																							$qid_mark = $_SESSION['qid_mark'];
																							if($qid_mark[$_SESSION['q_no']])
																								echo "*";
																						?></span> of 30</div>
                          
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
			 
			 <div style="position:fixed;left:1200px;top:500px;">       
				<?php 	$qid_mark = $_SESSION['qid_mark'];
						if($qid_mark[$_SESSION['q_no']])
							echo '<button name = "mark" class="unmark_button">Unmark</button>'; 
						else
							echo '<button name = "mark" class="mark_button">Mark</button>';
				?>
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
    <th class="tg-ql64"><button name = "q_button" value = "1" class="jump_button">1</button></th>
    <th class="tg-ql64"><button name = "q_button" value = "2" class="jump_button">2</button></th>
    <th class="tg-ql64"><button name = "q_button" value = "3" class="jump_button">3</button></th>
    <th class="tg-ql64"><button name = "q_button" value = "4" class="jump_button">4</button></th>
    <th class="tg-78dq"><button name = "q_button" value = "5" class="jump_button">5</button></th>
  </tr>
  <tr>
    <td class="tg-ql64"><button name = "q_button" value = "6" class="jump_button">6</button></td>
    <td class="tg-94g7"><button name = "q_button" value = "7" class="jump_button">7</button></td>
    <td class="tg-ql64"><button name = "q_button" value = "8" class="jump_button">8</button></td>
    <td class="tg-94g7"><button name = "q_button" value = "9" class="jump_button">9</button></td>
    <td class="tg-78dq"><button name = "q_button" value = "10" class="jump_button">10</button></td>
  </tr>
  <tr>
    <td class="tg-ql64"><button name = "q_button" value = "11" class="jump_button">11</button></td>
    <td class="tg-94g7"><button name = "q_button" value = "12" class="jump_button">12</button></td>
    <td class="tg-ql64"><button name = "q_button" value = "13" class="jump_button">13</button></td>
    <td class="tg-94g7"><button name = "q_button" value = "14" class="jump_button">14</button></td>
    <td class="tg-78dq"><button name = "q_button" value = "15" class="jump_button">15</button></td>
  </tr>
  <tr>
    <td class="tg-ql64"><button name = "q_button" value = "16" class="jump_button">16</button></td>
    <td class="tg-94g7"><button name = "q_button" value = "17" class="jump_button">17</button></td>
    <td class="tg-ql64"><button name = "q_button" value = "18" class="jump_button">18</button></td>
    <td class="tg-94g7"><button name = "q_button" value = "19" class="jump_button">19</button></td>
    <td class="tg-78dq"><button name = "q_button" value = "20" class="jump_button">20</button></td>
  </tr>
  <tr>
    <td class="tg-ql64"><button name = "q_button" value = "21" class="jump_button">21</button></td>
    <td class="tg-94g7"><button name = "q_button" value = "22" class="jump_button">22</button></td>
    <td class="tg-ql64"><button name = "q_button" value = "23" class="jump_button">23</button></td>
    <td class="tg-94g7"><button name = "q_button" value = "24" class="jump_button">24</button></td>
    <td class="tg-78dq"><button name = "q_button" value = "25" class="jump_button">25</button></td>
  </tr>
  <tr>
    <td class="tg-ql64"><button name = "q_button" value = "26" class="jump_button">26</button></td>
    <td class="tg-94g7"><button name = "q_button" value = "27" class="jump_button">27</button></td>
    <td class="tg-ql64"><button name = "q_button" value = "28" class="jump_button">28</button></td>
    <td class="tg-94g7"><button name = "q_button" value = "29" class="jump_button">29</button></td>
    <td class="tg-78dq"><button name = "q_button" value = "30" class="jump_button">30</button></td>
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


 



