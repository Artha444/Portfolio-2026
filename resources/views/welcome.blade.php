@extends('layouts.app')

@section('content')
<div data-barba="container" data-barba-namespace="home">
<div class="w-full overflow-x-hidden">
<!-- Hero Section -->
<section class="min-h-screen flex flex-col justify-center items-center relative overflow-hidden text-center px-6 md:px-10 lg:px-16" id="home" data-intro-container>

<!-- SVG Circle and Icons for Animation -->
<svg class="absolute inset-0 w-full h-full z-0 pointer-events-none" id="hero-bg-elements" viewBox="0 0 1000 1000" preserveAspectRatio="xMidYMid slice">
    <defs>
        <linearGradient id="gemini-gradient" x1="0%" y1="0%" x2="100%" y2="100%" gradientUnits="objectBoundingBox">
            <stop offset="0%" stop-color="#FDB813" /> <!-- Kuning -->
            <stop offset="33%" stop-color="#EE4D2E" /> <!-- Merah -->
            <stop offset="66%" stop-color="#00A651" /> <!-- Hijau -->
            <stop offset="100%" stop-color="#4285F4" /> <!-- Biru -->
        </linearGradient>
    </defs>
    <circle class="intro-hero-circle" cx="500" cy="500" r="230" fill="none" stroke="rgba(13, 28, 45, 0.35)" stroke-width="2.5" stroke-dasharray="2 12"></circle>
</svg>

<div class="hero-main-content relative z-10">
    <!-- New Main Title -->
    <div class="hero-title-wrapper">
        <span class="hero-title-glow"></span>
        <h1 class="font-neue text-[clamp(60px,12vw,160px)] font-extrabold leading-none tracking-tighter text-primary mb-4">
            <span class="interactive-title-chars intro-main-title">A</span><span class="interactive-title-chars intro-main-title">r</span><span class="interactive-title-chars intro-main-title">t</span><span class="interactive-title-chars intro-main-title">h</span><span class="interactive-title-chars intro-main-title">a</span><span class="interactive-title-chars intro-main-title">&nbsp;</span><span class="interactive-title-chars intro-main-title">K</span><span class="interactive-title-chars intro-main-title">e</span><span class="interactive-title-chars intro-main-title">a</span><span class="interactive-title-chars intro-main-title">n</span><span class="interactive-title-chars intro-main-title">d</span><span class="interactive-title-chars intro-main-title">r</span><span class="interactive-title-chars intro-main-title">e</span>
        </h1>
    </div>

    <div class="max-w-5xl hero-content-inner">
        <!-- Rotating Sub-title -->
        <div class="relative h-10 font-body-lg text-body-lg text-on-surface-variant hero-text-wrapper mb-8 intro-sub-title">
            <span class="hero-text absolute inset-0 opacity-0" data-index="0">Pelajar SMK</span>
            <span class="hero-text absolute inset-0 opacity-0" data-index="1">RPL Developer</span>
            <span class="hero-text absolute inset-0 opacity-0" data-index="2">Code Creator</span>
        </div>

        <p class="font-body-md text-body-md text-on-surface-variant/70 max-w-2xl mx-auto mb-8 md:mb-10 leading-relaxed intro-paragraph">
                        Seorang pelajar SMK jurusan Rekayasa Perangkat Lunak (RPL) yang antusias dalam belajar web development. Membangun berbagai proyek dari tugas sekolah hingga eksplorasi mandiri.
                    </p>
        <a class="cta-button group inline-flex items-center justify-center gap-2 intro-cta" href="#projects">
                        Explore Projects 
                        <span class="material-symbols-outlined text-[20px] group-hover:translate-x-1 transition-transform">arrow_forward</span>
                        <span class="shine"></span>
        </a>
    </div>
</div>
<div class="absolute bottom-8 left-1/2 -translate-x-1/2 animate-bounce cursor-pointer transition-opacity duration-300 intro-scroll-down" id="scroll-down">
<span class="material-symbols-outlined text-on-surface-variant/40 text-3xl">expand_circle_down</span>
</div>
</section>



