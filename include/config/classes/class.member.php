<?php


// Validation
if(_VALID !='Yes')
{// Restricted access
	include_once($_SERVER['DOCUMENT_ROOT'] . '/404.php');
	exit();
}

// Member class
class Member {
	// Properties
	public $ID;
	public $firstName;
	public $lastName;
	public $email;
	public $password;
	public $passwordRecovery;
	public $phone;
	public $country;
	public $state;
	public $city;
	public $address;
	public $ZIP;
	public $wishList;
	public $status;
	public $activated;
	public $updated;
	public $loginIP;
	public $loginDate;
	public $signupIP;
	public $signupDate;
	public $memberLogged = false;

	// Load class
	public function __construct()
	{
		if ($this->isLogged()){
			// Load member values
			$this->loadMember(); 
		}
	}
	
	// Check if logged
	public function isLogged()
	{	
		if (isset($_SESSION['sessionMemberID']) && isset($_SESSION['sessionMemberEmail']) && isset($_SESSION['sessionMemberPass']))
		{	// Sessions
			$this->ID 	 	= preg_replace('#[^0-9]#','', $_SESSION['sessioMemberID']);
			$this->email 	= $_SESSION['sessionMemberEmail'];
			$this->password = preg_replace('#[^A-Za-z0-9]#','', $_SESSION['sessioMemberPass']);
			// Validate email
			if (!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
				// Invalid email address
				return false;
			}
			// Filer email
			$this->email = $GLOBALS['mysqli']->real_escape_string($this->email);
			
			$sqlLogin = "
					 SELECT memberFirstName FROM sc_members WHERE 
							memberID='" . $this->ID . "' AND
							memberEmail='" . $this->email . "' AND
							memberPassword='" . $this->password . "'
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
					// Valid member
					return true;
				} else {
					// Invalid member
					return false;
				}
			}				
		} else if (isset($_COOKIE['cookieMemberID']) && isset($_COOKIE['cookieMemberEmail']) && isset($_COOKIE['cookieMemberPass'])) {
			
			// Cookies
		// Create sesssions
		
			$_SESSION['sessionMemberID'] 	= $_COOKIE['cookieMemberID'];
			$_SESSION['sessionMemberEmail'] = $_COOKIE['cookieMemberEmail'];
			$_SESSION['sessionMemberPass']  = $_COOKIE['cookieMemberPass'];
			
			$this->ID 	 	= preg_replace('#[^0-9]#','', $_SESSION['sessionMemberID']);
			$this->email 	= $_SESSION['sessionMemberEmail'];
			$this->password = preg_replace('#[^A-Za-z0-9]#','', $_SESSION['sessionMemberPass']);
			// Validate email
			if (!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
				// Invalid email address
				return false;
			}
			// Filer email
			$this->email = $GLOBALS['mysqli']->real_escape_string($this->email);
		
			$sqlLogin = "
					 SELECT memberFirstName FROM sc_members WHERE 
							memberID='" . $this->ID . "' AND
							memberEmail='" . $this->email . "' AND
							memberPassword='" . $this->password . "'
						LIMIT 1
			";
			$queryLogin = $GLOBALS['mysqli']->query($sqlLogin);
			
			// Check log in
			if ($queryLogin === FALSE)  {
				return false;
			} else {
				$countLogin = $queryLogin->num_rows;
				
				if ($countLogin == 1) {
					// Query crash
					return true;
				} else {
					// Invalid member
					return false;
				}
			}					
		}
	return false;

}
	
	// Load member values
	public function loadMember() {
		$sqlLoadMember = "
			SELECT * FROM sc_members WHERE 
				memberID='" . $this->ID . "' AND
				memberEmail='" . $this->email . "' AND
				memberPassword='" . $this->password . "'
				LIMIT 1
		";
		$queryLoadMember = $GLOBALS['mysqli']->query($sqlLoadMember);
		
		if ($queryLoadMember === FALSE) {
			// Query crash
			$this->memberLogged = false;
			
		} else {
			$countLoadMember = $queryLoadMember->num_rows;
			
			if ($countLoadMember  == 1) {
				// Valid member
				$rowLoadMember = $queryLoadMember->fetch_assoc();
				// Extract values
				$this->$ID 				 = $rowLoadMember['memberID'];
				$this->$firstName 		 = $rowLoadMember['memberFirstName'];
				$this->$lastName 		 = $rowLoadMember['memberLastName'];
				$this->$email 			 = $rowLoadMember['memberEmail'];
				$this->$password 		 = $rowLoadMember['memberPassword'];
				$this->$passwordRecovery = $rowLoadMember['memberPasswordRecovery'];
				$this->$phone 			 = $rowLoadMember['memberPhone'];
				$this->$country 		 = $rowLoadMember['memberCountry'];
				$this->$state 			 = $rowLoadMember['memberState'];
				$this->$city 			 = $rowLoadMember['memberCity'];
				$this->$address 		 = $rowLoadMember['memberAddress'];
				$this->$ZIP 			 = $rowLoadMember['memberZIP'];
				$this->$wishList 		 = $rowLoadMember['memberWishList'];
				$this->$status 			 = $rowLoadMember['memberStatus'];
				$this->$activated 		 = $rowLoadMember['memberActivated'];
				$this->$updated 		 = $rowLoadMember['memberUpdated'];
				$this->$loginIP 		 = $rowLoadMember['memberLoginIP'];
				$this->$loginDate 		 = $rowLoadMember['memberLoginDate'];
				$this->$signupIP 		 = $rowLoadMember['memberSignupIP'];
				$this->$signupDate 		 = $rowLoadMember['memberSignupDate'];
				
				// Check email activation
				if ($activated == '1') {
					if ($status == 'good') {
						// Valid logged
						$this->memberLogged = true;
					}
				}
				
			} else {
				// Invalid member
				$this->memberLogged = false;
			}
		}
	}
}
?>