<?php
/**
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

$args = tenzin_news_archive_layout();
$col_one = $args['col_one'];
$col_two = $args['col_two'];
$layout = get_theme_mod('crt_manage_page_sidebar', 'right-sidebar');
$sidebar_position = $args['sidebar'];
$thumbnail = get_theme_mod('crt_manage_page_thumbnail', 'outer-thumb');

?>
<main  class="site-main single-<?php echo esc_attr($layout); ?>">
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
                            <?php tenzin_news_magazine_entry_options(get_post(), array('class' => 'mt-0', 'entry_date' => true, 'entry_cat' => false, 'entry_author' => true)) ?>
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

                            get_template_part( 'template-parts/content', 'page' );

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
