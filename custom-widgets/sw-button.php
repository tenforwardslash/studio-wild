<?php

namespace Elementor;


if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

/**
 * Studio Wild Button
 */
class SW_Button extends Widget_Base {

    public function get_name() {
        return 'sw-button';
    }
    public function get_title() {
        return __( 'Studio Wild Button', 'elementor' );
    }

    public function get_icon() {
        return 'far fa-hand-pointer';
    }

    public function get_categories() {
        return [ 'studio-wild' ];
    }
    protected function _register_controls() {

        $this->start_controls_section(
            'sw-button',
            [
                'label' => __( 'Content', 'elementor' ),
            ]
        );
        $this->add_control(
            'button_text',
            [
                'label' => __( 'Button Text', 'elementor' ),
                'type' => Controls_Manager::TEXTAREA,
                'dynamic' => [
                    'active' => true,
                ],
                'placeholder' => __( 'Enter Button Text', 'elementor' ),
                'default' => __( 'Click Me', 'elementor' ),
            ]
        );
        $this->add_control(
            'link',
            [
                'label' => __( 'Link', 'elementor' ),
                'type' => Controls_Manager::URL,
                'dynamic' => [
                    'active' => true,
                ],
                'placeholder' => __( 'https://your-link.com', 'elementor' ),
                'default' => [
                    'url' => '#',
                ],
            ]
        );
        $this->add_control(
            'button_color',
            [
                'label' => __( 'Color', 'elementor' ),
                'type' => Controls_Manager::COLOR,
                'default' => '#575757',
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

        /**
     * Render button widget output on the frontend.
     *
     * Written in PHP and used to generate the final HTML.
     *
     * @since 1.0.0
     * @access protected
     */
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
        echo "<a " . $this->get_render_attribute_string( 'sw-button' ) . "><button class='sw-button'>$settings[button_text]</button></a>";
    }
}
