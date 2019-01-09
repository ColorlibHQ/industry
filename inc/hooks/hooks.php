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

/**
 *
 * Before Wrapper
 *
 * @Preloader
 *
 */
add_action( 'industry_preloader', 'industry_site_preloader', 10 );

/**
 * Header
 *
 * @Header Menu
 * @Header Bottom
 * 
 */

add_action( 'industry_header', 'industry_header_cb', 10 );

/**
 * Hook for footer
 *
 */
add_action( 'industry_footer', 'industry_footer_area', 10 );
add_action( 'industry_footer', 'industry_back_to_top', 20 );

/**
 * Hook for Blog, single, page, search, archive pages wrapper.
 */
add_action( 'industry_wrp_start', 'industry_wrp_start_cb', 10 );
add_action( 'industry_wrp_end', 'industry_wrp_end_cb', 10 );

/**
 * Hook for Blog, single, search, archive pages column.
 */
add_action( 'industry_blog_col_start', 'industry_blog_col_start_cb', 10 );
add_action( 'industry_blog_col_end', 'industry_blog_col_end_cb', 10 );

/**
 * Hook for blog posts thumbnail.
 */
add_action( 'industry_blog_posts_thumb', 'industry_blog_posts_thumb_cb', 10 );

/**
 * Hook for blog posts title.
 */
add_action( 'industry_blog_posts_title', 'industry_blog_posts_title_cb', 10 );

/**
 * Hook for blog posts meta.
 */
add_action( 'industry_blog_posts_meta', 'industry_blog_posts_meta_cb', 10 );

/**
 * Hook for blog posts bottom meta.
 */
add_action( 'industry_blog_posts_bottom_meta', 'industry_blog_posts_bottom_meta_cb', 10 );

/**
 * Hook for blog posts excerpt.
 */
add_action( 'industry_blog_posts_excerpt', 'industry_blog_posts_excerpt_cb', 10 );

/**
 * Hook for blog posts content.
 */
add_action( 'industry_blog_posts_content', 'industry_blog_posts_content_cb', 10 );

/**
 * Hook for blog sidebar.
 */
add_action( 'industry_blog_sidebar', 'industry_blog_sidebar_cb', 10 );

/**
 * Hook for blog single post social share option.
 */
add_action( 'industry_blog_posts_share', 'industry_blog_posts_share_cb', 10 );

/**
 * Hook for blog single post meta category, tag, next - previous link and comments form.
 */
add_action( 'industry_blog_single_meta', 'industry_blog_single_meta_cb', 10 );

/**
 * Hook for page content.
 */
add_action( 'industry_page_content', 'industry_page_content_cb', 10 );


/**
 * Hook for 404 page.
 */
add_action( 'industry_fof', 'industry_fof_cb', 10 );
