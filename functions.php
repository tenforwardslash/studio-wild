<?php
/**
 * Created by PhpStorm.
 * User: Jessi
 * Date: 2019-08-13
 * Time: 07:17
 */

/**
 * helper function to set version to when file was last updated, file is assumed to be inside of the /assets folder
 */
function versionize($filepath) {
    return filemtime(get_stylesheet_directory()  . $filepath);
}

function studiowild_enqueue_styles() {

    $parent_style = 'hello-elementor';
    $THEME_STYLE_PATH =  '/style.css';
    $SW_STYLE_PATH = '/studiowild.min.css';
    wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.min.css' );
    wp_enqueue_style( 'child-style',
        get_stylesheet_directory_uri() . $THEME_STYLE_PATH,
        array( $parent_style ),
        versionize($THEME_STYLE_PATH)
    );
    wp_enqueue_style( 'child-sass-styles',
        get_stylesheet_directory_uri() . $SW_STYLE_PATH,
        array( $parent_style ),
        versionize($SW_STYLE_PATH)
    );
}

function studiowild_enqueue_scripts() {
    $NAVBAR_PATH = '/js/navbar.js';
    $TRANSITIONS_PATH = '/js/transitions.js';
    $PARALLAX_PATH = '/js/jquery-parallax.min.js';

    wp_enqueue_script('my-custom-script', get_stylesheet_directory_uri() . $NAVBAR_PATH, array('jquery'), versionize($NAVBAR_PATH), true);
	wp_enqueue_script('transitions', get_stylesheet_directory_uri() . $TRANSITIONS_PATH, array('jquery'), versionize($TRANSITIONS_PATH), true);
	wp_enqueue_script('parallax', get_stylesheet_directory_uri() . $PARALLAX_PATH, array('jquery'), versionize($PARALLAX_PATH), true);
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