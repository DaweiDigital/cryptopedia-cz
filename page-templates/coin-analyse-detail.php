<?php
/**
 * Template Name: Analýza coinů detail
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
    <div class="bs-block bs-block-content c-a-detail">
        <section class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-7 col-md-7">
                    <table class="c-a-table">
                        <thead>
                            <tr>
                                <th colspan="2"><?php echo __('Rychlý přehled', 'fresh') ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <?php echo __('Aktuální hodnota', 'fresh') ?>
                                </td>
                                <td>
                                    <div class="js-coincap coincap" data-coin="<?php the_field("actual-price"); ?>">
                                        <span class="js-name coin-name hidden"></span>
                                        <div class="js-price coin-price"></div>
                                        <span class="js-percent coin-percent"></span>
                                        <div class="coin-percent-per-day">/ 24h</div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <?php echo __('Označení', 'fresh') ?>
                                </td>
                                <td>
                                    <?php the_field("coin-alias"); ?>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <?php echo __('Ikona', 'fresh') ?>
                                </td>
                                <td>
                                    <?php $image = get_field('coin-icon'); ?>
                                    <img src="<?php echo $image['url'] ?>" alt="<?php echo $image['alt'] ?>">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <?php echo __('Koupit lze na', 'fresh') ?>
                                </td>
                                <td>
                                    <?php the_field("where-to-buy"); ?>
                                    <ul class="nice-ul-list">
                                        <?php
                                        if (get_field("coinmate-yes") === TRUE) {
                                            ;
                                            ?>
                                            <li>
                                                <a href="https://coinmate.io?referral=VVhaWlVGcHBZVEJOV25GeGFsUjFiR0ozWjJ0bVp3PT0" target="_blank" rel="external">Coinmate</a>
                                            </li>
                                        <?php }; ?>

                                        <?php
                                        if (get_field("coinbase-yes") === TRUE) {
                                            ;
                                            ?>
                                            <li>
                                                <a href="https://www.coinbase.com/join/5a129a4b573c640333b78dbe" target="_blank" rel="external">Coinbase</a>
                                            </li>
                                        <?php }; ?>

                                        <?php
                                        if (get_field("changelly-yes") === TRUE) {
                                            ;
                                            ?>
                                            <li>
                                                <a href="https://changelly.com/?ref_id=97439772f68d" target="_blank" rel="external">Changelly</a>
                                            </li>
                                        <?php }; ?>

<?php
if (get_field("localcoin-yes") === TRUE) {
    ;
    ?>
                                            <li>
                                                <a href="https://localbitcoins.com/?ch=ila4" target="_blank" rel="external">Localcoin</a>
                                            </li>
<?php }; ?>
                                    </ul>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                        <?php echo __('Obchodní platformy', 'fresh') ?>
                                </td>
                                <td>
                                        <?php the_field("business-platform"); ?>
                                    <ul class="nice-ul-list">
<?php
if (get_field("bittrex-yes") === TRUE) {
    ;
    ?>
                                            <li>
                                                <a href="https://bittrex.com/" target="_blank" rel="external">Bittrex</a>
                                            </li>
<?php }; ?>
                                        <?php
                                        if (get_field("hitbtc-yes") === TRUE) {
                                            ;
                                            ?>
                                            <li>
                                                <a href="https://hitbtc.com/?ref_id=5a312310378bf" target="_blank" rel="external">HitBtc</a>
                                            </li>
                                        <?php }; ?>
                                        <?php if (get_field("etoro-yes") === TRUE) {
                                            ;
                                            ?>
                                            <li>
                                                <a href="http://etoro.tw/2yirxWE" target="_blank" rel="external">eToro</a>
                                            </li>
                                        <?php }; ?>
                                        <?php if (get_field("kucoin") === TRUE) {
                                            ;
                                            ?>
                                            <li>
                                                <a href="https://www.kucoin.com/#/?r=7rQ4ux" target="_blank" rel="external">Kucion</a>
                                            </li>
<?php }; ?>    
<?php if (get_field("binance") === TRUE) {
    ;
    ?>
                                            <li>
                                                <a href="https://www.binance.com/?ref=12823523" target="_blank" rel="external">Binance</a>
                                            </li>
<?php }; ?>   
                                    </ul>
                                </td>
                            </tr>
                        </tbody>
                    </table>
<?php while (have_posts()) : the_post(); ?>
    <?php get_template_part('loop-templates/content', 'page'); ?>
<?php endwhile; ?>
                    <div class="share-buttons">
                        <span class="h4">Sdílet své nadšení:</span>
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
                        <?php echo __('Zpět na', 'cryptopedia') ?> <?php echo get_the_title($post->post_parent); ?>
                        </a>
                        <?php } ?>
                </div>
                <div class="col-xs-12 col-sm-5 col-md-5 top-gap-large-xs" role="complementary">
                    <aside class="v-related-aside">
                        <?php get_template_part('loop-templates/coin-analyse-aside', 'page'); ?>
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