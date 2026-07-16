@extends('layouts.app')

@section('content')
<div data-barba="container" data-barba-namespace="home">
<div class="w-full overflow-x-hidden">
<!-- Hero Section -->
<section class="min-h-screen flex flex-col justify-center items-center relative overflow-hidden text-center px-6 md:px-10 lg:px-16" id="home" data-intro-container>

<!-- Desktop Background Layer -->
<div class="hero-desktop-bg"></div>

<!-- Ambient Blob Layers (subtle, warm) -->
<div data-parallax="0.03" class="hero-ambient-blob w-[500px] h-[500px] bg-gradient-to-br from-[#00668a]/6 to-transparent absolute -top-32 -right-20 z-0" style="animation: blobFloat 25s ease-in-out infinite alternate;"></div>
<div data-parallax="-0.04" class="hero-ambient-blob w-[420px] h-[420px] bg-gradient-to-tr from-[#d97706]/5 to-transparent absolute -bottom-40 -left-24 z-0" style="animation: blobFloat 20s ease-in-out infinite alternate-reverse;"></div>
<div data-parallax="0.02" class="hero-ambient-blob w-72 h-72 bg-gradient-to-bl from-[#00668a]/4 to-transparent absolute top-1/4 right-1/4 z-0" style="animation: blobFloat 30s ease-in-out infinite alternate 5s;"></div>
<div data-parallax="-0.02" class="hero-ambient-blob w-80 h-80 bg-gradient-to-tl from-[#d97706]/4 to-transparent absolute bottom-1/3 left-1/3 z-0" style="animation: blobFloat 22s ease-in-out infinite alternate-reverse 3s;"></div>

<svg class="absolute inset-0 w-full h-full z-[1] pointer-events-none" id="hero-bg-elements" data-parallax-layer="-0.015" viewBox="0 0 1000 1000" preserveAspectRatio="xMidYMid slice">
    <defs>
        <linearGradient id="gemini-gradient" x1="0%" y1="0%" x2="100%" y2="100%" gradientUnits="objectBoundingBox">
            <stop offset="0%" stop-color="#FDB813" />
            <stop offset="33%" stop-color="#EE4D2E" />
            <stop offset="66%" stop-color="#00A651" />
            <stop offset="100%" stop-color="#4285F4" />
        </linearGradient>
        <filter id="noise-filter" x="0" y="0" width="100%" height="100%">
            <feTurbulence type="fractalNoise" baseFrequency="0.75" numOctaves="4" stitchTiles="stitch" result="noise"/>
            <feColorMatrix type="saturate" values="0" in="noise" result="grayNoise"/>
            <feComponentTransfer in="grayNoise">
                <feFuncA type="linear" slope="0.06"/>
            </feComponentTransfer>
        </filter>
        <pattern id="paper-grid" width="24" height="24" patternUnits="userSpaceOnUse">
            <path d="M 24 0 L 0 0 0 24" fill="none" stroke="rgba(26,26,46,0.12)" stroke-width="0.8"/>
            <path d="M 12 0 L 12 24 M 0 12 L 24 12" fill="none" stroke="rgba(26,26,46,0.06)" stroke-width="0.4"/>
        </pattern>
        <pattern id="lined-paper" width="100" height="24" patternUnits="userSpaceOnUse">
            <line x1="0" y1="23" x2="100" y2="23" stroke="rgba(26,26,46,0.05)" stroke-width="0.5"/>
        </pattern>
        <g id="icon-folder">
            <path d="M4 8h6l2-2h7a2 2 0 0 1 2 2v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V7a1 1 0 0 1 1-1z" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/>
        </g>
        <g id="icon-terminal">
            <polyline points="7 10 10 13 7 16" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/>
            <line x1="14" y1="16" x2="18" y2="16" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/>
            <rect x="3" y="4" width="18" height="16" rx="2" fill="none" stroke="currentColor" stroke-width="1.8"/>
        </g>
        <g id="icon-browser">
            <rect x="2" y="4" width="20" height="16" rx="2" fill="none" stroke="currentColor" stroke-width="1.8"/>
            <line x1="2" y1="9" x2="22" y2="9" fill="none" stroke="currentColor" stroke-width="1.8"/>
            <circle cx="5.5" cy="6.5" r="0.8" fill="currentColor"/>
            <circle cx="8" cy="6.5" r="0.8" fill="currentColor"/>
        </g>
        <g id="icon-code">
            <polyline points="8 8 4 12 8 16" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/>
            <polyline points="16 8 20 12 16 16" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/>
            <line x1="14" y1="6" x2="10" y2="18" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/>
        </g>
        <g id="icon-settings">
            <circle cx="12" cy="12" r="3" fill="none" stroke="currentColor" stroke-width="1.8"/>
            <path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1-2.83 2.83l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-4 0v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83-2.83l.06-.06A1.65 1.65 0 0 0 4.68 15a1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1 0-4h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 2.83-2.83l.06.06A1.65 1.65 0 0 0 9 4.68a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 4 0v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 2.83l-.06.06A1.65 1.65 0 0 0 19.4 9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 0 4h-.09a1.65 1.65 0 0 0-1.51 1z" fill="none" stroke="currentColor" stroke-width="1.8"/>
        </g>
        <g id="icon-palette">
            <path d="M12 3a9 9 0 0 0 0 18c1.5 0 2.5-1 2.5-2.5 0-.6-.2-1.2-.5-1.7a1.5 1.5 0 0 1 1.3-2.3H16a9 9 0 0 0-4-15z" fill="none" stroke="currentColor" stroke-width="1.8"/>
            <circle cx="8" cy="8.5" r="1" fill="currentColor" opacity="0.5"/>
            <circle cx="14" cy="7.5" r="1" fill="currentColor" opacity="0.5"/>
            <circle cx="7" cy="13" r="1" fill="currentColor" opacity="0.5"/>
        </g>
    </defs>

    <rect width="100%" height="100%" filter="url(#noise-filter)" opacity="1"/>
    <rect width="100%" height="100%" fill="url(#lined-paper)" opacity="0.7"/>
    <rect width="100%" height="100%" fill="url(#paper-grid)" opacity="1"/>
    <circle class="intro-hero-circle" cx="500" cy="500" r="230" fill="none" stroke="rgba(26, 26, 46, 0.18)" stroke-width="2" stroke-dasharray="3 15"></circle>

    <!-- Ikon desktop melayang — mengisi ruang bekas tech-stack window,
         memakai defs yang sudah ada, bukan aset baru -->
    <g class="hero-floating-icon" style="color: rgba(217,119,6,0.35); animation-delay: 0s;">
        <use href="#icon-terminal" x="760" y="140" width="30" height="30" />
    </g>
    <g class="hero-floating-icon" style="color: rgba(0,102,138,0.32); animation-delay: 2.5s;">
        <use href="#icon-folder" x="830" y="260" width="26" height="26" />
    </g>
    <g class="hero-floating-icon" style="color: rgba(217,119,6,0.28); animation-delay: 5s;">
        <use href="#icon-code" x="770" y="360" width="24" height="24" />
    </g>
    <g class="hero-floating-icon" style="color: rgba(0,102,138,0.3); animation-delay: 1.2s;">
        <use href="#icon-browser" x="130" y="200" width="26" height="26" />
    </g>
    <g class="hero-floating-icon" style="color: rgba(217,119,6,0.26); animation-delay: 3.8s;">
        <use href="#icon-palette" x="90" y="340" width="24" height="24" />
    </g>
