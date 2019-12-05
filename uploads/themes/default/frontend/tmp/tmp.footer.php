<?php

// Validation
if(_VALID !='Yes')
{// Restricted access
	include_once($_SERVER['DOCUMENT_ROOT'] . '/404.php');
	exit();
}



// Get configuration files
require_once('include/config/config.php');
require_once('include/traffic/traffic.php');


?>

<!-- Start main footer -->
		<footer class="main-footer">
			<div class="main-footerbottom">
				&copy; PHP Shopping Cart <?php echo date('Y') ?>;
			</div>
		</footer>
<!-- End main footer -->
</div>
	<!-- Bottom JavaScript code -->
<?php echo $pageScriptBottom; ?>
</body>


</html>