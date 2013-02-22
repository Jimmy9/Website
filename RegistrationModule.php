<?php

/**
 *
 *
 **/
class RegistrationModule
{
	var $dbLink;
	var $username = "";
	var $password = "";
	var $email = "";
	var $realName = "";
	var $tempUserTable = "";
	var $userTable = "";
	
	/**
	 *
	 **/
	function RegistrationModule($dbLink)
	{
		$this->dbLink = $dbLink;
		$this->tempUserTable = "tempusersinfo"
		$this->userTable = "userTable";
	}
	
	/**
	 *
	 **/
	function InputName($firstName, $lastName)
	{
	
	}
	
	/**
	 *
	 **/
	function InputUsername($username)
	{
	
	}
	
	/**
	 *
	 **/
	function InputPassword($password, $confirmPassword)
	{
	
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
	function ConfirmUser($key)
	{
		
	}
	
}

?>