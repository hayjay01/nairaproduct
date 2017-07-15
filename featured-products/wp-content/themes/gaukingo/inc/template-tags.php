<?php
/**
 * Custom template tags for Gaukingo
 *
 * @package Gaukingo
 * @since Gaukingo 1.0.6
 */

if ( ! function_exists( 'gaukingo_posted_on' ) ) :
/**
 * Print HTML with meta information for the current post-date/time and author.
 *
 * @since Gaukingo 1.0.6
 */
function gaukingo_posted_on() {
	if ( is_sticky() && is_home() && ! is_paged() ) {
		echo '<span class="featured-post">' . __( 'Sticky', 'gaukingo' ) . '</span>';
	}

	// Set up and print post meta information.
	print(__('By ', 'gaukingo'));
	printf( '<span class="byline"><a href="%1$s" rel="author">%2$s</a></span>',
		esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
		get_the_author()
	);
	printf( '<span><a href="%1$s" rel="bookmark"><time class="entry-date" datetime="%2$s">%3$s</time></a></span>',
		esc_url( get_permalink() ),
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() )
	);	
}
endif;

if ( ! function_exists( 'gaukingo_entry_footer' ) ) :
/**
 * Prints the entry footer markup in index/archive pages.
 *
 * @since Gaukingo 1.0.6
 */
function gaukingo_entry_footer() { ?>
	<footer class="entry-footer">
		<div class="entry-meta">
		<?php
		
		printf( '<a href="%1$s" class="entry-date" rel="bookmark"><span class="screen-reader-text"> %2$s</span><span class="genericon genericon-time" aria-hidden="true"></span><time datetime="%3$s">%4$s</time></a>',
		esc_url( get_permalink() ),
		esc_html( get_the_title() ),
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() )
		);	

		// Translators: used between list items, there is a space after the comma.
		$tag_list = get_the_tag_list( '', __( ', ', 'gaukingo' ) );
		if ( $tag_list ) {
			echo '<span class="tags-links"><span class="genericon genericon-tag" aria-hidden="true"></span>' . $tag_list . '</span>';
		}

		if ( ! post_password_required() && ( comments_open() || get_comments_number() ) ) : ?>
			<span class="comments-link">
				<span class="genericon genericon-comment" aria-hidden="true"></span>
				<?php gaukingo_comments_popup_link(); ?>
			</span>
		<?php endif; ?>
			
		</div><!-- .entry-meta -->
	</footer><!-- .entry-footer -->
<?php }
endif;

if ( ! function_exists( 'gaukingo_comments_popup_link') ):
/**
 * Prints the markup for the navigation between posts and changes the default strings of the_post_navigation().
 *
 * @since Gaukingo 1.0.6
 */
function gaukingo_comments_popup_link() {
	comments_popup_link(
		// Translators: there is a space after "on.
		'<span aria-hidden="true">0</span><span class="screen-reader-text">' . __('No comments on ', 'gaukingo') . get_the_title() . '</span>',
		// Translators: there is a space after "on.
		'<span aria-hidden="true">1</span><span class="screen-reader-text">' . __('Only one comment on ', 'gaukingo') . get_the_title() . '</span>',
		// Translators: there is a space after "on.
		'<span aria-hidden="true">%</span><span class="screen-reader-text">' . __('% comments on ', 'gaukingo') . get_the_title() . '</span>'
		);
}

endif;

if ( ! function_exists( 'gaukingo_post_navigation' ) ) :
/**
 * Prints the markup for the navigation between posts and changes the default strings of the_post_navigation().
 *
 * @since Gaukingo 1.0.6
 */
function gaukingo_post_navigation() {
	the_post_navigation( array(
		'next_text' => 	'<span class="post-title">%title</span>' .
						'<span class="screen-reader-text">' . __( 'Next post:', 'gaukingo' ) . '</span> ' .
						'<span class="meta-nav" aria-hidden="true">&rarr;</span> ',
		'prev_text' =>  '<span class="meta-nav" aria-hidden="true">&larr;</span> ' .
						'<span class="screen-reader-text">' . __( 'Previous post:', 'gaukingo' ) . '</span> ' .
						'<span class="post-title">%title</span>',
	) );
}
endif;

if ( ! function_exists( 'gaukingo_blog_navigation' ) ) :
/**
 * Applies the user's choice for navigation/pagination and changes the default strings in the_posts_navigation() and the_posts_pagination().
 *
 * @since Gaukingo 1.0.6
 */
function gaukingo_blog_navigation() {
	$gaukingo_theme_options = gaukingo_get_options( 'gaukingo_theme_options' );
	if ( $gaukingo_theme_options['blog_navigation'] == 'navigation' ) :
		the_posts_navigation( array(
			'prev_text' => '<span class="genericon genericon-previous" aria-hidden="true"></span>' .__( 'Older articles', 'gaukingo' ),
			'next_text' => __( 'Newer articles', 'gaukingo' ) . '<span class="genericon genericon-next" aria-hidden="true"></span>',
			) );
	else:
		the_posts_pagination( array(
            'prev_text'          => '<span class="genericon genericon-previous" aria-hidden="true"></span><span class="screen-reader-text">' . __( 'Previous page', 'gaukingo' ) . '</span>',
            'next_text'          => '<span class="screen-reader-text">' . __( 'Next page', 'gaukingo' ) . '</span><span class="genericon genericon-next" aria-hidden="true"></span>',
            'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'gaukingo' ) . ' </span>',
        ) );
	endif;
}
endif;


if ( ! function_exists( 'gaukingo_excerpt_more' ) && ! is_admin() ) :
/**
 * Replaces "[...]" (appended to automatically generated excerpts) with ...
 * and a Continue reading link.
 *
 * @since Gaukingo 1.0.6
 *
 * @param string $more Default Read More excerpt link.
 * @return string Filtered Read More excerpt link.
 */
function gaukingo_excerpt_more( $more ) {
	if ( ! is_single() ) {
		$link = sprintf( '<a href="%1$s" class="more-link">%2$s</a>',
		esc_url( get_permalink( get_the_ID() ) ),
			/* Translators: %s: Name of current post */
			sprintf( __( 'More', 'gaukingo' ).' %s <span class="meta-nav">&rarr;</span>', '<span class="screen-reader-text">' . get_the_title( get_the_ID() ) . '</span>' )
		);
	return ' &hellip; ' . $link;
	}

	else{
		return '. ';
	}
}
add_filter( 'excerpt_more', 'gaukingo_excerpt_more' );
endif;

/**
 * Filter the except length to 20 characters.
 *
 * @param int $length Excerpt length.
 * @return int (Maybe) modified excerpt length.
 */
function gaukingo_excerpt_length( $length ) {
   return 20;
}

add_filter( 'excerpt_length', 'gaukingo_excerpt_length', 999 );

/**
 * Filters the edit comment link.
 */
function gaukingo_edit_comment_link() {
	$text = __('Edit', 'gaukingo');
	$link = '<a class="comment-edit-link" href="' . esc_url(get_edit_comment_link()) . '"><span class="genericon genericon-edit" aria-hidden="true"></span>'.esc_html($text).'</a>';

	return $link;
}
add_filter( 'edit_comment_link', 'gaukingo_edit_comment_link'  );

