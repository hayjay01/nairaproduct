<?php

/**
 * Gaukingo header styles
 *
 * @package Gaukingo
 * @since Gaukingo 1.0.6
 */

function gaukingo_header_style() {
	if (is_customize_preview()) : ?>

		<style type="text/css" id="gaukingo-preview-css">
			.logged-in #masthead {
				top: 0;
			}
		</style>
<?php
	endif;

	$header_image = get_header_image();
	$text_color   = get_header_textcolor();
	$background_color = get_background_color();
	$gaukingo_theme_options = gaukingo_get_options();

	// If no custom options for header are set, let's bail.
	if (  ! gaukingo_get_options()  )
		return;

	// If we get this far, we have custom styles.
	?>
	<style type="text/css" id="gaukingo-header-css">
<?php

	if ( ! has_custom_logo() ) : ?>
		.home-link {
			display: block;
		} 
<?php else: ?>
		.home-link {
			display:flex;
		}

<?php
	endif;

		if ( ! empty( $header_image ) ) : ?>
		.site-header {
			background: url(<?php header_image(); ?>) no-repeat scroll top;
			background-size: 1920px auto;
		}
	@media (max-width: 767px) {
		.site-header {
			background-size: 768px auto;
		}
	}
	@media (max-width: 359px) {
		.site-header {
			background-size: 360px auto;
		}
	}
<?php 	endif;

		// Has the title been hidden?
		if ( ! gaukingo_get_options()['show_site_title'] ) : ?>
		
		.site-title {
			position: absolute;
			width: 0;
			height: 0;
			clip: rect(1px, 1px, 1px, 1px);
		}

		.site-description {
			padding-top: 3em;
		}

<?php 	endif;

		if ( ! gaukingo_get_options()['show_site_description'] ) : ?>
		
		.site-description {
			position: absolute;
			width: 0;
			height: 0;
			clip: rect(1px, 1px, 1px, 1px);
		} 

<?php 	endif;

		if ( empty( $header_image ) ) : ?>
			.site-header .home-link {
				min-height: 5em;
			}

			@media (max-width: 768px) {
			.site-header .home-link  {
				display: flex;
			align-items: center;
			}
		}
		@media (max-width: 359px) {
			.site-header .home-link  {
				min-height: 0;
			}
		}
<?php endif; ?>
	</style>
<?php
}

