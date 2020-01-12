<?php
/**
 * @package understrap
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="post-thumb">
        <?php echo get_the_post_thumbnail($post->ID, 'large'); ?> 
    </div>
    <div class="post-meta">
        <?php understrap_posted_on(); ?>
        <?php the_category() ;?>
    </div>
    <div class="entry-content post-content">
        <?php the_title('<h1 class="h2 post-title">', '</h1>'); ?>
        <?php the_content(); ?>
        <div class="share-buttons">
            <span class="h4">Sdílej tento příspěvek dál:</span>
            <!-- AddToAny BEGIN -->
            <div class="a2a_kit a2a_kit_size_32 a2a_default_style">
                <a class="a2a_button_facebook"></a>
                <a class="a2a_button_twitter"></a>
                <a class="a2a_button_google_plus"></a>
                <a class="a2a_button_pinterest"></a>
                <a class="a2a_button_linkedin"></a>
                <a class="a2a_button_copy_link"></a>
            </div>
        </div>
        <script>
            var a2a_config = a2a_config || {};
            a2a_config.locale = "cs";
        </script>
        <script async src="https://static.addtoany.com/menu/page.js"></script>
        <div class="post-tags">
            <?php the_tags(); ?>
        </div>
        <div class="top-gap-medium"></div>
        <?php
        wp_link_pages(array(
            'before' => '<div class="page-links">' . __('Pages:', 'understrap'),
            'after' => '</div>',
        ));
        ?>
    </div>
</article>