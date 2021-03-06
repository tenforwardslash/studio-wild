<?php
/**
 * Created by PhpStorm.
 * User: sudoguest
 * Date: 2019-08-17
 * Time: 10:54
 */

namespace Elementor;


class Hero extends Widget_Base {
    public function get_name() {
        return 'hero';
    }

    public function get_title() {
        return 'Hero Image with Title';
    }

    public function get_icon() {
        return 'fa fa-heading';
    }

    public function get_categories() {
        return [ 'studio-wild' ];
    }
    protected function _register_controls() {

        $this->start_controls_section(
            'hero',
            [
                'label' => __( 'Content', 'elementor' ),
            ]
        );

        $this->add_control(
            'title',
            [
                'label' => __( 'Title', 'elementor' ),
                'type' => Controls_Manager::TEXTAREA,
                'dynamic' => [
                    'active' => true,
                ],
                'placeholder' => __( 'Enter your title', 'elementor' ),
                'default' => __( 'Add Your Heading Text Here', 'elementor' ),
            ]
        );

	    $this->add_control(
		    'title_css_class',
		    [
			    'label' => __( 'Title CSS Class', 'elementor' ),
			    'type' => Controls_Manager::TEXT,
			    'description' => __( 'An optional CSS class to apply to the title text', 'elementor' ),
		    ]
	    );

        // todo: add to all widgets
//        $this->add_control(
//            'disable_typography_defaults',
//            [
//                'label' => __( 'Disable Studio Wild Typography Defaults', 'elementor' ),
//                'type' => Controls_Manager::SWITCHER,
//            ]
//        );
//        $this->add_group_control(
//            Group_Control_Typography::get_type(),
//            [
//                'name' => 'title_typography',
//                'label' => __( 'Title Typography (only if above Defaults disabled)', 'elementor' ),
//                'selector' => '{{WRAPPER}} .hero-title-header',
//            ]
//        );
        $this->add_responsive_control(
            'title-max-width',
            [
                'label' => __( 'Title Maximum Width', 'elementor' ),
                'type' => Controls_Manager::SLIDER,
                'range' => [
                    '%' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                    'px' => [
                        'min' => 0,
                        'max' => 500,
                    ],
                ],
                'size_units' => [ 'px', '%' ],
                'devices' => [ 'desktop', 'tablet', 'mobile' ],
                'desktop_default' => [ 'unit' => '%', 'size' => '55' ],
                'tablet_default' => [ 'unit' => '%', 'size' => '75' ],
                'mobile_default' => [ 'unit' => '%', 'size' => '100' ],
                'selectors' => [
                    '{{WRAPPER}} .hero-title' => 'max-width: {{SIZE}}{{UNIT}}',
                ],
            ]

        );
        $this->add_responsive_control(
            'title_position',
            [
                'label' => __( 'Title Position', 'elementor' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px' ],
                'allowed_dimensions' => ['bottom', 'left'],
                'default' => [ 'bottom' => '10', 'left' => '10', 'isLinked' => true, 'unit' => 'px' ],
                'devices' => [ 'desktop', 'tablet', 'mobile' ],
                'desktop_default' => [ 'bottom' => '75', 'left' => '75', 'isLinked' => true, 'unit' => 'px' ],
                'tablet_default' => [ 'bottom' => '45', 'left' => '45', 'isLinked' => true, 'unit' => 'px' ],
                'mobile_default' => [ 'bottom' => '25', 'left' => '25', 'isLinked' => true, 'unit' => 'px' ],
                'selectors' => [
                    '{{WRAPPER}} .hero-title' => 'position:absolute; bottom: {{BOTTOM}}{{UNIT}}; left:{{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'background',
                'label' => __( 'Background', 'elementor' ),
                'types' => [ 'classic', 'gradient', 'video' ],
                'selector' => '{{WRAPPER}} .hero-wrap',
            ]
        );

        $this->end_controls_section();
    }

    protected function render() {

        $settings = $this->get_settings_for_display();
        error_log(print_r($settings['button_link'], true), 0);
//        $header_class = $settings['disable_typography_defaults'] == true ? 'hero-title-header' : 'sw-main-headline';
        // todo: should we be checking to see if the navbar is gonna roll down or not?
        echo "<div class='full-window-height-with-navbar hero-wrap' style='position: relative;'>
            <div class='hero-title $settings[title_css_class]'>
                <h1 class='sk-text-dark'>$settings[title]</h1>
            </div>
        </div>";

    }

    protected function _content_template() {

    }
}