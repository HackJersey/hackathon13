
<!DOCTYPE html>
<html>
<head>
	<title>Log In/Sign Up</title>
<script type="text/javascript">

function get_time() {

	var now = new Date();
	
	var time = now.toString();
	
	 document.getElementById("time").value = time;

}


</script>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <link href="../bootstrap/css/bootstrap.css" rel="stylesheet">
    <style type="text/css">
      

      .form-signin {
        max-width: 300px;
        padding: 9px 19px 19px;
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
      .form-signin input[type="text"],
      .form-signin input[type="password"] {
	font-size: 14px;
        height: auto;
	font-family: Arial;
        margin-bottom: 8px;
        padding:4px 6px;
      }

      .form-signup {
        max-width: 300px;
        padding: 9px 19px 19px;
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
      .form-signup .form-signup-heading {
      	font-size: 20px;
	font-family: Arial;
      }
      .form-signup input[type="text"],
      .form-signup input[type="password"] {
        font-size: 14px;
        height: auto;
	font-family: Arial;
        margin-bottom: 8px;
        padding: 4px 6px;
      }

    </style>
  <link href="http://schechterbusiness.info/bootstrap/css/bootstrap.css" rel="stylesheet"> 

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
      <br /> <br />
          <form class="form-signin" action="index.php" method="POST">
            <h2 class="form-signin-heading">Please sign in</h2>
            <input type="text" class="input-block-level" placeholder="User Name" name="uname">
            <input type="password" class="input-block-level" placeholder="Password" name="password"><br>
            <button class="btn btn-large btn-primary" type="submit" name="l_submit">Sign in</button>
          </form>
        
       
          <form class="form-signup"  action="index.php" method="POST">
            <h2 class="form-signup-heading">Sign Up!</h2>
            <input type="text" class="input-block-level" placeholder="First Name" name="fname">
            <input type="text" class="input-block-level" placeholder="Last Name" name="lname">
            <input type="text" class="input-block-level" placeholder="Street Address" name="address">
            <input type="text" class="input-block-level" placeholder="City" name="city">
	    <input type="text" class="input-block-level" placeholder="State" name="state">
            <input type="text" class="input-block-level" placeholder="User Name" name="uname">
            <input type="password" class="input-block-level" placeholder="Password" name="password">
           
            <button class="btn btn-large btn-primary" type="submit" name="r_submit">Sign Up!</button>
          </form> 
      
    </div> <!-- /container -->

</html>
<!-- Hosting24 Analytics Code -->
<script type="text/javascript" src="http://stats.hosting24.com/count.php"></script>
<!-- End Of Analytics Code -->

