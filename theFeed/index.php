<!DOCTYPE html>
<?php
//connect to database
$con = mysql_connect("mysql16.000webhost.com","a4627431_axschec","datword12");
//select database
mysql_select_db("a4627431_main");

$QgetIncidents = mysql_query("SELECT incidenttext, location, name FROM hackincident");
		
if(isset($_POST['r_submit'])) {

	
		$fname = $_POST['fname'];
		$lname = $_POST['lname'];
		$address = $_POST['address'];
		$city = $_POST['city'];
		$state = $_POST['state'];
		$uname = $_POST['uname'];
		$password = $_POST['password'];
		$time = $_POST['time'];

			mysql_query("INSERT INTO hackusers (fname, lname, address, city, state, uname, password, time)
						 VALUES ('$fname', '$lname', '$address', '$city', '$state', '$uname', '$password', '')");
}

if(isset($_POST['l_submit'])) {



	$uname = $_POST['uname'];
	$password = $_POST['password'];
	
			$QgetLogin = mysql_query("SELECT uname, password FROM hackusers WHERE uname = '$uname' AND password = '$password'");
			
			$QgetRows = mysql_num_rows($QgetLogin);
	
				if($QgetRows > 0) {
				
					setcookie("LOGGED","$uname");
					header('Location: index.php');
					}
		
}
if(isset($_POST['p_submit'])) {

	$incidenttext = $_POST['incidenttext'];
	$location= $_POST['location'];
	$name = $_COOKIE['LOGGED'];
	$time = "";

	mysql_query("INSERT INTO hackincident (incidenttext, location, name, time)
				 VALUES ('$incidenttext', '$location', '$name', '$time')");
	header('Location: index.php');

}
?>

<html>
<head>
	<title>Welcome</title>
<script src="http://schechterbusiness.info/bootstrap/js/bootstrap.js"></script>
	<style type="text/css" src="http://code.jquery.com/ui/1.9.1/themes/base/jquery-ui.css">
	#map-canvas { width:500px; height:400px; }
	</style>
	<script type="text/javascript"
    src="http://maps.google.com/maps/api/js?sensor=false">
  </script>
    <script type="text/javascript">
    var map;
    var layerl0;
    var layerl1;
    function initialize() {
      map = new google.maps.Map(document.getElementById('map-canvas'), {
        center: new google.maps.LatLng(40.01178094245735, -74.57201350000003),
        zoom: 7,
        mapTypeId: google.maps.MapTypeId.ROADMAP
      });
      layerl0 = new google.maps.FusionTablesLayer({
        query: {
          select: "'col4'",
          from: '1ei0F0zcNsiApOiKejn8qqIQi7XWP-13UojBWglo'
        },
        map: map,
        styleId: 2,
        templateId: 2
      });
      layerl1 = new google.maps.FusionTablesLayer({
        query: {
          select: "'col0'",
          from: '1W94MWh5vDQJgb--Q9Qpvn4yxGuiau4-ouT2dBT8'
        },
        map: map,
        styleId: 2,
        templateId: 2
      });
    }
    function changeMapl0() {
      var searchString = document.getElementById('search-string-l0').value.replace(/'/g, "\\'");
      layerl0.setOptions({
        query: {
          select: "'col4'",
          from: '1ei0F0zcNsiApOiKejn8qqIQi7XWP-13UojBWglo',
          where: "'Type of activity' = '" + searchString + "'"
        }
      });
    }
    function changeMapl1() {
      var searchString = document.getElementById('search-string-l1').value.replace(/'/g, "\\'");
      layerl1.setOptions({
        query: {
          select: "'col0'",
          from: '1W94MWh5vDQJgb--Q9Qpvn4yxGuiau4-ouT2dBT8',
          where: "'Location' = '" + searchString + "'"
        }
      });
    }
    function toggleLayer(this_layer){
        layerl0.setMap(null);
        layerl1.setMap(null);
        this_layer.setMap(map);
    }

    google.maps.event.addDomListener(window, 'load', initialize);
  </script>
<link href="http://schechterbusiness.info/bootstrap/css/bootstrap.css" rel="stylesheet">

</head>
<body>
<div class="container"  style="text-align:center;padding-top: 30px;background-color: #f6f6f6;">
	<div style="height:50px;padding:12px;background-color:#FF0000">
		<div class="navbar" style="width:600px;margin:auto;">
			 <div class="navbar-inner">
					<ul class="nav" style="padding-left:80px;">
						<li><a href="index.php">Home</a></li>
						<li><a href="login.php">Log In or Register</a></li>
						<li><a href="input.php">Post</a></li>
						<li><a href="admin.php">Admin</a></li>
						<li><a href="resources/about.php">About</a></li>
						<!--
						<li><a href="resources/logout.php">Log out</a></li>
						-->
					</ul>
			 </div>
		</div>
	</div>	
<br />
<h1>Recent Local Crimes</h1>
<br />
<center><div id="map-canvas"></div>
    <div style="margin-top: 10px;">
      <label>Choose Map</label>
        <input type="button" value="View Montclair Crimes" onClick="toggleLayer(layerl0);">
        <input type="button" value="View NJ Crimes" onClick="toggleLayer(layerl1);">
    </center></div>
	<br/>

<center><h1>Recently Reported Incidents</h1></center>
<?php


while($rows = mysql_fetch_array($QgetIncidents)) {
?>
<div style="width:850px;margin:auto;">
	<div class="hero-unit">
	
	
	<?php
	
	?>
	
			 <h3>
			 
			 
			 
			 
			<?php
				
				echo $rows['incidenttext']; 
				
				
				?> 
				</h3>
				
				<h4>
			<?php
				echo $rows['location'];
				?>
			 </h4>
			 
			 
			 <?php 
			 if(isset($_COOKIE['LOGGED'])) { 
			 ?>
					<p>
					<?php
					echo $rows['name'];
					?></p> <?php } ?>
		</div>
	</div>
		<?php
	}
?>

	</div>
</body>

</html>
<!-- Hosting24 Analytics Code -->
<script type="text/javascript" src="http://stats.hosting24.com/count.php"></script>
<!-- End Of Analytics Code -->
