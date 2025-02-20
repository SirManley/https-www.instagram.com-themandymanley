<?php
/**
 * Dimitrova Portfolio functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Tenzin_News_Magazine
 */

if ( ! defined( 'TENZIN_NEWS_MAGAZINE_VERSION' ) ) {
	define( 'TENZIN_NEWS_MAGAZINE_VERSION', wp_get_theme()->get( 'Version' ) );
}
if ( ! defined( 'TENZIN_NEWS_MAGAZINE_NAME' ) ) {
    define( 'TENZIN_NEWS_MAGAZINE_NAME', wp_get_theme()->get( 'Name' ) );
}
if ( ! defined( 'TENZIN_NEWS_MAGAZINE_URL_DEMO' ) ) {
    define( 'TENZIN_NEWS_MAGAZINE_URL_DEMO', wp_get_theme()->get( 'ThemeURI' ) );
}
if ( ! defined( 'TENZIN_NEWS_MAGAZINE_URL_DOCS' ) ) {
    define( 'TENZIN_NEWS_MAGAZINE_URL_DOCS', '#' );
}
if ( ! defined( 'TENZIN_NEWS_MAGAZINE_URL_GET_PREMIUM' ) ) {
    define( 'TENZIN_NEWS_MAGAZINE_URL_GET_PREMIUM', '#' );
}
if ( ! defined( 'TENZIN_NEWS_MAGAZINE_ID_THEMES_PREMIUM' ) ) {
    define( 'TENZIN_NEWS_MAGAZINE_ID_THEMES_PREMIUM', 58 );
}

if ( ! function_exists( 'tenzin_news_magazine_setup' ) ) :
    function tenzin_news_magazine_setup() {

        // Add default posts and comments RSS feed links to head.
        add_theme_support( 'automatic-feed-links' );

        add_theme_support( 'title-tag' );

        add_theme_support( 'wp-block-styles' );

        add_theme_support( 'register_block_style' );

        add_theme_support( 'register_block_pattern' );

        add_theme_support( 'post-thumbnails' );

        add_theme_support( 'post-formats', array( 'aside', 'video', 'gallery') );

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

        add_image_size( 'tenzin-news-magazine-image-medium', 600, 9999 );
        add_image_size( 'tenzin-news-magazine-image-large', 1200, 9999 );

        // This theme uses wp_nav_menu() in one location.
        register_nav_menus(
            array(
                'primary' => esc_html__( 'Primary', 'tenzin-news-magazine' ),
            )
        );
        register_nav_menus(
            array(
                'footer' => esc_html__( 'Footer', 'tenzin-news-magazine' ),
            )
        );
    }
endif;
add_action( 'after_setup_theme', 'tenzin_news_magazine_setup' );

function tenzin_news_magazine_image_resizes($sizes){
    unset( $sizes['woocommerce_gallery_thumbnail']);
    unset( $sizes['woocommerce_single']);
    unset( $sizes['thumbnail']);
    unset( $sizes['medium']);
    unset( $sizes['medium_large']);
    unset( $sizes['large']);
    unset( $sizes['1536x1536']);
    return $sizes;
}
add_filter('intermediate_image_sizes_advanced', 'tenzin_news_magazine_image_resizes' );

if ( ! function_exists( 'tenzin_news_magazine_after_active' ) ) :
    function tenzin_news_magazine_after_active() {
        $theme_active = get_option('stylesheet');
        if($theme_active == 'tenzin-news-magazine') {
            set_theme_mod('crt_manage_header_nav_style', 'bg-color');
            set_theme_mod('crt_manage_general_homepage_options', 'home-boxed');
        } elseif ($theme_active == 'times-news-magazine-blog') {
            set_theme_mod('crt_manage_header_type', 'v2');
            set_theme_mod('crt_manage_header_social_style', 'border-line-solid');
            set_theme_mod('crt_manage_header_nav_style', 'bg-color');
            set_theme_mod('crt_manage_header_logo_font', 'Playfair Display');
            set_theme_mod('crt_manage_category_layout', 'masonry-4-columns');
            set_theme_mod('crt_manage_category_sidebar', 'no-sidebar');
            set_theme_mod('crt_manage_single_content_font', 'Raleway');
            set_theme_mod('crt_manage_general_nav_font', 'Oswald');
            set_theme_mod('crt_manage_general_post_heading_font', 'Jost');
            set_theme_mod('crt_manage_hero_v1_type', 'v2');
            set_theme_mod('crt_manage_feature_type', 'v2');
        }
    }
endif;
add_action('after_switch_theme', 'tenzin_news_magazine_after_active');


