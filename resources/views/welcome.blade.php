@extends('layouts.app')

@section('content')
<div data-barba="container" data-barba-namespace="home">
<div class="w-full overflow-x-hidden">
<!-- Hero Section -->
<section class="min-h-screen flex flex-col justify-center items-center relative overflow-hidden text-center px-6 md:px-10 lg:px-16" id="home" data-intro-container>

<!-- Desktop Background Layer -->
<div class="hero-desktop-bg"></div>

<!-- SVG Circle and Icons for Animation -->
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
        <!-- Paper Texture Filter (lebih terasa seperti kertas) -->
        <filter id="noise-filter" x="0" y="0" width="100%" height="100%">
            <feTurbulence type="fractalNoise" baseFrequency="0.75" numOctaves="4" stitchTiles="stitch" result="noise"/>
            <feColorMatrix type="saturate" values="0" in="noise" result="grayNoise"/>
            <feComponentTransfer in="grayNoise">
                <feFuncA type="linear" slope="0.06"/>
            </feComponentTransfer>
        </filter>
        <!-- Kotak-kotak grid seperti kertas grafik -->
        <pattern id="paper-grid" width="24" height="24" patternUnits="userSpaceOnUse">
            <path d="M 24 0 L 0 0 0 24" fill="none" stroke="rgba(26,26,46,0.12)" stroke-width="0.8"/>
            <path d="M 12 0 L 12 24 M 0 12 L 24 12" fill="none" stroke="rgba(26,26,46,0.06)" stroke-width="0.4"/>
        </pattern>
        <!-- Garis horizontal tipis seperti kertas buku -->
        <pattern id="lined-paper" width="100" height="24" patternUnits="userSpaceOnUse">
            <line x1="0" y1="23" x2="100" y2="23" stroke="rgba(26,26,46,0.05)" stroke-width="0.5"/>
        </pattern>
        <!-- Desktop Icons for floating display -->
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
    <!-- Paper Texture Overlay (noise seperti kertas) -->
    <rect width="100%" height="100%" filter="url(#noise-filter)" opacity="1"/>
    <!-- Lined Paper Overlay -->
    <rect width="100%" height="100%" fill="url(#lined-paper)" opacity="0.7"/>
    <!-- Kotak-kotak Grid Overlay (seperti kertas grafik) -->
    <rect width="100%" height="100%" fill="url(#paper-grid)" opacity="1"/>
    <circle class="intro-hero-circle" cx="500" cy="500" r="230" fill="none" stroke="rgba(26, 26, 46, 0.18)" stroke-width="2" stroke-dasharray="3 15"></circle>
</svg>

<div class="hero-main-content relative z-10" data-parallax-layer="0.025">
    <!-- New Main Title -->
    <div class="hero-title-wrapper">
        <span class="hero-title-glow"></span>
        <h1 class="font-neue text-[clamp(60px,12vw,160px)] font-extrabold leading-none tracking-tighter text-primary mb-4">
            <span class="interactive-title-chars intro-main-title">A</span><span class="interactive-title-chars intro-main-title">r</span><span class="interactive-title-chars intro-main-title">t</span><span class="interactive-title-chars intro-main-title">h</span><span class="interactive-title-chars intro-main-title">a</span><span class="interactive-title-chars intro-main-title">&nbsp;</span><span class="interactive-title-chars intro-main-title">K</span><span class="interactive-title-chars intro-main-title">e</span><span class="interactive-title-chars intro-main-title">a</span><span class="interactive-title-chars intro-main-title">n</span><span class="interactive-title-chars intro-main-title">d</span><span class="interactive-title-chars intro-main-title">r</span><span class="interactive-title-chars intro-main-title">e</span>
        </h1>
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
            <span class="hero-text absolute inset-0 opacity-0" data-index="3">Wle wle wle</span>
            <!-- Hand-drawn underline -->
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

