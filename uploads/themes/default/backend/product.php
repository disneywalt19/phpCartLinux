<?php

// Validation
if(_VALID !='Yes')
{// Restricted access
	include_once($_SERVER['DOCUMENT_ROOT'] . '/PHP_CART/404.php');
	exit();
}

// Get theme functions
require_once 'functions/functions.php';


?>