function gaukingo_custom_styles() {
	$gaukingo_theme_options = gaukingo_get_options();
	$background_color = '#' .get_background_color();
	$main_color = '#' .get_header_textcolor();
	$sidebar_background_color = $gaukingo_theme_options['sidebar_background_color'];
	$luminance_color = gaukingo_relative_luminance ( $main_color );
	$colors = gaukingo_give_me_a_nice_array_of_colors($main_color);
	$neutral_colors = gaukingo_give_me_a_nice_array_of_colors($background_color);


	if ( $luminance_color <= 0.1732 ) {		/* Dark Color */
		$header_background_color = '#fafafa';
		$description_color = '#333';
		$main_color_adjusted = $main_color;
		$site_title_color = $main_color;
		$site_title_hover_color = $colors[2];
		$menu_font_color = '#fafafa';
		$submenu_font_color = $main_color; ;		
		$submenu_font_hover_color = $menu_font_color;
		$navigation_main_color = $main_color;
		$navigation_hover_color = $colors[3];
		$link_hover_color = $colors[2];

	} elseif ( 0.1732 < $luminance_color && $luminance_color < 0.324 ) {	/* A color that is nor dark nor light */
		$header_background_color = '#fff';
		$description_color = '#000';
		$main_color_adjusted = $colors[4];
		$site_title_color = $main_color_adjusted;
		$site_title_hover_color = $colors[1];
		$menu_font_color = '#fff';
		$submenu_font_color = $main_color_adjusted;
		$submenu_font_hover_color = $menu_font_color;
		$navigation_main_color = $main_color_adjusted;
		$navigation_hover_color = $colors[2];
		$link_hover_color = $colors[1];

	} else {
		$header_background_color = '#333';		/* Light Color */
		$description_color = '#fafafa';
		$main_color_adjusted = $colors[3];
		$site_title_color = $main_color;
		$site_title_hover_color = $colors[4];
		$menu_font_color = '#333';
		$submenu_font_color = $colors[2];
		$submenu_font_hover_color = $description_color;
		$navigation_main_color = $main_color;
		$navigation_hover_color = $colors[3];
		$link_hover_color = $colors[0];
	}

	$css = '';

	$css .= '<style type="text/css" id="gaukingo-custom-css">' . "\n";

	$css .= '

	button,
	button[disabled]:hover,
	button[disabled]:focus,
	input[type="button"],
	input[type="button"][disabled]:hover,
	input[type="button"][disabled]:focus,
	input[type="reset"],
	input[type="reset"][disabled]:hover,
	input[type="reset"][disabled]:focus,
	input[type="submit"],
	input[type="submit"][disabled]:hover,
	input[type="submit"][disabled]:focus {
		background-color:' . esc_attr( $main_color_adjusted ) . ';
	}

	button:hover,
	button:focus,
	input[type="button"]:hover,
	input[type="button"]:focus,
	input[type="reset"]:hover,
	input[type="reset"]:focus,
	input[type="submit"]:hover,
	input[type="submit"]:focus {
		background: ' . esc_attr($link_hover_color) . ';
	}

	input[type="text"]:focus,
	input[type="email"]:focus,
	input[type="url"]:focus,
	input[type="password"]:focus,
	input[type="search"]:focus,
	input[type="tel"]:focus,
	input[type="number"]:focus,
	textarea:focus {
		border-color:' . esc_attr( $main_color_adjusted ) . ';
	}

	header .search-submit {
		color: ' . esc_attr( $navigation_main_color ) . ';
	}

	header .search-form:hover .search-submit,
	header .search-form:focus .search-submit
	header .search-submit:hover,
	header .search-submit:focus {
		background-color: transparent;
		color: ' . esc_attr($site_title_hover_color) . ';
	}

	header .search-form:hover .search-field,
	header .search-form:focus .search-field,
	header .search-field:hover,
	header .search-field:focus {
		border: 1px solid ' . esc_attr($main_color) . ';
		border-radius: 2px;
	}

	.sidebars {
		background-color: ' . esc_attr( $sidebar_background_color ) . ';}

	.site-title {
		color: ' . esc_attr( $site_title_color ) . ';
	}

	.site-title:hover, .site-title:focus {
		color: ' . esc_attr( $site_title_hover_color ) . ';		
	}

	.site-description { 
		color:  ' . esc_attr( $description_color ) . ';
	}

	.entry-title, .entry-title a, a, .more-link, .widget-area a, #social-menu a:hover:before,
	.post-navigation a, .image-navigation a, .logged-in-as a {
		color: ' . esc_attr( $main_color_adjusted ) . ';}

	.site-navigation a {
		color: ' . esc_attr( $navigation_main_color ) . ';}

	.featured-post .genericon {
		color: ' . esc_attr( $main_color_adjusted ) . ';
	}

	.menu-toggle, .menu-toggle:hover, .menu-toggle:focus, .menu-toggle:active {
		border-color:  ' . esc_attr( $main_color ) . ';
	}

	.menu-toggle .genericon {
		color: ' . esc_attr( $main_color ) . ';
	}

	#masthead, #navigation {
		background-color:  ' . esc_attr( $header_background_color ) . ';
	}

	.dropdown-toggle {    
		color: ' . esc_attr( $main_color ) . ';
		background-color: ' . esc_attr( $header_background_color ) . ';
	}

	.dropdown-toggle:hover, .dropdown-toggle:focus {    
		color: ' . esc_attr( $site_title_hover_color ) . ';
	}

	.toggled-on .menu li > ul,
	.toggled-on .menu > li a:hover, .toggled-on .menu > ul a:hover,
	.toggled-on .menu > li a:focus, .toggled-on .menu > ul a:focus {
		background-color:  ' . esc_attr( $header_background_color ) . ';
	}

	.toggled-on .menu > li a:hover, .toggled-on .menu > ul a:hover, .toggled-on .menu > li a:focus, .toggled-on .menu > ul a:focus {
		color: ' . esc_attr( $site_title_hover_color ) . ';
	}

	.toggled-on .social-navigation a:hover {
		color:red;
	}

	a:hover, .entry-title a:hover, .widget-area a:hover, .more-link:hover, #site-info a:hover,
	.post-navigation a:hover, .image-navigation a:hover, .logged-in-as a:hover {
		color: ' . esc_attr( $link_hover_color ) . ';
	}
	
	a:focus, .entry-title a:focus, .widget-area a:focus, .more-link:focus, #site-info a:focus,
	.post-navigation a:focus, .image-navigation a:focus, .logged-in-as a:focus {
		color: ' . esc_attr( $link_hover_color ) . ';
	}

	button, .search-submit, .page-links a, .tag-links a:hover {
		background-color: ' . esc_attr( $main_color ) . ';
	}

	.entry-author a:hover, .entry-date a:hover, .entry-author a:focus, .entry-date a:focus {
    	color: ' . esc_attr( $link_hover_color ) . ';
	}

	.page-links a, .search-field {
		border-color: ' . esc_attr( $main_color ) . ';}

	.page-links a:hover {
		background-color: ' . esc_attr( $link_hover_color ) . ';
		border-color: ' . esc_attr( $link_hover_color ) . ';
	}

	.tag-links a:hover:before {
		border-right-color: ' . esc_attr( $main_color ) . ';
	}

	.pagination .page-numbers, .pagination a:hover, .pagination a:focus { 
		color: ' . esc_attr( $background_color ) . ';
	}

	.pagination .page-numbers {
		background-color: ' . esc_attr( $main_color_adjusted ) . ';
		border: 1px solid ' . esc_attr( $main_color_adjusted ) . ';
	}
	.pagination .dots, .pagination .current, .pagination .prev, .pagination .next {
		color: ' . esc_attr( $main_color_adjusted ) . '; 
		background-color: transparent;
		border: 0;
	}

	.posts-navigation a:hover, .posts-navigation a:focus,
	.pagination a.prev:hover, .pagination a.next:hover,
	.pagination a.prev:focus,.pagination a.next:focus {
		color: ' . esc_attr($link_hover_color) . ';
	}

	.comment a  { 
		color: ' . esc_attr( $main_color_adjusted ) . ';
	}

	.comment a:hover, .comment a:focus  { 
		color: ' . esc_attr( $link_hover_color ) . ';
	}

	.pagination a:hover, .pagination a:focus {
	    background-color: ' . esc_attr($link_hover_color) . ';
	    border: 1px solid ' . esc_attr($link_hover_color) . ';
	}

	#page-footer {
		border-top-color:' . esc_attr( $main_color_adjusted ) . ';
	}

	.widget_calendar tbody a {
		color: ' . esc_attr( $main_color_adjusted ) . ';
	}

	.widget_calendar tbody a:hover, .widget_calendar tbody a:focus {
		background-color: ' . esc_attr($link_hover_color) . ';
	}

	.widget-area .tagcloud a:hover,
	.widget-area .tagcloud a:focus {
		color: ' . esc_attr( $main_color_adjusted ) . ';
		box-shadow: 0px 0px 1px 1px ' . esc_attr($link_hover_color) . ';
	}

	#footer-widget-area {
		background-color: ' . esc_attr( $site_title_hover_color ) . ';
		color: ' . esc_attr( $menu_font_color ) . ';

	}

	#footer-widget-area .widget-title, .footer-widget .wp-caption .wp-caption-text {
		color: ' . esc_attr( $menu_font_color ) . ';
	}

	#footer-widget-area a, #footer-widget-area a:hover, #footer-widget-area a:focus {
		color: ' . esc_attr( $menu_font_color ) . ';
	}

	#footer-widget-area .tagcloud a:hover, #footer-widget-area .tagcloud a:focus {
		color: ' . esc_attr( $main_color_adjusted ) . ';
	}

	#footer-widget-area .widget_calendar tbody a:hover, #footer-widget-area .widget_calendar tbody a:focus {
		color: ' . esc_attr( $main_color_adjusted ) . ';   
	}


	@media (min-width: 881px) {

		#navigation: {
			background-color: transparent;
		}
	
		.main-navigation li:hover > a, .main-navigation li:focus > a {
			background-color: ' . esc_attr( $navigation_main_color ) . ';
		}

		.main-navigation ul a {
			color:' . esc_attr( $navigation_main_color ) . ';
		}

		.main-navigation ul ul a {
			color:' . esc_attr( $submenu_font_color ) . ';
		}

		.site-navigation a:hover, .site-navigation a:focus, .main-navigation li:hover > a, .main-navigation li:focus > a {
			background-color: ' . esc_attr( $navigation_main_color ) . ';  
			color: ' . esc_attr( $menu_font_color ) . ';
			border-radius: 3px;
		}

		.site-navigation ul ul a:hover, .site-navigation ul ul a:focus,
		.main-navigation ul ul a:hover, .main-navigation ul ul a:focus {
			background-color: ' . esc_attr($navigation_hover_color) . ';
			color: ' . esc_attr( $submenu_font_hover_color ) . ';
		}

	} ' ;

	$css .= '</style>';

	echo $css;

}

add_action('wp_head','gaukingo_custom_styles');


