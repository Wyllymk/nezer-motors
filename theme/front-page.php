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

<main
    class="min-h-screen bg-gradient-to-br from-gray-50 to-gray-100 dark:from-gray-950 dark:to-gray-900 transition-all duration-500">

    <!-- Sidebar Navigation -->
    <div id="navMenu" class="transform translate-x-full opacity-0 w-64 py-4 px-4 z-40 fixed md:hidden top-0 h-full 
        bg-cyber-light/90 dark:bg-cyber-dark/90 backdrop-blur-md drop-shadow-cyber-cyan 
        transition-all duration-400 ease-in-out">
        <?php get_template_part('template-parts/content/content', 'aside'); ?>
    </div>

    <!-- Overlay -->
    <div id="overlay" class="fixed inset-0 top-0 h-screen z-30 bg-black/70 hidden"></div>

    <!-- Hero Section with Animated Background -->
    <section class="pt-20 md:pt-0 relative min-h-screen flex items-center justify-center overflow-hidden" id="home">
        <!-- Animated Background Elements -->
        <div class="absolute inset-0 overflow-hidden">
            <div
                class="absolute top-20 left-10 w-32 h-32 bg-gradient-to-r from-cyan-400/20 to-blue-500/20 rounded-full blur-xl animate-pulse">
            </div>
            <div
                class="absolute bottom-20 right-10 w-24 h-24 bg-gradient-to-r from-pink-400/20 to-red-500/20 rounded-full blur-lg animate-bounce">
            </div>
            <div class="absolute top-1/2 left-1/2 w-40 h-40 bg-gradient-to-r from-purple-400/10 to-indigo-500/10 rounded-full blur-2xl animate-pulse"
                style="animation-delay: 1s;"></div>
        </div>

        <!-- Grid Pattern Overlay -->
        <div
            class="absolute inset-0 bg-grid-slate-100/25 dark:bg-grid-slate-700/25 [mask-image:linear-gradient(0deg,white,rgba(255,255,255,0.6))] dark:[mask-image:linear-gradient(0deg,rgba(255,255,255,0.1),rgba(255,255,255,0.5))]">
        </div>

        <div class="container mx-auto px-6 relative z-10">
            <div class="grid lg:grid-cols-2 gap-12 items-center">
                <!-- Content Column -->
                <div class="space-y-8 text-center lg:text-left">
                    <!-- Greeting -->
                    <div
                        class="inline-flex items-center gap-2 px-4 py-2 bg-gradient-to-r from-cyan-500/10 to-blue-600/10 dark:from-cyan-500/20 dark:to-blue-600/20 backdrop-blur-md rounded-full border border-cyan-500/20 dark:border-cyan-500/30 mb-8">
                        <div class="w-2 h-2 bg-green-500 dark:bg-green-400 rounded-full animate-pulse"></div>
                        <span class="text-cyan-700 dark:text-cyan-300 text-sm font-medium">
                            Available for work
                        </span>
                    </div>

                    <!-- Main Heading -->
                    <div class="space-y-4">
                        <h1 class="text-5xl lg:text-7xl font-bold leading-tight">
                            <span
                                class="bg-gradient-to-r from-gray-900 to-gray-600 dark:from-white dark:to-gray-300 bg-clip-text text-transparent">
                                Wilson
                            </span>
                            <br>
                            <span
                                class="bg-gradient-to-r from-cyan-500 to-blue-600 bg-clip-text text-transparent animate-pulse">
                                Mbuthia
                            </span>
                        </h1>

                        <div class="text-xl lg:text-2xl text-gray-600 dark:text-gray-400 space-y-2">
                            <div class="inline-flex items-center gap-2">
                                <span class="w-8 h-0.5 bg-gradient-to-r from-cyan-500 to-blue-600"></span>
                                <span
                                    class="font-semibold bg-gradient-to-r from-cyan-600 to-blue-700 bg-clip-text text-transparent">
                                    Full Stack Developer
                                </span>
                            </div>
                            <p class="leading-relaxed">
                                Creating digital experiences that blend innovation with functionality.
                                Specialized in WordPress, React, and modern web technologies.
                            </p>
                        </div>
                    </div>

                    <!-- CTA Buttons -->
                    <div class="flex flex-col sm:flex-row gap-4 justify-center lg:justify-start">
                        <a href="#projects"
                            class="group px-8 py-4 bg-gradient-to-r from-cyan-500 to-blue-600 text-white rounded-full font-semibold transition-all duration-300 hover:shadow-lg hover:shadow-cyan-500/25 hover:scale-105">
                            View My Work
                            <svg class="w-5 h-5 inline-block ml-2 group-hover:translate-x-1 transition-transform"
                                fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                            </svg>
                        </a>
                        <a href="#contact"
                            class="px-8 py-4 border-2 border-gray-300 dark:border-gray-600 text-gray-700 dark:text-gray-300 rounded-full font-semibold transition-all duration-300 hover:border-cyan-500 hover:text-cyan-600 dark:hover:text-cyan-400">
                            Get In Touch
                        </a>
                    </div>

                    <!-- Social Links -->
                    <div class="flex gap-6 justify-center lg:justify-start pt-8">
                        <?php
                        $social_links = [
                            ['icon' => 'github', 'url' => 'https://github.com/Wyllymk', 'label' => 'GitHub'],
                            ['icon' => 'linkedin', 'url' => 'https://www.linkedin.com/in/wilson-mbuthia-k/', 'label' => 'LinkedIn'],
                            ['icon' => 'twitter', 'url' => 'https://twitter.com/WilsonMbuthiaK', 'label' => 'Twitter'],
                            ['icon' => 'whatsapp', 'url' => 'https://wa.me/+254703639230', 'label' => 'WhatsApp']
                        ];
                        
                        foreach ($social_links as $social): ?>
                        <a href="<?php echo esc_url($social['url']); ?>" target="_blank" rel="noopener noreferrer"
                            class="p-3 bg-gray-100 dark:bg-gray-800/30 backdrop-blur-md rounded-full border border-gray-200 dark:border-gray-700/50 text-gray-600 dark:text-gray-400 hover:text-cyan-500 hover:border-cyan-500/50 transition-all duration-300 hover:scale-110"
                            aria-label="<?php echo esc_attr($social['label']); ?>">
                            <?php if ($social['icon'] === 'github'): ?>
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z" />
                            </svg>
                            <?php elseif ($social['icon'] === 'linkedin'): ?>
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z" />
                            </svg>
                            <?php elseif ($social['icon'] === 'twitter'): ?>
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M8 2H1l8.26 11.014L1.45 22H4.1l6.388-7.349L16 22h7l-8.608-11.478L21.8 2h-2.65l-5.986 6.886L8 2Zm9 18L5 4h2l12 16h-2Z" />
                            </svg>
                            <?php elseif ($social['icon'] === 'whatsapp'): ?>
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893A11.821 11.821 0 0020.531 3.488" />
                            </svg>
                            <?php endif; ?>
                        </a>
                        <?php endforeach; ?>
                    </div>
                </div>

                <!-- Image Column -->
                <div class="relative flex justify-center lg:justify-end">
                    <div class="relative">
                        <!-- Main Image -->
                        <div class="relative w-80 h-80 lg:w-96 lg:h-96">
                            <div
                                class="absolute inset-0 bg-gradient-to-r from-cyan-500 to-blue-600 rounded-full blur-lg opacity-30 animate-pulse">
                            </div>
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/Developer.webp"
                                alt="Wilson Mbuthia - Full Stack Developer"
                                class="relative z-10 w-full h-full object-cover rounded-full border-4 border-white/20 dark:border-gray-800/30 shadow-2xl">
                        </div>

                        <!-- Floating Elements -->
                        <div
                            class="absolute -top-4 -right-4 w-16 h-16 bg-gradient-to-r from-yellow-400 to-orange-500 rounded-lg rotate-12 animate-bounce opacity-90 flex items-center justify-center">
                            <span class="text-2xl">⚡</span>
                        </div>
                        <div
                            class="absolute -bottom-4 -left-4 w-20 h-20 bg-gradient-to-r from-green-400 to-cyan-500 rounded-full animate-pulse opacity-90 flex items-center justify-center">
                            <span class="text-3xl">🚀</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Scroll Indicator -->
            <div class="absolute bottom-8 left-1/2 transform -translate-x-1/2 animate-bounce">
                <div class="w-6 h-10 border-2 border-gray-400 dark:border-gray-600 rounded-full flex justify-center">
                    <div class="w-1 h-3 bg-gray-400 dark:bg-gray-600 rounded-full mt-2 animate-pulse"></div>
                </div>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section class="py-20 bg-white/50 dark:bg-gray-900/50 backdrop-blur-sm" id="about me">
        <div class="container mx-auto px-6">
            <div class="text-center mb-16">
                <h2 class="text-4xl lg:text-5xl font-bold mb-6">
                    <span
                        class="bg-gradient-to-r from-gray-900 to-gray-600 dark:from-white dark:to-gray-300 bg-clip-text text-transparent">
                        About Me
                    </span>
                </h2>
                <div class="w-24 h-1 bg-gradient-to-r from-cyan-500 to-blue-600 mx-auto rounded-full"></div>
            </div>

            <div class="grid lg:grid-cols-2 gap-16 items-center">
                <div class="space-y-6">
                    <p class="text-lg text-gray-600 dark:text-gray-400 leading-relaxed">
                        Experienced Software Developer with expertise in coding and debugging, consistently delivering
                        refined, scalable, production-ready solutions. I specialize in creating modern web applications
                        that combine exceptional user experiences with robust backend functionality.
                    </p>

                    <p class="text-lg text-gray-600 dark:text-gray-400 leading-relaxed">
                        Proficient in Agile and Scrum methodologies, I collaborate effectively with teams to achieve
                        project objectives while maintaining high code quality and performance standards.
                    </p>

                    <!-- Skills Grid -->
                    <div class="grid grid-cols-2 lg:grid-cols-3 gap-4 pt-8">
                        <?php
                        $skills = [
                            ['name' => 'WordPress', 'level' => 95],
                            ['name' => 'PHP', 'level' => 90],
                            ['name' => 'JavaScript', 'level' => 88],
                            ['name' => 'React', 'level' => 85],
                            ['name' => 'TypeScript', 'level' => 82],
                            ['name' => 'Tailwind CSS', 'level' => 92]
                        ];
                        
                        foreach ($skills as $skill): ?>
                        <div
                            class="bg-white/80 dark:bg-gray-800/80 backdrop-blur-sm p-4 rounded-xl border border-gray-200/50 dark:border-gray-700/50 hover:border-cyan-500/50 transition-all duration-300">
                            <div class="text-sm font-semibold text-gray-900 dark:text-white mb-2">
                                <?php echo esc_html($skill['name']); ?>
                            </div>
                            <div class="w-full bg-gray-200 dark:bg-gray-700 rounded-full h-2">
                                <div class="bg-gradient-to-r from-cyan-500 to-blue-600 h-2 rounded-full transition-all duration-1000"
                                    style="width: <?php echo $skill['level']; ?>%"></div>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    </div>
                </div>

                <div class="relative">
                    <div
                        class="bg-gradient-to-br from-cyan-500/10 to-blue-600/10 dark:from-cyan-500/5 dark:to-blue-600/5 p-8 rounded-2xl backdrop-blur-sm border border-white/20 dark:border-gray-800/30">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/Dev.webp"
                            alt="Wilson Mbuthia coding" class="w-full rounded-xl shadow-lg">
                    </div>
                </div>
            </div>

            <!-- Stats/Achievement section for About Me -->
            <div class="grid grid-cols-2 lg:grid-cols-4 gap-8 mt-12">
                <div class="text-center">
                    <div class="text-3xl lg:text-4xl font-bold text-cyan-600 dark:text-cyan-400 mb-2">50+</div>
                    <div class="text-gray-600 dark:text-gray-400">Projects Completed</div>
                </div>
                <div class="text-center">
                    <div class="text-3xl lg:text-4xl font-bold text-cyan-600 dark:text-cyan-400 mb-2">5+</div>
                    <div class="text-gray-600 dark:text-gray-400">Years Experience</div>
                </div>
                <div class="text-center">
                    <div class="text-3xl lg:text-4xl font-bold text-cyan-600 dark:text-cyan-400 mb-2">25+</div>
                    <div class="text-gray-600 dark:text-gray-400">Happy Clients</div>
                </div>
                <div class="text-center">
                    <div class="text-3xl lg:text-4xl font-bold text-cyan-600 dark:text-cyan-400 mb-2">24/7</div>
                    <div class="text-gray-600 dark:text-gray-400">Support Available</div>
                </div>
            </div>

            <div class="text-center mt-12">
                <a href="<?php echo esc_url(home_url('/about-me')); ?>"
                    class="group inline-flex items-center gap-3 px-8 py-4 bg-gradient-to-r from-cyan-500 to-blue-600 text-white rounded-full font-semibold transition-all duration-300 hover:shadow-lg hover:shadow-cyan-500/25 hover:scale-105">
                    Learn More About Me
                    <svg class="w-5 h-5 group-hover:translate-x-1 transition-transform" fill="none"
                        stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                    </svg>
                </a>
            </div>
        </div>
    </section>

    <!-- Services Section -->
    <section class="py-20 bg-gradient-to-br from-gray-50 to-white dark:from-gray-950 dark:to-gray-900" id="services">
        <div class="container mx-auto px-6">
            <div class="text-center mb-16">
                <h2 class="text-4xl lg:text-5xl font-bold mb-6">
                    <span
                        class="bg-gradient-to-r from-gray-900 to-gray-600 dark:from-white dark:to-gray-300 bg-clip-text text-transparent">
                        Services
                    </span>
                </h2>
                <div class="w-24 h-1 bg-gradient-to-r from-cyan-500 to-blue-600 mx-auto rounded-full"></div>
            </div>

            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                <?php
                $services = [
                    [
                        'icon' => '<svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"></path></svg>',
                        'title' => 'Full Stack Development',
                        'description' => 'Building complete web solutions with modern technologies including React, Node.js, and PHP. From concept to deployment, I deliver scalable applications.'
                    ],
                    [
                        'icon' => '<svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4a2 2 0 012 2v12a4 4 0 01-4 4zM21 5a2 2 0 00-2-2h-4a2 2 0 00-2 2v12a4 4 0 004 4h4a2 2 0 002-2V5z"></path></svg>',
                        'title' => 'WordPress Development',
                        'description' => 'Custom WordPress themes and plugins development. Specializing in performance optimization, security, and seamless user experiences.'
                    ],
                    [
                        'icon' => '<svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z"></path></svg>',
                        'title' => 'Responsive Design',
                        'description' => 'Creating mobile-first, responsive designs that work perfectly across all devices and screen sizes using modern CSS frameworks.'
                    ]
                ];
                
                foreach ($services as $index => $service): ?>
                <div class="group relative">
                    <div
                        class="absolute inset-0 bg-gradient-to-r from-cyan-500/10 to-blue-600/10 rounded-2xl blur-xl opacity-0 group-hover:opacity-100 transition-all duration-300">
                    </div>
                    <div
                        class="relative bg-white/80 dark:bg-gray-800/80 backdrop-blur-sm p-8 rounded-2xl border border-gray-200/50 dark:border-gray-700/50 hover:border-cyan-500/50 transition-all duration-300 h-full">
                        <div
                            class="w-16 h-16 bg-gradient-to-r from-cyan-500 to-blue-600 rounded-xl flex items-center justify-center text-white mb-6 group-hover:scale-110 transition-transform duration-300">
                            <?php echo $service['icon']; ?>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-4">
                            <?php echo esc_html($service['title']); ?>
                        </h3>
                        <p class="text-gray-600 dark:text-gray-400 leading-relaxed">
                            <?php echo esc_html($service['description']); ?>
                        </p>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>

            <div class="text-center mt-16">
                <div class="max-w-2xl mx-auto mb-8">
                    <p class="text-lg text-gray-600 dark:text-gray-400">
                        Interested in working together? Explore all my services and let's discuss how I can help bring
                        your vision to life.
                    </p>
                </div>
                <a href="<?php echo esc_url(home_url('/services')); ?>"
                    class="group inline-flex items-center gap-3 px-8 py-4 bg-white dark:bg-gray-800 text-gray-900 dark:text-white border-2 border-gray-200 dark:border-gray-600 rounded-full font-semibold transition-all duration-300 hover:border-cyan-500 hover:text-cyan-600 dark:hover:text-cyan-400 hover:scale-105">
                    View All Services
                    <svg class="w-5 h-5 group-hover:translate-x-1 transition-transform" fill="none"
                        stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                    </svg>
                </a>
            </div>
        </div>
    </section>

    <!-- Technology Stack Section -->
    <section
        class="mt-20 py-16 bg-gradient-to-br from-white/50 to-gray-50/50 dark:from-gray-800/50 dark:to-gray-900/50 backdrop-blur-sm rounded-3xl border border-gray-200/30 dark:border-gray-700/30">
        <div class="text-center mb-12">
            <h3 class="text-3xl lg:text-4xl font-bold mb-4">
                <span
                    class="bg-gradient-to-r from-gray-900 to-gray-600 dark:from-white dark:to-gray-300 bg-clip-text text-transparent">
                    Technology Stack
                </span>
            </h3>
            <div class="w-16 h-1 bg-gradient-to-r from-cyan-500 to-blue-600 mx-auto rounded-full mb-6"></div>
            <p class="text-lg text-gray-600 dark:text-gray-400 max-w-2xl mx-auto">
                I leverage cutting-edge technologies and modern frameworks to build scalable,
                performant applications that deliver exceptional user experiences.
            </p>
        </div>

        <!-- Frontend Technologies -->
        <div class="mb-12">
            <h4 class="text-xl font-semibold text-gray-800 dark:text-gray-200 text-center mb-8">Frontend Technologies
            </h4>
            <div class="grid grid-cols-3 md:grid-cols-6 gap-8 items-center justify-items-center">
                <?php
            $frontend_tech = [
                [
                    'name' => 'HTML5',
                    'image' => 'html-5.008cf296.svg',
                    'color' => 'hover:text-orange-500'
                ],
                [
                    'name' => 'CSS3',
                    'image' => 'css3.png',
                    'color' => 'hover:text-blue-500'
                ],
                [
                    'name' => 'JavaScript',
                    'image' => 'javascript.bf9de660.svg',
                    'color' => 'hover:text-yellow-500'
                ],
                [
                    'name' => 'TypeScript',
                    'image' => 'typescript-icon.svg',
                    'color' => 'hover:text-blue-600'
                ],
                [
                    'name' => 'React',
                    'image' => 'react.png',
                    'color' => 'hover:text-cyan-500'
                ],
                [
                    'name' => 'Tailwind CSS',
                    'image' => 'tailwind-css.41e68952.svg',
                    'color' => 'hover:text-teal-500'
                ]
            ];
            
            foreach ($frontend_tech as $tech): ?>
                <div class="group relative">
                    <div
                        class="w-16 h-16 md:w-20 md:h-20 bg-white dark:bg-gray-800 rounded-2xl shadow-lg flex items-center justify-center transition-all duration-300 group-hover:scale-110 group-hover:shadow-xl <?php echo $tech['color']; ?> border border-gray-200/50 dark:border-gray-700/50 group-hover:border-cyan-500/30">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/<?php echo $tech['image']; ?>"
                            alt="<?php echo esc_attr($tech['name']); ?>"
                            class="w-10 h-10 md:w-12 md:h-12 object-contain <?php echo strpos($tech['name'], 'GitHub') !== false ? 'filter invert dark:invert-0' : ''; ?>">
                    </div>
                    <div
                        class="absolute -bottom-8 left-1/2 transform -translate-x-1/2 opacity-0 group-hover:opacity-100 transition-all duration-300 bg-gray-800 dark:bg-gray-700 text-white text-xs py-1 px-3 rounded-full whitespace-nowrap">
                        <?php echo esc_html($tech['name']); ?>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>

        <!-- Backend Technologies -->
        <div class="mb-12">
            <h4 class="text-xl font-semibold text-gray-800 dark:text-gray-200 text-center mb-8">Backend Technologies
            </h4>
            <div class="grid grid-cols-3 md:grid-cols-5 gap-8 items-center justify-items-center">
                <?php
            $backend_tech = [
                [
                    'name' => 'PHP',
                    'image' => 'php.a1592ac5.svg',
                    'color' => 'hover:text-purple-600'
                ],
                [
                    'name' => 'Node.js',
                    'image' => 'node.png',
                    'color' => 'hover:text-green-600'
                ],
                [
                    'name' => 'MySQL',
                    'image' => 'mysql.c01bedfc.svg',
                    'color' => 'hover:text-blue-600'
                ],
                [
                    'name' => 'WordPress',
                    'image' => 'icons8-wordpress-94.png',
                    'color' => 'hover:text-blue-500'
                ],
                [
                    'name' => 'REST APIs',
                    'image' => 'api.svg',
                    'color' => 'hover:text-green-500'
                ]
            ];
            
            foreach ($backend_tech as $tech): ?>
                <div class="group relative">
                    <div
                        class="w-16 h-16 md:w-20 md:h-20 bg-white dark:bg-gray-800 rounded-2xl shadow-lg flex items-center justify-center transition-all duration-300 group-hover:scale-110 group-hover:shadow-xl <?php echo $tech['color']; ?> border border-gray-200/50 dark:border-gray-700/50 group-hover:border-cyan-500/30">
                        <?php if ($tech['name'] === 'REST APIs'): ?>
                        <svg class="w-10 h-10 md:w-12 md:h-12" fill="currentColor" viewBox="0 0 24 24">
                            <path
                                d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                        </svg>
                        <?php else: ?>
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/<?php echo $tech['image']; ?>"
                            alt="<?php echo esc_attr($tech['name']); ?>"
                            class="w-10 h-10 md:w-12 md:h-12 object-contain">
                        <?php endif; ?>
                    </div>
                    <div
                        class="absolute -bottom-8 left-1/2 transform -translate-x-1/2 opacity-0 group-hover:opacity-100 transition-all duration-300 bg-gray-800 dark:bg-gray-700 text-white text-xs py-1 px-3 rounded-full whitespace-nowrap">
                        <?php echo esc_html($tech['name']); ?>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>

        <!-- Tools & Services -->
        <div class="mb-12">
            <h4 class="text-xl font-semibold text-gray-800 dark:text-gray-200 text-center mb-8">Tools & Services</h4>
            <div class="grid grid-cols-3 md:grid-cols-6 gap-8 items-center justify-items-center">
                <?php
            $tools_tech = [
                [
                    'name' => 'Git',
                    'image' => 'git.png',
                    'color' => 'hover:text-red-500'
                ],
                [
                    'name' => 'GitHub',
                    'image' => 'github.93f8e2ad.svg',
                    'color' => 'hover:text-gray-900 dark:hover:text-white',
                    'invert' => true
                ],
                [
                    'name' => 'AWS',
                    'image' => 'aws.svg',
                    'color' => 'hover:text-orange-500'
                ],
                [
                    'name' => 'Docker',
                    'image' => 'docker.png',
                    'color' => 'hover:text-blue-500'
                ],
                [
                    'name' => 'VS Code',
                    'image' => 'vscode.png',
                    'color' => 'hover:text-blue-600'
                ],
                [
                    'name' => 'Figma',
                    'image' => 'figma.png',
                    'color' => 'hover:text-purple-500'
                ]
            ];
            
            foreach ($tools_tech as $tech): ?>
                <div class="group relative">
                    <div
                        class="w-16 h-16 md:w-20 md:h-20 bg-white dark:bg-gray-800 rounded-2xl shadow-lg flex items-center justify-center transition-all duration-300 group-hover:scale-110 group-hover:shadow-xl <?php echo $tech['color']; ?> border border-gray-200/50 dark:border-gray-700/50 group-hover:border-cyan-500/30">
                        <?php if (isset($tech['invert']) && $tech['invert']): ?>
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/<?php echo $tech['image']; ?>"
                            alt="<?php echo esc_attr($tech['name']); ?>"
                            class="w-10 h-10 md:w-12 md:h-12 object-contain filter invert dark:invert-0">
                        <?php else: ?>
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/<?php echo $tech['image']; ?>"
                            alt="<?php echo esc_attr($tech['name']); ?>"
                            class="w-10 h-10 md:w-12 md:h-12 object-contain">
                        <?php endif; ?>
                    </div>
                    <div
                        class="absolute -bottom-8 left-1/2 transform -translate-x-1/2 opacity-0 group-hover:opacity-100 transition-all duration-300 bg-gray-800 dark:bg-gray-700 text-white text-xs py-1 px-3 rounded-full whitespace-nowrap">
                        <?php echo esc_html($tech['name']); ?>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>

        <!-- Call to Action -->
        <div class="text-center">
            <div
                class="inline-flex items-center gap-2 px-6 py-3 bg-gradient-to-r from-cyan-500/10 to-blue-600/10 backdrop-blur-md rounded-full border border-cyan-500/20 mb-6">
                <svg class="w-5 h-5 text-cyan-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                </svg>
                <span class="text-gray-700 dark:text-gray-300 font-medium">Powered by modern technologies</span>
            </div>

            <p class="text-gray-600 dark:text-gray-400 mb-6 max-w-xl mx-auto">
                Always learning and adapting to the latest technologies to deliver the best solutions for your projects.
            </p>

            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="#projects"
                    class="group inline-flex justify-center items-center gap-2 px-6 py-3 bg-gradient-to-r from-cyan-500 to-blue-600 text-white rounded-full font-medium transition-all duration-300 hover:shadow-lg hover:shadow-cyan-500/25 hover:scale-105">
                    See My Work
                    <svg class="w-4 h-4 group-hover:translate-x-1 transition-transform" fill="none"
                        stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                    </svg>
                </a>
                <a href="#contact"
                    class="group inline-flex justify-center items-center gap-2 px-6 py-3 border-2 border-gray-300 dark:border-gray-600 text-gray-700 dark:text-gray-300 rounded-full font-medium transition-all duration-300 hover:border-cyan-500 hover:text-cyan-600 dark:hover:text-cyan-400">
                    Start a Project
                    <svg class="w-4 h-4 group-hover:translate-x-1 transition-transform" fill="none"
                        stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z">
                        </path>
                    </svg>
                </a>
            </div>
        </div>
    </section>

    <!-- Featured Projects Section -->
    <section class="py-20 bg-white/50 dark:bg-gray-900/50 backdrop-blur-sm" id="projects">
        <div class="container mx-auto px-6">
            <div class="text-center mb-16">
                <h2 class="text-4xl lg:text-5xl font-bold mb-6">
                    <span
                        class="bg-gradient-to-r from-gray-900 to-gray-600 dark:from-white dark:to-gray-300 bg-clip-text text-transparent">
                        Featured Projects
                    </span>
                </h2>
                <div class="w-24 h-1 bg-gradient-to-r from-cyan-500 to-blue-600 mx-auto rounded-full"></div>
            </div>

            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                <?php
                $projects = [
                    [
                        'image' => 'vms.png',
                        'title' => 'Visitor Management System',
                        'description' => 'A comprehensive visitor management platform built with WordPress and custom PHP. Features real-time check-ins, automated notifications, and detailed reporting.',
                        'url' => 'https://vms.nyericlub.co.ke',
                        'tech' => ['WordPress', 'PHP', 'MySQL', 'JavaScript']
                    ],
                    [
                        'image' => 'fundedway.png',
                        'title' => 'The Funded Way',
                        'description' => 'Advanced prop trading platform with instant challenges up to $100K, custom payment processing, and affiliate tracking system.',
                        'url' => 'https://thefundedway.com',
                        'tech' => ['WordPress', 'WooCommerce', 'Custom PHP', 'API Integration']
                    ],
                    [
                        'image' => 'torus.png',
                        'title' => 'Torus Africa',
                        'description' => 'Modern web design agency website showcasing services, portfolio, and client testimonials with advanced animations and interactions.',
                        'url' => 'https://torus.africa',
                        'tech' => ['WordPress', 'Custom Theme', 'JavaScript', 'CSS Animations']
                    ]
                ];
                
                foreach ($projects as $project): ?>
                <div
                    class="group relative overflow-hidden rounded-2xl bg-white dark:bg-gray-800 border border-gray-200/50 dark:border-gray-700/50 hover:border-cyan-500/50 transition-all duration-300">
                    <div class="relative overflow-hidden">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/<?php echo $project['image']; ?>"
                            alt="<?php echo esc_attr($project['title']); ?>"
                            class="w-full h-48 object-cover group-hover:scale-110 transition-transform duration-500"
                            loading="lazy">
                        <div
                            class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                        </div>
                        <a href="<?php echo esc_url($project['url']); ?>" target="_blank" rel="noopener noreferrer"
                            class="absolute inset-0 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                            <span
                                class="px-6 py-3 bg-white/90 text-gray-900 rounded-full font-semibold shadow-lg hover:bg-white transition-colors">
                                View Project
                            </span>
                        </a>
                    </div>

                    <div class="p-6">
                        <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-3">
                            <?php echo esc_html($project['title']); ?>
                        </h3>
                        <p class="text-gray-600 dark:text-gray-400 mb-4">
                            <?php echo esc_html($project['description']); ?>
                        </p>

                        <div class="flex flex-wrap gap-2">
                            <?php foreach ($project['tech'] as $tech): ?>
                            <span
                                class="px-3 py-1 bg-gray-100 dark:bg-gray-700 text-gray-700 dark:text-gray-300 text-sm rounded-full">
                                <?php echo esc_html($tech); ?>
                            </span>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>

            <div class="text-center mt-16">
                <div class="max-w-2xl mx-auto mb-8">
                    <p class="text-lg text-gray-600 dark:text-gray-400">
                        These are just a few highlights from my portfolio. Check out my complete collection of projects
                        and case studies.
                    </p>
                </div>
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <a href="<?php echo esc_url(site_url('/projects')); ?>"
                        class="group inline-flex justify-center items-center gap-3 px-8 py-4 bg-gradient-to-r from-cyan-500 to-blue-600 text-white rounded-full font-semibold transition-all duration-300 hover:shadow-lg hover:shadow-cyan-500/25 hover:scale-105">
                        View All Projects
                        <svg class="w-5 h-5 group-hover:translate-x-1 transition-transform" fill="none"
                            stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                        </svg>
                    </a>
                    <a href="https://github.com/Wyllymk" target="_blank" rel="noopener noreferrer"
                        class="group inline-flex justify-center items-center gap-3 px-8 py-4 border-2 border-gray-300 dark:border-gray-600 text-gray-700 dark:text-gray-300 rounded-full font-semibold transition-all duration-300 hover:border-cyan-500 hover:text-cyan-600 dark:hover:text-cyan-400 hover:scale-105">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                            <path
                                d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z" />
                        </svg>
                        View on GitHub
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact CTA Section -->
    <section
        class="py-20 bg-gradient-to-br from-cyber-light via-white to-gray-100 dark:from-gray-950 dark:via-black dark:to-gray-900 relative overflow-hidden"
        id="contact">
        <!-- Animated Background Elements -->
        <div class="absolute inset-0 overflow-hidden z-0">
            <!-- Floating Particles -->
            <div
                class="absolute top-20 left-10 w-2 h-2 bg-cyan-500 dark:bg-cyan-400 rounded-full animate-ping opacity-40 dark:opacity-60">
            </div>
            <div
                class="absolute top-40 right-20 w-3 h-3 bg-blue-600 dark:bg-blue-500 rounded-full animate-pulse opacity-30 dark:opacity-50">
            </div>
            <div
                class="absolute bottom-40 left-20 w-1 h-1 bg-purple-600 dark:bg-purple-400 rounded-full animate-bounce opacity-50 dark:opacity-70">
            </div>
            <div class="absolute bottom-20 right-40 w-2 h-2 bg-pink-600 dark:bg-pink-400 rounded-full animate-ping opacity-25 dark:opacity-40"
                style="animation-delay: 1s;"></div>

            <!-- Gradient Orbs -->
            <div
                class="absolute -top-40 -left-40 w-80 h-80 bg-gradient-to-r from-cyan-500/10 to-blue-600/10 dark:from-cyan-500/20 dark:to-blue-600/20 rounded-full blur-3xl animate-pulse">
            </div>
            <div class="absolute -bottom-40 -right-40 w-96 h-96 bg-gradient-to-r from-purple-500/8 to-pink-600/8 dark:from-purple-500/15 dark:to-pink-600/15 rounded-full blur-3xl animate-pulse"
                style="animation-delay: 2s;"></div>

            <!-- Geometric Shapes -->
            <div class="absolute top-1/4 right-1/4 w-6 h-6 border-2 border-cyan-500/20 dark:border-cyan-400/30 rotate-45 animate-spin opacity-40 dark:opacity-60"
                style="animation-duration: 8s;"></div>
            <div class="absolute bottom-1/3 left-1/4 w-4 h-4 bg-gradient-to-r from-blue-500 to-purple-600 dark:from-blue-400 dark:to-purple-500 rotate-12 animate-bounce opacity-30 dark:opacity-50"
                style="animation-delay: 1.5s;"></div>
        </div>

        <div class="container mx-auto px-6 relative z-10">
            <!-- Main CTA Content -->
            <div class="text-center max-w-4xl mx-auto mb-16">
                <div
                    class="inline-flex items-center gap-2 px-4 py-2 bg-gradient-to-r from-cyan-500/10 to-blue-600/10 dark:from-cyan-500/20 dark:to-blue-600/20 backdrop-blur-md rounded-full border border-cyan-500/20 dark:border-cyan-500/30 mb-8">
                    <div class="w-2 h-2 bg-green-500 dark:bg-green-400 rounded-full animate-pulse"></div>
                    <span class="text-cyan-700 dark:text-cyan-300 text-sm font-medium">Ready to collaborate</span>
                </div>

                <h2 class="text-4xl lg:text-6xl font-bold mb-6 leading-tight">
                    <span
                        class="bg-gradient-to-r from-gray-900 via-gray-800 to-gray-700 dark:from-white dark:via-gray-200 dark:to-gray-300 bg-clip-text text-transparent">
                        Let's Build Something
                    </span>
                    <br>
                    <span
                        class="bg-gradient-to-r from-cyan-600 via-blue-600 to-purple-700 dark:from-cyan-400 dark:via-blue-500 dark:to-purple-600 bg-clip-text text-transparent">
                        Extraordinary Together
                    </span>
                </h2>

                <p class="text-xl text-gray-700 dark:text-gray-300 mb-12 leading-relaxed max-w-2xl mx-auto">
                    Ready to transform your ideas into digital reality? I'm here to help you create
                    exceptional web experiences that drive results and captivate your audience.
                </p>

                <!-- Primary CTA Button -->
                <div class="mb-16">
                    <a href="<?php echo esc_url(site_url('/contact')); ?>"
                        class="group inline-flex items-center gap-3 px-10 py-5 bg-gradient-to-r from-cyan-500 to-blue-600 text-white text-lg font-semibold rounded-full transition-all duration-300 hover:shadow-2xl hover:shadow-cyan-500/30 hover:scale-105 transform">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z">
                            </path>
                        </svg>
                        Start Your Project
                        <svg class="w-5 h-5 group-hover:translate-x-1 transition-transform" fill="none"
                            stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                        </svg>
                    </a>
                </div>
            </div>

            <!-- Contact Information Cards -->
            <div class="grid md:grid-cols-3 gap-8 max-w-5xl mx-auto">
                <!-- Email Card -->
                <div class="group relative">
                    <div
                        class="absolute inset-0 bg-gradient-to-r from-cyan-500/5 to-blue-600/5 dark:from-cyan-500/10 dark:to-blue-600/10 rounded-2xl blur-xl opacity-0 group-hover:opacity-100 transition-all duration-300">
                    </div>
                    <div
                        class="relative bg-white/80 dark:bg-white/5 backdrop-blur-md p-8 rounded-2xl border border-gray-200/60 dark:border-white/10 hover:border-cyan-500/40 dark:hover:border-cyan-500/30 hover:shadow-lg dark:hover:shadow-none transition-all duration-300 text-center">
                        <!-- Icon -->
                        <div
                            class="w-16 h-16 bg-gradient-to-r from-cyan-500 to-blue-600 rounded-full flex items-center justify-center mx-auto mb-6 group-hover:scale-110 transition-transform duration-300 shadow-lg">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                                </path>
                            </svg>
                        </div>

                        <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-2">Email Me</h3>
                        <p class="text-gray-600 dark:text-gray-400 mb-4">For project inquiries and collaborations</p>

                        <a href="mailto:wilsonkabatha@gmail.com"
                            class="inline-flex items-center gap-2 text-cyan-600 dark:text-cyan-400 hover:text-cyan-700 dark:hover:text-cyan-300 font-medium transition-colors group/link">
                            wilsonkabatha@gmail.com
                            <svg class="w-4 h-4 group-hover/link:translate-x-1 transition-transform" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14">
                                </path>
                            </svg>
                        </a>

                        <!-- Quick Action Button -->
                        <div class="mt-6">
                            <a href="mailto:wilsonkabatha@gmail.com"
                                class="inline-flex items-center gap-2 px-6 py-3 bg-gray-100 dark:bg-white/10 hover:bg-gray-200 dark:hover:bg-white/20 text-gray-800 dark:text-white rounded-full text-sm font-medium transition-all duration-300 border border-gray-200 dark:border-white/20 hover:border-cyan-500/50">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"></path>
                                </svg>
                                Send Email
                            </a>
                        </div>
                    </div>
                </div>

                <!-- WhatsApp Card -->
                <div class="group relative">
                    <div
                        class="absolute inset-0 bg-gradient-to-r from-green-500/5 to-cyan-600/5 dark:from-green-500/10 dark:to-cyan-600/10 rounded-2xl blur-xl opacity-0 group-hover:opacity-100 transition-all duration-300">
                    </div>
                    <div
                        class="relative bg-white/80 dark:bg-white/5 backdrop-blur-md p-8 rounded-2xl border border-gray-200/60 dark:border-white/10 hover:border-green-500/40 dark:hover:border-green-500/30 hover:shadow-lg dark:hover:shadow-none transition-all duration-300 text-center">
                        <!-- Icon -->
                        <div
                            class="w-16 h-16 bg-gradient-to-r from-green-500 to-cyan-600 rounded-full flex items-center justify-center mx-auto mb-6 group-hover:scale-110 transition-transform duration-300 shadow-lg">
                            <svg class="w-8 h-8 text-white" fill="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893A11.821 11.821 0 0020.531 3.488" />
                            </svg>
                        </div>

                        <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-2">WhatsApp</h3>
                        <p class="text-gray-600 dark:text-gray-400 mb-4">Quick chat and instant responses</p>

                        <div class="text-green-600 dark:text-green-400 font-medium mb-1">+254 703 639230</div>
                        <div class="text-gray-500 dark:text-gray-500 text-sm mb-4">Available 9 AM - 6 PM EAT</div>

                        <!-- Quick Action Button -->
                        <div class="mt-6">
                            <a href="https://wa.me/+254703639230?text=Hi%20Wilson,%20I'd%20like%20to%20discuss%20a%20project"
                                target="_blank" rel="noopener noreferrer"
                                class="inline-flex items-center gap-2 px-6 py-3 bg-gray-100 dark:bg-white/10 hover:bg-gray-200 dark:hover:bg-white/20 text-gray-800 dark:text-white rounded-full text-sm font-medium transition-all duration-300 border border-gray-200 dark:border-white/20 hover:border-green-500/50">
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                                    <path
                                        d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347" />
                                </svg>
                                Start Chat
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Location & Meeting Card -->
                <div class="group relative">
                    <div
                        class="absolute inset-0 bg-gradient-to-r from-purple-500/5 to-pink-600/5 dark:from-purple-500/10 dark:to-pink-600/10 rounded-2xl blur-xl opacity-0 group-hover:opacity-100 transition-all duration-300">
                    </div>
                    <div
                        class="relative bg-white/80 dark:bg-white/5 backdrop-blur-md p-8 rounded-2xl border border-gray-200/60 dark:border-white/10 hover:border-purple-500/40 dark:hover:border-purple-500/30 hover:shadow-lg dark:hover:shadow-none transition-all duration-300 text-center">
                        <!-- Icon -->
                        <div
                            class="w-16 h-16 bg-gradient-to-r from-purple-500 to-pink-600 rounded-full flex items-center justify-center mx-auto mb-6 group-hover:scale-110 transition-transform duration-300 shadow-lg">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z">
                                </path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            </svg>
                        </div>

                        <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-2">Let's Meet</h3>
                        <p class="text-gray-600 dark:text-gray-400 mb-4">Virtual or in-person consultations</p>

                        <div class="text-purple-600 dark:text-purple-400 font-medium mb-1">Nairobi, Kenya</div>
                        <div class="text-gray-500 dark:text-gray-500 text-sm mb-4">Remote work worldwide</div>

                        <!-- Quick Action Button -->
                        <div class="mt-6">
                            <a href="<?php echo esc_url(site_url('/contact')); ?>"
                                class="inline-flex items-center gap-2 px-6 py-3 bg-gray-100 dark:bg-white/10 hover:bg-gray-200 dark:hover:bg-white/20 text-gray-800 dark:text-white rounded-full text-sm font-medium transition-all duration-300 border border-gray-200 dark:border-white/20 hover:border-purple-500/50">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M8 7V3a2 2 0 012-2h4a2 2 0 012 2v4m-6 8h6m-6 4h6m2-16v20a2 2 0 01-2 2H6a2 2 0 01-2-2V3a2 2 0 012-2h12a2 2 0 012 2z">
                                    </path>
                                </svg>
                                Schedule Call
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Social Links & Additional CTAs -->
        <div class="mt-16 text-center relative z-10">
            <div class="mb-8">
                <p class="text-gray-400 mb-6">Or connect with me on social media</p>

                <div class="flex justify-center gap-4">
                    <?php
                    $social_platforms = [
                        [
                            'name' => 'LinkedIn',
                            'url'  => 'https://www.linkedin.com/in/wilson-mbuthia-k/',
                            'icon' => '<path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/>',
                            'hover' => 'hover:bg-[#0077b5] hover:drop-shadow-[var(--drop-shadow-cyber-blue)]',
                        ],
                        [
                            'name' => 'GitHub',
                            'url'  => 'https://github.com/Wyllymk',
                            'icon' => '<path d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z"/>',
                            'hover' => 'hover:bg-gray-900 hover:drop-shadow-[var(--drop-shadow-cyber-purple)]',
                        ],
                        [
                            'name' => 'Twitter',
                            'url'  => 'https://twitter.com/WilsonMbuthiaK',
                            'icon' => '<path d="M8 2H1l8.26 11.014L1.45 22H4.1l6.388-7.349L16 22h7l-8.608-11.478L21.8 2h-2.65l-5.986 6.886L8 2Zm9 18L5 4h2l12 16h-2Z"/>',
                            'hover' => 'hover:bg-[#1DA1F2] hover:drop-shadow-[var(--drop-shadow-cyber-cyan)]',
                        ],
                    ];

                    foreach ($social_platforms as $platform): ?>
                    <a href="<?php echo esc_url($platform['url']); ?>" target="_blank" rel="noopener noreferrer"
                        class="group p-3 bg-gray-200 dark:bg-gray-800 rounded-full border border-gray-300/50 dark:border-gray-600/50 transition-all duration-300 ease-out <?php echo $platform['hover']; ?>"
                        aria-label="<?php echo esc_attr($platform['name']); ?>">
                        <svg class="w-6 h-6 text-gray-600 dark:text-gray-300 group-hover:text-white transition-colors"
                            fill="currentColor" viewBox="0 0 24 24">
                            <?php echo $platform['icon']; ?>
                        </svg>
                    </a>
                    <?php endforeach; ?>
                </div>

            </div>

            <!-- Response Time Indicator -->
            <div
                class="inline-flex items-center gap-2 px-4 py-2 bg-white/5 backdrop-blur-md rounded-full border border-white/10">
                <div class="w-2 h-2 bg-green-400 rounded-full animate-pulse"></div>
                <span class="text-gray-300 text-sm">Typically responds within 24 hours</span>
            </div>
        </div>
        </div>

        <!-- Bottom Wave Effect -->
        <div
            class="absolute bottom-0 left-0 right-0 h-20 bg-gradient-to-t from-white dark:from-gray-950 to-transparent">
        </div>
    </section>

</main>

<?php get_footer();