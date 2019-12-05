<?php

//define('_VALID', 'Yes');

// Validation
if(_VALID != 'Yes')
{// Restricted access
	include_once($_SERVER['DOCUMENT_ROOT'] . '/404.php');
	exit();
}

// Page class
class Page {
	// Properties
	public $ID;
	public $title;
	public $URL;
	public $keywords;
	public $aboutShort;
	public $aboutLong;
	public $scriptTop;
	public $scriptBottom;
	public $CSS;
	public $sidebarID;
	public $sidebarPosition;
	public $views;
	public $status;
	public $update;
	public $added;
	public $exists = false;
	
	// Load class
	public function __construct($pageID) {
		// Filter ID
		$pageID = preg_replace('#(^0-9)#', '', $pageID);
		
		$sqlCheck = "SELECT * FROM sc_pages WHERE pageID='$pageID' LIMIT 1";
		$queryCheck = $GLOBALS['mysqli']->query($sqlCheck);
		
		// Check page
		if ($queryCheck === FALSE) {
			// Query crash
			$this->exists = false;
		} else {
			$countCheck = $queryCheck->num_rows;
			
			if ($countCheck == 1) {
				// Valid page
				$rowCheck = $queryCheck->fetch_assoc();
				
				// Extract values
				$this->ID = $rowCheck['pageID'];
				$this->title = $rowCheck['pageTitle'];
				$this->URL = $rowCheck['pageURL'];
				$this->keywords = $rowCheck['pageKeywords'];
				$this->aboutShort = $rowCheck['pageAboutShort'];
				$this->aboutLong = $rowCheck['pageAboutLong'];
				$this->scriptTop = $rowCheck['pageScriptTop'];
				$this->scriptBottom = $rowCheck['pageScriptBottom'];
				$this->CSS = $rowCheck['pageCSS'];
				$this->sidebarID = $rowCheck['pageSidebarID'];
				$this->sidebarPosition = $rowCheck['pageSidebarPosition'];
				$this->views = $rowCheck['pageViews'];
				$this->status = $rowCheck['pageStatus'];
				$this->update = $rowCheck['pageUpdate'];
				$this->added = $rowCheck['pageAdded'];
				
				$this->exists = true;
				
			} else {
				// Invalid page
				$this->exists = false;
			}
		}
	}
	// Update page views
	public function updateViews() {
		$newViews = $this->views +1;
		
		$sqlUpdateViews = "UPDATE sc_pages SET pageViews='$newViews' WHERE pageID='" . $this->ID . "' LIMIT 1";
		$queryUpdateViews = $GLOBALS['mysqli']->query($sqlUpdateViews);
		
		if($queryUpdateViews === FALSE) {
			return false;
		} else {
			return true;
		}
	}
}


?>