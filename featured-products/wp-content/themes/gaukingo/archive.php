<?php
/**
 * The template for displaying archive pages
 *
 * Used to display archive-type pages if nothing more specific matches a query.
 * For example, puts together date-based pages if no date.php file exists.
 *
 * If you'd like to further customize these archive views, you may create a
 * new template file for each one. For example, tag.php (Tag archives),
 * category.php (Category archives), author.php (Author archives), etc.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Gaukingo
 * @since Gaukingo 1.0.6
 */

get_header(); ?>

<div id="main-content">
<?php   if ( have_posts() ) : ?>

    <header class="archive-header">
    <?php
        the_archive_title( '<h1 class="archive-title">', '</h1>' );
        the_archive_description( '<div class="taxonomy-description">', '</div>' );
    ?>
    </header><!-- .page-header -->
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

        else :
            // If no content, include the "No posts found" template.
            get_template_part( 'template-parts/content', 'none' );

        endif; ?>
    </div><!--/flex-container-->
    <?php
        // Previous/next page navigation.
            gaukingo_blog_navigation();
    ?>    
</div><!--/main-content-->

<?php get_sidebar('sidebar'); ?>    
<?php get_footer(); ?>

