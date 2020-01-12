<?php
/**
 * The template for displaying archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package understrap
 */
get_header();
?>               
<main id="main" class="site-main" role="main">
    <?php
    $imageHeader = get_field('background-image-header');
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
            <?php
            the_archive_title('<h1>', '</h1>');
            the_archive_description('<p class="taxonomy-description">', '</p>');
            ?>
        </section>
    </div>
    <div class="bs-block">
        <section class="container">
            <?php if (have_posts()) : ?>
                <div class="post-list">
                    <?php while (have_posts()) : the_post(); ?>

                        <?php
                        get_template_part('loop-templates/content', get_post_format());
                        ?>

                    <?php endwhile; ?>
                </div>
                <?php the_posts_navigation(); ?>

            <?php else : ?>

                <?php get_template_part('loop-templates/content', 'none'); ?>

            <?php endif; ?>
        </section>
    </div>
</main>

<?php get_footer(); ?>
