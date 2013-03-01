<?php


require('./lib/PasswordHash.php');

/**
 *
 *
 **/
class RegistrationModule
{
	private $dbConnect;
	private $username = "";
	private $password = "";
	private $email = "";
	private $realName = "";
	
	/**
	 *
	 **/
	function RegistrationModule($dbConnect)
	{
		$this->dbConnect = $dbConnect;
	}
	
	/**
	 *
	 **/
	function InputName($firstName, $lastName)
	{
		if (!empty($firstName) && !empty($lastName)) {
			$this->realName = $firstName . " " . $lastName;
			return true;
		}
		else
		{
			return false;
		}
	}
	
	/**
	 *
	 **/
	function InputUsername($username)
	{
		if(!empty($username) && (strlen($username) >= 3))
		{
			if($stmt = $this->dbConnect->prepare("SELECT COUNT(Username) AS UsernameCount FROM ((SELECT tempusersinfo.Username FROM tempusersinfo) UNION (SELECT usersinfo.Username FROM usersinfo)) AS usernamestable WHERE Username = ?"))
			{
				$stmt->bind_param("s", $username);
				$stmt->execute();
				$stmt->bind_result($usernameCount);
				$stmt->fetch();
				$stmt->close();
				if($usernameCount == 0)
				{
					$this->username = $username;
					return true;
				}	
			}
		}
		return false;
	}
	
	/**
	 *
	 **/
	function InputPassword($password, $confirmPassword)
	{
		if((strcmp($password ,$confirmPassword) == 0) && (strlen($password) >= 6))
		{
			//TODO hash password here
			//$pwdHasher = new PasswordHash(8, FALSE);
			//$password = HashPassword($password)
			$this->password = $password;
			return true;
		}
		return false;
	}
	
	/**
	 *
	 **/
	function InputEmail($email, $confirmEmail)
	{
		if((strcmp($email ,$confirmEmail) == 0) && filter_var($email, FILTER_VALIDATE_EMAIL))
		{
			$this->email = $email;
			return true;
		}
		return false;
	}
	
	/**
	 *
	 **/
	function RequestConfirmation()
	{
		if(strlen($this->username) > 0 && strlen($this->password) > 0 && strlen($this->email) > 0 && strlen($this->realName) > 0)
		{
			$confirm_code=md5(uniqid(rand()));
			if($stmt = $this->dbConnect->prepare("INSERT INTO tempusersinfo(confirm_code, Username, Password, Email, Name)VALUES( ?, ?, ?, ?, ?)"))
				{
					$stmt->bind_param("sssss", $confirm_code, $this->username, $this->password, $this->email, $this->realName);
					$stmt->execute();
					$stmt->bind_result($result);
					$stmt->fetch();
					$stmt->close();
					if($result)
					{
						$to=$this->email;

						// Your subject
						$subject="Your confirmation link here";

						// From
						$header="from: your name <your email>";

						// Your message
						$message="Your Comfirmation link \r\n";
						$message.="Click on this link to activate your account \r\n";
						$message.="http://trc202.com/confirmation.php?registrationId=$confirm_code";


						// send email
						$sentmail = mail($to,$subject,$message,$header);
						return true;
					}	
				}
		}
		return false;
	}
	
	
	/**
	 *
	 **/
	function ConfirmUser($key)
	{
		if($stmt = $this->dbConnect->prepare("SELECT Username, Email, Password, Name FROM tempusersinfo WHERE confirm_code= ? "))
		{
			$stmt->bind_param("s", $key);
			$stmt->execute();
			$stmt->bind_result($username, $email, $password, $name);
			$stmt->fetch();
			$stmt->close();		
			if($stmt = $this->dbConnect->prepare("INSERT INTO usersinfo(Username, Password, Email, Name)VALUES(?, ?, ?, ?)"))
			{
				$stmt->bind_param("ssss", $username, $password, $email, $name);
				$stmt->execute();
				$stmt->bind_result();
				$stmt->fetch();
				$stmt->close();
				if($stmt = $this->dbConnect->prepare("DELETE FROM tempusersinfo WHERE confirm_code = ?"))
				{
					$stmt->bind_param("s", $key);
					$stmt->execute();
					$stmt->bind_result($removed);
					$stmt->fetch();
					$stmt->close();
				}
				return true;
			}
			return false;
		}
	}
}
?>