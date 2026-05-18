<?php
/**
 * Template Name: Coming Soon
 * The template for displaying the coming soon page
 *
 * @package Nezer_Motors
 */
defined( 'ABSPATH' ) || exit;

get_header();

$ac = nm_branch( 'autocare' );
$qf = nm_branch( 'qwikfix' );

// Optional: set your launch date here
$launch_date = '2026-05-20T00:00:00';
?>

<style>
@import url('https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Barlow:wght@400;500;600;700&family=Barlow+Condensed:wght@600;700&display=swap');

:root {
    --gold-deep: #b8890f;
    --gold: #d4a017;
    --gold-light: #f0c040;
    --gold-pale: rgba(212, 160, 23, .12);
    --blue-brand: #1e40af;
    --red-brand: #dc2626;
    --ink: #0c0d0e;
    --surface: #111318;
    --surface-2: #1a1d24;
    --surface-3: #22262f;
    --rule: rgba(255, 255, 255, .08);
    --text-hi: #f5f0e8;
    --text-mid: rgba(245, 240, 232, .60);
    --text-lo: rgba(245, 240, 232, .30);
    --radius: 12px;
}

/* ── reset ── */
*,
*::before,
*::after {
    box-sizing: border-box;
    margin: 0;
    padding: 0;
}

#nm-coming-soon {
    min-height: 100vh;
    background: var(--surface);
    color: var(--text-hi);
    font-family: 'Barlow', sans-serif;
    position: relative;
    overflow: hidden;
    display: flex;
    flex-direction: column;
}

/* ── decorative background ── */
.cs-bg {
    position: absolute;
    inset: 0;
    pointer-events: none;
    overflow: hidden;
    z-index: 0;
}

/* diagonal stripe grid */
.cs-bg::before {
    content: '';
    position: absolute;
    inset: 0;
    background-image:
        repeating-linear-gradient(-55deg,
            transparent,
            transparent 38px,
            rgba(255, 255, 255, .022) 38px,
            rgba(255, 255, 255, .022) 39px);
}

/* large gold radial glow top-left */
.cs-bg::after {
    content: '';
    position: absolute;
    top: -10%;
    left: -5%;
    width: 55vw;
    height: 55vw;
    background: radial-gradient(circle, rgba(212, 160, 23, .18) 0%, transparent 65%);
}

.cs-bg-blob {
    position: absolute;
    bottom: -8%;
    right: -6%;
    width: 45vw;
    height: 45vw;
    background: radial-gradient(circle, rgba(30, 64, 175, .14) 0%, transparent 65%);
}

/* spinning gear decorations */
.cs-gear {
    position: absolute;
    opacity: .06;
    transform-origin: center;
    animation: gear-spin 40s linear infinite;
}

.cs-gear--rev {
    animation-direction: reverse;
    animation-duration: 55s;
}

@keyframes gear-spin {
    to {
        transform: rotate(360deg);
    }
}

/* ── top bar ── */
.cs-topbar {
    position: relative;
    z-index: 10;
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 1.5rem 2.5rem;
    border-bottom: 1px solid var(--rule);
}

.cs-logo {
    display: flex;
    align-items: center;
    gap: .75rem;
    text-decoration: none;
}

.cs-logo-icon {
    width: 42px;
    height: 42px;
    border-radius: 10px;
    background: linear-gradient(135deg, var(--gold), var(--gold-light));
    display: flex;
    align-items: center;
    justify-content: center;
    flex-shrink: 0;
    box-shadow: 0 0 28px rgba(212, 160, 23, .35);
}

.cs-logo-text {
    font-family: 'Bebas Neue', sans-serif;
    font-size: 1.6rem;
    letter-spacing: .06em;
    color: var(--text-hi);
    line-height: 1;
}

.cs-logo-sub {
    font-family: 'Barlow Condensed', sans-serif;
    font-size: .65rem;
    letter-spacing: .2em;
    color: var(--gold);
    text-transform: uppercase;
    line-height: 1;
}

.cs-badge {
    font-family: 'Barlow Condensed', sans-serif;
    font-size: .7rem;
    font-weight: 700;
    letter-spacing: .14em;
    text-transform: uppercase;
    color: var(--gold);
    border: 1px solid rgba(212, 160, 23, .35);
    border-radius: 20px;
    padding: .3rem .85rem;
    background: rgba(212, 160, 23, .08);
}

