<?php
/**
 * The template for displaying header
 *
 * This is the template that displays all of the <head> section, opens the <body> tag and adds the site's header.
 *
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<header class="<?= is_front_page() ? 'tastyheader' : ''?> very-sticky sw-header">
    <nav class="site-navigation" role="navigation">
        <?php wp_nav_menu( array( 'theme_location' => 'menu-1' ) ); ?>
        <input class="menu-btn" type="checkbox" id="menu-btn" />
        <label class="menu-icon" for="menu-btn"><span class="navicon"></span></label>
    </nav>
    <progress value="0" id="progressBar">
        <div class="progress-container">
            <span class="progress-bar"></span>
        </div>
    </progress>
</header>