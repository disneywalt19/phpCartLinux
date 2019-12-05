<?php

// Validation
if(_VALID !='Yes')
{// Restricted access
	include_once($_SERVER['DOCUMENT_ROOT'] . '/404.php');
	exit();
}

// Variables
$userPageURL 	 = '';
$userWebsiteFrom = '';
$pageFromAssets  = false;
$ignoreCase1 	 = $GLOBALS['URL'] . '/favicon.ico';
$ignoreCase2 	 = $GLOBALS['URL'] . '/assets/';
$ignoreCase3 	 = $GLOBALS['URL'] . '/themes/';

// Check for HTTPS
if (preg_match("/https/i", $GLOBALS['URL'])) {
	if (isset($_SERVER['HTTPS'])) {
		if ($_SERVER['HTTPS'] == 'on') {
		// Do nothing
	} else {
		// Redirect to HTTPS
		header('location: ' . $GLOBALS['URL'] . $_SERVER['REQUEST_URI']);
	}
} else {
		// Redirect to HTTPS
		header('location: ' . $GLOBALS['URL'] . $_SERVER['REQUEST_URI']);
	}
}

// Get location
require_once 'traffic.location.php';


// Get IP address
$userIPAddress = $_SERVER['REMOTE_ADDR'];

// Check if has IP address
if ($userIPAddress == '' || $userIPAddress == ' ') {
	header('location: https://www.google.com');
}

// Validate IP address
if (!filter_var($userIPAddress, FILTER_VALIDATE_IP)) {
	echo $lang['website.traffic.ip.invalid'];
	exit();
}

// Filter IP address
$userIPAddress  = filterIPAddress($userIPAddress);

// Get users locations info
$userCountry 	 = ip_info($userIPAddress, 'Country');
$userCountryCode = ip_info($userIPAddress, 'Country Code');
$userState 		 = ip_info($userIPAddress, 'State');
$userCity 		 = ip_info($userIPAddress, 'City');


// Get user's operation system
$userOS 	 = getUserOS($_SERVER['HTTP_USER_AGENT']);

// Get user's browser
$userBrowser = getUserBrowser($_SERVER['HTTP_USER_AGENT']);


// Get user's current page URL
if (isset($_SERVER['REQUEST_URI'])) {
	// Other page
	$userPageURL = $GLOBALS['URL'] . $_SERVER['REQUEST_URI'];
} else {
	// Home page
	$userPageURL = $GLOBALS['URL'];
}

//Check cases
if ($userPageURL == $ignoreCase1 || $userPageURL == $ignoreCase2 || $userPageURL == $ignoreCase3)  {
	$pageFromAssets = true;
}
// Check is from another website
if (isset($_SERVER['HTTP_REFERER'])) {
	$userWebsiteFrom = $_SERVER['HTTP_REFERER'];
	
	if ($userWebsiteFrom != '' && $userWebsiteFrom != ' ') {
		if (!filter_var($userWebsiteFrom, FILTER_VALIDATE_URL)) {
			echo $lang['website.traffic.urlfrom.invalid'];
			exit();
	}
		
	$userWebsiteFrom = filter_var($userWebsiteFrom, FILTER_SANITIZE_URL);
	} else {
		$userWebsiteFrom = '';
	}
}

// Filter values
$userIPAddress   = filterIPAddress($userIPAddress);
$userCountry     = filterCountry($userCountry);
$userCountryCode = filterCountryCode($userCountryCode);
$userState 	     = filterState($userState);
$userCity 	     = filterCity($userCity);
$userOS		     = $GLOBALS['mysqli']->real_escape_string($userOS);
$userBrowser     = $GLOBALS['mysqli']->real_escape_string($userBrowser);
$userPageURL     = filter_var($userPageURL, FILTER_SANITIZE_URL);

// Check if page from assets
if ($pageFromAssets == false) {
	// Add traffic
$sqlTrafficAdd = "
	INSERT INTO sc_traffic(
    	trafficIP,
		trafficCountryName,
		trafficCountryCode,
		trafficState,
		trafficCity,
		trafficAddressURL,
		trafficAddressFrom,
		trafficBrowser,
		trafficOS,
		trafficDate
	) VALUES(
		'$userIPAddress',
		'$userCountry',
		'$userCountryCode',
		'$userState',
		'$userCity',
		'$userPageURL',
		'$userWebsiteFrom',
		'$userBrowser',
		'$userOS',
		now()
	)
	";

	$queryTrafficAdd = $GLOBALS['mysqli']->query($sqlTrafficAdd);
	// Check traffic added
	if ($queryTrafficAdd === FALSE) {
		// Query error
		echo $lang['website.traffic.crash'];
		exit();
	}
}


/*// Check traffic added
if ($queryTrafficAdd === FALSE) {
	// Query error
	echo '';
	exit();
} */

?>