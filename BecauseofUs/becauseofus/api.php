<?php  
function connectDB(){
	$db_host = "localhost"; 
	$db_username = "marcoweb_CRM";  
	$db_pass = "MarcoMVS*+-*11/1";  
	$db_name = "marcoweb_HackJersey"; 
	$connection = mysqli_connect("$db_host","$db_username","$db_pass","$db_name");
	if (!$connection) {
	    die('Connect Error (' . mysqli_connect_errno() . ') '
	            . mysqli_connect_error());
	}
	else{
		//echo 'Success... ' . mysqli_get_host_info($connection) . "\n";
	}  
	return $connection;   
}

function StartsWith($Haystack, $Needle){
    // Recommended version, using strpos
    return strpos($Haystack, $Needle) === 0;
}

/*function selectQuery($field_value,$query) {
	
	switch($field_value){ 
		case 'zipcode': 
		doQuery($query); 
    		break; 

		case 'yes': 
    		doQuery('TWEETER','INFAVOR',$value);
    		break; 
    		
    		case 'no': 
    		doQuery('TWEETER','AGAINST',$value); 
    		break;

		default: 
    		echo 'ERROR'; 
	}
}*/

function doQuery($query) {
	$connection = connectDB();
	//$query = "SELECT * FROM `$table_choice` WHERE $table_data='$table_data_value'";
	$result = mysqli_query($connection, $query)or die("Error: ".mysqli_error($connection)); 
	mysqli_close($connection);
	
	return $result;
}


function countRows($query) {
	$existCount = -1;
	
	$connection = connectDB();
	if ($stmt = mysqli_prepare($connection, $query)) {

    		/* execute query */
	    	mysqli_stmt_execute($stmt);
	
    		/* store result */
	    	mysqli_stmt_store_result($stmt);
	
    		//printf("Number of rows: %d.\n", mysqli_stmt_num_rows($stmt));
    		$existCount = mysqli_stmt_num_rows($stmt);
    		
	    	/* close statement */
    		mysqli_stmt_close($stmt);
	}
	mysqli_close($connection);
	
	return $existCount;
}

?>