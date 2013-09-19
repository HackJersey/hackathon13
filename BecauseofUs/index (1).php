<?php
/*	echo "si";

	
	$value = "";
	$TOTALMURDER2011 = "";
	$ALLMURDERSBYFIREARMS = "";
	
	if(isset($_POST["zipcode"])){
		$value = $_POST["zipcode"]; 
		
		//echo $DATETIME;
	
		//connectDB();
		$query = "SELECT * FROM `ZIPINFO` WHERE ZIP='$value'";
		//$result = selectQuery('zipcode',$query);
		$result = doQuery($query);
		$existCount = countRows($query);
	
		if($existCount > 0){
			echo "YAYYY";

			//while($row = mysqli_fetch_array($result1, MYSQLI_BOTH))
			//{
				/*$row = mysqli_fetch_array($result1, MYSQLI_BOTH);
				$MURDERID = $row['MURDERID'];
				$LAWID = $row['LAWID'];
				$LEGISLATORID = $row['LEGISLATORID'];
				echo $MURDERID ."-".$LAWID."-".$LEGISLATORID;
				$query1 = "SELECT * FROM `MURDER` WHERE MURDERID='$MURDERID'";
				$result1 = doQuery($query1);
				
				//while($row1 = mysqli_fetch_array($result1, MYSQLI_BOTH))
				//{
					$row1 = mysqli_fetch_array($result1, MYSQLI_BOTH);
					$TOTALMURDER2011 = $row1['TOTALMURDER2011'];
					$ALLMURDERSBYFIREARMS = $row1['%OFALLMURDERSBYFIREARMS'];
				//}
			//}
		}
		else
			echo "Sorry the zipcode you entered did not match any results in our database";
	}	
	else if(isset($_POST["yes"])){
		$value = $_POST["yes"]; 
	}
	else if(isset($_POST["no"])){
		$value = $_POST["no"]; 
	}

*/
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
   
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
	<?php  
    require_once('api.php');  
    
	connectDB();
	
	
	?> 
   
    <!-- Le styles -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <link href="assets/css/bootstrap-responsive.css" rel="stylesheet">
   
    <style>
    
        /* GLOBAL STYLES
        -------------------------------------------------- */
        /* Padding below the footer and lighter body text */
    
        body {
          padding-bottom: 40px;
          color: #5a5a5a;
        }
    
    
    
        /* CUSTOMIZE THE NAVBAR
        -------------------------------------------------- */
    
        /* Special class on .container surrounding .navbar, used for positioning it into place. */
        .navbar-wrapper {
          position: absolute;
          top: 0;
          left: 0;
          right: 0;
          z-index: 10;
          margin-top: 20px;
          margin-bottom: -90px; /* Negative margin to pull up carousel. 90px is roughly margins and height of navbar. */
        }
        .navbar-wrapper .navbar {
    
        }
    
        /* Remove border and change up box shadow for more contrast */
        .navbar .navbar-inner {
          border: 0;
          -webkit-box-shadow: 0 2px 10px rgba(0,0,0,.25);
             -moz-box-shadow: 0 2px 10px rgba(0,0,0,.25);
                  box-shadow: 0 2px 10px rgba(0,0,0,.25);
        }
    
        /* Downsize the brand/project name a bit */
        .navbar .brand {
          padding: 14px 20px 16px; /* Increase vertical padding to match navbar links */
          font-size: 16px;
          font-weight: bold;
          text-shadow: 0 -1px 0 rgba(0,0,0,.5);
        }
    
        /* Navbar links: increase padding for taller navbar */
        .navbar .nav > li > a {
          padding: 15px 20px;
        }
    
        /* Offset the responsive button for proper vertical alignment */
        .navbar .btn-navbar {
          margin-top: 10px;
        }
    
    
    
        /* CUSTOMIZE THE NAVBAR
        -------------------------------------------------- */
    
        /* Carousel base class */
        .carousel {
          margin-bottom: 60px;
        }
    
        .carousel .container {
          position: relative;
          z-index: 9;
        }
    
        .carousel-control {
          height: 80px;
          margin-top: 0;
          font-size: 120px;
          text-shadow: 0 1px 1px rgba(0,0,0,.4);
          background-color: transparent;
          border: 0;
        }
    
        .carousel .item {
          height: 500px;
        }
        .carousel img {
          position: absolute;
          top: 0;
          left: 0;
          min-width: 100%;
          height: 500px;
        }
    
        .carousel-caption {
          background-color: transparent;
          position: static;
          max-width: 550px;
          padding: 0 20px;
          margin-top: 200px;
        }
        .carousel-caption h1,
        .carousel-caption .lead {
          margin: 0;
          line-height: 1.25;
          color: #fff;
          text-shadow: 0 1px 1px rgba(0,0,0,.4);
        }
        .carousel-caption .btn {
          margin-top: 10px;
        }
    
    
    
        /* MARKETING CONTENT
        -------------------------------------------------- */
    
        /* Center align the text within the three columns below the carousel */
        .marketing .span4 {
          text-align: center;
        }
        .marketing h2 {
          font-weight: normal;
        }
        .marketing .span4 p {
          margin-left: 10px;
          margin-right: 10px;
        }
    
    
        /* Featurettes
        ------------------------- */
    
        .featurette-divider {
          margin: 80px 0; /* Space out the Bootstrap <hr> more */

        }
        .featurette {
          xpadding-top: 120px; /* Vertically center images part 1: add padding above and below text. */
          overflow: hidden; /* Vertically center images part 2: clear their floats. */
        }
        .featurette-image {
          margin-top: -120px; /* Vertically center images part 3: negative margin up the image the same amount of the padding to center it. */
        }
    
        /* Give some space on the sides of the floated elements so text doesn't run right into it. */
        .featurette-image.pull-left {
          margin-right: 40px;
        }
        .featurette-image.pull-right {
          margin-left: 40px;
        }
    
        /* Thin out the marketing headings */
        .featurette-heading {
          font-size: 50px;
          font-weight: 300;
          line-height: 1;
          letter-spacing: -1px;
          margin-left: 150px;
        }
        
    
    
    
        /* RESPONSIVE CSS
        -------------------------------------------------- */
    
        @media (max-width: 979px) {
    
          .container.navbar-wrapper {
            margin-bottom: 0;
            width: auto;
          }
          .navbar-inner {
            border-radius: 0;
            margin: -20px 0;
          }
    
          .carousel .item {
            height: 500px;
          }
          .carousel img {
            width: auto;
            height: 500px;
          }
    
          .featurette {
            height: auto;
            padding: 0;
          }
          .featurette-image.pull-left,
          .featurette-image.pull-right {
            display: block;
            float: none;
            max-width: 40%;
            margin: 0 auto 20px;
          }
        }
    
    
        @media (max-width: 767px) {
    
          .navbar-inner {
            margin: -20px;
          }
    
          .carousel {
            margin-left: -20px;
            margin-right: -20px;
          }
          .carousel .container {
    
          }
          .carousel .item {
            height: 300px;
          }
          .carousel img {
            height: 300px;
          }
          .carousel-caption {
            width: 65%;
            padding: 0 70px;
            margin-top: 100px;
          }
          .carousel-caption h1 {
            font-size: 30px;
          }
          .carousel-caption .lead,
          .carousel-caption .btn {
            font-size: 18px;
          }
    
          .marketing .span4 + .span4 {
            margin-top: 40px;
          }
    
          .featurette-heading {
            font-size: 30px;
          }
          .featurette .lead {
            font-size: 18px;
            line-height: 1.5;
          }
    
        }
        .form-signin {
                max-width: 300px;
                padding: 19px 29px 29px;
                margin: 100px auto 325px;
                background-color: #fff;
                xborder: 1px solid #e5e5e5;
                -webkit-border-radius: 5px;
                   -moz-border-radius: 5px;
                        border-radius: 5px;
                -webkit-box-shadow: 0 1px 2px rgba(0,0,0,.05);
                   -moz-box-shadow: 0 1px 2px rgba(0,0,0,.05);
                        box-shadow: 0 1px 2px rgba(0,0,0,.05);
              }
              .form-signin .form-signin-heading,
              .form-signin .checkbox {
                margin-bottom: 10px;
              }
              .form-signin input[type="text"],
              .form-signin input[type="password"] {
                font-size: 16px;
                height: auto;
                margin-bottom: 15px;
                padding: 7px 9px;
              }
            #scroll_down{
            	color: red;
            	text-align: right;
            	font-size: 20px;
            }
            .main_title{
            padding-top: 20px;
            	text-align: center;
            	font-size: 40px;
            }
              
        </style>
    
    
    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!-- Fav and touch icons -->
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/ico/apple-touch-icon-114-precomposed.png">
      <link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/ico/apple-touch-icon-72-precomposed.png">
                    <link rel="apple-touch-icon-precomposed" href="assets/ico/apple-touch-icon-57-precomposed.png">
	                               <!--    <link rel="shortcut icon" href="assets/ico/favicon.png">-->
  
  <!--<form action = "#" method = "POST">
  <label>Gun Crime</label>
  <input type = "text" name = "gun_crime_stats" class = "gun_crime_stats" id = "gun_crime_stats" value="">
  
  <input type ="submit" value ="Submit">
  </form>-->
    
  
  </head>
  
  <body>    
  <div class="container">
  	 <h2 class="main_title">Is there a solution to America's gun control debate?</h2>
  	          	  <form class="form-signin" method="post" action="#test">
  	        <h2 class="form-signin-heading">It begins at home.</h2>

         
                  <input type="text" name="zipcode" id="zipCode" class="zipCode" value="Zip code"/>
         </br>
                 <input class="btn btn-large btn-primary" type="submit" value="Enter">
       </form>
       

       
       <div class="row-fluid">
         <div class="span4">
                          

                     
         </div><!--/span-->
               </div>
       
  <?php
  //$zipCode = $_POST["zipCode"];
 
  /*if post submit search */
  ?>
  
  <?php
  //if (isset($zipCode)) { 
  require_once('api.php'); 
  					$MISSINGFIREARMS = "";
					$LOCKINGDEVICE = "";
					$PRIVATESALES = "";
					$GUNSHOWS = "";
					$LONGGUNS = "";
					$SHORTGUNS = "";
					$OPENCARRY = "";
					$CONCEALEDCARRY = "";
											$TITLE = "";
						$FIRSTNAME = "";
						$LASTNAME = "";
						$PHONE = "";
						$FAX = "";
						$CONGRESS = "";
						$TWITTER = "";
						
						$HANDLESTRING = "";
  $g = "";
  $t = "";
  if(isset($_POST["zipcode"])){
		$value = $_POST["zipcode"]; 
		
		//echo $DATETIME;
	
		//connectDB();
		$query = "SELECT * FROM `ZIPINFO` WHERE ZIP='$value'";
		//$result = selectQuery('zipcode',$query);
		$result = doQuery($query);
		$existCount = countRows($query);
	
		if($existCount > 0){
			//echo "YAYYY";
			
			
				$row = mysqli_fetch_array($result, MYSQLI_BOTH);
				$MURDERID = $row['MURDERID'];
				$LAWID = $row['LAWID'];
				//$LEGISLATORID = $row['LEGISLATORID'];
				//echo $MURDERID ."-".$LAWID."-".$LEGISLATORID;
				
				$query1 = "SELECT * FROM `MURDER` WHERE MURDERID='$MURDERID'";
				$result1 = doQuery($query1);
				
				//while($row1 = mysqli_fetch_array($result1, MYSQLI_BOTH))
				//{
					$row1 = mysqli_fetch_array($result1, MYSQLI_BOTH);
					$TOTALMURDER2011 = $row1['TOTALMURDER2011'];
					$ALLMURDERSBYFIREARMS = $row1['OFALLMURDERSBYFIREARMS'];
					//echo $TOTALMURDER2011."space".$ALLMURDERSBYFIREARMS;
					$g = $ALLMURDERSBYFIREARMS;
					$t = 100 - $g;
					
					
					$query2 = "SELECT * FROM `LAW` WHERE LAWID='$LAWID'";
					$result2 = doQuery($query2);
					$row2 = mysqli_fetch_array($result2, MYSQLI_BOTH);
					$MISSINGFIREARMS = $row2['MISSINGFIREARMS'];
					$LOCKINGDEVICE = $row2['LOCKINGDEVICE'];
					$PRIVATESALES = $row2['PRIVATESALES'];
					$GUNSHOWS = $row2['GUNSHOWS'];
					$LONGGUNS = $row2['LONGGUNS'];
					$SHORTGUNS = $row2['SHORTGUNS'];
					$OPENCARRY = $row2['OPENCARRY'];
					$CONCEALEDCARRY = $row2['CONCEALEDCARRY'];
					
					//$query = "SELECT * FROM `ZIPINFO` WHERE ZIP='$value'";
					//$result = selectQuery('zipcode',$query);
					$results = doQuery($query);
					
					while($rows = mysqli_fetch_array($results, MYSQLI_BOTH))
					{
						$LEGISLATORID = $rows['LEGISLATORID'];

						$query3 = "SELECT * FROM `LEGISLATOR` WHERE LEGISLATORID='$LEGISLATORID'";
						$result3 = doQuery($query3);
						while($row3 = mysqli_fetch_array($result3, MYSQLI_BOTH)) {
							$TITLE = $row3['TITLE'];
							$FIRSTNAME = $row3['FIRSTNAME'];
							$LASTNAME = $row3['LASTNAME'];
							$PHONE = $row3['PHONE'];
							$FAX = $row3['FAX'];
							$CONGRESS = $row3['CONGRESS'];
							$TWITTER = $row3['TWITTER'];
							//echo $TWITTER;
							
							//$counter = 0;
							
							if (StartsWith($TWITTER, '@')){
								$HANDLESTRING = $HANDLESTRING.$TWITTER;	
							}
							else {
								$HANDLESTRING = $HANDLESTRING."@".$TWITTER;
							}
							
							//echo $HANDLESTRING;
						}
							
						
					}
				//}
		}
  //$g = 55;//crime precentage    
    //$t = 100-$g;//total precentage of crime   
  echo '<div class="container marketing" >';
  //echo $zipCode;		
  ?>
  <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
  		<script type="text/javascript">
  $(function () {
      var chart;
      $(document).ready(function() {
          chart = new Highcharts.Chart({
              chart: {
                  renderTo: 'pie_chart',
                  plotBackgroundColor: null,
                  plotBorderWidth: null,
                  plotShadow: false
              },
              title: {
                  text: 'Gun violence in your area'
              },
              tooltip: {
          	    pointFormat: '{series.name}: <b>{point.percentage}%</b>',
              	percentageDecimals: 1
              },
              plotOptions: {
                  pie: {
                      allowPointSelect: true,
                      cursor: 'pointer',
                      dataLabels: {
                          enabled: true,
                          color: '#000000',
                          connectorColor: '#000000',
                          formatter: function() {
                              return '<b>'+ this.point.name +'</b>: '+ this.percentage +' %';
                          }
                      }
                  }
              },
              series: [{
                  type: 'pie',
                  name: '2011',
                  data: [
                      ['Homicides by firearms',   <?php echo $g; ?>],
                      ['Total number of homicides',   <?php echo $t; ?>]
                  ]
              }]
          });
      });
      
  });
  		</script>
  <script src="assets/js/highcharts.js"></script>      
   <a class="test" name="test" style="color: white;">test</a>
 
  
  <div id="pie_chart" style="min-width: 450px; height: 450px; margin: 0 auto"></div> 
        <div class="featurette">
         <h2 class="featurette-heading">
        <span class="muted" style="text-align:center ;">Gun laws in your state</span></h2></div>
  
  
  <?php
       	}else{
     	echo '<div class="container marketing" style= "display:none;">';
     	}
  ?>
      <!-- START THE FEATURETTES -->

     
      
