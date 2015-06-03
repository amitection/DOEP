<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="EN" lang="EN" dir="ltr">
<head profile="http://gmpg.org/xfn/11">
<title>DOEP Homepage</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta http-equiv="imagetoolbar" content="no" />
<link rel="stylesheet" href="styles/layout.css" type="text/css" />
<link href="../css/navigation.css" rel="stylesheet" type="text/css" />
<!-- Homepage Specific Elements -->
<script type="text/javascript" src="scripts/jquery-1.4.1.min.js"></script>
<script type="text/javascript" src="scripts/jquery-ui-1.7.2.custom.min.js"></script>
<script type="text/javascript" src="scripts/jquery.tabs.setup.js"></script>
<!-- End Homepage Specific Elements -->
</head>

<!-- ####################################################################################################### -->

<?php
	include_once "quotes.php";
	session_start();
	
	
	//***************************************************************
	//Very IMP: Must Be Included on Every Page.
	//To check if the uses back button after logout.
	if(empty($_SESSION['prn'])) {
		header("Location: logout.php");
	}
	if($_SESSION['dept'] != 'cse') {
		header("Location: logout.php");
	}
	//***************************************************************
	
	
	try{
	
	//creating a Connection to MongoDB
	$con = new MongoClient('localhost');
			
	//Selecting a Database
	$db = $con->doep;
	
	//Selecting A Collection
	$collection = "user";
	
	//For Querying Out The Name
	$name = $db->$collection->findOne(array('prn'=>$_SESSION['prn']),array("personal_info.fname"=>1,"_id"=>0));
	$fname = $name['personal_info']['fname'];
		
	}catch(MongoConnectionException $e)
	{
		die('Error Connecting to Database Server');
	}catch(MongoException $e)
	{
		die('Error:'.$e->getMessage());
	}
	
	
	
?>
<!-- ####################################################################################################### -->


<body id="top">
<div class="wrapper row1">
  <div id="header" class="clear">
    <div class="fl_left">
      <h1><a href="index.php">ONLINE MOCK TEST</a></h1>
      <p>A initiative by A.C.E.S</p>
    </div>
    <br>
    <div class="fl_right">
        <a href="logout.php">Logout <img src="images/logout.png" width="16" height="17" /></div></a>
  </div>
</div>
<!-- ####################################################################################################### -->
<div class="wrapper row2">
  <div class="rnd">
    <!-- ###### -->
    <div id="topnav">
      <ul>
        <li class="active">Welcome <a href="userProfile.php"><?php echo $fname;?></a></li>
      </ul>
    </div>
    <!-- ###### -->
  </div>
</div>
<!-- ####################################################################################################### -->

<?php
//Getting Random Images For Quotes
$path = 'images/quotes/';
$imgList = getImagesFromDir($path);
$img = getRandomFromArray($imgList);
?>
<div class="wrapper">
  <div id="gallery" class="clear">
    <!-- ###### -->
    <div id="featured_content">
      <div class="featured_box" id="fc1"><img src="<?php echo $path . $img ?>" alt="" />
        </div>
    </div>
    <!-- ###### -->
  </div>
