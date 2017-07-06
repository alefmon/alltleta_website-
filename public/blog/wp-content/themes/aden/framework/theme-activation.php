<?php

$adenit_social = get_option('adenit_social');

if ( $adenit_social['theme_activation'] ) {
	return;
}

$adenit_header = array(
	'effect' => false,
	'boxed' => false,
	'top_menu' => true,
	'fixed_menu' => true,
	'left_nav' => false,
	'logo' => esc_url( 'http://www.infinitythemes.ge/aden-blog/wp-content/uploads/2015/12/logo-111.png' ),
	'retina_logo' => esc_url( 'http://www.infinitythemes.ge/aden-blog/wp-content/uploads/2015/12/logo-111.png' ),
	'logo_width' => '700',
	'logo_top_magin' => '100',
	'mini_logo' => '',
	'center_height' => '445',
	'bg_img' => esc_url( 'http://www.infinitythemes.ge/aden-blog/wp-content/uploads/2016/01/header-background.jpg' ),
	'bg_size' => 'cover',
	'bg_att' => 'scroll',
);
update_option('adenit_header', $adenit_header);

$adenit_carousel = array(
	'show' => true,
	'effect' => true,
	'boxed' => false,
	'column' => 'col-3',
	'posts_amount' => '20',
	'orderby' => 'rand',
	'width' => '720',
	'width' => '450',
	'textarea' => wp_filter_nohtml_kses( 'most popular aden posts', 'aden' ),
	'like' => true,
	'comment' => true,
	'category' => true,
	'title' => true,
	'date' => true,
	'pagination' => false,
	'navigation' => 'display_hover',
	'autoplay' => '10000',
);
update_option('adenit_carousel', $adenit_carousel);

$adenit_content = array(
	'width' => '1180',
	'boxed' => true,
	'single_boxed' => true,
	'sidebar_width' => '330',
	'bg_img' => '',
	'bg_size' => 'pattern',
	'bg_att' => 'fixed',
	'post_width'=> '420',
	'post_height'=> '280',
	'post_column' => 'col-2',
	'horizontal_gutter' => '30',
	'vertical_gutter' => '45',
	'pagination' => 'numbered',
	'post_thumbnail' => false,
	'post_like' => true,
	'post_comment' => true,
	'post_categories' => true,
	'post_description' => 'the-excerpt',
	'post_excerpt_length' => '36',
	'dropcap' => true,
	'grid_read_more' => false,
	'post_author' => true,
	'post_date' => true,
	'facebook_share' => true,
	'twitter_share' => true,
	'pinterest_share' => false,
	'googleplus_share' => true,
	'linkedin_share' => true,
	'tumblr_share' => true,
	'reddit_share' => false,
	'post_tags' => true,
	'breadcrumb' => true,
	'similar_posts' => 'random',
	'similar_posts_title' => wp_filter_nohtml_kses( 'Random Posts', 'aden' ),
	'post_author_description' => true,
	'post_pagination' => true,
	'post_comment_area' => true,
	'page_comment_area' => true,
	'sidebar_position' => 'right',
	'sidebar_single_position' => 'right',
);
update_option('adenit_content', $adenit_content);

$adenit_footer = array(
	'boxed' => false,
	'social' => 'on_scroll',
	'logo' => esc_url( 'http://www.infinitythemes.ge/aden-blog/wp-content/uploads/2016/01/FOOTER-logo.png' ),
	'logo_width' => '350',
	'copyright' => sprintf( wp_filter_nohtml_kses( 'Copyrights &copy; %s InfinityThemes. All Rights Reserved.', 'aden'  ), date('Y') ),
	'instagram_boxed' => false,
);
update_option('adenit_footer', $adenit_footer);

$adenit_topbar_color = array(
	'background' => '#262626',
	'nav' => '#ffffff',
	'nav_hv' => '#c7a770',
	'sidebar_btn' => '#444444',
	'sidebar_btn_hv' => '#c7a770',
	'sidebar_btn_background' => '#ffffff',
	'search' => '#ffffff',
	'search_hv' => '#ffffff',
	'search_background' => '#262626',
);
update_option('adenit_topbar_color', $adenit_topbar_color);

$adenit_menu_color = array(
	'background' => '#ffffff',
	'nav' => '#222222',
	'nav_hv' => '#c7a770',
	'submenu_border' => '#f4f4f4',
);
update_option('adenit_menu_color', $adenit_menu_color);

$adenit_general_color = array(
	'background' => '#ffffff',
	'accent' => '#c7a770',
	'text' => '#111111',
	'sub_text' => '#000000',
	'meta' => '#aaaaaa',
	'border' => '#e8e8e8',
	'alt' => '#f9f9f9',
	'read_more' => '#ffffff',
	'read_more_hv' => '#ffffff',
	'read_more_background' => '#333333',
	'read_more_background_hv' => '#8d8d8d',
);
update_option('adenit_general_color', $adenit_general_color);

$adenit_footer_color = array(
	'top_background' => '#333333',
	'social' => '#ffffff',
	'social_hv' => '#c7a770',
	'social_icon_hv' => '#ffffff',
	'bottom_background' => '#242424',
	'copyright' => '#999999',
	'scrolltotop' => '#c7a770',
	'scrolltotop_hv' => '#ffffff',
);
update_option('adenit_footer_color', $adenit_footer_color);

$adenit_social = array(
	'facebook' => esc_url( 'http://facebook.com' ),
	'google_plus' => '',
	'twitter' => esc_url( 'http://twitter.com' ),
	'youtube' => '',
	'flickr' => '',
	'linkedin' => esc_url( 'http://linkedin.com' ),
	'bloglovin' => esc_url( 'http://bloglovin.com' ),
	'tumblr' => esc_url( 'http://www.tumblr.com' ),
	'pinterest' => esc_url( 'http://pinterest.com' ),
	'soundcloud' => '',
	'behance' => '',
	'vimeo' => '',
	'instagram' => esc_url( 'http://instagram.com' ),
	'theme_activation' => true,
);
update_option('adenit_social', $adenit_social);

$adenit_custom = array(
	'css' => '.lsi-social-icons li a { line-height: 24px !important; height: 24px !important; width: 24px !important; } .col-2 .googleplus-share { display: none !important; } ',
);
update_option('adenit_custom', $adenit_custom);

$adenit_google_analytics = array(
	'code' => '',
);
update_option('adenit_google_analytics', $adenit_google_analytics);
