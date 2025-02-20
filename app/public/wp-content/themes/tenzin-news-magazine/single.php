<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Tenzin_News_Magazine
 */

get_header();
?>
<?php
    $thumbnail = get_theme_mod('crt_manage_single_thumbnail', 'outer-thumb');
    $args = tenzin_news_archive_layout();
    $col_one = $args['col_one'];
    $col_two = $args['col_two'];
    $sidebar_position = $args['sidebar'];
    $related_layout = $args['layout'];
    $layout = get_theme_mod('crt_manage_single_sidebar', 'right-sidebar');
    if(get_post_format() == 'aside') {
        $layout = 'right-sidebar';
    }
?>
<main  class="site-main single-<?php echo esc_attr($layout); ?>" itemscope="" itemtype="https://schema.org/CreativeWork">
    <section class="block-content">
        <div class="container">
            <?php if($thumbnail == 'outer-thumb'): tenzin_news_magazine_post_thumbnail(); endif; ?>
            <div class="single-page-heading border-left-right p-lg-4 border-md-none border-sm-none">
                <div class="row">
                    <div class="col-12 text-center pt-2">
                        <div class="breadcrumb-option">
                            <?php do_action('tenzin_news_magazine_breadcrumb'); ?>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="single-heading-default pb-2">
                            <?php the_title( '<h1 class="single-heading-default__title text-center">', '</h1>' ); ?>
                            <?php
                            $post_id = get_the_ID();
                            $entry_date_format = get_theme_mod('crt_manage_entry_date_format', 'F d, Y');
                            $date = date($entry_date_format, strtotime(get_the_date()));
                            ?>
                            <div class="entry entry_color">
                                <span class="entry__date"><?php tenzin_news_magazine_entry_category($post_id) ?></span>
                                <span class="entry__date"><?php echo esc_html($date); ?></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="border-left-right p-lg-4 p-md-3 p-0 pb-lg-5 border-md-none border-sm-none">
                <div class="row">
                    <div class="<?php echo esc_attr($col_one); ?>">
                        <?php if($thumbnail == 'inner-thumb'): tenzin_news_magazine_post_thumbnail(); endif; ?>
                        <?php
                        while ( have_posts() ) :
                            the_post();

                            get_template_part( 'template-parts/content', 'single' );

                            do_action( 'tenzin_news_magazine_post_navigation' );

                            do_action( 'tenzin_news_magazine_author', $post );

                            // Related Posts
                            if ( is_singular( 'post' ) ) {
                                $related_heading = get_theme_mod( 'crt_manage_single_related_heading', __( 'Related Posts', 'tenzin-news-magazine' ) );
                                $grid = str_contains($related_layout, 'masonry');
                                $cat_content_id      = get_the_category( $post->ID )[0]->term_id;
                                $args                = array(
                                    'cat'            => $cat_content_id,
    //                                'posts_per_page' => 3,
                                    'post__not_in'   => array( $post->ID ),
                                    'orderby'        => 'rand',
                                );
                                $query               = new WP_Query( $args );
                                if ( $query->have_posts() ) :
                                    ?>
                                    <div class="related-posts">
                                        <h2><?php echo esc_html( $related_heading ); ?></h2>
                                        <div class="<?php echo esc_attr($grid ? 'grid':'row') ?>">
                                            <?php
                                                while ( $query->have_posts() ) :
                                                $query->the_post();
                                                get_template_part( 'template-parts/content', $related_layout );
                                                endwhile;
                                                wp_reset_postdata();
                                            ?>
                                        </div>
                                    </div>
                                    <?php
                                endif;
                            }

                            // If comments are open or we have at least one comment, load up the comment template.
                            if ( comments_open() || get_comments_number() ) :
                                comments_template();
                            endif;

                        endwhile; // End of the loop.
                        ?>

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

                </div>
            </div>
        </div>
    </section>
</main><!-- #main -->

<?php
get_footer();
