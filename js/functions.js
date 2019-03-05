"use strict";


	/*-----------------------------------------------------------------------------------*/
	/*	Main menu
	/*-----------------------------------------------------------------------------------*/

	/* Add Support for touch devices for desktop menu */
	

	function moveNav() {
		/* Create ghost-na-wrap if it doesn't exist */
		if ( !$('.ghost-nav-wrap').length ) {
			$('body').prepend('<div class="ghost-nav-wrap empty site-navigation"></div>')
		}

		if ( (window.innerWidth < screenLarge) && $('.ghost-nav-wrap').hasClass('empty') ) {
			/* Mobile */
	    	$("nav.site-navigation .mobile-wrap").detach().appendTo('.ghost-nav-wrap');
	    	$('.ghost-nav-wrap').removeClass('empty');
	    	$('.menu-item-has-children').each(function(){
				$( "> ul", this ).hide();
				$('.megamenu').hide();
			});
	    } else if ( (window.innerWidth > screenLarge - 1) && !$('.ghost-nav-wrap').hasClass('empty') ) {
	    	/* Desktop */
	    	$('.ghost-nav-wrap .mobile-wrap').detach().appendTo('nav.site-navigation');
	    	$('.ghost-nav-wrap').addClass('empty');
	    	$('.menu-item-has-children').each(function(){
				$( '> ul', this ).show();
				$('.megamenu').show();
			});
	    }

	    /* Reset if mobile nav is open and window is resized to desktop mode */
	    if ((window.innerWidth > screenLarge - 1) && $('html').hasClass('show-menu')) {
	    	$('.burger').toggleClass('active');
	    	$('html').removeClass('show-menu');
	    }
	} 

	moveNav();
	$( window ).resize(function() {
		moveNav();
		if ($('body').hasClass('stickyheader')) {
			setSticky();
		}
	});



	$('.menu-item-has-children').each(function(){
		$(this).append('<span class="mobile-showchildren"><i class="fa fa-angle-down"></i></span>');
	});

	$(".mobile-showchildren").on('click', function(){
		$(this).siblings("ul, .megamenu").toggle('300');
	});

	function setSticky() {
		var topbarHeight = 0,
			headerHeight = 0;

		if ( $('.top-bar').length ) {
			topbarHeight = $('.top-bar').outerHeight();
		}
		if ( $('.site-header').length && !$('header.bottom').length ) {
			headerHeight = $('.site-header').outerHeight();
		}	

		var offset = topbarHeight + headerHeight;

		if( $('header.bottom').length ) {
			offset += $(window).innerHeight();
		}

		if (window.innerWidth > screenLarge - 1) {
			var headerwaypoint = new Waypoint({
				element: $('body'),
				handler: function(direction) {
					if ((direction == 'down') && (window.innerWidth > screenLarge - 1)) {
						$('.site-header').css('opacity', '0');
						$('.site-header').addClass('sticky');
						$('.site-header').animate({opacity:1});
						if(!$('.site-header').hasClass('transparent')){
							$('.site-main').css('padding-top', headerHeight + 'px' );
						}				
					} else if ($('.site-header').hasClass('sticky')) {
						$('.site-header').removeClass('sticky');
						$('.site-main').css('padding-top', '0' );
					}
					
				},
				offset: -offset
			})
		} 
	}

	if ( $('body').hasClass('stickyheader') ) {
		setSticky();
	}

	


	/*-----------------------------------------------------------------------------------*/
	/*	Fixed Footer
	/*-----------------------------------------------------------------------------------*/

	if( $('.fixed-footer').length ) {
		fixedFooter();

		$(window).resize(function() {
			fixedFooter();
		});
	}

	function fixedFooter() {
		$('.site-main').css('margin-bottom', $('.site-footer').innerHeight());
	}

	/*-----------------------------------------------------------------------------------*/
	/*	Quantity field
	/*-----------------------------------------------------------------------------------*/

	$('.quantity input[type="button"]').on('click', function(e) {
		var field = $(this).parent().find('.quantity-field'),
			val = parseInt(field.val(), 10),
			step = parseInt(field.attr('step'), 10),
			min = parseInt(field.attr('min'), 10),
			max = parseInt(field.attr('max'), 10);

		if( $(this).val() === '+' && (val < max || !max) ) {
			/* Plus */
			field.val(val + step);
		} else if ( $(this).val() === '-' && val > min ) {
			/* Minus */
			field.val(val - step);
		}
	});
