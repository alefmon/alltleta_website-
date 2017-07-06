<?php 
/**
 * ----------------------------------------------------------------------------------------
 * Template For Link Post
 * ----------------------------------------------------------------------------------------
 */
?>

<?php
//Get option
$adenit_link = get_post_meta( $post->ID, 'link', true );
$link_author = get_post_meta( $post->ID, 'link_author', true );
?>

<div class="entry-link">
	<?php adenit_post_thumbnail(); ?>	
	<div class="container">
	  <div class="outer ">
	    <div class="inner">
			<?php if ( !empty( $adenit_link ) ): ?>
			 <p>
	        	<span class="adenit-link">
	        		<?php echo esc_html( $adenit_link ); ?>
	        	</span>
	        </p>
			<?php endif; ?>
        
        	<?php if ( !empty( $link_author ) ): ?>
        	<p>			
				<a class="adenit-link-author" href="<?php echo esc_url( get_post_meta( $post->ID, 'link_author_url', true ) ); ?>">
					<?php echo esc_html( $link_author ); ?>
				</a>	
			</p>
       		<?php endif; ?>			
	    </div>
	  </div>
	</div>	
</div>