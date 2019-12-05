<?php
// Define access
define('_VALID', 'Yes');

// Get configuration files
require_once('../include/config/config.php');
require_once('../include/traffic/traffic.php');

// Check if admin logged
if ($admin->adminLogged == true) {
	header('location: ' . '/control_panel/');
	exit();
}

// Constants
define('LOGIN_URL', $GLOBALS['URL'] . '/control_panel/login');

?>
<!DOCTYPE html>
<html lang="<?php echo $GLOBALS['SITE_LANG_SHORT']; ?>">
<head>
<title><?php $lang['website.login.title']; ?> | <?php echo $lang['website.admin.panel']; ?></title>
<?php echo displayMetaCharset($languageOption) ?>
<meta http-equip="X-UA-Compatible" content="IE=edge, chrome=1" />
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- Get CSS files -->
	
<link href="<?php echo $GLOBALS['URL'] ?>/PHP_CART/assets/bootstrap/bootstrap-4.3.1/css/bootstrap.min.css" rel="stylesheet">
<link href="<?php echo $GLOBALS['URL'] ?>/PHP_CART/assets/fontawesome/fontawesome-free-5.11.2/css/fontawesome-all.css" rel="stylesheet">
<link href="<?php echo $GLOBALS['URL'] ?>/PHP_CART/control_panel/themes/<?php echo $GLOBALS['ADMIN_THEME_PATH']; ?>/css/login.css" rel="stylesheet">
	
	<!-- Get JavaScript files -->
<script src="<?php echo $GLOBALS['URL'] ?>/PHP_CART/assets/jquery/jquery-3.4.1.js"></script>
<script src="<?php echo $GLOBALS['URL'] ?>/PHP_CART/assets/bootstrap/bootstrap-4.3.1/js/bootstrap.min.js"></script>
	
	<!-- Favicon -->
<link href="<?php echo $GLOBALS['URL'] ?>/PHP_CART/control_panel/favicon.ico" rel="shortcut icon">
</head>
<body>

	<?php include_once('themes/' . $GLOBALS['ADMIN_THEME_PATH'] . '/securityCode.php'); ?>
	
</body>
</html>