<?php
/**
 * Gaukingo customization 
 *
 * @package Gaukingo
 * @since Gaukingo 1.0.6
 */

/**
 * Implement Customizer additions and adjustments.
 *
 * @since Gaukingo 1.0.6
 *
 * @param WP_Customize_Manager $wp_customize Customizer object.
 */

function gaukingo_customize_register ($wp_customize) {

    $blog_navigation_array = array(
        'navigation' => __('Navigation', 'gaukingo'),
        'pagination' => __('Pagination', 'gaukingo'),
    );

/**
* Removes the control for displaying or not the header text and adds the posibility of displaying the site title and tagline separately. */

//===============================
$wp_customize->remove_control('display_header_text');

//===============================
$wp_customize->add_setting('gaukingo_theme_options[show_site_title]', array(
    'default'           => 1,
    'sanitize_callback' => 'absint',
    'capability'        => 'edit_theme_options',
    'type'           => 'option',
));

$wp_customize->add_control( 'show_site_title', array(
    'label'    => __('Display Site Title', 'gaukingo'),
    'section'  => 'title_tagline',
    'settings' => 'gaukingo_theme_options[show_site_title]',
    'type' => 'checkbox',
));
//===============================
$wp_customize->add_setting( 'gaukingo_theme_options[show_site_description]', array(
    'default'        => 1,
    'sanitize_callback' => 'absint',
    'capability'     => 'edit_theme_options',
    'type'           => 'option',
));

$wp_customize->add_control('show_site_description', array(
    'label'      => __('Display Tagline', 'gaukingo'),
    'section'    => 'title_tagline',
    'settings'   => 'gaukingo_theme_options[show_site_description]',
    'type' => 'checkbox',
));

//  ==============================
//  ==     Colors Section       ==
//  ==============================

$wp_customize->get_control( 'header_textcolor' )->description = __('Changing this color will change the accent color of the theme.', 'gaukingo');

$wp_customize->add_setting( 'gaukingo_theme_options[sidebar_background_color]', array(
    'default'        => '#eeeeee',
    'sanitize_callback' => 'sanitize_hex_color',
    'capability'     => 'edit_theme_options',
    'type'           => 'option',
));

$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'sidebar_background_color', array(
    'label'      => __('Sidebar Background Color', 'gaukingo'),
    'section'    => 'colors',
    'settings'   => 'gaukingo_theme_options[sidebar_background_color]',
)));

//  =============================
//  ==   Navigation Section    ==
//  ============================= 
$wp_customize->add_section( 'navigation', array(
    'title'          => __( 'Navigation Settings', 'gaukingo' ),
    'description' => __( 'This section adds the possibility of choosing between navigation or pagination in multiple view pages.', 'gaukingo'),
) );

//===============================
 $wp_customize->add_setting('gaukingo_theme_options[blog_navigation]', array(
    'default'        => 'navigation',
    'sanitize_callback' => 'gaukingo_sanitize_blog_nav',
    'capability'     => 'edit_theme_options',
    'type'           => 'option', 
));

$wp_customize->add_control( 'blog_navigation', array(
    'label'   => __('Choose your preferred mode of navigating between old and new articles','gaukingo'),
    'section' => 'navigation',
    'settings' => 'gaukingo_theme_options[blog_navigation]',
    'type'    => 'radio',
    'choices'    => $blog_navigation_array,
));

}
add_action( 'customize_register', 'gaukingo_customize_register' );

/**
 * Sanitization for navigation choice
 */
function gaukingo_sanitize_blog_nav( $value ) {
    $recognized = gaukingo_blog_nav();
    if ( array_key_exists( $value, $recognized ) ) {
        return $value;
    }
    return apply_filters( 'gaukingo_blog_nav', current( $recognized ) );
}

function gaukingo_blog_nav() {
    $default = array(
        'navigation' => 'navigation',
        'pagination' => 'pagination',
    );
    return apply_filters( 'gaukingo_blog_nav', $default );
}

function gaukingo_get_option_defaults() {
	$defaults = array(
		'show_site_title' => 1,
		'show_site_description' => 1,
        'sidebar_background_color' => '#eeeeee',
        'blog_navigation' => 'pagination',
		
	);
	return apply_filters( 'gaukingo_get_option_defaults', $defaults );
}

function gaukingo_get_options() {
    // Options API
    return wp_parse_args( 
        get_option( 'gaukingo_theme_options', array() ), 
        gaukingo_get_option_defaults() 
    );
}


