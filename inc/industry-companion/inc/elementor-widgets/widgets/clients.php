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
class Industry_Clients extends Widget_Base {

	public function get_name() {
		return 'industry-clients';
	}

	public function get_title() {
		return __( 'Clients', 'industry-companion' );
	}

	public function get_icon() {
		return 'eicon-logo';
	}

	public function get_categories() {
		return [ 'industry-elements' ];
	}

	protected function _register_controls() {

		$repeater = new \Elementor\Repeater();

        
		// ----------------------------------------  Clients content ------------------------------
		$this->start_controls_section(
			'clients_content',
			[
				'label' => __( 'Clients', 'industry-companion' ),
			]
		);
		$this->add_control(
            'clients', [
                'label' => __( 'Client', 'industry-companion' ),
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
                        'name'  => 'url',
                        'label' => __( 'Client Url', 'industry-companion' ),
                        'type'  => Controls_Manager::TEXT,
                        'default' => '#'
                    ],
                    [
                        'name'  => 'img',
                        'label' => __( 'Client Logo', 'industry-companion' ),
                        'type'  => Controls_Manager::MEDIA,
                    ]
                ],
            ]
		);

		$this->end_controls_section(); // End exibition content


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
                'default'   => '#222222',
                'selectors' => [
                    '{{WRAPPER}} .single-model .title h4' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'color_price', [
                'label'     => __( 'Price Color', 'industry-companion' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#f6214b',
                'selectors' => [
                    '{{WRAPPER}} .single-model .title h2' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'color_desc', [
                'label'     => __( 'Descriptions Color', 'industry-companion' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#777777',
                'selectors' => [
                    '{{WRAPPER}} .single-model p' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();

	}

	protected function render() {

    $settings = $this->get_settings();
    // call load widget script
    $this->load_widget_script();
    ?>

    <!-- Start brand Area -->
    <section class="brand-area">
        <div class="container">
            <div class="row logo-wrap">
                <?php 
                if( is_array( $settings['clients'] ) && count( $settings['clients'] ) > 0 ):
                    foreach( $settings['clients'] as $client ):

                $bgUrl = '';
                if( !empty( $client['img']['url'] ) ){
                    $bgUrl = $client['img']['url'];
                }

                ?>
                <a class="col single-img" href="<?php echo esc_url( $client['url'] ); ?>">
                    <?php 
                    echo industry_img_tag(
                        array(
                            'url'   => esc_url( $bgUrl ),
                            'class' => esc_attr( 'd-block mx-auto' )
                        )
                    );
                    ?>
                </a>
                <?php
                    endforeach; 
                endif;
                ?>
            </div>  
        </div>  
    </section>
    <!-- End brand Area --> 

    <?php

    }

    public function load_widget_script(){
        if( \Elementor\Plugin::$instance->editor->is_edit_mode() === true  ) {
        ?>
        <script>
        ( function( $ ){
            
            // Exibition widget owlCarousel
            $('.active-review-carusel').owlCarousel({
                items:2,
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
