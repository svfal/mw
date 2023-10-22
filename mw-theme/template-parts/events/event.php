<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}
$single_event_id = get_the_id();

?>

<div class="container mw-event-container">
    <!-- Row start -->
    <div class="row">
        <div class="col-lg-8">
            <div class="mw-event-single-content-wrap">
                <div class="entry-header">
                    <h1 class="entry-title">
                        <?php echo the_title(); ?>
                    </h1>
                </div>
                <?php if (has_post_thumbnail() && !post_password_required()) : ?>
                    <div class="mw-event-media">
                        <?php echo get_the_post_thumbnail(); ?>
                    </div>
                <?php endif; ?>

                <div class="mw-event-content-body">
                    <?php the_content(); ?>
                </div>
            </div>

        </div><!-- col end -->

        <div class="col-lg-4">
            <div class="mw-event-sidebar">

                <!-- event schedule meta end -->
                <?php do_action("etn_single_event_meta", $single_event_id); ?>
                <!-- event schedule meta end -->

                <?php do_action("etn_after_single_event_meta", $single_event_id); ?>
            </div>
            <!-- etn sidebar end -->
        </div>
        <!-- col end -->
    </div>
    <!-- Row end -->

    <?php do_action("etn_after_single_event_container", $single_event_id); ?>

</div>