if ( ! function_exists( 'tenzin_news_magazine_header_style' ) ) :
    /**
     * Styles the header image and text displayed on the blog.
     *
     * @see tenzin_news_magazine_header_style().
     */
    function tenzin_news_magazine_header_style() {
        $header_text_color = get_header_textcolor();

        /*
         * If no custom options for text are set, let's bail.
         * get_header_textcolor() options: Any hex value, 'blank' to hide text. Default: add_theme_support( 'custom-header' ).
         */
        if ( get_theme_support( 'custom-header', 'default-text-color' ) === $header_text_color ) {
            return;
        }

        // If we get this far, we have custom styles. Let's do this.
        ?>
        <style type="text/css">
            <?php
            // Has the text been hidden?
            if ( ! display_header_text() ) :
                ?>
            .site-title,
            .site-description {
                position: absolute;
                clip: rect(1px, 1px, 1px, 1px);
                color: red !important;
            }
            <?php
            // If the user has set a custom color for the text use that.
        else :
            ?>
            .site-title a,
            .site-description {
                color: #<?php echo esc_attr( $header_text_color ); ?>;
            }
            <?php endif; ?>
        </style>
        <?php
    }
endif;

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function tenzin_news_magazine_content_width() {
    $GLOBALS['content_width'] = apply_filters( 'tenzin_news_magazine_content_width', 640 );
}
add_action( 'after_setup_theme', 'tenzin_news_magazine_content_width', 0 );


/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function tenzin_news_magazine_widgets_init() {
    register_sidebar(
        array(
            'name'          => esc_html__( 'Sidebar Front Page', 'tenzin-news-magazine' ),
            'id'            => 'sidebar-1',
            'description'   => esc_html__( 'Add widgets here.', 'tenzin-news-magazine' ),
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget'  => '</section>',
            'before_title'  => '<h2 class="widget-title">',
            'after_title'   => '</h2>',
        )
    );

    register_sidebar(
        array(
            'name'          => esc_html__( 'Sidebar Inner 1', 'tenzin-news-magazine' ),
            'id'            => 'sidebar-2',
            'description'   => esc_html__( 'Add widgets here.', 'tenzin-news-magazine' ),
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget'  => '</section>',
            'before_title'  => '<h2 class="widget-title">',
            'after_title'   => '</h2>',
        )
    );

    register_sidebar(
        array(
            'name'          => esc_html__( 'Sidebar Inner 2', 'tenzin-news-magazine' ),
            'id'            => 'sidebar-3',
            'description'   => esc_html__( 'Add widgets here.', 'tenzin-news-magazine' ),
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget'  => '</section>',
            'before_title'  => '<h2 class="widget-title">',
            'after_title'   => '</h2>',
        )
    );

    register_sidebar(
        array(
            'name'          => esc_html__( 'Sidebar Inner 3', 'tenzin-news-magazine' ),
            'id'            => 'sidebar-4',
            'description'   => esc_html__( 'Add widgets here.', 'tenzin-news-magazine' ),
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget'  => '</section>',
            'before_title'  => '<h2 class="widget-title">',
            'after_title'   => '</h2>',
        )
    );

    register_sidebar(
        array(
            'name'          => esc_html__( 'Sidebar Inner 4', 'tenzin-news-magazine' ),
            'id'            => 'sidebar-5',
            'description'   => esc_html__( 'Add widgets here.', 'tenzin-news-magazine' ),
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget'  => '</section>',
            'before_title'  => '<h2 class="widget-title">',
            'after_title'   => '</h2>',
        )
    );

    register_sidebar(
        array(
            'name'          => esc_html__( 'Sidebar Inner 5', 'tenzin-news-magazine' ),
            'id'            => 'sidebar-6',
            'description'   => esc_html__( 'Add widgets here.', 'tenzin-news-magazine' ),
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget'  => '</section>',
            'before_title'  => '<h2 class="widget-title">',
            'after_title'   => '</h2>',
        )
    );

    register_sidebar(
        array(
            'name'          => esc_html__( 'Sidebar Inner 6', 'tenzin-news-magazine' ),
            'id'            => 'sidebar-7',
            'description'   => esc_html__( 'Add widgets here.', 'tenzin-news-magazine' ),
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget'  => '</section>',
            'before_title'  => '<h2 class="widget-title">',
            'after_title'   => '</h2>',
        )
    );

    register_sidebar(
        array(
            'name'          => esc_html__( 'Sidebar E-Commerce', 'tenzin-news-magazine' ),
            'id'            => 'sidebar-e-commerce',
            'description'   => esc_html__( 'Add widgets here.', 'tenzin-news-magazine' ),
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget'  => '</section>',
            'before_title'  => '<h2 class="widget-title">',
            'after_title'   => '</h2>',
        )
    );

}
add_action( 'widgets_init', 'tenzin_news_magazine_widgets_init' );


/**
 * Enqueue scripts and styles.
 */
function tenzin_news_magazine_scripts() {
    wp_enqueue_style( 'tenzin-news-magazine-style', get_template_directory_uri() . '/style.css', array(), TENZIN_NEWS_MAGAZINE_VERSION );
    // Main style.
    wp_enqueue_style( 'tenzin-news-magazine-main-style', get_template_directory_uri() . '/assets/build/css/main.min.css', array(), TENZIN_NEWS_MAGAZINE_VERSION );

    // Main script.
    wp_enqueue_script( 'tenzin-news-magazine-main-script', get_template_directory_uri() . '/assets/build/js/main.bundle.js', array( 'jquery' ), TENZIN_NEWS_MAGAZINE_VERSION, true );

    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
}
add_action( 'wp_enqueue_scripts', 'tenzin_news_magazine_scripts' );



