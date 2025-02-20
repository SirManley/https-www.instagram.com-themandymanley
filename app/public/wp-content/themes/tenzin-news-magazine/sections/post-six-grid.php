<?php
    $enable_post_six = get_theme_mod('crt_manage_enable_post_six_section');
    if(!$enable_post_six) {
        return;
    }
    $post_six_headline = get_theme_mod('crt_manage_post_six_headline', __( 'Technology', 'tenzin-news-magazine' ));
    $post_six_headline_sub = get_theme_mod('crt_manage_post_six_headline_sub', __( 'Topics news and opinion', 'tenzin-news-magazine' ));
    $post_six_post = get_theme_mod('crt_manage_post_six_post');
    $post_six_post_order = get_theme_mod('crt_manage_post_six_post_order', 'DESC');
    $post_six_post_layout = get_theme_mod('crt_manage_post_six_post_layout', '3');
    $class_col = 'col-12 col-md-6 col-lg-4 mb-3';
    if($post_six_post_layout[0] === '2') {
        $class_col = 'col-12 col-md-6 mb-3';
    } elseif ($post_six_post_layout[0] === '3') {
        $class_col = 'col-12 col-md-6 col-lg-4 mb-3';
    } elseif ($post_six_post_layout[0] === '4') {
        $class_col = 'col-12 col-md-4 col-lg-3 mb-3';
    }
?>

<section id="post-six" class="area-post-nine">
    <div class="container position-relative">
        <?php crt_manage_section_link( 'Post Six Grid' ); ?>
        <div class="border-left-right p-lg-4 p-md-3 p-0 border-md-none border-sm-none">
            <div class="row">
                <div class="col-12">
                    <?php tenzin_news_magazine_heading($post_six_headline, $post_six_headline_sub); ?>
                </div>
            </div>
            <div class="row bor-col-d">
                <?php if(!empty($post_six_post)): ?>
                <?php
                    $args = array(
                        'post_type' => 'post',
                        'post__in' => $post_six_post,
                        'order' => isset($post_six_post_order) ? $post_six_post_order:'DESC'
                    );
                    $query = new WP_Query( $args );
                    if ( $query->have_posts() ) :
                    while ( $query->have_posts() ) :
                    $query->the_post();
                    $get_permalink = get_permalink();
                    $get_thumbnail_url = get_the_post_thumbnail_url( get_the_ID(), 'tenzin-news-magazine-image-medium' );
                    $post = get_post();
                ?>
                        <div class="<?php echo esc_attr($class_col); ?>">
                            <a href="<?php echo esc_attr($get_permalink); ?>">
                                <figure class="post-type-two__image lazy ratio32" data-src="<?php echo esc_attr($get_thumbnail_url); ?>"></figure>
                            </a>
                            <?php tenzin_news_magazine_entry_options($post) ?>
                            <h3><a href="<?php echo esc_attr($get_permalink); ?>"><?php echo get_the_title(); ?></a></h3>
                            <div class="post-type-two__sub">
                                <?php echo tenzin_news_magazine_excerpt_custom(20, get_the_ID()); ?>
                            </div>
                        </div>
                <?php
                    endwhile;
                    endif;
                    wp_reset_postdata();
                ?>
                <?php endif; ?>
                <?php if($post_six_post_layout[0] === '2') : ?>
                    <div class="br-col br-col50 br-md-col50 br-sm-col-none"></div>
                <?php elseif ($post_six_post_layout[0] === '3') :  ?>
                    <div class="br-col br-col33 br-md-col50 br-sm-col-none"></div>
                    <div class="br-col br-col66 br-md-col50 br-sm-col-none"></div>
                <?php elseif ($post_six_post_layout[0] === '4') : ?>
                    <div class="br-col br-col25 br-md-col33 br-sm-col-none"></div>
                    <div class="br-col br-col50 br-md-col66 br-sm-col-none"></div>
                    <div class="br-col br-col75 br-md-col-none br-sm-col-none"></div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>
