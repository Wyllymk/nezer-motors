/**
 * Front-end JavaScript
 *
 * The JavaScript code you place here will be processed by esbuild. The output
 * file will be created at `../theme/js/script.min.js` and enqueued in
 * `../theme/functions.php`.
 *
 * For esbuild documentation, please see:
 * https://esbuild.github.io/
 */

import Alpine from 'alpinejs';
import { gsap } from 'gsap';
import { ScrollTrigger } from 'gsap/ScrollTrigger';

// Register ScrollTrigger
gsap.registerPlugin(ScrollTrigger);

window.Alpine = Alpine;

Alpine.data('themeToggle', () => ({
    isDark: false,

    init() {
        // Check for stored theme in localStorage
        const storedTheme = localStorage.getItem('theme');

        if (storedTheme) {
            // If theme was explicitly set, use that
            this.isDark = storedTheme === 'dark';
        } else {
            // Otherwise, check OS preference
            this.isDark = window.matchMedia(
                '(prefers-color-scheme: dark)'
            ).matches;
        }

        // Apply initial theme
        this.updateTheme();

        // Watch for OS theme changes
        window
            .matchMedia('(prefers-color-scheme: dark)')
            .addEventListener('change', (e) => {
                // Only update based on OS if no theme is stored
                if (!localStorage.getItem('theme')) {
                    this.isDark = e.matches;
                    this.updateTheme();
                }
            });
    },

    updateTheme() {
        // Apply the dark class to the html element
        if (this.isDark) {
            document.documentElement.classList.add('dark');
        } else {
            document.documentElement.classList.remove('dark');
        }
    },

    toggle() {
        // Toggle the theme state
        this.isDark = !this.isDark;

        // Store the explicitly set preference in localStorage
        localStorage.setItem('theme', this.isDark ? 'dark' : 'light');

        // Apply the theme immediately
        this.updateTheme();
    },
}));

window.Alpine = Alpine;

// ===========================
// SCROLL TO TOP
// ===========================
// Enhanced Scroll to Top with Progress Indicator (Alpine.js)
Alpine.data('scrollToTop', () => ({
    visible: false,
    progress: 0,

    init() {
        let ticking = false;

        const updateScrollProgress = () => {
            const scrollTop =
                window.pageYOffset || document.documentElement.scrollTop;
            const scrollHeight =
                document.documentElement.scrollHeight - window.innerHeight;
            const scrollProgress = (scrollTop / scrollHeight) * 100;

            this.progress = Math.min(Math.max(scrollProgress, 0), 100);
            this.visible = scrollTop > 300;

            ticking = false;
        };

        window.addEventListener('scroll', () => {
            if (!ticking) {
                requestAnimationFrame(updateScrollProgress);
                ticking = true;
            }
        });
    },

    scrollTop() {
        // Use native smooth scroll if available
        if ('scrollBehavior' in document.documentElement.style) {
            window.scrollTo({
                top: 0,
                behavior: 'smooth',
            });
        } else {
            // Fallback for older browsers (manual easing)
            const duration = 600;
            const start = window.pageYOffset;
            const startTime = performance.now();

            const easeOutCubic = (t) => 1 - Math.pow(1 - t, 3);

            const animateScroll = (currentTime) => {
                const elapsed = currentTime - startTime;
                const progress = Math.min(elapsed / duration, 1);
                const position = start * (1 - easeOutCubic(progress));

                window.scrollTo(0, position);

                if (elapsed < duration) {
                    requestAnimationFrame(animateScroll);
                }
            };

            requestAnimationFrame(animateScroll);
        }
    },
}));

// 1. Enhanced Sticky Header with Hide/Show on Scroll (Alpine.js)
Alpine.data('stickyHeader', () => ({
    isScrolled: false,
    isHidden: false,
    lastScrollY: 0,
    scrollDirection: 'up',

    init() {
        this.lastScrollY = window.scrollY;

        // Enhanced scroll listener with better performance
        let ticking = false;

        const updateScrollState = () => {
            const currentScrollY = window.scrollY;

            // Blur effect when scrolled ≥ 20px
            this.isScrolled = currentScrollY > 20;

            // Determine scroll direction
            if (currentScrollY > this.lastScrollY) {
                this.scrollDirection = 'down';
            } else {
                this.scrollDirection = 'up';
            }

            // Hide/show header based on scroll
            if (currentScrollY > this.lastScrollY && currentScrollY > 100) {
                this.isHidden = true; // scrolling down
            } else if (
                currentScrollY < this.lastScrollY ||
                currentScrollY <= 50
            ) {
                this.isHidden = false; // scrolling up or near top
            }

            this.lastScrollY = currentScrollY;
            ticking = false;
        };

        window.addEventListener('scroll', () => {
            if (!ticking) {
                requestAnimationFrame(updateScrollState);
                ticking = true;
            }
        });
    },
}));

