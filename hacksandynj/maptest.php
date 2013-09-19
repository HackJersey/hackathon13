<?php 

  
  //Variables for connecting to your database.
            //These variable values come from your hosting account.
            $hostname = "hacksandynj.db.10172105.hostedresource.com";
            $username = "hacksandynj";
            $dbname = "hacksandynj";

            //These variable values need to be changed by you before deploying
            $password = "Mangualde@1";
            $usertable = "all12";
                  
            $yourfield = "code";
        
            //Connecting to your database
            mysql_connect($hostname, $username, $password) OR DIE ("Unable to 
            connect to database! Please try again later.");
            mysql_select_db($dbname);
			
		            //Fetching from your database table.
            $query = "SELECT * FROM $usertable ";
            $result = mysql_query($query);
			 if ($result) {
			global $C;
			global $L;
			global $v;
			global $p;
                while($row = mysql_fetch_array($result)) {
                    $land = $row["total"];
                   	 $prop = $row["properties"];
					 $code = $row["code"];
					 
					 $i = $code;
					 $C[$i] = $code;
					  $L[$i] = $land;
					  $P[$i] = $prop;
					 $i++;
					                 }
            }
			
			 		for($d = '0101'; $d < sizeof($L);$d++)
			{
				$tempLandValue = 	$L[$d];
				$tempPropertyType =   $P[$i];
				
				if($tempPropertyType === 'All')
				{
				
				 if($tempLandValue < '150000'){
					  $v[$d] = "ffdd00";
				 }
				 else if($tempLandValue < '240000'){
					 $v[$d] = "ff9900";
				 }
				else if($tempLandValue < '320000') {
					$v[$d] = "ff3c00";
				}
				else if($tempLandValue < '450000') {
					$v[$d] = "ff1100";
				}
				else {
					$v[$d] = "ff0011";
					}
			}
				else
				{
				
				 if($tempLandValue < '180000'){
					  $v[$d] = "ffff00";
				 }
				 else if($tempLandValue < '270000'){
					 $v[$d] = "80ff00";
				 }
				else if($tempLandValue < '380000') {
					$v[$d] = "00ff80";
				}
				else if($tempLandValue < '540000') {
					$v[$d] = "0055ff";
				}
				else{
					$v[$d] = "1900ff";  }
				}
			}
	/*		 
			 
 for($d = 0101; $d < sizeof($huge_array);$d++)
 {
 code...
 } 
			
			 if ( $a < 50000) {$layer0102="0.1";} else $layer0102="0.9"; */
            ?>
			
			


<html>
  <head>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="UTF-8">

    <title>Fusion Tables Layer Example: Multiple Layers per Map</title>
  <style type="text/css">
      html { height: 100% }
      body { height: 100%; margin: 0; padding: 0 }
      #map_canvas { height: 100% }
    </style>
   
       
    <script type="text/javascript"
        src="https://maps.googleapis.com/maps/api/js?&sensor=false&libraries=drawing"></script>

    <script type="text/javascript">
	
	var layer1;
	var layer2;
	var styledmap;
   function initialize() {
	   
	   var styles = [ { "featureType": "road", "elementType": "labels", "stylers": [ { "visibility": "off" } ] },{ "featureType": "transit", "stylers": [ { "visibility": "off" } ] },{ "featureType": "road", "elementType": "geometry", "stylers": [ { "visibility": "off" } ] },{ "featureType": "poi.park", "elementType": "geometry.fill", "stylers": [ { "visibility": "off" } ] },{ "featureType": "administrative.province", "elementType": "geometry", "stylers": [ { "visibility": "on" }, { "color": "#8c469b" }, { "hue": "#ff0000" } ] },{ "featureType": "poi", "elementType": "geometry", "stylers": [ { "visibility": "off" } ] } ] ;
	   

	   
styledMap = new google.maps.StyledMapType(styles,
 {name: "Styled Map"});
 
  var mapOptions = {
    zoom: 8,
    center: new google.maps.LatLng(40.522, -74.3),
	mapTypeControlOptions: {
    mapTypeIds: [google.maps.MapTypeId.ROADMAP, 'map_style']
  }
  };
  var map = new google.maps.Map(document.getElementById("map_canvas"),
                                mapOptions);
 //var where = "CountyName = Hudson";
 
 layer2 = new google.maps.FusionTablesLayer({
          query: {
            select: 'geometry' ,
            from: '2543624', 
          },
        styles: [{ ploygonOptions:
		 {
	  strokeOpacity:0,
	  strokeWeight: 0
    }
		  }
		  
		  	
		  <?php
		  $j = '0101';
		  while($j < '2124')
		   //for( $j < '2124';$j++)
 			{
 //code.
 
 
     echo ' ,{ where: "MUN_CODE ='.$C[$j].' ",
	 polygonOptions: {
	 strokeColor:  " #'.$v[$j].' ", 
	 strokeWeight: 1,
	 stokeOpacity: 0.5,
	 fillColor: " #'.$v[$j].' ", 
	 fillOpacity: 0.5 
	 }
 }';
		$j++;	}?>
 
 ]
 
		  });
 
	
		
		layer2.setMap(map);
		
 
 
 
layer3 = new google.maps.FusionTablesLayer({
          query: {
            select: 'geometry' ,
            from: '1odAieZSn4Nlvx7D4pjJZbaF9npFOYHxoLE_MHQ', 
			//where: "CountyName = 'Hudson'"
          },
          styles: [{ ploygonOptions: {
			 fillColor: "#00FF00",
      fillOpacity: 0.3,
	  strokeOpacity:1.0,
	  strokeColor: "#964646",
	  strokeWeight: 3
    }
		  },
		  {
			  where: "COUNTY = 'HUDSON' ",
			  polygonOptions: {
				  fillColor: "#0000FF",
				  fillOpacity: 0.2
    }
 },
 
 
 
  {
    where: "COUNTY = 'BERGEN' ",
    polygonOptions: {
		 fillColor: "#0000FF",
      fillOpacity: 1.0
    }
  },
	{
    where: "COUNTY = 'ATLANTIC' ",
    polygonOptions: {
		 fillColor: "#0000FF",
      fillOpacity: 0.3
    }
 }]
		  
        });
		layer3.setMap(map);
		
		
	  


            //Fetching from your database table.
          //$query = "SELECT * FROM $usertable";
           // $result = mysql_query($query);

         //   if ($result) {
           //     while($row = mysql_fetch_array($result)) {
             //       $name = $row["$yourfield"];
                   // echo "Name: $name<br>";
        //      }
          //  }
		
           // $query = mysql_query("SELECT code, land FROM $usertable WHERE properties = 'Residential' ");
			
			
		//	$result = mysql_query($query);
			 //$land = mysql_query("SELECT land FROM $usertable WHERE (properties = Residential) AND (code = $code)");
  //  $result_set = mysql_query($sql);
    ///$result_num = mysql_numrows($result_set);

	
		
		  map.mapTypes.set('map_style', styledMap);
		  map.setMapTypeId('map_style');
}
google.maps.event.addDomListener(window, 'load', initialize);

