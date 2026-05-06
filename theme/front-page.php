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
 * @package Wilson_Devops
 */

// Exit if accessed directly
defined( 'ABSPATH' ) || exit;

get_header();

?>

<main>

    <!-- ============================================================
     HERO SECTION
    ============================================================ -->
    <section x-data="heroSection()" class="relative min-h-screen flex items-center overflow-hidden"
        style="min-height: 100dvh;">
        <!-- Background layers -->
        <!-- Dark overlay base -->
        <div class="absolute inset-0 bg-dark-900 z-0"></div>

        <!-- Animated gradient mesh -->
        <div class="absolute inset-0 z-0 transition-all duration-1000"
            :style="activeBrand === 'autocare' ? 'background: radial-gradient(ellipse at 20% 50%, rgba(30,64,175,0.45) 0%, transparent 60%), radial-gradient(ellipse at 80% 20%, rgba(220,38,38,0.2) 0%, transparent 50%), radial-gradient(ellipse at 60% 80%, rgba(212,160,23,0.12) 0%, transparent 50%)' : 'background: radial-gradient(ellipse at 20% 50%, rgba(220,38,38,0.45) 0%, transparent 60%), radial-gradient(ellipse at 80% 20%, rgba(234,179,8,0.25) 0%, transparent 50%), radial-gradient(ellipse at 60% 80%, rgba(212,160,23,0.12) 0%, transparent 50%)'">
        </div>

        <!-- Grid pattern overlay -->
        <div class="absolute inset-0 z-0 opacity-40"
            style="background-image: url('data:image/svg+xml,%3Csvg%20width%3D%2260%22%20height%3D%2260%22%20viewBox%3D%220%200%2060%2060%22%20xmlns%3D%22http://www.w3.org/2000/svg%22%3E%3Cg%20fill%3D%22none%22%20fill-rule%3D%22evenodd%22%3E%3Cg%20fill%3D%22%23ffffff%22%20fill-opacity%3D%220.03%22%3E%3Cpath%20d%3D%22M36%2034v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6%2034v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6%204V0H4v4H0v2h4v4h2V6h4V4H6z%22/%3E%3C/g%3E%3C/g%3E%3C/svg%3E');">
        </div>

        <!-- Large decorative car silhouette -->
        <div class="absolute right-0 bottom-0 w-full h-full z-0 overflow-hidden pointer-events-none select-none">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/car_upscaled.png" alt="Car"
                class="opacity-10 blur-[3.5px] w-full h-full" onerror="this.style.display='none'">
        </div>

        <!-- Content -->
        <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 w-full pt-24 pb-12">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-10 lg:gap-16 items-center">

                <!-- Left: Dynamic headline content -->
                <div class="text-white">
                    <!-- Parent brand badge -->
                    <div
                        class="inline-flex items-center gap-2 px-3 py-1.5 rounded-full text-xs font-sub font-600 tracking-widest uppercase mb-6 glass border border-white/20">
                        <span class="w-1.5 h-1.5 rounded-full animate-pulse-slow"
                            :class="activeBrand === 'autocare' ? 'bg-blue-400' : 'bg-red-400'"></span>
                        Nezer Motors Group
                    </div>

                    <!-- Dynamic headline -->
                    <div x-show="activeBrand === 'autocare'" x-transition:enter="transition ease-out duration-500"
                        x-transition:enter-start="opacity-0 translate-y-4"
                        x-transition:enter-end="opacity-100 translate-y-0">
                        <h1 class="font-heading text-5xl sm:text-6xl lg:text-7xl font-700 leading-tight mb-4">
                            Nyeri's Premier<br>
                            <span class="text-blue-gradient">Auto Care</span><br>
                            Specialists
                        </h1>
                        <p class="font-body text-base sm:text-lg text-white/70 mb-8 max-w-md leading-relaxed">
                            AutoCare Express delivers expert vehicle servicing, engine care, brake inspection, and full
                            vehicle health checks at our King'Ong'o branch. Trusted by Nyeri drivers.
                        </p>
                        <div class="flex flex-wrap gap-3">
                            <a href="autocare.html"
                                class="flex items-center gap-2 px-6 py-3 rounded-xl font-sub font-700 text-sm transition-all duration-200 hover:scale-105 hover:shadow-lg hover:shadow-blue-500/30"
                                style="background: linear-gradient(135deg, #1e40af, #2563eb);">
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                                    <path
                                        d="M19 3h-4.18C14.4 1.84 13.3 1 12 1c-1.3 0-2.4.84-2.82 2H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm-7 0c.55 0 1 .45 1 1s-.45 1-1 1-1-.45-1-1 .45-1 1-1zm2 14H7v-2h7v2zm3-4H7v-2h10v2zm0-4H7V7h10v2z" />
                                </svg>
                                Book a Service
                            </a>
                            <a href="autocare.html#services"
                                class="flex items-center gap-2 px-6 py-3 rounded-xl font-sub font-700 text-sm transition-all duration-200 hover:bg-white/15 glass border border-white/25">
                                View Services
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M8.59 16.59L13.17 12 8.59 7.41 10 6l6 6-6 6z" />
                                </svg>
                            </a>
                        </div>
                    </div>

                    <div x-show="activeBrand === 'quikfix'" x-transition:enter="transition ease-out duration-500"
                        x-transition:enter-start="opacity-0 translate-y-4"
                        x-transition:enter-end="opacity-100 translate-y-0" x-cloak>
                        <h1 class="font-heading text-5xl sm:text-6xl lg:text-7xl font-700 leading-tight mb-4">
                            Alignment.<br>
                            <span class="text-red-gradient">Tyres.</span><br>
                            Done Right.
                        </h1>
                        <p class="font-body text-base sm:text-lg text-white/70 mb-8 max-w-md leading-relaxed">
                            QuikFix at Shell King'ong'o offers precision wheel alignment, tyre fitting, balancing, oil
                            changes, and full car servicing at the Nyeri-Nyahururu Junction.
                        </p>
                        <div class="flex flex-wrap gap-3">
                            <a href="tel:+254710104644"
                                class="flex items-center gap-2 px-6 py-3 rounded-xl font-sub font-700 text-sm transition-all duration-200 hover:scale-105 hover:shadow-lg hover:shadow-red-500/30"
                                style="background: linear-gradient(135deg, #dc2626, #ef4444);">
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                                    <path
                                        d="M6.62 10.79c1.44 2.83 3.76 5.14 6.59 6.59l2.2-2.2c.27-.27.67-.36 1.02-.24 1.12.37 2.33.57 3.57.57.55 0 1 .45 1 1V20c0 .55-.45 1-1 1-9.39 0-17-7.61-17-17 0-.55.45-1 1-1h3.5c.55 0 1 .45 1 1 0 1.25.2 2.45.57 3.57.11.35.03.74-.25 1.02l-2.2 2.2z" />
                                </svg>
                                Call QuikFix
                            </a>
                            <a href="quikfix.html#services"
                                class="flex items-center gap-2 px-6 py-3 rounded-xl font-sub font-700 text-sm transition-all duration-200 hover:bg-white/15 glass border border-white/25">
                                View Services
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M8.59 16.59L13.17 12 8.59 7.41 10 6l6 6-6 6z" />
                                </svg>
                            </a>
                        </div>
                    </div>

                    <!-- Static info chips below CTA -->
                    <div class="flex flex-wrap gap-2 mt-8">
                        <div
                            class="flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-sub font-600 glass border border-white/15 text-white/70">
                            <svg class="w-3 h-3 text-gold-400" fill="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z" />
                            </svg>
                            2 Locations in Nyeri
                        </div>
                        <div
                            class="flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-sub font-600 glass border border-white/15 text-white/70">
                            <svg class="w-3 h-3 text-gold-400" fill="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M11.99 2C6.47 2 2 6.48 2 12s4.47 10 9.99 10C17.52 22 22 17.52 22 12S17.52 2 11.99 2zM12 20c-4.42 0-8-3.58-8-8s3.58-8 8-8 8 3.58 8 8-3.58 8-8 8zm.5-13H11v6l5.25 3.15.75-1.23-4.5-2.67z" />
                            </svg>
                            Mon – Sat, 8AM – 5PM
                        </div>
                        <div
                            class="flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-sub font-600 glass border border-white/15 text-white/70">
                            <svg class="w-3 h-3 text-gold-400" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41z" />
                            </svg>
                            Certified Technicians
                        </div>
                    </div>
                </div>

                <!-- Right: Tab card -->
                <div class="w-full max-w-md mx-auto lg:mx-0 lg:ml-auto">
                    <div class="rounded-2xl overflow-hidden shadow-2xl glass-dark border border-white/15">
                        <!-- Tab headers -->
                        <div class="flex">
                            <button @click="activeBrand = 'autocare'"
                                :class="activeBrand === 'autocare' ? 'bg-gradient-to-r from-blue-800 to-blue-600 text-white' : 'text-white/50 hover:text-white/80'"
                                class="flex-1 flex items-center justify-center gap-2 py-4 px-4 font-sub font-700 text-sm transition-all duration-300">
                                <img src="assets/images/autocare-logo.png" alt="AutoCare Express"
                                    class="h-6 w-auto object-contain" onerror="this.style.display='none'">
                                <span>AutoCare</span>
                            </button>
                            <button @click="activeBrand = 'quikfix'"
                                :class="activeBrand === 'quikfix' ? 'bg-gradient-to-r from-red-700 to-red-500 text-white' : 'text-white/50 hover:text-white/80'"
                                class="flex-1 flex items-center justify-center gap-2 py-4 px-4 font-sub font-700 text-sm transition-all duration-300">
                                <img src="assets/images/quikfix-logo.png" alt="QuikFix"
                                    class="h-6 w-auto object-contain brightness-200"
                                    onerror="this.style.display='none'">
                                <span>QuikFix</span>
                            </button>
                        </div>

                        <!-- Tab content -->
                        <div class="p-6">

                            <!-- AutoCare Tab Content -->
                            <div x-show="activeBrand === 'autocare'"
                                x-transition:enter="transition ease-out duration-400"
                                x-transition:enter-start="opacity-0 translate-x-4"
                                x-transition:enter-end="opacity-100 translate-x-0">
                                <!-- Location badge -->
                                <div class="flex items-center gap-2 mb-4">
                                    <div class="w-8 h-8 rounded-lg flex items-center justify-center"
                                        style="background:rgba(30,64,175,0.3)">
                                        <svg class="w-4 h-4 text-blue-400" fill="currentColor" viewBox="0 0 24 24">
                                            <path
                                                d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z" />
                                        </svg>
                                    </div>
                                    <div>
                                        <p class="font-sub font-700 text-white text-sm">AutoCare Express</p>
                                        <p class="text-white/50 text-xs font-body">Nyeri — Opp King'ong'o Prison</p>
                                    </div>
                                </div>

                                <!-- Services list -->
                                <div class="space-y-2 mb-5">
                                    <p class="font-sub font-600 text-white/40 text-xs uppercase tracking-wider mb-3">
                                        Core Services</p>
                                    <div class="grid grid-cols-2 gap-2">
                                        <template x-for="s in autocareServices">
                                            <div class="flex items-center gap-2 text-white/80 text-sm font-body">
                                                <svg class="w-3.5 h-3.5 text-blue-400 flex-shrink-0" fill="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path d="M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41z" />
                                                </svg>
                                                <span x-text="s"></span>
                                            </div>
                                        </template>
                                    </div>
                                </div>

                                <!-- Info row -->
                                <div class="grid grid-cols-2 gap-3 mb-5">
                                    <div class="rounded-xl p-3" style="background:rgba(30,64,175,0.2)">
                                        <p class="text-white/40 text-xs font-sub mb-1">Phone</p>
                                        <a href="tel:+254733204672"
                                            class="text-white font-sub font-700 text-sm hover:text-blue-300 transition-colors">0733
                                            204 672</a>
                                    </div>
                                    <div class="rounded-xl p-3" style="background:rgba(30,64,175,0.2)">
                                        <p class="text-white/40 text-xs font-sub mb-1">Hours</p>
                                        <p class="text-white font-sub font-700 text-sm">Mon–Sat 8–5</p>
                                    </div>
                                </div>

                                <!-- CTA -->
                                <a href="autocare.html"
                                    class="flex items-center justify-center gap-2 w-full py-3 rounded-xl font-sub font-700 text-sm transition-all hover:opacity-90"
                                    style="background:linear-gradient(135deg,#1e40af,#2563eb)">
                                    Explore AutoCare Express
                                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M8.59 16.59L13.17 12 8.59 7.41 10 6l6 6-6 6z" />
                                    </svg>
                                </a>
                            </div>

                            <!-- QuikFix Tab Content -->
                            <div x-show="activeBrand === 'quikfix'"
                                x-transition:enter="transition ease-out duration-400"
                                x-transition:enter-start="opacity-0 translate-x-4"
                                x-transition:enter-end="opacity-100 translate-x-0" x-cloak>
                                <!-- Location badge -->
                                <div class="flex items-center gap-2 mb-4">
                                    <div class="w-8 h-8 rounded-lg flex items-center justify-center"
                                        style="background:rgba(220,38,38,0.3)">
                                        <svg class="w-4 h-4 text-red-400" fill="currentColor" viewBox="0 0 24 24">
                                            <path
                                                d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z" />
                                        </svg>
                                    </div>
                                    <div>
                                        <p class="font-sub font-700 text-white text-sm">QuikFix</p>
                                        <p class="text-white/50 text-xs font-body">Shell Station, Kingongo — Nyahururu
                                            Junction</p>
                                    </div>
                                </div>

                                <!-- Services list -->
                                <div class="space-y-2 mb-5">
                                    <p class="font-sub font-600 text-white/40 text-xs uppercase tracking-wider mb-3">
                                        Core Services</p>
                                    <div class="grid grid-cols-2 gap-2">
                                        <template x-for="s in quikfixServices">
                                            <div class="flex items-center gap-2 text-white/80 text-sm font-body">
                                                <svg class="w-3.5 h-3.5 text-red-400 flex-shrink-0" fill="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path d="M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41z" />
                                                </svg>
                                                <span x-text="s"></span>
                                            </div>
                                        </template>
                                    </div>
                                </div>

                                <!-- Info row -->
                                <div class="grid grid-cols-2 gap-3 mb-5">
                                    <div class="rounded-xl p-3" style="background:rgba(220,38,38,0.2)">
                                        <p class="text-white/40 text-xs font-sub mb-1">
                                            <?php esc_html_e( 'Phone', 'nezer-motors' ); ?></p>
                                        <a href="tel:+254710104644"
                                            class="text-white font-sub font-700 text-sm hover:text-red-300 transition-colors">0710
                                            104 644</a>
                                    </div>
                                    <div class="rounded-xl p-3" style="background:rgba(220,38,38,0.2)">
                                        <p class="text-white/40 text-xs font-sub mb-1">Hours</p>
                                        <p class="text-white font-sub font-700 text-sm">Mon–Sat 8–5</p>
                                    </div>
                                </div>

                                <!-- Voucher promo badge -->
                                <div class="flex items-center gap-2 p-3 rounded-xl mb-4"
                                    style="background:linear-gradient(135deg,rgba(234,179,8,0.15),rgba(220,38,38,0.15)); border:1px solid rgba(234,179,8,0.3)">
                                    <svg class="w-5 h-5 text-yellow-400 flex-shrink-0" fill="currentColor"
                                        viewBox="0 0 24 24">
                                        <path
                                            d="M20 12c0-1.1.9-2 2-2V6c0-1.1-.9-2-2-2H4c-1.1 0-1.99.9-1.99 2v4c1.1 0 1.99.9 1.99 2s-.89 2-2 2v4c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2v-4c-1.1 0-2-.9-2-2z" />
                                    </svg>
                                    <p class="text-yellow-300 text-xs font-sub font-600">Free gift voucher with every
                                        oil change</p>
                                </div>

                                <!-- CTA -->
                                <a href="quikfix.html"
                                    class="flex items-center justify-center gap-2 w-full py-3 rounded-xl font-sub font-700 text-sm transition-all hover:opacity-90"
                                    style="background:linear-gradient(135deg,#dc2626,#ef4444)">
                                    Explore QuikFix
                                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M8.59 16.59L13.17 12 8.59 7.41 10 6l6 6-6 6z" />
                                    </svg>
                                </a>
                            </div>

                        </div>
                    </div>
                </div>

            </div>
        </div>

        <!-- Scroll indicator -->
        <div class="absolute bottom-8 left-1/2 -translate-x-1/2 flex flex-col items-center gap-2 text-white/40 z-10">
            <span class="font-sub text-xs tracking-widest uppercase">Scroll</span>
            <div class="w-px h-12 bg-gradient-to-b from-white/40 to-transparent animate-pulse"></div>
        </div>
    </section>

    <!-- ============================================================
     STATS BAR
    ============================================================ -->
    <section class="relative py-10 border-y"
        :class="darkMode ? 'border-white/10 bg-dark-800' : 'border-gray-200 bg-white'">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
                <template x-for="stat in stats" :key="stat.label">
                    <div class="text-center">
                        <p class="font-heading text-4xl sm:text-5xl font-700 text-gold-500 stat-number"
                            x-text="stat.value"></p>
                        <p class="font-sub text-sm font-600 mt-1 uppercase tracking-widest"
                            :class="darkMode ? 'text-white/50' : 'text-gray-500'" x-text="stat.label"></p>
                    </div>
                </template>
            </div>
        </div>
    </section>

    <!-- ============================================================
     SERVICES OVERVIEW
    ============================================================ -->
    <section class="py-24 relative overflow-hidden" :class="darkMode ? 'bg-dark-900' : 'bg-slate-50'">
        <!-- Decorative bg blob -->
        <div class="absolute top-0 right-0 w-96 h-96 rounded-full blur-3xl opacity-10 pointer-events-none"
            :class="darkMode ? 'bg-blue-600' : 'bg-blue-200'"></div>
        <div class="absolute bottom-0 left-0 w-80 h-80 rounded-full blur-3xl opacity-10 pointer-events-none"
            :class="darkMode ? 'bg-red-600' : 'bg-red-200'"></div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <!-- Heading -->
            <div class="text-center mb-16">
                <div class="inline-flex items-center gap-2 px-3 py-1.5 rounded-full text-xs font-sub font-600 tracking-widest uppercase mb-4"
                    :class="darkMode ? 'bg-gold-500/15 text-gold-400 border border-gold-500/30' : 'bg-gold-500/10 text-gold-600 border border-gold-500/20'">
                    What We Offer
                </div>
                <h2 class="font-heading text-4xl sm:text-5xl font-700"
                    :class="darkMode ? 'text-white' : 'text-gray-900'">
                    Full-Spectrum Vehicle Care
                </h2>
                <p class="font-body mt-4 max-w-xl mx-auto" :class="darkMode ? 'text-white/60' : 'text-gray-500'">
                    From engine diagnostics to wheel alignment, both our branches cover every aspect of your vehicle's
                    health.
                </p>
            </div>

            <!-- Services grid -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5">
                <template x-for="svc in services" :key="svc.title">
                    <div class="service-card group rounded-2xl p-6 cursor-default transition-all duration-300"
                        :class="darkMode ? 'glass border border-white/10 hover:border-white/20' : 'bg-white border border-gray-100 shadow-sm hover:shadow-md hover:border-gray-200'">
                        <!-- Icon -->
                        <div class="w-12 h-12 rounded-xl flex items-center justify-center mb-4 transition-transform duration-300 group-hover:scale-110"
                            :style="`background: linear-gradient(135deg, ${svc.color1}, ${svc.color2})`">
                            <span class="text-2xl" x-text="svc.icon"></span>
                        </div>
                        <p class="font-heading text-xl font-700 mb-2" :class="darkMode ? 'text-white' : 'text-gray-900'"
                            x-text="svc.title"></p>
                        <p class="font-body text-sm leading-relaxed"
                            :class="darkMode ? 'text-white/55' : 'text-gray-500'" x-text="svc.desc"></p>
                        <!-- Branch badge -->
                        <div class="mt-4 flex flex-wrap gap-1">
                            <template x-for="branch in svc.branches">
                                <span class="px-2 py-0.5 rounded-full text-xs font-sub font-600"
                                    :class="branch === 'AutoCare' ? 'bg-blue-500/15 text-blue-400' : 'bg-red-500/15 text-red-400'"
                                    x-text="branch">
                                </span>
                            </template>
                        </div>
                    </div>
                </template>
            </div>
        </div>
    </section>

    <!-- ============================================================
     OUR BRANDS
    ============================================================ -->
    <section class="py-24" :class="darkMode ? 'bg-dark-800' : 'bg-white'">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <div class="inline-flex items-center gap-2 px-3 py-1.5 rounded-full text-xs font-sub font-600 tracking-widest uppercase mb-4"
                    :class="darkMode ? 'bg-gold-500/15 text-gold-400 border border-gold-500/30' : 'bg-gold-500/10 text-gold-600 border border-gold-500/20'">
                    The Nezer Motors Family
                </div>
                <h2 class="font-heading text-4xl sm:text-5xl font-700"
                    :class="darkMode ? 'text-white' : 'text-gray-900'">Two Locations. One Standard.</h2>
                <p class="font-body mt-4 max-w-xl mx-auto" :class="darkMode ? 'text-white/60' : 'text-gray-500'">Each
                    branch operates independently with its own team and specialties, unified by Nezer Motors' commitment
                    to quality.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                <!-- AutoCare Card -->
                <div class="relative rounded-3xl overflow-hidden group"
                    style="background:linear-gradient(135deg,#0f1f5c 0%,#1e3a8a 50%,#1e40af 100%)">
                    <!-- Decorative circles -->
                    <div class="absolute -top-20 -right-20 w-64 h-64 rounded-full opacity-10"
                        style="background:radial-gradient(circle,#60a5fa,transparent)"></div>
                    <div class="absolute -bottom-16 -left-16 w-48 h-48 rounded-full opacity-15"
                        style="background:radial-gradient(circle,#dc2626,transparent)"></div>

                    <div class="relative z-10 p-8 sm:p-10">
                        <!-- Logo -->
                        <div class="mb-6">
                            <img src="assets/images/autocare-logo.png" alt="AutoCare Express Logo"
                                class="h-16 w-auto object-contain" onerror="this.style.display='none'">
                        </div>
                        <h3 class="font-heading text-3xl font-700 text-white mb-3">AutoCare Express</h3>
                        <p class="font-body text-white/70 mb-6 text-sm leading-relaxed">Full mechanical servicing,
                            engine diagnostics, brake and suspension care, lubrication, and vehicle health reports. Our
                            flagship branch at King'Ong'o serves Nyeri's drivers with expert care.</p>

                        <div class="space-y-2 mb-8">
                            <div class="flex items-center gap-3 text-white/80 text-sm font-body">
                                <svg class="w-4 h-4 text-blue-300 flex-shrink-0" fill="currentColor"
                                    viewBox="0 0 24 24">
                                    <path
                                        d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z" />
                                </svg>
                                Nyeri — Opp King'Ong'o Prison
                            </div>
                            <div class="flex items-center gap-3 text-white/80 text-sm font-body">
                                <svg class="w-4 h-4 text-blue-300 flex-shrink-0" fill="currentColor"
                                    viewBox="0 0 24 24">
                                    <path
                                        d="M6.62 10.79c1.44 2.83 3.76 5.14 6.59 6.59l2.2-2.2c.27-.27.67-.36 1.02-.24 1.12.37 2.33.57 3.57.57.55 0 1 .45 1 1V20c0 .55-.45 1-1 1-9.39 0-17-7.61-17-17 0-.55.45-1 1-1h3.5c.55 0 1 .45 1 1 0 1.25.2 2.45.57 3.57.11.35.03.74-.25 1.02l-2.2 2.2z" />
                                </svg>
                                0733 204 672
                            </div>
                            <div class="flex items-center gap-3 text-white/80 text-sm font-body">
                                <svg class="w-4 h-4 text-blue-300 flex-shrink-0" fill="currentColor"
                                    viewBox="0 0 24 24">
                                    <path
                                        d="M11.99 2C6.47 2 2 6.48 2 12s4.47 10 9.99 10C17.52 22 22 17.52 22 12S17.52 2 11.99 2zM12 20c-4.42 0-8-3.58-8-8s3.58-8 8-8 8 3.58 8 8-3.58 8-8 8zm.5-13H11v6l5.25 3.15.75-1.23-4.5-2.67z" />
                                </svg>
                                Mon – Sat, 8AM – 5PM
                            </div>
                        </div>

                        <a href="autocare.html"
                            class="inline-flex items-center gap-2 px-6 py-3 rounded-xl font-sub font-700 text-sm bg-white text-blue-800 transition-all hover:bg-blue-50 hover:scale-105">
                            Visit AutoCare Express
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M8.59 16.59L13.17 12 8.59 7.41 10 6l6 6-6 6z" />
                            </svg>
                        </a>
                    </div>
                </div>

                <!-- QuikFix Card -->
                <div class="relative rounded-3xl overflow-hidden group"
                    style="background:linear-gradient(135deg,#450a0a 0%,#7f1d1d 50%,#991b1b 100%)">
                    <!-- Decorative circles -->
                    <div class="absolute -top-20 -right-20 w-64 h-64 rounded-full opacity-10"
                        style="background:radial-gradient(circle,#fbbf24,transparent)"></div>
                    <div class="absolute -bottom-16 -left-16 w-48 h-48 rounded-full opacity-15"
                        style="background:radial-gradient(circle,#eab308,transparent)"></div>

                    <div class="relative z-10 p-8 sm:p-10">
                        <!-- Logo -->
                        <div class="mb-6">
                            <img src="assets/images/quikfix-logo.png" alt="QuikFix Logo"
                                class="h-16 w-auto object-contain brightness-200" onerror="this.style.display='none'">
                        </div>
                        <h3 class="font-heading text-3xl font-700 text-white mb-3">QuikFix</h3>
                        <p class="font-body text-white/70 mb-6 text-sm leading-relaxed">Precision wheel alignment, tyre
                            supply and fitting, wheel balancing, oil changes, and full car servicing. Located at Shell
                            Kingongo on the Nyeri-Nyahururu Junction for easy access.</p>

                        <div class="space-y-2 mb-8">
                            <div class="flex items-center gap-3 text-white/80 text-sm font-body">
                                <svg class="w-4 h-4 text-yellow-400 flex-shrink-0" fill="currentColor"
                                    viewBox="0 0 24 24">
                                    <path
                                        d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z" />
                                </svg>
                                Shell Station, Kingongo — Nyahururu Jct
                            </div>
                            <div class="flex items-center gap-3 text-white/80 text-sm font-body">
                                <svg class="w-4 h-4 text-yellow-400 flex-shrink-0" fill="currentColor"
                                    viewBox="0 0 24 24">
                                    <path
                                        d="M6.62 10.79c1.44 2.83 3.76 5.14 6.59 6.59l2.2-2.2c.27-.27.67-.36 1.02-.24 1.12.37 2.33.57 3.57.57.55 0 1 .45 1 1V20c0 .55-.45 1-1 1-9.39 0-17-7.61-17-17 0-.55.45-1 1-1h3.5c.55 0 1 .45 1 1 0 1.25.2 2.45.57 3.57.11.35.03.74-.25 1.02l-2.2 2.2z" />
                                </svg>
                                0710 104 644
                            </div>
                            <div class="flex items-center gap-3 text-white/80 text-sm font-body">
                                <svg class="w-4 h-4 text-yellow-400 flex-shrink-0" fill="currentColor"
                                    viewBox="0 0 24 24">
                                    <path
                                        d="M11.99 2C6.47 2 2 6.48 2 12s4.47 10 9.99 10C17.52 22 22 17.52 22 12S17.52 2 11.99 2zM12 20c-4.42 0-8-3.58-8-8s3.58-8 8-8 8 3.58 8 8-3.58 8-8 8zm.5-13H11v6l5.25 3.15.75-1.23-4.5-2.67z" />
                                </svg>
                                Mon – Sat, 8AM – 5PM
                            </div>
                        </div>

                        <!-- Voucher badge -->
                        <div class="flex items-center gap-2 px-4 py-2 rounded-xl mb-6 inline-flex w-fit"
                            style="background:rgba(234,179,8,0.2);border:1px solid rgba(234,179,8,0.4)">
                            <svg class="w-4 h-4 text-yellow-400" fill="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M20 12c0-1.1.9-2 2-2V6c0-1.1-.9-2-2-2H4c-1.1 0-1.99.9-1.99 2v4c1.1 0 1.99.9 1.99 2s-.89 2-2 2v4c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2v-4c-1.1 0-2-.9-2-2z" />
                            </svg>
                            <span class="text-yellow-300 text-xs font-sub font-700">Free voucher with every oil
                                change</span>
                        </div>

                        <a href="quikfix.html"
                            class="inline-flex items-center gap-2 px-6 py-3 rounded-xl font-sub font-700 text-sm bg-white text-red-800 transition-all hover:bg-red-50 hover:scale-105">
                            Visit QuikFix
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M8.59 16.59L13.17 12 8.59 7.41 10 6l6 6-6 6z" />
                            </svg>
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- ============================================================
     PARTNERS STRIP
    ============================================================ -->
    <section class="py-16 border-y overflow-hidden"
        :class="darkMode ? 'border-white/10 bg-dark-900' : 'border-gray-100 bg-slate-50'">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mb-10 text-center">
            <p class="font-sub font-600 text-sm uppercase tracking-widest"
                :class="darkMode ? 'text-white/40' : 'text-gray-400'">Brands & Partners We Work With</p>
        </div>
        <div class="relative overflow-hidden">
            <!-- Fade edges -->
            <div class="absolute left-0 top-0 bottom-0 w-20 z-10 pointer-events-none"
                :style="darkMode ? 'background:linear-gradient(to right,#09090b,transparent)' : 'background:linear-gradient(to right,#f8fafc,transparent)'">
            </div>
            <div class="absolute right-0 top-0 bottom-0 w-20 z-10 pointer-events-none"
                :style="darkMode ? 'background:linear-gradient(to left,#09090b,transparent)' : 'background:linear-gradient(to left,#f8fafc,transparent)'">
            </div>

            <div class="marquee-track">
                <template x-for="(partner, i) in [...partners, ...partners]" :key="i">
                    <div class="flex-shrink-0 mx-6 flex items-center gap-2 px-5 py-3 rounded-full font-sub font-700 text-sm transition-all"
                        :class="darkMode ? 'bg-white/08 text-white/60 border border-white/10 hover:border-white/20 hover:text-white' : 'bg-white text-gray-500 border border-gray-200 hover:border-gray-300 hover:text-gray-800'">
                        <span x-text="partner.icon" class="text-base"></span>
                        <span x-text="partner.name"></span>
                    </div>
                </template>
            </div>
        </div>
    </section>

    <!-- ============================================================
     CTA BANNER
    ============================================================ -->
    <section class="py-20 relative overflow-hidden"
        style="background:linear-gradient(135deg,#0f172a 0%,#1e3a8a 40%,#991b1b 100%)">
        <!-- Grid pattern -->
        <div class="absolute inset-0 opacity-80"
            style="background-image: url('data:image/svg+xml,%3Csvg%20width%3D%2260%22%20height%3D%2260%22%20viewBox%3D%220%200%2060%2060%22%20xmlns%3D%22http://www.w3.org/2000/svg%22%3E%3Cg%20fill%3D%22none%22%20fill-rule%3D%22evenodd%22%3E%3Cg%20fill%3D%22%23ffffff%22%20fill-opacity%3D%220.05%22%3E%3Cpath%20d%3D%22M36%2034v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6%2034v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6%204V0H4v4H0v2h4v4h2V6h4V4H6z%22/%3E%3C/g%3E%3C/g%3E%3C/svg%3E');">
        </div>
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center relative z-10">
            <div class="w-16 h-16 rounded-2xl mx-auto mb-6 flex items-center justify-center"
                style="background:linear-gradient(135deg,#d4a017,#f0c040)">
                <svg class="w-8 h-8 text-black" fill="currentColor" viewBox="0 0 24 24">
                    <path
                        d="M18.92 6.01C18.72 5.42 18.16 5 17.5 5h-11c-.66 0-1.21.42-1.42 1.01L3 12v8c0 .55.45 1 1 1h1c.55 0 1-.45 1-1v-1h12v1c0 .55.45 1 1 1h1c.55 0 1-.45 1-1v-8l-2.08-5.99z" />
                </svg>
            </div>
            <h2 class="font-heading text-4xl sm:text-5xl font-700 text-white mb-4">Ready to Service Your Vehicle?</h2>
            <p class="font-body text-white/70 mb-8 max-w-xl mx-auto">Visit either of our two branches in Nyeri. Bring
                your vehicle in or call ahead to schedule your service appointment.</p>
            <div class="flex flex-wrap items-center justify-center gap-4">
                <a href="contact.html"
                    class="flex items-center gap-2 px-8 py-4 rounded-xl font-sub font-700 text-sm transition-all hover:scale-105 hover:shadow-xl"
                    style="background:linear-gradient(135deg,#d4a017,#f0c040);color:#000">
                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                        <path
                            d="M20 4H4c-1.1 0-1.99.9-1.99 2L2 18c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5-8-5V6l8 5 8-5v2z" />
                    </svg>
                    Contact Us
                </a>
                <a href="tel:+254733204672"
                    class="flex items-center gap-2 px-8 py-4 rounded-xl font-sub font-700 text-sm text-white glass border border-white/30 transition-all hover:bg-white/15">
                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                        <path
                            d="M6.62 10.79c1.44 2.83 3.76 5.14 6.59 6.59l2.2-2.2c.27-.27.67-.36 1.02-.24 1.12.37 2.33.57 3.57.57.55 0 1 .45 1 1V20c0 .55-.45 1-1 1-9.39 0-17-7.61-17-17 0-.55.45-1 1-1h3.5c.55 0 1 .45 1 1 0 1.25.2 2.45.57 3.57.11.35.03.74-.25 1.02l-2.2 2.2z" />
                    </svg>
                    Call AutoCare
                </a>
                <a href="tel:+254710104644"
                    class="flex items-center gap-2 px-8 py-4 rounded-xl font-sub font-700 text-sm text-white glass border border-white/30 transition-all hover:bg-white/15">
                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                        <path
                            d="M6.62 10.79c1.44 2.83 3.76 5.14 6.59 6.59l2.2-2.2c.27-.27.67-.36 1.02-.24 1.12.37 2.33.57 3.57.57.55 0 1 .45 1 1V20c0 .55-.45 1-1 1-9.39 0-17-7.61-17-17 0-.55.45-1 1-1h3.5c.55 0 1 .45 1 1 0 1.25.2 2.45.57 3.57.11.35.03.74-.25 1.02l-2.2 2.2z" />
                    </svg>
                    Call QuikFix
                </a>
            </div>
        </div>
    </section>
</main>
<?php get_footer();