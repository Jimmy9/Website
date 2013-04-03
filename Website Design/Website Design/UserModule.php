<?php

/**
 * UserModule is a tool that allows
 * the page to login users in and out,
 * and check if the user is logged in.
 *
 **/
 
require('./lib/PasswordHash.php');
 
class UserModule
{
	var $dbConnect;
	
	/**
	 * Default constructor, requires a active mysqli connection.
	 **/
	function UserModule($dbConnect)
	{
		$this->dbConnect = $dbConnect;
		if(session_id() == '')
		{
			session_start();
		}
	}
	
	/**
	 * Checks to see if the user is logged in. returns a boolean indicating the current status
	 **/
	function IsUserLoggedIn()
	{
		return(isset($_SESSION['username']));
	}
	
	/**
	 * Logs in a user. Returns boolean indicating the result.
	 *
	 * @param string $userName Username of the person logging in.
	 * @param string $password Password in plain text of the person logging in.
	 **/
	function LoginUser($userName, $password)
	{
		if($stmt = $this->dbConnect->prepare("SELECT Password FROM usersinfo WHERE username=?"))
		{
			$stmt->bind_param("s", $userName);
			$stmt->execute();
			$stmt->bind_result($hashedPassword);
			$stmt->fetch();
			$stmt->close();			
			$pwdHasher = new PasswordHash(8, FALSE);
			if($pwdHasher->CheckPassword($password, $hashedPassword))
			{
				$_SESSION['username'] = $userName;
				return true;
			}
		}
		return false;
	}
	
	/**
	 * Logs out a user returning a boolean indicating the result.
	 *
	 * Can only return false if the user was not logged in before calling this method.
	 **/
	function LogoutUser()
	{
		$loggedOut = true;
		if(isset($_SESSION['username']))
		{
			unset ($_SESSION['username']);
		}
		else
		{
			$loggedOut = false;
		}
		return $loggedOut;
	}
	
	/**
	 * Returns a users username or an empty string if the user is not logged in.
	 **/
	function GetUserName()
	{
		if(isset($_SESSION['username']))
			return $_SESSION['username'];
		else
			return "";
	}
	
	/**
	 * Returns true if the user is an admin, false otherwise
	 **/
	function IsAdmin()
	{
		if(isset($_SESSION['username']))
		{
			
			if($stmt = $this->dbConnect->prepare("SELECT Admin FROM usersinfo WHERE username=?"))
			{
				$stmt->bind_param("i", $_SESSION['username']);
				$stmt->execute();
				$stmt->bind_result($isAdmin);
				$stmt->fetch();
				$stmt->close();			
				if($isAdmin == 1)
				{
					return true;
				}
			}
		}
		return false;
	}
}
?>