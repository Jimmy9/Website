<?php

/**
 * UserModule is a tool tht allows
 * the page to login users in and out,
 * and check if the user is logged in.
 *
 **/
 
require('PasswordHash.php');
 
class UserModule
{
	var $dbConnect;
	
	/**
	 * 
	 **/
	function UserModule($dbConnect)
	{
		$this->dbConnect = $dbConnect;
		session_start();
	}
	
	/**
	 *
	 **/
	function IsUserLoggedIn()
	{
		return(isset($_SESSION['username']));
	}
	
	/**
	 *
	 **/
	function LoginUser($userName, $password)
	{
		if($stmt = $this->dbConnect->prepare("SELECT 'Password' FROM 'usersinfo' WHERE username=?"))
		$stmt -> bind_param("s", $userName);
		$stmt -> execute();
		$stmt -> bind_result($hashedPassword);
		$stmt -> fetch();
		$stmt -> close();
		echo $hashedPassword;
		$pwdHasher = new PasswordHash(8, FALSE);
		if(!empty($hashedPassword) &&  $pwdHasher->CheckPassword($password, $hash))
		{
			$_SESSION['username'] = $userName;
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
	 *
	 **/
	function GetUserName()
	{
		if(isset($_SESSION['username']))
			return $_SESSION['username'];
		else
			return "";
	}
	
	
}
?>