<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no `home.php` file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Nezer_Motors
 */
// Exit if accessed directly
defined( 'ABSPATH' ) || exit;

get_header();
?>

<main id="main-content" class="pt-24 pb-20 min-h-screen nm-section-light" role="main">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">

        <header class="mb-12 text-center">
            <h1 class="font-heading text-4xl sm:text-5xl font-700 text-gray-900 dark:text-white mb-4">
                <?php
        if ( is_home() ) {
          esc_html_e( 'Latest Posts', 'nezer-motors' );
        } elseif ( is_archive() ) {
          the_archive_title();
        } else {
          esc_html_e( 'Blog', 'nezer-motors' );
        }
        ?>
            </h1>
        </header>

        <?php if ( have_posts() ) : ?>
        <div class="space-y-8">
            <?php while ( have_posts() ) : the_post(); ?>
            <article <?php post_class( 'nm-card p-6 rounded-2xl' ); ?> id="post-<?php the_ID(); ?>">
                <header class="mb-4">
                    <h2
                        class="font-heading text-2xl font-700 text-gray-900 dark:text-white hover:text-gold-500 dark:hover:text-gold-400 transition-colors">
                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                    </h2>
                    <p class="font-body text-sm text-gray-400 dark:text-white/40 mt-1">
                        <time
                            datetime="<?php echo esc_attr( get_the_date( 'c' ) ); ?>"><?php echo esc_html( get_the_date() ); ?></time>
                    </p>
                </header>
                <div class="font-body text-gray-600 dark:text-white/60 leading-relaxed">
                    <?php the_excerpt(); ?>
                </div>
                <footer class="mt-4">
                    <a href="<?php the_permalink(); ?>"
                        class="inline-flex items-center gap-2 font-sub font-700 text-sm text-gold-500 hover:text-gold-400 transition-colors">
                        <?php esc_html_e( 'Read More', 'nezer-motors' ); ?>
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                            <path d="M8.59 16.59L13.17 12 8.59 7.41 10 6l6 6-6 6z" />
                        </svg>
                    </a>
                </footer>
            </article>
            <?php endwhile; ?>
        </div>
        <div class="mt-12"><?php the_posts_pagination(); ?></div>
        <?php else : ?>
        <p class="text-center font-body text-gray-500 dark:text-white/50">
            <?php esc_html_e( 'No posts found.', 'nezer-motors' ); ?></p>
        <?php endif; ?>

    </div>
</main>

<?php
get_footer();