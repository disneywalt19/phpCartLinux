<?php

// Validation
if(_VALID !='Yes')
{// Restricted access
	include_once($_SERVER['DOCUMENT_ROOT'] . '/404.php');
	exit();
}

// Variables
$languageOption = 'en_US';

// Check language
if(isset($_SESSION['language']))
{
	$languagesArray = array(
		'English' => 'en_US',
		'Polish'  => 'pl_PL'
	);
	
	foreach ($languagesArray as $langIndex => $langValue)
	{
		if (preg_match("/$langValue/", $_SESSION['language']))
		{	// Get user's language
			$languageOption = $langValue;
			break;
		}
		
		// Default language
	$languageOption = $GLOBALS['SITE_LANG'];
	}
	
} else {
	// Default language
	$languageOption = $GLOBALS['SITE_LANG'];
}

// Get language values
require_once($GLOBALS['LANG_PATH'] . '/lang.' . $languageOption . '.php');

?>