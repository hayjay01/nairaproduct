<?php
/**
 * The Header of the theme.
 *
 * Displays all of the <head> section and everything up till <main id="main"> (i.e. until the end of the header, opens the #container and the #main div elements)
 *
 * @package Gaukingo
 * @since Gaukingo 1.0.6
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
     <head>
        <meta charset="<?php bloginfo( 'charset' ); ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="profile" href="http://gmpg.org/xfn/11" />
        <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
        <?php wp_head(); ?>
    </head>
    <body <?php body_class(); ?> >
        <div id="container">
            <header id="masthead" class="site-header" role="banner">
                <a class="screen-reader-text skip-link" href="#main"><?php _e( 'Skip to content', 'gaukingo' ); ?></a>
                <div class="inner flex-container">                    
                    <div id="site-identity">                        
                        <?php if ( has_custom_logo() ) { ?>
                            the_custom_logo();                              
                        <?php } else { ?>
                            <a class="home-link" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
                                <h1 id="site-title" class="site-title"><?php bloginfo( 'name' ); ?></h1>
                                <h2 id="site-description" class="site-description"><?php bloginfo( 'description' ); ?></h2>
                            </a>
                        <?php } ?>                      
                    </div><!--/site-identity-->

                <?php if (has_nav_menu('main') || has_nav_menu('social')): ?>
                    <button id="nav-button" class="menu-toggle"><span class="screen-reader-text"><?php _e( 'Menus', 'gaukingo' ); ?></span><span id="nav-icon" class="genericon genericon-menu" aria-hidden="true"></span></button>
                <?php endif ?>

                    <div id="navigation">

                    <?php if ( has_nav_menu('main') ): ?>
                        <nav id="main-navigation" class="site-navigation main-navigation" role="navigation" aria-label='<?php _e( 'Main Menu ', 'gaukingo' ); ?>'>
                            <?php wp_nav_menu( array( 'theme_location' => 'main', 'container' => 'ul', 'menu_id' => 'main-menu' ) ); ?>
                        </nav><!--main-menu-->
                    <?php endif ?>

                    <?php if (has_nav_menu('social')): ?>                
                        <nav id="social-navigation" class="site-navigation social-navigation" role="navigation" aria-label='<?php _e( 'Social Menu ', 'gaukingo' ); ?>' >
                           <?php wp_nav_menu( array(
                                'theme_location' => 'social',
                                'container' => 'ul',
                                'menu_id' => 'social-menu',
                                'link_before'    => '<span class="screen-reader-text">',
                                'link_after'     => '</span>', )); ?>
                        </nav><!--social-menu-->                
                    <?php endif ?>

                    </div><!--/navigation--> 
                    <?php get_search_form(); ?>

                </div><!--/inner--> 
            </header><!--/header-->
            <main id="main" role="main">





