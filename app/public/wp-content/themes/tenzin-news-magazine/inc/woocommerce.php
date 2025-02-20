<?php
class Dimitrova_Portfolio_Woocommerce
{
    public function __construct() {
        add_action( 'after_setup_theme', array($this, 'tenzin_news_magazine_woocommerce_support') );
        add_filter( 'woocommerce_add_to_cart_fragments', array($this, 'tenzin_news_magazine_woocommerce_refresh_cart_count'));
        add_filter( 'woocommerce_add_to_cart_fragments', array($this, 'tenzin_news_magazine_woocommerce_refresh_cart_side'));
        add_filter( 'woocommerce_product_tabs', array( $this, 'tenzin_news_magazine_unsupported_theme_tab' ) );
        add_action( 'customize_register', array($this, 'tenzin_news_magazine_woocommerce_customize_register') );
        add_action( 'wp_enqueue_scripts', array($this, 'tenzin_news_magazine_woocommerce_scripts') );
        add_action( 'tenzin_news_magazine_mini_cart', array($this, 'tenzin_news_magazine_mini_cart') );
    }

    public function tenzin_news_magazine_woocommerce_support() {
        add_theme_support( 'woocommerce' );
    }

    public function tenzin_news_magazine_woocommerce_refresh_cart_count($fragments){
        ob_start();
        $items_count = WC()->cart->get_cart_contents_count();
        ?>
        <span class="mini-cart-count"><?php echo esc_html($items_count ? $items_count : '0'); ?></span>
        <?php
        $fragments['.mini-cart-count'] = ob_get_clean();
        return $fragments;
    }

    public function tenzin_news_magazine_woocommerce_refresh_cart_side($fragments){
        ob_start();
        $carts = WC()->cart->get_cart();
        ?>
        <div class="side-cart__list">
            <?php
            foreach($carts as $p) {
                ?>
                <div class="side-cart__item">
                    <?php
                    $_product =  wc_get_product( $p['data']->get_id());
                    echo "<b>".$_product->get_title().'</b>  <br> Quantity: '.$p['quantity'].'<br>';
                    $price = get_post_meta($p['product_id'] , '_price', true);
                    echo "  Price: ".$price."<br>";
                    ?>
                </div>
                <?php
            }
            ?>
        </div>
        <?php
        $fragments['.side-cart__list'] = ob_get_clean();
        return $fragments;
    }

    public function tenzin_news_magazine_unsupported_theme_tab($tabs) {
        $tab_description = get_theme_mod('show_tab_description');
        $additional_information = get_theme_mod('show_tab_additional_information');
        $tab_review = get_theme_mod('show_tab_reviews');
        if($tab_description != '1') {
            unset($tabs['description']);
        }
        if($additional_information != '1') {
            unset($tabs['additional_information']);
        }
        if($tab_review != '1') {
            unset($tabs['reviews']);
        }
        return $tabs;
    }

    public function tenzin_news_magazine_woocommerce_customize_register($wp_customize) {
        $wp_customize->add_section( "woocommerce_single_page" ,
            array(
                'title' => esc_html__( 'Single Page', 'tenzin-news-magazine' ),
                'priority' => 20,
                'panel' => 'woocommerce',
            )
        );
        $wp_customize->add_setting(
            'show_tab_description', array(
                'default' => true,
                'sanitize_callback' => 'sanitize_text_field',
            )
        );
        $wp_customize->add_control(
            'show_tab_description', array(
                'label'    => esc_html__( 'Display tab description', 'tenzin-news-magazine' ),
                'type'     => 'checkbox',
                'section'    => 'woocommerce_single_page',
                'priority' => 25,
            )
        );
        $wp_customize->add_setting(
            'show_tab_additional_information', array(
                'default' => true,
                'sanitize_callback' => 'sanitize_text_field',
            )
        );
        $wp_customize->add_control(
            'show_tab_additional_information', array(
                'label'    => esc_html__( 'Display tab additional information', 'tenzin-news-magazine' ),
                'type'     => 'checkbox',
                'section'    => 'woocommerce_single_page',
                'priority' => 25,
            )
        );
        $wp_customize->add_setting(
            'show_tab_reviews', array(
                'default' => true,
                'sanitize_callback' => 'sanitize_text_field',
            )
        );
        $wp_customize->add_control(
            'show_tab_reviews', array(
                'label'    => esc_html__( 'Display tab reviews', 'tenzin-news-magazine' ),
                'type'     => 'checkbox',
                'section'    => 'woocommerce_single_page',
                'priority' => 25,
            )
        );
    }

    public function tenzin_news_magazine_woocommerce_scripts() {
        // Woocommerce.
        wp_enqueue_style( 'tenzin-news-magazine-custom-woocommerce', get_template_directory_uri() . '/assets/css/custom-woocommerce.css', array(), TENZIN_NEWS_MAGAZINE_VERSION );
        if(is_product()) {
            wp_enqueue_style( 'tenzin-news-magazine-fancybox-css', get_template_directory_uri() . '/assets/css/jquery.fancybox.min.css', array(), TENZIN_NEWS_MAGAZINE_VERSION );
            wp_enqueue_script( 'tenzin-news-magazine-ez-plus', get_template_directory_uri() . '/assets/js/jquery.ez-plus.js', array( 'jquery' ), TENZIN_NEWS_MAGAZINE_VERSION, true );
            wp_enqueue_script( 'tenzin-news-magazine-fancybox-js', get_template_directory_uri() . '/assets/js/jquery.fancybox.min.js', array( 'jquery' ), TENZIN_NEWS_MAGAZINE_VERSION, true );
        }
        wp_enqueue_script( 'tenzin-news-magazine-custom-woocommerce', get_template_directory_uri() . '/assets/js/custom-woocommerce.js', array( 'jquery' ), TENZIN_NEWS_MAGAZINE_VERSION, true );
    }

    public function tenzin_news_magazine_mini_cart() {
        ?>
        <?php if(class_exists( 'WPCleverWoofc' )): ?>
            <a class="fly-cart">
        <?php else: ?>
            <a href="<?php echo esc_url( home_url( '/cart' ) ); ?>">
        <?php endif; ?>
            <?php
            $items_count = WC()->cart->get_cart_contents_count();
            ?>
            <i class="fa fa-shopping-cart" aria-hidden="true"></i>
            <span class="mini-cart-count"><?php echo esc_html($items_count ? $items_count : '0'); ?></span>
        </a>
        <?php
    }

}
new Dimitrova_Portfolio_Woocommerce();

