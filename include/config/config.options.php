<?php

// Validation
if(_VALID !='Yes')
{// Restricted access
	include_once($_SERVER['DOCUMENT_ROOT'] . '/404.php');
	exit();
}

// Fetch options values
$sqlOptions = "SELECT * FROM sc_options WHERE optionLoad='1'";
$queryOptions = $GLOBALS['mysqli']->query($sqlOptions);

if ($queryOptions === FALSE)
{	// Query error
	// Get default values
	
	foreach ($config as $optionName => $optionValue)
		{
			$GLOBALS['' . $optionName . ''] = $optionValue;
		}
	
} else {
	$countOptions = $queryOptions->num_rows;
	
	if ($countOptions > 0)
	{	// Get values from database
		while ($rowOptions = $queryOptions->fetch_assoc())
		{
			$optionName = $rowOptions['optionName'];
			$optionValue = $rowOptions['optionValue'];
			
			if ($optionName != '' && $optionValue != '')
			{
				$GLOBALS['' . $optionName . ''] = $optionValue;
				
			}
		}
	
	} else {
		// No options
		// Get default values
		foreach ($config as $optionName => $optionValue)
		{
			$GLOBALS['' . $optionName . ''] = $optionValue;
		}
	}
}

// Create theme paths
$GLOBALS['SITE_THEME_PATH_BACK']  = $GLOBALS['THEMES_PATH'] . '/' . $GLOBALS['SITE_THEME_PATH'] . '/backend/';
$GLOBALS['SITE_THEME_PATH_FRONT'] = $GLOBALS['THEMES_PATH'] . '/' . $GLOBALS['SITE_THEME_PATH'] . '/frontend/';
$GLOBALS['SITE_THEME_CSS_URL'] 	  = $GLOBALS['THEMES_PATH_URL'] . '/' . $GLOBALS['SITE_THEME_PATH'] . '/frontend/css';
?>