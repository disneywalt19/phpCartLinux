<?php

// Validation
if(_VALID !='Yes')
{// Restricted access
	include_once($_SERVER['DOCUMENT_ROOT'] . '/404.php');
	exit();
}

// DB CLASS
class DB
{
	// Properties
	private $hostName = 'localhost';
	private $username = 'root';
	private $password = '';
	private $DBname = 'phpshopppingcart_db.sql';
	
	// Connect to database
	public function connect()
	{
		$mysqli = new mysqli($this->hostName, $this->username, $this->password, $this->DBname);
		if($mysqli->connect_error)
		{
			echo $mysqli->connect_errno . ', ' . $mysqli->connect_error;
		}
		
		$GLOBALS['mysqli'] = $mysqli;
		
	}
	
}

?>