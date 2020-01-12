<?php
/**
 * @package understrap
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="post-image">
        <?php echo get_the_post_thumbnail($post->ID, 'large'); ?> 
    </div>
    <header class="post-header">
        <?php if ('post' == get_post_type()) : ?>
            <div class="post-meta">
                <?php understrap_posted_on(); ?>
            </div>
        <?php endif; ?>
        <?php the_title(sprintf('<h2 class="post-title"><a href="%s" rel="bookmark">', esc_url(get_permalink())), '</a></h2>'); ?>
    </header>
    <div class="post-content">
            <?php
           the_excerpt();
            ?>
        <?php
        wp_link_pages(array(
            'before' => '<div class="page-links">' . __('Pages:', 'understrap'),
            'after' => '</div>',
        ));
        ?>
    </div>
</article>