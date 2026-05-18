<?php
/**
 * The template for displaying the contact page
 *
 * Template Post Type: page
 * Template Name: Contact Page
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
        class="relative pt-36 pb-20 overflow-hidden bg-linear-to-br from-zinc-50 via-gray-100 to-blue-100 dark:from-zinc-950 dark:via-gray-900 dark:to-blue-900">
        <div class="absolute inset-0 opacity-70 bg-[radial-gradient(rgba(0,0,0,0.10)_1px,transparent_1px)] dark:bg-[radial-gradient(rgba(255,255,255,0.10)_1px,transparent_1px)] bg-size-[28px_28px]"
            aria-hidden="true">
        </div>
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center relative z-10">
            <span
                class="inline-flex items-center gap-2 px-3 py-1.5 rounded-full text-xs font-sub font-700 tracking-widest uppercase mb-6 bg-black/5 dark:bg-black/95 text-zinc-600 dark:nm-glass dark:text-white/70">
                <?php esc_html_e( 'Get In Touch', 'nezer-motors' ); ?>
            </span>
            <h1 class="font-heading text-5xl sm:text-7xl font-700 text-zinc-900 dark:text-white mb-6 leading-tight">
                <?php esc_html_e( 'Contact', 'nezer-motors' ); ?>
                <span
                    style="background:linear-gradient(135deg,#f0c040,#d4a017);-webkit-background-clip:text;-webkit-text-fill-color:transparent;background-clip:text">
                    <?php esc_html_e( 'Us', 'nezer-motors' ); ?>
                </span>
            </h1>
            <p class="font-body text-lg text-zinc-500 dark:text-white/60 max-w-2xl mx-auto">
                <?php esc_html_e( 'Reach either branch directly or use the form below. We respond to all enquiries promptly.', 'nezer-motors' ); ?>
            </p>
        </div>
    </section>

    <!-- QUICK CALL STRIP -->
    <div class="bg-white dark:bg-dark-800 border-y border-gray-100 dark:border-white/10">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-5">
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">

                <a href="tel:<?php echo esc_attr( $ac['tel'] ); ?>"
                    class="flex items-center gap-4 p-4 rounded-xl transition-all hover:-translate-y-0.5 bg-blue-50 dark:bg-blue-600/10 border border-blue-200 dark:border-blue-600/25 hover:shadow-md dark:hover:bg-blue-600/20"
                    aria-label="<?php echo esc_attr( sprintf( __( 'Call AutoCare Express on %s', 'nezer-motors' ), $ac['phone'] ) ); ?>">
                    <div class="w-10 h-10 rounded-lg flex items-center justify-center flex-shrink-0"
                        style="background:linear-gradient(135deg,#1e40af,#2563eb)" aria-hidden="true">
                        <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                            <path
                                d="M6.62 10.79c1.44 2.83 3.76 5.14 6.59 6.59l2.2-2.2c.27-.27.67-.36 1.02-.24 1.12.37 2.33.57 3.57.57.55 0 1 .45 1 1V20c0 .55-.45 1-1 1-9.39 0-17-7.61-17-17 0-.55.45-1 1-1h3.5c.55 0 1 .45 1 1 0 1.25.2 2.45.57 3.57.11.35.03.74-.25 1.02l-2.2 2.2z" />
                        </svg>
                    </div>
                    <div>
                        <p class="font-sub font-700 text-sm text-blue-700 dark:text-blue-300">
                            <?php echo esc_html( $ac['name'] ); ?></p>
                        <p class="font-body text-sm text-gray-700 dark:text-white/70">
                            <?php echo esc_html( $ac['phone'] ); ?></p>
                    </div>
                </a>

                <a href="tel:<?php echo esc_attr( $qf['tel'] ); ?>"
                    class="flex items-center gap-4 p-4 rounded-xl transition-all hover:-translate-y-0.5 bg-red-50 dark:bg-red-600/10 border border-red-200 dark:border-red-600/25 hover:shadow-md dark:hover:bg-red-600/20"
                    aria-label="<?php echo esc_attr( sprintf( __( 'Call QwikFix on %s', 'nezer-motors' ), $qf['phone'] ) ); ?>">
                    <div class="w-10 h-10 rounded-lg flex items-center justify-center flex-shrink-0"
                        style="background:linear-gradient(135deg,#dc2626,#ef4444)" aria-hidden="true">
                        <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                            <path
                                d="M6.62 10.79c1.44 2.83 3.76 5.14 6.59 6.59l2.2-2.2c.27-.27.67-.36 1.02-.24 1.12.37 2.33.57 3.57.57.55 0 1 .45 1 1V20c0 .55-.45 1-1 1-9.39 0-17-7.61-17-17 0-.55.45-1 1-1h3.5c.55 0 1 .45 1 1 0 1.25.2 2.45.57 3.57.11.35.03.74-.25 1.02l-2.2 2.2z" />
                        </svg>
                    </div>
                    <div>
                        <p class="font-sub font-700 text-sm text-red-700 dark:text-red-300">
                            <?php echo esc_html( $qf['name'] ); ?></p>
                        <p class="font-body text-sm text-gray-700 dark:text-white/70">
                            <?php echo esc_html( $qf['phone'] ); ?></p>
                    </div>
                </a>

                <a href="https://wa.me/<?php echo esc_attr( NM_WA_NUM ); ?>" target="_blank" rel="noopener noreferrer"
                    class="flex items-center gap-4 p-4 rounded-xl transition-all hover:-translate-y-0.5 bg-green-50 dark:bg-green-600/10 border border-green-200 dark:border-green-600/25 hover:shadow-md dark:hover:bg-green-600/20"
                    aria-label="<?php esc_attr_e( 'Chat with Nezer Motors on WhatsApp', 'nezer-motors' ); ?>">
                    <div class="w-10 h-10 rounded-lg flex items-center justify-center flex-shrink-0"
                        style="background:linear-gradient(135deg,#16a34a,#22c55e)" aria-hidden="true">
                        <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                            <path
                                d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z" />
                        </svg>
                    </div>
                    <div>
                        <p class="font-sub font-700 text-sm text-green-700 dark:text-green-300">
                            <?php esc_html_e( 'WhatsApp', 'nezer-motors' ); ?></p>
                        <p class="font-body text-sm text-gray-700 dark:text-white/70">
                            <?php esc_html_e( '0733 204 672', 'nezer-motors' ); ?></p>
                    </div>
                </a>

            </div>
        </div>
    </div>

    <!-- MAIN CONTACT SECTION -->
    <section class="py-24 nm-section-alt">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">

                <!-- LEFT: Branch details + map placeholders -->
                <div class="space-y-8">

                    <?php
                    $branches_contact = [
                    [
                        'key'         => 'autocare',
                        'data'        => $ac,
                        'header_bg'   => 'linear-gradient(135deg,#1e40af,#2563eb)',
                        'icon_bg'     => 'rgba(30,64,175,0.15)',
                        'icon_color'  => '#93c5fd',
                        'btn_bg'      => 'linear-gradient(135deg,#1e40af,#2563eb)',
                        'btn_text'    => __( 'View AutoCare Services', 'nezer-motors' ),
                        'btn_url'     => home_url( '/autocare-express/' ),
                        'map_border'  => 'rgba(37,99,235,0.22)',
                        'map_bg'      => 'rgba(30,64,175,0.05)',
                        'map_link_c'  => '#2563eb',
                        'map_q'       => 'Kingongo+GK+Prison+Nyeri+Kenya',
                        'map_src'     => 'https://www.google.com/maps/embed?pb=!1m17!1m12!1m3!1d3989.7138124577496!2d36.956485074964746!3d-0.41470239958122684!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m2!1m1!2zMMKwMjQnNTIuOSJTIDM2wrA1NyczMi42IkU!5e0!3m2!1sen!2ske!4v1779095294639!5m2!1sen!2ske',
                    ],
                    [
                        'key'         => 'qwikfix',
                        'data'        => $qf,
                        'header_bg'   => 'linear-gradient(135deg,#dc2626,#ef4444)',
                        'icon_bg'     => 'rgba(220,38,38,0.15)',
                        'icon_color'  => '#fca5a5',
                        'btn_bg'      => 'linear-gradient(135deg,#dc2626,#ef4444)',
                        'btn_text'    => __( 'View QwikFix Services', 'nezer-motors' ),
                        'btn_url'     => home_url( '/qwikfix/' ),
                        'map_border'  => 'rgba(220,38,38,0.22)',
                        'map_bg'      => 'rgba(220,38,38,0.05)',
                        'map_link_c'  => '#dc2626',
                        'map_q'       => 'Shell+Kingongo+Nyeri+Nyahururu+Road+Kenya',
                        'map_src'     => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3989.71522437388!2d36.94878177067395!3d-0.41189151766477355!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x18285da15a3ba253%3A0xf9f082e2a354dd8e!2sShell!5e0!3m2!1sen!2ske!4v1779095332943!5m2!1sen!2ske',
                    ],
                    ];

                    foreach ( $branches_contact as $bc ) :
                    $b = $bc['data'];
                    ?>
                    <div
                        class="rounded-2xl overflow-hidden bg-white dark:bg-white/[0.05] border border-gray-100 dark:border-white/10 shadow-sm dark:shadow-none">

                        <!-- Branch header bar -->
                        <div class="p-1" style="background:<?php echo esc_attr( $bc['header_bg'] ); ?>">
                            <div class="px-4 py-2 flex items-center gap-2">
                                <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/img/' . $b['logo'] ); ?>"
                                    alt="<?php echo esc_attr( $b['logo_alt'] ); ?>"
                                    class="h-6 w-auto object-contain<?php echo $bc['key'] === 'qwikfix' ? ' brightness-200' : ''; ?>"
                                    loading="lazy">
                                <span
                                    class="text-white font-sub font-700 text-sm"><?php echo esc_html( $b['name'] ); ?></span>
                            </div>
                        </div>

                        <div class="p-6">
                            <!-- Details grid -->
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mb-6">
                                <?php
                                $details = [
                                    [ 'icon' => 'loc',   'label' => __( 'Address', 'nezer-motors' ), 'value' => $b['location'] . '<br>' . $b['address'], 'is_html' => true ],
                                    [ 'icon' => 'clock', 'label' => __( 'Hours',   'nezer-motors' ), 'value' => $b['hours'], 'is_html' => false ],
                                    [ 'icon' => 'phone', 'label' => __( 'Phone',   'nezer-motors' ), 'value' => $b['phone'], 'is_html' => false, 'link' => 'tel:' . $b['tel'] ],
                                    [ 'icon' => 'email', 'label' => __( 'Email',   'nezer-motors' ), 'value' => NM_EMAIL,    'is_html' => false, 'link' => 'mailto:' . NM_EMAIL ],
                                ];
                                foreach ( $details as $d ) :
                                    $icons = [
                                    'loc'   => '<path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z"/>',
                                    'clock' => '<path d="M11.99 2C6.47 2 2 6.48 2 12s4.47 10 9.99 10C17.52 22 22 17.52 22 12S17.52 2 11.99 2zM12 20c-4.42 0-8-3.58-8-8s3.58-8 8-8 8 3.58 8 8-3.58 8-8 8zm.5-13H11v6l5.25 3.15.75-1.23-4.5-2.67z"/>',
                                    'phone' => '<path d="M6.62 10.79c1.44 2.83 3.76 5.14 6.59 6.59l2.2-2.2c.27-.27.67-.36 1.02-.24 1.12.37 2.33.57 3.57.57.55 0 1 .45 1 1V20c0 .55-.45 1-1 1-9.39 0-17-7.61-17-17 0-.55.45-1 1-1h3.5c.55 0 1 .45 1 1 0 1.25.2 2.45.57 3.57.11.35.03.74-.25 1.02l-2.2 2.2z"/>',
                                    'email' => '<path d="M20 4H4c-1.1 0-1.99.9-1.99 2L2 18c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5-8-5V6l8 5 8-5v2z"/>',
                                    ];
                                ?>
                                <div class="flex items-start gap-3">
                                    <div class="w-8 h-8 rounded-lg flex items-center justify-center flex-shrink-0 mt-0.5"
                                        style="background:<?php echo esc_attr( $bc['icon_bg'] ); ?>">
                                        <svg class="w-4 h-4" fill="currentColor"
                                            style="color:<?php echo esc_attr( $bc['icon_color'] ); ?>"
                                            viewBox="0 0 24 24"
                                            aria-hidden="true"><?php echo $icons[ $d['icon'] ]; ?></svg>
                                    </div>
                                    <div>
                                        <p
                                            class="font-sub font-700 text-xs uppercase tracking-wider mb-1 text-gray-400 dark:text-white/40">
                                            <?php echo esc_html( $d['label'] ); ?></p>
                                        <?php if ( isset( $d['link'] ) ) : ?>
                                        <a href="<?php echo esc_url( $d['link'] ); ?>"
                                            class="font-body text-sm text-gray-700 dark:text-white/80 hover:opacity-75 transition-opacity">
                                            <?php if ( $d['is_html'] ) echo wp_kses( $d['value'], [ 'br' => [] ] ); else echo esc_html( $d['value'] ); ?>
                                        </a>
                                        <?php else : ?>
                                        <p class="font-body text-sm text-gray-700 dark:text-white/80">
                                            <?php if ( $d['is_html'] ) echo wp_kses( $d['value'], [ 'br' => [] ] ); else echo esc_html( $d['value'] ); ?>
                                        </p>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <?php endforeach; ?>
                            </div>

                            <!-- Map -->
                            <div class="nm-map-ph mb-4"
                                style="border-color:<?php echo esc_attr( $bc['map_border'] ); ?>;background:<?php echo esc_attr( $bc['map_bg'] ); ?>;"
                                role="region"
                                aria-label="<?php echo esc_attr( sprintf( __( 'Map for %s', 'nezer-motors' ), $b['name'] ) ); ?>">
                                <iframe src="<?php echo esc_url( $bc['map_src'] ); ?>"
                                    style="position:absolute;top:0;left:0;width:100%;height:100%;border:0;display:block;"
                                    allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"
                                    title="<?php echo esc_attr( sprintf( __( 'Map for %s', 'nezer-motors' ), $b['name'] ) ); ?>">
                                </iframe>
                            </div>

                            <a href="<?php echo esc_url( $bc['btn_url'] ); ?>"
                                class="flex items-center justify-center gap-2 w-full py-3 rounded-xl font-sub font-700 text-sm text-white transition-all hover:opacity-90"
                                style="background:<?php echo esc_attr( $bc['btn_bg'] ); ?>">
                                <?php echo esc_html( $bc['btn_text'] ); ?>
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                    <path d="M8.59 16.59L13.17 12 8.59 7.41 10 6l6 6-6 6z" />
                                </svg>
                            </a>
                        </div>
                    </div>
                    <?php endforeach; ?>

                </div>

                <!-- RIGHT: Contact form -->
                <div>
                    <div
                        class="sticky top-24 rounded-2xl overflow-hidden bg-white dark:bg-white/[0.05] border border-gray-100 dark:border-white/[0.12] shadow-sm dark:shadow-none">
                        <div class="p-8">
                            <h2 class="font-heading text-3xl font-700 mb-2 text-gray-900 dark:text-white">
                                <?php esc_html_e( 'Send Us a Message', 'nezer-motors' ); ?>
                            </h2>
                            <p class="font-body text-sm mb-7 text-gray-500 dark:text-white/55">
                                <?php esc_html_e( 'Fill in the form and we will get back to you as soon as possible.', 'nezer-motors' ); ?>
                            </p>

                            <!-- Notice (success / error) -->
                            <div id="nm-form-notice" class="nm-form-notice" role="alert" aria-live="polite"></div>

                            <form id="nm-contact-form" novalidate
                                aria-label="<?php esc_attr_e( 'Contact Nezer Motors', 'nezer-motors' ); ?>">

                                <!-- Honeypot — hidden from real users -->
                                <?php
                                  $nm_hp = nm_cs()['honeypot_field'] ?? 'website';
                                ?>
                                <div style="display:none" aria-hidden="true">
                                    <label for="nm-<?php echo esc_attr( $nm_hp ); ?>">
                                        <?php esc_html_e( 'Leave this blank', 'nezer-motors' ); ?>
                                    </label>
                                    <input type="text" id="nm-<?php echo esc_attr( $nm_hp ); ?>"
                                        name="<?php echo esc_attr( $nm_hp ); ?>" tabindex="-1" autocomplete="off">
                                </div>

                                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mb-4">
                                    <div>
                                        <label for="nm-name"
                                            class="block font-sub font-700 text-xs uppercase tracking-wider mb-2 text-gray-500 dark:text-white/50">
                                            <?php esc_html_e( 'Your Name', 'nezer-motors' ); ?> <span
                                                class="text-red-500" aria-hidden="true">*</span>
                                        </label>
                                        <input type="text" id="nm-name" name="name" required class="nm-field"
                                            placeholder="<?php esc_attr_e( 'John Kamau', 'nezer-motors' ); ?>"
                                            autocomplete="name" aria-required="true">
                                    </div>
                                    <div>
                                        <label for="nm-email"
                                            class="block font-sub font-700 text-xs uppercase tracking-wider mb-2 text-gray-500 dark:text-white/50">
                                            <?php esc_html_e( 'Email Address', 'nezer-motors' ); ?> <span
                                                class="text-red-500" aria-hidden="true">*</span>
                                        </label>
                                        <input type="email" id="nm-email" name="email" required class="nm-field"
                                            placeholder="<?php esc_attr_e( 'you@email.com', 'nezer-motors' ); ?>"
                                            autocomplete="email" aria-required="true">
                                    </div>
                                </div>

                                <div class="mb-4">
                                    <label for="nm-phone"
                                        class="block font-sub font-700 text-xs uppercase tracking-wider mb-2 text-gray-500 dark:text-white/50">
                                        <?php esc_html_e( 'Phone Number', 'nezer-motors' ); ?>
                                    </label>
                                    <input type="tel" id="nm-phone" name="phone" class="nm-field"
                                        placeholder="<?php esc_attr_e( '07XX XXX XXX', 'nezer-motors' ); ?>"
                                        autocomplete="tel">
                                </div>

                                <div class="mb-4">
                                    <label for="nm-branch"
                                        class="block font-sub font-700 text-xs uppercase tracking-wider mb-2 text-gray-500 dark:text-white/50">
                                        <?php esc_html_e( 'Branch / Subject', 'nezer-motors' ); ?> <span
                                            class="text-red-500" aria-hidden="true">*</span>
                                    </label>
                                    <select id="nm-branch" name="branch" required class="nm-field" aria-required="true">
                                        <option value="">
                                            <?php esc_html_e( 'Select a branch or topic', 'nezer-motors' ); ?></option>
                                        <option value="AutoCare Express">
                                            <?php esc_html_e( 'AutoCare Express — Mechanical, Engine, Suspension, Shocks', 'nezer-motors' ); ?>
                                        </option>
                                        <option value="QwikFix">
                                            <?php esc_html_e( 'QwikFix — Balancing, Alignment, Tyres, Batteries, Oil Change', 'nezer-motors' ); ?>
                                        </option>
                                        <option value="Products">
                                            <?php esc_html_e( 'Products — Tyres, Batteries, Shocks, Lubricants, Accessories', 'nezer-motors' ); ?>
                                        </option>
                                        <option value="General">
                                            <?php esc_html_e( 'General Enquiry', 'nezer-motors' ); ?></option>
                                    </select>
                                </div>

                                <div class="mb-4">
                                    <label for="nm-vehicle"
                                        class="block font-sub font-700 text-xs uppercase tracking-wider mb-2 text-gray-500 dark:text-white/50">
                                        <?php esc_html_e( 'Vehicle (Optional)', 'nezer-motors' ); ?>
                                    </label>
                                    <input type="text" id="nm-vehicle" name="vehicle" class="nm-field"
                                        placeholder="<?php esc_attr_e( 'e.g. Toyota Corolla 2019, 1800cc', 'nezer-motors' ); ?>">
                                </div>

                                <div class="mb-6">
                                    <label for="nm-message"
                                        class="block font-sub font-700 text-xs uppercase tracking-wider mb-2 text-gray-500 dark:text-white/50">
                                        <?php esc_html_e( 'Message', 'nezer-motors' ); ?> <span class="text-red-500"
                                            aria-hidden="true">*</span>
                                    </label>
                                    <textarea id="nm-message" name="message" rows="4" required
                                        class="nm-field resize-none"
                                        placeholder="<?php esc_attr_e( 'Describe what service you need or ask us anything…', 'nezer-motors' ); ?>"
                                        aria-required="true"></textarea>
                                </div>

                                <button type="submit"
                                    class="w-full flex items-center justify-center gap-2 py-3.5 rounded-xl font-sub font-700 text-sm transition-all hover:opacity-90 hover:scale-[1.01] disabled:opacity-60 disabled:cursor-not-allowed disabled:scale-100"
                                    style="background:linear-gradient(135deg,#d4a017,#f0c040);color:#000">
                                    <svg class="nm-btn-text w-4 h-4" fill="currentColor" viewBox="0 0 24 24"
                                        aria-hidden="true">
                                        <path d="M2.01 21L23 12 2.01 3 2 10l15 2-15 2z" />
                                    </svg>
                                    <svg class="nm-btn-spinner w-4 h-4 animate-spin" fill="none" viewBox="0 0 24 24"
                                        style="display:none" aria-hidden="true">
                                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor"
                                            stroke-width="4"></circle>
                                        <path class="opacity-75" fill="currentColor"
                                            d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4z"></path>
                                    </svg>
                                    <span
                                        class="nm-btn-text"><?php esc_html_e( 'Send Message', 'nezer-motors' ); ?></span>
                                    <span class="nm-btn-spinner font-sub font-700"
                                        style="display:none"><?php esc_html_e( 'Sending…', 'nezer-motors' ); ?></span>
                                </button>

                                <!-- Divider -->
                                <div class="relative flex items-center gap-3 my-5">
                                    <div class="flex-1 h-px bg-gray-200 dark:bg-white/10"></div>
                                    <span
                                        class="font-sub text-xs font-700 text-gray-400 dark:text-white/30"><?php esc_html_e( 'or reach us directly', 'nezer-motors' ); ?></span>
                                    <div class="flex-1 h-px bg-gray-200 dark:bg-white/10"></div>
                                </div>

                                <a href="https://wa.me/<?php echo esc_attr( NM_WA_NUM ); ?>" target="_blank"
                                    rel="noopener noreferrer"
                                    class="w-full flex items-center justify-center gap-2 py-3.5 rounded-xl font-sub font-700 text-sm text-white transition-all hover:opacity-90"
                                    style="background:linear-gradient(135deg,#25d366,#128c7e)"
                                    aria-label="<?php esc_attr_e( 'Chat with Nezer Motors on WhatsApp', 'nezer-motors' ); ?>">
                                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                        <path
                                            d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z" />
                                    </svg>
                                    <?php esc_html_e( 'Chat on WhatsApp', 'nezer-motors' ); ?>
                                </a>

                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

</main>

<?php
get_footer();