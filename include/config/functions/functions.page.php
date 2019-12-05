<?php

// Validation
if(_VALID !='Yes')
{// Restricted access
	include_once($_SERVER['DOCUMENT_ROOT'] . '/PHP_CART/404.php');
	exit();
}

// Page functions
// Get page ID by URL
function getPageIDByURL($URL) {
	// filter URL
	$URL = preg_replace('#[^A-Za-z0-9-]#i', '', $URL);
	$URL = $GLOBALS['mysqli']->real_escape_string($URL);
	
	// Check
	$sqlCheck = "SELECT pageID FROM sc_pages WHERE pageURL='$URL' LIMIT 1";
	$queryCheck = $GLOBALS['mysqli']->query($sqlCheck);
	
	if ($queryCheck === FALSE) {
		// Query error
		return '0';
	} else {
		$countCheck = $queryCheck->num_rows;
		
		if ($countCheck == 1) {
			// Valid
			$rowCheck = $queryCheck->fetch_assoc();
			$ID = $rowCheck['pageID'];
			
			return $ID;
		} else {
			// Invalid
			return '0';
		}
	}
}

// Crypt dynamic site URL
function cryptDynamicURL($contentText) {
	if(strlen($contentText) < 4294967296) {
		$replaceURL = $GLOBALS['URL'];
		$replaceURLWith = '%dynamicSiteURL%';
		$newContent = str_replace($replaceURL, $replaceURLWith, $contentText);
		return $newContent;
	} else {
		return '';
	}
}

// Decrypt dynamic site URL
function decryptDynamicURL($contentText) {
	if(strlen($contentText) < 4294967296) {
		$replaceURL = $GLOBALS['URL'];
		$replaceURLWith = '%dynamicSiteURL%';
		$newContent = str_replace($replaceURLWith, $replaceURL, $contentText);
		return $newContent;
	} else {
		return '';
	}
}

?>