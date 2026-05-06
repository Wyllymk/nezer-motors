<?php
/**
 * Template part for displaying the footer content
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 *
 * @package Nezer_Motors
 */
// Exit if accessed directly
defined( 'ABSPATH' ) || exit;

?>

<!-- ============================================================
     FOOTER
    ============================================================ -->
<footer :class="darkMode ? 'bg-dark-800 border-t border-white/10' : 'bg-gray-900 border-t border-gray-800'">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-10">

            <!-- Nezer Motors -->
            <div>
                <div class="flex items-center gap-2 mb-5">
                    <div class="w-9 h-9 rounded-lg flex items-center justify-center"
                        style="background:linear-gradient(135deg,#d4a017,#f0c040)">
                        <svg class="w-5 h-5 text-black" fill="currentColor" viewBox="0 0 24 24">
                            <path
                                d="M18.92 6.01C18.72 5.42 18.16 5 17.5 5h-11c-.66 0-1.21.42-1.42 1.01L3 12v8c0 .55.45 1 1 1h1c.55 0 1-.45 1-1v-1h12v1c0 .55.45 1 1 1h1c.55 0 1-.45 1-1v-8l-2.08-5.99z" />
                        </svg>
                    </div>
                    <span class="font-heading text-xl font-700 text-white">NEZER <span
                            class="text-gold-500">MOTORS</span></span>
                </div>
                <p class="font-body text-sm text-white/50 leading-relaxed mb-5">Nyeri's trusted vehicle service
                    group. Two branches, one commitment: honest, expert car care.</p>
                <div class="space-y-2">
                    <a href="mailto:info@nezermotors.com"
                        class="flex items-center gap-2 text-white/60 hover:text-gold-400 text-sm font-body transition-colors">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                            <path
                                d="M20 4H4c-1.1 0-1.99.9-1.99 2L2 18c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5-8-5V6l8 5 8-5v2z" />
                        </svg>
                        info@nezermotors.com
                    </a>
                    <a href="https://wa.me/254733204672" target="_blank"
                        class="flex items-center gap-2 text-white/60 hover:text-green-400 text-sm font-body transition-colors">
                        <svg class="w-4 h-4 text-green-500" fill="currentColor" viewBox="0 0 24 24">
                            <path
                                d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z" />
                        </svg>
                        0733 204 672 (WhatsApp)
                    </a>
                </div>
                <!-- Social links -->
                <div class="flex items-center gap-3 mt-6">
                    <a href="https://www.facebook.com/nezermotors" target="_blank"
                        class="w-9 h-9 rounded-lg flex items-center justify-center bg-white/08 hover:bg-blue-600 text-white/50 hover:text-white transition-all">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                            <path
                                d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z" />
                        </svg>
                    </a>
                    <a href="https://www.instagram.com/shell_kingongo" target="_blank"
                        class="w-9 h-9 rounded-lg flex items-center justify-center bg-white/08 hover:bg-pink-600 text-white/50 hover:text-white transition-all">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                            <path
                                d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z" />
                        </svg>
                    </a>
                </div>
            </div>

            <!-- AutoCare Express -->
            <div>
                <div class="flex items-center gap-2 mb-5">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/autocare-logo.png"
                        alt="AutoCare Express" class="h-8 w-auto" onerror="this.style.display='none'">
                    <span class="font-heading text-lg font-700 text-white">AutoCare Express</span>
                </div>
                <div class="space-y-3 mb-6">
                    <div class="flex items-start gap-2 text-white/60 text-sm font-body">
                        <svg class="w-4 h-4 text-blue-400 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 24 24">
                            <path
                                d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z" />
                        </svg>
                        Nyeri — Opposite King'Ong'o Prison
                    </div>
                    <div class="flex items-center gap-2 text-white/60 text-sm font-body">
                        <svg class="w-4 h-4 text-blue-400" fill="currentColor" viewBox="0 0 24 24">
                            <path
                                d="M6.62 10.79c1.44 2.83 3.76 5.14 6.59 6.59l2.2-2.2c.27-.27.67-.36 1.02-.24 1.12.37 2.33.57 3.57.57.55 0 1 .45 1 1V20c0 .55-.45 1-1 1-9.39 0-17-7.61-17-17 0-.55.45-1 1-1h3.5c.55 0 1 .45 1 1 0 1.25.2 2.45.57 3.57.11.35.03.74-.25 1.02l-2.2 2.2z" />
                        </svg>
                        <a href="tel:+254733204672" class="hover:text-blue-400 transition-colors">0733 204 672</a>
                    </div>
                    <div class="flex items-center gap-2 text-white/60 text-sm font-body">
                        <svg class="w-4 h-4 text-blue-400" fill="currentColor" viewBox="0 0 24 24">
                            <path
                                d="M11.99 2C6.47 2 2 6.48 2 12s4.47 10 9.99 10C17.52 22 22 17.52 22 12S17.52 2 11.99 2zM12 20c-4.42 0-8-3.58-8-8s3.58-8 8-8 8 3.58 8 8-3.58 8-8 8zm.5-13H11v6l5.25 3.15.75-1.23-4.5-2.67z" />
                        </svg>
                        Mon – Sat, 8:00 AM – 5:00 PM
                    </div>
                </div>
                <div class="space-y-1">
                    <p class="font-sub font-600 text-white/30 text-xs uppercase tracking-wider mb-2">Services</p>
                    <div class="grid grid-cols-2 gap-1">
                        <template x-for="s in autocareFooterServices">
                            <p class="text-white/50 text-xs font-body" x-text="s"></p>
                        </template>
                    </div>
                </div>
            </div>

            <!-- QuikFix -->
            <div>
                <div class="flex items-center gap-2 mb-5">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/quikfix-logo.png" alt="QuikFix"
                        class="h-8 w-auto brightness-200" onerror="this.style.display='none'">
                    <span class="font-heading text-lg font-700 text-white">QuikFix</span>
                </div>
                <div class="space-y-3 mb-6">
                    <div class="flex items-start gap-2 text-white/60 text-sm font-body">
                        <svg class="w-4 h-4 text-red-400 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 24 24">
                            <path
                                d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z" />
                        </svg>
                        Shell Station, Kingongo, Nyeri-Nyahururu Junction
                    </div>
                    <div class="flex items-center gap-2 text-white/60 text-sm font-body">
                        <svg class="w-4 h-4 text-red-400" fill="currentColor" viewBox="0 0 24 24">
                            <path
                                d="M6.62 10.79c1.44 2.83 3.76 5.14 6.59 6.59l2.2-2.2c.27-.27.67-.36 1.02-.24 1.12.37 2.33.57 3.57.57.55 0 1 .45 1 1V20c0 .55-.45 1-1 1-9.39 0-17-7.61-17-17 0-.55.45-1 1-1h3.5c.55 0 1 .45 1 1 0 1.25.2 2.45.57 3.57.11.35.03.74-.25 1.02l-2.2 2.2z" />
                        </svg>
                        <a href="tel:+254710104644" class="hover:text-red-400 transition-colors">0710 104 644</a>
                    </div>
                    <div class="flex items-center gap-2 text-white/60 text-sm font-body">
                        <svg class="w-4 h-4 text-red-400" fill="currentColor" viewBox="0 0 24 24">
                            <path
                                d="M11.99 2C6.47 2 2 6.48 2 12s4.47 10 9.99 10C17.52 22 22 17.52 22 12S17.52 2 11.99 2zM12 20c-4.42 0-8-3.58-8-8s3.58-8 8-8 8 3.58 8 8-3.58 8-8 8zm.5-13H11v6l5.25 3.15.75-1.23-4.5-2.67z" />
                        </svg>
                        Mon – Sat, 8:00 AM – 5:00 PM
                    </div>
                </div>
                <div class="space-y-1">
                    <p class="font-sub font-600 text-white/30 text-xs uppercase tracking-wider mb-2">Services</p>
                    <div class="grid grid-cols-2 gap-1">
                        <template x-for="s in quikfixFooterServices">
                            <p class="text-white/50 text-xs font-body" x-text="s"></p>
                        </template>
                    </div>
                </div>
            </div>

        </div>

        <!-- Bottom bar -->
        <div class="mt-12 pt-8 border-t border-white/10 flex flex-col sm:flex-row items-center justify-between gap-4">
            <p class="font-body text-white/30 text-sm">© 2026 Nezer Motors. All rights reserved.</p>
            <div class="flex items-center gap-5">
                <a href="<?php echo esc_url( home_url( '/about/' ) ); ?>"
                    class="font-body text-white/30 text-sm hover:text-white/60 transition-colors">About</a>
                <a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>"
                    class="font-body text-white/30 text-sm hover:text-white/60 transition-colors">Contact</a>
                <a href="<?php echo esc_url( home_url( '/sitemap.xml' ) ); ?>"
                    class="font-body text-white/30 text-sm hover:text-white/60 transition-colors">Sitemap</a>
            </div>
        </div>
    </div>
