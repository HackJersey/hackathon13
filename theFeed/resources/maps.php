<HTML>
<TITLE>My Title</TITLE>
<BODY>
<!DOCTYPE html>
<html>
  <head>
  <style>
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
  </head>
  <body>
    <div id="map-canvas"></div>
    <div style="margin-top: 10px;">
      <label>Choose Map</label>
        <input type="button" value="View Montclair Crimes" onClick="toggleLayer(layerl0);">
        <input type="button" value="View NJ Crimes" onClick="toggleLayer(layerl1);">
    </div>
  </body>
</html>
</BODY>
</HTML>
