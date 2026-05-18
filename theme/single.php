<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Nezer_Motors
 */
// Exit if accessed directly
defined( 'ABSPATH' ) || exit;

get_header();
?>

<main id="main-content" class="pt-32 pb-24 min-h-screen nm-section-light" role="main">
    <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
        <?php while ( have_posts() ) : the_post(); ?>
        <article <?php post_class( '' ); ?> id="post-<?php the_ID(); ?>">
            <header class="mb-8">
                <div class="mb-4">
                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>"
                        class="inline-flex items-center gap-1 font-sub font-600 text-sm text-gray-400 dark:text-white/40 hover:text-gold-500 dark:hover:text-gold-400 transition-colors">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                            <path d="M20 11H7.83l5.59-5.59L12 4l-8 8 8 8 1.41-1.41L7.83 13H20v-2z" />
                        </svg>
                        <?php esc_html_e( 'Back', 'nezer-motors' ); ?>
                    </a>
                </div>
                <h1 class="font-heading text-4xl sm:text-5xl font-700 text-gray-900 dark:text-white leading-tight mb-4">
                    <?php the_title(); ?>
                </h1>
                <p class="font-body text-sm text-gray-400 dark:text-white/40">
                    <time
                        datetime="<?php echo esc_attr( get_the_date( 'c' ) ); ?>"><?php echo esc_html( get_the_date() ); ?></time>
                    <?php esc_html_e( ' · by ', 'nezer-motors' ); ?><?php the_author(); ?>
                </p>
            </header>
            <?php if ( has_post_thumbnail() ) : ?>
            <div class="mb-8 rounded-2xl overflow-hidden">
                <?php the_post_thumbnail( 'nm-hero', [ 'class' => 'w-full h-auto object-cover', 'alt' => esc_attr( get_the_title() ) ] ); ?>
            </div>
            <?php endif; ?>
            <div
                class="prose dark:prose-invert prose-lg max-w-none font-body text-gray-700 dark:text-white/70 leading-relaxed">
                <?php the_content(); ?>
            </div>
        </article>
        <?php endwhile; ?>
    </div>
</main>

<?php
get_footer();