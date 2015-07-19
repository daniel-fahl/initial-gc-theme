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
	
	jQuery('.modalDialog .close').click(function() {
		jQuery('.modalDialog').hide();
	});
	
	jQuery(document).ready(function(){
	                jQuery(".kkcount-down-1").kkcountdown({
	                	dayText		: 'day ',
	                	daysText 	: 'days ',
	                    hoursText	: 'h ',
	                    minutesText	: 'm ',
	                    secondsText	: 's',
	                    displayZeroDays : false,
	                    callback	: test,
	                    oneDayClass	: 'one-day'
	                });
	                jQuery(".kkcount-down").kkcountdown({
	                	dayText		: 'd ',
	                	daysText 	: 'd ',
	                    hoursText	: ':',
	                    minutesText	: ':',
	                    secondsText	: '',
	                    displayZeroDays : false,
	                    callback	: test,
	                    addClass	: 'shadow'
	                });
	            });
	            function test(){
	            	console.log('KONIEC');
	            }

});