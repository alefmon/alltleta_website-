<?php 
/**
 * ----------------------------------------------------------------------------------------
 * Define
 * ----------------------------------------------------------------------------------------
 */

define( 'ADENIT_THEMEROOT', get_template_directory_uri() );
define( 'ADENIT_SCRIPTS', ADENIT_THEMEROOT . '/js' );

/**
 * ----------------------------------------------------------------------------------------
 * Load the custom scripts
 * ----------------------------------------------------------------------------------------
 */

if ( ! function_exists( 'adenit_scripts' ) ) {
	function adenit_scripts() {

		// Enqueue the stylesheets
		wp_enqueue_style( 'adenit-main-style', get_stylesheet_uri() );
		wp_enqueue_style( 'owl-carousel', ADENIT_THEMEROOT . '/css/owl.carousel.css' );
		wp_enqueue_style( 'magnific-popup', ADENIT_THEMEROOT . '/css/magnific-popup.css' );
		wp_enqueue_style( 'adenit-mediaquery', ADENIT_THEMEROOT . '/css/mediaquery.css' );
		wp_enqueue_style( 'font-awesome', ADENIT_THEMEROOT . '/css/font-awesome.min.css' );
		wp_enqueue_style( 'fontello', ADENIT_THEMEROOT . '/css/fontello.css' );
		wp_enqueue_style( 'icomoon', ADENIT_THEMEROOT . '/css/icomoon.css' );
		wp_enqueue_style( 'animsition', ADENIT_THEMEROOT . '/css/animsition.min.css' );
		wp_enqueue_style( 'perfect-scrollbar', ADENIT_THEMEROOT . '/css/perfect-scrollbar.css' );
		
		// Adds support for pages with threaded comments
		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}

		// Enqueue the custom scripts
		wp_enqueue_script( 'owl-carousel', ADENIT_SCRIPTS.'/aden-plugins.min.js', array( 'jquery' ), false, true );
		wp_enqueue_script( 'adenit-custom', ADENIT_SCRIPTS . '/custom-scripts.min.js', array( 'jquery' ), false, true );
		
	}

	add_action( 'wp_enqueue_scripts', 'adenit_scripts' );
}


// Load TGM Css File 
function adenit_tgm_plugin_fixed() {
	wp_enqueue_style ( 'tgm-plugin-fixed', ADENIT_THEMEROOT .'/framework/tgm-plugin-activation/tgm-plugin-fixed.css');
}

add_action( 'admin_enqueue_scripts', 'adenit_tgm_plugin_fixed' );

		

/**
 * ----------------------------------------------------------------------------------------
 * Require File
 * ----------------------------------------------------------------------------------------
 */

// Customizer
require_once( get_template_directory() .'/framework/adenit-customizer.php');

// Dynamic Css
require_once( get_template_directory() .'/framework/dynamic-css.php');

// Google Analytics
require_once( get_template_directory() .'/framework/google-analytics.php');

// Tgm Plugin Activation
require_once ( get_template_directory() .'/framework/tgm-plugin-activation/class-tgm-plugin-activation.php');

// Post Like
require get_template_directory() . '/post-like.php';

// Load Metaboxes
require  get_template_directory() . '/framework/metaboxes/adenit-metaboxs.php';

// Widgets
include('framework/widgets/custom-ads.php');
include('framework/widgets/social-widget.php');


/**
 * ----------------------------------------------------------------------------------------
 * theme activation
 * ----------------------------------------------------------------------------------------
 */

add_action('after_switch_theme', 'adenit_setup_options');

function adenit_setup_options () {
	require_once( get_template_directory() . '/framework/theme-activation.php' );
}



/**
 * ----------------------------------------------------------------------------------------
 * Register Fonts
 * ----------------------------------------------------------------------------------------
 */

function adenit_oswald_font_url() {
    $font_url = '';    
    if ( 'off' !== _x( 'on', 'Google font: on or off', 'aden' ) ) {
        $font_url = add_query_arg( 'family', 'Oswald:100,300,400,700&subset=latin,latin-ext', "//fonts.googleapis.com/css" );
    }
    return $font_url;
}

function adenit_playfair_font_url() {
    $font_url = '';
    if ( 'off' !== _x( 'on', 'Google font: on or off', 'aden' ) ) {
        $font_url = add_query_arg( 'family', 'Playfair Display:400,700&subset=latin,latin-ext', "//fonts.googleapis.com/css" );
    }
    return $font_url;
}

function adenit_opensans_font_url() {
    $font_url = '';
    if ( 'off' !== _x( 'on', 'Google font: on or off', 'aden' ) ) {
        $font_url = add_query_arg( 'family', 'Open Sans:400italic,400,600italic,600,700italic,700&subset=latin,latin-ext', "//fonts.googleapis.com/css" );
    }
    return $font_url;
}

/*
Enqueue scripts and styles.
*/
function adenit_gfonts_scripts() {
    wp_enqueue_style( 'adenit-oswald-font', adenit_oswald_font_url(), array(), '1.0.0' );
    wp_enqueue_style( 'adenit-playfair-font', adenit_playfair_font_url(), array(), '1.0.0' );
    wp_enqueue_style( 'adenit-opensans-font', adenit_opensans_font_url(), array(), '1.0.0' );
}
add_action( 'wp_enqueue_scripts', 'adenit_gfonts_scripts' );



/**
 * ----------------------------------------------------------------------------------------
 * Custom Tgm Activation
 * ----------------------------------------------------------------------------------------
 */
if ( ! function_exists( 'adenit_tgm_activation' ) ) {
	function adenit_tgm_activation() {
	$plugins = array(
		
 		// AJAX Thumbnail Rebuild
        array(
            'name'               => 'AJAX Thumbnail Rebuild',
            'slug'               => 'ajax-thumbnail-rebuild',
            'required'           => false
        ),

		// Instagram Slider Widget
		array(
		'name'      => 'Instagram Slider Widget',
		'slug'      => 'instagram-slider-widget',
		'required'  => false,
		),

		// Facebook Widget
		array(
		'name'      => 'Facebook Widget',
		'slug'      => 'facebook-pagelike-widget',
		'required'  => false,
		),

		// Contact Form 7
		array(
		'name'      => 'Contact Form 7',
		'slug'      => 'contact-form-7',
		'required'  => false,
		),

		// Royal Backend Gallery
	    array(
	        'name'               => 'Royal Backend Gallery',
	        'slug'               => 'royal-backend-gallery',
	        'source'             => ADENIT_THEMEROOT . '/plugins/royal-backend-gallery.zip',
	        'required'           => true,
	        'version'            => '1.0',
	        'force_activation'   => false,
	        'force_deactivation' => false,
	        'external_url'       => '',
	    ),
	    
	    // Envato Wordpress Toolkit
	    array(
	        'name'               => 'Envato Wordpress Toolkit Master',
	        'slug'               => 'envato-wordpress-toolkit-master',
	        'source'             => ADENIT_THEMEROOT . '/plugins/envato-wordpress-toolkit-master.zip',
	        'required'           => true,
	        'version'            => '1.0',
	        'force_activation'   => false,
	        'force_deactivation' => false,
	        'external_url'       => '',
	    )
 	);

 	tgmpa( $plugins );

	}
}
add_action( 'tgmpa_register', 'adenit_tgm_activation' );

