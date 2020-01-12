<?php
/**
 * Template Name: Dictionary detail
 *
 * Template for displaying a page without sidebar even if a sidebar widget is published
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
    <div class="bs-block bs-block-content dictionary-detail">
        <section class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-7 col-md-7">
                    <?php while (have_posts()) : the_post(); ?>
                        <?php get_template_part('loop-templates/content', 'page'); ?>
                    <?php endwhile; ?>
                    <div class="share-buttons">
                        <span class="h4">Rozšir slovníček mezi tvé přátele:</span>
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
                    <?php if ($post->post_parent) { ?>
                        <a href="<?php echo get_permalink($post->post_parent); ?>" class="btn btn-primary">
                            <?php echo __('Zpět do', 'cryptopedia') ?> <?php echo get_the_title($post->post_parent); ?>
                        </a>
                    <?php } ?>
                </div>
                <div class="col-xs-12 col-sm-5 col-md-5 top-gap-large-xs" role="complementary">
                    <aside class="v-related-aside">
                        <?php get_template_part('loop-templates/dictionary-aside', 'page'); ?>
                    </aside>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 top-gap-medium">
                    <div class="monetization-block">
                        <?php get_template_part('loop-templates/advert-footer'); ?>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <?php get_template_part('loop-templates/cta-block', 'page'); ?>
</main>

<?php get_footer(); ?>