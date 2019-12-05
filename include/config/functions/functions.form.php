<?php


// Validation
if (_VALID != 'Yes') {
	// Restricted access
	include_once($_SERVER['DOCUMENT_ROOT'] . '/404.php');
    exit();
}


// Form functions
// Filter IP address
function filterIPAddress($IP) {
	$IP = strip_tags($IP);
	$IP = $GLOBALS['mysqli']->real_escape_string($IP);
	
	return $IP;
}


// Filter country
function filterCountry($country) {
	$countryFiltered = '';
	$countriesArray = array(
	    'A1' => 'Anonymous Proxy',
	    'A2' => 'Satellite Provider',
	    'AD' => 'Andorra',
	    'AE' => 'United Arab Emirates',
	    'AF' => 'Afghanistan',
	    'AG' => 'Antigua and Barbuda',
	    'AI' => 'Anguilla',
	    'AL' => 'Albania',
	    'AM' => 'Armenia',
	    'AN' => 'Netherlands Antilles',
	    'AO' => 'Angola',
	    'AP' => 'Asia/Pacific Region',
	    'AQ' => 'Antarctica',
	    'AR' => 'Argentina',
	    'AS' => 'American Samoa',
	    'AT' => 'Austria',
	    'AU' => 'Australia',
	    'AW' => 'Aruba',
	    'AX' => 'Aland Islands',
	    'AZ' => 'Azerbaijan',
	    'BA' => 'Bosnia and Herzegovina',
	    'BB' => 'Barbados',
	    'BD' => 'Bangladesh',
	    'BE' => 'Belgium',
	    'BF' => 'Burkina Faso',
	    'BG' => 'Bulgaria',
	    'BH' => 'Bahrain',
	    'BI' => 'Burundi',
	    'BJ' => 'Benin',
	    'BM' => 'Bermuda',
	    'BN' => 'Brunei Darussalam',
	    'BO' => 'Bolivia',
	    'BR' => 'Brazil',
	    'BS' => 'Bahamas',
	    'BT' => 'Bhutan',
	    'BV' => 'Bouvet Island',
	    'BW' => 'Botswana',
	    'BY' => 'Belarus',
	    'BZ' => 'Belize',
	    'CA' => 'Canada',
	    'CC' => 'Cocos (Keeling) Islands',
	    'CD' => 'Congo, The Democratic Republic of the',
	    'CF' => 'Central African Republic',
	    'CG' => 'Congo',
	    'CH' => 'Switzerland',
	    'CI' => 'Cote d\'Ivoire',
	    'CK' => 'Cook Islands',
	    'CL' => 'Chile',
	    'CM' => 'Cameroon',
	    'CN' => 'China',
	    'CO' => 'Colombia',
	    'CR' => 'Costa Rica',
	    'CU' => 'Cuba',
	    'CV' => 'Cape Verde',
	    'CX' => 'Christmas Island',
	    'CY' => 'Cyprus',
	    'CZ' => 'Czech Republic',
	    'DE' => 'Germany',
	    'DJ' => 'Djibouti',
	    'DK' => 'Denmark',
	    'DM' => 'Dominica',
	    'DO' => 'Dominican Republic',
	    'DZ' => 'Algeria',
	    'EC' => 'Ecuador',
	    'EE' => 'Estonia',
	    'EG' => 'Egypt',
	    'EH' => 'Western Sahara',
	    'ER' => 'Eritrea',
	    'ES' => 'Spain',
	    'ET' => 'Ethiopia',
	    'EU' => 'Europe',
	    'FI' => 'Finland',
	    'FJ' => 'Fiji',
	    'FK' => 'Falkland Islands (Malvinas)',
	    'FM' => 'Micronesia, Federated States of',
	    'FO' => 'Faroe Islands',
	    'FR' => 'France',
	    'GA' => 'Gabon',
	    'GB' => 'United Kingdom',
	    'GD' => 'Grenada',
	    'GE' => 'Georgia',
	    'GF' => 'French Guiana',
	    'GG' => 'Guernsey',
	    'GH' => 'Ghana',
	    'GI' => 'Gibraltar',
	    'GL' => 'Greenland',
	    'GM' => 'Gambia',
	    'GN' => 'Guinea',
	    'GP' => 'Guadeloupe',
	    'GQ' => 'Equatorial Guinea',
	    'GR' => 'Greece',
	    'GS' => 'South Georgia and the South Sandwich Islands',
	    'GT' => 'Guatemala',
	    'GU' => 'Guam',
	    'GW' => 'Guinea-Bissau',
	    'GY' => 'Guyana',
	    'HK' => 'Hong Kong',
	    'HM' => 'Heard Island and McDonald Islands',
	    'HN' => 'Honduras',
	    'HR' => 'Croatia',
	    'HT' => 'Haiti',
	    'HU' => 'Hungary',
	    'ID' => 'Indonesia',
	    'IE' => 'Ireland',
	    'IL' => 'Israel',
	    'IM' => 'Isle of Man',
	    'IN' => 'India',
	    'IO' => 'British Indian Ocean Territory',
	    'IQ' => 'Iraq',
	    'IR' => 'Iran, Islamic Republic of',
	    'IS' => 'Iceland',
	    'IT' => 'Italy',
	    'JE' => 'Jersey',
	    'JM' => 'Jamaica',
	    'JO' => 'Jordan',
	    'JP' => 'Japan',
	    'KE' => 'Kenya',
	    'KG' => 'Kyrgyzstan',
	    'KH' => 'Cambodia',
	    'KI' => 'Kiribati',
	    'KM' => 'Comoros',
	    'KN' => 'Saint Kitts and Nevis',
	    'KP' => 'Korea, Democratic People\'s Republic of',
	    'KR' => 'Korea, Republic of',
	    'KW' => 'Kuwait',
	    'KY' => 'Cayman Islands',
	    'KZ' => 'Kazakhstan',
	    'LA' => 'Lao People\'s Democratic Republic',
	    'LB' => 'Lebanon',
	    'LC' => 'Saint Lucia',
	    'LI' => 'Liechtenstein',
	    'LK' => 'Sri Lanka',
	    'LR' => 'Liberia',
	    'LS' => 'Lesotho',
	    'LT' => 'Lithuania',
	    'LU' => 'Luxembourg',
	    'LV' => 'Latvia',
	    'LY' => 'Libyan Arab Jamahiriya',
	    'MA' => 'Morocco',
	    'MC' => 'Monaco',
	    'MD' => 'Moldova, Republic of',
	    'ME' => 'Montenegro',
	    'MG' => 'Madagascar',
	    'MH' => 'Marshall Islands',
	    'MK' => 'Macedonia',
	    'ML' => 'Mali',
	    'MM' => 'Myanmar',
	    'MN' => 'Mongolia',
	    'MO' => 'Macao',
	    'MP' => 'Northern Mariana Islands',
	    'MQ' => 'Martinique',
	    'MR' => 'Mauritania',
	    'MS' => 'Montserrat',
	    'MT' => 'Malta',
	    'MU' => 'Mauritius',
	    'MV' => 'Maldives',
	    'MW' => 'Malawi',
	    'MX' => 'Mexico',
	    'MY' => 'Malaysia',
	    'MZ' => 'Mozambique',
	    'NA' => 'Namibia',
	    'NC' => 'New Caledonia',
	    'NE' => 'Niger',
	    'NF' => 'Norfolk Island',
	    'NG' => 'Nigeria',
	    'NI' => 'Nicaragua',
	    'NL' => 'Netherlands',
	    'NO' => 'Norway',
	    'NP' => 'Nepal',
	    'NR' => 'Nauru',
	    'NU' => 'Niue',
	    'NZ' => 'New Zealand',
	    'OM' => 'Oman',
	    'PA' => 'Panama',
	    'PE' => 'Peru',
	    'PF' => 'French Polynesia',
	    'PG' => 'Papua New Guinea',
	    'PH' => 'Philippines',
	    'PK' => 'Pakistan',
	    'PL' => 'Poland',
	    'PM' => 'Saint Pierre and Miquelon',
	    'PN' => 'Pitcairn',
	    'PR' => 'Puerto Rico',
	    'PS' => 'Palestinian Territory',
	    'PT' => 'Portugal',
	    'PW' => 'Palau',
	    'PY' => 'Paraguay',
	    'QA' => 'Qatar',
	    'RE' => 'Reunion',
	    'RO' => 'Romania',
	    'RS' => 'Serbia',
	    'RU' => 'Russian Federation',
	    'RW' => 'Rwanda',
	    'SA' => 'Saudi Arabia',
	    'SB' => 'Solomon Islands',
	    'SC' => 'Seychelles',
	    'SD' => 'Sudan',
	    'SE' => 'Sweden',
	    'SG' => 'Singapore',
	    'SH' => 'Saint Helena',
	    'SI' => 'Slovenia',
	    'SJ' => 'Svalbard and Jan Mayen',
	    'SK' => 'Slovakia',
	    'SL' => 'Sierra Leone',
	    'SM' => 'San Marino',
	    'SN' => 'Senegal',
	    'SO' => 'Somalia',
	    'SR' => 'Suriname',
	    'ST' => 'Sao Tome and Principe',
	    'SV' => 'El Salvador',
	    'SY' => 'Syrian Arab Republic',
	    'SZ' => 'Swaziland',
	    'TC' => 'Turks and Caicos Islands',
	    'TD' => 'Chad',
	    'TF' => 'French Southern Territories',
	    'TG' => 'Togo',
	    'TH' => 'Thailand',
	    'TJ' => 'Tajikistan',
	    'TK' => 'Tokelau',
	    'TL' => 'Timor-Leste',
	    'TM' => 'Turkmenistan',
	    'TN' => 'Tunisia',
	    'TO' => 'Tonga',
	    'TR' => 'Turkey',
	    'TT' => 'Trinidad and Tobago',
	    'TV' => 'Tuvalu',
	    'TW' => 'Taiwan',
	    'TZ' => 'Tanzania, United Republic of',
	    'UA' => 'Ukraine',
	    'UG' => 'Uganda',
	    'UM' => 'United States Minor Outlying Islands',
	    'US' => 'United States',
	    'UY' => 'Uruguay',
	    'UZ' => 'Uzbekistan',
	    'VA' => 'Holy See (Vatican City State)',
	    'VC' => 'Saint Vincent and the Grenadines',
	    'VE' => 'Venezuela',
	    'VG' => 'Virgin Islands, British',
	    'VI' => 'Virgin Islands, U.S.',
	    'VN' => 'Vietnam',
	    'VU' => 'Vanuatu',
	    'WF' => 'Wallis and Futuna',
	    'WS' => 'Samoa',
	    'YE' => 'Yemen',
	    'YT' => 'Mayotte',
	    'ZA' => 'South Africa',
	    'ZM' => 'Zambia',
	    'ZW' => 'Zimbabwe'
	);
	
	foreach ($countriesArray as $countryIndex => $countryValue) {
		if (preg_match("~$countryValue~", $country)) {
			$countryFiltered = $countryValue;
			break;
		} else {
			$countryFiltered = 'Unknown countryyyy';
		}
	}
	
	// Filter country 
	$countryFiltered = $GLOBALS['mysqli']->real_escape_string($countryFiltered);
	
	return $countryFiltered;
}