<!-- Signature Element: Floating Desktop Window (Tech Stack) -->
<div class="desktop-window absolute z-20 hidden lg:block" data-parallax-layer="0.045" style="top: 18%; right: max(24px, 5vw); width: 200px; animation: windowFloat 6s ease-in-out infinite alternate;">
    <div class="window-titlebar">
        <span class="window-dot dot-red"></span>
        <span class="window-dot dot-yellow"></span>
        <span class="window-dot dot-green"></span>
        <span class="window-title-text">tech-stack</span>
    </div>
    <div class="p-4 flex flex-col gap-2.5">
        <div class="flex items-center gap-2.5 text-sm" style="font-family: 'JetBrains Mono', monospace;">
            <span class="w-2 h-2 rounded-full bg-[#ff5f56]"></span>
            <span class="text-[#5c5760]">Laravel</span>
        </div>
        <div class="flex items-center gap-2.5 text-sm" style="font-family: 'JetBrains Mono', monospace;">
            <span class="w-2 h-2 rounded-full bg-[#ffbd2e]"></span>
            <span class="text-[#5c5760]">Tailwind</span>
        </div>
        <div class="flex items-center gap-2.5 text-sm" style="font-family: 'JetBrains Mono', monospace;">
            <span class="w-2 h-2 rounded-full bg-[#27c93f]"></span>
            <span class="text-[#5c5760]">JavaScript</span>
        </div>
        <div class="flex items-center gap-2.5 text-sm" style="font-family: 'JetBrains Mono', monospace;">
            <span class="w-2 h-2 rounded-full bg-[#00668a]"></span>
            <span class="text-[#5c5760]">PHP / MySQL</span>
        </div>
        <div class="flex items-center gap-2.5 text-sm" style="font-family: 'JetBrains Mono', monospace;">
            <span class="w-2 h-2 rounded-full bg-[#d97706]"></span>
            <span class="text-[#5c5760]">Figma</span>
        </div>
    </div>
</div>

<div class="absolute bottom-8 left-1/2 -translate-x-1/2 animate-bounce cursor-pointer transition-opacity duration-300 intro-scroll-down" id="scroll-down">
<span class="material-symbols-outlined text-on-surface-variant/40 text-3xl">expand_circle_down</span>
</div>

<!-- Hand-drawn connector line from hero to scroll -->
<svg class="absolute bottom-20 left-1/2 -translate-x-1/2 z-0 pointer-events-none hidden md:block desktop-connector" width="2" height="40" viewBox="0 0 2 40">
    <path d="M1,0 Q1,20 1,40" fill="none" stroke="rgba(26,26,46,0.1)" stroke-width="1.5" stroke-dasharray="3 4"/>
</svg>
</section>



<!-- About Me Section -->
<section class="py-24 md:py-section-gap px-6 md:px-10 lg:px-16 max-w-[1280px] mx-auto" id="about">
    <div class="grid grid-cols-1 md:grid-cols-5 gap-12 md:gap-24 items-center mb-32">
        <!-- Image Column -->
        <div class="md:col-span-2 flex justify-center order-1 md:order-2">
            <div class="relative w-64 h-64 md:w-80 md:h-80 rounded-full overflow-hidden shadow-xl bg-surface-container-high reveal-clip">
                <!-- Ganti 'src' dengan path ke foto Anda -->
                <img src="https://i.pravatar.cc/320?u=artha" alt="Foto Artha" class="w-full h-full object-cover">
                <div class="absolute inset-0 border-4 border-surface-container-lowest rounded-full"></div>
            </div>
        </div>
        <!-- Text Column -->
        <div class="md:col-span-3 order-2 md:order-1">
            <div class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-secondary/10 border border-secondary/20 mb-6">
                <span class="w-2 h-2 rounded-full bg-secondary animate-pulse"></span>
                <span class="font-label-sm text-xs text-secondary uppercase tracking-widest font-bold">Introduction</span>
            </div>
            
            <h2 class="font-neue text-4xl md:text-5xl lg:text-[54px] text-primary mb-8 font-extrabold tracking-tight leading-[1.15]">
                Pelajar SMK dengan <br class="hidden md:block" />
                <span class="text-transparent bg-clip-text bg-gradient-to-r from-secondary to-primary" data-split>Gairah untuk Kode.</span>
            </h2>
            
            <div class="relative pl-6 md:pl-8 mb-8 border-l-4 border-secondary/30">
                <p class="font-body-md text-lg md:text-xl text-on-surface-variant leading-relaxed">
                    Halo! Saya Artha, seorang web developer yang sedang menempuh pendidikan di jurusan <span class="font-semibold text-primary">Rekayasa Perangkat Lunak</span>. Saya menemukan hasrat saya dalam mengubah ide-ide kompleks menjadi aplikasi web yang elegan dan fungsional.
                </p>
            </div>
            
            <p class="font-body-md text-base md:text-lg text-on-surface-variant/80 leading-relaxed mb-8">
                Di luar tugas sekolah, saya aktif mengeksplorasi teknologi baru dan membangun proyek pribadi. Saya percaya bahwa fondasi yang kuat dalam pemecahan masalah dan desain yang bersih adalah kunci untuk pengembangan perangkat lunak yang hebat.
            </p>

            <div class="flex flex-wrap gap-3">
                <span class="px-4 py-2 rounded-full bg-surface-container-lowest border border-outline-variant/30 text-sm font-semibold text-primary shadow-sm hover:-translate-y-1 transition-transform cursor-default">Laravel</span>
                <span class="px-4 py-2 rounded-full bg-surface-container-lowest border border-outline-variant/30 text-sm font-semibold text-primary shadow-sm hover:-translate-y-1 transition-transform cursor-default">Tailwind CSS</span>
                <span class="px-4 py-2 rounded-full bg-surface-container-lowest border border-outline-variant/30 text-sm font-semibold text-primary shadow-sm hover:-translate-y-1 transition-transform cursor-default">JavaScript</span>
                <span class="px-4 py-2 rounded-full bg-surface-container-lowest border border-outline-variant/30 text-sm font-semibold text-primary shadow-sm hover:-translate-y-1 transition-transform cursor-default">UI/UX Design</span>
            </div>
        </div>
    </div>
