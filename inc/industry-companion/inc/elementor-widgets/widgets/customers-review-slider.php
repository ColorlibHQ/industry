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
class Industry_Customers_Review_Slider extends Widget_Base {

	public function get_name() {
		return 'industry-customersreview';
	}

	public function get_title() {
		return __( 'Customers Review', 'industry-companion' );
	}

	public function get_icon() {
		return 'eicon-post-slider';
	}

	public function get_categories() {
		return [ 'industry-elements' ];
	}

	protected function _register_controls() {

		$repeater = new \Elementor\Repeater();

        // ----------------------------------------  Customers Review Section Heading ------------------------------
        $this->start_controls_section(
            'customersreview_heading',
            [
                'label' => __( 'Customers Review Section Heading', 'industry-companion' ),
            ]
        );
        $this->add_control(
            'sect_title', [
                'label' => __( 'Title', 'industry-companion' ),
                'type'  => Controls_Manager::TEXT,
                'label_block' => true

            ]
        );
        $this->add_control(
            'sect_subtitle', [
                'label' => __( 'Sub Title', 'industry-companion' ),
                'type'  => Controls_Manager::TEXT,
                'label_block' => true

            ]
        );

        $this->end_controls_section(); // End section top content
        
		// ----------------------------------------  Customers review content ------------------------------
		$this->start_controls_section(
			'customersreview_content',
			[
				'label' => __( 'Customers Review', 'industry-companion' ),
			]
		);
		$this->add_control(
            'review_slider', [
                'label' => __( 'Create Review', 'industry-companion' ),
                'type'  => Controls_Manager::REPEATER,
                'title_field' => '{{{ label }}}',
                'fields' => [
                    [
                        'name'  => 'label',
                        'label' => __( 'Name', 'industry-companion' ),
                        'type'  => Controls_Manager::TEXT,
                        'label_block' => true,
                        'default' => 'Name'
                    ],
                    [
                        'name' => 'reviewstar',
                        'label' => __( 'Star Review', 'industry-companion' ),
                        'type' => Controls_Manager::CHOOSE,
                            'options' => [
                                '1' => [
                                    'title' => __( '1', 'industry-companion' ),
                                    'icon' => 'fa fa-star',
                                ],
                                '2' => [
                                    'title' => __( '2', 'industry-companion' ),
                                    'icon' => 'fa fa-star',
                                ],
                                '3' => [
                                    'title' => __( '3', 'industry-companion' ),
                                    'icon' => 'fa fa-star',
                                ],
                                '4' => [
                                    'title' => __( '4', 'industry-companion' ),
                                    'icon' => 'fa fa-star',
                                ],
                                '5' => [
                                    'title' => __( '5', 'industry-companion' ),
                                    'icon' => 'fa fa-star',
                                ],
                            ],
                    ],
                    [
                        'name'  => 'desc',
                        'label' => __( 'Descriptions', 'industry-companion' ),
                        'type'  => Controls_Manager::WYSIWYG,
                    ]
                ],
            ]
		);

		$this->end_controls_section(); // End exibition content

        // ----------------------------------------  Video Content ------------------------------
        $this->start_controls_section(
            'customersreview_videocontent',
            [
                'label' => __( 'Video Content', 'industry-companion' ),
            ]
        );
        $this->add_control(
            'youtubeurl',
            [
                'label' => esc_html__( 'Youtube Video Url', 'industry-companion' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => ''
            ]
        );
        $this->add_control(
            'featured_img',
            [
                'label'         => esc_html__( 'Featured Image', 'industry-companion' ),
                'type'          => Controls_Manager::MEDIA,
                'label_block'   => true,
            ]
        );
        $this->end_controls_section(); // End exibition content
        //------------------------------ Style Section ------------------------------
        $this->start_controls_section(
            'style_section', [
                'label' => __( 'Style Section Heading', 'industry-companion' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'color_secttitle', [
                'label'     => __( 'Section Title Color', 'industry-companion' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#fff',
                'selectors' => [
                    '{{WRAPPER}} .title h1' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'color_sectsubtitle', [
                'label'     => __( 'Section Sub Title Color', 'industry-companion' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#fff',
                'selectors' => [
                    '{{WRAPPER}} .title p' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();


        //------------------------------ Style Content ------------------------------
        $this->start_controls_section(
            'style_content', [
                'label' => __( 'Style Content', 'industry-companion' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'color_title', [
                'label'     => __( 'Title Color', 'industry-companion' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#fff',
                'selectors' => [
                    '{{WRAPPER}} .feedback-right h4' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'color_price', [
                'label'     => __( 'Star Color', 'industry-companion' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#fab700',
                'selectors' => [
                    '{{WRAPPER}} .feedback-right .star .checked' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'color_desc', [
                'label'     => __( 'Descriptions Color', 'industry-companion' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#fff',
                'selectors' => [
                    '{{WRAPPER}} .feedback-right p' => 'color: {{VALUE}};',
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
                'selector' => '{{WRAPPER}} .feedback-area .overlay-bg',
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
                'selector' => '{{WRAPPER}} .feedback-area',
            ]
        );

        $this->end_controls_section();

	}

	protected function render() {

    $settings = $this->get_settings();
    // call load widget script
    $this->load_widget_script();
 
    $videoUrl = $imgUrl = '';
    // Video url
    
    if( ! empty( $settings['youtubeurl'] ) ) {
        $videoUrl = $settings['youtubeurl'];
    }
    // Feature image

    if( ! empty( $settings['featured_img']['url'] ) ) {
        $imgUrl = $settings['featured_img']['url'];
    }

    ?>


    <section class="feedback-area section-gap relative" id="feedback">
        <?php 
        if( ! empty( $settings['bg_overlay'] ) ) {
            echo '<div class="overlay overlay-bg"></div>';
        }
        ?>
        <div class="container">
            <?php 
            // Section Heading
            industry_section_heading( $settings['sect_title'], $settings['sect_subtitle'] );
            ?>  

            <div class="row feedback-contents justify-content-center align-items-center">
                <?php 
                if( $videoUrl ) :
                ?>
                <div class="col-lg-6 feedback-left relative d-flex justify-content-center align-items-center" style="background-image: url( <?php echo esc_url( $imgUrl ); ?> )">
                    
                    <a class="play-btn" href="<?php echo esc_url( $videoUrl ); ?>"><img class="img-fluid" src="<?php echo INDUSTRY_COMPANION_DIR_URL ?>inc/elementor-widgets/assets/img/play.png" alt=""></a>
                </div>
                <?php 
                endif;
                ?>

                <div class="col-lg-6 feedback-right">
                    <?php 
                    
                    if( is_array( $settings['review_slider'] ) && count( $settings['review_slider'] ) > 0 ):
                        echo '<div class="active-review-carusel">';
                        foreach( $settings['review_slider'] as $review ):
                    ?>
                            <div class="single-carusel">
                            <div class="title justify-content-start d-flex">
                            <?php 
                            if( ! empty( $review['label'] ) ) {
                                echo industry_heading_tag(
                                    array(
                                        'tag'  => 'h4',
                                        'text' => esc_html( $review['label'] ),
                                    )
                                ); 
                            }
                            //
                            if( ! empty( $review['reviewstar'] ) ) {
                                echo '<div class="star">';
                                    for( $i = 1; $i <= 5; $i++ ) {

                                        if( $review['reviewstar'] >= $i ) {
                                            echo '<span class="fa fa-star checked"></span>';
                                        } else {
                                            echo '<span class="fa fa-star"></span>';
                                        }
                                    }
                                echo '</div>';
                            }
                            ?>
                            </div>
                            <?php 
                            if( ! empty( $review['desc'] ) ) {
                                echo industry_get_textareahtml_output( $review['desc'] );
                            }
                            
                            echo '</div>';
                        endforeach; 
                        echo '</div>';
                    endif;
                    ?>

                </div>

            </div>
        </div>  
    </section>
    <?php

    }

    public function load_widget_script(){
        if( \Elementor\Plugin::$instance->editor->is_edit_mode() === true  ) {
        ?>
        <script>
        ( function( $ ){
            
            // Exibition widget owlCarousel
            $('.active-review-carusel').owlCarousel({
                items:1,
                loop:true,
                margin:30,
                dots: true
            });

        })(jQuery);
        </script>
        <?php 
        }
    }
	
}
