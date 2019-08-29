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

	public function get_script_depends() {
		return [ 'jquery' ];
	}

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

		$this->add_control(
			'portfolio_items_per_row',
			[
				'label' => __( 'Portfolio Items Per Row' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 1,
						'max' => 5,
						'step' => 1
					],
				],
				'default' => [
					'size' => 3,
				],
			]
		);

		$this->add_control(
			'portfolio_items_padding',
			[
				'label' => __( 'Portfolio Items Padding' ),
				'type' => Controls_Manager::DIMENSIONS,
				'label_block' => true,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .portfolio-items .portfolio-item' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'portfolio_items_per_page',
			[
				'label' => __( 'Portfolio Items Per Page' ),
				'type' => Controls_Manager::NUMBER,
				'min' => 1,
				'max' => 50,
				'step' => 1,
				'default' => 9,
                'separator' => 'after',
			]
		);

		/////portfolio link styling/////
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'portfolio_link_typography',
				'label' => __( 'Portfolio Link Typography' ),
				'selector' => '{{WRAPPER}} .portfolio-link',
			]
		);

		$this->add_control(
			'portfolio_link_color',
			[
				'label' => __( 'Portfolio Link Color' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .portfolio-link' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'portfolio_link_color_opacity',
			[
				'label' => __( 'Portfolio Link Color Opacity' ),
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
					'{{WRAPPER}} .portfolio-link' => 'opacity: {{SIZE}};',
				],
			]
		);

		$this->add_control(
			'portfolio_link_hover_color',
			[
				'label' => __( 'Portfolio Link Hover Color' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} a.portfolio-link:hover' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'portfolio_link_hover_color_opacity',
			[
				'label' => __( 'Portfolio Link Hover Color Opacity' ),
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
					'{{WRAPPER}} a.portfolio-link:hover' => 'opacity: {{SIZE}};',
				],
			]
		);

		$this->add_control(
			'portfolio_link_active_color',
			[
				'label' => __( 'Portfolio Link Active Color' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} a.active.portfolio-link' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'portfolio_link_active_color_opacity',
			[
				'label' => __( 'Portfolio Link Active Color Opacity' ),
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
					'{{WRAPPER}} a.active.portfolio-link' => 'opacity: {{SIZE}};',
				],
			]
		);

		////pagination controls////
		$this->add_control(
			'pagination_alignment',
			[
				'label' => __( 'Pagination Alignment' ),
				'type' => Controls_Manager::SELECT,
				'separator' => 'before',
				'options' => [
					'left' => 'Left',
					'center' => 'Center',
					'right' => 'Right',
				],
				'label_block' => true,
				'default' => 'center',
			]
		);

		$this->add_control(
			'pagination_item_padding',
			[
				'label' => __( 'Pagination Item Padding' ),
				'type' => Controls_Manager::DIMENSIONS,
				'label_block' => true,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .portfolio-pagination a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_portfolio_headers_config',
			[
				'label' => __( 'Portfolio Headers Configuration' ),
			]
		);

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

		$this->end_controls_section();

		$this->start_controls_section(
			'section_portfolio_item_config',
			[
				'label' => __( 'Portfolio Item Configuration' ),
			]
		);

		$this->add_control(
			'portfolio_items_typography_color',
			[
				'label' => __( 'Portfolio Items Typography Color' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .portfolio-items .portfolio-item a p' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'portfolio_item_header_typography',
				'label' => __( 'Portfolio Item Header Typography' ),
				'selector' => '{{WRAPPER}} .portfolio-items .portfolio-item .portfolio_item_header',
			]
		);

		$this->add_control(
			'portfolio_item_header_margin',
			[
				'label' => __( 'Portfolio Item Header Margin' ),
				'type' => Controls_Manager::DIMENSIONS,
				'label_block' => true,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .portfolio-items .portfolio-item .portfolio_item_header' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'portfolio_item_subheader_typography',
				'label' => __( 'Portfolio Item Subheader Typography' ),
				'selector' => '{{WRAPPER}} .portfolio-items .portfolio-item .portfolio_item_subheader',
			]
		);

		$this->add_control(
			'portfolio_item_subheader_margin',
			[
				'label' => __( 'Portfolio Item Subheader Margin' ),
				'type' => Controls_Manager::DIMENSIONS,
				'label_block' => true,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .portfolio-items .portfolio-item .portfolio_item_subheader' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'portfolio_item_excerpt_typography',
				'label' => __( 'Portfolio Item Excerpt Typography' ),
				'selector' => '{{WRAPPER}} .portfolio-items .portfolio-item .portfolio_excerpt',
			]
		);

		$this->add_control(
			'portfolio_item_excerpt_margin',
			[
				'label' => __( 'Portfolio Item Excerpt Margin' ),
				'type' => Controls_Manager::DIMENSIONS,
				'label_block' => true,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .portfolio-items .portfolio-item .portfolio_excerpt' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'portfolio_items_overlay',
			[
				'label' => __( 'Portfolio Items Overlay' ),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
				'default' => 'linear-gradient(to bottom, rgba(255,0,0,0), rgba(221,174,60,.7))',
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

		$visible_filters = [];
		foreach($settings['portfolio_filters'] as $visible_filter_slug) {
			$filter_details = get_category_by_slug( $visible_filter_slug );
			$visible_filters[] = "<a class='portfolio-link' href='#$visible_filter_slug'>$filter_details->name</a>";
		}

		$visible_filters[] = '<a class="portfolio-link active" href="#all">All</a>';

		$posts = get_posts(array(
			'numberposts'   =>  -1
		));

		$portfolio_items = [];

		$img_overlay = $settings['portfolio_items_overlay'];

		$items_per_row = $settings['portfolio_items_per_row']['size'];
		$item_column_val = intdiv(100, $items_per_row);

		foreach($posts as $portfolio_item) {
			$post_featured_img = get_the_post_thumbnail_url($portfolio_item->ID);
			$post_link = get_permalink($portfolio_item->ID);

			$post_categories = get_the_category($portfolio_item->ID);
            $post_category_slugs = implode(' ', array_map(function($c) { return $c->slug; }, $post_categories));

			$portfolio_html = "<div class='portfolio-item elementor-column all elementor-col-$item_column_val $post_category_slugs' 
                                style='flex-direction: column;'>
					<a href='$post_link' class='portfolio-item-link'>
						<div class='portfolio-item-img'>
							<img src='$post_featured_img'>
							<div class='portfolio-item-img-overlay' style='background-image: $img_overlay'></div>
						</div>
						<p class='portfolio_item_header'>$portfolio_item->post_title</p>
						<p class='portfolio_item_subheader'>NEED TO TALK TO KENZIE</p>
						<p class='portfolio_excerpt'>$portfolio_item->post_excerpt</p>
					</a>
				</div>";

			$portfolio_items[] = $portfolio_html;
		}

		$labels_flex_display = $settings['portfolio_labels_display'];
		$pagination_align = $settings['pagination_alignment'];

		echo "<div class='portfolio-header' style='display:flex; align-items: center; justify-content: $labels_flex_display'>
				<$portfolio_header_tag class='portfolio-header-text'>$portfolio_header_text</$portfolio_header_tag>
				<div class='portfolio-filters'>";
		echo implode('', $visible_filters);
		echo "</div></div><div class='portfolio-items elementor-row'>";
		echo implode('', $portfolio_items);
		echo "</div>";

		echo "<div class='portfolio-pagination' style='text-align: $pagination_align'></div>";

		?>
		<script type="text/javascript">
			jQuery(document).ready(function($) {
				console.log('holy fuck this is so much code');


                var visible = "";

                var totalItems = $('div.portfolio-item').length;
                var itemsPerPage = <?= $settings['portfolio_items_per_page']?>;
                var currPage = 1;

                //handles category filters
                $('div.portfolio-filters').on('click', 'a', function (event) {
                    $("div.portfolio-item").show();
                    visible = '.' + this.href.slice(this.href.indexOf("#") + 1);

                    $('div.portfolio-filters a').removeClass('active');
                    $(this).addClass('active');


                    //TODO: update this to reuse filterItems function
                    totalItems = $("div.portfolio-item" + visible).length;
                    $("div.portfolio-item").hide();
                    $("div.portfolio-item" + visible).show();

                    currPage = 1;
                    displayPageNums();
                    event.preventDefault();
                });

                //handles number pagination
                $('div.portfolio-pagination').on('click', 'a.num', function (event) {
                    $('div.portfolio-pagination a.num').removeClass('active');
                    $(this).addClass('active');

                    let desiredPg = parseInt(this.id);
                    filterItems(desiredPg);

                    event.preventDefault();
                });

                //handles action pagination
                $('div.portfolio-pagination').on('click', 'a.action', function (event) {
                    var desiredPg = currPage;

                    if ((this.id === 'next' && currPage >= Math.ceil(totalItems / itemsPerPage)) ||
                        (this.id === 'prev' && currPage <= 1))  {
                        event.preventDefault();
                        return;
                    }

                    if (this.id === 'next') {
                        desiredPg++;
                        var newActivePageId = parseInt($('div.portfolio-pagination a.active').attr('id')) + 1;
                    } else if (this.id === 'prev') {
                        desiredPg--;
                        var newActivePageId = parseInt($('div.portfolio-pagination a.active').attr('id')) - 1;
                    }

                    filterItems(desiredPg);

                    $('div.portfolio-pagination a.num').removeClass('active');
                    $('div.portfolio-pagination a#' + newActivePageId).addClass('active');
                    event.preventDefault();
                });

                function filterItems(desiredPg) {
                    totalItems = $("div.portfolio-item" + visible).length;
                    $("div.portfolio-item").hide();

                    let min = (desiredPg - 1) * itemsPerPage;
                    let max = min + itemsPerPage;

                    currPage = desiredPg;

                    $("div.portfolio-item" + visible).slice(min, max).show();
                }

                //recalculates pages to display, always moves the user back to the first page
                function displayPageNums() {
                    totalItems = $("div.portfolio-item" + visible).length;

                    $( "div.portfolio-pagination" ).empty();
                    if (totalItems / itemsPerPage > 1) {
                        $( "div.portfolio-pagination" ).append("<a href='#' class='portfolio-link action' id='prev'><</a>");
                        for (var i = 1; i <= Math.ceil(totalItems / itemsPerPage); i++) {
                            let isActive = i === 1 ? 'active' : '';
                            var paginationLink = "<a href='#' class='portfolio-link num " + isActive + "' id='" + i + "'>" + i + "</a>";
                            $( "div.portfolio-pagination" ).append( paginationLink );
                        }
                        $( "div.portfolio-pagination" ).append("<a href='#' class='portfolio-link action' id='next'>></span>");
                        filterItems(currPage);
                    }
                }

                displayPageNums();

			});
		</script>
		<?php
	}

}