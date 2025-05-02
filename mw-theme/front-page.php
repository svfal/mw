<?php
/**
 * Template for displaying the front page
 *
 * @package Musikwerk
 */

get_header();
?>

<div id="content">
    <div class="container">
        <!-- front-page.php is being used -->
        <?php
        // Hook for special announcements/content above the featured image
        do_action('musikwerk_before_featured_image');
        
        if (have_posts()) :
            while (have_posts()) : the_post();
                ?>
                <div class="row justify-content-center">
                    <div class="col-12 col-lg-10">
                        <?php
                        // Check if there's a featured image
                        if (has_post_thumbnail()) {
                            the_post_thumbnail('full', array('class' => 'img-fluid'));
                        } else {
                            // Fallback to the static image if no featured image
                            ?>
                            <img src="<?php echo get_stylesheet_directory_uri() . '/img/mw-start-2018.jpg'; ?>" class="img-fluid" alt="<?php bloginfo('name'); ?>">
                            <?php
                        }
                        ?>
                    </div>
                </div>

                <div class="row justify-content-center">
                    <div class="col-12 col-lg-10 justify-content-left mt-1">
                        <?php 
                        // Note: We are not displaying the title here
                        the_content();
                        ?>
                    </div>
                </div>
                <?php
            endwhile;
        endif;
        
        // Include latest posts section
        get_template_part('template-parts/latest-posts');
        ?>
    </div>
</div>

<?php
get_sidebar();
get_footer();
?>