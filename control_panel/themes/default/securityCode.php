<?php
// Validation
if(_VALID !='Yes')
{
	// Restricted access
	include_once($_SERVER['DOCUMENT_ROOT'] . '/PHP_CART/404.php');
	exit();
}



?>
<div class="container login-box">
	<div class="logo-box">
		
	</div>
	<?php echo $message; ?>
	<div class="panel">
		<div class="panel-body">
			<form action="<?php echo $GLOBALS['URL'] ?>/PHP_CART/control_panel/login.php" method="POST">
				`<h1> <?php echo $lang['website.admin.panel']; ?></h1>
				<br>
				
				<button type="submit" class="btn btn-info"><i class="fas fa-angle-double-right"></i>&nbsp;<?php echo $lang['website.forms.button.login'] ?></button>
			</form>
		</div>
	</div>
</div>