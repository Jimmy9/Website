<html>
<head>
<title> Discourse Analysis - Login Page </title>
<link rel="stylesheet" type="text/css" href="css/style.css" />
</head>

<body>
<?php

//
require('UserModule.php');
require('DatabaseModule.php');
$username = $_POST['username'];
$password= $_POST['password'];
$dbMod = new DatabaseModule();
$connection = $dbMod->connect();
$userMod = new UserModule($connection);
$loggedIn = $userMod->LoginUser($username,$password);
if($loggedIn == true){
	echo "<p> User logged in successfully! </p>";
}else{
	echo "<p>Invalid Username or password</p>";
}


?>	
<form class="loginForm" name="LoginForm" method="post" action="">
<p class="field">
<input type="text" name="username" placeholder="Username" />
</p>
<p class="field">
<input type="password" name="password" placeholder="Password" / >
</p>
<p class="submit">
<input type="submit" name="button" id="button" value="Submit" />
</p>
</form>


</body>


</html>