jQuery(window).load(function(){

	jQuery('#infinite').masonry({
	  itemSelector: '.p-block'
	});
	
	var $container = jQuery('#infinite').isotope({
	  // options
	});
	// filter items on button click
	jQuery('.subnav li a').click( function(event) {
	  event.preventDefault();
	  var filterValue = jQuery(this).attr('data-filter');
	  $container.isotope({ filter: filterValue });
	  jQuery('.subnav li a').removeClass('active');
	  jQuery(this).addClass('active');
	});

});


jQuery().ready(function() {

		jQuery(window).scroll(function() {
	    if (jQuery("#header").offset().top > 80) {
	        jQuery("#header").addClass("nav-collapse");
	    } else {
	        jQuery("#header").removeClass("nav-collapse");
	    }
	});
	
	jQuery('.home #feature .float-block').delay(2000).fadeIn('slow');
	
	jQuery.stellar({
	  // Set scrolling to be in either one or both directions
	  horizontalScrolling: false,
	});
	
	jQuery('.page-nav a').click(function() {
		var $anchor = $(this);
		jQuery('html, body').stop().animate({
		    scrollTop: jQuery('#subnav').offset().top
		}, 1500, 'easeInOutExpo');
		event.preventDefault();
	});
	
	jQuery('#feature .item').first().addClass('active');
	
	jQuery('.carousel-control.left').click(function() {
	  jQuery('#feature').carousel('prev');
	});
	
	jQuery('.carousel-control.right').click(function() {
	  jQuery('#feature').carousel('next');
	});
	
	/* 
	jQuery(window).unbind('.infscr');
	
	var $container = jQuery('#infinite');
	$container.infinitescroll({
	   
	   navSelector  : '.navigation',    // selector for the paged navigation
	   nextSelector : '.navigation a',  // selector for the NEXT link (to page 2)
	   itemSelector : '.p-block',     // selector for all items you'll retrieve
	    
	  },
	  // trigger Masonry as a callback
	  function( newElements ) {
	    var $newElems = jQuery( newElements );
	    $container.masonry( 'appended', $newElems );
	  }
	);
	
	jQuery('.page-nav a').click(function() {
		jQuery(document).trigger('retrieve.infscr');
		
	});
	
	*/
	
	jQuery( ".single-thumb .author" ).delay(500).show(500);
	
	jQuery( ".gc-search" ).click(function() {
		event.stopPropagation();
		jQuery("#sitesearch").addClass("search-expand");
		jQuery("#sitesearch input#s").show();
		jQuery("#sitesearch input#s").focus();
	});
	
	jQuery(document).click(function(){
	    jQuery("#sitesearch").removeClass("search-expand");
	    jQuery("#sitesearch input#s").hide();
	 
	});
	
	jQuery( "a.nav-icon" ).click(function() {
		jQuery("ul.nav").slideToggle(500);
	});
	
	/*
	jQuery('.post-block').hover(function(){
		jQuery(this).find('.banner').show(300);
	}, function() {
		jQuery(this).find('.banner').hide(300);
	});
	*/
	
	jQuery('.nav li').hover(function(){
		jQuery(this).find(".sub-menu").slideDown(300);
	}, function() {
		jQuery(this).find(".sub-menu").slideUp(300);
	});
	
	/*jQuery('#dates li a').hover( function() {
		jQuery(this).toggleClass('m-location');
	});*/
	
	
});
