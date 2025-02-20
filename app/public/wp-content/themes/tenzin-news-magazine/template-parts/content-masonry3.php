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
<div class="grid__item grid__item-three mb-3">
    <a href="<?php echo esc_html($get_permalink); ?>">
        <img class="post-type-two__image" src="<?php echo esc_html($get_thumbnail_url); ?>" alt="<?php echo get_the_title() ?>" />
    </a>
    <?php tenzin_news_magazine_entry_options($post, array('class' => 'mt-2', 'entry_date' => true, 'entry_cat' => true, 'entry_author' => false)); ?>
    <h3 class="post-type-two__title"><a href="<?php echo esc_html($get_permalink); ?>"><?php echo get_the_title() ?></a></h3>
    <div class="post-type-two__sub">
        <?php echo tenzin_news_magazine_excerpt_custom(30, get_the_ID()); ?>
    </div>
</div>
