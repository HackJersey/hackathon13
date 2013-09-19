<!DOCTYPE html>
<?php 
if(!isset($_COOKIE['LOGGED'])) {

	header('Location: login.php');
	
}
?>

<html>
<head>
	
	
	
	<title>Hack Jersey Example</title>
	<style type="text/css">
	textarea.lock{
	  width: 400px !important;
	  height: 90px !important;
	  }
	</style>

</head>
<body>

<form action="index.php" method="POST">

	Please include a brief description of what occured: <br />
	<textarea name="incidenttext" ></textarea><br />
	Where did the incident occur? 
	<input type="text" name="location" />
	<input type="submit" name="p_submit" value="Submit" />

</form>


</body>
</html>