function tenzin_news_magazine_dynamic_front_end_css() {
    $heading_style = get_theme_mod('crt_manage_heading_style', 'center');
    $heading_line_color = get_theme_mod('crt_manage_heading_line_color', '#000');
    $heading_line_size = get_theme_mod('crt_manage_heading_line_size', '1px');
    $heading_font = get_theme_mod('crt_manage_general_heading_font', 'Oswald');
    $heading_size = get_theme_mod('crt_manage_general_heading_size', '36px');
    $heading_transform = get_theme_mod('crt_manage_general_heading_transform', 'uppercase');
    $heading_letter_spacing = get_theme_mod('crt_manage_general_heading_letter_spacing', '0px');
    $heading_sub_font = get_theme_mod('crt_manage_general_heading_sub_font', 'Oswald');
    $heading_sub_size = get_theme_mod('crt_manage_general_heading_sub_size', '12px');
    $heading_sub_transform = get_theme_mod('crt_manage_general_heading_sub_transform', 'uppercase');
    $heading_sub_letter_spacing = get_theme_mod('crt_manage_general_heading_sub_letter_spacing', '0px');
    $header_nav_transform = get_theme_mod('crt_manage_general_nav_transform', 'uppercase');

    $heading_size_h1 = get_theme_mod('crt_manage_general_heading_size_1', '2.5rem');
    $heading_size_h2 = get_theme_mod('crt_manage_general_heading_size_2', '2rem');
    $heading_size_h3 = get_theme_mod('crt_manage_general_heading_size_3', '1.75rem');
    $heading_size_h4 = get_theme_mod('crt_manage_general_heading_size_4', '1.5rem');
    $heading_size_h5 = get_theme_mod('crt_manage_general_heading_size_5', '1.25rem');
    $heading_size_h6 = get_theme_mod('crt_manage_general_heading_size_6', '1rem');
    $custom_css = '';
    $custom_css .= ' :root {
                    .heading-default {
                       --heading-style: '. esc_attr( $heading_style ) .';
                       --heading-line-color: '. esc_attr( $heading_line_color ) .';
                       --heading-line-size: '. esc_attr( $heading_line_size ) .';
                       --heading-font-family: "'. esc_attr( $heading_font ) .'", serif;
                       --heading-font-size: '. esc_attr( $heading_size ) .';
                       --heading-font-transform: '. esc_attr( $heading_transform ) .';
                       --heading-font-letter-spacing: '. esc_attr( $heading_letter_spacing ) .';
                       --heading-sub-font-family: "'. esc_attr( $heading_sub_font ) .'", serif;
                       --heading-sub-font-size: '. esc_attr( $heading_sub_size ) .';
                       --heading-sub-font-transform: '. esc_attr( $heading_sub_transform ) .';
                       --heading-sub-font-letter-spacing: '. esc_attr( $heading_sub_letter_spacing ) .';
                    }
                    --header-nav-transform: '. esc_attr( $header_nav_transform ) .';
                    --var-heading-h1: '. esc_attr( $heading_size_h1 ) .';
                    --var-heading-h2: '. esc_attr( $heading_size_h2 ) .';
                    --var-heading-h3: '. esc_attr( $heading_size_h3 ) .';
                    --var-heading-h4: '. esc_attr( $heading_size_h4 ) .';
                    --var-heading-h5: '. esc_attr( $heading_size_h5 ) .';
                    --var-heading-h6: '. esc_attr( $heading_size_h6 ) .';
                }';
    wp_register_style( 'tenzin-news-magazine-style-inline', false );
    wp_enqueue_style( 'tenzin-news-magazine-style-inline' );
    wp_add_inline_style( 'tenzin-news-magazine-style-inline', $custom_css );
}
add_action( 'wp_enqueue_scripts', 'tenzin_news_magazine_dynamic_front_end_css' );

/**
 * Include wptt webfont loader.
 */
require_once get_theme_file_path( 'inc/wptt-webfont-loader.php' );

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Dynamic CSS
 */
require get_template_directory() . '/inc/dynamic-css.php';

/**
 * Breadcrumb
 */
require get_template_directory() . '/inc/class-breadcrumb-trail.php';

/**
 * Recommended Plugins
 */
require get_template_directory() . '/inc/tgmpa/recommended-plugins.php';


/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
    require get_template_directory() . '/inc/jetpack.php';
}
/**
 * Woocommerce.
 */
if ( class_exists( 'WooCommerce' ) ) {
    require get_template_directory() . '/inc/woocommerce.php';
}

if ( ! function_exists( 'tenzin_news_magazine_is_woocommerce' ) ) {
    function tenzin_news_magazine_is_woocommerce() {
        if(class_exists( 'WooCommerce' )) {
            return true;
        }
        return false;
    }
}
/**
 * CRT Manage is active.
 */
if ( ! function_exists( 'crt_manage_plugins_is_active' ) ) {
    function crt_manage_plugins_is_active() {
        if(class_exists( 'CRT_Manage_Base' )) {
            return true;
        }
        return false;
    }
}