</section>

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
                    Papan Karya &<br/>Eksplorasi.
                </h2>
                <!-- Hand-drawn underline -->
                <svg class="absolute bottom-[-5px] left-0 w-full opacity-60" viewBox="0 0 200 12" preserveAspectRatio="none">
                    <path d="M0,6 Q100,12 200,6" fill="none" stroke="#d97706" stroke-width="2" stroke-linecap="round" stroke-dasharray="8 4"/>
                </svg>
            </div>
        </div>
        
        <a href="/projects" class="desktop-cta group inline-flex items-center gap-2 border-[rgba(0,0,0,0.1)] bg-white text-primary hover:bg-[#f0ece4] shadow-sm self-start md:self-auto">
            <span class="material-symbols-outlined text-[16px]">folder_open</span>
            <span class="font-bold">Buka Semua Folder</span>
            <span class="material-symbols-outlined text-[14px] group-hover:translate-x-1 transition-transform">arrow_forward</span>
        </a>
    </div>

    <!-- Desktop Bulletin Board (Wooden) -->
    <div class="hidden lg:block relative w-full aspect-[16/9] bg-[#8B5A2B] rounded-3xl border-[20px] border-[#5E3A18] shadow-[inset_0_0_80px_rgba(0,0,0,0.8),0_20px_50px_rgba(0,0,0,0.4)] overflow-hidden z-10 mb-8">
        <!-- Wood Texture (CSS) -->
        <div class="absolute inset-0 opacity-20 pointer-events-none mix-blend-multiply" style="background-image: repeating-linear-gradient(90deg, transparent, transparent 60px, rgba(0,0,0,0.4) 60px, rgba(0,0,0,0.4) 62px), repeating-linear-gradient(0deg, transparent, transparent 120px, rgba(0,0,0,0.2) 120px, rgba(0,0,0,0.2) 122px);"></div>
        <div class="absolute inset-0 opacity-10 pointer-events-none" style="background-image: repeating-radial-gradient(ellipse at center, transparent, transparent 3px, #000 3px, #000 5px); background-size: 30px 60px;"></div>

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

        <!-- Center Project (Center) -->
        @if($centerProject)
        <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[38%] z-20 transition-transform duration-500 hover:scale-[1.05] hover:z-30">
            <button type="button" onclick="openFlipModal(event, {{ $centerProject->id }})" class="group block w-full text-left no-underline outline-none cursor-pointer">
                <div class="desktop-window w-full bg-white relative shadow-[0_15px_40px_rgba(0,0,0,0.6)]">
                    <div class="absolute -top-3 left-1/2 -translate-x-1/2 w-20 h-7 bg-white/40 backdrop-blur-md border border-white/60 shadow-sm rotate-[2deg] z-10" style="clip-path: polygon(0 5%, 100% 0, 95% 95%, 5% 100%);"></div>
                    
                    <div class="window-titlebar bg-[#f7f5f0] border-b border-[#e0dbd0] py-2 px-4">
                        <span class="window-dot dot-red"></span>
                        <span class="window-dot dot-yellow"></span>
                        <span class="window-dot dot-green"></span>
                        <span class="window-title-text text-[#8b8680] text-xs font-mono ml-2 truncate">~/projects/{{ Str::slug($centerProject->title) }}.exe</span>
                    </div>
                    <div class="p-4 pb-5">
                        <div class="relative w-full aspect-video rounded overflow-hidden bg-[#f0ece4] mb-4 border border-[#e0dbd0]">
                            @php $coverImage = $centerProject->cover_image ?? ($centerProject->images[0] ?? null); @endphp
                            @if($coverImage)
                                <img src="{{ asset('storage/' . $coverImage) }}" alt="{{ $centerProject->title }}" class="w-full h-full object-cover">
                            @else
                                <div class="w-full h-full flex items-center justify-center text-[#8b8680]/30 font-mono text-sm">[ NO_PREVIEW ]</div>
                            @endif
                        </div>
                        <h3 class="font-neue text-2xl font-bold text-primary mb-1 tracking-tight truncate group-hover:text-[#d97706] transition-colors">{{ $centerProject->title }}</h3>
                        <p class="font-mono text-[11px] text-[#8b8680] uppercase tracking-wider truncate">{{ $centerProject->category }}</p>
                    </div>
                </div>
            </button>
        </div>
        @endif

        <!-- Corner Projects -->
        @foreach($cornerProjects as $index => $p)
        <div class="absolute {{ $cornerPositions[$index] }} w-[24%] z-10 transition-transform duration-500 hover:scale-[1.08] hover:rotate-0 hover:z-30">
            <button type="button" onclick="openFlipModal(event, {{ $p->id }})" class="group block w-full text-left no-underline outline-none cursor-pointer">
                <div class="desktop-window w-full bg-white relative shadow-[0_10px_30px_rgba(0,0,0,0.5)]">
                    <div class="absolute -top-2.5 left-1/2 -translate-x-1/2 w-14 h-5 bg-white/40 backdrop-blur-md border border-white/60 shadow-sm rotate-[-3deg] z-10" style="clip-path: polygon(0 5%, 100% 0, 95% 95%, 5% 100%);"></div>
                    
                    <div class="window-titlebar bg-[#f7f5f0] border-b border-[#e0dbd0] py-1.5 px-3">
                        <span class="window-dot dot-red w-2 h-2"></span>
                        <span class="window-dot dot-yellow w-2 h-2"></span>
                        <span class="window-dot dot-green w-2 h-2"></span>
                        <span class="window-title-text text-[#8b8680] text-[9px] font-mono ml-1.5 truncate max-w-[120px]">~/{{ Str::limit(Str::slug($p->title), 10) }}.exe</span>
                    </div>
                    <div class="p-3 pb-4">
                        <div class="relative w-full aspect-video rounded-sm overflow-hidden bg-[#f0ece4] mb-3 border border-[#e0dbd0]">
                            @php $coverImage = $p->cover_image ?? ($p->images[0] ?? null); @endphp
                            @if($coverImage)
                                <img src="{{ asset('storage/' . $coverImage) }}" alt="{{ $p->title }}" class="w-full h-full object-cover">
                            @else
                                <div class="w-full h-full flex items-center justify-center text-[#8b8680]/30 font-mono text-[10px]">[ NO_PREVIEW ]</div>
                            @endif
                        </div>
                        <h3 class="font-neue text-lg font-bold text-primary mb-0.5 tracking-tight truncate group-hover:text-[#d97706] transition-colors">{{ $p->title }}</h3>
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

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <!-- Card 1: Development -->
        <div class="group bg-white p-8 md:p-10 rounded-[32px] shadow-[0_8px_30px_rgb(0,0,0,0.04)] border border-outline-variant/20 hover:border-primary/10 transition-all duration-500 hover:shadow-[0_20px_40px_rgb(0,0,0,0.08)]">
            <div class="flex items-center gap-4 mb-8">
                <div class="w-14 h-14 rounded-2xl bg-[#e6f0fa] flex items-center justify-center text-[#00668a] group-hover:scale-110 transition-transform duration-500">
                    <span class="material-symbols-outlined text-3xl">code_blocks</span>
                </div>
                <h3 class="font-neue text-3xl font-black text-primary">Development</h3>
            </div>
            <div class="flex flex-col gap-3">
                @forelse($devSkills as $skill)
                <div class="flex items-center justify-between p-4 rounded-2xl bg-surface-container-lowest hover:bg-[#e6f0fa]/60 transition-colors duration-300 border border-transparent hover:border-[#00668a]/10 cursor-default">
                    @if($skill->color_class)
                    <div class="flex items-center gap-3">
                        <span class="w-2.5 h-2.5 rounded-full {{ $skill->color_class }}"></span>
                        <span class="font-bold text-primary text-lg">{{ $skill->name }}</span>
                    </div>
                    @else
                    <span class="font-bold text-primary text-lg">{{ $skill->name }}</span>
                    @endif
                    <span class="material-symbols-outlined text-on-surface-variant/30">{{ $skill->icon }}</span>
                </div>
                @empty
                <p class="text-on-surface-variant/50 p-4">No development skills listed yet.</p>
                @endforelse
            </div>
        </div>

        <!-- Card 2: Design & Tools -->
        <div class="group bg-white p-8 md:p-10 rounded-[32px] shadow-[0_8px_30px_rgb(0,0,0,0.04)] border border-outline-variant/20 hover:border-primary/10 transition-all duration-500 hover:shadow-[0_20px_40px_rgb(0,0,0,0.08)]">
            <div class="flex items-center gap-4 mb-8">
                <div class="w-14 h-14 rounded-2xl bg-secondary/10 flex items-center justify-center text-secondary group-hover:scale-110 transition-transform duration-500">
                    <span class="material-symbols-outlined text-3xl">design_services</span>
                </div>
                <h3 class="font-neue text-3xl font-black text-primary">Design & Tools</h3>
            </div>
            <div class="flex flex-col gap-3">
                @forelse($toolSkills as $skill)
                <div class="flex items-center justify-between p-4 rounded-2xl bg-surface-container-lowest hover:bg-gray-100 transition-colors duration-300 border border-transparent hover:border-gray-200 cursor-default">
                    @if($skill->color_class)
                    <div class="flex items-center gap-3">
                        <span class="w-2.5 h-2.5 rounded-full {{ $skill->color_class }}"></span>
                        <span class="font-bold text-primary text-lg">{{ $skill->name }}</span>
                    </div>
                    @else
                    <span class="font-bold text-primary text-lg">{{ $skill->name }}</span>
                    @endif
                    <span class="material-symbols-outlined text-on-surface-variant/30">{{ $skill->icon }}</span>
                </div>
                @empty
                <p class="text-on-surface-variant/50 p-4">No design & tool skills listed yet.</p>
                @endforelse
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