</footer>

<!-- Enhanced Scroll to Top Button -->
<div x-data="scrollToTop" x-show="visible" x-transition
    class="fixed bottom-8 right-8 z-50 2xl:right-[calc((100vw-100rem)/2+2rem)]">

    <!-- Glow effect -->
    <div
        class="absolute inset-0 bg-gradient-to-r from-teal-400 to-cyan-400 rounded-full blur-lg opacity-0 group-hover:opacity-30 transition-all duration-500 scale-110">
    </div>

    <button @click="scrollTop()" class="relative group flex items-center justify-center w-14 h-14 
                   bg-gradient-to-r from-teal-500 to-cyan-500 hover:from-teal-600 hover:to-cyan-600
                   text-white rounded-full shadow-2xl hover:shadow-teal-500/30 
                   transition-all duration-300 transform hover:scale-110 hover:-translate-y-1
                   border border-white/20 backdrop-blur-sm cursor-pointer" aria-label="Scroll to Top">

        <!-- Animated arrow -->
        <svg class="w-6 h-6 transition-transform duration-300 group-hover:-translate-y-0.5 group-hover:scale-110"
            fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 10l7-7m0 0l7 7m-7-7v18" />
        </svg>

        <!-- Progress ring with cyber glow -->
        <svg class="absolute inset-0 w-full h-full -rotate-90" viewBox="0 0 36 36">
            <defs>
                <!-- Gradient using your theme colors -->
                <linearGradient id="scrollGradient" x1="0%" y1="0%" x2="100%" y2="0%">
                    <stop offset="0%" stop-color="var(--color-cyber-cyan)" />
                    <stop offset="100%" stop-color="var(--color-cyber-pink)" />
                </linearGradient>
            </defs>

            <!-- Track -->
            <circle class="text-white/20" stroke="currentColor" stroke-width="3" fill="none" cx="18" cy="18" r="16">
            </circle>

            <!-- Progress -->
            <circle stroke="url(#scrollGradient)" stroke-width="3" fill="none" cx="18" cy="18" r="16"
                :stroke-dasharray="2 * Math.PI * 16" :stroke-dashoffset="2 * Math.PI * 16 * (1 - progress / 100)"
                class="transition-all duration-200 ease-linear">
            </circle>
        </svg>


    </button>

    <!-- Tooltip -->
    <div class="absolute -top-12 left-1/2 transform -translate-x-1/2 
                bg-gray-800 text-white px-3 py-1 rounded-lg text-sm font-medium
                opacity-0 group-hover:opacity-100 transition-all duration-300
                pointer-events-none whitespace-nowrap">
        Back to top
        <div class="absolute top-full left-1/2 transform -translate-x-1/2 
                    border-4 border-transparent border-t-gray-800"></div>
    </div>
