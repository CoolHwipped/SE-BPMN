jQuery(document).ready( function( $ ){
	jQuery('.hide-content').hide();
});

jQuery(document).on('click', '.toggle-content', function(){
	var $el = jQuery(this).closest('div').find('.hide-content');
	$el.toggle();
	$button = jQuery(this).closest('div').find('.toggle-content');
	if ($button.text() == 'More Information')
	{
		var new_text = 'Less Information';
	}
	else{
		var new_text = 'More Information';
	}
	$button.text(new_text);
});