// 2. Enhanced Mobile Menu with Smooth Animations
document.addEventListener('DOMContentLoaded', function () {
    const menuButton = document.querySelector('#menuButton');
    const menuLinks = document.querySelectorAll('.menu-link');
    const navLinks = document.querySelectorAll('.nav-link');
    const navMenu = document.querySelector('#navMenu');
    const overlay = document.getElementById('overlay');
    const sections = document.querySelectorAll('section');
    const body = document.body;

    const linkMap = {};
    let isMenuOpen = false;
    const originalStyle = window.getComputedStyle(body).overflow;

    // ===== Utility Functions =====
    function toggleBodyScroll(disable) {
        body.style.overflow = disable ? 'hidden' : originalStyle;
    }

    function updateMenuButton(isOpen) {
        const lines = menuButton.querySelectorAll('div > div');
        if (!lines.length) return;

        if (isOpen) {
            lines[0].style.transform = 'rotate(45deg) translate(6px, 6px)';
            lines[1].style.opacity = '0';
            lines[2].style.transform = 'rotate(-45deg) translate(6px, -6px)';
        } else {
            lines[0].style.transform = 'rotate(0) translate(0, 0)';
            lines[1].style.opacity = '1';
            lines[2].style.transform = 'rotate(0) translate(0, 0)';
        }
    }

    // ===== Menu Toggle Functions =====
    function openMenu() {
        isMenuOpen = true;
        updateMenuButton(true);
        toggleBodyScroll(true);

        // Show overlay first
        overlay.classList.remove('hidden');

        // Animate menu in
        requestAnimationFrame(() => {
            navMenu.classList.remove('translate-x-full', 'opacity-0');
            navMenu.classList.add('opacity-100');
            overlay.style.opacity = '1';

            // Stagger menu item animations
            const menuItems = navMenu.querySelectorAll('.menu-link');
            menuItems.forEach((item, index) => {
                item.style.transform = 'translateX(100px)';
                item.style.opacity = '0';

                setTimeout(() => {
                    item.style.transition = 'all 0.3s ease-out';
                    item.style.transform = 'translateX(0)';
                    item.style.opacity = '1';
                }, index * 100);
            });
        });
    }

    function closeMenu() {
        isMenuOpen = false;
        updateMenuButton(false);
        toggleBodyScroll(false);

        const menuItems = navMenu.querySelectorAll('.menu-link');
        menuItems.forEach((item, index) => {
            setTimeout(() => {
                item.style.transform = 'translateX(100px)';
                item.style.opacity = '0';
            }, index * 50);
        });

        setTimeout(() => {
            navMenu.classList.add('translate-x-full', 'opacity-0');
            navMenu.classList.remove('opacity-100');
            overlay.style.opacity = '0';

            setTimeout(() => {
                overlay.classList.add('hidden');
                menuItems.forEach((item) => {
                    item.style.transform = '';
                    item.style.opacity = '';
                    item.style.transition = '';
                });
            }, 300);
        }, 200);
    }

    // ===== Menu Events =====
    menuButton.addEventListener('click', function (e) {
        e.preventDefault();
        isMenuOpen ? closeMenu() : openMenu();
    });

    overlay.addEventListener('click', closeMenu);

    menuLinks.forEach((link) => {
        link.addEventListener('click', () => {
            setTimeout(closeMenu, 200); // Small delay for UX
        });
    });

    // ===== Section → Link Mapping =====
    menuLinks.forEach((link) => {
        const menuItem = link.querySelector('.menu-item');
        if (menuItem) {
            const sectionId = menuItem.textContent
                .trim()
                .toLowerCase()
                .replace(/\s+/g, '');
            linkMap[sectionId] = { mobile: link, desktop: null };
        }
    });

    navLinks.forEach((link) => {
        const sectionId = link.textContent
            .trim()
            .toLowerCase()
            .replace(/\s+/g, '');
        if (!linkMap[sectionId]) {
            linkMap[sectionId] = { mobile: null, desktop: link };
        } else {
            linkMap[sectionId].desktop = link;
        }
    });

    // ===== Section Highlighting =====
    const observerOptions = {
        root: null,
        rootMargin: '0px 0px -100px 0px',
        threshold: [0.1, 0.3, 0.7],
    };

    const observer = new IntersectionObserver((entries) => {
        entries.forEach((entry) => {
            const sectionName = entry.target.id
                .toLowerCase()
                .replace(/\s+/g, '');
            const links = linkMap[sectionName];
            if (!links) return;

            if (entry.isIntersecting && entry.intersectionRatio > 0.3) {
                // Reset all
                Object.values(linkMap).forEach((linkSet) => {
                    if (linkSet.mobile) {
                        linkSet.mobile.classList.remove(
                            'bg-gradient-to-r',
                            'from-teal-50',
                            'to-cyan-50',
                            'dark:from-teal-900/30',
                            'dark:to-cyan-900/30',
                            'border-teal-200',
                            'dark:border-teal-800'
                        );
                        linkSet.mobile.classList.add('border-transparent');
                    }
                    if (linkSet.desktop) {
                        linkSet.desktop.classList.remove('text-teal-500');
                        linkSet.desktop.classList.add('dark:text-gray-300');
                    }
                });

                // Highlight active
                if (links.mobile) {
                    links.mobile.classList.add(
                        'bg-gradient-to-r',
                        'from-teal-50',
                        'to-cyan-50',
                        'dark:from-teal-900/30',
                        'dark:to-cyan-900/30',
                        'border-teal-200',
                        'dark:border-teal-800'
                    );
                    links.mobile.classList.remove('border-transparent');
                }
                if (links.desktop) {
                    links.desktop.classList.add('text-teal-500');
                    links.desktop.classList.remove('dark:text-gray-300');
                }
            }
        });
    }, observerOptions);

    sections.forEach((section) => observer.observe(section));

    // ===== Keyboard Close =====
    document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape' && isMenuOpen) closeMenu();
    });
});

