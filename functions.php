<?php
/**
 * Created by PhpStorm.
 * User: Jessi
 * Date: 2019-08-13
 * Time: 07:17
 */

function my_theme_enqueue_styles() {

    $parent_style = 'hello-elementor';

    wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.min.css' );
    wp_enqueue_style( 'child-style',
        get_stylesheet_directory_uri() . '/style.css',
        array( $parent_style ),
        wp_get_theme()->get('Version')
    );
}
add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_styles' );

require_once('custom-widgets/sw-widgets.php');