<!-- About Me Section -->
<section class="py-24 md:py-section-gap px-6 md:px-10 lg:px-16 max-w-[1280px] mx-auto" id="about">
    <div class="grid grid-cols-1 md:grid-cols-5 gap-12 md:gap-24 items-center mb-32">
        <!-- Image Column -->
        <div class="md:col-span-2 flex justify-center order-1 md:order-2">
            <div class="relative w-64 h-64 md:w-80 md:h-80 rounded-full overflow-hidden shadow-xl bg-surface-container-high">
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
                <span class="text-transparent bg-clip-text bg-gradient-to-r from-secondary to-primary">Gairah untuk Kode.</span>
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
        
        <h2 class="font-neue text-[clamp(50px,8vw,90px)] font-black leading-[1.0] tracking-tighter text-black mb-6">
            Case Studies
        </h2>
        
        <p class="font-body-md text-[15px] md:text-base text-gray-600 max-w-[600px] mx-auto leading-relaxed mb-12">
            Kumpulan proyek pilihan yang berfokus pada penyelesaian masalah nyata melalui kode. Setiap studi kasus mencerminkan proses berpikir, eksplorasi teknologi, dan dedikasi pada pengalaman pengguna yang optimal.
        </p>

        <!-- Stats Grid -->
        <div class="grid grid-cols-2 md:grid-cols-4 gap-4 max-w-3xl mx-auto">
            <div class="bg-white px-4 py-6 rounded-2xl shadow-[0_8px_30px_rgb(0,0,0,0.04)] flex flex-col items-center justify-center">
                <h3 class="font-neue text-3xl font-black text-black mb-1">10+</h3>
                <p class="font-label-sm text-[11px] font-bold text-gray-500 uppercase tracking-widest">Proyek</p>
            </div>
            <div class="bg-white px-4 py-6 rounded-2xl shadow-[0_8px_30px_rgb(0,0,0,0.04)] flex flex-col items-center justify-center">
                <h3 class="font-neue text-3xl font-black text-black mb-1">99%</h3>
                <p class="font-label-sm text-[11px] font-bold text-gray-500 uppercase tracking-widest">Kode Bersih</p>
            </div>
            <div class="bg-white px-4 py-6 rounded-2xl shadow-[0_8px_30px_rgb(0,0,0,0.04)] flex flex-col items-center justify-center">
                <h3 class="font-neue text-3xl font-black text-black mb-1">UI/UX</h3>
                <p class="font-label-sm text-[11px] font-bold text-gray-500 uppercase tracking-widest">Fokus Desain</p>
            </div>
            <div class="bg-white px-4 py-6 rounded-2xl shadow-[0_8px_30px_rgb(0,0,0,0.04)] flex flex-col items-center justify-center">
                <h3 class="font-neue text-3xl font-black text-black mb-1">24/7</h3>
                <p class="font-label-sm text-[11px] font-bold text-gray-500 uppercase tracking-widest">Belajar</p>
            </div>
        </div>
    </div>
</section>

<!-- Featured Projects Section -->
<section class="py-24 md:py-section-gap max-w-[1280px] mx-auto px-6 md:px-10 lg:px-16" id="projects">
    <div class="flex items-end justify-between mb-12 md:mb-16">
        <div>
            <span class="font-label-sm text-label-sm text-secondary uppercase editorial-tracking block mb-3">Selected Work</span>
            <h2 class="font-neue text-[clamp(32px,5vw,56px)] font-extrabold leading-none tracking-tighter text-primary">
                Featured Projects
            </h2>
        </div>
        <a href="/projects" class="hidden md:inline-flex items-center gap-2 text-[14px] font-semibold tracking-[-0.01em] text-[#1a1a2e] group pb-1 border-b border-[rgba(26,26,46,0.12)] transition-all duration-300 hover:border-[#1a1a2e]">
            View All Work
            <span class="material-symbols-outlined text-[18px] transition-transform duration-300 group-hover:translate-x-1">arrow_forward</span>
        </a>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-10 md:gap-14">
        @php
            $display = $projects->take(4);
        @endphp
        @foreach($display as $p)
        <a href="/project/{{ $p->id }}" class="group block no-underline project-card">
            <!-- Image wrapper (Kartu utamanya adalah gambar) -->
            <div class="relative w-full aspect-[4/3] rounded-[24px] overflow-hidden mb-5 bg-surface-container-high shadow-sm transition-all duration-500 ease-[cubic-bezier(0.22,1,0.36,1)] group-hover:shadow-2xl group-hover:-translate-y-2">
                @if(!empty($p->images) && isset($p->images[0]))
                    <img src="{{ asset('storage/' . $p->images[0]) }}" alt="{{ $p->title }}" class="w-full h-full object-cover transition-transform duration-700 ease-[cubic-bezier(0.22,1,0.36,1)] group-hover:scale-105">
                @else
                    <div class="w-full h-full flex items-center justify-center bg-[#f0f0f3]">
                        <span class="material-symbols-outlined text-6xl text-on-surface-variant/20">grid_view</span>
                    </div>
                @endif
            </div>
            <!-- Text area (Teks di luar gambar) -->
            <div class="px-2">
                <h3 class="font-neue text-2xl md:text-3xl font-bold text-primary mb-1 tracking-tight">{{ $p->title }}</h3>
                <p class="font-body-md text-base text-on-surface-variant/80">{{ $p->category }}</p>
            </div>
        </a>
        @endforeach
    </div>

    <div class="mt-10 text-center md:hidden">
        <a href="/projects" class="inline-flex items-center gap-2 text-[14px] font-semibold tracking-[-0.01em] text-[#1a1a2e] group pb-1 border-b border-[rgba(26,26,46,0.12)] transition-all duration-300 hover:border-[#1a1a2e]">
            View All Work
            <span class="material-symbols-outlined text-[18px] transition-transform duration-300 group-hover:translate-x-1">arrow_forward</span>
        </a>
    </div>
