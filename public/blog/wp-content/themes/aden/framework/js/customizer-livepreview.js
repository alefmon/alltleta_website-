jQuery(document).ready(function( $ ) {

	"use strict";
	
	// define variables
	var top_nav_hv = adenit_options.topbar_color.nav_hv,
		top_nav = adenit_options.topbar_color.nav,
		search = adenit_options.topbar_color.search,
		search_hv = adenit_options.topbar_color.search_hv,
		sidebar_btn = adenit_options.topbar_color.sidebar_btn,
		sidebar_btn_hv = adenit_options.topbar_color.sidebar_btn_hv,	
		nav = adenit_options.menu_color.nav,
		nav_hv = adenit_options.menu_color.nav_hv,
		nav_btn = adenit_options.menu_color.btn,
		scrolltotop_hv = adenit_options.footer_color.scrolltotop_hv,
		scrolltotop = adenit_options.footer_color.scrolltotop,
		social_hv = adenit_options.footer_color.social_hv,
		social = adenit_options.footer_color.social,
		read_more_hv = adenit_options.general_color.read_more_hv,
		read_more = adenit_options.general_color.read_more,
		read_more_background_hv = adenit_options.general_color.read_more_background_hv,
		read_more_background = adenit_options.general_color.read_more_background,
		social_icon_hv = adenit_options.footer_color.social_icon_hv;

	// Top Bar Color
	wp.customize( 'adenit_topbar_color[background]', function( value ) {
	  value.bind( function( newval ) {
	  	$('.header-top').css( 'background-color', newval );
	  });
	});

	// Top Bar Color
	wp.customize( 'adenit_topbar_color[nav]', function( value ) {
	  value.bind( function( newval ) {
	  	top_nav = newval;
	  	$('.top-nav > ul > li > a,.header-top-social a i').css( 'color', top_nav );
	  });
	});

	// Top Bar Hover Color
	wp.customize( 'adenit_topbar_color[nav_hv]', function( value ) {
	  value.bind( function( newval ) {
	  	top_nav_hv = newval;
	  });
	  $('.top-nav > ul > li > a,.header-top-social a i').hover(
  		function(){
  		$(this).css( 'color', top_nav_hv );
  		},
  		function(){
  		$(this).css( 'color', top_nav );
  		});
	});

	// Sidebar Btn Color
	wp.customize( 'adenit_topbar_color[sidebar_btn]', function( value ) {
	  value.bind( function( newval ) {
	  	sidebar_btn = newval;
	  	$('.fixed-sidebar-btn').css( 'color', sidebar_btn );
	  });
	});

	// Sidebar Btn Hover Color
	wp.customize( 'adenit_topbar_color[sidebar_btn_hv]', function( value ) {
	  value.bind( function( newval ) {
	  	sidebar_btn_hv = newval;
	  });
	  $('.fixed-sidebar-btn').hover(
  		function(){
  		$(this).css( 'color', sidebar_btn_hv );
  		},
  		function(){
  		$(this).css( 'color', sidebar_btn );
  		});
	});

	// Sidebar Btn Background Color
	wp.customize( 'adenit_topbar_color[sidebar_btn_background]', function( value ) {
	  value.bind( function( newval ) {
	  	$('.fixed-sidebar-btn').css( 'background-color', newval );
	  });
	});

// Search Btn Color
	wp.customize( 'adenit_topbar_color[search]', function( value ) {
	  value.bind( function( newval ) {
	  	search = newval;
	  	$('.search-btn').css( 'color', search );
	  });
	});

	// Search Btn Hover Color
	wp.customize( 'adenit_topbar_color[search_hv]', function( value ) {
	  value.bind( function( newval ) {
	  	search_hv = newval;
	  });
	  $('.search-btn').hover(
  		function(){
  		$(this).css( 'color', search_hv );
  		},
  		function(){
  		$(this).css( 'color', search );
  		});
	});

	// Search Btn Background Color
	wp.customize( 'adenit_topbar_color[search_background]', function( value ) {
	  value.bind( function( newval ) {
	  	$('.search-btn').css( 'background-color', newval );
	  });
	});

	// Menu Background Color
	wp.customize( 'adenit_menu_color[background]', function( value ) {
	  value.bind( function( newval ) {
	  	$('.header-bottom, .fixed-header-bottom, .nav .sub-menu > li > a, .nav-mobile').css( 'background-color', newval );
	  });
	});

	// Menu Color
	wp.customize( 'adenit_menu_color[nav]', function( value ) {
	  value.bind( function( newval ) {
	  	nav = newval;
	  	$('.nav > ul > li > a,.nav .sub-menu > li > a,.carousel-btn').css( 'color', newval );
	  });
	});

	// Menu Hover Color
	wp.customize( 'adenit_menu_color[nav_hv]', function( value ) {
	  value.bind( function( newval ) {
	  	nav_hv = newval;
	  	$('.nav .sub-menu').css( 'border-color', nav_hv );
	  });
	  $('.nav > ul > li > a,.nav .sub-menu > li > a,.carousel-btn').hover(
  		function(){
  		$(this).css( 'color', nav_hv );
  		},
  		function(){
  		$(this).css( 'color', nav );
  		});
	});


	// Submenu Border Color
	wp.customize( 'adenit_menu_color[submenu_border]', function( value ) {
	  value.bind( function( newval ) {
	  	$('.nav .sub-menu > li > a').css( 'border-color', newval );
	  });
	});

	
	// General Background Color
	wp.customize( 'adenit_general_color[background]', function( value ) {
	  value.bind( function( newval ) {
	  	$('body, .single-pagination-info').css( 'background-color', newval );
	  });
	});

	// General Accent Color
	wp.customize( 'adenit_general_color[accent]', function( value ) {
	  value.bind( function( newval ) {
	  	$('	.meta-author-date a,.adenit-breadcrumbs li strong').css( 'color', newval );
	  	$('	.instagram-title h3,.entry-content  blockquote').css( 'border-color', newval );
	  
	  });
	});

	// General Text Color
	wp.customize( 'adenit_general_color[text]', function( value ) {
	  value.bind( function( newval ) {
	  	$('.meta-categories a,.carousel-quote,.post-title,.post-title a,.widget-title,.related-posts h3,.related-posts h4 a,.meta-author-description h4,.next-post-title a,.prev-post-title a,.comments-area h2,.comment-reply-title,.next-post-icon a,.prev-post-icon a,.comment-author a,.comment-author,.author-info h4 a,.single-pagination-info').css( 'color', newval );
	  });
	});

	// General Sub Text Color
	wp.customize( 'adenit_general_color[sub_text]', function( value ) {
	  value.bind( function( newval ) {
	  	$('body,.adenit-widget,.adenit-widget ul li > a,#wp-calendar tbody td,.wpcf7 input[type="text"],.wpcf7 input[type="email"],.wpcf7 textarea,.comments-area input[type="text"],.comments-area textarea,.entry-content,.author-info p,.entry-comments,#respond,#s').css( 'color', newval );
	  });
	});

	// General Border Color
	wp.customize( 'adenit_general_color[border]', function( value ) {
	  value.bind( function( newval ) {
	  $('.widget_recent_entries ul li,.widget_recent_comments li,.widget_meta li,.widget_recent_comments li,.widget_pages li,.widget_archive li,.widget_categories li,#wp-calendar,#wp-calendar tbody td,.search #s,.entry-comments,.adenit-widget select,.meta-author-description,.search-thumbnail i,.widget_nav_menu li a,.wpcf7 input[type="text"],.wpcf7 input[type="email"],.wpcf7 textarea,.comments-area input[type="text"],.comments-area textarea,.wp-caption,.entry-content table tr,.entry-content table th,.entry-content table td,.entry-content abbr[title],.entry-content pre,.meta-tags a,.meta-like-comm a,.meta-share a,.meta-author-description,.adenit-breadcrumbs,.carousel-quote').css( 'border-color', newval );
	  });
	});

	// General Meta Color
	wp.customize( 'adenit_general_color[meta]', function( value ) {
	  value.bind( function( newval ) {
	  	$('.meta-author-date,.meta-tags a,.meta-like-comm a,.related-posts .meta-date,	.comment-info,.comment-info a,.widget_recent_entries ul li span,.comment-date a,.widget_categories li,.widget_archive li,.gallery .gallery-caption,	.meta-share a,.adenit-breadcrumbs li a,.adenit-breadcrumbs li').css( 'color', newval );
	  });
	});


	// General Alt Color
	wp.customize( 'adenit_general_color[alt]', function( value ) {
	  value.bind( function( newval ) {
	  	$('.adenit-breadcrumbs,.entry-comments,.wpcf7 input[type="text"],.wpcf7 input[type="email"],.wpcf7 textarea,.comments-area input[type="text"],.comments-area textarea,.meta-author-description,.header-search-input,.search #s,.carousel-quote').css( 'background-color', newval );
	  });
	});
	// General Read More Color
	wp.customize( 'adenit_general_color[read_more]', function( value ) {
	  value.bind( function( newval ) {
	  	read_more = newval;
	  	$('.read-more a, #submit,.default-pagination .next a,.default-pagination .previous a,.numbered-pagination a,.reply a,.tagcloud a,.header-search-button,.submit').css( 'color', read_more );
	  });
	});

	// General Read More Hover Color
	wp.customize( 'adenit_general_color[read_more_hv]', function( value ) {
	  value.bind( function( newval ) {
	  	read_more_hv = newval;
	  });
	  $('.read-more a, #submit,.default-pagination .next a,.default-pagination .previous a,.numbered-pagination a,.reply a,.tagcloud a,.header-search-button,.submit').hover(
  		function(){
  		$(this).css( 'color', read_more_hv );
  		},
  		function(){
  		$(this).css( 'color', read_more );
  		});
	});

	// General Read More Background Color
	wp.customize( 'adenit_general_color[read_more_background]', function( value ) {
	  value.bind( function( newval ) {
	  	read_more_background = newval;
	  	$('.read-more a, #submit,.default-pagination .next a,.default-pagination .previous a,.numbered-pagination a,.reply a,.tagcloud a,.header-search-button,.submit').css( 'background-color', read_more_background );
	  });
	});

	// General Read More Background Hover Color
	wp.customize( 'adenit_general_color[read_more_background_hv]', function( value ) {
	  value.bind( function( newval ) {
	  	read_more_background_hv = newval;
	  });
	  $('.read-more a, #submit,.default-pagination .next a,.default-pagination .previous a,.numbered-pagination a,.reply a,.tagcloud a,.header-search-button,.submit').hover(
  		function(){
  		$(this).css( 'background-color', read_more_background_hv );
  		},
  		function(){
  		$(this).css( 'background-color', read_more_background );
  		});
	});

	// Footer Social Wrap Background
	wp.customize( 'adenit_footer_color[top_background]', function( value ) {
	  value.bind( function( newval ) {
	  	$('.footer-social, .instagram-title').css( 'background-color', newval );
	  });
	});

	// Footer Social Color
	wp.customize( 'adenit_footer_color[social]', function( value ) {
	  value.bind( function( newval ) {
	  	social = newval;
	  	$('.instagram-title,.footer-social a').css( 'color', social );
	  	$('.footer-social a i,.footer-widget .widget_recent_entries ul li,.footer-widget .widget_recent_comments li,.footer-widget .widget_meta li,.footer-widget .widget_recent_comments li,.footer-widget .widget_pages li,.footer-widget .widget_archive li,.footer-widget .widget_categories li,.footer-widget .children li,.footer-widget #wp-calendar,.footer-widget #wp-calendar tbody td,.footer-widget .search #s,.footer-widget .adenit-widget select,.footer-widget .widget_nav_menu li a').css( 'border-color', social );
	  	$('.footer-social a i').css( 'color', social );
	  	$('.footer-widget .adenit-widget,.footer-widget .adenit-widget .widget-title,.footer-widget .adenit-widget ul li > a,.footer-widget .adenit-widget #wp-calendar tbody td,.footer-widget .adenit-widget .widget_recent_entries ul li span,.footer-widget .adenit-widget .widget_categories li,.footer-widget .adenit-widget .widget_archive li ').css( 'color', social );
	  
	  });
	});


	// Footer Social Hover Color
	wp.customize( 'adenit_footer_color[social_hv]', function( value ) {
	  value.bind( function( newval ) {
	  	social_hv = newval;
	  });
	  $('.footer-social a').hover(
  		function(){
  		$(this).css( 'color', social_hv );
  		$(this).find('i').css( 'border-color', social_hv );
  		$(this).find('i').css( 'background-color', social_hv );
  		$(this).find('i').css('color', social_icon_hv );
  		},
  		function(){
  		$(this).css( 'color', social );	
  		$(this).find('i').css( 'border-color', social );
  		$(this).find('i').css( 'background-color', 'transparent' );
  		$(this).find('i').css('color', social );
  		
  		});
	});


	// Footer Social background Hover Color
	wp.customize( 'adenit_footer_color[social_icon_hv]', function( value ) {
	  value.bind( function( newval ) {
	  	social_icon_hv = newval;
	  });
	  $('.footer-social a').hover(
  		function(){
  		$(this).css( 'color', social_hv );
  		$(this).find('i').css( 'border-color', social_hv );
  		$(this).find('i').css( 'background-color', social_hv );
  		$(this).find('i').css('color', social_icon_hv );
  		},
  		function(){
  		$(this).css( 'color', social );	
  		$(this).find('i').css( 'border-color', social );
  		$(this).find('i').css( 'background-color', 'transparent' );
  		$(this).find('i').css('color', social );
  		
  		});
	});

	// Footer Social Bottom Background Color
	wp.customize( 'adenit_footer_color[bottom_background]', function( value ) {
	  value.bind( function( newval ) {
	  	$('.footer-widget-area,.footer-bottom').css( 'background-color', newval );
	  });
	});

	// Footer Copyright Color
	wp.customize( 'adenit_footer_color[copyright]', function( value ) {
	  value.bind( function( newval ) {
	  	$('.copyright').css( 'color', newval );
	  });
	});

	// Footer Scrolltotop Color
	wp.customize( 'adenit_footer_color[scrolltotop]', function( value ) {
	  value.bind( function( newval ) {
	  	scrolltotop = newval;
	  	$('.scrolltotop').css( 'color', newval );
	  });
	});

	// Footer Scrolltotop Hover Color
	wp.customize( 'adenit_footer_color[scrolltotop_hv]', function( value ) {
	  value.bind( function( newval ) {
	  	scrolltotop_hv = newval;
	  });
	  $('.scrolltotop').hover(
  		function(){
  		$(this).css( 'color', scrolltotop_hv );
  		},
  		function(){
  		$(this).css( 'color', scrolltotop );
  		});
	});
}); // end dom ready
