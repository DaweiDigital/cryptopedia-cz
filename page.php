<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
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
            <h1><?php the_field("header-title"); ?></h1>
            <p><?php the_field("header-description"); ?></p>
        </section>
    </div>
    <div class="bs-block">
        <section class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-7 col-md-7 col-lg-8">
                    <?php while (have_posts()) : the_post(); ?>
                        <?php get_template_part('loop-templates/content', 'page'); ?>
                    <?php endwhile; ?>
                </div>
                <div class="col-xs-12 col-sm-5 col-md-5 col-lg-4 hidden-xs" role="complementary">
                    <aside class="post-aside js-fixed-siderbar-content">
                        <?php dynamic_sidebar('sidebar-1'); ?>
                        <?php get_template_part('loop-templates/advert-sidebar'); ?>
                    </aside>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 top-gap-medium">
                    <?php get_template_part('loop-templates/advert-footer'); ?>
                </div>
            </div>
        </section>
    </div>
    <?php get_template_part('loop-templates/cta-block', get_post_format()); ?>
</main>
<?php get_footer(); ?>
