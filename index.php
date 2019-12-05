<?php

// Define access
define('_VALID', 'Yes');

// Get configuration files
require_once('include/config/config.php');
require_once('include/traffic/traffic.php');

// Get theme files
require_once $GLOBALS['SITE_THEME_PATH_BACK'] . '/page.php';
require_once $GLOBALS['SITE_THEME_PATH_FRONT'] . '/page.php';

?>