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
<meta property="og:image" content="http://andyhub.com/wordpress/wp-content/themes/Andyhub_WP/site_snapshot.png" />
<?php if (get_the_excerpt() != ''): ?>
<meta name="description" content="<?php echo get_the_excerpt(); ?>">
<meta itemprop="description" content="<?php echo get_the_excerpt(); ?>">
<?php endif; ?>
<?php
$taglist = '';
$posttags = get_the_tags();
if ($posttags) {
    foreach($posttags as $tag) {
        $taglist .= $tag->name . ',';
    }
}
?>
<?php if ($taglist != ''): ?>
<meta name="keywords" content="<?php echo $taglist; ?>">
<?php endif; ?>
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<link rel="author" href="https://plus.google.com/105150930454300390501?rel=author">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<header class="site-header" role="banner">
    <div id="masthead">
        <div class="site-title">
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
                <span id="blog_name"><?php bloginfo( 'name' ); ?></span>
                <span id="blog_description"><?php bloginfo('description'); ?></span>
            </a>
        </div><nav id="site-navigation" class="main-navigation" role="navigation">
            <h1 class="menu-toggle"><?php _e( '&#x2261;', 'andyhub_wp' ); ?></h1>
            <a class="skip-link screen-reader-text" href="#content">
                <?php _e( 'Skip to content', 'andyhub_wp' ); ?>
            </a>

            <?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
        </nav><!-- #site-navigation -->
    </div><!-- #masthead -->
</header>
<div id="page" class="hfeed site">
	<div id="content" class="site-content">
