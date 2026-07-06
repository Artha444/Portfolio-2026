<!DOCTYPE html>

<html lang="en"><head>
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<title>Artha | Pelajar SMK & Web Developer</title>
<script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
<script>
    tailwind.config = {
        darkMode: "class",
        theme: {
            extend: {
                colors: {
                    "surface-container-lowest": "#ffffff",
                    "on-background": "#1a1a2e",
                    "secondary": "#00668a",
                    "surface-container-low": "#eef4ff",
                    "outline-variant": "#c6c6cd",
                    "surface-container-highest": "#d4e4fa",
                    "primary": "#000000",
                    "on-surface-variant": "#45464d",
                    "on-primary": "#ffffff",
                    "background": "#fafafa",
                },
                fontFamily: {
                    "headline-lg": ["Inter"],
                    "headline-md": ["Inter"],
                    "body-md": ["Inter"],
                    "label-sm": ["Inter"]
                },
                fontSize: {
                    "headline-md": ["24px", {"lineHeight": "1.3", "letterSpacing": "-0.015em", "fontWeight": "500"}],
                    "body-md": ["16px", {"lineHeight": "1.5", "letterSpacing": "0", "fontWeight": "400"}],
                    "label-sm": ["12px", {"lineHeight": "1", "letterSpacing": "0.05em", "fontWeight": "500"}]
                }
            }
        }
    }
</script>
<link href="https://fonts.googleapis.com/css2?family=Hanken+Grotesk:wght@600;700;800&family=Inter:wght@400;500&family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css2?family=Geist:wght@100..900&family=Hanken+Grotesk:wght@100..900&family=Inter:wght@100..900&display=swap" rel="stylesheet"/>

    <style>
        /* Sembunyikan scrollbar untuk pengalaman UI yang lebih bersih (seperti aplikasi) */
        ::-webkit-scrollbar {
            display: none; /* Chrome, Safari, Opera */
        }
        html {
            -ms-overflow-style: none;  /* IE and Edge */
            scrollbar-width: none;  /* Firefox */
        }

        /* Transition Curtain */
        .transition-curtain {
            position: fixed;
            inset: 0;
            background-color: #1a1a2e;
            z-index: 9999;
            pointer-events: none;
            transform: translateY(100%);
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .transition-curtain .curtain-logo {
            font-family: 'Hanken Grotesk', sans-serif;
            font-size: 32px;
            font-weight: 800;
            color: #fff;
            opacity: 0;
            letter-spacing: -0.03em;
        }
.cta-button {
    position: relative;
    overflow: hidden;
    background-color: #0d1c2d;
    color: #ffffff;
    padding: 14px 32px;
    border-radius: 9999px;
    font-weight: 500;
    letter-spacing: -0.01em;
    box-shadow: 0 4px 20px rgba(13, 28, 45, 0.12);
    transition: all 0.3s ease-in-out;
}

.cta-button:hover {
    transform: translateY(-3px);
    box-shadow: 0 8px 30px rgba(13, 28, 45, 0.18);
}

.cta-button .shine {
    position: absolute;
    top: -50%;
    left: -200%;
    width: 200%;
    height: 250%;
    background: linear-gradient(
        to right,
        rgba(255, 255, 255, 0) 20%,
        rgba(255, 255, 255, 0.2) 50%,
        rgba(255, 255, 255, 0) 80%
    );
    transform: rotate(25deg);
    transition: left 1s cubic-bezier(0.23, 1, 0.32, 1);
}

.cta-button:hover .shine {
    left: 120%;
}

/* Softer blur effect for navbar */
.navbar-glass-effect {
    -webkit-mask-image: linear-gradient(to bottom, black 50%, transparent 100%);
    mask-image: linear-gradient(to bottom, black 50%, transparent 100%);
}

/* --- Intro Animations --- */
.intro-navbar {
    transform: translateY(-100%);
    opacity: 0;
    animation: slideInNavbar 0.8s cubic-bezier(0.22, 1, 0.36, 1) 0.2s forwards;
}
@keyframes slideInNavbar {
    to { transform: translateY(0); opacity: 1; }
}

.navbar-logo-transition {
    transition: transform 0.4s cubic-bezier(0.22, 1, 0.36, 1), letter-spacing 0.4s cubic-bezier(0.22, 1, 0.36, 1);
    transform-origin: left center;
}
.navbar-logo-scrolled {
    transform: scale(0.85);
    letter-spacing: -0.05em;
}

.intro-hero-circle {
    /* Mengatur panjang garis untuk animasi "menggambar diri" */
    stroke-dashoffset: 1445; /* Kira-kira keliling lingkaran (2 * PI * 230) */
    /* Menerapkan animasi "menggambar diri" yang berjalan sekali */
    animation: drawCircle 2s cubic-bezier(0.5, 1, 0.5, 1) 0.5s forwards;
}

/* Animasi untuk "menggambar diri" lingkaran */
@keyframes drawCircle {
    to { stroke-dashoffset: 0; }
}

@keyframes marquee {
    0% { transform: translateX(0); }
    100% { transform: translateX(-50%); }
}
@keyframes marqueeReverse {
    0% { transform: translateX(-50%); }
    100% { transform: translateX(0); }
}
.animate-marquee {
    animation: marquee 40s linear infinite;
}
.animate-marquee-reverse {
    animation: marqueeReverse 35s linear infinite;
}
.intro-hero-icon {
    will-change: transform, opacity;
}

.intro-main-title, .intro-sub-title, .intro-paragraph, .intro-cta, .intro-scroll-down {
    opacity: 0;
    transform: translateY(20px);
    animation: fadeIn-up 0.8s cubic-bezier(0.22, 1, 0.36, 1) forwards;
}

@keyframes fadeIn-up {
    to { opacity: 1; transform: translateY(0); }
}

/* .intro-main-title { animation-delay: 1.2s; } -> Dihapus, dipindahkan ke JS */
.intro-sub-title { animation-delay: 1.4s; }
.intro-paragraph { animation-delay: 1.6s; }
.intro-cta { animation-delay: 1.8s; }
.intro-scroll-down { animation-delay: 2.0s; }

/* Masking untuk membuat ikon menghilang di dekat judul */
#hero-bg-elements {
    mask-image: radial-gradient(ellipse 40% 30% at 50% 50%, transparent 0%, transparent 40%, black 100%);
    -webkit-mask-image: radial-gradient(ellipse 40% 30% at 50% 50%, transparent 0%, transparent 40%, black 100%);
}

/* Projects specific styles */
.font-neue { font-family: 'Hanken Grotesk', sans-serif; }
.editorial-tracking { letter-spacing: -0.035em; }

@keyframes blob {
    0% { transform: translate(0px, 0px) scale(1); }
    33% { transform: translate(30px, -50px) scale(1.1); }
    66% { transform: translate(-20px, 20px) scale(0.9); }
    100% { transform: translate(0px, 0px) scale(1); }
}
.animate-blob { animation: blob 7s infinite; }