<?php
//for ($i = 1; $i <= 10; $i++) {	
?>
      <div class="featurette">
       
        <h2 class="featurette-heading"><?php echo "MISSING FIREARMS";?>
        </br>
         
        </h2>
       
        <p class="lead"><?php echo $MISSINGFIREARMS;?></p>
      </div><!--end of the featurette -->

     
      
      <div class="featurette">
       
        <h2 class="featurette-heading"><?php echo "LOCKING DEVICE";?>
        </br>
         
        </h2>
       
        <p class="lead"><?php echo $LOCKINGDEVICE;?></p>
      </div><!--end of the featurette -->

     
      
      <div class="featurette">
       
        <h2 class="featurette-heading"><?php echo "PRIVATE SALES";?>
        </br>
         
        </h2>
       
        <p class="lead"><?php echo $PRIVATESALES;?></p>
      </div><!--end of the featurette -->

     
      
      <div class="featurette">
       
        <h2 class="featurette-heading"><?php echo "GUN SHOWS";?>
        </br>
         
        </h2>
       
        <p class="lead"><?php echo $GUNSHOWS;?></p>
      </div><!--end of the featurette -->

    

     
      
      <div class="featurette">
       
        <h2 class="featurette-heading"><?php echo "LONG GUNS";?>
        </br>
         
        </h2>
       
        <p class="lead"><?php echo $LONGGUNS;?></p>
      </div><!--end of the featurette -->

     
      
      
      <div class="featurette">
       
        <h2 class="featurette-heading"><?php echo "SHORT GUNS";?>
        </br>
         
        </h2>
       
        <p class="lead"><?php echo $SHORTGUNS;?></p>
      </div><!--end of the featurette -->

     
      
      <div class="featurette">
       
        <h2 class="featurette-heading"><?php echo "OPEN CARRY";?>
        </br>
         
        </h2>
       
        <p class="lead"><?php echo $OPENCARRY;?></p>
      </div><!--end of the featurette -->

     
      
      <div class="featurette">
       
        <h2 class="featurette-heading"><?php echo "CONCEALED CARRY";?>
        </br>
         
        </h2>
       
        <p class="lead"><?php echo $CONCEALEDCARRY;?></p>
      </div><!--end of the featurette -->

     