// Filter country code
function filterCountryCode($countryCode) {
	if ($countryCode != '' && $countryCode != ' ') {
		if ($countryCode < 4) {
			$countryCode = preg_replace('#[^A-Z]#', '', $countryCode);
		} else {
			$countryCode = '';
		}
	} else {
		$countryCode = '';
	}
	
	return $countryCode;
}


// Filter state
function filterState($state) {
	if ($state != '' && $state != ' ') {
		if (strlen($state) < 51) {
		    $state = strip_tags($state);
		    $state = stripslashes($state);	
	    } else {
		    // Unknown state
		    $state = 'Unknown state';
	    }
	
	    $state = $GLOBALS['mysqli']->real_escape_string($state);
	
	    return $state;
	} else {
		return '';	
	}
}


// Filter city
function filterCity($city) {
	if ($city != '' && $city != ' ') {
	    if (strlen($city) < 51) {
		    $city = strip_tags($city);
		    $city = stripslashes($city);	
	    } else {
		    // Unknown city
		    $city = 'Unknown city';
	    }
	
	    $city = $GLOBALS['mysqli']->real_escape_string($city);
	
	    return $city;
	} else {
		return '';
	}
}


// Filter ID
function filterID($ID) {
	$IDFiltered = '';
	
	if (strlen($ID) < 21) {
		$IDFiltered = preg_replace('#[^0-9]#', '', $ID);
		
		return $IDFiltered;
	}
	
	return '';
}


// Filter URL
function filterPageURL($URL) {
	$URLFilterted = '';
	
	if (strlen($URL) < 501) {
		$URLFilterted = preg_replace('#[^A-Za-z0-9-]#i', '', $URL);
		
		return $URLFilterted;
	}
	
	return '';
}


// Filter username
function filterUsername($username) {
	$usernameFiltered = '';
	
	if (strlen($username) < 31) {
		$usernameFiltered = preg_replace('#[^A-Za-z0-9]#i', '', $username);
		
		return $usernameFiltered;
	}
	
	return '';
}


// Filter email
function filterEmail($email) {
	$email = filter_var($email, FILTER_SANITIZE_EMAIL);
	$email = $GLOBALS['mysqli']->real_escape_string($email);
	
	return $email;
}


// Validate email
function validateEmail($email) {
	if ($email != '' && $email != ' ') {
		if (strlen($email) < 256) {
			if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
				return true;
			}
		}
	}
	
	return false;
}


?>