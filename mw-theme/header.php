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

        <div class="row justify-content-center">

            <div class="col-12 col-lg-10 px-lg-0">

                <nav class="navbar navbar-expand-sm navbar-light bg-light" role="navigation">
                    
                    <div class="row align-items-baseline">
                        
                            <!-- Toggle for mobile menu -->
                            <a class="navbar-toggler collapsed border-0 " type="button" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-controls="bs-example-navbar-collapse-1" aria-expanded="false" aria-label="<?php esc_attr_e('Toggle navigation', 'your-theme-slug'); ?>">
                            <span> </span>
                            <span> </span>
                            <span> </span>
                            </a> 
                                                                      
                            <?php if ( !is_front_page() ) { ?>
                                
                                <div class="navbar-brand" >
                                    <a href="/">
                                        <img src="<?php echo get_stylesheet_directory_uri() . '/img/logo.svg'; ?>" width="100%"  alt="Home">
                                    </a>
                                </div>
                            <?php
                            }
                            else {
                            ?>
                                <div class="navbar-brand">
                                    <img src=" <?php echo get_stylesheet_directory_uri() . '/img/logo.svg'; ?>" width=100%>
                                </div>
                            <?php
                            }	
                            ?>

                                <div class="col d-none d-sm-flex d-lg-none flex-row flex-nowrap ">
                                    
                                    <!-- Colored Boxes (Small Screens)-->
                                    <div class="kinder rectangle small"></div>
                                    <div class="jugend rectangle small"></div> 
                                    <div class="pop rectangle small"></div> 
                                    <div class="offener rectangle small"></div> 
                                    <div class="projekt rectangle small"></div> 
                                    
                                </div>
                        
                        <div class="col-lg-8 col-xl-7 offset-xl-1">
                            
                                <!-- Rectangles and Menu get grouped for better display -->
                                <div class="row d-none d-lg-flex flex-row flex-nowrap ">
                                    
                                    <!-- Colored Boxes (Medium and Large Screens)-->
                                    <div class="kinder rectangle"></div>
                                    <div class="jugend rectangle"></div> 
                                    <div class="pop rectangle"></div> 
                                    <div class="offener rectangle"></div> 
                                    <div class="projekt rectangle"></div> 
                                    
                                </div>
                                
                                <div class="row justify-content-start ">
                        
                                <?php
                                wp_nav_menu(array(
                                    'theme_location'    => 'primary',
                                    'depth'             => 2,
                                    'container'         => 'div',
                                    'container_class'   => 'collapse navbar-collapse ',
                                    'container_id'      => 'bs-example-navbar-collapse-1',
                                    'menu_class'        => 'nav navbar-nav flex-column flex-sm-row  flex-sm-nowrap px-0 ',
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

    