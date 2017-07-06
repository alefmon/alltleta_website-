<?php 
/**
 * ----------------------------------------------------------------------------------------
 * Template For Audio Post
 * ----------------------------------------------------------------------------------------
 */
?>

<div class="entry-audio">
	<?php adenit_post_thumbnail(); ?>
	<div class="meta-audio">
	<?php echo get_post_meta( $post->ID, 'audio_embed', true ); ?>
	</div>
</div>