/* ── hero ── */
.cs-hero {
    position: relative;
    z-index: 10;
    flex: 1;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    text-align: center;
    padding: 4rem 1.5rem 2rem;
    gap: 0;
}

/* eyebrow */
.cs-eyebrow {
    display: inline-flex;
    align-items: center;
    gap: .5rem;
    font-family: 'Barlow Condensed', sans-serif;
    font-size: .75rem;
    font-weight: 700;
    letter-spacing: .22em;
    text-transform: uppercase;
    color: var(--gold);
    margin-bottom: 1.6rem;
}

.cs-eyebrow-dot {
    width: 6px;
    height: 6px;
    border-radius: 50%;
    background: var(--gold);
    animation: pulse-dot 2s ease-in-out infinite;
}

@keyframes pulse-dot {

    0%,
    100% {
        opacity: 1;
        transform: scale(1);
    }

    50% {
        opacity: .4;
        transform: scale(.6);
    }
}

/* headline */
.cs-headline {
    font-family: 'Bebas Neue', sans-serif;
    font-size: clamp(3.2rem, 10vw, 8rem);
    letter-spacing: .03em;
    line-height: .92;
    color: var(--text-hi);
    margin-bottom: 1.8rem;
}

.cs-headline span {
    display: block;
    background: linear-gradient(90deg, var(--gold) 0%, var(--gold-light) 55%, var(--gold) 100%);
    background-size: 200% auto;
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
    animation: shine 4s linear infinite;
}

@keyframes shine {
    to {
        background-position: 200% center;
    }
}

.cs-subline {
    max-width: 520px;
    font-size: clamp(.95rem, 2vw, 1.1rem);
    font-weight: 400;
    line-height: 1.7;
    color: var(--text-mid);
    margin-bottom: 3rem;
}

/* ── countdown ── */
.cs-countdown {
    display: flex;
    align-items: flex-start;
    gap: clamp(1rem, 3vw, 2.5rem);
    margin-bottom: 3.5rem;
}

.cs-cd-unit {
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: .4rem;
}

.cs-cd-box {
    position: relative;
    min-width: clamp(62px, 12vw, 96px);
    height: clamp(62px, 12vw, 96px);
    background: var(--surface-2);
    border: 1px solid rgba(212, 160, 23, .2);
    border-radius: var(--radius);
    display: flex;
    align-items: center;
    justify-content: center;
    font-family: 'Bebas Neue', sans-serif;
    font-size: clamp(2rem, 6vw, 3.8rem);
    letter-spacing: .04em;
    color: var(--text-hi);
    overflow: hidden;
    transition: border-color .3s;
}

.cs-cd-box::before {
    content: '';
    position: absolute;
    inset: 0;
    background: linear-gradient(160deg, rgba(212, 160, 23, .06) 0%, transparent 60%);
    pointer-events: none;
}

/* flip animation */
.cs-cd-box.flip {
    animation: cd-flip .4s cubic-bezier(.4, 0, .2, 1);
    border-color: rgba(212, 160, 23, .5);
}

@keyframes cd-flip {
    0% {
        transform: scaleY(1);
    }

    40% {
        transform: scaleY(.92);
    }

    100% {
        transform: scaleY(1);
    }
}

.cs-cd-sep {
    font-family: 'Bebas Neue', sans-serif;
    font-size: clamp(2rem, 6vw, 3.8rem);
    color: var(--gold);
    opacity: .6;
    padding-top: .1rem;
    animation: sep-blink 1s step-end infinite;
    align-self: flex-start;
    padding-top: clamp(12px, 2vw, 18px);
}

@keyframes sep-blink {

    0%,
    100% {
        opacity: .6;
    }

    50% {
        opacity: .1;
    }
}

.cs-cd-label {
    font-family: 'Barlow Condensed', sans-serif;
    font-size: .62rem;
    font-weight: 700;
    letter-spacing: .18em;
    text-transform: uppercase;
    color: var(--text-lo);
}

/* ── notify form ── */
.cs-form {
    display: flex;
    align-items: center;
    gap: 0;
    max-width: 440px;
    width: 100%;
    background: var(--surface-2);
    border: 1px solid var(--rule);
    border-radius: 14px;
    padding: 6px;
    margin-bottom: 4rem;
    transition: border-color .25s;
}

.cs-form:focus-within {
    border-color: rgba(212, 160, 23, .45);
    box-shadow: 0 0 0 3px rgba(212, 160, 23, .08);
}