</section>
<!-- Capabilities Section -->
<section class="py-32 max-w-[1280px] mx-auto px-6 md:px-10 lg:px-16" id="capabilities">
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
        <!-- Card 1 -->
        <div class="group bg-white p-8 md:p-10 rounded-[32px] shadow-[0_8px_30px_rgb(0,0,0,0.04)] border border-outline-variant/20 hover:border-primary/10 transition-all duration-500 hover:shadow-[0_20px_40px_rgb(0,0,0,0.08)]">
            <div class="flex items-center gap-4 mb-8">
                <div class="w-14 h-14 rounded-2xl bg-[#e6f0fa] flex items-center justify-center text-[#00668a] group-hover:scale-110 transition-transform duration-500">
                    <span class="material-symbols-outlined text-3xl">code_blocks</span>
                </div>
                <h3 class="font-neue text-3xl font-black text-primary">Development</h3>
            </div>
            
            <div class="flex flex-col gap-3">
                <div class="flex items-center justify-between p-4 rounded-2xl bg-surface-container-lowest hover:bg-[#e6f0fa]/60 transition-colors duration-300 border border-transparent hover:border-[#00668a]/10 cursor-default">
                    <span class="font-bold text-primary text-lg">HTML & CSS</span>
                    <span class="material-symbols-outlined text-on-surface-variant/30">html</span>
                </div>
                <div class="flex items-center justify-between p-4 rounded-2xl bg-surface-container-lowest hover:bg-[#e6f0fa]/60 transition-colors duration-300 border border-transparent hover:border-[#00668a]/10 cursor-default">
                    <span class="font-bold text-primary text-lg">PHP & MySQL</span>
                    <span class="material-symbols-outlined text-on-surface-variant/30">database</span>
                </div>
                <div class="flex items-center justify-between p-4 rounded-2xl bg-surface-container-lowest hover:bg-red-50 transition-colors duration-300 border border-transparent hover:border-red-100 cursor-default">
                    <div class="flex items-center gap-3">
                        <span class="w-2.5 h-2.5 rounded-full bg-red-500"></span>
                        <span class="font-bold text-primary text-lg">Laravel Framework</span>
                    </div>
                    <span class="material-symbols-outlined text-red-500/30">terminal</span>
                </div>
                <div class="flex items-center justify-between p-4 rounded-2xl bg-surface-container-lowest hover:bg-yellow-50 transition-colors duration-300 border border-transparent hover:border-yellow-200 cursor-default">
                    <div class="flex items-center gap-3">
                        <span class="w-2.5 h-2.5 rounded-full bg-yellow-400"></span>
                        <span class="font-bold text-primary text-lg">JavaScript Dasar</span>
                    </div>
                    <span class="material-symbols-outlined text-yellow-500/30">javascript</span>
                </div>
            </div>
        </div>

        <!-- Card 2 -->
        <div class="group bg-white p-8 md:p-10 rounded-[32px] shadow-[0_8px_30px_rgb(0,0,0,0.04)] border border-outline-variant/20 hover:border-primary/10 transition-all duration-500 hover:shadow-[0_20px_40px_rgb(0,0,0,0.08)]">
            <div class="flex items-center gap-4 mb-8">
                <div class="w-14 h-14 rounded-2xl bg-secondary/10 flex items-center justify-center text-secondary group-hover:scale-110 transition-transform duration-500">
                    <span class="material-symbols-outlined text-3xl">design_services</span>
                </div>
                <h3 class="font-neue text-3xl font-black text-primary">Design & Tools</h3>
            </div>
            
            <div class="flex flex-col gap-3">
                <div class="flex items-center justify-between p-4 rounded-2xl bg-surface-container-lowest hover:bg-gray-100 transition-colors duration-300 border border-transparent hover:border-gray-200 cursor-default">
                    <span class="font-bold text-primary text-lg">Git & GitHub</span>
                    <span class="material-symbols-outlined text-on-surface-variant/30">fork_right</span>
                </div>
                <div class="flex items-center justify-between p-4 rounded-2xl bg-surface-container-lowest hover:bg-blue-50 transition-colors duration-300 border border-transparent hover:border-blue-200 cursor-default">
                    <div class="flex items-center gap-3">
                        <span class="w-2.5 h-2.5 rounded-full bg-blue-500"></span>
                        <span class="font-bold text-primary text-lg">Visual Studio Code</span>
                    </div>
                    <span class="material-symbols-outlined text-blue-500/30">code</span>
                </div>
                <div class="flex items-center justify-between p-4 rounded-2xl bg-surface-container-lowest hover:bg-orange-50 transition-colors duration-300 border border-transparent hover:border-orange-200 cursor-default">
                    <span class="font-bold text-primary text-lg">XAMPP</span>
                    <span class="material-symbols-outlined text-orange-500/30">dns</span>
                </div>
                <div class="flex items-center justify-between p-4 rounded-2xl bg-surface-container-lowest hover:bg-purple-50 transition-colors duration-300 border border-transparent hover:border-purple-200 cursor-default">
                    <div class="flex items-center gap-3">
                        <span class="w-2.5 h-2.5 rounded-full bg-purple-500"></span>
                        <span class="font-bold text-primary text-lg">Figma Dasar</span>
                    </div>
                    <span class="material-symbols-outlined text-purple-500/30">draw</span>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Contact Section -->
