<?php
function adenit_dynamic_css() {


/**
 * ----------------------------------------------------------------------------------------
 * Background Image Function
 * ----------------------------------------------------------------------------------------
 */

function adenit_bg_img_option( $adenit_selector, $bg_size, $bg_img, $bg_att ) {

	$adenit_position = 'left top';
	$adenit_size 	 = 'auto';
	$adenit_repeat 	 = 'repeat';

	if ( $bg_size === 'cover' ) {
		$adenit_position = 'center center';
		$adenit_size 	= 'cover';
		$adenit_repeat 	= 'no-repeat';
	}

	$css = $adenit_selector .'{
		background-image: url('. $bg_img .');
		background-size: 		'. $adenit_size .';
		background-repeat: 		'. $adenit_repeat .';
		background-attachment: 	'. $bg_att .';
		background-position: 	'. $adenit_position .';

	}';

	return $css;
}



/**
 * ----------------------------------------------------------------------------------------
 * Get Options
 * ----------------------------------------------------------------------------------------
 */

$header_options = get_option( 'adenit_header' );
$content_options = get_option( 'adenit_content' );
$carousel_options = get_option( 'adenit_carousel' );
$footer_options = get_option( 'adenit_footer' );
$topbar_color_options = get_option( 'adenit_topbar_color' );
$menu_color_options = get_option( 'adenit_menu_color' );
$general_color_options = get_option( 'adenit_general_color' );
$footer_color_options = get_option( 'adenit_footer_color' );
$custom_css_options = get_option( 'adenit_custom' );
// Add Dynamic Style
$css = '<style>';

// Add Custom Css
$css .= $custom_css_options['css'];



/**
 * ----------------------------------------------------------------------------------------
 * Header Section
 * ----------------------------------------------------------------------------------------
 */

// Logo Width
$css .= '.logo {
	max-width:'. $header_options['logo_width'] .'px;
}';

// Logo Top Margin
$css .= '.header-center > .center-max-width {
	padding-top:'. $header_options['logo_top_magin'] .'px;
	height:'. $header_options['center_height'] .'px;
}';

// Logo Responsive Top anD Bottom Margin
$css .= '@media screen and ( max-width: 480px ) {
	.header-center > .center-max-width {
		padding:'. $header_options['logo_top_magin'] .'px 0;
		height: auto;
	}	
}';

// Center And Left Navigation
if ( !$header_options['left_nav'] ) {

	$css .= '.header-bottom > .center-max-width {
	    position: relative;
	    text-align: center;
	}';

	$css .= '.nav {
	   display: table;
	   margin: 0 auto;
	}';

} else {
	
	$css .= '.nav {
	    float: left;
	}';

	$css .= '.nav ul > li:first-child {
	padding-left: 0 !important;
	}';

	if ( is_home() && $carousel_options['show'] ) {
		$css .= '.fixed-header-bottom .nav {
	    	margin-left: 40px;
		}';
	}
	
}

if ( $header_options['boxed'] ) {
	$css .= '.header-top,
		.header-center,
		.header-bottom,
		.adenit-breadcrumbs {			
	    margin: 0 auto;
		max-width:' .$content_options['width']. 'px;
	}';
}

if ( $header_options['boxed'] ) {
	$css .= '.top-nav {
    	margin-left: 15px;
	}';

	if ( $header_options['left_nav'] ) {
		$css .= '.nav {
	    	margin-left: 15px;
		}';
	}

	$css .= '.header-bottom {
	    box-shadow: none;
	}';

	if ( !$carousel_options['show'] ) {
	$css .= '.header-bottom {
	    border-bottom-width: 1px;
	    border-style: solid;
	}';
}

}

// Header Center background
$css .= adenit_bg_img_option('.header-center', $header_options['bg_size'], $header_options['bg_img'], $header_options['bg_att']);

// Body background
$css .= adenit_bg_img_option('body', $content_options['bg_size'], $content_options['bg_img'], $content_options['bg_att']);



/**
 * ----------------------------------------------------------------------------------------
 * Sidebar section
 * ----------------------------------------------------------------------------------------
 */

// Sidebar Width
$css .= '.main-sidebar {
    width: '. $content_options['sidebar_width'] .'px; 
}';

$css .= '.fixed-sidebar {
    width: '. $content_options['sidebar_width'] .'px;
    right: -'. $content_options['sidebar_width'] .'px; 
}';

