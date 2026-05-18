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
<?php
// Hide/disable code on the "coming-soon" page using page slug

if ( ! is_page( 'coming-soon' ) ) {

?>
<!-- ============================================================
     NAVIGATION
============================================================ -->
<nav id="nm-nav" role="navigation" aria-label="<?php esc_attr_e( 'Main navigation', 'nezer-motors' ); ?>"
    class="fixed top-0 left-0 right-0 z-50">

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between py-3 lg:py-3.5">

            <!-- ── LOGO ── -->
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="flex items-center gap-2 flex-shrink-0 group"
                aria-label="<?php esc_attr_e( 'Nezer Motors — Home', 'nezer-motors' ); ?>">
                <div class="w-9 h-9 rounded-lg flex items-center justify-center flex-shrink-0 transition-transform group-hover:scale-105"
                    style="background:linear-gradient(135deg,#d4a017,#f0c040)" aria-hidden="true">
                    <svg class="w-5 h-5 text-black" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true"
                        focusable="false">
                        <path
                            d="M18.92 6.01C18.72 5.42 18.16 5 17.5 5h-11c-.66 0-1.21.42-1.42 1.01L3 12v8c0 .55.45 1 1 1h1c.55 0 1-.45 1-1v-1h12v1c0 .55.45 1 1 1h1c.55 0 1-.45 1-1v-8l-2.08-5.99zM6.5 16c-.83 0-1.5-.67-1.5-1.5S5.67 13 6.5 13s1.5.67 1.5 1.5S7.33 16 6.5 16zm11 0c-.83 0-1.5-.67-1.5-1.5s.67-1.5 1.5-1.5 1.5.67 1.5 1.5-.67 1.5-1.5 1.5zM5 11l1.5-4.5h11L19 11H5z" />
                    </svg>
                </div>
                <div class="leading-none">
                    <span class="font-heading text-xl font-700 tracking-wide text-gray-900 dark:text-white">NEZER</span>
                    <span class="font-heading text-xl font-700 tracking-wide text-gold-500"> MOTORS</span>
                </div>
            </a>

            <!-- ── DESKTOP NAV LINKS ── -->
            <div class="hidden lg:flex items-center gap-1" role="list">
                <?php
                $current  = nm_current_page();
                foreach ( nm_nav_links() as $link ) :
                $is_active = ( $link['page'] === $current );
                $classes   = $is_active
                    ? 'px-4 py-2 rounded-lg text-sm font-sub font-700 text-gold-500'
                    : 'px-4 py-2 rounded-lg text-sm font-sub font-600 text-gray-600 dark:text-white/70 hover:text-gold-500 dark:hover:text-gold-400 transition-colors duration-200';
                ?>
                <a href="<?php echo esc_url( $link['url'] ); ?>" class="<?php echo esc_attr( $classes ); ?>"
                    <?php echo $is_active ? 'aria-current="page"' : ''; ?> role="listitem">
                    <?php echo esc_html( $link['label'] ); ?>
                </a>
                <?php endforeach; ?>
            </div>

            <!-- ── RIGHT: THEME TOGGLE + CTA ── -->
            <div class="flex items-center gap-3">

                <!-- Theme toggle (desktop) -->
                <div class="hidden sm:flex items-center gap-1 rounded-full p-1 bg-black/[0.07] dark:bg-white/10"
                    role="group" aria-label="<?php esc_attr_e( 'Colour theme', 'nezer-motors' ); ?>">
                    <button data-set-theme="system"
                        class="w-7 h-7 rounded-full flex items-center justify-center transition-all text-xs font-sub font-700 text-gray-500 dark:text-white/60"
                        title="<?php esc_attr_e( 'System theme', 'nezer-motors' ); ?>"
                        aria-label="<?php esc_attr_e( 'Use system theme', 'nezer-motors' ); ?>" aria-pressed="false">
                        S
                    </button>
                    <button data-set-theme="light"
                        class="w-7 h-7 rounded-full flex items-center justify-center transition-all text-gray-500 dark:text-white/60"
                        title="<?php esc_attr_e( 'Light mode', 'nezer-motors' ); ?>"
                        aria-label="<?php esc_attr_e( 'Switch to light mode', 'nezer-motors' ); ?>"
                        aria-pressed="false">
                        <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                            <path
                                d="M12 7c-2.76 0-5 2.24-5 5s2.24 5 5 5 5-2.24 5-5-2.24-5-5-5zM2 13h2c.55 0 1-.45 1-1s-.45-1-1-1H2c-.55 0-1 .45-1 1s.45 1 1 1zm18 0h2c.55 0 1-.45 1-1s-.45-1-1-1h-2c-.55 0-1 .45-1 1s.45 1 1 1zM11 2v2c0 .55.45 1 1 1s1-.45 1-1V2c0-.55-.45-1-1-1s-1 .45-1 1zm0 18v2c0 .55.45 1 1 1s1-.45 1-1v-2c0-.55-.45-1-1-1s-1 .45-1 1z" />
                        </svg>
                    </button>
                    <button data-set-theme="dark"
                        class="w-7 h-7 rounded-full flex items-center justify-center transition-all text-gray-500 dark:text-white/60"
                        title="<?php esc_attr_e( 'Dark mode', 'nezer-motors' ); ?>"
                        aria-label="<?php esc_attr_e( 'Switch to dark mode', 'nezer-motors' ); ?>" aria-pressed="false">
                        <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                            <path
                                d="M12 3c-4.97 0-9 4.03-9 9s4.03 9 9 9 9-4.03 9-9c0-.46-.04-.92-.1-1.36-.98 1.37-2.58 2.26-4.4 2.26-2.98 0-5.4-2.42-5.4-5.4 0-1.81.89-3.42 2.26-4.4-.44-.06-.9-.1-1.36-.1z" />
                        </svg>
                    </button>
                </div>

                <!-- Get In Touch CTA (desktop) -->
                <a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>"
                    class="hidden lg:inline-flex items-center gap-2 px-4 py-2 rounded-xl text-sm font-sub font-700 hover:scale-105 hover:shadow-lg transition-all duration-200"
                    style="background:linear-gradient(135deg,#d4a017,#f0c040);color:#000;">
                    <?php esc_html_e( 'Get In Touch', 'nezer-motors' ); ?>
                    <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                        <path
                            d="M20 4H4c-1.1 0-1.99.9-1.99 2L2 18c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5-8-5V6l8 5 8-5v2z" />
                    </svg>
                </a>

                <!-- Mobile: theme toggle pill -->
                <button id="nm-theme-mobile"
                    class="sm:hidden flex items-center gap-1.5 px-2.5 py-1.5 rounded-full text-xs font-sub font-700 bg-black/[0.07] dark:bg-white/10 text-gray-600 dark:text-white/70 transition-colors"
                    aria-label="<?php esc_attr_e( 'Toggle colour theme', 'nezer-motors' ); ?>">
                    <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                        <path
                            d="M12 3c-4.97 0-9 4.03-9 9s4.03 9 9 9 9-4.03 9-9c0-.46-.04-.92-.1-1.36-.98 1.37-2.58 2.26-4.4 2.26-2.98 0-5.4-2.42-5.4-5.4 0-1.81.89-3.42 2.26-4.4-.44-.06-.9-.1-1.36-.1z" />
                    </svg>
                    <span class="nm-theme-label"><?php esc_html_e( 'System', 'nezer-motors' ); ?></span>
                </button>

                <!-- Mobile: hamburger -->
                <button id="nm-menu-toggle"
                    class="lg:hidden w-9 h-9 flex flex-col items-center justify-center gap-1.5 rounded-lg hover:bg-black/[0.07] dark:hover:bg-white/10 transition-colors"
                    aria-expanded="false" aria-controls="nm-mobile-drawer"
                    aria-label="<?php esc_attr_e( 'Open navigation menu', 'nezer-motors' ); ?>">
                    <span
                        class="w-5 h-0.5 block rounded-full bg-gray-900 dark:bg-white transition-all duration-300"></span>
                    <span
                        class="w-5 h-0.5 block rounded-full bg-gray-900 dark:bg-white transition-all duration-300"></span>
                    <span
                        class="w-5 h-0.5 block rounded-full bg-gray-900 dark:bg-white transition-all duration-300"></span>
                </button>

            </div>
        </div>
    </div>

    <!-- ── MOBILE DRAWER ── -->
    <div id="nm-mobile-drawer" role="dialog" aria-modal="true"
        aria-label="<?php esc_attr_e( 'Mobile navigation', 'nezer-motors' ); ?>"
        class="lg:hidden border-t border-gray-100 dark:border-white/10 bg-white/95 dark:bg-dark-800/95"
        style="backdrop-filter:blur(20px);-webkit-backdrop-filter:blur(20px);">
        <nav class="max-w-7xl mx-auto px-4 py-5 flex flex-col gap-1"
            aria-label="<?php esc_attr_e( 'Mobile navigation links', 'nezer-motors' ); ?>">
            <?php
      foreach ( nm_nav_links() as $link ) :
        $is_active = ( $link['page'] === $current );
        $classes   = $is_active
          ? 'flex items-center gap-3 px-4 py-3 rounded-xl font-sub font-700 text-gold-500'
          : 'flex items-center gap-3 px-4 py-3 rounded-xl font-sub font-600 text-gray-800 dark:text-white/80 hover:bg-gray-100 dark:hover:bg-white/[0.08] hover:text-gold-500 dark:hover:text-gold-400 transition-colors duration-200';
      ?>
            <a href="<?php echo esc_url( $link['url'] ); ?>" class="<?php echo esc_attr( $classes ); ?>"
                <?php echo $is_active ? 'aria-current="page"' : ''; ?>>
                <?php echo esc_html( $link['label'] ); ?>
            </a>
            <?php endforeach; ?>

            <div class="mt-4 pt-4 border-t border-gray-100 dark:border-white/10">
                <a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>"
                    class="flex items-center justify-center gap-2 w-full py-3 rounded-xl font-sub font-700 text-sm hover:opacity-90 transition-opacity"
                    style="background:linear-gradient(135deg,#d4a017,#f0c040);color:#000;">
                    <?php esc_html_e( 'Get In Touch', 'nezer-motors' ); ?>
                </a>
            </div>
        </nav>
    </div>

</nav>
<!-- /nav -->

<?php

}

?>