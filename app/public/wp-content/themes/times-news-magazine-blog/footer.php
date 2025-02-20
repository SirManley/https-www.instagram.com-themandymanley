<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Tenzin_News_Magazine
 */

?>
<!-- start footer -->
<footer class="footer" itemscope="" itemtype="https://schema.org/WPFooter">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="footer__inner">
                    <div class="row">
                        <div class="col-md-8 offset-md-2 offset-0 pr-md-4">
                            <?php
                                $footer_socials = json_to_array(get_theme_mod('crt_manage_footer_social'));
                                $footer_intro = get_theme_mod('crt_manage_footer_intro');
                                $footer_copyright = get_theme_mod('crt_manage_footer_copyright', '© Copyright 2024, All rights reserved. Design by crthemes.com');
                                $footer_logo = get_theme_mod('crt_manage_footer_logo');
                            ?>
                            <div class="footer__about ps-md-0 pe-md-0 ps-3 pe-3">
                                <div class="footer__about--headline">
                                    <h4 class="head__sologan head__sologan--footer">
                                        <?php if(empty($footer_logo)): ?>
                                            <?php bloginfo( 'name' ); ?>
                                        <?php else: ?>
                                            <img src="<?php echo esc_attr($footer_logo); ?>" title="<?php bloginfo( 'name' ); ?>" />
                                        <?php endif; ?>
                                    </h4>
                                </div>
                                <div class="footer__about--intro">
                                    <?php echo esc_html($footer_intro); ?>
                                </div>
                            </div>
                            <div class="footer__social">
                                <?php if(!empty($footer_socials)) : ?>
                                <ul>
                                    <?php foreach ( $footer_socials as $item ): ?>
                                        <li class="li-<?php echo esc_attr($item['icon_value']) ?>"> <a style="" class="" href="<?php echo esc_attr($item['link']) ?>" target="_blank" rel="alternate" title="<?php echo esc_attr($item['icon_value']) ?>"> <i class="fa <?php echo esc_attr($item['icon_value']) ?>"></i></a></li>
                                    <?php endforeach; ?>
                                </ul>
                                <?php endif; ?>
                            </div>
                            <div class="footer__menu">
                                <?php
                                if ( has_nav_menu( 'footer' ) ) {
                                    wp_nav_menu(
                                        array(
                                            'container' => false,
                                            'theme_location' => 'footer',
                                            'menu_class' => 'footer__menu'
                                        )
                                    );
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="footer__copyright"><?php echo esc_html($footer_copyright); ?></div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- end footer -->
<div class="br br-top"></div>
<div class="br br-bottom"></div>
<div class="br br-left"></div>
<div class="br br-right"></div>

<?php wp_footer(); ?>

</body>
</html>
