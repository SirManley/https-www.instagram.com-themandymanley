<?php
    $slider_post = get_theme_mod('crt_manage_hero_v1_left_post');
    $slider_thumbnail = get_theme_mod('crt_manage_hero_v1_thumbnail_size', 'ratio219');
    $slider_thumbnail_bg = get_theme_mod('crt_manage_hero_v1_thumbnail_background', 'bg-content');
    $slider_thumbnail_bg_color = get_theme_mod('crt_manage_hero_v1_thumbnail_background_color', 'white');
    $slider_nav_style = get_theme_mod('crt_manage_hero_v1_nav_style', 'square');
?>
<div class="col-md-12 mb-md-0 mb-3">
    <?php if(!empty($slider_post)): ?>
    <div class="slider-post post_slider__js owl-carousel owl-theme <?php echo 'slider-post__nav--' . esc_attr($slider_nav_style); ?> <?php echo 'slider-post__' . esc_attr($slider_thumbnail_bg); ?> <?php echo 'slider-post__' . esc_attr($slider_thumbnail_bg_color); ?>">
        <?php foreach ( $slider_post as $post_id ) {
            $post = get_post( $post_id );
            $get_permalink = get_permalink( $post );
            $get_thumbnail_url = get_the_post_thumbnail_url( $post, 'tenzin-news-magazine-image-large' );
            $avatar = get_avatar($post->post_author);
            $entry_date_format = get_theme_mod('crt_manage_entry_date_format', 'F d, Y');
            $date = date($entry_date_format, strtotime($post->post_date));
            ?>
            <div class="slider-post__item">
                <figure class="owl-lazy <?php echo esc_attr($slider_thumbnail); ?>" data-src="<?php echo esc_attr($get_thumbnail_url); ?>">
                    <div class="slider-post__content">
                        <div class="entry entry_color">
                            <span class="entry__date"><?php tenzin_news_magazine_entry_category($post_id) ?></span>
                            <span class="entry__date"><?php echo esc_html($date); ?></span>
                        </div>
                        <h2 class="slider-post__title mb-3"><a href="<?php echo esc_attr($get_permalink); ?>"><?php echo esc_html($post->post_title); ?></a></h2>
                        <div class="slider-post__entry">
                            <span class="entry__author"><?php tenzin_news_magazine_posted_by($post) ?></span>
                        </div>
                        <div class="slider-post__read-more">
                            <a href="<?php echo esc_attr($get_permalink); ?>"><?php esc_html_e( 'Read More', 'tenzin-news-magazine' ); ?></a>
                        </div>
                    </div>
                </figure>
            </div>
        <?php } ?>
    </div>
    <?php endif; ?>
</div>

