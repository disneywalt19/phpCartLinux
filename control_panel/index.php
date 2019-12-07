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
/*
<!DOCTYPE html>
<html lang="en">
<head>
</head>
<body>
 <div class="panel">
		<div class="panel-body">
			<form action="<?php echo $GLOBALS['URL'] ?>/PHP_CART/control_panel/login.php" method="POST">
<button type="submit" class="btn btn-info"><i class="fas fa-angle-double-right"></i>&nbsp;<?php echo $lang['website.forms.button.login'] ?></button>
</div>
</div>
</body>
</html>
*/
?>