<?php
/**
* The template for displaying Category pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Gaukingo
 * @since Gaukingo 1.0.6
 */

get_header(); ?>
<div id="main-content">
       <?php if ( have_posts() ) : ?>

    <header class="archive-header">
<?php
    printf( '<h1 class="archive-title">' . __( 'All articles in %s', 'gaukingo' ) . '</h1>', single_cat_title('', false)  ); 
    // Show an optional term description.
    $term_description = term_description();
    if ( ! empty( $term_description ) ) :
        printf( '<div class="taxonomy-description">%s</div>', $term_description );
    endif;
?>
    </header><!-- .archive-header -->
    <div class=" blog-inner flex-container">

    <?php
            // Start the Loop.
            while ( have_posts() ) : the_post();

            /*
             * Include the post format-specific template for the content. If you want to
             * use this in a child theme, then include a file called called content-___.php
             * (where ___ is the post format) and that will be used instead.
             */
            get_template_part( 'template-parts/content', get_post_format() );

            endwhile;
            // Previous/next page navigation.
            //gaukingo_paging_nav();

        else :
            // If no content, include the "No posts found" template.
            get_template_part( 'template-parts/content', 'none' );

        endif;
    ?>
    </div><!--/flex-container-->
<?php
    // Previous/next page navigation.
    gaukingo_blog_navigation();
?>    
        
    </div><!--/main-content-->
    <?php get_sidebar('sidebar'); ?>  
<?php get_footer(); ?>

