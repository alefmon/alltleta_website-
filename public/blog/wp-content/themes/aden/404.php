<?php get_header(); ?>

<?php 
	//Get Options
	$content_options = get_option( 'adenit_content' );
?>

<div class="main-container-wrap">
	<div class="<?php echo ( ( $content_options['boxed'] )? 'center-max-width': '' ); ?>">				
			<div class="fourzerofour">
			<h1><?php esc_html_e( '404', 'aden' ); ?></h1>
			<p><?php esc_html_e( 'This is not the web page you are looking for!', 'aden' ); ?></p>
			</div>
	</div>
</div>
<?php get_footer(); ?>