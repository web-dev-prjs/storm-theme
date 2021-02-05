<!DOCTYPE html>
<html <?php language_attributes(); ?>> 
<head>
    <!-- Meta -->
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?php echo wp_get_theme()->get( 'Description' ) ?>">
    <meta name="author" content="<?php echo wp_get_theme()->get( 'Author' ) ?>">    
    <link rel="shortcut icon" href="<?php echo get_theme_file_uri( '/assets/images/logo.png' ) ?>">
    <?php wp_head(); ?>

</head>

<body>
    <header class="header text-center overflow-auto">	    
        <h1 class="site-title pt-lg-4 mb-0"><?php bloginfo('name'); ?></h1>
        <h3 class="site-title pt-lg-4 mb-0"><?php bloginfo('description'); ?></h3>
        <nav class="navbar navbar-expand-lg navbar-dark" >
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>

            <div id="navigation" class="collapse navbar-collapse flex-column" >
                
                <?php

                if ( has_custom_logo() )
                {
                    $custom_logo_id = get_theme_mod( 'custom_logo' );
                    $site_logo = wp_get_attachment_image_src( $custom_logo_id )[0];
                }

                ?>
                <a href="<?php echo site_url(); ?>">
                    <img class="mb-5 mx-auto logo" src="<?php echo $site_logo; ?>" alt="logo placeholder" >
                </a>
                <?php

                $args = array(
                    'menu' => 'primary',
                    'menu_class' => 'om-menu-class',
                    'menu_id' => 'om-menu-id',
                    'container' => 'div',
                    'theme_location' => 'primary',
                    'items_wrap' => '<ul id="om-ul-id" class="navbar-nav flex-column text-sm-center text-md-left">%3$s</ul>'
                );
                wp_nav_menu( $args );

                ?>

                <hr>
                <?php dynamic_sidebar('om-ssn'); ?>
            </div>
        </nav>
    </header>

    <div class="main-wrapper">
        <header class="page-title theme-bg-light text-center gradient py-5">
            <h1 class="heading"><?php single_post_title(); ?></h1>
        </header>
        