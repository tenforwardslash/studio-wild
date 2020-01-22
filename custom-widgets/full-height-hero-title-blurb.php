<?php
/**
 * Created by PhpStorm.
 * User: sudoguest
 * Date: 2019-08-17
 * Time: 10:54
 */

namespace Elementor;


class Hero_Title_Blurb extends Widget_Base {
    public function get_name() {
        return 'hero-title-blurb';
    }

    public function get_title() {
        return 'Hero Image with Centered Title & Blurb';
    }

    public function get_icon() {
        return 'fa fa-heading';
    }

    public function get_categories() {
        return [ 'studio-wild' ];
    }
    protected function _register_controls() {

        $this->start_controls_section(
            'hero_title_blurb',
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
            'title_size',
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
                'default' => 'h1',
            ]
        );

	    $this->add_control(
		    'header_color',
		    [
			    'label' => __( 'Title Color', 'elementor' ),
			    'type' => Controls_Manager::COLOR,
			    'selectors' => [
				    "{{WRAPPER}} .title" => 'color: {{UNIT}};'
			    ],
		    ]
	    );

        $this->add_responsive_control(
            'title_blurb_spacing',
            [
                'label' => __( 'Spacing between title and blurb', 'elementor' ),
                'type' => Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 150,
                    ],
                ],
                'devices' => [ 'desktop', 'tablet', 'mobile' ],
                'desktop_default' => [
                    'size' => 45,
                    'unit' => 'px',
                ],
                'tablet_default' => [
                    'size' => 35,
                    'unit' => 'px',
                ],
                'mobile_default' => [
                    'size' => 25,
                    'unit' => 'px',
                ],
                'selectors' => [
                    '{{WRAPPER}} .title' => 'margin-bottom: {{SIZE}}{{UNIT}}',
                ],
            ]
        );
        $this->add_responsive_control(
            'title_blurb_margin',
            [
                'label' => __( 'Title and Blurb Container Padding', 'elementor' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ '%', 'px', 'em' ],
                'devices' => [ 'desktop', 'tablet', 'mobile' ],
                'desktop_default' => [
                    'top' => '0',
                    'right' => '15',
                    'bottom' => '0',
                    'left' => '15',
                    'isLinked' => false,
                ],
                'tablet_default' => [
                    'top' => '0',
                    'right' => '10',
                    'bottom' => '0',
                    'left' => '10',
                    'isLinked' => false,
                ],
                'mobile_default' => [
                    'top' => '0',
                    'right' => '5',
                    'bottom' => '0',
                    'left' => '5',
                    'isLinked' => false,
                ],
                'selectors' => [
                    '{{WRAPPER}} .text-wrapper' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
        $this->add_control(
            'blurb',
            [
                'label' => __( 'Blurb', 'elementor' ),
                'type' => Controls_Manager::WYSIWYG,
                'dynamic' => [
                    'active' => true,
                ],
                'placeholder' => __( 'Enter blurb', 'elementor' ),
                'default' => __( 'Add Catchy Blurb Here', 'elementor' ),
            ]
        );

        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();
        $title_tag = $settings['title_size'];
        $blurb_body = $settings['blurb'];
        ?>
        <div class='full-window-height-with-navbar' style="display:flex;align-items: center;justify-content: center;">
            <div class='text-wrapper' style="align-items: center;justify-content: center;">
                <<?= $title_tag ?> class='title sk-text-dark'><?=$settings['title']?></<?= $title_tag ?>>
                <div><?= $blurb_body ?></div>
            </div>
        </div>
        <?php

    }

    protected function _content_template() {

    }
}