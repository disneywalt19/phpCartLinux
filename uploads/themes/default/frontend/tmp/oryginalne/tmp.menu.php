<?php

// Validation
if(_VALID !='Yes')
{// Restricted access
	include_once($_SERVER['DOCUMENT_ROOT'] . '/404.php');
	exit();
}

?>

<!-- Start main menu -->
		<nav class="navbar navbar-expand-lg navbar-light bg-light">
			<div class="container">
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
				<div class="collapse navbar-collapse" id="navbarSupportedContent">
					<ul class="navbar-nav">
						<li class="nav-item">
							<a class="nav-link" href="#">Home</a> 
						</li>
						<li class="nav-item">
							<a class="nav-link" href="#">Products</a> 
						</li>
						<li class="nav-item">
							<a class="nav-link" href="#">About</a> 
						</li>
						<li class="nav-item">
							<a class="nav-link" href="#">Contact</a> 
						</li>
					</ul>
				</div>
			</div>
		</nav>
<!-- End main menu -->