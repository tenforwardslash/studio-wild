<?php

namespace Elementor;


if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

/**
 * Studio Wild Button
 */
class Share_Links extends Widget_Base {

    public function get_name() {
        return 'share-links';
    }
    public function get_title() {
        return __( 'Share Links', 'elementor' );
    }

    public function get_icon() {
        return 'far fa-hand-pointer';
    }

    public function get_categories() {
        return [ 'studio-wild' ];
    }
    protected function _register_controls() {

        $this->start_controls_section(
            'share-links',
            [
                'label' => __( 'Content', 'elementor' ),
            ]
        );

        $this->add_control(
            'social_sites',
            [
                'label' => __( 'Social Media Sites to Display' ),
                'type' => Controls_Manager::SELECT2,
                'multiple' => true,
                'options' => [
                    'Facebook' => __('Facebook'),
                    'LinkedIn' => __('LinkedIn'),
                    'Twitter' => __('Twitter')
                ],
                'label_block' => true,
            ]
        );

        $this->add_control(
            'share_text',
            [
                'label' => __( 'Share Text', 'elementor' ),
                'type' => Controls_Manager::TEXT,
                'default' => 'SHARE: '
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'content_typography',
                'label' => __( 'Typography', 'plugin-domain' ),
                'scheme' => Scheme_Typography::TYPOGRAPHY_1,
                'selector' => '{{WRAPPER}} ul.social-share-lists li',
            ]
        );
        $this->add_control(
            'share_colors',
            [
                'label' => __( 'Color', 'elementor' ),
                'type' => Controls_Manager::COLOR,
                'default' => '#DDAE3C',
                'selectors' => [
                    "{{WRAPPER}} .social-share-container, {{WRAPPER}} .social-share-container a" => 'color: {{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'margin_between',
            [
                'label' => __( 'Margin Between Content' ),
                'type' => Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => 5,
                        'max' => 25,
                        'step' => 1
                    ],
                ],
                'default' => [
                    'size' => 20,
                ],
                'selectors' => [
                    '{{WRAPPER}} ul.social-share-lists li:not(:first-child):not(:last-child):after' => 'margin: 0 {{SIZE}}{{UNIT}}; content: "|";',
                    '{{WRAPPER}} ul.social-share-lists li.social-share-text' => 'margin-right: 20px;'
                ]
            ]
        );

        $this->add_control(
            'letter_spacing',
            [
                'label' => __('Letter Spacing'),
                'type' => Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => 1,
                        'max' => 2,
                        'step' => 0.1
                    ],
                ],
                'default' => [
                    'size' => '1.8',
                ],
                'selectors' => [
                    '{{WRAPPER}} .social-share-container li, {{WRAPPER}} .social-share-container li a' => 'letter-spacing: {{SIZE}}{{UNIT}}; text-transform: uppercase;'
                ]
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
        if (sizeof($settings['social_sites']) == 0) {
            return;
        }

        global $post;
        $shareurl = urlencode(get_permalink());

        echo "<div class='social-share-container'><ul class='social-share-lists'><li class='social-share-text'>" . $settings['share_text'] . "</li>";

        foreach ($settings['social_sites'] as $visible_social) {
            $base = null;
            switch ($visible_social) {
                case "Facebook":
                    $base = "https://www.facebook.com/sharer/sharer.php?u=";
                    break;
                case "Twitter":
                    $base = "https://twitter.com/intent/tweet?text=";
                    break;
                case "LinkedIn":
                    $base = "https://www.linkedin.com/shareArticle?mini=true&title=&summary=&source=&url=";
                    break;
                default:
                    error_log("unknown social link, how the hell did this happen? Link: " . $visible_social);
                    break;
            }
            echo "<li><a class='social-share-link' href='$base$shareurl'>$visible_social</a></li>";
        }

        echo "</ul></div>";
    }
}
