<!-- Similar Posts -->
<?php

//Get Options
$content_options	= get_option( 'adenit_content' );
$current_categories	= get_the_category();

if ( $current_categories ) {

	$first_category	= $current_categories[0]->term_id;

	if ( $content_options['similar_posts'] === 'random' ) {
		$args = array(
			'post_type'				=> 'post',
			'post__not_in'			=> array( $post->ID ),
			'orderby'				=> 'rand',
			'posts_per_page'		=> 3,
			'ignore_sticky_posts'	=> 1,
		    'meta_query' => array(
		        array(
		         'key' => '_thumbnail_id',
		         'compare' => 'EXISTS'
		        ),
		    )
		);
	} else {
		$args = array(
			'post_type'				=> 'post',
			'category__in'			=> array( $first_category ),
			'post__not_in'			=> array( $post->ID ),
			'orderby'				=> 'rand',
			'posts_per_page'		=> 3,
			'ignore_sticky_posts'	=> 1,
		    'meta_query' => array(
		        array(
		         'key' => '_thumbnail_id',
		         'compare' => 'EXISTS'
		        ),
		    )
		);
	}

	$similar_posts = new WP_Query( $args );	

	if ( $similar_posts->have_posts() ) { ?>
	<div class="related-posts">	
		<div class="related-posts-title">					
			<h3><?php echo esc_html( $content_options['similar_posts_title'] ); ?></h3>
		</div>
	<?php 
		while ( $similar_posts->have_posts() ) { 
			$similar_posts->the_post();
			if ( has_post_thumbnail() ) { ?>
			<section>
				<a href="<?php esc_url( the_permalink() ); ?>"><?php the_post_thumbnail('adenit-post-thumbnail'); ?></a>
				<h4><a href="<?php esc_url( the_permalink() ); ?>"><?php the_title(); ?></a></h4>
				<span class="meta-date"><?php echo get_the_time( get_option('date_format') ); ?></span>
			</section>
			<?php }
		} ?>
		<div class="clear"></div>
		</div>
	<?php }
} 

wp_reset_postdata(); ?>