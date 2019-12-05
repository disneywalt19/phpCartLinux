<?php

// Validation
if(_VALID !='Yes')
{// Restricted access
	include_once($_SERVER['DOCUMENT_ROOT'] . '/404.php');
	exit();
}

?>

<!-- Start main footer -->
		<footer class="main-footer">
			<div class="main-footer-top">
			
			</div>
			<div class="main-footer-bottom">
				&copy; PHP Shopping Cart <?php echo date('Y'); ?>
			</div>
		</footer>
<!-- End main footer -->
	</div>
</body>
</html>