jQuery(document).ready( function( $ ){
	var max_date = jQuery('#max-date').val();
	var max_length = jQuery('#max-duration').val();
	var date = jQuery( "#job-postings-datepicker" ).val();
	jQuery( "#job-postings-datepicker-jquery" ).datepicker({
		onSelect: function(current_date){
			var start = new Date(current_date);
			var end = new Date(max_date);
			if(start<end){
				jQuery( "#job-postings-datepicker" ).val(current_date);
				date = jQuery( "#job-postings-datepicker" ).val();
			}
			else{
				jQuery( "#job-postings-datepicker-jquery" ).datepicker( "setDate", date );
				alert('Please choose a date that is before ' + max_date);
			}
		}
	});
	jQuery( "#job-postings-datepicker-jquery" ).datepicker( "setDate", date );
});
