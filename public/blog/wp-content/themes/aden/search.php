<?php get_header(); ?>

<?php 
	//Get Options
	$content_options = get_option( 'adenit_content' );
?>

<div class="main-container-wrap">

	<div class="<?php echo ( ( $content_options['boxed'] )? 'center-max-width': '' ); ?>">

		<?php 
		// Get Left Sidebar
		if ( $content_options['sidebar_position'] !== 'none' && $content_options['sidebar_position'] === 'left' ) {
			get_sidebar();
		}
		?>

		<div class="main-container">
			<?php if ( have_posts() ) : ?>

			<?php while( have_posts() ) : the_post(); ?>
	
			<article id="post-<?php the_ID(); ?>" class="search-post" >
			
			<figure class="search-thumbnail">
				<a href="<?php esc_url( the_permalink() ); ?>" class="thumb-overlay"></a>
				<?php the_post_thumbnail('adenit-search-thumbnail'); ?>			
				<p><i class="fa fa-picture-o">&nbsp;&nbsp;&nbsp;<?php esc_html_e( 'No Image', 'aden' ); ?></i></p>
			</figure>
				
			<div class="search-info">
				<h2 class="post-title">
					<a href="<?php esc_url( the_permalink() ); ?>"><?php the_title(); ?></a>
				</h2>
				<div class="search-content">
					<?php the_excerpt(); ?>
				</div>
				
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
					// Get the date
					echo get_the_time( get_option('date_format') );
				}
				?>
				</div>
			</div>
			<div class="clear"></div>

			</article>
			 
			<?php endwhile; ?>
			
			<div class='numbered-pagination'>
				<?php adenit_pagination(); ?>
			</div> 
				
			<?php else : ?>
			<div class="no-search-result">			
			<h2><?php esc_html_e( 'Nothing Found', 'aden' ); ?></h2>
			<div class="search-separator"></div>
			<p><?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'aden' ); ?></p>
			<?php get_search_form(); ?>
			</div>
			<?php endif; ?>
						
		</div>

		<?php
		// Get Right Sidebar
		if ( $content_options['sidebar_position'] !== 'none' && $content_options['sidebar_position'] === 'right' ) {
			get_sidebar();
		}
		?>

		<div class="clear"></div>
	</div>
</div>
<?php get_footer(); ?>