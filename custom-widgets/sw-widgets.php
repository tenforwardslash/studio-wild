<?php

// todo: swap to creating a full on elementor extension plugin, this whole folder doesn't really belong in a theme
//  https://developers.elementor.com/creating-an-extension-for-elementor/

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}


class SW_Elementor_Widgets {

    protected static $instance = null;

    public static function get_instance() {
        if ( ! isset( static::$instance ) ) {
            static::$instance = new static;
        }

        return static::$instance;
    }

    protected function __construct() {
        require_once('iconed-title.php');
        require_once('logo-hero-cta.php');
        require_once('hero.php');
        require_once('text-carousel.php');
	    require_once('portfolio-category.php');
	    require_once('portfolio-overview.php');
	    require_once('sw-button.php');
        require_once('hideable-text.php');
        require_once('full-height-hero-title-blurb.php');

        add_action( 'elementor/frontend/after_enqueue_styles', [ $this, 'widget_styles' ] );
        add_action( 'elementor/frontend/after_register_scripts', [ $this, 'widget_scripts' ] );
        add_action( 'elementor/widgets/widgets_registered', [ $this, 'register_widgets' ] );

    }

    public function widget_styles() {
        wp_register_style( 'logo-hero-cta',  get_stylesheet_directory_uri() . '/custom-widgets/css/logo-hero-cta.min.css');
        wp_enqueue_style('logo-hero-cta');

    }

    public function widget_scripts() {
        wp_register_script( 'logo-hero-cta-js', get_stylesheet_directory_uri() . '/custom-widgets/js/logo-hero-cta.js', [ 'jquery' ] );
        wp_enqueue_script('logo-hero-cta-js');
    }

    public function register_widgets() {
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor\Iconed_Title() );
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor\Logo_Hero_CTA() );
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor\Hero() );
	    \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor\Text_Carousel() );
	    \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor\Portfolio_Category() );
	    \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor\Portfolio_Overview() );
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor\SW_Button() );
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor\Hideable_Text() );
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor\Hero_Title_Blurb() );
    }

}

add_action( 'init', 'sw_elementor_init' );
function sw_elementor_init() {
    SW_Elementor_Widgets::get_instance();
}