/**
 * ----------------------------------------------------------------------------------------
 * Set up theme default / supported features
 * ----------------------------------------------------------------------------------------
 */

if ( ! function_exists( 'adenit_setup' ) ) {
	function adenit_setup() {
	
		// Title Support
		add_theme_support('title-tag');

		// Add support for post formats
		add_theme_support( 'post-formats',
			array(
				'gallery',
				'link',
				'image',
				'quote',
				'video',
				'audio'
			)
		);

		// Register nav menus
		register_nav_menus(
			array(
				'top-menu'	=> esc_html__( 'Top Menu', 'aden' ),
				'main-menu'	=> esc_html__( 'Main Menu', 'aden' )
			)
		);

		// Content Width
		if ( ! isset( $content_width ) ) {
			$content_width = 960;
		}
	}

	add_action( 'after_setup_theme', 'adenit_setup' );
}


// Load Language File For Translation
load_theme_textdomain( 'aden', get_template_directory() .'/languages' );

// Add support for automatic feed links
add_theme_support( 'automatic-feed-links' );

// Add support for post thumbnails
add_theme_support( 'post-thumbnails' );
	
// Get Carousel Data
$carousel_options	= get_option( 'adenit_carousel' );
$content_options	= get_option( 'adenit_content' );
$full_thumb_width 	= $content_options['width'];
$carousel_width		= (isset($carousel_options['width']))?$carousel_options['width']:720;
$carousel_height	= (isset($carousel_options['height']))?$carousel_options['height']:450;
$grid_thumb_width	= (isset($content_options['post_width']))?$content_options['post_width']:420;
$grid_thumb_height	= (isset($content_options['post_height']))?$content_options['post_height']:280;

// Image Size
add_image_size( 'adenit-post-carousel', $carousel_width, $carousel_height, true );
add_image_size( 'adenit-post-full', $full_thumb_width, 0, true );
add_image_size( 'adenit-post-thumbnail', $grid_thumb_width, $grid_thumb_height, true );
add_image_size( 'adenit-pagination-thumbnail', 410, 80, true );
add_image_size( 'adenit-search-thumbnail', 250, 190, true );



/**
 * ----------------------------------------------------------------------------------------
 * Register the widgets
 * ----------------------------------------------------------------------------------------
 */

if ( ! function_exists( 'adenit_widget_init' ) ) {
	function adenit_widget_init() {
		if ( function_exists( 'register_sidebar' ) ) {
			register_sidebar(
				array(
					'name'			=> esc_html__( 'Sidebar Widget Area', 'aden' ),
					'id'			=> 'sidebar-1',
					'description'	=> esc_html__( 'Appears on posts and pages.', 'aden' ),
					'before_widget'	=> '<div id="%1$s" class="adenit-widget %2$s">',
					'after_widget'	=> '</div> <!-- end widget -->',
					'before_title'	=>	'<div class="widget-title"> <h3>',
					'after_title'	=>	'</h3></div>'
				)
			);

			register_sidebar(
				array(
					'name'			=> esc_html__( 'Instagram Widget Area', 'aden' ),
					'id'			=> 'sidebar-2',
					'description'	=> esc_html__( 'Appears on posts and pages.', 'aden' ),
					'before_widget'	=> '<div id="%1$s" class="inst-widget %2$s">',
					'after_widget'	=> '</div> <!-- end widget -->',
					'before_title'	=>	'<div class="instagram-title"><h3>',
					'after_title'	=>	'</h3> </div>'
					)
			);

			register_sidebar(
				array(
					'name'			=>	esc_html__( 'Fixed Sidebar Widget Area', 'aden' ),
					'id'			=>	'sidebar-3',
					'description'	=>	esc_html__( 'Appears on posts and pages.', 'aden' ),
					'before_widget'	=>	'<div id="%1$s" class="adenit-widget %2$s">',
					'after_widget'	=>	'</div> <!-- end widget -->',
					'before_title'	=>	'<div class="widget-title"> <h3>',
					'after_title'	=>	'</h3> </div>'
				)
			);

			register_sidebar(
				array(
					'name'			=>	esc_html__( 'Footer Widget Area 1', 'aden' ),
					'id'			=>	'sidebar-4',
					'description'	=>	esc_html__( 'Page Footer widgetized area.', 'aden' ),
					'before_widget'	=>	'<div id="%1$s" class="adenit-widget %2$s">',
					'after_widget'	=>	'</div> <!-- end widget -->',
					'before_title'	=>	'<div class="widget-title"> <h3>',
					'after_title'	=>	'</h3> </div>'
				)
			);

			register_sidebar(
				array(
					'name'			=>	esc_html__( 'Footer Widget Area 2', 'aden' ),
					'id'			=>	'sidebar-5',
					'description'	=>	esc_html__( 'Page Footer widgetized area.', 'aden' ),
					'before_widget'	=>	'<div id="%1$s" class="adenit-widget %2$s">',
					'after_widget'	=>	'</div> <!-- end widget -->',
					'before_title'	=>	'<div class="widget-title"> <h3>',
					'after_title'	=>	'</h3> </div>'
				)
			);

			register_sidebar(
				array(
					'name'			=>	esc_html__( 'Footer Widget Area 3', 'aden' ),
					'id'			=>	'sidebar-6',
					'description'	=>	esc_html__( 'Page Footer widgetized area.', 'aden' ),
					'before_widget'	=>	'<div id="%1$s" class="adenit-widget %2$s">',
					'after_widget'	=>	'</div> <!-- end widget -->',
					'before_title'	=>	'<div class="widget-title"> <h3>',
					'after_title'	=>	'</h3> </div>'
				)
			);
		}
	}

	add_action( 'widgets_init', 'adenit_widget_init' );
}



/**
 * ----------------------------------------------------------------------------------------
 * Custom Excerpt Length
 * ----------------------------------------------------------------------------------------
 */

function adenit_excerpt_length( $length = 50 ) {
	$post_fullwidth_value = get_post_meta( get_the_ID(), 'post-fullwidth-checkbox', true );
	$content_options = get_option( 'adenit_content' );
	if ( is_home() ) {
		if( $post_fullwidth_value ){
		return ( 3 * (int)$content_options['post_excerpt_length'] );
		}
		return $content_options['post_excerpt_length'];
	}
	if ( is_search() ) {
		return 60;
	}
	return $length;
	
}

add_filter( 'excerpt_length', 'adenit_excerpt_length', 999 );

function adenit_new_excerpt( $more ) {
	return '...';
}

add_filter( 'excerpt_more', 'adenit_new_excerpt' );


 
/**
 * ----------------------------------------------------------------------------------------
 *  Get Excerpt By Id
 * ----------------------------------------------------------------------------------------
 */

if ( ! function_exists( 'get_excerpt_by_id' ) ) {

	function get_excerpt_by_id($post_id){
	    $the_post = get_post($post_id);
	    if (!$the_post) {
	    	return;
	    }
	    $the_excerpt = $the_post->post_content;
	    $excerpt_length = 45;
	    $the_excerpt = strip_tags(strip_shortcodes($the_excerpt));
	    $words = explode(' ', $the_excerpt, $excerpt_length + 1);

	    if(count($words) > $excerpt_length) :
	        array_pop($words);
	        array_push($words, '');
	        $the_excerpt = implode(' ', $words);
	    endif;

	    return $the_excerpt;
	}
}



