<?php 

class Login
{
	var $userName = "";
	var $password = "";
	var $isError = false;
	
	function grabFromSubmit($uName, $pWord)
	{
		$this->userName = $uName;
		$this->password = hash('sha256',$pWord);
		return true;
	}
	
};


?>

<html>
<head>
	<title> Discourse Analysis - Login Page </title>
	
	<link rel="stylesheet" type="text/css" href="css/style.css" />
</head>

<body>
<?php
$login = new Login;


if (isset($_POST['username']))
{
	$host = "localhost"; // Host name
	$username = "root"; // Mysql username
	$password = "not telling github my password"; // Mysql password
	$db_name = "discourseanalysis"; // Database name
	$dbLink = new mysqli("$host", "$username", "$password", "$db_name");
	
	$userTable="usersinfo";

	if ($dbLink->connect_errno) {
		printf("Connect failed: %s\n", $dbLink->connect_error);
		exit();
	}
	
	$username = $_POST['username'];
	$password= $_POST['password'];
	//$password = hash('sha256',$password);
	
	$sql = "SELECT username, password FROM $userTable WHERE username = '".$username."' AND password = '" .$password. "';";
	$result=$dbLink->query($sql);
	
	if($result->num_rows > 0)
	{
		print $result->num_rows;
	}
	else 
	{
		echo "Fails";
	}
}
	
?>		
<form class="loginForm" name="LoginForm" method="post" action="">
	<p class="field">
		<input type="text" name="username"  placeholder="Username" />
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