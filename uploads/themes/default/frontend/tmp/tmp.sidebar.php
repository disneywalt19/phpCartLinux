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

<!-- Start page sidebar -->
	<asside class="page-sidebar">
						
	</asside>
<!-- End page sidebar -->