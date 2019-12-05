<?php

// Validation
if(_VALID !='Yes')
{// Restricted access
	include_once($_SERVER['DOCUMENT_ROOT'] . '/404.php');
	exit();
}

?>

<!DOCTYPE html>
<html lang="<?php echo $GLOBALS['SITE_LANG_SHORT']; ?>">
<head>
<title><?php echo $pageTitle; ?></title>
<?php echo displayMetaCharset($languageOption) ?>
<meta http-equip="X-UA-Compatible" content="IE=edge, chrome=1" />
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="keywords" content="<?php echo $pageKeywords; ?>">
<meta name="description" content="<?php echo $pageDescription; ?>">
	
	<!-- Get CSS files -->
<link href="<?php echo $GLOBALS['URL'] ?>/PHP_CART/assets/bootstrap/bootstrap-4.3.1/css/bootstrap.min.css" rel="stylesheet">
<link href="<?php echo $GLOBALS['URL'] ?>/PHP_CART/assets/fontawesome/fontawesome-free-5.10.2/css/fontawesome.css" rel="stylesheet">
<link href="<?php echo $GLOBALS['SITE_THEME_CSS_URL']; ?>/PHP_CART/uploads/themes/default/frontend/css/style.css" rel="stylesheet">
	
	<!-- Get JavaScript files -->
<script src="<?php echo $GLOBALS['URL'] ?>/PHP_CART/assets/jquery/jquery-3.4.1.js"></script>
<script src="<?php echo $GLOBALS['URL'] ?>/PHP_CART/assets/bootstrap/bootstrap-4.3.1/js/bootstrap.min.js"></script>
	
	<!-- Favicon -->
<link href="<?php echo $GLOBALS['URL'] ?>/PHP_CART/favicon.ico" rel="shortcut icon">
	
	<!-- Custom CSS -->
	<?php echo $pageCSS; ?>
	<?php 

	// Get theme style
	include_once 'tmp.style.php';
	
	?>
</head>
<body>
	
	<!-- Top JavaScript code -->
	<?php echo $pageScriptTop; ?>
	<div class="main-wrapper">
		<!-- Start main header -->
		<header class="main-header">
			<div class="container">
				<div class="row">
					<div class="col-md-3">
						<!--<img src="/PHP_CART/assets/images/logo.png"> -->
						<?php displayLogo(); ?>
					</div>
					<div class="col-md-9">
						<!-- Display top banner here -->
					</div>
				</div>
			</div>
		</header>
		<!-- End main header -->