.cs-form input[type="email"] {
    flex: 1;
    background: transparent;
    border: none;
    outline: none;
    font-family: 'Barlow', sans-serif;
    font-size: .9rem;
    color: var(--text-hi);
    padding: .55rem .8rem;
    min-width: 0;
}

.cs-form input[type="email"]::placeholder {
    color: var(--text-lo);
}

.cs-form button {
    flex-shrink: 0;
    font-family: 'Barlow Condensed', sans-serif;
    font-size: .82rem;
    font-weight: 700;
    letter-spacing: .1em;
    text-transform: uppercase;
    color: #0c0d0e;
    background: linear-gradient(135deg, var(--gold), var(--gold-light));
    border: none;
    border-radius: 10px;
    padding: .65rem 1.3rem;
    cursor: pointer;
    transition: filter .2s, transform .15s;
    white-space: nowrap;
}

.cs-form button:hover {
    filter: brightness(1.1);
}

.cs-form button:active {
    transform: scale(.97);
}

/* ── branch cards ── */
.cs-branches {
    position: relative;
    z-index: 10;
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
    gap: 1rem;
    padding: 0 2rem 2.5rem;
    max-width: 780px;
    width: 100%;
    margin: 0 auto;
}

.cs-branch {
    display: flex;
    align-items: center;
    gap: 1rem;
    background: var(--surface-2);
    border: 1px solid var(--rule);
    border-radius: var(--radius);
    padding: 1.1rem 1.3rem;
    text-decoration: none;
    transition: transform .2s, border-color .2s;
}

.cs-branch:hover {
    transform: translateY(-2px);
    border-color: rgba(255, 255, 255, .16);
}

.cs-branch-dot {
    width: 36px;
    height: 36px;
    border-radius: 9px;
    flex-shrink: 0;
    display: flex;
    align-items: center;
    justify-content: center;
}

.cs-branch--ac .cs-branch-dot {
    background: rgba(30, 64, 175, .22);
}

.cs-branch--qf .cs-branch-dot {
    background: rgba(220, 38, 38, .20);
}

.cs-branch--wa .cs-branch-dot {
    background: rgba(37, 211, 102, .18);
}

.cs-branch-name {
    font-family: 'Barlow Condensed', sans-serif;
    font-size: .72rem;
    font-weight: 700;
    letter-spacing: .15em;
    text-transform: uppercase;
    margin-bottom: .2rem;
}

.cs-branch--ac .cs-branch-name {
    color: #60a5fa;
}

.cs-branch--qf .cs-branch-name {
    color: #f87171;
}

.cs-branch--wa .cs-branch-name {
    color: #4ade80;
}

.cs-branch-val {
    font-family: 'Barlow', sans-serif;
    font-size: .88rem;
    font-weight: 500;
    color: var(--text-mid);
}

/* ── footer rule ── */
.cs-footer {
    position: relative;
    z-index: 10;
    border-top: 1px solid var(--rule);
    padding: 1.2rem 2rem;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 1rem;
}

.cs-footer-text {
    font-family: 'Barlow Condensed', sans-serif;
    font-size: .7rem;
    font-weight: 600;
    letter-spacing: .15em;
    text-transform: uppercase;
    color: var(--text-lo);
}

/* progress bar */
.cs-progress-wrap {
    position: relative;
    z-index: 10;
    padding: 0 2.5rem 1.8rem;
    max-width: 520px;
    margin: 0 auto;
    width: 100%;
}

.cs-progress-head {
    display: flex;
    justify-content: space-between;
    margin-bottom: .55rem;
}

.cs-progress-label {
    font-family: 'Barlow Condensed', sans-serif;
    font-size: .68rem;
    font-weight: 700;
    letter-spacing: .16em;
    text-transform: uppercase;
    color: var(--text-lo);
}

.cs-progress-bar {
    width: 100%;
    height: 4px;
    background: var(--surface-3);
    border-radius: 99px;
    overflow: hidden;
}

.cs-progress-fill {
    height: 100%;
    border-radius: 99px;
    background: linear-gradient(90deg, var(--gold-deep), var(--gold-light));
    transition: width 1s ease;
}

