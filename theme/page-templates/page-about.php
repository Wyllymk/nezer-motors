<?php
/**
 * The template for displaying the about-me page
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Nezer_Motors
 */
defined('ABSPATH') || exit;

get_header();
?>

<main
    class="min-h-screen bg-cyber-light dark:bg-cyber-dark transition-colors duration-400 ease-in-out overflow-x-hidden">

    <!-- Sidebar Navigation (Mobile) -->
    <div id="navMenu" class="transform translate-x-full opacity-0 w-64 py-4 px-4 z-40 fixed md:hidden top-0 h-full 
        bg-cyber-light/90 dark:bg-cyber-dark/90 backdrop-blur-md drop-shadow-cyber-cyan 
        transition-all duration-400 ease-in-out">
        <?php get_template_part('template-parts/content/content', 'aside'); ?>
    </div>

    <!-- Overlay -->
    <div id="overlay" class="fixed inset-0 top-0 h-screen z-30 bg-black/70 hidden"></div>

    <!-- Hero Section -->
    <section
        class="pt-20 md:pt-0 min-h-screen flex items-center justify-center relative overflow-hidden bg-gradient-to-br from-cyber-light via-white to-gray-100 dark:from-cyber-dark dark:via-gray-900 dark:to-black">
        <!-- Animated Code Background -->
        <div class="absolute inset-0 opacity-25 md:opacity-50 overflow-hidden">
            <div class="absolute top-20 left-10 animate-pulse">
                <pre class="text-cyber-cyan text-sm font-mono transform rotate-12">
                    <code>
                    const developer = {
                        name: "Wilson",
                        passion: "innovation",
                        status: "coding..."
                    };
                    </code>
                </pre>
            </div>
            <div class="absolute top-70 md:top-40 right-20 animate-bounce">
                <pre class="text-cyber-pink text-xs font-mono transform -rotate-6">
                    <code>
                        &lt;div className="creative-mind"&gt;
                            &lt;h1&gt;Building Dreams&lt;/h1&gt;
                        &lt;/div&gt;
                    </code>
                </pre>
            </div>
            <div class="absolute bottom-155 md:bottom-52 left-0 md:left-42 animate-pulse">
                <pre class="text-cyber-blue text-sm font-mono transform rotate-6">
                    <code>
                    function createMagic() {
                        return code + creativity;
                    }
                    </code>
                </pre>
            </div>
        </div>

        <div class="container mx-auto px-4 z-10 relative">
            <div class="grid lg:grid-cols-2 gap-12 items-center max-w-7xl mx-auto">
                <!-- Left Content -->
                <div class="space-y-8 text-center lg:text-left">
                    <div class="space-y-2">
                        <div class="inline-block px-4 py-2 bg-gradient-to-r from-cyber-cyan/20 to-cyber-blue/20 
                            backdrop-blur-sm rounded-full text-cyber-blue dark:text-cyber-cyan font-manrope text-sm font-semibold
                            border border-cyber-cyan/30 mb-4">
                            👋 Software Developer & Problem Solver
                        </div>

                        <h1
                            class="font-nico text-5xl md:text-7xl lg:text-8xl font-black uppercase tracking-tight leading-tight">
                            <span class="block text-text-light dark:text-text-dark">Hey, I'm</span>
                            <span class="block bg-gradient-to-r from-cyber-blue via-cyber-cyan to-cyber-pink 
                                bg-clip-text text-transparent animate-pulse">Wilson</span>
                        </h1>
                    </div>

                    <div class="space-y-6">
                        <p
                            class="font-manrope text-xl md:text-2xl text-text-light-muted dark:text-text-dark-muted leading-relaxed">
                            A software developer crafting scalable, pixel-perfect solutions with a passion for
                            innovation and turning complex problems into elegant digital experiences.
                        </p>

                        <blockquote class="relative">
                            <div
                                class="absolute -left-4 top-0 text-6xl text-cyber-coral/30 dark:text-cyber-pink/30 font-serif">
                                "</div>
                            <p
                                class="font-satisfy text-2xl md:text-3xl text-cyber-coral dark:text-cyber-pink italic pl-8">
                                Code is my canvas, and tech is my palette.
                            </p>
                        </blockquote>
                    </div>

                    <div class="flex flex-col sm:flex-row gap-4 justify-center lg:justify-start">
                        <a href="<?php echo esc_url(site_url('/contact/')); ?>" class="group px-8 py-4 bg-gradient-to-r from-cyber-blue to-cyber-coral 
                            dark:from-cyber-cyan dark:to-cyber-pink text-white font-manrope font-semibold rounded-full
                            hover:scale-105 transition-all duration-300 drop-shadow-cyber-cyan
                            relative overflow-hidden">
                            <span class="relative z-10">Get in Touch</span>
                            <div
                                class="absolute inset-0 bg-white/20 transform translate-y-full group-hover:translate-y-0 transition-transform duration-300">
                            </div>
                        </a>

                        <a href="#journey" class="px-8 py-4 border-2 border-cyber-blue dark:border-cyber-cyan text-cyber-blue dark:text-cyber-cyan
                            font-manrope font-semibold rounded-full hover:bg-cyber-blue hover:text-white
                            dark:hover:bg-cyber-cyan dark:hover:text-cyber-dark
                            transition-all duration-300">
                            My Story
                        </a>
                    </div>
                </div>

                <!-- Right Content - Profile Image -->
                <div class="relative flex justify-center lg:justify-end">
                    <div class="relative group">
                        <!-- Floating Elements -->
                        <div class="absolute -top-8 -left-8 w-16 h-16 bg-cyber-cyan/20 rounded-full animate-pulse">
                        </div>
                        <div class="absolute -bottom-6 -right-6 w-12 h-12 bg-cyber-pink/20 rounded-full animate-bounce">
                        </div>
                        <div class="absolute top-1/2 -left-12 w-8 h-8 bg-cyber-blue/20 rounded-full animate-ping"></div>

                        <!-- Main Image -->
                        <div class="relative overflow-hidden rounded-2xl border-4 border-cyber-cyan/50 
                            group-hover:border-cyber-cyan transition-all duration-500 
                            shadow-2xl group-hover:shadow-cyber-cyan/50">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/Dev.webp" alt="Wilson"
                                class="w-full max-w-md h-auto object-cover group-hover:scale-105 transition-transform duration-500" />

                            <!-- Overlay -->
                            <div class="absolute inset-0 bg-gradient-to-t from-cyber-dark/50 via-transparent to-transparent 
                                opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Journey Timeline Section -->
    <section id="journey"
        class="py-20 bg-gradient-to-b from-white to-gray-50 dark:from-gray-900 dark:to-cyber-dark relative">
        <div class="container mx-auto px-4 max-w-6xl">
            <div class="text-center mb-16">
                <h2
                    class="font-nico text-4xl md:text-6xl font-black uppercase text-cyber-blue dark:text-cyber-cyan mb-6">
                    <?php esc_html_e('My Developer Journey', 'wilson-devops'); ?>
                </h2>
                <div class="w-24 h-1 bg-gradient-to-r from-cyber-cyan to-cyber-pink mx-auto mb-6"></div>
                <p class="font-manrope text-lg text-text-light-muted dark:text-text-dark-muted max-w-2xl mx-auto">
                    <?php esc_html_e('From curious beginner to full-stack developer - every line of code tells a story', 'wilson-devops'); ?>
                </p>
            </div>

            <!-- Timeline Container -->
            <div class="relative">
                <!-- Central Timeline Line -->
                <div class="absolute left-1/2 transform -translate-x-1/2 w-1 h-full bg-gradient-to-b 
                    from-cyber-cyan via-cyber-pink to-cyber-blue rounded-full"></div>

                <div class="space-y-16">
                    <!-- 2018 - First Lines of Code -->
                    <div class="relative flex items-center">
                        <div class="w-full md:w-1/2 pr-8 text-right">
                            <div class="bg-white dark:bg-gray-800 p-6 rounded-2xl shadow-lg border border-gray-200 dark:border-gray-700
                                hover:shadow-2xl hover:border-cyber-cyan dark:hover:border-cyber-cyan
                                transition-all duration-500 transform hover:-translate-y-2">
                                <div class="mb-3">
                                    <span
                                        class="inline-block px-3 py-1 bg-cyber-cyan/10 text-cyber-cyan rounded-full text-xs font-semibold">
                                        2018
                                    </span>
                                </div>
                                <h3 class="font-oswald text-xl font-bold text-cyber-blue dark:text-cyber-cyan mb-2">
                                    <?php esc_html_e('First Lines of Code', 'wilson-devops'); ?>
                                </h3>
                                <p class="font-manrope text-text-light-muted dark:text-text-dark-muted">
                                    <?php esc_html_e('Started with HTML/CSS, building static sites for fun and discovering the magic of bringing designs to life.', 'wilson-devops'); ?>
                                </p>
                            </div>
                        </div>

                        <!-- Timeline Dot -->
                        <div class="absolute left-1/2 transform -translate-x-1/2 w-6 h-6 bg-cyber-cyan 
                            rounded-full border-4 border-white dark:border-gray-800 z-10 
                            shadow-lg hover:scale-125 transition-transform duration-300"></div>

                        <div class="w-none md:w-1/2 pl-8"></div>
                    </div>

                    <!-- 2020 - JavaScript & Beyond -->
                    <div class="relative flex items-center">
                        <div class="w-none md:w-1/2 pr-8"></div>

                        <div class="absolute left-1/2 transform -translate-x-1/2 w-6 h-6 bg-cyber-pink 
                            rounded-full border-4 border-white dark:border-gray-800 z-10 
                            shadow-lg hover:scale-125 transition-transform duration-300"></div>

                        <div class="w-full md:w-1/2 pl-8">
                            <div class="bg-white dark:bg-gray-800 p-6 rounded-2xl shadow-lg border border-gray-200 dark:border-gray-700
                                hover:shadow-2xl hover:border-cyber-pink dark:hover:border-cyber-pink
                                transition-all duration-500 transform hover:-translate-y-2">
                                <div class="mb-3">
                                    <span
                                        class="inline-block px-3 py-1 bg-cyber-pink/10 text-cyber-pink rounded-full text-xs font-semibold">
                                        2020
                                    </span>
                                </div>
                                <h3 class="font-oswald text-xl font-bold text-cyber-blue dark:text-cyber-cyan mb-2">
                                    <?php esc_html_e('JavaScript & Beyond', 'wilson-devops'); ?>
                                </h3>
                                <p class="font-manrope text-text-light-muted dark:text-text-dark-muted">
                                    <?php esc_html_e('Dived into JS, React, and Node.js, delivering dynamic applications and learning the power of interactive web experiences.', 'wilson-devops'); ?>
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- 2022 - WordPress Ninja -->
                    <div class="relative flex items-center">
                        <div class="w-full md:w-1/2 pr-8 text-right">
                            <div class="bg-white dark:bg-gray-800 p-6 rounded-2xl shadow-lg border border-gray-200 dark:border-gray-700
                                hover:shadow-2xl hover:border-cyber-blue dark:hover:border-cyber-blue
                                transition-all duration-500 transform hover:-translate-y-2">
                                <div class="mb-3">
                                    <span
                                        class="inline-block px-3 py-1 bg-cyber-blue/10 text-cyber-blue rounded-full text-xs font-semibold">
                                        2022
                                    </span>
                                </div>
                                <h3 class="font-oswald text-xl font-bold text-cyber-blue dark:text-cyber-cyan mb-2">
                                    <?php esc_html_e('WordPress Ninja', 'wilson-devops'); ?>
                                </h3>
                                <p class="font-manrope text-text-light-muted dark:text-text-dark-muted">
                                    <?php esc_html_e('Mastered PHP and WordPress, creating custom themes and plugins that bridge creativity with functionality.', 'wilson-devops'); ?>
                                </p>
                            </div>
                        </div>

                        <div class="absolute left-1/2 transform -translate-x-1/2 w-6 h-6 bg-cyber-blue 
                            rounded-full border-4 border-white dark:border-gray-800 z-10 
                            shadow-lg hover:scale-125 transition-transform duration-300"></div>

                        <div class="w-none md:w-1/2 pl-8"></div>
                    </div>

                    <!-- 2025 - Full-Stack Visionary -->
                    <div class="relative flex items-center">
                        <div class="w-none md:w-1/2 pr-8"></div>

                        <div class="absolute left-1/2 transform -translate-x-1/2 w-6 h-6 bg-green-500 
                            rounded-full border-4 border-white dark:border-gray-800 z-10 
                            shadow-lg hover:scale-125 transition-transform duration-300"></div>

                        <div class="w-full md:w-1/2 pl-8">
                            <div class="bg-white dark:bg-gray-800 p-6 rounded-2xl shadow-lg border border-gray-200 dark:border-gray-700
                                hover:shadow-2xl hover:border-green-500 dark:hover:border-green-500
                                transition-all duration-500 transform hover:-translate-y-2">
                                <div class="mb-3">
                                    <span
                                        class="inline-block px-3 py-1 bg-green-500/10 text-green-500 rounded-full text-xs font-semibold">
                                        2025
                                    </span>
                                </div>
                                <h3 class="font-oswald text-xl font-bold text-cyber-blue dark:text-cyber-cyan mb-2">
                                    <?php esc_html_e('Full-Stack Visionary', 'wilson-devops'); ?>
                                </h3>
                                <p class="font-manrope text-text-light-muted dark:text-text-dark-muted">
                                    <?php esc_html_e('Building scalable solutions with TypeScript, Strapi, and modern architectures that solve real-world problems.', 'wilson-devops'); ?>
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- 2026 - Open Source Advocate -->
                    <div class="relative flex items-center">
                        <div class="w-full md:w-1/2 pr-8 text-right">
                            <div class="bg-white dark:bg-gray-800 p-6 rounded-2xl shadow-lg border border-gray-200 dark:border-gray-700
                                hover:shadow-2xl hover:border-purple-500 dark:hover:border-purple-500
                                transition-all duration-500 transform hover:-translate-y-2">
                                <div class="mb-3">
                                    <span
                                        class="inline-block px-3 py-1 bg-purple-500/10 text-purple-500 rounded-full text-xs font-semibold">
                                        2026
                                    </span>
                                </div>
                                <h3 class="font-oswald text-xl font-bold text-cyber-blue dark:text-cyber-cyan mb-2">
                                    <?php esc_html_e('Open Source Advocate', 'wilson-devops'); ?>
                                </h3>
                                <p class="font-manrope text-text-light-muted dark:text-text-dark-muted">
                                    <?php esc_html_e('Contributing to the community with tools and libraries that help developers build better, faster.', 'wilson-devops'); ?>
                                </p>
                            </div>
                        </div>

                        <div class="absolute left-1/2 transform -translate-x-1/2 w-6 h-6 bg-purple-500 
                            rounded-full border-4 border-white dark:border-gray-800 z-10 
                            shadow-lg hover:scale-125 transition-transform duration-300"></div>

                        <div class="w-none md:w-1/2 pl-8"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Tech Stack Section -->
    <section class="py-20 bg-gradient-to-r from-cyber-light to-white dark:from-cyber-dark dark:to-gray-900">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16">
                <h2
                    class="font-nico text-4xl md:text-6xl font-black uppercase text-cyber-blue dark:text-cyber-cyan mb-6">
                    <?php esc_html_e('My Tech Arsenal', 'wilson-devops'); ?>
                </h2>
                <div class="w-24 h-1 bg-gradient-to-r from-cyber-cyan to-cyber-pink mx-auto mb-6"></div>
                <p class="font-manrope text-lg text-text-light-muted dark:text-text-dark-muted max-w-2xl mx-auto">
                    <?php esc_html_e('The tools and technologies I use to bring ideas to life', 'wilson-devops'); ?>
                </p>
            </div>

            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6" x-data="{ hoveredSkill: null }">
                <?php
                $skills = [
                    ['name' => 'HTML', 'level' => 95, 'color' => 'orange'],
                    ['name' => 'CSS', 'level' => 90, 'color' => 'blue'],
                    ['name' => 'JavaScript', 'level' => 88, 'color' => 'yellow'],
                    ['name' => 'TypeScript', 'level' => 82, 'color' => 'blue'],
                    ['name' => 'React', 'level' => 85, 'color' => 'cyan'],
                    ['name' => 'Git & Github', 'level' => 87, 'color' => 'gray'],
                    ['name' => 'SCSS', 'level' => 88, 'color' => 'pink'],
                    ['name' => 'Tailwind', 'level' => 92, 'color' => 'teal'],
                    ['name' => 'Strapi', 'level' => 78, 'color' => 'purple'],
                    ['name' => 'PHP', 'level' => 85, 'color' => 'indigo'],
                    ['name' => 'WordPress', 'level' => 90, 'color' => 'blue'],
                    ['name' => 'Node.js', 'level' => 80, 'color' => 'green']
                ];

                foreach ($skills as $index => $skill) {
                    $delay = $index * 0.1;
                    echo '<div class="group relative p-6 bg-white dark:bg-gray-800 rounded-2xl shadow-lg 
                        hover:shadow-2xl border border-gray-200 dark:border-gray-700
                        hover:border-cyber-cyan dark:hover:border-cyber-cyan
                        transition-all duration-500 hover:-translate-y-2 cursor-pointer
                        transform opacity-0 animate-fade-in-up" 
                        style="animation-delay: ' . $delay . 's;"
                        @mouseenter="hoveredSkill = \'' . esc_js($skill['name']) . '\'"
                        @mouseleave="hoveredSkill = null">
                        
                        <div class="text-center">
                            <h3 class="font-oswald text-lg font-bold text-cyber-blue dark:text-cyber-cyan mb-3 
                                group-hover:text-cyber-coral dark:group-hover:text-cyber-pink transition-colors duration-300">
                                ' . esc_html($skill['name']) . '
                            </h3>
                            
                            <!-- Skill Level Bar -->
                            <div class="w-full bg-gray-200 dark:bg-gray-700 rounded-full h-2 mb-3">
                                <div class="bg-gradient-to-r from-cyber-cyan to-cyber-blue h-2 rounded-full 
                                    transition-all duration-1000 group-hover:from-cyber-pink group-hover:to-cyber-coral" 
                                    style="width: ' . $skill['level'] . '%"></div>
                            </div>
                            
                            <div class="flex justify-between items-center text-sm">
                                <span class="font-manrope text-text-light-muted dark:text-text-dark-muted">
                                    ' . esc_html__('Proficiency', 'wilson-devops') . '
                                </span>
                                <span class="font-manrope font-semibold text-cyber-blue dark:text-cyber-cyan">
                                    ' . $skill['level'] . '%
                                </span>
                            </div>
                        </div>
                    </div>';
                }
                ?>
            </div>

            <!-- Dynamic Message -->
            <div class="mt-12 text-center" x-show="hoveredSkill" x-transition>
                <p class="font-manrope text-lg text-cyber-blue dark:text-cyber-cyan"
                    x-text="`${hoveredSkill} is one of my go-to tools for building awesome projects!`">
                </p>
            </div>
        </div>
    </section>

    <!-- Philosophy Section -->
    <section class="py-20 bg-gradient-to-b from-gray-50 to-white dark:from-gray-900 dark:to-cyber-dark">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16">
                <h2
                    class="font-nico text-4xl md:text-6xl font-black uppercase text-cyber-blue dark:text-cyber-cyan mb-6">
                    <?php esc_html_e('My Coding Philosophy', 'wilson-devops'); ?>
                </h2>
                <div class="w-24 h-1 bg-gradient-to-r from-cyber-cyan to-cyber-pink mx-auto mb-6"></div>
                <p class="font-manrope text-lg text-text-light-muted dark:text-text-dark-muted max-w-2xl mx-auto">
                    <?php esc_html_e('The principles that guide every line of code I write', 'wilson-devops'); ?>
                </p>
            </div>

            <div class="grid md:grid-cols-3 gap-8 max-w-6xl mx-auto">
                <!-- Clean Code -->
                <div class="group relative">
                    <div class="p-8 bg-white dark:bg-gray-800 rounded-2xl shadow-lg 
                        hover:shadow-2xl border border-gray-200 dark:border-gray-700
                        hover:border-cyber-cyan dark:hover:border-cyber-cyan
                        transition-all duration-500 hover:-translate-y-2 h-full">

                        <!-- Icon -->
                        <div
                            class="w-16 h-16 bg-gradient-to-br from-cyber-cyan/20 to-cyber-blue/20 
                            rounded-xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-300">
                            <svg class="w-8 h-8 text-cyber-cyan" fill="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M9.4 16.6L4.8 12l4.6-4.6L8 6l-6 6 6 6 1.4-1.4zm5.2 0L19.2 12l-4.6-4.6L16 6l6 6-6 6-1.4-1.4z" />
                            </svg>
                        </div>

                        <h3
                            class="font-oswald text-2xl font-bold text-cyber-blue dark:text-cyber-cyan mb-4 
                            group-hover:text-cyber-coral dark:group-hover:text-cyber-pink transition-colors duration-300">
                            <?php esc_html_e('Clean Code', 'wilson-devops'); ?>
                        </h3>

                        <p class="font-manrope text-text-light-muted dark:text-text-dark-muted leading-relaxed">
                            <?php esc_html_e('I write readable, maintainable code that scales with projects and teams. Every function has a purpose, every variable tells a story, and every comment adds value.', 'wilson-devops'); ?>
                        </p>

                        <div class="absolute bottom-0 left-2 w-[95%] h-1 bg-gradient-to-r from-cyber-cyan to-cyber-blue 
                            transform scale-x-0 group-hover:scale-x-100 transition-transform duration-500 origin-left">
                        </div>
                    </div>
                </div>

                <!-- Collaboration -->
                <div class="group relative">
                    <div class="p-8 bg-white dark:bg-gray-800 rounded-2xl shadow-lg 
                        hover:shadow-2xl border border-gray-200 dark:border-gray-700
                        hover:border-cyber-pink dark:hover:border-cyber-pink
                        transition-all duration-500 hover:-translate-y-2 h-full">

                        <div
                            class="w-16 h-16 bg-gradient-to-br from-cyber-pink/20 to-cyber-coral/20 
                            rounded-xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-300">
                            <svg class="w-8 h-8 text-cyber-pink" fill="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M16 4c0-1.11.89-2 2-2s2 .89 2 2-.89 2-2 2-2-.89-2-2zm4 18v-6h2.5l-2.54-7.63A1.5 1.5 0 0 0 18.54 8H16c-.8 0-1.54.37-2 1l-3 4v2h2l3-4.05V14h3v8h2zM12.5 11.5c.83 0 1.5-.67 1.5-1.5s-.67-1.5-1.5-1.5S11 9.17 11 10s.67 1.5 1.5 1.5zM5.5 6c1.11 0 2-.89 2-2s-.89-2-2-2-2 .89-2 2 .89 2 2 2zm2 16v-7H9V9c0-1.1-.9-2-2-2H4c-1.1 0-2 .9-2 2v6h1.5v7H7z" />
                            </svg>
                        </div>

                        <h3
                            class="font-oswald text-2xl font-bold text-cyber-blue dark:text-cyber-cyan mb-4 
                            group-hover:text-cyber-coral dark:group-hover:text-cyber-pink transition-colors duration-300">
                            <?php esc_html_e('Collaboration', 'wilson-devops'); ?>
                        </h3>

                        <p class="font-manrope text-text-light-muted dark:text-text-dark-muted leading-relaxed">
                            <?php esc_html_e('Thriving in Agile environments, I value teamwork and clear communication. The best solutions emerge when diverse minds work together toward a common goal.', 'wilson-devops'); ?>
                        </p>

                        <div class="absolute bottom-0 left-2 w-[95%] h-1 bg-gradient-to-r from-cyber-pink to-cyber-coral 
                            transform scale-x-0 group-hover:scale-x-100 transition-transform duration-500 origin-left">
                        </div>
                    </div>
                </div>

                <!-- Innovation -->
                <div class="group relative">
                    <div class="p-8 bg-white dark:bg-gray-800 rounded-2xl shadow-lg 
                        hover:shadow-2xl border border-gray-200 dark:border-gray-700
                        hover:border-green-500 dark:hover:border-green-500
                        transition-all duration-500 hover:-translate-y-2 h-full">

                        <div
                            class="w-16 h-16 bg-gradient-to-br from-green-500/20 to-cyan-500/20 
                            rounded-xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-300">
                            <svg class="w-8 h-8 text-green-500" fill="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M9 21c0 .5.4 1 1 1h4c.6 0 1-.5 1-1v-1H9v1zm3-19C8.1 2 5 5.1 5 9c0 2.4 1.2 4.5 3 5.7V17c0 .5.4 1 1 1h6c.6 0 1-.5 1-1v-2.3c1.8-1.3 3-3.4 3-5.7 0-3.9-3.1-7-7-7z" />
                            </svg>
                        </div>

                        <h3
                            class="font-oswald text-2xl font-bold text-cyber-blue dark:text-cyber-cyan mb-4 
                            group-hover:text-cyber-coral dark:group-hover:text-cyber-pink transition-colors duration-300">
                            Innovation
                        </h3>

                        <p class="font-manrope text-text-light-muted dark:text-text-dark-muted leading-relaxed">
                            <?php esc_html_e('Always exploring new tools and techniques to push boundaries. I believe the best solutions come from questioning the status quo and embracing emerging technologies.', 'wilson-devops'); ?>
                        </p>

                        <div class="absolute bottom-0 left-2 w-[95%] h-1 bg-gradient-to-r from-green-500 to-cyan-500 
                            transform scale-x-0 group-hover:scale-x-100 transition-transform duration-500 origin-left">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Fun Facts Section -->
    <section
        class="py-20 bg-gradient-to-r from-cyber-blue to-cyber-cyan dark:from-cyber-dark dark:to-gray-900 relative overflow-hidden">
        <!-- Background Elements -->
        <div class="absolute inset-0 opacity-10">
            <div class="absolute top-10 left-10 w-32 h-32 border-2 border-white/30 rotate-45 animate-spin-slow">
            </div>
            <div class="absolute top-32 right-20 w-24 h-24 bg-white/10 rounded-full animate-pulse"></div>
            <div class="absolute bottom-20 left-1/4 w-16 h-16 bg-white/5 transform rotate-12 animate-bounce"></div>
        </div>

        <div class="container mx-auto px-4 text-center relative z-10">
            <h2 class="font-nico text-4xl md:text-6xl font-black uppercase text-white mb-6">
                Beyond the Code
            </h2>
            <div class="w-24 h-1 bg-white/50 mx-auto mb-12"></div>

            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8 max-w-6xl mx-auto">
                <div class="text-center">
                    <div class="text-4xl md:text-5xl font-nico font-black text-white mb-2 animate-pulse">
                        50+
                    </div>
                    <p class="font-manrope text-white/80">Projects Completed</p>
                </div>

                <div class="text-center">
                    <div class="text-4xl md:text-5xl font-nico font-black text-white mb-2 animate-pulse">
                        7+
                    </div>
                    <p class="font-manrope text-white/80">Years Coding</p>
                </div>

                <div class="text-center">
                    <div class="text-4xl md:text-5xl font-nico font-black text-white mb-2 animate-pulse">
                        ∞
                    </div>
                    <p class="font-manrope text-white/80">Coffee Cups</p>
                </div>

                <div class="text-center">
                    <div class="text-4xl md:text-5xl font-nico font-black text-white mb-2 animate-pulse">
                        24/7
                    </div>
                    <p class="font-manrope text-white/80">Learning Mode</p>
                </div>
            </div>

            <div class="mt-16 max-w-3xl mx-auto">
                <p class="font-manrope text-xl text-white/90 mb-8 leading-relaxed">
                    When I'm not coding, you'll find me exploring new technologies, contributing to open source
                    projects,
                    or mentoring upcoming developers. I believe in giving back to the community that has given me so
                    much.
                </p>

                <div class="flex flex-col sm:flex-row gap-6 justify-center items-center">
                    <a href="<?php echo esc_url(site_url('/projects/')); ?>" class="px-8 py-4 bg-white text-cyber-blue font-manrope font-bold rounded-full
                        hover:scale-105 transition-all duration-300 shadow-lg hover:shadow-2xl">
                        View My Work
                    </a>

                    <a href="<?php echo esc_url(site_url('/contact/')); ?>" class="px-8 py-4 border-2 border-white text-white font-manrope font-bold rounded-full
                        hover:bg-white hover:text-cyber-blue transition-all duration-300">
                        Let's Connect
                    </a>
                </div>
            </div>
        </div>
    </section>

