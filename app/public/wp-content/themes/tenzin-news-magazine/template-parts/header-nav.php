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
    $attr_color = '#000;';
    $header_nav_style = get_theme_mod('crt_manage_header_nav_style');
    $header_type = get_theme_mod('crt_manage_header_type');
    if($header_nav_style == 'bg-color' && $header_type != 'v3') {
        $attr_color = '#FFF';
    }
?>
<?php  ?>
<nav class="nav__desktop" role="navigation" itemscope itemtype="https://schema.org/SiteNavigationElement">
    <?php
    if ( has_nav_menu( 'primary' ) ) {
        wp_nav_menu(
            array(
                'container' => false,
                'theme_location' => 'primary',
            )
        );
    } else {
        echo '<ul><li style="color: '.$attr_color.'">'.sprintf(__('Go to <a href="%s">Appearance > Menu</a> to set "Primary Menu"','tenzin-news-magazine'),get_admin_url('','nav-menus.php')).'</li></ul>';
    }
    ?>
</nav>
