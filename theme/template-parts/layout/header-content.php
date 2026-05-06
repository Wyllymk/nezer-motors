<?php
/**
 * Template part for displaying the header content
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Nezer_Motors
 */
// Exit if accessed directly
defined( 'ABSPATH' ) || exit;

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
            <nav class="flex items-center justify-between py-2">

                <!-- Logo Section -->
                <div class="flex items-center justify-center md:w-60 relative group">
                    <a href="<?php echo esc_url( site_url( '/' ) ); ?>"
                        class="flex items-center justify-center text-nowrap relative">
                        <div
                            class="absolute inset-0 bg-gradient-to-r from-teal-500/20 to-cyan-500/20 rounded-lg blur opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                        </div>
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/logo.png" alt="logo"
                            class="h-10 filter invert-0 dark:invert duration-300 hover:scale-110 transform transition-transform relative z-10">
                    </a>
                </div>

                <!-- Desktop Navigation -->
                <div
                    class="hidden md:flex items-center space-x-1 font-manrope bg-gray-200/50 dark:bg-gray-800/50 rounded-full px-6 py-2 backdrop-blur-sm border border-gray-300/20 dark:border-gray-600/20">
                    <?php
                    $nav_items = [
                        ['url' => '/', 'label' => 'Home'],
                        ['url' => '/about-me/', 'label' => 'About Me'],
                        ['url' => '/services/', 'label' => 'Services'],
                        ['url' => '/projects/', 'label' => 'Projects'],
                        ['url' => '/contact/', 'label' => 'Contact']
                    ];
                    
                    foreach ($nav_items as $item) :
                    ?>
                    <a href="<?php echo esc_url( site_url( $item['url'] ) ); ?>"
                        class="nav-link relative px-4 py-2 font-semibold text-gray-700 dark:text-gray-300 hover:text-teal-500 dark:hover:text-teal-300 transition-all duration-300 rounded-full group overflow-hidden">
                        <span class="relative z-10"><?php esc_html_e( $item['label'], 'wilson-devops' ); ?></span>
                        <div
                            class="absolute inset-0 bg-gradient-to-r from-teal-500/10 to-cyan-500/10 transform scale-x-0 group-hover:scale-x-100 transition-transform duration-300 origin-left rounded-full">
                        </div>
                        <div
                            class="absolute bottom-1 left-1/2 w-0 h-0.5 bg-gradient-to-r from-teal-500 to-cyan-400 group-hover:w-8 group-hover:left-1/2 group-hover:-translate-x-1/2 transition-all duration-300">
                        </div>
                    </a>
                    <?php endforeach; ?>
                </div>

                <!-- Right Section: Dark Mode Toggle & Mobile Menu -->
                <div class="flex items-center space-x-4">

                    <!-- Dark Mode Toggle -->
                    <div class="relative">
                        <button
                            class="p-3 cursor-pointer rounded-full bg-gradient-to-r from-gray-200 to-gray-300 dark:from-gray-800 dark:to-gray-700 hover:from-teal-100 hover:to-cyan-100 dark:hover:from-teal-900 dark:hover:to-cyan-900 shadow-lg hover:shadow-teal-500/20 dark:hover:shadow-teal-500/20 transition-all duration-300 transform hover:scale-110 border border-gray-300/30 dark:border-gray-600/30"
                            x-data="themeToggle" @click="toggle" :class="{'rotate-180': isDark}">

                            <svg x-show="!isDark" class="w-5 h-5 transform transition-all duration-500 fill-gray-800"
                                xmlns="http://www.w3.org/2000/svg" width="200" height="200" viewBox="0 0 15 15">
                                <path fill="currentColor" fill-rule="evenodd"
                                    d="M2.9.5a.4.4 0 0 0-.8 0v.6h-.6a.4.4 0 1 0 0 .8h.6v.6a.4.4 0 1 0 .8 0v-.6h.6a.4.4 0 0 0 0-.8h-.6V.5Zm3 3a.4.4 0 1 0-.8 0v.6h-.6a.4.4 0 1 0 0 .8h.6v.6a.4.4 0 1 0 .8 0v-.6h.6a.4.4 0 0 0 0-.8h-.6v-.6Zm-4 3a.4.4 0 1 0-.8 0v.6H.5a.4.4 0 1 0 0 .8h.6v.6a.4.4 0 0 0 .8 0v-.6h.6a.4.4 0 0 0 0-.8h-.6v-.6ZM8.544.982l-.298-.04c-.213-.024-.34.224-.217.4A6.57 6.57 0 0 1 9.203 5.1a6.602 6.602 0 0 1-6.243 6.59c-.214.012-.333.264-.183.417a6.8 6.8 0 0 0 .21.206l.072.066l.26.226l.188.148l.121.09l.187.131l.176.115c.12.076.244.149.37.217l.264.135l.26.12l.303.122l.244.086a6.568 6.568 0 0 0 1.103.26l.317.04l.267.02a6.6 6.6 0 0 0 6.943-7.328l-.037-.277a6.557 6.557 0 0 0-.384-1.415l-.113-.268l-.077-.166l-.074-.148a6.602 6.602 0 0 0-.546-.883l-.153-.2l-.199-.24l-.163-.18l-.12-.124l-.16-.158l-.223-.2l-.32-.26l-.245-.177l-.292-.19l-.321-.186l-.328-.165l-.113-.052l-.24-.101l-.276-.104l-.252-.082l-.325-.09l-.265-.06l-.292-.053Zm1.86 4.318a7.578 7.578 0 0 0-.572-2.894a5.601 5.601 0 1 1-4.748 10.146a7.61 7.61 0 0 0 3.66-2.51a.749.749 0 0 0 1.355-.442a.75.75 0 0 0-.584-.732c.062-.116.122-.235.178-.355A1.25 1.25 0 1 0 10.35 6.2c.034-.295.052-.595.052-.9Z"
                                    clip-rule="evenodd" />
                            </svg>

                            <svg x-show="isDark" class="w-5 h-5 transform transition-all duration-500 fill-white"
                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32">
                                <path fill="currentColor"
                                    d="M15 3v5h2V3zM7.5 6.094L6.094 7.5l3.531 3.563l1.438-1.438zm17 0l-3.563 3.531l1.438 1.438L25.906 7.5zM16 9c-3.855 0-7 3.145-7 7s3.145 7 7 7s7-3.145 7-7s-3.145-7-7-7zm0 2c2.773 0 5 2.227 5 5s-2.227 5-5 5s-5-2.227-5-5s2.227-5 5-5zM3 15v2h5v-2zm21 0v2h5v-2zM9.625 20.938L6.094 24.5L7.5 25.906l3.563-3.531zm12.75 0l-1.438 1.437l3.563 3.531l1.406-1.406zM15 24v5h2v-5z" />
                            </svg>
                        </button>
                    </div>

                    <!-- Mobile Menu Button -->
                    <button id="menuButton"
                        class="md:hidden relative p-3 rounded-full bg-gradient-to-r from-gray-200 to-gray-300 dark:from-gray-800 dark:to-gray-700 hover:from-teal-100 hover:to-cyan-100 dark:hover:from-teal-900 dark:hover:to-cyan-900 shadow-lg hover:shadow-teal-500/20 dark:hover:shadow-teal-500/20 transition-all duration-300 transform hover:scale-110 border border-gray-300/30 dark:border-gray-600/30 group">
                        <div class="relative">
                            <div
                                class="w-6 h-0.5 bg-gray-800 dark:bg-white transition-all duration-300 group-hover:bg-teal-500 dark:group-hover:bg-teal-400 transform origin-center">
                            </div>
                            <div
                                class="w-6 h-0.5 bg-gray-800 dark:bg-white mt-1.5 transition-all duration-300 group-hover:bg-teal-500 dark:group-hover:bg-teal-400 transform origin-center">
                            </div>
                            <div
                                class="w-6 h-0.5 bg-gray-800 dark:bg-white mt-1.5 transition-all duration-300 group-hover:bg-teal-500 dark:group-hover:bg-teal-400 transform origin-center">
                            </div>
                        </div>
                    </button>

                </div>
            </nav>
        </div>
    </div>
