<?php
/**
 * Template part for displaying a message that posts cannot be found
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Tenzin_News_Magazine
 */
$header_socials = json_to_array(get_theme_mod('crt_manage_header_social'));
$header_social_intro = get_theme_mod('crt_manage_header_social_intro');
?>
<div class="header__mobile">
    <div class="d-flex d-md-none">
        <!--Start navigation mobile-->
        <div class="nav__mobile">
            <!-- start menu for mobile -->
            <?php
            if ( has_nav_menu( 'primary' ) ) {
                wp_nav_menu(
                    array(
                        'container' => false,
                        'theme_location' => 'primary',
                    )
                );
            }
            ?>
            <!-- end menu for mobile -->

            <!--Start social mobile-->
            <div class="head__social text-center text-md-left m-auto m-md-0">
                <label class="head__social--title"><?php esc_html_e( 'Social', 'tenzin-news-magazine' ); ?></label>
                <?php get_template_part( 'template-parts/header-social', '', array('class' => 'justify-content-center', 'style' => '') ); ?>
                <p class="head__social--description"><?php echo esc_html($header_social_intro); ?></p>
            </div>
            <!--End social mobile-->

        </div>
        <!--End navigation mobile-->
    </div>
</div>