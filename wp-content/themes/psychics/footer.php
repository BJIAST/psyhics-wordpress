<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Psychics
 */

?>
<div class="certificates">
    <ul>
        <li><a href="#" class="norton"></a></li>
        <li><a href="#" class="action"></a></li>
        <li><a href="#" class="truste"></a></li>
    </ul>
</div>
</div><!-- #content -->

<footer id="colophon" class="site-footer" role="contentinfo">
    <div class="wrapper">
        <div class="footer-menu">
            <nav class="footer-navigation">
                <?php wp_nav_menu(array('theme_location' => 'menu-2', 'menu_id' => 'footer-menu')); ?>
            </nav><!-- #site-navigation -->
            <div class="social-icons-wrapper">
                <?php social_media_icons() ?>
            </div>
        </div>
    </div>
    <div class="payments">
        <div class="wrapper">
            <ul>
                <li><a href="#" class="visa"></a></li>
                <li><a href="#" class="mastercard"></a></li>
                <li><a href="#" class="descover"></a></li>
                <li><a href="#" class="amer-express"></a></li>
                <li><a href="#" class="paypal"></a></li>
            </ul>
        </div>
    </div>
</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
