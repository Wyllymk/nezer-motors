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
			{
				title: 'Engine Servicing',
				desc: 'Oil changes, filter replacement, and full engine health checks.',
				icon: '🔧',
				color1: '#1e3a8a',
				color2: '#2563eb',
				branches: ['AutoCare', 'QuikFix'],
			},
			{
				title: 'Brake Inspection',
				desc: 'Full brake system check, pad replacement and fluid top-ups.',
				icon: '🛑',
				color1: '#7f1d1d',
				color2: '#dc2626',
				branches: ['AutoCare'],
			},
			{
				title: 'Wheel Alignment',
				desc: 'Precision 4-wheel alignment for saloons and SUVs.',
				icon: '⚙️',
				color1: '#713f12',
				color2: '#ca8a04',
				branches: ['QuikFix'],
			},
			{
				title: 'Wheel Balancing',
				desc: 'Eliminate vibrations and extend tyre life with accurate balancing.',
				icon: '🔄',
				color1: '#064e3b',
				color2: '#059669',
				branches: ['QuikFix'],
			},
			{
				title: 'Tyre Services',
				desc: 'Wide range of tyres with professional fitting and pressure checks.',
				icon: '🔘',
				color1: '#1e3a8a',
				color2: '#4f46e5',
				branches: ['AutoCare', 'QuikFix'],
			},
			{
				title: 'Suspension',
				desc: 'Full suspension diagnostics and component replacement.',
				icon: '🏎️',
				color1: '#4a044e',
				color2: '#a21caf',
				branches: ['AutoCare'],
			},
			{
				title: 'Battery Check',
				desc: 'Battery testing, replacement, and electrical system diagnostics.',
				icon: '⚡',
				color1: '#78350f',
				color2: '#d97706',
				branches: ['AutoCare'],
			},
			{
				title: 'Vehicle Health',
				desc: 'Comprehensive vehicle inspection and full health report.',
				icon: '📋',
				color1: '#134e4a',
				color2: '#0d9488',
				branches: ['AutoCare', 'QuikFix'],
			},
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
		autocareFooterServices: [
			'Engine Servicing',
			'Brake Inspection',
			'Suspension',
			'Battery Check',
			'Engine Wash',
			'Health Report',
		],
		quikfixFooterServices: [
			'Wheel Alignment',
			'Wheel Balancing',
			'Tyre Fitting',
			'Oil Change',
			'Full Servicing',
		],
	}));
});

/**
 * Nezer Motors — main.js
 *
 * All site JavaScript in one file.
 * Dark mode via Tailwind dark: classes (class toggled on <html>).
 * Alpine.js handles remaining UI interactions in PHP templates.
 *
 * Modules:
 *   NMTheme     — dark / light / system mode
 *   NMNav       — mobile menu, scroll effect
 *   NMHeroTabs  — hero section tab switching
 *   NMGallery   — masonry gallery lightbox
 *   NMWhatsApp  — WhatsApp floating popup
 *   NMBackTop   — back-to-top button
 *   NMAnimate   — IntersectionObserver scroll animations
 *   NMForm      — contact form AJAX via wp_ajax
 */

