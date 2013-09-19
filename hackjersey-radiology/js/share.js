/**
* Share Form Scripts
* Author: Jenn Schiffer
*/

$(document).ready(function(){
	
	// procedure field autocomplete
	$('#procedure-query').keyup(function() {
		var query = "query=" + $(this).val();
		$('ul.autocomplete').empty();
		$.getJSON("/wp-content/themes/chc-rev/includes/ajax-autocomplete-procedure.php", query,
			function(data){
				if ( data == null ) {
					return false;
				}
				else {
					var quantity = data.length-1;
					if ( quantity > 10 ) {
						quantity = 10;
					}
					
					for ( var i = 0; i <= quantity; i++) {
						$('ul.autocomplete').show().append('<li>' + data[i] + '</li>');
					}
				}
			}
		);
		$(this).css('background-image','none');      
	});
	
	// validate share form
	$("#share-costs").click( function(){
		$("input").removeClass('empty');
		$("div").removeClass('empty');
		$("p").removeClass('empty');
		$("#warning").remove();
		
		var validInput = true;
		var validPrice = true;
				
		if ($("#provider").val().length == 0) {
			$("#provider").addClass('empty');
			validInput = false;
		}
		
		if ($("#city").val().length == 0) {
			$("#city").addClass('empty');
			validInput = false;
		}
		
		if ( !$.isNumeric($("#cost").val())) {
			$("#cost").addClass('empty');
			validPrice = false;
		}
				
		if ( validInput == false ) {
			$(this).parent("form").append('<span id="warning">Fill in all required fields.</span>');
			return validInput;
		}
		else if ( validPrice == false ) {
				$(this).parent("form").append('<span id="warning">Enter a valid number for "cost".</span>');
				return validPrice;
			}
	});

});