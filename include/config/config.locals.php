<?php

// Validation
if(_VALID !='Yes')
{// Restricted access
	include_once($_SERVER['DOCUMENT_ROOT'] . '/PHP_CART/404.php');
	exit();
}

// Default settings
$config = array();

// Website
$config['SITE_NAME'] = 'PHP Shopping Cart';
$config['SITE_NAME_SHOW'] = '1';
$config['SITE_LANG'] = 'en_US';
$config['SITE_LANG_SHORT'] = 'en';
$config['SITE_THEME'] = 'Default';
$config['SITE_THEME_PATH'] = 'default';
$config['SITE_THEME_PATH_BACK'] = $GLOBALS['THEMES_PATH'] . '/' . $config['SITE_THEME_PATH'] . '/backend';
$config['SITE_THEME_PATH_FRONT'] = $GLOBALS['THEMES_PATH'] . '/' . $config['SITE_THEME_PATH'] . '/frontend';
$config['SITE_META_TAGS'] = 'HP Shopping Cart, learn code, php, mysqli, html, css, more';
$config['SITE_META_DESC'] = 'Learn how to create an amazing PHP Shoppping Cart';
$config['SITE_META_CHARSET'] = 'UTF-8';
$config['SITE_COPY'] = '&copy; 2019 Lukasz Rutkowsky';
$config['SITE_DEV_MODE'] = '1';

$config['SITE_PAGE_HOME'] = '1';
$config['SITE_PAGE_PRODUCTS'] = '2';
$config['SITE_PAGE_CART'] = '3';
$config['SITE_PAGE_PAYMENT'] = '4';
$config['SITE_PAGE_LOGIN'] = '5';
$config['SITE_PAGE_SIGNUP'] = '6';
$config['SITE_PAGE_LOST_PASS'] = '7';
$config['SITE_PAGE_AREA'] = '8';
$config['SITE_PAGE_SETTINGS'] = '9';
$config['SITE_PAGE_CHANGE_PASS'] = '10';
$config['SITE_PAGE_LOGOUT'] = '11';
$config['SITE_PAGE_WISH_LIST'] = '12';
$config['SITE_PAGE_INVOICE'] = '13';

$config['SITE_UPDATE'] = '29-09-2019';
$config['SITE_TIME_ZONE'] = 'Europe/Warsaw';
$config['SITE_DATE_FORMAT'] = 'd m, Y';
$config['SITE_TIME_FORMAT'] = 'g:i a';
$config['SITE_DATE_TIME_FORMAT'] = 'j F, Y g:i a';

// Shop
$config['SHOP_STATUS'] = '1';
$config['SHOP_CURRENCY'] = 'USD';
$config['SHOP_CURRENCY_ICON'] = 'fa fa-usd';
$config['SHOP_CURRENCY_TS'] = 'c';
$config['SHOP_CURRENCY_DS'] = 'd';
$config['SHOP_CURRENCY_ND'] = '2';
$config['SHOP_ORDER_MIN'] = '10.00';
$config['SHOP_ORDER_MAX'] = '100,000.00';
$config['SHOP_ORDER_MEMBERS'] = '0';
$config['SHOP_ORDER_SHIPPING'] = '0';
$config['SHOP_ORDER_TAXES'] = '1';
$config['SHOP_ORDER_COUPONS'] = '1';
$config['SHOP_UNIT_WEIGHT'] = 'kg';
$config['SHOP_UNIT_DIM'] = 'cm';
$config['SHOP_COST_WEIGHT'] = '1.00';
$config['SHOP_COST_DIM'] = '1.50';
$config['SHOP_REVIEWS_AUTO'] = '1';

// Layout
$config['LAYOUT_MENU_TOP'] = '1';
$config['LAYOUT_MENU_MAIN'] = '1';
$config['LAYOUT_MENU_BOTTOM'] = '1';
$config['LAYOUT_SIDEBAR'] = '1';
$config['LAYOUT_SIDEBAR_POSITION'] = 'right';

// Admin
$config['ADMIN_THEME'] = 'Default';
$config['ADMIN_THEME_PATH'] = 'default';
?>