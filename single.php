<?php
/**
 * The template for displaying all single posts.
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
            <span class="h1 text-center"><?php the_field('header-title'); ?></span>
            <p class="text-center"><?php the_field('header-description'); ?></p>
        </section>
    </div>
    <div class="bs-block bs-post-detail">
        <section class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-8 col-md-8 post-content-wrap js-fixed-content">
                    <?php while (have_posts()) : the_post(); ?>
                        <?php get_template_part('loop-templates/content', 'single'); ?>
                        <?php the_post_navigation(); ?>
                    <?php endwhile; // end of the loop. ?>
                </div>
                <div class="col-xs-12 col-sm-4 col-md-4 post-aside-wrap relative hidden-xs js-fixed-sidebar" role="complementary">
                    <aside class="post-aside js-fixed-sidebar-content">
                        <?php dynamic_sidebar('sidebar'); ?>
                        <?php get_template_part('loop-templates/advert-sidebar'); ?>
                    </aside>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 top-gap-medium">
                    <?php get_template_part('loop-templates/advert-footer'); ?>
                </div>
            </div>
        </section>
    </div>
    <?php get_template_part('loop-templates/cta-block', 'page'); ?>
</main>

<?php get_footer(); ?>
