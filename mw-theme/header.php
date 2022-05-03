<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Musikwerk Stuttgart</title>
    <?php wp_head(); ?>
     
</head>

<body>

  <div class="container">  

        <div class="row justify-content-center ">

            <div class="col-lg-10 col-md-12 col-sm-12 col-xs-12">

                <nav class="navbar navbar-expand-sm navbar-light bg-light p-0" role="navigation">
                    
                    <div class="row">
                        
                            <!-- Toggle for mobile menu -->
                            <a class="navbar-toggler collapsed border-0" type="button" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-controls="bs-example-navbar-collapse-1" aria-expanded="false" aria-label="<?php esc_attr_e('Toggle navigation', 'your-theme-slug'); ?>">
                            <span> </span>
                            <span> </span>
                            <span> </span>
                            </a> 
                                                                      
                            <?php if ( !is_front_page() ) { ?>
                                <div class="col-lg-2 col-md-1 col-sm-3">
                                <a class="navbar-brand" href="/">
                                    <img src="<?php echo get_stylesheet_directory_uri() . '/img/logo.png'; ?>" width="100%"  alt="Home">
                                </a>
                                </div>
                            <?php
                            }
                            else {
                            ?>
                                <div class="navbar-brand">
                                    <img src=" <?php echo get_stylesheet_directory_uri() . '/img/logo.svg'; ?>" >
                                </div>
                            <?php
                            }	
                            ?>

                                <div class="col d-none d-sm-flex d-md-none flex-row flex-nowrap ">
                                    
                                    <!-- Colored Boxes (Small Screens)-->
                                    <div class="rectangle_green rectangle small"></div>
                                    <div class="rectangle_yellow rectangle small"></div> 
                                    <div class="rectangle_red rectangle small"></div> 
                                    <div class="rectangle_dark_blue rectangle small"></div> 
                                    <div class="rectangle_light_blue rectangle small"></div> 
                                    
                                </div>
                        
                        <div class="col-md-7 col-xs-9 offset-xl-1 ">
                            
                                <!-- Rectangles and Menu get grouped for better display -->
                                <div class="row d-none d-md-flex flex-row flex-nowrap ">
                                    
                                    <!-- Colored Boxes (Medium and Large Screens)-->
                                    <div class="rectangle_green rectangle"></div>
                                    <div class="rectangle_yellow rectangle"></div> 
                                    <div class="rectangle_red rectangle"></div> 
                                    <div class="rectangle_dark_blue rectangle"></div> 
                                    <div class="rectangle_light_blue rectangle"></div> 
                                    
                                </div>
                                
                                <div class="row justify-content-start ">
                        
                                <?php
                                wp_nav_menu(array(
                                    'theme_location'    => 'primary',
                                    'depth'             => 2,
                                    'container'         => 'div',
                                    'container_class'   => 'collapse navbar-collapse',
                                    'container_id'      => 'bs-example-navbar-collapse-1',
                                    'menu_class'        => 'nav navbar-nav flex-column flex-sm-row flex-sm-nowrap px-0',
                                    'fallback_cb'       => 'WP_Bootstrap_Navwalker::fallback',
                                    'walker'            => new WP_Bootstrap_Navwalker(),
                            ));
                            ?>
                                </div>
                            
                        </div>
                    </div>
                </nav>

            </div>
 
        </div>

        

    </div>
</div>

    