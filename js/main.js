jQuery(document).ready(function($){
	//if you change this breakpoint in the style.css file (or _layout.scss if you use SASS), don't forget to update this value as well
	var MQL = 1170;

	//primary navigation slide-in effect
	if($(window).width() > MQL) {
		var headerHeight = $('.header').height();
		$(window).on('scroll',
		{
	        previousTop: 0
	    },
	    function () {
		    var currentTop = $(window).scrollTop();
		    //check if user is scrolling up
		    if (currentTop < this.previousTop ) {
		    	//if scrolling up...
		    	if (currentTop > 0 && $('.header').hasClass('is-fixed')) {
		    		$('.header').addClass('is-visible');
		    	} else {
		    		$('.header').removeClass('is-visible is-fixed');
		    	}
		    } else {
		    	//if scrolling down...
		    	$('.header').removeClass('is-visible');
		    	if( currentTop > headerHeight && !$('.header').hasClass('is-fixed')) $('.header').addClass('is-fixed');
		    }
		    this.previousTop = currentTop;
		});
	}

	//open/close primary navigation
	$('.primary-nav-trigger').on('click', function(){
		$('.menu-icon').toggleClass('is-clicked');
		$('.header').toggleClass('menu-is-open');

		//in firefox transitions break when parent overflow is changed, so we need to wait for the end of the trasition to give the body an overflow hidden
		if( $('.primary-nav').hasClass('is-visible') ) {
			$('.primary-nav').removeClass('is-visible').one('webkitTransitionEnd otransitionend oTransitionEnd msTransitionEnd transitionend',function(){
				$('body').removeClass('overflow-hidden');
			});
		} else {
			$('.primary-nav').addClass('is-visible').one('webkitTransitionEnd otransitionend oTransitionEnd msTransitionEnd transitionend',function(){
				$('body').addClass('overflow-hidden');
			});
		}
	});

	//Share
	if ($('.share').length > 0) {
		$(window).load(function(){
			$(".share").hideshare({
			    title: $('main h1').eq(0).text(),          // Title for social post defaults to document.title
			    media: $('#intro-preview').data('type'),          // Link to image file defaults to null
			    // decription: $('main h1').eq(0).text(),
			    facebook: true,     // Turns on Facebook sharing
			    twitter: true,      // Turns on Twitter sharing
			    googleplus: true,   // Turns on Google Plus sharing
			    pinterest: true,    // Turns on Pinterest sharing
			    linkedin: false,     // Turns on LinkedIn sharing
			    position: "top", // Options: Top, Bottom, Left, Right
			    speed: 50           // Speed of transition
			});
		});
	}

	//Open links in new tabs
	jQuery("a").each(function(){
		if (this.href.indexOf(location.hostname) == -1) { jQuery(this).attr('target', '_blank'); }
	});
});