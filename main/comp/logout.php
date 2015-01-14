<!DOCTYPE = html>
<?php
session_start();

session_destroy();

header('Location: \DOEP\login-out\after_logout.php');
?>

<!-- SCRIPT to prevent user from pressing back after logout -->
<!--
<SCRIPT LANGUAGE="JavaScript">
function goNewWin() {
window.open("/DOEP/login-out/after_logout.php",'TheNewpop','toolbar=1,location=1,directories=1,status=1,menubar=1,scrollbars=1,resizable=1'); 
self.close()
}
</SCRIPT> 

<BODY onLoad="goNewWin()">
</BODY>-->