<?php //} ?>	
      <!-- /END THE FEATURETTES -->
     
           <h2 class="featurette-heading">Change happens because of us.<br> 
           It's time to make a difference.
      </br>
       <span class="muted">Will you?</span>
      </h2>
    <?
    $pro = "It's time for change. We need more gun control.";
    $anti ="It's time for change. We need to protect gun rights.";
    
    ?>
           <div class="row">
      
      <div class="span4">
      <img class="img-circle" data-src="holder.js/240x240"/>
      <h2>Support gun control</h2>
      <a href="https://twitter.com/intent/tweet?screen_name=<?php echo $TWITTER ?>&text=<?php echo $pro;?>" class="btn btn-large btn-primary" data-size="large">Tweet to <?php echo $TWITTER; ?></a>
      <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
      </div>
      <div class="span4">
      <img class="img-circle" data-src="holder.js/240x240"/>
      <h2>Support gun rights</h2>
      <a href="https://twitter.com/intent/tweet?screen_name=<?php echo $TWITTER; ?>&text=<?php echo $anti; ?>" class="btn btn-large btn-primary" data-size="large">Tweet to <?php echo $TWITTER; ?></a>
      <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
      </div>
      
      
           
      </div>
     
      <?php 
      echo "";
      ?>
	<hr class="featurette-divider">

      <!-- FOOTER -->
      <footer>
        <p class="pull-right"><a href="#">Back to top</a></p>
             </footer>

    </div><!-- /.container -->



    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/bootstrap-transition.js"></script>
    <script src="assets/js/bootstrap-alert.js"></script>

    <script src="assets/js/bootstrap-modal.js"></script>
    <script src="assets/js/bootstrap-dropdown.js"></script>
    <script src="assets/js/bootstrap-scrollspy.js"></script>
    <script src="assets/js/bootstrap-tab.js"></script>
    <script src="assets/js/bootstrap-tooltip.js"></script>
    <script src="assets/js/bootstrap-popover.js"></script>
    <script src="assets/js/bootstrap-button.js"></script>
    <script src="assets/js/bootstrap-collapse.js"></script>
    <script src="assets/js/bootstrap-carousel.js"></script>
    <script src="assets/js/bootstrap-typeahead.js"></script>
  </body>
   
  
  
  
</html>