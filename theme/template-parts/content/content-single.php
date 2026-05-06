<?php
/**
 * Template part for displaying single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Nezer_Motors
 */
// Exit if accessed directly
defined( 'ABSPATH' ) || exit;
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

    <header class="entry-header">
        <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>

        <?php if ( ! is_page() ) : ?>
        <div class="entry-meta">
            <?php nezer_motors_entry_meta(); ?>
        </div><!-- .entry-meta -->
        <?php endif; ?>
    </header><!-- .entry-header -->

    <?php nezer_motors_post_thumbnail(); ?>

    <div <?php nezer_motors_content_class( 'entry-content' ); ?>>
        <?php
		the_content(
			sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers. */
					__( 'Continue reading<span class="sr-only"> "%s"</span>', 'nezer-motors' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				get_the_title()
			)
		);

		wp_link_pages(
			array(
				'before' => '<div>' . __( 'Pages:', 'nezer-motors' ),
				'after'  => '</div>',
			)
		);
		?>
    </div><!-- .entry-content -->

    <footer class="entry-footer">
        <?php nezer_motors_entry_footer(); ?>
    </footer><!-- .entry-footer -->

</article><!-- #post-${ID} -->