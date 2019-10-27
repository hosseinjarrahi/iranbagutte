

$(function() {
	'use strict';
	
	var selector = $('.ac-title');

	$('.accordion-wrapper').each(function() {
		if ($(this).find('.ac-pane').hasClass('active')) {
			$('.ac-pane.active .ac-content').css('display', 'block');
		}
	});
	
	selector.on('click', function(event) {
		event.preventDefault();

		// get the attr value
		var attr = selector.attr('data-accordion');
		var getparent = $(this).closest('.accordion-wrapper');

		if ( $(this).attr('data-accordion') == 'true' ) {

		    if ($(this).next('.ac-content').is(':visible')) {
		    	return false;
		    }else {

		    	getparent.find('.ac-content').slideUp();
		    	$(this).next('.ac-content').slideDown();
		    	getparent.find('.ac-pane').removeClass('active');
		    	$(this).parent().addClass('active');
		    }

		} else {
		    $(this).next('.ac-content').slideToggle();
		    $(this).parent().toggleClass('active');
		}
		
	});
});