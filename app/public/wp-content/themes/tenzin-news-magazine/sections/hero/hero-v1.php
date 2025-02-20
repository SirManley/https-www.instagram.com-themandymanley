<?php
    $left_post = get_theme_mod('crt_manage_hero_v1_left_post');
    $center_post = get_theme_mod('crt_manage_hero_v1_center_post');
    $right_post = get_theme_mod('crt_manage_hero_v1_right_post');
?>
<div class="col-md-3 order-2 order-md-1">
    <?php if(!empty($left_post)): ?>
        <?php foreach ( $left_post as $post_id ) {
            $post = get_post( $post_id );
            $get_permalink = get_permalink( $post );
            $get_thumbnail_url = get_the_post_thumbnail_url( $post, 'tenzin-news-magazine-image-medium' );
            $avatar = get_avatar($post->post_author);
            ?>
            <div class="area-feature__item">
                <div class="area-feature__item--inner">
                    <a href="<?php echo esc_attr($get_permalink); ?>">
                        <figure class="lazy ratio32" data-src="<?php echo esc_attr($get_thumbnail_url); ?>"></figure>
                    </a>
                    <div class="area-feature__content">
                        <?php tenzin_news_magazine_entry_options($post) ?>
                        <h5><a href="<?php echo esc_attr($get_permalink); ?>"><?php echo esc_html($post->post_title); ?></a></h5>
                        <div class="area-feature__sub"><?php echo tenzin_news_magazine_excerpt_custom(20, $post_id); ?></div>
                    </div>
                </div>
            </div>
        <?php } ?>
    <?php endif; ?>
</div>
<div class="col-md-6 order-1 order-md-2 mb-md-0 mb-3">
    <?php if(!empty($center_post)): ?>
        <?php
        foreach ( $center_post as $post_id ) :
            $post = get_post( $post_id );
            $get_permalink = get_permalink( $post );
            $get_thumbnail_url = get_the_post_thumbnail_url( $post, 'tenzin-news-magazine-image-large');
            ?>
            <div class="area-feature__item">
                <div class="area-feature__item--inner">
                    <a href="<?php echo esc_attr($get_permalink); ?>">
                        <figure class="lazy ratio32" data-src="<?php echo esc_attr($get_thumbnail_url); ?>"></figure>
                    </a>
                    <div class="area-feature__content">
                        <h5 class="area-feature__title"><a href="<?php echo esc_attr($get_permalink); ?>"><?php echo esc_html($post->post_title); ?></a></h5>
                        <div class="area-feature__sub"><?php echo tenzin_news_magazine_excerpt_custom(50, $post_id); ?></div>
                    </div>
                </div>
            </div>
        <?php endforeach; endif; ?>
</div>
<div class="col-md-3 order-3 order-md-3">
    <?php if(!empty($right_post)): ?>
        <?php foreach ( $right_post as $post_id ) {
            $post = get_post( $post_id );
            $get_permalink = get_permalink( $post );
            $get_thumbnail_url = get_the_post_thumbnail_url( $post , 'tenzin-news-magazine-image-medium');
            ?>
            <div class="area-feature__item">
                <div class="area-feature__item--inner">
                    <a href="<?php echo esc_attr($get_permalink); ?>">
                        <figure class="lazy ratio32" data-src="<?php echo esc_attr($get_thumbnail_url); ?>"></figure>
                    </a>
                    <div class="area-feature__content">
                        <?php tenzin_news_magazine_entry_options($post) ?>
                        <h5><a href="<?php echo esc_attr($get_permalink); ?>"><?php echo esc_html($post->post_title); ?></a></h5>
                        <div class="area-feature__sub">
                            <?php echo tenzin_news_magazine_excerpt_custom(20, $post_id); ?>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>
    <?php endif; ?>
</div>

<div class="br-col br-col25 br-sm-col-none"></div>
<div class="br-col br-col75 br-sm-col-none"></div>