</div>

<!-- ============================================================
     WHATSAPP FLOATING BUTTON
    ============================================================ -->
<div x-data="whatsappWidget()" class="fixed bottom-6 right-6 z-50">
    <!-- Popup -->
    <div x-show="open" x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0 translate-y-4 scale-95"
        x-transition:enter-end="opacity-100 translate-y-0 scale-100"
        x-transition:leave="transition ease-in duration-200"
        x-transition:leave-start="opacity-100 translate-y-0 scale-100"
        x-transition:leave-end="opacity-0 translate-y-4 scale-95" x-cloak
        class="absolute bottom-16 right-0 w-72 rounded-2xl overflow-hidden shadow-2xl border border-white/20"
        style="background:#1a1a2e">
        <!-- Header -->
        <div class="px-4 py-3 flex items-center gap-3" style="background:linear-gradient(135deg,#25d366,#128c7e)">
            <div class="w-9 h-9 rounded-full bg-white/20 flex items-center justify-center">
                <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 24 24">
                    <path
                        d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z" />
                </svg>
            </div>
            <div>
                <p class="text-white font-sub font-700 text-sm">Nezer Motors</p>
                <p class="text-white/80 text-xs font-body">Typically replies quickly</p>
            </div>
            <button @click="open = false" class="ml-auto text-white/60 hover:text-white transition-colors">
                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                    <path
                        d="M19 6.41L17.59 5 12 10.59 6.41 5 5 6.41 10.59 12 5 17.59 6.41 19 12 13.41 17.59 19 19 17.59 13.41 12z" />
                </svg>
            </button>
        </div>

        <!-- Message area -->
        <div class="p-4">
            <div class="rounded-xl p-3 mb-3 text-sm font-body text-white/80" style="background:rgba(255,255,255,0.08)">
                Hi! Welcome to Nezer Motors. How can we help you today?
            </div>
            <textarea x-model="message" placeholder="Type your message..." rows="3"
                class="w-full rounded-xl px-3 py-2 text-sm font-body text-white placeholder-white/30 resize-none focus:outline-none focus:ring-1 focus:ring-green-500 mb-3"
                style="background:rgba(255,255,255,0.08);border:1px solid rgba(255,255,255,0.15)"></textarea>
            <button @click="sendWhatsApp()"
                class="w-full flex items-center justify-center gap-2 py-2.5 rounded-xl font-sub font-700 text-sm text-white transition-all hover:opacity-90"
                style="background:linear-gradient(135deg,#25d366,#128c7e)">
                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M2.01 21L23 12 2.01 3 2 10l15 2-15 2z" />
                </svg>
                Send on WhatsApp
            </button>
        </div>
    </div>

    <!-- FAB Button -->
    <button @click="open = !open"
        class="w-14 h-14 rounded-full flex items-center justify-center shadow-xl transition-all hover:scale-110 active:scale-95 relative"
        style="background:linear-gradient(135deg,#25d366,#128c7e)">
        <!-- Pulse ring -->
        <span class="absolute inset-0 rounded-full animate-ping opacity-20" style="background:#25d366"></span>
        <svg x-show="!open" class="w-7 h-7 text-white" fill="currentColor" viewBox="0 0 24 24">
            <path
                d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z" />
        </svg>
        <svg x-show="open" x-cloak class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 24 24">
            <path
                d="M19 6.41L17.59 5 12 10.59 6.41 5 5 6.41 10.59 12 5 17.59 6.41 19 12 13.41 17.59 19 19 17.59 13.41 12z" />
        </svg>
    </button>
</div>