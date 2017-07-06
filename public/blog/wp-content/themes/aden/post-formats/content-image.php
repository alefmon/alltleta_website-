<?php 
/**
 * ----------------------------------------------------------------------------------------
 * Template For Image Post
 * ----------------------------------------------------------------------------------------
 */
?>

<?php 
// Get Options
$attachment 		= get_post( get_post_thumbnail_id() );
$url 				= wp_get_attachment_url( get_post_thumbnail_id() );
$attachment_title	= '';

if ( $attachment !== null ) {
	$attachment_title = esc_attr( $attachment->post_title );
} ?>

<div class="entry-image">
	<a href="<?php echo esc_url( $url ); ?>" class="adenit-lightbox" title="<?php echo $attachment_title; ?>" >
	<?php adenit_post_thumbnail(); ?>
	</a>
</div>