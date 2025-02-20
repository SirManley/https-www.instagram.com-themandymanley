<?php
    $post_sidebar_list_left = get_theme_mod('crt_manage_post_sidebar_left');
    $crt_manage_post_sidebar_left_order = get_theme_mod('crt_manage_post_sidebar_left_order', 'DESC');
    $post_sidebar_list_right = get_theme_mod('crt_manage_post_sidebar_right');
    $crt_manage_post_sidebar_right_order = get_theme_mod('crt_manage_post_sidebar_right_order', 'DESC');
?>
<?php if(!empty($post_sidebar_list_left)): ?>
<div class="col-md-8 mb-5 mb-md-3">
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

    <a href="<?php echo esc_attr($get_permalink); ?>">
        <figure class="post-type-two__image lazy ratio32" data-src="<?php echo esc_attr($get_thumbnail_url); ?>" ></figure>
    </a>
    <?php tenzin_news_magazine_entry_options($post, array('class' => 'mt-2', 'entry_date' => true, 'entry_cat' => true, 'entry_author' => false)) ?>
    <h3 class="post-type-two__title"><a href="<?php echo esc_attr($get_permalink); ?>"><?php echo get_the_title(); ?></a></h3>
    <div class="excerpt-default">
        <?php echo tenzin_news_magazine_excerpt_custom(150, get_the_ID()); ?>
    </div>
    <?php endwhile; endif; wp_reset_postdata(); ?>
</div>
<?php endif; ?>

<?php if(!empty($post_sidebar_list_right)): ?>
<div class="col-md-4">
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
    <div class="area-post-sidebar-three__item">
        <div class="row">
            <div class="col-7 pr-2">
                <?php tenzin_news_magazine_entry_options($post, array('class' => 'mt-0', 'entry_date' => true, 'entry_cat' => true, 'entry_author' => false)) ?>
                <h5><a href="<?php echo esc_attr($get_permalink); ?>"><?php echo get_the_title(); ?></a></h5>
            </div>
            <div class="col-5">
                <a href="<?php echo esc_attr($get_permalink); ?>">
                    <figure class="post-type-two__image lazy ratio43" data-src="<?php echo esc_attr($get_thumbnail_url); ?>"></figure>
                </a>
            </div>
        </div>
    </div>
    <?php endwhile; endif; wp_reset_postdata(); ?>
</div>
<?php endif; ?>
<div class="br-col br-col66 br-md-col-none"></div>