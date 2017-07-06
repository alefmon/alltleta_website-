<!-- Single pagination -->
<div class="single-pagination">
	
	<?php 
	$prev_post = get_previous_post(); 
	$next_post = get_next_post();

	if ( !empty( $prev_post ) ) { 
	$prev_img_url = wp_get_attachment_image_src( get_post_thumbnail_id( $prev_post->ID ), 'adenit-pagination-thumbnail' ); ?>
	<div class="previous" style="background-image: url(<?php echo esc_url( $prev_img_url[0] ); ?>);" >
		<a class="single-pagination-info" href="<?php echo esc_url( get_permalink( $prev_post->ID ) ); ?>" >				
			<p><i class="fa fa-long-arrow-left"></i>&nbsp;<?php esc_html_e( 'previous', 'aden'); ?></p>
			<h4><?php echo esc_attr( $prev_post->post_title ); ?></h4>					
		</a>
	</div>
	<?php } 
	
	if ( !empty( $next_post ) ) {
	$next_img_url = wp_get_attachment_image_src( get_post_thumbnail_id( $next_post->ID ), 'adenit-pagination-thumbnail' ); ?>
	<div class="next" style="background-image: url(<?php echo esc_url( $next_img_url[0] ); ?>);" >
		<a class="single-pagination-info" href="<?php echo esc_url( get_permalink( $next_post->ID ) ); ?>">
			<p><?php esc_html_e( 'newer', 'aden'); ?>&nbsp;<i class="fa fa-long-arrow-right"></i></p>
			<h4><?php echo esc_attr( $next_post->post_title ); ?></h4>
		</a>
	</div>
	<?php } ?>

	<div class="clear"></div>
</div>