// Sidebar Display
if( ( ! is_single() && $content_options['sidebar_position'] !== 'none' ) || ( is_single() && $content_options['sidebar_single_position'] !== 'none' ) || is_page() ) {
	$css .= '.main-container {
		width: calc(100% - '. $content_options['sidebar_width'] .'px);
		width: -webkit-calc(100% - '. $content_options['sidebar_width'] .'px);
	}';	
} else if ( ( ! is_single() && $content_options['sidebar_position'] === 'none' ) || ( is_single() && $content_options['sidebar_single_position'] === 'none' ) ) {
	$css .= '.main-container {
		width: 100%;
	}';
}



/**
 * ----------------------------------------------------------------------------------------
 * Content Section
 * ----------------------------------------------------------------------------------------
 */

// Content Width
$css .= '.center-max-width {
	max-width:' .$content_options['width']. 'px;
}';

// Post Column And Gutter
$css .= '.main-container-wrap {
	margin:' .$content_options['vertical_gutter']. 'px 0px;		        
}';

$css .= '.main-post,
		.search-post {
	margin-bottom:' .$content_options['vertical_gutter']. 'px;		        
}';

$css .= '.main-sidebar {
	padding-right: ' . $content_options['horizontal_gutter'] . 'px;
}';

$css .= '.main-container + .main-sidebar {
	padding-left: ' . $content_options['horizontal_gutter'] . 'px;
	padding-right: 0; 
}';

$css .= '.main-sidebar .adenit-widget,
		.fixed-sidebar .adenit-widget {
	margin-bottom: ' . $content_options['vertical_gutter'] . 'px;
}';

// pagination gutter
$css .= '.single-pagination .previous {
	width: calc((100% - ' . $content_options['horizontal_gutter'] . 'px) / 2);
	width: -webkit-calc((100% - ' . $content_options['horizontal_gutter'] . 'px) / 2);
	margin-right:' . $content_options['horizontal_gutter'] . 'px;        
}';

$css .= '.single-pagination .next {
	width: calc((100% - ' . $content_options['horizontal_gutter'] . 'px) / 2);
	width: -webkit-calc((100% - ' . $content_options['horizontal_gutter'] . 'px) / 2);    
}';

// Link & Quote 1,2 column
$css .= '.adenit-link,
	.adenit-quote {
    font-family: "Playfair Display";
    font-size: 24px;
}

.adenit-quote-author,
.adenit-link-author {
	font-family: "Open Sans";
    font-size: 18px;
}';

// Column 2 thumbnail
$css .= '.col-2 .entry-video,
		.col-2 .entry-gallery, 
		.col-2 .entry-thumbnail,
		.col-3 .entry-video,
		.col-3 .entry-gallery, 
		.col-3 .entry-thumbnail {
	margin-bottom: 15px;
}';

//Post Dropcup
if ( $content_options['dropcap'] ) {

$css .= '.entry-content > p:first-child:first-letter {
	font-family: "Playfair Display";
    float:left;
    font-size: 76px;
    line-height: 63px;
    text-align: center;
    margin: 0px 10px 0 0;
}';

$css .= '@-moz-document url-prefix() {
	.entry-content > p:first-child:first-letter {
	    margin-top: 10px !important;
	}
}';

}

// Carosuel Next/Prev Button Effect
if ( $carousel_options['navigation'] === 'display_hover' ) {
	$css .= '.adenit-carousel .owl-prev {
	    left: -50px;
	}';

	$css .= '.adenit-carousel .owl-next {
	    right: -50px;
	}';
} 

if ( $carousel_options['navigation'] === 'off' ) {
	$css .= '.adenit-carousel .owl-buttons {
	    display: none;
	}';
}

if ( $carousel_options['column'] === 'col-4' ) {
$css .= '.carousel-category {
		font-size: 12px;
		letter-spacing: 1px;
		margin-bottom: 6px;
	   }
	
	   .carousel-title {
	   		font-size: 32px;
			margin-bottom: 10px;
	   }
		
		.carousel-comment,
		.carousel-like {
		    padding: 3px 5px;
		}';

}  else {

$css .= '.carousel-category {
			font-size: 12px;
			letter-spacing: 1px;
			margin-bottom: 8px;
			font-weight: 600;
	   }
	
	   .carousel-title {
			font-size: 41px;
			letter-spacing: 0.5px;
			line-height: 44px;
			margin-bottom: 16px;
	   }

		.carousel-comment,
		.carousel-like {
		    padding: 4px 6px;
		}';
}

if ( !$content_options['boxed'] || !$content_options['single_boxed'] ) {
	$css .= '.main-container-wrap {
		padding: 0px 30px;
	}';
}


/**
 * ----------------------------------------------------------------------------------------
 * Footer Section
 * ----------------------------------------------------------------------------------------
 */

