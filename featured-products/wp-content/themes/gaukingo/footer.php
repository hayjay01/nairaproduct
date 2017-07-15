<?php
/**
 * The template for displaying the footer
 *
 * Contains footer content and the closing of the #main and #container div elements.
 *
 * @package Gaukingo
 * @since Gaukingo 1.0.6
 */
?>
</main><!-- #main -->

<?php get_sidebar('footer'); ?>

<footer id="page-footer" role="contentinfo">
    <div class="inner">
        <div id="site-info">
        <span class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></span>
        <a href="<?php echo esc_url( __('https://wordpress.org/', 'gaukingo') ); ?>"><?php printf( __( 'Proudly powered by %s', 'gaukingo' ), 'WordPress' ); ?></a>
        </div><!--/site-info--> 
        <?php if (has_nav_menu('social')): ?>
            <nav id="footer-social-navigation" class="social-navigation" role="navigation" aria-label="<?php _e( 'Social Menu ', 'gaukingo' ); ?>">
                <?php wp_nav_menu( array(
                                'theme_location' => 'social',
                                'container' => 'false',
                                'menu_id' => 'social-menu',
                                'link_before'    => '<span class="screen-reader-text">',
                                'link_after'     => '</span>', )); ?>
            </nav> <!--/social--> 
        <?php endif ?>
    </div> <!--/inner-->
</footer> <!--/footer-->

</div><!-- #container -->

<?php wp_footer(); ?>
</body>
</html>

