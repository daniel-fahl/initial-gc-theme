jQuery().ready(function() {

	jQuery(window).stellar({
		horizontalScrolling: false,
	});

	jQuery('#bbp_topic_subscription').attr('checked', true);
	
	jQuery('#login-button').click(function() {
		jQuery('#login-box').slideToggle('fast', function() {
		 // Animation complete.
		});
	});
	
	
	
	jQuery('.widget.community .section').click(function() {
		jQuery('.inner.community').slideToggle('fast');
		jQuery(this).toggleClass('active');
	});
	
	jQuery('.site_message .dismiss').click(function() {
		jQuery('.site_message').slideUp('fast');
	});
	
	jQuery('.widget.videos .section').click(function() {
		jQuery('.videofeed').slideToggle('fast');
		jQuery(this).toggleClass('active');
	});
	
	jQuery('.is-favorite a:first-child').click(function(e) { e.preventDefault(); });

	jQuery('#item-header .error').delay('3000').fadeOut('3000');	
	
	jQuery('.bbp-reply-content').addClass('clearfix');
	
	jQuery(".press-expand").click(function() {
	  jQuery(".expand_block").animate({ opacity: 1.0 },200).slideToggle(300, function() {
	    jQuery(".press-expand").text(jQuery(this).is(':visible') ? "Read Less" : "Read More");
	  });
	  jQuery(".dots").css({'display':'none'});
	});
	
	jQuery('.stafflinks a').click(function() {
		var $link = jQuery(this).attr('href');
		jQuery('html, body').animate({
			scrollTop: jQuery($link).offset().top
		}, 1000, 'swing');
	});
	
	jQuery('#quickjump li a').click(function() {
		var $link = jQuery(this).attr('href');
		jQuery('html, body').animate({
			scrollTop: jQuery($link).offset().top
		}, 2800, 'easeInOutQuint' );
	});
	
	jQuery('#searchtoggle').click(function() {
		jQuery('.navsearch').slideToggle('fast');
	});

});

jQuery(function(){

	var $newsContent = jQuery("#cb-news"),
		URL = '',
		$el;	

	jQuery("#cb-news .page_navigation a").click(function(e){
		
		e.preventDefault();
	    	    
	    $el = jQuery(this);
	    
	    $newsContent.animate({ opacity: "0"});
	    
	    URL = $el.attr("href");
	    URL = URL + " #cb-news";
	    $newsContent.load(URL, function() {
	    
	    	$newsContent.animate({ opacity: "1" });
	    
	    });
	});
	
	var $communityContent = jQuery("#cb-community"),
		URL = '',
		$el;	
	
	jQuery("#cb-community .page_navigation a").click(function(e){
			
		e.preventDefault();
		    	    
		$el = jQuery(this);
		    
		$communityContent.animate({ opacity: "0"});
		    
		URL = $el.attr("href");
		URL = URL + " #cb-community";
		$communityContent.load(URL, function() {
		    
		    $communityContent.animate({ opacity: "1" });
		    
		});
	});
});

