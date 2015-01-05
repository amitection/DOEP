<!DOCTYPE html>
<html>

<head>

  <meta charset="UTF-8">

  <title>Login</title>

   <link rel="stylesheet" href="css/style.css" media="screen" type="text/css" />
    <style type="text/css">


    </style>
</head>

<body>

  <p>&nbsp;</p>
 
  <div class="login-card">
  <h2 align="justify">Registration Successful</h2>
    <h1 align="justify">Login</h1>
    <div align="justify"><br>
    </div>
    <form method="POST" action="checkLogin.php">
      <div align="justify">
        <input type="text" name="prn" placeholder="PRN">
        <input type="password" name="pass" placeholder="Password">
        <input type="submit" name="login" class="login login-submit" value="login">
      </div>
    </form>
	

  <div class="login-help">
    <div align="justify"><a href="/DOEP/registration/registration.php">Register</a> • <a href="#">Forgot Password</a>
    </div>
  </div>
</div>

</body>

</html>