<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Soboa_95_ans
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>
    <div id="page" class="site">
        <a class="skip-link screen-reader-text"
            href="#primary"><?php esc_html_e( 'Skip to content', 'soboa95ans' ); ?></a>

        <header id="masthead" class="site-header">
            <div class="container d-flex justify-content-between align-items-center">
                <div class="site-branding">
                    <?php
            the_custom_logo();
            if ( is_front_page() && is_home() ) :
                ?>
                    <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>"
                            rel="home"><?php bloginfo( 'name' ); ?></a></h1>
                    <?php endif; ?>
                </div>

                <nav id="site-navigation" class="main-navigation navbar navbar-expand-lg">
                    <button class="menu-toggle navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#primary-menu" aria-controls="primary-menu" aria-expanded="false"
                        aria-label="Toggle navigation">
                        <span class="hamburger-line"></span>
                        <span class="hamburger-line"></span>
                        <span class="hamburger-line"></span>
                    </button>

                    <?php
            wp_nav_menu(
                array(
                    'theme_location' => 'menu-1',
                    'menu_id'        => 'primary-menu',
                    'menu_class'     => 'navbar-nav',
                    'container_class'=> 'collapse navbar-collapse',
                    'container_id'   => 'primary-menu'
                )
            );
            ?>
                </nav>
            </div>
        </header>