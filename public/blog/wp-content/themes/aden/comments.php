<?php 
//prevent the direct loading of this file

	if( !empty($_SERVER['SCRIPT-FILENAME']) && basename($_SERVER['SCRIPT-FILENAME']) == 'comments.php' ) {
		die(esc_html__('You cannot access this file directory', 'aden'));
	}

?>

<?php if( post_password_required()) : ?>
	<p>
		<?php esc_html_e( 'This post is password protected. Enter the password to view the comments.' ,'aden'); ?>
		<?php return; ?>
	</p>
<?php endif; ?>

<?php if ( have_comments() ) : ?>

	<div class="comment-title">
	<h2><?php comments_number( esc_html__( 'No Comments', 'aden' ), esc_html__( 'One Comment', 'aden' ), esc_html__( '% Comments', 'aden' ) ); ?></h2>
	</div>
	<ul class="commentslist" >
		<?php wp_list_comments('callback=adenit_comments'); ?>
	</ul>

	<?php if(get_comment_pages_count() > 1 && get_option('page_comments')) : ?>
	<div class="comments-nav-section">					
		<p class="fl"></p>
		<p class="fr"></p>	<div class="default-pagination">	
				
				<div class="previous">
				<?php  previous_comments_link( '<i class="fa fa-long-arrow-left" ></i>&nbsp;'. esc_html__('Older Comments', 'aden')  ); ?>
				</div>
				
				<div class="next">
					<?php  next_comments_link( esc_html__('Newer Comments', 'aden') . '&nbsp;<i class="fa fa-long-arrow-right" ></i>'  ); ?>
				</div>
				
				<div class="clear"></div>
			</div>

	</div> <!-- end comments-nav-section -->
	<?php endif; ?>
<?php endif; ?>
<?php comment_form(); ?>