/* Hero */
.projects-hero {
    min-height: 100vh;
    display: flex;
    align-items: center;
    justify-content: center;
    position: relative;
    overflow: hidden;
    background: linear-gradient(180deg, #ffffff 0%, #fafafa 100%);
}
.hero-decoration {
    position: absolute;
    border-radius: 50%;
    pointer-events: none;
    will-change: transform;
}
.hero-decoration-1 { width: 60vmax; height: 60vmax; top: -10%; right: -20%; background: radial-gradient(circle, rgba(64,194,253,0.05) 0%, transparent 70%); }
.hero-decoration-2 { width: 40vmax; height: 40vmax; bottom: -10%; left: -15%; background: radial-gradient(circle, rgba(229,239,255,0.8) 0%, transparent 70%); }
.hero-decoration-3 { width: 1px; height: 35vh; top: 15%; left: 15%; background: linear-gradient(180deg, transparent, rgba(26,26,46,0.06), transparent); }
.hero-decoration-4 { width: 25vmin; height: 25vmin; top: 20%; left: 65%; border: 1px solid rgba(26,26,46,0.05); }
.hero-decoration-5 { width: 180px; height: 180px; bottom: 25%; right: 8%; border: 1px solid rgba(26,26,46,0.03); }

.hero-content { position: relative; z-index: 2; text-align: center; padding: 0 24px; }
.hero-label {
    display: inline-block; font-size: 0.8rem; font-weight: 500; letter-spacing: 0.15em;
    text-transform: uppercase; color: #00668a; margin-bottom: 20px;
    padding: 6px 16px; border-radius: 999px; background: rgba(0,102,138,0.06);
}
.hero-title {
    font-family: 'Hanken Grotesk', sans-serif;
    font-size: clamp(72px, 14vw, 180px); font-weight: 800;
    line-height: 0.92; letter-spacing: -0.04em; color: #1a1a2e; margin-bottom: 20px;
}
.hero-subtitle { font-size: clamp(15px, 2vw, 18px); line-height: 1.6; color: rgba(26,26,46,0.5); max-width: 500px; margin: 0 auto; }

.scroll-indicator {
    position: absolute; bottom: 40px; left: 50%; transform: translateX(-50%);
    display: flex; flex-direction: column; align-items: center; gap: 8px;
    color: rgba(26,26,46,0.2); font-size: 0.7rem; letter-spacing: 0.15em; text-transform: uppercase;
    animation: floatDown 2.5s cubic-bezier(0.22,1,0.36,1) infinite;
}
.scroll-indicator .line { width: 1px; height: 40px; background: linear-gradient(180deg, rgba(26,26,46,0.2), transparent); }

/* Project Cards */
.projects-section { padding: 100px 0 140px; position: relative; z-index: 2; background: #ffffff; }

.curated-card {
    background: rgba(255, 255, 255, 0.7);
    backdrop-filter: blur(10px);
    border-radius: 20px;
    overflow: hidden;
    border: 1px solid rgba(255, 255, 255, 0.5);
    transition: transform 0.4s cubic-bezier(0.22,1,0.36,1),
                box-shadow 0.4s cubic-bezier(0.22,1,0.36,1);
    will-change: transform;
    transform-style: preserve-3d;
}
.curated-card:hover {
    box-shadow: 0 30px 60px rgba(0,0,0,0.1);
}

.curated-card-img {
    transition: transform 0.6s cubic-bezier(0.22,1,0.36,1);
    will-change: transform;
}
.curated-card:hover .curated-card-img { transform: scale(1.05); }

.view-project-btn .arrow-icon {
    transition: transform 0.3s cubic-bezier(0.22,1,0.36,1);
}
.curated-card:hover .view-project-btn .arrow-icon {
    transform: translateX(4px);
}
.view-project-btn::after {
    content: '';
    position: absolute;
    bottom: -1px;
    left: 0;
    width: 0;
    height: 1px;
    background: #1a1a2e;
    transition: width 0.35s cubic-bezier(0.22,1,0.36,1);
}
.curated-card:hover .view-project-btn::after {
    width: 100%;
}

.container-narrow { max-width: 1280px; margin: 0 auto; padding: 0 24px; }
@media (min-width: 768px) { .container-narrow { padding: 0 40px; } }
@media (min-width: 1024px) { .container-narrow { padding: 0 64px; } }

.section-header { margin-bottom: 56px; }
.section-header h2 {
    font-family: 'Hanken Grotesk', sans-serif;
    font-size: clamp(28px, 4vw, 48px); font-weight: 700;
    line-height: 1.1; letter-spacing: -0.03em; color: #1a1a2e;
}
.section-header p { font-size: 15px; line-height: 1.6; color: rgba(26,26,46,0.5); margin-top: 10px; max-width: 480px; }

.font-label-md { font-size: 1.05rem; letter-spacing: -0.01em; }

/* ── Scroll Progress Bar ── */
#scroll-progress {
    position: fixed;
    top: 0; left: 0;
    height: 3px;
    background: linear-gradient(90deg, #00668a, #4285F4, #34A853);
    z-index: 99998;
    width: 0%;
    transition: width 0.1s linear;
    pointer-events: none;
}

/* ── Particle Canvas ── */
#particle-canvas {
    position: fixed;
    inset: 0;
    width: 100%;
    height: 100%;
    z-index: 0;
    pointer-events: none;
    opacity: 0.4;
}

/* ── Magnetic Button Wrapper ── */
.magnetic-wrap {
    display: inline-block;
    transition: transform 0.4s cubic-bezier(0.34, 1.56, 0.64, 1);
    will-change: transform;
}

/* ── Ripple Effect ── */
.ripple-effect {
    position: fixed;
    border-radius: 50%;
    background: rgba(0,102,138,0.08);
    transform: scale(0);
    animation: rippleAnim 0.8s ease-out forwards;
    pointer-events: none;
    z-index: 99999;
}
@keyframes rippleAnim {
    to { transform: scale(4); opacity: 0; }
}

/* ── Reveal Clip (Image Reveal) ── */
.reveal-clip {
    clip-path: inset(0 100% 0 0);
    transition: clip-path 1.2s cubic-bezier(0.77, 0, 0.18, 1);
}
.reveal-clip.is-revealed {
    clip-path: inset(0 0 0 0);
}

/* ── Split Text Reveal ── */
.split-char {
    display: inline-block;
    opacity: 0;
    transform: translateY(40px) rotateX(30deg);
    transition: opacity 0.5s cubic-bezier(0.22, 1, 0.36, 1),
                transform 0.7s cubic-bezier(0.22, 1, 0.36, 1);
}
.split-char.is-visible {
    opacity: 1;
    transform: translateY(0) rotateX(0);
}

/* ── Mouse Glow ── */
#mouse-glow {
    position: fixed;
    pointer-events: none;
    z-index: 99997;
    width: 500px;
    height: 500px;
    border-radius: 50%;
    background: radial-gradient(circle, rgba(0,102,138,0.07) 0%, transparent 70%);
    transform: translate(-50%, -50%);
    will-change: left, top;
}

/* ── Scramble chars ── */
.scramble-char {
    color: #00668a;
}

/* ── Parallax Layers ── */
.parallax-layer {
    position: absolute;
    pointer-events: none;
    will-change: transform;
    border-radius: 50%;
}

/* ── Custom Cursor ── */
.cursor-ring {
    position: fixed;
    pointer-events: none;
    z-index: 99999;
    width: 56px;
    height: 56px;
    border-radius: 50%;
    border: 1.5px solid rgba(0,102,138,0.2);
    background: transparent;
    transform: translate(-50%, -50%) scale(1);
    transition: width 0.5s cubic-bezier(0.34, 1.56, 0.64, 1),
                height 0.5s cubic-bezier(0.34, 1.56, 0.64, 1),
                border-color 0.4s ease,
                background 0.4s ease,
                box-shadow 0.4s ease;
    will-change: transform, left, top;
    display: flex;
    align-items: center;
    justify-content: center;
    mix-blend-mode: normal;
}
.cursor-ring.is-hover {
    width: 96px;
    height: 96px;
    border-color: rgba(0,102,138,0.15);
    border-width: 1px;
    background: #ffffff;
    box-shadow: 0 8px 32px rgba(0,0,0,0.08),
                0 2px 8px rgba(0,0,0,0.04),
                inset 0 1px 0 rgba(255,255,255,0.8);
}
.cursor-ring.is-hidden {
    opacity: 0;
    transition: opacity 0.3s ease;
}
.cursor-label {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    gap: 1px;
    opacity: 0;
    transform: translateY(12px) scale(0.6);
    transition: opacity 0.3s cubic-bezier(0.22, 1, 0.36, 1),
                transform 0.45s cubic-bezier(0.34, 1.56, 0.64, 1);
    will-change: transform, opacity;
}
.cursor-ring.is-hover .cursor-label {
    opacity: 1;
    transform: translateY(0) scale(1);
}
.cursor-icon {
    font-size: 22px !important;
    color: #00668a;
    font-variation-settings: 'FILL' 0, 'wght' 300;
    line-height: 1;
    transition: transform 0.3s ease;
}
.cursor-ring.is-hover .cursor-icon {
    transform: scale(1.1);
}
.cursor-text {
    font-size: 10px;
    font-weight: 700;
    letter-spacing: 0.06em;
    text-transform: uppercase;
    color: #1a1a2e;
    line-height: 1;
    white-space: nowrap;
}

