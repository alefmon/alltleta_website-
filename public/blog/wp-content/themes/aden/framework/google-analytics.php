<?php
/**
 * ---------------------------------------------------------------------------------------
 * Google Analytics Code
 * ---------------------------------------------------------------------------------------
 */

function adenit_google_analytics() {
	// Get Option
	$google_analytics_options = get_option( 'adenit_google_analytics' );
	
	echo '' . $google_analytics_options['code'];
}

add_action( 'wp_footer', 'adenit_google_analytics' );