/**
 * ----------------------------------------------------------------------------------------
 * Adding Post & Page Classes
 * ----------------------------------------------------------------------------------------
 */

function adenit_post_classes( $classes, $class, $post_id ) {
 
	if( is_single() ) {
		$classes[] .= 'adenit-single-post';
	} else if ( is_page() ) {
		$classes[] .= 'adenit-page col-1';	
	} else {
		$classes[] .= 'main-post';
	}
     
    return $classes;
}

add_filter( 'post_class', 'adenit_post_classes', 10, 3 );



/**
 * ----------------------------------------------------------------------------------------
 * Adding Body Classes
 * ----------------------------------------------------------------------------------------
 */

function adenit_body_classes( $classes ) {

	$header_options = get_option( 'adenit_header' );
    $classes[] = ( $header_options['effect'])?'animsition':'';    
    return $classes;   
     
}

add_filter( 'body_class','adenit_body_classes' );



/**
 * ----------------------------------------------------------------------------------------
 * Custom Search Form
 * ----------------------------------------------------------------------------------------
 */

function adenit_search_form( $search_value ) {
	if ( $search_value === 'header' ) {

		$form  = '<form  method="get" id="searchform" class="header-search-form container" action="'. esc_url( home_url( '/' ) ) .'">';
		$form  .= 	'<div class="outer">';
		$form  .= 	    '<div class="inner">';
		$form  .= 	    	'<div class="search-input-wrap">';
		$form  .= 			'<input type="text" name="s" id="ss" class="header-search-input" placeholder="'. esc_html__('What are you looking for?','aden').'" autocomplete="off" />';
		$form  .=		    '<button type="submit" class="header-search-button" name="submit" ><i class="fa fa-search" ></i></button>';
		$form  .= 		    '</div>';
		$form  .= 	 	'</div>';
		$form  .= 	 '</div>';
		$form  .= '</form>';

	} else {

		$form  = '<div class="search">';
			$form  .= '<form method="get" action="'. esc_url( home_url( '/' ) ) .'"  >';
				$form .= '<input id="s" class="search_input" type="text" name="s" maxlength="30" placeholder="'. esc_html__('Search...', 'aden') .'">';
				$form .= '<button type="submit" class="submit button" name="submit" ><i class="fa fa-search" ></i></button>';
			$form .= '</form>';
		$form .= '</div>';

	}
	return $form;
}	

add_filter( 'get_search_form', 'adenit_search_form' );




/**
 * ----------------------------------------------------------------------------------------
 * Nav Menu Function
 * ----------------------------------------------------------------------------------------
 */



if ( ! function_exists( 'adenit_nav_menu' ) ) {
	
	function adenit_nav_menu(  $adenit_nav_class = '', $adenit_theme_location = '', $adenit_depth = 0 ) { 
		
		if ( has_nav_menu( $adenit_theme_location ) ) {
			wp_nav_menu( array(
				'theme_location'	=> $adenit_theme_location,
				'container'			=> 'nav',
				'container_class' 	=> $adenit_nav_class,
				'menu_class'      	=> '',
				'depth'				=> $adenit_depth
			));
		} else {
			echo '<nav class="'. esc_attr( $adenit_nav_class ) .'">';
			echo '<ul>';
				echo '<li>';
					echo '<a class="set-up" href="'. esc_url(home_url('/') .'wp-admin/nav-menus.php') .'">'. esc_html__( 'Set Up Menu', 'aden' ) .'</a>';
				echo '</li>';
			echo '</ul>';
			echo '</nav>';
		}
	}
}



/**
 * ----------------------------------------------------------------------------------------
 * Header Bottom Function
 * ----------------------------------------------------------------------------------------
 */

if ( ! function_exists( 'adenit_header_bottom' ) ) {
	function adenit_header_bottom( $header_bottom_class = 'header-bottom' ) {
	// Get Option
	$header_options = get_option( 'adenit_header' );
	?>
		
	<div class="<?php echo esc_attr( $header_bottom_class ); ?>">
		<div class="center-max-width">
			
			<div class="nav-btn">
				<i class="fa fa-bars"></i>
			</div>
			<!-- Carousel Scroll Btn -->
			<?php if ( $header_bottom_class === 'fixed-header-bottom' && is_home() ): ?>
			<div class="carousel-btn-wrap">
			<div class="carousel-btn">
				<?php if ( isset( $header_options['mini_logo'] ) && $header_options['mini_logo'] !== '' ): ?>
				<img src="<?php echo esc_url( $header_options['mini_logo'] ); ?>" alt="" >
				<?php else: ?>
				<span class="im-fire"></span>
				<?php endif; ?>
			</div>
			</div>
			<?php endif; ?>
			
			<!-- Display Navigation -->
			<?php
				adenit_nav_menu('nav', 'main-menu');
			?>

			<!-- Display Mobile Navigation -->
			<?php
				adenit_nav_menu('nav-mobile', 'main-menu');
			?>

			<?php if ( $header_bottom_class === 'fixed-header-bottom' && is_active_sidebar( 'sidebar-3' ) ): ?>	
			<div class="header-btns">
			    <span class="fixed-sidebar-btn">
			    	<i class="fa fa-plus"></i>
			    </span>
			</div>
			<?php endif; ?>

		    <div class="clear"></div>
		</div>
	</div>
	<?php
	}
}



/**
 * ----------------------------------------------------------------------------------------
 * Numbered Pagination 
 * ----------------------------------------------------------------------------------------
 */

if ( ! function_exists( 'adenit_pagination' ) ) {

	function adenit_pagination( $pages = '', $range = 2 ) {  
	  
		$showitems = ( $range * 2 ) + 1;

		global $paged;
		if ( empty( $paged ) ) {
			$paged = 1;
		}

		if ( $pages == '' ) {
		global $wp_query;
		$pages = $wp_query->max_num_pages;
			if( !$pages ) {
			 $pages = 1;
			}
		}

		if ( 1 != $pages ) {

			if ( $paged > 2 && $paged > $range+1 && $showitems < $pages ) {
				echo "<a href='".esc_url( get_pagenum_link(1) )."'><i class='fa fa-angle-double-left'></i></a>";
			}

			if ( $paged > 1 ) {
				echo "<a href='".esc_url( get_pagenum_link( $paged - 1 ) )."'><i class='fa fa-angle-left'></i></a>";
			}

			for ( $i=1; $i <= $pages; $i++ ) {
				if (1 != $pages &&( !( $i >= $paged+$range+1 || $i <= $paged-$range-1 ) || $pages <= $showitems ) ) {
				 echo ( $paged == $i )? "<span class='current'>".$i."</span>":"<a href='".esc_url( get_pagenum_link( $i ) )."' class='inactive' >".$i."</a>";
				}
			}

			if ( $paged < $pages ) {
				echo "<a href='". esc_url( get_pagenum_link( $paged + 1 ) )."'><i class='fa fa-angle-right'></i></a>";
			}

			if ( $paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages ) {
				echo "<a href='". esc_url( get_pagenum_link($pages) )."'><i class='fa fa-angle-double-right'></i></a>";
			}
		}
	}
}

