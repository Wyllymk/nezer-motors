<?php
/**
 * The template for displaying the contact page
 *
 * Template Name: QwikFix
 * Template Post Type: page
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Nezer_Motors
 */
defined( 'ABSPATH' ) || exit;

get_header();
$qf = nm_branch( 'qwikfix' );
?>

<main id="main-content" role="main">

    <!-- HERO -->
    <section class="relative min-h-screen flex items-center overflow-hidden"
        style="background:linear-gradient(135deg,#09090b,#450a0a 45%,#7f1d1d)" aria-labelledby="qf-hero-heading">
        <div class="absolute inset-0"
            style="background:radial-gradient(ellipse at 30% 50%,rgba(220,38,38,0.38) 0%,transparent 58%),radial-gradient(ellipse at 80% 20%,rgba(234,179,8,0.18) 0%,transparent 50%)"
            aria-hidden="true"></div>
        <div class="absolute inset-0 opacity-20"
            style="background-image:radial-gradient(rgba(255,255,255,0.10) 1px,transparent 1px);background-size:28px 28px"
            aria-hidden="true"></div>
        <div class="absolute top-0 left-0 right-0 h-1" style="background:linear-gradient(90deg,#dc2626,#eab308,#dc2626)"
            aria-hidden="true"></div>

        <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 w-full pt-24 pb-16">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">

                <div class="text-white">
                    <div class="flex items-center gap-3 mb-6">
                        <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/img/' . $qf['logo'] ); ?>"
                            alt="<?php echo esc_attr( $qf['logo_alt'] ); ?>"
                            class="h-12 w-auto object-contain brightness-200" loading="eager">
                        <span
                            class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-sub font-700 nm-glass text-green-300 border border-green-500/30">
                            <span class="w-1.5 h-1.5 rounded-full bg-green-400 animate-pulse" aria-hidden="true"></span>
                            <?php esc_html_e( 'Open Mon–Sat', 'nezer-motors' ); ?>
                        </span>
                    </div>
                    <h1 id="qf-hero-heading"
                        class="font-heading text-5xl sm:text-6xl lg:text-7xl font-700 leading-tight mb-5">
                        <?php esc_html_e( 'QwikFix at', 'nezer-motors' ); ?><br>
                        <span
                            style="background:linear-gradient(135deg,#fbbf24,#ef4444);-webkit-background-clip:text;-webkit-text-fill-color:transparent;background-clip:text"><?php esc_html_e( 'Shell', 'nezer-motors' ); ?></span><br>
                        <?php esc_html_e( 'Kingongo', 'nezer-motors' ); ?>
                    </h1>
                    <p class="font-body text-lg text-white/65 mb-8 max-w-md leading-relaxed">
                        <?php esc_html_e( 'Wheel balancing, alignment, oil change, batteries, tyre sales and car accessories at Shell Service Station, Nyeri-Nyahururu Road.', 'nezer-motors' ); ?>
                    </p>
                    <div class="flex flex-wrap gap-3 mb-8">
                        <a href="tel:<?php echo esc_attr( $qf['tel'] ); ?>"
                            class="inline-flex items-center gap-2 px-6 py-3 rounded-xl font-sub font-700 text-sm text-white hover:scale-105 hover:shadow-lg hover:shadow-red-600/25 transition-all"
                            style="background:linear-gradient(135deg,#dc2626,#ef4444)">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                <path
                                    d="M6.62 10.79c1.44 2.83 3.76 5.14 6.59 6.59l2.2-2.2c.27-.27.67-.36 1.02-.24 1.12.37 2.33.57 3.57.57.55 0 1 .45 1 1V20c0 .55-.45 1-1 1-9.39 0-17-7.61-17-17 0-.55.45-1 1-1h3.5c.55 0 1 .45 1 1 0 1.25.2 2.45.57 3.57.11.35.03.74-.25 1.02l-2.2 2.2z" />
                            </svg>
                            <?php printf( esc_html__( 'Call: %s', 'nezer-motors' ), esc_html( $qf['phone'] ) ); ?>
                        </a>
                        <a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>"
                            class="inline-flex items-center gap-2 px-6 py-3 rounded-xl font-sub font-700 text-sm text-white nm-glass border border-white/25 hover:bg-white/15 transition-all">
                            <?php esc_html_e( 'Book Service', 'nezer-motors' ); ?>
                        </a>
                    </div>
                    <div class="flex flex-wrap gap-2">
                        <span class="px-3 py-1 rounded-full text-xs font-sub font-700 nm-glass text-white/70">
                            <svg class="w-3 h-3 inline mr-1 text-red-400" fill="currentColor" viewBox="0 0 24 24"
                                aria-hidden="true">
                                <path
                                    d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z" />
                            </svg>
                            <?php echo esc_html( $qf['location'] ); ?>
                        </span>
                        <span
                            class="px-3 py-1 rounded-full text-xs font-sub font-700 nm-glass text-white/70"><?php echo esc_html( $qf['address'] ); ?></span>
                        <span
                            class="px-3 py-1 rounded-full text-xs font-sub font-700 nm-glass text-white/70"><?php echo esc_html( $qf['hours'] ); ?></span>
                    </div>
                </div>

                <!-- Info card -->
                <div class="rounded-2xl overflow-hidden shadow-2xl"
                    style="backdrop-filter:blur(20px);background:rgba(255,255,255,0.06);border:1px solid rgba(255,255,255,0.14)">
                    <div class="p-1" style="background:linear-gradient(135deg,#dc2626,#ef4444)">
                        <div class="flex items-center gap-2 px-4 py-2">
                            <div class="w-2 h-2 rounded-full bg-white/60"></div>
                            <div class="w-2 h-2 rounded-full bg-white/40"></div>
                            <div class="w-2 h-2 rounded-full bg-white/20"></div>
                            <span
                                class="text-white/70 text-xs font-sub ml-2"><?php esc_html_e( 'Why Choose QwikFix', 'nezer-motors' ); ?></span>
                        </div>
                    </div>
                    <div class="p-6 space-y-4">
                        <?php
          $features = [
            [ 'icon' => '🎯', 'title' => __( 'Modern Equipment',    'nezer-motors' ), 'desc' => __( 'Computerised alignment and balancing for precision results.',      'nezer-motors' ) ],
            [ 'icon' => '⛽', 'title' => __( 'Shell Station',        'nezer-motors' ), 'desc' => __( 'Conveniently located at Shell Kingongo on the Nyahururu Road.',   'nezer-motors' ) ],
            [ 'icon' => '🔘', 'title' => __( 'Wide Tyre Range',     'nezer-motors' ), 'desc' => __( 'Quality tyres for all vehicle sizes and categories in stock.',    'nezer-motors' ) ],
            [ 'icon' => '⚡', 'title' => __( 'Battery Supply',      'nezer-motors' ), 'desc' => __( 'Batteries tested and fitted for all vehicle types on-site.',      'nezer-motors' ) ],
          ];
          foreach ( $features as $f ) :
          ?>
                        <div class="flex items-start gap-3">
                            <div class="w-8 h-8 rounded-lg flex items-center justify-center flex-shrink-0"
                                style="background:rgba(220,38,38,0.25)" aria-hidden="true">
                                <span class="text-sm"><?php echo esc_html( $f['icon'] ); ?></span>
                            </div>
                            <div>
                                <p class="font-sub font-700 text-white text-sm"><?php echo esc_html( $f['title'] ); ?>
                                </p>
                                <p class="font-body text-xs text-white/50 leading-relaxed">
                                    <?php echo esc_html( $f['desc'] ); ?></p>
                            </div>
                        </div>
                        <?php endforeach; ?>
                        <div class="pt-3 border-t border-white/10">
                            <p class="text-white/35 text-[10px] font-sub uppercase tracking-widest mb-2">
                                <?php esc_html_e( 'Services at a Glance', 'nezer-motors' ); ?></p>
                            <div class="flex flex-wrap gap-1.5">
                                <?php foreach ( $qf['services'] as $svc ) : nm_service_chip( $svc, 'qwikfix' ); endforeach; ?>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <div class="absolute bottom-8 left-1/2 -translate-x-1/2 flex flex-col items-center gap-2 text-white/30 z-10"
            aria-hidden="true">
            <span
                class="font-sub text-xs tracking-widest uppercase"><?php esc_html_e( 'Scroll', 'nezer-motors' ); ?></span>
            <div class="w-px h-10 bg-gradient-to-b from-white/40 to-transparent animate-pulse"></div>
        </div>
    </section>

    <!-- SERVICES -->
    <section id="services" class="py-24 nm-section-light" aria-labelledby="qf-services-heading">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16" data-animate>
                <span
                    class="inline-flex px-3 py-1.5 rounded-full text-xs font-sub font-700 tracking-widest uppercase mb-4 bg-red-600/10 dark:bg-red-600/15 text-red-700 dark:text-red-400 border border-red-600/20 dark:border-red-600/30"><?php esc_html_e( 'What We Do', 'nezer-motors' ); ?></span>
                <h2 id="qf-services-heading"
                    class="font-heading text-4xl sm:text-5xl font-700 text-gray-900 dark:text-white">
                    <?php esc_html_e( 'QwikFix Services', 'nezer-motors' ); ?></h2>
                <p class="font-body mt-4 max-w-xl mx-auto text-gray-500 dark:text-white/60">
                    <?php esc_html_e( 'Fast, precise work using proper equipment at Shell Service Station, Nyeri-Nyahururu Road.', 'nezer-motors' ); ?>
                </p>
            </div>

            <?php
    $services = [
      [ 'icon' => '⚖️', 'title' => __( 'Wheel Balancing',  'nezer-motors' ), 'desc' => __( 'Dynamic balancing to eliminate vibration and extend tyre life.', 'nezer-motors' ),
        'items' => [ __( 'All tyre sizes supported', 'nezer-motors' ), __( 'Static & dynamic balancing', 'nezer-motors' ), __( 'Weight placement accuracy', 'nezer-motors' ), __( 'Valve stem check', 'nezer-motors' ) ] ],
      [ 'icon' => '🎯', 'title' => __( 'Wheel Alignment',  'nezer-motors' ), 'desc' => __( 'Computerised 4-wheel alignment for saloons and SUVs.', 'nezer-motors' ),
        'items' => [ __( 'Toe & camber correction', 'nezer-motors' ), __( 'Saloon & SUV alignment', 'nezer-motors' ), __( 'Post-alignment test drive', 'nezer-motors' ), __( 'Alignment report', 'nezer-motors' ) ] ],
      [ 'icon' => '🛢️', 'title' => __( 'Oil Change',       'nezer-motors' ), 'desc' => __( 'Engine oil and filter service using quality-approved products.', 'nezer-motors' ),
        'items' => [ __( 'Mineral & synthetic oils', 'nezer-motors' ), __( 'Oil filter replacement', 'nezer-motors' ), __( 'Oil level optimisation', 'nezer-motors' ), __( 'Engine inspection', 'nezer-motors' ) ] ],
      [ 'icon' => '⚡', 'title' => __( 'Batteries',        'nezer-motors' ), 'desc' => __( 'Battery testing, supply and professional fitting for all vehicles.', 'nezer-motors' ),
        'items' => [ __( 'Battery voltage testing', 'nezer-motors' ), __( 'Wide brand selection', 'nezer-motors' ), __( 'Professional fitting', 'nezer-motors' ), __( 'Old battery disposal', 'nezer-motors' ) ] ],
      [ 'icon' => '🔘', 'title' => __( 'Tyre Sales',       'nezer-motors' ), 'desc' => __( 'Quality tyres supplied and professionally fitted for all vehicle types.', 'nezer-motors' ),
        'items' => [ __( 'Wide brand range', 'nezer-motors' ), __( 'All vehicle sizes', 'nezer-motors' ), __( 'Professional fitting', 'nezer-motors' ), __( 'Tyre pressure check', 'nezer-motors' ) ] ],
      [ 'icon' => '🛒', 'title' => __( 'Car Accessories',  'nezer-motors' ), 'desc' => __( 'A selection of quality car accessories available in-store.', 'nezer-motors' ),
        'items' => [ __( 'In-store browsing', 'nezer-motors' ), __( 'Quality brands', 'nezer-motors' ), __( 'Expert advice', 'nezer-motors' ), __( 'Competitive pricing', 'nezer-motors' ) ] ],
    ];
    ?>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-5" data-animate-stagger>
                <?php foreach ( $services as $svc ) : ?>
                <article class="nm-card p-6 rounded-2xl group cursor-default">
                    <div class="w-12 h-12 rounded-xl flex items-center justify-center mb-4 text-2xl group-hover:scale-110 transition-transform duration-300"
                        style="background:linear-gradient(135deg,#7f1d1d,#dc2626)" aria-hidden="true">
                        <?php echo esc_html( $svc['icon'] ); ?>
                    </div>
                    <h3 class="font-heading text-xl font-700 mb-2 text-gray-900 dark:text-white">
                        <?php echo esc_html( $svc['title'] ); ?></h3>
                    <p class="font-body text-sm leading-relaxed mb-4 text-gray-500 dark:text-white/55">
                        <?php echo esc_html( $svc['desc'] ); ?></p>
                    <ul class="space-y-1">
                        <?php foreach ( $svc['items'] as $item ) : ?>
                        <li class="flex items-center gap-2 text-xs font-body text-gray-400 dark:text-white/45">
                            <svg class="w-3 h-3 text-red-500 dark:text-red-400 flex-shrink-0" fill="currentColor"
                                viewBox="0 0 24 24" aria-hidden="true">
                                <path d="M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41z" />
                            </svg>
                            <?php echo esc_html( $item ); ?>
                        </li>
                        <?php endforeach; ?>
                    </ul>
                </article>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- GALLERY -->
    <section class="py-24 nm-section-alt" aria-labelledby="qf-gallery-heading">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16" data-animate>
                <span
                    class="inline-flex px-3 py-1.5 rounded-full text-xs font-sub font-700 tracking-widest uppercase mb-4 bg-red-600/10 dark:bg-red-600/15 text-red-700 dark:text-red-400 border border-red-600/20 dark:border-red-600/30"><?php esc_html_e( 'Gallery', 'nezer-motors' ); ?></span>
                <h2 id="qf-gallery-heading"
                    class="font-heading text-4xl sm:text-5xl font-700 text-gray-900 dark:text-white">
                    <?php esc_html_e( 'Our Work', 'nezer-motors' ); ?></h2>
                <p class="font-body mt-4 max-w-xl mx-auto text-gray-500 dark:text-white/60">
                    <?php esc_html_e( 'Photos from the QwikFix bay at Shell Kingongo. Add images to ', 'nezer-motors' ); ?>
                    <code
                        class="text-xs px-1.5 py-0.5 rounded bg-red-50 dark:bg-white/10 text-red-700 dark:text-red-300">assets/img/qwikfix/</code>
                </p>
            </div>
            <?php nm_gallery_grid( 'qwikfix', 'nm-gallery-qf' ); ?>
            <?php nm_lightbox(); ?>
        </div>
    </section>

    <!-- CTA -->
    <section class="py-20 relative overflow-hidden"
        style="background:linear-gradient(135deg,#450a0a,#7f1d1d 50%,#dc2626)" aria-labelledby="qf-cta-heading">
        <div class="max-w-3xl mx-auto px-4 text-center relative z-10" data-animate>
            <h2 id="qf-cta-heading" class="font-heading text-4xl sm:text-5xl font-700 text-white mb-4">
                <?php esc_html_e( 'Visit QwikFix Today', 'nezer-motors' ); ?></h2>
            <p class="font-body text-white/65 mb-2"><?php echo esc_html( $qf['location'] ); ?></p>
            <p class="font-body text-white/65 mb-8"><?php echo esc_html( $qf['hours'] ); ?></p>
            <div class="flex flex-wrap items-center justify-center gap-4">
                <a href="tel:<?php echo esc_attr( $qf['tel'] ); ?>"
                    class="flex items-center gap-2 px-8 py-4 rounded-xl font-sub font-700 text-sm text-black hover:scale-105 transition-all"
                    style="background:linear-gradient(135deg,#f0c040,#d4a017)">
                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                        <path
                            d="M6.62 10.79c1.44 2.83 3.76 5.14 6.59 6.59l2.2-2.2c.27-.27.67-.36 1.02-.24 1.12.37 2.33.57 3.57.57.55 0 1 .45 1 1V20c0 .55-.45 1-1 1-9.39 0-17-7.61-17-17 0-.55.45-1 1-1h3.5c.55 0 1 .45 1 1 0 1.25.2 2.45.57 3.57.11.35.03.74-.25 1.02l-2.2 2.2z" />
                    </svg>
                    <?php printf( esc_html__( 'Call: %s', 'nezer-motors' ), esc_html( $qf['phone'] ) ); ?>
                </a>
                <a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>"
                    class="px-8 py-4 rounded-xl font-sub font-700 text-sm text-white nm-glass border border-white/30 hover:bg-white/15 transition-all">
                    <?php esc_html_e( 'Send a Message', 'nezer-motors' ); ?>
                </a>
            </div>
        </div>
    </section>

</main>

<?php
get_footer();