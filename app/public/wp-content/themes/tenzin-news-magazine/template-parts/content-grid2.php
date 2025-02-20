<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Tenzin_News_Magazine
 */
?>

<?php
    $get_thumbnail_url = get_the_post_thumbnail_url( get_the_ID(), 'tenzin-news-magazine-image-medium' );
    $get_permalink = get_permalink();
    $date = get_the_date('F d, Y');
    $post = get_post();
?>
<div class="col-12 col-md-6 mb-3">
    <a href="<?php echo esc_html($get_permalink); ?>">
        <figure class="post-type-two__image lazy ratio32" data-src="<?php echo esc_html($get_thumbnail_url); ?>"></figure>
    </a>
    <?php tenzin_news_magazine_entry_options($post); ?>
    <h3 class="post-type-two__title"><a href="<?php echo esc_html($get_permalink); ?>"><?php echo get_the_title() ?></a></h3>
    <div class="post-type-two__sub">
        <?php echo tenzin_news_magazine_excerpt_custom(30, get_the_ID()); ?>
    </div>
</div>