/**
 * ----------------------------------------------------------------------------------------
 * Owl Carousel Function 
 * ----------------------------------------------------------------------------------------
 */

if ( ! function_exists( 'adenit_carousel' ) ) {
	
	function adenit_carousel( $carousel_class = '' ) {
	if ( is_home() ) {
	

	$carousel_options = get_option( 'adenit_carousel' );
	$carousel_class .= ( $carousel_options['boxed']) ? 'center-max-width' : '';	?>

	<!-- Carousel Wrap -->
	<div class="adenit-carousel-wrap <?php echo esc_attr( $carousel_class ); ?>"
	data-items="<?php echo esc_attr( $carousel_options['column'] ); ?>"
	data-autoplay="<?php echo esc_attr( $carousel_options['autoplay'] ); ?>"
    data-navigation="<?php echo esc_attr( $carousel_options['navigation'] ); ?>"
	data-pagination="<?php echo esc_attr( $carousel_options['pagination'] ); ?>"
	data-effect="<?php echo esc_attr( $carousel_options['effect'] ); ?>"
    >
		
		<!-- Owl Carousel Main -->
		<div class="owl-carousel adenit-carousel">
		
		<?php
		$carousel_orderby		= $carousel_options['orderby'];
		$carousel_posts_amount	= (empty($carousel_options['posts_amount']))?'-1':$carousel_options['posts_amount'];

		$carusel_meta_array = array(
			'relation' => 'OR',
			array(
				'key'	=> 'carousel-meta-checkbox',
				'value'		=> 'true'			
			),
			array(
				'key'	=> 'carousel-meta-checkbox',
				'value'		=> 'yes'			
			),
            array(
				'key'	=> 'page-carousel',
				'value'		=> 'true'						
			)
		);

		if ( $carousel_orderby === 'like' ) {
			$carousel_orderby = 'meta_value_num';
			$carusel_meta_array = array(
				'relation' => 'AND',
				array(
					'key' => '_post_like_count'
				),
				array(
                    'relation' => 'OR',
                    array(
						'key'	=> 'carousel-meta-checkbox',
						'value'		=> 'true'			
					),
					array(
						'key'	=> 'carousel-meta-checkbox',
						'value'		=> 'yes'			
					),
		            array(
						'key'	=> 'page-carousel',
						'value'		=> 'true'						
					)
				)
			);
		}

		// Query Args
		$args = array(
			'post_type'			  => array( 'post', 'page' ),
		 	'meta_query'		  => $carusel_meta_array,
		 	'orderby'			  => $carousel_orderby,
			'order'				  => 'DESC',
			'posts_per_page'	  => $carousel_posts_amount,
			'ignore_sticky_posts' => 1
		);

		$latestPosts = new WP_Query();
		$latestPosts->query( $args );

		while( $latestPosts->have_posts() ) : $latestPosts->the_post();

	    // Checks and displays the retrieved value
	    if( has_post_thumbnail() ) : ?>
		<div class="carousel-item">
		
		<!-- Get Post Thumbnail  -->
		<?php the_post_thumbnail('adenit-post-carousel'); ?>

		<!-- Main Container -->
		<div class="container">

		<div class="outer">
		<div class="inner">

			<!-- Carousel Info -->
			<?php if( $carousel_options['category'] || $carousel_options['title'] || $carousel_options['date'] || $carousel_options['comment'] || $carousel_options['like'] ) : ?>
			<div class="carousel-item-info">
			<!-- The categories -->
			<?php $category_list = get_the_category_list( ', ' ); ?>					
			
			<?php if ( $category_list && $carousel_options['category'] ) : ?>
			<div class="carousel-category">
				<?php echo '' . $category_list; ?>
			</div> 
			<?php endif; ?>

			<!-- Get The Title -->
			<?php if( $carousel_options['title'] ) : ?>
			<h2 class="carousel-title"> 
				<a href="<?php esc_url( the_permalink() ); ?>" ><?php the_title(); ?></a>								
			</h2>
			<?php endif; ?>
			
			<!-- Get the Date -->
			<?php if( $carousel_options['date'] ) : ?>
			<div class="carousel-date">
				<?php the_time( get_option('date_format') ); ?>
			</div>
			<?php endif; ?>

			<!-- Comments and Likes -->
			<div class="carousel-comm-likes-wrap">
				<div class="carousel-comm-likes">
				<!-- Get The Like -->
				<?php if ( $carousel_options['like'] ) : ?>
				<div class="carousel-like">
					<span></span>
					<?php echo getPostLikeLink( get_the_ID() ); ?>
				</div>
				<?php endif; ?>	

				<!-- Get The Comment -->
				<?php if ( $carousel_options['comment'] && comments_open() ) : ?>
				<div class="carousel-comment">
					<span></span>
					<?php 
					echo '<span class="meta-reply">';		
					comments_popup_link('0&nbsp;<i class="fa fa-comments"></i>', '1&nbsp;<i class="fa fa-comments"></i>', '%&nbsp;<i class="fa fa-comments"></i>', 'post-comment');
					echo '</span>';
					?>
				</div>
				<?php endif; ?>
				<div class="clear"></div>
				</div>
			</div><!-- // End Carousel Info Inner -->
			</div><!-- // End Carousel Info -->
			<?php endif; ?>
		</div> <!-- // End Inner -->
		</div> <!-- // End Outer -->
		</div> <!-- // End Container -->
		</div>
	    <?php endif; ?>
		<?php endwhile; ?>

		</div>

	</div>

	<!-- Carousel Textarea -->
	<?php if ( $carousel_options['textarea'] !=='' ): ?>
	<div class="carousel-quote <?php echo ( $carousel_options['boxed']) ? 'center-max-width' : ''; ?>">
		<p>
			<?php 
			echo wp_kses( $carousel_options['textarea'],array(
			    'a' => array(
			        'href' => array(),
			        'target' => array(),
			        'title' => array()
			    ),
			    'i' => array(
			    	 'class' => array(),
			    ),
			    'em' => array(),
			    'strong' => array(),
			) );
			?>
			<span class="quote-cursor">|</span>
		</p>

	</div>	
	<?php endif; ?>
<?php 	}

	}
}



/**
 * ----------------------------------------------------------------------------------------
 * Post Thumbnail
 * ----------------------------------------------------------------------------------------
 */

if ( ! function_exists( 'adenit_post_thumbnail' ) ) {

	function adenit_post_thumbnail() {

		//Get Options
		$disable_feature_img = get_post_meta( get_the_ID(), 'disable-feature-img-checkbox', true );

		// Disable Feature Image on Single Page
		if ( is_single() && !has_post_format() && $disable_feature_img ) {
			return;
		}
		
		//Get Options
		$content_options = get_option( 'adenit_content' );
		$post_fullwidth_value = get_post_meta( get_the_ID(), 'post-fullwidth-checkbox', true );

		// If the post has a thumbnail and it's not password protected
		// then display the thumbnail
		if ( has_post_thumbnail() && ! post_password_required() ) {
			echo '<figure class="entry-thumbnail">';
			if ( !is_single() && (false == get_post_format() || $content_options['post_thumbnail']) ) {
			echo '<a href="' . esc_url( get_the_permalink() ) . '" class="thumb-overlay">';
			echo '</a>';
			}

			//Get Post Thumbnail
			if ( $content_options['post_column'] === 'col-1'  ||  is_single() || ( !empty( $post_fullwidth_value ) && is_home() ) ) {
				the_post_thumbnail('adenit-post-full');	
			} else {
				the_post_thumbnail( 'adenit-post-thumbnail' );
			}	

			echo '</figure>';
		}
	}
}




