<?php
// Define access
define('_VALID', 'Yes');



// Get configuration files
require_once '../include/config/config.php';

// Check if admin logged
if ($admin->adminLogged == false) {
	header('location: ' . $GLOBALS['URL'] . '/control_panel/login');
	exit();
}

// Get admin language
require_once 'languages/lang.' . $admin->language . '.php';

echo 'Welcome admin!';

?>