/* ── responsive ── */
@media (max-width: 500px) {
    .cs-topbar {
        padding: 1.2rem 1.2rem;
    }

    .cs-hero {
        padding: 2.5rem 1rem 1.5rem;
    }

    .cs-branches {
        padding: 0 1rem 2rem;
    }

    .cs-form {
        max-width: 100%;
    }

    .cs-cd-sep {
        display: none;
    }
}
</style>

<div id="nm-coming-soon">

    <!-- SVG gear decorations -->
    <svg class="cs-gear" style="top:-8%;left:-6%;width:min(420px,50vw)" viewBox="0 0 200 200" fill="none"
        xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
        <path d="M100 55a45 45 0 1 0 0 90 45 45 0 0 0 0-90zm0 14a31 31 0 1 1 0 62 31 31 0 0 1 0-62z" fill="#d4a017" />
        <rect x="93" y="30" width="14" height="20" rx="4" fill="#d4a017" />
        <rect x="93" y="150" width="14" height="20" rx="4" fill="#d4a017" />
        <rect x="30" y="93" width="20" height="14" rx="4" fill="#d4a017" />
        <rect x="150" y="93" width="20" height="14" rx="4" fill="#d4a017" />
        <rect x="48" y="47" width="14" height="20" rx="4" transform="rotate(-45 48 47)" fill="#d4a017" />
        <rect x="138" y="47" width="14" height="20" rx="4" transform="rotate(45 138 47)" fill="#d4a017" />
        <rect x="48" y="133" width="14" height="20" rx="4" transform="rotate(45 48 133)" fill="#d4a017" />
        <rect x="138" y="133" width="14" height="20" rx="4" transform="rotate(-45 138 133)" fill="#d4a017" />
    </svg>

    <svg class="cs-gear cs-gear--rev" style="bottom:-12%;right:-8%;width:min(340px,40vw)" viewBox="0 0 200 200"
        fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
        <circle cx="100" cy="100" r="48" stroke="#d4a017" stroke-width="10" fill="none" />
        <circle cx="100" cy="100" r="26" fill="#d4a017" />
        <rect x="93" y="28" width="14" height="22" rx="5" fill="#d4a017" />
        <rect x="93" y="150" width="14" height="22" rx="5" fill="#d4a017" />
        <rect x="28" y="93" width="22" height="14" rx="5" fill="#d4a017" />
        <rect x="150" y="93" width="22" height="14" rx="5" fill="#d4a017" />
        <rect x="45" y="45" width="14" height="22" rx="5" transform="rotate(-45 45 45)" fill="#d4a017" />
        <rect x="141" y="45" width="14" height="22" rx="5" transform="rotate(45 141 45)" fill="#d4a017" />
        <rect x="45" y="132" width="14" height="22" rx="5" transform="rotate(45 45 132)" fill="#d4a017" />
        <rect x="141" y="132" width="14" height="22" rx="5" transform="rotate(-45 141 132)" fill="#d4a017" />
    </svg>

    <!-- Background blobs -->
    <div class="cs-bg" aria-hidden="true">
        <div class="cs-bg-blob"></div>
    </div>

    <!-- Top bar -->
    <header class="cs-topbar">
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="cs-logo">
            <div class="w-9 h-9 rounded-lg bg-gold-400/10 dark:bg-gold-600/20 border border-gold-400 dark:border-gold-600/40 flex items-center justify-center transition-transform group-hover:scale-105"
                aria-hidden="true">
                <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/img/favicon.png' ); ?>"
                    alt="<?php echo esc_attr( 'Nezer Motors Logo', 'nezer-motors'); ?>"
                    class="w-full h-full object-contain p-1" loading="lazy">
            </div>
            <div>
                <div class="cs-logo-text"><?php bloginfo( 'name' ); ?></div>
                <div class="cs-logo-sub"><?php esc_html_e( 'Auto Services', 'nezer-motors' ); ?></div>
            </div>
        </a>
        <div class="cs-badge"><?php esc_html_e( 'Coming Soon', 'nezer-motors' ); ?></div>
    </header>

    <!-- Hero -->
    <main id="main-content" class="cs-hero" role="main">

        <div class="cs-eyebrow">
            <span class="cs-eyebrow-dot" aria-hidden="true"></span>
            <?php esc_html_e( "We're building something new", 'nezer-motors' ); ?>
        </div>

        <h1 class="cs-headline">
            <?php esc_html_e( 'Almost', 'nezer-motors' ); ?>
            <span><?php esc_html_e( 'Ready.', 'nezer-motors' ); ?></span>
        </h1>

        <p class="cs-subline">
            <?php esc_html_e( "Our new website is being tuned up for peak performance. While we're under the hood, our workshops are fully operational — give us a call or drop us a message.", 'nezer-motors' ); ?>
        </p>

        <!-- Countdown -->
        <div class="cs-countdown" id="cs-countdown" role="timer" aria-live="polite"
            aria-label="<?php esc_attr_e( 'Countdown to launch', 'nezer-motors' ); ?>">
            <div class="cs-cd-unit">
                <div class="cs-cd-box" id="cd-days">00</div>
                <span class="cs-cd-label"><?php esc_html_e( 'Days', 'nezer-motors' ); ?></span>
            </div>
            <div class="cs-cd-sep" aria-hidden="true">:</div>
            <div class="cs-cd-unit">
                <div class="cs-cd-box" id="cd-hours">00</div>
                <span class="cs-cd-label"><?php esc_html_e( 'Hours', 'nezer-motors' ); ?></span>
            </div>
            <div class="cs-cd-sep" aria-hidden="true">:</div>
            <div class="cs-cd-unit">
                <div class="cs-cd-box" id="cd-mins">00</div>
                <span class="cs-cd-label"><?php esc_html_e( 'Mins', 'nezer-motors' ); ?></span>
            </div>
            <div class="cs-cd-sep" aria-hidden="true">:</div>
            <div class="cs-cd-unit">
                <div class="cs-cd-box" id="cd-secs">00</div>
                <span class="cs-cd-label"><?php esc_html_e( 'Secs', 'nezer-motors' ); ?></span>
            </div>
        </div>

        <!-- Notify form -->
        <form class="cs-form" id="cs-notify-form" novalidate>
            <input type="email" name="notify_email" id="cs-email"
                placeholder="<?php esc_attr_e( 'Enter your email for launch updates', 'nezer-motors' ); ?>"
                autocomplete="email"
                aria-label="<?php esc_attr_e( 'Email address for launch notification', 'nezer-motors' ); ?>">
            <button type="submit">
                <?php esc_html_e( 'Notify Me', 'nezer-motors' ); ?>
            </button>
        </form>

        <!-- Progress bar -->
        <div class="cs-progress-wrap" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="95"
            aria-label="<?php esc_attr_e( 'Build progress', 'nezer-motors' ); ?>">
            <div class="cs-progress-head">
                <span class="cs-progress-label"><?php esc_html_e( 'Build Progress', 'nezer-motors' ); ?></span>
                <span class="cs-progress-label" id="cs-progress-pct">95%</span>
            </div>
            <div class="cs-progress-bar">
                <div class="cs-progress-fill" id="cs-progress-fill" style="width:0%"></div>
            </div>
        </div>

    </main>

    <!-- Branch contact cards -->
    <nav class="cs-branches" aria-label="<?php esc_attr_e( 'Contact our branches', 'nezer-motors' ); ?>">

        <a href="tel:<?php echo esc_attr( $ac['tel'] ); ?>" class="cs-branch cs-branch--ac"
            aria-label="<?php echo esc_attr( sprintf( __( 'Call AutoCare Express: %s', 'nezer-motors' ), $ac['phone'] ) ); ?>">
            <div class="cs-branch-dot" aria-hidden="true">
                <svg width="18" height="18" fill="#60a5fa" viewBox="0 0 24 24" aria-hidden="true">
                    <path
                        d="M6.62 10.79c1.44 2.83 3.76 5.14 6.59 6.59l2.2-2.2c.27-.27.67-.36 1.02-.24 1.12.37 2.33.57 3.57.57.55 0 1 .45 1 1V20c0 .55-.45 1-1 1-9.39 0-17-7.61-17-17 0-.55.45-1 1-1h3.5c.55 0 1 .45 1 1 0 1.25.2 2.45.57 3.57.11.35.03.74-.25 1.02l-2.2 2.2z" />
                </svg>
            </div>
            <div>
                <div class="cs-branch-name"><?php esc_html_e( 'AutoCare Express', 'nezer-motors' ); ?></div>
                <div class="cs-branch-val"><?php echo esc_html( $ac['phone'] ); ?></div>
            </div>
        </a>

        <a href="tel:<?php echo esc_attr( $qf['tel'] ); ?>" class="cs-branch cs-branch--qf"
            aria-label="<?php echo esc_attr( sprintf( __( 'Call QwikFix: %s', 'nezer-motors' ), $qf['phone'] ) ); ?>">
            <div class="cs-branch-dot" aria-hidden="true">
                <svg width="18" height="18" fill="#f87171" viewBox="0 0 24 24" aria-hidden="true">
                    <path
                        d="M6.62 10.79c1.44 2.83 3.76 5.14 6.59 6.59l2.2-2.2c.27-.27.67-.36 1.02-.24 1.12.37 2.33.57 3.57.57.55 0 1 .45 1 1V20c0 .55-.45 1-1 1-9.39 0-17-7.61-17-17 0-.55.45-1 1-1h3.5c.55 0 1 .45 1 1 0 1.25.2 2.45.57 3.57.11.35.03.74-.25 1.02l-2.2 2.2z" />
                </svg>
            </div>
            <div>
                <div class="cs-branch-name"><?php esc_html_e( 'QwikFix', 'nezer-motors' ); ?></div>
                <div class="cs-branch-val"><?php echo esc_html( $qf['phone'] ); ?></div>
            </div>
        </a>

        <a href="https://wa.me/<?php echo esc_attr( NM_WA_NUM ); ?>" target="_blank" rel="noopener noreferrer"
            class="cs-branch cs-branch--wa"
            aria-label="<?php esc_attr_e( 'Chat on WhatsApp: 0733 204 672', 'nezer-motors' ); ?>">
            <div class="cs-branch-dot" aria-hidden="true">
                <svg width="18" height="18" fill="#4ade80" viewBox="0 0 24 24" aria-hidden="true">
                    <path
                        d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z" />
                </svg>
            </div>
            <div>
                <div class="cs-branch-name"><?php esc_html_e( 'WhatsApp', 'nezer-motors' ); ?></div>
                <div class="cs-branch-val">0733 204 672</div>
            </div>
        </a>

    </nav>

    <!-- Footer -->
    <footer class="cs-footer">
        <span class="cs-footer-text">
            &copy; <?php echo date('Y'); ?> <?php bloginfo( 'name' ); ?> &mdash;
            <?php esc_html_e( 'All rights reserved', 'nezer-motors' ); ?>
        </span>
    </footer>

