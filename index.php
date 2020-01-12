<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package understrap
 */
get_header();
?>
<main id="main" class="site-main" role="main">
    <?php
    $imageHeader = get_field('background-image-header', get_option('page_for_posts'));
    $sizeLgHeader = 'background-image-lg';
    $sizeMdHeader = 'background-image-md';
    $sizeSmHeader = 'background-image-sm';
    $sizeXsHeader = 'background-image-xs';
    $lgHeader = $imageHeader['sizes'][$sizeLgHeader];
    $mdHeader = $imageHeader['sizes'][$sizeMdHeader];
    $smHeader = $imageHeader['sizes'][$sizeSmHeader];
    $xsHeader = $imageHeader['sizes'][$sizeXsHeader];

    ;
    ?>
    <div class="bs-block bs-page-header lazy-bg" data-lazy-bg-lg="<?php echo $lgHeader; ?>" data-lazy-bg-md="<?php echo $mdHeader; ?>" data-lazy-bg-sm="<?php echo $smHeader; ?>" data-lazy-bg-xs="<?php echo $xsHeader; ?>" style="background-image:url()">
        <section class="container">
            <h1><?php the_field('header-title', get_option('page_for_posts')); ?></h1>
            <p><?php the_field('header-description', get_option('page_for_posts')); ?></p>
        </section>
    </div>
    <div class="bs-block">
        <section class="container">
            <div class="post-list">
                <?php if (have_posts()) : ?>
                    <?php while (have_posts()) : the_post(); ?>
                        <?php
                        /* Include the Post-Format-specific template for the content.
                         * If you want to override this in a child theme, then include a file
                         * called content-___.php (where ___ is the Post Format name) and that will be used instead.
                         */
                        get_template_part('loop-templates/content', get_post_format());
                        ?>
                    <?php endwhile; ?>
                </div>
                <?php
                the_posts_pagination(array(
                    'mid_size' => 2,
                    'prev_text' => __('Zpět', 'textdomain'),
                    'next_text' => __('Další', 'textdomain'),
                ));
                ?>
            <?php else : ?>
    <?php get_template_part('loop-templates/content', 'none'); ?>
    <?php endif; ?>
        </section>
    </div>
<?php get_template_part('loop-templates/cta-block', get_post_format()); ?>
</main>

<?php get_footer(); ?>
