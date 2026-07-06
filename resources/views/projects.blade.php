@extends('layouts.app')

@section('content')


<div data-barba="container" data-barba-namespace="projects">
    
    <div class="fixed inset-0 z-[-2] pointer-events-none overflow-hidden">
        <div class="absolute w-[60vmax] h-[60vmax] bg-[#ffaa40]/20 rounded-full blur-[100px] mix-blend-multiply animate-blob top-[-10%] left-[-10%]"></div>
        <div class="absolute w-[60vmax] h-[60vmax] bg-[#9c40ff]/20 rounded-full blur-[100px] mix-blend-multiply animate-blob top-[-10%] right-[-10%]" style="animation-delay: 2s"></div>
        <div class="absolute w-[60vmax] h-[60vmax] bg-[#40c9ff]/20 rounded-full blur-[100px] mix-blend-multiply animate-blob bottom-[-20%] left-[20%]" style="animation-delay: 4s"></div>
    </div>

    <a href="/" class="fixed top-6 left-6 z-50 flex items-center justify-center w-12 h-12 bg-white/60 backdrop-blur-md rounded-full border border-black/10 shadow-lg hover:scale-110 hover:shadow-xl transition-all duration-300 group">
        <span class="material-symbols-outlined text-[#1a1a2e] group-hover:-translate-x-1 transition-transform">arrow_back</span>
    </a>

    <!-- Hero -->
    <section class="projects-hero" id="projects-hero">
        <div class="hero-decoration hero-decoration-1" data-speed="0.3"></div>
        <div class="hero-decoration hero-decoration-2" data-speed="0.5"></div>
        <div class="hero-decoration hero-decoration-3" data-speed="0.2"></div>
        <div class="hero-decoration hero-decoration-4" data-speed="0.6"></div>
        <div class="hero-decoration hero-decoration-5" data-speed="0.4"></div>
        <div class="hero-content">
            <span class="hero-label">Portfolio</span>
            <h1 class="hero-title">Projects</h1>
            <p class="hero-subtitle">Kumpulan proyek pilihan dari tugas sekolah hingga eksplorasi mandiri.</p>
        </div>
        <div class="scroll-indicator"><span>Scroll</span><div class="line"></div></div>
    </section>

    <!-- Grid Section -->
    <section class="projects-section" id="projects-section">
        <div class="container-narrow">
            <div class="section-header">
                <h2>All Projects</h2>
                <p>Setiap proyek mencerminkan proses belajar dan ketertarikan saya terhadap pengembangan web.</p>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-5 md:gap-6 curated-grid">
                @foreach($projects as $p)
                <article class="curated-card group" data-tilt data-tilt-max="5" data-tilt-speed="400" data-tilt-glare="true" data-tilt-max-glare="0.2">
                    <div class="relative aspect-[4/3] overflow-hidden bg-[#f0f0f3]">
                        @if(!empty($p->images) && isset($p->images[0]))
                            <img src="{{ asset('storage/' . $p->images[0]) }}" alt="{{ $p->title }}" class="curated-card-img w-full h-full object-cover">
                        @else
                            <div class="w-full h-full flex items-center justify-center">
                                <span class="material-symbols-outlined text-6xl" style="color:rgba(26,26,46,0.06);font-variation-settings:'FILL'0,'wght'200,'GRAD'0,'opsz'48">grid_view</span>
                            </div>
                        @endif
                    </div>
                    <div class="p-6 md:p-7">
                        <div class="flex items-center justify-between mb-3">
                            <span class="text-[13px] font-medium tracking-[0.08em] uppercase" style="color:rgba(26,26,46,0.3);">{{ $p->created_at->format('Y') }}</span>
                            <span class="text-[11px] font-medium tracking-[0.1em] uppercase px-3 py-1 rounded-full" style="background:rgba(26,26,46,0.04);color:rgba(26,26,46,0.4);">{{ $p->category }}</span>
                        </div>
                        <h3 class="font-neue text-[22px] md:text-[24px] font-bold leading-tight tracking-tighter text-[#1a1a2e] mb-3">{{ $p->title }}</h3>
                        <p class="text-[14px] leading-relaxed" style="color:rgba(26,26,46,0.5); line-clamp: 2; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden; display: -webkit-box; margin-bottom: 20px;">{{ $p->description }}</p>
                        <a href="/project/{{ $p->id }}" class="view-project-btn relative inline-flex items-center gap-2 text-[13px] font-semibold tracking-[-0.01em] text-[#1a1a2e]" style="border-bottom: 1px solid rgba(26,26,46,0.1); padding-bottom: 2px;">
                            View Project
                            <span class="material-symbols-outlined arrow-icon text-[16px]">arrow_forward</span>
                        </a>
                    </div>
                </article>
                @endforeach
            </div>
        </div>
    </section>

    <footer class="container-narrow py-16 md:py-20 flex flex-col md:flex-row justify-between items-center border-t" style="border-color:rgba(26,26,46,0.06);">
        <div class="mb-8 md:mb-0 text-center md:text-left">
            <h4 class="font-headline-md text-headline-md mb-2" style="color:#1a1a2e;">Artha</h4>
            <p class="font-label-sm text-label-sm" style="color:rgba(26,26,46,0.4);">&copy; 2024 Artha. Dibuat dengan semangat belajar.</p>
        </div>
        <div class="flex gap-12">
            <a class="font-label-sm text-label-sm" style="color:rgba(26,26,46,0.4);transition:color 0.3s;" href="#" onmouseover="this.style.color='#00668a'" onmouseout="this.style.color=''">LinkedIn</a>
            <a class="font-label-sm text-label-sm" style="color:rgba(26,26,46,0.4);transition:color 0.3s;" href="#" onmouseover="this.style.color='#00668a'" onmouseout="this.style.color=''">GitHub</a>
            <a class="font-label-sm text-label-sm" style="color:rgba(26,26,46,0.4);transition:color 0.3s;" href="#" onmouseover="this.style.color='#00668a'" onmouseout="this.style.color=''">Dribbble</a>
        </div>
    </footer>
</div>
@endsection