// Footer Boxed
if ( $footer_options['boxed'] ) {
	$css .= '.footer-bottom {
		margin: 0 auto;
		max-width:' .$content_options['width']. 'px;
	}';
}

// Footer Display Social
$css .= '.footer-logo a {
	max-width:'. $footer_options['logo_width'] .'px;
}';

if ( $footer_options['social'] === 'on_hover' ) {

	// Footer Display Social
	$css .= '.inst-widget {
		bottom: -75px;
	}';

	$css .=  '.footer-instagram:hover .inst-widget {
	    bottom: 0px;
	}';
}

if ( $footer_options['social'] === 'on' ) {
	$css .= '.inst-widget {
		bottom: 0px;
	}';
}



/**
 * ----------------------------------------------------------------------------------------
 * Top Bar Color
 * ----------------------------------------------------------------------------------------
 */

$css .= '.header-top {
    background-color: '. $topbar_color_options['background'] .';
}';

$css .= '.top-nav > ul > li > a,
		.header-top-social a i {
    color: '. $topbar_color_options['nav'] .';
}';

$css .= '.top-nav > ul > li > a:hover,
		.header-top-social a:hover i,
		.header-top-social a:focus i,
		.top-nav li.current-menu-item > a,
		.top-nav li.current-menu-ancestor > a {
    color: '. $topbar_color_options['nav_hv'] .';
}';

$css .= '.fixed-sidebar-btn {
    color: '. $topbar_color_options['sidebar_btn'] .';
    background-color: '. $topbar_color_options['sidebar_btn_background']  .';
}';

$css .= '.fixed-sidebar-btn:hover {
    color: '. $topbar_color_options['sidebar_btn_hv'] .';
}';

$css .= '.search-btn {
    color: '. $topbar_color_options['search'] .';
    background-color: '. $topbar_color_options['search_background']  .';
}';

$css .= '.search-btn:hover {
    color: '. $topbar_color_options['search_hv'] .';
}';



/**
 * ----------------------------------------------------------------------------------------
 * Main Menu Color
 * ----------------------------------------------------------------------------------------
 */

$css .= '.header-bottom,
		 .fixed-header-bottom,
		 .nav .sub-menu > li > a,
		 .nav-mobile {
    background-color: '. $menu_color_options['background'] .';
}';

$css .= '.nav > ul > li > a,
		.nav .sub-menu > li > a,
		.nav-mobile li a,
		.nav-btn,
		.sub-menu-btn-icon,
		.carousel-btn {
    color: '. $menu_color_options['nav'] .';
}';

$css .= '.nav > ul > li > a:hover,
		.nav .sub-menu > li > a:hover,
		.nav-mobile li a:hover,
		.nav-btn:hover,
		.carousel-btn:hover,
		.nav li.current-menu-item > a,
		.nav li.current-menu-ancestor > a {
    color: '. $menu_color_options['nav_hv'] .';
}';

$css .= '.nav .sub-menu > li > a:hover:before  {
    border-color: transparent transparent transparent '. $menu_color_options['nav_hv'] .';
}';

$css .= '.nav .sub-menu {
    border-color: '. $menu_color_options['nav_hv'] .';
}';

$css .= '.nav .sub-menu > li > a:before  {
    border-color: transparent transparent transparent '. $menu_color_options['submenu_border'] .';
}';

$css .= '.nav .sub-menu > li > a {
    border-color:'. $menu_color_options['submenu_border'] .';
}';



/**
 * ----------------------------------------------------------------------------------------
 * General Color
 * ----------------------------------------------------------------------------------------
 */

// Body Background color
$css .= 'body,
		.single-pagination-info {
    background-color: '. $general_color_options['background'] .';
}';

$css .= '.single-pagination-info:hover p {
    color:'. $general_color_options['background'] .';
}';

// background accent color
$css .= '#s:focus + .submit,
		.header-search-input:focus +.header-search-button,
		#wp-calendar tbody td:hover a,
		#wp-calendar tbody td:hover,
		#wp-calendar caption,
		.carousel-comment:hover span:first-child:before,
		.carousel-like:hover span:first-child:before {
    color: '. $general_color_options['background'] .';
    background-color: '. $general_color_options['accent'] .';
}';

$css .= '.nav > ul > li:after,
		.entry-content hr {
	color: '. $general_color_options['background'] .';
    background-color: '. $general_color_options['border'] .';
}';

// Accent Color
$css .= '.carousel-comment:hover,
		.carousel-like:hover,
		.meta-categories a:before,
		.meta-categories a:after,
		.instagram-title h3,
		.entry-content  blockquote {
    border-color: '. $general_color_options['accent'] .';
}';

