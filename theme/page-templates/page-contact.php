<?php
/**
 * The template for displaying the contact page
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Nezer_Motors
 */
defined( 'ABSPATH' ) || exit;

get_header();
?>

<main class="min-h-screen">

    <!-- HERO -->
    <section class="relative pt-32 pb-16 overflow-hidden"
        style="background: linear-gradient(135deg, #09090b 0%, #1a1a2e 60%, #1e3a4a 100%)">
        <div class="absolute inset-0"
            style="background-image: radial-gradient(rgba(255, 255, 255, 0.04) 1px, transparent 1px); background-size: 28px 28px">
        </div>
        <div class="absolute top-0 left-0 w-72 h-72 rounded-full blur-3xl opacity-15"
            style="background: radial-gradient(circle, #d4a017, transparent)"></div>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 text-center">
            <div
                class="inline-flex items-center gap-2 px-3 py-1.5 rounded-full text-xs font-sub font-600 tracking-widest uppercase mb-6 glass">
                <span
                    class="w-1.5 h-1.5 rounded-full bg-gold-400"></span><?php esc_html_e( 'Get In Touch', 'nezer-motors' ); ?>
            </div>
            <h1 class="font-heading text-5xl sm:text-6xl lg:text-7xl font-700 text-white leading-tight mb-6">
                <?php esc_html_e( 'We\'re Here', 'nezer-motors' ); ?><br /><span
                    style="background: linear-gradient(135deg, #d4a017, #f0c040); -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text"><?php esc_html_e( 'to Help', 'nezer-motors' ); ?></span>
            </h1>
            <p class="font-body text-white/65 text-lg max-w-xl mx-auto">
                <?php esc_html_e( 'Reach us at either branch directly or send us a message below. We respond quickly on WhatsApp or email.', 'nezer-motors' ); ?>
            </p>
        </div>
    </section>

    <!-- BRANCH CONTACT CARDS -->
    <section class="py-16" :class="darkMode?'bg-dark-900':'bg-slate-50'">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- AutoCare Express -->
                <div class="rounded-2xl overflow-hidden border" :class="darkMode?'border-white/10':'border-gray-200'">
                    <div class="px-6 py-5 flex items-center gap-4"
                        style="background: linear-gradient(135deg, #1e40af, #2563eb)">
                        <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/img/autocare-logo.png' ); ?>"
                            alt="<?php esc_attr_e( 'AutoCare Express', 'nezer-motors' ); ?>"
                            class="h-10 w-auto object-contain" />
                        <div>
                            <h3 class="font-heading text-xl font-700 text-white">
                                <?php esc_html_e( 'AutoCare Express', 'nezer-motors' ); ?></h3>
                            <p class="text-blue-200/70 text-xs font-body">
                                <?php esc_html_e( 'Full Vehicle Servicing', 'nezer-motors' ); ?></p>
                        </div>
                        <span
                            class="ml-auto flex items-center gap-1.5 px-2.5 py-1 rounded-full text-xs font-sub font-600"
                            style="background: rgba(255, 255, 255, 0.15); color: #fff">
                            <span
                                class="w-1.5 h-1.5 rounded-full bg-green-400 animate-pulse"></span><?php esc_html_e( 'Open Mon-Sat', 'nezer-motors' ); ?>
                        </span>
                    </div>
                    <div class="p-6 space-y-4" :class="darkMode?'bg-white/04':'bg-white'">
                        <div class="flex items-start gap-3">
                            <div class="w-9 h-9 rounded-xl flex items-center justify-center flex-shrink-0"
                                style="background: rgba(30, 64, 175, 0.15)">
                                <svg class="w-4 h-4 text-blue-500" fill="currentColor" viewBox="0 0 24 24">
                                    <path
                                        d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z" />
                                </svg>
                            </div>
                            <div>
                                <p class="font-sub font-600 text-xs uppercase tracking-wider mb-0.5"
                                    :class="darkMode?'text-white/40':'text-gray-400'">
                                    <?php esc_html_e( 'Location', 'nezer-motors' ); ?></p>
                                <p class="font-body text-sm" :class="darkMode?'text-white':'text-gray-800'">
                                    <?php esc_html_e( 'Nyeri - Opposite King\'ong\'o Prison', 'nezer-motors' ); ?></p>
                                <p class="font-body text-xs mt-0.5" :class="darkMode?'text-white/50':'text-gray-500'">
                                    <?php esc_html_e( 'Nyeri Town, Central Kenya', 'nezer-motors' ); ?></p>
                            </div>
                        </div>
                        <div class="flex items-start gap-3">
                            <div class="w-9 h-9 rounded-xl flex items-center justify-center flex-shrink-0"
                                style="background: rgba(30, 64, 175, 0.15)">
                                <svg class="w-4 h-4 text-blue-500" fill="currentColor" viewBox="0 0 24 24">
                                    <path
                                        d="M6.62 10.79c1.44 2.83 3.76 5.14 6.59 6.59l2.2-2.2c.27-.27.67-.36 1.02-.24 1.12.37 2.33.57 3.57.57.55 0 1 .45 1 1V20c0 .55-.45 1-1 1-9.39 0-17-7.61-17-17 0-.55.45-1 1-1h3.5c.55 0 1 .45 1 1 0 1.25.2 2.45.57 3.57.11.35.03.74-.25 1.02l-2.2 2.2z" />
                                </svg>
                            </div>
                            <div>
                                <p class="font-sub font-600 text-xs uppercase tracking-wider mb-0.5"
                                    :class="darkMode?'text-white/40':'text-gray-400'">
                                    <?php esc_html_e( 'Phone', 'nezer-motors' ); ?></p>
                                <a href="<?php echo esc_url( 'tel:+254733204672' ); ?>"
                                    class="font-body text-sm font-700 text-blue-500 hover:text-blue-400 transition-colors"><?php esc_html_e( '0733 204 672', 'nezer-motors' ); ?></a>
                            </div>
                        </div>
                        <div class="flex items-start gap-3">
                            <div class="w-9 h-9 rounded-xl flex items-center justify-center flex-shrink-0"
                                style="background: rgba(30, 64, 175, 0.15)">
                                <svg class="w-4 h-4 text-blue-500" fill="currentColor" viewBox="0 0 24 24">
                                    <path
                                        d="M11.99 2C6.47 2 2 6.48 2 12s4.47 10 9.99 10C17.52 22 22 17.52 22 12S17.52 2 11.99 2zm0 18c-4.42 0-8-3.58-8-8s3.58-8 8-8 8 3.58 8 8-3.58 8-8 8zm.5-13H11v6l5.25 3.15.75-1.23z" />
                                </svg>
                            </div>
                            <div>
                                <p class="font-sub font-600 text-xs uppercase tracking-wider mb-0.5"
                                    :class="darkMode?'text-white/40':'text-gray-400'">
                                    <?php esc_html_e( 'Hours', 'nezer-motors' ); ?></p>
                                <p class="font-body text-sm" :class="darkMode?'text-white':'text-gray-800'">
                                    <?php esc_html_e( 'Monday - Saturday', 'nezer-motors' ); ?></p>
                                <p class="font-body text-sm font-700 text-blue-500">
                                    <?php esc_html_e( '8:00 AM - 5:00 PM', 'nezer-motors' ); ?></p>
                            </div>
                        </div>
                        <div class="pt-4 border-t grid grid-cols-2 gap-3"
                            :class="darkMode?'border-white/10':'border-gray-100'">
                            <a href="<?php echo esc_url( 'tel:+254733204672' ); ?>"
                                class="flex items-center justify-center gap-2 py-2.5 rounded-xl font-sub font-700 text-sm text-white transition-all hover:opacity-90"
                                style="background: linear-gradient(135deg, #1e40af, #2563eb)">
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                                    <path
                                        d="M6.62 10.79c1.44 2.83 3.76 5.14 6.59 6.59l2.2-2.2c.27-.27.67-.36 1.02-.24 1.12.37 2.33.57 3.57.57.55 0 1 .45 1 1V20c0 .55-.45 1-1 1-9.39 0-17-7.61-17-17 0-.55.45-1 1-1h3.5c.55 0 1 .45 1 1 0 1.25.2 2.45.57 3.57.11.35.03.74-.25 1.02l-2.2 2.2z" />
                                </svg><?php esc_html_e( 'Call Now', 'nezer-motors' ); ?>
                            </a>
                            <a href="<?php echo esc_url( 'https://wa.me/254733204672?text=Hello%2C%20I%20would%20like%20to%20enquire%20about%20AutoCare%20Express%20services.' ); ?>"
                                target="_blank" rel="noopener noreferrer"
                                class="flex items-center justify-center gap-2 py-2.5 rounded-xl font-sub font-700 text-sm text-white transition-all hover:opacity-90"
                                style="background: linear-gradient(135deg, #25d366, #128c7e)">
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                                    <path
                                        d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967a.664.664 0 00-.67.15c-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075C12.921 14.72 11.963 14.407 10.828 13.395c-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51a6.47 6.47 0 00-.57-.01c-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347M12 0C5.373 0 0 5.373 0 12c0 2.107.547 4.14 1.588 5.945L.057 24l6.305-1.654A11.882 11.882 0 0012 24c6.627 0 12-5.373 12-12S18.627 0 12 0z" />
                                </svg><?php esc_html_e( 'WhatsApp', 'nezer-motors' ); ?>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- QuikFix -->
                <div class="rounded-2xl overflow-hidden border" :class="darkMode?'border-white/10':'border-gray-200'">
                    <div class="px-6 py-5 flex items-center gap-4"
                        style="background: linear-gradient(135deg, #dc2626, #ef4444)">
                        <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/img/quikfix-logo.png' ); ?>"
                            alt="<?php esc_attr_e( 'QuikFix', 'nezer-motors' ); ?>"
                            class="h-10 w-auto object-contain brightness-200" />
                        <div>
                            <h3 class="font-heading text-xl font-700 text-white">
                                <?php esc_html_e( 'QuikFix', 'nezer-motors' ); ?></h3>
                            <p class="text-red-200/70 text-xs font-body">
                                <?php esc_html_e( 'Shell Service Station, King\'ong\'o', 'nezer-motors' ); ?></p>
                        </div>
                        <span
                            class="ml-auto flex items-center gap-1.5 px-2.5 py-1 rounded-full text-xs font-sub font-600"
                            style="background: rgba(255, 255, 255, 0.15); color: #fff">
                            <span
                                class="w-1.5 h-1.5 rounded-full bg-green-400 animate-pulse"></span><?php esc_html_e( 'Open Mon-Sat', 'nezer-motors' ); ?>
                        </span>
                    </div>
                    <div class="p-6 space-y-4" :class="darkMode?'bg-white/04':'bg-white'">
                        <div class="flex items-start gap-3">
                            <div class="w-9 h-9 rounded-xl flex items-center justify-center flex-shrink-0"
                                style="background: rgba(220, 38, 38, 0.15)">
                                <svg class="w-4 h-4 text-red-500" fill="currentColor" viewBox="0 0 24 24">
                                    <path
                                        d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z" />
                                </svg>
                            </div>
                            <div>
                                <p class="font-sub font-600 text-xs uppercase tracking-wider mb-0.5"
                                    :class="darkMode?'text-white/40':'text-gray-400'">
                                    <?php esc_html_e( 'Location', 'nezer-motors' ); ?></p>
                                <p class="font-body text-sm" :class="darkMode?'text-white':'text-gray-800'">
                                    <?php esc_html_e( 'Shell Service Station, King\'ong\'o', 'nezer-motors' ); ?></p>
                                <p class="font-body text-xs mt-0.5" :class="darkMode?'text-white/50':'text-gray-500'">
                                    <?php esc_html_e( 'Nyeri-Nyahururu Junction, Nyeri', 'nezer-motors' ); ?></p>
                            </div>
                        </div>
                        <div class="flex items-start gap-3">
                            <div class="w-9 h-9 rounded-xl flex items-center justify-center flex-shrink-0"
                                style="background: rgba(220, 38, 38, 0.15)">
                                <svg class="w-4 h-4 text-red-500" fill="currentColor" viewBox="0 0 24 24">
                                    <path
                                        d="M6.62 10.79c1.44 2.83 3.76 5.14 6.59 6.59l2.2-2.2c.27-.27.67-.36 1.02-.24 1.12.37 2.33.57 3.57.57.55 0 1 .45 1 1V20c0 .55-.45 1-1 1-9.39 0-17-7.61-17-17 0-.55.45-1 1-1h3.5c.55 0 1 .45 1 1 0 1.25.2 2.45.57 3.57.11.35.03.74-.25 1.02l-2.2 2.2z" />
                                </svg>
                            </div>
                            <div>
                                <p class="font-sub font-600 text-xs uppercase tracking-wider mb-0.5"
                                    :class="darkMode?'text-white/40':'text-gray-400'">
                                    <?php esc_html_e( 'Phone', 'nezer-motors' ); ?></p>
                                <a href="<?php echo esc_url( 'tel:+254710104644' ); ?>"
                                    class="font-body text-sm font-700 text-red-500 hover:text-red-400 transition-colors"><?php esc_html_e( '0710 104 644', 'nezer-motors' ); ?></a>
                            </div>
                        </div>
                        <div class="flex items-start gap-3">
                            <div class="w-9 h-9 rounded-xl flex items-center justify-center flex-shrink-0"
                                style="background: rgba(220, 38, 38, 0.15)">
                                <svg class="w-4 h-4 text-red-500" fill="currentColor" viewBox="0 0 24 24">
                                    <path
                                        d="M11.99 2C6.47 2 2 6.48 2 12s4.47 10 9.99 10C17.52 22 22 17.52 22 12S17.52 2 11.99 2zm0 18c-4.42 0-8-3.58-8-8s3.58-8 8-8 8 3.58 8 8-3.58 8-8 8zm.5-13H11v6l5.25 3.15.75-1.23z" />
                                </svg>
                            </div>
                            <div>
                                <p class="font-sub font-600 text-xs uppercase tracking-wider mb-0.5"
                                    :class="darkMode?'text-white/40':'text-gray-400'">
                                    <?php esc_html_e( 'Hours', 'nezer-motors' ); ?></p>
                                <p class="font-body text-sm" :class="darkMode?'text-white':'text-gray-800'">
                                    <?php esc_html_e( 'Monday - Saturday', 'nezer-motors' ); ?></p>
                                <p class="font-body text-sm font-700 text-red-500">
                                    <?php esc_html_e( '8:00 AM - 5:00 PM', 'nezer-motors' ); ?></p>
                            </div>
                        </div>
                        <div class="pt-4 border-t grid grid-cols-2 gap-3"
                            :class="darkMode?'border-white/10':'border-gray-100'">
                            <a href="<?php echo esc_url( 'tel:+254710104644' ); ?>"
                                class="flex items-center justify-center gap-2 py-2.5 rounded-xl font-sub font-700 text-sm text-white transition-all hover:opacity-90"
                                style="background: linear-gradient(135deg, #dc2626, #ef4444)">
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                                    <path
                                        d="M6.62 10.79c1.44 2.83 3.76 5.14 6.59 6.59l2.2-2.2c.27-.27.67-.36 1.02-.24 1.12.37 2.33.57 3.57.57.55 0 1 .45 1 1V20c0 .55-.45 1-1 1-9.39 0-17-7.61-17-17 0-.55.45-1 1-1h3.5c.55 0 1 .45 1 1 0 1.25.2 2.45.57 3.57.11.35.03.74-.25 1.02l-2.2 2.2z" />
                                </svg><?php esc_html_e( 'Call Now', 'nezer-motors' ); ?>
                            </a>
                            <a href="<?php echo esc_url( 'https://wa.me/254733204672?text=Hello%2C%20I%20would%20like%20to%20enquire%20about%20QuikFix%20services.' ); ?>"
                                target="_blank" rel="noopener noreferrer"
                                class="flex items-center justify-center gap-2 py-2.5 rounded-xl font-sub font-700 text-sm text-white transition-all hover:opacity-90"
                                style="background: linear-gradient(135deg, #25d366, #128c7e)">
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                                    <path
                                        d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967a.664.664 0 00-.67.15c-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075C12.921 14.72 11.963 14.407 10.828 13.395c-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51a6.47 6.47 0 00-.57-.01c-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347M12 0C5.373 0 0 5.373 0 12c0 2.107.547 4.14 1.588 5.945L.057 24l6.305-1.654A11.882 11.882 0 0012 24c6.627 0 12-5.373 12-12S18.627 0 12 0z" />
                                </svg><?php esc_html_e( 'WhatsApp', 'nezer-motors' ); ?>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Email row -->
            <div class="mt-6 p-5 rounded-2xl flex flex-col sm:flex-row items-center gap-4 border"
                :class="darkMode?'bg-white/04 border-white/10':'bg-white border-gray-200'">
                <div class="w-12 h-12 rounded-xl flex items-center justify-center flex-shrink-0"
                    style="background: linear-gradient(135deg, #d4a017, #f0c040)">
                    <svg class="w-6 h-6 text-black" fill="currentColor" viewBox="0 0 24 24">
                        <path
                            d="M20 4H4c-1.1 0-1.99.9-1.99 2L2 18c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5-8-5V6l8 5 8-5v2z" />
                    </svg>
                </div>
                <div>
                    <p class="font-sub font-700 text-sm" :class="darkMode?'text-white':'text-gray-900'">
                        <?php esc_html_e( 'General Enquiries', 'nezer-motors' ); ?></p>
                    <a href="<?php echo esc_url( 'mailto:info@nezermotors.com' ); ?>"
                        class="font-body text-gold-500 hover:text-gold-400 transition-colors font-700"><?php echo esc_html( 'info@nezermotors.com' ); ?></a>
                </div>
                <a href="<?php echo esc_url( 'mailto:info@nezermotors.com' ); ?>"
                    class="sm:ml-auto flex items-center gap-2 px-5 py-2.5 rounded-xl font-sub font-700 text-sm text-black transition-all hover:opacity-90"
                    style="background: linear-gradient(135deg, #d4a017, #f0c040)"><?php esc_html_e( 'Send Email', 'nezer-motors' ); ?></a>
            </div>
        </div>
    </section>

    <!-- CONTACT FORM + MAP -->
    <section class="py-16" :class="darkMode?'bg-dark-800':'bg-white'">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-10">
                <!-- Contact Form -->
                <div>
                    <div class="mb-8">
                        <h2 class="font-heading text-3xl sm:text-4xl font-700 mb-2"
                            :class="darkMode?'text-white':'text-gray-900'">
                            <?php esc_html_e( 'Send Us a Message', 'nezer-motors' ); ?></h2>
                        <p class="font-body text-sm" :class="darkMode?'text-white/60':'text-gray-500'">
                            <?php esc_html_e( 'We\'ll get back to you via email or WhatsApp as quickly as possible.', 'nezer-motors' ); ?>
                        </p>
                    </div>

                    <div x-data="contactForm()" class="space-y-4">
                        <!-- Name -->
                        <div>
                            <label class="block font-sub font-600 text-xs uppercase tracking-wider mb-1.5"
                                :class="darkMode?'text-white/50':'text-gray-500'"><?php esc_html_e( 'Your Name', 'nezer-motors' ); ?></label>
                            <input x-model="form.name" type="text"
                                placeholder="<?php esc_attr_e( 'e.g. John Kamau', 'nezer-motors' ); ?>"
                                class="w-full px-4 py-3 rounded-xl text-sm font-body focus:outline-none focus:ring-2 transition-all"
                                :class="darkMode?'bg-white/08 border border-white/15 text-white placeholder-white/30 focus:ring-gold-500/30':'bg-slate-50 border border-gray-200 text-gray-900 placeholder-gray-400 focus:ring-gold-500/30'" />
                        </div>
                        <!-- Email -->
                        <div>
                            <label class="block font-sub font-600 text-xs uppercase tracking-wider mb-1.5"
                                :class="darkMode?'text-white/50':'text-gray-500'"><?php esc_html_e( 'Email Address', 'nezer-motors' ); ?></label>
                            <input x-model="form.email" type="email"
                                placeholder="<?php esc_attr_e( 'you@example.com', 'nezer-motors' ); ?>"
                                class="w-full px-4 py-3 rounded-xl text-sm font-body focus:outline-none focus:ring-2 transition-all"
                                :class="darkMode?'bg-white/08 border border-white/15 text-white placeholder-white/30 focus:ring-gold-500/30':'bg-slate-50 border border-gray-200 text-gray-900 placeholder-gray-400 focus:ring-gold-500/30'" />
                        </div>
                        <!-- Branch -->
                        <div>
                            <label class="block font-sub font-600 text-xs uppercase tracking-wider mb-1.5"
                                :class="darkMode?'text-white/50':'text-gray-500'"><?php esc_html_e( 'Which Branch?', 'nezer-motors' ); ?></label>
                            <select x-model="form.branch"
                                class="w-full px-4 py-3 rounded-xl text-sm font-body focus:outline-none focus:ring-2 transition-all"
                                :class="darkMode?'bg-white/08 border border-white/15 text-white focus:ring-gold-500/30':'bg-slate-50 border border-gray-200 text-gray-900 focus:ring-gold-500/30'">
                                <option value=""><?php esc_html_e( 'Select a branch...', 'nezer-motors' ); ?></option>
                                <option value="<?php echo esc_attr( 'autocare' ); ?>">
                                    <?php esc_html_e( 'AutoCare Express - Opp King\'ong\'o Prison', 'nezer-motors' ); ?>
                                </option>
                                <option value="<?php echo esc_attr( 'quikfix' ); ?>">
                                    <?php esc_html_e( 'QuikFix - Shell King\'ong\'o', 'nezer-motors' ); ?></option>
                                <option value="<?php echo esc_attr( 'general' ); ?>">
                                    <?php esc_html_e( 'General Enquiry', 'nezer-motors' ); ?></option>
                            </select>
                        </div>
                        <!-- Message -->
                        <div>
                            <label class="block font-sub font-600 text-xs uppercase tracking-wider mb-1.5"
                                :class="darkMode?'text-white/50':'text-gray-500'"><?php esc_html_e( 'Message', 'nezer-motors' ); ?></label>
                            <textarea x-model="form.message" rows="4"
                                placeholder="<?php esc_attr_e( 'Tell us about your vehicle and what service you need...', 'nezer-motors' ); ?>"
                                class="w-full px-4 py-3 rounded-xl text-sm font-body focus:outline-none focus:ring-2 transition-all resize-none"
                                :class="darkMode?'bg-white/08 border border-white/15 text-white placeholder-white/30 focus:ring-gold-500/30':'bg-slate-50 border border-gray-200 text-gray-900 placeholder-gray-400 focus:ring-gold-500/30'"></textarea>
                        </div>
                        <!-- Submit -->
                        <div class="flex flex-col sm:flex-row gap-3">
                            <button type="button" @click="submitViaEmail()"
                                class="flex-1 flex items-center justify-center gap-2 py-3.5 rounded-xl font-sub font-700 text-sm text-black transition-all hover:opacity-90 hover:scale-105"
                                style="background: linear-gradient(135deg, #d4a017, #f0c040)">
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M2.01 21L23 12 2.01 3 2 10l15 2-15 2z" />
                                </svg><?php esc_html_e( 'Send via Email', 'nezer-motors' ); ?>
                            </button>
                            <button type="button" @click="submitViaWhatsApp()"
                                class="flex-1 flex items-center justify-center gap-2 py-3.5 rounded-xl font-sub font-700 text-sm text-white transition-all hover:opacity-90 hover:scale-105"
                                style="background: linear-gradient(135deg, #25d366, #128c7e)">
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                                    <path
                                        d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967a.664.664 0 00-.67.15c-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075C12.921 14.72 11.963 14.407 10.828 13.395c-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51a6.47 6.47 0 00-.57-.01c-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347M12 0C5.373 0 0 5.373 0 12c0 2.107.547 4.14 1.588 5.945L.057 24l6.305-1.654A11.882 11.882 0 0012 24c6.627 0 12-5.373 12-12S18.627 0 12 0z" />
                                </svg><?php esc_html_e( 'Send via WhatsApp', 'nezer-motors' ); ?>
                            </button>
                        </div>
                        <!-- Note -->
                        <p class="font-body text-xs" :class="darkMode?'text-white/30':'text-gray-400'">
                            <?php esc_html_e( '"Send via Email" opens your email app pre-filled. "Send via WhatsApp" opens WhatsApp with your message.', 'nezer-motors' ); ?>
                        </p>
                    </div>
                </div>

                <!-- Maps -->
                <div class="space-y-5">
                    <!-- AutoCare map placeholder -->
                    <div>
                        <p class="font-sub font-700 text-sm mb-2 flex items-center gap-2"
                            :class="darkMode?'text-white':'text-gray-900'">
                            <span class="w-3 h-3 rounded-full inline-block"
                                style="background: #1e40af"></span><?php esc_html_e( 'AutoCare Express - Opp King\'ong\'o Prison', 'nezer-motors' ); ?>
                        </p>
                        <div class="map-placeholder map-grid h-52 flex items-center justify-center"
                            style="border: 1px solid rgba(255, 255, 255, 0.1)">
                            <div class="text-center">
                                <div class="w-10 h-10 rounded-full flex items-center justify-center mx-auto mb-3"
                                    style="background: rgba(30, 64, 175, 0.4)">
                                    <svg class="w-5 h-5 text-blue-300" fill="currentColor" viewBox="0 0 24 24">
                                        <path
                                            d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z" />
                                    </svg>
                                </div>
                                <p class="font-body text-white/60 text-sm mb-3">
                                    <?php esc_html_e( 'Nyeri, Opp King\'ong\'o Prison', 'nezer-motors' ); ?></p>
                                <a href="<?php echo esc_url( 'https://maps.google.com/?q=King%27ong%27o+Prison+Nyeri+Kenya' ); ?>"
                                    target="_blank" rel="noopener noreferrer"
                                    class="inline-flex items-center gap-1.5 px-4 py-2 rounded-lg font-sub font-700 text-xs text-white transition-all hover:opacity-80"
                                    style="background: rgba(30, 64, 175, 0.5)">
                                    <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 24 24">
                                        <path
                                            d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7z" />
                                    </svg><?php esc_html_e( 'Open in Maps', 'nezer-motors' ); ?>
                                </a>
                            </div>
                        </div>
                    </div>
                    <!-- QuikFix map placeholder -->
                    <div>
                        <p class="font-sub font-700 text-sm mb-2 flex items-center gap-2"
                            :class="darkMode?'text-white':'text-gray-900'">
                            <span class="w-3 h-3 rounded-full inline-block"
                                style="background: #dc2626"></span><?php esc_html_e( 'QuikFix - Shell King\'ong\'o, Nyahururu Junction', 'nezer-motors' ); ?>
                        </p>
                        <div class="map-placeholder map-grid h-52 flex items-center justify-center"
                            style="border: 1px solid rgba(255, 255, 255, 0.1)">
                            <div class="text-center">
                                <div class="w-10 h-10 rounded-full flex items-center justify-center mx-auto mb-3"
                                    style="background: rgba(220, 38, 38, 0.4)">
                                    <svg class="w-5 h-5 text-red-300" fill="currentColor" viewBox="0 0 24 24">
                                        <path
                                            d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z" />
                                    </svg>
                                </div>
                                <p class="font-body text-white/60 text-sm mb-3">
                                    <?php esc_html_e( 'Shell Station, King\'ong\'o - Nyahururu Junction', 'nezer-motors' ); ?>
                                </p>
                                <a href="<?php echo esc_url( 'https://maps.google.com/?q=Shell+King\'ong\'o+Nyeri+Kenya' ); ?>"
                                    target="_blank" rel="noopener noreferrer"
                                    class="inline-flex items-center gap-1.5 px-4 py-2 rounded-lg font-sub font-700 text-xs text-white transition-all hover:opacity-80"
                                    style="background: rgba(220, 38, 38, 0.5)">
                                    <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 24 24">
                                        <path
                                            d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7z" />
                                    </svg><?php esc_html_e( 'Open in Maps', 'nezer-motors' ); ?>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</main>

<?php
get_footer();