</svg>

<div class="hero-main-content relative z-10" data-parallax-layer="0.025">

    <!-- Kalimat pembuka "Halo, saya" — momen sebelum signature -->
    <div class="hero-greeting" style="opacity: 0; animation: fadeIn-up 0.8s cubic-bezier(0.22, 1, 0.36, 1) 0.3s forwards;">
        <span class="hero-greeting-text">Halo, saya</span>
        <svg class="hero-greeting-arrow" viewBox="0 0 60 40" width="52" height="34">
            <path d="M8,4 C10,18 22,26 30,28 C36,29.5 40,26 38,22"
                  fill="none" stroke="#d97706" stroke-width="2" stroke-linecap="round" opacity="0.6"/>
            <path d="M32,20 L38,22 L36,29" fill="none" stroke="#d97706" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" opacity="0.6"/>
        </svg>
    </div>

    <!-- Signature -->
    <div>
        <x-artha-signature />
    </div>

    <div class="max-w-5xl hero-content-inner">
        <!-- Folder icon + Greeting label -->
        <div class="flex items-center justify-center gap-2 mb-4 intro-sub-title">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" class="text-[#d97706]">
                <path d="M4 8h6l2-2h7a2 2 0 0 1 2 2v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V7a1 1 0 0 1 1-1z" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
            <span class="terminal-caption text-xs">
                <span class="prompt-symbol">$</span> <span class="text-[#5c5760]">~/welcome</span>
            </span>
        </div>

        <!-- Rotating Sub-title (JetBrains Mono) -->
        <div class="relative h-12 font-mono text-lg md:text-xl text-on-surface-variant hero-text-wrapper mb-6 intro-sub-title">
            <span class="hero-text absolute inset-0 opacity-0" data-index="0">Pelajar SMK</span>
            <span class="hero-text absolute inset-0 opacity-0" data-index="1">RPL Developer</span>
            <span class="hero-text absolute inset-0 opacity-0" data-index="2">Code Creator</span>
            <span class="hero-text absolute inset-0 opacity-0" data-index="3">Problem Solver</span>
            <svg class="desktop-underline" viewBox="0 0 200 12" preserveAspectRatio="none">
                <path d="M0,6 Q50,12 100,6 T200,6" fill="none" stroke="#d97706" stroke-width="1.5" stroke-linecap="round" opacity="0.5"/>
            </svg>
        </div>

        <p class="font-body-md text-body-md text-on-surface-variant/70 max-w-2xl mx-auto mb-8 md:mb-10 leading-relaxed intro-paragraph">
            Seorang pelajar SMK jurusan Rekayasa Perangkat Lunak (RPL) yang antusias dalam belajar web development. Membangun berbagai proyek dari tugas sekolah hingga eksplorasi mandiri.
        </p>

        <!-- Desktop CTA + Sticky Tags row -->
        <div class="flex flex-col sm:flex-row items-center justify-center gap-4 intro-cta">
            <a data-magnetic class="desktop-cta group inline-flex items-center gap-2" href="#projects">
                <span class="material-symbols-outlined text-[16px]">terminal</span>
                <span>Explore Projects</span>
                <span class="material-symbols-outlined text-[14px] group-hover:translate-x-1 transition-transform">arrow_forward</span>
            </a>
            <div class="flex flex-wrap items-center justify-center gap-2" style="animation: fadeIn-up 0.8s cubic-bezier(0.22, 1, 0.36, 1) 2.0s forwards; opacity: 0; transform: translateY(20px);">
                <span class="sticky-tag">
                    <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="#d97706" stroke-width="2" stroke-linecap="round"><polyline points="8 8 4 12 8 16"/><polyline points="16 8 20 12 16 16"/></svg>
                    Laravel
                </span>
                <span class="sticky-tag" style="transform: rotate(1deg);">
                    <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="#d97706" stroke-width="2" stroke-linecap="round"><line x1="4" y1="6" x2="20" y2="6"/><line x1="4" y1="12" x2="20" y2="12"/><line x1="4" y1="18" x2="20" y2="18"/></svg>
                    Tailwind
                </span>
                <span class="sticky-tag" style="transform: rotate(-0.5deg);">
                    <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="#d97706" stroke-width="2" stroke-linecap="round"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
                    JS
                </span>
            </div>
        </div>
    </div>
</div>

<div class="absolute bottom-8 left-1/2 -translate-x-1/2 animate-bounce cursor-pointer transition-opacity duration-300 intro-scroll-down" id="scroll-down">
    <span class="material-symbols-outlined text-on-surface-variant/40 text-3xl">expand_circle_down</span>
</div>

<svg class="absolute bottom-20 left-1/2 -translate-x-1/2 z-0 pointer-events-none hidden md:block desktop-connector" width="2" height="40" viewBox="0 0 2 40">
    <path d="M1,0 Q1,20 1,40" fill="none" stroke="rgba(26,26,46,0.1)" stroke-width="1.5" stroke-dasharray="3 4"/>
</svg>
</section>

@once
@push('styles')
<style>
    .hero-greeting{
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 6px;
        margin-bottom: -8px;
        transform: rotate(-2deg);
    }
    .hero-greeting-text{
        font-family: 'Beau Rivage', cursive;
        font-size: clamp(22px, 3vw, 32px);
        color: #1c2541;
        opacity: 0.85;
    }
    .hero-greeting-arrow{
        margin-top: 10px;
        transform: rotate(4deg);
    }

    /* Ikon desktop melayang di background — sangat halus, tidak mengganggu fokus utama */
    .hero-floating-icon{
        animation: hero-icon-float 7s ease-in-out infinite;
        transform-origin: center;
    }
    @keyframes hero-icon-float{
        0%, 100% { transform: translateY(0px) rotate(0deg); }
        50% { transform: translateY(-14px) rotate(3deg); }
    }

    @media (prefers-reduced-motion: reduce){
        .hero-floating-icon{ animation: none; }
    }

    @media (max-width: 1024px){
        .hero-floating-icon{ display: none; }
    }
</style>
@endpush
@endonce



<!-- About Me Section -->
<section class="py-24 md:py-section-gap px-6 md:px-10 lg:px-16 max-w-[1280px] mx-auto" id="about">
    <div class="grid grid-cols-1 md:grid-cols-5 gap-12 md:gap-24 items-center mb-32">

        <!-- Image Column -->
        <div class="md:col-span-2 flex justify-center order-1 md:order-2">
            <div class="about-polaroid reveal-clip">
                <div class="about-polaroid-tape"></div>
                <div class="about-polaroid-photo">
                    <img src="https://i.pravatar.cc/320?u=artha" alt="Foto Artha" class="w-full h-full object-cover">
                </div>
                <div class="about-polaroid-caption">Artha — RPL, 2026</div>
            </div>
        </div>

<!-- Text Column -->
<div class="md:col-span-3 order-2 md:order-1">

    <!-- Stempel "Introduction" -->
    <div class="about-stamp">
        <span class="about-stamp-dot"></span>
        Introduction
    </div>

    <h2 class="font-neue text-4xl md:text-5xl lg:text-[54px] text-primary mb-3 font-extrabold tracking-tight leading-[1.15]">
        Merancang Solusi Digital <br class="hidden md:block" />
        dengan Presisi &amp; Detail.
    </h2>

    <svg class="about-underline mb-8" viewBox="0 0 260 12" preserveAspectRatio="none">
        <path d="M0,6 Q65,12 130,6 T260,6" fill="none" stroke="#d97706" stroke-width="1.5" stroke-linecap="round" opacity="0.55"/>
    </svg>

    <!-- Quote/lead paragraph, gaya index card kertas -->
    <div class="about-note">
        <div class="about-note-tape"></div>
        <p class="font-body-md text-lg md:text-xl text-on-surface-variant leading-relaxed">
            Saya Artha, siswa jurusan <span class="font-semibold text-primary">Rekayasa Perangkat Lunak</span> yang berfokus pada pengembangan web — mulai dari perancangan antarmuka hingga logika di baliknya. Bagi saya, kode yang baik adalah kode yang jelas, terstruktur, dan enak dipakai penggunanya.
        </p>
    </div>

    <p class="font-body-md text-base md:text-lg text-on-surface-variant/80 leading-relaxed mb-8">
        Selain proyek sekolah, saya terus mengasah kemampuan lewat eksplorasi mandiri — mempelajari framework baru, membaca dokumentasi, dan menyelesaikan studi kasus nyata. Saya percaya progres terbaik datang dari kebiasaan membangun sesuatu secara konsisten, bukan sekadar memahami teori.
    </p>

    <!-- Mini terminal — reuse .desktop-window, ganti skill tags -->
    <div class="desktop-window about-terminal">
        <div class="window-titlebar">
            <span class="window-dot dot-red"></span>
            <span class="window-dot dot-yellow"></span>
            <span class="window-dot dot-green"></span>
            <span class="window-title-text">whoami.sh</span>
        </div>
        <div class="about-terminal-body">
            <div><span class="prompt-symbol">$</span> ls -la ~/artha</div>
            <div class="about-terminal-line">
                <span class="about-terminal-icon">
                    <svg width="13" height="13" viewBox="0 0 24 24" fill="none"><path d="M4 8h6l2-2h7a2 2 0 0 1 2 2v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V7a1 1 0 0 1 1-1z" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/></svg>
                </span>
                <span class="about-terminal-key">fokus/</span>
                <span class="about-terminal-val">Web Development</span>
            </div>
            <div class="about-terminal-line">
                <span class="about-terminal-icon">
                    <svg width="13" height="13" viewBox="0 0 24 24" fill="none"><path d="M4 8h6l2-2h7a2 2 0 0 1 2 2v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V7a1 1 0 0 1 1-1z" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/></svg>
                </span>
                <span class="about-terminal-key">belajar/</span>
                <span class="about-terminal-val">Laravel &amp; Livewire</span>
            </div>
            <div class="about-terminal-line">
                <span class="about-terminal-icon">
                    <svg width="13" height="13" viewBox="0 0 24 24" fill="none"><path d="M4 8h6l2-2h7a2 2 0 0 1 2 2v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V7a1 1 0 0 1 1-1z" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/></svg>
                </span>
                <span class="about-terminal-key">pendekatan/</span>
                <span class="about-terminal-val">Detail-oriented, iteratif</span>
            </div>
            <div class="about-terminal-line">
                <span class="about-terminal-icon">
                    <svg width="13" height="13" viewBox="0 0 24 24" fill="none"><path d="M4 8h6l2-2h7a2 2 0 0 1 2 2v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V7a1 1 0 0 1 1-1z" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/></svg>
                </span>
                <span class="about-terminal-key">status/</span>
                <span class="about-terminal-val">Open to collaborate</span>
            </div>
            <div class="mt-2"><span class="prompt-symbol">$</span> <span class="pm-caret">▌</span></div>
        </div>
    </div>
</div>
    </div>
</section>

@once
@push('styles')
<style>
    /* ── Stempel "Introduction" ── */
    .about-stamp{
        display: inline-flex;
        align-items: center;
        gap: 8px;
        padding: 6px 16px;
        border-radius: 999px;
        border: 1.5px solid rgba(217,119,6,0.4);
        color: #a35d1e;
        font-family: 'JetBrains Mono', monospace;
        font-size: 11px;
        font-weight: 700;
        letter-spacing: 0.14em;
        text-transform: uppercase;
        transform: rotate(-1.5deg);
        margin-bottom: 20px;
    }
    .about-stamp-dot{
        width: 6px; height: 6px;
        border-radius: 50%;
        background: #d97706;
        animation: pm-blink 1.6s steps(1) infinite;
    }

    /* ── Hand-drawn underline ── */
    .about-underline{ width: 200px; height: 10px; display: block; }

    /* ── Quote block: index card kertas + washi tape ── */
    .about-note{
        position: relative;
        background: #F4ECD8;
        padding: 22px 24px 20px 28px;
        border-radius: 3px;
        margin-bottom: 28px;
        transform: rotate(-0.6deg);
        box-shadow:
            0 1px 0 rgba(255,255,255,0.5) inset,
            3px 6px 16px rgba(40,25,10,0.14);
    }
    .about-note::before{
        content: "";
        position: absolute; inset: 0;
        border-radius: 3px;
        background-image: radial-gradient(#5a4a30 1px, transparent 1px);
        background-size: 6px 6px;
        opacity: 0.04;
        mix-blend-mode: multiply;
        pointer-events: none;
    }
    .about-note-tape{
        position: absolute;
        top: -10px; left: 28px;
        width: 64px; height: 22px;
        background: rgba(232,196,104,0.7);
        transform: rotate(-4deg);
        box-shadow: 0 2px 4px rgba(0,0,0,0.16);
        clip-path: polygon(0% 0%, 5% 25%, 0% 50%, 6% 75%, 0% 100%, 100% 100%, 94% 75%, 100% 50%, 95% 25%, 100% 0%);
    }

    /* ── Foto polaroid ── */
    .about-polaroid{
        position: relative;
        width: 260px;
        background: #fdfbf6;
        padding: 14px 14px 46px;
        transform: rotate(2.5deg);
        box-shadow:
            0 1px 0 rgba(255,255,255,0.6) inset,
            4px 10px 24px rgba(40,25,10,0.22);
        transition: transform 0.4s cubic-bezier(0.22,1,0.36,1);
    }
    .about-polaroid:hover{ transform: rotate(0deg) translateY(-4px); }
    @media (min-width: 768px){ .about-polaroid{ width: 300px; } }

    .about-polaroid-tape{
        position: absolute;
        top: -12px; left: 50%; transform: translateX(-50%) rotate(-3deg);
        width: 84px; height: 26px;
        background: rgba(232,196,104,0.72);
        box-shadow: 0 2px 4px rgba(0,0,0,0.18);
        clip-path: polygon(0% 0%, 4% 22%, 0% 44%, 5% 66%, 0% 88%, 3% 100%, 100% 100%, 96% 80%, 100% 58%, 95% 36%, 100% 14%, 97% 0%);
    }
    .about-polaroid-photo{
        width: 100%; aspect-square;
        overflow: hidden;
        border: 1px solid rgba(0,0,0,0.06);
        background: #f0ece4;
        aspect-ratio: 1 / 1;
    }
    .about-polaroid-caption{
        position: absolute;
        bottom: 14px; left: 0; right: 0;
        text-align: center;
        font-family: 'Beau Rivage', cursive;
        font-size: 20px;
        color: #1c2541;
        opacity: 0.85;
    }

    @media (prefers-reduced-motion: reduce){
        .about-stamp-dot{ animation: none; }
        .about-polaroid{ transition: none; }
    }
</style>
@endpush
@endonce

<!-- Interstitial Shape Section -->
<section id="interstitial-shape" class="relative min-h-[75vh] py-20 flex flex-col items-center justify-center text-center overflow-hidden bg-surface-container-lowest">
    
    <!-- Infinite Marquee Background -->
    <div class="absolute inset-0 z-0 flex flex-col justify-center gap-4 text-black/[0.04] pointer-events-none overflow-hidden" aria-hidden="true">
        <div class="flex whitespace-nowrap animate-marquee">
            <span class="text-[90px] md:text-[130px] font-black font-neue uppercase tracking-tight mx-4">WEB DEVELOPMENT • UI/UX DESIGN • LARAVEL • JAVASCRIPT • </span>
            <span class="text-[90px] md:text-[130px] font-black font-neue uppercase tracking-tight mx-4">WEB DEVELOPMENT • UI/UX DESIGN • LARAVEL • JAVASCRIPT • </span>
        </div>
        <div class="flex whitespace-nowrap animate-marquee-reverse">
            <span class="text-[90px] md:text-[130px] font-black font-neue uppercase tracking-tight mx-4">FRONTEND • BACKEND • PROBLEM SOLVING • CREATIVE • </span>
            <span class="text-[90px] md:text-[130px] font-black font-neue uppercase tracking-tight mx-4">FRONTEND • BACKEND • PROBLEM SOLVING • CREATIVE • </span>
        </div>
    </div>

    <!-- The Perfect Circle Shape -->
    <div id="blob-shape" class="absolute top-1/2 left-1/2 w-[700px] h-[700px] max-w-[90vw] max-h-[90vw] -translate-x-1/2 -translate-y-1/2 z-[1] rounded-full bg-[#e6f0fa]"></div>

    <div id="interstitial-content" class="relative z-10 max-w-4xl px-6 mt-10">
        <div class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-white/50 backdrop-blur-md border border-[#00668a]/10 mb-6 shadow-sm">
            <span class="w-1.5 h-1.5 rounded-full bg-[#00668a]"></span>
            <span class="font-label-sm text-[11px] font-bold text-[#00668a] uppercase tracking-widest">Selected Works</span>
        </div>
        
                <h2 class="font-neue text-[clamp(50px,8vw,90px)] font-black leading-[1.0] tracking-tighter text-black mb-6" data-split>
            Case Studies
        </h2>
        
        <p class="font-body-md text-[15px] md:text-base text-gray-600 max-w-[600px] mx-auto leading-relaxed mb-12">
            Kumpulan proyek pilihan yang berfokus pada penyelesaian masalah nyata melalui kode. Setiap studi kasus mencerminkan proses berpikir, eksplorasi teknologi, dan dedikasi pada pengalaman pengguna yang optimal.
        </p>

        <!-- Stats Grid -->
        <div class="grid grid-cols-2 md:grid-cols-4 gap-4 max-w-3xl mx-auto">
            <div class="bg-white px-4 py-6 rounded-2xl shadow-[0_8px_30px_rgb(0,0,0,0.04)] flex flex-col items-center justify-center">
                <h3 class="font-neue text-3xl font-black text-black mb-1"><span data-counter="10" data-duration="1500" data-suffix="+">0</span></h3>
                <p class="font-label-sm text-[11px] font-bold text-gray-500 uppercase tracking-widest">Proyek</p>
            </div>
            <div class="bg-white px-4 py-6 rounded-2xl shadow-[0_8px_30px_rgb(0,0,0,0.04)] flex flex-col items-center justify-center">
                <h3 class="font-neue text-3xl font-black text-black mb-1"><span data-counter="99" data-duration="1200" data-suffix="%">0</span></h3>
                <p class="font-label-sm text-[11px] font-bold text-gray-500 uppercase tracking-widest">Kode Bersih</p>
            </div>
            <div class="bg-white px-4 py-6 rounded-2xl shadow-[0_8px_30px_rgb(0,0,0,0.04)] flex flex-col items-center justify-center">
                <h3 class="font-neue text-3xl font-black text-black mb-1">UI/UX</h3>
                <p class="font-label-sm text-[11px] font-bold text-gray-500 uppercase tracking-widest">Fokus Desain</p>
            </div>
            <div class="bg-white px-4 py-6 rounded-2xl shadow-[0_8px_30px_rgb(0,0,0,0.04)] flex flex-col items-center justify-center">
                <h3 class="font-neue text-3xl font-black text-black mb-1"><span data-counter="247" data-duration="2000">0</span></h3>
                <p class="font-label-sm text-[11px] font-bold text-gray-500 uppercase tracking-widest">Belajar</p>
            </div>
        </div>
    </div>
</section>

<!-- Featured Projects Section -->
<section class="py-24 md:py-32 max-w-[1280px] mx-auto px-6 md:px-10 lg:px-16 relative" id="projects">
    <!-- Background Grid to mimic a board -->
    <div class="absolute inset-0 pointer-events-none z-0" style="background-image: radial-gradient(rgba(26,26,46,0.05) 1px, transparent 1px); background-size: 24px 24px;"></div>
    
    <div class="relative z-10 flex flex-col md:flex-row md:items-end justify-between mb-16 gap-8">
        <div>
            <!-- Terminal greeting -->
            <div class="flex items-center gap-2 mb-4 intro-sub-title">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" class="text-[#d97706]">
                    <path d="M22 19a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h5l2 3h9a2 2 0 0 1 2 2z" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
                <span class="terminal-caption text-xs">
                    <span class="prompt-symbol">$</span> <span class="text-[#5c5760]">ls -la ~/projects</span>
                </span>
            </div>
            
            <div class="relative inline-block">
                <h2 class="font-neue text-[clamp(40px,6vw,60px)] font-extrabold leading-[1.0] tracking-tighter text-primary">
                    Karya Terbaik.
                </h2>
                <!-- Hand-drawn underline -->
                <svg class="absolute bottom-[-5px] left-0 w-full opacity-60" viewBox="0 0 200 12" preserveAspectRatio="none">
                    <path d="M0,6 Q100,12 200,6" fill="none" stroke="#d97706" stroke-width="2" stroke-linecap="round" stroke-dasharray="8 4"/>
                </svg>
            </div>
        </div>
    </div>

   <!-- Desktop Bulletin Board (Wooden) -->
<div class="hidden lg:block relative w-full aspect-[16/9] rounded-3xl border-[20px] overflow-hidden z-10 mb-8"
     style="
        background: linear-gradient(155deg, #9c6a42 0%, #8B5A2B 50%, #7a4b23 100%);
        border-color: #5E3A18;
        box-shadow:
            inset 0 0 0 1.5px rgba(255,255,255,0.08),
            inset 0 2px 4px rgba(0,0,0,0.25),
            0 20px 50px rgba(0,0,0,0.35);
     ">

    <!-- Wood grain — satu layer garis diagonal halus, ilustratif bukan noise -->
    <div class="absolute inset-0 pointer-events-none mix-blend-overlay opacity-[0.30]"
         style="
            background-image: repeating-linear-gradient(
                92deg,
                rgba(255,255,255,0.10) 0px,
                rgba(255,255,255,0.10) 1px,
                transparent 1px,
                transparent 5px,
                rgba(0,0,0,0.08) 5px,
                rgba(0,0,0,0.08) 6px,
                transparent 6px,
                transparent 13px
            );
         "></div>

    <!-- Beberapa "mata kayu" (knot) samar, secukupnya saja -->
    <div class="absolute top-[18%] left-[8%] w-7 h-5 rounded-full pointer-events-none opacity-[0.16]"
         style="background: radial-gradient(ellipse, #3d2313 0%, transparent 70%); mix-blend-mode: multiply;"></div>
    <div class="absolute bottom-[22%] right-[10%] w-6 h-6 rounded-full pointer-events-none opacity-[0.14]"
         style="background: radial-gradient(ellipse, #3d2313 0%, transparent 70%); mix-blend-mode: multiply;"></div>

    @php
        $centerProject = $projects->firstWhere('board_position', 'center') 
                         ?? $projects->firstWhere('id', 1) 
                         ?? $projects->first();
        
        $cornerProjectsArray = [
            $projects->firstWhere('board_position', 'top_left'),
            $projects->firstWhere('board_position', 'top_right'),
            $projects->firstWhere('board_position', 'bottom_left'),
            $projects->firstWhere('board_position', 'bottom_right')
        ];
        
        $usedIds = collect($cornerProjectsArray)->filter()->pluck('id')->push($centerProject?->id)->toArray();
        $unassignedProjects = $projects->whereNotIn('id', $usedIds)->values();
        
        foreach ($cornerProjectsArray as $index => $cp) {
            if (!$cp && $unassignedProjects->isNotEmpty()) {
                $cornerProjectsArray[$index] = $unassignedProjects->shift();
            }
        }
        
        $cornerProjects = collect($cornerProjectsArray)->filter();
        
        $cornerPositions = [
            'top-6 left-6 -rotate-[4deg]',
            'top-6 right-6 rotate-[3deg]',
            'bottom-6 left-6 rotate-[5deg]',
            'bottom-6 right-6 -rotate-[3deg]'
        ];
    @endphp

    @php
    // Aksen warna per posisi — variasi "app" tapi tetap dalam palet tema
    $accentColors = ['#d97706', '#00668a', '#a13d2b', '#4a7a4e']; // amber, teal, terracotta, sage
@endphp

<!-- Center Project (Center) -->
@if($centerProject)
<div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[38%] z-20 transition-transform duration-500 hover:scale-[1.05] hover:z-30">

    <!-- Bayangan "melayang" di atas kayu -->
    <div class="absolute left-1/2 -translate-x-1/2 -bottom-3 w-[85%] h-6 rounded-full pointer-events-none"
         style="background: radial-gradient(ellipse, rgba(20,12,5,0.45) 0%, transparent 75%); filter: blur(4px);"></div>

    <button type="button" onclick="openFlipModal(event, {{ $centerProject->id }})" class="group relative block w-full text-left no-underline outline-none cursor-pointer">

        <!-- Label FEATURED, terlipat di pojok, motif sticky-tag -->
        <div class="absolute -top-2 -left-2 z-20 font-mono text-[8px] font-bold tracking-widest text-white px-2 py-1 rotate-[-8deg] pointer-events-none"
             style="background: #a13d2b; box-shadow: 0 3px 6px rgba(0,0,0,0.3); clip-path: polygon(0 0, 100% 0, 100% 100%, 8% 100%, 0 80%);">
            FEATURED
        </div>

        <div class="desktop-window w-full bg-white relative shadow-[0_15px_40px_rgba(0,0,0,0.6)] overflow-hidden">

            <!-- Washi tape frosted -->
            <div class="absolute -top-3 left-1/2 -translate-x-1/2 w-20 h-7 bg-white/40 backdrop-blur-md border border-white/60 shadow-sm rotate-[2deg] z-10" style="clip-path: polygon(0 5%, 100% 0, 95% 95%, 5% 100%);"></div>

            <!-- Reflection strip tipis di atas, kesan permukaan kaca layar -->
            <div class="absolute inset-x-0 top-0 h-8 pointer-events-none z-[5]"
                 style="background: linear-gradient(180deg, rgba(255,255,255,0.35) 0%, transparent 100%);"></div>

            <div class="window-titlebar bg-[#f7f5f0] border-b py-2 px-4 relative"
                 style="border-color: {{ $accentColors[0] }}55;">
                <span class="window-dot dot-red"></span>
                <span class="window-dot dot-yellow"></span>
                <span class="window-dot dot-green"></span>
                <span class="window-title-text text-[#8b8680] text-xs font-mono ml-2 truncate">
                    <span style="color: {{ $accentColors[0] }};">▌</span>
                </span>
            </div>

            <div class="p-4 pb-5">
                <div class="relative w-full aspect-video rounded overflow-hidden bg-[#f0ece4] mb-4 border border-[#e0dbd0]">
                    @php $coverImage = $centerProject->cover_image ?? ($centerProject->images[0] ?? null); @endphp
                    @if($coverImage)
                        <img src="{{ asset('storage/' . $coverImage) }}" alt="{{ $centerProject->title }}" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-[1.04]">
                    @else
                        <div class="w-full h-full flex items-center justify-center text-[#8b8680]/30 font-mono text-sm">[ NO_PREVIEW ]</div>
                    @endif

                    <!-- Scanline halus, sangat samar -->
                    <div class="absolute inset-0 pointer-events-none opacity-[0.06]"
                         style="background-image: repeating-linear-gradient(0deg, #000 0px, #000 1px, transparent 1px, transparent 3px);"></div>

                    <!-- Loading bar, muncul saat hover -->
                    <div class="absolute bottom-0 left-0 h-[3px] w-0 group-hover:w-full transition-all duration-500 ease-out"
                         style="background: {{ $accentColors[0] }};"></div>
                </div>
                <h3 class="font-neue text-2xl font-bold text-primary mb-1 tracking-tight truncate transition-colors" style="--tw-text-opacity:1;" onmouseover="this.style.color='{{ $accentColors[0] }}'" onmouseout="this.style.color=''">{{ $centerProject->title }}</h3>
                <p class="font-mono text-[11px] text-[#8b8680] uppercase tracking-wider truncate">{{ $centerProject->category }}</p>
            </div>
        </div>
    </button>
</div>
@endif

<!-- Corner Projects -->
@foreach($cornerProjects as $index => $p)
@php $accent = $accentColors[$index % 4]; @endphp
<div class="absolute {{ $cornerPositions[$index] }} w-[24%] z-10 transition-transform duration-500 hover:scale-[1.08] hover:rotate-0 hover:z-30">

    <!-- Bayangan melayang -->
    <div class="absolute left-1/2 -translate-x-1/2 -bottom-2 w-[80%] h-4 rounded-full pointer-events-none"
         style="background: radial-gradient(ellipse, rgba(20,12,5,0.4) 0%, transparent 75%); filter: blur(3px);"></div>

    <button type="button" onclick="openFlipModal(event, {{ $p->id }})" class="group relative block w-full text-left no-underline outline-none cursor-pointer">

        @if($index % 2 === 0)
            <!-- Washi tape frosted -->
            <div class="absolute -top-2.5 left-1/2 -translate-x-1/2 w-14 h-5 bg-white/40 backdrop-blur-md border border-white/60 shadow-sm rotate-[-3deg] z-10" style="clip-path: polygon(0 5%, 100% 0, 95% 95%, 5% 100%);"></div>
        @else
            <!-- Binder clip logam -->
            <div class="absolute -top-3 left-1/2 -translate-x-1/2 w-9 h-5 z-10 rounded-[3px_3px_6px_6px]"
                 style="background: linear-gradient(160deg, #dcdcdc, #8a8a8a 55%, #565656); box-shadow: 0 3px 5px rgba(0,0,0,0.35), inset 0 1px 1px rgba(255,255,255,0.5);">
                <div class="absolute top-1 left-1/2 -translate-x-1/2 w-1.5 h-1.5 rounded-full" style="background: rgba(0,0,0,0.35); box-shadow: inset 0 1px 1px rgba(0,0,0,0.5);"></div>
            </div>
        @endif

        <div class="desktop-window w-full bg-white relative shadow-[0_10px_30px_rgba(0,0,0,0.5)] overflow-hidden">

            <div class="absolute inset-x-0 top-0 h-6 pointer-events-none z-[5]"
                 style="background: linear-gradient(180deg, rgba(255,255,255,0.3) 0%, transparent 100%);"></div>

            <div class="window-titlebar bg-[#f7f5f0] border-b py-1.5 px-3 relative" style="border-color: {{ $accent }}55;">
                <span class="window-dot dot-red w-2 h-2"></span>
                <span class="window-dot dot-yellow w-2 h-2"></span>
                <span class="window-dot dot-green w-2 h-2"></span>
                <span class="window-title-text text-[#8b8680] text-[9px] font-mono ml-1.5 truncate max-w-[110px]">
                    <span style="color: {{ $accent }};">▌</span>
                </span>
            </div>

            <div class="p-3 pb-4">
                <div class="relative w-full aspect-video rounded-sm overflow-hidden bg-[#f0ece4] mb-3 border border-[#e0dbd0]">
                    @php $coverImage = $p->cover_image ?? ($p->images[0] ?? null); @endphp
                    @if($coverImage)
                        <img src="{{ asset('storage/' . $coverImage) }}" alt="{{ $p->title }}" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-[1.05]">
                    @else
                        <div class="w-full h-full flex items-center justify-center text-[#8b8680]/30 font-mono text-[10px]">[ NO_PREVIEW ]</div>
                    @endif

                    <div class="absolute inset-0 pointer-events-none opacity-[0.06]"
                         style="background-image: repeating-linear-gradient(0deg, #000 0px, #000 1px, transparent 1px, transparent 3px);"></div>

                    <div class="absolute bottom-0 left-0 h-[2px] w-0 group-hover:w-full transition-all duration-500 ease-out"
                         style="background: {{ $accent }};"></div>
                </div>
                <h3 class="font-neue text-lg font-bold text-primary mb-0.5 tracking-tight truncate transition-colors" onmouseover="this.style.color='{{ $accent }}'" onmouseout="this.style.color=''">{{ $p->title }}</h3>
                <p class="font-mono text-[9px] text-[#8b8680] uppercase tracking-wider truncate">{{ $p->category }}</p>
            </div>
        </div>
    </button>
</div>
@endforeach
</div>

    <!-- Mobile Grid (Hidden on Desktop) -->
    <div class="relative z-10 grid grid-cols-1 md:grid-cols-2 gap-8 lg:hidden">
        @php
            $mobileDisplay = collect();
            if(isset($centerProject)) $mobileDisplay->push($centerProject);
            if(isset($cornerProjects)) $mobileDisplay = $mobileDisplay->merge($cornerProjects);
            $rotations = ['-rotate-2', 'rotate-2', 'rotate-1', '-rotate-1', 'rotate-2'];
            $mobilePaperColors = ['#fef9f0', '#f0f7ff', '#fff9f0', '#f7fff0', '#fff0f7'];
            $mobilePinColors = ['bg-amber-400', 'bg-blue-400', 'bg-orange-400', 'bg-green-400', 'bg-pink-400'];
        @endphp
        @foreach($mobileDisplay as $index => $p)
        @php $rotationClass = $rotations[$index % 5]; @endphp
        <button type="button" onclick="openFlipModal(event, {{ $p->id }})" class="project-card-btn group block w-full text-left no-underline outline-none cursor-pointer">
            <div class="w-full relative transform transition-all duration-500 hover:scale-[1.03] hover:rotate-0 hover:z-20 shadow-[2px_5px_15px_rgba(0,0,0,0.1)] p-4 md:p-6 pb-6 {{ $rotationClass }}" style="background-color: {{ $mobilePaperColors[$index % 5] }};">
                <!-- Pushpin -->
                <div class="absolute -top-3 left-1/2 -translate-x-1/2 w-5 h-5 rounded-full shadow-[2px_3px_4px_rgba(0,0,0,0.3)] z-10 {{ $mobilePinColors[$index % 5] }} flex items-start justify-start p-[3px]">
                    <div class="w-2 h-2 rounded-full bg-white/40"></div>
                </div>

                <div class="relative w-full aspect-video rounded-md overflow-hidden mb-5 border border-black/5 shadow-sm bg-white group-hover:shadow-md transition-shadow">
                    @php $coverImage = $p->cover_image ?? ($p->images[0] ?? null); @endphp
                    @if($coverImage)
                    <img src="{{ asset('storage/' . $coverImage) }}" alt="{{ $p->title }}" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105">
                    @else
                    <div class="w-full h-full flex items-center justify-center text-[#8b8680]/50 font-mono text-xl">[ NO_PREVIEW ]</div>
                    @endif
                </div>

                <div class="flex items-start justify-between gap-4">
                    <div>
                        <h3 class="font-neue text-2xl font-bold text-slate-800 mb-2 tracking-tight">{{ $p->title }}</h3>
                        <div class="flex items-center gap-2">
                            <span class="w-1.5 h-1.5 rounded-full bg-slate-400"></span>
                            <p class="font-mono text-xs text-slate-600 uppercase tracking-wider">{{ $p->category }}</p>
                        </div>
                        @if($p->skills->count())
                        <div style="display: flex; gap: 6px; margin-top: 8px; flex-wrap: wrap;">
                            @foreach($p->skills->take(2) as $skill)
                            <span style="font-size: 10px; font-weight: 500; padding: 3px 8px; background: rgba(0, 102, 138, 0.1); color: #00668a; border-radius: 10px; white-space: nowrap;">{{ $skill->name }}</span>
                            @endforeach
                            @if($p->skills->count() > 2)
                            <span style="font-size: 10px; font-weight: 500; padding: 3px 8px; background: rgba(0, 0, 0, 0.05); color: #8b8680; border-radius: 10px;">+{{ $p->skills->count() - 2 }}</span>
                            @endif
                        </div>
                        @endif
                    </div>
                    <div class="w-10 h-10 rounded-full border border-black/10 flex items-center justify-center bg-white/50 text-slate-600 group-hover:bg-black group-hover:border-black group-hover:text-white transition-all duration-300 transform group-hover:rotate-45 shadow-sm">
                        <span class="material-symbols-outlined text-[18px]">arrow_outward</span>
                    </div>
                </div>

                <!-- Folded Corner Effect -->
                <div class="absolute bottom-0 right-0 w-8 h-8" style="background: linear-gradient(135deg, transparent 50%, rgba(0,0,0,0.05) 50%, rgba(0,0,0,0.1) 100%);"></div>
            </div>
        </button>
        @endforeach
    </div>
</section>

<!-- Capabilities Section -->
<section class="py-24 md:py-32 max-w-[1280px] mx-auto px-6 md:px-10 lg:px-16" id="capabilities">
    <div class="flex flex-col md:flex-row justify-between items-start md:items-end mb-16 gap-6">
        <div>
            <div class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-secondary/5 border border-secondary/20 mb-6">
                <span class="w-1.5 h-1.5 rounded-full bg-secondary"></span>
                <span class="font-label-sm text-[11px] font-bold text-secondary uppercase tracking-widest">Tech Stack</span>
            </div>
            <h2 class="font-neue text-[clamp(40px,6vw,70px)] font-black leading-[1.0] tracking-tighter text-primary">
                Kemampuan & <br/> Alat Kerja
            </h2>
        </div>
        <p class="font-body-md text-base text-on-surface-variant/80 max-w-sm mb-4">
            Teknologi yang saya pelajari dan gunakan sehari-hari untuk membangun antarmuka modern dan sistem backend yang solid.
        </p>
    </div>

    <div class="w-full relative overflow-hidden flex flex-col gap-6 py-4">
        
        <!-- Marquee Row 1 (Top Skills) -->
        <div class="marquee-container group">
            <div class="marquee-content">
                @for($i = 0; $i < 12; $i++)
                @foreach($topSkills as $skill)
                <div class="skill-card hover:bg-slate-50">
                    <div class="skill-icon flex items-center justify-center">
                        @if($skill->icon && (str_contains($skill->icon, '<img') || str_contains($skill->icon, '<svg')))
                            {!! $skill->icon !!}
                        @elseif($skill->icon)
                            <span class="material-symbols-outlined text-primary">{{ $skill->icon }}</span>
                        @else
                            <span class="w-3 h-3 rounded-full {{ $skill->color_class ?? 'bg-primary' }}"></span>
                        @endif
                    </div>
                    <span class="font-bold text-primary text-lg">{{ $skill->name }}</span>
                </div>
                @endforeach
                @endfor
            </div>
        </div>

        <!-- Marquee Row 2 (Bottom Skills) -->
        <div class="marquee-container group">
            <div class="marquee-content reverse">
                @for($i = 0; $i < 12; $i++)
                @foreach($bottomSkills as $skill)
                <div class="skill-card hover:bg-slate-50">
                    <div class="skill-icon flex items-center justify-center">
                        @if($skill->icon && (str_contains($skill->icon, '<img') || str_contains($skill->icon, '<svg')))
                            {!! $skill->icon !!}
                        @elseif($skill->icon)
                            <span class="material-symbols-outlined text-secondary">{{ $skill->icon }}</span>
                        @else
                            <span class="w-3 h-3 rounded-full {{ $skill->color_class ?? 'bg-secondary' }}"></span>
                        @endif
                    </div>
                    <span class="font-bold text-primary text-lg">{{ $skill->name }}</span>
                </div>
                @endforeach
                @endfor
            </div>
        </div>

    </div>
</section>
<!-- Contact Section -->
<section class="py-24 md:py-32 max-w-[1280px] mx-auto px-6 md:px-10 lg:px-16" id="contact">
    <div class="grid grid-cols-1 lg:grid-cols-5 gap-12 lg:gap-24 items-center">
        <!-- Left Text Content -->
        <div class="lg:col-span-2 space-y-8">
            <!-- Terminal greeting -->
            <div class="flex items-center gap-2 mb-4 intro-sub-title">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" class="text-[#d97706]">
                    <path d="M4 8h6l2-2h7a2 2 0 0 1 2 2v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V7a1 1 0 0 1 1-1z" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
                <span class="terminal-caption text-xs">
                    <span class="prompt-symbol">$</span> <span class="text-[#5c5760]">~/contact</span>
                </span>
            </div>
            
            <div class="relative inline-block">
                <h2 class="font-neue text-[clamp(40px,6vw,70px)] font-extrabold leading-[1.05] tracking-tighter text-primary">
                    Mari terhubung <br/>& berkolaborasi.
                </h2>
                <!-- Hand-drawn underline -->
                <svg class="absolute bottom-[-10px] left-0 w-[70%] opacity-50" viewBox="0 0 200 12" preserveAspectRatio="none">
                    <path d="M0,6 Q50,12 100,6 T200,6" fill="none" stroke="#d97706" stroke-width="2" stroke-linecap="round"/>
                </svg>
            </div>
            
            <p class="font-body-md text-body-md text-on-surface-variant/70 max-w-md leading-relaxed mt-8">
                Punya ide brilian, pertanyaan, atau sekadar ingin menyapa? Saya selalu terbuka untuk diskusi baru dan peluang menarik.
            </p>
            
            <div class="flex flex-wrap gap-3 mt-8">
                <a href="mailto:hello@artha.dev" class="sticky-tag hover:text-[#d97706]">
                    <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="#d97706" stroke-width="2" stroke-linecap="round"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg>
                    hello@artha.dev
                </a>
                <a href="#" class="sticky-tag hover:text-[#d97706]" style="transform: rotate(1.5deg);">
                    <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="#d97706" stroke-width="2" stroke-linecap="round"><path d="M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-2-2 2 2 0 0 0-2 2v7h-4v-7a6 6 0 0 1 6-6z"></path><rect x="2" y="9" width="4" height="12"></rect><circle cx="4" cy="4" r="2"></circle></svg>
                    Artha Keandre
                </a>
                <a href="#" class="sticky-tag hover:text-[#d97706]" style="transform: rotate(-1deg);">
                    <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="#d97706" stroke-width="2" stroke-linecap="round"><path d="M9 19c-5 1.5-5-2.5-7-3m14 6v-3.87a3.37 3.37 0 0 0-.94-2.61c3.14-.35 6.44-1.54 6.44-7A5.44 5.44 0 0 0 20 4.77 5.07 5.07 0 0 0 19.91 1S18.73.65 16 2.48a13.38 13.38 0 0 0-7 0C6.27.65 5.09 1 5.09 1A5.07 5.07 0 0 0 5 4.77a5.44 5.44 0 0 0-1.5 3.78c0 5.42 3.3 6.61 6.44 7A3.37 3.37 0 0 0 9 18.13V22"></path></svg>
                    GitHub
                </a>
            </div>
        </div>

        <!-- Right Form Card (Desktop Window Style) -->
        <div class="lg:col-span-3 w-full relative">
            <!-- decorative connection line -->
            <svg class="absolute -left-16 top-1/2 -translate-y-1/2 hidden lg:block z-0 pointer-events-none" width="40" height="2" viewBox="0 0 40 2">
                <path d="M0,1 L40,1" fill="none" stroke="rgba(26,26,46,0.15)" stroke-width="1.5" stroke-dasharray="3 4"/>
            </svg>
            
            <div class="desktop-window w-full relative z-10 hover:shadow-[0_12px_40px_rgba(26,26,46,0.08)] transition-shadow duration-300">
                <div class="window-titlebar">
                    <span class="window-dot dot-red"></span>
                    <span class="window-dot dot-yellow"></span>
                    <span class="window-dot dot-green"></span>
                    <span class="window-title-text">~/contact.sh</span>
                </div>
                
                <form action="{{ route('contact.submit') }}" method="POST" class="p-6 md:p-8 space-y-6">
                    @csrf
                    
                    @if(session('success'))
                    <div class="bg-emerald-500/10 border border-emerald-500/20 text-emerald-600 px-4 py-3 rounded-md text-sm font-mono mb-4 flex items-center gap-2">
                        <span class="material-symbols-outlined text-[18px]">check_circle</span>
                        {{ session('success') }}
                    </div>
                    @endif

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="flex flex-col gap-2">
                            <label for="name" class="font-mono text-[11px] font-bold text-[#8b8680] uppercase tracking-wider">Name</label>
                            <input type="text" id="name" name="name" class="bg-white/50 border border-outline-variant/60 rounded-md text-sm font-mono text-primary py-2.5 px-3 focus:outline-none focus:border-[#d97706] focus:bg-white transition-colors w-full shadow-sm" placeholder="John Doe" required />
                        </div>
                        <div class="flex flex-col gap-2">
                            <label for="email" class="font-mono text-[11px] font-bold text-[#8b8680] uppercase tracking-wider">Email</label>
                            <input type="email" id="email" name="email" class="bg-white/50 border border-outline-variant/60 rounded-md text-sm font-mono text-primary py-2.5 px-3 focus:outline-none focus:border-[#d97706] focus:bg-white transition-colors w-full shadow-sm" placeholder="hello@example.com" required />
                        </div>
                    </div>
                    
                    <div class="flex flex-col gap-2">
                        <label for="message" class="font-mono text-[11px] font-bold text-[#8b8680] uppercase tracking-wider">Message</label>
                        <textarea id="message" name="message" rows="5" class="bg-white/50 border border-outline-variant/60 rounded-md text-sm font-mono text-primary py-2.5 px-3 focus:outline-none focus:border-[#d97706] focus:bg-white transition-colors resize-none w-full shadow-sm" placeholder="Tell me about your project..." required></textarea>
                    </div>
                    
                    <div class="flex justify-start pt-4">
                        <button type="submit" data-magnetic class="desktop-cta group inline-flex items-center gap-2 border border-[rgba(255,255,255,0.1)]">
                            <span class="material-symbols-outlined text-[16px]">terminal</span>
                            <span>Send Message</span>
                            <span class="material-symbols-outlined text-[14px] group-hover:translate-x-1 transition-transform">arrow_forward</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

</div>
</div>

{{-- ═══════════════════════════════════════════════════
     PROJECT DETAIL MODAL (FLIP ANIMATION)
═══════════════════════════════════════════════════ --}}

{{-- Data JSON semua proyek untuk JS --}}
<script id="projects-json" type="application/json">
    {!! json_encode($projects->map(function($p) {
        return [
            'id'          => $p->id,
            'title'       => $p->title,
            'category'    => $p->category,
            'description' => $p->description,
            'cover_image' => $p->cover_image,
            'images'      => $p->images ?? [],
            'demo_link'   => $p->demo_link,
            'github_link' => $p->github_link,
            'skills'      => $p->skills->pluck('name'),
        ];
    })->keyBy('id')) !!}
</script>

<!-- Backdrop -->
<div id="pm-backdrop"
    style="position:fixed;inset:0;z-index:99990;
           background:radial-gradient(ellipse at center, rgba(58,42,26,0.55) 0%, rgba(20,14,9,0.78) 100%);
           backdrop-filter:blur(8px);
           opacity:0;pointer-events:none;transition:opacity 0.4s ease;"
    onclick="pmClose()"></div>

<!-- Modal container -->
<div id="pm-modal"
    style="position:fixed;z-index:99991;overflow:hidden;display:flex;flex-direction:column;
           pointer-events:none;opacity:0;background:#F4ECD8;
           border-radius:6px;
           border:1px solid rgba(60,40,20,0.14);
           box-shadow:inset 0 1px 0 rgba(255,255,255,0.35),0 12px 28px rgba(40,25,10,0.28),0 40px 90px rgba(30,18,8,0.4);
           will-change:transform,opacity,width,height,top,left,border-radius;">

    <!-- Grain texture -->
    <div aria-hidden="true"
        style="position:absolute;inset:0;pointer-events:none;z-index:0;opacity:0.05;mix-blend-mode:multiply;
               background-image:radial-gradient(#5a4a30 1px, transparent 1px);background-size:6px 6px;"></div>

    <!-- Washi tape -->
    <div aria-hidden="true"
        style="position:absolute;top:-3px;left:50%;transform:translateX(-50%) rotate(-2deg);
               width:96px;height:26px;z-index:2;
               background:rgba(232,196,104,0.68);
               box-shadow:0 2px 4px rgba(0,0,0,0.18);
               clip-path:polygon(0% 0%, 4% 22%, 0% 44%, 5% 66%, 0% 88%, 3% 100%,100% 100%, 96% 80%, 100% 58%, 95% 36%, 100% 14%, 97% 0%);"></div>

    <!-- Scrollable content area -->
    <div id="pm-content"
        style="position:relative;z-index:1;width:100%;height:100%;overflow-y:auto;overflow-x:hidden;
               opacity:0;transition:opacity 0.3s ease;">
    </div>

    <!-- Close button -->
    <button id="pm-close" type="button" onclick="pmClose()"
        style="position:absolute;top:16px;right:16px;z-index:10;
               width:36px;height:36px;border-radius:50%;
               background:rgba(47,33,21,0.12);border:1px solid rgba(47,33,21,0.18);
               display:flex;align-items:center;justify-content:center;
               cursor:pointer;opacity:0;pointer-events:none;
               transition:opacity 0.2s ease,background 0.2s ease;"
        onmouseover="this.style.background='rgba(47,33,21,0.22)'"
        onmouseout="this.style.background='rgba(47,33,21,0.12)'">
        <span class="material-symbols-outlined" style="font-size:18px;color:#2f2115;pointer-events:none;">close</span>
    </button>
</div>
@push('scripts')
    <script src="{{ asset('js/welcome.js') }}"></script>
@endpush

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/welcome.css') }}">
@endpush
@endsection