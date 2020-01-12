<?php
/**
 * Template Name: Academy list
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
    <div class="bs-block bg-grey-color">
        <section class="container">
            <div class="h2">Lehounká teorie <span>pro všechny</span></div>
            <ul class="online-academy-list"> 
                <?php
                $ids = array();
                $pages = get_pages("child_of=" . $post->ID);
                if ($pages) {
                    foreach ($pages as $page) {
                        $ids[] = $page->ID;
                    }
                }
                $paged = (get_query_var("paged")) ? get_query_var("paged") : 1;
                $args = array(
                    "paged" => $paged,
                    "post__in" => $ids,
                    "posts_per_page" => 8,
                    "post_type" => "page",
                    "orderby" => "menu_order",
                    "order" => "ASC"
                );
                query_posts($args);
                if (have_posts()) : while (have_posts()) : the_post();
                        ?>
                        <li class="online-academy-list-item">
                            <div class="online-academy-list-content">
                                <div class="online-academy-thumb">
                                    <?php echo get_the_post_thumbnail($post->ID, 'large'); ?>
                                </div>
                                <div class="inner-content">
                                    <h2 class="online-academy-list-title">
                                        <?php the_field('header-title', $page->ID); ?>
                                    </h2>
                                    <div class="online-academy-list-exceprt">
                                        <?php
                                        the_field('small-description', $page->ID);
                                        ?>
                                    </div>
                                    <span class="btn btn-primary">Přejít do akademie</span>
                                </div>
                            </div>
                            <a href="<?php echo get_permalink($page->ID); ?>" rel="bookmark" class="online-academy-link"></a>
                        </li>
                        <?php
                    endwhile;
                else:
                    ?>
                <?php endif; ?>
            </ul>
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
    <?php get_template_part('loop-templates/cta-block', 'page'); ?>
</main>
<?php get_footer(); ?>
