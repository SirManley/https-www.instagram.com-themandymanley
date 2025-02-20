<?php
/**
 * Times News Magazine Blog functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Times_News_Magazine_Blog
 */

if ( ! defined( 'TIMES_NEWS_MAGAZINE_VERSION' ) ) {
	define( 'TIMES_NEWS_MAGAZINE_VERSION', wp_get_theme()->get( 'Version' ) );
}
if ( ! function_exists( 'times_news_magazine_setup' ) ) :
    function times_news_magazine_setup() {

        // Add default posts and comments RSS feed links to head.
        add_theme_support( 'automatic-feed-links' );

        add_theme_support( 'title-tag' );

        add_theme_support( 'wp-block-styles' );

        add_theme_support( 'register_block_style' );

        add_theme_support( 'register_block_pattern' );

        add_theme_support( 'post-thumbnails' );

        // Add theme support for selective refresh for widgets.
        add_theme_support( 'customize-selective-refresh-widgets' );

        /**
         * Add support for core custom logo.
         *
         * @link https://codex.wordpress.org/Theme_Logo
         */
        add_theme_support(
            'custom-logo',
            array(
                'height'      => 250,
                'width'       => 250,
                'flex-width'  => true,
                'flex-height' => true,
            )
        );

        add_theme_support( 'align-wide' );
        add_theme_support( 'responsive-embeds' );

        add_theme_support( 'html5', array(
            'comment-list',
            'comment-form',
            'search-form',
            'gallery',
            'caption',
        ) );

        // This theme uses wp_nav_menu() in one location.
        register_nav_menus(
            array(
                'primary' => esc_html__( 'Primary', 'times-news-magazine-blog' ),
            )
        );
        register_nav_menus(
            array(
                'footer' => esc_html__( 'Footer', 'times-news-magazine-blog' ),
            )
        );
    }
endif;
add_action( 'after_setup_theme', 'times_news_magazine_setup' );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function times_news_magazine_widgets_init() {
    register_sidebar(
        array(
            'name'          => esc_html__( 'Sidebar Front Page', 'times-news-magazine-blog' ),
            'id'            => 'sidebar-1',
            'description'   => esc_html__( 'Add widgets here.', 'times-news-magazine-blog' ),
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget'  => '</section>',
            'before_title'  => '<h2 class="widget-title">',
            'after_title'   => '</h2>',
        )
    );

}
add_action( 'widgets_init', 'times_news_magazine_widgets_init' );