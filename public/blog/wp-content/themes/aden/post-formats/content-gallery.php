<?php 
/**
 * ----------------------------------------------------------------------------------------
 * Template For Gallery Post
 * ----------------------------------------------------------------------------------------
 */
?>

<?php
//Get Options
$content_options = get_option( 'adenit_content' );
$post_fullwidth_value = get_post_meta( get_the_ID(), 'post-fullwidth-checkbox', true );
$adenit_gallery_img_ids = get_post_meta( $post->ID, 'rf_gallery_img_ids', true );
$adenit_gallery_img_ids = explode( ',', $adenit_gallery_img_ids );

if ( $adenit_gallery_img_ids[0] !== '' ) { ?>
<div  class="owl-carousel entry-gallery">
	<?php
	foreach ( $adenit_gallery_img_ids as $adenit_gallery_img_id ) { ?>
		<div class="galery-img">
		<?php
		if ( $content_options['post_column'] === 'col-1'  ||  is_single() || ( !empty( $post_fullwidth_value ) && is_home() ) ) {
			echo  wp_get_attachment_image( $adenit_gallery_img_id,'adenit-post-full');
		} else {
			echo  wp_get_attachment_image( $adenit_gallery_img_id,'adenit-post-thumbnail');
		}
		?>
		</div>
	<?php } ?>
</div>
<?php } ?>