/* Hide default cursor on interactive elements */
body:not(.cursor-disabled) a,
body:not(.cursor-disabled) button,
body:not(.cursor-disabled) input,
body:not(.cursor-disabled) textarea,
body:not(.cursor-disabled) [onclick],
body:not(.cursor-disabled) .curated-card,
body:not(.cursor-disabled) .project-card {
    cursor: none;
}

@media (max-width: 767px) {
    .hero-title { font-size: clamp(48px, 15vw, 72px); }
    .projects-section { padding: 50px 0 80px; }
    .scroll-indicator { display: none; }
}
</style>

    @stack('styles')
</head>
<body class="bg-surface-container-lowest overflow-hidden">
    <!-- Global Initial Loader to wait for fonts -->
    <div id="initial-loader" class="fixed inset-0 z-[99999] bg-surface-container-lowest flex items-center justify-center transition-opacity duration-700 ease-in-out">
        <div class="flex flex-col items-center gap-4">
            <div class="w-10 h-10 border-[3px] border-outline-variant/30 border-t-primary rounded-full animate-spin"></div>
            <span class="font-neue font-bold text-primary tracking-[0.2em] text-sm uppercase">Artha</span>
        </div>
    </div>
    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const loader = document.getElementById('initial-loader');
            if (!loader) return;
            
            const hideLoader = () => {
                if (loader.style.opacity === '0') return;
                loader.style.opacity = '0';
                document.body.classList.remove('overflow-hidden');
                setTimeout(() => loader.remove(), 700);
            };

            if (document.fonts && document.fonts.ready) {
                document.fonts.ready.then(() => {
                    setTimeout(hideLoader, 150); // slight delay to ensure paint
                });
            } else {
                window.addEventListener('load', hideLoader);
            }
            
            // Fallback timeout in case font loading hangs
            setTimeout(hideLoader, 3500);
        });
    </script>
    <div class="transition-curtain">
        <div class="curtain-logo">Artha</div>
    </div>

<!-- Custom Cursor Elements -->

<div class="cursor-ring">
    <span class="cursor-label">
        <span class="cursor-icon material-symbols-outlined">touch_app</span>
        <span class="cursor-text">Buka</span>
    </span>
</div>

<!-- Navigation Shell -->
<!-- Full-width container for the blur effect -->
<div id="global-navbar" class="fixed top-0 left-0 w-full z-50 py-4 backdrop-blur-lg navbar-glass-effect intro-navbar" style="{{ request()->is('project/*') ? 'display: none; opacity: 0; transform: translateY(-100%);' : '' }}">
    <!-- Centered and styled navbar -->
    <nav class="max-w-[1280px] mx-auto bg-surface-container-lowest/80 text-on-background border border-outline-variant/30 flex justify-between items-center px-6 py-3 rounded-2xl shadow-lg shadow-primary/5">

    <a id="navbar-logo" class="navbar-logo-transition font-headline-md text-2xl md:text-3xl font-bold text-on-background hover:text-secondary transition-colors duration-200" href="#">
        Artha
    </a>

    <div class="hidden md:flex items-center gap-8">
        
        <!-- Nav Links -->
        <a href="#about" data-target="about" class="nav-link group relative font-label-md text-label-md hover:text-primary transition-colors duration-200">
            <span class="jump-text inline-flex gap-[2px]">About</span>
            <span class="underline absolute bottom-[-7px] left-0 w-0 h-[2.5px] bg-primary transition-all duration-300"></span>
        </a>
        
        <a href="#projects" data-target="projects" class="nav-link group relative font-label-md text-label-md hover:text-primary transition-colors duration-200">
            <span class="jump-text inline-flex gap-[2px]">Projects</span>
            <span class="underline absolute bottom-[-7px] left-0 w-0 h-[2.5px] bg-primary transition-all duration-300"></span>
        </a>
        
        <a href="#capabilities" data-target="capabilities" class="nav-link group relative font-label-md text-label-md hover:text-primary transition-colors duration-200">
            <span class="jump-text inline-flex gap-[2px]">Capabilities</span>
            <span class="underline absolute bottom-[-7px] left-0 w-0 h-[2.5px] bg-primary transition-all duration-300"></span>
        </a>

        <!-- Contact Button dengan Animasi -->
        <button onclick="let el = document.getElementById('contact'); let t = 0; while(el){t+=el.offsetTop; el=el.offsetParent;} window.scrollTo({top:t, behavior:'smooth'});" 
                class="contact-btn group relative overflow-hidden bg-primary hover:bg-primary/90 text-on-primary px-8 py-3 font-label-md text-label-md rounded-full transition-all duration-300 hover:scale-105 active:scale-95 shadow-md hover:shadow-xl flex items-center gap-2">
            <span class="relative z-10">Contact</span>
            <span class="material-symbols-outlined relative z-10 transition-transform duration-300 group-hover:rotate-45">arrow_outward</span>
            
            <!-- Shine / Highlight Effect -->
            <span class="shine absolute top-0 -left-full w-1/3 h-full bg-gradient-to-r from-transparent via-white/30 to-transparent skew-x-12 transition-all duration-700 group-hover:left-full"></span>
        </button>
    </div>

    <button class="md:hidden p-2 hover:text-secondary transition-colors">
        <span class="material-symbols-outlined">menu</span>
    </button>
    </nav>
</div>

<script>
// Split text menjadi huruf
document.querySelectorAll('.jump-text').forEach(text => {
    const letters = text.textContent.split('');
    text.innerHTML = letters.map(letter => 
        `<span>${letter === ' ' ? '&nbsp;' : letter}</span>`
    ).join('');
});

// Klik handler dengan staggered animation
// Function to handle smooth scrolling to an element
window.smoothScrollTo = function(targetId, duration = 500) {
    if (targetId === '#') {
        window.scrollTo({ top: 0, behavior: 'smooth' });
        return;
    }
    
    const targetElement = document.querySelector(targetId);
    if (!targetElement) return;

    let topOffset = 0;
    let el = targetElement;
    while(el && el !== document.body) {
        topOffset += el.offsetTop;
        el = el.offsetParent;
    }

    const startY = window.scrollY;
    const distance = topOffset - startY;
    const startTime = performance.now();

    function easeOutCubic(t) { return 1 - Math.pow(1 - t, 3); }

    if (window._navScrollRaf) cancelAnimationFrame(window._navScrollRaf);

    function animateScroll(currentTime) {
        const elapsed = currentTime - startTime;
        const progress = Math.min(elapsed / duration, 1);
        window.scrollTo(0, startY + distance * easeOutCubic(progress));
        if (progress < 1) {
            window._navScrollRaf = requestAnimationFrame(animateScroll);
        }
    }
    window._navScrollRaf = requestAnimationFrame(animateScroll);
};

// Global delegated click handler for all anchor links
document.body.addEventListener('click', function(e) {
    const link = e.target.closest('a[href^="#"]');
    if (link) {
        // Only prevent default if it's an internal link we want to animate
        const targetId = link.getAttribute('href');
        
        // Don't intercept if it's just a fallback link with no id
        if (targetId === '#' && link.id !== 'navbar-logo') return;
        
        e.preventDefault();
        
        // Determine duration based on distance/target
        const isNearSection = targetId === '#home' || targetId === '#about';
        const duration = isNearSection ? 500 : 700;
        
        window.smoothScrollTo(targetId, duration);
    }
});

// Staggered animation specific for nav-links
document.querySelectorAll('.nav-link').forEach(link => {
    link.addEventListener('click', function(e) {
        // Scroll is already handled by the global handler above
        // Reset semua link
        document.querySelectorAll('.nav-link').forEach(l => {
            l.classList.remove('active');
            l.querySelector('.underline').style.width = '0';
        });

        // Aktifkan link ini
        this.classList.add('active');
        
        // Reset animasi dulu
        const spans = this.querySelectorAll('.jump-text span');
        spans.forEach(span => {
            span.style.animation = 'none';
            void span.offsetWidth; // trigger reflow
        });

        // Jalankan animasi bergantian
        spans.forEach((span, index) => {
            span.style.animation = `jumpLetter 0.6s cubic-bezier(0.34, 1.56, 0.64, 1) forwards ${index * 35}ms`;
        });

        // Underline
        this.querySelector('.underline').style.width = '100%';
    });
});

