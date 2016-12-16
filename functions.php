<?php
/**
 * Andyhub_WP functions and definitions
 *
 * @package Andyhub_WP
 */

 /**
  * Handle empty search parameter ("/?s=") as a search for " "
  */
 if(!is_admin()) {
	add_action('init', 'search_query_fix');
	function search_query_fix() {
		if(isset($_GET['s']) && $_GET['s'] == '') {
			$_GET['s'] = ' ';
		}
	}
}

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 640; /* pixels */
}

if ( ! function_exists( 'andyhub_wp_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function andyhub_wp_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Andyhub_WP, use a find and replace
	 * to change 'andyhub_wp' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'andyhub_wp', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	//add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'andyhub_wp' ),
	) );

	// Enable support for Post Formats.
	add_theme_support( 'post-formats', array( 'aside', 'image', 'video', 'quote', 'link' ) );

	// Setup the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'andyhub_wp_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

	// Enable support for HTML5 markup.
	add_theme_support( 'html5', array( 'comment-list', 'search-form', 'comment-form', ) );

	// Enable custom header image in theme customization menu
	$args = array(
//		'flex-height'   => true,
//		'flex-width'    => true,
//		'height'	=> 960,
//		'width'		=> 960,
		'default-image' => get_template_directory_uri() . '/img/civichero.svg',
	);
	add_theme_support( 'custom-header', $args );

	add_theme_support( 'post-thumbnails' ); 
}
endif; // andyhub_wp_setup
add_action( 'after_setup_theme', 'andyhub_wp_setup' );

/**
 * Register widgetized area and update sidebar with default widgets.
 */
function andyhub_wp_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'andyhub_wp' ),
		'id'            => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
}
add_action( 'widgets_init', 'andyhub_wp_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function andyhub_wp_scripts() {
    $version = filemtime(get_stylesheet_directory() . '/style.css');
	wp_enqueue_style( 'andyhub_wp-style', get_stylesheet_uri(), array(), $version );

	wp_enqueue_script( 'andyhub_wp-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );

	wp_enqueue_script( 'andyhub_wp-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'andyhub_wp_scripts' );

/**
 * Implement the Custom Header feature.
 */
//require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/**
 * Add custom styles to editor
 */
function my_theme_add_editor_styles() {
    add_editor_style( 'custom-editor-style.css' );
}
add_action( 'init', 'my_theme_add_editor_styles' );

/**
 * Add custom fields to RSS feed (andyhub.com/feed)
 */
add_action('rss2_item', 'andyhub_rss2_item');
function andyhub_rss2_item() {
    $fields = array('client', 'dates', 'excerpt_image', 'url');
    $post_id = get_the_ID();
    foreach($fields as $field) {
        if ($value = get_post_meta($post_id, $field, true)) {
            echo "<{$field}>{$value}</{$field}>\n";
        }
    }
}
