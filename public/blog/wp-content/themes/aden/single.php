<?php get_header(); ?>

<?php
//Get Options
$content_options = get_option( 'adenit_content' );
$disable_sidebar = get_post_meta( get_the_ID(), 'disable-sidebar-checkbox', true );
if ( $disable_sidebar ) {
	$disable_sidebar = true;
} else {
	$disable_sidebar = false;
}

$full_width_single = ($disable_sidebar)?'full-width-single':''; ?>

<div class="main-container-wrap">
	<div class="<?php echo ( ( $content_options['single_boxed'] )? 'center-max-width': '' ); ?>">
		
		<?php
		// Get left Sidebar
		if ( $content_options['sidebar_single_position'] === 'left' && !$disable_sidebar ) {
			get_sidebar();
		} ?>

		<div class="main-container <?php echo esc_attr( $full_width_single ); ?>">
			
			<?php
			// Single Post
			get_template_part( 'templates/single-post');

			// Single Pagination
			if ( $content_options['post_pagination'] ) {
				get_template_part( 'templates/single-pagination');
			}

			// Similar Posts
			if ( $content_options['similar_posts'] !== 'none' ) {
				get_template_part( 'templates/similar-posts');
			}

			// Comment Area
			if ( $content_options['post_comment_area'] ) {
				echo '<div class="comments-area" id="comments">';
				comments_template('', true);
				echo '</div>';
			} ?>
									
		</div>
	
		<?php
		// Get Right Sidebar
		if ( $content_options['sidebar_single_position'] === 'right' && !$disable_sidebar ) {
			get_sidebar();
		} ?>

		<div class="clear"></div>
	</div>
</div>
<?php get_footer(); ?>