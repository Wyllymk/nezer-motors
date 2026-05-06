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

window.siteApp = function() {
    return {
      theme: 'system',
      darkMode: false,

      // Stats
      stats: [
        { value: '2', label: 'Branch Locations' },
        { value: '6+', label: 'Core Services' },
        { value: 'Mon–Sat', label: 'Open 6 Days' },
        { value: '100%', label: 'Certified Techs' },
      ],

      // Services
      services: [
        { title: 'Engine Servicing', desc: 'Oil changes, filter replacement, and full engine health checks.', icon: '🔧', color1: '#1e3a8a', color2: '#2563eb', branches: ['AutoCare', 'QuikFix'] },
        { title: 'Brake Inspection', desc: 'Full brake system check, pad replacement and fluid top-ups.', icon: '🛑', color1: '#7f1d1d', color2: '#dc2626', branches: ['AutoCare'] },
        { title: 'Wheel Alignment', desc: 'Precision 4-wheel alignment for saloons and SUVs.', icon: '⚙️', color1: '#713f12', color2: '#ca8a04', branches: ['QuikFix'] },
        { title: 'Wheel Balancing', desc: 'Eliminate vibrations and extend tyre life with accurate balancing.', icon: '🔄', color1: '#064e3b', color2: '#059669', branches: ['QuikFix'] },
        { title: 'Tyre Services', desc: 'Wide range of tyres with professional fitting and pressure checks.', icon: '🔘', color1: '#1e3a8a', color2: '#4f46e5', branches: ['AutoCare', 'QuikFix'] },
        { title: 'Suspension', desc: 'Full suspension diagnostics and component replacement.', icon: '🏎️', color1: '#4a044e', color2: '#a21caf', branches: ['AutoCare'] },
        { title: 'Battery Check', desc: 'Battery testing, replacement, and electrical system diagnostics.', icon: '⚡', color1: '#78350f', color2: '#d97706', branches: ['AutoCare'] },
        { title: 'Vehicle Health', desc: 'Comprehensive vehicle inspection and full health report.', icon: '📋', color1: '#134e4a', color2: '#0d9488', branches: ['AutoCare', 'QuikFix'] },
      ],

      // Partners
      partners: [
        { name: 'Shell', icon: '⛽' },
        { name: 'Castrol', icon: '🛢️' },
        { name: 'Mobil', icon: '🔋' },
        { name: 'Total Energies', icon: '⚡' },
        { name: 'Michelin', icon: '🔘' },
        { name: 'Bridgestone', icon: '🔘' },
        { name: 'Goodyear', icon: '🔘' },
        { name: 'Bosch', icon: '🔩' },
        { name: 'NGK', icon: '🔌' },
        { name: 'Toyota', icon: '🚗' },
        { name: 'Hyundai', icon: '🚙' },
        { name: 'Volkswagen', icon: '🚘' },
        { name: 'Nissan', icon: '🚗' },
      ],

      // Footer service lists
      autocareFooterServices: ['Engine Servicing', 'Brake Inspection', 'Suspension', 'Battery Check', 'Engine Wash', 'Health Report'],
      quikfixFooterServices: ['Wheel Alignment', 'Wheel Balancing', 'Tyre Fitting', 'Oil Change', 'Full Servicing'],

      initTheme() {
        const saved = localStorage.getItem('nezer-theme') || 'system';
        this.setTheme(saved);
        window.matchMedia('(prefers-color-scheme: dark)').addEventListener('change', () => {
          if (this.theme === 'system') this.applyTheme();
        });
      },

      setTheme(t) {
        this.theme = t;
        localStorage.setItem('nezer-theme', t);
        this.applyTheme();
      },

      applyTheme() {
        if (this.theme === 'dark') {
          this.darkMode = true;
          document.documentElement.classList.add('dark');
        } else if (this.theme === 'light') {
          this.darkMode = false;
          document.documentElement.classList.remove('dark');
        } else {
          const systemDark = window.matchMedia('(prefers-color-scheme: dark)').matches;
          this.darkMode = systemDark;
          systemDark
            ? document.documentElement.classList.add('dark')
            : document.documentElement.classList.remove('dark');
        }
      }
    }
}

