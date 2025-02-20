<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package Tenzin_News_Magazine
 */

get_header();
?>
<main  class="site-main">
    <section class="block-default ">
        <div class="container-xl">
            <div class="border-left-right p-lg-4 p-md-3 p-0 pb-lg-5 border-md-none border-sm-none">
                <div class="row">
                    <div class="col-12 text-center">
                        <div class="breadcrumb-option pt-2">
                            <?php do_action('tenzin_news_magazine_breadcrumb'); ?>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="single-heading-default pb-4">
                            <h1 class="single-heading-default__title text-center">
                                <?php
                                /* translators: %s: search query. */
                                printf( esc_html__( 'Search Results for: %s', 'tenzin-news-magazine' ), '<span>' . get_search_query() . '</span>' );
                                ?>
                            </h1>
                        </div>
                    </div>
                </div>
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
                        <div class="archive__inner">
                            <div class="<?php echo esc_attr($grid ? 'grid bor-col-d':'row bor-col-d') ?>">
                                <?php if ( have_posts() ) : ?>
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
