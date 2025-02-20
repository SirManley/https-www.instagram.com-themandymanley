<?php
/**
 * The template for displaying item product content in home page template
*/
defined( 'ABSPATH' ) || exit;
?>
<div class="product__item" data-id="<?php echo esc_attr(get_the_ID()); ?>">
    <div class="product__item--inner">
        <figure class="ratio ratio-4x3 lazy" data-src="<?php echo esc_attr(get_the_post_thumbnail_url( get_the_ID() )); ?>">
            <div class="product__content">
                <?php
                    woocommerce_template_loop_product_title();
                    woocommerce_template_loop_price();
                ?>
                <div class="product__categories">
                    <?php
                        $cat = wc_get_product_category_list(get_the_ID(), '/ ');
                        echo $cat;
                    ?>
                </div>
                <div class="product__view">
                    <?php woocommerce_template_loop_product_link_open(); ?><?php esc_html_e( 'View Detail', 'tenzin-news-magazine' ); ?><?php woocommerce_template_loop_product_link_close(); ?>
                </div>
            </div>
        </figure>
    </div>
</div>
