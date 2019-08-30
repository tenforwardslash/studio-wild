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
        return [ 'studio-wild' ];
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
        $this->add_responsive_control(
            'title-padding',
            [
                'label' => __( 'Title Padding', 'plugin-name' ),
                'type' => Controls_Manager::SLIDER,
                'range' => [
                    '%' => [
                        'min' => 0,
                        'max' => 50,
                    ],
                ],
                'devices' => [ 'desktop', 'tablet', 'mobile' ],
                'desktop_default' => [
                    'size' => 30,
                    'unit' => '%',
                ],
                'tablet_default' => [
                    'size' => 15,
                    'unit' => '%',
                ],
                'mobile_default' => [
                    'size' => 10,
                    'unit' => '%',
                ],
                'selectors' => [
                    '{{WRAPPER}} .title' => 'padding-left: {{SIZE}}{{UNIT}};padding-right: {{SIZE}}{{UNIT}};',
                ],
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

        $this->add_responsive_control(
            'logo_size',
            [
                'label' => __( 'Logo Width', 'elementor' ),
                'type' => Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => 50,
                        'max' => 400,
                    ],
                ],
                'devices' => [ 'desktop', 'tablet', 'mobile' ],
                'desktop_default' => [
                    'size' => 150,
                    'unit' => 'px',
                ],
                'tablet_default' => [
                    'size' => 100,
                    'unit' => 'px',
                ],
                'mobile_default' => [
                    'size' => 50,
                    'unit' => 'px',
                ],
                'selectors' => [
                    '{{WRAPPER}} .logo-image' => 'max-width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_control(
            'image-overlay-bottom',
            [
                'label' => __( 'Bottom Image Overlay', 'elementor' ),
                'label_block' => true,
                'type' => Controls_Manager::MEDIA,
                'placeholder' => __( 'Bottom overlay for background image', 'elementor' ),
            ]
        );
        $this->add_control(
            'button_link',
            [
                'label' => __( 'Button Link', 'elementor' ),
                'label_block' => true,
                'type' => Controls_Manager::URL,
                'placeholder' => __( 'CTA Link', 'elementor' ),
            ]
        );
        $this->add_control(
            'button_text',
            [
                'label' => __( 'Button Text', 'elementor' ),
                'label_block' => true,
                'type' => Controls_Manager::TEXT,
                'placeholder' => __( 'Button Text', 'elementor' ),
            ]
        );

        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();
        $logo_url = $settings['logo']['url'];
        $logo_size = $settings['logo_size']['size'] . $settings['logo_size']['unit'];
//        $background_url = $settings['background']['url'];
        $cta_url = $settings['button_link']['url'];
        $overlay_url = $settings['image-overlay-bottom']['url'];
        error_log(print_r($settings['button_link'], true), 0);
        echo "<div class='full-height logo-hero-cta-wrap' style='position: relative;'>
            <div class='logo-image' style='position: absolute; top: 0; left: 0;'>
                <img src='$logo_url' style='object-fit: cover;'/>
            </div>
            <div style='display:flex;align-items: center;justify-content: center;height: 100%;width: 100%;flex-direction: column;text-align: center'>
            <h1 class='title sw-main-headline' style='color:white;text-shadow: 0px 0px 15px #000000;'>$settings[title]</h1>
            <a href='$cta_url'><button class='sw-button'>$settings[button_text]</button></a>
            <div style='position: absolute; bottom: -20px;'>
                <img src='$overlay_url' style='object-fit: cover;'/>
            </div>
</div>
        </div>";

    }

    protected function _content_template() {

    }
}