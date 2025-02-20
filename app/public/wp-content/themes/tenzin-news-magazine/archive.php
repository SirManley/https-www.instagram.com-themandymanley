<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Tenzin_News_Magazine
 */

get_header();
?>
<main  class="site-main">
    <?php do_action('tenzin_news_magazine_archive_header'); ?>
    <section class="area-category">
        <div class="container">
            <div class="border-left-right p-lg-4 p-md-3 p-0 pb-lg-5 border-md-none border-sm-none">
                <div class="row bor-col-d">
                    <?php
                        $args = tenzin_news_archive_layout();
                        $col_one = $args['col_one'];
                        $col_two = $args['col_two'];
                        $layout = $args['layout'];
                        $sidebar_position = $args['sidebar'];
                        $grid = str_contains($layout, 'masonry');
                    ?>
                    <div class="<?php echo esc_attr($col_one); ?>">
                        <div class="archive__inner ">
                            <div class="<?php echo esc_attr($grid ? 'grid bor-col-d':'row bor-col-d') ?>">
                                <?php if ( have_posts() ) :
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
                                <?php tenzin_news_magazine_bor_col($layout); ?>
                            </div>
                            <?php
                                do_action( 'tenzin_news_magazine_posts_pagination' );
                            ?>
                        </div>
                    </div>
                    <div class="<?php echo esc_attr($col_two); ?>">
                        <?php
                        if ( ! is_active_sidebar( $sidebar_position ) ) {
//                            return;
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
get_footer();
