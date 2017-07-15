<?php
/**
* The template for displaying image attachments
*
* @link https://codex.wordpress.org/Template_Hierarchy
*
* @package Gaukingo
* @since Gaukingo 1.0.6
*/

get_header(); ?>
    <div id="main-content">

        <?php while (have_posts()) : the_post(); ?>

        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

            <header class="entry-header">
                <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>  

                <div class="entry-meta">
                    <?php 
                    $post_title = get_the_title( $post->post_parent );

                    if ( empty( $post_title ) || 0 == $post->post_parent )
                        printf('<span class="genericon genericon-time" aria-hidden="true"></span><time class="entry-date" datetime="%1$s">%2$s</time>', esc_attr( get_the_date('c')), esc_html(get_the_date()));

                    else {

                    // Translators: There is a space after "on".
                    _e('Published on ','gaukingo');
                    printf('<a href="%1$s" class="entry-date" rel="bookmark"><span class="genericon genericon-time" aria-hidden="true"></span><time datetime="%2$s">%3$s</time></a>',
                        esc_url( get_day_link(get_the_date('Y', $post->ID),get_the_date('m', $post->ID),get_the_date('d', $post->ID)) ),
                        esc_attr( get_the_date('c')),
                        esc_html(get_the_date()));

                    // Translators: There is a space before and after "in".
                    _e( ' in ', 'gaukingo');

                    printf('<a href="%1$s" class="parent-post-link" title="'.__('Return to:', 'gaukingo').' %2$s" rel="gallery"><span class="genericon genericon-image" aria-hidden="true"></span>%3$s</a>',
                        esc_url(get_permalink($post->post_parent)),
                        esc_attr( strip_tags($post_title)),
                        $post_title
                        );
                    }

                    $metadata = wp_get_attachment_metadata();
                    printf( '<a href="%1$s" class="full-size-link" title="%2$s"><span class="genericon genericon-zoom" aria-hidden="true"></span>%3$s (%4$s &times; %5$s)</a>',
                        esc_url( wp_get_attachment_url() ),
                        esc_attr__( 'Link to full-size image', 'gaukingo' ),
                        __( 'Full resolution', 'gaukingo' ),
                        $metadata['width'],
                        $metadata['height']
                    );

                        edit_post_link('<span class="genericon genericon-edit" aria-hidden="true"></span>'. __('Edit', 'gaukingo') );
                    ?>
                </div><!-- .entry-meta -->
            </header><!-- .entry-header -->                               

            <div class="entry-content">
                <nav id="image-navigation" class="navigation image-navigation">
                    <div class="nav-links">
                        <div class="nav-previous"><?php previous_image_link(false, '&larr;&nbsp; '.__('Previous', 'gaukingo' ) ); ?></div>
                        <div class="nav-next"><?php next_image_link( false, __( 'Next', 'gaukingo' ).' &nbsp; &rarr;' ); ?></div>
                    </div><!-- .nav-links -->
                </nav><!-- .image-navigation -->

                <div class="entry-attachment">
                    <?php
                        /**
                         * Filter the default Gaukingo image attachment size.
                         * @since Gaukingo
                         * @param string $image_size Image size. Default 'large'.
                         */
                        $image_size = apply_filters( 'gaukingo_attachment_size', 'large');

                        echo wp_get_attachment_image( get_the_ID(), $image_size );
                    ?>

                    <?php if ( has_excerpt() ) : ?>
                        <div class="entry-caption">
                            <?php the_excerpt(); ?>
                        </div><!-- .entry-caption -->
                    <?php endif; ?>
                </div><!-- .entry-attachment -->

                <?php
                    the_content();
                    wp_link_pages( array(
                        'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'gaukingo' ) . '</span>',
                        'after'       => '</div>',
                        'link_before' => '<span>',
                        'link_after'  => '</span>',
                        'pagelink'    => '<span class="screen-reader-text">' . __( 'Page', 'gaukingo' ) . ' </span>%',
                        'separator'   => '<span class="screen-reader-text">, </span>',
                    ) ); ?>
        
            </div><!-- .entry-content -->

        </article><!-- #post-## -->
        
        <?php endwhile; ?>   
    </div><!--/main-content-->
    <?php get_sidebar('sidebar'); ?>


<?php get_footer(); ?>

