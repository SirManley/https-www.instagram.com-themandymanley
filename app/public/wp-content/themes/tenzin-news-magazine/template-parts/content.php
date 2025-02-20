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
    $post = get_post();
?>
<div id="post-<?php the_ID(); ?>" class="post-type-five__left--item mb-3 mb-lg-6">
    <div class="row">
        <div class="col-12 col-md-5 mb-3 mb-md-0">
            <a href="<?php echo esc_html($get_permalink); ?>">
                <figure class="post-type-five__left--image lazy ratio32" data-src="<?php echo esc_html($get_thumbnail_url); ?>"></figure>
            </a>
        </div>
        <div class="col-12 col-md-7">
            <?php tenzin_news_magazine_entry_options($post); ?>
            <h3 class="post-type-five__left--title">
                <a href="<?php echo esc_html($get_permalink); ?>"><?php echo get_the_title() ?></a>
            </h3>
            <div class="post-type-five__left--sub">
                <?php echo tenzin_news_magazine_excerpt_custom(30, get_the_ID()); ?>
            </div>
        </div>
    </div>
</div>