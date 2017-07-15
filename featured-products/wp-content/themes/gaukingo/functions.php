<?php
/**
 * Gaukingo functions and definitions
 *
 * Set up the theme and provides some helper functions, which are used in the
 * theme as custom template tags. Others are attached to action and filter
 * hooks in WordPress to change core functionality.
 *
 * When using a child theme you can override certain functions (those wrapped
 * in a function_exists() call) by defining them first in your child theme's
 * functions.php file. The child theme's functions.php file is included before
 * the parent theme's file, so the child theme functions would be used.
 *
 * @link https://codex.wordpress.org/Theme_Development
 * @link https://codex.wordpress.org/Child_Themes
 *
 * Functions that are not pluggable (not wrapped in function_exists()) are
 * instead attached to a filter or action hook.
 *
 * For more information on hooks, actions, and filters,
 * {@link https://codex.wordpress.org/Plugin_API}
 *
 * @package Gaukingo
 * @since Gaukingo 1.0.6
 *
 * @uses gaukingo_header_style() to style front-end.
 */


/**
 * Gaukingo only works in WordPress 4.6 or later.
 */
if ( version_compare( $GLOBALS['wp_version'], '4.6', '<' ) ) {
	require get_template_directory() . '/inc/back-compat.php';
}

if ( ! function_exists( 'gaukingo_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 *
 * @since Gaukingo 1.0.6
 */
function gaukingo_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Gaukingo, use a find and replace
	 * to change 'gaukingo' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'gaukingo', get_template_directory() . '/languages' );

	/**
	 * Set the content width based on the theme's design and stylesheet.
	 *
	 * @since Gaukingo 1.0.6
	 */
	if ( ! isset( $content_width ) ) {
		$content_width = 660;
	}

	// Add theme support for Custom Header
	add_theme_support( 'custom-header', array (
		'default-text-color' => '327070',
		'width' => 1920,
		'height' => 300,
		'wp-head-callback' => 'gaukingo_header_style',
		) );

	// Add theme support for Custom Background
	add_theme_support( 'custom-background', array(
		'default-color' => 'fafafa',
		'default-image' => '',
		) );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * See: https://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 825, 510, true );

	// This theme uses wp_nav_menu() in three locations.
	register_nav_menus( array(
		'main' => __( 'Main Menu',      'gaukingo' ),
		'social'  => __( 'Social Links Menu', 'gaukingo' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'comment-form', 'comment-list', 'gallery', 'caption'
	) );

	/*
	 * Enable support for Post Formats.
	 *
	 * See: https://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside', 'image', 'video', 'quote', 'link', 'gallery', 'status', 'audio', 'chat'
	) );

	/*
	 * This theme styles the visual editor to resemble the theme style,
	 * specifically font, colors, icons, and column width.
	 */
	add_editor_style( array( 'css/editor-style.css', 'genericons/genericons.css', gaukingo_fonts_url() ) );
}
endif; // gaukingo_setup
add_action( 'after_setup_theme', 'gaukingo_setup' );


/**
 * Register widget area.
 *
 * @since Gaukingo 1.0.6
 *
 * @link https://codex.wordpress.org/Function_Reference/register_sidebar
 */
function gaukingo_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'First Sidebar Area', 'gaukingo' ),
		'id'            => 'sidebar-1',
		'description'   => __( 'Add widgets here to appear in your first sidebar.', 'gaukingo' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => __( 'Second Sidebar Area', 'gaukingo' ),
		'id'            => 'sidebar-2',
		'description'   => __( 'Add widgets here to appear in your second sidebar.', 'gaukingo' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => __( 'First Footer Area', 'gaukingo' ),
		'id'            => 'footer-1',
		'description'   => __( 'Add widgets here to appear in your first footer.', 'gaukingo' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => __( 'Second Footer Area', 'gaukingo' ),
		'id'            => 'footer-2',
		'description'   => __( 'Add widgets here to appear in your second footer.', 'gaukingo' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => __( 'Third Footer Area', 'gaukingo' ),
		'id'            => 'footer-3',
		'description'   => __( 'Add widgets here to appear in your third footer.', 'gaukingo' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'gaukingo_widgets_init' );

if ( ! function_exists( 'gaukingo_fonts_url' ) ) :
/**
 * Register Google fonts for Gaukingo.
 *
 * @since Gaukingo 1.0.6
 *
 * @return string Google fonts URL for the theme.
 */
function gaukingo_fonts_url() {
	$fonts_url = '';
	$fonts     = array();
	$subsets   = 'latin,latin-ext';

	/*
	 * Translators: If there are characters in your language that are not supported
	 * by Lato, translate this to 'off'. Do not translate into your own language.
	 */
	if ( 'off' !== _x( 'on', 'Lato font: on or off', 'gaukingo' ) ) {
		$fonts[] = 'Lato:300italic,400italic,700italic,900italic,300,400,700,900';
	}

	/*
	 * Translators: If there are characters in your language that are not supported
	 * by Bitter, translate this to 'off'. Do not translate into your own language.
	 */
	if ( 'off' !== _x( 'on', 'Bitter font: on or off', 'gaukingo' ) ) {
		$fonts[] = 'Bitter:400italic,400,700';
	}

	/*
	 * Translators: If there are characters in your language that are not supported
	 * by Inconsolata, translate this to 'off'. Do not translate into your own language.
	 */
	if ( 'off' !== _x( 'on', 'Inconsolata font: on or off', 'gaukingo' ) ) {
		$fonts[] = 'Inconsolata:400,700';
	}

	/*
	 * Translators: If there are characters in your language that are not supported
	 * by Happy Monkey, translate this to 'off'. Do not translate into your own language.
	 */
	if ( 'off' !== _x( 'on', 'Happy Monkey font: on or off', 'gaukingo' ) ) {
		$fonts[] = 'Happy Monkey:400';
	}

	/*
	 * Translators: If there are characters in your language that are not supported
	 * by Orbitron, translate this to 'off'. Do not translate into your own language.
	 */
	if ( 'off' !== _x( 'on', 'Orbitron font: on or off', 'gaukingo' ) ) {
		$fonts[] = 'Orbitron:400,500,700';
	}

	/*
	 * Translators: If there are characters in your language that are not supported
	 * by Aldrich, translate this to 'off'. Do not translate into your own language.
	 */
	if ( 'off' !== _x( 'on', 'Aldrich font: on or off', 'gaukingo' ) ) {
		$fonts[] = 'Aldrich:400,500,700';
	}

	/*
	 * Translators: To add an additional character subset specific to your language,
	 * translate this to 'greek', 'cyrillic', 'devanagari' or 'vietnamese'. Do not translate into your own language.
	 */
	$subset = _x( 'no-subset', 'Add new subset (greek, cyrillic, devanagari, vietnamese)', 'gaukingo' );

	if ( 'cyrillic' == $subset ) {
		$subsets .= ',cyrillic,cyrillic-ext';
	} elseif ( 'greek' == $subset ) {
		$subsets .= ',greek,greek-ext';
	} elseif ( 'devanagari' == $subset ) {
		$subsets .= ',devanagari';
	} elseif ( 'vietnamese' == $subset ) {
		$subsets .= ',vietnamese';
	}

	if ( $fonts ) {
		$fonts_url = add_query_arg( array(
			'family' => urlencode( implode( '|', $fonts ) ),
			'subset' => urlencode( $subsets ),
		), 'https://fonts.googleapis.com/css' );
	}

	return $fonts_url;
}
endif;

/**
 * Enqueue scripts and styles for the front end.
 *
 * @since Gaukingo 1.0.6
 */
function gaukingo_scripts() {
	// Add custom fonts, used in the main stylesheet.
	wp_enqueue_style( 'gaukingo-fonts', gaukingo_fonts_url(), array(), null );

	// Add Genericons font, used in the main stylesheet.
	wp_enqueue_style( 'genericons', get_template_directory_uri() . '/genericons/genericons.css', array(), '3.4.1' );

	// Load our main stylesheet.
	wp_enqueue_style( 'gaukingo-style', get_stylesheet_uri() );

	// Load the JavaScript functions
	wp_enqueue_script( 'gaukingo-script', get_template_directory_uri() . '/js/functions.js', array( 'jquery' ), '20150315', true );
	wp_enqueue_script( 'jquery-masonry', '', array( 'jquery' ) );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	wp_localize_script( 'gaukingo-script', 'gaukingoScreenReaderText', array(
		'expand'   =>  __( 'expand child menu', 'gaukingo' ),
		'collapse' =>  __( 'collapse child menu', 'gaukingo' ),
	) );
}
add_action( 'wp_enqueue_scripts', 'gaukingo_scripts' );

/**
 * Adds custom classes to the array of body classes.
 *
 * @since Gaukingo 1.0.6
 *
 * @param array $classes Classes for the body element.
 * @return array (Maybe) filtered body classes.
 */
function gaukingo_body_classes( $classes ) {
	// Adds a class of custom-background-image to sites with a custom background image.
	if ( get_background_image() ) {
		$classes[] = 'custom-background-image';
	}

	// Adds a class of group-blog to sites with more than 1 published author.
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	// Adds a class of no-sidebar to sites without active sidebar.
	if ( ! is_active_sidebar( 'sidebar-1' )  && ! is_active_sidebar( 'sidebar-2') ) {
		$classes[] = 'no-sidebar';
	}

	return $classes;
}
add_filter( 'body_class', 'gaukingo_body_classes' );


/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';
require get_template_directory() . '/inc/customizer.php';
require get_template_directory() . '/inc/color-calculations.php';
require get_template_directory() . '/inc/custom-style.php';

