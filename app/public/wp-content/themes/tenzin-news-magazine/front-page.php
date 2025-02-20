<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Tenzin_News_Magazine
 */

get_header();
?>
<?php
    if ( is_front_page() && ! is_home() && crt_manage_plugins_is_active()) :
        do_action('crt_manage_theme_sections');
    elseif ( is_front_page() && is_home() || !crt_manage_plugins_is_active()) :
        require get_template_directory() . '/home.php';
    endif;
?>
<?php
get_footer();
