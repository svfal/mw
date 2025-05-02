<?php get_header(); ?>

<div id="content">
    <div class="container">
        <?php
        // Check if we're displaying the front page and it's set to show a static page
        if (is_front_page() && !is_home()) {
            // This is a static front page
            if (have_posts()) :
                while (have_posts()) : the_post();
                    // Display the page content
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
                            <h3 class="musikwerkverbindet"><?php the_title(); ?></h3>
                            <?php the_content(); ?>
                        </div>
                    </div>
                    <?php
                endwhile;
            endif;

            // Get blog posts (even on static front page)
            get_template_part('template-parts/latest-posts');

        } else {
            // This is the blog index
            if (have_posts()) :
                ?>
                <div class="row justify-content-center">
                    <div class="col-12 col-lg-10">
                        <h1><?php echo is_home() && get_option('page_for_posts') ? get_the_title(get_option('page_for_posts')) : __('Neueste Beiträge', 'musikwerk'); ?></h1>
                    </div>
                </div>

                <div class="row justify-content-center">
                    <div class="col-12 col-lg-10">
                        <?php
                        while (have_posts()) : the_post();
                            // Get blog post template part
                            get_template_part('template-parts/content', get_post_format());
                        endwhile;

                        // Pagination
                        the_posts_pagination(array(
                            'mid_size' => 2,
                            'prev_text' => __('Zurück', 'musikwerk'),
                            'next_text' => __('Weiter', 'musikwerk'),
                        ));
                        ?>
                    </div>
                </div>
                <?php
            else :
                get_template_part('template-parts/content', 'none');
            endif;
        }
        ?>
    </div>
</div>

<?php get_sidebar(); ?>
<?php get_footer(); ?>