<?php 
/**
 * @Packge     : Industry
 * @Version    : 1.0
 * @Author     : Colorlib
 * @Author URI : http://colorlib.com/wp/
 *
 */
 
// Block direct access
if( ! defined( 'ABSPATH' ) ) {
    exit( 'Direct script access denied.' );
}

/**
 * Footer Area
 *
 * @Footer
 * @Back To Top Button
 *
 * @Hook industry_footer
 *
 * @Hooked  industry_footer_area 10
 * @Hooked  industry_back_to_top 20 
 *
 */

do_action( 'industry_footer' );

wp_footer(); 
?>
</body>
</html>