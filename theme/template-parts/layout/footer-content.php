<?php
/**
 * Template part for displaying the footer content
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Nezer_Motors
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

?>
<?php
// Hide/disable code on the "coming-soon" page using page slug

if ( ! is_page( 'coming-soon' ) ) {

?>
<!-- ============================================================
     FOOTER
    ============================================================ -->
<footer class="border-t border-gray-200 dark:border-gray-800 bg-gray-50 dark:bg-gray-950"
    aria-label="<?php esc_attr_e( 'Site footer', 'nezer-motors' ); ?>">

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-10">


            <!-- ── Column 1: Nezer Motors ─────────────────────────────── -->
            <div>
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="flex items-center gap-2 mb-5 group w-fit"
                    aria-label="<?php esc_attr_e( 'Nezer Motors home', 'nezer-motors' ); ?>">

                    <div class="w-9 h-9 rounded-lg bg-gold-400/10 dark:bg-gold-600/20 border border-gold-400 dark:border-gold-600/40 flex items-center justify-center transition-transform group-hover:scale-105"
                        aria-hidden="true">
                        <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/img/favicon.png' ); ?>"
                            alt="<?php echo esc_attr( 'Nezer Motors Logo', 'nezer-motors'); ?>"
                            class="w-full h-full object-contain p-1" loading="lazy">
                    </div>

                    <span class="font-heading text-xl font-700 text-gray-900 dark:text-white">
                        NEZER <span class="text-yellow-600 dark:text-yellow-400">MOTORS</span>
                    </span>
                </a>

                <p class="font-body text-sm text-gray-600 dark:text-gray-400 leading-relaxed mb-5 max-w-xs">
                    <?php esc_html_e( "Nyeri's trusted automotive group. Two branches, expert technicians, genuine parts and honest service.", 'nezer-motors' ); ?>
                </p>

                <address class="not-italic space-y-2 mb-6">
                    <a href="mailto:<?php echo esc_attr( NM_EMAIL ); ?>"
                        class="flex items-center gap-2 text-gray-600 dark:text-gray-400 hover:text-yellow-700 dark:hover:text-yellow-400 text-sm font-body transition-colors duration-200">
                        <svg class="w-4 h-4 flex-shrink-0" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                            <path
                                d="M20 4H4c-1.1 0-1.99.9-1.99 2L2 18c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5-8-5V6l8 5 8-5v2z" />
                        </svg>
                        <?php echo esc_html( NM_EMAIL ); ?>
                    </a>

                    <a href="https://wa.me/<?php echo esc_attr( NM_WA_NUM ); ?>" target="_blank"
                        rel="noopener noreferrer"
                        class="flex items-center gap-2 text-gray-600 dark:text-gray-400 hover:text-green-700 dark:hover:text-green-400 text-sm font-body transition-colors duration-200">
                        <svg class="w-4 h-4 flex-shrink-0 text-green-600 dark:text-green-500" fill="currentColor"
                            viewBox="0 0 24 24" aria-hidden="true">
                            <path
                                d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z" />
                        </svg>
                        <?php esc_html_e( '0733 204 672 (WhatsApp)', 'nezer-motors' ); ?>
                    </a>
                </address>

                <!-- Social links -->
                <div class="flex items-center gap-3" role="list"
                    aria-label="<?php esc_attr_e( 'Social media links', 'nezer-motors' ); ?>">
                    <a href="https://www.facebook.com/nezermotors" target="_blank" rel="noopener noreferrer"
                        role="listitem"
                        class="w-9 h-9 rounded-lg flex items-center justify-center bg-gray-200 dark:bg-white/[0.07] hover:bg-blue-100 dark:hover:bg-blue-600/25 text-gray-600 dark:text-gray-400 hover:text-blue-700 dark:hover:text-blue-400 transition-all duration-200"
                        aria-label="<?php esc_attr_e( 'Nezer Motors on Facebook', 'nezer-motors' ); ?>">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                            <path
                                d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z" />
                        </svg>
                    </a>

                    <a href="https://www.instagram.com/shell_kingongo" target="_blank" rel="noopener noreferrer"
                        role="listitem"
                        class="w-9 h-9 rounded-lg flex items-center justify-center bg-gray-200 dark:bg-white/[0.07] hover:bg-pink-100 dark:hover:bg-pink-600/25 text-gray-600 dark:text-gray-400 hover:text-pink-700 dark:hover:text-pink-400 transition-all duration-200"
                        aria-label="<?php esc_attr_e( 'QwikFix Shell Kingongo on Instagram', 'nezer-motors' ); ?>">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                            <path
                                d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z" />
                        </svg>
                    </a>
                </div>
            </div>


            <!-- ── Column 2: AutoCare Express ─────────────────────────── -->
            <?php $ac = nm_branch( 'autocare' ); ?>
            <div>
                <div class="flex items-center gap-2 mb-5">
                    <div
                        class="w-8 h-8 rounded-lg overflow-hidden bg-blue-100 dark:bg-blue-600/20 border border-blue-300 dark:border-blue-600/40 flex items-center justify-center flex-shrink-0">
                        <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/img/' . $ac['logo'] ); ?>"
                            alt="<?php echo esc_attr( $ac['logo_alt'] ); ?>" class="w-full h-full object-contain p-1"
                            loading="lazy">
                    </div>
                    <span class="font-heading text-lg font-700 text-gray-900 dark:text-white">
                        <?php echo esc_html( $ac['name'] ); ?>
                    </span>
                </div>

                <address class="not-italic space-y-3 mb-6">
                    <div class="flex items-start gap-2 text-gray-600 dark:text-gray-400 text-sm font-body">
                        <svg class="w-4 h-4 text-blue-600 dark:text-blue-400 mt-0.5 flex-shrink-0" fill="currentColor"
                            viewBox="0 0 24 24" aria-hidden="true">
                            <path
                                d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z" />
                        </svg>
                        <span><?php echo esc_html( $ac['location'] ); ?></span>
                    </div>

                    <div class="flex items-center gap-2 text-sm font-body">
                        <svg class="w-4 h-4 text-blue-600 dark:text-blue-400 flex-shrink-0" fill="currentColor"
                            viewBox="0 0 24 24" aria-hidden="true">
                            <path
                                d="M6.62 10.79c1.44 2.83 3.76 5.14 6.59 6.59l2.2-2.2c.27-.27.67-.36 1.02-.24 1.12.37 2.33.57 3.57.57.55 0 1 .45 1 1V20c0 .55-.45 1-1 1-9.39 0-17-7.61-17-17 0-.55.45-1 1-1h3.5c.55 0 1 .45 1 1 0 1.25.2 2.45.57 3.57.11.35.03.74-.25 1.02l-2.2 2.2z" />
                        </svg>
                        <a href="tel:<?php echo esc_attr( $ac['tel'] ); ?>"
                            class="text-gray-600 dark:text-gray-400 hover:text-blue-700 dark:hover:text-blue-400 transition-colors duration-200">
                            <?php echo esc_html( $ac['phone'] ); ?>
                        </a>
                    </div>

                    <div class="flex items-center gap-2 text-gray-600 dark:text-gray-400 text-sm font-body">
                        <svg class="w-4 h-4 text-blue-600 dark:text-blue-400 flex-shrink-0" fill="currentColor"
                            viewBox="0 0 24 24" aria-hidden="true">
                            <path
                                d="M20 4H4c-1.1 0-2 .9-2 2v12c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4-8 5-8-5V6l8 5 8-5v2z" />
                        </svg>
                        <span><?php echo esc_html( $ac['address'] ); ?></span>
                    </div>

                    <div class="flex items-center gap-2 text-gray-600 dark:text-gray-400 text-sm font-body">
                        <svg class="w-4 h-4 text-blue-600 dark:text-blue-400 flex-shrink-0" fill="currentColor"
                            viewBox="0 0 24 24" aria-hidden="true">
                            <path
                                d="M11.99 2C6.47 2 2 6.48 2 12s4.47 10 9.99 10C17.52 22 22 17.52 22 12S17.52 2 11.99 2zM12 20c-4.42 0-8-3.58-8-8s3.58-8 8-8 8 3.58 8 8-3.58 8-8 8zm.5-13H11v6l5.25 3.15.75-1.23-4.5-2.67z" />
                        </svg>
                        <span><?php echo esc_html( $ac['hours'] ); ?></span>
                    </div>
                </address>

                <div class="pt-4 border-t border-gray-200 dark:border-white/[0.08]">
                    <p class="text-gray-400 dark:text-gray-500 text-[10px] font-sub uppercase tracking-wider mb-2">
                        <?php esc_html_e( 'Services', 'nezer-motors' ); ?>
                    </p>
                    <div class="grid grid-cols-2 gap-1">
                        <?php foreach ( $ac['services'] as $svc ) : ?>
                        <p class="font-body text-xs text-gray-500 dark:text-gray-500">
                            <?php echo esc_html( $svc ); ?>
                        </p>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>


            <!-- ── Column 3: QwikFix ──────────────────────────────────── -->
            <?php $qf = nm_branch( 'qwikfix' ); ?>
            <div>
                <div class="flex items-center gap-2 mb-5">
                    <div
                        class="w-8 h-8 rounded-lg overflow-hidden bg-red-100 dark:bg-red-600/20 border border-red-300 dark:border-red-600/40 flex items-center justify-center flex-shrink-0">
                        <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/img/' . $qf['logo'] ); ?>"
                            alt="<?php echo esc_attr( $qf['logo_alt'] ); ?>"
                            class="w-full h-full object-contain p-1 dark:brightness-200" loading="lazy">
                    </div>
                    <span class="font-heading text-lg font-700 text-gray-900 dark:text-white">
                        <?php echo esc_html( $qf['name'] ); ?>
                    </span>
                </div>

                <address class="not-italic space-y-3 mb-6">
                    <div class="flex items-start gap-2 text-gray-600 dark:text-gray-400 text-sm font-body">
                        <svg class="w-4 h-4 text-blue-600 dark:text-blue-400 mt-0.5 flex-shrink-0" fill="currentColor"
                            viewBox="0 0 24 24" aria-hidden="true">
                            <path
                                d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z" />
                        </svg>
                        <span><?php echo esc_html( $qf['location'] ); ?></span>
                    </div>

                    <div class="flex items-center gap-2 text-sm font-body">
                        <svg class="w-4 h-4 text-blue-600 dark:text-blue-400 flex-shrink-0" fill="currentColor"
                            viewBox="0 0 24 24" aria-hidden="true">
                            <path
                                d="M6.62 10.79c1.44 2.83 3.76 5.14 6.59 6.59l2.2-2.2c.27-.27.67-.36 1.02-.24 1.12.37 2.33.57 3.57.57.55 0 1 .45 1 1V20c0 .55-.45 1-1 1-9.39 0-17-7.61-17-17 0-.55.45-1 1-1h3.5c.55 0 1 .45 1 1 0 1.25.2 2.45.57 3.57.11.35.03.74-.25 1.02l-2.2 2.2z" />
                        </svg>
                        <a href="tel:<?php echo esc_attr( $qf['tel'] ); ?>"
                            class="text-gray-600 dark:text-gray-400 hover:text-blue-700 dark:hover:text-blue-400 transition-colors duration-200">
                            <?php echo esc_html( $qf['phone'] ); ?>
                        </a>
                    </div>

                    <div class="flex items-center gap-2 text-gray-600 dark:text-gray-400 text-sm font-body">
                        <svg class="w-4 h-4 text-blue-600 dark:text-blue-400 flex-shrink-0" fill="currentColor"
                            viewBox="0 0 24 24" aria-hidden="true">
                            <path
                                d="M20 4H4c-1.1 0-2 .9-2 2v12c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4-8 5-8-5V6l8 5 8-5v2z" />
                        </svg>
                        <span><?php echo esc_html( $qf['address'] ); ?></span>
                    </div>

                    <div class="flex items-center gap-2 text-gray-600 dark:text-gray-400 text-sm font-body">
                        <svg class="w-4 h-4 text-blue-600 dark:text-blue-400 flex-shrink-0" fill="currentColor"
                            viewBox="0 0 24 24" aria-hidden="true">
                            <path
                                d="M11.99 2C6.47 2 2 6.48 2 12s4.47 10 9.99 10C17.52 22 22 17.52 22 12S17.52 2 11.99 2zM12 20c-4.42 0-8-3.58-8-8s3.58-8 8-8 8 3.58 8 8-3.58 8-8 8zm.5-13H11v6l5.25 3.15.75-1.23-4.5-2.67z" />
                        </svg>
                        <span><?php echo esc_html( $qf['hours'] ); ?></span>
                    </div>
                </address>

                <div class="pt-4 border-t border-gray-200 dark:border-white/[0.08]">
                    <p class="text-gray-400 dark:text-gray-500 text-[10px] font-sub uppercase tracking-wider mb-2">
                        <?php esc_html_e( 'Services', 'nezer-motors' ); ?>
                    </p>
                    <div class="grid grid-cols-2 gap-1">
                        <?php foreach ( $qf['services'] as $svc ) : ?>
                        <p class="font-body text-xs text-gray-500 dark:text-gray-500">
                            <?php echo esc_html( $svc ); ?>
                        </p>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>

        </div><!-- /grid -->


        <!-- ── Bottom bar ─────────────────────────────────────────────── -->
        <div
            class="mt-12 pt-8 border-t border-gray-200 dark:border-white/10 flex flex-col sm:flex-row items-center justify-between gap-4">
            <p class="font-body text-gray-400 dark:text-gray-600 text-sm">
                &copy; <?php echo esc_html( gmdate( 'Y' ) ); ?>
                <?php esc_html_e( 'Nezer Motors. All rights reserved.', 'nezer-motors' ); ?>
            </p>

            <nav aria-label="<?php esc_attr_e( 'Footer navigation', 'nezer-motors' ); ?>">
                <ul class="flex items-center gap-5 list-none m-0 p-0">
                    <li>
                        <a href="<?php echo esc_url( home_url( '/about/' ) ); ?>"
                            class="font-body text-gray-400 dark:text-gray-500 text-sm hover:text-gray-700 dark:hover:text-gray-300 transition-colors">
                            <?php esc_html_e( 'About', 'nezer-motors' ); ?>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>"
                            class="font-body text-gray-400 dark:text-gray-500 text-sm hover:text-gray-700 dark:hover:text-gray-300 transition-colors">
                            <?php esc_html_e( 'Contact', 'nezer-motors' ); ?>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo esc_url( home_url( '/sitemap.xml' ) ); ?>"
                            class="font-body text-gray-400 dark:text-gray-500 text-sm hover:text-gray-700 dark:hover:text-gray-300 transition-colors">
                            <?php esc_html_e( 'Sitemap', 'nezer-motors' ); ?>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>

    </div>
</footer>

<!-- ============================================================
     WHATSAPP FLOATING BUTTON
    ============================================================ -->
<?php get_template_part( 'template-parts/content/whatsapp', 'widget' );?>

<!-- ============================================================
     BACK TO TOP BUTTON
============================================================ -->
<button id="nm-back-top" aria-label="<?php esc_attr_e( 'Back to top', 'nezer-motors' ); ?>">
    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
        <path d="M7.41 15.41L12 10.83l4.59 4.58L18 14l-6-6-6 6z" />
    </svg>
</button>

<?php

}

?>