</main>

<!-- Custom CSS for animations -->
<style>
@keyframes spin-slow {
    from {
        transform: rotate(0deg);
    }

    to {
        transform: rotate(360deg);
    }
}

@keyframes fade-in-up {
    from {
        opacity: 0;
        transform: translateY(30px);
    }

    to {
        opacity: 1;
        transform: translateY(0);
    }
}

@keyframes float {

    0%,
    100% {
        transform: translateY(0px);
    }

    50% {
        transform: translateY(-10px);
    }
}

.animate-spin-slow {
    animation: spin-slow 8s linear infinite;
}

.animate-fade-in-up {
    animation: fade-in-up 0.8s ease-out forwards;
}

.animate-float {
    animation: float 3s ease-in-out infinite;
}

/* Responsive Timeline Adjustments */
@media (max-width: 768px) {
    .timeline-responsive {
        padding-left: 2rem;
    }

    .timeline-responsive .absolute {
        left: 1rem;
    }

    .timeline-responsive .w-1/2 {
        width: 100%;
        padding: 0;
        text-align: left;
    }

    .timeline-responsive .pr-8,
    .timeline-responsive .pl-8 {
        padding: 0;
    }

    .timeline-responsive .text-right {
        text-align: left;
    }
}
</style>

<!-- Mobile Timeline Adjustments -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    const timelineSection = document.querySelector('#journey .relative');

    if (window.innerWidth <= 768) {
        // Add responsive class for mobile
        timelineSection.classList.add('timeline-responsive');

        // Adjust timeline structure for mobile
        const timelineItems = timelineSection.querySelectorAll('.relative.flex');
        timelineItems.forEach((item, index) => {
            const leftContent = item.querySelector('.w-1/2:first-child');
            const rightContent = item.querySelector('.w-1/2:last-child');
            const dot = item.querySelector('.absolute');

            // Move all content to single column
            if (leftContent && leftContent.innerHTML.trim()) {
                rightContent.innerHTML = leftContent.innerHTML;
                leftContent.innerHTML = '';
            }

            // Adjust dot position
            if (dot) {
                dot.style.left = '1rem';
                dot.style.transform = 'translateX(0)';
            }
        });
    }
});

// Intersection Observer for animations
const observerOptions = {
    threshold: 0.1,
    rootMargin: '0px 0px -50px 0px'
};

const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            entry.target.style.animationPlayState = 'running';
            entry.target.classList.add('animate-fade-in-up');
        }
    });
}, observerOptions);

// Observe timeline items and skill cards
document.addEventListener('DOMContentLoaded', () => {
    const timelineItems = document.querySelectorAll('#journey .bg-white, #journey .dark\\:bg-gray-800');
    const skillCards = document.querySelectorAll('[class*="animate-fade-in-up"]');

    [...timelineItems, ...skillCards].forEach(item => {
        observer.observe(item);
    });
});
</script>

<?php
get_footer();