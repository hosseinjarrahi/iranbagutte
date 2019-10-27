;(function($) {	
	$.fn.liteAccordion = function(options) {var defaults = {
			containerWidth : 1200,
			containerHeight : 350,
			headerWidth : 40,			
			firstSlide : 1, 
			onActivate : function() {},
			slideSpeed : 800,
			slideCallback : function() {},			
			autoPlay : false,
			pauseOnHover : false, 
			cycleSpeed : 5000,
			theme : 'basic',
			rounded : false,
			enumerateSlides : false
		},
			settings = $.extend({}, defaults, options),
			$accordion = this,
			$slides = $accordion.find('li'),
			slideLen = $slides.length,
			slideWidth = settings.containerWidth - (slideLen * settings.headerWidth),
			$header = $slides.children('h2'),
			utils = {
				getGroup : function(pos, index) {		
					if (this.offsetLeft === pos.left) {
						return $header.slice(index + 1, slideLen).filter(function() { return this.offsetLeft === $header.index(this) * settings.headerWidth });
					} else if (this.offsetLeft === pos.right) {
						return $header.slice(0, index + 1).filter(function() { return this.offsetLeft === slideWidth + ($header.index(this) * settings.headerWidth) });	
					} 					
				},
				nextSlide : function(slideIndex) {
					var slide = slideIndex + 1 || settings.firstSlide;
					// get index of next slide
					return function() {
						return slide++ % slideLen;
					}
				},
				play : function(slideIndex) {
					var getNext = utils.nextSlide((slideIndex) ? slideIndex : ''),start = function() {
							$header.eq(getNext()).click();
						};
					
					utils.playing = setInterval(start, settings.cycleSpeed);			
				},
				pause : function() {
					clearInterval(utils.playing);
				},
				playing : 0,
				sentinel : false
			};		
		
		$accordion
			.height(settings.containerHeight)
			.width(settings.containerWidth)
			.addClass(settings.theme)
			.addClass(settings.rounded && 'rounded');
		
		$header
			.width(settings.containerHeight)
			.height(settings.headerWidth)
			.eq(settings.firstSlide - 1).addClass('selected');
		
		// ie :(
		if ($.browser.msie) {
			if ($.browser.version.substr(0,1) > 8) {
				$header.css('filter', 'none');
			} else if ($.browser.version.substr(0,1) < 7) {
				return false;
			}
		}
		
		$header.each(function(index) {
			var $this = $(this),
				left = index * settings.headerWidth;
				
			if (index >= settings.firstSlide) left += slideWidth;
			
			$this
				.css('left', left)
				.next()
					.width(slideWidth)
					.css({ left : left, paddingLeft : settings.headerWidth });
			
			// add number to bottom of tab
			settings.enumerateSlides ;			

		});	
				
		// bind event handler for activating slides
		$header.click(function(e) {
			var $this = $(this),
				index = $header.index($this),
				$next = $this.next(),
				pos = {
					left : index * settings.headerWidth,
					right : index * settings.headerWidth + slideWidth,
					newPos : 0
				}, 
				$group = utils.getGroup.call(this, pos, index);
								
			// set animation direction
			if (this.offsetLeft === pos.left) {
				pos.newPos = slideWidth;
			} else if (this.offsetLeft === pos.right) {
				pos.newPos = -slideWidth;
			}
			if (!$header.is(':animated')) {	
				if (e.originalEvent) {
					if (utils.sentinel === this) return false;
					settings.onActivate.call($next);
					utils.sentinel = this;
				} else {
					settings.onActivate.call($next);
					utils.sentinel = false;
				}
				$header.removeClass('selected').filter($this).addClass('selected');			
				$group
					.animate({ left : '+=' + pos.newPos }, settings.slideSpeed, function() { settings.slideCallback.call($next) })
					.next()
					.animate({ left : '+=' + pos.newPos }, settings.slideSpeed);						
			}
		});				
		if (settings.pauseOnHover) {
			$accordion.hover(function() {
				utils.pause();
			}, function() {
				utils.play($header.index($header.filter('.selected')));
			});
		}
		settings.autoPlay && utils.play();		
		return $accordion;		
	};	
})(jQuery);