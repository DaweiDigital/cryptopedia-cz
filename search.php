<?php
/**
 * The template for displaying search results pages.
 *
 * @package understrap
 */
get_header();
?>
<main id="main" class="site-main" role="main">
    <div class="bs-block bs-page-header lazy-bg" data-lazy-bg-lg="<?php echo $lgHeader; ?>" data-lazy-bg-md="<?php echo $mdHeader; ?>" data-lazy-bg-sm="<?php echo $smHeader; ?>" data-lazy-bg-xs="<?php echo $xsHeader; ?>" style="background-image:url()">
        <section class="container">
            <h1><?php printf(__('Hledali jste: %s', 'fresh'), '<span>' . get_search_query() . '</span>'); ?></h1>
            <p><?php the_field("header-description"); ?></p>
        </section>
    </div>
    <div class="bs-block">
        <section class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-7 col-md-7 col-lg-8">
                    <?php if (have_posts()) : ?>
                        <?php while (have_posts()) : the_post(); ?>
                            <?php
                            /**
                             * Run the loop for the search to output the results.
                             * If you want to overload this in a child theme then include a file
                             * called content-search.php and that will be used instead.
                             */
                            get_template_part('loop-templates/content', 'search');
                            ?>
                        <?php endwhile; ?>
                    <?php else : ?>
                        <?php get_template_part('loop-templates/content', 'none'); ?>
                    <?php endif; ?>
                </div>
                <div class="col-xs-12 col-sm-5 col-md-5 col-lg-4 hidden-xs" role="complementary">
                    <aside class="page-aside">
                        <?php dynamic_sidebar('sidebar-1'); ?>
                    </aside>
                </div>
            </div>
            <?php

            function pagination($pages = '', $range = 4) {
                $showitems = ($range * 2) + 1;

                global $paged;
                if (empty($paged))
                    $paged = 1;

                if ($pages == '') {
                    global $wp_query;
                    $pages = $wp_query->max_num_pages;
                    if (!$pages) {
                        $pages = 1;
                    }
                }

                if (1 != $pages) {
                    echo "<nav class=\"pagination-navi\">";
                    if ($paged > 2 && $paged > $range + 1 && $showitems < $pages)
                        echo "<a href='" . get_pagenum_link(1) . "' class='page-first'>První</a>";

                    if ($paged > 1)
                        echo "<a href='" . get_pagenum_link($paged - 1) . "' class=\"pagination-control pagi-prev\">Předchozí</a>";

                    for ($i = 1; $i <= $pages; $i++) {
                        if (1 != $pages && (!($i >= $paged + $range + 1 || $i <= $paged - $range - 1) || $pages <= $showitems )) {
                            echo ($paged == $i) ? "<span class=\"pagination-link current\">" . $i . "</span>" : "<a href='" . get_pagenum_link($i) . "' class=\"pagination-link inactive\">" . $i . "</a>";
                        }
                    }
                    echo "<a href=\"" . get_pagenum_link($paged + 1) . "\" class=\"pagination-control pagi-next\">Další</a>";


                    if ($paged < $pages - 1 && $paged + $range - 1 < $pages && $showitems < $pages)
                        echo "<a href='" . get_pagenum_link($pages) . "' class='page-last'>Poslední</a>";
                    echo "</nav>\n";
                }
            }
            ?>
            <div class="pagination">
                <?php
                if (function_exists("pagination")) {
                    pagination($custom_query->max_num_pages);
                }
                ?>
            </div>
            <?php wp_reset_query(); ?>
        </section>
    </div>
</main>

<?php get_footer(); ?>