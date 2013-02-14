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
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
	<link rel="stylesheet" type="text/css" href="css/style.css">
        <script type="text/javascript">
            var formError = Array();
            formError[false, false, false];
            $(document).ready(function(){
                $('#button').click(function(){
                    if($('#username').val() == ""){
                        if(!formError[0]){
                            $("#username").after("<span><img src='Images/red-x.gif' alt='X'/></span>");
                        }
                        formError[0] = true;
                        return false;
                    }
                    if($("#password").val() != $("#passwordAgain").val() || $("#password").val() == "" || $("#passwordAgain").val() == ""){
                        if(!formError[1]){
                            $("#password").after("<span><img src='Images/red-x.gif' alt='X'/></span>");
                            $("#passwordAgain").after("<span><img src='Images/red-x.gif' alt='X'/><div style='color:red'>Passwords must match</div></span>");
                        }
                        formError[1] = true;
                        return false;
                    }
                    if($('#email').val() == ""){
                        if(!formError[2]){
                            $("#email").after("<span><img src='Images/red-x.gif' alt='X'/></span>");
                        }
                        formError[2] = true;
                        return false;
                    }
                });
            }); 
        </script>
</head>
<body>
<?php
$reg = new RegForm;
$securimage = new Securimage();
$catpchaError = null;
$username = $password = $passwordAgain = $emial = $fname = $lname = null;


if (isset($_POST['username']) && isset($_POST['password']) && isset($_POST['passwordAgain'])
        && isset($_POST['firstName'])  && isset($_POST['lastName'])
        && isset($_POST['email']) )	
{
    $username = $_POST['username'];
    $password = $_POST['password'];
    $passwordAgain = $_POST['passwordAgain'];
    $emial = $_POST['email'];
    $fname = $_POST['firstName'];
    $lname = $_POST['lastName'];
    
    if($securimage->check($_POST['captcha_code']) == true){
        $reg->grabFromSubmit($username, $password, $passwordAgain, $emial, $fname, $lname);
        $reg->printData();
    }
    else{
        $catpchaError = "The code did not match. Try Again";
    }
}


?>
    
<form class="regForm" name="RegForm" method="post" action="">
	
	<p class="field">
		<input type="text" id="username" name="username" placeholder="Username" value="<?php checkIsset($username) ?>" />
	</p>
	<p class="field">
		<input type="password" id="password" name="password" placeholder="Password" value="<?php checkIsset($password) ?>" />
	</p>
	<p class="field">
		<input type="password" id="passwordAgain" name="passwordAgain" placeholder="Password Again" value="<?php checkIsset($passwordAgain) ?>" />
	</p>
	<p class="field">
		<input type="text" id="email" name="email" placeholder="Email Address" value="<?php checkIsset($emial) ?>" />
	</p>
	<p class="field">
		<input type="text" name="firstName" placeholder="First Name" value="<?php checkIsset($fname) ?>"/>
	</p>
	<p class="field">
		<input type="text" name="lastName" placeholder="Last Name" value="<?php checkIsset($lname) ?>" />
	</p>
        <br />
        <table>
            <tr>
                <td>
                    <img id="captcha" style="border: 1px solid #2F343B" src="secureimage/securimage_show.php" alt="CAPTCHA Image" />
                </td>
                <td>
                    <a href="#" onclick="document.getElementById('captcha').src = 'secureimage/securimage_show.php';"><img src="secureimage/Images/Refresh Icon.jpg" alt="Refresh Image"/></a>
                </td>
            </tr>
            <tr>
                <td>
                    Enter Code: <input type="text" name="captcha_code" size="10" maxlength="6" />
                </td>
            </tr>
            <tr>
                <td colspan="2" style="color:red">
                    <?php checkIsset($catpchaError) ?>
                </td>
            </tr>
        </table>
        <p class="sumbit">
            <input type="submit" name="button" id="button" value="Submit" />
	</p>
</form>
</body>

</html>

<?php
    function checkIsset($str){
        if (isset($str)){
            echo $str;
        }
        else{
            return "";
        }
    }
?>