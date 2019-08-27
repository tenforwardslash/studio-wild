<?php
namespace Elementor;
/**
 * Class Iconed_Title
 *
 * Iconed_Title widget creates a header with an image to the left of it
 *
 * @package Elementor
 */
class Iconed_Title extends Widget_Base {

    public function get_name() {
        return 'icon-title';
    }

    public function get_title() {
        return 'Title with Icon';
    }

    public function get_icon() {
        return 'fa fa-heading';
    }

    public function get_categories() {
        return [ 'studio-wild' ];
    }

    protected function _register_controls() {

        $this->start_controls_section(
            'icon_title',
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
            'header_size',
            [
                'label' => __( 'HTML Tag', 'elementor' ),
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
                'name' => 'title_typography',
                'label' => __( 'Title Typography', 'elementor' ),
                'selector' => '{{WRAPPER}} .title',
            ]
        );


        $this->add_control(
            'icon',
            [
                'label' => __( 'Icon', 'elementor' ),
                'label_block' => true,
                'type' => Controls_Manager::MEDIA,
                'placeholder' => __( 'Icon to Precede Header', 'elementor' ),
            ]
        );

        $this->add_control(
            'icon_size',
            [
                'label' => __( 'Size', 'plugin-name' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => [ 'px' ],
                'range' => [
                    'px' => [
                        'min' => 10,
                        'max' => 100,
                    ],
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 20,
                ],
            ]
        );


        $this->end_controls_section();
    }

    protected function render() {

        $settings = $this->get_settings_for_display();
        $icon_url = $settings['icon']['url'];
        $icon_size = $settings['icon_size']['size'] . $settings['icon_size']['unit'];
        $style = "background: center / contain no-repeat url($icon_url);width:$icon_size;height:auto;margin:0 15px 0 0;";
        $header_tag = $settings['header_size'];
        echo "<div style='display:flex'>
                <div style='$style;'></div>
                <$header_tag style='margin-top: 0;margin-bottom:0;' class='title'>$settings[title]</$header_tag>
              </div>";

    }


}