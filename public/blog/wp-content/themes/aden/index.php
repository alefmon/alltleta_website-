<?php get_header(); ?>

<?php 
	//Get Options
	$content_options = get_option( 'adenit_content' );
	$carousel_options = get_option( 'adenit_carousel' );
?>

<?php 
if ( $carousel_options['show'] ) {
	adenit_carousel();
} 
?>
<div class="main-container-wrap">

	<div class="<?php echo ( ( $content_options['boxed'] )? 'center-max-width': '' ); ?>">

		<?php 
		// Get Left Sidebar
		if ( $content_options['sidebar_position'] === 'left' ) {
			get_sidebar();
		}
		?>

		<div class="main-container">
			
			<?php if( have_posts() ) : while( have_posts() ) : the_post(); ?>
	
			<?php
			//Get Options
			$post_fullwidth = get_post_meta( get_the_ID(), 'post-fullwidth-checkbox', true );

			// Post Data
			$post_column = $content_options['post_column'];
			$post_gutter = $content_options['horizontal_gutter'];
			
			if ( (!empty( $post_fullwidth ) && is_home() ) ) { 
				$post_fullwidth = 1;
			} else {
				$post_fullwidth = 0;
			} 

			?>

			<article
			id="post-<?php the_ID(); ?>" <?php post_class(); ?>
			data-post-column ="<?php echo esc_attr( $post_column ); ?>"
			data-post-gutter ="<?php echo esc_attr( $post_gutter ); ?>"
			data-post-fullwidth ="<?php echo esc_attr( $post_fullwidth ); ?>"
			>
			<?php
			if ( $post_fullwidth || $post_column ==='col-1' ) {
				adenit_main_post();
			} else {
				adenit_grid_post();
			} ?>
			</article>
		
			<?php endwhile; ?>
			
			<div class="clear"></div>
			<!-- Get Pagination -->
			<?php if ( $content_options['pagination'] === "numbered" ) : ?>
			
			<div class='numbered-pagination'>
				<?php adenit_pagination(); ?>
			</div>

			<?php else : ?>

			<div class="default-pagination">	
				<?php if ( get_next_posts_link() ) : ?>
				<div class="previous">
				
				<?php next_posts_link( '<i class="fa fa-long-arrow-left" ></i>&nbsp;'. esc_html__( 'Older', 'aden' ) ); ?>
				</div>
				<?php endif; ?>

				<?php if ( get_previous_posts_link() ) : ?>
				<div class="next">
				<?php previous_posts_link( esc_html__( 'Newer', 'aden' ). '&nbsp;<i class="fa fa-long-arrow-right" ></i>' ); ?>
				</div>
				<?php endif; ?>
		
				<div class="clear"></div>
			</div>

			<?php endif; ?>
			
			<?php else : ?>
			<h2 class="no-post-title"><?php esc_html_e( 'No Post Were Found!', 'aden' ); ?></h2>
			<?php endif; ?>
						
		</div>

		<?php
		// Get Right Sidebar
		if ( $content_options['sidebar_position'] === 'right' ) {
			get_sidebar();
		}
		?>

		<div class="clear"></div>
	</div>
</div>
<?php get_footer(); ?>