<?php
/**
 * @package understrap
 */
?>
<?php
if (get_field('cta-header')) {
    ?>
    <?php
    $imageCta = get_field('background-image-cta');
    $lgCta = $imageCta['sizes']['background-image-lg'];
    $mdCta = $imageCta['sizes']['background-image-md'];
    $smCta = $imageCta['sizes']['background-image-sm'];
    $xsCta = $imageCta['sizes']['background-image-xs'];

    ;
    ?>
    <div class="bs-block bs-cta-block text-center <?php the_field("cta-class-for-color"); ?> lazy-bg" data-lazy-bg-lg="<?php echo $lgCta; ?>" data-lazy-bg-md="<?php echo $mdCta; ?>" data-lazy-bg-sm="<?php echo $smCta; ?>" data-lazy-bg-xs="<?php echo $xsCta; ?>" style="background-image:url()">
        <section class="container">
            <h2><?php the_field("cta-header"); ?></h2>
            <a href="<?php the_field("cta-link-button"); ?>" class="btn btn-primary"><?php the_field("cta-text-in-button"); ?></a>
        </section>
    </div>
    <?php
}
;
?>