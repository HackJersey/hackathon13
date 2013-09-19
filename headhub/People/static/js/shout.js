var lat, lng;
var myStr;
myStr = "";
var locations = [];
//var j = -1;
var k;
var map


$(function() {
  get_location();
  shout_init();
});

function get_location() {
  navigator.geolocation.getCurrentPosition(
    function(pos){
      lat = pos.coords.latitude;
      lng = pos.coords.longitude;
      new_map(lat, lng);
      get_People(lat, lng, $("#radius").val());
      radius_init();
    },
    function(){
      $("#yes-location").hide();
      $("#no-location").show();
    }
  );
}

function new_map(lat,lng) {
  var prev_map = $("#map img");
  prev_map.css("z-index",2);

  //var val = message.value;

  //alert('M: ' + val);
  
  
  //var new_map = $('<img width="450" height="350" src="http://maps.google.com/maps/api/staticmap?sensor=false&center=67510&zoom=3&size=450x350&markers=color:blue|label:S|'+message+'" />').css("x-index",1);
  

  //$("#map").append($new_map);
  prev_map.fadeOut();
}

function shout_init() {
  $("#shout").submit(function() {
    var author = $("#author");
    var message = $("#message");
    var keywords = $("#keywords");
    if (!author.val()) {
      form_error(author, "Please enter Author!");
      return false;
    } else if (!message.val()) {
      form_error(message, "Please enter Zipcode!");
      return false;
    } else if (!keywords.val()) {
      form_error(keywords, "Please enter KeyWords!");
      return false;
    } else {
      $(".error").hide();
    }
    
    $.post("/api/People/new", { lat: lat, lng: lng, author: author.val(), message: message.val(), keywords: keywords.val() }, function(data) {
      var new_People = $.parseJSON(data);
      for (var i=0; i<new_People.length; i++) {
        //alert('i = ' + i);
        add_shout(new_People[i]);
      }




      //add_shout(new_shout);
      
      message.val('');
      message.focus();
    });

    // $.post("/api/shouts/new", { lat: lat, lng: lng, author: author.val(), message: message.val() }, function(data) {
    //   var new_shout = $.parseJSON(data);
    //   add_shout(new_shout);
      
    //   message.val('');
    //   message.focus();
    // });    
    
    return false;
  });
}

function form_error(input, message) {
  $(".error").html(message);
  $(".error").show();
  input.focus();
}

function radius_init() {
  $("#update_radius").submit(function() {
    var radius = $("#radius").val();
    if (radius) {
      get_People(lat, lng, radius);
    }
    return false;
  })
}

function get_People(lat, lng, radius) {
  $.get("/api/People/get", { lat: lat, lng: lng, radius: radius }, function(data) {
    var People = $.parseJSON(data);
    $("#People").empty();
    for(i in People) {

      add_shout(People[i]);
    }
  })
}

function add_shout(shout) {
  var shout_div = $('<div class="single-shout"><div class="shout-header"><h3>'  + '[REPORT NO. ' + shout.count + ']' + '</p><p class="coords">' + shout.author + '</h3></div><div class="shout-info"><p class="date">'  + shout.address + '</p><p class="coords">(EXTRACTED: ' + shout.date_created + ')</p></div><div style="clear:both;"></div><p class="message">' + shout.message + '</p></div>');
  $("#People").prepend(shout_div);


  displayMap(shout.zipcode, shout.count, shout.author);
  // displayMap(shout.zipcode);
}

function displayMap(zipcode, count, author) {
  var geocoder, marker, infowindow, i;
 
  if(!map) {
    map = new google.maps.Map(document.getElementById('map'), { 
      zoom: 3, 
      center: new google.maps.LatLng(42.3584308, -71.0597732), 
      mapTypeId: google.maps.MapTypeId.ROADMAP 
    }); 
  }

  // Getting the address from the text input
  var address = zipcode; //document.getElementById('address').value;
  var seq = count; 
  var company = author;
  // Making the Geocoder call 
  getCoordinates(address, seq, company);

  function getCoordinates(address,seq, company) {
    // Check to see if we already have a geocoded object. If not we create one
    if(!geocoder) {
      geocoder = new google.maps.Geocoder();  
    }

    // Creating a GeocoderRequest object
    var geocoderRequest = {
      address: address
    }

    // Making the Geocode request
    geocoder.geocode(geocoderRequest, function(results, status) {
      
      // Check if status is OK before proceeding
      if (status == google.maps.GeocoderStatus.OK) {
        map.setCenter(results[0].geometry.location);

        if (!infowindow) {
          // Creating a new InfoWindow
          infowindow = new google.maps.InfoWindow();
        }

        var contentA = results[0].geometry.location.lat();
        var contentB = results[0].geometry.location.lng();        

        locations.push([contentA, contentB]);

        var k = locations.length - 1;
        //alert('k = ' + k);
        var content = '';
        var j = locations.length;
        //alert('j = ' + j);
        content += j;
        seqNum = seq.toString();
        seqNum = seqNum + ": " + company;
        //seqNum = seqNum.concat(company);
        //alert('seqNum = ' + seqNum);
 
        marker = new google.maps.Marker({ 
          position: new google.maps.LatLng(locations[k][0], locations[k][1]), 
          map: map 
        });        

        //google.maps.event.addListener(marker, 'click', (function(marker, j) {
        google.maps.event.addListener(marker, 'click', (function(marker, seqNum) {  
          return function() { 
            //infowindow.setContent(content);
            //infowindow.setContent(address);
            infowindow.setContent(seqNum);
            infowindow.open(map, marker); 
          } 
        //})(marker, j)); 
        })(marker, seqNum)); 
      } 
      
    });
  
  }

}

