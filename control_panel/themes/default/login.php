<?php
// Validation
if(_VALID !='Yes')
{
	// Restricted access
	include_once($_SERVER['DOCUMENT_ROOT'] . '/404.php');
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
				<h1> <?php echo $lang['website.admin.panel']; ?></h1>
				<br>
				<div class="form-group">
					<label><?php echo $lang['website.forms.label.username']; ?></label>
					<input type="text" name="username" class="form-control" autocomplete="off" maxlenght="30">
				</div>
				<div class="form-group">
					<label><?php echo $lang['website.forms.label.password']; ?></label>
					<input type="password" name="password" class="form-control" autocomplete="off" maxlenght="50">
				</div>
				<div class="form-group form-check">
					<input type="checkbox" name="rememberMe" class="form-check-input value="yes">
					<label class="form-check-label"><?php echo $lang['website.forms.label.remember.me']; ?></label>
				</div>
				<button type="submit" class="btn btn-info"><i class="fas fa-angle-double-right"></i>&nbsp;<?php echo $lang['website.forms.button.login'] ?></button>
			</form>
		</div>
	</div>
	<div class="lost-password-box">
		<p><a href="<?php echo $GLOBALS['URL'] ?>/control_panel/password-forgot"><?php echo $lang['website.forms.label.password.forgot'] ?></a></p>
	</div>
</div>
