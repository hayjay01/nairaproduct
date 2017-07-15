<?php
/**
 * The template for displaying search results pages
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
            <?php printf( '<h2 class="archive-title">' . __( 'Search Results for: %s', 'gaukingo' ), '<span>' . get_search_query() . '</span></h2>' ); ?>
        </header><!-- .page-header -->
        <div class="blog-inner flex-container">

        <?php
        // Start the loop.
        while ( have_posts() ) : the_post();
            /**
             * Run the loop for the search to output the results.
             * If you want to overload this in a child theme then include a file
             * called content-search.php and that will be used instead.
             */

            get_template_part( 'template-parts/content', get_post_format() );

        // End the loop.
        endwhile;


    // If no content, include the "No posts found" template.
    else :
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

