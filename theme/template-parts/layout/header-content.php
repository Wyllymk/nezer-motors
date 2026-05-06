<?php
/**
 * Template part for displaying the header content
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Nezer_Motors
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

?>

<header class="text-black dark:text-white fixed top-0 left-0 right-0 z-50 transform transition-all duration-500 ease-out shadow-lg backdrop-blur-lg 
    <?php
    if ( is_admin_bar_showing() ) {
        echo ' mt-8 ';
    }
    ?>" x-data="stickyHeader" :class="{
        'translate-y-0': !isHidden,
        '-translate-y-full': isHidden,
        'backdrop-blur-xl bg-gray-100/80 dark:bg-gray-950/80 border-b border-gray-200/20 dark:border-gray-700/20': isScrolled,
        'bg-gray-100 dark:bg-gray-950': !isScrolled
    }">

    <div class="transition-all duration-300 ease-in-out">
        <div class="w-full px-4 lg:px-8">
            <nav x-data="{ scrolled: false, mobileOpen: false }" @scroll.window="scrolled = window.scrollY > 40"
                :class="scrolled ? (darkMode ? 'nav-scrolled' : 'nav-scrolled-light') : (darkMode ? 'bg-transparent' : 'bg-transparent')"
                class="fixed top-0 left-0 right-0 z-50 transition-all duration-300">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="flex items-center justify-between h-18 py-3">

                        <!-- Logo -->
                        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="flex items-center gap-2 group">
                            <div class="w-9 h-9 rounded-lg flex items-center justify-center"
                                style="background: linear-gradient(135deg, #d4a017, #f0c040);">
                                <svg class="w-5 h-5 text-black" fill="currentColor" viewBox="0 0 24 24">
                                    <path
                                        d="M18.92 6.01C18.72 5.42 18.16 5 17.5 5h-11c-.66 0-1.21.42-1.42 1.01L3 12v8c0 .55.45 1 1 1h1c.55 0 1-.45 1-1v-1h12v1c0 .55.45 1 1 1h1c.55 0 1-.45 1-1v-8l-2.08-5.99zM6.5 16c-.83 0-1.5-.67-1.5-1.5S5.67 13 6.5 13s1.5.67 1.5 1.5S7.33 16 6.5 16zm11 0c-.83 0-1.5-.67-1.5-1.5s.67-1.5 1.5-1.5 1.5.67 1.5 1.5-.67 1.5-1.5 1.5zM5 11l1.5-4.5h11L19 11H5z" />
                                </svg>
                            </div>
                            <div>
                                <span class="font-heading text-xl font-700 tracking-wide"
                                    :class="darkMode ? 'text-white' : 'text-gray-900'"><?php esc_html_e( 'NEZER', 'nezer-motors' ); ?></span>
                                <span class="font-heading text-xl font-700 tracking-wide text-gold-500">
                                    <?php esc_html_e( 'MOTORS', 'nezer-motors' ); ?></span>
                            </div>
                        </a>

                        <!-- Desktop Nav Links -->
                        <div class="hidden lg:flex items-center gap-1">
                            <a href="<?php echo esc_url( home_url( '/' ) ); ?>"
                                class="nav-link px-4 py-2 rounded-lg text-sm font-sub font-600 transition-all duration-200 hover:text-gold-500"
                                :class="darkMode ? 'text-white/80' : 'text-gray-700'"><?php esc_html_e( 'Home', 'nezer-motors' ); ?></a>
                            <a href="<?php echo esc_url( home_url( '/about/' ) ); ?>"
                                class="nav-link px-4 py-2 rounded-lg text-sm font-sub font-600 transition-all duration-200 hover:text-gold-500"
                                :class="darkMode ? 'text-white/80' : 'text-gray-700'"><?php esc_html_e( 'About', 'nezer-motors' ); ?></a>
                            <a href="<?php echo esc_url( home_url( '/auto-care-express/' ) ); ?>"
                                class="nav-link px-4 py-2 rounded-lg text-sm font-sub font-600 transition-all duration-200 hover:text-gold-500"
                                :class="darkMode ? 'text-white/80' : 'text-gray-700'"><?php esc_html_e( 'AutoCare Express', 'nezer-motors' ); ?></a>
                            <a href="<?php echo esc_url( home_url( '/quik-fix/' ) ); ?>"
                                class="nav-link px-4 py-2 rounded-lg text-sm font-sub font-600 transition-all duration-200 hover:text-gold-500"
                                :class="darkMode ? 'text-white/80' : 'text-gray-700'"><?php esc_html_e( 'QuikFix', 'nezer-motors' ); ?></a>
                            <a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>"
                                class="nav-link px-4 py-2 rounded-lg text-sm font-sub font-600 transition-all duration-200 hover:text-gold-500"
                                :class="darkMode ? 'text-white/80' : 'text-gray-700'"><?php esc_html_e( 'Contact', 'nezer-motors' ); ?></a>
                        </div>

                        <!-- Right controls -->
                        <div class="flex items-center gap-3">
                            <!-- Theme toggle -->
                            <div class="hidden sm:flex items-center gap-1 rounded-full p-1"
                                :class="darkMode ? 'bg-white/10' : 'bg-black/8'">
                                <!-- System -->
                                <button @click="setTheme('system')"
                                    :class="theme === 'system' ? 'bg-gold-500 text-black' : (darkMode ? 'text-white/60' : 'text-gray-500')"
                                    class="w-7 h-7 rounded-full flex items-center justify-center transition-all duration-200"
                                    title="<?php esc_attr_e( 'System', 'nezer-motors' ); ?>">
                                    <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 24 24">
                                        <path
                                            d="M21 3H3c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h18c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm0 16H3V5h18v14zm-9-2l-5-5 1.4-1.4L12 14.2l7.6-7.6L21 8l-9 9z" />
                                    </svg>
                                </button>
                                <!-- Light -->
                                <button @click="setTheme('light')"
                                    :class="theme === 'light' ? 'bg-gold-500 text-black' : (darkMode ? 'text-white/60' : 'text-gray-500')"
                                    class="w-7 h-7 rounded-full flex items-center justify-center transition-all duration-200"
                                    title="<?php esc_attr_e( 'Light', 'nezer-motors' ); ?>">
                                    <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 24 24">
                                        <path
                                            d="M12 7c-2.76 0-5 2.24-5 5s2.24 5 5 5 5-2.24 5-5-2.24-5-5-5zM2 13h2c.55 0 1-.45 1-1s-.45-1-1-1H2c-.55 0-1 .45-1 1s.45 1 1 1zm18 0h2c.55 0 1-.45 1-1s-.45-1-1-1h-2c-.55 0-1 .45-1 1s.45 1 1 1zM11 2v2c0 .55.45 1 1 1s1-.45 1-1V2c0-.55-.45-1-1-1s-1 .45-1 1zm0 18v2c0 .55.45 1 1 1s1-.45 1-1v-2c0-.55-.45-1-1-1s-1 .45-1 1zM5.99 4.58c-.39-.39-1.03-.39-1.41 0-.39.39-.39 1.03 0 1.41l1.06 1.06c.39.39 1.03.39 1.41 0 .38-.39.39-1.03 0-1.41L5.99 4.58zm12.37 12.37c-.39-.39-1.03-.39-1.41 0-.39.39-.39 1.03 0 1.41l1.06 1.06c.39.39 1.03.39 1.41 0 .39-.38.39-1.03 0-1.41l-1.06-1.06zm1.06-12.37l-1.06 1.06c-.39.39-.39 1.03 0 1.41.39.39 1.03.39 1.41 0l1.06-1.06c.39-.38.39-1.03 0-1.41-.38-.39-1.03-.39-1.41 0zM7.05 18.36l-1.06 1.06c-.39.39-.39 1.03 0 1.41.39.39 1.03.39 1.41 0l1.06-1.06c.39-.39.39-1.03 0-1.41-.39-.38-1.03-.38-1.41 0z" />
                                    </svg>
                                </button>
                                <!-- Dark -->
                                <button @click="setTheme('dark')"
                                    :class="theme === 'dark' ? 'bg-gold-500 text-black' : (darkMode ? 'text-white/60' : 'text-gray-500')"
                                    class="w-7 h-7 rounded-full flex items-center justify-center transition-all duration-200"
                                    title="<?php esc_attr_e( 'Dark', 'nezer-motors' ); ?>">
                                    <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 24 24">
                                        <path
                                            d="M12 3c-4.97 0-9 4.03-9 9s4.03 9 9 9 9-4.03 9-9c0-.46-.04-.92-.1-1.36-.98 1.37-2.58 2.26-4.4 2.26-2.98 0-5.4-2.42-5.4-5.4 0-1.81.89-3.42 2.26-4.4-.44-.06-.9-.1-1.36-.1z" />
                                    </svg>
                                </button>
                            </div>

                            <!-- CTA button -->
                            <a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>"
                                class="hidden lg:flex items-center gap-2 px-4 py-2 rounded-xl text-sm font-sub font-600 transition-all duration-200 hover:scale-105"
                                style="background: linear-gradient(135deg, #d4a017, #f0c040); color: #000;">
                                <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 24 24">
                                    <path
                                        d="M20 4H4c-1.1 0-1.99.9-1.99 2L2 18c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5-8-5V6l8 5 8-5v2z" />
                                </svg>
                                <?php esc_html_e( 'Get In Touch', 'nezer-motors' ); ?>
                            </a>

                            <!-- Mobile hamburger -->
                            <button @click="mobileOpen = !mobileOpen"
                                class="lg:hidden w-9 h-9 flex flex-col items-center justify-center gap-1.5 rounded-lg transition-colors"
                                :class="darkMode ? 'hover:bg-white/10' : 'hover:bg-black/08'"
                                aria-label="<?php esc_attr_e( 'Toggle mobile menu', 'nezer-motors' ); ?>">
                                <span :class="mobileOpen ? 'rotate-45 translate-y-2' : ''"
                                    class="w-5 h-0.5 block transition-all duration-300"
                                    :style="darkMode ? 'background:#fff' : 'background:#1a1a1a'"></span>
                                <span :class="mobileOpen ? 'opacity-0' : ''"
                                    class="w-5 h-0.5 block transition-all duration-300"
                                    :style="darkMode ? 'background:#fff' : 'background:#1a1a1a'"></span>
                                <span :class="mobileOpen ? '-rotate-45 -translate-y-2' : ''"
                                    class="w-5 h-0.5 block transition-all duration-300"
                                    :style="darkMode ? 'background:#fff' : 'background:#1a1a1a'"></span>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Mobile Drawer -->
                <div x-show="mobileOpen" x-transition:enter="transition ease-out duration-300"
                    x-transition:enter-start="opacity-0 -translate-y-4"
                    x-transition:enter-end="opacity-100 translate-y-0"
                    x-transition:leave="transition ease-in duration-200"
                    x-transition:leave-start="opacity-100 translate-y-0"
                    x-transition:leave-end="opacity-0 -translate-y-4" x-cloak class="lg:hidden border-t"
                    :class="darkMode ? 'bg-dark-800/95 border-white/10' : 'bg-white/95 border-gray-200'"
                    style="backdrop-filter:blur(20px)">
                    <div class="max-w-7xl mx-auto px-4 py-6 flex flex-col gap-1">
                        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" @click="mobileOpen=false"
                            class="font-sub font-600 text-base px-4 py-3 rounded-xl transition-colors hover:text-gold-500"
                            :class="darkMode ? 'text-white/80 hover:bg-white/08' : 'text-gray-800 hover:bg-gray-100'"><?php esc_html_e( 'Home', 'nezer-motors' ); ?></a>
                        <a href="<?php echo esc_url( home_url( '/about/' ) ); ?>" @click="mobileOpen=false"
                            class="font-sub font-600 text-base px-4 py-3 rounded-xl transition-colors hover:text-gold-500"
                            :class="darkMode ? 'text-white/80 hover:bg-white/08' : 'text-gray-800 hover:bg-gray-100'"><?php esc_html_e( 'About', 'nezer-motors' ); ?></a>
                        <a href="<?php echo esc_url( home_url( '/auto-care-express/' ) ); ?>" @click="mobileOpen=false"
                            class="font-sub font-600 text-base px-4 py-3 rounded-xl transition-colors hover:text-gold-500"
                            :class="darkMode ? 'text-white/80 hover:bg-white/08' : 'text-gray-800 hover:bg-gray-100'"><?php esc_html_e( 'AutoCare Express', 'nezer-motors' ); ?></a>
                        <a href="<?php echo esc_url( home_url( '/quik-fix/' ) ); ?>" @click="mobileOpen=false"
                            class="font-sub font-600 text-base px-4 py-3 rounded-xl transition-colors hover:text-gold-500"
                            :class="darkMode ? 'text-white/80 hover:bg-white/08' : 'text-gray-800 hover:bg-gray-100'"><?php esc_html_e( 'QuikFix', 'nezer-motors' ); ?></a>
                        <a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>" @click="mobileOpen=false"
                            class="font-sub font-600 text-base px-4 py-3 rounded-xl transition-colors hover:text-gold-500"
                            :class="darkMode ? 'text-white/80 hover:bg-white/08' : 'text-gray-800 hover:bg-gray-100'"><?php esc_html_e( 'Contact', 'nezer-motors' ); ?></a>
                        <!-- Mobile theme toggle -->
                        <div class="mt-4 pt-4 border-t flex items-center gap-3"
                            :class="darkMode ? 'border-white/10' : 'border-gray-200'">
                            <span class="font-sub text-sm font-600"
                                :class="darkMode ? 'text-white/50' : 'text-gray-500'"><?php esc_html_e( 'Theme:', 'nezer-motors' ); ?></span>
                            <div class="flex items-center gap-1 rounded-full p-1"
                                :class="darkMode ? 'bg-white/10' : 'bg-gray-100'">
                                <button @click="setTheme('system')"
                                    :class="theme === 'system' ? 'bg-gold-500 text-black' : (darkMode ? 'text-white/60' : 'text-gray-500')"
                                    class="px-3 py-1 rounded-full text-xs font-sub font-600 transition-all"><?php esc_html_e( 'System', 'nezer-motors' ); ?></button>
                                <button @click="setTheme('light')"
                                    :class="theme === 'light' ? 'bg-gold-500 text-black' : (darkMode ? 'text-white/60' : 'text-gray-500')"
                                    class="px-3 py-1 rounded-full text-xs font-sub font-600 transition-all"><?php esc_html_e( 'Light', 'nezer-motors' ); ?></button>
                                <button @click="setTheme('dark')"
                                    :class="theme === 'dark' ? 'bg-gold-500 text-black' : (darkMode ? 'text-white/60' : 'text-gray-500')"
                                    class="px-3 py-1 rounded-full text-xs font-sub font-600 transition-all"><?php esc_html_e( 'Dark', 'nezer-motors' ); ?></button>
                            </div>
                        </div>
                        <a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>"
                            class="mt-3 flex items-center justify-center gap-2 py-3 rounded-xl font-sub font-700 text-sm transition-all"
                            style="background: linear-gradient(135deg, #d4a017, #f0c040); color: #000;">
                            <?php esc_html_e( 'Get In Touch', 'nezer-motors' ); ?>
                        </a>
                    </div>
                </div>
            </nav>
        </div>
    </div>
</header>