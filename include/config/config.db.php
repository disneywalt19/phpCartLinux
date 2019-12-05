<?php

// Validation
if(_VALID !='Yes')
{// Restricted access
	include_once($_SERVER['DOCUMENT_ROOT'] . '/404.php');
	exit();
}

require_once 'classes/class.db.php';

//Connect to database
$DB = new DB();
$DB->connect();

?>