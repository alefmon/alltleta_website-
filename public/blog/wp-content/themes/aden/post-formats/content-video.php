<?php 
/**
 * ----------------------------------------------------------------------------------------
 * Template For Video Post
 * ----------------------------------------------------------------------------------------
 */
?>

<div class="entry-video">
<?php echo get_post_meta( $post->ID, 'video_embed', true ); ?>
</div>