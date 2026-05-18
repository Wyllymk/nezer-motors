<?php
/**
 * The template for displaying the contact page
 *
 * Template Name: AutoCare Express
 * Template Post Type: page
 * 
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Nezer_Motors
 */
defined( 'ABSPATH' ) || exit;

get_header();
$ac = nm_branch( 'autocare' );
?>

<main id="main-content" role="main">

    <!-- HERO -->
    <section class="relative min-h-screen flex items-center overflow-hidden"
        style="background:linear-gradient(135deg,#09090b,#0f1f5c 50%,#1e3a8a)" aria-labelledby="ac-hero-heading">
        <div class="absolute inset-0"
            style="background:radial-gradient(ellipse at 30% 50%,rgba(37,99,235,0.35) 0%,transparent 60%)"
            aria-hidden="true"></div>
        <div class="absolute inset-0 opacity-20"
            style="background-image:radial-gradient(rgba(255,255,255,0.10) 1px,transparent 1px);background-size:28px 28px"
            aria-hidden="true"></div>

        <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 w-full pt-24 pb-16">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">

                <div class="text-white">
                    <div class="flex items-center gap-3 mb-6">
                        <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/img/' . $ac['logo'] ); ?>"
                            alt="<?php echo esc_attr( $ac['logo_alt'] ); ?>" class="h-12 w-auto object-contain"
                            loading="eager">
                        <span
                            class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-sub font-700 nm-glass text-green-300 border border-green-500/30">
                            <span class="w-1.5 h-1.5 rounded-full bg-green-400 animate-pulse" aria-hidden="true"></span>
                            <?php esc_html_e( 'Open Mon–Sat', 'nezer-motors' ); ?>
                        </span>
                    </div>
                    <h1 id="ac-hero-heading"
                        class="font-heading text-5xl sm:text-6xl lg:text-7xl font-700 leading-tight mb-5">
                        <?php esc_html_e( 'AutoCare', 'nezer-motors' ); ?><br>
                        <span
                            style="background:linear-gradient(135deg,#60a5fa,#2563eb);-webkit-background-clip:text;-webkit-text-fill-color:transparent;background-clip:text"><?php esc_html_e( 'Express', 'nezer-motors' ); ?></span><br>
                        <?php esc_html_e( 'Nyeri', 'nezer-motors' ); ?>
                    </h1>
                    <p class="font-body text-lg text-white/65 mb-8 max-w-md leading-relaxed">
                        <?php esc_html_e( 'Mechanical repairs, engine overhaul, suspension and shocks — professional care for your vehicle at Kingongo, Nyeri.', 'nezer-motors' ); ?>
                    </p>
                    <div class="flex flex-wrap gap-3 mb-8">
                        <a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>"
                            class="inline-flex items-center gap-2 px-6 py-3 rounded-xl font-sub font-700 text-sm text-white hover:scale-105 hover:shadow-lg hover:shadow-blue-600/25 transition-all"
                            style="background:linear-gradient(135deg,#1e40af,#2563eb)">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                <path
                                    d="M19 3h-4.18C14.4 1.84 13.3 1 12 1c-1.3 0-2.4.84-2.82 2H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm-7 0c.55 0 1 .45 1 1s-.45 1-1 1-1-.45-1-1 .45-1 1-1zm2 14H7v-2h7v2zm3-4H7v-2h10v2zm0-4H7V7h10v2z" />
                            </svg>
                            <?php esc_html_e( 'Book a Service', 'nezer-motors' ); ?>
                        </a>
                        <a href="tel:<?php echo esc_attr( $ac['tel'] ); ?>"
                            class="inline-flex items-center gap-2 px-6 py-3 rounded-xl font-sub font-700 text-sm text-white nm-glass border border-white/25 hover:bg-white/15 transition-all">
                            <svg class="w-4 h-4 text-blue-300" fill="currentColor" viewBox="0 0 24 24"
                                aria-hidden="true">
                                <path
                                    d="M6.62 10.79c1.44 2.83 3.76 5.14 6.59 6.59l2.2-2.2c.27-.27.67-.36 1.02-.24 1.12.37 2.33.57 3.57.57.55 0 1 .45 1 1V20c0 .55-.45 1-1 1-9.39 0-17-7.61-17-17 0-.55.45-1 1-1h3.5c.55 0 1 .45 1 1 0 1.25.2 2.45.57 3.57.11.35.03.74-.25 1.02l-2.2 2.2z" />
                            </svg>
                            <?php echo esc_html( $ac['phone'] ); ?>
                        </a>
                    </div>
                    <div class="flex flex-wrap gap-2">
                        <span class="px-3 py-1 rounded-full text-xs font-sub font-700 nm-glass text-white/70"><svg
                                class="w-3 h-3 inline mr-1 text-blue-400" fill="currentColor" viewBox="0 0 24 24"
                                aria-hidden="true">
                                <path
                                    d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z" />
                            </svg><?php echo esc_html( $ac['location'] ); ?></span>
                        <span
                            class="px-3 py-1 rounded-full text-xs font-sub font-700 nm-glass text-white/70"><?php echo esc_html( $ac['address'] ); ?></span>
                        <span
                            class="px-3 py-1 rounded-full text-xs font-sub font-700 nm-glass text-white/70"><?php echo esc_html( $ac['hours'] ); ?></span>
                    </div>
                </div>

                <!-- Info card -->
                <div class="rounded-2xl overflow-hidden shadow-2xl"
                    style="backdrop-filter:blur(20px);background:rgba(255,255,255,0.06);border:1px solid rgba(255,255,255,0.14)">
                    <div class="p-1" style="background:linear-gradient(135deg,#1e40af,#2563eb)">
                        <div class="flex items-center gap-2 px-4 py-2">
                            <div class="w-2 h-2 rounded-full bg-white/60"></div>
                            <div class="w-2 h-2 rounded-full bg-white/40"></div>
                            <div class="w-2 h-2 rounded-full bg-white/20"></div>
                            <span
                                class="text-white/70 text-xs font-sub ml-2"><?php esc_html_e( 'Why Choose AutoCare Express', 'nezer-motors' ); ?></span>
                        </div>
                    </div>
                    <div class="p-6 space-y-4">
                        <?php
          $features = [
            [ 'icon' => '🔧', 'title' => __( 'Trained Mechanics',   'nezer-motors' ), 'desc' => __( 'Skilled technicians experienced across all vehicle makes.', 'nezer-motors' ) ],
            [ 'icon' => '⚙️', 'title' => __( 'Engine Specialists',  'nezer-motors' ), 'desc' => __( 'From minor repairs to full overhauls, we handle it all.',  'nezer-motors' ) ],
            [ 'icon' => '🛡️', 'title' => __( 'Genuine Parts',       'nezer-motors' ), 'desc' => __( 'Quality components for lasting, reliable repairs.',         'nezer-motors' ) ],
            [ 'icon' => '📋', 'title' => __( 'Honest Assessment',   'nezer-motors' ), 'desc' => __( 'Clear diagnosis before any work begins — no surprises.',   'nezer-motors' ) ],
          ];
          foreach ( $features as $f ) :
          ?>
                        <div class="flex items-start gap-3">
                            <div class="w-8 h-8 rounded-lg flex items-center justify-center flex-shrink-0"
                                style="background:rgba(37,99,235,0.25)" aria-hidden="true">
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
                            <a href="mailto:<?php echo esc_attr( $ac['email'] ); ?>"
                                class="font-body text-white/65 text-sm hover:text-blue-300 transition-colors block mb-1"><?php echo esc_html( $ac['email'] ); ?></a>
                            <a href="https://wa.me/<?php echo esc_attr( NM_WA_NUM ); ?>" target="_blank"
                                rel="noopener noreferrer"
                                class="font-body text-white/65 text-sm hover:text-green-300 transition-colors"><?php esc_html_e( 'WhatsApp: 0733 204 672', 'nezer-motors' ); ?></a>
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
    <section id="services" class="py-24 nm-section-light" aria-labelledby="ac-services-heading">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16" data-animate>
                <span
                    class="inline-flex px-3 py-1.5 rounded-full text-xs font-sub font-700 tracking-widest uppercase mb-4 bg-blue-600/10 dark:bg-blue-600/15 text-blue-700 dark:text-blue-400 border border-blue-600/20 dark:border-blue-600/30"><?php esc_html_e( 'What We Do', 'nezer-motors' ); ?></span>
                <h2 id="ac-services-heading"
                    class="font-heading text-4xl sm:text-5xl font-700 text-gray-900 dark:text-white">
                    <?php esc_html_e( 'Our Services', 'nezer-motors' ); ?></h2>
                <p class="font-body mt-4 max-w-xl mx-auto text-gray-500 dark:text-white/60">
                    <?php esc_html_e( 'Expert mechanical care for all vehicle makes. We diagnose accurately and fix it right.', 'nezer-motors' ); ?>
                </p>
            </div>

            <?php
    $services = [
      [ 'icon' => '🔧', 'title' => __( 'Mechanical Repairs', 'nezer-motors' ), 'desc' => __( 'Comprehensive mechanical repair service for all vehicle types and brands.', 'nezer-motors' ),
        'items' => [ __( 'Engine diagnostics', 'nezer-motors' ), __( 'Component replacement', 'nezer-motors' ), __( 'Cooling system repairs', 'nezer-motors' ), __( 'Electrical fault finding', 'nezer-motors' ) ] ],
      [ 'icon' => '⚙️', 'title' => __( 'Engine Overhaul', 'nezer-motors' ), 'desc' => __( 'Full engine rebuilds and top-end overhauls to restore performance and longevity.', 'nezer-motors' ),
        'items' => [ __( 'Top-end overhaul', 'nezer-motors' ), __( 'Full engine rebuild', 'nezer-motors' ), __( 'Gasket replacement', 'nezer-motors' ), __( 'Timing belt service', 'nezer-motors' ) ] ],
      [ 'icon' => '🚗', 'title' => __( 'Suspension', 'nezer-motors' ), 'desc' => __( 'Full suspension inspection, diagnosis and component replacement for a smooth ride.', 'nezer-motors' ),
        'items' => [ __( 'Ball joint replacement', 'nezer-motors' ), __( 'Control arm service', 'nezer-motors' ), __( 'Steering linkage', 'nezer-motors' ), __( 'Bushing replacement', 'nezer-motors' ) ] ],
      [ 'icon' => '🏎️', 'title' => __( 'Shocks', 'nezer-motors' ), 'desc' => __( 'Shock absorber diagnosis and replacement for safety, comfort and vehicle control.', 'nezer-motors' ),
        'items' => [ __( 'Shock absorber testing', 'nezer-motors' ), __( 'Front & rear replacement', 'nezer-motors' ), __( 'Strut replacement', 'nezer-motors' ), __( 'Ride height check', 'nezer-motors' ) ] ],
    ];
    ?>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6" data-animate-stagger>
                <?php foreach ( $services as $svc ) : ?>
                <article class="nm-card p-6 rounded-2xl group cursor-default">
                    <div class="w-14 h-14 rounded-2xl flex items-center justify-center mb-5 text-3xl group-hover:scale-110 transition-transform duration-300"
                        style="background:linear-gradient(135deg,#1e3a8a,#2563eb)" aria-hidden="true">
                        <?php echo esc_html( $svc['icon'] ); ?>
                    </div>
                    <h3 class="font-heading text-2xl font-700 mb-3 text-gray-900 dark:text-white">
                        <?php echo esc_html( $svc['title'] ); ?></h3>
                    <p class="font-body text-sm leading-relaxed mb-4 text-gray-500 dark:text-white/55">
                        <?php echo esc_html( $svc['desc'] ); ?></p>
                    <ul class="space-y-1.5">
                        <?php foreach ( $svc['items'] as $item ) : ?>
                        <li class="flex items-center gap-2 text-xs font-body text-gray-400 dark:text-white/45">
                            <svg class="w-3 h-3 text-blue-500 dark:text-blue-400 flex-shrink-0" fill="currentColor"
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
    <section class="py-24 nm-section-alt" aria-labelledby="ac-gallery-heading">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16" data-animate>
                <span
                    class="inline-flex px-3 py-1.5 rounded-full text-xs font-sub font-700 tracking-widest uppercase mb-4 bg-blue-600/10 dark:bg-blue-600/15 text-blue-700 dark:text-blue-400 border border-blue-600/20 dark:border-blue-600/30"><?php esc_html_e( 'Gallery', 'nezer-motors' ); ?></span>
                <h2 id="ac-gallery-heading"
                    class="font-heading text-4xl sm:text-5xl font-700 text-gray-900 dark:text-white">
                    <?php esc_html_e( 'Our Work', 'nezer-motors' ); ?></h2>
                <p class="font-body mt-4 max-w-xl mx-auto text-gray-500 dark:text-white/60">
                    <?php esc_html_e( 'Photos from the AutoCare Express workshop. Add images to ', 'nezer-motors' ); ?>
                    <code
                        class="text-xs px-1.5 py-0.5 rounded bg-blue-50 dark:bg-white/10 text-blue-700 dark:text-blue-300">assets/img/autocare/</code>
                </p>
            </div>
            <?php nm_gallery_grid( 'autocare', 'nm-gallery-ac' ); ?>
            <?php nm_lightbox(); ?>
        </div>
    </section>

    <!-- CTA -->
    <section class="py-20 relative overflow-hidden" style="background:linear-gradient(135deg,#0f1f5c,#1e3a8a)"
        aria-labelledby="ac-cta-heading">
        <div class="max-w-3xl mx-auto px-4 text-center relative z-10" data-animate>
            <h2 id="ac-cta-heading" class="font-heading text-4xl sm:text-5xl font-700 text-white mb-4">
                <?php esc_html_e( 'Visit AutoCare Express Today', 'nezer-motors' ); ?></h2>
            <p class="font-body text-white/65 mb-2"><?php echo esc_html( $ac['location'] ); ?></p>
            <p class="font-body text-white/65 mb-8"><?php echo esc_html( $ac['hours'] ); ?></p>
            <div class="flex flex-wrap items-center justify-center gap-4">
                <a href="tel:<?php echo esc_attr( $ac['tel'] ); ?>"
                    class="flex items-center gap-2 px-8 py-4 rounded-xl font-sub font-700 text-sm text-black hover:scale-105 transition-all"
                    style="background:linear-gradient(135deg,#f0c040,#d4a017)">
                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                        <path
                            d="M6.62 10.79c1.44 2.83 3.76 5.14 6.59 6.59l2.2-2.2c.27-.27.67-.36 1.02-.24 1.12.37 2.33.57 3.57.57.55 0 1 .45 1 1V20c0 .55-.45 1-1 1-9.39 0-17-7.61-17-17 0-.55.45-1 1-1h3.5c.55 0 1 .45 1 1 0 1.25.2 2.45.57 3.57.11.35.03.74-.25 1.02l-2.2 2.2z" />
                    </svg>
                    <?php printf( esc_html__( 'Call: %s', 'nezer-motors' ), esc_html( $ac['phone'] ) ); ?>
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