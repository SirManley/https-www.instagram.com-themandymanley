<?php
    $feature_post = get_theme_mod('crt_manage_feature_post');
    $feature_post_order = get_theme_mod('crt_manage_feature_post_order', 'DESC');
?>
<?php if(!empty($feature_post)): ?>
    <?php
    $args = array(
        'post_type' => 'post',
        'post__in' => $feature_post,
        'order' => isset($feature_post_order[0]) ? $feature_post_order[0]:'DESC'
    );
    $query = new WP_Query( $args );
    if ( $query->have_posts() ) :
        while ( $query->have_posts() ) :
            $query->the_post();
            $get_permalink = get_permalink();
            $get_thumbnail_url = get_the_post_thumbnail_url( get_the_ID(), 'tenzin-news-magazine-image-medium' );
            $post = get_post();
            ?>
            <div class="col-lg-2 col-md-6 mb-3">
                <a href="<?php echo esc_attr($get_permalink); ?>">
                    <figure class="post-type-one__image lazy ratio43" data-src="<?php echo esc_attr($get_thumbnail_url); ?>"></figure>
                </a>
                <?php tenzin_news_magazine_entry_options($post, array('class' => 'mt-2', 'entry_date' => true, 'entry_cat' => true, 'entry_author' => false)); ?>
                <h5 class="mb-2"><a href="<?php echo esc_attr($get_permalink); ?>"><?php echo get_the_title(); ?></a></h5>
                <div class="excerpt-default">
                    <?php echo tenzin_news_magazine_excerpt_custom(50, get_the_ID()); ?>
                </div>
            </div>
        <?php
        endwhile;
    endif;
    wp_reset_postdata();
    ?>
<?php endif; ?>
<div class="br-col br-col20 br-md-col33 br-sm-col-none"></div>
<div class="br-col br-col40 br-md-col66 br-sm-col-none"></div>
<div class="br-col br-col60 br-md-col-none br-sm-col-none"></div>
<div class="br-col br-col80 br-md-col-none br-sm-col-none"></div>