// Automatic active nav link on scroll
window.sectionObserver = null;
window.initNavbar = function() {
    if (window.sectionObserver) {
        window.sectionObserver.disconnect();
    }
    const sections = document.querySelectorAll('section[id]');
    const navLinks = document.querySelectorAll('.nav-link');

    const observerOptions = {
        root: null,
        rootMargin: '0px',
        threshold: 0.4
    };

    window.sectionObserver = new IntersectionObserver((entries, observer) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const targetId = entry.target.id;
                navLinks.forEach(link => {
                    link.classList.remove('active');
                    const spans = link.querySelectorAll('.jump-text span');
                    spans.forEach(span => { span.style.animation = 'none'; });
                    link.querySelector('.underline').style.width = '0';

                    if (link.getAttribute('data-target') === targetId) {
                        link.classList.add('active');
                        link.querySelector('.underline').style.width = '100%';
                        const activeSpans = link.querySelectorAll('.jump-text span');
                        activeSpans.forEach(span => {
                            span.style.animation = 'none';
                            void span.offsetWidth;
                            span.style.animation = `jumpLetter 0.6s cubic-bezier(0.34, 1.56, 0.64, 1) forwards ${Array.from(activeSpans).indexOf(span) * 35}ms`;
                        });
                    }
                });
            }
        });
    }, observerOptions);

    sections.forEach(section => window.sectionObserver.observe(section));
};
window.initNavbar();
</script>
    <main data-barba="wrapper">
        @yield('content')
    </main>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/gsap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/ScrollTrigger.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/vanilla-tilt/1.8.1/vanilla-tilt.min.js"></script>
