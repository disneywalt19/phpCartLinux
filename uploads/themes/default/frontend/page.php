<?php

// Validation
if(_VALID !='Yes')
{// Restricted access
	include_once($_SERVER['DOCUMENT_ROOT'] . '/404.php');
	exit();
}

// Get header template
include_once'tmp/tmp.header.php';

// Get menu template
include_once'tmp/tmp.menu.php';


// Create page content
echo '
<!-- Start main content -->
	<div class="main-content">
		<div class="container">
			<div class="row">
				<div class="col-md-8">
<!-- Start page content -->
					<section class="page-content">
						<h1>' . $page->title . '</h1>
						' . $page->aboutLong . '
					</section>
<!-- End page content -->
				</div>
				<div class="col-md-4">
				';	


// Get menu template
include_once 'tmp/tmp.sidebar.php';

echo '
				</div>
			</div>
		</div>
	</div>
<!-- End main content -->
';

// Get footer template
include_once'tmp/tmp.footer.php';


?>