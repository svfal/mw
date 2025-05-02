<?php
/**
 * Template part für die Anzeige einer Meldung, wenn keine Beiträge gefunden wurden
 */
?>

<section class="no-results not-found mb-5">
    <!-- Start of no results section -->
    <header class="page-header">
        <h2 class="page-title"><?php _e('Nichts gefunden', 'musikwerk'); ?></h2>
    </header>

    <div class="page-content">
        <?php if (is_search()) : ?>

            <p><?php _e('Leider haben wir zu deinem Suchbegriff nichts gefunden. Bitte versuche es mit anderen Suchbegriffen.', 'musikwerk'); ?></p>
            <?php get_search_form(); ?>

        <?php elseif (is_home() && current_user_can('publish_posts')) : ?>

            <p>
                <?php
                printf(
                    wp_kses(
                        /* translators: %s: Link to new post page */
                        __('Bereit, deinen ersten Beitrag zu veröffentlichen? <a href="%s">Hier geht\'s los</a>.', 'musikwerk'),
                        array(
                            'a' => array(
                                'href' => array(),
                            ),
                        )
                    ),
                    esc_url(admin_url('post-new.php'))
                );
                ?>
            </p>

        <?php else : ?>

            <p><?php _e('Es scheint, dass wir nicht finden können, wonach du suchst. Vielleicht hilft die Suchfunktion.', 'musikwerk'); ?></p>
            <?php get_search_form(); ?>

        <?php endif; ?>
    </div><!-- .page-content -->
    <!-- End of no results section -->
</section><!-- .no-results -->