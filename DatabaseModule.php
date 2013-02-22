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
	var $currLink;
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
		$this->currLink = new mysqli();
	}
	
	/**
	 * Connects to the MySQL server using default connect data
	 **/
	function Connect()
	{
		$result = $this->currLink->Connect($this->host, $this->username, $this->password, $this->db_name);
		
		if(!$this->currLink->connect_errno) 
		{
			return $this->currLink;
		}
		else
		{
			return false;
		}
	}
	
	/**
	 * Connects to the MySQL server using custom data
	 *
	 * Note, this name is not Connect as overloading in php is not the same as other languages.
	 * @param string $host the hostname of the database to login to.
	 * @param string $username the username of the database to login to.
	 * @param string $password the database of the database to login to.
	 * @param string $db_name the database name of the database to login to.
	 **/
	function ConnectUnique($host, $username, $password, $db_name)
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