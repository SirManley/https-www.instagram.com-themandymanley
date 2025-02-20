<?php
    $post_sidebar_list_left = get_theme_mod('crt_manage_post_sidebar_left');
    $crt_manage_post_sidebar_left_order = get_theme_mod('crt_manage_post_sidebar_left_order', 'DESC');
    $post_sidebar_list_right = get_theme_mod('crt_manage_post_sidebar_right');
    $crt_manage_post_sidebar_right_order = get_theme_mod('crt_manage_post_sidebar_right_order', 'DESC');
?>
<div class="col-lg-8 order-2 order-lg-1">
    <div class="post-type-three__left">
        <div class="row">
            <?php if(!empty($post_sidebar_list_left)): ?>
                <?php
                $args = array(
                    'post_type' => 'post',
                    'post__in' => $post_sidebar_list_left,
                    'order' => isset($crt_manage_post_sidebar_left_order[0]) ? $crt_manage_post_sidebar_left_order[0]:'DESC'
                );
                $query = new WP_Query( $args );
                if ( $query->have_posts() ) :
                    while ( $query->have_posts() ) :
                        $query->the_post();
                        $get_permalink = get_permalink();
                        $get_thumbnail_url = get_the_post_thumbnail_url( get_the_ID() );
                        $date = get_the_date('F d, Y');
                        $post = get_post();
                        ?>
                        <div class="col-md-6 mb-3">
                            <a href="<?php echo esc_attr($get_permalink); ?>">
                                <figure class="post-type-three__left--image lazy ratio32" data-src="<?php echo esc_attr($get_thumbnail_url); ?>"></figure>
                            </a>
                            <div class="post-type-three__left--content">
                                <?php tenzin_news_magazine_entry_options($post) ?>
                                <h3><a href="<?php echo esc_attr($get_permalink); ?>"><?php echo get_the_title(); ?></a></h3>
                                <div class="post-type-three__left--sub">
                                    <?php echo tenzin_news_magazine_excerpt_custom(20, get_the_ID()); ?>
                                </div>
                            </div>
                        </div>
                    <?php
                    endwhile;
                endif;
                wp_reset_postdata();
                ?>
            <?php endif; ?>
        </div>
    </div>
</div>
<div class="col-lg-4 order-1 order-lg-2">
    <?php if(!empty($post_sidebar_list_right)): ?>
        <?php
        $args = array(
            'post_type' => 'post',
            'post__in' => $post_sidebar_list_right,
            'order' => isset($crt_manage_post_sidebar_right_order[0]) ? $crt_manage_post_sidebar_right_order[0]:'DESC'
        );
        $query = new WP_Query( $args );
        if ( $query->have_posts() ) :
            while ( $query->have_posts() ) :
                $query->the_post();
                $get_permalink = get_permalink();
                $get_thumbnail_url = get_the_post_thumbnail_url( get_the_ID(), 'tenzin-news-magazine-image-medium' );
                $post = get_post();
                ?>
                <div class="post-type-three__right--item mb-3 ">
                    <div class="row">
                        <div class="col-5 pe-1">
                            <a href="<?php echo esc_attr($get_permalink); ?>">
                                <figure class="post-type-three__right--image lazy ratio43" data-src="<?php echo esc_attr($get_thumbnail_url); ?>"></figure>
                            </a>
                        </div>
                        <div class="col-7">
                            <?php tenzin_news_magazine_entry_options($post, array('class' => 'mt-0', 'entry_date' => true, 'entry_cat' => true, 'entry_author' => false)) ?>
                            <h6>
                                <a href="<?php echo esc_attr($get_permalink); ?>"><?php echo get_the_title(); ?></a>
                            </h6>
                        </div>
                    </div>
                </div>
            <?php
            endwhile;
        endif;
        wp_reset_postdata();
        ?>
    <?php endif; ?>
</div>
<div class="br-col br-col33 br-md-col-none"></div>
<div class="br-col br-col66 br-md-col-none"></div>
