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
    wp_enqueue_style( 'child-sass-styles',
        get_stylesheet_directory_uri() . '/studiowild.min.css',
        array( $parent_style ),
        wp_get_theme()->get('Version')
    );
}

function studiowild_enqueue_scripts() {
    wp_enqueue_script('my-custom-script', get_stylesheet_directory_uri() .'/js/navbar.js', array('jquery'), null, true);
	wp_enqueue_script('transitions', get_stylesheet_directory_uri() .'/js/transitions.js', array('jquery'), null, true);
}

add_action( 'wp_enqueue_scripts', 'studiowild_enqueue_styles' );
add_action( 'wp_enqueue_scripts', 'studiowild_enqueue_scripts' );

require_once('custom-widgets/sw-widgets.php');

function add_studio_wild_widget_categories( $elements_manager ) {

	$elements_manager->add_category(
		'studio-wild',
		[
			'title' => __( 'Studio Wild Custom', 'SW Elementor Widgets' ),
			'icon' => 'fa fa-plug',
		]
	);

}
add_action( 'elementor/elements/categories_registered', 'add_studio_wild_widget_categories' );