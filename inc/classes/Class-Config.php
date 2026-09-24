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

// Final Class
final class Industry {

	// Theme Version
	private $industry_version = '1.0';

	// Minimum WordPress Version required
	private $min_wp = '4.0';

	// Minimum PHP version required 
	private $min_php = '5.6.25';

	function __construct(){

		// After setup theme
		add_action( 'after_setup_theme', array( $this, 'support' ) );

		// elementor flag
		add_action( 'after_switch_theme', array( $this, 'set_elementor_flag' ) );

		// Enqueue elementor theme default style 
		add_action( 'elementor/frontend/after_enqueue_styles', array( $this, 'enqueue_elementor_theme_default_style' ) );

		// Enqueue elementor notice script
		add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_elementor_notice_script' ) );

		// Elementor desiable default style
		add_action( 'wp_ajax_elementor_desiable_default_style' , array( $this, 'elementor_desiable_default_style' ) );

		// initialize theme flag
		$this->init();

	}

	// Theme init
	public function init() {
		
		$this->setup();

		// customizer init Instantiate
		$this->customizer_init();
		

	}

	// Theme setup
	private function setup() {
		
		// Create enqueue class instance
		$enqueu = new Industry_Enqueue();
		$enqueu->scripts = $this->enqueue() ;
		$enqueu->industry_scripts_enqueue_init() ;

	}
	// Theme Support
	public function support() {
		// content width
        $GLOBALS['content_width'] = apply_filters( 'industry_content_width', 751 );

        
        // text domain for translation.
        load_theme_textdomain( 'industry', INDUSTRY_DIR_PATH . '/languages' );
        
        // support title tage
        add_theme_support( 'title-tag' );
        
        // support logo
        add_theme_support( 'custom-logo', array(
            'height'      => 40,
            'width'       => 150,
            'flex-height' => true,
            'flex-width'  => true,
            'header-text' => array( 'site-title', 'site-description' ),
        ) );
        
        //  support post format
        add_theme_support( 'post-formats', array( 'video','audio' ) );
        
        // support post-thumbnails
        add_theme_support( 'post-thumbnails' );
		
		// Custom thumbnails size for blog section
		add_image_size( 'industry_blogsect_post_thumb', 295, 211, true );
		
		// Custom thumbnails size for widget post
		add_image_size( 'industry_widget_post_thumb', 75, 75, true );

		// Custom  thumbnails size for next prev thumb
		add_image_size( 'industry-np-thumb', 59, 59, true );

        // support custom background 
        add_theme_support( 'custom-background', array(
		'default-color' => '#fff',
		) );
        
        // support custom header
		add_theme_support(
			'custom-header', array(
                'default-image'      => get_template_directory_uri() . '/assets/img/page-header.jpg',
                'default-text-color' => '#fff',
                'width'              => 1920,
                'height'             => 450,
                'flex-width'         => true,
                'flex-height'        => true,
			)
		);
        
        // support automatic feed links
        add_theme_support( 'automatic-feed-links' );
        
        // support html5
        add_theme_support( 'html5' );
		
		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );
					    
        // register nav menu
        register_nav_menus( array(
            'primary-menu'   => esc_html__( 'Primary Menu', 'industry' ),
            'social-menu'    => esc_html__( 'Social Menu', 'industry' )
        ) );

