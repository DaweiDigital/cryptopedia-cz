<?php
/**
 * @package understrap
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <?php the_title(sprintf('<h2>', esc_url(get_permalink())), '</h2>'); ?>
    <div class="entry-summary">
        <?php the_excerpt(); ?>
    </div>
</article>
