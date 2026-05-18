<?php
/**
 * The template for displaying the front page
 *
 * This is the template that displays the front page by default. Please note that
 * this is the WordPress construct of pages: specifically, posts with a post
 * type of `page`.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Nezer_Motors
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// SEO meta
add_action( 'wp_head', function () {
	nm_seo_meta(
		esc_html__( 'Nezer Motors | AutoCare Express & QwikFix — Vehicle Servicing in Nyeri, Kenya', 'nezer-motors' ),
		esc_html__( 'Nezer Motors — Nyeri\'s trusted automotive group. AutoCare Express (mechanical repairs, engine overhaul, suspension, shocks) and QwikFix at Shell Station (alignment, tyres, batteries, oil change). Open Mon–Sat 8AM–5PM.', 'nezer-motors' )
	);
	nm_organization_schema();
}, 5 );

get_header();

$ac = nm_branch( 'autocare' );
$qf = nm_branch( 'qwikfix' );
?>

<main id="main-content" role="main">

    <!-- ============================================================
     HERO
    ============================================================ -->
    <section id="nm-hero" data-active-brand="autocare"
        aria-label="<?php esc_attr_e( 'Nezer Motors — choose a branch', 'nezer-motors' ); ?>"
        class="relative overflow-hidden">

        <div class="nm-hero-bg" aria-hidden="true"></div>
        <div class="nm-hero-dots" aria-hidden="true"></div>

        <div
            class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 w-full pt-28 pb-16 lg:pt-0 lg:pb-0 min-h-screen flex items-center">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-10 lg:gap-16 items-center w-full py-16">

                <!-- ── LEFT: Dynamic content per tab ── -->
                <div>

                    <!-- AutoCare Panel -->
                    <div data-hero-panel="autocare"
                        aria-label="<?php esc_attr_e( 'AutoCare Express information', 'nezer-motors' ); ?>">
                        <span
                            class="nm-hero-badge inline-flex items-center gap-2 px-3 py-1.5 rounded-full text-xs font-sub font-700 tracking-widest uppercase mb-5 nm-glass text-blue-300 dark:text-blue-300 border border-blue-500/30">
                            <span class="w-1.5 h-1.5 rounded-full bg-blue-400 animate-pulse" aria-hidden="true"></span>
                            <?php esc_html_e( 'AutoCare Express — Nyeri', 'nezer-motors' ); ?>
                        </span>
                        <h1
                            class="font-heading text-5xl sm:text-6xl lg:text-7xl font-700 leading-none mb-5 text-gray-900 dark:text-white">
                            <?php esc_html_e( 'Expert Car', 'nezer-motors' ); ?><br>
                            <span
                                style="background:linear-gradient(135deg,#60a5fa,#2563eb);-webkit-background-clip:text;-webkit-text-fill-color:transparent;background-clip:text;"><?php esc_html_e( 'Repairs', 'nezer-motors' ); ?></span><br>
                            <?php esc_html_e( 'You Trust', 'nezer-motors' ); ?>
                        </h1>
                        <p
                            class="nm-hero-sub font-body text-lg text-gray-600 dark:text-white/65 mb-8 max-w-md leading-relaxed">
                            <?php esc_html_e( 'Mechanical repairs, engine overhaul, suspension and shocks — professional care at Kingongo, Nyeri.', 'nezer-motors' ); ?>
                        </p>
                        <div class="flex flex-wrap gap-3 mb-7">
                            <a href="<?php echo esc_url( home_url( '/autocare-express/' ) ); ?>"
                                class="inline-flex items-center gap-2 px-6 py-3 rounded-xl font-sub font-700 text-sm text-white hover:scale-105 hover:shadow-lg hover:shadow-blue-600/25 transition-all"
                                style="background:linear-gradient(135deg,#1e40af,#2563eb)">
                                <?php esc_html_e( 'Our Services', 'nezer-motors' ); ?>
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                    <path d="M8.59 16.59L13.17 12 8.59 7.41 10 6l6 6-6 6z" />
                                </svg>
                            </a>
                            <a href="tel:<?php echo esc_attr( $ac['tel'] ); ?>"
                                class="nm-hero-ghost-btn inline-flex items-center gap-2 px-6 py-3 rounded-xl font-sub font-700 text-sm text-gray-900 dark:text-white nm-glass border border-black/10 dark:border-white/25 hover:bg-black/[0.06] dark:hover:bg-white/15 transition-all">
                                <svg class="w-4 h-4 text-blue-500 dark:text-blue-300" fill="currentColor"
                                    viewBox="0 0 24 24" aria-hidden="true">
                                    <path
                                        d="M6.62 10.79c1.44 2.83 3.76 5.14 6.59 6.59l2.2-2.2c.27-.27.67-.36 1.02-.24 1.12.37 2.33.57 3.57.57.55 0 1 .45 1 1V20c0 .55-.45 1-1 1-9.39 0-17-7.61-17-17 0-.55.45-1 1-1h3.5c.55 0 1 .45 1 1 0 1.25.2 2.45.57 3.57.11.35.03.74-.25 1.02l-2.2 2.2z" />
                                </svg>
                                <?php echo esc_html( $ac['phone'] ); ?>
                            </a>
                        </div>
                        <div class="flex flex-wrap gap-2">
                            <span
                                class="nm-hero-chip px-3 py-1 rounded-full text-xs font-sub font-700 nm-glass text-gray-700 dark:text-white/70 border border-black/08 dark:border-white/15">
                                <svg class="w-3 h-3 inline mr-1 text-blue-500 dark:text-blue-400" fill="currentColor"
                                    viewBox="0 0 24 24" aria-hidden="true">
                                    <path
                                        d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z" />
                                </svg>
                                <?php echo esc_html( $ac['location'] ); ?>
                            </span>
                            <span
                                class="nm-hero-chip px-3 py-1 rounded-full text-xs font-sub font-700 nm-glass text-gray-700 dark:text-white/70 border border-black/08 dark:border-white/15">
                                <?php echo esc_html( $ac['hours'] ); ?>
                            </span>
                        </div>
                    </div>

                    <!-- QwikFix Panel -->
                    <div data-hero-panel="qwikfix"
                        aria-label="<?php esc_attr_e( 'QwikFix information', 'nezer-motors' ); ?>">
                        <span
                            class="nm-hero-badge inline-flex items-center gap-2 px-3 py-1.5 rounded-full text-xs font-sub font-700 tracking-widest uppercase mb-5 nm-glass text-red-300 dark:text-red-300 border border-red-500/30">
                            <span class="w-1.5 h-1.5 rounded-full bg-red-400 animate-pulse" aria-hidden="true"></span>
                            <?php esc_html_e( 'QwikFix — Shell Station, Nyeri', 'nezer-motors' ); ?>
                        </span>
                        <h1
                            class="font-heading text-5xl sm:text-6xl lg:text-7xl font-700 leading-none mb-5 text-gray-900 dark:text-white">
                            <?php esc_html_e( 'Alignment.', 'nezer-motors' ); ?><br>
                            <span
                                style="background:linear-gradient(135deg,#fbbf24,#ef4444);-webkit-background-clip:text;-webkit-text-fill-color:transparent;background-clip:text;"><?php esc_html_e( 'Tyres.', 'nezer-motors' ); ?></span><br>
                            <?php esc_html_e( 'Done Right.', 'nezer-motors' ); ?>
                        </h1>
                        <p
                            class="nm-hero-sub font-body text-lg text-gray-600 dark:text-white/65 mb-8 max-w-md leading-relaxed">
                            <?php esc_html_e( 'Wheel balancing, alignment, oil change, batteries, tyre sales and car accessories at Shell Service Station, Nyeri-Nyahururu Road.', 'nezer-motors' ); ?>
                        </p>
                        <div class="flex flex-wrap gap-3 mb-7">
                            <a href="<?php echo esc_url( home_url( '/qwikfix/' ) ); ?>"
                                class="inline-flex items-center gap-2 px-6 py-3 rounded-xl font-sub font-700 text-sm text-white hover:scale-105 hover:shadow-lg hover:shadow-red-600/25 transition-all"
                                style="background:linear-gradient(135deg,#dc2626,#ef4444)">
                                <?php esc_html_e( 'Our Services', 'nezer-motors' ); ?>
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                    <path d="M8.59 16.59L13.17 12 8.59 7.41 10 6l6 6-6 6z" />
                                </svg>
                            </a>
                            <a href="tel:<?php echo esc_attr( $qf['tel'] ); ?>"
                                class="nm-hero-ghost-btn inline-flex items-center gap-2 px-6 py-3 rounded-xl font-sub font-700 text-sm text-gray-900 dark:text-white nm-glass border border-black/10 dark:border-white/25 hover:bg-black/[0.06] dark:hover:bg-white/15 transition-all">
                                <svg class="w-4 h-4 text-red-500 dark:text-red-300" fill="currentColor"
                                    viewBox="0 0 24 24" aria-hidden="true">
                                    <path
                                        d="M6.62 10.79c1.44 2.83 3.76 5.14 6.59 6.59l2.2-2.2c.27-.27.67-.36 1.02-.24 1.12.37 2.33.57 3.57.57.55 0 1 .45 1 1V20c0 .55-.45 1-1 1-9.39 0-17-7.61-17-17 0-.55.45-1 1-1h3.5c.55 0 1 .45 1 1 0 1.25.2 2.45.57 3.57.11.35.03.74-.25 1.02l-2.2 2.2z" />
                                </svg>
                                <?php echo esc_html( $qf['phone'] ); ?>
                            </a>
                        </div>
                        <div class="flex flex-wrap gap-2">
                            <span
                                class="nm-hero-chip px-3 py-1 rounded-full text-xs font-sub font-700 nm-glass text-gray-700 dark:text-white/70 border border-black/08 dark:border-white/15">
                                <svg class="w-3 h-3 inline mr-1 text-red-500 dark:text-red-400" fill="currentColor"
                                    viewBox="0 0 24 24" aria-hidden="true">
                                    <path
                                        d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z" />
                                </svg>
                                <?php echo esc_html( $qf['location'] ); ?>
                            </span>
                            <span
                                class="nm-hero-chip px-3 py-1 rounded-full text-xs font-sub font-700 nm-glass text-gray-700 dark:text-white/70 border border-black/08 dark:border-white/15">
                                <?php echo esc_html( $qf['hours'] ); ?>
                            </span>
                        </div>
                    </div>
                </div>

                <!-- ── RIGHT: Tab card ── -->
                <div class="w-full max-w-md mx-auto lg:mx-0 lg:ml-auto">
                    <div class="nm-tab-card" role="tablist"
                        aria-label="<?php esc_attr_e( 'Select a branch', 'nezer-motors' ); ?>">

                        <!-- Tab headers -->
                        <div class="flex" style="background:rgba(0,0,0,0.25)">
                            <button class="nm-hero-tab" data-hero-tab="autocare" role="tab" aria-selected="true"
                                aria-controls="nm-panel-autocare" id="nm-tab-autocare">
                                <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/img/' . $ac['logo'] ); ?>"
                                    alt="<?php echo esc_attr( $ac['logo_alt'] ); ?>" class="h-5 w-auto object-contain"
                                    loading="eager">
                                <span><?php esc_html_e( 'AutoCare', 'nezer-motors' ); ?></span>
                            </button>
                            <button class="nm-hero-tab" data-hero-tab="qwikfix" role="tab" aria-selected="false"
                                aria-controls="nm-panel-qwikfix" id="nm-tab-qwikfix">
                                <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/img/' . $qf['logo'] ); ?>"
                                    alt="<?php echo esc_attr( $qf['logo_alt'] ); ?>"
                                    class="h-5 w-auto object-contain brightness-200" loading="eager">
                                <span><?php esc_html_e( 'QwikFix', 'nezer-motors' ); ?></span>
                            </button>
                        </div>

                        <!-- AutoCare Tab Content -->
                        <div id="nm-panel-autocare" data-hero-panel="autocare" role="tabpanel"
                            aria-labelledby="nm-tab-autocare" class="p-6">

                            <div
                                class="flex items-center gap-3 mb-5 pb-4 nm-tc-divider border-b border-white/10 dark:border-white/10">
                                <div class="w-10 h-10 rounded-xl overflow-hidden flex items-center justify-center flex-shrink-0"
                                    style="background:rgba(30,64,175,0.25)">
                                    <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/img/' . $ac['logo'] ); ?>"
                                        alt="<?php echo esc_attr( $ac['logo_alt'] ); ?>"
                                        class="w-full h-full object-contain p-1" loading="lazy">
                                </div>
                                <div>
                                    <p
                                        class="nm-tc-branch-name font-heading text-lg font-700 text-white dark:text-white leading-tight">
                                        <?php echo esc_html( $ac['name'] ); ?></p>
                                    <p class="nm-tc-meta text-white/40 dark:text-white/40 text-xs font-body">
                                        <?php echo esc_html( $ac['tagline'] ); ?></p>
                                </div>
                                <span
                                    class="ml-auto inline-flex items-center gap-1 px-2 py-0.5 rounded-full text-xs font-sub font-700 text-green-300"
                                    style="background:rgba(34,197,94,0.15);border:1px solid rgba(34,197,94,0.30)">
                                    <span class="w-1.5 h-1.5 rounded-full bg-green-400 animate-pulse"
                                        aria-hidden="true"></span>
                                    <?php esc_html_e( 'Open', 'nezer-motors' ); ?>
                                </span>
                            </div>

                            <div class="space-y-3 mb-4">
                                <?php
              $ac_meta = [
                [ 'icon' => 'location', 'label' => __( 'Location', 'nezer-motors' ), 'value' => $ac['location'],  'color' => 'rgba(30,64,175,0.25)', 'icon_color' => '#93c5fd' ],
                [ 'icon' => 'clock',    'label' => __( 'Hours',    'nezer-motors' ), 'value' => $ac['hours'],    'color' => 'rgba(30,64,175,0.25)', 'icon_color' => '#93c5fd' ],
                [ 'icon' => 'phone',    'label' => __( 'Phone',    'nezer-motors' ), 'value' => $ac['phone'],    'color' => 'rgba(30,64,175,0.25)', 'icon_color' => '#93c5fd', 'link' => 'tel:' . $ac['tel'] ],
              ];
              foreach ( $ac_meta as $m ) :
              ?>
                                <div class="flex items-start gap-3">
                                    <div class="w-7 h-7 rounded-lg flex items-center justify-center flex-shrink-0"
                                        style="background:<?php echo esc_attr( $m['color'] ); ?>">
                                        <?php if ( $m['icon'] === 'location' ) : ?>
                                        <svg class="w-3.5 h-3.5" fill="currentColor"
                                            style="color:<?php echo esc_attr( $m['icon_color'] ); ?>"
                                            viewBox="0 0 24 24" aria-hidden="true">
                                            <path
                                                d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z" />
                                        </svg>
                                        <?php elseif ( $m['icon'] === 'clock' ) : ?>
                                        <svg class="w-3.5 h-3.5" fill="currentColor"
                                            style="color:<?php echo esc_attr( $m['icon_color'] ); ?>"
                                            viewBox="0 0 24 24" aria-hidden="true">
                                            <path
                                                d="M11.99 2C6.47 2 2 6.48 2 12s4.47 10 9.99 10C17.52 22 22 17.52 22 12S17.52 2 11.99 2zM12 20c-4.42 0-8-3.58-8-8s3.58-8 8-8 8 3.58 8 8-3.58 8-8 8zm.5-13H11v6l5.25 3.15.75-1.23-4.5-2.67z" />
                                        </svg>
                                        <?php else : ?>
                                        <svg class="w-3.5 h-3.5" fill="currentColor"
                                            style="color:<?php echo esc_attr( $m['icon_color'] ); ?>"
                                            viewBox="0 0 24 24" aria-hidden="true">
                                            <path
                                                d="M6.62 10.79c1.44 2.83 3.76 5.14 6.59 6.59l2.2-2.2c.27-.27.67-.36 1.02-.24 1.12.37 2.33.57 3.57.57.55 0 1 .45 1 1V20c0 .55-.45 1-1 1-9.39 0-17-7.61-17-17 0-.55.45-1 1-1h3.5c.55 0 1 .45 1 1 0 1.25.2 2.45.57 3.57.11.35.03.74-.25 1.02l-2.2 2.2z" />
                                        </svg>
                                        <?php endif; ?>
                                    </div>
                                    <div>
                                        <p
                                            class="nm-tc-label text-[10px] font-sub uppercase tracking-widest text-white/35 dark:text-white/35 mb-0.5">
                                            <?php echo esc_html( $m['label'] ); ?></p>
                                        <?php if ( isset( $m['link'] ) ) : ?>
                                        <a href="<?php echo esc_url( $m['link'] ); ?>"
                                            class="nm-tc-body font-body text-sm text-white dark:text-white hover:opacity-80 transition-opacity"><?php echo esc_html( $m['value'] ); ?></a>
                                        <?php else : ?>
                                        <p class="nm-tc-body font-body text-sm text-white dark:text-white">
                                            <?php echo esc_html( $m['value'] ); ?></p>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <?php endforeach; ?>
                            </div>

                            <div class="nm-tc-svc-box p-3 rounded-xl mb-4"
                                style="background:rgba(0,0,0,0.18);border:1px solid rgba(255,255,255,0.07)">
                                <p
                                    class="nm-tc-label text-[10px] font-sub uppercase tracking-widest text-white/30 dark:text-white/30 mb-2">
                                    <?php esc_html_e( 'Services', 'nezer-motors' ); ?></p>
                                <div class="flex flex-wrap gap-1.5">
                                    <?php foreach ( $ac['services'] as $svc ) : nm_service_chip( $svc, 'autocare' ); endforeach; ?>
                                </div>
                            </div>

                            <div class="grid grid-cols-2 gap-2">
                                <a href="<?php echo esc_url( home_url( '/autocare-express/' ) ); ?>"
                                    class="text-center py-2.5 rounded-xl font-sub font-700 text-sm text-white hover:opacity-90 transition-opacity"
                                    style="background:linear-gradient(135deg,#1e40af,#2563eb)">
                                    <?php esc_html_e( 'View Services', 'nezer-motors' ); ?>
                                </a>
                                <a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>"
                                    class="nm-tc-ghost text-center py-2.5 rounded-xl font-sub font-700 text-sm text-white dark:text-white hover:bg-white/10 transition-all"
                                    style="border:1px solid rgba(255,255,255,0.18)">
                                    <?php esc_html_e( 'Book Now', 'nezer-motors' ); ?>
                                </a>
                            </div>
                        </div>

                        <!-- QwikFix Tab Content -->
                        <div id="nm-panel-qwikfix" data-hero-panel="qwikfix" role="tabpanel"
                            aria-labelledby="nm-tab-qwikfix" class="p-6">

                            <div
                                class="flex items-center gap-3 mb-5 pb-4 nm-tc-divider border-b border-white/10 dark:border-white/10">
                                <div class="w-10 h-10 rounded-xl overflow-hidden flex items-center justify-center flex-shrink-0"
                                    style="background:rgba(220,38,38,0.25)">
                                    <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/img/' . $qf['logo'] ); ?>"
                                        alt="<?php echo esc_attr( $qf['logo_alt'] ); ?>"
                                        class="w-full h-full object-contain p-1 brightness-200" loading="lazy">
                                </div>
                                <div>
                                    <p
                                        class="nm-tc-branch-name font-heading text-lg font-700 text-white dark:text-white leading-tight">
                                        <?php echo esc_html( $qf['name'] ); ?></p>
                                    <p class="nm-tc-meta text-white/40 dark:text-white/40 text-xs font-body">
                                        <?php echo esc_html( $qf['tagline'] ); ?></p>
                                </div>
                                <span
                                    class="ml-auto inline-flex items-center gap-1 px-2 py-0.5 rounded-full text-xs font-sub font-700 text-green-300"
                                    style="background:rgba(34,197,94,0.15);border:1px solid rgba(34,197,94,0.30)">
                                    <span class="w-1.5 h-1.5 rounded-full bg-green-400 animate-pulse"
                                        aria-hidden="true"></span>
                                    <?php esc_html_e( 'Open', 'nezer-motors' ); ?>
                                </span>
                            </div>

                            <div class="space-y-3 mb-4">
                                <?php
              $qf_meta = [
                [ 'icon' => 'location', 'label' => __( 'Location', 'nezer-motors' ), 'value' => $qf['location'], 'color' => 'rgba(220,38,38,0.25)', 'icon_color' => '#fca5a5' ],
                [ 'icon' => 'clock',    'label' => __( 'Hours',    'nezer-motors' ), 'value' => $qf['hours'],   'color' => 'rgba(220,38,38,0.25)', 'icon_color' => '#fca5a5' ],
                [ 'icon' => 'phone',    'label' => __( 'Phone',    'nezer-motors' ), 'value' => $qf['phone'],   'color' => 'rgba(220,38,38,0.25)', 'icon_color' => '#fca5a5', 'link' => 'tel:' . $qf['tel'] ],
              ];
              foreach ( $qf_meta as $m ) :
              ?>
                                <div class="flex items-start gap-3">
                                    <div class="w-7 h-7 rounded-lg flex items-center justify-center flex-shrink-0"
                                        style="background:<?php echo esc_attr( $m['color'] ); ?>">
                                        <?php if ( $m['icon'] === 'location' ) : ?>
                                        <svg class="w-3.5 h-3.5" fill="currentColor"
                                            style="color:<?php echo esc_attr( $m['icon_color'] ); ?>"
                                            viewBox="0 0 24 24" aria-hidden="true">
                                            <path
                                                d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z" />
                                        </svg>
                                        <?php elseif ( $m['icon'] === 'clock' ) : ?>
                                        <svg class="w-3.5 h-3.5" fill="currentColor"
                                            style="color:<?php echo esc_attr( $m['icon_color'] ); ?>"
                                            viewBox="0 0 24 24" aria-hidden="true">
                                            <path
                                                d="M11.99 2C6.47 2 2 6.48 2 12s4.47 10 9.99 10C17.52 22 22 17.52 22 12S17.52 2 11.99 2zM12 20c-4.42 0-8-3.58-8-8s3.58-8 8-8 8 3.58 8 8-3.58 8-8 8zm.5-13H11v6l5.25 3.15.75-1.23-4.5-2.67z" />
                                        </svg>
                                        <?php else : ?>
                                        <svg class="w-3.5 h-3.5" fill="currentColor"
                                            style="color:<?php echo esc_attr( $m['icon_color'] ); ?>"
                                            viewBox="0 0 24 24" aria-hidden="true">
                                            <path
                                                d="M6.62 10.79c1.44 2.83 3.76 5.14 6.59 6.59l2.2-2.2c.27-.27.67-.36 1.02-.24 1.12.37 2.33.57 3.57.57.55 0 1 .45 1 1V20c0 .55-.45 1-1 1-9.39 0-17-7.61-17-17 0-.55.45-1 1-1h3.5c.55 0 1 .45 1 1 0 1.25.2 2.45.57 3.57.11.35.03.74-.25 1.02l-2.2 2.2z" />
                                        </svg>
                                        <?php endif; ?>
                                    </div>
                                    <div>
                                        <p
                                            class="nm-tc-label text-[10px] font-sub uppercase tracking-widest text-white/35 dark:text-white/35 mb-0.5">
                                            <?php echo esc_html( $m['label'] ); ?></p>
                                        <?php if ( isset( $m['link'] ) ) : ?>
                                        <a href="<?php echo esc_url( $m['link'] ); ?>"
                                            class="nm-tc-body font-body text-sm text-white dark:text-white hover:opacity-80 transition-opacity"><?php echo esc_html( $m['value'] ); ?></a>
                                        <?php else : ?>
                                        <p class="nm-tc-body font-body text-sm text-white dark:text-white">
                                            <?php echo esc_html( $m['value'] ); ?></p>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <?php endforeach; ?>
                            </div>

                            <div class="nm-tc-svc-box p-3 rounded-xl mb-4"
                                style="background:rgba(0,0,0,0.18);border:1px solid rgba(255,255,255,0.07)">
                                <p
                                    class="nm-tc-label text-[10px] font-sub uppercase tracking-widest text-white/30 dark:text-white/30 mb-2">
                                    <?php esc_html_e( 'Services', 'nezer-motors' ); ?></p>
                                <div class="flex flex-wrap gap-1.5">
                                    <?php foreach ( $qf['services'] as $svc ) : nm_service_chip( $svc, 'qwikfix' ); endforeach; ?>
                                </div>
                            </div>

                            <div class="grid grid-cols-2 gap-2">
                                <a href="<?php echo esc_url( home_url( '/qwikfix/' ) ); ?>"
                                    class="text-center py-2.5 rounded-xl font-sub font-700 text-sm text-white hover:opacity-90 transition-opacity"
                                    style="background:linear-gradient(135deg,#dc2626,#ef4444)">
                                    <?php esc_html_e( 'View Services', 'nezer-motors' ); ?>
                                </a>
                                <a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>"
                                    class="nm-tc-ghost text-center py-2.5 rounded-xl font-sub font-700 text-sm text-white dark:text-white hover:bg-white/10 transition-all"
                                    style="border:1px solid rgba(255,255,255,0.18)">
                                    <?php esc_html_e( 'Book Now', 'nezer-motors' ); ?>
                                </a>
                            </div>
                        </div>
                    </div><!-- /nm-tab-card -->
                </div>

            </div><!-- /grid -->
        </div>

        <!-- Scroll indicator -->
        <div class="absolute bottom-8 left-1/2 -translate-x-1/2 flex flex-col items-center gap-2 z-10"
            aria-hidden="true">
            <span
                class="nm-scroll-label font-sub text-xs tracking-widest uppercase text-gray-500 dark:text-white/30"><?php esc_html_e( 'Scroll', 'nezer-motors' ); ?></span>
            <div
                class="nm-scroll-line w-px h-10 bg-gradient-to-b from-gray-400 dark:from-white/40 to-transparent animate-pulse">
            </div>
        </div>
    </section>

    <!-- ============================================================
     STATS BAR
    ============================================================ -->
    <section class="nm-stats-bar py-10" aria-label="<?php esc_attr_e( 'Nezer Motors at a glance', 'nezer-motors' ); ?>">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <dl class="grid grid-cols-2 md:grid-cols-4 gap-8 text-center" data-animate-stagger>
                <?php
      $stats = [
        [ 'value' => '2',        'label' => __( 'Branch Locations', 'nezer-motors' ) ],
        [ 'value' => '10+',      'label' => __( 'Services Offered',  'nezer-motors' ) ],
        [ 'value' => 'Mon–Sat',  'label' => __( 'Open 6 Days',       'nezer-motors' ) ],
        [ 'value' => 'Nyeri',    'label' => __( 'Based & Trusted',   'nezer-motors' ) ],
      ];
      foreach ( $stats as $stat ) :
      ?>
                <div>
                    <dt class="font-heading text-4xl sm:text-5xl font-700 text-gold-500">
                        <?php echo esc_html( $stat['value'] ); ?></dt>
                    <dd
                        class="font-sub text-sm font-600 uppercase tracking-widest mt-1 text-gray-500 dark:text-white/50">
                        <?php echo esc_html( $stat['label'] ); ?></dd>
                </div>
                <?php endforeach; ?>
            </dl>
        </div>
    </section>

    <!-- ============================================================
     SERVICES OVERVIEW
    ============================================================ -->
    <section class="py-24 nm-section-light overflow-hidden relative" id="services" aria-labelledby="services-heading">
        <div class="absolute top-0 right-0 w-96 h-96 rounded-full blur-3xl opacity-[0.07] pointer-events-none bg-blue-600 dark:opacity-15"
            aria-hidden="true"></div>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="text-center mb-16" data-animate>
                <span
                    class="inline-flex px-3 py-1.5 rounded-full text-xs font-sub font-700 tracking-widest uppercase mb-4 bg-gold-500/10 dark:bg-gold-500/15 text-gold-600 dark:text-gold-400 border border-gold-500/20 dark:border-gold-500/30">
                    <?php esc_html_e( 'What We Offer', 'nezer-motors' ); ?>
                </span>
                <h2 id="services-heading"
                    class="font-heading text-4xl sm:text-5xl font-700 text-gray-900 dark:text-white">
                    <?php esc_html_e( 'Services Across Both Branches', 'nezer-motors' ); ?>
                </h2>
                <p class="font-body mt-4 max-w-xl mx-auto text-gray-500 dark:text-white/60">
                    <?php esc_html_e( 'From mechanical overhauls to tyre sales, our two branches cover everything your vehicle needs.', 'nezer-motors' ); ?>
                </p>
            </div>

            <?php
    $services = [
      [ 'title' => __( 'Mechanical Repairs', 'nezer-motors' ), 'desc' => __( 'Comprehensive mechanical repair service for all vehicle makes and models.', 'nezer-motors' ), 'icon' => '🔧', 'c1' => '#1e3a8a', 'c2' => '#2563eb', 'branch' => 'autocare' ],
      [ 'title' => __( 'Engine Overhaul',    'nezer-motors' ), 'desc' => __( 'Full engine rebuilds and top-end overhauls by skilled technicians.',            'nezer-motors' ), 'icon' => '⚙️', 'c1' => '#0f1f5c', 'c2' => '#1e40af', 'branch' => 'autocare' ],
      [ 'title' => __( 'Suspension',         'nezer-motors' ), 'desc' => __( 'Full suspension diagnostics, repairs and component replacement.',               'nezer-motors' ), 'icon' => '🚗', 'c1' => '#1e3a8a', 'c2' => '#3b82f6', 'branch' => 'autocare' ],
      [ 'title' => __( 'Shocks',             'nezer-motors' ), 'desc' => __( 'Shock absorber testing and replacement for a smooth, safe ride.',               'nezer-motors' ), 'icon' => '🏎️', 'c1' => '#1e40af', 'c2' => '#2563eb', 'branch' => 'autocare' ],
      [ 'title' => __( 'Wheel Balancing',    'nezer-motors' ), 'desc' => __( 'Dynamic balancing for all tyre sizes to eliminate vibration.',                  'nezer-motors' ), 'icon' => '⚖️', 'c1' => '#7f1d1d', 'c2' => '#dc2626', 'branch' => 'qwikfix' ],
      [ 'title' => __( 'Wheel Alignment',    'nezer-motors' ), 'desc' => __( 'Computerised 4-wheel alignment for saloons and SUVs.',                          'nezer-motors' ), 'icon' => '🎯', 'c1' => '#991b1b', 'c2' => '#ef4444', 'branch' => 'qwikfix' ],
      [ 'title' => __( 'Oil Change',         'nezer-motors' ), 'desc' => __( 'Engine oil and filter service using quality-approved products.',                 'nezer-motors' ), 'icon' => '🛢️', 'c1' => '#78350f', 'c2' => '#d97706', 'branch' => 'qwikfix' ],
      [ 'title' => __( 'Batteries',          'nezer-motors' ), 'desc' => __( 'Battery testing, supply and professional fitting for all vehicles.',             'nezer-motors' ), 'icon' => '⚡', 'c1' => '#713f12', 'c2' => '#ca8a04', 'branch' => 'qwikfix' ],
      [ 'title' => __( 'Tyre Sales',         'nezer-motors' ), 'desc' => __( 'Quality tyres sourced and professionally fitted for all vehicle types.',         'nezer-motors' ), 'icon' => '🔘', 'c1' => '#7f1d1d', 'c2' => '#b91c1c', 'branch' => 'qwikfix' ],
      [ 'title' => __( 'Car Accessories',    'nezer-motors' ), 'desc' => __( 'A wide range of quality car accessories available in-store.',                    'nezer-motors' ), 'icon' => '🛒', 'c1' => '#450a0a', 'c2' => '#dc2626', 'branch' => 'qwikfix' ],
    ];
    ?>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-5 gap-4" data-animate-stagger>
                <?php foreach ( $services as $svc ) :
        $branch_label = $svc['branch'] === 'autocare' ? __( 'AutoCare', 'nezer-motors' ) : __( 'QwikFix', 'nezer-motors' );
        $badge_class  = $svc['branch'] === 'autocare'
          ? 'bg-blue-500/15 dark:bg-blue-500/15 text-blue-700 dark:text-blue-400'
          : 'bg-red-500/15 dark:bg-red-500/15 text-red-700 dark:text-red-400';
      ?>
                <article class="nm-card p-5 rounded-2xl group cursor-default"
                    aria-label="<?php echo esc_attr( sprintf( __( '%s service', 'nezer-motors' ), $svc['title'] ) ); ?>">
                    <div class="w-11 h-11 rounded-xl flex items-center justify-center mb-4 text-xl group-hover:scale-110 transition-transform duration-300"
                        style="background:linear-gradient(135deg,<?php echo esc_attr( $svc['c1'] ); ?>,<?php echo esc_attr( $svc['c2'] ); ?>)"
                        aria-hidden="true">
                        <?php echo esc_html( $svc['icon'] ); ?>
                    </div>
                    <h3 class="font-heading text-lg font-700 mb-1.5 text-gray-900 dark:text-white">
                        <?php echo esc_html( $svc['title'] ); ?></h3>
                    <p class="font-body text-xs leading-relaxed mb-3 text-gray-500 dark:text-white/50">
                        <?php echo esc_html( $svc['desc'] ); ?></p>
                    <span
                        class="px-2 py-0.5 rounded-full text-xs font-sub font-700 <?php echo esc_attr( $badge_class ); ?>"><?php echo esc_html( $branch_label ); ?></span>
                </article>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- ============================================================
     PRODUCTS SECTION
    ============================================================ -->
    <section class="py-24 nm-section-alt" id="products" aria-labelledby="products-heading">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16" data-animate>
                <span
                    class="inline-flex px-3 py-1.5 rounded-full text-xs font-sub font-700 tracking-widest uppercase mb-4 bg-gold-500/10 dark:bg-gold-500/15 text-gold-600 dark:text-gold-400 border border-gold-500/20 dark:border-gold-500/30">
                    <?php esc_html_e( 'Our Products', 'nezer-motors' ); ?>
                </span>
                <h2 id="products-heading"
                    class="font-heading text-4xl sm:text-5xl font-700 text-gray-900 dark:text-white">
                    <?php esc_html_e( 'Quality Parts & Accessories', 'nezer-motors' ); ?>
                </h2>
                <p class="font-body mt-4 max-w-xl mx-auto text-gray-500 dark:text-white/60">
                    <?php esc_html_e( 'We stock and supply quality automotive products at both branches. Speak to our team for availability and pricing.', 'nezer-motors' ); ?>
                </p>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-5 gap-5" data-animate-stagger>
                <?php foreach ( nm_products() as $product ) :
                    $img_src = esc_url( get_template_directory_uri() . '/assets/img/' . $product['img'] );
                ?>
                <article class="group rounded-2xl overflow-hidden nm-card cursor-default"
                    aria-label="<?php echo esc_attr( $product['name'] ); ?>">
                    <div class="relative overflow-hidden" style="height:180px">
                        <img src="<?php echo $img_src; ?>" alt="<?php echo esc_attr( $product['alt'] ); ?>"
                            class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
                            loading="lazy" decoding="async"
                            onerror="this.style.display='none';this.nextElementSibling.style.display='flex'">
                        <!-- Placeholder when no image -->
                        <div class="absolute inset-0 items-center justify-content-center flex-col gap-3 bg-gray-100 dark:bg-white/[0.04]"
                            style="display:none">
                            <div class="w-14 h-14 rounded-2xl flex items-center justify-center text-3xl"
                                style="background:linear-gradient(135deg,<?php echo esc_attr( $product['color'] ); ?>,<?php echo esc_attr( $product['color'] ); ?>88)"
                                aria-hidden="true"><?php echo esc_html( $product['icon'] ); ?></div>
                            <p
                                class="font-sub font-700 text-xs uppercase tracking-wider text-gray-400 dark:text-white/40">
                                <?php esc_html_e( 'Photo coming soon', 'nezer-motors' ); ?></p>
                        </div>
                        <!-- Overlay gradient -->
                        <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent pointer-events-none"
                            aria-hidden="true"></div>
                        <div class="absolute bottom-0 left-0 right-0 p-4">
                            <h3 class="font-heading text-xl font-700 text-white">
                                <?php echo esc_html( $product['name'] ); ?></h3>
                        </div>
                    </div>
                    <div class="p-4">
                        <p class="font-body text-sm leading-relaxed text-gray-600 dark:text-white/55">
                            <?php echo esc_html( $product['desc'] ); ?></p>
                        <a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>"
                            class="mt-3 inline-flex items-center gap-1 font-sub font-700 text-xs text-gold-600 dark:text-gold-400 hover:text-gold-500 dark:hover:text-gold-300 transition-colors">
                            <?php esc_html_e( 'Enquire', 'nezer-motors' ); ?>
                            <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                <path d="M8.59 16.59L13.17 12 8.59 7.41 10 6l6 6-6 6z" />
                            </svg>
                        </a>
                    </div>
                </article>
                <?php endforeach; ?>
            </div>
            <p class="text-center font-body text-sm mt-8 text-gray-400 dark:text-white/35">
                <?php esc_html_e( 'Contact either branch for current stock availability and pricing.', 'nezer-motors' ); ?>
            </p>
        </div>
    </section>

    <!-- ============================================================
     OUR BRANCHES
    ============================================================ -->
    <section class="py-24 nm-section-light" id="branches" aria-labelledby="branches-heading">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16" data-animate>
                <span
                    class="inline-flex px-3 py-1.5 rounded-full text-xs font-sub font-700 tracking-widest uppercase mb-4 bg-gold-500/10 dark:bg-gold-500/15 text-gold-600 dark:text-gold-400 border border-gold-500/20 dark:border-gold-500/30">
                    <?php esc_html_e( 'Find Us', 'nezer-motors' ); ?>
                </span>
                <h2 id="branches-heading"
                    class="font-heading text-4xl sm:text-5xl font-700 text-gray-900 dark:text-white">
                    <?php esc_html_e( 'Two Locations. One Standard.', 'nezer-motors' ); ?>
                </h2>
                <p class="font-body mt-4 max-w-xl mx-auto text-gray-500 dark:text-white/60">
                    <?php esc_html_e( 'Both branches operate under the Nezer Motors name with the same commitment to quality and honest service.', 'nezer-motors' ); ?>
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                <!-- AutoCare Card -->
                <article class="relative rounded-3xl overflow-hidden"
                    style="background:linear-gradient(135deg,#0f1f5c,#1e3a8a)" data-animate="left"
                    aria-label="<?php esc_attr_e( 'AutoCare Express branch details', 'nezer-motors' ); ?>">
                    <div class="absolute -top-20 -right-20 w-64 h-64 rounded-full opacity-10"
                        style="background:radial-gradient(circle,#60a5fa,transparent)" aria-hidden="true"></div>
                    <div class="relative z-10 p-8 sm:p-10">
                        <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/img/' . $ac['logo'] ); ?>"
                            alt="<?php echo esc_attr( $ac['logo_alt'] ); ?>" class="h-14 w-auto object-contain mb-5"
                            loading="lazy">
                        <h3 class="font-heading text-3xl font-700 text-white mb-2">
                            <?php echo esc_html( $ac['name'] ); ?></h3>
                        <p class="text-blue-200/60 text-sm font-body mb-6"><?php echo esc_html( $ac['tagline'] ); ?></p>
                        <address class="not-italic space-y-2 mb-7">
                            <?php nm_branch_info_card( 'autocare', 'card' ); ?>
                            <p class="flex items-center gap-3 text-white/80 text-sm font-body">
                                <svg class="w-4 h-4 text-blue-300 flex-shrink-0" fill="currentColor" viewBox="0 0 24 24"
                                    aria-hidden="true">
                                    <path
                                        d="M20 4H4c-1.1 0-2 .9-2 2v12c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm-1 14H5V8l7 4.5L19 8v10zm-7-7.5L5 8h14l-7 2.5z" />
                                </svg>
                                <?php echo esc_html( $ac['address'] ); ?>
                            </p>
                        </address>
                        <div class="flex flex-wrap gap-2 mb-8">
                            <?php foreach ( $ac['services'] as $svc ) : ?>
                            <span class="text-xs px-3 py-1 rounded-full font-sub font-700 text-white/80"
                                style="background:rgba(255,255,255,0.12);border:1px solid rgba(255,255,255,0.2)">
                                <?php echo esc_html( $svc ); ?>
                            </span>
                            <?php endforeach; ?>
                        </div>
                        <a href="<?php echo esc_url( home_url( '/autocare-express/' ) ); ?>"
                            class="inline-flex items-center gap-2 px-6 py-3 rounded-xl font-sub font-700 text-sm bg-white text-blue-800 hover:bg-blue-50 transition-all hover:scale-105">
                            <?php esc_html_e( 'Visit AutoCare Express', 'nezer-motors' ); ?>
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                <path d="M8.59 16.59L13.17 12 8.59 7.41 10 6l6 6-6 6z" />
                            </svg>
                        </a>
                    </div>
                </article>

                <!-- QwikFix Card -->
                <article class="relative rounded-3xl overflow-hidden"
                    style="background:linear-gradient(135deg,#450a0a,#991b1b)" data-animate="right"
                    aria-label="<?php esc_attr_e( 'QwikFix branch details', 'nezer-motors' ); ?>">
                    <div class="absolute -top-20 -right-20 w-64 h-64 rounded-full opacity-10"
                        style="background:radial-gradient(circle,#fbbf24,transparent)" aria-hidden="true"></div>
                    <div class="relative z-10 p-8 sm:p-10">
                        <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/img/' . $qf['logo'] ); ?>"
                            alt="<?php echo esc_attr( $qf['logo_alt'] ); ?>"
                            class="h-14 w-auto object-contain brightness-200 mb-5" loading="lazy">
                        <h3 class="font-heading text-3xl font-700 text-white mb-2">
                            <?php echo esc_html( $qf['name'] ); ?></h3>
                        <p class="text-red-200/60 text-sm font-body mb-6"><?php echo esc_html( $qf['tagline'] ); ?></p>
                        <address class="not-italic space-y-2 mb-7">
                            <?php nm_branch_info_card( 'qwikfix', 'card' ); ?>
                            <p class="flex items-center gap-3 text-white/80 text-sm font-body">
                                <svg class="w-4 h-4 text-red-300 flex-shrink-0" fill="currentColor" viewBox="0 0 24 24"
                                    aria-hidden="true">
                                    <path
                                        d="M20 4H4c-1.1 0-2 .9-2 2v12c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm-1 14H5V8l7 4.5L19 8v10zm-7-7.5L5 8h14l-7 2.5z" />
                                </svg>
                                <?php echo esc_html( $qf['address'] ); ?>
                            </p>
                        </address>
                        <div class="flex flex-wrap gap-2 mb-8">
                            <?php foreach ( $qf['services'] as $svc ) : ?>
                            <span class="text-xs px-3 py-1 rounded-full font-sub font-700 text-white/80"
                                style="background:rgba(255,255,255,0.12);border:1px solid rgba(255,255,255,0.2)">
                                <?php echo esc_html( $svc ); ?>
                            </span>
                            <?php endforeach; ?>
                        </div>
                        <a href="<?php echo esc_url( home_url( '/qwikfix/' ) ); ?>"
                            class="inline-flex items-center gap-2 px-6 py-3 rounded-xl font-sub font-700 text-sm bg-white text-red-800 hover:bg-red-50 transition-all hover:scale-105">
                            <?php esc_html_e( 'Visit QwikFix', 'nezer-motors' ); ?>
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                <path d="M8.59 16.59L13.17 12 8.59 7.41 10 6l6 6-6 6z" />
                            </svg>
                        </a>
                    </div>
                </article>

            </div>
        </div>
    </section>

    <!-- ============================================================
     PARTNERS MARQUEE
    ============================================================ -->
    <section class="py-14 border-y border-gray-100 dark:border-white/[0.08] nm-section-alt overflow-hidden"
        aria-label="<?php esc_attr_e( 'Our brand partners', 'nezer-motors' ); ?>">
        <div class="max-w-7xl mx-auto px-4 mb-8 text-center" data-animate>
            <p class="font-sub font-700 text-xs uppercase tracking-widest text-gray-400 dark:text-white/35">
                <?php esc_html_e( 'Brands We Work With', 'nezer-motors' ); ?>
            </p>
        </div>
        <div class="nm-marquee-wrap">
            <div class="nm-marquee-fade-l" aria-hidden="true"></div>
            <div class="nm-marquee-fade-r" aria-hidden="true"></div>
            <?php nm_partners_strip(); ?>
        </div>
    </section>

    <!-- ============================================================
     CTA BAND
    ============================================================ -->
    <section class="py-20 relative overflow-hidden"
        style="background:linear-gradient(135deg,#0f172a,#1e3a8a 50%,#991b1b)" aria-labelledby="cta-heading">
        <div class="absolute inset-0 opacity-[0.06]"
            style="background-image:radial-gradient(rgba(255,255,255,0.15) 1px,transparent 1px);background-size:28px 28px"
            aria-hidden="true"></div>
        <div class="max-w-3xl mx-auto px-4 text-center relative z-10" data-animate>
            <div class="w-16 h-16 rounded-2xl mx-auto mb-6 flex items-center justify-center"
                style="background:linear-gradient(135deg,#d4a017,#f0c040)" aria-hidden="true">
                <svg class="w-8 h-8 text-black" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                    <path
                        d="M18.92 6.01C18.72 5.42 18.16 5 17.5 5h-11c-.66 0-1.21.42-1.42 1.01L3 12v8c0 .55.45 1 1 1h1c.55 0 1-.45 1-1v-1h12v1c0 .55.45 1 1 1h1c.55 0 1-.45 1-1v-8l-2.08-5.99z" />
                </svg>
            </div>
            <h2 id="cta-heading" class="font-heading text-4xl sm:text-5xl font-700 text-white mb-4">
                <?php esc_html_e( 'Ready to Service Your Vehicle?', 'nezer-motors' ); ?>
            </h2>
            <p class="font-body text-white/65 mb-8">
                <?php esc_html_e( 'Visit either of our two branches in Nyeri or reach us by phone.', 'nezer-motors' ); ?>
            </p>
            <div class="flex flex-wrap items-center justify-center gap-4">
                <a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>"
                    class="flex items-center gap-2 px-8 py-4 rounded-xl font-sub font-700 text-sm text-black hover:scale-105 transition-all"
                    style="background:linear-gradient(135deg,#d4a017,#f0c040)">
                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                        <path
                            d="M20 4H4c-1.1 0-1.99.9-1.99 2L2 18c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5-8-5V6l8 5 8-5v2z" />
                    </svg>
                    <?php esc_html_e( 'Contact Us', 'nezer-motors' ); ?>
                </a>
                <a href="tel:<?php echo esc_attr( $ac['tel'] ); ?>"
                    class="flex items-center gap-2 px-8 py-4 rounded-xl font-sub font-700 text-sm text-white nm-glass border border-white/30 hover:bg-white/15 transition-all">
                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                        <path
                            d="M6.62 10.79c1.44 2.83 3.76 5.14 6.59 6.59l2.2-2.2c.27-.27.67-.36 1.02-.24 1.12.37 2.33.57 3.57.57.55 0 1 .45 1 1V20c0 .55-.45 1-1 1-9.39 0-17-7.61-17-17 0-.55.45-1 1-1h3.5c.55 0 1 .45 1 1 0 1.25.2 2.45.57 3.57.11.35.03.74-.25 1.02l-2.2 2.2z" />
                    </svg>
                    <?php esc_html_e( 'AutoCare: 0733 204 672', 'nezer-motors' ); ?>
                </a>
                <a href="tel:<?php echo esc_attr( $qf['tel'] ); ?>"
                    class="flex items-center gap-2 px-8 py-4 rounded-xl font-sub font-700 text-sm text-white nm-glass border border-white/30 hover:bg-white/15 transition-all">
                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                        <path
                            d="M6.62 10.79c1.44 2.83 3.76 5.14 6.59 6.59l2.2-2.2c.27-.27.67-.36 1.02-.24 1.12.37 2.33.57 3.57.57.55 0 1 .45 1 1V20c0 .55-.45 1-1 1-9.39 0-17-7.61-17-17 0-.55.45-1 1-1h3.5c.55 0 1 .45 1 1 0 1.25.2 2.45.57 3.57.11.35.03.74-.25 1.02l-2.2 2.2z" />
                    </svg>
                    <?php esc_html_e( 'QwikFix: 0701 104 644', 'nezer-motors' ); ?>
                </a>
            </div>
        </div>
    </section>

</main>

<?php
get_footer();