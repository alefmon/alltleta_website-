<?php 
//Get Options
$content_options = get_option( 'adenit_content' );
?>

<!-- Single Post -->
<?php if( have_posts() ) : while( have_posts() ) : the_post(); ?>
			
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> >
	
	<!-- Post Media -->
	<?php get_template_part( 'post-formats/content', get_post_format() );  ?>

	<!-- Post Header -->
	<header class="entry-header">			
		<?php		
		// The categories
		$category_list = get_the_category_list( ', ' );
		if ( $category_list && $content_options['post_categories'] ) {
			echo '<div class="meta-categories"> ' . $category_list . ' </div>';
		} ?>
		
		<!-- Post Title -->
		<h2 class="post-title">
			<?php the_title(); ?>
		</h2>
		
		<!-- Date And Author -->
		<div class="meta-author-date">
		<?php
		// Post Author
		if ( $content_options['post_author'] ) {
			printf(
				'<a href="%1$s" rel="author">%2$s</a>&nbsp;/&nbsp;',
				esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
				get_the_author()
			);
		}

		// Post Date
		if ( $content_options['post_date'] ) {
			echo get_the_time( get_option('date_format') );
		} ?>
		</div>
	</header>
	
	<!-- Post Content -->
	<div class="entry-content">
	<?php
	the_content('');

	wp_link_pages( array(
		'before'      => '<div class="page-links"><span class="page-links-title">' . esc_html__( 'Pages:', 'aden' ) . '</span>',
		'after'       => '</div>',
		'link_before' => '<span>',
		'link_after'  => '</span>',
	) ); ?>
	</div>

	<!-- Author Description -->
	<?php if ( get_the_author_meta( 'description' ) && $content_options['post_author_description'] ): ?>
	<div class="meta-author-description">
		<div class="author-avatar">
			<?php echo get_avatar( get_the_author_meta( 'ID' ), 110 ); ?>
		</div>
		<div class="author-info">
			<h4><?php the_author_posts_link(); ?></h4>
			<p><?php the_author_meta( 'description' ); ?></p>
		</div>
	</div>		
	<?php endif; ?>
	
	<!-- Post Footer -->
	<footer class="entry-footer">
		<?php

		// Post Share 
		adenit_sharing();
		
		// Post Tags
		$tag_list = get_the_tag_list( '<div class="meta-tags">','','</div>');
		if ( $tag_list && $content_options['post_tags'] ) {
			echo '' . $tag_list;
		}

		// Post Like
		echo '<div class="meta-like-comm">';
		if ( $content_options['post_like'] ) {
			echo getPostLikeLink( get_the_ID() );
		}

		// Post Comment
		if ( comments_open() && $content_options['post_comment'] ) {
			comments_popup_link('0&nbsp;<i class="fa fa-comments-o"></i>', '1&nbsp;<i class="fa fa-comments-o"></i>', '%&nbsp;<i class="fa fa-comments-o"></i>', 'post-comment');
		}
		echo '</div>';
		?>
		<div class="clear"></div>
	</footer>
</article>

<?php endwhile; ?>
<?php endif; ?>