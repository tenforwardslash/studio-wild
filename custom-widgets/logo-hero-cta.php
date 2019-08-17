<?php
/**
 * Created by PhpStorm.
 * User: sudoguest
 * Date: 2019-08-17
 * Time: 10:54
 */

namespace Elementor;


class Logo_Hero_CTA extends Widget_Base {
    public function get_name() {
        return 'logo-hero-cta';
    }

    public function get_title() {
        return 'Hero Image with Logo and Centered CTA';
    }

    public function get_icon() {
        return 'fa fa-heading';
    }

    public function get_categories() {
        return [ 'basic' ];
    }
    protected function _register_controls() {

        $this->start_controls_section(
            'logo_hero_cta',
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
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'title_typography',
                'label' => __( 'Title Typography', 'elementor' ),
                'selector' => '{{WRAPPER}} .title',
            ]
        );

        $this->add_control(
            'logo',
            [
                'label' => __( 'Logo', 'elementor' ),
                'label_block' => true,
                'type' => Controls_Manager::MEDIA,
                'placeholder' => __( 'Logo to go in top left corner', 'elementor' ),
            ]
        );

        $this->add_control(
            'logo',
            [
                'label' => __( 'Size', 'elementor' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => [ 'px' ],
                'range' => [
                    'px' => [
                        'min' => 50,
                        'max' => 350,
                    ],
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 100,
                ],
            ]
        );
        $this->add_control(
            'background-image',
            [
                'label' => __( 'Background Image', 'elementor' ),
                'label_block' => true,
                'type' => Controls_Manager::MEDIA,
                'placeholder' => __( 'Background IMage', 'elementor' ),
            ]
        );

        $this->add_control(
            'button-link',
            [
                'label' => __( 'Button Link', 'elementor' ),
                'label_block' => true,
                'type' => Controls_Manager::URL,
                'placeholder' => __( 'CTA Link', 'elementor' ),
            ]
        );

        $this->end_controls_section();
    }

    protected function render() {

        $settings = $this->get_settings_for_display();
        error_log('settings----\n' . print_r($settings, true), 0);

    }

    protected function _content_template() {

    }
}