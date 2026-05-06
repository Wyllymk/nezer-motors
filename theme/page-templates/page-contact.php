<?php
/**
 * The template for displaying the contact page
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Nezer_Motors
 */
defined('ABSPATH') || exit;

get_header();
?>

<main class="bg-cyber-light dark:bg-cyber-dark min-h-screen">

    <!-- Sidebar Navigation (Mobile) -->
    <div id="navMenu" class="transform translate-x-full opacity-0 w-64 py-4 px-4 z-40 fixed md:hidden top-0 h-full 
        bg-cyber-light/90 dark:bg-cyber-dark/90 backdrop-blur-md drop-shadow-cyber-cyan 
        transition-all duration-400 ease-in-out">
        <?php get_template_part('template-parts/content/content', 'aside'); ?>
    </div>

    <!-- Overlay -->
    <div id="overlay" class="fixed inset-0 top-0 h-screen z-30 bg-black/70 hidden"></div>

    <!-- Hero Section with Animated Background -->
    <section class="relative min-h-screen flex items-center justify-center overflow-hidden">
        <!-- Animated Grid Background -->
        <div class="absolute inset-0 opacity-10 dark:opacity-20">
            <div
                class="absolute inset-0 bg-gradient-to-br from-cyber-blue via-transparent to-cyber-coral dark:from-cyber-cyan dark:via-transparent dark:to-cyber-pink">
            </div>
            <div class="grid grid-cols-12 h-full w-full">
                <div class="border-r border-current animate-pulse"></div>
                <div class="border-r border-current animate-pulse delay-100"></div>
                <div class="border-r border-current animate-pulse delay-200"></div>
                <div class="border-r border-current animate-pulse delay-300"></div>
                <div class="border-r border-current animate-pulse delay-500"></div>
                <div class="border-r border-current animate-pulse delay-700"></div>
                <div class="border-r border-current animate-pulse delay-1000"></div>
                <div class="border-r border-current animate-pulse delay-100"></div>
                <div class="border-r border-current animate-pulse delay-300"></div>
                <div class="border-r border-current animate-pulse delay-500"></div>
                <div class="border-r border-current animate-pulse delay-700"></div>
                <div class="animate-pulse delay-1000"></div>
            </div>
        </div>

        <div class="container mx-auto px-4 py-20 relative z-10">
            <div class="grid lg:grid-cols-2 gap-16 items-center max-w-7xl mx-auto">

                <!-- Contact Info Card -->
                <div class="relative">
                    <!-- Floating Elements -->
                    <div
                        class="absolute -top-8 -left-8 w-32 h-32 bg-gradient-to-r from-cyber-blue to-cyber-coral dark:from-cyber-cyan dark:to-cyber-pink rounded-full opacity-20 animate-pulse">
                    </div>
                    <div
                        class="absolute -bottom-8 -right-8 w-24 h-24 bg-gradient-to-r from-cyber-coral to-cyber-blue dark:from-cyber-pink dark:to-cyber-cyan rounded-lg rotate-45 opacity-30 animate-bounce">
                    </div>

                    <div
                        class="relative bg-white/80 dark:bg-gray-900/80 backdrop-blur-lg rounded-3xl p-8 border border-gray-200/50 dark:border-gray-700/50 shadow-2xl">
                        <!-- Glowing Border Effect -->
                        <div
                            class="absolute inset-0 bg-gradient-to-r from-cyber-blue via-cyber-coral to-cyber-blue dark:from-cyber-cyan dark:via-cyber-pink dark:to-cyber-cyan rounded-3xl opacity-20 blur-sm">
                        </div>

                        <div class="relative z-10">
                            <!-- Title with Gradient -->
                            <div class="mb-8">
                                <h1
                                    class="text-5xl lg:text-6xl font-bold bg-gradient-to-r from-cyber-blue to-cyber-coral dark:from-cyber-cyan dark:to-cyber-pink bg-clip-text text-transparent leading-tight">
                                    Let's Connect
                                </h1>
                                <div
                                    class="w-24 h-1 bg-gradient-to-r from-cyber-blue to-cyber-coral dark:from-cyber-cyan dark:to-cyber-pink mt-4 rounded-full">
                                </div>
                            </div>

                            <!-- Description -->
                            <div class="space-y-4 text-gray-700 dark:text-gray-300 text-lg leading-relaxed">
                                <p>Ready to bring your ideas to life? I'm here to help you build something
                                    extraordinary.</p>
                                <p>Drop me a message and let's discuss your next project. I respond to all inquiries
                                    within 24 hours.</p>
                            </div>

                            <!-- Contact Methods -->
                            <div class="mt-8 space-y-4">
                                <div
                                    class="flex items-center space-x-4 p-4 bg-gray-50 dark:bg-gray-800/50 rounded-xl border border-gray-200/50 dark:border-gray-700/50">
                                    <div
                                        class="w-12 h-12 bg-gradient-to-r from-cyber-blue to-cyber-coral dark:from-cyber-cyan dark:to-cyber-pink rounded-lg flex items-center justify-center">
                                        <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 24 24">
                                            <path
                                                d="M20 4H4c-1.1 0-1.99.9-1.99 2L2 18c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5-8-5V6l8 5 8-5v2z" />
                                        </svg>
                                    </div>
                                    <div>
                                        <p class="font-semibold text-gray-900 dark:text-white">Email</p>
                                        <p class="text-gray-600 dark:text-gray-400">Quick response guaranteed</p>
                                    </div>
                                </div>

                                <div
                                    class="flex items-center space-x-4 p-4 bg-gray-50 dark:bg-gray-800/50 rounded-xl border border-gray-200/50 dark:border-gray-700/50">
                                    <div
                                        class="w-12 h-12 bg-gradient-to-r from-cyber-coral to-cyber-blue dark:from-cyber-pink dark:to-cyber-cyan rounded-lg flex items-center justify-center">
                                        <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 24 24">
                                            <path
                                                d="M16 1H8C6.34 1 5 2.34 5 4v16c0 1.66 1.34 3 3 3h8c1.66 0 3-1.34 3-3V4c0-1.66-1.34-3-3-3zM14 21h-4v-1h4v1zm3.25-3H6.75V4h10.5v14z" />
                                        </svg>
                                    </div>
                                    <div>
                                        <p class="font-semibold text-gray-900 dark:text-white">Social Media</p>
                                        <p class="text-gray-600 dark:text-gray-400">Connect on your platform of choice
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <!-- Social Links -->
                            <div class="mt-8">
                                <p class="text-sm text-gray-600 dark:text-gray-400 mb-4">Find me on social platforms</p>
                                <div class="flex space-x-3">
                                    <!-- Twitter -->
                                    <a href="https://twitter.com/WilsonMbuthiaK" target="_blank"
                                        class="group relative w-12 h-12 bg-gray-100 dark:bg-gray-800 rounded-xl flex items-center justify-center hover:bg-gradient-to-r hover:from-cyber-blue hover:to-cyber-coral dark:hover:from-cyber-cyan dark:hover:to-cyber-pink transition-all duration-300 overflow-hidden">
                                        <svg class="w-5 h-5 text-gray-600 dark:text-gray-400 group-hover:text-white transition-colors duration-300 relative z-10"
                                            viewBox="0 0 24 24" fill="currentColor">
                                            <path
                                                d="M8 2H1l8.26 11.014L1.45 22H4.1l6.388-7.349L16 22h7l-8.608-11.478L21.8 2h-2.65l-5.986 6.886L8 2Zm9 18L5 4h2l12 16h-2Z" />
                                        </svg>
                                    </a>

                                    <!-- LinkedIn -->
                                    <a href="https://www.linkedin.com/in/wilson-mbuthia-k/" target="_blank"
                                        class="group relative w-12 h-12 bg-gray-100 dark:bg-gray-800 rounded-xl flex items-center justify-center hover:bg-gradient-to-r hover:from-cyber-blue hover:to-cyber-coral dark:hover:from-cyber-cyan dark:hover:to-cyber-pink transition-all duration-300 overflow-hidden">
                                        <svg class="w-5 h-5 text-gray-600 dark:text-gray-400 group-hover:text-white transition-colors duration-300 relative z-10"
                                            viewBox="0 0 128 128" fill="currentColor">
                                            <path
                                                d="M116 3H12a8.91 8.91 0 0 0-9 8.8v104.42a8.91 8.91 0 0 0 9 8.78h104a8.93 8.93 0 0 0 9-8.81V11.77A8.93 8.93 0 0 0 116 3zM39.17 107H21.06V48.73h18.11zm-9-66.21a10.5 10.5 0 1 1 10.49-10.5a10.5 10.5 0 0 1-10.54 10.48zM107 107H88.89V78.65c0-6.75-.12-15.44-9.41-15.44s-10.87 7.36-10.87 15V107H50.53V48.73h17.36v8h.24c2.42-4.58 8.32-9.41 17.13-9.41C103.6 47.28 107 59.35 107 75z" />
                                        </svg>
                                    </a>

                                    <!-- GitHub -->
                                    <a href="https://github.com/Wyllymk" target="_blank"
                                        class="group relative w-12 h-12 bg-gray-100 dark:bg-gray-800 rounded-xl flex items-center justify-center hover:bg-gradient-to-r hover:from-cyber-blue hover:to-cyber-coral dark:hover:from-cyber-cyan dark:hover:to-cyber-pink transition-all duration-300 overflow-hidden">
                                        <svg class="w-5 h-5 text-gray-600 dark:text-gray-400 group-hover:text-white transition-colors duration-300 relative z-10"
                                            viewBox="0 0 24 24" fill="currentColor">
                                            <path
                                                d="M12 .297c-6.63 0-12 5.373-12 12c0 5.303 3.438 9.8 8.205 11.385c.6.113.82-.258.82-.577c0-.285-.01-1.04-.015-2.04c-3.338.724-4.042-1.61-4.042-1.61C4.422 18.07 3.633 17.7 3.633 17.7c-1.087-.744.084-.729.084-.729c1.205.084 1.84 1.236 1.84 1.236c1.07 1.835 2.809 1.305 3.495.998c.108-.775.418-1.305.762-1.605c-2.665-.3-5.467-1.335-5.467-5.931c0-1.31.47-2.38 1.235-3.221c-.135-.303-.54-1.52.105-3.176c0 0 1.005-.322 3.3 1.23c.96-.267 1.98-.399 3-.405c1.02.006 2.04.138 3 .405c2.28-1.555 3.285-1.23 3.285-1.23c.645 1.655.24 2.872.12 3.176c.765.84 1.23 1.91 1.23 3.221c0 4.615-2.81 5.63-5.475 5.92c.435.375.81 1.11.81 2.24c0 1.62-.015 2.94-.015 3.34c0 .315.21.69.825.575C20.565 22.09 24 17.592 24 12.296c0-6.627-5.373-12-12-12z" />
                                        </svg>
                                    </a>

                                    <!-- WhatsApp -->
                                    <a href="https://wa.me/+254703639230?text=Hi%20I%20want%20to%20get%20in%20touch"
                                        target="_blank"
                                        class="group relative w-12 h-12 bg-gray-100 dark:bg-gray-800 rounded-xl flex items-center justify-center hover:bg-gradient-to-r hover:from-cyber-blue hover:to-cyber-coral dark:hover:from-cyber-cyan dark:hover:to-cyber-pink transition-all duration-300 overflow-hidden">
                                        <svg class="w-5 h-5 text-gray-600 dark:text-gray-400 group-hover:text-white transition-colors duration-300 relative z-10"
                                            viewBox="0 0 24 24" fill="currentColor">
                                            <path
                                                d="M12.04 2c-5.46 0-9.91 4.45-9.91 9.91c0 1.75.46 3.45 1.32 4.95L2.05 22l5.25-1.38c1.45.79 3.08 1.21 4.74 1.21c5.46 0 9.91-4.45 9.91-9.91c0-2.65-1.03-5.14-2.9-7.01A9.816 9.816 0 0 0 12.04 2m.01 1.67c2.2 0 4.26.86 5.82 2.42a8.225 8.225 0 0 1 2.41 5.83c0 4.54-3.7 8.23-8.24 8.23c-1.48 0-2.93-.39-4.19-1.15l-.3-.17l-3.12.82l.83-3.04l-.2-.32a8.188 8.188 0 0 1-1.26-4.38c.01-4.54 3.7-8.24 8.25-8.24M8.53 7.33c-.16 0-.43.06-.66.31c-.22.25-.87.86-.87 2.07c0 1.22.89 2.39 1 2.56c.14.17 1.76 2.67 4.25 3.73c.59.27 1.05.42 1.41.53c.59.19 1.13.16 1.56.1c.48-.07 1.46-.6 1.67-1.18c.21-.58.21-1.07.15-1.18c-.07-.1-.23-.16-.48-.27c-.25-.14-1.47-.74-1.69-.82c-.23-.08-.37-.12-.56.12c-.16.25-.64.81-.78.97c-.15.17-.29.19-.53.07c-.26-.13-1.06-.39-2-1.23c-.74-.66-1.23-1.47-1.38-1.72c-.12-.24-.01-.39.11-.5c.11-.11.27-.29.37-.44c.13-.14.17-.25.25-.41c.08-.17.04-.31-.02-.43c-.06-.11-.56-1.35-.77-1.84c-.2-.48-.4-.42-.56-.43c-.14 0-.3-.01-.47-.01Z" />
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Contact Form -->
                <div class="relative">
                    <!-- Form Container -->
                    <div
                        class="relative bg-white/90 dark:bg-gray-900/90 backdrop-blur-lg rounded-3xl p-8 border border-gray-200/50 dark:border-gray-700/50 shadow-2xl">
                        <!-- Animated Border -->
                        <div
                            class="absolute inset-0 bg-gradient-to-r from-cyber-coral via-cyber-blue to-cyber-coral dark:from-cyber-pink dark:via-cyber-cyan dark:to-cyber-pink rounded-3xl opacity-20 blur-sm animate-pulse">
                        </div>

                        <div class="relative z-10">
                            <h2 class="text-3xl font-bold text-gray-900 dark:text-white mb-2">Send Message</h2>
                            <p class="text-gray-600 dark:text-gray-400 mb-8">Tell me about your project and I'll get
                                back to you soon.</p>

                            <!-- Success/Error Messages -->
                            <?php
                            $forms_error   = isset( $_SESSION['forms_error'] ) ? $_SESSION['forms_error'] : array();
                            $forms_success = isset( $_SESSION['forms_success'] ) ? $_SESSION['forms_success'] : array();
                            unset( $_SESSION['forms_error'], $_SESSION['forms_success'] );
                            ?>

                            <?php if ( ! empty( $forms_success ) ) : ?>
                            <?php foreach ( $forms_success as $success ) : ?>
                            <div class="flex items-center justify-between bg-gradient-to-r from-green-400 to-green-600 text-white p-4 mb-6 rounded-2xl shadow-lg"
                                role="alert">
                                <div class="flex items-center">
                                    <svg class="w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                            clip-rule="evenodd" />
                                    </svg>
                                    <p><?php echo esc_html( $success ); ?></p>
                                </div>
                                <button type="button" class="text-white hover:text-gray-200"
                                    onclick="this.parentElement.style.display='none';">×</button>
                            </div>
                            <?php endforeach; ?>
                            <?php endif; ?>

                            <?php if ( ! empty( $forms_error ) ) : ?>
                            <?php foreach ( $forms_error as $error ) : ?>
                            <div class="flex items-center justify-between bg-gradient-to-r from-red-400 to-red-600 text-white p-4 mb-6 rounded-2xl shadow-lg"
                                role="alert">
                                <div class="flex items-center">
                                    <svg class="w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z"
                                            clip-rule="evenodd" />
                                    </svg>
                                    <p><?php echo esc_html( $error ); ?></p>
                                </div>
                                <button type="button" class="text-white hover:text-gray-200"
                                    onclick="this.parentElement.style.display='none';">×</button>
                            </div>
                            <?php endforeach; ?>
                            <?php endif; ?>

                            <!-- Contact Form -->
                            <form id="contact-form" class="space-y-6">
                                <input type="text" name="honeypot" class="hidden">

                                <!-- Name Field -->
                                <div class="relative pb-6">
                                    <input type="text" id="name" name="name" placeholder=" " required
                                        class="peer w-full px-4 py-4 bg-gray-50 dark:bg-gray-800/50 border-2 border-gray-200 dark:border-gray-700 rounded-xl text-gray-900 dark:text-white placeholder-transparent focus:border-cyber-blue dark:focus:border-cyber-cyan focus:outline-none focus:ring-0 transition-all duration-300">
                                    <label for="name"
                                        class="absolute left-4 -top-2.5 bg-white dark:bg-gray-900 px-2 text-sm font-medium text-gray-600 dark:text-gray-400 transition-all duration-300 peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-400 peer-placeholder-shown:top-4 peer-placeholder-shown:bg-transparent peer-focus:-top-2.5 peer-focus:text-sm peer-focus:text-cyber-blue dark:peer-focus:text-cyber-cyan peer-focus:bg-white dark:peer-focus:bg-gray-900">
                                        <?php esc_html_e( 'Full Name *', 'wilson-devops' ); ?>
                                    </label>
                                </div>

                                <!-- Email Field -->
                                <div class="relative pb-6">
                                    <input type="email" id="email" name="email" placeholder=" " required
                                        class="peer w-full px-4 py-4 bg-gray-50 dark:bg-gray-800/50 border-2 border-gray-200 dark:border-gray-700 rounded-xl text-gray-900 dark:text-white placeholder-transparent focus:border-cyber-blue dark:focus:border-cyber-cyan focus:outline-none focus:ring-0 transition-all duration-300">
                                    <label for="email"
                                        class="absolute left-4 -top-2.5 bg-white dark:bg-gray-900 px-2 text-sm font-medium text-gray-600 dark:text-gray-400 transition-all duration-300 peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-400 peer-placeholder-shown:top-4 peer-placeholder-shown:bg-transparent peer-focus:-top-2.5 peer-focus:text-sm peer-focus:text-cyber-blue dark:peer-focus:text-cyber-cyan peer-focus:bg-white dark:peer-focus:bg-gray-900">
                                        <?php esc_html_e( 'Email Address *', 'wilson-devops' ); ?>
                                    </label>
                                </div>

                                <!-- Subject Field -->
                                <div class="relative pb-6">
                                    <input type="text" id="subject" name="subject" placeholder=" "
                                        class="peer w-full px-4 py-4 bg-gray-50 dark:bg-gray-800/50 border-2 border-gray-200 dark:border-gray-700 rounded-xl text-gray-900 dark:text-white placeholder-transparent focus:border-cyber-blue dark:focus:border-cyber-cyan focus:outline-none focus:ring-0 transition-all duration-300">
                                    <label for="subject"
                                        class="absolute left-4 -top-2.5 bg-white dark:bg-gray-900 px-2 text-sm font-medium text-gray-600 dark:text-gray-400 transition-all duration-300 peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-400 peer-placeholder-shown:top-4 peer-placeholder-shown:bg-transparent peer-focus:-top-2.5 peer-focus:text-sm peer-focus:text-cyber-blue dark:peer-focus:text-cyber-cyan peer-focus:bg-white dark:peer-focus:bg-gray-900">
                                        <?php esc_html_e( 'Subject', 'wilson-devops' ); ?>
                                    </label>
                                </div>

                                <!-- Message Field -->
                                <div class="relative pb-6">
                                    <textarea id="message" name="message" rows="5" placeholder=" " required
                                        class="peer w-full px-4 py-4 bg-gray-50 dark:bg-gray-800/50 border-2 border-gray-200 dark:border-gray-700 rounded-xl text-gray-900 dark:text-white placeholder-transparent focus:border-cyber-blue dark:focus:border-cyber-cyan focus:outline-none focus:ring-0 resize-none transition-all duration-300"></textarea>
                                    <label for="message"
                                        class="absolute left-4 -top-2.5 bg-white dark:bg-gray-900 px-2 text-sm font-medium text-gray-600 dark:text-gray-400 transition-all duration-300 peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-400 peer-placeholder-shown:top-4 peer-placeholder-shown:bg-transparent peer-focus:-top-2.5 peer-focus:text-sm peer-focus:text-cyber-blue dark:peer-focus:text-cyber-cyan peer-focus:bg-white dark:peer-focus:bg-gray-900">
                                        <?php esc_html_e( 'Your Message *', 'wilson-devops' ); ?>
                                    </label>
                                </div>

                                <!-- Submit Button -->
                                <button type="submit" id="submit-btn"
                                    class="group relative w-full py-4 px-8 bg-gradient-to-r from-cyber-blue to-cyber-coral dark:from-cyber-cyan dark:to-cyber-pink text-white font-semibold rounded-xl shadow-lg hover:shadow-2xl transform hover:-translate-y-1 transition-all duration-300 overflow-hidden cursor-pointer">
                                    <span class="relative z-10 flex items-center justify-center">
                                        <span id="btn-icon">
                                            <svg class="w-5 h-5 mr-2 group-hover:animate-bounce" fill="none"
                                                stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8" />
                                            </svg>
                                        </span>
                                        <span
                                            id="btn-text"><?php esc_html_e( 'Send Message', 'wilson-devops' ); ?></span>
                                    </span>
                                    <div
                                        class="absolute inset-0 bg-gradient-to-r from-cyber-coral to-cyber-blue dark:from-cyber-pink dark:to-cyber-cyan opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                    </div>
                                </button>
                            </form>
                        </div>
                    </div>

                    <!-- Decorative Elements -->
                    <div
                        class="absolute -top-4 -right-4 w-20 h-20 bg-gradient-to-r from-cyber-coral to-cyber-blue dark:from-cyber-pink dark:to-cyber-cyan rounded-full opacity-30 animate-ping">
                    </div>
                    <div
                        class="absolute -bottom-4 -left-4 w-16 h-16 bg-gradient-to-r from-cyber-blue to-cyber-coral dark:from-cyber-cyan dark:to-cyber-pink rounded-lg rotate-12 opacity-40 animate-pulse">
                    </div>
                </div>
            </div>
        </div>
    </section>

</main>

<?php get_footer(); 