<script src="https://unpkg.com/@barba/core"></script>
<script>
        // ============================================================
        // Disable browser scroll restoration GLOBALLY — Barba handles it
        // ============================================================
        if ('scrollRestoration' in history) {
            history.scrollRestoration = 'manual';
        }

        window.resetSmoothScroll = function(targetPos = 0) {
            window.scrollTo(0, targetPos);
        };

        // Track the intended scroll position for the next page
        window._pendingScrollY = 0;

        function setBodyHeight() {
            if (typeof ScrollTrigger !== 'undefined') {
                ScrollTrigger.refresh();
            }
        }


        // Carousel logic
        const carouselState = {};

        function initCarousel(id) {
            carouselState[id] = { current: 0 };
        }

        function getTotal(id) {
            return document.querySelectorAll(`#${id} .carousel-slide`).length;
        }

        function updateCarousel(id) {
            const track = document.querySelector(`#${id} .carousel-track`);
            const state = carouselState[id];
            const total = getTotal(id);
            track.style.transform = `translateX(-${(state.current * 100) / total}%)`;
            document.querySelectorAll(`#${id} .carousel-dot`).forEach((dot, i) => {
                dot.style.opacity = i === state.current ? '1' : '0.4';
            });
        }

        function nextSlide(id) {
            const total = getTotal(id);
            carouselState[id].current = (carouselState[id].current + 1) % total;
            updateCarousel(id);
        }

        function prevSlide(id) {
            const total = getTotal(id);
            carouselState[id].current = (carouselState[id].current - 1 + total) % total;
            updateCarousel(id);
        }

        function goToSlide(id, index) {
            carouselState[id].current = index;
            updateCarousel(id);
        }

        // Init all carousels
        document.querySelectorAll('[id^="carousel-"]').forEach(el => initCarousel(el.id));

        // Hero text rotation — staggered letter reveal
        window.initHomeScripts = function(container = document) {
            // Cleanup previous instances if any
            if (window.heroTextInterval) clearInterval(window.heroTextInterval);
            if (window.orbitReq) cancelAnimationFrame(window.orbitReq);
            ScrollTrigger.getAll().forEach(t => t.kill());
            // Do NOT reset scroll here, Barba handles scroll restoration!

(function() {
    const wrapper = container.querySelector('.hero-text-wrapper');
    const texts = container.querySelectorAll('.hero-text');
    if (!texts.length) return;

    // Pecah tiap teks jadi span per-karakter (br tetap dipertahankan)
texts.forEach(text => {
    const originalText = text.textContent;
    let charIndex = 0;
    const chars = originalText.split('').map(ch => {
        return `<span class="hero-char" data-i="${charIndex++}">${ch}</span>`;
    }).join('');
    text.innerHTML = chars;
});

    let current = 0;
    let isAnimating = false;

    function showText(index) {
        const text = texts[index];
        const chars = text.querySelectorAll('.hero-char');
        text.classList.add('is-active');
        text.classList.remove('opacity-0');
        
        chars.forEach((char, i) => {
            char.style.transition = 'none';
            char.style.opacity = '0';
            char.style.filter = 'blur(10px)';
            char.style.transform = 'translateY(40px) scale(0.7)';
            void char.offsetWidth; // Trigger a reflow to apply styles immediately
            char.style.transition = `opacity 0.55s cubic-bezier(0.22, 1, 0.36, 1) ${i * 25}ms, transform 0.65s cubic-bezier(0.22, 1, 0.36, 1) ${i * 25}ms, filter 0.55s ease ${i * 25}ms`;
            char.style.opacity = '1';
            char.style.filter = 'blur(0px)';
            char.style.transform = 'translateY(0) scale(1)';
        });
    }

    function hideText(index) {
        const text = texts[index];
        const chars = text.querySelectorAll('.hero-char');
        const total = chars.length;

        chars.forEach((char, i) => {
            const delay = (total - 1 - i) * 20; // urutan kebalikan: huruf terakhir duluan hilang
            char.style.transition = `opacity 0.4s ease ${delay}ms, transform 0.45s cubic-bezier(0.55, 0, 1, 0.45) ${delay}ms, filter 0.4s ease ${delay}ms`;
            char.style.opacity = '0';
            char.style.filter = 'blur(8px)';
            char.style.transform = 'translateY(-30px) scale(0.85)';
        });

        setTimeout(() => {
            text.classList.remove('is-active');
            text.classList.add('opacity-0');
        }, 420);
    }

    function rotateText() {
        if (isAnimating) return;
        isAnimating = true;

        const next = (current + 1) % texts.length;
        hideText(current);
        
        setTimeout(() => { 
            showText(next); 
        }, 300);

        current = next;
        setTimeout(() => { isAnimating = false; }, 900);
    }

    // Tampilkan teks pertama saat load
    setTimeout(() => { showText(current); }, 2000); // Delay to sync with intro animation

    // Hanya jalankan interval jika ada lebih dari satu teks
    if (texts.length > 1) {
        window.heroTextInterval = setInterval(rotateText, 4200);
    }
})();

        // Floating Icons Animation — orbiting icons behind hero text
        (function() { // SVG Icon Orbit and Intro Animation
            const svgContainer = container.querySelector('#hero-bg-elements');
            if (!svgContainer) return;
            
            // Clear existing icons to prevent duplicates
            svgContainer.querySelectorAll('.intro-hero-icon').forEach(el => el.remove());

            const icons = ['◆','◇','○','●','△','▲','□','■','☆','★','✦','✧'];
            const numIcons = 12;
            const radius = 230;
            const center = 500;
            let particles = [];

            // Palet warna untuk ikon-ikon standar
            const iconColors = [
                '#4285F4', // Biru
                '#34A853', // Hijau
                '#FBBC05', // Kuning
                '#EA4335', // Merah
                '#9C27B0', // Ungu
                '#00BCD4', // Cyan
                '#FF9800', // Oranye
                '#E91E63', // Pink
                '#607D8B', // Biru Abu-abu
                '#795548'  // Cokelat
            ];
            for (let i = 0; i < numIcons; i++) {
                const angle = (i / numIcons) * Math.PI * 2;
                const x = center + Math.cos(angle) * radius;
                const y = center + Math.sin(angle) * radius;

                const textEl = document.createElementNS('http://www.w3.org/2000/svg', 'text');
                textEl.setAttribute('x', x);
                textEl.setAttribute('y', y);
                textEl.setAttribute('font-family', 'Inter, sans-serif');
                textEl.setAttribute('font-size', '40');
                textEl.setAttribute('font-weight', '600');
                textEl.setAttribute('text-anchor', 'middle');
                textEl.setAttribute('dominant-baseline', 'central');
                textEl.classList.add('intro-hero-icon');
                const iconChar = icons[i % icons.length];
                textEl.textContent = iconChar;

                let particleColor;
                if (iconChar === '✦' || iconChar === '✧') {
                    particleColor = 'url(#gemini-gradient)'; // Gunakan gradasi Gemini
                } else {
                    particleColor = iconColors[i % iconColors.length]; // Gunakan warna dari palet
                }
                textEl.setAttribute('fill', particleColor);

                svgContainer.appendChild(textEl);
                
                // Animate with GSAP to avoid scroll interrupt issues
                gsap.fromTo(textEl, 
                    { opacity: 0, scale: 0.5, transformOrigin: "50% 50%" },
                    { opacity: 1, scale: 1, duration: 0.6, ease: "back.out(1.56)", delay: 1.2 + i * 0.07 }
                );

                particles.push({
                    el: textEl, // element SVG
                    angle: angle, // sudut orbit saat ini
                    speed: 0.1, // kecepatan orbit
                    defaultColor: particleColor, // Simpan warna asli
                    x: x, // posisi x saat ini
                    y: y, // posisi y saat ini
                    vx: 0, // kecepatan x untuk interaksi
                    vy: 0  // kecepatan y untuk interaksi
                });
            }

            const svgRect = svgContainer.getBoundingClientRect();

            const hoverColor = '#00668a';   // Warna saat didekati (secondary)
            function animateOrbit() {
                // Konversi posisi mouse dari koordinat viewport ke koordinat SVG
                const svgMouseX = (window.mouseX - svgRect.left) * (1000 / svgRect.width);
                const svgMouseY = (window.mouseY - svgRect.top) * (1000 / svgRect.height);

                particles.forEach(p => {
                    // 1. Hitung posisi orbit normal
                    p.angle -= p.speed * 0.005;
                    const orbitalX = center + Math.cos(p.angle) * radius;
                    const orbitalY = center + Math.sin(p.angle) * radius;

                    // 2. Hitung jarak dari mouse ke ikon
                    const dx = p.x - svgMouseX;
                    const dy = p.y - svgMouseY;
                    const distance = Math.sqrt(dx * dx + dy * dy);
                    const interactionRadius = 100; // Jarak radius interaksi

                    // 3. Jika mouse cukup dekat, berikan gaya dorong
                    if (distance < interactionRadius) {
                        const force = (interactionRadius - distance) / interactionRadius;
                        p.vx += (dx / distance) * force * 0.5; // Dorong menjauh dari mouse
                        p.vy += (dy / distance) * force * 0.5;
                        // Untuk ikon gradasi, kita tidak ubah warnanya saat hover agar gradasi tetap terlihat
                        if (p.defaultColor !== 'url(#gemini-gradient)') {
                            p.el.setAttribute('fill', hoverColor); // Ubah warna saat dekat
                        }
                    } else {
                        if (p.el.getAttribute('fill') !== p.defaultColor) {
                            p.el.setAttribute('fill', p.defaultColor); // Kembalikan ke warna asli
                        }
                    }

                    // 4. Terapkan gaya pegas untuk kembali ke orbit
                    p.vx += (orbitalX - p.x) * 0.02; // Tarik kembali ke posisi orbit (lebih kuat)
                    p.vy += (orbitalY - p.y) * 0.02;

                    // 5. Terapkan friksi dan update posisi
                    p.vx *= 0.88; p.vy *= 0.88; // Efek peredam (lebih sedikit, agar lebih 'kenyal')
                    p.x += p.vx; p.y += p.vy;
                    p.el.setAttribute('x', p.x); p.el.setAttribute('y', p.y);
                });
                window.orbitReq = requestAnimationFrame(animateOrbit);
            }

            // Start orbit after intro animation is done
            setTimeout(animateOrbit, 2500);
        })();


        // Scroll down button - only show when at top of page
        const scrollBtn = container.querySelector('#scroll-down');
        if (scrollBtn) {
            scrollBtn.addEventListener('click', () => {
                const projects = container.querySelector('#projects');
                if (projects) projects.scrollIntoView({ behavior: 'smooth' });
            });
            function updateScrollBtn() {
                scrollBtn.style.opacity = window.scrollY < 50 ? '1' : '0';
                scrollBtn.style.pointerEvents = window.scrollY < 50 ? 'auto' : 'none';
            }
            window.addEventListener('scroll', updateScrollBtn);
            updateScrollBtn();
        }

        // Hero Section 3D Tilt Effect — only runs if home-page elements exist
        const heroSection = container.querySelector('#home');
        const heroContent = container.querySelector('.hero-content-inner');
        const heroMainContent = container.querySelector('.hero-main-content');
        const titleChars = container.querySelectorAll('.interactive-title-chars');
        const heroTitleWrapper = container.querySelector('.hero-title-wrapper');
        const heroTitleGlow = container.querySelector('.hero-title-glow');

        // --- Navbar Logo Scroll Animation ---
        const navbarLogo = document.getElementById('navbar-logo');
        if (navbarLogo) {
            ScrollTrigger.create({
                trigger: document.body,
                start: 'top -50',
                end: 99999,
                onEnter: () => navbarLogo.classList.add('navbar-logo-scrolled'),
                onLeaveBack: () => navbarLogo.classList.remove('navbar-logo-scrolled')
            });
        }

        // --- Project Cards Scroll Animation ---
        const projectCards = container.querySelectorAll('.project-card');
        if (projectCards.length > 0) {
            gsap.from(projectCards, {
                scrollTrigger: {
                    trigger: '#projects',
                    start: 'top 75%',
                    toggleActions: 'play none none reverse'
                },
                y: 50,
                opacity: 0,
                scale: 0.95,
                duration: 0.8,
                stagger: 0.15,
                ease: 'power3.out'
            });
        }

        if (titleChars.length > 0) {
            // Staggered intro animation for title characters
            titleChars.forEach((char, index) => {
                char.style.animationDelay = `${1.2 + index * 0.03}s`;
            });

            // After intro animation, clear CSS so GSAP can take over
            const lastChar = titleChars[titleChars.length - 1];
            
            const clearCssFn = () => {
                titleChars.forEach(char => {
                    char.style.animation = 'none';
                    char.style.opacity = '1';
                    char.style.transform = 'translateY(0)';
                });
            };

            if (lastChar) {
                lastChar.addEventListener('animationend', clearCssFn, { once: true });
            }
            
            // Fallback in case browser pauses CSS animation (e.g. if scrolled out of view and ScrollTrigger sets opacity: 0)
            setTimeout(clearCssFn, 2500);
        }

        if (heroSection && heroContent) {
            heroSection.addEventListener('mousemove', (e) => {
                if (window.matchMedia("(prefers-reduced-motion: reduce)").matches) return;
                const { left, top, width, height } = heroSection.getBoundingClientRect();
                const rotateX = (((e.clientY - top) / height) - 0.5) * 12;
                const rotateY = (((e.clientX - left) / width) - 0.5) * -12;
                heroContent.style.transform = `perspective(1000px) rotateX(${rotateX}deg) rotateY(${rotateY}deg) scale3d(1.02, 1.02, 1.02)`;
            });
            heroSection.addEventListener('mouseleave', () => {
                heroContent.style.transform = 'perspective(1000px) rotateX(0) rotateY(0) scale3d(1, 1, 1)';
            });
        }

        // --- Interactive Title Animation on Mouse Move ---
        if (heroTitleWrapper && heroTitleGlow) {
            heroTitleWrapper.addEventListener('mousemove', (e) => {
                if (window.matchMedia("(prefers-reduced-motion: reduce)").matches) return;
                heroTitleGlow.classList.add('is-active');
                titleChars.forEach(char => {
                    const rect = char.getBoundingClientRect();
                    const dx = e.clientX - (rect.left + rect.width / 2);
                    const dy = e.clientY - (rect.top + rect.height / 2);
                    const distance = Math.sqrt(dx * dx + dy * dy);
                    const maxDist = 100;
                    if (distance < maxDist) {
                        const force = (maxDist - distance) / maxDist;
                        gsap.to(char, { x: (dx / distance) * -force * 25, y: (dy / distance) * -force * 25, scale: 1 + force * 0.15, duration: 0.3, ease: 'power3.out' });
                        char.classList.add('rgb-text-anim');
                    } else {
                        gsap.to(char, { x: 0, y: 0, scale: 1, duration: 0.5, ease: 'elastic.out(1, 0.5)' });
                        char.classList.remove('rgb-text-anim');
                    }
                });
            });
            heroTitleWrapper.addEventListener('mouseleave', () => {
                heroTitleGlow.classList.remove('is-active');
                gsap.to(titleChars, { x: 0, y: 0, scale: 1, duration: 0.5, ease: 'elastic.out(1, 0.5)', stagger: { each: 0.015, from: 'center' } });
                titleChars.forEach(char => char.classList.remove('rgb-text-anim'));
            });
        }



        // ── Smart Interactive Cursor ──
        // Disable on touch devices
        if ('ontouchstart' in window || navigator.maxTouchPoints > 0) {
            document.body.classList.add('cursor-disabled');
            document.querySelector('.cursor-ring').remove();
        } else {
        const cursorRing = document.querySelector('.cursor-ring');
        const cursorLabel = cursorRing.querySelector('.cursor-label');
        const cursorIcon = cursorRing.querySelector('.cursor-icon');
        const cursorText = cursorRing.querySelector('.cursor-text');

        window.mouseX = -100;
        window.mouseY = -100;
        let ringX = -100, ringY = -100;
        let ringVX = 0, ringVY = 0;
        const spring = 0.035;
        const friction = 0.82;
        let cursorVisible = false;
        let currentHoverEl = null;

        // Label map: element selectors → { icon, text }
        const labelMap = [
            // Order matters: most specific first
            { test: (el) => !!el.closest('.curated-card') || !!el.closest('.project-card'), icon: 'visibility', text: 'Lihat' },
            { test: (el) => !!el.closest('[data-tilt]'), icon: '360', text: 'Eksplor' },
            { test: (el) => {
                const a = el.closest('a');
                return a && a.getAttribute('href')?.startsWith('#');
            }, icon: 'arrow_downward', text: 'Scroll' },
            { test: (el) => !!el.closest('a'), icon: 'open_in_new', text: 'Buka' },
            { test: (el) => !!el.closest('button') || el.closest('[onclick]'), icon: 'touch_app', text: 'Klik' },
            { test: (el) => el.matches('input') || el.matches('textarea'), icon: 'edit', text: 'Tulis' },
            { test: (el) => !!el.closest('img') || !!el.closest('[class*="card"]'), icon: 'zoom_in', text: 'Lihat' },
        ];

        function getLabelFor(el) {
            for (const entry of labelMap) {
                if (entry.test(el)) return entry;
            }
            return null;
        }

        let leaveTimer = null;

        function getLogicalTarget(el) {
            // Walk up to find the closest interactive parent
            const interactiveSelectors = 'a, button, [onclick], input, textarea, [class*="card"], [data-tilt], img';
            const closest = el.closest(interactiveSelectors);
            return closest || el;
        }

        window.addEventListener('mousemove', (e) => {
            window.mouseX = e.clientX;
            window.mouseY = e.clientY;

            if (!cursorVisible) {
                cursorRing.classList.remove('is-hidden');
                ringX = window.mouseX;
                ringY = window.mouseY;
                cursorVisible = true;
            }

            // Use logical parent to avoid flicker on nested spans
            const logicalEl = getLogicalTarget(e.target);
            const label = getLabelFor(logicalEl);
            if (label) {
                if (leaveTimer) { clearTimeout(leaveTimer); leaveTimer = null; }
                if (currentHoverEl !== logicalEl) {
                    currentHoverEl = logicalEl;
                    cursorIcon.textContent = label.icon;
                    cursorText.textContent = label.text;
                    // Re-trigger label entrance animation
                    cursorLabel.style.transition = 'none';
                    cursorLabel.style.opacity = '0';
                    cursorLabel.style.transform = 'scale(0.3) translateY(8px)';
                    void cursorLabel.offsetWidth;
                    cursorLabel.style.transition = '';
                    requestAnimationFrame(() => {
                        cursorLabel.style.opacity = '1';
                        cursorLabel.style.transform = 'scale(1) translateY(0)';
                    });
                }
                cursorRing.classList.add('is-hover');
            } else {
                if (currentHoverEl) {
                    currentHoverEl = null;
                    cursorRing.classList.remove('is-hover');
                    // Clear inline styles so CSS default takes over with transition
                    cursorLabel.style.opacity = '';
                    cursorLabel.style.transform = '';
                    // Clear text after exit transition completes
                    leaveTimer = setTimeout(() => {
                        cursorIcon.textContent = 'touch_app';
                        cursorText.textContent = 'Buka';
                        leaveTimer = null;
                    }, 500);
                }
            }
        });

        window.addEventListener('mouseleave', () => {
            if (leaveTimer) { clearTimeout(leaveTimer); leaveTimer = null; }
            cursorRing.classList.add('is-hidden');
            cursorRing.classList.remove('is-hover');
            cursorLabel.style.opacity = '';
            cursorLabel.style.transform = '';
            cursorVisible = false;
            currentHoverEl = null;
        });

        window.addEventListener('mouseenter', () => {
            if (cursorVisible) cursorRing.classList.remove('is-hidden');
        });

        function animateCursorRing() {
            const dx = window.mouseX - ringX;
            const dy = window.mouseY - ringY;
            ringVX += dx * spring;
            ringVY += dy * spring;
            ringVX *= friction;
            ringVY *= friction;
            ringX += ringVX;
            ringY += ringVY;
            cursorRing.style.left = ringX + 'px';
            cursorRing.style.top = ringY + 'px';
            requestAnimationFrame(animateCursorRing);
        }
        animateCursorRing();
        }

        // --- Interactive Dot Background ---
        window.addEventListener('mousemove', e => {
            document.body.style.setProperty('--mouse-x', `${e.clientX}px`);
            document.body.style.setProperty('--mouse-y', `${e.clientY}px`);
        });

        // --- GSAP Scroll-triggered Animations (home page only) ---
        gsap.registerPlugin(ScrollTrigger);
        const heroBgElements = container.querySelector('#hero-bg-elements');
        const homeSection = container.querySelector('#home');

        const interstitialShape = container.querySelector('#interstitial-shape');
        if (interstitialShape) {
            gsap.fromTo(container.querySelector("#blob-shape"),
                { y: "50vh", scale: 0.5, opacity: 0 },
                { y: "0vh", scale: 1, opacity: 1, ease: "power1.out",
                  scrollTrigger: { trigger: interstitialShape, start: "top 80%", end: "center center", scrub: 1 }
                }
            );
            gsap.from(container.querySelector("#interstitial-content"), {
                opacity: 0, y: 50, ease: "power2.out", duration: 1,
                scrollTrigger: { trigger: interstitialShape, start: "top 70%", toggleActions: "play none none reverse" }
            });
        }
        };

        window.initProjectsScripts = function(container = document) {
            const projectsHero = container.querySelector('#projects-hero');
            if (!projectsHero) return;
            
            var heroTl = gsap.timeline({
                scrollTrigger: {
                    trigger: projectsHero,
                    start: 'top top',
                    end: 'bottom top',
                    scrub: 1.5,
                }
            });

            heroTl.to(container.querySelector('.hero-content'), { scale: 0.85, y: -80, opacity: 0.7, ease: 'power1.out', duration: 1 }, 0);
            heroTl.to(container.querySelector('.hero-decoration-1'), { y: -180, scale: 1.4, ease: 'none', duration: 1 }, 0);
            heroTl.to(container.querySelector('.hero-decoration-2'), { y: -100, scale: 0.8, ease: 'none', duration: 1 }, 0);
            heroTl.to(container.querySelector('.hero-decoration-3'), { y: -250, ease: 'none', duration: 1 }, 0);
            heroTl.to(container.querySelector('.hero-decoration-4'), { y: -140, scale: 1.2, ease: 'none', duration: 1 }, 0);
            heroTl.to(container.querySelector('.hero-decoration-5'), { y: -160, scale: 0.7, ease: 'none', duration: 1 }, 0);
            heroTl.to(container.querySelector('.scroll-indicator'), { opacity: 0, duration: 0.5 }, 0);

            // Hero entry animation
            gsap.from(container.querySelector('.hero-content'), { opacity: 0, y: 30, duration: 1, ease: 'power3.out' });
            gsap.from(container.querySelectorAll('.hero-decoration'), { opacity: 0, scale: 0.8, duration: 1.2, stagger: 0.1, ease: 'power2.out' });

            if (typeof VanillaTilt !== 'undefined') {
                VanillaTilt.init(container.querySelectorAll('.curated-card'), {
                    max: 5,
                    speed: 400,
                    glare: true,
                    "max-glare": 0.2
                });
            }
        };

        // Initialize scripts on first load
        if (document.readyState === 'loading') {
            document.addEventListener('DOMContentLoaded', () => window.initHomeScripts(document));
            document.addEventListener('DOMContentLoaded', () => window.initProjectsScripts(document));
        } else {
            window.initHomeScripts(document);
            window.initProjectsScripts(document);
        }

                        // Barba.js page transitions
        if (typeof barba !== 'undefined') {
            barba.init({
                sync: false,
                transitions: [{
                    name: 'universal-transition',

                    // ── LEAVE ────────────────────────────────────────────────
                    async leave(data) {
                        var done = this.async();
                        window.barbaTransitioning = true;

                        // Save scroll position of current page
                        if (data.current.url.path) {
                            sessionStorage.setItem('scroll_' + data.current.url.path, window.scrollY);
                        }

                        // Set flag: are we returning to home from a project page?
                        window._returnToProjects = (
                            data.next.namespace === 'home' &&
                            (data.current.namespace === 'project-detail' || data.current.namespace === 'projects')
                        );

                        if (typeof ScrollTrigger !== 'undefined') {
                            ScrollTrigger.getAll().forEach(t => t.kill());
                        }

                        var curtain = document.querySelector('.transition-curtain');
                        var logo = curtain.querySelector('.curtain-logo');

                        var tl = gsap.timeline({ onComplete: () => {
                            if (data.current.container) {
                                gsap.set(data.current.container, { opacity: 0, display: 'none' });
                            }
                            if (data.next.namespace === 'project-detail') {
                                gsap.set('#global-navbar', { display: 'none', opacity: 0, y: '-100%' });
                            } else if (data.next.namespace === 'home') {
                                gsap.set('#global-navbar', { display: 'block' });
                                gsap.to('#global-navbar', { opacity: 1, y: '0%', duration: 0.5, delay: 0.5 });
                            }
                            done();
                        }});
                        tl.to(curtain, { y: '0%', duration: 0.7, ease: 'power4.inOut' })
                          .to(logo, { opacity: 1, duration: 0.3 }, '-=0.2');
                    },

                    // ── BEFORE ENTER ─────────────────────────────────────────
                    // Fires AFTER leave completes & new container is in the DOM,
                    // but BEFORE enter starts. The curtain is STILL fully covering —
                    // perfect timing to set scroll position without user seeing anything.
                    beforeEnter(data) {
                        if (window._returnToProjects) {
                            // Scroll to #projects section (invisible — curtain covers screen)
                            const el = data.next.container.querySelector('#projects');
                            if (el) {
                                let top = 0, node = el;
                                while (node && node !== document.body) {
                                    top += node.offsetTop;
                                    node = node.offsetParent;
                                }
                                window.scrollTo(0, top);
                                document.documentElement.scrollTop = top;
                                document.body.scrollTop = top;
                            }
                            window._returnToProjects = false;
                        } else if (data.next.namespace === 'home') {
                            // Restore previous scroll position on home page
                            const saved = parseInt(sessionStorage.getItem('scroll_' + data.next.url.path)) || 0;
                            window.scrollTo(0, saved);
                        } else {
                            // Sub-pages always start at top
                            window.scrollTo(0, 0);
                        }
                    },

                    // ── ENTER ────────────────────────────────────────────────
                    async enter(data) {
                        var done = this.async();

                        // Scroll was already set in beforeEnter — do NOT override it here.
                        if(data.next.container) data.next.container.style.opacity = '0';

                        var curtain = document.querySelector('.transition-curtain');
                        var logo = curtain.querySelector('.curtain-logo');

                        var tl = gsap.timeline({ onComplete: done });
                        tl.to(logo, { opacity: 0, duration: 0.3 })
                          .to(curtain, { y: '-100%', duration: 0.7, ease: 'power4.inOut' }, '+=0.1')
                          .set(curtain, { y: '100%' });

                        if(data.next.container) gsap.to(data.next.container, { opacity: 1, duration: 0.1 });

                        setTimeout(() => {
                            if (data.next.namespace === 'home') {
                                gsap.from(data.next.container.querySelectorAll('.project-card'), {
                                    opacity: 0, y: 40, stagger: 0.1, duration: 0.6, ease: 'power3.out'
                                });
                                if (typeof window.initHomeScripts === 'function') window.initHomeScripts(data.next.container);
                                if (typeof window.initNavbar === 'function') window.initNavbar();
                                if (typeof window.initEffects === 'function') window.initEffects(data.next.container);
                            } else if (data.next.namespace === 'projects') {
                                if (typeof window.initProjectsScripts === 'function') window.initProjectsScripts(data.next.container);
                            } else if (data.next.namespace === 'project-detail') {
                                if (typeof window.animateIn === 'function') {
                                    window.animateIn();
                                } else {
                                    gsap.from(data.next.container.querySelectorAll('.project-hero > *, .gallery-item, .project-content, .project-meta, .features, .related-section'), {
                                        y: 40, opacity: 0, duration: 0.8, stagger: 0.05, ease: 'power3.out'
                                    });
                                }
                            }

                            if (barba.cache && typeof barba.cache.clear === 'function') {
                                barba.cache.clear();
                            }
                        }, 100);
                    }
                }]
            });
        }
    </script>

