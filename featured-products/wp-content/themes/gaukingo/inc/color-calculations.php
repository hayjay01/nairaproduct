<?php
/**
 * Various helper functions for conditional styles and color modifications.
 *
 * These functions are generic; they can be used for color calculations 
 * unrelated to the Custom Highlight Color plugin (note that they are dependent
 * on each other). Update this notice when using this file for other projects.
 *
 * Search and replace custom_highlight_color with your prefix when reusing.
 *
 * This file is identical to that bundled with the Fourteen Colors plugin, and was originally developed for that project.
 *
 * @package Gaukingo
 * @since gaukingo 1.0.6
 *

=====================================================================================
Copyright (C) 2016 Nick Halsey

This program is free software; you can redistribute it and/or
modify it under the terms of the GNU General Public License
as published by the Free Software Foundation; either version 2
of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with WordPress; if not, write to the Free Software
Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.
=====================================================================================
*/

/**
 * Convert 3- or 6-digit Hex to RGB.
 *
 * @since custom_highlight_color 1.0
 *
 * @param string $color The color, in 3- or 6-digit hexadecimal form.
 * @return array $rgb The color, in an array( r, g, b )
 */
function gaukingo_hex2rgb( $color ) {
	// Convert shorthand to full hex.
	if ( strlen( $color ) == 4 ) {
		$color = '#'.str_repeat( substr( $color, 1, 1 ), 2 ) . str_repeat( substr( $color, 2, 1 ), 2 ) . str_repeat( substr( $color, 3, 1), 2 );
	}

	// Convert hex to rgb.
	$rgb = array( hexdec( substr( $color, 1, 2 ) ), hexdec( substr( $color, 3, 2 ) ), hexdec( substr( $color, 5, 2 ) ) );

	return $rgb;
}
/**
 * A helper function to keep the rgb values between 0 and 255.
 */
function gaukingo_limit_value( $value ) {
	if ( $value > 255 ) {
		$value = 255;
	} elseif ( $value < 0 ) {
		$value = 0;
	}
	return $value;
}

/**
 * Tweak the brightness of a color by adjusting the RGB values by the given interval.
 *
 * Use positive values of $steps to brighten the color and negative values to darken the color.
 * In the original funcion all three RGB values were modified by the specified steps, within the range of 0-255. The hue
 * was generally maintained unless the number of steps causes one value to be capped at 0 or 255.
 * In this version we adjust the color trying to preserve their dominant hue. In case the color is dark we change most the RGB components
 * with the highest value, if the color is light, we change most the RGB components with the lowest values. We define a color as 
 * dark if the contrast with white is higher than 4.5, i.e. its relative luminance is lower than 0.1733.
 *
 * @since custom_highlight_color 1.0 and Gaukingo 1.0.7
 *
 * @param string $color The original color, in 3- or 6-digit hexadecimal form.
 * @param int $steps The number of steps to adjust the color by, in RGB units.
 * @return string $color The new color, in 6-digit hexadecimal form.
 */

function gaukingo_adjust_color( $color, $steps ) {
	// Convert hex string to rgb array.
	$rgb = gaukingo_hex2rgb( $color );
	
	// Calculate luminance. 
	$luminance = gaukingo_relative_luminance($color);

	if ( $luminance <= 0.1732 ) {
		$rgb_value = max( $rgb );
		$steps_dominant = $steps;
		$steps_others = round( $steps/1.1);

	} elseif ( 0.1732 < $luminance && $luminance <= 0.3240 ) {
		$rgb_value = max( $rgb );
		if ($steps > 0) {
			$steps_dominant = $steps;
			$steps_others = round( $steps / 1.2);
		} else {
			$steps_dominant = round( $steps / 2);;
			$steps_others = $steps;
		}

	} else {
		$rgb_value = min( $rgb );
		$steps_dominant = $steps;
		$steps_others = round( $steps / 1.2);
	}

	// Adjust color and switch back to 6-digit hex.
	$hex = '#';

	foreach ( $rgb as $value ) {
		if ( $value === $rgb_value ) {
			$value += $steps_dominant;
			$value = gaukingo_limit_value($value);
			
		} else {
			$value += $steps_others;
			$value = gaukingo_limit_value($value);
		}

		$hex .= str_pad( dechex( $value ), 2, '0', STR_PAD_LEFT );
	}


	return $hex;
}

/**
 * Calculate the relative luminance of a hex color.
 *
 * Used to determine color contrast and to determine appropriate color
 * patterns given different contexts.
 *
 * Officially, the relative brightness of any point in a colorspace, 
 * normalized to 0 for darkest black and 1 for lightest white.
 *
 * @since custom_highlight_color 1.0
 * @link http://www.w3.org/TR/2008/REC-WCAG20-20081211/#relativeluminancedef
 *
 * @param string $color The color, in 3- or 6-digit hexadecimal form.
 * @return float $luminance The relative luminance of the color, as a decimal between 0 and 1.
 */
