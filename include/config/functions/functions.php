<?php


// Validation
if (_VALID != 'Yes') {
	// Restricted access
	include_once($_SERVER['DOCUMENT_ROOT'] . '/404.php');
    exit();
}


// Get functions files
require_once 'functions.core.php';
require_once 'functions.page.php';
require_once 'functions.product.php';
require_once 'functions.brand.php';
require_once 'functions.category.php';
require_once 'functions.form.php';
require_once 'functions.traffic.php';
require_once 'functions.admin.php';



?>