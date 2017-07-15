<?php
/**
 * The default template for displaying content
 *
 * Used for index/archive/search.
 *
 * @package Gaukingo
 * @since Gaukingo 1.0.6
 */
?>

<div class="post-box">

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> >
	<header class="entry-header">

	<div class="entry-meta">
			<?php
				// Translators: used between list items, there is a space after the comma.
				$categories_list = get_the_category_list( __( ', ', 'gaukingo' ) );
				if ( $categories_list ) {
					echo '<span class="cat-links"><span class="genericon genericon-category" aria-hidden="true"></span>' . $categories_list . '</span>';
				}
			?>
	</div><!-- .entry-meta -->
	
	<?php		
		the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' );
	?>

	<?php if ( is_sticky() && is_home() && ! is_paged() ) {
			echo '<span class="featured-post"><span class="genericon genericon-pinned" aria-hidden="true"></span><span class="screen-reader-text">' . __( 'Featured', 'gaukingo' ) . '</span></span>';
		}
	?>
	<div class="entry-meta">
		<?php
			$format = get_post_format(); // Esto lo voy a usar cuando le de un estilo especial a cada formato.
			$format_link = get_post_format_link($format);
			if ($format):			
				printf('<a href="%1$s" class="post-format"><span class="genericon genericon-%2$s" aria-hidden="true"></span>%2$s</a>', esc_url( $format_link ) , $format );			
			endif;
		?>

		<span class="byline">
			<?php
				if ( 'post' == get_post_type() ) {
				print(__('By', 'gaukingo'));
				printf( '<a href="%1$s" rel="author"><span class="genericon genericon-user" aria-hidden="true"></span>%2$s</a>',
				esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
				get_the_author() );
				}
			?>
		</span><!--.byline -->
		<?php edit_post_link('<span class="genericon genericon-edit" aria-hidden="true"></span>'. __('Edit', 'gaukingo') ) ?>
	</div><!-- .entry-meta -->
	</header><!-- .entry-header -->

	<div class="post-thumbnail">
		<?php if ( has_post_thumbnail() && ! has_post_format( array( 'image', 'video', 'gallery' ) ) ) : ?>
			<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
        	<?php the_post_thumbnail(); ?>
    		</a>
		<?php endif; ?>
	</div><!-- post-thumbnail -->

	<div class="entry-content">
		<?php
		/* Translators: %s: Name of current post */
		the_excerpt();
		?>
	</div><!-- .entry-content -->

<?php gaukingo_entry_footer(); ?>

</article><!-- #post-## -->

</div>

