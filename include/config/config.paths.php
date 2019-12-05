<?php

// Validation
if(_VALID !='Yes')
{// Restricted access
	include_once($_SERVER['DOCUMENT_ROOT'] . '/PHP_CART/404.php');
	exit();
}

// Paths to directories
// Website URL
$GLOBALS['URL'] = '';
// Website root
$GLOBALS['ROOT_PATH'] = $_SERVER['DOCUMENT_ROOT'];
// Languages path
$GLOBALS['LANG_PATH'] = $GLOBALS['ROOT_PATH'] . '/PHP_CART/include/config/languages';
// Assets path
$GLOBALS['ASSETS_PATH'] = $GLOBALS['ROOT_PATH'] . '/PHP_CART/assets';
//Media path
$GLOBALS['MEDIA_PATH'] = $GLOBALS['ROOT_PATH'] . '/PHP_CART/uploads/media';
// Themes path
$GLOBALS['THEMES_DIR'] = '/PHP_CART/uploads/themes';
$GLOBALS['THEMES_PATH'] = $GLOBALS['ROOT_PATH'] . $GLOBALS['THEMES_DIR'];
$GLOBALS['THEMES_PATH_URL'] = $GLOBALS['URL'] . $GLOBALS['THEMES_DIR'];


?>