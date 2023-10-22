<?php
/**
 * Template for Events
 */


if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}
$single_event_id = get_the_id();

get_header();

?>
    <div id="content">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10 col-md-12 col-sm-12 col-xs-12">

                    <?php
                    while (have_posts()) : the_post();

                        //show woocommerce notice
                        if (class_exists('WooCommerce')) {
                            wc_print_notices();
                        }

                        get_template_part('template-parts/events/event');
                        ?>
                    <?php endwhile; ?>
                </div>
            </div>
        </div>
    </div>
<?php
get_sidebar();

get_footer();
