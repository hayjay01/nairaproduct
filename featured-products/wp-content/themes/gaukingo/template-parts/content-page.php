<?php
/**
 * The template used for displaying page content
 *
 * @package Gaukingo
 * @since Gaukingo 1.0.6
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<header class="entry-header">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
		<?php edit_post_link('<span class="genericon genericon-edit" aria-hidden="true"></span>'. __('Edit', 'gaukingo'), '<span class="entry-meta">', '</span>' ); ?>
	</header><!-- .entry-header -->

<?php if ( has_post_thumbnail() ) : ?>
		<div class="page-thumbnail">
			<?php the_post_thumbnail(); ?>
		</div><!-- .page-thumbnail -->
<?php endif; ?>

	<div class="entry-content">
		<?php the_content(); ?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php
			wp_link_pages( array(
				'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'gaukingo' ) . '</span>',
				'after'       => '</div>',
				'link_before' => '<span>',
				'link_after'  => '</span>',
				'pagelink'    => '<span class="screen-reader-text">' . __( 'Page', 'gaukingo' ) . ' </span>%',
			) );

		?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
