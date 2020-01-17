<?php
/**
 * Created by PhpStorm.
 * User: Jessi
 * Date: 2019-08-21
 * Time: 16:10
 */
//get_stylesheet_directory_uri() . '/assets/images/trees-footer.svg' )


if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}
?>
<footer id="site-footer" class="site-footer" role="contentinfo" style="background-image: url(<?= get_stylesheet_directory_uri() . '/assets/images/trees-footer.svg' ?>); background-color: <?= get_field('footer_background_color')?>">
    <nav class="footer-navigation" role="navigation">
        <?php wp_nav_menu( array( 'menu' => 'Footer' ) ); ?>
    </nav>
    <div class="footer-logo-container">
        <img id="footer-logo" src="<?= get_stylesheet_directory_uri() . '/assets/images/StudioWild_Logo_820x440_White@2x.png'?>" />
    </div>
</footer>