<?php
// Define access
define('_VALID', 'Yes');

// Get configuration files
require_once('../include/config/config.php');
require_once('../include/traffic/traffic.php');

// Check if admin logged
$DASHBOARD_URL = 'http://localhost/PHP_CART/control_panel/';
if ($admin->adminLogged == true) {
	header('location: ' . $GLOBALS['URL'] . $DASHBOARD_URL);
	exit();
}

// Constants
define('LOGIN_URL', $GLOBALS['URL'] . '/control_panel/login');
define('DASHBOARD_URL', $GLOBALS['URL'] . '/control_panel/');
define('SECURITY_URL', $GLOBALS['URL'] . '/control_panel/securityCode');

// Variables
$message = '';
$postUsername= '';
$postPassword = '';
$postCheckbox = '';
//$loginCheck = ''; // I HAVE ADDED THIS LINE

/*$p = cryptPassword('123456');
echo $p;
exit();
*/

// Log in
if(isset($_POST['username']) && isset($_POST['password'])) {
	$LOGIN_URL = 'http://localhost/PHP_CART/control_panel/login.php';
	
	// Check URL
	if($_SERVER['HTTP_REFERER'] == $LOGIN_URL) {
		// Get values
		$postUsername = filterUsername($_POST['username']);
		$postPassword = cryptPassword($_POST['password']);
		
		// Check remember me
		if(isset($_POST['rememberMe'])) {
			$postCheckbox = $_POST['rememberMe'];
		}
		
		// Admin log in
		$loginCheck = adminLogin($postUsername, $postPassword);
	
	// Check log in status
	if($loginCheck['status'] == true) {
		
		/*echo 'success';
		exit();*/
		
		// Update admin log
		adminUpdateLog($loginCheck['ID'], $_SERVER['REMOTE_ADDR']);
		
		if($postCheckbox = 'yes') {
			// Remember me
			// Set sessions
			$_SESSION['sessionAdminID']   = $loginCheck['ID'];
			$_SESSION['sessionAdminUser'] = $loginCheck['username'];
			$_SESSION['sessionAdminPass'] = $loginCheck['password'];
			//Set coockies
			setcookie('cookieAdminID', $loginCheck['ID'], strtotime('+30 days'), '/', '', false, true);
			setcookie('cookieAdminUser', $loginCheck['username'], strtotime('+30 days'), '/', '', false, true);
			setcookie('cookieAdminPass', $loginCheck['password'], strtotime('+30 days'), '/', '', false, true);
		} else {
			// Not remember
			// Set sessions
			$_SESSION['sessionAdminID'] = $loginCheck['ID'];
			$_SESSION['sessionAdminUser'] = $loginCheck['username'];
			$_SESSION['sessionAdminPass'] = $loginCheck['password'];
		}
		
		// Redirect to dashboard
		header('location: ' . $DASHBOARD_URL);
		exit();
	
	} else {
		// Log in failed
		$messageIndex = $loginCheck['message'];
		$message = '<div class="alert alert-warning align-center" role="alert">' . $lang['' . $messageIndex . ''] . '</div>';
	}
		
  }
}

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
<?php include_once('themes/' . $GLOBALS['ADMIN_THEME_PATH'] . '/login.php'); ?>
	
	
</body>
</html>