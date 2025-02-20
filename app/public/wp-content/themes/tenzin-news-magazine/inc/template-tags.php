<?php
/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Tenzin_News_Magazine
 */

if ( ! function_exists( 'tenzin_news_magazine_posted_on' ) ) :
	/**
	 * Prints HTML with meta information for the current post-date/time.
	 */
	function tenzin_news_magazine_posted_on() {
		if ( get_theme_mod( 'tenzin_news_magazine_post_hide_date', false ) ) {
			return;
		}
		$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
		if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
			$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
		}

		$time_string = sprintf(
			$time_string,
			esc_attr( get_the_date( DATE_W3C ) ),
			esc_html( get_the_date() ),
			esc_attr( get_the_modified_date( DATE_W3C ) ),
			esc_html( get_the_modified_date() )
		);

		$posted_on = sprintf(
			/* translators: %s: post date. */
			esc_html_x( ' %s', 'post date', 'tenzin-news-magazine' ),
			'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
		);

		echo '<span class="posted-on">' . $posted_on . '</span>'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped

	}
endif;

if ( ! function_exists( 'tenzin_news_magazine_posted_by' ) ) :
	/**
	 * Prints HTML with meta information for the current author.
	 */
	function tenzin_news_magazine_posted_by($post) {
		$author = sprintf(
			esc_html_x( 'by %s', '', 'tenzin-news-magazine' ),'<a href="' . esc_url( get_author_posts_url( $post->post_author ) ) . '">' . esc_html( get_the_author_meta('display_name', $post->post_author) ) . '</a>'
		);
		echo $author;
	}
endif;

