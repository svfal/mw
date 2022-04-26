<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Musikwerk Stuttgart</title>
    <?php wp_head(); ?>
     
</head>

<body>
    <nav class="navbar navbar-expand-md navbar-light bg-light" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-controls="bs-example-navbar-collapse-1" aria-expanded="false" aria-label="<?php esc_attr_e('Toggle navigation', 'your-theme-slug'); ?>">
                <span class="navbar-toggler-icon"></span>
            </button>
            <?php if ( !is_front_page() ) { ?>
            	<a class="navbar-brand" href="/">
                	<img src="<?php echo get_stylesheet_directory_uri() . '/img/logo.png'; ?>" width="40"  alt="Home">
            	</a>
            <?php
            }
            else {
            ?>
            	<p>
            		<img src=" <?php echo get_stylesheet_directory_uri() . '/img/logo.svg'; ?>" >
                </p>
            <?php
            }	
            wp_nav_menu(array(
                'theme_location'    => 'primary',
                'depth'             => 2,
                'container'         => 'div',
                'container_class'   => 'collapse navbar-collapse',
                'container_id'      => 'bs-example-navbar-collapse-1',
                'menu_class'        => 'nav navbar-nav',
                'fallback_cb'       => 'WP_Bootstrap_Navwalker::fallback',
                'walker'            => new WP_Bootstrap_Navwalker(),
            ));
            ?>
        </div>
    </nav>
    <div class="container col-lg-10 col-sm-10 col-md-10 col-xs-10">
        <!-- Colored Boxes -->
        <div class="rectangle_green rectangle"></div>
        <div class="rectangle_yellow rectangle"></div> 
        <div class="rectangle_red rectangle"></div> 
        <div class="rectangle_dark_blue rectangle"></div> 
        <div class="rectangle_light_blue rectangle"></div> 
    </div>
    <div class="container">