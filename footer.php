<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package understrap
 */
?>

<footer class="site-footer" role="contentinfo">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
                <?php dynamic_sidebar('footer-widget-one'); ?>
            </div> 
            <div class="col-xs-12 col-sm-6 col-md-2 col-lg-2 top-gap-medium-xs">
                <?php dynamic_sidebar('footer-widget-two'); ?>
            </div> 
            <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 top-gap-medium-xs top-gap-big-sm clear-left-sm">
                <?php dynamic_sidebar('footer-widget-three'); ?>
            </div> 
            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4 top-gap-medium-xs top-gap-big-sm">
                <?php dynamic_sidebar('footer-widget-four'); ?>
            </div> 
        </div>
    </div>
    <div class="footer-conditions text-center">
        <div class="website-conditions">
            &copy; <?php echo date('Y'); ?> <?php echo get_bloginfo(); ?>. <?php echo __('Všechna práva vyhrazena.', 'fresh') ?>
        </div>
        <address class="website-developers">
            <a href="http://www.mr-davidadam.cz" target="_blank" rel="external">
                Frontend Developer David Adam
            </a>
        </address>
    </div>
</footer>
<div class="overlay js-overlay"></div>
<div class="scroll-top js-scroll-top"></div>
<div class="adblock-content adblock-detect js-adblock-detect">
    <div class="aside-title js-show-aside-content">
        Aktivní AdBlock
    </div>
    <div class="content">
        <span class="close-aside-content js-hide-aside-content">Zavřít</span>
        <span class="title">Adblock je zapnutý</span>
        <p>Tento web používá reklamy jako monetizaci obsahu pro její chod. 
            Nejsou tu žádné pasti na uživatele typu vyskakovací okna a podobně. 
            Pokud máte rádi tento web stačí ho podpořit tím, že si v Adblocku nastavíte vyjímku 
            pro tento web Cryptopedia.cz. Děkuji mockrát :-)
        </p>
    </div>
</div>
<div class="fixed-bottom-content js-manipulate js-adblock-nodetect">
    <span class="close-that js-close-that">Zavřít reklamu</span>
    <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- Pop up Advert -->
<ins class="adsbygoogle"
     style="display:inline-block;width:300px;height:250px"
     data-ad-client="ca-pub-1320064309559220"
     data-ad-slot="5147914970"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>
</div>
<?php wp_footer(); ?>
<?php if (strpos(SITE_URL, 'localhost') == FALSE || strpos(SITE_URL, 'beta') == FALSE) : ?>
    <script src="http://localhost:35729/livereload.js"></script>
<?php endif; ?>
<script type="text/javascript">

// Function called if AdBlock is not detected
    function adBlockNotDetected() {
        $(".js-adblock-nodetect").addClass("show-that");
    }
// Function called if AdBlock is detected
    function adBlockDetected() {
        $(".js-adblock-detect").addClass("show-that");
    }

// We look at whether FuckAdBlock already exists.
    if (typeof fuckAdBlock !== 'undefined' || typeof FuckAdBlock !== 'undefined') {
        // If this is the case, it means that something tries to usurp are identity
        // So, considering that it is a detection
        adBlockDetected();
    } else {
        // Otherwise, you import the script FuckAdBlock
        var importFAB = document.createElement('script');
        importFAB.onload = function() {
            // If all goes well, we configure FuckAdBlock
            fuckAdBlock.onDetected(adBlockDetected)
            fuckAdBlock.onNotDetected(adBlockNotDetected);
        };
        importFAB.onerror = function() {
            // If the script does not load (blocked, integrity error, ...)
            // Then a detection is triggered
            adBlockDetected();
        };
        importFAB.integrity = 'sha256-xjwKUY/NgkPjZZBOtOxRYtK20GaqTwUCf7WYCJ1z69w=';
        importFAB.crossOrigin = 'anonymous';
        importFAB.src = 'https://cdnjs.cloudflare.com/ajax/libs/fuckadblock/3.2.1/fuckadblock.min.js';
        document.head.appendChild(importFAB);
    }
</script>
<script async src="//static.zotabox.com/a/1/a13567e33f98b96ce34380e6cdda278a/widgets.js"></script>
</body>
</html>
