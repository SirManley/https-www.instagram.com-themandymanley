<?php
    $left_post = get_theme_mod('crt_manage_hero_v1_left_post');
    $center_post = get_theme_mod('crt_manage_hero_v1_center_post');
    $right_post = get_theme_mod('crt_manage_hero_v1_right_post');
?>
<div class="col-md-6 mb-md-0 mb-5">
    <?php if(!empty($left_post)): ?>
        <?php foreach ( $left_post as $post_id ) {
            $post = get_post( $post_id );
            $get_permalink = get_permalink( $post );
            $get_thumbnail_url = get_the_post_thumbnail_url( $post , 'tenzin-news-magazine-image-large');
            $avatar = get_avatar($post->post_author);
            ?>
            <a href="<?php echo esc_attr($get_permalink); ?>">
                <figure class="lazy ratio43" data-src="<?php echo esc_attr($get_thumbnail_url); ?>"></figure>
            </a>
            <?php tenzin_news_magazine_entry_options($post) ?>
            <h2 class="area-feature-second__title mb-3"><a href="<?php echo esc_attr($get_permalink); ?>"><?php echo esc_html($post->post_title); ?></a></h2>
            <div class="area-feature-second__sub excerpt-default"><?php echo tenzin_news_magazine_excerpt_custom(50, $post_id); ?></div>
        <?php } ?>
    <?php endif; ?>
</div>
<div class="col-md-3 mb-md-0 mb-5">
    <?php if(!empty($center_post)): ?>
        <?php
        foreach ( $center_post as $post_id ) :
            $post = get_post( $post_id );
            $get_permalink = get_permalink( $post );
            $get_thumbnail_url = get_the_post_thumbnail_url( $post , 'tenzin-news-magazine-image-medium' );
            ?>
            <div class="area-feature-second__item">
                <div class="area-feature__item--inner">
                    <?php tenzin_news_magazine_entry_options($post, array('class' => 'mt-0', 'entry_date' => true, 'entry_cat' => true, 'entry_author' => true)) ?>
                    <h5><a href="<?php echo esc_attr($get_permalink); ?>"><?php echo esc_html($post->post_title); ?></a></h5>
                    <div class="area-feature-second__sub excerpt-default"><?php echo tenzin_news_magazine_excerpt_custom(50, $post_id); ?></div>
                </div>
            </div>
        <?php endforeach; endif; ?>
</div>
<div class="col-md-3  mb-md-0 mb-3">
    <?php if(!empty($right_post)): ?>
        <?php foreach ( $right_post as $post_id ) {
            $post = get_post( $post_id );
            $get_permalink = get_permalink( $post );
            $get_thumbnail_url = get_the_post_thumbnail_url( $post , 'tenzin-news-magazine-image-medium' );
            ?>
            <div class="area-feature-second__item">
                <div class="area-feature__item--inner">
                    <a href="<?php echo esc_attr($get_permalink); ?>">
                        <figure class="lazy ratio32" data-src="<?php echo esc_attr($get_thumbnail_url); ?>"></figure>
                    </a>
                    <?php tenzin_news_magazine_entry_options($post) ?>
                    <h5><a href="<?php echo esc_attr($get_permalink); ?>"><?php echo esc_html($post->post_title); ?></a></h5>
                    <div class="area-feature-second__sub excerpt-default"><?php echo tenzin_news_magazine_excerpt_custom(50, $post_id); ?></div>
                </div>
            </div>
        <?php } ?>
    <?php endif; ?>
</div>

<div class="br-col br-col50 br-sm-col-none"></div>
<div class="br-col br-col75 br-sm-col-none"></div>


