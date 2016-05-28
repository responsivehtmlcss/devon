/**
 * Functionality specific to WP Custom Theme.
 *
 * Provides helper functions to enhance the theme experience.
 */

( function( $ ) {
	var body    = $( 'body' ),
	    _window = $( window );
	/**
	 * Makes "skip to content" link work correctly in IE9 and Chrome for better
	 * accessibility.
	 *
	 * @link http://www.nczonline.net/blog/2013/01/15/fixing-skip-to-content-links/
	 */
	_window.on( 'hashchange.wpcustomtheme', function() {
		var element = document.getElementById( location.hash.substring( 1 ) );

		if ( element ) {
			if ( ! /^(?:a|select|input|button|textarea)$/i.test( element.tagName ) ) {
				element.tabIndex = -1;
			}

			element.focus();
		}
	} );
} )( jQuery );

jQuery(function(){
	// Slider Home page
    jQuery('.home-banner-container').bxSlider({
        mode:"horizontal",
        pager:false,
        auto:true        
    });
	// Mobile Menu 
	var removeClass = true;
	jQuery(".menu-toggle").click(function () {
		jQuery("body").toggleClass("menu-open");
		removeClass = false;
	});
	jQuery("#menu-main-menu").click(function() {
		removeClass = false;
	});
	jQuery("html").click(function () {
		if (removeClass) {
			jQuery("body").removeClass("menu-open");
		}
		removeClass = true;
	});


	jQuery(window).scroll(function() {
		if(jQuery(this).scrollTop() > 1) {
			jQuery('body').addClass("scrolled");
		} else {
			jQuery('body').removeClass("scrolled");
		}
	});

	jQuery('.video-slider').bxSlider({
	 	slideWidth: 200,
	    minSlides: 1,
	    maxSlides: 5,
	    moveSlides: 1,
	    slideMargin:10,
	    auto:false,
	    pager:false
	 });
	 jQuery(".video-slider li").click(function(){
	 	jQuery(this).addClass("active");
	 	jQuery(this).siblings().removeClass("active");
	 });

	 // Video lightbox
    jQuery('.lightbox-vedio').fancybox({
		padding : 0,
		openEffect  : 'none',
		closeEffect : 'none',
		helpers : {
			media : {}
		}
	});
	

	
});

jQuery(window).resize(function() {
	
});

jQuery(window).scroll(function() {
	
});