/* ============================================================
   1. THEME MANAGEMENT
   Reads/writes localStorage. Adds 'dark' class to <html>.
============================================================ */
const NMTheme = (() => {
	const KEY = 'nezer-theme';

	const getStored = () => localStorage.getItem(KEY) || 'system';

	const isDark = (theme) =>
		theme === 'dark' ||
		(theme === 'system' &&
			window.matchMedia('(prefers-color-scheme: dark)').matches);

	const apply = (theme) => {
		document.documentElement.classList.toggle('dark', isDark(theme));
	};

	const updateButtons = (theme) => {
		document.querySelectorAll('[data-set-theme]').forEach((btn) => {
			btn.classList.toggle(
				'nm-theme-active',
				btn.dataset.setTheme === theme
			);
			btn.setAttribute(
				'aria-pressed',
				String(btn.dataset.setTheme === theme)
			);
		});
	};

	const set = (theme) => {
		localStorage.setItem(KEY, theme);
		apply(theme);
		updateButtons(theme);
	};

	const init = () => {
		const theme = getStored();
		apply(theme);
		updateButtons(theme);

		// Watch system preference changes
		window
			.matchMedia('(prefers-color-scheme: dark)')
			.addEventListener('change', () => {
				if (getStored() === 'system') apply('system');
			});

		// Bind all theme toggle buttons
		document.querySelectorAll('[data-set-theme]').forEach((btn) => {
			btn.addEventListener('click', () => set(btn.dataset.setTheme));
		});

		// Mobile single toggle (cycles system → light → dark)
		const mobileToggle = document.getElementById('nm-theme-mobile');
		if (mobileToggle) {
			const cycle = () => {
				const current = getStored();
				const next =
					current === 'system'
						? 'light'
						: current === 'light'
							? 'dark'
							: 'system';
				set(next);
				// Update icon label
				const label = mobileToggle.querySelector('.nm-theme-label');
				if (label)
					label.textContent =
						next.charAt(0).toUpperCase() + next.slice(1);
			};
			mobileToggle.addEventListener('click', cycle);
		}
	};

	return { init, set, getStored };
})();

/* ============================================================
   2. NAVIGATION — scroll effect, mobile drawer
============================================================ */
const NMNav = (() => {
	let ticking = false;

	const handleScroll = () => {
		if (!ticking) {
			window.requestAnimationFrame(() => {
				const nav = document.getElementById('nm-nav');
				if (nav)
					nav.classList.toggle('nm-scrolled', window.scrollY > 40);
				ticking = false;
			});
			ticking = true;
		}
	};

	const init = () => {
		const toggle = document.getElementById('nm-menu-toggle');
		const drawer = document.getElementById('nm-mobile-drawer');
		if (!toggle || !drawer) return;

		const open = () => {
			drawer.classList.add('nm-drawer-open');
			toggle.setAttribute('aria-expanded', 'true');
		};
		const close = () => {
			drawer.classList.remove('nm-drawer-open');
			toggle.setAttribute('aria-expanded', 'false');
		};
		const isOpen = () => drawer.classList.contains('nm-drawer-open');

		toggle.addEventListener('click', () => (isOpen() ? close() : open()));

		document.addEventListener('click', (e) => {
			if (
				isOpen() &&
				!toggle.contains(e.target) &&
				!drawer.contains(e.target)
			)
				close();
		});

		document.addEventListener('keydown', (e) => {
			if (e.key === 'Escape' && isOpen()) close();
		});

		// Close drawer links on click
		drawer
			.querySelectorAll('a')
			.forEach((a) => a.addEventListener('click', close));

		// Scroll effect
		window.addEventListener('scroll', handleScroll, { passive: true });
		handleScroll(); // run once on load
	};

	return { init };
})();

/* ============================================================
   3. HERO TABS — switch panels + hero background
============================================================ */
const NMHeroTabs = (() => {
	const init = () => {
		const section = document.getElementById('nm-hero');
		if (!section) return;

		const tabs = section.querySelectorAll('[data-hero-tab]');
		const panels = section.querySelectorAll('[data-hero-panel]');
		if (!tabs.length || !panels.length) return;

		const activate = (targetTab) => {
			const brand = targetTab.dataset.heroTab;

			// Update tab buttons
			tabs.forEach((t) => {
				const active = t === targetTab;
				t.classList.toggle('nm-tab-active', active);
				t.setAttribute('aria-selected', String(active));
			});

			// Update panels
			panels.forEach((p) => {
				const show = p.dataset.heroPanel === brand;
				p.classList.toggle('nm-panel-active', show);
				p.setAttribute('aria-hidden', String(!show));
			});

			// Update hero background via data attribute (CSS driven)
			section.setAttribute('data-active-brand', brand);
		};

		tabs.forEach((tab) =>
			tab.addEventListener('click', () => activate(tab))
		);

		// Default: first tab active
		if (tabs[0]) activate(tabs[0]);
	};

	return { init };
})();

