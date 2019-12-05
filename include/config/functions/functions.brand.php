<?php

// Validation
if(_VALID !='Yes')
{// Restricted access
	include_once($_SERVER['DOCUMENT_ROOT'] . '/404.php');
	exit();
}

// Brand functions
// Get category ID by URL
function getBrandIDByURL($URL) {
	// filter URL
	$URL = preg_replace('#[^A-Za-z0-9-]#i', '', $URL);
	$URL = $GLOBALS['mysqli']->real_escape_string($URL);
	
	// Check
	$sqlCheck = "SELECT brandID FROM sc_products_brands WHERE brandURL='$URL' LIMIT 1";
	$queryCheck = $GLOBALS['mysqli']->query($sqlCheck);
	
	if ($queryCheck === FALSE) {
		// Query error
		return 0;
	} else {
		$countCheck = $queryCheck->num_rows;
		
		if ($countCheck == 1) {
			// Valid
			$rowCheck = $queryCheck->fetch_assoc();
			$ID = $rowCheck['brandID'];
			
			return $ID;
		} else {
			// Invalid
			return 0;
		}
	}
}


?>