// Accent Color
$css .= '.meta-categories a:hover,
		.adenit-widget ul li > a:hover,
		#wp-calendar tfoot #prev a:hover,
		#wp-calendar tfoot #next a:hover,
		.adenit-widget ul li span a:hover,
		.carousel-title a:hover,
		a,
		.adenit-breadcrumbs li:hover a,
		.comment-author a:hover,
		.carousel-comment:hover a,
		.carousel-like:hover a,
		.meta-author-date a,
		.meta-tags a:hover,
		.meta-like-comm a:hover,
		.page-links a,
		.adenit-breadcrumbs li strong,
		.related-posts h4 a:hover,
		.single-pagination-info:hover h4 {
    color:'. $general_color_options['accent'] .';
}';

// Accent Color
$css .= '.active span,
		.search-separator,
		.ps-container > .ps-scrollbar-y-rail > .ps-scrollbar-y {
    background-color:'. $general_color_options['accent'] .' !important;
}';

// General Text
$css .= '.meta-categories a,
		.carousel-quote,
		.post-title,
		.post-title a,
		.widget-title,
		.related-posts h3,
		.related-posts h4 a,
		.meta-author-description h4,
		.next-post-title a,
		.prev-post-title a,
		.comments-area h2,
		.comment-reply-title,
		.next-post-icon a,
		.prev-post-icon a,
		.comment-author a,
		.comment-author,
		.author-info h4 a,
		.fixed-sidebar-close-btn,
		.single-pagination-info {
	color: '. $general_color_options['text'] .';
}';

// General Sub Text
$css .= 'body,
		.adenit-widget,
		.adenit-widget ul li > a,
		#wp-calendar tbody td,
		.wpcf7 input[type="text"],
		.wpcf7 input[type="email"],
		.wpcf7 textarea,
		.comments-area input[type="text"],
		.comments-area textarea,
		.entry-content,
		.author-info p,
		.entry-comments,
		#respond,
		.fourzerofour p,
		#s,
		.page-links {
	color: '. $general_color_options['sub_text'] .';
}';

// General Border color
$css .= '.widget-title h3:before,
		.widget-title h3:after,
		.meta-share-wrap .meta-share:before,
		.meta-share-wrap .meta-share:after,
		.widget_recent_entries ul li,
		.widget_recent_comments li,
		.widget_meta li,
		.widget_recent_comments li,
		.widget_pages li,
		.widget_archive li,
		.widget_categories li,
		.children li,
	    #wp-calendar,
	    #wp-calendar tbody td,
		.search #s,
	    .entry-comments,
	    .adenit-widget select,
	    .meta-author-description,
	    .comment-title h2:before,
		.comment-title h2:after,
	    .related-posts h3:before,
		.related-posts h3:after,
		.search-thumbnail i,
		.widget_nav_menu li a,
		.wpcf7 input[type="text"],
		.wpcf7 input[type="email"],
		.wpcf7 textarea,
		.comments-area input[type="text"],
		.comments-area textarea,
		.wp-caption,
		.entry-content table tr,
		.entry-content table th,
		.entry-content table td,
		.entry-content abbr[title],
		.entry-content pre,
		.meta-tags a,
		.meta-like-comm a,
		.meta-share a,
		.meta-author-description,
		.adenit-breadcrumbs,
		.carousel-quote,
		.header-bottom {
	border-color:'. $general_color_options['border'] .';
}';

// Meta colors
$css .= '.meta-author-date,
		.meta-tags a,
		.meta-like-comm a,
		.related-posts .meta-date,
		.comment-info,
		.comment-info a,
		.widget_recent_entries ul li span,
		.comment-date a,
		.widget_categories li,
		.widget_archive li,
		.gallery .gallery-caption,
		.meta-share a,	
		.adenit-breadcrumbs li a,
		.adenit-breadcrumbs li {
	color:'. $general_color_options['meta'] .';
}';

// Placeholder Color
$css .= '::-webkit-input-placeholder {
	color: '. $general_color_options['meta'] .';
}';

$css .= ':-moz-placeholder {
	color: '. $general_color_options['meta'] .';
}';

$css .= '::-moz-placeholder { 
	color: '. $general_color_options['meta'] .';
}';

$css .= ':-ms-input-placeholder {
	color: '. $general_color_options['meta'] .';
}';

// Alt Colors
$css .= '.adenit-breadcrumbs,
		.entry-comments,
		.wpcf7 input[type="text"],
		.wpcf7 input[type="email"],
		.wpcf7 textarea,
		.comments-area input[type="text"],
		.comments-area textarea,
		.meta-author-description,
		.header-search-input,
		.search #s,
		.carousel-quote {
	background-color:'. $general_color_options['alt'] .';
}';

