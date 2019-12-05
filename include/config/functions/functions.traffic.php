<?php

// Validation
if(_VALID !='Yes')
{// Restricted access
	include_once($_SERVER['DOCUMENT_ROOT'] . '/404.php');
	exit();
}

// traffic functions
// Get user's OS
function getUserOS($agent) {
	$OSName = '';
	$OSArray = array (
		'iPhone' 		=> 'iphone',
		'Android' 		=> 'android',
		'Windows 98' 	=> '(Win98) | (Windows 98)',
		'Windows 2000'  => '(Windows 2000) | (Windows NT 5.0)',
		'Windows ME'	=> 'Windows ME',
		'Windows XP'	=> '(Windows XP) | (Windows NT 5.1)',
		'Windows Vista' => 'Windows NT 6.0',
		'Windows 7'		=> 'Windows NT 6.1',
		'Windows 8'		=> 'Windows NT 6.2',
		'Windows 10'	=> 'Windows NT 10.0',
		'Linux'			=> '(X11) | (Linux)',
		'Mac OS'		=> '(Mac_PowerPC) | (Macintosh) | (Mac OS)'
	);
	
	foreach($OSArray as $OSIndex => $OSValue) {
		if (preg_match("/$OSValue/", $agent)) {
			$OSName = $OSIndex;
			break;
		} else {
			$OSName = 'Unknown OS';
		}
	}
	
	return $OSName;
}

// Get user's browser
function getUserBrowser($agent) {
	$browserName = '';
	$browserArray = array(
		'Windows Mobile' 	=> 'IEMobile',
		'Android Mobile' 	=> 'Android',
		'iPhone Mobile' 	=> 'iPhone',
		'Firefox' 			=> 'Firefox',
		'Google Chrome' 	=> 'Chrome',
		'Internet Explorer' => 'MSIE',
		'Opera' 			=> 'Opera',
		'Safari' 			=> 'Safari'
	);
	
	foreach($browserArray as $browserIndex => $browserValue) {
		if (preg_match("/$browserValue/", $agent)) {
			$browserName = $browserIndex;
			break;
		} else {
			$browserName = 'Unknown browser';
		}
	}
	
	return $browserName;

}

?>