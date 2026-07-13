@extends('layouts.app')

@section('content')

<div data-barba="container" data-barba-namespace="projects" class="bg-[#f7f7f9]">
    <a href="/" class="fixed top-6 left-6 z-50 flex items-center justify-center w-11 h-11 bg-white/70 backdrop-blur-md rounded-full border border-black/8 shadow-md hover:scale-110 hover:shadow-xl transition-all duration-300 group" title="Back to Home">
        <span class="material-symbols-outlined text-[#1a1a2e] group-hover:-translate-x-1 transition-transform text-xl">arrow_back</span>
    </a>

    <div class="relative z-10">
        <!-- Hero -->
        <section class="projects-hero relative overflow-hidden" id="projects-hero">
            <div class="absolute w-[60vmax] h-[60vmax] bg-[#ffaa40]/20 rounded-full blur-[100px] mix-blend-multiply animate-blob top-[-15vh] left-[-10vw] -z-10"></div>
            <div class="absolute w-[60vmax] h-[60vmax] bg-[#9c40ff]/20 rounded-full blur-[100px] mix-blend-multiply animate-blob top-[10vh] right-[-10vw] -z-10" style="animation-delay: 2s"></div>
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
            <div class="scroll-indicator"><span>Scroll</span>
                <div class="line"></div>
            </div>
        </section>

        <!-- Grid Section -->
        <section class="projects-section relative overflow-hidden" id="projects-section">
            <div class="absolute w-[70vmax] h-[70vmax] bg-[#40c9ff]/20 rounded-full blur-[100px] mix-blend-multiply animate-blob top-[20vh] left-[20vw] -z-10" style="animation-delay: 4s"></div>
            <div class="absolute w-[50vmax] h-[50vmax] bg-[#ffaa40]/20 rounded-full blur-[120px] mix-blend-multiply animate-blob bottom-[-20vh] right-[-15vw] -z-10" style="animation-delay: 1s"></div>
            <div class="section-grid-overlay relative" data-parallax-layer="0.025"></div>
            <div class="container-narrow">
                <div class="section-header" data-parallax-layer="0.02">
                    <h2>All Projects</h2>
                    <p>Setiap proyek mencerminkan proses belajar dan ketertarikan saya terhadap pengembangan web.</p>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-5 md:gap-6 curated-grid">
                    @foreach($projects as $p)
                    <article class="curated-card group" data-tilt data-tilt-max="5" data-tilt-speed="400" data-tilt-glare="true" data-tilt-max-glare="0.2">
                        <div class="relative aspect-[4/3] overflow-hidden bg-[#f0ece4]">
                            @php $coverImage = $p->cover_image ?? ($p->images[0] ?? null); @endphp
                            @if($coverImage)
                            <img src="{{ asset('storage/' . $coverImage) }}" alt="{{ $p->title }}" class="curated-card-img w-full h-full object-cover" loading="lazy"
                                 onerror="this.style.display='none'; this.parentElement.querySelector('.card-img-fallback')?.classList.remove('hidden');">
                            <div class="card-img-fallback hidden w-full h-full items-center justify-center">
                                <span class="material-symbols-outlined text-6xl" style="color:rgba(26,26,46,0.06);font-variation-settings:'FILL'0,'wght'200,'GRAD'0,'opsz'48">grid_view</span>
                            </div>
                            @endif
                        </div>
                        <div class="p-6 md:p-7">
                            <div class="flex items-center justify-between mb-3">
                                <span class="text-[12px] font-semibold tracking-[0.1em] uppercase" style="color:rgba(26,26,46,0.3);">{{ $p->created_at->format('Y') }}</span>
                                <span class="text-[11px] font-medium tracking-[0.1em] uppercase px-3 py-1 rounded-full" style="background:rgba(26,26,46,0.04);color:rgba(26,26,46,0.4);">{{ $p->category }}</span>
                            </div>
                            <h3 class="font-neue text-[22px] md:text-[24px] font-bold leading-tight tracking-tighter text-[#1a1a2e] mb-3">{{ $p->title }}</h3>
                            <p class="text-[14px] leading-relaxed" style="color:rgba(26,26,46,0.5); line-clamp: 2; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden; display: -webkit-box; margin-bottom: 20px;">{{ $p->description }}</p>
                            @if($p->skills->count())
                            <div style="display: flex; flex-wrap: wrap; gap: 6px; margin-bottom: 16px;">
                                @foreach($p->skills->take(3) as $skill)
                                <span style="font-size: 11px; font-weight: 500; padding: 4px 10px; background: rgba(0, 102, 138, 0.08); color: #00668a; border-radius: 12px;">{{ $skill->name }}</span>
                                @endforeach
                                @if($p->skills->count() > 3)
                                <span style="font-size: 11px; font-weight: 500; padding: 4px 10px; background: rgba(26,26,46,0.04); color: rgba(26,26,46,0.4); border-radius: 12px;">+{{ $p->skills->count() - 3 }}</span>
                                @endif
                            </div>
                            @endif
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

        <!-- Footer -->
        <footer class="container-narrow py-16 md:py-20 border-t" style="border-color:rgba(26,26,46,0.06);">
            <div class="flex flex-col md:flex-row justify-between items-center gap-8" data-parallax-layer="0.01">
                <div class="text-center md:text-left">
                    <h4 class="font-neue text-xl font-bold tracking-tight text-[#1a1a2e]">Artha</h4>
                    <p class="text-sm mt-1" style="color:rgba(26,26,46,0.4);">&copy; 2024 Artha. Dibuat dengan semangat belajar.</p>
                </div>
                <div class="flex items-center gap-8">
                    <a href="#" class="text-sm font-medium" style="color:rgba(26,26,46,0.4);transition:color 0.3s;" onmouseover="this.style.color='#00668a'" onmouseout="this.style.color=''">LinkedIn</a>
                    <a href="#" class="text-sm font-medium" style="color:rgba(26,26,46,0.4);transition:color 0.3s;" onmouseover="this.style.color='#00668a'" onmouseout="this.style.color=''">GitHub</a>
                    <a href="#" class="text-sm font-medium" style="color:rgba(26,26,46,0.4);transition:color 0.3s;" onmouseover="this.style.color='#00668a'" onmouseout="this.style.color=''">Dribbble</a>
                </div>
            </div>
        </footer>
    </div>
</div>
@endsection
