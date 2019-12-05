<?php

// Validation
if(_VALID !='Yes')
{// Restricted access
	include_once($_SERVER['DOCUMENT_ROOT'] . '/404.php');
	exit();
}

// Product class
class Product {
	// Properties
	public $ID;
	public $SKU;
	public $name;
	public $thumbnail;
	public $URL;
	public $stock;
	public $price;
	public $priceSale;
	public $aboutShort;
	public $aboutLong;
	public $keywords;
	public $brandID;
	public $weight;
	public $dimensionLength;
	public $dimensionWidth;
	public $dimensionHeight;
	public $suggestions;
	public $comments;
	public $sidebarID;
	public $sidebarPosition;
	public $views;
	public $sold;
	public $CSS;
	public $status;
	public $update;
	public $added;
	public $exists = false;
	
	// Load class
	public function __construct($productID) {
		// Filter ID
		$productID = preg_replace('#[^0-9]#','', $productID);
		
		$sqlProductCheck = "SELECT * FROM sc_products WHERE productID='$productID' LIMIT 1";
		$queryProductCheck = $GLOBALS['mysqli']->query($sqlProductCheck);
		
		// Check products
		if ($queryProductCheck === FALSE){
			// Query crash
			$this->exists = false;
		} else {
			$countProductCheck = $queryProductCheck->num_rows;
			
			if ($countsProductCheck == 1) {
				// Valid product
				$rowProductCheck = $queryProductCheck->fetch_assoc();
				
					// Extract product
				$this->ID 			   = $rowProductCheck['productID'];
				$this->SKU 			   = $rowProductCheck['productSKU'];
				$this->name 		   = $rowProductCheck['productName'];
				$this->thumbnail 	   = $rowProductCheck['productThumbnail'];
				$this->URL 			   = $rowProductCheck['productURL'];
				$this->stock 		   = $rowProductCheck['productStock'];
				$this->price 		   = $rowProductCheck['productPrice'];
				$this->priceSale 	   = $rowProductCheck['productPriceSale'];
				$this->aboutShort 	   = $rowProductCheck['productAboutShort'];
				$this->aboutLong 	   = $rowProductCheck['productAboutLong'];
				$this->keywords 	   = $rowProductCheck['productkeywords'];
				$this->brandID 	 	   = $rowProductCheck['brandID'];
				$this->categoryID 	   = $rowProductCheck['categoryID'];
				$this->weight 		   = $rowProductCheck['productWeight'];
				$this->dimensionLength = $rowProductCheck['productDimensionLength'];
				$this->dimensionWidth  = $rowProductCheck['productDimensionWitdh'];
				$this->dimensionHeight = $rowProductCheck['productDimensioneHeight'];
				$this->suggestions 	   = $rowProductCheck['productSuggestions'];
				$this->comments 	   = $rowProductCheck['productComments'];
				$this->sidebarID 	   = $rowProductCheck['productSidebarID'];
				$this->sidebarPosition = $rowProductCheck['productSidebarPositions'];
				$this->views 		   = $rowProductCheck['productViews'];
				$this->sold 		   = $rowProductCheck['productSold'];
				$this->CSS 			   = $rowProductCheck['productCSS'];
				$this->status 		   = $rowProductCheck['productStatus'];
				$this->update 		   = $rowProductCheck['productUpdate'];
				$this->exists 		   = true;
			} else {
				// Invalid product
				$this->exists = false;
			}
		}
	}
}

?>