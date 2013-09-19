<?php /** 
	   * Import Procedures Script
	   * Pulling in data from all over the World Wide Webs
	   */ ?>

<!DOCTYPE html>
<head>
	<title>Prices Import</title>
	
	<?php 
		/* include all files in /function directory */
		include "../functions.php";
		
		/* connect to the database */
		hackjerseyConnect();
	?>
</head>
<body>

<?php 
	if ( $_POST['submission'] == "1") {
		// validate and import
		$delimitedText = stripslashes($_POST['delimited']);
		$delimitedTextItems = explode( '
', $delimitedText );		
		$row = array();
		$count = 1;
		
		foreach ($delimitedTextItems as $rowItem) {
			$row[$count] = explode( ',', $rowItem );
			$count++;
		}
		$count = 1;
		
		foreach ($row as $columnItem) {
		
			$procedureID = trim($columnItem[2]);
			$facilityName = trim($columnItem[0]);
			$facilityAddress = trim($columnItem[5]);
			$facilityCity = trim($columnItem[6]);
			$facilityState = "NJ";
			$facilityZip = trim($columnItem[8]);
			$facilityPhone = trim($columnItem[9]);
			$facilityWebsite = trim($columnItem[10]);
			$cost = trim($columnItem[4]);
			$source = "us";
			$comments = $columnItem[12];
			$insuranceID = "1";
			$entryDate = date('Y-m-d');
			$ip = $_SERVER["REMOTE_ADDR"];
						
			echo '<p>Procedure ID: ' . $procedureID . '<br />
					Facility Name: ' . $facilityName . '<br /> 
					Address: ' . $facilityAddress . '<br /> 
					City: ' . $facilityCity . '<br /> 
					State: ' . $facilityState . '<br /> 
					Zip: ' . $facilityZip . '<br /> 
					Phone: ' . $facilityPhone . '<br /> 
					Website: ' . $facilityWebsite . '<br /> 
					cost: ' . $cost . '<br /> 
					source: ' . $source . '<br />
					comments: ' . $comments . '<br /> 
					insurance: ' . $insuranceID . '<br /> 
					date: ' . $entryDate . '<br />
					ip: ' . $ip . '</p>';

			savePrice($procedureID, $insuranceID, $facilityName, $facilityAddress, $facilityCity, $facilityState, $facilityZip, $facilityPhone, $facilityWebsite, $cost, $comments, $source, $entryDate, $ip);
		}
		
	} else {
		// nothing to do or see here, pals
	}
?>

<form id="prices" name="prices" method="post">
	<label for="delimited">Enter prices csv content:<br />
	<textarea name="delimited" style="display:block; width:300px;height:600px;"></textarea>
	<input type="hidden" value="1" name="submission" />
	<input type="submit" value="submit" />
</form>

</body>
</html>