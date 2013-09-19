<!DOCTYPE html>

<html>
<head>
	<title>Hack Jersey Example</title><!DOCTYPE html>

<html>
<head>
	<title>Hack Jersey Example</title>
<script type="text/javascript">

function get_time() {

	var now = new Date();
	
	var time = now.toString();
	
	 document.getElementById("time").value = time;

}


</script>

</head>
<body style="text-align:center">

<a href="index.php">Home</a>

<h1>Login / Register</h1><br />

<h3>Apply to register: </h3>

<form name="register" action="index.php" method="post" onsubmit="get_time()"><br />
	First Name: <input type="text" name="fname" /><br />
	Last Name: <input type="text" name="lname" /><br />
	Street Address: <input type="text" name="address" /><br />
	City: <input type="text" name="city" /><br />

	User Name:<input type="text" name="uname" /><br />
	Password: <input type="password" name="password" />
	<input type="submit" name="r_submit" value="Submit" />
	<input type="hidden" id="time" name="time" />

</form>

<h3>Member Login: </h3>
	
<form name="login" action="index.php" method="post">
	User Name:<input type="text" name="uname" /><br />
	Password: <input type="password" name="password" />
	<input type="submit" name="l_submit" value="Submit" />
</form>

</body>

</html>