// 3. Smooth Scroll
function smoothScrollTo(targetId) {
    const target = document.getElementById(targetId);
    if (!target) return;

    const header = document.querySelector('header');
    const offset = header ? header.offsetHeight : 0;
    const startPosition = window.pageYOffset;
    const targetPosition =
        target.getBoundingClientRect().top + startPosition - offset;
    const distance = targetPosition - startPosition;
    const duration = 2000;
    let startTime = null;

    function animation(currentTime) {
        if (startTime === null) startTime = currentTime;
        const timeElapsed = currentTime - startTime;
        const run = easeInOutQuad(
            timeElapsed,
            startPosition,
            distance,
            duration
        );
        window.scrollTo(0, run);
        if (timeElapsed < duration) requestAnimationFrame(animation);
    }

    function easeInOutQuad(t, b, c, d) {
        t /= d / 2;
        if (t < 1) return (c / 2) * t * t + b;
        t--;
        return (-c / 2) * (t * (t - 2) - 1) + b;
    }

    requestAnimationFrame(animation);
}

// Attach smooth scroll to anchors
document.addEventListener('DOMContentLoaded', () => {
    document.querySelectorAll('a[href^="#"]').forEach((anchor) => {
        anchor.addEventListener('click', (e) => {
            const targetId = anchor.getAttribute('href').substring(1);
            if (!targetId) return;
            e.preventDefault();
            smoothScrollTo(targetId);
        });
    });
});

window.addEventListener('load', function () {
    const spinnerLoader = document.querySelector('#spinner-loader');
    if (spinnerLoader) {
        spinnerLoader.classList.add('hidden');
    }
});

document.addEventListener('DOMContentLoaded', function () {
    // Counter Animation
    const counters = document.querySelectorAll('.counter');
    const observerOptions = {
        threshold: 0.7,
    };

    const counterObserver = new IntersectionObserver(function (entries) {
        entries.forEach((entry) => {
            if (entry.isIntersecting) {
                const counter = entry.target;
                const target = parseFloat(counter.getAttribute('data-target'));
                const increment = target / 50;
                let current = 0;

                const updateCounter = () => {
                    if (current < target) {
                        current += increment;
                        counter.textContent = Math.ceil(current);
                        requestAnimationFrame(updateCounter);
                    } else {
                        counter.textContent = target;
                    }
                };

                updateCounter();
                counterObserver.unobserve(counter);
            }
        });
    }, observerOptions);

    counters.forEach((counter) => {
        counterObserver.observe(counter);
    });

    // Tab Functionality
    const tabButtons = document.querySelectorAll('[data-tab]');
    const tabContents = document.querySelectorAll('.tab-content');

    tabButtons.forEach((button) => {
        button.addEventListener('click', function () {
            const targetTab = this.getAttribute('data-tab');

            // Update button states
            tabButtons.forEach((btn) => {
                btn.classList.remove(
                    'tab-active',
                    'bg-cyber-blue',
                    'text-white'
                );
                btn.classList.add('bg-gray-200', 'text-gray-700');
            });
            this.classList.remove('bg-gray-200', 'text-gray-700');
            this.classList.add('tab-active', 'bg-cyber-blue', 'text-white');

            // Update content visibility
            tabContents.forEach((content) => {
                content.classList.remove('active');
                content.classList.add('hidden');
            });
            document.getElementById(targetTab).classList.remove('hidden');
            document.getElementById(targetTab).classList.add('active');
        });
    });

    // Smooth scrolling for anchor links
    document.querySelectorAll('a[href^="#"]').forEach((anchor) => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
                target.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start',
                });
            }
        });
    });   
});

// ✅ Start Alpine once
document.addEventListener('DOMContentLoaded', () => {
    Alpine.start();
});
