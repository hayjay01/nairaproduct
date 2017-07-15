<?php
/**
 * Gaukingo back compat functionality
 *
 * Prevents Gaukingo from running on WordPress versions prior to 4.6,
 * since this theme is not meant to be backward compatible beyond that and
 * relies on many newer functions and markup changes introduced in 4.6.
 *
 * @package Gaukingo
 * @since Gaukingo 1.0.6
 */

/**
 * Prevent switching to Gaukingo on old versions of WordPress.
 *
 * Switches to the default theme.
 *
 * @since Gaukingo 1.0.6
 */
function gaukingo_switch_theme() {
	switch_theme( WP_DEFAULT_THEME, WP_DEFAULT_THEME );

	unset( $_GET['activated'] );

	add_action( 'admin_notices', 'gaukingo_upgrade_notice' );
}
add_action( 'after_switch_theme', 'gaukingo_switch_theme' );

/**
 * Adds a message for unsuccessful theme switch.
 *
 * Prints an update nag after an unsuccessful attempt to switch to
 * Gaukingo on WordPress versions prior to 4.6.
 *
 * @since Gaukingo 1.0.6
 *
 * @global string $wp_version WordPress version.
 */
function gaukingo_upgrade_notice() {
	$message = sprintf( __( 'Gaukingo requires at least WordPress version 4.6. You are running version %s. Please upgrade and try again.', 'gaukingo' ), $GLOBALS['wp_version'] );
	printf( '<div class="error"><p>%s</p></div>', $message );
}

/**
 * Prevents the Customizer from being loaded on WordPress versions prior to 4.6.
 *
 * @since Gaukingo 1.0.6
 *
 * @global string $wp_version WordPress version.
 */
function gaukingo_customize() {
	wp_die( sprintf( __( 'Gaukingo requires at least WordPress version 4.6. You are running version %s. Please upgrade and try again.', 'gaukingo' ), $GLOBALS['wp_version'] ), '', array(
		'back_link' => true,
	) );
}
add_action( 'load-customize.php', 'gaukingo_customize' );

/**
 * Prevents the Theme Preview from being loaded on WordPress versions prior to 4.6.
 *
 * @since Gaukingo 1.0.6
 *
 * @global string $wp_version WordPress version.
 */
function gaukingo_preview() {
	if ( isset( $_GET['preview'] ) ) {
		wp_die( sprintf( __( 'Gaukingo requires at least WordPress version 4.6. You are running version %s. Please upgrade and try again.', 'gaukingo' ), $GLOBALS['wp_version'] ) );
	}
}
add_action( 'template_redirect', 'gaukingo_preview' );