//FUNCTION TO CHANGE LAYERS
/*function changeMap(layerNum) {
   if (layerNum == 1) {
      update(layer1);
   }
   if (layerNum == 2) {
      update(layer2);
   }
} 

//FUNCTION TO UPDATE LAYERS
function updateMap(layer) {
   var layerMap = layer.getMap();
   if (layerMap) {
      layer.setMap(null);
   } else {
      layer.setMap(map);
   }
} 


//FUNCTION TO RESET DATA
function resetData() {
document.getElementById('search-string').value = "";
  layer1.setOptions({
      query: {
         select: "'geometry'",
         from: '3910149'
      }
   });
} */
    </script>
  </head>
  <body onLoad="initialize()" >
    <div id="map_canvas" style="width:100%; height:100%"></div>
    <div style="margin-top: 10px;">

 <!--- <input type="text" id="search-string" />
 <input type="button" onClick="filterData();" value="Find!"/>
 <input type="button" onClick="resetData();" value="Reset Layer" /><br/><br/>
 <label>Layers:</label><br/>
 <label>Layer1</label><input type="checkbox" value="1" onClick="changeMap(this.value);" checked="checked" /><br/>
 <label>Layer2</label><input type="checkbox" value="2" onClick="changeMap(this.value);" checked="checked" /><br/> --->
</div>
  </body>
</html>