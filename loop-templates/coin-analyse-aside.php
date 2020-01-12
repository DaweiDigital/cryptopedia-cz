<?php
/**
 * @package understrap
 */
?>

<div class="v-related-pages">
    <div class="h2">Podobné coiny</div>
    <ul class="v-related-pages-list">
        <?php
        $args = array(
            'post_type' => 'page',
            'post_parent' => $post->post_parent,
            'post__not_in' => array($post->ID),
            'posts_per_page' => 5,
            'orderby' => 'ASC'
        );

        $the_query = new WP_Query($args);
        ?>

        <?php if ($the_query->have_posts()) : ?>
            <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
                <li class="v-r-p-item">
                    <a href="<?php the_permalink(); ?>" rel="post-<?php the_ID(); ?>"><?php the_title(); ?></a>
                </li>
            <?php endwhile; ?>
        <?php endif; ?>
    </ul>
    <?php wp_reset_query(); ?>
</div>