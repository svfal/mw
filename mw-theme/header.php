<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Musikwerk Stuttgart</title>
    <?php wp_head(); ?>
     
</head>

<body>
<!-- Animation-Demo -->
<a href=" <?php echo get_stylesheet_directory_uri() . '/intro.php' ?>" target=_NEW>Demo Intro</a>
  
    <div class="container">  

        <div class="row justify-content-center">

            <div class="col-12 col-lg-10 px-lg-0">

                <nav class="navbar navbar-expand-sm navbar-light bg-light" role="navigation">
                    
                    <div class="row align-items-center ">
                        
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
                                <div class="navbar-brand ">
                                    <img src=" <?php echo get_stylesheet_directory_uri() . '/img/logo.svg'; ?>" width=100%>
                                </div>
                            <?php
                            }	
                            ?>
                                <!-- Colored Boxes (x-Small Screens)-->
                                <div class="row d-xs-inline-flex d-sm-none flex-row flex-nowrap justify-content-between ">
                                    <div class="kinder rectangle small"></div>
                                    <div class="jugend rectangle small"></div> 
                                    <div class="pop rectangle small"></div> 
                                    <div class="offener rectangle small"></div>                               
                                    <div class="projekt rectangle small"></div>                                                             
                                </div>
                            

                                <!-- Colored Boxes (Small Screens)-->
                                <div class="col d-none d-sm-flex d-md-none flex-row flex-nowrap ">
                                                                  
                                    <div class="kinder rectangle small"></div>
                                    <div class="jugend rectangle small"></div> 
                                    <div class="pop rectangle small"></div> 
                                    <div class="offener rectangle small"></div> 
                                    <div class="projekt rectangle small"></div> 
                                    
                                </div>

                                <!-- Colored Boxes (Medium Screens)-->
                                <div class="col d-none d-md-flex d-lg-none flex-row flex-nowrap ">
                                                                  
                                    <div class="kinder rectangle medium"></div>
                                    <div class="jugend rectangle medium"></div> 
                                    <div class="pop rectangle medium"></div> 
                                    <div class="offener rectangle medium"></div> 
                                    <div class="projekt rectangle medium"></div> 
                                    
                                </div>
                        
                                <div class="col-lg-8 col-xl-7 offset-xl-1">
                            
                                    <!-- Rectangles and Menu get grouped for better display -->
                                    <div class="row d-none d-lg-flex flex-row flex-nowrap ">
                                    
                                        <!-- Colored Boxes (Large Screens)-->
                                        <div class="kinder rectangle"></div>
                                        <div class="jugend rectangle"></div> 
                                        <div class="pop rectangle"></div> 
                                        <div class="offener rectangle"></div> 
                                        <div class="projekt rectangle"></div> 
                                    
                                    </div>

                                
                                
                                    <div class="row">
                        
                                        <?php
                                        wp_nav_menu(array(
                                        'theme_location'    => 'primary',
                                        'depth'             => 2,
                                        'container'         => 'div',
                                        'container_class'   => 'collapse navbar-collapse ',
                                        'container_id'      => 'bs-example-navbar-collapse-1',
                                        'menu_class'        => 'nav navbar-nav flex-column flex-sm-row offset-md-3 offset-lg-0 flex-sm-nowrap px-0',
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

    