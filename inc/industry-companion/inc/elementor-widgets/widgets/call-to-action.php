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
 * Industry elementor call to action section widget.
 *
 * @since 1.0
 */
class Industry_Cta extends Widget_Base {

	public function get_name() {
		return 'industry-cta';
	}

	public function get_title() {
		return __( 'Call To Action', 'industry-companion' );
	}

	public function get_icon() {
		return 'eicon-call-to-action';
	}

	public function get_categories() {
		return [ 'industry-elements' ];
	}

	protected function _register_controls() {


        // ----------------------------------------  Call to action content ------------------------------
        $this->start_controls_section(
            'cta_content',
            [
                'label' => __( 'Call To Action Content', 'industry-companion' ),
            ]
        );
        $this->add_control(
            'title',
            [
                'label' => esc_html__( 'Title', 'industry-companion' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => esc_html__( 'Everything You can imagine is right here', 'industry-companion' )
            ]
        );
        $this->add_control(
            'btnlabel',
            [
                'label' => esc_html__( 'Button Label', 'industry-companion' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => esc_html__( 'Reach Our Support Team', 'industry-companion' )
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

        $this->end_controls_section(); // End content

        /**
         * Style Tab
         * ------------------------------ Style ------------------------------
         *
         */
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
                'default'   => '#fff',
                'selectors' => [
                    '{{WRAPPER}} .callto-area h1'   => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'color_titlebold', [
                'label'     => __( 'Description Color', 'industry-companion' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#fff',
                'selectors' => [
                    '{{WRAPPER}} .callto-area p' => 'color: {{VALUE}};',
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
                    '{{WRAPPER}} .callto-area .primary-btn'   => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'color_hover_label', [
                'label'     => __( 'Hover Label Color', 'industry-companion' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#fff',
                'selectors' => [
                    '{{WRAPPER}} .callto-area .primary-btn:hover'   => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'color_bg', [
                'label'     => __( 'Background Color', 'industry-companion' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#f6214b',
                'selectors' => [
                    '{{WRAPPER}} .callto-area .primary-btn' => 'background-color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'color_hover_bg', [
                'label'     => __( 'Hover Background Color', 'industry-companion' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => 'rgba(250,183,0,0)',
                'selectors' => [
                    '{{WRAPPER}} .callto-area .primary-btn:hover' => 'background-color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'color_border', [
                'label'     => __( 'Border Color', 'industry-companion' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#f6214b',
                'selectors' => [
                    '{{WRAPPER}} .callto-area .primary-btn' => 'border-color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'color_hover_border', [
                'label'     => __( 'Hover Border Color', 'industry-companion' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#fff',
                'selectors' => [
                    '{{WRAPPER}} .callto-area .primary-btn:hover' => 'border-color: {{VALUE}};',
                ],
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
                'default' => 'yes',
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
                'selector' => '{{WRAPPER}} .callto-area .overlay-bg',
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
                'selector' => '{{WRAPPER}} .callto-area',
            ]
        );

        $this->end_controls_section();


	}

	protected function render() {

    $settings = $this->get_settings();

    ?>

    <section class="callto-area section-gap relative">
        <?php 
        if( ! empty( $settings['bg_overlay'] ) ) {
            echo '<div class="overlay overlay-bg"></div>';
        }
        ?>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <?php 
                    // Title
                    if( ! empty( $settings['title'] ) ) {
                        echo industry_heading_tag(
                            array(
                                'tag' => 'h1',
                                'text' => esc_html( $settings['title'] ),
                            )
                        );
                    }
                    // Description
                    if( ! empty( $settings['content'] ) ) {
                        echo '<div class="pt-20 pb-20">';
                        echo industry_get_textareahtml_output( $settings['content'] );
                        echo '</div>';
                    }
                    // Button 
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
            </div>
        </div>  
    </section>

    <?php

        }
	
}
