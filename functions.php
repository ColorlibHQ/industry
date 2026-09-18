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
 * Define constant
 *
 */
 
// Base URI
if( ! defined( 'INDUSTRY_DIR_URI' ) ) {
	define( 'INDUSTRY_DIR_URI', get_template_directory_uri().'/' );
}

// assets URI
if( ! defined( 'INDUSTRY_DIR_ASSETS_URI' ) ) {
	define( 'INDUSTRY_DIR_ASSETS_URI', INDUSTRY_DIR_URI.'assets/' );
}

// Css File URI
if( ! defined( 'INDUSTRY_DIR_CSS_URI' ) ) {
	define( 'INDUSTRY_DIR_CSS_URI', INDUSTRY_DIR_ASSETS_URI .'css/' );
}

// Js File URI
if( ! defined( 'INDUSTRY_DIR_JS_URI' ) ) {
	define( 'INDUSTRY_DIR_JS_URI', INDUSTRY_DIR_ASSETS_URI .'js/' );
}

// Base Directory
if( ! defined( 'INDUSTRY_DIR_PATH' ) ) {
	define( 'INDUSTRY_DIR_PATH', get_parent_theme_file_path().'/' );
}

//Inc Folder Directory
if( ! defined( 'INDUSTRY_DIR_PATH_INC' ) ) {
	define( 'INDUSTRY_DIR_PATH_INC', INDUSTRY_DIR_PATH.'inc/' );
}

//Companion Folder Directory
if( ! defined( 'INDUSTRY_DIR_PATH_COMPANION' ) ) {
	define( 'INDUSTRY_DIR_PATH_COMPANION', INDUSTRY_DIR_PATH_INC.'industry-companion/' );
}

//Industry libraries Folder Directory
if( ! defined( 'INDUSTRY_DIR_PATH_LIBS' ) ) {
	define( 'INDUSTRY_DIR_PATH_LIBS', INDUSTRY_DIR_PATH_INC.'libraries/' );
}

//Classes Folder Directory
if( ! defined( 'INDUSTRY_DIR_PATH_CLASSES' ) ) {
	define( 'INDUSTRY_DIR_PATH_CLASSES', INDUSTRY_DIR_PATH_INC.'classes/' );
}

//Hooks Folder Directory
if( ! defined( 'INDUSTRY_DIR_PATH_HOOKS' ) ) {
	define( 'INDUSTRY_DIR_PATH_HOOKS', INDUSTRY_DIR_PATH_INC.'hooks/' );
}

//Widgets Folder Directory
if( ! defined( 'INDUSTRY_DIR_PATH_WIDGET' ) ) {
	define( 'INDUSTRY_DIR_PATH_WIDGET', INDUSTRY_DIR_PATH_INC.'widgets/' );
}



// Admin Enqueue script
function industry_admin_script(){
    wp_enqueue_style( 'industry-admin', get_template_directory_uri().'/assets/css/industry_admin.css', false, '1.0.0' );
    wp_enqueue_script( 'industry_admin', get_template_directory_uri().'/assets/js/industry_admin.js', false, '1.0.0' );
}
add_action( 'admin_enqueue_scripts', 'industry_admin_script' );


/**
 * Include File
 *
 */

require_once( INDUSTRY_DIR_PATH_INC . 'breadcrumbs.php' );
require_once( INDUSTRY_DIR_PATH_INC . 'widgets-reg.php' );
require_once( INDUSTRY_DIR_PATH_INC . 'wp_bootstrap_navwalker.php' );
require_once( INDUSTRY_DIR_PATH_INC . 'industry-functions.php' );
require_once( INDUSTRY_DIR_PATH_INC . 'commoncss.php' );
require_once( INDUSTRY_DIR_PATH_INC . 'support-functions.php' );
require_once( INDUSTRY_DIR_PATH_INC . 'wp-html-helper.php' );
require_once( INDUSTRY_DIR_PATH_INC . 'wp_bootstrap_pagination.php' );
require_once( INDUSTRY_DIR_PATH_INC . 'customizer/customizer.php' );
require_once( INDUSTRY_DIR_PATH_CLASSES . 'Class-Enqueue.php' );
require_once( INDUSTRY_DIR_PATH_CLASSES . 'Class-Config.php' );
require_once( INDUSTRY_DIR_PATH_HOOKS . 'hooks.php' );
require_once( INDUSTRY_DIR_PATH_HOOKS . 'hooks-functions.php' );
require_once( INDUSTRY_DIR_PATH_INC . 'class-epsilon-dashboard-autoloader.php' );
require_once( INDUSTRY_DIR_PATH_INC . 'class-epsilon-init-dashboard.php' );

require_once( INDUSTRY_DIR_PATH_COMPANION . 'industry-companion.php' );

/**
 * Instantiate Industry object
 *
 * Inside this object:
 * Enqueue scripts, Google font, Theme support features, Epsilon Dashboard .
 *
 */

$obj = new Industry();


/**
 * A page by title, without get_page_by_title().
 *
 * WordPress deprecated get_page_by_title() in 6.2; this keeps the same
 * signature and return shape so existing calls behave identically.
 *
 * @param string $title     Page title.
 * @param string $output    OBJECT, ARRAY_A or ARRAY_N.
 * @param string $post_type Post type to search.
 * @return WP_Post|array|null
 */
if ( ! function_exists( 'industry_get_page_by_title' ) ) {
	function industry_get_page_by_title( $title, $output = OBJECT, $post_type = 'page' ) {
		$query = new WP_Query(
			array(
				'post_type'              => $post_type,
				'title'                  => $title,
				'post_status'            => 'all',
				'posts_per_page'         => 1,
				'no_found_rows'          => true,
				'ignore_sticky_posts'    => true,
				'update_post_term_cache' => false,
				'update_post_meta_cache' => false,
				'orderby'                => 'post_date ID',
				'order'                  => 'ASC',
			)
		);

		$page = ! empty( $query->posts ) ? $query->posts[0] : null;

		if ( ! $page ) {
			return null;
		}

		if ( ARRAY_A === $output ) {
			return get_object_vars( $page );
		}

		if ( ARRAY_N === $output ) {
			return array_values( get_object_vars( $page ) );
		}

		return $page;
	}
}


/**
 * Editor and markup support this theme predates.
 */
if ( ! function_exists( 'industry_modern_supports' ) ) {
	function industry_modern_supports() {
		add_theme_support( 'responsive-embeds' );
		add_theme_support( 'align-wide' );
		add_theme_support( 'editor-styles' );
	}
	add_action( 'after_setup_theme', 'industry_modern_supports', 20 );
}