<script>
// ════════════════════════════════════════════════════════════════
// NEW INTERACTIVE EFFECTS
// ════════════════════════════════════════════════════════════════

// ── 1. Scroll Progress Bar ──
(function() {
    const bar = document.createElement('div');
    bar.id = 'scroll-progress';
    document.body.appendChild(bar);
    let ticking = false;
    window.addEventListener('scroll', () => {
        if (!ticking) {
            requestAnimationFrame(() => {
                const h = document.documentElement;
                const total = h.scrollHeight - h.clientHeight;
                bar.style.width = total > 0 ? (h.scrollTop / total * 100) + '%' : '0%';
                ticking = false;
            });
            ticking = true;
        }
    });
})();

// ── 2. Particle Canvas System ──
(function() {
    const canvas = document.createElement('canvas');
    canvas.id = 'particle-canvas';
    document.body.appendChild(canvas);
    const ctx = canvas.getContext('2d');
    let particles = [];
    let mouse = { x: -1000, y: -1000 };
    let isVisible = true;

    function resize() {
        canvas.width = window.innerWidth;
        canvas.height = window.innerHeight;
    }
    resize();
    window.addEventListener('resize', resize);

    class Particle {
        constructor() { this.reset(); }
        reset() {
            this.x = Math.random() * canvas.width;
            this.y = Math.random() * canvas.height;
            this.size = Math.random() * 2 + 0.5;
            this.speedX = (Math.random() - 0.5) * 0.2;
            this.speedY = (Math.random() - 0.5) * 0.2;
            this.opacity = Math.random() * 0.25 + 0.05;
            this.hue = 200 + Math.random() * 40;
        }
        update() {
            this.x += this.speedX;
            this.y += this.speedY;
            const dx = mouse.x - this.x;
            const dy = mouse.y - this.y;
            const dist = Math.sqrt(dx*dx + dy*dy);
            if (dist < 120) {
                const force = (120 - dist) / 120 * 0.8;
                this.x -= (dx/dist) * force;
                this.y -= (dy/dist) * force;
            }
            if (this.x < -10 || this.x > canvas.width + 10 || this.y < -10 || this.y > canvas.height + 10) {
                this.reset();
            }
        }
        draw() {
            ctx.beginPath();
            ctx.arc(this.x, this.y, this.size, 0, Math.PI*2);
            ctx.fillStyle = `hsla(${this.hue}, 50%, 55%, ${this.opacity})`;
            ctx.fill();
        }
    }

    const count = Math.min(60, Math.floor(canvas.width * canvas.height / 20000));
    for (let i=0; i<count; i++) particles.push(new Particle());

    window.addEventListener('mousemove', e => { mouse.x = e.clientX; mouse.y = e.clientY; });
    document.addEventListener('mouseleave', () => { mouse.x = -1000; mouse.y = -1000; });

    function animateParticles() {
        if (!isVisible) { requestAnimationFrame(animateParticles); return; }
        ctx.clearRect(0, 0, canvas.width, canvas.height);
        particles.forEach(p => { p.update(); p.draw(); });
        for (let i=0; i<particles.length; i++) {
            for (let j=i+1; j<particles.length; j++) {
                const dx = particles[i].x - particles[j].x;
                const dy = particles[i].y - particles[j].y;
                const dist = Math.sqrt(dx*dx + dy*dy);
                if (dist < 100) {
                    ctx.beginPath();
                    ctx.strokeStyle = `rgba(100, 160, 255, ${0.06 * (1 - dist/100)})`;
                    ctx.lineWidth = 0.5;
                    ctx.moveTo(particles[i].x, particles[i].y);
                    ctx.lineTo(particles[j].x, particles[j].y);
                    ctx.stroke();
                }
            }
        }
        requestAnimationFrame(animateParticles);
    }
    animateParticles();
})();

