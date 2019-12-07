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
			<form action="<?php echo $GLOBALS['URL'] ?>/PHP_CART/control_panel/securityCode.php" method="POST">
				`<h1> <?php echo $lang['website.admin.panel']; ?></h1>
				<br>
				<div class="form-group">
					<label><?php echo $lang['website.forms.label.securitycode']; ?></label>
					<input type="text" name="securityCode" class="form-control" autocomplete="off" maxlenght="6">
				</div>
				<button type="submit" class="btn btn-info"><i class="fas fa-angle-double-right"></i>&nbsp;<?php echo $lang['website.forms.button.done']; ?></button>
			</form>
		</div>
	</div>
</div>