<!DOCTYPE html>

<html class="scroll-smooth" lang="en"><head>
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

<div class="cursor-dot"></div>
<div class="cursor-outline"></div>

<!-- Navigation Shell -->
<!-- Full-width container for the blur effect -->
<div id="global-navbar" class="fixed top-0 left-0 w-full z-50 py-4 backdrop-blur-lg navbar-glass-effect intro-navbar" style="{{ request()->is('project/*') ? 'display: none; opacity: 0; transform: translateY(-100%);' : '' }}">
    <!-- Centered and styled navbar -->
    <nav class="max-w-[1280px] mx-auto bg-surface-container-lowest/80 text-on-background border border-outline-variant/30 flex justify-between items-center px-6 py-3 rounded-2xl shadow-lg shadow-primary/5">

    <a class="font-headline-md text-2xl md:text-3xl font-bold text-on-background hover:text-secondary transition-colors duration-200" href="#">
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
document.querySelectorAll('.nav-link').forEach(link => {
    link.addEventListener('click', function(e) {
        e.preventDefault(); // Mencegah default jump
        const targetId = this.getAttribute('href');
        const targetElement = document.querySelector(targetId);
        if (targetElement) {
            let topOffset = 0;
            let el = targetElement;
            while(el && el !== document.body) {
                topOffset += el.offsetTop;
                el = el.offsetParent;
            }
            window.scrollTo({
                top: topOffset,
                behavior: 'smooth'
            });
        }
        
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



        // Custom Cursor Logic with Particle Trail
        const cursorDot = document.querySelector('.cursor-dot');
        const cursorOutline = document.querySelector('.cursor-outline');

        // Mouse and cursor position variables
        window.mouseX = 0;
        window.mouseY = 0;
        let outlineX = 0;
        let outlineY = 0;
        let outlineVX = 0;
        let outlineVY = 0;
        const spring = 0.04; // How 'springy' the outline is. Lower value = more delay.
        const friction = 0.8; // Damping factor. Higher value = smoother, less abrupt stop.

        let cursorVisible = false;

        window.addEventListener('mousemove', (e) => {
            window.mouseX = e.clientX;
            window.mouseY = e.clientY;

            // Show cursors on first move
            if (!cursorVisible) {
                cursorDot.style.opacity = '1';
                cursorOutline.style.opacity = '1';
                outlineX = window.mouseX;
                outlineY = window.mouseY;
                cursorVisible = true;
            }

            // Dot follows mouse instantly (offset by half its size = 4px)
            cursorDot.style.left = (window.mouseX - 4) + 'px';
            cursorDot.style.top  = (window.mouseY - 4) + 'px';
        });

        // Hide cursor when mouse leaves window
        window.addEventListener('mouseleave', () => {
            cursorDot.style.opacity = '0';
            cursorOutline.style.opacity = '0';
            cursorVisible = false;
        });

        window.addEventListener('mouseenter', () => {
            if (cursorVisible) {
                cursorDot.style.opacity = '1';
                cursorOutline.style.opacity = '1';
            }
        });

        function animateCursor() {
            // Spring physics for the outline
            const dx = window.mouseX - outlineX;
            const dy = window.mouseY - outlineY;
            outlineVX += dx * spring;
            outlineVY += dy * spring;
            outlineVX *= friction;
            outlineVY *= friction;
            outlineX += outlineVX;
            outlineY += outlineVY;

            // Outline follows with spring (offset by half its size = 15px)
            cursorOutline.style.left = (outlineX - 15) + 'px';
            cursorOutline.style.top  = (outlineY - 15) + 'px';

            requestAnimationFrame(animateCursor);
        }
        animateCursor();

        // Hover effects
        container.querySelectorAll('a, button, input, textarea, [onclick]').forEach(el => {
            el.addEventListener('mouseenter', () => document.body.classList.add('cursor-hover'));
            el.addEventListener('mouseleave', () => document.body.classList.remove('cursor-hover'));
        });

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

        // *** SCROLL RESTORATION: If returning from a project page, scroll to #projects ***
        // This runs AFTER all ScrollTrigger setup so nothing can reset it
        if (window._returnToProjects) {
            window._returnToProjects = false;
            requestAnimationFrame(() => {
                const projectsSection = (container === document ? document : container).querySelector('#projects');
                if (projectsSection) {
                    const top = projectsSection.getBoundingClientRect().top + window.scrollY;
                    window.scrollTo({ top: top, behavior: 'instant' });
                    document.documentElement.scrollTop = top;
                }
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
                    async leave(data) {
                        var done = this.async();
                        window.barbaTransitioning = true;

                        // Save current scroll position before leaving
                        if (data.current.url.path) {
                            sessionStorage.setItem('scroll_' + data.current.url.path, window.scrollY);
                        }

                        // Pre-calculate where we need to scroll BEFORE the curtain even rises
                        if (data.next.namespace === 'home') {
                            if (data.current.namespace === 'project-detail' || data.current.namespace === 'projects') {
                                // Flag for initHomeScripts to scroll to #projects after its setup
                                window._returnToProjects = true;
                                window._pendingScrollToProjects = false;
                                window._wasGoingToProjects = false;
                                window._pendingScrollY = 0;
                            } else {
                                window._returnToProjects = false;
                                window._pendingScrollToProjects = false;
                                window._wasGoingToProjects = false;
                                window._pendingScrollY = parseInt(sessionStorage.getItem('scroll_' + data.next.url.path)) || 0;
                            }
                        } else {
                            window._returnToProjects = false;
                            window._pendingScrollToProjects = false;
                            window._wasGoingToProjects = false;
                            window._pendingScrollY = 0;
                        }
                        
                        if (typeof ScrollTrigger !== 'undefined') {
                            ScrollTrigger.getAll().forEach(t => t.kill());
                        }
                        
                        var curtain = document.querySelector('.transition-curtain');
                        var logo = curtain.querySelector('.curtain-logo');
                        
                        var tl = gsap.timeline({ onComplete: () => {
                            if (data.current.container) {
                                gsap.set(data.current.container, { opacity: 0, display: 'none' });
                            }
                            // Hide navbar instantly before enter if going to project-detail
                            if (data.next.namespace === 'project-detail') {
                                gsap.set('#global-navbar', { display: 'none', opacity: 0, y: '-100%' });
                            } else if (data.next.namespace === 'home') {
                                gsap.set('#global-navbar', { display: 'block' });
                                gsap.to('#global-navbar', { opacity: 1, y: '0%', duration: 0.5, delay: 0.5 });
                            }
                            done();
                        }});
                        tl.to(curtain, { y: '0%', duration: 0.7, ease: 'power4.inOut' })
                          .to(logo, { opacity: 1, duration: 0.3 }, "-=0.2");
                    },
                    async enter(data) {
                        var done = this.async();

                        // Scroll to top (or saved position) immediately while curtain covers screen
                        window.scrollTo(0, window._pendingScrollY || 0);

                        if(data.next.container) data.next.container.style.opacity = '0';
                        
                        var curtain = document.querySelector('.transition-curtain');
                        var logo = curtain.querySelector('.curtain-logo');
                        
                        var tl = gsap.timeline({ onComplete: done });
                        tl.to(logo, { opacity: 0, duration: 0.3 })
                          .to(curtain, { y: '-100%', duration: 0.7, ease: 'power4.inOut' }, "+=0.1")
                          .set(curtain, { y: '100%' });
                          
                        if(data.next.container) gsap.to(data.next.container, { opacity: 1, duration: 0.1 });
                        
                        setTimeout(() => { 
                            // Initialize scripts AFTER DOM is visible
                            if (data.next.namespace === 'home') {
                                gsap.from(data.next.container.querySelectorAll('.project-card'), {
                                    opacity: 0, y: 40, stagger: 0.1, duration: 0.6, ease: 'power3.out'
                                });
                                // initHomeScripts will handle scroll to #projects internally via _returnToProjects flag
                                if (typeof window.initHomeScripts === 'function') window.initHomeScripts(data.next.container);
                                if (typeof window.initNavbar === 'function') window.initNavbar();
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
                            
                            // Clear Barba cache to ensure fresh data if projects were updated
                            if (barba.cache && typeof barba.cache.clear === 'function') {
                                barba.cache.clear();
                            }
                        }, 100);
                    }
                }]
            });
        }
    </script>

    @stack('scripts')
</body>
</html>