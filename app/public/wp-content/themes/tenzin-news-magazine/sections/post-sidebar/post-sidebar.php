<?php
    $post_sidebar_enable = get_theme_mod('crt_manage_enable_post_sidebar_section');
    if(!$post_sidebar_enable) {
        return;
    }
    $post_sidebar_heading = get_theme_mod('crt_manage_post_sidebar_headline', __( 'Sports', 'tenzin-news-magazine' ));
    $post_sidebar_heading_sub = get_theme_mod('crt_manage_post_sidebar_headline_sub',  __( 'Topics news and opinion', 'tenzin-news-magazine' ));
    $post_sidebar_type = get_theme_mod('crt_manage_post_sidebar_type', 'v1');
?>

<section id="post-sidebar" class="area-post-sidebar">
    <div class="container position-relative">
        <?php crt_manage_section_link( 'Post Sidebar' ); ?>
        <div class="border-left-right p-lg-4 p-md-3 p-0 border-md-none border-sm-none">
            <div class="row">
                <div class="col-md-12">
                    <?php tenzin_news_magazine_heading($post_sidebar_heading, $post_sidebar_heading_sub); ?>
                </div>
            </div>
            <div class="row bor-col-d">
                <?php get_template_part( 'sections/post-sidebar/post-sidebar-'. $post_sidebar_type ); ?>
            </div>
        </div>
    </div>
</section>
