<?php
    $enable_feature = get_theme_mod('crt_manage_enable_feature_section');
    if(!$enable_feature) {
        return;
    }
    $feature_headline = get_theme_mod('crt_manage_feature_headline', __( 'World', 'tenzin-news-magazine' ));
    $feature_headline_sub = get_theme_mod('crt_manage_feature_headline_sub', __( 'Topics news and opinion', 'tenzin-news-magazine' ));
    $feature_type = get_theme_mod('crt_manage_feature_type', 'v1');
    $class = '';
    if($feature_type == 'v2') {
        $class = 'area-post-five__inner';
    }
?>

<section id="feature" class="area-post-nine">
    <div class="container position-relative">
        <?php crt_manage_section_link( 'Feature' ); ?>
        <div class="border-left-right p-lg-4 p-md-3 p-0 border-md-none border-sm-none <?php echo esc_attr($class); ?>">
            <div class="row">
                <div class="col-md-12">
                    <?php tenzin_news_magazine_heading($feature_headline, $feature_headline_sub); ?>
                </div>
            </div>
            <div class="row bor-col-d">
                <?php get_template_part( 'sections/feature/feature-'. $feature_type ); ?>
            </div>
        </div>
    </div>
</section>
