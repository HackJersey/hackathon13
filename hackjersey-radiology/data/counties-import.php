<?php /** 
	   * Import Counties Script
	   * Pulling in data from http://www.nj.gov/cgi-bin/infobank/munisearch.pl
	   */ ?>

<!DOCTYPE html>
<head>
	<title>Counties Import</title>
	
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
			$name = trim($columnItem[0]);
			$county = trim($columnItem[1]);
			
			
			// get County ID
			$counties = mysql_query("SELECT * FROM counties WHERE `name` = '$county'");
			$count = mysql_num_rows($counties);
			if ($count == 1) { 
				while ( $countyRow = mysql_fetch_array($counties) ) {
					$countyID = $countyRow['id'];
				}
			}
			else {
				echo "no data error - counties ";
				$countyID = "-1";
			}
			
			echo '<p>(' . $name . ')(' . $county . ')(' . $countyID . ')</p>';


			mysql_query("INSERT INTO municipalities (`name`, `countyID`) VALUES ( '$name', '$countyID');") or die('There was an error saving: ' . mysql_error());
		}
		
	} else {
		// nothing to do or see here, pals
	}
?>

<form id="counties" name="counties" method="post">
	<label for="delimited">Enter counties csv content:<br />
	<textarea name="delimited" style="display:block; width:300px;height:300px;"></textarea>
	<input type="hidden" value="1" name="submission" />
	<input type="submit" value="submit" />
</form>

</body>
</html>