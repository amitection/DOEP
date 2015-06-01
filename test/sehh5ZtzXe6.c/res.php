<!-- Display Result on this page-->
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
.inr .inr #headar .logo img {
	text-align: left;
}
</style>
<link href="1_files/res_style.css" rel="stylesheet" type="text/css">
<script type="text/javascript">
    $(function () {
      $(document).bind('contextmenu',function(e){
        e.preventDefault();
       
      });
    });
  </script>


</head>

<body>
<div id="wrp">
  <div class="inr">
    <div class="inr"> 
      <!-- header -->
      <div id="headar">
        <div class="logo"><img src="./1_files/logo.png" alt="image" title=""></div>
		<span style="margin-left: 60px;">
			<script async src="./1_files/adsbygoogle.js"></script>
				<!-- big horizontal72090 -->
				
		</span>	   
    </div>
  </div>
  </div>
	

    <link rel="stylesheet" type="text/css" href="./1_files/style.css">
    
      
      
        <div align="center">
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
	$sub_code = $_SESSION['sub_code'];
	$collection = $sub_code;
	
	$date = $_SESSION['actualStartDate'];
	$time = $_SESSION['actualStartTime'];
	
	}catch(MongoConnectionException $e)
	{
		die('Error Connecting to MongoDB Server');
	}catch(MongoException $e)
	{
		die('Error:'.$e->getMessage());
	}
				
				
				$user_ans = $db->user->findOne(array("prn"=>$_SESSION['prn']),array("_id"=>0,"current_test.qid_ans"=>1));
				$user_ques = $db->user->findOne(array("prn"=>$_SESSION['prn']),array("_id"=>0,"current_test.qid_array"=>1));
				//var_dump($user_ques);
				//echo "Submit Pressed <br>";
				$tot_correct_ans = 0;
				$tot_attempted = 0;
				for($i=1;$i<=30;$i++)
				{
					//Extract from current_test document and match with ori database document
					$ori_ans = $db->$collection->findOne(array("qid"=>$user_ques['current_test']['qid_array'][$i]),array("_id"=>0,"ans"=>1));
					
					//echo $user_ans['current_test']['qid_ans'][$i]; //Printing user ans
					//echo "   =  ".$ori_ans['ans']."<br>";		   //Original Ans
					
					
					if($user_ans['current_test']['qid_ans'][$i] == $ori_ans['ans'])
					{	
						//echo "Inside Count".$count."<br>";
						$tot_correct_ans=$tot_correct_ans+1;
					}
					
					//Total No of Attempted Questions
					if($user_ans['current_test']['qid_ans'][$i] != 'none')
						$tot_attempted +=1;
					
				}
				
				$percentage_obtained = number_format(($tot_correct_ans/30)*100,2);
				//echo "\n\nCorrect Ans: ".$count;
				
				//Storing the result in Users Database using PRN
				
				$result_analysis = array("sub_code"=>$sub_code,"date"=>$date,"time"=>$time,"attempted"=>$tot_attempted,
								"correct answers"=>$tot_correct_ans, "percentage_obtained"=>$percentage_obtained);
				
				//var_dump($db->user->findOne(array("prn"=>$_SESSION['prn'],'test_record.time'=>$time)));
				
				if(!$db->user->findOne(array("prn"=>$_SESSION['prn'],'test_record.time'=>$time)))
				{
				$db->user->update(array("prn"=>$_SESSION['prn']),
									array('$push'=>array('test_record'=>$result_analysis
															    )
														)
										  );
				}
?>
          
  <!--##############################################################Displaying the Result######################################################-->
   
  <table width="300" border="5">
    <caption>
      Result Analysis
    </caption>
    <tr>
      <th scope="row">Date</th>
      <td><?php echo $date;?></td>
    </tr>
	<tr>
      <th scope="row">Time</th>
      <td><?php echo $time;?></td>
    </tr>
    <tr>
      <th scope="row">Subject Code</th>
      <td><?php echo $sub_code;?></td>
    </tr>
    <tr>
      <th scope="row">Attempted</th>
      <td><?php global $tot_attempted; echo $tot_attempted;?></td>
    </tr>
    <tr>
      <th scope="row">Correct</th>
      <td><?php global $tot_correct_ans; echo $tot_correct_ans;?></td>
    </tr>
    <tr>
      <th scope="row">Total Questions</th>
      <td>30</td>
    </tr>
    <tr>
      <th scope="row">% Obtained</th>
      <td><font color="red"><b><?php global $tot_correct_ans; echo $percentage_obtained."%";?></b></font></td>
    </tr>
  </table>
        </div>