// ── 3. Mouse Glow ──
(function() {
    const glow = document.createElement('div');
    glow.id = 'mouse-glow';
    document.body.appendChild(glow);
    let gx = -500, gy = -500;
    let currentGX = -500, currentGY = -500;
    window.addEventListener('mousemove', e => { gx = e.clientX; gy = e.clientY; });
    function updateGlow() {
        currentGX += (gx - currentGX) * 0.08;
        currentGY += (gy - currentGY) * 0.08;
        glow.style.left = currentGX + 'px';
        glow.style.top = currentGY + 'px';
        requestAnimationFrame(updateGlow);
    }
    updateGlow();
})();

// ── 4. Magnetic Buttons ──
(function() {
    document.querySelectorAll('[data-magnetic]').forEach(btn => {
        const wrap = document.createElement('span');
        wrap.className = 'magnetic-wrap';
        btn.parentNode.insertBefore(wrap, btn);
        wrap.appendChild(btn);
        let rafId = null;
        wrap.addEventListener('mousemove', e => {
            if (rafId) cancelAnimationFrame(rafId);
            rafId = requestAnimationFrame(() => {
                const rect = wrap.getBoundingClientRect();
                const x = e.clientX - rect.left - rect.width/2;
                const y = e.clientY - rect.top - rect.height/2;
                const dist = Math.sqrt(x*x + y*y);
                const maxDist = 150;
                const strength = 0.25;
                const factor = Math.min(dist / maxDist, 1) * strength;
                wrap.style.transform = `translate(${x * factor}px, ${y * factor}px)`;
                rafId = null;
            });
        });
        wrap.addEventListener('mouseleave', () => {
            if (rafId) cancelAnimationFrame(rafId);
            wrap.style.transform = 'translate(0, 0)';
        });
    });
})();

