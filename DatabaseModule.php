<?php
/**
 * Database Module stores the default connection information
 * Which is used to connect to the database 
 **/
class DatabaseModule
{
	var $host = "";
	var $username = "";
	var $password = "";
	var $db_name = "";
	var $currLink = new mysqli();
	/**
	 * This loads the default MySQL login
	 * into the relevent variables.
	 **/
	function DatabaseModule()
	{
		$this->host = "localhost";
		$this->username = "root";
		$this->password = "not telling you github";
		$this->db_name = "discourseanalysis";
		
	}
	
	/**
	 * Connects to the MySQL server using default connect data
	 **/
	function Connect()
	{
		return $this->Connect("$this->host", "$this->username", "$this->password", "$this->db_name");
	}
	
	/**
	 * Connects to the MySQL server using custom data
	 **/
	function Connect($host, $username, $password, $db_name)
	{
		$dbLink = new mysqli("$host", "$username", "$password", "$db_name");
		
		if ( $dbLink->connect_errno)
		{
			return false;
		}
		else
		{
			return $dbLink;
		}
	}
}

?>