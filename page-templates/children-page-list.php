<?php
/**
 * Template Name: Children page list
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
            <div class="row text-center-xs">
                <div class="col-xs-12 col-sm-5 col-md-5">
                    <div class="max-count-of-list">
                        <?php the_field("max-count-number-of-list-item") ?> <strong><?php
                            $count = 0;
                            $pages = get_pages("child_of=" . $post->ID);
                            foreach ($pages as $page) {
                                $count++;
                            }
                            echo $count;
                            ?></strong>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-7 col-md-7 top-gap-medium-xs">
                    <?php get_search_form() ?>
                </div>
            </div>
            <ul class="children-page-list"> 
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
                    'orderby' => 'title',
                    'order' => 'ASC'
                );
                query_posts($args);
                if (have_posts()) : while (have_posts()) : the_post();
                        ?>
                        <li class="children-page-list-item">
                            <div class="children-page-list-content">
                                <span class="sort-alphabet js-alphabet"></span>
                                <div class="inner-content">
                                    <h2 class="children-page-list-title"><a href="<?php echo get_permalink($page->ID); ?>" rel="bookmark" title="<?php echo $page->post_title; ?>"><?php the_field('header-title', $page->ID); ?></a></h2>
                                    <div class="children-page-list-exceprt">
                                        <?php
                                        echo wp_trim_words(get_the_content(), 21, '...');
                                        ?>
                                    </div>
                                </div>
                            </div>
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
