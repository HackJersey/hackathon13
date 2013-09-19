<?php 
/**
*	HackJersey Functions
*	@author Jenn Schiffer
*	@version 0.1
*	@package hackjersey
*/

/**
* Connects to the mysql database
*/
function hackjerseyConnect() {
	
	$link = mysql_connect('localhost', 'root', 'root');
	if (!$link) {
		die('Could not connect to mysql: ' . mysql_error());
	}
	
	$hackjerseyDatabase = mysql_select_db("hackjersey", $link);
	if (!$hackjerseyDatabase) {
		die('Could not reach database: ' . mysql_error());
	}
}

/**
* Get the names of different table fields
*/
function getName($id, $table) {
	$list = mysql_query("SELECT * FROM $table WHERE `ID` = $id");
	$count = mysql_num_rows($list);
	if ($count == 1) { 
		while ( $row = mysql_fetch_array($list)) {
			$name = $row['name'];				
		}
	}
	else echo "multiple id error - procedures";
	return $name;
}

/**
* Get the information about a facility and return array of it
*/
function getFacility($id) {
	$facilities = mysql_query("SELECT * FROM facilities WHERE `ID` = $id");
	$count = mysql_num_rows($facilities);
	if ($count == 1) { 
		while ( $row = mysql_fetch_array($facilities)) {
			$name = $row['name'];
			$address = $row['address'];
			$city = $row['city'];
			$state = $row['state'];
			$zip = $row['zip'];
			$phone = $row['phone'];
			$website = $row['website'];
		}
		
		$facility = array( 
			"name" => $name,
			"address" => $address,
			"city" => $city,
			"state" => $state,
			"zip" => $zip,
			"phone" => $phone,
			"website" => $website
    	);
	}
	else echo "multiple id error - " . $count . "facilities";
	return $facility;
}

/**
* Get dropdown selector of all procedures
*/
function getDropdownProcedures() {
	$procedures = mysql_query("SELECT * FROM procedures");
	$count = mysql_num_rows($procedures);
	if ($count != 0) { 
		while ( $row = mysql_fetch_array($procedures)) {
			$id = $row['ID'];
			$name = $row['name'];
			echo '<option value="' . $id . '">' . $name . '</option>';
		}
	}
	else echo "no data error - procedures";
}

/**
* Get dropdown selector of all insurance options
*/
function getDropdownInsurance() {
	$insuranceStatuses = mysql_query("SELECT * FROM insurance");
	$count = mysql_num_rows($insuranceStatuses);
	if ($count != 0) { 
		while ( $row = mysql_fetch_array($insuranceStatuses)) {
			$id = $row['ID'];
			$name = $row['name'];
			echo '<option value="' . $id . '">' . $name . '</option>';
		}
	}
	else echo "no data error - insurance statuses";
}

/**
* Save price to database
*/
function savePrice($procedureID, $insuranceID, $provider, $address, $city, $state, $zip, $phone, $website, $cost, $comments, $source, $entryDate, $ip) {

	// get facility ID or create new one
	$facilities = mysql_query("SELECT * FROM facilities WHERE `name` = '$provider' AND `city` = '$city'");
	$count = mysql_num_rows($facilities);
	if ($count == 0) {
		saveFacility($provider, $address, $city, $state, $zip, $phone, $website);
		$facilityID = mysql_insert_id();
	}
	else {
		while ( $row = mysql_fetch_array($facilities) ) {
			$facilityID = $row['ID'];
		}
	}
		
	// get source ID
	$sources = mysql_query("SELECT * FROM sources WHERE `name` = '$source'");
	$count = mysql_num_rows($sources);
	if ($count == 1) { 
		while ( $row = mysql_fetch_array($sources) ) {
			$sourceID = $row['ID'];
		}
	}
	else echo "no data error - source ";

	
	mysql_query("INSERT INTO prices (`procedureID`, `facilityID`, `insuranceID`, `sourceID`, `cost`, `comments`, `entryDate`, `IP`) VALUES ( '$procedureID', '$facilityID', '$insuranceID', '$sourceID', '$cost', '$comments', '$entryDate', '$ip');") or die('There was an error saving: ' . mysql_error());

}

/**
* Save facility to database
*/
function saveFacility($provider, $address, $city, $state, $zip, $phone, $website) {
	mysql_query("INSERT INTO facilities (`name`, `address`, `city`, `state`, `zip`, `phone`, `website`) VALUES ( '$provider', '$address', '$city', '$state', '$zip', '$phone', '$website');") or die('There was an error saving: ' . mysql_error());

}

/**
* Get dropdown selector of all counties
*/
function getDropdownCounties() {
	$counties = mysql_query("SELECT * FROM counties");
	$count = mysql_num_rows($counties);
	if ($count != 0) { 
		while ( $row = mysql_fetch_array($counties)) {
			$id = $row['id'];
			$name = $row['name'];
			echo '<option value="' . $id . '">' . $name . '</option>';
		}
	}
	else echo "no data error - counties";
}

/**
* Get county ID of municipality
*/
function getCounty($municipality) {
	$boro = $municipality . " Boro";
	$twp = $municipality . " Twp";
	$city = $municipality . " City";
	$town = $municipality . " Town";
	$village = $municipality . " Village";
	
	$municipalities = mysql_query("SELECT * FROM municipalities WHERE `name` = '$municipality' OR `name` = '$boro' OR `name` = '$twp' OR `name` = '$city' OR `name` = '$town' OR `name` = '$village'");
	$count = mysql_num_rows($municipalities);
	if ($count != 0) {
		while ( $row = mysql_fetch_array($municipalities)) {
			$id = $row['countyID'];
		}
	}
	else return null;
	
	return $id;
}

/**
* Get locale of county
*/
function getLocale($countyID) {
	$locales = mysql_query("SELECT * FROM counties WHERE `id` = '$countyID'");
	$count = mysql_num_rows($locales);
	if ($count != 0) {
		while ( $row = mysql_fetch_array($locales)) {
			$locale = $row['locale'];
		}
	}
	else return null;

	return $locale;
}

/**
* Get medicare price of a locale and procedure
*/
function getMedicareCost($locale, $procedureID) {
	$costs = mysql_query("SELECT * FROM medicare WHERE `locale` = '$locale' AND `procedureID` = '$procedureID'");
	$count = mysql_num_rows($costs);
	if ($count != 0) {
		while ( $row = mysql_fetch_array($costs)) {
			$cost = $row['cost'];
		}
	}
	else return null;

	return $cost;
}				


?>