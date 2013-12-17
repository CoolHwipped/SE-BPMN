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

jQuery(document).on("click", "#publish", function(){
  
  var errors = "";
  var phone = jQuery("#job-postings-contact-phone").val();
  var email = jQuery("#job-postings-contact-email").val();
  var payrate = jQuery("#job-postings-payrate").val();
  var phoneReg = /^\(?([0-9]{3})\)?[-. ]?([0-9]{3})[-. ]?([0-9]{4})$/;
  var emailReg = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
  var payReg = /^\d+(\.\d{1,2})?$/;
  
  //validation
  email_is_valid = emailReg.test(email);
  phone_is_valid = phoneReg.test(phone);
  pay_is_valid = payReg.test(payrate);
  
  if(!phone_is_valid)
  {
    errors += "Phone Number is not in the correct format.\n"; 
  }
  if(!email_is_valid)
  {
    errors += "Email is in the incorrect format.\n";
  }
  if(!pay_is_valid)
  {
    errors += "Pay Rate must be decimal number. e.g 7.00 \n";
  }
  if(errors != "")
  {
     alert(errors);      
     return false;
  } 	
});
