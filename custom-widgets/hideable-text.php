<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Custom Text Carousel Widget
 *
 * Widget that displays a set of text in a rotating carousel or slider
 *
 * @package Elementor
 *
 */
class Hideable_Text extends Widget_Base {

	public function get_name() {
		return 'hideable-text';
	}

	public function get_title() {
		return __( 'Hideable Text' );
	}

	public function get_icon() {
	    // todo: set right icon
		return 'eicon-carousel';
	}

	public function get_categories() {
		return [ 'studio-wild' ];
	}

	protected function _register_controls() {
		$this->start_controls_section(
			'section_hideable_text',
			[
				'label' => __( 'Hideable Text' ),
			]
		);

        $this->add_control(
            'hidden_text',
            [
                'label' => __( 'Hidden Text', 'elementor' ),
                'type' => Controls_Manager::WYSIWYG,
                'dynamic' => [
                    'active' => true,
                ],
                'placeholder' => __( 'Enter Long Collapsible Text', 'elementor' ),
                'default' => __( 'This is a long blurb for collapsing text', 'elementor' ),
            ]
        );

        $this->add_control(
            'hide_button_text',
            [
                'label' => __( 'Hide Button Text', 'elementor' ),
                'type' => Controls_Manager::TEXT,
                'dynamic' => [
                    'active' => true,
                ],
                'placeholder' => __( 'Enter Button Text', 'elementor' ),
                'default' => __( 'Click to expand', 'elementor' ),
            ]
        );
        $this->add_control(
                'show_button_text',
            [
                'label' => __( 'Show Button Text', 'elementor' ),
                'type' => Controls_Manager::TEXT,
                'dynamic' => [
                    'active' => true,
                ],
                'placeholder' => __( 'Enter Show Button Text', 'elementor' ),
                'default' => __( 'Click to expand', 'elementor' ),
            ]
        );
        $this->add_control(
            'hide_button_color',
            [
                'label' => __( 'Hide Button Color', 'elementor' ),
                'type' => Controls_Manager::COLOR,
                'default' => '#2D2722',
                'selectors' => [
                    "{{WRAPPER}} .sw-button" => 'color: {{UNIT}};',
                    "{{WRAPPER}} .sw-button:hover, {{WRAPPER}} .sw-button:focus" => 'color: #ffffff;',
                ],
            ]
        );
        $this->add_responsive_control(
            'align',
            [
                'label' => __( 'Alignment', 'elementor' ),
                'type' => Controls_Manager::CHOOSE,
                'options' => [
                    'left'    => [
                        'title' => __( 'Left', 'elementor' ),
                        'icon' => 'eicon-text-align-left',
                    ],
                    'center' => [
                        'title' => __( 'Center', 'elementor' ),
                        'icon' => 'eicon-text-align-center',
                    ],
                    'right' => [
                        'title' => __( 'Right', 'elementor' ),
                        'icon' => 'eicon-text-align-right',
                    ],
                    'justify' => [
                        'title' => __( 'Justified', 'elementor' ),
                        'icon' => 'eicon-text-align-justify',
                    ],
                ],
                'prefix_class' => 'elementor%s-align-',
                'default' => '',
            ]
        );

        $this->end_controls_section();
	}

	protected function render() {
		$settings = $this->get_settings_for_display();
        if ( ! empty( $settings['link']['url'] ) ) {
            $this->add_render_attribute( 'sw-button', 'href', $settings['link']['url'] );

            if ( $settings['link']['is_external'] ) {
                $this->add_render_attribute( 'sw-button', 'target', '_blank' );
            }

            if ( $settings['link']['nofollow'] ) {
                $this->add_render_attribute( 'sw-button', 'rel', 'nofollow' );
            }
        }
        ?>
        <div id="hidden-text-<?=$this->get_id()?>" class="hidden-text" style="display:none;"><?= $settings['hidden_text'] ?></div>
        <a <?= $this->get_render_attribute_string( 'sw-button' ) ?>><button id="hide-<?=$this->get_id()?>" class='sw-button'><?= $settings['show_button_text'] ?></button></a>
        <script type="text/javascript">
            jQuery(document).ready(function($) {

                var hideText = '<?=$settings['hide_button_text']?>';
                var showText = '<?=$settings['show_button_text']?>';

                $('#hide-<?=$this->get_id()?>').click(function(){
                    $("#hidden-text-<?=$this->get_id()?>").slideToggle(function(){
                        $('#hide-<?=$this->get_id()?>').text(function(i, text){
                            return text ===  hideText ? showText : hideText;
                        })
                    })
                })
            })
        </script>
        <?php


	}



}