<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

class Portfolio_Category extends Widget_Base {

	public function get_name() {
		return 'portfolio-category';
	}

	public function get_title() {
		return __( 'Portfolio Category' );
	}

	public function get_icon() {
		return 'eicon-tags';
	}

	public function get_categories() {
		return [ 'studio-wild' ];
	}

	protected function _register_controls() {
		$this->start_controls_section(
			'portfolio_category',
			[
				'label' => __( 'Portfolio Category' ),
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'portfolio_category_typography',
				'label' => __( 'Category Typography' ),
				'selector' => '{{WRAPPER}} .portfolio-category',
			]
		);

		$this->add_control(
			'category_delimiter',
			[
				'label' => __( 'Category Delimiter' ),
				'type' => Controls_Manager::TEXT,
				'default' => ', ',
			]
		);

		$this->add_responsive_control(
			'align',
			[
				'label' => __( 'Alignment' ),
				'type' => Controls_Manager::CHOOSE,
				'options' => [
					'left' => [
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
				'selectors' => [
					'{{WRAPPER}} .portfolio-category' => 'text-align: {{VALUE}};',
				],
			]
		);

		$this->end_controls_section();
	}

	protected function render() {
		$settings = $this->get_settings_for_display();

		$portfolio_cats = get_the_category();

		if (!$portfolio_cats || count($portfolio_cats) === 0) {
			return;
		}

		echo "<p class=\"portfolio-category\">";
		echo implode($settings['category_delimiter'], array_map(function($n) { return $n->name; }, $portfolio_cats));
		echo "</p>";
	}
}