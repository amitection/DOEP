<?php
//Check if Registration information is filled out correctly
 
						$fname = $_POST['fname'];
						if (!preg_match("/^[a-zA-Z ]*$/",$fname))
							echo "Please input the correct name";

?>