</div>
<!-- ####################################################################################################### -->
<div class="wrapper row3">
  <div class="rnd">
    <div id="container" class="clear">
      <!-- ####################################################################################################### -->
      <div id="homepage" class="clear">
        <!-- ###### -->
        <div id="left_column">
          <h2>Available Tests</h2>
          <div class="imgholder"><a href="index.php"><img src="images/tests.png" alt="" /></a></div>
          <h2>Check Your Records</h2>
          <div class="imgholder"><a href="Records.php"><img src="images/records.png" alt="" /></a></div>
          <h2>Overall Ranking</h2>
          <div class="imgholder"><a href="Overall_Ranking.php"><img src="images/ranking.png" alt="" /></a></div>
          <h2>Alumni</h2>
          <div class="imgholder"><a href="Allumni.html"><img src="images/demo/220x80.gif" alt="" /></a></div>
        </div>
        <!-- ###### -->
        <div id="latestnews">
          <h2>Latest News &amp; Events</h2>
          <ul>
            <li class="clear">
              <div class="imgl"><img src="images/demo/mit.png" alt="" /></div>
              <div class="latestnews">
                <p><a href="#">Microprocessor Interfacing Techniques.</a></p>
                <p>Click here for :<br> <a href="#" onclick="window.open('/DOEP/test/sehh5ZtzXe6.c/ph1.php','_blank');"> Phase 1</a>
                	<br><a href="#" onclick="window.open('/DOEP/test/sehh5ZtzXe6.c/ph1.php','_blank');">Phase 2</a></p>
                <blockquote>
                  <blockquote>
                    <blockquote>&nbsp;</blockquote>
                  </blockquote>
                </blockquote>
              </div>
            </li>
            <li class="clear">
              <div class="imgl"><img src="images/demo/oomp.png" alt="" /></div>
              <div class="latestnews">
                <p><a href="#">Sentumquisque morbi dui congue.</a></p>
                <p>You can use and modify the template for both personal and commercial use. You must keep all copyright information and credit links in the template and associated files.</p>
              </div>
            </li>
            <li class="last clear">
              <div class="imgl"><img src="images/demo/imgl.gif" alt="" /></div>
              <div class="latestnews">
                <p><a href="#">Sentumquisque morbi dui congue.</a></p>
                <p> For more CSS templates visit <a href="http://www.os-templates.com/">Free Website Templates</a>. Attincidunt vel nam a maurisus lacinia consectetus magnisl sed ac morbi. Inmaurisus habitur pretium eu et ac vest penatibus id lacus parturpis.</p>
              </div>
            </li>
          </ul>
        </div>
        <!-- ###### -->
        <div id="right_column">
          <div class="holder">
            <h2>Virtual Tour</h2>
            <a href="#"><img src="images/demo/video.gif" alt="" height="237" /></a> </div>
          <div class="holder">
            <h2>Quick Information</h2>
            <div class="apply"><a href="#"><img src="images/demo/100x100.gif" alt="" /> <strong>Make An Application</strong></a></div>
            <div class="apply"><a href="#"><img src="images/demo/100x100.gif" alt="" /> <strong>Order A Prospectus</strong></a></div>
          </div>
        </div>
        <!-- ###### -->
      </div>
      <!-- ####################################################################################################### --><!-- ####################################################################################################### --><!-- ####################################################################################################### -->
    </div>
  </div>
</div>
<!-- ####################################################################################################### -->
<div class="wrapper row4">
  <div class="rnd">
    <div id="footer" class="clear">
      <!-- ####################################################################################################### -->
      <div class="fl_left clear">
        <div class="fl_left center"><img src="images/aces.png" alt="ACES"/><br />
        <font size="3"><a href="www.acesdyp.com">www.acesdyp.com</a></font></div>
      </div>
      <div class="fl_right">
        <div id="social" class="clear">
          <p>Connect with us on          </p>
          <ul>
            <li><div style="height:40px; width:40px;margin-left:10px;"><img src="images/facebook.png" height="40" width="40" alt="Facebook"></div></li>
 			<li><div style="height:40px; width:40px; margin-left:40px;"><img src="images/google_plus.png" height="40" width="40" alt="Google Plus"></div></li>
		  </ul>
          <p>&nbsp;</p>
          <p>&nbsp;</p>
          <p>Facebook &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;Google Plus</p>
        </div>
        <div id="newsletter">
          <form action="#" method="post">
            <fieldset>
              <legend>Incase of any 'Issues' or 'Bugs 'please contact us on: </legend>
              <legend>	  <a href="#">aces.dypiet@gmail.com</a></legend>
            </fieldset>
          </form>
          <p>Developed By : <a href="https://in.linkedin.com/in/amitection">Amit Prasad </a>&amp; <a href="https://in.linkedin.com/pub/ravi-yadav/96/a07/112">Ravi Yadav</a></p>
        </div>
      </div>
      <!-- ####################################################################################################### -->
    </div>
  </div>
</div>
<!-- ####################################################################################################### -->
<div class="wrapper">
  <div id="copyright" class="clear">
    <p class="fl_left">Copyright &copy; 2015 Licensed Under <a href="http://opensource.org/licenses/MIT">MIT</a>
    
	<!--"http://www.os-templates.com/"-->
  </div>
</div>
</body>
</html>