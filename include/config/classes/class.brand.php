<?php

//define('_VALID', 'Yes');

// Validation
if(_VALID != 'Yes')
{// Restricted access
	include_once($_SERVER['DOCUMENT_ROOT'] . '/404.php');
	exit();
}

// Brand class
class Brand {
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
	public function __construct($brandID) {
		// Filter ID
		$brandID = preg_replace('#(^0-9)#', '', $brandID);
		
		$sqlBrandCheck = "SELECT * FROM sc_products_brands WHERE brandID='$brandID' LIMIT 1";
		$queryBrandCheck = $GLOBALS['mysqli']->query($sqlBrandCheck);
		
		// Check brand
		if ($queryBrandCheck === FALSE) {
			// Query crash
			$this->exists = false;
		} else {
			$countBrandCheck = $queryBrandCheck->num_rows;
			
			if ($countBrandCheck == 1) {
				// Valid brand
				$rowBrandCheck = $queryBrandCheck->fetch_assoc();
				
				// Extract values
				$this->ID = $rowBrandCheck['brandID'];
				$this->name = $rowBrandCheck['brandName'];
				$this->URL = $rowBrandCheck['brandURL'];
				$this->thumbnail = $rowBrandCheck['brandThumbnail'];
				$this->aboutLong = $rowBrandCheck['brandAboutLong'];
				$this->sidebarID = $rowBrandCheck['brandSidebarID'];
				$this->sidebarPosition = $rowBrandCheck['brandSidebarPosition'];
				$this->status = $rowBrandCheck['brandStatus'];
				$this->update = $rowBrandCheck['brandUpdate'];
				$this->added = $rowBrandCheck['brandAdded'];
				
				$this->exists = true;
				
			} else {
				// Invalid brand
				$this->exists = false;
			}
		}
	}
	
}


?>