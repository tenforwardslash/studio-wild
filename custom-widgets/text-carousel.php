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
class Widget_Text_Carousel extends Widget_Base {

	public function get_name() {
		return 'text-carousel';
	}

	public function get_title() {
		return __( 'Text Carousel' );
	}

	public function get_icon() {
		return 'eicon-carousel';
	}

	public function get_categories() {
		return [ 'studio-wild' ];
	}

	public function get_script_depends() {
		return [ 'jquery-slick' ];
	}

	protected function _register_controls() {
		$this->start_controls_section(
			'section_text_carousel',
			[
				'label' => __( 'Text Carousel' ),
			]
		);

		$text_repeater = new Repeater();

		$text_repeater->add_control(
			'repeating_primary_text',
			[
				'label' => __( 'Add Primary Text' ),
				'type' => Controls_Manager::TEXTAREA,
				'default' => [],
				'show_label' => false,
				'dynamic' => [
					'active' => true,
				],
			]
		);

		$text_repeater->add_control(
			'repeating_secondary_text',
			[
				'label' => __( 'Add Secondary Text' ),
				'type' => Controls_Manager::TEXT,
				'default' => [],
				'show_label' => false,
				'dynamic' => [
					'active' => true,
				],
			]
		);

		$this->add_control(
			'repeating_text_group', [
			'label' => __( 'Repeating Text' ),
			'type' => Controls_Manager::REPEATER,
			'fields' => $text_repeater->get_controls(),
			'default' => [
				[
					'repeating_primary_text' => __( 'A beautiful quote from somebody' ),
					'repeating_secondary_text' => __( 'fname lastname, org' ),
				],
			],
			'title_field' => '{{{ repeating_secondary_text }}}',
		]);

		$slides_to_show = range( 1, 10 );
		$slides_to_show = array_combine( $slides_to_show, $slides_to_show );

		$this->add_responsive_control(
			'slides_to_show',
			[
				'label' => __( 'Slides to Show', 'elementor' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					             '' => __( 'Default', 'elementor' ),
				             ] + $slides_to_show,
				'frontend_available' => true,
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_additional_options',
			[
				'label' => __( 'Additional Options', 'elementor' ),
			]
		);

		$this->add_control(
			'pause_on_hover',
			[
				'label' => __( 'Pause on Hover', 'elementor' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'yes',
				'options' => [
					'yes' => __( 'Yes', 'elementor' ),
					'no' => __( 'No', 'elementor' ),
				],
				'frontend_available' => true,
			]
		);

		$this->add_control(
			'autoplay',
			[
				'label' => __( 'Autoplay', 'elementor' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'yes',
				'options' => [
					'yes' => __( 'Yes', 'elementor' ),
					'no' => __( 'No', 'elementor' ),
				],
				'frontend_available' => true,
			]
		);

		$this->add_control(
			'autoplay_speed',
			[
				'label' => __( 'Autoplay Speed', 'elementor' ),
				'type' => Controls_Manager::NUMBER,
				'default' => 5000,
				'frontend_available' => true,
			]
		);

		$this->add_control(
			'infinite',
			[
				'label' => __( 'Infinite Loop', 'elementor' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'yes',
				'options' => [
					'yes' => __( 'Yes', 'elementor' ),
					'no' => __( 'No', 'elementor' ),
				],
				'frontend_available' => true,
			]
		);

		$this->add_control(
			'effect',
			[
				'label' => __( 'Effect', 'elementor' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'slide',
				'options' => [
					'slide' => __( 'Slide', 'elementor' ),
					'fade' => __( 'Fade', 'elementor' ),
				],
				'condition' => [
					'slides_to_show' => '1',
				],
				'frontend_available' => true,
			]
		);

		$this->add_control(
			'speed',
			[
				'label' => __( 'Animation Speed', 'elementor' ),
				'type' => Controls_Manager::NUMBER,
				'default' => 500,
				'frontend_available' => true,
			]
		);

		$this->add_control(
			'direction',
			[
				'label' => __( 'Direction' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'ltr',
				'options' => [
					'ltr' => __( 'Left' ),
					'rtl' => __( 'Right' ),
				],
				'frontend_available' => true,
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_style_navigation',
			[
				'label' => __( 'Navigation', 'elementor' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'heading_style_dots',
			[
				'label' => __( 'Dots', 'elementor' ),
				'type' => Controls_Manager::HEADING,
			]
		);

		$this->add_control(
			'dots_position',
			[
				'label' => __( 'Position', 'elementor' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'outside',
				'options' => [
					'outside' => __( 'Outside', 'elementor' ),
					'inside' => __( 'Inside', 'elementor' ),
				],
			]
		);

		$this->add_control(
			'dots_size',
			[
				'label' => __( 'Size', 'elementor' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 5,
						'max' => 10,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .custom-text-carousel-wrapper .custom-text-carousel .slick-dots li button:before' => 'font-size: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'dots_color',
			[
				'label' => __( 'Color', 'elementor' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .custom-text-carousel-wrapper .custom-text-carousel .slick-dots li button:before' => 'color: {{VALUE}};',
				],
			]
		);

		$this->end_controls_section();
	}

	protected function render() {
		$settings = $this->get_settings_for_display();

		if ( $settings['repeating_text_group'] ) {
			$text_slides = [];

			foreach (  $settings['repeating_text_group'] as $item ) {
				$text_slide_html = '<div>' . $item['repeating_primary_text'] . ', ' . $item['repeating_secondary_text'] . '</div>';
				$text_slides[] = $text_slide_html;
			}


			if ( empty( $text_slides ) ) {
				return;
			}


			$this->add_render_attribute( 'repeating_text_group', 'class', 'custom-text-carousel' );
            $this->add_render_attribute( 'repeating_text_group', 'class', 'slick-dots-' . $settings['dots_position'] );

			?>
            <script type="text/javascript">
                jQuery(document).ready(function() {
                    jQuery('.custom-text-carousel').slick({
                        dots: true,
                        arrows: false,
                        slidesToShow: <?= $settings['slides_to_show'] ?>,
                        slidesToScroll: 1,
                        pauseOnHover: <?= $settings['pause_on_hover'] == 'yes' ? 'true' : 'false' ?>,
                        autoplay: <?= $settings['autoplay'] == 'yes' ? 'true' : 'false' ?>,
                        autoplaySpeed: <?= $settings['autoplay_speed'] ?>,
                        infinite: <?= $settings['infinite'] == 'yes' ? 'true' : 'false' ?>,
                        fade: <?= $settings['effect'] == 'fade' ? 'true' : 'false' ?>,
                        speed: <?= $settings['speed'] ?>,
                        rtl: <?= $settings['direction'] == 'rtl' ? 'true' : 'false' ?>,
                    });
                });
            </script>
            <div class="custom-text-carousel-wrapper elementor-slick-slider">
                <div <?php echo $this->get_render_attribute_string( 'repeating_text_group' ); ?>>
					<?php echo implode( '', $text_slides ); ?>
                </div>
            </div>
			<?php

		}
	}



}