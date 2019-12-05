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
<title>PHP Shopping Cart</title>
<?php echo displayMetaCharset($languageOption) ?>
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="keywords" content="">
<meta name="description" content="">
	
	<!-- Get CSS files -->
<link href="<?php echo $GLOBALS['URL'] ?>/assets/bootstrap/bootstrap-4.3.1/css/bootstrap.min.css" rel="stylesheet">
<link href="<?php echo $GLOBALS['URL'] ?>/assets/fontawesome/fontawesome-free-5.10.2/css/fontawesome.css" rel="stylesheet">
	
	<!-- Get JavaScript files -->
<script src="<?php echo $GLOBALS['URL'] ?>/assets/jquery/jquery-3.4.1.js"></script>
<script src="<?php echo $GLOBALS['URL'] ?>/assets/bootstrap/bootstrap-4.3.1/js/bootstrap.min.js"></script>
	
	<!-- Favicon -->
<link href="<?php echo $GLOBALS['URL'] ?>/favicon.ico" rel="shortcut icon">
	
	<!-- Custom CSS -->
<!-- <style type="text/css"></style> -->
</head>
<body>
	
	<!-- Top JavaScript code -->
	<div class="main-wrapper">
		<!-- Start main header -->
		<header class="main-header">
			<div class="container">
				<div class="row">
					<div class="col-md-3">
						<?php displayLogo(); ?>
					</div>
					<div class="col-md-9">
						<!-- Display top banner here -->
					</div>
				</div>
			</div>
		</header>
		<!-- End main header -->