        // editor style
        add_editor_style('assets/css/editor-style.css');

	} // end support method

	// enqueue theme style and script
	private function enqueue() {

		$cssPath = INDUSTRY_DIR_CSS_URI;
		$jsPath  = INDUSTRY_DIR_JS_URI;
		
		$scripts = array(
			'style' => array(
				array(
					'handler'		=> 'industry-theme-google-font',
					'file' 			=> $this->google_font(),
				),
				array(
					'handler'		=> 'industry-theme-bootstrap',
					'file' 			=> $cssPath.'bootstrap.css',
					'dependency' 	=> array(),
					'version' 		=> '5.3.8-5',
				),
				array(
					'handler'		=> 'industry-theme-font-awesome',
					'file' 			=> $cssPath.'font-awesome.min.css',
					'dependency' 	=> array(),
					'version' 		=> '7.3.1-1',
				),
				array(
					'handler'		=> 'industry-theme-linearicons',
					'file' 			=> $cssPath.'linearicons.css',
					'dependency' 	=> array(),
					'version' 		=> '1.0',
				),
				array(
					'handler'		=> 'industry-theme-nice-select',
					'file' 			=> $cssPath.'nice-select.css',
					'dependency' 	=> array(),
					'version' 		=> $this->industry_version,
				),
				array(
					'handler'		=> 'industry-theme-industry-main',
					'file' 			=> $cssPath.'main.css',
					'dependency' 	=> array(),
					'version' 		=> $this->industry_version,
				),
				array(
					'handler'		=> 'industry-theme-industry-style',
					'file' 			=> get_stylesheet_uri(),
				),
			),
			'scripts' => array(

				array(
					'handler'		=> 'industry-theme-bootstrap',
					'file' 			=> $jsPath.'bootstrap.min.js',
					'dependency' 	=> array(),
					'version' 		=> '5.3.8-4',
					'in_footer' 	=> true
				),
				array(
					'handler'		=> 'industry-ui-js',
					'file' 			=> $jsPath . ( defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ? 'colorlib-ui.js' : 'colorlib-ui.min.js' ),
					'dependency' 	=> array(),
					'version' 		=> '3.0.0',
					'in_footer' 	=> true
				),
				array(
					'handler'		=> 'industry-theme-industry-main',
					'file' 			=> $jsPath.'main.js',
					'dependency' 	=> array( 'imagesloaded', 'industry-ui-js' ),
					'version' 		=> $this->industry_version . '-s2',
					'in_footer' 	=> true
				),
			)
		);

		return $scripts;

	} // end enqueu method 

	// Google Font  
	private function google_font() {
		$font_url = '';

		/*
		 * The families this theme uses are bundled under
		 * assets/fonts/google, so nothing is fetched from Google and
		 * no request leaves the visitor's browser for a third party.
		 *
		 * Translators can still turn the fonts off for scripts these
		 * families do not cover.
		 */
		if ( 'off' !== _x( 'on', 'Google font: on or off', 'industry' ) ) {
			$font_url = get_template_directory_uri() . '/assets/css/google-fonts.css';
		}

		return esc_url_raw( $font_url );
	} //End google_font method


	/**
	 * Epsilon customizer
	 *
	 */

	private function customizer_init() {


		

		
		// Instantiate industry theme customizer
		$industry_theme_customizer = new industry_theme_customizer();
	}
	/**
	 * Notice for Elementor default style
	 *
	 */

	// Check elementor preview page
	public static function check_elementor_preview_page() {

		if( ( isset( $_REQUEST['action'] ) && 'elementor' == $_REQUEST['action'] ) || isset( $_REQUEST['elementor-preview'] ) ) {
			return true;
		}

		return false;

	}

	// Set flag for elementor ( hooked in after switch theme )
	public function set_elementor_flag() {
		update_option( 'industry_had_elementor', 'no' );
	}

	// Elementor dsiable default style
	public function elementor_desiable_default_style() {

		$nonce = $_POST['nonce'];
		if ( ! wp_verify_nonce( $nonce, 'industry-elementor-notice-nonce' ) ) {
			return;
		}
		$reply = $_POST['reply'];
		if ( ! empty( $reply ) ) {
			if ( $reply == 'yes' ) {
				update_option( 'elementor_disable_color_schemes', 'yes' );
				update_option( 'elementor_disable_typography_schemes', 'yes' );
			}
			update_option( 'industry_had_elementor', 'yes' );
		}
		die();

	}

	// Enqueue theme default style for elementor
	public function enqueue_elementor_theme_default_style() {

		$disabled_color_schemes      = get_option( 'elementor_disable_color_schemes' );
		$disabled_typography_schemes = get_option( 'elementor_disable_typography_schemes' );

		if ( $disabled_color_schemes === 'yes' && $disabled_typography_schemes === 'yes' ) {
			wp_enqueue_style( 'industry-elementor-default-style',  INDUSTRY_DIR_CSS_URI. 'elementor-default-element-style.css', array(), $this->industry_version );
		}
	}
	
	// Enqueue elementor notice scripts
	public function enqueue_elementor_notice_script() {

		$had_elementor = get_option( 'industry_had_elementor' );

		if( $had_elementor == 'no' && self::check_elementor_preview_page() ) {
			wp_enqueue_script( 'industry-elementor-notice', INDUSTRY_DIR_JS_URI.'industry-elementor-notice.js', array( 'industry-ui-js' ), '1.0-s2', true );
			wp_localize_script(
				'industry-elementor-notice',
				'industryElementorNotice',
				array(
					'ajaxurl' => admin_url( 'admin-ajax.php' ),
					'nonce'   => wp_create_nonce( 'industry-elementor-notice-nonce' ),
				)
			);
		}

	}

} // End Class

