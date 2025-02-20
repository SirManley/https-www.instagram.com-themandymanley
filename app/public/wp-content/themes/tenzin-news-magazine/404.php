<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Tenzin_News_Magazine
 */

get_header();
?>
<main  class="site-main">
    <section class="block-default px-50  bg-grey">
        <div class="container-xl">
            <div class="border-left-right p-lg-4 p-md-3 p-0 border-md-none border-sm-none">
                <div class="row">
                    <div class="col-12">

                        <div class="main__404">
                            <h1 class="main__404--title"><?php echo esc_html( '404', 'tenzin-news-magazine' ); ?></h1>
                            <h3 class="main__404--sub"><?php echo esc_html( 'Page Not Found', 'tenzin-news-magazine' ); ?></h3>
                            <p class="main__404--intro">
                                <?php echo esc_html( "The page requested couldn't be found. This could a spelling error in the URL or a removed page.", 'tenzin-news-magazine' ); ?>
                            </p>
                            <a class="main__404--button" href="<?php echo esc_url(home_url()) ?>"><?php echo esc_html( 'Home Page', 'tenzin-news-magazine' ); ?></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main><!-- #main -->
<?php
get_footer();