/**
 * ----------------------------------------------------------------------------------------
 * Main Post 
 * ----------------------------------------------------------------------------------------
 */

if ( ! function_exists( 'adenit_main_post' ) ) {
	
	function adenit_main_post() {
	
	// Get Options
	$content_options = get_option( 'adenit_content' );
	
	// Post Media
	if ( $content_options['post_thumbnail'] ) {
		get_template_part( 'post-formats/content' );
	} else {
		get_template_part( 'post-formats/content', get_post_format() ); 
	} ?>
	
	<!-- Post Header -->
	<header class="entry-header">			
		<?php		
		// The categories
		$category_list = get_the_category_list( ', ' );
		if ( $category_list && $content_options['post_categories'] ) {
			echo '<div class="meta-categories"> ' . $category_list . ' </div>';
		} ?>
		
		<!-- Post Title -->
		<h2  class="post-title">
			<a href="<?php esc_url( the_permalink() ); ?>" ><?php the_title(); ?></a>
		</h2>
		
		<!-- Date And Author -->
		<div class="meta-author-date">
		<?php
		// Post Author
		if ( $content_options['post_author'] ) {
			// Get the post author
			printf(
				'<a href="%1$s" rel="author">%2$s</a>&nbsp;/&nbsp;',
				esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
				get_the_author()
			);
		}

		// Post Date
		if ( $content_options['post_date'] ) {
			// Get the date
			echo get_the_time( get_option('date_format') );
		} ?>
		</div>
	</header>
	
	<!-- Post Content -->
	<div class="entry-content">
	<?php
		if ( $content_options['post_description'] === 'the-excerpt' && !is_single() ) {
			the_excerpt();
		} else {
			the_content('');
			wp_link_pages( array(
				'before'      => '<div class="page-links"><span class="page-links-title">' . esc_html__( 'Pages:', 'aden' ) . '</span>',
				'after'       => '</div>',
				'link_before' => '<span>',
				'link_after'  => '</span>',
			) );
		} ?>

		<div class="read-more">
			<a href="<?php echo esc_url( get_the_permalink() ); ?>"><?php esc_html_e( 'view post','aden' ); ?></a>
		</div>
	</div>

	<!-- Post Footer -->
	<footer class="entry-footer">
		<?php adenit_sharing(); ?>
	</footer>
	
	<?php
	}
}

/**
 * ----------------------------------------------------------------------------------------
 * Grid Post Layout 
 * ----------------------------------------------------------------------------------------
 */

if ( ! function_exists( 'adenit_grid_post' ) ) {
	
	function adenit_grid_post() {
	// Get Options
	$content_options = get_option( 'adenit_content' );
	$read_more = (isset( $content_options['grid_read_more'] ))?$content_options['grid_read_more']:false;

	// Post Media
	if ( $content_options['post_thumbnail'] ) {
		get_template_part( 'post-formats/content' );
	} else {
		get_template_part( 'post-formats/content', get_post_format() ); 
	} ?>
	
	<!-- Post Header -->
	<header class="entry-header">			
		<?php		
		// The categories
		$category_list = get_the_category_list( ', ' );
		if ( $category_list && $content_options['post_categories'] ) {
			echo '<div class="meta-categories"> ' . $category_list . ' </div>';
		} ?>
		
		<!-- Post Title -->
		<h2  class="post-title">
			<a href="<?php esc_url( the_permalink() ); ?>" ><?php the_title(); ?></a>
		</h2>
	</header>
	
	<!-- Post Content -->
	<div class="entry-content">
	<?php
		if ( $content_options['post_description'] === 'the-excerpt' && !is_single() ) {
			the_excerpt();
		} else {
			the_content('');
			wp_link_pages( array(
				'before'      => '<div class="page-links"><span class="page-links-title">' . esc_html__( 'Pages:', 'aden' ) . '</span>',
				'after'       => '</div>',
				'link_before' => '<span>',
				'link_after'  => '</span>',
			) );
		} 

		if ( $read_more ) { ?>
		<div class="read-more">
			<a href="<?php echo esc_url( get_the_permalink() ); ?>"><?php esc_html_e( 'view post','aden' ); ?></a>
		</div>
		<?php } ?>	
	</div>

	<!-- Post Footer -->
	<footer class="entry-footer">
		<div class="meta-author-date">
		<?php
		// Post Author
		if ( $content_options['post_author'] ) {
			// Get the post author
			printf(
				'<a href="%1$s" rel="author">%2$s</a>&nbsp;/&nbsp;',
				esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
				get_the_author()
			);
		}

		// Post Date
		if ( $content_options['post_date']) {
			echo get_the_time( get_option('date_format') );
		} ?>
		</div>
		<?php adenit_sharing(); ?>

		<div class="clear"></div>
	</footer>
		
	<?php
	}
}

/**
 * ----------------------------------------------------------------------------------------
 * Social Function
 * ----------------------------------------------------------------------------------------
 */

