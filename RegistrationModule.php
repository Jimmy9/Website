<?php

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
	private $tempUserTable = "";
	private $userTable = "";
	
	/**
	 *
	 **/
	function RegistrationModule($dbConnect)
	{
		$this->dbConnect = $dbConnect;
		$this->tempUserTable = "tempusersinfo"
		$this->userTable = "userTable";
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
			//TODO check to see if the username exists in the database
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
	function InputPassword($password, $confirmPassword)
	{
		if(
		
	}
	
	/**
	 *
	 **/
	function InputEmail($email, $confirmEmail)
	{
		
	}
	
	/**
	 *
	 **/
	function RequestConfirmation()
	{
		
	}
	
	
	/**
	 *
	 **/
	function ConfirmUser($key)
	{
		if($stmt = $this->dbConnect->prepare("SELECT * FROM ? WHERE confirm_code=?"))
		{
			$stmt->bind_param("ss", $this->tempUserTable, $key);
			$stmt->execute();
			$stmt->bind_result($keyResult);
			$stmt->fetch();
			$stmt->close();
			if($uniqueIdsQueryResult)
			{
				// Count how many row has this registrationId
				$count = $uniqueIdsQueryResult->num_rows;

				// if found this registrationId in our database, retrieve data from table listed in
				if($count==1)
				{
					$rows=$uniqueIdsQueryResult->fetch_array(MYSQLI_ASSOC);
					$username=$rows['Username'];
					$email=$rows['Email'];
					$password=$rows['Password'];
					$name=$rows['Name'];
					
					if($stmt = $this->dbConnect->prepare("INSERT INTO ?(Username, Password, Email, Name)VALUES(?, ?, ?, ?)"))
					{
						$stmt->bind_param("sssss", $this->userTable, $username, $password, $email, $name);
						$stmt->execute();
						$stmt->bind_result($successfullyActivated);
						$stmt->fetch();
						$stmt->close();
						if($successfullyActivated){
							if($stmt = $this->dbConnect->prepare("DELETE FROM ? WHERE confirm_code = ?"))
							{
								$stmt->bind_param("ss", $this->tempUserTable, $key);
								$stmt->execute();
								$stmt->bind_result($removed);
								$stmt->fetch();
								$stmt->close();
							}
							return true;
						}
					}
				}
			}
		}
		return false;
		
	}
	
}

?>