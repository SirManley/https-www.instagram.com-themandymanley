<?php
/**
 * The Template for displaying all single products
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://woocommerce.com/document/template-structure/
 * @package     WooCommerce\Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
get_header( 'shop' ); ?>
<main  class="site-main">
	<section class="block-content">
		<div class="container">
            <div class="border-left-right p-lg-4 p-md-3 p-0 pb-lg-5 border-md-none border-sm-none">
                <div class="row bor-col-d">
                    <?php
                        $args = tenzin_news_archive_layout();
                        $col_one = $args['col_one'];
                        $col_two = $args['col_two'];
                        $sidebar_position = $args['sidebar'];
                    ?>
                    <div class="<?php echo esc_attr($col_one); ?>">
                        <?php
                        /**
                         * woocommerce_before_main_content hook.
                         *
                         * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
                         * @hooked woocommerce_breadcrumb - 20
                         */
                        do_action( 'woocommerce_before_main_content' );
                        ?>

                        <?php while ( have_posts() ) : ?>
                                <?php the_post(); ?>

                                <?php wc_get_template_part( 'content', 'single-product' ); ?>

                            <?php endwhile; // end of the loop. ?>

                        <?php
                            /**
                             * woocommerce_after_main_content hook.
                             *
                             * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
                             */
                            do_action( 'woocommerce_after_main_content' );
                        ?>
                    </div>
                    <div class="<?php echo esc_attr($col_two); ?>">
                        <?php
                            if ( ! is_active_sidebar( $sidebar_position ) ) {
//                                return;
                            }
                        ?>
                        <aside id="secondary" class="widget-area">
                            <?php dynamic_sidebar( $sidebar_position ); ?>
                        </aside>
                    </div>
                    <?php if($col_two != 'd-none'): ?>
                        <div class="br-col br-col66 br-sm-col-none"></div>
                    <?php endif; ?>
                </div>
            </div>
		</div>
	</section>
</main><!-- #main -->
<?php
get_footer( 'shop' );

/* Omit closing PHP tag at the end of PHP files to avoid "headers already sent" issues. */