{{-- Footer --}}
<footer class="w-full px-6 md:px-10 lg:px-16 py-16 flex flex-col md:flex-row justify-between items-center max-w-[1280px] mx-auto border-t border-outline-variant/30 bg-surface-container-lowest text-on-background">
    <div class="mb-8 md:mb-0 text-center md:text-left">
        <h4 class="font-neue text-2xl font-bold text-on-background mb-1">Artha</h4>
        <p class="font-label-sm text-label-sm text-on-surface-variant">© 2024 Artha. Dibuat dengan semangat belajar.</p>
    </div>
    <div class="flex gap-10">
        <a class="font-label-sm text-label-sm text-on-surface-variant hover:text-secondary transition-colors duration-200" href="#">LinkedIn</a>
        <a class="font-label-sm text-label-sm text-on-surface-variant hover:text-secondary transition-colors duration-200" href="#">GitHub</a>
        <a class="font-label-sm text-label-sm text-on-surface-variant hover:text-secondary transition-colors duration-200" href="#">Dribbble</a>
    </div>
</footer>

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

<script>
(function() {
    /* ── State ── */
    var _rect   = null;
    var _srcEl  = null;
    var _slide  = 0;

    /* ── Nav button styles ── */
    var NAV_BTN = 'position:absolute;top:50%;transform:translateY(-50%);z-index:5;'
               + 'width:40px;height:40px;border-radius:50%;'
               + 'background:rgba(244,236,216,0.9);border:1px solid rgba(90,60,30,0.2);'
               + 'box-shadow:0 2px 8px rgba(40,25,10,0.18);'
               + 'display:flex;align-items:center;justify-content:center;'
               + 'cursor:pointer;transition:background 0.2s ease;';

    /* ── Project data (from JSON tag) ── */
    var projectsData = {};
    try {
        projectsData = JSON.parse(document.getElementById('projects-json').textContent);
    } catch(e) {}

    /* ── OPEN ── */
    window.openFlipModal = function(event, projectId) {
        var srcEl   = event.currentTarget;
        var rect    = srcEl.getBoundingClientRect();
        var project = projectsData[projectId];
        if (!project) return;

        _srcEl = srcEl;
        _rect  = rect;
        _slide = 0;

        var modal    = document.getElementById('pm-modal');
        var backdrop = document.getElementById('pm-backdrop');
        var content  = document.getElementById('pm-content');
        var closeBtn = document.getElementById('pm-close');

        _slide = 0;
        content.style.opacity = '0';
        content.innerHTML = '';

        /* 1. Start at card position (FLIP) */
        modal.style.transition  = 'none';
        modal.style.top         = rect.top    + 'px';
        modal.style.left        = rect.left   + 'px';
        modal.style.width       = rect.width  + 'px';
        modal.style.height      = rect.height + 'px';
        modal.style.borderRadius = '20px';
        modal.style.opacity     = '1';
        modal.style.pointerEvents = 'auto';

        /* 2. Build image array */
        var imgs = [];
        if (project.cover_image) imgs.push(project.cover_image);
        var raw   = project.images;
        var extra = Array.isArray(raw) ? raw
                  : (typeof raw === 'string'
                      ? (function() { try { return JSON.parse(raw); } catch(e) { return []; } })()
                      : []);
        extra.forEach(function(i) { if (i !== project.cover_image) imgs.push(i); });

        /* 3. Build gallery HTML */
        var galleryHtml = '';
        if (imgs.length > 0) {
            var slideHeight = Math.round(window.innerHeight * 0.52);
            var slides = imgs.map(function(img, i) {
                return '<div class="pm-slide" data-i="' + i + '" style="height:' + slideHeight + 'px;flex-shrink:0;width:85%;padding:0 8px;box-sizing:border-box;scroll-snap-align:center;">'
                     + '<div style="width:100%;height:100%;overflow:hidden;border-radius:14px;'
                     + 'box-shadow:0 10px 32px rgba(40,25,10,0.22);'
                     + 'border:1px solid rgba(60,40,20,0.08);'
                     + 'background:rgba(90,74,48,0.05);display:flex;align-items:center;justify-content:center;">'
                     + '<img src="/storage/' + img + '" alt="Gambar ' + (i+1) + '" loading="' + (i===0?'eager':'lazy') + '" style="width:100%;height:100%;object-fit:cover;display:block;" />'
                     + '</div></div>';
            }).join('');

            var navHtml = imgs.length > 1
                ? '<button type="button" id="pm-gal-prev" style="' + NAV_BTN + 'left:24px;" onclick="pmGalNav(-1)" aria-label="Sebelumnya">'
                + '<span class="material-symbols-outlined" style="font-size:24px;pointer-events:none;">arrow_back_ios_new</span></button>'
                + '<button type="button" id="pm-gal-next" style="' + NAV_BTN + 'right:24px;" onclick="pmGalNav(1)" aria-label="Berikutnya">'
                + '<span class="material-symbols-outlined" style="font-size:24px;pointer-events:none;">arrow_forward_ios</span></button>'
                + '<div id="pm-gal-counter" style="position:absolute;bottom:10px;left:50%;transform:translateX(-50%);'
                + 'background:rgba(47,33,21,0.78);color:#f4ecd8;font-size:11px;font-weight:700;'
                + 'padding:3px 14px;border-radius:20px;letter-spacing:0.08em;pointer-events:none;z-index:5;">'
                + '1 / ' + imgs.length + '</div>'
                : '';

            var trackStyle = imgs.length > 1
                ? 'padding:0 7.5%;justify-content:flex-start;'
                : 'padding:0;justify-content:center;';

            galleryHtml = '<div style="position:relative;width:100%;height:' + slideHeight + 'px;border-bottom:1px solid rgba(90,60,30,0.12);overflow:hidden;padding:16px 0;box-sizing:border-box;">'
                        + '<div id="pm-gal-track" style="display:flex;width:100%;height:100%;overflow-x:auto;scroll-snap-type:x mandatory;'
                        + 'scroll-behavior:smooth;-ms-overflow-style:none;scrollbar-width:none;box-sizing:border-box;gap:0;' + trackStyle + '">'
                        + slides
                        + '</div>' + navHtml + '</div>';
        }

        /* 4. Build skills tags */
        var skillsHtml = '';
        if (project.skills && project.skills.length > 0) {
            skillsHtml = '<div style="display:flex;flex-wrap:wrap;gap:6px;margin-top:6px;">' +
                project.skills.map(function(s) {
                    return '<span style="font-size:11px;font-weight:600;padding:4px 10px;background:rgba(90,74,48,0.10);color:#4a3524;border-radius:20px;border:1px solid rgba(90,74,48,0.15)">' + s + '</span>';
                }).join('') + '</div>';
        }

        /* 5. Assemble full content */
        content.innerHTML = galleryHtml +
            '<div style="padding:28px 32px 36px;">' +
            '<p style="font-family:monospace;font-size:11px;color:#8b7355;text-transform:uppercase;letter-spacing:0.1em;margin-bottom:8px;">' + (project.category || '') + '</p>' +
            '<h2 style="font-size:clamp(22px,3vw,32px);font-weight:900;color:#2f2115;margin:0 0 12px;line-height:1.1;letter-spacing:-0.02em;">' + project.title + '</h2>' +
            (project.description ? '<p style="font-size:15px;line-height:1.7;color:#5a4a38;margin:0 0 20px;">' + project.description + '</p>' : '') +
            skillsHtml +
            '<div style="display:flex;gap:10px;flex-wrap:wrap;margin-top:24px;">' +
            (project.demo_link ? '<a href="' + project.demo_link + '" target="_blank" rel="noopener" class="pm-btn-primary">View Live <span class="material-symbols-outlined" style="font-size:17px;">open_in_new</span></a>' : '') +
            (project.github_link ? '<a href="' + project.github_link + '" target="_blank" rel="noopener" class="pm-btn-secondary">Source Code <span class="material-symbols-outlined" style="font-size:17px;">code</span></a>' : '') +
            '</div></div>';

        /* 6. Force reflow then FLIP to center */
        void modal.offsetWidth;

        var fw = Math.min(window.innerWidth  * 0.96, 1200);
        var fh = window.innerHeight * 0.94;
        var ft = (window.innerHeight - fh) / 2;
        var fl = (window.innerWidth  - fw) / 2;

        modal.style.transition   = 'top 0.65s cubic-bezier(0.22,1,0.36,1),left 0.65s cubic-bezier(0.22,1,0.36,1),width 0.65s cubic-bezier(0.22,1,0.36,1),height 0.65s cubic-bezier(0.22,1,0.36,1),border-radius 0.65s cubic-bezier(0.22,1,0.36,1)';
        modal.style.top          = ft + 'px';
        modal.style.left         = fl + 'px';
        modal.style.width        = fw + 'px';
        modal.style.height       = fh + 'px';
        modal.style.borderRadius = '24px';

        backdrop.style.opacity      = '1';
        backdrop.style.pointerEvents = 'auto';
        document.body.style.overflow = 'hidden';

        /* Hide navbar */
        var navbar = document.getElementById('global-navbar');
        if (navbar) {
            navbar.style.setProperty('transition', 'opacity 0.3s ease,transform 0.3s ease', 'important');
            navbar.style.setProperty('opacity', '0', 'important');
            navbar.style.setProperty('transform', 'translateY(-100%)', 'important');
            navbar.style.setProperty('pointer-events', 'none', 'important');
            navbar.style.setProperty('visibility', 'hidden', 'important');
        }

        setTimeout(function() {
            content.style.opacity       = '1';
            closeBtn.style.opacity      = '1';
            closeBtn.style.pointerEvents = 'auto';
            var prev = document.getElementById('pm-gal-prev');
            if (prev) prev.style.opacity = '0.4';
        }, 380);
    };

    /* ── GALLERY NAV ── */
    window.pmGalNav = function(dir) {
        var track = document.getElementById('pm-gal-track');
        if (!track) return;
        var items = track.querySelectorAll('.pm-slide');
        if (!items.length) return;

        _slide = Math.max(0, Math.min(_slide + dir, items.length - 1));
        items[_slide].scrollIntoView({ behavior: 'smooth', block: 'nearest', inline: 'center' });

        var counter = document.getElementById('pm-gal-counter');
        if (counter) counter.textContent = (_slide + 1) + ' / ' + items.length;

        var prev = document.getElementById('pm-gal-prev');
        var next = document.getElementById('pm-gal-next');
        if (prev) prev.style.opacity = _slide === 0 ? '0.4' : '1';
        if (next) next.style.opacity = _slide === items.length - 1 ? '0.4' : '1';
    };

    /* ── CLOSE ── */
    window.pmClose = function() {
        var modal    = document.getElementById('pm-modal');
        var backdrop = document.getElementById('pm-backdrop');
        var content  = document.getElementById('pm-content');
        var closeBtn = document.getElementById('pm-close');

        closeBtn.style.opacity       = '0';
        closeBtn.style.pointerEvents = 'none';
        content.style.opacity        = '0';

        setTimeout(function() {
            if (_srcEl) _rect = _srcEl.getBoundingClientRect();

            if (_rect) {
                modal.style.transition   = 'top 0.5s cubic-bezier(0.22,1,0.36,1),left 0.5s cubic-bezier(0.22,1,0.36,1),width 0.5s cubic-bezier(0.22,1,0.36,1),height 0.5s cubic-bezier(0.22,1,0.36,1),border-radius 0.5s cubic-bezier(0.22,1,0.36,1),opacity 0.5s ease';
                modal.style.top          = _rect.top    + 'px';
                modal.style.left         = _rect.left   + 'px';
                modal.style.width        = _rect.width  + 'px';
                modal.style.height       = _rect.height + 'px';
                modal.style.borderRadius = '16px';
            }

            backdrop.style.opacity      = '0';
            backdrop.style.pointerEvents = 'none';

            /* Restore navbar */
            var navbar = document.getElementById('global-navbar');
            if (navbar) {
                navbar.style.setProperty('opacity', '1', 'important');
                navbar.style.setProperty('transform', 'translateY(0)', 'important');
                navbar.style.setProperty('pointer-events', 'auto', 'important');
                navbar.style.setProperty('visibility', 'visible', 'important');
            }

            setTimeout(function() {
                modal.style.opacity      = '0';
                modal.style.pointerEvents = 'none';
                document.body.style.overflow = '';
                setTimeout(function() { content.innerHTML = ''; }, 100);
            }, 520);
        }, 100);
    };

    window.closeFlipModal = window.pmClose;
    document.addEventListener('keydown', function(e) { if (e.key === 'Escape') window.pmClose(); });
})();
</script>

@push('styles')
<style>
    .pm-btn-primary, .pm-btn-secondary {
        padding: 13px 26px;
        border-radius: 12px;
        font-weight: 700;
        font-size: 14px;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 8px;
        transition: all 0.25s ease;
    }
    .pm-btn-primary {
        background: linear-gradient(155deg, #4a3524, #2f2115);
        color: #f4ecd8;
        box-shadow: 0 8px 20px rgba(30,18,8,0.28);
    }
    .pm-btn-primary:hover {
        background: linear-gradient(155deg, #e8a53d, #d97706);
        color: #2f2115;
        transform: translateY(-1px);
        box-shadow: 0 10px 26px rgba(217,119,6,0.3);
    }
    .pm-btn-secondary {
        background: rgba(90,74,48,0.08);
        color: #2f2115;
        border: 1px solid rgba(90,74,48,0.18);
    }
    .pm-btn-secondary:hover {
        background: rgba(217,119,6,0.10);
        border-color: rgba(217,119,6,0.4);
        color: #a35d1e;
        transform: translateY(-1px);
    }
</style>
@endpush
@endsection
