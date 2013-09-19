/**
* Google Places Scripts
* Author: Jenn Schiffer
*/

$(document).ready(function(){
	
	var input = document.getElementById('provider');
	var options = { componentRestrictions: {country: 'us'} };
	
	autocomplete = new google.maps.places.Autocomplete(input, options);
	google.maps.event.addListener(autocomplete, 'place_changed', function() {
		var place = autocomplete.getPlace();	
		var address = '';
		if ( typeof(place.address_components) !== 'undefined') {
						
			var provider = '';
			var street = '';
			var number = '';
			var route = '';
			var town = '';
			var state = '';
			var postalCode = ''; 
			var country = '';
			var phone = '';
			
			for (var i = 0; i <= 6; i++) {
				if ( typeof(place.address_components[i]) !== 'undefined' ) {
					if( typeof(place.address_components[i].types[0]) !== 'undefined' && place.address_components[i].types[0] !== 'undefined' ) {
						if ( place.address_components[i].types[0] == "name" ) {
							provider = place.address_components[i].long_name;
						}
						else if ( place.address_components[i].types[0] == "street_address" ) {
								street = place.address_components[i].long_name;
							}
							else if ( place.address_components[i].types[0] == "locality" ) {
									town = place.address_components[i].long_name;
								}
								else if ( place.address_components[i].types[0] == "administrative_area_level_1" ) {
					  				state = place.address_components[i].long_name;
					  			}
					  			else if ( place.address_components[i].types[0] == "country" ) {
						  				country = place.address_components[i].long_name;
						  			}
						  			else if ( place.address_components[i].types[0] == "postal_code" ) {
							  				postalCode = place.address_components[i].long_name;
							  			}
							  			else if ( place.address_components[i].types[0] == "street_number" ) {
							  				number = place.address_components[i].long_name;
							  			}
								  			else if ( place.address_components[i].types[0] == "route" ) {
									  				route = place.address_components[i].long_name;
									  			}
									  			else if ( place.address_components[i].types[0] == "formatted_phone_number" ) {
										  				phone = place.address_components[i].long_name;
									  				}
					}
				}
			}
			
			$("#provider").addClass("remove-this").parent("p").children("label")
				.after('<input type="text" value="' + place.name + '" id="provider" name="provider">');
			$(".remove-this").remove();
			$("#address").val(number + " " + route);
			$("#city").val(town);
			$("#zip").val(postalCode);
			$("#phone").val(phone);
		}
	
	});

});