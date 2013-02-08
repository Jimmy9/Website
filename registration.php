<?php session_start();
// The Input Data of the registration Form
// This class will encrpyt, perform validity checks
// and upload the data to the Database if everything
// checks out. Eventually it will be offloaded to it's own
// file and placed within a restricted folder.

    include_once dirname(__FILE__).'\secureimage\securimage.php';

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
$securimage = new Securimage();


if (isset($_POST['username']) && isset($_POST['password'])
        && isset($_POST['firstName'])  && isset($_POST['lastName'])
        && isset($_POST['email']) )	
{
    if($securimage->check($_POST['captcha_code']) == true){
        $reg->grabFromSubmit($_POST['username'], $_POST['password'],
                                $_POST['passwordAgain'], $_POST['email'], 
                                $_POST['firstName'], $_POST['lastName']);

        $reg->printData();
    }
    else{
        echo("no soup");
    }
}


?>
<form class="regForm" name="RegForm" method="post" action="">
	
	<p class="field">
		<input type="text" id="username" name="username" placeholder="Username" />
	</p>
	<p class="field">
		<input type="password" id="password" name="password" placeholder="Password" />
	</p>
	<p class="field">
		<input type="password" name="passwordAgain" placeholder="Password Again" />
	</p>
	<p class="field">
		<input type="text" id="email" name="email" placeholder="Email Address" />
	</p>
	<p class="field">
		<input type="text" name="firstName" placeholder="First Name" />
	</p>
	<p class="field">
		<input type="text" name="lastName" placeholder="Last Name" />
	</p>
        <br />
        <table>
            <tr>
                <td>
                    <img id="captcha" style="border: 1px solid #2F343B" src="secureimage/securimage_show.php" alt="CAPTCHA Image" />
                </td>
                <td>
                    <a href="#" onclick="document.getElementById('captcha').src = 'secureimage/securimage_show.php';"><img src="secureimage/images/refresh.png" alt="Refresh Image"/></a>
                </td>
            </tr>
            <tr>
                <td>
                    Enter Code: <input type="text" name="captcha_code" size="10" maxlength="6" />
                </td>
            </tr>
        </table>
        <p class="sumbit">
            <input type="submit" name="button" id="button" value="Submit" />
	</p>
</form>
</body>

</html>