function gaukingo_relative_luminance( $color ) {
	// Convert hex string to rgb array.
	$rgb = gaukingo_hex2rgb( $color );

	// Calculate luminance.
	$sRGB = array( $rgb[0] / 255, $rgb[1] / 255, $rgb[2] / 255 );

	$R = ( $sRGB[0] <= 0.03928 ? $sRGB[0] / 12.92 : pow( ( $sRGB[0] + 0.055 ) / (1.055), 2.4 ) );
	$G = ( $sRGB[1] <= 0.03928 ? $sRGB[1] / 12.92 : pow( ( $sRGB[1] + 0.055 ) / (1.055), 2.4 ) );
	$B = ( $sRGB[2] <= 0.03928 ? $sRGB[2] / 12.92 : pow( ( $sRGB[2] + 0.055 ) / (1.055), 2.4 ) );
	
	$luminance = 0.2126 * $R + 0.7152 * $G + 0.0722 * $B;

	return $luminance;
}

/**
 * Calculate the Web Content Accessibility Guidelines (WCAG) 2.0 contrast ratio of two colors.
 *
 * Text and background colors can be passed to the function in either order. The 
 * lighter and darker color are automatically determined by the function.
 *
 * @since custom_highlight_color 1.0
 * @link http://www.w3.org/TR/UNDERSTANDING-WCAG20/visual-audio-contrast-contrast.html#contrast-ratiodef
 *
 * @param string $color1 The background or text color, in 3- or 6-digit hexadecimal form.
 * @param string $color2 The text or background color, in 3- or 6-digit hexadecimal form.
 * @return float $ratio The contrast ratio, as $ratio:1, which ranges from 1 to 21.
 */
function gaukingo_contrast_ratio( $color1, $color2 ) {
	// Calculate relative luminance of each color.

	$l1 = gaukingo_relative_luminance( $color1 );
	$l2 = gaukingo_relative_luminance( $color2 );
	
	// Determine the larger color and re-order if necessary.
	if ( $l1 < $l2 ) {
		$l_ = $l1;
		$l1 = $l2;
		$l2 = $l_;
	}

	// Calculate contrast ratio.
	$ratio = ( $l1 + 0.05 ) / ( $l2 + 0.05 );
	return $ratio;
}

/**
 * Returns several arrays of colors that will serve to choose the colors that will comply with the Web Content Accessibility Guidelines (WCAG) 2.0
 * regarding contrast ratio of two colors. We need to take into account the fact that there is a luminance area between 0.1736 and 0.3240 where no color
 * contrasts enough neither with #fafafa nor with #333333, my chosen white and black colors.
 * 
 * @since Gaukingo 1.0.7
 * @link http://www.w3.org/TR/UNDERSTANDING-WCAG20/visual-audio-contrast-contrast.html#contrast-ratiodef
 *
 * @param string $color The color, in 3- or 6-digit hexadecimal form.
 * @return array $colors A nice and useful array of colors.
 */

function gaukingo_give_me_a_nice_array_of_colors( $color ) {

	$steps_super_dark 	= 	array( 176, 64, 48, 32, 16 ); //OK
	$steps_very_dark 	= 	array( 176, 64, 36, 28, 8 );
	$steps_dark 		= 	array( 100, -64, -48, -32, -16 );
	$steps_dark_medium 	= 	array(-172, -124, -96, -64, -32 );
	$steps_light_medium = 	array(-192, -152, -124, -96, -64 );
	$steps_light 		= 	array(-192, -152, -124, -96, 32 );
	$steps_very_light 	= 	array(-192, -176, -144, -116, -32 );
	$steps_super_light 	= 	array(-224, -214, -192, -168, -64 );
	
	$rgb = gaukingo_hex2rgb( $color );

	$luminance_color = gaukingo_relative_luminance( $color );
	
	if ( $luminance_color <= 0.03955 ) {
		$steps = $steps_super_dark;
	} elseif ( 0.03955 < $luminance_color && $luminance_color <= 0.07216 ) {
		$steps = $steps_very_dark;
	} elseif ( 0.07216 < $luminance_color && $luminance_color <= 0.1732 ) {
		$steps = $steps_dark;
	} elseif ( 0.1732 < $luminance_color && $luminance_color <= 0.2423 ) {
		$steps = $steps_dark_medium;
	} elseif ( 0.2423 < $luminance_color && $luminance_color <= 0.324 ) {
		$steps = $steps_light_medium;
	} elseif ( 0.324 < $luminance_color && $luminance_color <= 0.54977 ) {
		$steps = $steps_light;
	} elseif ( 0.54977 < $luminance_color && $luminance_color <= 0.74993 ) {
		$steps = $steps_very_light;
	} else {
		$steps = $steps_super_light;
	}
	
	$colors = array();

	foreach ($steps as $step) {
		$colors[] = gaukingo_adjust_color($color, $step);
	}

	return $colors;
}


