<?php

// Validation
if(_VALID !='Yes')
{// Restricted access
	include_once($_SERVER['DOCUMENT_ROOT'] . '/404.php');
	exit();
}

// Start Sessions
session_start();

// Get session files
require_once 'session.admin.php';
require_once 'session.member.php';

?>