// ── 5. Ripple Click Effect ──
(function() {
    document.addEventListener('click', function(e) {
        const el = document.createElement('span');
        el.className = 'ripple-effect';
        const size = 200;
        el.style.width = el.style.height = size + 'px';
        el.style.left = (e.clientX - size/2) + 'px';
        el.style.top = (e.clientY - size/2) + 'px';
        document.body.appendChild(el);
        setTimeout(() => el.remove(), 800);
    });
})();

// ── 6. Text Scramble Effect ──
(function() {
    class TextScramble {
        constructor(el) {
            this.el = el;
            this.chars = '!<>-_\\/[]{}—=+*^?#ABCXYZ0123456789';
            this.update = this.update.bind(this);
        }
        setText(newText) {
            const oldText = this.el.innerText;
            const length = Math.max(oldText.length, newText.length);
            const promise = new Promise(resolve => this.resolve = resolve);
            this.queue = [];
            for (let i=0; i<length; i++) {
                const from = oldText[i] || '';
                const to = newText[i] || '';
                const start = Math.floor(Math.random() * 40);
                const end = start + Math.floor(Math.random() * 40);
                this.queue.push({ from, to, start, end });
            }
            cancelAnimationFrame(this.frameRequest);
            this.frame = 0;
            this.update();
            return promise;
        }
        update() {
            let output = '';
            let complete = 0;
            for (let i=0, n=this.queue.length; i<n; i++) {
                let { from, to, start, end, char } = this.queue[i];
                if (this.frame >= end) {
                    complete++;
                    output += to;
                } else if (this.frame >= start) {
                    if (!char || Math.random() < 0.28) {
                        char = this.chars[Math.floor(Math.random() * this.chars.length)];
                        this.queue[i].char = char;
                    }
                    output += `<span class="scramble-char">${char}</span>`;
                } else {
                    output += from;
                }
            }
            this.el.innerHTML = output;
            if (complete === this.queue.length) {
                this.resolve();
            } else {
                this.frameRequest = requestAnimationFrame(this.update);
                this.frame++;
            }
        }
    }
    // Store references globally so hero rotation can use it
    window.TextScramble = TextScramble;
})();

// ── 7-9. Observer-based effects (reusable init) ──
window.initEffects = function(container) {
    container = container || document;
    if (!window.IntersectionObserver) return;

    // Kill any previous observers
    if (window.__counterObs) window.__counterObs.disconnect();
    if (window.__clipObs) window.__clipObs.disconnect();
    if (window.__splitObs) window.__splitObs.disconnect();

    // Animated Counters
    window.__counterObs = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const el = entry.target;
                const target = parseInt(el.dataset.counter);
                const duration = parseInt(el.dataset.duration) || 2000;
                const prefix = el.dataset.prefix || '';
                const suffix = el.dataset.suffix || '';
                const startTime = performance.now();
                function animate(now) {
                    const progress = Math.min((now - startTime) / duration, 1);
                    const ease = 1 - Math.pow(1 - progress, 3);
                    el.textContent = prefix + Math.floor(ease * target) + suffix;
                    if (progress < 1) requestAnimationFrame(animate);
                    else el.textContent = prefix + target + suffix;
                }
                requestAnimationFrame(animate);
                window.__counterObs.unobserve(el);
            }
        });
    }, { threshold: 0.5 });
    container.querySelectorAll('[data-counter]').forEach(el => window.__counterObs.observe(el));

    // Clip Reveal
    window.__clipObs = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('is-revealed');
                window.__clipObs.unobserve(entry.target);
            }
        });
    }, { threshold: 0.2 });
    container.querySelectorAll('.reveal-clip').forEach(el => window.__clipObs.observe(el));

    // Split Text Reveal
    function splitText(el) {
        if (el.dataset._split) return;
        el.dataset._split = '1';
        const text = el.textContent;
        const words = text.split(' ');
        el.innerHTML = words.map(word => {
            const chars = word.split('').map(ch =>
                `<span class="split-char">${ch === ' ' ? '&nbsp;' : ch}</span>`
            ).join('');
            return `<span style="display:inline-block">${chars}</span>`;
        }).join(' ');
    }
    window.__splitObs = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const chars = entry.target.querySelectorAll('.split-char');
                chars.forEach((ch, i) => {
                    setTimeout(() => ch.classList.add('is-visible'), i * 30);
                });
                window.__splitObs.unobserve(entry.target);
            }
        });
    }, { threshold: 0.2 });
    container.querySelectorAll('[data-split]').forEach(el => {
        splitText(el);
        window.__splitObs.observe(el);
    });
};
// Run on initial load
window.initEffects();

// ── 10. Parallax Mouse Layers ──
(function() {
    document.querySelectorAll('[data-parallax]').forEach(el => {
        const speed = parseFloat(el.dataset.parallax) || 0.05;
        let px = 0, py = 0;
        let currentPX = 0, currentPY = 0;
        window.addEventListener('mousemove', e => {
            const rect = el.parentElement ? el.parentElement.getBoundingClientRect() : { left: 0, top: 0, width: window.innerWidth, height: window.innerHeight };
            const centerX = rect.left + rect.width / 2;
            const centerY = rect.top + rect.height / 2;
            px = (e.clientX - centerX) * speed;
            py = (e.clientY - centerY) * speed;
        });
        function updateParallax() {
            currentPX += (px - currentPX) * 0.05;
            currentPY += (py - currentPY) * 0.05;
            el.style.transform = `translate(${currentPX}px, ${currentPY}px)`;
            requestAnimationFrame(updateParallax);
        }
        updateParallax();
    });
})();
</script>
    @stack('scripts')
</body>
</html>