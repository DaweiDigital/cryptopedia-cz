<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package understrap
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-touch js-disable">
    <head>
        <meta charset="<?php bloginfo('charset'); ?>">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="mobile-web-app-capable" content="yes">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="apple-mobile-web-app-title" content="<?php bloginfo('name'); ?> - <?php bloginfo('description'); ?>">
        <link rel="profile" href="http://gmpg.org/xfn/11">
        <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
        <?php wp_head(); ?>
        <style>.async-hide { opacity: 0 !important} </style>
        <script>(function(a, s, y, n, c, h, i, d, e) {
                s.className += ' ' + y;
                h.start = 1 * new Date;
                h.end = i = function() {
                    s.className = s.className.replace(RegExp(' ?' + y), '')
                };
                (a[n] = a[n] || []).hide = h;
                setTimeout(function() {
                    i();
                    h.end = null
                }, c);
                h.timeout = c;
            })(window, document.documentElement, 'async-hide', 'dataLayer', 4000,
                    {'GTM-PMWBD2H': true});
        </script>
        <script>
            (function(i, s, o, g, r, a, m) {
                i['GoogleAnalyticsObject'] = r;
                i[r] = i[r] || function() {
                    (i[r].q = i[r].q || []).push(arguments)
                }, i[r].l = 1 * new Date();
                a = s.createElement(o),
                        m = s.getElementsByTagName(o)[0];
                a.async = 1;
                a.src = g;
                m.parentNode.insertBefore(a, m)
            })(window, document, 'script', 'https://www.google-analytics.com/analytics.js', 'ga');
            ga('create', 'UA-43665098-4', 'auto');
            ga('require', 'GTM-PMWBD2H');
            ga('send', 'pageview');
        </script>
        <?php
        if (is_front_page() && is_home()) {
            
        } elseif (is_front_page()) {
            
        } elseif (is_home()) {
            
        } else {
            ;
            ?>
            <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
            <script>
            (adsbygoogle = window.adsbygoogle || []).push({
                google_ad_client: "ca-pub-1320064309559220",
                enable_page_level_ads: true
            });
            </script>
            <?php
        }
        ;
        ?>
        <script id="Cookiebot" src="https://consent.cookiebot.com/uc.js" data-cbid="41c78297-09ac-4feb-9b59-203a641bc068" type="text/javascript" async></script>
    </head>
    <body <?php body_class(); ?>>
        <?php
        $imageHeader = get_field('background_header_image');
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
        <header class="webiste-header">
            <div class="container">
                <div class="row">
                    <div class="col-xs-6 col-sm-12 col-md-2">
                        <div class="website-brand" itemscope itemtype="https://schema.org/Organization">
                            <a class="website-name-link" href="<?php echo get_bloginfo('url'); ?>" title="<?php echo get_bloginfo('name'); ?>" rel="home" itemprop="url">
                                <span class="website-name" itemprop="name" >Cryptopedia</span>
                            </a>
                        </div>
                    </div>
                    <div class="col-xs-6 col-sm-12 col-md-10">
                        <nav class="site-navigation" itemscope="itemscope" itemtype="http://schema.org/SiteNavigationElement">
                            <div class="navbar navbar-default">
                                <div class="navbar-header">
                                    <!-- .navbar-toggle is used as the toggle for collapsed navbar content -->
                                    <button type="button" class="navbar-toggle">
                                        <span class="sr-only">Menu</span>
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                    </button>
                                </div>
                                <div class="navbar-responsive">
                                    <span class="close-navi js-close"></span>
                                    <!-- The WordPress Menu goes here -->
                                    <?php
                                    wp_nav_menu(
                                            array(
                                                'theme_location' => 'primary',
                                                'container_class' => 'navbar-container',
                                                'menu_class' => 'nav navbar-nav',
                                                'fallback_cb' => '',
                                                'menu_id' => 'main-menu',
                                                'walker' => new fresh_bootstrap_navwalker()
                                            )
                                    );
                                    ?>
                                </div>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
        </header>