window.heroSection = function() {
    return {
        activeBrand: 'autocare',
        autocareServices: ['Engine Oil & Filter', 'Brake Inspection', 'Suspension Check', 'Battery Check', 'Engine Wash', 'Vehicle Health Report'],
        quikfixServices: ['Wheel Alignment', 'Wheel Balancing', 'Tyre Fitting', 'Oil Change', 'Full Servicing'],
    }
}

window.whatsappWidget = function () {
    return {
        open: false,
        message: 'Hello, I would like to enquire about your services.',
        sendWhatsApp() {
        const msg = encodeURIComponent(this.message);
        window.open(`https://wa.me/254733204672?text=${msg}`, '_blank');
        }
    }
}

// Shared data available to all sections via document-level Alpine
document.addEventListener('alpine:init', () => {
    Alpine.data('sharedData', () => ({
        stats: [
        { value: '2', label: 'Branch Locations' },
        { value: '6+', label: 'Core Services' },
        { value: 'Mon–Sat', label: 'Open 6 Days' },
        { value: '100%', label: 'Certified Techs' },
        ],
        services: [
        { title: 'Engine Servicing', desc: 'Oil changes, filter replacement, and full engine health checks.', icon: '🔧', color1: '#1e3a8a', color2: '#2563eb', branches: ['AutoCare', 'QuikFix'] },
        { title: 'Brake Inspection', desc: 'Full brake system check, pad replacement and fluid top-ups.', icon: '🛑', color1: '#7f1d1d', color2: '#dc2626', branches: ['AutoCare'] },
        { title: 'Wheel Alignment', desc: 'Precision 4-wheel alignment for saloons and SUVs.', icon: '⚙️', color1: '#713f12', color2: '#ca8a04', branches: ['QuikFix'] },
        { title: 'Wheel Balancing', desc: 'Eliminate vibrations and extend tyre life with accurate balancing.', icon: '🔄', color1: '#064e3b', color2: '#059669', branches: ['QuikFix'] },
        { title: 'Tyre Services', desc: 'Wide range of tyres with professional fitting and pressure checks.', icon: '🔘', color1: '#1e3a8a', color2: '#4f46e5', branches: ['AutoCare', 'QuikFix'] },
        { title: 'Suspension', desc: 'Full suspension diagnostics and component replacement.', icon: '🏎️', color1: '#4a044e', color2: '#a21caf', branches: ['AutoCare'] },
        { title: 'Battery Check', desc: 'Battery testing, replacement, and electrical system diagnostics.', icon: '⚡', color1: '#78350f', color2: '#d97706', branches: ['AutoCare'] },
        { title: 'Vehicle Health', desc: 'Comprehensive vehicle inspection and full health report.', icon: '📋', color1: '#134e4a', color2: '#0d9488', branches: ['AutoCare', 'QuikFix'] },
        ],
        partners: [
        { name: 'Shell', icon: '🐚' },
        { name: 'Castrol', icon: '🛢️' },
        { name: 'Mobil', icon: '⛽' },
        { name: 'Total Energies', icon: '🔋' },
        { name: 'Michelin', icon: '🔘' },
        { name: 'Bridgestone', icon: '🔘' },
        { name: 'Goodyear', icon: '🔘' },
        { name: 'Bosch', icon: '🔩' },
        { name: 'NGK', icon: '⚡' },
        { name: 'Toyota', icon: '🚗' },
        { name: 'Hyundai', icon: '🚙' },
        { name: 'Volkswagen', icon: '🚘' },
        { name: 'Nissan', icon: '🚗' },
        ],
        autocareFooterServices: ['Engine Servicing', 'Brake Inspection', 'Suspension', 'Battery Check', 'Engine Wash', 'Health Report'],
        quikfixFooterServices: ['Wheel Alignment', 'Wheel Balancing', 'Tyre Fitting', 'Oil Change', 'Full Servicing'],
    }));
});

// ✅ Start Alpine once
document.addEventListener('DOMContentLoaded', () => {
    Alpine.start();
});