</header>

<!-- Mobile Menu Overlay -->
<div id="overlay" class="fixed inset-0 bg-black/60 backdrop-blur-sm z-40 hidden transition-opacity duration-300"></div>

<!-- Mobile Menu -->
<nav id="navMenu"
    class="fixed top-0 right-0 h-full w-80 bg-gray-50 dark:bg-gray-900 z-50 transform translate-x-full opacity-0 transition-all duration-500 ease-out shadow-2xl border-l border-gray-200 dark:border-gray-700">

    <!-- Mobile Menu Header -->
    <div
        class="p-6 border-b border-gray-200 dark:border-gray-700 bg-gradient-to-r from-gray-100 to-gray-200 dark:from-gray-800 dark:to-gray-900">
        <div class="flex items-center justify-between">
            <h3 class="text-xl font-bold text-gray-800 dark:text-white">Menu</h3>
            <button class="p-2 rounded-full hover:bg-gray-300 dark:hover:bg-gray-700 transition-colors duration-200"
                onclick="document.getElementById('overlay').click()">
                <svg class="w-6 h-6 text-gray-600 dark:text-gray-400" fill="none" stroke="currentColor"
                    viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
    </div>

    <!-- Mobile Menu Items -->
    <div class="p-6">
        <ul class="space-y-4 text-gray-800 dark:text-gray-200 font-semibold">
            <?php foreach ($nav_items as $index => $item) : ?>
            <li class="menu-link transform transition-all duration-300 hover:translate-x-2">
                <a href="<?php echo esc_url( site_url( $item['url'] ) ); ?>"
                    class="flex items-center p-4 rounded-xl hover:bg-gradient-to-r hover:from-teal-50 hover:to-cyan-50 dark:hover:from-teal-900/30 dark:hover:to-cyan-900/30 group transition-all duration-300 border border-transparent hover:border-teal-200 dark:hover:border-teal-800">

                    <!-- Icon -->
                    <div
                        class="w-10 h-10 rounded-lg bg-gradient-to-br from-gray-200 to-gray-300 dark:from-gray-700 dark:to-gray-800 group-hover:from-teal-500 group-hover:to-cyan-500 flex items-center justify-center transition-all duration-300 transform group-hover:scale-110">
                        <span class="text-lg font-bold text-gray-600 dark:text-gray-300 group-hover:text-white">
                            <?php echo substr($item['label'], 0, 1); ?>
                        </span>
                    </div>

                    <!-- Menu Text -->
                    <div class="ml-4 flex-1">
                        <span
                            class="menu-item text-lg group-hover:text-teal-600 dark:group-hover:text-teal-400 transition-colors duration-300">
                            <?php esc_html_e( $item['label'], 'wilson-devops' ); ?>
                        </span>
                    </div>

                    <!-- Arrow -->
                    <svg class="w-5 h-5 text-gray-400 group-hover:text-teal-500 transform transition-all duration-300 group-hover:translate-x-1"
                        fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                </a>
            </li>
            <?php endforeach; ?>
        </ul>
    </div>

    <!-- Mobile Menu Footer -->
    <div
        class="absolute bottom-0 left-0 right-0 p-6 border-t border-gray-200 dark:border-gray-700 bg-gradient-to-r from-gray-100 to-gray-200 dark:from-gray-800 dark:to-gray-900">
        <div class="text-center">
            <p class="text-sm text-gray-600 dark:text-gray-400">Wilson DevOps</p>
            <div class="mt-2 flex justify-center space-x-2">
                <div class="w-2 h-2 rounded-full bg-teal-500 animate-pulse"></div>
                <div class="w-2 h-2 rounded-full bg-cyan-500 animate-pulse" style="animation-delay: 0.2s"></div>
                <div class="w-2 h-2 rounded-full bg-blue-500 animate-pulse" style="animation-delay: 0.4s"></div>
            </div>
        </div>
    </div>
</nav>