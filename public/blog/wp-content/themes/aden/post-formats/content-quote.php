<?php 
/**
 * ----------------------------------------------------------------------------------------
 * Template For Quote Post
 * ----------------------------------------------------------------------------------------
 */
?>

<?php
//Get option
$adenit_quote = get_post_meta( $post->ID, 'quote', true );
$adenit_quote_author  = get_post_meta( $post->ID, 'quote_author', true );
?>

<div class="entry-quote">
	<?php adenit_post_thumbnail(); ?>
	<div class="container">
	  <div class="outer ">
	    	<div class="inner">
    			<?php if ( !empty($adenit_quote) ): ?>
    			<p><span class="adenit-quote"><?php echo esc_html( $adenit_quote ); ?></span></p>
    			<?php endif; ?>
	        
	       		<?php if ( !empty( $adenit_quote_author ) ): ?>
	        	<h4><span class="adenit-quote-author"><?php echo esc_html( $adenit_quote_author ); ?></span></h4>
	        	<?php endif; ?>			
			</div>
	    </div>
	</div>
</div>