<?php
/**
 * The template for displaying the contact page
 *
 * Template Name: About
 * Template Post Type: page
 * 
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Nezer_Motors
 */
defined( 'ABSPATH' ) || exit;

get_header();
$ac = nm_branch( 'autocare' );
$qf = nm_branch( 'qwikfix' );
?>

<main id="main-content" role="main">

    <!-- PAGE HERO -->
    <section
        class="relative pt-36 pb-24 overflow-hidden bg-linear-to-br from-zinc-50 via-gray-100 to-blue-100 dark:from-zinc-950 dark:via-gray-900 dark:to-blue-900">
        <div class="absolute inset-0 opacity-70 bg-[radial-gradient(rgba(0,0,0,0.10)_1px,transparent_1px)] dark:bg-[radial-gradient(rgba(255,255,255,0.10)_1px,transparent_1px)] bg-size-[28px_28px]"
            aria-hidden="true">
        </div>
        <div class="absolute -bottom-1 left-0 right-0 h-20 nm-section-light"
            style="clip-path:polygon(0 100%,100% 0,100% 100%)" aria-hidden="true"></div>
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center relative z-10">
            <span
                class="inline-flex items-center gap-2 px-3 py-1.5 rounded-full text-xs font-sub font-700 tracking-widest uppercase mb-6 bg-black/5 dark:bg-black/95 text-zinc-600 dark:nm-glass dark:text-white/70">
                <?php esc_html_e( 'Our Story', 'nezer-motors' ); ?>
            </span>
            <h1 class="font-heading text-5xl sm:text-7xl font-700 text-zinc-900 dark:text-white mb-6 leading-tight">
                <?php esc_html_e( 'About', 'nezer-motors' ); ?>
                <span
                    style="background:linear-gradient(135deg,#f0c040,#d4a017);-webkit-background-clip:text;-webkit-text-fill-color:transparent;background-clip:text">
                    <?php esc_html_e( 'Nezer Motors', 'nezer-motors' ); ?>
                </span>
            </h1>
            <p class="font-body text-lg text-zinc-500 dark:text-white/60 max-w-2xl mx-auto">
                <?php esc_html_e( "Nyeri's trusted automotive group. Two branches. One commitment to quality, honest vehicle care.", 'nezer-motors' ); ?>
            </p>
        </div>
    </section>

    <!-- WHO WE ARE -->
    <section class="py-24 nm-section-light">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
                <div data-animate>
                    <span
                        class="inline-flex px-3 py-1.5 rounded-full text-xs font-sub font-700 tracking-widest uppercase mb-6 bg-gold-500/10 dark:bg-gold-500/15 text-gold-600 dark:text-gold-400 border border-gold-500/20 dark:border-gold-500/30">
                        <?php esc_html_e( 'The Parent Company', 'nezer-motors' ); ?>
                    </span>
                    <h2 class="font-heading text-4xl sm:text-5xl font-700 mb-6 text-gray-900 dark:text-white">
                        <?php esc_html_e( 'Who We Are', 'nezer-motors' ); ?>
                    </h2>
                    <div class="space-y-4 font-body text-base leading-relaxed text-gray-600 dark:text-white/65">
                        <p><?php esc_html_e( 'Nezer Motors is a Nyeri-based automotive group that owns and operates two vehicle service brands: AutoCare Express and QwikFix. Both branches serve drivers across Nyeri and the wider Central Kenya region with professional, reliable car care.', 'nezer-motors' ); ?>
                        </p>
                        <p><?php esc_html_e( 'Founded on the belief that vehicle owners deserve honest information, quality parts, and skilled technicians, Nezer Motors has built a reputation for consistent service. Whether you need a full engine overhaul or a quick wheel alignment, our teams handle it with care.', 'nezer-motors' ); ?>
                        </p>
                        <p><?php esc_html_e( 'Each branch maintains its own specialist team, giving you access to a broader range of automotive expertise under one trusted group name.', 'nezer-motors' ); ?>
                        </p>
                    </div>
                </div>

                <!-- Values grid -->
                <div class="grid grid-cols-2 gap-4" data-animate-stagger>
                    <?php
        $values = [
          [ 'icon' => '🤝', 'title' => __( 'Honest Service', 'nezer-motors' ), 'desc' => __( 'We tell you exactly what your vehicle needs — no upsells, no surprises.', 'nezer-motors' ) ],
          [ 'icon' => '⚙️', 'title' => __( 'Quality Parts',  'nezer-motors' ), 'desc' => __( 'Genuine, approved components for every repair and service we carry out.', 'nezer-motors' ) ],
          [ 'icon' => '🔧', 'title' => __( 'Skilled Techs',  'nezer-motors' ), 'desc' => __( 'Trained technicians with hands-on experience across all major vehicle makes.', 'nezer-motors' ) ],
          [ 'icon' => '💰', 'title' => __( 'Fair Pricing',   'nezer-motors' ), 'desc' => __( 'Transparent pricing before work begins. No hidden charges, ever.', 'nezer-motors' ) ],
        ];
        foreach ( $values as $v ) :
        ?>
                    <div class="nm-card p-6 rounded-2xl">
                        <div class="text-3xl mb-3" aria-hidden="true"><?php echo esc_html( $v['icon'] ); ?></div>
                        <h3 class="font-heading text-xl font-700 mb-2 text-gray-900 dark:text-white">
                            <?php echo esc_html( $v['title'] ); ?></h3>
                        <p class="font-body text-sm leading-relaxed text-gray-500 dark:text-white/55">
                            <?php echo esc_html( $v['desc'] ); ?></p>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </section>

    <!-- AUTOCARE EXPRESS SECTION -->
    <section class="py-24 nm-section-alt" aria-labelledby="ac-heading">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-start">

                <!-- Branch card -->
                <div class="relative rounded-3xl overflow-hidden"
                    style="background:linear-gradient(135deg,#0f1f5c,#1e3a8a)" data-animate="left">
                    <div class="absolute -top-16 -right-16 w-48 h-48 rounded-full opacity-10"
                        style="background:radial-gradient(circle,#60a5fa,transparent)" aria-hidden="true"></div>
                    <div class="p-8 sm:p-10 relative z-10">
                        <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/img/' . $ac['logo'] ); ?>"
                            alt="<?php echo esc_attr( $ac['logo_alt'] ); ?>" class="h-14 w-auto object-contain mb-5"
                            loading="lazy">
                        <h3 class="font-heading text-3xl font-700 text-white mb-2">
                            <?php echo esc_html( $ac['name'] ); ?></h3>
                        <p class="text-blue-200/60 text-sm font-body mb-6"><?php echo esc_html( $ac['tagline'] ); ?></p>
                        <address class="not-italic space-y-2 mb-7"><?php nm_branch_info_card( 'autocare', 'card' ); ?>
                        </address>
                        <a href="<?php echo esc_url( home_url( '/autocare-express/' ) ); ?>"
                            class="inline-flex items-center gap-2 px-6 py-3 rounded-xl font-sub font-700 text-sm bg-white text-blue-800 hover:bg-blue-50 transition-all hover:scale-105">
                            <?php esc_html_e( 'View Services', 'nezer-motors' ); ?>
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                <path d="M8.59 16.59L13.17 12 8.59 7.41 10 6l6 6-6 6z" />
                            </svg>
                        </a>
                    </div>
                </div>

                <!-- Info -->
                <div class="pt-2" data-animate="right">
                    <span
                        class="inline-flex px-3 py-1.5 rounded-full text-xs font-sub font-700 tracking-widest uppercase mb-5 bg-blue-600/10 dark:bg-blue-600/15 text-blue-700 dark:text-blue-400 border border-blue-600/20 dark:border-blue-600/30">
                        <?php esc_html_e( 'AutoCare Express', 'nezer-motors' ); ?>
                    </span>
                    <h2 id="ac-heading" class="font-heading text-4xl font-700 mb-5 text-gray-900 dark:text-white">
                        <?php esc_html_e( "Mechanical Expertise at Kingongo", 'nezer-motors' ); ?>
                    </h2>
                    <p class="font-body text-base leading-relaxed mb-5 text-gray-600 dark:text-white/65">
                        <?php esc_html_e( 'AutoCare Express is our full mechanical service branch at Kingongo, opposite GK Prison in Nyeri. The team handles everything from routine repairs to complex engine overhauls, working on all major vehicle brands.', 'nezer-motors' ); ?>
                    </p>
                    <p class="font-body text-base leading-relaxed mb-8 text-gray-600 dark:text-white/65">
                        <?php esc_html_e( 'With trained technicians and the right tools for the job, AutoCare Express delivers work that lasts. We stock genuine parts and give customers a clear picture of what their vehicle needs before any work begins.', 'nezer-motors' ); ?>
                    </p>
                    <div class="grid grid-cols-2 gap-3">
                        <?php foreach ( $ac['services'] as $svc ) : ?>
                        <div class="flex items-center gap-2 text-sm font-body text-gray-700 dark:text-white/70">
                            <div class="w-5 h-5 rounded-full flex items-center justify-center flex-shrink-0"
                                style="background:rgba(30,64,175,0.2)">
                                <svg class="w-3 h-3 text-blue-500" fill="currentColor" viewBox="0 0 24 24"
                                    aria-hidden="true">
                                    <path d="M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41z" />
                                </svg>
                            </div>
                            <?php echo esc_html( $svc ); ?>
                        </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- QWIKFIX SECTION -->
    <section class="py-24 nm-section-light" aria-labelledby="qf-heading">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-start">

                <!-- Info (left on desktop) -->
                <div class="order-2 lg:order-1 pt-2" data-animate="left">
                    <span
                        class="inline-flex px-3 py-1.5 rounded-full text-xs font-sub font-700 tracking-widest uppercase mb-5 bg-red-600/10 dark:bg-red-600/15 text-red-700 dark:text-red-400 border border-red-600/20 dark:border-red-600/30">
                        <?php esc_html_e( 'QwikFix', 'nezer-motors' ); ?>
                    </span>
                    <h2 id="qf-heading" class="font-heading text-4xl font-700 mb-5 text-gray-900 dark:text-white">
                        <?php esc_html_e( 'Tyres, Alignment & More at Shell Station', 'nezer-motors' ); ?>
                    </h2>
                    <p class="font-body text-base leading-relaxed mb-5 text-gray-600 dark:text-white/65">
                        <?php esc_html_e( 'QwikFix operates from Shell Service Station on the Nyeri-Nyahururu Road. The branch specialises in wheel-related services, batteries, tyre sales and car accessories, making it the go-to stop for drivers heading in and out of Nyeri.', 'nezer-motors' ); ?>
                    </p>
                    <p class="font-body text-base leading-relaxed mb-8 text-gray-600 dark:text-white/65">
                        <?php esc_html_e( 'With modern equipment and experienced staff, QwikFix delivers fast and accurate results. The convenient Shell Station location means you can refuel and service your vehicle in one stop.', 'nezer-motors' ); ?>
                    </p>
                    <div class="grid grid-cols-2 gap-3">
                        <?php foreach ( $qf['services'] as $svc ) : ?>
                        <div class="flex items-center gap-2 text-sm font-body text-gray-700 dark:text-white/70">
                            <div class="w-5 h-5 rounded-full flex items-center justify-center flex-shrink-0"
                                style="background:rgba(220,38,38,0.2)">
                                <svg class="w-3 h-3 text-red-500" fill="currentColor" viewBox="0 0 24 24"
                                    aria-hidden="true">
                                    <path d="M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41z" />
                                </svg>
                            </div>
                            <?php echo esc_html( $svc ); ?>
                        </div>
                        <?php endforeach; ?>
                    </div>
                </div>

                <!-- Branch card -->
                <div class="order-1 lg:order-2 relative rounded-3xl overflow-hidden"
                    style="background:linear-gradient(135deg,#450a0a,#7f1d1d)" data-animate="right">
                    <div class="absolute -top-16 -right-16 w-48 h-48 rounded-full opacity-10"
                        style="background:radial-gradient(circle,#fbbf24,transparent)" aria-hidden="true"></div>
                    <div class="p-8 sm:p-10 relative z-10">
                        <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/img/' . $qf['logo'] ); ?>"
                            alt="<?php echo esc_attr( $qf['logo_alt'] ); ?>"
                            class="h-14 w-auto object-contain brightness-200 mb-5" loading="lazy">
                        <h3 class="font-heading text-3xl font-700 text-white mb-2">
                            <?php echo esc_html( $qf['name'] ); ?></h3>
                        <p class="text-red-200/60 text-sm font-body mb-6"><?php echo esc_html( $qf['tagline'] ); ?></p>
                        <address class="not-italic space-y-2 mb-7"><?php nm_branch_info_card( 'qwikfix', 'card' ); ?>
                        </address>
                        <a href="<?php echo esc_url( home_url( '/qwikfix/' ) ); ?>"
                            class="inline-flex items-center gap-2 px-6 py-3 rounded-xl font-sub font-700 text-sm bg-white text-red-800 hover:bg-red-50 transition-all hover:scale-105">
                            <?php esc_html_e( 'View Services', 'nezer-motors' ); ?>
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                <path d="M8.59 16.59L13.17 12 8.59 7.41 10 6l6 6-6 6z" />
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA -->
    <section class="py-20 relative overflow-hidden"
        style="background:linear-gradient(135deg,#0f172a,#1e3a8a 50%,#991b1b)">
        <div class="max-w-3xl mx-auto px-4 text-center relative z-10" data-animate>
            <h2 class="font-heading text-4xl sm:text-5xl font-700 text-white mb-4">
                <?php esc_html_e( 'Ready to Book a Service?', 'nezer-motors' ); ?></h2>
            <p class="font-body text-white/60 mb-8">
                <?php esc_html_e( 'Contact either branch directly or send us a message.', 'nezer-motors' ); ?></p>
            <div class="flex flex-wrap items-center justify-center gap-4">
                <a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>"
                    class="px-8 py-4 rounded-xl font-sub font-700 text-sm text-black hover:scale-105 transition-all"
                    style="background:linear-gradient(135deg,#d4a017,#f0c040)"><?php esc_html_e( 'Contact Us', 'nezer-motors' ); ?></a>
                <a href="<?php echo esc_url( home_url( '/autocare-express/' ) ); ?>"
                    class="px-8 py-4 rounded-xl font-sub font-700 text-sm text-white nm-glass border border-white/30 hover:bg-white/15 transition-all"><?php esc_html_e( 'AutoCare Express', 'nezer-motors' ); ?></a>
                <a href="<?php echo esc_url( home_url( '/qwikfix/' ) ); ?>"
                    class="px-8 py-4 rounded-xl font-sub font-700 text-sm text-white nm-glass border border-white/30 hover:bg-white/15 transition-all"><?php esc_html_e( 'QwikFix', 'nezer-motors' ); ?></a>
            </div>
        </div>
    </section>

</main>

<?php
get_footer();