<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Tenzin_News_Magazine
 */

?>
    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <div class="entry-content editor-content">
            <?php
            the_content(
                sprintf(
                    wp_kses(
                        /* translators: %s: Name of current post. Only visible to screen readers */
                        __( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'tenzin-news-magazine' ),
                        array(
                            'span' => array(
                                'class' => array(),
                            ),
                        )
                    ),
                    wp_kses_post( get_the_title() )
                )
            );

            wp_link_pages(
                array(
                    'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'tenzin-news-magazine' ),
                    'after'  => '</div>',
                )
            );
            ?>
        </div><!-- .entry-content -->

        <footer class="entry-footer entry-footer--single">
            <?php tenzin_news_magazine_entry_single_footer(); ?>
        </footer><!-- .entry-footer -->
    </article><!-- #post-<?php the_ID(); ?> -->
