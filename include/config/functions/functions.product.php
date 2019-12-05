<?php

// Validation
if(_VALID !='Yes')
{// Restricted access
	include_once($_SERVER['DOCUMENT_ROOT'] . '/404.php');
	exit();
}

// Product functions
// Get product ID by URL
function getProductIDByURL($URL) {
	// filter URL
	$URL = preg_replace('#[^A-Za-z0-9-]#i', '', $URL);
	$URL = $GLOBALS['mysqli']->real_escape_string($URL);
	
	// Check
	$sqlCheck = "SELECT productID FROM sc_products WHERE productURL='$URL' LIMIT 1";
	$queryCheck = $GLOBALS['mysqli']->query($sqlCheck);
	
	if ($queryCheck === FALSE) {
		// Query error
		return 0;
	} else {
		$countCheck = $queryCheck->num_rows;
		
		if ($countCheck == 1) {
			// Valid
			$rowCheck = $queryCheck->fetch_assoc();
			$ID = $rowCheck['productID'];
			
			return $ID;
		} else {
			// Invalid
			return 0;
		}
	}
}


?>