<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Nezer_Motors
 */
// Exit if accessed directly
defined( 'ABSPATH' ) || exit;

get_header();

$ac = nm_branch( 'autocare' );
$qf = nm_branch( 'qwikfix' );
?>

<main id="main-content"
    class="min-h-screen flex items-center justify-center px-4 relative overflow-hidden nm-section-light" role="main">

    <!-- Background glow blobs -->
    <div class="absolute inset-0 pointer-events-none overflow-hidden" aria-hidden="true">
        <div class="absolute top-1/3 left-1/4 w-96 h-96 rounded-full blur-3xl opacity-[0.09] dark:opacity-[0.12]"
            style="background:radial-gradient(circle,#d4a017,transparent)"></div>
        <div class="absolute bottom-1/3 right-1/4 w-80 h-80 rounded-full blur-3xl opacity-[0.07] dark:opacity-[0.10]"
            style="background:radial-gradient(circle,#1e40af,transparent)"></div>
    </div>

    <div class="text-center relative z-10 max-w-2xl mx-auto pt-24 pb-16">

        <!-- Floating car icon -->
        <div class="nm-float-icon w-24 h-24 rounded-3xl mx-auto mb-6 flex items-center justify-center shadow-2xl"
            style="background:linear-gradient(135deg,#d4a017,#f0c040)" aria-hidden="true">
            <svg class="w-12 h-12 text-black" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true"
                focusable="false">
                <path
                    d="M18.92 6.01C18.72 5.42 18.16 5 17.5 5h-11c-.66 0-1.21.42-1.42 1.01L3 12v8c0 .55.45 1 1 1h1c.55 0 1-.45 1-1v-1h12v1c0 .55.45 1 1 1h1c.55 0 1-.45 1-1v-8l-2.08-5.99zM6.5 16c-.83 0-1.5-.67-1.5-1.5S5.67 13 6.5 13s1.5.67 1.5 1.5S7.33 16 6.5 16zm11 0c-.83 0-1.5-.67-1.5-1.5s.67-1.5 1.5-1.5 1.5.67 1.5 1.5-.67 1.5-1.5 1.5zM5 11l1.5-4.5h11L19 11H5z" />
            </svg>
        </div>

        <!-- 404 number -->
        <p class="nm-404-num mb-3" aria-hidden="true">404</p>

        <h1 class="font-heading text-3xl sm:text-4xl font-700 mb-4 text-gray-900 dark:text-white">
            <?php esc_html_e( 'Looks like you took a wrong turn.', 'nezer-motors' ); ?>
        </h1>
        <p class="font-body text-base leading-relaxed mb-10 text-gray-500 dark:text-white/60">
            <?php esc_html_e( "The page you are looking for doesn't exist or may have been moved. Let us help you get back on track.", 'nezer-motors' ); ?>
        </p>

        <!-- Navigation shortcuts -->
        <nav aria-label="<?php esc_attr_e( '404 navigation shortcuts', 'nezer-motors' ); ?>"
            class="flex flex-wrap items-center justify-center gap-3 mb-12">
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>"
                class="inline-flex items-center gap-2 px-6 py-3 rounded-xl font-sub font-700 text-sm text-black hover:scale-105 transition-all"
                style="background:linear-gradient(135deg,#d4a017,#f0c040)">
                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                    <path d="M10 20v-6h4v6h5v-8h3L12 3 2 12h3v8z" />
                </svg>
                <?php esc_html_e( 'Go Home', 'nezer-motors' ); ?>
            </a>
            <a href="<?php echo esc_url( home_url( '/autocare-express/' ) ); ?>"
                class="inline-flex items-center gap-2 px-6 py-3 rounded-xl font-sub font-700 text-sm text-white hover:scale-105 transition-all"
                style="background:linear-gradient(135deg,#1e40af,#2563eb)">
                <?php esc_html_e( 'AutoCare Express', 'nezer-motors' ); ?>
            </a>
            <a href="<?php echo esc_url( home_url( '/qwikfix/' ) ); ?>"
                class="inline-flex items-center gap-2 px-6 py-3 rounded-xl font-sub font-700 text-sm text-white hover:scale-105 transition-all"
                style="background:linear-gradient(135deg,#dc2626,#ef4444)">
                <?php esc_html_e( 'QwikFix', 'nezer-motors' ); ?>
            </a>
            <a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>"
                class="inline-flex items-center gap-2 px-6 py-3 rounded-xl font-sub font-700 text-sm transition-all hover:scale-105 bg-white dark:bg-white/10 text-gray-700 dark:text-white hover:shadow-md dark:hover:bg-white/20 border border-gray-200 dark:border-white/20">
                <?php esc_html_e( 'Contact Us', 'nezer-motors' ); ?>
            </a>
        </nav>

        <!-- Quick call strip -->
        <div>
            <p class="font-sub font-700 text-xs uppercase tracking-widest mb-4 text-gray-400 dark:text-white/30">
                <?php esc_html_e( 'Or call us directly', 'nezer-motors' ); ?>
            </p>
            <div class="flex flex-wrap items-center justify-center gap-6">

                <a href="tel:<?php echo esc_attr( $ac['tel'] ); ?>"
                    class="flex items-center gap-2 font-body text-sm transition-colors text-gray-600 dark:text-white/55 hover:text-blue-600 dark:hover:text-blue-400"
                    aria-label="<?php echo esc_attr( sprintf( __( 'Call AutoCare Express on %s', 'nezer-motors' ), $ac['phone'] ) ); ?>">
                    <div class="w-7 h-7 rounded-lg flex items-center justify-center flex-shrink-0"
                        style="background:rgba(30,64,175,0.18)" aria-hidden="true">
                        <svg class="w-3.5 h-3.5 text-blue-500 dark:text-blue-400" fill="currentColor"
                            viewBox="0 0 24 24" aria-hidden="true">
                            <path
                                d="M6.62 10.79c1.44 2.83 3.76 5.14 6.59 6.59l2.2-2.2c.27-.27.67-.36 1.02-.24 1.12.37 2.33.57 3.57.57.55 0 1 .45 1 1V20c0 .55-.45 1-1 1-9.39 0-17-7.61-17-17 0-.55.45-1 1-1h3.5c.55 0 1 .45 1 1 0 1.25.2 2.45.57 3.57.11.35.03.74-.25 1.02l-2.2 2.2z" />
                        </svg>
                    </div>
                    <span>
                        <span
                            class="block font-sub font-700 text-xs text-gray-400 dark:text-white/35"><?php esc_html_e( 'AutoCare Express', 'nezer-motors' ); ?></span>
                        <?php echo esc_html( $ac['phone'] ); ?>
                    </span>
                </a>

                <span class="text-gray-200 dark:text-white/15 hidden sm:block" aria-hidden="true">|</span>

                <a href="tel:<?php echo esc_attr( $qf['tel'] ); ?>"
                    class="flex items-center gap-2 font-body text-sm transition-colors text-gray-600 dark:text-white/55 hover:text-red-600 dark:hover:text-red-400"
                    aria-label="<?php echo esc_attr( sprintf( __( 'Call QwikFix on %s', 'nezer-motors' ), $qf['phone'] ) ); ?>">
                    <div class="w-7 h-7 rounded-lg flex items-center justify-center flex-shrink-0"
                        style="background:rgba(220,38,38,0.18)" aria-hidden="true">
                        <svg class="w-3.5 h-3.5 text-red-500 dark:text-red-400" fill="currentColor" viewBox="0 0 24 24"
                            aria-hidden="true">
                            <path
                                d="M6.62 10.79c1.44 2.83 3.76 5.14 6.59 6.59l2.2-2.2c.27-.27.67-.36 1.02-.24 1.12.37 2.33.57 3.57.57.55 0 1 .45 1 1V20c0 .55-.45 1-1 1-9.39 0-17-7.61-17-17 0-.55.45-1 1-1h3.5c.55 0 1 .45 1 1 0 1.25.2 2.45.57 3.57.11.35.03.74-.25 1.02l-2.2 2.2z" />
                        </svg>
                    </div>
                    <span>
                        <span
                            class="block font-sub font-700 text-xs text-gray-400 dark:text-white/35"><?php esc_html_e( 'QwikFix', 'nezer-motors' ); ?></span>
                        <?php echo esc_html( $qf['phone'] ); ?>
                    </span>
                </a>

                <span class="text-gray-200 dark:text-white/15 hidden sm:block" aria-hidden="true">|</span>

                <a href="https://wa.me/<?php echo esc_attr( NM_WA_NUM ); ?>" target="_blank" rel="noopener noreferrer"
                    class="flex items-center gap-2 font-body text-sm transition-colors text-gray-600 dark:text-white/55 hover:text-green-600 dark:hover:text-green-400"
                    aria-label="<?php esc_attr_e( 'Chat with Nezer Motors on WhatsApp', 'nezer-motors' ); ?>">
                    <div class="w-7 h-7 rounded-lg flex items-center justify-center flex-shrink-0"
                        style="background:rgba(37,211,102,0.18)" aria-hidden="true">
                        <svg class="w-3.5 h-3.5 text-green-500 dark:text-green-400" fill="currentColor"
                            viewBox="0 0 24 24" aria-hidden="true">
                            <path
                                d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z" />
                        </svg>
                    </div>
                    <span>
                        <span
                            class="block font-sub font-700 text-xs text-gray-400 dark:text-white/35"><?php esc_html_e( 'WhatsApp', 'nezer-motors' ); ?></span>
                        <?php esc_html_e( '0733 204 672', 'nezer-motors' ); ?>
                    </span>
                </a>
            </div>
        </div>

    </div>
</main>

<?php
get_footer();