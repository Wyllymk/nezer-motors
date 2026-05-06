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

<!-- Modern Creative Footer -->
<footer
    class="relative overflow-hidden bg-gradient-to-br from-gray-50 via-gray-100 to-gray-200 dark:from-gray-900 dark:via-gray-950 dark:to-black">

    <!-- Animated Background Pattern -->
    <div class="absolute inset-0 opacity-30">
        <div class="absolute top-0 left-0 w-full h-full">
            <!-- Floating geometric shapes -->
            <div
                class="absolute top-10 left-10 w-20 h-20 bg-gradient-to-r from-teal-400/20 to-cyan-400/20 rounded-full animate-pulse">
            </div>
            <div class="absolute top-32 right-20 w-16 h-16 bg-gradient-to-r from-blue-400/20 to-purple-400/20 rounded-lg rotate-45 animate-bounce"
                style="animation-duration: 3s;"></div>
            <div class="absolute bottom-20 left-1/4 w-12 h-12 bg-gradient-to-r from-pink-400/20 to-red-400/20 rounded-full animate-pulse"
                style="animation-delay: 1s;"></div>
            <div class="absolute bottom-40 right-1/3 w-24 h-24 bg-gradient-to-r from-green-400/20 to-teal-400/20 rounded-xl rotate-12 animate-bounce"
                style="animation-duration: 4s; animation-delay: 0.5s;"></div>
        </div>

        <!-- Grid pattern overlay -->
        <div class="absolute inset-0"
            style="background-image: radial-gradient(circle at 1px 1px, rgba(56, 189, 248, 0.1) 1px, transparent 0); background-size: 50px 50px;">
        </div>
    </div>

    <div class="relative z-10">
        <!-- Main Footer Content -->
        <div class="container mx-auto px-6 pt-16 pb-8">

            <!-- Top Section: Logo & Tagline -->
            <div class="text-center mb-12">
                <div class="inline-flex items-center justify-center mb-6">
                    <div class="relative group">
                        <div
                            class="absolute inset-0 bg-gradient-to-r from-teal-500/30 to-cyan-500/30 rounded-2xl blur-lg group-hover:blur-xl transition-all duration-300">
                        </div>
                        <div
                            class="relative bg-white dark:bg-gray-800 rounded-2xl p-6 border border-gray-200/50 dark:border-gray-700/50 backdrop-blur-sm">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/logo.png"
                                alt="Wilson DevOps Logo"
                                class="h-12 filter invert-0 dark:invert transition-all duration-300 group-hover:scale-110">
                        </div>
                    </div>
                </div>

                <h3
                    class="text-2xl font-bold bg-gradient-to-r from-gray-800 to-gray-600 dark:from-white dark:to-gray-300 bg-clip-text text-transparent mb-3">
                    Wilson DevOps
                </h3>
                <p class="text-gray-600 dark:text-gray-400 max-w-md mx-auto leading-relaxed">
                    Building scalable solutions with modern technology.<br>
                    <span class="text-teal-500 dark:text-teal-400 font-medium">Code • Cloud • Innovation</span>
                </p>
            </div>

            <!-- Social Media Section -->
            <div class="mb-12">
                <h4 class="text-center text-lg font-semibold text-gray-700 dark:text-gray-300 mb-8">
                    Let's Connect
                </h4>

                <div class="flex justify-center items-center gap-4 flex-wrap">
                    <?php
                    $footer_social = [
                        [
                            'name'  => 'GitHub',
                            'url'   => 'https://github.com/Wyllymk',
                            'icon'  => '<path d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z"/>',
                            'bg' => 'from-gray-700 to-gray-900',
                            'hover' => 'hover:from-gray-800 hover:to-black',
                            'shadow' => 'hover:shadow-gray-500/30'
                        ],
                        [
                            'name'  => 'LinkedIn',
                            'url'   => 'https://www.linkedin.com/in/wilson-mbuthia-k/',
                            'icon'  => '<path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/>',
                            'bg' => 'from-blue-600 to-blue-800',
                            'hover' => 'hover:from-blue-700 hover:to-blue-900',
                            'shadow' => 'hover:shadow-blue-500/30'
                        ],
                        [
                            'name'  => 'Twitter',
                            'url'   => 'https://twitter.com/WilsonMbuthiaK',
                            'icon'  => '<path d="M8 2H1l8.26 11.014L1.45 22H4.1l6.388-7.349L16 22h7l-8.608-11.478L21.8 2h-2.65l-5.986 6.886L8 2Zm9 18L5 4h2l12 16h-2Z"/>',
                            'bg' => 'from-sky-500 to-sky-700',
                            'hover' => 'hover:from-sky-600 hover:to-sky-800',
                            'shadow' => 'hover:shadow-sky-500/30'
                        ],
                        [
                            'name'  => 'WhatsApp',
                            'url'   => 'https://wa.me/+254703639230',
                            'icon'  => '<path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893A11.821 11.821 0 0020.531 3.488"/>',
                            'bg' => 'from-green-500 to-green-700',
                            'hover' => 'hover:from-green-600 hover:to-green-800',
                            'shadow' => 'hover:shadow-green-500/30'
                        ],
                    ];

                    foreach ($footer_social as $social): ?>
                    <div class="relative group">
                        <!-- Glow effect background -->
                        <div
                            class="absolute inset-0 bg-gradient-to-r <?php echo $social['bg']; ?> rounded-2xl blur-lg opacity-0 group-hover:opacity-30 transition-all duration-500 scale-110">
                        </div>

                        <!-- Main button -->
                        <a href="<?php echo esc_url($social['url']); ?>" target="_blank" rel="noopener noreferrer"
                            aria-label="<?php echo esc_attr($social['name']); ?>" class="relative block p-4 bg-gradient-to-r <?php echo $social['bg']; ?> <?php echo $social['hover']; ?> 
                                  rounded-2xl shadow-lg <?php echo $social['shadow']; ?> 
                                  text-white transition-all duration-300 ease-out 
                                  transform hover:scale-110 hover:-translate-y-1 
                                  border border-white/10 backdrop-blur-sm
                                  group-hover:shadow-2xl">
                            <svg class="w-6 h-6 transition-transform duration-300 group-hover:rotate-12"
                                fill="currentColor" viewBox="0 0 24 24">
                                <?php echo $social['icon']; ?>
                            </svg>
                        </a>

                        <!-- Tooltip -->
                        <div class="absolute -top-12 left-1/2 transform -translate-x-1/2 
                                    bg-gray-800 dark:bg-gray-200 text-white dark:text-gray-800 
                                    px-3 py-1 rounded-lg text-sm font-medium
                                    opacity-0 group-hover:opacity-100 transition-all duration-300
                                    pointer-events-none">
                            <?php echo esc_html($social['name']); ?>
                            <div class="absolute top-full left-1/2 transform -translate-x-1/2 
                                        border-4 border-transparent border-t-gray-800 dark:border-t-gray-200"></div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>

            <!-- Skills/Tech Stack Section -->
            <div class="mb-12">
                <h4 class="text-center text-lg font-semibold text-gray-700 dark:text-gray-300 mb-8">
                    Tech Stack
                </h4>

                <div class="flex justify-center items-center gap-3 flex-wrap max-w-2xl mx-auto">
                    <?php
                    $tech_stack = [
                        ['name' => 'PHP', 'color' => 'from-purple-500 to-purple-700'],
                        ['name' => 'WordPress', 'color' => 'from-blue-600 to-blue-800'],
                        ['name' => 'JavaScript', 'color' => 'from-yellow-500 to-yellow-600'],
                        ['name' => 'AWS', 'color' => 'from-orange-500 to-orange-600'],
                        ['name' => 'React', 'color' => 'from-cyan-500 to-cyan-600'],
                        ['name' => 'Node.js', 'color' => 'from-green-600 to-green-700'],
                        ['name' => 'MySQL', 'color' => 'from-blue-700 to-blue-900'],
                    ];
                    
                    foreach ($tech_stack as $tech): ?>
                    <span class="inline-flex items-center px-4 py-2 rounded-full 
                                 bg-gradient-to-r <?php echo $tech['color']; ?> 
                                 text-white text-sm font-medium shadow-lg
                                 hover:scale-105 transition-transform duration-200
                                 border border-white/20 backdrop-blur-sm">
                        <?php echo esc_html($tech['name']); ?>
                    </span>
                    <?php endforeach; ?>
                </div>
            </div>

            <!-- Divider with animated line -->
            <div class="relative mb-8">
                <div class="absolute inset-0 flex items-center">
                    <div class="w-full border-t border-gray-300/50 dark:border-gray-700/50"></div>
                </div>
                <div class="relative flex justify-center">
                    <div class="bg-gradient-to-r from-teal-500 to-cyan-500 w-12 h-0.5 rounded-full animate-pulse"></div>
                </div>
            </div>

            <!-- Bottom Section -->
            <div class="text-center">
                <div class="inline-flex items-center justify-center space-x-2 mb-4">
                    <span class="text-gray-600 dark:text-gray-400">
                        &copy; <?php echo date('Y'); ?> Wilson Mbuthia. All rights reserved.
                    </span>
                </div>

                <div class="flex flex-col md:flex-row items-center justify-center">
                    <div class="flex justify-center items-center space-x-2 text-gray-500 dark:text-gray-500">
                        <span>Built with</span>
                        <span class="text-red-500 text-lg animate-pulse">♥</span>
                        <span>and</span>
                        <span class="font-medium text-blue-600 dark:text-blue-400">WordPress</span>
                        <span class="hidden md:block">• &nbsp;</span>

                    </div>
                    <div class="flex justify-center items-center space-x-2 text-gray-500 dark:text-gray-500">
                        <span class="font-medium text-teal-600 dark:text-teal-400">
                            Powered by Innovation
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bottom gradient bar -->
    <div class="h-1 bg-gradient-to-r from-teal-500 via-cyan-500 to-blue-500"></div>
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