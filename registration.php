<?php
// The Input Data of the registration Form
// This class will encrpyt, perform validity checks
// and upload the data to the Database if everything
// checks out. Eventually it will be offloaded to it's own
// file and placed within a restricted folder.
class RegForm
{
	var $userName = "";
	var $passowrd = "";
	var $realName = "";
	var $email = "";
	var $validCaptcha = false;
	var $isError = false;
	
	function grabFromSubmit($uName, $pWord, $repPWord, $email, $fName, $lName)
	{
		$this->userName = $uName;
		if($pWord == $repPWord)
		{
			$this->password = hash('sha256', $pWord);
		}
		$this->email = $email;
		$this->realName = $fName . $lName;
	} 
	
	function printData()
	{
		echo $this->userName . $this->realName;
	}
	
};
?>
<html>
<head>
	<title> Discourse Analysis - Registration PAge</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>

<?php
$reg = new RegForm;

if (isset($_POST['username']) && isset($_POST['password'])
	&& isset($_POST['firstName'])  && isset($_POST['lastName'])
	&& isset($_POST['email']) )	
{
	$reg->grabFromSubmit($_POST['username'], $_POST['password'],
				$_POST['passwordAgain'], $_POST['email'], 
				$_POST['firstName'], $_POST['lastName']);
				
	$reg->printData();
}
?>
<form class="RegForm" name="RegForm" method="post" action="">
	
	<p class="field">
		<input type="text" name="username" placeholder="Username" />
	</p>
	<p class="field">
		<input type="password" name="password" placeholder="Password" />
	</p>
	<p class="field">
		<input type="password" name="passwordAgain" placeholder="Password Again" / >
	</p>
	<p class="field">
		<input type="text" name="email" placeholder="Email Address" / >
	</p>
	<p class="field">
		<input type="text" name="firstName" placeholder="First Name" / >
	</p>
	<p class="field">
		<input type="text" name="lastName" placeholder="Last Name" / >
	</p>
	<p class="sumbit">
		<input type="submit" name="button" id="butto" value="Submit" / >
	</p>
</form>
</body>

</html>