if ( ! function_exists( 'adenit_social' ) ) {
	
	function adenit_social( $social_class = '' ) {

		// Get Option
		$social_options = get_option( 'adenit_social' );

		$html = '<div class="' . esc_attr( $social_class ) . '">';

		if ( trim( $social_options['facebook'] ) !== '' ) {
			$html .= '<a href="'. esc_url( $social_options['facebook'] ) .'" target="_blank">';
				$html .= '<i class="fa fa-facebook"></i>';
			$html .= '<span class="social-info" >'. esc_html__( 'Facebook', 'aden' ) .'</span>';
			$html .= '</a>';
		}

		if ( trim( $social_options['google_plus'] ) !== '' ) {
			$html .= '<a href="'. esc_url( $social_options['google_plus'] ) .'" target="_blank">';
				$html .= '<i class="fa fa-google-plus"></i>';
			$html .= '<span class="social-info" >'. esc_html__( 'Google +', 'aden' ) .'</span>';
			$html .= '</a>';
		}

		if ( trim( $social_options['twitter'] ) !== '' ) {
			$html .= '<a href="'. esc_url( $social_options['twitter'] ) .'" target="_blank">';
				$html .= '<i class="fa fa-twitter"></i>';
			$html .= '<span class="social-info" >'. esc_html__( 'Twitter', 'aden' ) .'</span>';
			$html .= '</a>';
		}

		
		if ( trim( $social_options['youtube'] ) !== '' ) {
			$html .= '<a href="'. esc_url( $social_options['youtube'] ) .'" target="_blank">';
				$html .= '<i class="fa fa-youtube"></i>';
			$html .= '<span class="social-info" >'. esc_html__( 'Youtube', 'aden' ) .'</span>';
			$html .= '</a>';
		}
	

		if ( trim( $social_options['flickr'] ) !== '' ) {
			$html .= '<a href="'. esc_url( $social_options['flickr'] ) .'" target="_blank">';
				$html .= '<i class="fa fa-flickr"></i>';
			$html .= '<span class="social-info" >'. esc_html__( 'Flickr', 'aden' ) .'</span>';
			$html .= '</a>';
		}

		if ( trim( $social_options['linkedin'] ) !== '' ) {
			$html .= '<a href="'. esc_url( $social_options['linkedin'] ) .'" target="_blank">';
				$html .= '<i class="fa fa-linkedin"></i>';
			$html .= '<span class="social-info" >'. esc_html__( 'Linkedin', 'aden' ) .'</span>';
			$html .= '</a>';
		}

		if ( trim( $social_options['bloglovin'] ) !== '' ) {
			$html .= '<a href="'. esc_url( $social_options['bloglovin'] ) .'" target="_blank">';
				$html .= '<i class="fa fa-heart"></i>';
			$html .= '<span class="social-info" >'. esc_html__( 'Bloglovin', 'aden' ) .'</span>';
			$html .= '</a>';
		}

		if ( trim( $social_options['tumblr'] ) !== '' ) {
			$html .= '<a href="'. esc_url( $social_options['tumblr'] ) .'" target="_blank">';
				$html .= '<i class="fa fa-tumblr"></i>';
			$html .= '<span class="social-info" >'. esc_html__( 'Tumblr', 'aden' ) .'</span>';
			$html .= '</a>';
		}

		if ( trim( $social_options['pinterest'] ) !== '' ) {
			$html .= '<a href="'. esc_url( $social_options['pinterest'] ) .'" target="_blank">';
				$html .= '<i class="fa fa-pinterest"></i>';
			$html .= '<span class="social-info" >'. esc_html__( 'Pinterest', 'aden' ) .'</span>';
			$html .= '</a>';
		}

		if ( isset( $social_options['soundcloud'] ) && trim( $social_options['soundcloud'] ) !== '' ) {
			$html .= '<a href="'. esc_url( $social_options['soundcloud'] ) .'" target="_blank">';
				$html .= '<i class="fa fa-soundcloud"></i>';
			$html .= '<span class="social-info" >'. esc_html__( 'Soundcloud', 'aden' ) .'</span>';
			$html .= '</a>';
		}

		if ( trim( $social_options['behance'] ) !== '' ) {
			$html .= '<a href="'. esc_url( $social_options['behance'] ) .'" target="_blank">';
				$html .= '<i class="fa fa-behance"></i>';
			$html .= '<span class="social-info" >'. esc_html__( 'Behance', 'aden' ) .'</span>';
			$html .= '</a>';
		}

		if ( trim( $social_options['vimeo'] ) !== '' ) {
			$html .= '<a href="'. esc_url( $social_options['vimeo'] ) .'" target="_blank">';
				$html .= '<i class="fa fa-vimeo-square"></i>';
			$html .= '<span class="social-info" >'. esc_html__( 'Vimeo', 'aden' ) .'</span>';
			$html .= '</a>';
		}

	
		if ( trim( $social_options['instagram'] ) !== '' ) {
			$html .= '<a href="'. esc_url( $social_options['instagram'] ) .'" target="_blank">';
				$html .= '<i class="fa fa-instagram"></i>';
			$html .= '<span class="social-info" >'. esc_html__( 'Instagram', 'aden' ) .'</span>';
			$html .= '</a>';
		}

		$html .= '</div>';

	echo '' . $html;

	}
}



/**
 * ----------------------------------------------------------------------------------------
 * Breadcrumb Section
 * ----------------------------------------------------------------------------------------
 */

if ( ! function_exists( 'adenit_breadcrumb' ) ) {

	function adenit_breadcrumb () {
	    
	    // Get Option
	    $content_options = get_option( 'adenit_content' );


	    if ( $content_options['breadcrumb'] ) {
	   
	    // Settings
	    $separator  = '/';
	    $id         = 'adenit-breadcrumbs';
	    $class      = 'adenit-breadcrumbs';
	    $home_title = esc_html__( 'Home', 'aden' );
	    $parents 	= '';	
	     
	    // Get the query & post information
	    global $post,$wp_query;
	    $category = get_the_category();
	    

	     	
	    // Do not display on the homepage
	    if ( !is_front_page() ) {
	     // Build the breadcrums
	    
	    echo '<div id="' . esc_attr( $id ) . '" class="' . esc_attr( $class ) . '">';
	    echo '<div class="center-max-width">';
	    echo '<ul>';
	        // Home page
	        echo '<li><a href="' . esc_url( get_home_url( '/' ) ) . '" title="' . esc_attr( $home_title ) . '">' . $home_title . '</a></li>';
	        echo '<li class="separator"> ' . $separator . ' </li>';
	         
	        if ( is_single() && !is_attachment() ) {
	             
	            // Single post (Only display the first category)
	            echo '<li><a  href="' . esc_url( get_category_link($category[0]->term_id ) ) . '" title="' . esc_attr( $category[0]->cat_name ) . '">' . $category[0]->cat_name . '</a></li>';
	            echo '<li class="separator"> ' . $separator . ' </li>';
	            echo '<li><strong title="' .esc_attr( get_the_title() ) . '">' . get_the_title() . '</strong></li>';
	             
	        }  else if ( is_category() && $category ) {
	             
	            // Category page
	            echo '<li><strong>' . esc_html__( 'Category Archives:&nbsp;', 'aden' ) . $category[0]->cat_name . '</strong></li>';
	             
	        } else if ( is_page() || is_attachment() ) {
	             
	            // Standard page
	            if( $post->post_parent ) {
	                 
	                // If child page, get parents 
	                $anc = get_post_ancestors( $post->ID );
	                 
	                // Get parents in the right order
	                $anc = array_reverse($anc);
	                
	                // Parent page loop
	                foreach ( $anc as $ancestor ) {
	                    $parents .= '<li><a href="' . esc_url( get_permalink($ancestor) ) . '" title="' . get_the_title($ancestor) . '">' . get_the_title($ancestor) . '</a></li>';
	                    $parents .= '<li class="separator">' . $separator . '</li>';
	                }
	                 
	                // Display parent pages
	                 
	                echo '' . $parents;
	                // Current page
	                echo '<li><strong title="' . esc_attr( get_the_title() ) . '">' . get_the_title() . '</strong></li>';
	                 
	            } else {
	                 
	                // Just display current page if not parents
	                echo '<li><strong> ' . get_the_title() . '</strong></li>';
	                 
	            }
	             
	        } else if ( is_tag() ) {
	             
	            // Tag page
	             
	            // Get tag information
	            $term_id = get_query_var('tag_id');
	            $taxonomy = 'post_tag';
	            $args ='include=' . $term_id;
	            $terms = get_terms( $taxonomy, $args );
	             
	            // Display the tag name
	            echo '<li><strong>'.esc_html__( 'Tag Archives:&nbsp;','aden' ) .'&nbsp;'. $terms[0]->name . '</strong></li>';
	         
	        } elseif ( is_day() ) {
	             
	            // Day archive
	             
	            // Year link
	            echo '<li><a class="bread-year bread-year-' . get_the_time('Y') . '" href="' . esc_url( get_year_link( get_the_time('Y') ) ) . '" title="' . esc_attr( get_the_time('Y') ) . '">' . get_the_time('Y') . esc_html__('&nbsp;Year', 'aden' ) .'</a></li>';
	            echo '<li>' . $separator . '</li>';
	             
	            // Month link
	            echo '<li><a href="' . esc_url( get_month_link( get_the_time('Y'), get_the_time('m') ) ) . '" title="' . esc_attr( get_the_time('F') ) . '">' . get_the_time('F') .'</a></li>';
	            echo '<li class="separator"> ' . $separator . ' </li>';
	             
	            // Day display
	            echo '<li><strong> ' . get_the_time('jS') . esc_html__('&nbsp;Archives:', 'aden' ) .'</strong></li>';
	             
	        } else if ( is_month() ) {
	             
	            // Month Archive
	             
	            // Year link
	            echo '<li><a class="bread-year bread-year-' .esc_attr(  get_the_time('Y') ) . '" href="' . esc_url( get_year_link( get_the_time('Y') ) ). '" title="' . get_the_time('Y') . '">' . get_the_time('Y') . esc_html__('&nbsp;Year', 'aden' ) .'</a></li>';
	            echo '<li class="separator"> ' . $separator . ' </li>';
	             
	            // Month display
	            echo '<li><strong title="' . esc_attr( get_the_time('F') ) . '">' . get_the_time('F') .'</strong></li>';
	             
	        } else if ( is_year() ) {
	             
	            // Display year archive
	            echo '<li><strong title="' . esc_attr( get_the_time('Y') ) . '">' . get_the_time('Y') . esc_html__('&nbsp;Year', 'aden' ) .'</strong></li>';
	             
	        } else if ( is_author() ) {
	             
	            // Auhor archive
	             
	            // Get the author information
	            global $author;
	            $userdata = get_userdata( $author );
	             
	            // Display author name
	            echo '<li><strong title="' . esc_attr( $userdata->display_name ) . '">' . esc_html__( 'Author:', 'aden' ) . '&nbsp;' . $userdata->display_name . '</strong></li>';
	         	   
	        } else if ( is_search() ) {
	        	// Search results page
	            echo '<li><strong title="' . esc_attr( get_search_query() ) . '">' . esc_html__( 'Search results for:', 'aden' ). '&nbsp;' . get_search_query() . '</strong></li>';
	      
	        }  else if ( get_query_var('paged') ) {
	            // Paginated archives
	            echo '<li><strong  title="' . esc_attr( get_query_var('paged') ) . '">'.esc_html__( 'Page:', 'aden' ) . '&nbsp;' . get_query_var('paged') . '</strong></li>';
	        
	        } elseif ( is_404() ) {	             
	            // 404 page
	            echo '<li>' . esc_html__( 'Error 404', 'aden' ) . '</li>';
	        }
	     echo '</ul>';
	     echo '</div>';
	     echo '</div>';
		}

		}
	}
}



