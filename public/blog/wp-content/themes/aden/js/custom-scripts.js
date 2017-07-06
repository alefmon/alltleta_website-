jQuery(document).ready(function( $ ) {

	"use strict";
	// Fixed Sidebar Scroll
	$('.fixed-sidebar').perfectScrollbar({
		suppressScrollX : true,
		includePadding : true
	});

	// Responsive Menu 
	$( '.nav-mobile .menu-item-has-children' ).prepend( '<div class="sub-menu-btn"></div>' );
	$('.nav-mobile .sub-menu').before( '<span class="sub-menu-btn-icon"><i class="fa fa-sort-desc"></i></span>' );


	//Responsive sub-menu btn
	$('.sub-menu-btn').click(function(){
		$(this).closest('li').children('.sub-menu').slideToggle();
		$(this).closest('li').children('.sub-menu-btn-icon').children('i').toggleClass( 'fa-rotate-270' );
	});

	// sub-menu slide toggle
	var nav = $('.nav');
	
	// Admin Bar Height
	var adminBar = 0;
	if ( $('body').hasClass('admin-bar') ) {
		adminBar = 32;
	}

	// Navigation Hover 
	nav.find('li').hover(function () {
	    $(this).children('.sub-menu').stop().fadeToggle( 200 );
	}, function() {
		$(this).children('.sub-menu').stop().fadeToggle( 200 );
	});

	// Resposive Nav Menu btn
	$('.nav-btn').click(function(){
		$( ".nav-mobile" ).slideToggle( 'slow' );
	});

	$( window ).resize(function() {
		if ($('.nav-btn').css('display') == 'none' ) {
			$( '.nav-mobile' ).css({'display':'none'});
	 	}
	});

	// Search  FadeIn
	$('.search-btn').on( 'click', function() {
		$('.header-search-form').fadeIn(400);
		$('.search-input-wrap').css('transform', 'scale( 1, 1 )' );
		$( ".header-search-input" ).focus();
	});

	// Search Fadeout 
	$('.header-search-form').on( 'click', function(event) {
		if ( event.target.className !=='header-search-input' &&  event.target.className !=='fa fa-search' &&  event.target.className !== 'header-search-input-btn' ) {
			$('.header-search-form').fadeOut(400);
			$('.search-input-wrap').css('transform', 'scale( 0.8, 0.8 )' );
		}		
	});

	// Loading Main Content
	$('.main-container-wrap').animate({'opacity':'1'}, 300 );

	// Gutter & Post Column
	var postColumn,
	counter = 0,
	postGutter =  $( ".main-post" ).data('post-gutter');

	function adenitResponsiveColumn(){		
		if ( $('.responsive-column').css('display') === 'none' ) {
			postColumn = 2;
		}
		if ( $('.responsive-column').css('opacity') === '0' ) {
			postColumn = 1;
		}
	}
	
	adenitResponsiveColumn();
	adenitColumn();
	$( window ).resize(function() {
		adenitResponsiveColumn();
		adenitColumn();
	});

	function adenitColumn() {
		counter = 0;
		$('.main-container .clear-grid').remove();
		$( ".main-post" ).each(function() {
		counter++;
		if ( $('.responsive-column').css('display') !== 'none' ) {
			if ( $( this ).data('post-column') ) {
				postColumn = parseInt( $( this ).data('post-column').slice(-1), 10 );
			}	
		}

		if ( $( this ).data('post-column') === 'col-1' ) {
			postColumn = 1;
		}
		
		// Post Column
		if ( $( this ).data('post-fullwidth') === 1 ) {
			$( this ).addClass('col-1');
			$( this ).css( "width", "100%" );
			$( this ).css( "margin-right", "0" );
			$( this ).after('<div class="clear-grid"></div>');
			counter = 0;
		} else if ( postColumn === 2 ) {
			$( this ).addClass('col-2');
			$( this ).css( "width", "calc((100% - "+ postGutter +"px ) /"+ postColumn +")" );
			$( this ).css( "width", "-webkit-calc((100% - "+ postGutter +"px ) /"+ postColumn +")" );
		} else if ( postColumn === 3 )  {
			$( this ).addClass('col-3');
			$( this ).css( "width", "calc((100% - 2 * "+ postGutter +"px ) /"+ postColumn +")" );
			$( this ).css( "width", "-webkit-calc((100% - 2 * "+ postGutter +"px ) /"+ postColumn +")" );
		} else {
			$( this ).addClass('col-1');
			$( this ).css( "width", "100%" );
		}

		if ( counter === postColumn ) {
			$( this ).css( "margin-right", "0" );
			$( this ).after('<div class="clear-grid"></div>');
			counter=0;
		} else {
			$( this ).css( "margin-right", postGutter );
		}

		// Video Size
		if ( postColumn > 1 && $( this ).data('post-fullwidth') !== '1' ) {
			$('.entry-video').find('iframe').attr( 'height','240' ).attr( 'width','360' );
		} else {		
			$('.entry-video').find('iframe').attr( 'height','410' ).attr( 'width','730' );
		}

		});
		
	}

	// Audio Size
	$('.entry-audio').find('iframe').attr( 'height','100' );

	// FitVids Size
	$('.entry-video').fitVids();

	// Click event to scroll to top
	$('.scrolltotop').click(function(){
		$('html, body').animate( { scrollTop : 0},800);
		return false;
	});

	// Fixed Menu
	var headerHeight = $('.header-bottom').offset().top - adminBar;
	$(window).scroll( function(){
		if ( $(this).scrollTop() >= headerHeight ) {
			$('.fixed-header-bottom').css('display','block');
		} else {
			$('.fixed-header-bottom').css('display','none');
		}
		
		// Carousel icon 
		if ( $('.adenit-carousel').length && ( $(this).scrollTop() >= ( $('.main-container-wrap').offset().top - adminBar ) ) ) {
			$('.carousel-btn').fadeIn(500);
		} else {
			$('.carousel-btn').fadeOut(300);
		}
	});

	// Easing Function
	$.easing.jswing = $.easing.swing;
	$.extend($.easing,
	{
	    def: 'easeOutQuad',
	    swing: function (x, t, b, c, d) {
	        //alert($.easing.default);
	        return $.easing[$.easing.def](x, t, b, c, d);
	    },
	    easeOutQuad: function (x, t, b, c, d) {
	        return -c *(t/=d)*(t-2) + b;
	    },
	    easeInOutQuart: function (x, t, b, c, d) {
	        if ((t/=d/2) < 1) return c/2*t*t*t*t + b;
	        return -c/2 * ((t-=2)*t*t*t - 2) + b;
	    }
	});

	// Carousel Effect
	function adenitCarouselEffect() {
		if ( $('body').hasClass('home') ) {
			if (  $(window).scrollTop() >= ( $('.header-bottom').offset().top - 200 ) ) {
				$('.adenit-carousel-wrap' ).css('opacity','1');
				$('.adenit-carousel-wrap' ).slideDown(1100, 'easeInOutQuart');	
				setTimeout(function(){
				$('.quote-cursor').fadeOut(800);
				}, 4000);
			}

			var  carouselScroll = $('.adenit-carousel-wrap').offset().top - $('.header-bottom').height() - adminBar;
			if ( $(window).scrollTop() == carouselScroll ) {
				$('.carousel-quote').css('cursor','auto');
			} else {
				$('.carousel-quote').css('cursor','pointer');
			}

		}
	}

	// Checkbox Carousel effect 
	if ( $('.adenit-carousel-wrap').data('effect') ) {
		// Carousel Display None
		$('.adenit-carousel-wrap' ).css('opacity','0');
		$('.adenit-carousel-wrap' ).slideUp(1);

		$(window).load( function(){
			adenitCarouselEffect();
	    });

		$(window).scroll( function(){
			adenitCarouselEffect();
	    });
	}

	// Carousel Title Effect
	$(window).load( function(){
       $('.carousel-quote p').css({
			'display':'block',
			'animation':'type 7s steps(60, end)'			
		});
    });

	// Carousel Quote Click Function
	$('.carousel-quote').on('click', function () {
		$('.adenit-carousel-wrap' ).css('opacity','1');
		$('.adenit-carousel-wrap' ).slideDown(1100, 'easeInOutQuart');
		var  carouselScroll = $('.adenit-carousel-wrap').offset().top - $('.fixed-header-bottom').height() - adminBar;
		$('html, body').animate( { scrollTop :carouselScroll },800);
		return false;
	});

	// Click event to carousel button
	$('.carousel-btn').on('click', function () {
		var  carouselScroll = $('.adenit-carousel-wrap').offset().top - $('.fixed-header-bottom').height() - adminBar;
		$('html, body').animate( { scrollTop :carouselScroll },800);
		return false;
	});

	// Carousel Bounce Function
	function adenitDoBounce(element, times, distance, speed) {
		for(var i = 0; i < times; i++) {
			element.animate({marginTop: '-='+distance},speed).animate({marginTop: '+='+distance},speed);
		}
	}

	$('.carousel-item').hover(function() {
		$(this).find('.carousel-comm-likes-wrap').animate({ top: '17px' }, 200 );
			adenitDoBounce( $(this).find('.carousel-like'), 2, '5px', 100 );
			adenitDoBounce( $(this).find('.carousel-comment'), 2, '5px', 120 );
		}, function() {
			$(this).find('.carousel-comm-likes-wrap').animate({ top: '-60px' }, 200 );
	});
	
	if (  $('.adenit-carousel-wrap').length > 0 ) {
	var	items = $('.adenit-carousel-wrap').data('items'),
		items = parseInt( items.slice(-1), 10 ), 
		itemsTablet = 2,
		itemsDesktopSmall = items,
		autoPlay = $('.adenit-carousel-wrap').data('autoplay'),
		navigation = $('.adenit-carousel-wrap').data('navigation'),
		pagination = ($('.adenit-carousel-wrap').data('pagination') === 1 )? true: false;
		
		if (autoPlay === 0 ) {
			autoPlay = false;
		}
	
		if (items > 2 ) {
			itemsDesktopSmall = items - 1; 
		}

		if ( items === 1 ){
			itemsTablet = 1;
		}

		// On/Off Main Carousel Navigation
		if ( navigation === 'off' ) {
			navigation = false;
		} else {
			navigation = true;
		}

	// Main Carousel Function
	$(".adenit-carousel").owlCarousel({
		autoPlay: autoPlay,
	  	pagination: pagination,
	    navigation: true,
	    items: items,
	    itemsDesktop: [2000, items],
	    itemsDesktopSmall: [979,itemsDesktopSmall ],
	    itemsTablet: [768,itemsTablet],
	    itemsMobile: [479,1],
	    navigationText: [
	      "<i class='fa fa-angle-left'></i>",
	      "<i class='fa fa-angle-right'></i>"
	      ],
	    afterInit: function(){
	    	if (  $('.adenit-carousel-wrap').data('navigation') === 'display' ) {
				$('.owl-buttons').css('display','block');
			}
	    }
	 });
    }

	// Gallery Post Format Carousel 
	$(".entry-gallery").owlCarousel({
		navigation : true, // Show next and prev buttons
		slideSpeed : 300,
		pagination: false,
		singleItem:true,
		navigationText: [
	      "<i class='fa fa-angle-left'></i>",
	      "<i class='fa fa-angle-right'></i>"
	      ]
	});

	// Wordpress Default Gallery LightBox 
	$('.gallery').magnificPopup({	
		delegate: 'a[href*="wp-content/uploads"]',
		type: 'image',
		mainClass: 'mfp-with-zoom mfp-img-mobile',
		zoom: {
			enabled: true,
			duration: 300
		},
		gallery: {
			enabled: true,
			tCounter: '<span class="mfp-counter">%curr%/%total%</span>'
		},
		image: {
			verticalFit: true
		}
	});

	// Wordpress Defult Image LightBox 
	var  wpImgLightbox = $('img[class*="wp-image"]').parent('a[href*="wp-content/uploads"]');
	$(wpImgLightbox).magnificPopup({
		type: 'image',
		midClick: true,
		closeOnContentClick: true,
		fixedContentPos: true,
		image: {
			verticalFit: true,
			titleSrc: function(item) {
				return '<strong>' + item.el.find('img').attr('alt') + '</strong>';
			}
		},
		zoom: {
			enabled: true,
			duration: 300
		}
	});

	// Standart & Image Format Lightbox
	$( '.adenit-lightbox' ).magnificPopup({
		type: 'image',
		midClick: true,
		closeOnContentClick: true,
		fixedContentPos: true,
		image: {
			verticalFit: true
		},
		zoom: {
			enabled: true,
			duration: 300
		}
	});

	var fixedSidebar =  $( ".fixed-sidebar" ).data('width');
	// Plus Sidebar Open
	$('.fixed-sidebar-btn').on('click', function () {
		$('.main-wrap').css( 'margin-left','-'+ fixedSidebar +'px' );
		$('.fixed-header-bottom').css( 'left','-'+ fixedSidebar +'px' );
		$('.fixed-sidebar').css( 'right','0' );
		$('.fixed-sidebar-close').fadeIn(350);
		$('.fixed-sidebar-btn i').css({
			'-webkit-transform' : 'rotate(45deg)',
			'-moz-transform' : 'rotate(45deg)',
			'-ms-transform' : 'rotate(45deg)',
			'transform' : 'rotate(45deg)'
		});
	});

	// Plus Sidebar Close
	$(' .fixed-sidebar-close, .fixed-sidebar-close-btn ').on('click', function () {
		$('.main-wrap').css( 'margin-left','0' );
		$('.fixed-header-bottom').css( 'left','0' );
		$('.fixed-sidebar').css( 'right','-'+fixedSidebar+'px' );
		$('.fixed-sidebar-close').fadeOut(350);
		$('.fixed-sidebar-btn i').css({
			'-webkit-transform' : 'rotate(0deg)',
			'-moz-transform' : 'rotate(0deg)',
			'-ms-transform' : 'rotate(0deg)',
			'transform' : 'rotate(0deg)'
		});
	});

	// Site Transition Effect
	if( $('body').hasClass('animsition') ) {
		// create animsition links
	  	$('body').find('a[href*="'+ $('.logo a').attr('href') +'"]').addClass('animsition-link');
		$('.adenit-lightbox, a[href*="wp-content/uploads"], .meta-share a, .post-comment').removeClass('animsition-link');

		$(".animsition").animsition({
			inClass: 'fade-in',
			outClass: 'fade-out',
			inDuration: 600,
			outDuration: 600,
			linkElement: '.animsition-link',
			loading: false,
			loadingParentElement: 'body', 
			loadingClass: 'animsition-loading',
			loadingInner: '', 
			timeout: false,
			timeoutCountdown: 5000,
			onLoadEvent: true,
			browser: [ 'animation-duration', '-webkit-animation-duration'],
			overlay : false,
			overlayClass : 'animsition-overlay-slide',
			overlayParentElement : 'body',
			transition: function(url){ window.location.href = url; }
		});
	}
	
	// Instagram Columns
	var instagram = $( '.footer-instagram .null-instagram-feed li a' ),
	instagramColumn = $( '.footer-instagram .null-instagram-feed li' ).length;
	instagram.css( "width", "calc((100%  /"+ instagramColumn +")" );
	instagram.css( "width", "-webkit-calc((100% /"+ instagramColumn +")" );
	$('.null-instagram-feed').addClass('inst-col-'+instagramColumn);
	// Instagram Scroll Function 
	var instScroll = false;
	if ($('.footer-instagram ').data('instscroll')==='on_scroll') {
		instScroll = true;
	}

	if ( instScroll ) {
		$(window).scroll( function(){	
			if( $(window).scrollTop() + $(window).height() == $(document).height() ) {	   
			   $('.inst-widget').css('bottom','-1px');


			} else {
				$('.inst-widget').css('bottom','-75px');
			}
		});
	}
	

	if( $('.comment-form').children().first().hasClass('custom-textarea') ) {
		$('.form-submit').before( $('.custom-textarea').clone() );
		$('.custom-textarea:first').remove();
	}


}); // end dom ready