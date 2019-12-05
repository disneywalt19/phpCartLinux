<?php

// Validation
if(_VALID !='Yes')
{// Restricted access
	include_once($_SERVER['DOCUMENT_ROOT'] . '/404.php');
	exit();
}

// Core functions
// Display meta charset
function displayMetaCharset($lang) {
	if ($lang == 'en_US') {
		// English
		echo '<meta charset="utf-8">';
	} else if ($lang == 'de_DE' || $lang == 'fr_FR'  || $lang == 'es_ES') {
		// German, French, Spanish
		echo '<meta charset="iso-8859-1">';
	} else {
		// Default
		echo '<meta charset="utf-8">';
	}
}

// Display logo
function displayLogo() {
	echo '<a href ="' . $GLOBALS['URL'] . '"><img src="' . $GLOBALS['URL'] . '/PHP_CART/assets/images/logo.png" class="sc-logo" alt="' . $GLOBALS['SITE_NAME'] . '" title="' . $GLOBALS['SITE_NAME'] . '"</a>';
}


// Get date format
function getDateFormat($date) {
	if ($date != '') {
		$date = date_create($date);
		$dateFormat = date_format($date, $GLOBALS['SITE_DATE_FORMAT']);
		return $dateFormat;
	} 
	
	return '';
		
}


// Get time format
function getTimeFormat($time) {
	if ($time != '') {
		$time = date_create($time);
		$timeFormat = date_format($time, $GLOBALS['SITE_DATE_FORMAT']);
		
		return $timeFormat;
	}
	
	return '';
}

// Date time format
function getDateTimeFormat($dateTime) {
	if ($dateTime != '') {
		$dateTime = date_create($dateTime);
		$dateTimeFormat = date_format($dateTime, $GLOBALS['SITE_DATE_TIME_FORMAT']);
	}
	
	return '';
}

// Get number format
function getNumberFormat($number) {
	if ($number != '') {
		if ($GLOBALS['SHOP_CURRENCY_TS'] == 'c') {
			// Comma separator
			$numberFormat = number_format($number, 0, '.', ','); 
			
			return $numberFormat;
		} else if ($GLOBALS['SHOP_CURRENCY_TS'] == 'd') {
			// Dot separator
			$numberFormat = number_format($number, 0, '.', '.');
			
			return $numberFormat;
		} else {
			// No separator
			return $number;	
		}
		
	}
			
	
	return 0;
}

// Get price format
function getPriceFormat($price) {
	if ($price != '') {
		$thousand = '';
		$decimal = '';
		
		// Get thousand separator
		if ($GLOBALS['SHOP_CURRENCY_TS'] == 'c') {
			$thousand = ',';
		} else if ($GLOBALS['SHOP_CURRENCY_TS'] == 'd') {
			$thousand = '.';
		} else {
			$thousand = '';
		}
		
		// Get decimal separator
		if ($GLOBALS['SHOP_CURRENCY_DS'] == 'c') {
			$decimal = ',';
		} else if ($GLOBALS['SHOP_CURRENCY_DS'] == 'd') {
			$decimal = '.';
		} else {
			$decimal = '';
		}
		
		$priceFormat = number_format($price, $GLOBALS['SHOP_CURRENCY_ND'], $decimal, $thousand);
		
	}
	
	return '';
}

// Crypt password
function cryptPassword ($password) {
	//Crypt password using md5
	$password = md5($password);
	
	// Salts
	$salt1 = '30hfreghfvikebwnvklwrhfergreh';
	$salt2 = 'DjkhfvrweghwiG4jhrf7834tyr934';
	
	// Cut password
	$part1 = substr($password, 0, 10);
	$part2 = substr($password, 10, 12);
	$part3 = substr($password, 22, 10);
	
	// Mix password
	$passwordMixed = $part2 . $salt1 . $part3 . $salt2. $part1;
	
	// Crypt password
	$passwordCrypted = md5($passwordMixed);
	
	return $passwordCrypted;
	
}

?>