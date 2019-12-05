<?php

// Validation
if(_VALID !='Yes')
{// Restricted access
	include_once($_SERVER['DOCUMENT_ROOT'] . '/404.php');
	exit();
}

// Get member class
require_once $GLOBALS['ROOT_PATH'] . 'PHP_CART/include/config/classes/class.member.php';

// Get member
$member = new Member();

?>

