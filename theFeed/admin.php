<!DOCTYPE html>
<?php

if(!isset($_COOKIE['LOGGED'])) {

	header('Location: login.php');
	
}

//connect to database
$con = mysql_connect("mysql16.000webhost.com","a4627431_axschec","datword12");
//select database
mysql_select_db("a4627431_main");

if(isset($_POST['a_submit'])) {


	$datname = $_POST['check'];

		$QgetAuth = mysql_query("SELECT * FROM hackusers WHERE fname = '$datname'");
		
		$fname = mysql_result($QgetAuth, 0, 'fname');
		$lname = mysql_result($QgetAuth, 0, 'lname');
		
		$uname = mysql_result($QgetAuth, 0, 'uname');
		$password = mysql_result($QgetAuth, 0, 'password');
		
			mysql_query("INSERT INTO hackAuthUsers (fname, lname, uname, password)
						 VALUES ('$fname', '$lname', '$uname', '$password')");
						 
						 header('Location: admin.php');
		
		
		}





?>
<html>
<head>
<title>Admin</title>

<link href="../bootstrap/css/bootstrap.css" rel="stylesheet">



</head>
<body>

<div class="container"  style="padding-top: 30px;background-color: #f6f6f6;">
	
	
	
	
	
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

<?php


$QgetUsers = mysql_query("SELECT fname, lname FROM hackusers");

?>

<div>
<form action="admin.php" method="POST">
	<table border=1>
		<tr>
			<td>First Name</td><td>Last Name</td>
		</tr>
		<tr>
			<?php
			while($rows=mysql_fetch_array($QgetUsers)) {
			
			?>
			
				<td>
				
			<?php
				echo $rows['fname'];
				
				?>
				</td>
					<td>
					<?php
						echo $rows['lname'];
						
					?>
					</td>
						<td>
							<input type="checkbox" name="check" value="<?php echo $rows['fname']; ?>" />
						</td>
					
			</tr>
			<?php
					
					}
					
					?>
	</table>
	
	<input type="submit" name="a_submit" value="Submit" />
	
</form>			
</div>







</div>

</body>
</html>