if ( ! function_exists( 'tenzin_news_magazine_entry_footer' ) ) :
	/**
	 * Prints HTML with meta information for the categories, tags and comments.
	 */
	function tenzin_news_magazine_entry_footer() {
		// Hide category and tag text for pages.
		if ( 'post' === get_post_type() ) {
			$hide_category = get_theme_mod( 'tenzin_news_magazine_post_hide_category', false );
			$hide_tag      = get_theme_mod( 'tenzin_news_magazine_post_hide_tags', false );

			if ( ! $hide_category ) {
				/* translators: used between list items, there is a space after the comma */
				$categories_list = get_the_category_list( esc_html__( ', ', 'tenzin-news-magazine' ) );
				if ( $categories_list ) {
					/* translators: 1: list of categories. */
					printf( '<span class="cat-links">' . esc_html__( '%1$s', 'tenzin-news-magazine' ) . '</span>', $categories_list ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
				}
			}
		}

		edit_post_link(
			sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					__( ', Edit <span class="screen-reader-text">%s</span>', 'tenzin-news-magazine' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				wp_kses_post( get_the_title() )
			),
			'<span class="edit-link">',
			'</span>'
		);
	}
endif;

if ( ! function_exists( 'tenzin_news_magazine_entry_single_footer' ) ) :
    /**
     * Prints HTML with meta information for the categories, tags and comments.
     */
    function tenzin_news_magazine_entry_single_footer() {
        // Hide category and tag text for pages.
        if ( 'post' === get_post_type() ) {
            $hide_category = get_theme_mod( 'tenzin_news_magazine_post_hide_category', false );
            $hide_tag      = get_theme_mod( 'tenzin_news_magazine_post_hide_tags', false );

            if ( ! $hide_category ) {
                /* translators: used between list items, there is a space after the comma */
                $categories_list = get_the_category_list( esc_html__( ', ', 'tenzin-news-magazine' ) );
                if ( $categories_list ) {
                    /* translators: 1: list of categories. */
                    printf( '<span class="cat-links">' . esc_html__( 'Posted in %1$s', 'tenzin-news-magazine' ) . '</span>', $categories_list ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
                }
            }

            if ( ! $hide_tag ) {
                /* translators: used between list items, there is a space after the comma */
                $tags_list = get_the_tag_list( '', esc_html_x( ', ', 'list item separator', 'tenzin-news-magazine' ) );
                if ( $tags_list ) {
                    /* translators: 1: list of tags. */
                    printf( '<span class="tags-links">' . esc_html__( 'Tagged %1$s', 'tenzin-news-magazine' ) . '</span>', $tags_list ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
                }
            }
        }

        edit_post_link(
            sprintf(
                wp_kses(
                /* translators: %s: Name of current post. Only visible to screen readers */
                    __( 'Edit <span class="screen-reader-text">%s</span>', 'tenzin-news-magazine' ),
                    array(
                        'span' => array(
                            'class' => array(),
                        ),
                    )
                ),
                wp_kses_post( get_the_title() )
            ),
            '<span class="edit-link">',
            '</span>'
        );
    }
endif;

if ( ! function_exists( 'tenzin_news_magazine_entry_category' ) ) :
    function tenzin_news_magazine_entry_category($post_id) {
        $categories_list = get_the_category_list( esc_html__( ', ', 'tenzin-news-magazine' ), 'multiple', $post_id );
        if ( $categories_list ) {
            printf( esc_html__( '%1$s', 'tenzin-news-magazine' ), $categories_list );
        }
    }
endif;

if ( ! function_exists( 'tenzin_news_magazine_entry' ) ) :
    /**
     * Prints HTML with meta information for the categories
     */
	function tenzin_news_magazine_entry_options( $post, $args = array('class' => 'mt-2', 'entry_date' => true, 'entry_cat' => true, 'entry_author' => true, 'entry_date_order' => 1, 'entry_cat_order' => 2, 'entry_author_order' => 3)) {
        $post_id = $post->ID;
        $entry_style = get_theme_mod('crt_manage_entry_style', 'bg-color');
        $entry_date_format = get_theme_mod('crt_manage_entry_date_format', 'F d, Y');
        $date = date($entry_date_format, strtotime($post->post_date));
        ?>
        <div class="entry entry_<?php echo esc_attr($entry_style); ?> <?php echo esc_attr($args['class']); ?>">
            <?php if(isset($args['entry_date']) && $args['entry_date']): ?>
            <span class="entry__date <?php echo isset($args['entry_date_order']) ? 'order-'. $args['entry_date_order']:''; ?>"><?php echo esc_html($date); ?></span>
            <?php endif; ?>
            <?php if(isset($args['entry_cat']) && $args['entry_cat']): ?>
            <span class="entry__category <?php echo isset($args['entry_cat_order']) ? 'order-'. $args['entry_cat_order']:''; ?>"><?php tenzin_news_magazine_entry_category($post_id) ?></span>
            <?php endif; ?>
            <?php if(isset($args['entry_author']) && $args['entry_author']): ?>
            <span class="entry__author <?php echo isset($args['entry_author_order']) ? 'order-'. $args['entry_author_order']:''; ?>"><?php tenzin_news_magazine_posted_by($post) ?></span>
            <?php endif; ?>
        </div>
        <?php
    }
endif;

if ( ! function_exists( 'tenzin_news_magazine_post_thumbnail' ) ) :
	/**
	 * Displays an optional post thumbnail.
	 *
	 * Wraps the post thumbnail in an anchor element on index views, or a div
	 * element when on single views.
	 */
	function tenzin_news_magazine_post_thumbnail($thumb = '') {
		if ( post_password_required() || is_attachment() || ! has_post_thumbnail() ) {
			return;
		}
		if(is_page()):
            $thumbnail = get_theme_mod('crt_manage_page_thumbnail', 'outer-thumb');
            $thumbnail_size = get_theme_mod('crt_manage_page_thumbnail_size', 'ratio169');
        ?>
            <div class="post-thumbnail post-thumbnail_<?php echo esc_attr($thumbnail); ?>">
                <?php $get_thumbnail_url = get_the_post_thumbnail_url( get_the_ID() ); ?>
                <figure class="ratio lazy <?php echo esc_attr($thumbnail_size); ?>" data-src="<?php echo esc_attr($get_thumbnail_url); ?>"></figure>
            </div><!-- .post-thumbnail -->
        <?php
		elseif ( is_singular() ) :
            $thumbnail = get_theme_mod('crt_manage_single_thumbnail', 'outer-thumb');
            $thumbnail_size = get_theme_mod('crt_manage_single_thumbnail_size', 'ratio169');
            ?>
			<div class="post-thumbnail post-thumbnail_<?php echo esc_attr($thumbnail); ?>">
                <?php $get_thumbnail_url = get_the_post_thumbnail_url( get_the_ID() ); ?>
                <figure class="ratio lazy <?php echo esc_attr($thumbnail_size); ?>" data-src="<?php echo esc_attr($get_thumbnail_url); ?>"></figure>
			</div><!-- .post-thumbnail -->
			<?php
		endif; // End is_singular().
	}
endif;

if ( ! function_exists( 'wp_body_open' ) ) :
	/**
	 * Shim for sites older than 5.2.
	 *
	 * @link https://core.trac.wordpress.org/ticket/12563
	 */
	function wp_body_open() {
		do_action( 'wp_body_open' );
	}
endif;

if ( ! function_exists( 'tenzin_news_magazine_heading' ) ) :
    /**
     * Prints HTML with heading information for the section
     */
    function tenzin_news_magazine_heading( $section_title, $section_sub_title) {
        $heading_style = get_theme_mod('crt_manage_heading_style', 'center');
        $heading_line_position = get_theme_mod('crt_manage_heading_line_position', 'bottom');
        $heading_sub_enable = get_theme_mod('crt_manage_heading_sub_enable', true);
        ?>
        <div class="heading-default heading-default__<?php echo esc_attr($heading_style); ?> heading-default__line--<?php echo esc_attr($heading_line_position); ?>">
            <div class="heading-default__inner">
                <h2 class="heading-default__title"><?php echo esc_html($section_title); ?></h2>
                <?php if($heading_sub_enable): ?>
                    <span class="heading-default__sub"><?php echo esc_html($section_sub_title); ?></span>
                <?php endif; ?>
            </div>
        </div>
        <?php
    }
endif;
