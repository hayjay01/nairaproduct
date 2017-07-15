<?php
/**
 * Template for displaying search forms in Gaukingo
 *
 * @package Gaukingo
 * @since Gaukingo 1.0.6
 */
?>

<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<label>
		<span class="screen-reader-text"><?php echo _x( 'Search for:', 'label', 'gaukingo' ); ?></span>
		<input type="search" class="search-field" placeholder="<?php echo esc_attr_x( 'Search', 'placeholder', 'gaukingo' ).' &hellip;'; ?>" value="<?php echo get_search_query(); ?>" name="s"/>
	</label>
	<button type="submit" class="search-submit">
		<span class="genericon genericon-search" aria-hidden="true"></span>
		<span class="screen-reader-text"><?php echo _x( 'Search', 'submit button', 'gaukingo' ); ?></span>
	</button>
</form>

