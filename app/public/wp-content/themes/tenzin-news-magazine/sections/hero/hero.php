<?php
    $enable_hero = get_theme_mod('crt_manage_enable_hero_v1_section');
    if(!$enable_hero) {
        return;
    }
    $hero_type = get_theme_mod('crt_manage_hero_v1_type', 'v1');
    $left_post = get_theme_mod('crt_manage_hero_v1_left_post');
    $center_post = get_theme_mod('crt_manage_hero_v1_center_post');
    $right_post = get_theme_mod('crt_manage_hero_v1_right_post');
    $hero_class = '';
    if($hero_type == 'v1') {
        $hero_class = 'area-feature';
    } elseif($hero_type == 'v2') {
        $hero_class = 'area-feature-second';
    }
?>
<section id="hero-v1" class="<?php echo esc_attr($hero_class); ?>">
    <div class="container position-relative">
        <?php crt_manage_section_link( 'Hero' ); ?>
        <div class="border-left-right p-lg-4 p-md-3 p-0 border-md-none border-sm-none">
            <div class="row bor-col-d">
                <?php get_template_part( 'sections/hero/hero-'. $hero_type ); ?>
            </div>
        </div>
    </div>
</section>


