<?php 
/**
 * @Packge 	   : Industry
 * @Version    : 1.0
 * @Author 	   : Colorlib
 * @Author URI : http://colorlib.com/wp/
 *
 */

// Block direct access
if( ! defined( 'ABSPATH' ) ) {
	exit( 'Direct script access denied.' );
}

//  Call Header
get_header();

/**
 * 404 page
 * @Hook industry_fof
 * @Hooked industry_fof_cb
 *
 */

do_action( 'industry_fof' );

// Call Footer
get_footer();
