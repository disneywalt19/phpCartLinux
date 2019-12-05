<?php

//define('_VALID', 'Yes');

// Validation
if(_VALID != 'Yes')
{// Restricted access
	include_once($_SERVER['DOCUMENT_ROOT'] . '/404.php');
	exit();
}

// Category class
class Category {
	// Properties
	public $ID;
	public $name;
	public $URL;
	public $thumbnail;
	public $aboutLong;
	public $sidebarID;
	public $sidebarPosition;
	public $status;
	public $update;
	public $added;
	public $exists = false;
	
	// Load class
	public function __construct($categoryID) {
		// Filter ID
		$categoryID = preg_replace('#(^0-9)#', '', $categoryID);
		
		$sqlCategoryCheck = "SELECT * FROM sc_products_categories WHERE categoryID='$categoryID' LIMIT 1";
		$queryCategoryCheck = $GLOBALS['mysqli']->query($sqlCategoryCheck);
		
		// Check category
		if ($queryCategoryCheck === FALSE) {
			// Query crash
			$this->exists = false;
		} else {
			$countCategoryCheck = $queryCategoryCheck->num_rows;
			
			if ($countCategoryCheck ==1) {
				// Valid category
				$rowCategoryCheck = $queryCategoryCheck->fetch_assoc();
				
				// Extract values
				$this->ID = $rowCategoryCheck['categoryID'];
				$this->name = $rowCategoryCheck['categoryName'];
				$this->URL = $rowCategoryCheck['categoryURL'];
				$this->thumbnail = $rowCategoryCheck['categoryThumbnail'];
				$this->aboutLong = $rowCategoryCheck['categoryAboutLong'];
				$this->sidebarID = $rowCategoryCheck['categorySidebarID'];
				$this->sidebarPosition = $rowCategoryCheck['categorySidebarPosition'];
				$this->status = $rowCategoryCheck['categoryStatus'];
				$this->update = $rowCategoryCheck['categoryUpdate'];
				$this->added = $rowCategoryCheck['categoryAdded'];
				
				$this->exists = true;
				
			} else {
				// Invalid category
				$this->exists = false;
			}
		}
	}
	
}


?>