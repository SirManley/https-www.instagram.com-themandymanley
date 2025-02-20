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
            <div class="col-lg-4 col-md-6 pb-6">
                <div class="feature__item pb-3">
                    <div class="row">
                        <div class="col-5 pe-1">
                            <a href="<?php echo esc_attr($get_permalink); ?>">
                                <figure class="post-type-one__image lazy ratio43" data-src="<?php echo esc_attr($get_thumbnail_url); ?>"></figure>
                            </a>
                        </div>
                        <div class="col-7">
                            <?php tenzin_news_magazine_entry_options($post, array('class' => 'mt-0', 'entry_date' => true, 'entry_cat' => true, 'entry_author' => false)) ?>
                            <h6><a href="<?php echo esc_attr($get_permalink); ?>"><?php echo get_the_title(); ?></a></h6>
                        </div>
                    </div>
                </div>
            </div>
        <?php
        endwhile;
    endif;
    wp_reset_postdata();
    ?>
<?php endif; ?>
<div class="br-col br-col33 br-md-col50 br-sm-col-none"></div>
<div class="br-col br-col66 br-md-col50 br-sm-col-none"></div>
