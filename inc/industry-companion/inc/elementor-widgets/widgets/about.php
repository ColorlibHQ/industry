<?php
namespace Industryelementor\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Scheme_Color;
use Elementor\Scheme_Typography;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Text_Shadow;
use Elementor\Group_Control_Background;



// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 *
 * Industry elementor section widget.
 *
 * @since 1.0
 */
class Industry_About extends Widget_Base {

	public function get_name() {
		return 'industry-about';
	}

	public function get_title() {
		return __( 'About', 'industry-companion' );
	}

	public function get_icon() {
		return 'eicon-post-slider';
	}

	public function get_categories() {
		return [ 'industry-elements' ];
	}

	protected function _register_controls() {

        
		// ----------------------------------------  About content ------------------------------
		$this->start_controls_section(
			'about_content',
			[
				'label' => __( 'About Us', 'industry-companion' ),
			]
		);
        $this->add_control(
            'title',
            [
                'label' => esc_html__( 'Title', 'industry-companion' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => esc_html__( 'We’ve made a life that will change you', 'industry-companion' )
            ]
        );
        $this->add_control(
            'subtitletop',
            [
                'label' => esc_html__( 'Sub Title Top', 'industry-companion' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => esc_html__( 'BRAND NEW APP TO BLOW YOUR MIND', 'industry-companion' )
            ]
        );

        $this->add_control(
            'subtitlebottom',
            [
                'label' => esc_html__( 'Sub Title Bottom', 'industry-companion' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => esc_html__( 'We are here to listen from you deliver exellence', 'industry-companion' )
            ]
        );
        $this->add_control(
            'btnlabel',
            [
                'label' => esc_html__( 'Button Label', 'industry-companion' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => esc_html__( 'Get Started Now', 'industry-companion' )
            ]
        );
        $this->add_control(
            'btnurl',
            [
                'label' => esc_html__( 'Button Url', 'industry-companion' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => ''
            ]
        );
        $this->add_control(
            'content',
            [
                'label'         => esc_html__( 'Contact', 'industry-companion' ),
                'type'          => Controls_Manager::WYSIWYG,
                'label_block'   => true,
                'default'       => esc_html__( 'inappropriate behaviour is often laughed off as “boys will be boys,” women face higher conduct standards – especially in the workplace. That’s why it’s crucial that, as women.', 'industry-companion' )
            ]
        );

		$this->end_controls_section(); // End exibition content

        // ----------------------------------------  Form Settings ------------------------------
        $this->start_controls_section(
            'consultancy_formsettings',
            [
                'label' => __( 'Banner Form Settings', 'industry-companion' ),
            ]
        );
        $this->add_control(
            'booking_form_show',
            [
                'label'         => esc_html__( 'Show Car Booking Form', 'industry-companion' ),
                'type'          => Controls_Manager::SWITCHER,
            ]
        );
        $this->add_control(
            'consultancy_formtitle',
            [
                'label'         => esc_html__( 'Form Title', 'industry-companion' ),
                'type'          => Controls_Manager::TEXT,
                'label_block'   => true,
                'default'       => esc_html__( 'Appointment Form', 'industry-companion' )
            ]
        );
        $this->end_controls_section(); // End Form Settings

        //------------------------------ Style Content ------------------------------

        $this->start_controls_section(
            'stylecolor', [
                'label' => __( 'Style Color', 'industry-companion' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'color_title', [
                'label'     => __( 'Title Color', 'industry-companion' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#222222',
                'selectors' => [
                    '{{WRAPPER}} .home-about-left h1'   => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'color_subtitletop', [
                'label'     => __( 'Sub Title Top', 'industry-companion' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#fab700',
                'selectors' => [
                    '{{WRAPPER}} .home-about-left h6' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'color_subtitlebottom', [
                'label'     => __( 'Sub Title Bottom', 'industry-companion' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#222',
                'selectors' => [
                    '{{WRAPPER}} .home-about-left .sub' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'color_desc', [
                'label'     => __( 'Description Color', 'industry-companion' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#777777',
                'selectors' => [
                    '{{WRAPPER}} .home-about-left p' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();

        /**
         * Style Tab
         * ------------------------------ Button Style ------------------------------
         *
         */

        $this->start_controls_section(
            'buttonstyle', [
                'label' => __( 'Style Button', 'industry-companion' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'color_label', [
                'label'     => __( 'Label Color', 'industry-companion' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#fff',
                'selectors' => [
                    '{{WRAPPER}} .home-about-left .primary-btn'   => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'color_hover_label', [
                'label'     => __( 'Hover Label Color', 'industry-companion' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#fab700',
                'selectors' => [
                    '{{WRAPPER}} .home-about-left .primary-btn:hover'   => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'color_bg', [
                'label'     => __( 'Background Color', 'industry-companion' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#222',
                'selectors' => [
                    '{{WRAPPER}} .home-about-left .primary-btn' => 'background-color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'color_hover_bg', [
                'label'     => __( 'Hover Background Color', 'industry-companion' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => 'rgba(15,0,1,0)',
                'selectors' => [
                    '{{WRAPPER}} .home-about-left .primary-btn:hover' => 'background-color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'color_border', [
                'label'     => __( 'Border Color', 'industry-companion' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '',
                'selectors' => [
                    '{{WRAPPER}} .home-about-left .primary-btn' => 'border-color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'color_hover_border', [
                'label'     => __( 'Hover Border Color', 'industry-companion' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#fab700',
                'selectors' => [
                    '{{WRAPPER}} .home-about-left .primary-btn:hover' => 'border-color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();
        /**
         * Style Tab
         * ------------------------------ Form Background Style ------------------------------
         *
         */
        $this->start_controls_section(
            'form_bg', [
                'label' => __( 'Style Form', 'industry-companion' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'color_formtitle', [
                'label'     => __( 'Form Title Color', 'industry-companion' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#fff',
                'selectors' => [
                    '{{WRAPPER}} .home-about-right h4' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'color_btnlabel', [
                'label'     => __( 'Form Button Label Color', 'industry-companion' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#fff',
                'selectors' => [
                    '{{WRAPPER}} .home-about-area .home-about-right .primary-btn'   => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'color_btnhoverlabel', [
                'label'     => __( 'Form Button Hover Label Color', 'industry-companion' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#fff',
                'selectors' => [
                    '{{WRAPPER}} .home-about-area .home-about-right .primary-btn:hover'   => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'formbg_overlay',
            [
                'label' => __( 'Overlay', 'industry-companion' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __( 'Show', 'industry-companion' ),
                'label_off' => __( 'Hide', 'industry-companion' ),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );
        $this->add_control(
            'sectform_ooverlay_bgcolor',
            [
                'label'     => __( 'Overlay Color', 'industry-companion' ),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
                'condition' => [
                    'formbg_overlay' => 'yes'
                ]
            ]
        );
        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'formoverlaybg',
                'label' => __( 'Overlay', 'industry-companion' ),
                'types' => [ 'gradient' ],
                'selector' => '{{WRAPPER}} .home-about-area .home-about-right .overlay-bg',
                'condition' => [
                    'formbg_overlay' => 'yes'
                ]
            ]
        );
        $this->add_control(
            'form_bgheading',
            [
                'label'     => __( 'Background Settings', 'industry-companion' ),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'formbg',
                'label' => __( 'Background', 'industry-companion' ),
                'types' => [ 'classic', 'gradient', 'video' ],
                'selector' => '{{WRAPPER}} .home-about-right',
            ]
        );

        $this->end_controls_section();
        /**
         * Style Tab
         * ------------------------------ Background Style ------------------------------
         *
         */
        $this->start_controls_section(
            'section_bg', [
                'label' => __( 'Style Background', 'industry-companion' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'bg_overlay',
            [
                'label' => __( 'Overlay', 'industry-companion' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __( 'Show', 'industry-companion' ),
                'label_off' => __( 'Hide', 'industry-companion' ),
                'return_value' => 'yes',
            ]
        );
        $this->add_control(
            'sect_ooverlay_bgcolor',
            [
                'label'     => __( 'Overlay Color', 'industry-companion' ),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
                'condition' => [
                    'bg_overlay' => 'yes'
                ]
            ]
        );
        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'sectionoverlaybg',
                'label' => __( 'Overlay', 'industry-companion' ),
                'types' => [ 'gradient' ],
                'selector' => '{{WRAPPER}} .home-about-area .overlay-bg',
                'condition' => [
                    'bg_overlay' => 'yes'
                ]
            ]
        );
        $this->add_control(
            'section_bgheading',
            [
                'label'     => __( 'Background Settings', 'industry-companion' ),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'sectionbg',
                'label' => __( 'Background', 'industry-companion' ),
                'types' => [ 'classic', 'gradient', 'video' ],
                'selector' => '{{WRAPPER}} .home-about-area',
            ]
        );

        $this->end_controls_section();

	}

	protected function render() {

    $settings = $this->get_settings();
    // call load widget script
    $this->load_widget_script();

    ?>
    <section class="home-about-area section-gap">
        <?php 
        if( ! empty( $settings['bg_overlay'] ) ) {
            echo '<div class="overlay overlay-bg"></div>';
        }
        ?>
        <div class="container">
            <div class="row justify-content-center align-items-center">
                <div class="col-lg-8 col-md-12 home-about-left">
                    <?php 
                    // Title
                    if( ! empty( $settings['subtitletop'] ) ) {
                        echo industry_heading_tag(
                            array(
                                'tag'   => 'h6',
                                'text'  => esc_html( $settings['subtitletop'] ),
                                'class' => 'text-uppercase'
                            )
                        );
                    }
                    // Title
                    if( ! empty( $settings['title'] ) ) {
                        echo industry_heading_tag(
                            array(
                                'tag'   => 'h1',
                                'text'  => esc_html( $settings['title'] )
                            )
                        );
                    }

                    // Sub Title 2
                    if( ! empty( $settings['subtitlebottom'] ) ) {
                        echo industry_paragraph_tag(
                            array(
                                'text'  => esc_html( $settings['subtitlebottom'] ),
                                'class' => 'sub'
                            )
                        );
                    }
                    // Content
                    if( ! empty( $settings['content'] ) ) {

                        echo '<div class="pb-20">' . industry_get_textareahtml_output( $settings['content'] ) . '</div>';
                    }
                    //
                    if( !empty( $settings['btnlabel'] ) && ! empty( $settings['btnurl'] ) ) {
                        echo industry_anchor_tag(
                            array(
                                'text'   => esc_html( $settings['btnlabel'] ),
                                'url'    => esc_url( $settings['btnurl'] ),
                                'class'  => 'primary-btn',
                            )
                        );
                    }
                    ?>

                </div>
                <?php 
                if( ! empty( $settings['booking_form_show'] ) ):
                ?>
                <div class="col-lg-4 col-md-12 home-about-right relative">
                    <?php 
                    if( ! empty( $settings['formbg_overlay'] ) ) {
                        echo '<div class="overlay overlay-bg"></div>';
                    }
                    ?>
                    <form class="form-wrap" id="form-wrap" method="post" action="#">
                        <?php
                        // Form Title
                        if( ! empty( $settings['consultancy_formtitle'] ) ) {

                            echo industry_heading_tag (
                                array(
                                    'tag'  => 'h4',
                                    'text' => esc_html( $settings['consultancy_formtitle'] ),
                                    'class' => 'pb-20'

                                )
                            );
                        } 
                        // 
                                        
                        ?>
                        <div class="submit-info"></div>
                        <div class="form-select" id="service-select">
                            <select name="uservice">
                                <option value="1"><?php esc_html_e( 'Select', 'industry-companion' ) ?></option>
                                <?php
                                $companytypes = unserialize( get_option( 'companytypes' ) );
                                if( is_array( $companytypes ) && count( $companytypes ) > 0 ) {
                                    foreach( $companytypes as $val ) {
                                        echo '<option value="' .esc_attr( $val ). '">' . esc_html( $val ) . '</option>';
                                    }
                                }
                                ?>
                            </select>
                        </div>                              
                        <input type="text" name="uname" class="form-control" placeholder="<?php esc_html_e( 'Name', 'industry-companion' ) ?>">
                        <input type="phone" name="uphone" class="form-control" placeholder="<?php esc_html_e( 'Phone Number', 'industry-companion' ) ?>">
                        <input type="email" name="uemail" class="form-control" placeholder="<?php esc_html_e( 'Email Address', 'industry-companion' ) ?>">
                        <textarea name="umessage" id="" cols="30" rows="5" placeholder="<?php esc_html_e( 'Message', 'industry-companion' ) ?>" class="form-control"></textarea>
                        <?php wp_nonce_field( 'request_nonce_action', 'request_submit_nonce_check' ); ?>
                        <button type="submit" name="booking_submit" class="primary-btn"><?php esc_html_e( 'Request Free Quote', 'industry-companion' ) ?></button>
                    </form>

                </div>
                <?php 
                endif;
                ?>
            </div>
        </div>  
    </section>
    <?php

    }

    public function load_widget_script() {
        if( \Elementor\Plugin::$instance->editor->is_edit_mode() === true  ) {
        ?>
        <script>
        ( function( $ ){
            
            if( document.getElementById("service-select") ) {
                  $('select').niceSelect();
            };  

        })(jQuery);
        </script>
        <?php 
        }
    }
	
}
