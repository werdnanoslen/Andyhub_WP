<?php
/**
 * Jetpack Compatibility File
 * See: http://jetpack.me/
 *
 * @package Andyhub_WP
 */

/**
 * Add theme support for Infinite Scroll.
 * See: http://jetpack.me/support/infinite-scroll/
 */
function andyhub_wp_jetpack_setup() {
	add_theme_support( 'infinite-scroll', array(
		'container' => 'main',
		'footer'    => 'page',
	) );
}
add_action( 'after_setup_theme', 'andyhub_wp_jetpack_setup' );
