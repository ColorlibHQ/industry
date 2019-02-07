<?php
namespace Industryelementor\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Scheme_Color;
use Elementor\Scheme_Typography;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Text_Shadow;
use Elementor\Group_Control_Background;
use Elementor\Group_Control_Border;



// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}


/**
 *
 * Industry elementor counter section widget.
 *
 * @since 1.0
 */
class Industry_Counter extends Widget_Base {

	public function get_name() {
		return 'industry-counter';
	}

	public function get_title() {
		return __( 'Counter', 'industry-companion' );
	}

	public function get_icon() {
		return 'eicon-counter';
	}

	public function get_categories() {
		return [ 'industry-elements' ];
	}

	protected function _register_controls() {

		$repeater = new \Elementor\Repeater();


        // ----------------------------------------  Features content ------------------------------
        $this->start_controls_section(
            'counter_content',
            [
                'label' => __( 'Counter', 'industry-companion' ),
            ]
        );
        $this->add_control(
            'counter', [
                'label' => __( 'Create Counter', 'industry-companion' ),
                'type' => Controls_Manager::REPEATER,
                'title_field' => '{{{ label }}}',
                'fields' => [
                    [
                        'name'          => 'label',
                        'label'         => __( 'Title', 'industry-companion' ),
                        'type'          => Controls_Manager::TEXT,
                        'label_block'   => true,
                        'default'       => 'Projects Completed'
                    ],
                    [
                        'name'    => 'number',
                        'label'   => __( 'Number', 'industry-companion' ),
                        'type'    => Controls_Manager::TEXT,
                        'default' => '2536'
                    ],
                    [
                        'name'    => 'unit',
                        'label'   => __( 'Unit', 'industry-companion' ),
                        'type'    => Controls_Manager::TEXT,
                        'default' => ''
                    ]
                ],
            ]
        );

        $this->end_controls_section(); // End content

        //------------------------------ Style counter ------------------------------
        $this->start_controls_section(
            'style_counter', [
                'label' => __( 'Style Counter', 'industry-companion' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'color_countertitle', [
                'label' => __( 'Title Color', 'industry-companion' ),
                'type'  => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .single-faq p' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'color_number', [
                'label'     => __( 'Number Color', 'industry-companion' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .single-faq h5' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'color_bg', [
                'label'     => __( 'Background Color', 'industry-companion' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#fab700',
                'selectors' => [
                    '{{WRAPPER}} .inner' => 'background-color: {{VALUE}};',
                    '{{WRAPPER}} .circle' => 'border-color: {{VALUE}};',
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
                'selector' => '{{WRAPPER}} .faq-area .overlay-bg',
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
                'selector' => '{{WRAPPER}} .faq-area',
            ]
        );

        $this->end_controls_section();
	}

	protected function render() {

    $settings = $this->get_settings();


    ?>

    <section class="faq-area section-gap relative">
        <?php 
        if( ! empty( $settings['bg_overlay'] ) ) {
            echo '<div class="overlay overlay-bg"></div>';
        }
        ?>
        <div class="container">
            <div class="row justify-content-center align-items-center">
                <?php
                if( is_array( $settings['counter'] ) && count( $settings['counter'] ) > 0 ):
                    foreach( $settings['counter'] as $val ):
                ?>
                <div class="col-lg-3 col-md-6">
                    <div class="single-faq">
                        <div class="circle">
                          <div class="inner"></div>
                        </div>
                        <h5><span class="counter"><?php echo absint( $val['number'] ); ?></span><?php echo esc_html( $val['unit'] ); ?></h5>
                        <?php
                        if( ! empty( $val['label'] ) ) {
                            echo industry_paragraph_tag(
                                array(
                                    'text' => esc_html( $val['label'] )
                                )
                            );
                        }
                        ?>
                    </div>
                </div>
                <?php 
                    endforeach;
                endif;
                ?>
            </div>
        </div>  
    </section>
    <!-- end fact Area -->

    <?php

    }
	
}
