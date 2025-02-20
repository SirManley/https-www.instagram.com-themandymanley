<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Tenzin_News_Magazine
 */

get_header();
?>
<main class="site-main home" id="content">
    <?php if ( is_home() && ! is_front_page() ) : ?>
    <?php do_action('tenzin_news_magazine_archive_header'); ?>
    <?php endif; ?>
    <section class="area-category">
        <div class="container">
            <div class="border-left-right p-lg-4 p-md-3 p-0 pb-lg-5 border-md-none border-sm-none">
                <div class="row">
                    <?php
                        $args = tenzin_news_archive_layout();
                        $col_one = $args['col_one'];
                        $col_two = $args['col_two'];
                        $layout = $args['layout'];
                        $grid = str_contains($layout, 'masonry');
                    ?>
                    <div class="<?php echo esc_attr($col_one); ?>">
                        <div class="<?php echo esc_attr($grid ? 'grid':'row') ?>">
                            <?php
                            if ( have_posts() ) :
                                ?>
                                <?php
                                /* Start the Loop */
                                while ( have_posts() ) :
                                    the_post();
                                    /*
                                    * Include the Post-Type-specific template for the content.
                                    * If you want to override this in a child theme, then include a file
                                    * called content-___.php (where ___ is the Post Type name) and that will be used instead.
                                    */
                                    get_template_part( 'template-parts/content', $layout );
                                endwhile;
                            else :
                                get_template_part( 'template-parts/content', 'none' );
                            endif;
                            ?>
                        </div>
                        <?php
                            do_action( 'tenzin_news_magazine_posts_pagination' );
                        ?>
                    </div>
                    <div class="<?php echo esc_attr($col_two); ?>">
                        <?php get_sidebar();?>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main><!-- #main -->
<?php
get_footer();
