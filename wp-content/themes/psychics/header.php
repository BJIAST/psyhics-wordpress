<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Psychics
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="http://gmpg.org/xfn/11">

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
    <a class="skip-link screen-reader-text" href="#content"><?php esc_html_e('Skip to content', 'psychics'); ?></a>

    <header id="masthead" class="site-header" role="banner">
        <div class="site-branding">
            <div class="wrapper">
                <h1 class="site-logo">
                    <a href="<?php bloginfo('url'); ?>">
                        <?php if (get_theme_mod('theme_logo')) :
                            echo '<img src="' . esc_url(get_theme_mod('theme_logo')) . '">';
                        else:
                            echo get_bloginfo('name') . '<span class="site-description">' . get_bloginfo('description') . '</span>';
                        endif; ?>
                    </a>
                </h1>
                <div class="header-wrapper">
                    <div class="searchform">
                        <?php get_search_form(); ?>
                    </div>
                    <ul>
                        <?php if ( !is_user_logged_in() ) {?>
                        <li><a href="/wp-login.php?action=register">Register</a></li>
                        <li><a href="/wp-login.php">Sign in</a></li>
                        <?php } ?>
                        <li class="joinas"><a href="#">Join as Psychic</a></li>
                    </ul>
                </div>
            </div>
        </div><!-- .site-branding -->

        <nav id="site-navigation" class="main-navigation" role="navigation">
            <div class="container">
                <button class="menu-toggle" aria-controls="primary-menu"
                        aria-expanded="false"><span class="fa fa-bars"></span></button>
                <?php wp_nav_menu(array('theme_location' => 'menu-1', 'menu_id' => 'primary-menu')); ?>
            </div>
        </nav><!-- #site-navigation -->
    </header><!-- #masthead -->

    <div id="content" class="site-content">
