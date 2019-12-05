<?php


// Validation
if(_VALID !='Yes')
{// Restricted access
	include_once($_SERVER['DOCUMENT_ROOT'] . '/404.php');
	exit();
}

// Get classes files
require_once 'class.product.php';
require_once 'class.category.php';
require_once 'class.brand.php';
require_once 'class.page.php';

?>