</div><!-- #nm-coming-soon -->

<script>
(function() {

    // ── Countdown ──────────────────────────────────────────────────────────
    var launch = new Date('<?php echo esc_js( $launch_date ); ?>').getTime();
    var boxD = document.getElementById('cd-days');
    var boxH = document.getElementById('cd-hours');
    var boxM = document.getElementById('cd-mins');
    var boxS = document.getElementById('cd-secs');

    function pad(n) {
        return String(n).padStart(2, '0');
    }

    function flip(el, val) {
        var n = pad(val);
        if (el.textContent !== n) {
            el.textContent = n;
            el.classList.remove('flip');
            void el.offsetWidth;
            el.classList.add('flip');
        }
    }

    function tick() {
        var now = Date.now();
        var diff = launch - now;
        if (diff <= 0) {
            diff = 0;
        }
        var d = Math.floor(diff / 864e5);
        var h = Math.floor((diff % 864e5) / 36e5);
        var m = Math.floor((diff % 36e5) / 6e4);
        var s = Math.floor((diff % 6e4) / 1e3);
        flip(boxD, d);
        flip(boxH, h);
        flip(boxM, m);
        flip(boxS, s);
    }

    tick();
    setInterval(tick, 1000);


    // ── Progress bar animation ─────────────────────────────────────────────
    var fill = document.getElementById('cs-progress-fill');
    setTimeout(function() {
        fill.style.width = '95%';
    }, 600);


    // ── Notify form ────────────────────────────────────────────────────────
    var form = document.getElementById('cs-notify-form');
    var input = document.getElementById('cs-email');

    form.addEventListener('submit', function(e) {
        e.preventDefault();
        var email = input.value.trim();
        if (!email || !/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)) {
            input.style.outline = '2px solid rgba(220,38,38,.6)';
            setTimeout(function() {
                input.style.outline = '';
            }, 1800);
            return;
        }
        var btn = form.querySelector('button');
        btn.textContent = '✓ Noted!';
        btn.style.background = 'linear-gradient(135deg,#15803d,#22c55e)';
        btn.style.color = '#fff';
        input.value = '';
        input.disabled = true;
        btn.disabled = true;
    });

})();
</script>

<?php get_footer(); ?>