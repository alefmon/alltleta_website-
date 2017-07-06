<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php esc_attr( bloginfo( 'charset' ) ); ?>">
	<meta name="description" content="<?php esc_attr( bloginfo( 'description' ) ); ?>">
	<!-- Mobile Specific Meta -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<?php wp_head(); ?>
	<!-- Include js plugin -->
</head>
<?php 
//Get option
$header_options = get_option( 'adenit_header' );
$carousel_options = get_option( 'adenit_carousel' );
$content_options = get_option( 'adenit_content' );
?>

<body <?php body_class(); ?> >

<!-- Close Plus Sidebar -->
<div class="fixed-sidebar-close"></div>
<!-- Close Plus Sidebar -->
<div class="fixed-sidebar" data-width="<?php echo esc_attr( $content_options['sidebar_width'] ); ?>">
	<div class="fixed-sidebar-close-btn">
		<i class="fa fa-reply"></i>
	</div>
	<?php
	if ( is_active_sidebar( 'sidebar-3' ) ) {
		dynamic_sidebar( 'sidebar-3' );
	}
	?>
</div>

<div class="main-wrap">
<!-- Search Form -->
<?php echo adenit_search_form('header'); ?>

<!-- HEADER -->
<header class="header-wrap">
	<!-- Header Top -->
	<?php if ( $header_options['top_menu'] ): ?>
	<div class="header-top">
		<div class="center-max-width">

			<div class="header-btns">
				<!-- Search Open Button -->
				<span class="search-btn">
			    	<i class="fa fa-search"></i>
			    </span>
				<?php if ( is_active_sidebar( 'sidebar-3' ) ) : ?>
			    <span class="fixed-sidebar-btn">
			    	<i class="fa fa-plus"></i>
			    </span>
				<?php endif; ?>
				
			</div>
		    
		
			<?php
				adenit_social('header-top-social');
				adenit_nav_menu( 'top-nav', 'top-menu', 1 ); 
			?>
			<div class="clear"></div>
		</div>
	</div>
	<?php endif; ?>
	


	<?php
	$header_img = $header_options['bg_img'];
	$header_logo = true;
	if ( is_category() ) {
		$category = get_category( get_query_var( 'cat' ) );
		$cat_id = $category->cat_ID;
		$caregory_logo = get_term_meta ( $cat_id, 'category-logo', true );
		$caregory_header_img = get_term_meta ( $cat_id, 'category-header-img-data', true );
		if ( $caregory_header_img ) {
			$header_img = $caregory_header_img;
		}
		if ( $caregory_logo ) {
			$header_logo = false;
		}
	}
	if ( is_single() || is_page() ) {
		$page_logo = get_post_meta ( get_the_ID(), 'page-logo', true );
		$page_header_img = get_post_meta ( get_the_ID(), 'page-header-img-data', true );
		if ( $page_header_img ) {
			$header_img = $page_header_img;
		}
		if ( $page_logo ) {
			$header_logo = false;
		}
	}

	?>


	<!-- Header Center -->
	<div class="header-center" style="background-image:url(<?php echo esc_url( $header_img ); ?>)">
		<div class="center-max-width">	

			<!-- header  Logo -->
			<?php if ( $header_logo ): ?>
			<div class="logo">
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php esc_attr( bloginfo('name') ); ?>" >
					<img src="<?php echo esc_url( $header_options['logo'] ); ?>" alt="<?php esc_attr( bloginfo('name') ); ?>">
					<img src="<?php echo esc_url( $header_options['retina_logo'] ); ?>" alt="<?php esc_attr( bloginfo('name') ); ?>">
				</a>	
			</div>
			<?php endif; ?>
			<div class="clear"></div>
		</div>
	</div>

	<!-- Header Bottom -->
	<?php
		adenit_header_bottom('header-bottom');
		adenit_breadcrumb();		
	?>

	<!-- Fixed Header Bottom -->
	<?php
		if ( $header_options['fixed_menu'] ) {
			adenit_header_bottom('fixed-header-bottom');
		}
	?>

	<div class="responsive-column"></div>
<!-- // end header -->
</header>