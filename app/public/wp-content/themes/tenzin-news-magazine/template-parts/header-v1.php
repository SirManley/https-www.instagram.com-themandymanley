<?php
/**
 * Template part for displaying a message that posts cannot be found
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Tenzin_News_Magazine
 */
?>
<?php
    $class_header = '';
    $header_type = get_theme_mod('crt_manage_header_type');
    if($header_type) {
        $class_header .= 'header__' . $header_type;
    }
    $header_container = get_theme_mod('crt_manage_header_nav_full_width');
    $class_header .=  $header_container ? ' header__fullwidth':' header__inner';
    $header_nav_style = get_theme_mod('crt_manage_header_nav_style');
    if($header_nav_style) {
        $class_header .= ' header__' . $header_nav_style;
    }
?>
<header class="head <?php echo esc_attr($class_header); ?>">
    <div class="head__row">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-3 mb-md-0 mb-3 d-none d-md-block">
                    <div class="head__social text-center text-md-start m-auto m-md-0">
                        <label class="head__social--title"><?php esc_html_e( 'Social', 'tenzin-news-magazine' ); ?></label>
                        <?php $header_social_intro = get_theme_mod('crt_manage_header_social_intro'); ?>
                        <?php get_template_part( 'template-parts/header-social', '', array('class' => 'justify-content-start', 'style' => '') ); ?>
                        <p class="head__social--description"><?php echo esc_html($header_social_intro); ?></p>
                    </div>
                </div>
                <div class="col-2 d-flex d-md-none">
                    <a class="toggle-menu" href="#">
                        <span class="fa-navicon__custom"><i></i></span>
                    </a>
                </div>
                <div class="col-8 col-md-6">
                    <div class="head__logo">
                        <?php if ( has_custom_logo() ) : ?>
                            <div class="site-logo">
                                <?php $logo = wp_get_attachment_url( get_theme_mod( 'custom_logo' ) );?>
                                <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
                                    <?php echo ( is_front_page() || is_home() ) ? '<h1 class="head__sologan">':'<h2 class="head__sologan">'; ?>
                                    <img class="dark" src="<?php echo esc_attr($logo); ?>" alt="<?php bloginfo( 'name' ); ?>">
                                    <?php echo ( is_front_page() || is_home() ) ? '</h1>':'</h2>'; ?>
                                </a>
                            </div>
                        <?php else : ?>
                            <div class="site-identity">
                                <?php if ( is_front_page() || is_home() ) : ?>
                                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><h1 class="head__sologan"><strong><?php bloginfo( 'name' ); ?></strong><?php if(get_bloginfo( 'description' )) { echo '<span>'; bloginfo( 'description' ); echo '</span>';} ?></h1></a>
                                <?php else : ?>
                                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><h2 class="head__sologan"><strong><?php bloginfo( 'name' ); ?></strong><?php if(get_bloginfo( 'description' )) { echo '<span>'; bloginfo( 'description' ); echo '</span>';} ?></h2></a>
                                <?php endif;  ?>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="col-2 d-flex d-md-none justify-content-end search-mobile">
                    <a class="toggle-search" href="#">
                        <i class="fa fa-search"></i>
                    </a>
                    <!--Start form search mobile-->
                    <div class="head__search--mobile">
                        <?php get_search_form(); ?>
                    </div>
                    <!--End form search mobile-->
                </div>
                <div class="col-md-3 d-none d-md-block">
                    <div class="head__datetime text-center text-md-end mb-md-0 mb-3">
                        <h2 class="head__date--the"><?php echo esc_html(date('l')) ?></h2>
                        <div class="head__date--day">
                            <?php
                                $header_date_format = get_theme_mod('crt_manage_header_right_date_format', 'd-m-Y');
                                $header_vol_value = get_theme_mod('crt_manage_header_right_vol', 'Vol <strong>19</strong>');
                            ?>
                            <span><?php echo esc_html(date($header_date_format)) ?></span>
                            <span><?php echo $header_vol_value ?></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="head__row" >
        <div class="<?php echo esc_attr(!$header_container ? 'container':''); ?>">
            <div class="<?php echo esc_attr(!$header_container ? 'row':''); ?> d-none d-md-block">
                <div class="col-md-12">
                    <div class="head__nav">
                        <!--Start Search Form-->
                        <div class="head__left">
                            <div class="head__search">
                                <a class="head__button-search" href="#"><i class="fa fa-search" aria-hidden="true"></i></a>
                                <?php get_search_form(); ?>
                            </div>
                        </div>
                        <!--Start Search Form-->

                        <!--Start navigation desktop-->
                        <?php get_template_part( 'template-parts/header-nav' ); ?>
                        <!--Start navigation desktop-->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php get_template_part( 'template-parts/header-mobile' ); ?>

</header>
