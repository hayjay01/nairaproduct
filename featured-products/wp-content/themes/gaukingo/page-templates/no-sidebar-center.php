<?php
/**
 * Template Name: No Sidebar Center
 *
 * Description: This template without sidebar is center-aligned. It can be used as blog posts page when using a static front page if a blog page without sidebars
 * is preferred. It never shows the sidebar.
 *
 * @package Gaukingo
 * @since Gaukingo 1.0.6
 */

get_header(); ?>

<div id="main-content" class="aligncenter">

<?php
    while ( have_posts() ) : the_post(); 

        get_template_part( 'template-parts/content', 'page' ); 

    endwhile; // end of the loop.
?>
    
</div><!--/main-content-->    

<?php get_footer(); ?>

