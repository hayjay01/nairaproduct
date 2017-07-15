<?php
/**
 * The template for displaying Author bios
 *
 * @package Gaukingo
 * @since Gaukingo 1.0.6
 */
?>

<div class="author-bio">
		<?php
		/**
		 * Filter the author bio avatar size.
		 * @since Gaukingo 1.0.6
		 * @param int $size The avatar height and width size in pixels.
		 */
		$author_bio_avatar_size = apply_filters( 'gaukingo_author_bio_avatar_size', 72 );
		?>

<?php 
	if (is_single() || ! is_archive()):
		printf( '<h3><a href="%1$s" rel="author">%2$s %3$s</a></h3>',
				esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
				// Translators: there is a space after "About".
				__('About ','gaukingo'),
				get_the_author() );
	else:
		printf( '<h1> %1$s %2$s </h1>', __('About ', 'gaukingo'), get_the_author());
		endif;
?>		
		
		
		<?php
			echo get_avatar( get_the_author_meta( 'user_email' ), $author_bio_avatar_size );
				if ( get_the_author_meta( 'description' ) ) :
					printf('<p class="author-description">%1$s</p>', get_the_author_meta( 'description' ) );
				endif;
			?>
		
</div><!-- .author-bio -->

