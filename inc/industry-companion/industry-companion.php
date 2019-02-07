<?php

if( !defined( 'WPINC' ) ){
    die;
}

/*************************
    Define Constant
*************************/

// Define version constant
if( ! defined( 'INDUSTRY_COMPANION_VERSION' ) ) {
    define( 'INDUSTRY_COMPANION_VERSION', '1.0' );
}

// Define dir path constant
if( ! defined( 'INDUSTRY_COMPANION_DIR_PATH' ) ) {
    define( 'INDUSTRY_COMPANION_DIR_PATH', INDUSTRY_DIR_PATH_COMPANION );
}

// Define inc dir path constant
if( ! defined( 'INDUSTRY_COMPANION_INC_DIR_PATH' ) ) {
    define( 'INDUSTRY_COMPANION_INC_DIR_PATH', INDUSTRY_COMPANION_DIR_PATH . 'inc/' );
}

// Define sidebar widgets dir path constant
if( ! defined( 'INDUSTRY_COMPANION_SW_DIR_PATH' ) ) {
    define( 'INDUSTRY_COMPANION_SW_DIR_PATH', INDUSTRY_COMPANION_INC_DIR_PATH . 'sidebar-widgets/' );
}

// Define elementor widgets dir path constant
if( ! defined( 'INDUSTRY_COMPANION_EW_DIR_PATH' ) ) {
    define( 'INDUSTRY_COMPANION_EW_DIR_PATH', INDUSTRY_COMPANION_INC_DIR_PATH . 'elementor-widgets/' );
}

// Define demo data dir path constant
if( ! defined( 'INDUSTRY_COMPANION_DEMO_DIR_PATH' ) ) {
    define( 'INDUSTRY_COMPANION_DEMO_DIR_PATH', INDUSTRY_COMPANION_INC_DIR_PATH . 'demo-data/' );
}

// Define plugin dir url constant
if( ! defined( 'INDUSTRY_COMPANION_DIR_URL' ) ) {
    define( 'INDUSTRY_COMPANION_DIR_URL', INDUSTRY_DIR_URI. 'inc/industry-companion/' );
}


require_once INDUSTRY_COMPANION_DIR_PATH . 'industry-init.php';