<section class="mb-section-gap" id="contact">
<div class="max-w-4xl">
<h2 class="font-display-xl text-display-xl-mobile md:text-display-xl text-primary mb-20 leading-tight">
                    Mari terhubung dan berkolaborasi.
                </h2>
<form class="space-y-12">
<div class="grid grid-cols-1 md:grid-cols-2 gap-12">
<div class="relative group">
<label class="block font-label-sm text-label-sm text-on-surface-variant uppercase editorial-tracking mb-4">Name</label>
<input class="w-full bg-transparent border-0 border-b border-outline-variant py-4 px-0 font-body-md text-body-md input-border-transition focus:ring-0 placeholder:text-outline/40" placeholder="Your Full Name" type="text"/>
</div>
<div class="relative group">
<label class="block font-label-sm text-label-sm text-on-surface-variant uppercase editorial-tracking mb-4">Email</label>
<input class="w-full bg-transparent border-0 border-b border-outline-variant py-4 px-0 font-body-md text-body-md input-border-transition focus:ring-0 placeholder:text-outline/40" placeholder="hello@example.com" type="email"/>
</div>
</div>
<div class="relative group">
<label class="block font-label-sm text-label-sm text-on-surface-variant uppercase editorial-tracking mb-4">Message</label>
<textarea class="w-full bg-transparent border-0 border-b border-outline-variant py-4 px-0 font-body-md text-body-md input-border-transition focus:ring-0 resize-none placeholder:text-outline/40" placeholder="Tell me about your project..." rows="4"></textarea>
</div>
<button class="bg-primary text-on-primary px-12 py-5 font-label-sm text-label-sm uppercase editorial-tracking flex items-center gap-3 transition-all hover:bg-secondary-container hover:text-on-secondary-container">
                        Send Inquiry
                        <span class="material-symbols-outlined">send</span>
</button>
</form>
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
@endsection
