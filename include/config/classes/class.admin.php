<?php


// Validation
if(_VALID !='Yes')
{// Restricted access
	include_once($_SERVER['DOCUMENT_ROOT'] . '/404.php');
	exit();
}

// Admin class
class Admin {
	// Properties
	public $ID;
	public $email;
	public $username;
	public $password;
	public $passwordRecovery;
	public $securityCode;
	public $securityEnabled;
	public $language;
	public $power;
	public $status;
	public $primary;
	public $loginIP;
	public $loginDate;
	public $added;
	public $adminLogged = false;

	// Load class
	public function __construct()
	{
		if ($this->isLogged()){
			// Load admin values
			$this->loadAdmin(); 
		}
	}
	
	// Check if logged
	public function isLogged()
	{	
		if (isset($_SESSION['sessionAdminID']) && isset($_SESSION['sessionAdminUser']) && isset($_SESSION['sessionAdminPass']))
		{	// Sessions
			$this->ID = preg_replace('#[^0-9]#','', $_SESSION['sessionAdminID']);
			$this->username = preg_replace('#[^A-Za-z0-9]#','', $_SESSION['sessionAdminUser']);
			$this->password = preg_replace('#[^A-Za-z0-9]#','', $_SESSION['sessionAdminPass']);
			
			$sqlLogin = "
					 SELECT adminEmail FROM sc_admins WHERE 
							adminID='" . $this->ID . "' AND
							adminUsername='" . $this->username . "' AND
							adminPassword='" . $this->password . "' AND
							adminStatus='1'
						LIMIT 1
			";
			$queryLogin = $GLOBALS['mysqli']->query($sqlLogin);
			
			// Check log in
			if ($queryLogin === FALSE)  {
				// Query crash
				return false;
			} else {
				$countLogin = $queryLogin->num_rows;
				
				if ($countLogin == 1) {
					// Valid admin
					return true;
				} else {
					// Invalid admin
					return false;
				}
			}				
		} else if (isset($_COOKIE['cookieAdminID']) && isset($_COOKIE['cookieAdminUser']) && isset($_COOKIE['cookieAdminPass'])) {
			
			// Cookies
		// Create sesssions
		
			$_SESSION['sessionAdminID'] = $_COOKIE['cookieAdminID'];
			$_SESSION['sessionAdminUser'] = $_COOKIE['cookieAdminUser'];
			$_SESSION['sessionAdminPass'] = $_COOKIE['cookieAdminPass'];
			
			$this->ID = preg_replace('#[^0-9]#','', $_SESSION['sessionAdminID']);
			$this->username = preg_replace('#[^A-Za-z0-9]#','', $_SESSION['sessionAdminUser']);
			$this->password = preg_replace('#[^A-Za-z0-9]#','', $_SESSION['sessionAdminPass']);
		
			$sqlLogin = "
					 SELECT adminEmail FROM sc_admins WHERE 
							adminID='" . $this->ID . "' AND
							adminUsername='" . $this->username . "' AND
							adminPassword='" . $this->password . "' AND
							adminStatus='1'
						LIMIT 1
			";
			$queryLogin = $GLOBALS['mysqli']->query($sqlLogin);
			
			// Check log in
			if ($queryLogin === FALSE)  {
				// Query crash
				return false;
			} else {
				$countLogin = $queryLogin->num_rows;
				
				if ($countLogin == 1) {
					// Valid admin
					return true;
				} else {
					// Invalid admin
					return false;
				}
			}
		}
		
	return false;
}
	
	// Load admin values
	public function loadAdmin() {
		$sqlLoadAdmin = "
			SELECT * FROM sc_admins WHERE 
							adminID='" . $this->ID . "' AND
							adminUsername='" . $this->username . "' AND
							adminPassword='" . $this->password . "' AND
							adminStatus='1'
						LIMIT 1
		";
		$queryLoadAdmin = $GLOBALS['mysqli']->query($sqlLoadAdmin);
		
		if ($queryLoadAdmin === FALSE) {
			// Query crash
			$this->adminLogged = false;
			
		} else {
			$countLoadAdmin = $queryLoadAdmin->num_rows;
			
			if ($countLoadAdmin  == 1) {
				// Valid admin
				$rowLoadAdmin = $queryLoadAdmin->fetch_assoc();
				// Extract values
				$this->ID = $rowLoadAdmin['adminID'];
				$this->email = $rowLoadAdmin['adminEmail'];
				$this->username = $rowLoadAdmin['adminUsername'];
				$this->password = $rowLoadAdmin['adminPassword'];
				$this->passwordRecovery = $rowLoadAdmin['adminPasswordRecovery'];
				$this->securityCode = $rowLoadAdmin['adminSecurityCode'];
				$this->securityEnabled = $rowLoadAdmin['adminSecurityEnabled'];
				$this->language = $rowLoadAdmin['adminLanguage'];
				$this->power = $rowLoadAdmin['adminPower'];
				$this->status = $rowLoadAdmin['adminStatus'];
				$this->primary = $rowLoadAdmin['adminPrimary'];
				$this->loginIP = $rowLoadAdmin['adminLoginIP'];
				$this->loginDate = $rowLoadAdmin['adminLoginDate'];
				$this->added = $rowLoadAdmin['adminAdded'];
				
				
				if ($this->status == '1') {  
						// Valid logged
						$this->adminLogged = true;
					}
				// Language check
				if($this->language == '') {
					$this->language = 'en_US';
				}
				
			} else {
				// Invalid admin
				$this->adminLogged = false;
			}
		}
	}
}

?>