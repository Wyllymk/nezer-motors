<?php
/**
 * Template part for displaying post archives and search results
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
        <?php
		if ( is_sticky() && is_home() && ! is_paged() ) {
			printf( '%s', esc_html_x( 'Featured', 'post', 'nezer-motors' ) );
		}
		the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' );
		?>
    </header><!-- .entry-header -->

    <?php nezer_motors_post_thumbnail(); ?>

    <div <?php nezer_motors_content_class( 'entry-content' ); ?>>
        <?php the_excerpt(); ?>
    </div><!-- .entry-content -->

    <footer class="entry-footer">
        <?php nezer_motors_entry_footer(); ?>
    </footer><!-- .entry-footer -->

</article><!-- #post-${ID} -->