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
?>
<div id="page_<?php the_ID(); ?>" <?php post_class( esc_attr( 'content--area blog-detail-txt' ) ); ?>>
	<?php
	/**
	 * page content 
	 * Comments Template
	 * @Hook  industry_page_content
	 *
	 * @Hooked industry_page_content_cb
	 * 
	 *
	 */
	do_action( 'industry_page_content' );

	?>
</div>