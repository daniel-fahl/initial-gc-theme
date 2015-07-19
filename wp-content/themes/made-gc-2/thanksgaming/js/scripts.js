jQuery().ready(function() {
	
	jQuery('#donate_big').click(function() {
		jQuery('#donate_block').animate({ marginLeft: 545 });
	});
	
	jQuery('#donate_block #close-it').click(function() {
		jQuery('#donate_block').animate({ marginLeft: 0 });
	});
	
	jQuery('#about').click(function() {
		jQuery('#about_block').animate({ marginLeft: 545 });
	});
	
	jQuery('#about_block #close-it').click(function() {
		jQuery('#about_block').animate({ marginLeft: 0 });
	});

});