jQuery(document).ready( function( $ ){
	jQuery( "#job-postings-datepicker-jquery" ).datepicker({
		onSelect: function(date) {
			jQuery( "#job-postings-datepicker" ).val(date);
		}
	});
	date = jQuery( "#job-postings-datepicker" ).val();
	day = date.substring(0,2);
	month = date.substring(2,4);
	year = date.substring(4,8);
	date = day + "/" + month + "/" + year;
	jQuery( "#job-postings-datepicker-jquery" ).datepicker( "setDate", date );
	// java script things
});
