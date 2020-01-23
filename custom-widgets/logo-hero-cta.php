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

	    $this->add_control(
		    'header_color',
		    [
			    'label' => __( 'Main Header Color', 'elementor' ),
			    'type' => Controls_Manager::COLOR,
//			    'default' => '#ffffff',
			    'selectors' => [
				    "{{WRAPPER}} .title" => 'color: {{UNIT}};'
			    ],
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
		    'title_css_class',
		    [
			    'label' => __( 'Title CSS Class', 'elementor' ),
			    'type' => Controls_Manager::TEXT,
			    'description' => __( 'An optional CSS class to apply to the main text section (includes button)', 'elementor' ),
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
		    'logo_position',
		    [
			    'label' => __( 'Logo Left Position', 'elementor' ),
			    'type' => Controls_Manager::SLIDER,
			    'range' => [
				    'px' => [
					    'min' => 0,
					    'max' => 500,
				    ],
			    ],
			    'devices' => [ 'desktop', 'tablet', 'mobile' ],
			    'desktop_default' => [
				    'size' => 40,
				    'unit' => 'px',
			    ],
			    'tablet_default' => [
				    'size' => 40,
				    'unit' => 'px',
			    ],
			    'mobile_default' => [
				    'size' => 10,
				    'unit' => 'px',
			    ],
			    'selectors' => [
				    '{{WRAPPER}} .logo-image' => 'left: {{SIZE}}{{UNIT}};',
			    ],
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
        $this->add_responsive_control(
            'image_overlay_height',
            [
                'label' => __( 'Bottom Image Overlay Height', 'elementor' ),
                'type' => Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => 50,
                        'max' => 250,
                    ],
                ],
                'devices' => [ 'desktop', 'tablet', 'mobile' ],
                'desktop_default' => [
                    'size' => 120,
                    'unit' => 'px',
                ],
                'tablet_default' => [
                    'size' => 100,
                    'unit' => 'px',
                ],
                'mobile_default' => [
                    'size' => 100,
                    'unit' => 'px',
                ],
                'selectors' => [
                    '{{WRAPPER}} .img-overlay' => 'height: {{SIZE}}{{UNIT}};',
                ],
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

	    $this->add_responsive_control(
		    'button_margin',
		    [
			    'label' => __( 'Button Margin', 'elementor' ),
			    'type' => Controls_Manager::DIMENSIONS,
			    'size_units' => [ 'px', '%', 'em' ],
			    'devices' => [ 'desktop', 'tablet', 'mobile' ],
			    'desktop_default' => [
				    'top' => '40',
				    'right' => '40',
				    'bottom' => '40',
				    'left' => '40',
				    'isLinked' => true,
			    ],
			    'tablet_default' => [
				    'top' => '20',
				    'right' => '20',
				    'bottom' => '20',
				    'left' => '20',
				    'isLinked' => true,
			    ],
			    'mobile_default' => [
				    'top' => '10',
				    'right' => '10',
				    'bottom' => '10',
				    'left' => '10',
				    'isLinked' => true,
			    ],
			    'selectors' => [
				    '{{WRAPPER}} .sw-button' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
			    ],
		    ]
	    );

        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();
        $logo_url = $settings['logo']['url'];
        $logo_size = $settings['logo_size']['size'] . $settings['logo_size']['unit'];
//        $background_url = $settings['background']['url'];
        if ( ! empty( $settings['button_link']['url'] ) ) {
            $this->add_render_attribute( 'sw-button', 'href', $settings['button_link']['url'] );

            if ( $settings['button_link']['is_external'] ) {
                $this->add_render_attribute( 'sw-button', 'target', '_blank' );
            }

            if ( $settings['button_link']['nofollow'] ) {
                $this->add_render_attribute( 'sw-button', 'rel', 'nofollow' );
            }
        }
        $overlay_url = $settings['image-overlay-bottom']['url'];
        ?>
        <div class='full-window-height logo-hero-cta-wrap' style='position: relative;'>
            <div class='logo-image'>
                <img src='<?= $logo_url?>'/>
            </div>
            <div class='text-wrapper'>
            	<div class='main-text <?=$settings['title_css_class']?>'>
                    <h1 class='title sk-text-dark'><?=$settings['title']?></h1>
                    <a <?= $this->get_render_attribute_string( 'sw-button' )?>><button class='sw-button'><?= $settings['button_text']?> </button></a>
                </div>
                <div class='overlay'>
                    <img class='img-overlay' src='<?= $overlay_url ?>'/>
                </div>
            </div>
        </div>
        <?php

    }

    protected function _content_template() {

    }
}