// general button colors
$css .= '.read-more a,
		.wpcf7 input[type="submit"]:hover,
		 #submit,
		.default-pagination .next a,
		.default-pagination .previous a,
		.numbered-pagination a,
		.reply a,
		.tagcloud a,
		.header-search-button,
		.submit {
    background-color: '. $general_color_options['read_more_background'] .';
    color: '. $general_color_options['read_more'] .';
}';

$css .= '.read-more a:hover {
    padding: 0px 30px;
}';

$css .= '.read-more a:hover,
		 #submit:hover,
		.wpcf7 input[type="submit"],
		.default-pagination .next:hover a,
		.default-pagination .previous:hover a,
		.numbered-pagination a:hover,
		.numbered-pagination span,
		.reply a:hover,
		.tagcloud a:hover {
	background-color: '. $general_color_options['read_more_background_hv'] .';
	color: '. $general_color_options['read_more_hv'] .';
}';



/**
 * ----------------------------------------------------------------------------------------
 * Footer Color
 * ----------------------------------------------------------------------------------------
 */

// Footer Top Background
$css .= '.footer-social,
		.instagram-title {
     background-color: '. $footer_color_options['top_background'] .';
}';

// Footer Social Colors
$css .= '.instagram-title,
		.footer-social a,
		.footer-social a i {
    color: '. $footer_color_options['social'] .';
}';


$css .= '.footer-social a i {
    border-color: '. $footer_color_options['social'] .';
}';

$css .= '.footer-social a:hover i,
		.footer-social a:focus i {
    border-color: '. $footer_color_options['social_hv'] .';
    background-color: '. $footer_color_options['social_hv'] .';
    color: '. $footer_color_options['social_icon_hv'] .';
}';

// Footer Social Hover Colors
$css .= '.footer-social a:hover,
		.footer-social a:focus {
    color: '. $footer_color_options['social_hv'] .';
}';

// Footer widget
$css .= '.footer-widget .adenit-widget,
		.footer-widget .adenit-widget .widget-title,
		.footer-widget .adenit-widget ul li > a,
		.footer-widget .adenit-widget #wp-calendar tbody td,
		.footer-widget .adenit-widget .widget_recent_entries ul li span,
		.footer-widget .adenit-widget .widget_categories li,
		.footer-widget .adenit-widget .widget_archive li {
	color: '. $footer_color_options['social'] .';
}';

$css .= '.footer-widget #wp-calendar a,
		.footer-widget .adenit-widget ul li > a:hover,
		.footer-widget .adenit-widget #wp-calendar tfoot #prev a:hover,
		.footer-widget .adenit-widget #wp-calendar tfoot #next a:hover,
		.footer-widget .adenit-widget ul li span a:hover {
	color: '. $footer_color_options['social_hv'] .';
}';


$css .= '.footer-widget  #wp-calendar tbody td:hover a,
		.footer-widget  #wp-calendar tbody td:hover,
		.footer-widget  #wp-calendar caption {
	background-color: '. $footer_color_options['social_hv'] .';
}';



$css .= '.footer-widget .widget-title h3:before,
		.footer-widget .widget-title h3:after,
		.footer-widget .widget_recent_entries ul li,
		.footer-widget .widget_recent_comments li,
		.footer-widget .widget_meta li,
		.footer-widget .widget_recent_comments li,
		.footer-widget .widget_pages li,
		.footer-widget .widget_archive li,
		.footer-widget .widget_categories li,
		.footer-widget .children li,
	    .footer-widget #wp-calendar,
	    .footer-widget #wp-calendar tbody td,
		.footer-widget .search #s,
	    .footer-widget .adenit-widget select,
		.footer-widget .widget_nav_menu li a {
	border-color: '. $footer_color_options['social'] .';
}';

// Footer Bottom Background
$css .= '.footer-widget-area,
		.footer-bottom {
    background-color: '. $footer_color_options['bottom_background'] .';
}';


// Footer Copyright Color
$css .= '.copyright {
    color: '. $footer_color_options['copyright'] .';
}';


// Footer Scrolltotop Color
$css .= '.scrolltotop,
		.copyright a {
    color: '. $footer_color_options['scrolltotop'] .';
}';

// Footer Scrolltotop Hover Color
$css .= '.scrolltotop:hover,
		.copyright a:hover {
    color: '. $footer_color_options['scrolltotop_hv'] .';
}';

$css .= '</style>';

echo '' . $css;

}

add_action( 'wp_head', 'adenit_dynamic_css' );

?>