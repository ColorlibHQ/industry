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