/**
 * ----------------------------------------------------------------------------------------
 *  Sharing Functions Section
 * ----------------------------------------------------------------------------------------
 */

// Meta Share tag
function el_meta_sharing() {

	global $post;
	$header_options = get_option( 'adenit_header' );
	$my_postid = get_the_ID();  
	$content = get_excerpt_by_id($my_postid);
	$fb_image = wp_get_attachment_image_src( get_post_thumbnail_id( $my_postid ), 'large' );
	if ( is_home() ) {
        echo '<meta property="og:image" content="'. $header_options['logo'].'"/>';
		echo '<meta property="og:title" content="'.get_bloginfo('name').'"/>';
		echo '<meta property="og:description" content="'.get_bloginfo('description').'" />';
		echo '<meta property="og:url" content="'.get_site_url().'/" />';
	} else if( isset( $fb_image ) && has_post_thumbnail( $my_postid ) ) {
		echo '<meta property="og:image" content="'. $fb_image[0] .'"/>';
		echo '<meta property="og:image:width" content="'. $fb_image[1] .'"/>';
		echo '<meta property="og:image:height" content="'. $fb_image[2] .'"/>';
		echo '<meta property="og:title" content="'. get_the_title() .'"/>';
		echo '<meta property="og:description" content="'.$content.'" />';
		echo '<meta property="og:url" content="'. esc_url(get_permalink()) .'"/>';
	} else {
		echo '<meta property="og:image" content="'. ADENIT_THEMEROOT .'/img/blank.png"/>';
		echo '<meta property="og:image:width" content="1"/>';
		echo '<meta property="og:image:height" content="1"/>';
		echo '<meta property="og:title" content="'. get_the_title() .'"/>';
		echo '<meta property="og:description" content="'.$content.'" />';
		echo '<meta property="og:url" content="'. esc_url(get_permalink()) .'"/>';
	}

	echo '<meta property="og:locale" content="'. strtolower( str_replace( '-', '_', get_bloginfo('language') ) ) .'" />';
	echo '<meta property="og:site_name" content="'. get_bloginfo('name') .'"/>';
}
add_action( 'wp_head', 'el_meta_sharing' );


if ( ! function_exists( 'adenit_sharing' ) ) { 
	function adenit_sharing() {	
	
	//Get Options
	$content_options = get_option( 'adenit_content' );
	global $post;
	// Post share 
	if ( $content_options['facebook_share'] || $content_options['twitter_share'] || $content_options['pinterest_share'] || $content_options['googleplus_share'] || $content_options['linkedin_share'] || $content_options['tumblr_share'] || $content_options['reddit_share'] ) : ?>	
	<div class="meta-share-wrap">
		<div class="meta-share">
			<?php if ( $content_options['facebook_share'] ) : 
			$facebook_src = 'https://www.facebook.com/sharer/sharer.php?u='.esc_url( get_the_permalink() ); ?>
			<a class="facebook-share" target="_blank" href="<?php echo esc_url ( $facebook_src ); ?>">
				<i class="fa fa-facebook"></i>
				<span class="share-info"><?php esc_html_e( 'Facebook', 'aden' ); ?></span>
			</a>
			<?php endif; ?>

			<?php if ( $content_options['twitter_share'] ) : 
			$twitter_src = 'https://twitter.com/home?status=Check%20out%20this%20article:%20'.get_the_title().'%20-%20'.esc_url( get_the_permalink() ); ?>
			<a class="twitter-share" target="_blank" href="<?php echo esc_url ( $twitter_src ); ?>">
				<i class="fa fa-twitter"></i>
				<span class="share-info"><?php esc_html_e( 'Twitter', 'aden' ); ?></span>
			</a>
			<?php endif; ?>

			<?php if ( $content_options['pinterest_share'] ) : 
			$pinterest_src = 'https://pinterest.com/pin/create/button/?url='.esc_url( get_the_permalink() ).'&amp;media='.esc_url( wp_get_attachment_url( get_post_thumbnail_id($post->ID)) ).'&amp;description='.get_the_title(); ?>
			<a class="pinterest-share" target="_blank" href="<?php echo esc_url ( $pinterest_src ); ?>">
				<i class="fa fa-pinterest"></i>
				<span class="share-info"><?php esc_html_e( 'Pinterest', 'aden' ); ?></span>
			</a>
			<?php endif; ?>

			<?php if ( $content_options['googleplus_share'] ) : 
			$google_src = 'https://plus.google.com/share?url='. esc_url( get_the_permalink() ); ?>
			<a class="googleplus-share" target="_blank" href="<?php echo esc_url ( $google_src ); ?>">
				<i class="fa fa-google-plus"></i>
				<span class="share-info"><?php esc_html_e( 'Google +', 'aden' ); ?></span>
			</a>										
			<?php endif; ?>

			<?php if ( $content_options['linkedin_share'] ) :
			$linkedin_src = 'http://www.linkedin.com/shareArticle?url='.esc_url( get_the_permalink() ).'&amp;title='.get_the_title(); ?>
			<a class="linkedin-share" target="_blank" href="<?php echo esc_url( $linkedin_src ); ?>">
				<i class="fa fa-linkedin"></i>
				<span class="share-info"><?php esc_html_e( 'Linkedin', 'aden' ); ?></span>
			</a>
			<?php endif; ?>

			<?php if ( $content_options['tumblr_share'] ) : 
			$tumblr_src = 'http://www.tumblr.com/share/link?url='. urlencode( esc_url(get_permalink()) ) .'&amp;name='.urlencode( get_the_title() ).'&amp;description='.urlencode( get_the_excerpt() ); ?>
			<a class="tumblr-share" target="_blank" href="<?php echo esc_url( $tumblr_src ); ?>">
				<i class="fa fa-tumblr"></i>
				<span class="share-info"><?php esc_html_e( 'Tumblr', 'aden' ); ?></span>
			</a>
			<?php endif; ?>

			<?php if ( $content_options['reddit_share'] ) : 
			$reddit_src = 'http://reddit.com/submit?url='. esc_url( get_the_permalink() ) .'&amp;title='.get_the_title(); ?>
			<a class="reddit-share" target="_blank" href="<?php echo esc_url( $reddit_src ); ?>">
				<i class="fa fa-reddit"></i>
				<span class="share-info"><?php esc_html_e( 'Reddit', 'aden' ); ?></span>
			</a>
			<?php endif; ?>
		</div>
	</div>
	<?php endif; 
	}

}



