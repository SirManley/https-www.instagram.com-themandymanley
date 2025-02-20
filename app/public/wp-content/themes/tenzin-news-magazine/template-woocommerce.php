<?php
/**
 * Template Name: Woocommerce
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Tenzin_News_Magazine
 */

get_header();
?>
<main  class="site-main">
    <?php do_action('tenzin_news_magazine_archive_header'); ?>
    <section class="custom-block-woo">
        <div class="container">
            <div class="border-left-right p-lg-4 p-md-3 p-0 pb-lg-5 border-md-none border-sm-none">
                <div class="row">
                    <div class="col-12">
                        <?php
                        while ( have_posts() ) :
                            the_post();

                            get_template_part( 'template-parts/content', 'woo' );

                        endwhile; // End of the loop.
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main><!-- #main -->
<?php
get_footer();
