<?php
/**
 * Template Name: Homepage
 * @package understrap
 */
get_header();
?>
<main class="site-main" role="main">
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
    <div class="bs-block bs-main-banner lazy-bg js-fullheight" data-lazy-bg-lg="<?php echo $lgHeader; ?>" data-lazy-bg-md="<?php echo $mdHeader; ?>" data-lazy-bg-sm="<?php echo $smHeader; ?>" data-lazy-bg-xs="<?php echo $xsHeader; ?>" style="background-image:url()">
        <div class="inner-content">
            <section class="container">
                <h1><?php the_field("header-title"); ?></h1>
                <p><?php the_field("header-description"); ?></p>
                <div class="btn-wrap">
                    <a href="/akademie" class="btn btn-primary">Zjistit více informací</a>
                </div>
            </section>
        </div>
        <a href="#co-je-kryptomena" class="mouse hidden-xs">
            Dolů
        </a>
    </div>
    <div class="bs-block bs-big-padding" id="co-je-kryptomena">
        <section class="container">
            <div class="row entry-content">
                <div class="col-xs-12 col-sm-6 col-md-6 text-center">
                    <img data-original="<?php imagesUrl('bitcoin-logo.png'); ?>" src="<?php imagesUrl('lazyload.png'); ?>" src="" class="bitcoin-logo lazy-load" alt="Bitcoin">
                    <noscript><img src="<?php imagesUrl('bitcoin-logo.png'); ?>" class="bitcoin-logo" alt="Bitcoin"></noscript>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-6 top-gap-large-xs">
                    <div class="before-title">Co je kryptoměna?</div>
                    <h2 class="module-title">Digitální svět -<br> Digitální měna</h2>
                    <h3>Bitcoin, Litecoin, Ethereum nebo Ripple? Všechny tyto kryptoměny mají něco revolučního.</h3>
                    <p>Finanční transakce jsou rychlejší, anonymější a fungují ve dne v noci. Technologie <strong>blockchain</strong> dokáže zcela nahradit monitorované a laxní bankovní systémy. A jako bonus je tato měna uznavaná <strong>celosvětově</strong>.</p>
                    <div class="btn-wrap top-gap-medium">
                        <a href="/znalostni-baze" class="btn btn-primary">Chci vedět víc</a>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <div class="bs-block bs-block-image bs-image-bitcoin bs-big-padding text-center">
        <section class="container">
            <div class="before-title">Nákup a prodej kryptoměny</div>
            <h2 class="module-title large-border color-third">Jednoduché kroky jak začít</h2>
            <div class="row top-gap-large">
                <div class="col-xs-12 col-sm-4 col-md-4">
                    <div class="text-box next-step">
                        <div class="icon-box">
                            <i class="iconset iconset-graduation-cap" aria-hidden="true"></i>
                        </div>
                        <h3>Vzdělávání</h3>
                        <p>Každý z nás se naučil chodit, jezdit na kole nebo plavat. Každá věc na světě potřebuje nějaké znalosti, které se zíkávají čtením, posloucháním nebo praxí. Naštěstí kryptoměnám porozumí téměř každý.</p>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-4 col-md-4 top-gap-large-xs">
                    <div class="text-box next-step">
                        <div class="icon-box">
                            <i class="iconset iconset-bitcoin" aria-hidden="true"></i>
                        </div>
                        <h3>Směna kryptoměny</h3>
                        <p>Většina z nás určitě byla na dovolené a došly nám peníze. Ano, české koruny jsme museli vyměnit za lokální FIAT měnu. Kryptoměna funguje na stejném principu, jen místo hmotných peněz dostaneme digitální.</p>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-4 col-md-4 top-gap-large-xs">
                    <div class="text-box">
                        <div class="icon-box">
                            <i class="iconset iconset-line-chart" aria-hidden="true"></i>
                        </div>
                        <h3>Investice / Obchodování</h3>
                        <p>Na různých burzách můžeme obchodovat měnové páry jako jsou USD/EUR, JPY/GBP apod. Kryptoměna má stejné měnové páry s tím rozdílem, že měníme hlavní měnu Bitcoin za některé altcoiny, které si vybereme. </p>
                    </div>
                </div>
            </div>
            <div class="top-gap-large">
                <a href="/akademie" class="btn btn-third">Vstoupit do akademie</a>
            </div>
        </section>
    </div>
    <div class="bs-block bs-big-padding">
        <section class="container">
            <h2 class="text-center module-title large-border">Co je nového ve světě kryptoměn?</h2>
            <div class="top-gap-large">
                <ul class="post-list btn-hidden">
                    <?php $the_query = new WP_Query('posts_per_page=3'); ?>
                    <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
                        <li class="post">
                            <div class="post-image">
                                <?php echo get_the_post_thumbnail($post->ID, 'large'); ?> 
                            </div>
                            <header class="post-header">
                                <?php if ('post' == get_post_type()) : ?>
                                    <div class="post-meta">
                                        <?php understrap_posted_on(); ?>
                                    </div>
                                <?php endif; ?>
                                <?php the_title(sprintf('<h3 class="post-title"><a href="%s" rel="bookmark">', esc_url(get_permalink())), '</a></h3>'); ?>
                            </header>
                            <div class="post-content">
                                <?php
                                the_excerpt();
                                ?>
                                <?php
                                wp_link_pages(array(
                                    'before' => '<div class="page-links">' . __('Pages:', 'understrap'),
                                    'after' => '</div>',
                                ));
                                ?>
                            </div>
                        </li>
                        <?php
                    endwhile;
                    wp_reset_postdata();
                    ?>
                </ul>
            </div>
            <div class="btn-wrap text-center top-gap-medium">
                <a href="<?php echo __('/aktualne', 'fresh') ?>" class="btn btn-primary"><?php echo __('Zobrazit aktuality', 'fresh') ?></a>
            </div>
        </section>
    </div>
    <div class="bs-block bs-big-padding bg-black bs-image-yes">
        <section class="container">
            <div class="row entry-content">
                <div class="col-xs-12 col-sm-12 col-md-6">
                    <div class="before-title">Kryptoměny v číslech</div>
                    <h2 class="module-title color-third">Vše o kryptoměnách</h2>
                    <p>Ve světě investování a obchodování hrají informace zásadní roli v procesu rozhodování. Ukážu vám, kde a jak informace získat, a podle čeho posoudit jejich důvěryhodnost. Kryptoměny jsou budoucnost, minimálně jejich revoluční technologie!</p>
                    <div class="btn-wrap top-gap-large">
                        <a href="/rozbory-coinu" class="btn btn-third">Získat informace</a>
                    </div>
                </div>
            </div>
        </section>
        <img data-original="<?php imagesUrl('monitor-with-coinmarketcap.png'); ?>" src="<?php imagesUrl('lazyload.png'); ?>" src="" class="lazy-load" alt="coinmarketcap">
        <noscript><img src="<?php imagesUrl('monitor-with-coinmarketcap.png'); ?>" alt="coinmarketcap"></noscript>
    </div>
</main>
<?php get_footer(); ?>