/**
 * ----------------------------------------------------------------------------------------
 *  Comments Form Section
 * ----------------------------------------------------------------------------------------
 */


if ( ! function_exists( 'adenit_comments' ) ) {

	function adenit_comments ( $comment, $args, $depth ) {
	$_GLOBAL['comment'] = $comment;

	if(get_comment_type() == 'pingback' || get_comment_type() == 'trackback' ) : ?>
		
	<li class="pingback" id="comment-<?php comment_ID(); ?>">
		<article <?php comment_class('entry-comments'); ?> >
			<div class="comment-content">
				<h3 class="comment-author">
					<?php esc_html_e( 'Pingback:', 'aden' ); ?>
				</h3>	
				<span class="comment-date" >
				<a href=" <?php echo esc_url( get_comment_link() ); ?> " class="comment-date" >
					<?php
					comment_date( get_option('date_format') );
					esc_html_e( '&nbsp;at&nbsp;', 'aden' );
					comment_time( get_option('time_format') );
					?>
				</a>
				<?php
					echo edit_comment_link( esc_html__('&nbsp;[Edit]', 'aden' ) );
				?>
				</span>
				<div class="clear"></div>
				<div class="comment-text">			
				<?php comment_author_link(); ?>
				</div>
			</div>
		</article>
	</li>

	<?php elseif (get_comment_type() == 'comment') : ?>

		<li id="comment-<?php comment_ID(); ?>">
			
			<article <?php comment_class('entry-comments'); ?> >					
				<figure class="comment-avatar">
					<?php 
						$avatar_size = 60;
						if( $comment->comment_parent != 0 ) {
							$avatar_size = 55;
						}
						echo get_avatar( $comment, $avatar_size );
					?>
				</figure>
				<div class="comment-content">
				<h3 class="comment-author">
					<?php comment_author_link(); ?>
				</h3>
				<span class="comment-date" >
				<a href=" <?php echo esc_url( get_comment_link() ); ?> ">
					<?php
					comment_date( get_option('date_format') );
					esc_html_e( '&nbsp;at&nbsp;', 'aden' );
					comment_time( get_option('time_format') );
					?>
				</a>
				<?php
					echo edit_comment_link( esc_html__('&nbsp;[Edit]', 'aden' ) );
				?>
				</span>
				<div class="clear"></div>
				<div class="comment-text">		
				<?php if($comment->comment_approved == '0') : ?>
				<p class="awaiting-moderation"><?php esc_html_e('Your comment is awaiting moderation.', 'aden'); ?></p>
				<?php endif; ?>
				<?php comment_text(); ?>
				</div>
				</div>
				<span class="reply">
					<?php comment_reply_link(array_merge( $args, array( 'depth' => $depth, 'max_depth' => $args['max_depth']) ) ); ?>
				</span>	
			</article>							
	<?php endif;
	}
}



/**
 * ----------------------------------------------------------------------------------------
 *  Comments Fields Section
 * ----------------------------------------------------------------------------------------
 */

function adenit_custom_comment_form( $defaults ) {
	$defaults['comment_notes_before'] = '';
	$defaults['id_form'] = 'comment-form';
	$defaults['comment_field'] = '<p class="custom-textarea"><label for="comment">'. esc_html__( 'Comment', 'aden' ) .'</label><textarea name="comment" id="comment" cols="30" rows="10"></textarea></p>';
 
	return $defaults;
}
add_filter('comment_form_defaults', 'adenit_custom_comment_form');


function adenit_custom_comment_fields() {
	$commenter = wp_get_current_commenter();
	$req = get_option('require_name_email');
	$aria_req = ($req ?"aria-required = 'true'" : ' ' );

	$fields = array(
		'author' => '<p>' .
					'<label for="author">'.esc_html__('Name', 'aden') . ' '.($req ? '*' : ' ' ) .'</label>'.
					'<input type="text"  name="author" id="author"  value="'. esc_attr($commenter['comment_author']).'" '.$aria_req.'/>'.
					'</p>',

		 'email' => '<p>' .
					'<label for="email">'.esc_html__('Email', 'aden') . ' '.($req ? '*' : ' ' ) .'</label>'.
					'<input type="text"  name="email" id="email"  value="'. esc_attr($commenter['comment_author_email']).'" '.$aria_req.'/>'.
					'</p>',	

		 'url' =>  '<p>' .
					'<label for="url">'.esc_html__('Website', 'aden') .'</label>'.
					'<input type="text"  name="url" id="url"  value="'. esc_attr($commenter['comment_author_url']).'"/>'.
					'</p>',	
	);

	return $fields;
}

add_filter('comment_form_default_fields', 'adenit_custom_comment_fields');

add_filter('wpiw_images_only', '__return_true');



/**
 * ----------------------------------------------------------------------------------------
 *  Add title back to images
 * ----------------------------------------------------------------------------------------
 */

function adenit_add_title_to_attachment( $markup, $id ){
	$att = get_post( $id );
	return str_replace('<a ', '<a title="'.$att->post_title.'" ', $markup);
}

add_filter('wp_get_attachment_link', 'adenit_add_title_to_attachment', 10, 5);