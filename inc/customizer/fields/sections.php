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

/***********************************
 * Register customizer panels
 ***********************************/

$panels = array(
    /**
     * Theme Options Panel
     */
    array(
        'id'   => 'industry_options_panel',
        'args' => array(
            'priority'       => 0,
            'capability'     => 'edit_theme_options',
            'theme_supports' => '',
            'title'          => esc_html__( 'Theme Options', 'industry' ),
        ),
    )
);


/***********************************
 * Register customizer sections
 ***********************************/


$sections = array(
    /**
     * General Section
     */
    array(
        'id'   => 'industry_general_options_section',
        'args' => array(
            'title'    => esc_html__( 'General', 'industry' ),
            'panel'    => 'industry_options_panel',
            'priority' => 1,
        ),
    ),
    /**
     * Header Section
     */
    array(
        'id'   => 'industry_headertop_options_section',
        'args' => array(
            'title'    => esc_html__( 'Header Top', 'industry' ),
            'panel'    => 'industry_options_panel',
            'priority' => 2,
        ),
    ),
    /**
     * Blog Section
     */
    array(
        'id'   => 'industry_blog_options_section',
        'args' => array(
            'title'    => esc_html__( 'Blog', 'industry' ),
            'panel'    => 'industry_options_panel',
            'priority' => 3,
        ),
    ),

    /**
     * 404 Page Section
     */
    array(
        'id'   => 'industry_fof_options_section',
        'args' => array(
            'title'    => esc_html__( '404 Page', 'industry' ),
            'panel'    => 'industry_options_panel',
            'priority' => 6,
        ),
    ),
    /**
     * Footer Section
     */
    array(
        'id'   => 'industry_footer_options_section',
        'args' => array(
            'title'    => esc_html__( 'Footer', 'industry' ),
            'panel'    => 'industry_options_panel',
            'priority' => 7,
        ),
    ),

);


/***********************************
 * Add customizer elements
 ***********************************/
$collection = array(
    'panel'   => $panels,
    'section' => $sections,
);

Epsilon_Customizer::add_multiple( $collection );
