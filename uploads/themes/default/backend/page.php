<?php

// Validation
if(_VALID !='Yes')
{// Restricted access
	include_once($_SERVER['DOCUMENT_ROOT'] . '/404.php');
	exit();
}

// Get theme functions
require_once 'functions/functions.php';

	// Variables
$pageID = '';
$pageURL = '';
$pageNumber = '';
$pageItems = '';
$pageTitle = '';
$pageKeywords = '';
$pageDescription = '';
$pageContent = '';
$pageSidebarID = '';
$pageSidebarPosition = '';
$pageScriptTop = '';
$pageScriptBottom = '';
$pageCSS = '';


// Check for page
if(isset($_GET['pageURL'])) {
	// Page URL
	$pageURL = filterPageURL($_GET['pageURL']);
	// Page number
	if(isset($_GET['pageNumber'])) {
		$pageNumber = $_GET['pageNumber'];
	}
	// Page items
	if(isset($_GET['pageItems'])) {
		$pageItems = $_GET['pageItems'];
	}
	// Get page ID
	$pageID = getPageIDByURL($pageURL);
	
	// 0. 404 page not found
	if($pageID == '0') {
		// Invalid page
		include_once $_SERVER['DOCUMENT_ROOT'] . '/PHP_CART/404.php';
		exit();
	}
	// 1. Home
	if($pageID == $GLOBALS['SITE_PAGE_HOME']) {
		header('location: ' . $GLOBALS['URL']);
		exit();
	}
	
	// 2. Products
	if($pageID == $GLOBALS['SITE_PAGE_PRODUCTS']) {
		include_once 'pages/page.products.php';
		
	}
	
	// 3. Cart
	if($pageID == $GLOBALS['SITE_PAGE_CART']) {
		include_once 'pages/page.cart.php';
		
	}
	
	// 4. Payment
	if($pageID == $GLOBALS['SITE_PAGE_PAYMENT']) {
		include_once 'pages/page.payment.php';
		
	}
	
	// 5. Log in
	if($pageID == $GLOBALS['SITE_PAGE_LOGIN']) {
		include_once 'pages/page.login.php';
		
	}
	
	// 6. Sign up
	if($pageID == $GLOBALS['SITE_PAGE_SIGNUP']) {
		include_once 'pages/page.signup.php';
		
	}
	
	// 7. Forgot password
	if($pageID == $GLOBALS['SITE_PAGE_LOST_PASS']) {
		include_once 'pages/page.password.forgot.php';
		
	}
	
	// 8. Member area
	if($pageID == $GLOBALS['SITE_PAGE_AREA']) {
		include_once 'pages/page.member.area.php';
		
	}
	
	// 9. Settings
	if($pageID == $GLOBALS['SITE_PAGE_SETTINGS']) {
		include_once 'pages/page.settings.php';
		
	}
	
	// 10. Change password
	if($pageID == $GLOBALS['SITE_PAGE_CHANGE_PASS']) {
		include_once 'pages/page.password.change.php';
		
	}
	
	// 11. Log out
	if($pageID == $GLOBALS['SITE_PAGE_LOGOUT']) {
		include_once 'pages/page.logout.php';
		
	}
	
	// 12. Wish list
	if($pageID == $GLOBALS['SITE_PAGE_WISH_LIST']) {
		include_once 'pages/page.wish.list.php';
		
	}
	
	// 13. Invoice
	if($pageID == $GLOBALS['SITE_PAGE_INVOICE']) {
		include_once 'pages/page.invoice.php';
		
	}
	


} else {
	// Home page
	$pageID = filterID($GLOBALS['SITE_PAGE_HOME']);
}
// New page
$page = new Page($pageID);

// Validate page
if($page->exists == false) {
	// Invalid page
	include_once $_SERVER['DOCUMENT_ROOT'] . '/PHP_CART/404.php';
	exit();
}

// Check page status
if($page->status == 'draft' || $page->status == 'trash'){
	// Page not public
	include_once $_SERVER['DOCUMENT_ROOT'] . '/PHP_CART/404.php';
		exit();
}

// Get page title
if($GLOBALS['SITE_NAME_SHOW'] == '1') {
	// Show title with site name
	$pageTitle = $page->title . ' | ' . $GLOBALS['SITE_NAME'];
} else {
	// Show title without site name
	$pageTitle = $page->title;
}

// Get page meta
$pageKeywords = $page->keywords;
$pageDescription = $page->aboutShort;

// Get page content decrypted
$page->aboutLong = html_entity_decode($page->aboutLong, ENT_QUOTES);
$page->aboutLong = decryptDynamicURL($page->aboutLong);
$page->aboutLong = $pageContent . $page->aboutLong;

// Get sidebar
$pageSidebarID = $page->sidebarID;
$pageSidebarPosition = $page->sidebarPosition;

// Check page CSS
if($page->CSS != '' && $page->CSS != ' ') {
	// Decrypt CSS
	$page->CSS = html_entity_decode($page->CSS, ENT_QUOTES);
	$pageCSS = '
		<style type ="text/css">
	' . $page->CSS . '
		</style>
	';
} else {
	$pageCSS = '';
}

// Get scripts
$pageScriptTop = html_entity_decode($page->scriptTop, ENT_QUOTES);
$pageScriptBottom = html_entity_decode($page->scriptBottom, ENT_QUOTES);

// Update page views
$page->updateViews();

?>
