<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package Andyhub_WP
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">

	<header class="site-header" role="banner">
        <div id="masthead">
            <div class="site-title">
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
                    <?php bloginfo( 'name' ); ?>
                </a>
            </div>
            <nav id="site-navigation" class="main-navigation" role="navigation">
                <h1 class="menu-toggle"><?php _e( '&#8803;', 'andyhub_wp' ); ?></h1>
                <a class="skip-link screen-reader-text" href="#content">
                    <?php _e( 'Skip to content', 'andyhub_wp' ); ?>
                </a>

                <?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
            </nav><!-- #site-navigation -->
        </div><!-- #masthead -->
    </header>

	<div id="content" class="site-content">