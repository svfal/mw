<?php
/**
 * Template part für die Anzeige der neuesten Beiträge auf der Startseite
 */

// Query for latest posts
$latest_posts_args = array(
    'post_type'      => 'post',
    'posts_per_page' => 3,
    'post_status'    => 'publish',
);

$latest_posts = new WP_Query($latest_posts_args);

if ($latest_posts->have_posts()) :
?>
    <!-- Start of latest posts section -->
    <div class="row justify-content-center mt-5">
        <div class="col-12 col-lg-10">
            <h3 class="latest-posts-heading"><?php echo __('Aktuelle Neuigkeiten', 'musikwerk'); ?></h3>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-12 col-lg-10">
            <div class="row">
                <?php while ($latest_posts->have_posts()) : $latest_posts->the_post(); ?>
                    <!-- Start of single post card -->
                    <div class="col-md-4 mb-4">
                        <div class="card h-100">
                            <?php if (has_post_thumbnail()) : ?>
                                <a href="<?php the_permalink(); ?>">
                                    <?php the_post_thumbnail('medium', array('class' => 'card-img-top')); ?>
                                </a>
                            <?php endif; ?>
                            <div class="card-body">
                                <h5 class="card-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
                                <p class="card-text small text-muted"><?php echo get_the_date(); ?></p>
                                <div class="card-text"><?php the_excerpt(); ?></div>
                            </div>
                            <div class="card-footer bg-transparent border-0">
                                <a href="<?php the_permalink(); ?>" class="btn btn-sm btn-outline-primary"><?php _e('Weiterlesen', 'musikwerk'); ?></a>
                            </div>
                        </div>
                    </div>
                    <!-- End of single post card -->
                <?php endwhile; ?>
            </div>
        </div>
    </div>

    <div class="row justify-content-center mt-3 mb-5">
        <div class="col-12 col-lg-10 text-center">
            <a href="<?php echo get_permalink(get_option('page_for_posts')); ?>" class="btn btn-primary"><?php _e('Alle Beiträge anzeigen', 'musikwerk'); ?></a>
        </div>
    </div>
    <!-- End of latest posts section -->
<?php
endif;
wp_reset_postdata();
?>