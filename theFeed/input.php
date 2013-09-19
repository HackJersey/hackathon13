<!DOCTYPE html>
<?php 
if(!isset($_COOKIE['LOGGED'])) {

	header('Location: login.php');
	
}
?>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Make a Post</title>
    <meta name="postingPage" content="width=device-width, initial-scale=1.0">
    <meta name="Users can Post an incident on this page" content="">
    <meta name="Justin Guillou(Team Pancakes)" content="">

    <!-- Style -->
	 <link href="http://schechterbusiness.info/bootstrap/css/bootstrap.css" rel="stylesheet">
    <style>
      <style type="text/css">
      body {
        padding-top: 30px;
        padding-bottom: 40px;
        background-color: #f5f5f5;
      }
      .form-signin {
        max-width: 300px;
        padding: 10px 20px;
        margin: 0 auto 8px;
        background-color: #fff;
        border: 1px solid #e5e5e5;
        -webkit-border-radius: 5px;
           -moz-border-radius: 5px;
                border-radius: 5px;
        -webkit-box-shadow: 0 1px 2px rgba(0,0,0,.05);
           -moz-box-shadow: 0 1px 2px rgba(0,0,0,.05);
                box-shadow: 0 1px 2px rgba(0,0,0,.05);
      }
      .form-signin .form-signin-heading {
	font-size: 20px;
	font-family: Arial;
      }
      .form-signin input[type="text"]{
	font-size: 14px;
        height: auto;
	font-family: Arial;
        margin-bottom: 8px;
        padding:4px 6px;
      }
        textarea.lock{
	width: 300px !important;
	height: 90px !important;
      }
	  
    </style>
	</head>
	  <div class="container">
	  
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

	 
	<form class="form-signin" action="index.php" method="POST">
     <h1><b>Please include a<br> brief description of<br>what occured:</b></h1><br>
	 <textarea class="lock input-block-level" name="incidenttext" ></textarea><br />
		Where did the incident occur? 
	<select name="location">
	 <option value="Select Location">Select Location</option>
	 <option value="Abbot and Costello">Abbot and Costello</option>
	 <option value="Alexander Kasser">Alexander Kasser</option>
	 <option value="Alice Paul">Alice Paul</option>
	 <option value="Alumni Green">Alumni Green</option>
	 <option value="Amphiteater">Amphiteater</option>
	 <option value="Bauer House">Bauer House</option>
	 <option value="Ben Samuels Children Center">Ben Samuels Children Center</option>
	 <option value="Blanton Hall ">Blanton Hall </option>
	 <option value="Bohn Hall">Bohn Hall</option>
	 <option value="Bond House">Bond House</option>
	 <option value="Broadcasting Department">Broadcasting Department</option>
	 <option value="Cafe Diem">Cafe Diem</option>
	 <option value="Calcia Hall">Calcia Hall</option>
	 <option value="Carparc Diem">Carparc Diem</option>
	 <option value="Chapin Hall">Chapin Hall</option>
	 <option value="Coder House">Coder House</option>
	 <option value="Congeneration Plant">Congeneration Plant</option>
	 <option value="Conrad Schmitt Hall">Conrad Schmitt Hall</option>
	 <option value="College Hall">College Hall</option>
	 <option value="Community Garden">Community Garden</option>
	 <option value="Count Basie Hall">Count Basie Hall</option>
	 <option value="Dickson Hall">Dickson Hall</option>
	 <option value="Dinallo Heights">Dinallo Heights</option>
	 <option value="Dioguardi Field">Dioguardi Field</option>
	 <option value="Drop in center">Drop in center</option>
	 <option value="Field House">Field House</option>
	 <option value="Finley Hall">Finley Hall</option>
	 <option value="Finley Hall Annex">Finley Hall Annex</option>
	 <option value="Floyd Hall Arena">Floyd Hall Arena</option>
	 <option value="Freeman Hall">Freeman Hall</option>
	 <option value="Gilbreth House">Gilbreth House</option>
	 <option value="Hawk Crossings">Hawk Crossings</option>
	 <option value="Legge House">Legge House</option>
	 <option value="Life Hall">Life Hall</option>
	 <option value="Machuga Heights">Machuga Heights</option>
	 <option value="Maintenance Building">Maintenance Building</option>
	 <option value="Mallory Hall">Mallory Hall</option>
	 <option value="Memorial Auditorium">Memorial Auditorium</option>
	 <option value="Millicent Fenwick Hall">Millicent Fenwick Hall</option>
	 <option value="Morehead Hall">Morehead Hall</option>
	 <option value="Newman Catholic Center">Newman Catholic Center</option>
	 <option value="NJ Transit Deck">NJ Transit Deck</option>
	 <option value="Panzer Athletic Center">Panzer Athletic Center</option>
	 <option value="Partridge Hall">Partridge Hall</option>
	 <option value="Pittser Field">Pittser Field</option>
	 <option value="University Police">University Police</option>
	 <option value="Recreation Center">Recreation Center</option>
	 <option value="Red Hawk Diner">Red Hawk Diner</option>
	 <option value="Red Hawk Deck">Red Hawk Deck</option>
	 <option value="Richardson Hall">Richardson Hall</option>
	 <option value="Russ Hall">Russ Hall</option>
	 <option value="Science Hall">Science Hall</option>
	 <option value="Sinatra Hall">Sinatra Hall</option>
	 <option value="Softball Stadium">Softball Stadium</option>
	 <option value="Speech Building">Speech Building</option>
	 <option value="Sprague Field">Sprague Field</option>
	 <option value="Sprague Library">Sprague Library</option>
	 <option value="Stone Hall">Stone Hall</option>
	 <option value="Student Center">Student Center</option>
	 <option value="Tennis Court">Tennis Court</option>
	 <option value="University Hall">University Hall</option>
	 <option value="William Carlos Williams Hall">William Carlos Williams Hall</option>
	 <option value="Webster Hall">Webster Hall</option>
	 <option value="Yogi Berra Stadium">Yogi Berra Stadium</option>
	</select>
	<button class="btn btn-large btn-primary" type="submit" name="p_submit">Submit</button>
	</form>
    </div> <!-- /container -->
  </body>
</html>
