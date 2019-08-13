<?php

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
        add_action( 'elementor/widgets/widgets_registered', [ $this, 'register_widgets' ] );
    }

    public function register_widgets() {
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor\Iconed_Title() );
    }

}

add_action( 'init', 'sw_elementor_init' );
function sw_elementor_init() {
    SW_Elementor_Widgets::get_instance();
}