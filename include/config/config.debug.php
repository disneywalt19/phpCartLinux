<?php

// Validation
if(_VALID !='Yes')
{// Restricted access
	include_once($_SERVER['DOCUMENT_ROOT'] . '/404.php');
	exit();
}

// Check developing mode
if ($GLOBALS['SITE_DEV_MODE'] == '1')
{	// Develope mode
	ini_set('display_errors', 1);	
} else {
	// Production mode
	ini_set('display_errors', 0);
}

?>