/* ============================================================
   4. GALLERY LIGHTBOX
   Manages one lightbox per page (shared element).
============================================================ */
const NMGallery = (() => {
	let items = [];
	let current = 0;
	let lightbox, lbImg, lbCount;

	const show = (idx) => {
		current = (idx + items.length) % items.length;
		const img = items[current].querySelector('img');
		if (lbImg) {
			lbImg.src = img ? img.src : '';
			lbImg.alt = img ? img.alt : '';
		}
		if (lbCount) lbCount.textContent = `${current + 1} / ${items.length}`;
	};

	const openLb = (idx) => {
		show(idx);
		lightbox.classList.add('nm-lb-open');
		document.body.style.overflow = 'hidden';
		lightbox.focus();
	};

	const closeLb = () => {
		lightbox.classList.remove('nm-lb-open');
		document.body.style.overflow = '';
	};

	const init = (galleryId) => {
		const gallery = document.getElementById(galleryId);
		lightbox = document.getElementById('nm-lightbox');
		if (!gallery || !lightbox) return;

		lbImg = document.getElementById('nm-lb-img');
		lbCount = document.getElementById('nm-lb-count');
		items = Array.from(gallery.querySelectorAll('[data-gallery-item]'));

		items.forEach((item, idx) => {
			item.setAttribute('role', 'button');
			item.setAttribute('tabindex', '0');
			item.addEventListener('click', () => openLb(idx));
			item.addEventListener('keydown', (e) => {
				if (e.key === 'Enter' || e.key === ' ') {
					e.preventDefault();
					openLb(idx);
				}
			});
		});

		document
			.getElementById('nm-lb-close')
			?.addEventListener('click', closeLb);
		document
			.getElementById('nm-lb-prev')
			?.addEventListener('click', () => show(current - 1));
		document
			.getElementById('nm-lb-next')
			?.addEventListener('click', () => show(current + 1));

		lightbox.addEventListener('click', (e) => {
			if (e.target === lightbox) closeLb();
		});

		document.addEventListener('keydown', (e) => {
			if (!lightbox.classList.contains('nm-lb-open')) return;
			const map = {
				Escape: closeLb,
				ArrowLeft: () => show(current - 1),
				ArrowRight: () => show(current + 1),
			};
			if (map[e.key]) {
				e.preventDefault();
				map[e.key]();
			}
		});
	};

	return { init };
})();

/* ============================================================
   5. WHATSAPP FLOATING POPUP
============================================================ */
window.whatsappWidget = function (config) {
	return {
		open: false,
		message: config.defaultMsg,

		sendWhatsApp() {
			const url =
				'https://wa.me/' +
				config.phone +
				'?text=' +
				encodeURIComponent(this.message);

			window.open(url, '_blank');
		},
	};
};

/* ============================================================
   6. BACK TO TOP BUTTON
============================================================ */
const NMBackTop = (() => {
	const init = () => {
		const btn = document.getElementById('nm-back-top');
		if (!btn) return;

		let ticking = false;

		window.addEventListener(
			'scroll',
			() => {
				if (!ticking) {
					window.requestAnimationFrame(() => {
						btn.classList.toggle(
							'nm-visible',
							window.scrollY > 400
						);
						ticking = false;
					});
					ticking = true;
				}
			},
			{ passive: true }
		);

		btn.addEventListener('click', () => {
			window.scrollTo({ top: 0, behavior: 'smooth' });
		});
	};

	return { init };
})();

/* ============================================================
   7. SCROLL ANIMATIONS — IntersectionObserver
============================================================ */
const NMAnimate = (() => {
	const init = () => {
		const els = document.querySelectorAll(
			'[data-animate], [data-animate-stagger]'
		);
		if (!els.length) return;

		// Respect reduced motion
		if (window.matchMedia('(prefers-reduced-motion: reduce)').matches) {
			els.forEach((el) => el.classList.add('nm-animated'));
			return;
		}

		const obs = new IntersectionObserver(
			(entries) => {
				entries.forEach((entry) => {
					if (entry.isIntersecting) {
						entry.target.classList.add('nm-animated');
						obs.unobserve(entry.target);
					}
				});
			},
			{ threshold: 0.1, rootMargin: '0px 0px -40px 0px' }
		);

		els.forEach((el) => obs.observe(el));
	};

	return { init };
})();

