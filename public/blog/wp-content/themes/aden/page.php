<?php get_header(); ?>

<?php
//Get Options
$content_options = get_option( 'adenit_content' );
?>

<div class="main-container-wrap">
	<div class="center-max-width">
		<div class="adenit-page-wrap">
			<?php if( have_posts() ) : while( have_posts() ) : the_post(); ?>
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> >
				
				<?php if( has_post_thumbnail() && !get_post_meta( get_the_ID(), 'page-feature-img', true ) ) : ?>
				<div class="entry-thumbnail">
					<a href="<?php echo esc_url( get_permalink() ) ?>"><?php the_post_thumbnail('adenit-post-full'); ?></a>
				</div>
				<?php endif; ?>			

				<header class="entry-header">
					<h2 class="post-title"><?php the_title(); ?></h2>
				</header>
				
				<div class="entry-content">
					<?php the_content(); ?>
					<div class="clear"></div>
				</div>

				<?php adenit_sharing(); ?>
				
			</article>

			<!-- Comment area -->
			<?php if ( $content_options['page_comment_area'] && ( comments_open() || get_comments_number() ) ): ?>
			<div class="comments-area" id="comments">
				<?php comments_template('', true); ?>
			</div> <!-- end comments-area -->
			<?php endif; ?>
			
			<?php endwhile; else : ?>
				<h1><?php esc_html_e( 'no page where found', 'aden' ); ?></h1>
			<?php endif; ?>
		</div>
	</div>
</div>
<?php get_footer(); ?>
