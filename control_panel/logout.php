<?php

// Define access
define('_VALID', 'Yes');

// Get configuration files
require_once('../include/config/config.php');
require_once('../include/traffic/traffic.php');

// Constants
define('LOGIN_URL', $GLOBALS['URL'] . '/control_panel/login');

// Check if admin logged
$LOGIN_URL = 'http://localhost/PHP_CART/control_panel/login.php';
if ($admin->adminLogged == false) {
	header('location: ' . $GLOBALS['URL'] . $LOGIN_URL);
	exit();
}

// Check sessions
if (isset($_SESSION['sessionAdminID']) && isset($_SESSION['sessionAdminUser']) && isset($_SESSION['sessionAdminPass'])) {
// Remove session
	unset($_SESSION['sessionAdminID']);
	unset($_SESSION['sessionAdminUser']);
	unset($_SESSION['sessionAdminPass']);
}

// Check cookies
if(isset($_COOKIE['cookieAdminID']) && isset($_COOKIE['cookieAdminUser']) && isset($_COOKIE['cookieAdminPass'])) {
	// Remove cookies
	unset($_COOKIE['cookieAdminID']);
	unset($_COOKIE['cookieAdminUser']);
	unset($_COOKIE['cookieAdminPass']);

	setcookie('cookieAdminID', strtotime('-5 days'), '/', '');
	setcookie('cookieAdminUser', strtotime('-5 days'), '/', '');
	setcookie('cookieAdminPass', strtotime('-5 days'), '/', '');
}

// Final check
if(isset($_SESSION['sessionAdminID'])) {
	session_destroy();

	// Redirect to log in
	header('location: ' . $GLOBALS['URL'] . $LOGIN_URL);
	exit();
} else {
	// Redirect to log in
	header('location: ' . $GLOBALS['URL'] . $LOGIN_URL);
	exit();
}

?>