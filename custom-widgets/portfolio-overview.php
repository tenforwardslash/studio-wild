<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

class Portfolio_Overview extends Widget_Base {

	public function get_name() {
		return 'portfolio-overview';
	}

	public function get_title() {
		return __( 'Portfolio Overview' );
	}

	public function get_icon() {
		return 'eicon-gallery-grid';
	}

	public function get_categories() {
		return [ 'studio-wild' ];
	}

	//todo: add header, desired portfolio category filters, column numbers, pull portfolio from specific type?

	protected function _register_controls() {
		$this->start_controls_section(
			'section_portfolio_overview',
			[
				'label' => __( 'Portfolio Overview' ),
			]
		);

		$this->add_control(
			'portfolio_labels_display',
			[
				'label' => __( 'Portfolio Labels Display' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'flex-start' => 'Flex Start',
					'flex-end' => 'Flex End',
					'center' => 'Center',
					'space-between' => 'Space Between',
					'space-around' => 'Space Around',
					'space-evenly' => 'Space Evenly',
				],
				'label_block' => true,
				'default' => 'space-between',
			]
		);

		//TODO: add header section and move items accordingly into overview

		$this->add_control(
			'portfolio_header_text',
			[
				'label' => __( 'Add Header Text' ),
				'type' => Controls_Manager::TEXTAREA,
				'rows' => 1,
				'dynamic' => [
					'active' => true,
				],
			]
		);

		$this->add_control(
			'portfolio_header_size',
			[
				'label' => __( 'HTML Tag' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'h1' => 'H1',
					'h2' => 'H2',
					'h3' => 'H3',
					'h4' => 'H4',
					'h5' => 'H5',
					'h6' => 'H6',
					'div' => 'div',
					'span' => 'span',
					'p' => 'p',
				],
				'default' => 'h2',
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'portfolio_header_typography',
				'label' => __( 'Portfolio Header Typography' ),
				'selector' => '{{WRAPPER}} .portfolio-header-text',
			]
		);

		//todo: filter this to only return portfolio categories
		$portfolio_categories = get_categories();
//		error_log(print_r($portfolio_categories, true));

		$category_options = [];
		foreach ($portfolio_categories as $p_cat) {
			$category_options[$p_cat->slug] = __( $p_cat->name );
		}

		$this->end_controls_section();

		$this->start_controls_section(
			'section_portfolio_filters_config',
			[
				'label' => __( 'Portfolio Filters Configuration' ),
			]
		);

		$this->add_control(
			'portfolio_filters',
			[
				'label' => __( 'Visible Portfolio Filters' ),
				'type' => Controls_Manager::SELECT2,
				'multiple' => true,
				'options' => $category_options,
				'label_block' => true,
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'portfolio_filters_typography',
				'label' => __( 'Portfolio Filters Typography' ),
				'selector' => '{{WRAPPER}} .portfolio-header .portfolio-filters a',
			]
		);

		$this->add_control(
			'portfolio_filters_margin',
			[
				'label' => __( 'Portfolio Filters Margin' ),
				'type' => Controls_Manager::DIMENSIONS,
				'label_block' => true,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .portfolio-header .portfolio-filters a' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'portfolio_filters_color',
			[
				'label' => __( 'Portfolio Filters Color' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .portfolio-header .portfolio-filters a' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'portfolio_filters_color_opacity',
			[
				'label' => __( 'Portfolio Filters Color Opacity' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 1,
						'step' => .01
					],
				],
				'default' => [
					'size' => .5,
				],
				'selectors' => [
					'{{WRAPPER}} .portfolio-header .portfolio-filters a' => 'opacity: {{SIZE}};',
				],
			]
		);

		$this->add_control(
			'portfolio_filters_hover_color',
			[
				'label' => __( 'Portfolio Filters Hover Color' ),
				'type' => Controls_Manager::COLOR,
				'separator' => 'before',
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .portfolio-header .portfolio-filters a:hover' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'portfolio_filters_hover_color_opacity',
			[
				'label' => __( 'Portfolio Filters Hover Color Opacity' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 1,
						'step' => .01
					],
				],
				'default' => [
					'size' => 1,
				],
				'selectors' => [
					'{{WRAPPER}} .portfolio-header .portfolio-filters a:hover' => 'opacity: {{SIZE}};',
				],
			]
		);

		$this->add_control(
			'portfolio_filters_active_color',
			[
				'label' => __( 'Portfolio Filters Active Color' ),
				'type' => Controls_Manager::COLOR,
				'separator' => 'before',
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .portfolio-header .portfolio-filters a.active' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'portfolio_filters_active_color_opacity',
			[
				'label' => __( 'Portfolio Filters Active Color Opacity' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 1,
						'step' => .01
					],
				],
				'default' => [
					'size' => 1,
				],
				'selectors' => [
					'{{WRAPPER}} .portfolio-header .portfolio-filters a.active' => 'opacity: {{SIZE}};',
				],
			]
		);

		$this->end_controls_section();
	}

	protected function render() {
		$settings = $this->get_settings_for_display();

		$portfolio_header_tag = $settings['portfolio_header_size'];
		$portfolio_header_text = $settings['portfolio_header_text'];

		if (!$settings['portfolio_filters'] || count($settings['portfolio_filters']) === 0) {
			return;
		}

		$visible_filters = array('<a class="active" href="#all">All</a>');
		foreach($settings['portfolio_filters'] as $visible_filter_slug) {
			$filter_details = get_category_by_slug( $visible_filter_slug );
			$visible_filters[] = "<a href='#$visible_filter_slug'>$filter_details->name</a>";
//			error_log(print_r($visible_filter, true));
		}

		$labels_flex_display = $settings['portfolio_labels_display'];

		echo "<div class='portfolio-header' style='display:flex; align-items: center; justify-content: $labels_flex_display'>
				<$portfolio_header_tag class='portfolio-header-text'>$portfolio_header_text</$portfolio_header_tag>
				<div class='portfolio-filters'>";
		echo implode('', $visible_filters);
		echo "	</div>
			  </div>";
	}

}