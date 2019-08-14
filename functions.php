<?php
/**
 * Created by PhpStorm.
 * User: Jessi
 * Date: 2019-08-13
 * Time: 07:17
 */

function studiowild_enqueue_styles() {

    $parent_style = 'hello-elementor';

    wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.min.css' );
    wp_enqueue_style( 'child-style',
        get_stylesheet_directory_uri() . '/style.css',
        array( $parent_style ),
        wp_get_theme()->get('Version')
    );
}

function studiowild_enqueue_scripts() {
    wp_enqueue_script('my-custom-script', get_stylesheet_directory_uri() .'/js/navbar.js', array('jquery'), null, true);
}

add_action( 'wp_enqueue_scripts', 'studiowild_enqueue_styles' );
add_action( 'wp_enqueue_scripts', 'studiowild_enqueue_scripts' );
require_once('custom-widgets/sw-widgets.php');