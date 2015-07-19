jQuery(function() {

	var $boxContent = jQuery("#loadwrap"),
		URL = '',
		$el,
		$el2;
		
	jQuery('ul.post-filter li a, .page-nav a').click(function(event) {
	
		event.preventDefault();
		
		$el = jQuery(this);
		
		$boxContent.animate({ opacity: "0"});
		
		
		
		URL = $el.attr("href");
		URL = URL + " #load";
		$boxContent.load(URL, function() {
		
			$boxContent.animate({ opacity: "1" });
			
			jQuery.getScript("masonry.pkgd.min.js");
			
			jQuery('#infinite').masonry({
			  itemSelector: '.p-block',
			  resizeable:false,
			  isAnimated: true
			});
			
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
		
		});
		
	});
									
});
	
	 
