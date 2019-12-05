<?php

// Validation
if(_VALID !='Yes')
{// Restricted access
	include_once($_SERVER['DOCUMENT_ROOT'] . '/404.php');
	exit();
}

// Set time zone
date_default_timezone_set($GLOBALS['SITE_TIME_ZONE']);

?>