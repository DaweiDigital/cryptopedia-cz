<?php
/**
 * Template Name: Aktuální kurzy kryptoměn
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
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <h2 class="text-center central-title">TOP 100</h2>
                        <?php
                        $source = file_get_contents('https://api.coinmarketcap.com/v2/ticker/?convert=CZK&limit=100');
                        $source = json_decode($source, true);

                        echo '<table class="coin-table js-coin-table js-responsive-table">
		<thead>
			<tr>
                                <th>#</th>
				<th>Jméno</th>
                                <th>Market Cap</th>
				<th>Cena v CZK</th>
                                <th>Obchody za 24H</th>
                                <th>Celkové množství</th>
                                <th>% 1H</th>
                                <th>% 24H</th>
                                <th>% 7D</th>
			</tr>
		</thead>
		<tbody>';

                        foreach ($source['data'] as $item) :
                            echo '<tr>';
                            echo '<td><div class="coin-table-rank">' . $item['rank'] . '</div></td>';
                            echo '<td><div class="coin-table-name">' . $item['name'] . '<div class="coin-table-symbol">[' . $item['symbol'] . ']</div></div></td>';
                            echo '<td><div class="coin-table-market-cap js-money-format">' . $item['quotes']['CZK']['market_cap'] . '</div><span class="pointer">CZK</span></td>';
                            echo '<td><div class="coin-table-price js-money-format">' . $item['quotes']['CZK']['price'] . '</div><span class="pointer">CZK</span></td>';
                            echo '<td><div class="coin-table-volume-day js-money-format">' . $item['quotes']['CZK']['volume_24h'] . '</div><span class="pointer">CZK</span></td>';
                            echo '<td><div class="coin-table-total-supply js-money-format">' . $item['total_supply'] . '</div><span class="pointer">' . $item['symbol'] . '</span></td>';
                            echo '<td class="js-change-week"><div class="coin-table-change-week js-week-percent">' . $item['quotes']['CZK']['percent_change_1h'] . '</div><span class="pointer">%</span></td>';
                            echo '<td class="js-change-day"><div class="coin-table-change-day js-day-percent">' . $item['quotes']['CZK']['percent_change_24h'] . '</div><span class="pointer">%</span></td>';
                            echo '<td class="js-change-week"><div class="coin-table-change-week js-week-percent">' . $item['quotes']['CZK']['percent_change_7d'] . '</div><span class="pointer">%</span></td>';
                            echo '</tr>';
                        endforeach;

                        echo '</tbody> </table>';
                        ?>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 top-gap-medium">
                    <div class="monetization-block">
                        <?php get_template_part('loop-templates/advert-footer'); ?>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <?php get_template_part('loop-templates/cta-block', get_post_format()); ?>
</main>
<?php get_footer(); ?>
