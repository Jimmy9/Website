<?php
 
$exists = "";
$formerrors = ["User_Nameerror" => false, "Passworderror" => false];

extract($_POST);

$inputlist = array( "User_Name" => "inputusername", "Password" => "inputpassword");

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
		
		if(isset($submit)){
		if($this->userName == ""){
			$formerrors["User_Nameerror"]=true;
			$this->isError = true;
		}
		if($this->password == ""){
			$formerrors["Passworderror"]=true;
			$this->isError = true;
		}
		
		///query function
		if(!$this->isError){
			$query = "SELECT username, password
					FROM usersinfo
					WHERE username = '" . $this->userName . "' AND password = '" . $this->password . "'; ";
			if( !( $database = mysql_connect("localhost", "root", "")))
				die( "Couldn't connect to database" );
			
			if( !( $result = mysql_query( $query, $database ))){
				print( "Couldn't execute query <br />" );
				die( mysql_error() );
			}
			
			$holder = 1;
			while($display = mysql_fetch_assoc($result)){
				if($display['username'] == $this->userName){
					session_start();
					$_SESSION['user_id'] = "$this->userName";
					print("$this->userName Logged In");
					header("Location: index.php");
					$holder = 0;
				}
			}
			if($holder == 1){
				print("Sorry, please try again");
				header("Location: login.php");
			}
			
			mysql_close( $database );
			
				print("</body></html>" );
				die();
			print("
			
			");
			}
		}
	}
	
};
	//
	

?>

<html>
<head>
	<title> Discourse Analysis - Login Page </title>
	<link rel="stylesheet" type="text/css" href="css/style.css" />
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
        <script type="text/javascript">
            formError = false;
            $(document).ready(function(){
                $('#button').click(function(){
                    if($('#username').val() == ""){
                        if(!formError){
                            $('#username').after("<span><img src='Images/red-x.gif' alt='X'/></span>");
                        }
                        formError = true;
                        return false;
                    }
                    if($('#password').val() == ""){
                        if(!formError){
                            $('#password').after("<span><img src='Images/red-x.gif' alt='X'/></span>");
                        }
                        formError = true;
                        return false;
                    }
                });
            });
        </script>
</head>

<body>
<?php
$login = new Login;


if (isset($_POST['username']))
{
	$login->grabFromSubmit($_POST['username'], $_POST["password"]);

	$login->showInformation();
}
	
?>		
<form class="loginForm" name="LoginForm" method="post" action="">
	<p class="field">
		<input type="text" id="username" name="username"  placeholder="Username" />
	</p>
	<p class="field">
		<input type="password" id="password" name="password" placeholder="Password" /> 
	</p>
	<p class="submit">
			<input type="submit" name="button" id="button" value="Submit" />
	</p>
</form>


</body>	


</html>