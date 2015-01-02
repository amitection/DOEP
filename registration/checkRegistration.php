<?php
//Check if Registration information is filled out correctly
 
						
						$prn = $_POST['prn'];
						
						if (!preg_match("/[0-9][A-Z]/",$prn) or  strlen($prn)!=9)
							echo "Please Input The Correct PRN no.";

?>