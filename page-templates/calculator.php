<?php
/**
 * Template Name: Calculator
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
    <div class="bs-block">
        <section class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-7 col-md-7">
                    <?php while (have_posts()) : the_post(); ?>
                        <?php get_template_part('loop-templates/content', 'page'); ?>
                    <?php endwhile; ?>
                    <div class="calculator">
                        <div class="js-result"></div>
                        <div class="calculator-row">
                            <div class="what-calc">
                                <input type="text" class="input amount">
                                <select class="select">
                                    <option>CZK</option>
                                    <option>XBT</option>
                                    <option>ETH</option>
                                    <option>USD</option>
                                    <option>EUR</option>
                                </select>
                            </div>
                            <div class="what-calc-to">
                                <select class="select">
                                    <option>CZK</option>
                                    <option>XBT</option>
                                    <option>ETH</option>
                                    <option>USD</option>
                                    <option>EUR</option>
                                </select>
                            </div>
                             <a href="#" class="js-calc-that">Počítej</a>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-5 col-md-5 hidden-xs" role="complementary">
                    <aside class="page-aside">
                        <?php dynamic_sidebar('sidebar-1'); ?>
                    </aside>
                </div>
            </div>
        </section>
    </div>
    <?php get_template_part('loop-templates/cta-block') ?>
</main>
<?php get_footer(); ?>
