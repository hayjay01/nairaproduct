<?php
/**
 * Template Name: No Sidebar Left
 *
 * Description: A page template without sidebar, left aligned. 
 *
 * @package Gaukingo
 * @since Gaukingo 1.0.6
 */

get_header(); ?>

<div id="main-content" class="alignleft">

<?php
	while ( have_posts() ) : the_post(); 

		get_template_part( 'template-parts/content', 'page' ); 

	endwhile; // end of the loop.
?>

</div><!--/main-content-->
	        
<?php get_footer(); ?>