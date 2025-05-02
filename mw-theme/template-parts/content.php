<?php
/**
 * Template part für die Anzeige von Beiträgen
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('mb-5'); ?>>
    <!-- Start of single post -->
    <header class="entry-header mb-4">
        <?php if (has_post_thumbnail()) : ?>
            <div class="post-thumbnail mb-4">
                <a href="<?php the_permalink(); ?>">
                    <?php the_post_thumbnail('large', array('class' => 'img-fluid')); ?>
                </a>
            </div>
        <?php endif; ?>

        <?php the_title('<h2 class="entry-title"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h2>'); ?>

        <div class="entry-meta text-muted mb-3">
            <span class="posted-on"><?php echo get_the_date(); ?></span>
            <span class="byline"> <?php _e('von', 'musikwerk'); ?> <?php the_author_posts_link(); ?></span>
            <?php if (has_category()) : ?>
                <span class="cat-links"> <?php _e('in', 'musikwerk'); ?> <?php the_category(', '); ?></span>
            <?php endif; ?>
        </div>
    </header>

    <div class="entry-content">
        <?php
        if (is_single()) :
            the_content();
        else :
            the_excerpt();
            ?>
            <a href="<?php the_permalink(); ?>" class="btn btn-outline-primary btn-sm"><?php _e('Weiterlesen', 'musikwerk'); ?></a>
        <?php endif; ?>
    </div>

    <?php if (is_single() && has_tag()) : ?>
    <footer class="entry-footer mt-4">
        <div class="tags-links">
            <?php the_tags('<span class="badge bg-light text-dark me-1">', '</span><span class="badge bg-light text-dark me-1">', '</span>'); ?>
        </div>
    </footer>
    <?php endif; ?>
    <!-- End of single post -->
</article>