/* ============================================================
   8. MARQUEE — pause on keyboard focus
============================================================ */
const NMMarquee = (() => {
	const init = () => {
		document.querySelectorAll('.nm-marquee-track').forEach((track) => {
			track.querySelectorAll('[role="listitem"]').forEach((item) => {
				item.addEventListener(
					'focus',
					() => (track.style.animationPlayState = 'paused')
				);
				item.addEventListener(
					'blur',
					() => (track.style.animationPlayState = 'running')
				);
			});
		});
	};
	return { init };
})();

/* ============================================================
   9. CONTACT FORM — AJAX via wp_ajax
============================================================ */
const NMForm = (() => {
	const init = () => {
		const form = document.getElementById('nm-contact-form');
		if (!form) return;

		const notice = document.getElementById('nm-form-notice');
		const submitBtn = form.querySelector('[type="submit"]');
		const btnText = submitBtn?.querySelector('.nm-btn-text');
		const btnSpinner = submitBtn?.querySelector('.nm-btn-spinner');

		const showNotice = (msg, type) => {
			if (!notice) return;
			notice.textContent = '';
			notice.className = `nm-form-notice nm-show nm-${type}`;
			notice.textContent = msg;
			notice.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
		};

		const setLoading = (loading) => {
			if (!submitBtn) return;
			submitBtn.disabled = loading;
			if (btnText) btnText.style.display = loading ? 'none' : '';
			if (btnSpinner)
				btnSpinner.style.display = loading ? 'inline-flex' : 'none';
		};

		const validate = () => {
			const name = form.querySelector('[name="name"]')?.value.trim();
			const email = form.querySelector('[name="email"]')?.value.trim();
			const branch = form.querySelector('[name="branch"]')?.value;
			const message = form
				.querySelector('[name="message"]')
				?.value.trim();
			const emailRe = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

			if (!name || !email || !branch || !message)
				return (
					window.NM?.strings?.required ||
					'Please fill in all required fields.'
				);
			if (!emailRe.test(email))
				return 'Please enter a valid email address.';
			return null;
		};

		form.addEventListener('submit', async (e) => {
			e.preventDefault();

			const error = validate();
			if (error) {
				showNotice(error, 'error');
				return;
			}

			setLoading(true);
			if (notice) notice.className = 'nm-form-notice';

			const data = new FormData(form);
			data.append('action', 'nm_contact');
			data.append('nonce', window.NM?.nonce || '');

			try {
				const res = await fetch(
					window.NM?.ajaxUrl || '/wp-admin/admin-ajax.php',
					{
						method: 'POST',
						body: data,
						credentials: 'same-origin',
					}
				);
				const json = await res.json();

				if (json.success) {
					showNotice(
						json.data?.message ||
							window.NM?.strings?.success ||
							'Message sent!',
						'success'
					);
					form.reset();
				} else {
					showNotice(
						json.data?.message ||
							window.NM?.strings?.error ||
							'An error occurred.',
						'error'
					);
				}
			} catch (err) {
				console.error('[NMForm]', err);
				showNotice(
					window.NM?.strings?.error ||
						'Connection error. Please try again.',
					'error'
				);
			} finally {
				setLoading(false);
			}
		});
	};

	return { init };
})();

/* ============================================================
   INIT ALL MODULES
============================================================ */
document.addEventListener('DOMContentLoaded', () => {
	NMTheme.init();
	NMNav.init();
	NMHeroTabs.init();
	NMBackTop.init();
	NMAnimate.init();
	NMMarquee.init();
	NMForm.init();

	// Gallery: init whichever gallery exists on this page
	if (document.getElementById('nm-gallery-ac'))
		NMGallery.init('nm-gallery-ac');
	if (document.getElementById('nm-gallery-qf'))
		NMGallery.init('nm-gallery-qf');
});

// ✅ Start Alpine once
document.addEventListener('DOMContentLoaded', () => {
	Alpine.start();
});
