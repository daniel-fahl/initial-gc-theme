jQuery(function(){

	jQuery("#live_select a:first-child").addClass("active");

	var $boxContent = jQuery("#live_content"),
		URL = '',
		$el;
		
	//jQuery("#live_select a").each(function() {
	
		//jQuery(this).attr("href", "#" + this.pathname );
	
	//});	

	jQuery("#live_select a").click(function(e){
		
		e.preventDefault();
	    
	    jQuery("#live_select a").addClass("active").not(this).removeClass("active");
	    
	    $el = jQuery(this);
	    
	    $boxContent.animate({ opacity: "0"});
	    
	    URL = $el.attr("href");
	    URL = URL + " #live_content";
	    $boxContent.load(URL, function() {
	    
	    	$boxContent.animate({ opacity: "1" });
	    
	    });
	});
});