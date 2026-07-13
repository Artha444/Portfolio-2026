@extends('layouts.app')

@section('content')
<div data-barba="container" data-barba-namespace="project-detail">

    <style>
        /* ── Global Detail Styles ── */
        .project-detail-wrapper {
            background: transparent;
        }

        /* ── Project Detail Hero ── */
        .detail-hero {
            min-height: 65vh;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            overflow: hidden;
            background: transparent;
            backdrop-filter: blur(20px);
            padding: 140px 24px 80px;
        }
        .detail-hero::before {
            content: '';
            position: absolute;
            top: 0; left: 0; right: 0; bottom: 0;
            background: radial-gradient(circle at top right, rgba(0,102,138,0.05), transparent 40%),
                        radial-gradient(circle at bottom left, rgba(156,64,255,0.05), transparent 40%);
            z-index: 0;
        }
        .detail-hero-content {
            position: relative;
            z-index: 2;
            text-align: center;
            max-width: 900px;
            animation: fadeUp 1s ease-out forwards;
        }
        @keyframes fadeUp {
            from { opacity: 0; transform: translateY(30px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .detail-hero-content .back-link {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            font-size: 14px;
            font-weight: 600;
            letter-spacing: 0.05em;
            text-transform: uppercase;
            color: rgba(226,232,240,0.4);
            text-decoration: none;
            margin-bottom: 40px;
            transition: all 0.3s;
            padding: 8px 16px;
            border-radius: 999px;
            background: rgba(30,41,59,0.5);
            border: 1px solid rgba(0,0,0,0.05);
        }
        .detail-hero-content .back-link:hover {
            color: #00668a;
            background: rgba(30,41,59,0.3);
            box-shadow: 0 4px 12px rgba(0,0,0,0.05);
            transform: translateX(-4px);
        }
        .detail-hero-content .year {
            display: inline-block;
            font-size: 13px;
            font-weight: 700;
            letter-spacing: 0.15em;
            text-transform: uppercase;
            color: #00668a;
            margin-bottom: 20px;
            padding: 8px 20px;
            border-radius: 999px;
            background: linear-gradient(135deg, rgba(0,102,138,0.1), rgba(0,102,138,0.05));
            border: 1px solid rgba(0,102,138,0.1);
            box-shadow: 0 2px 10px rgba(0,102,138,0.05);
        }
        .detail-hero-content h1 {
            font-family: 'Hanken Grotesk', sans-serif;
            font-size: clamp(40px, 6vw, 72px);
            font-weight: 800;
            line-height: 1.1;
            letter-spacing: -0.04em;
            color: #e2e8f0;
            margin-bottom: 24px;
            background: linear-gradient(to right, #e2e8f0, #00668a);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }
        .detail-hero-content .category {
            font-size: 18px;
            line-height: 1.6;
            color: rgba(226,232,240,0.6);
            font-weight: 500;
        }

        /* ── Gallery ── */
        .project-gallery-section {
            padding: 0 0 100px;
            max-width: 100%;
            margin: -40px auto 0; /* Pull up to overlap hero slightly */
            position: relative;
            z-index: 10;
            background: transparent;
            backdrop-filter: blur(10px);
            border-top: 1px solid rgba(255,255,255,0.5);
            border-bottom: 1px solid rgba(255,255,255,0.5);
        }
        .project-gallery {
            display: flex;
            gap: 0;
            overflow-x: auto;
            scroll-snap-type: x mandatory;
            -webkit-overflow-scrolling: touch;
            scrollbar-width: none;
            padding: 0;
        }
        .project-gallery::-webkit-scrollbar {
            display: none;
        }
        .gallery-item {
            scroll-snap-align: center;
            flex-shrink: 0;
            width: 100vw;
            max-width: none;
            border-radius: 0;
            overflow: hidden;
            background: transparent;
            transition: none;
            position: relative;
            border: none;
            box-shadow: none;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 70vh; /* Make sure it has a good height */
        }
        .gallery-item:hover {
            transform: none;
            box-shadow: none;
        }
        .gallery-item img {
            width: 100%;
            height: 100%;
            object-fit: contain;
            display: block;
            transition: transform 0.7s ease;
            filter: drop-shadow(0 20px 40px rgba(0,0,0,0.1));
        }
        .gallery-item:hover img {
            transform: scale(1.02);
        }
        .gallery-item .img-fallback {
            display: none;
            width: 100%;
            height: 100%;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            gap: 12px;
            background: #f4f4f5;
            color: rgba(226,232,240,0.3);
        }
        .gallery-item .img-fallback span {
            font-size: 16px;
            font-weight: 500;
        }
        .gallery-nav {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 20px;
            margin-top: 10px;
        }
        .gallery-nav-btn {
            width: 48px;
            height: 48px;
            border-radius: 50%;
            border: 1px solid rgba(0,0,0,0.05);
            background: rgba(30,41,59,0.5);
            backdrop-filter: blur(10px);
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            color: #e2e8f0;
            transition: all 0.3s cubic-bezier(0.25, 1, 0.5, 1);
            font-size: 24px;
            user-select: none;
            box-shadow: 0 4px 12px rgba(0,0,0,0.05);
        }
        .gallery-nav-btn:hover {
            background: #00668a;
            color: #fff;
            border-color: #00668a;
            transform: translateY(-2px);
            box-shadow: 0 8px 24px rgba(0,102,138,0.3);
        }
        .gallery-nav-btn:active {
            transform: scale(0.95);
        }
        .gallery-counter {
            text-align: center;
            font-size: 15px;
            color: rgba(226,232,240,0.5);
            font-weight: 600;
            letter-spacing: 0.1em;
            min-width: 60px;
            background: rgba(30,41,59,0.5);
            padding: 8px 16px;
            border-radius: 999px;
            box-shadow: inset 0 2px 4px rgba(0,0,0,0.02);
        }

        /* ── Content ── */
        .detail-content {
            max-width: 800px;
            margin: 0 auto;
            padding: 0 24px 100px;
        }
        .detail-content .tagline {
            font-family: 'Hanken Grotesk', sans-serif;
            font-size: clamp(24px, 3vw, 32px);
            font-weight: 600;
            line-height: 1.4;
            letter-spacing: -0.02em;
            color: #e2e8f0;
            margin-bottom: 40px;
            position: relative;
            padding-left: 24px;
        }
        .detail-content .tagline::before {
            content: '';
            position: absolute;
            left: 0;
            top: 10%;
            bottom: 10%;
            width: 4px;
            background: linear-gradient(to bottom, #00668a, #40c9ff);
            border-radius: 4px;
        }
        .detail-content .description {
            font-size: 18px;
            line-height: 1.9;
            color: rgba(226,232,240,0.7);
            margin-bottom: 64px;
        }

        /* ── Divider ── */
        .detail-divider {
            width: 100%;
            height: 1px;
            background: linear-gradient(to right, transparent, rgba(226,232,240,0.1), transparent);
            margin-bottom: 56px;
        }

        /* ── Detail Grid ── */
        .detail-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 56px;
            margin-bottom: 64px;
            background: rgba(30,41,59,0.3);
            padding: 40px;
            border-radius: 24px;
            box-shadow: 0 10px 40px rgba(0,0,0,0.03);
            border: 1px solid rgba(0,0,0,0.02);
        }
        .detail-grid .block-label {
            font-size: 12px;
            font-weight: 700;
            letter-spacing: 0.15em;
            text-transform: uppercase;
            color: #00668a;
            display: block;
            margin-bottom: 16px;
        }
        .detail-grid .tech-pills {
            display: flex;
            flex-wrap: wrap;
            gap: 8px;
        }
        .detail-grid .tech-pills span {
            padding: 8px 16px;
            background: rgba(226,232,240,0.03);
            border: 1px solid rgba(226,232,240,0.05);
            border-radius: 999px;
            font-size: 14px;
            font-weight: 500;
            color: #e2e8f0;
            transition: all 0.3s;
        }
        .detail-grid .tech-pills span:hover {
            background: #e2e8f0;
            color: #fff;
            transform: translateY(-2px);
        }
        .detail-grid .meta-value {
            font-size: 18px;
            color: #e2e8f0;
            font-weight: 600;
        }

        /* ── Skills Section ── */
        .skills-block {
            margin-bottom: 56px;
        }
        .skills-block .block-label {
            font-size: 12px;
            font-weight: 700;
            letter-spacing: 0.15em;
            text-transform: uppercase;
            color: #00668a;
            display: block;
            margin-bottom: 20px;
        }
        .skills-block .skill-pills {
            display: flex;
            flex-wrap: wrap;
            gap: 12px;
        }
        .skills-block .skill-pills span {
            padding: 10px 20px;
            background: linear-gradient(135deg, rgba(0,102,138,0.08), rgba(0,102,138,0.02));
            border: 1px solid rgba(0,102,138,0.1);
            color: #00668a;
            border-radius: 999px;
            font-size: 15px;
            font-weight: 600;
            transition: all 0.3s;
            box-shadow: 0 4px 12px rgba(0,102,138,0.05);
        }
        .skills-block .skill-pills span:hover {
            background: #00668a;
            color: #fff;
            transform: translateY(-3px);
            box-shadow: 0 8px 20px rgba(0,102,138,0.2);
        }

        /* ── Project Link ── */
        .project-link-block {
            display: inline-flex;
            align-items: center;
            gap: 12px;
            padding: 16px 36px;
            background: linear-gradient(135deg, #e2e8f0, #2d2d44);
            color: #fff;
            border-radius: 16px;
            text-decoration: none;
            font-size: 16px;
            font-weight: 600;
            transition: all 0.4s cubic-bezier(0.25, 1, 0.5, 1);
            box-shadow: 0 10px 30px rgba(226,232,240,0.2);
            position: relative;
            overflow: hidden;
        }
        .project-link-block::after {
            content: '';
            position: absolute;
            top: 0; left: -100%; width: 100%; height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
            transition: all 0.6s ease;
        }
        .project-link-block:hover {
            transform: translateY(-4px);
            box-shadow: 0 15px 40px rgba(0,102,138,0.3);
            background: linear-gradient(135deg, #00668a, #0088b8);
        }
        .project-link-block:hover::after {
            left: 100%;
        }

        /* ── Related Projects ── */
        .related-section {
            background: rgba(30,41,59,0.3);
            padding: 100px 24px 140px;
            border-top: 1px solid rgba(226,232,240,0.05);
        }
        .related-section .related-inner {
            max-width: 1400px;
            margin: 0 auto;
        }
        .related-section .section-label {
            font-size: 12px;
            font-weight: 700;
            letter-spacing: 0.15em;
            text-transform: uppercase;
            color: #00668a;
            margin-bottom: 16px;
            display: block;
            text-align: center;
        }
        .related-section h2 {
            font-family: 'Hanken Grotesk', sans-serif;
            font-size: clamp(28px, 4vw, 42px);
            font-weight: 800;
            letter-spacing: -0.03em;
            color: #e2e8f0;
            margin-bottom: 60px;
            text-align: center;
        }
        .related-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 32px;
        }
        .related-card {
            text-decoration: none;
            display: block;
            border-radius: 24px;
            overflow: hidden;
            background: rgba(30,41,59,0.3);
            border: 1px solid rgba(0,0,0,0.04);
            box-shadow: 0 10px 30px rgba(0,0,0,0.02);
            transition: all 0.4s cubic-bezier(0.25, 1, 0.5, 1);
        }
        .related-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 25px 60px rgba(0,102,138,0.12);
            border-color: rgba(0,102,138,0.1);
        }
        .related-card .thumb {
            aspect-ratio: 16/10;
            background: #f4f4f5;
            overflow: hidden;
            position: relative;
        }
        .related-card .thumb::after {
            content: '';
            position: absolute;
            inset: 0;
            background: rgba(0,102,138,0);
            transition: background 0.4s ease;
        }
        .related-card:hover .thumb::after {
            background: rgba(0,102,138,0.1);
        }
        .related-card .thumb img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.7s cubic-bezier(0.25, 1, 0.5, 1);
        }
        .related-card:hover .thumb img {
            transform: scale(1.08);
        }
        .related-card .info {
            padding: 24px 28px;
            background: linear-gradient(180deg, rgba(255,255,255,0) 0%, #fff 100%);
        }
        .related-card .info .r-year {
            display: inline-block;
            font-size: 11px;
            font-weight: 600;
            color: #00668a;
            background: rgba(0,102,138,0.08);
            padding: 4px 10px;
            border-radius: 999px;
            letter-spacing: 0.1em;
            text-transform: uppercase;
            margin-bottom: 8px;
        }
        .related-card .info .r-title {
            font-family: 'Hanken Grotesk', sans-serif;
            font-size: 20px;
            font-weight: 700;
            letter-spacing: -0.02em;
            color: #e2e8f0;
            margin-top: 4px;
            transition: color 0.3s;
        }
        .related-card:hover .info .r-title {
            color: #00668a;
        }
        .related-card .info .r-category {
            font-size: 14px;
            color: rgba(226,232,240,0.5);
            margin-top: 6px;
            font-weight: 500;
        }
        .placeholder-icon {
            color: rgba(226,232,240,0.1);
            font-size: 56px;
        }

        /* ── Responsive ── */
        @media (max-width: 767px) {
            .detail-hero {
                min-height: 55vh;
                padding: 120px 20px 60px;
            }
            .detail-content {
                padding: 0 20px 60px;
            }
            .detail-grid {
                grid-template-columns: 1fr;
                gap: 32px;
                padding: 24px;
            }
            .related-grid {
                grid-template-columns: 1fr;
                gap: 24px;
            }
            .related-section {
                padding: 80px 20px 100px;
            }
            .project-gallery-section {
                padding: 0 0 60px;
                margin-top: -20px;
            }
            .gallery-item {
                width: 100vw;
                height: 50vh;
            }
            .gallery-nav {
                display: none;
            }
        }
        @media (min-width: 768px) and (max-width: 1023px) {
            .related-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }
    </style>

    {{-- Hero --}}
    <section class="detail-hero relative" data-parallax-layer="0.015">
        <div class="absolute w-[60vmax] h-[60vmax] bg-[#ffaa40]/20 rounded-full blur-[100px] mix-blend-multiply animate-blob top-[-15vh] left-[-10vw] -z-10"></div>
        <div class="absolute w-[60vmax] h-[60vmax] bg-[#9c40ff]/20 rounded-full blur-[100px] mix-blend-multiply animate-blob top-[10vh] right-[-10vw] -z-10" style="animation-delay: 2s"></div>
        <div class="absolute w-[40vmax] h-[40vmax] bg-[#40c9ff]/20 rounded-full blur-[120px] mix-blend-multiply animate-blob bottom-[-20vh] left-[20vw] -z-10" style="animation-delay: 4s"></div>
        <div class="hero-decoration hero-decoration-1" data-speed="0.3"></div>
        <div class="hero-decoration hero-decoration-2" data-speed="0.5"></div>
        <div class="hero-decoration hero-decoration-4" data-speed="0.6"></div>
        <div class="hero-decoration hero-decoration-5" data-speed="0.4"></div>
        <div class="detail-hero-content">
            <a href="/" class="back-link">
                <span class="material-symbols-outlined" style="font-size:16px">arrow_back</span>
                Back
            </a>
            <div class="year">{{ $project->created_at->format('Y') }}</div>
            <h1>{{ $project->title }}</h1>
            <div class="category">{{ $project->category }}</div>
        </div>
    </section>

    {{-- Horizontal Gallery --}}
    @php
    $images = !empty($project->images) ? $project->images : [];
    @endphp
    @if(count($images))
    <section class="project-gallery-section relative z-[1]">
        <div class="project-gallery" id="project-gallery">
            @foreach($images as $i => $img)
            <div class="gallery-item" data-index="{{ $i }}">
                <img src="{{ asset('storage/' . $img) }}"
                     alt="{{ $project->title }} screenshot"
                     onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                <div class="img-fallback">
                    <span class="material-symbols-outlined" style="font-size:40px">broken_image</span>
                    <span>Gagal memuat gambar</span>
                </div>
            </div>
            @endforeach
        </div>
        @if(count($images) > 1)
        <div class="gallery-nav">
            <button class="gallery-nav-btn" id="gallery-prev" aria-label="Previous">
                <span class="material-symbols-outlined" style="font-size:20px">chevron_left</span>
            </button>
            <div class="gallery-counter">
                <span id="gallery-current">1</span> / {{ count($images) }}
            </div>
            <button class="gallery-nav-btn" id="gallery-next" aria-label="Next">
                <span class="material-symbols-outlined" style="font-size:20px">chevron_right</span>
            </button>
        </div>
        @endif
    </section>
    @endif

    {{-- Content --}}
    <section class="detail-content relative z-[1]" data-parallax-layer="0.01">
        <div class="tagline">{{ $project->category }}</div>
        <div class="description">{{ $project->description }}</div>

        <div class="detail-divider"></div>

        {{-- Skills Used --}}
        @if($project->skills->count())
        <div class="skills-block">
            <span class="block-label">Skills & Technologies</span>
            <div class="skill-pills">
                @foreach($project->skills as $skill)
                <span>{{ $skill->name }}</span>
                @endforeach
            </div>
        </div>
        @endif

        {{-- Meta Grid --}}
        <div class="detail-grid">
            <div>
                <span class="block-label">Technologies</span>
                <div class="tech-pills">
                    @if(!empty($project->tags))
                    @foreach($project->tags as $t)
                    <span>{{ $t }}</span>
                    @endforeach
                    @endif
                </div>
            </div>
            <div>
                <span class="block-label">Year</span>
                <div class="meta-value">{{ $project->created_at->format('Y') }}</div>
            </div>
        </div>

        {{-- Project Link --}}
        @if(!empty($project->link))
        <a href="{{ $project->link }}" target="_blank" class="project-link-block">
            <span>Visit Project</span>
            <span class="material-symbols-outlined" style="font-size:18px">arrow_outward</span>
        </a>
        @endif
    </section>

    {{-- Related Projects --}}
    @if($related->count())
    <section class="related-section relative" data-parallax-layer="0.015">
        <div class="section-label">Portfolio</div>
        <h2>Other Projects</h2>
        <div class="related-grid">
            @foreach($related as $r)
            <a href="/project/{{ $r->id }}" class="related-card">
                <div class="thumb">
                    @php $coverImage = $r->cover_image ?? ($r->images[0] ?? null); @endphp
                    @if($coverImage)
                    <img src="{{ asset('storage/' . $coverImage) }}" alt="{{ $r->title }}"
                         onerror="this.style.display='none'; this.parentElement.querySelector('.related-img-fallback')?.classList.remove('hidden');">
                    <div class="related-img-fallback hidden flex items-center justify-center h-full">
                        <span class="material-symbols-outlined placeholder-icon">grid_view</span>
                    </div>
                    @else
                    <div class="flex items-center justify-center h-full">
                        <span class="material-symbols-outlined placeholder-icon">grid_view</span>
                    </div>
                    @endif
                </div>
                <div class="info">
                    <div class="r-year">{{ $r->created_at->format('Y') }}</div>
                    <div class="r-title">{{ $r->title }}</div>
                    <div class="r-category">{{ $r->category }}</div>
                </div>
            </a>
            @endforeach
        </div>
    </section>
    @endif

    {{-- Gallery scroll & navigation --}}
    <script>
    (function() {
        const gallery = document.getElementById('project-gallery');
        const currentEl = document.getElementById('gallery-current');
        const prevBtn = document.getElementById('gallery-prev');
        const nextBtn = document.getElementById('gallery-next');
        if (!gallery) return;
        const originalItems = gallery.querySelectorAll('.gallery-item');
        const total = originalItems.length;
        if (total < 2) { if (currentEl) currentEl.textContent = '1'; return; }

        // Clone for seamless loop
        const firstClone = originalItems[0].cloneNode(true);
        const lastClone = originalItems[total - 1].cloneNode(true);
        
        // Remove data-index from clones to avoid confusion if needed
        firstClone.removeAttribute('data-index');
        lastClone.removeAttribute('data-index');

        gallery.appendChild(firstClone);
        gallery.insertBefore(lastClone, originalItems[0]);

        const allItems = gallery.querySelectorAll('.gallery-item');

        // Initial setup to point to the first real item (index 1)
        // We use setTimeout to allow DOM to render before setting scrollLeft
        setTimeout(() => {
            gallery.style.scrollSnapType = 'none';
            gallery.scrollLeft = allItems[1].offsetLeft;
            setTimeout(() => gallery.style.scrollSnapType = 'x mandatory', 50);
        }, 10);

        let isJumping = false;

        function updateCounter() {
            if (!currentEl) return;
            const center = gallery.scrollLeft + gallery.offsetWidth / 2;
            let closestIdx = 0;
            let closestDist = Infinity;
            allItems.forEach((item, i) => {
                const itemCenter = item.offsetLeft + item.offsetWidth / 2;
                const dist = Math.abs(center - itemCenter);
                if (dist < closestDist) { closestDist = dist; closestIdx = i; }
            });
            
            // Map closestIdx back to original 1-based index
            let displayIdx = closestIdx;
            if (displayIdx === 0) displayIdx = total;
            else if (displayIdx === total + 1) displayIdx = 1;
            
            currentEl.textContent = displayIdx;
        }

        gallery.addEventListener('scroll', () => {
            updateCounter();
            
            if(isJumping) return;

            // Check if we reached the clones
            if (gallery.scrollLeft <= 0) {
                isJumping = true;
                gallery.style.scrollSnapType = 'none';
                gallery.scrollLeft = allItems[total].offsetLeft;
                setTimeout(() => { gallery.style.scrollSnapType = 'x mandatory'; isJumping = false; }, 50);
            } else if (gallery.scrollLeft >= gallery.scrollWidth - gallery.offsetWidth - 5) {
                isJumping = true;
                gallery.style.scrollSnapType = 'none';
                gallery.scrollLeft = allItems[1].offsetLeft;
                setTimeout(() => { gallery.style.scrollSnapType = 'x mandatory'; isJumping = false; }, 50);
            }
        });

        // Scroll to item function (smooth)
        function scrollToItem(index) {
            // index here is the absolute DOM index (0 to total+1)
            allItems[index].scrollIntoView({ behavior: 'smooth', block: 'nearest', inline: 'center' });
        }

        if (prevBtn) prevBtn.addEventListener('click', () => {
            // find current snapped item
            const center = gallery.scrollLeft + gallery.offsetWidth / 2;
            let currentIdx = 1;
            let closestDist = Infinity;
            allItems.forEach((item, i) => {
                const dist = Math.abs(center - (item.offsetLeft + item.offsetWidth / 2));
                if (dist < closestDist) { closestDist = dist; currentIdx = i; }
            });
            scrollToItem(currentIdx - 1);
        });

        if (nextBtn) nextBtn.addEventListener('click', () => {
            const center = gallery.scrollLeft + gallery.offsetWidth / 2;
            let currentIdx = 1;
            let closestDist = Infinity;
            allItems.forEach((item, i) => {
                const dist = Math.abs(center - (item.offsetLeft + item.offsetWidth / 2));
                if (dist < closestDist) { closestDist = dist; currentIdx = i; }
            });
            scrollToItem(currentIdx + 1);
        });

        // Keyboard navigation
        gallery.addEventListener('keydown', (e) => {
            if (e.key === 'ArrowLeft') { e.preventDefault(); prevBtn?.click(); }
            if (e.key === 'ArrowRight') { e.preventDefault(); nextBtn?.click(); }
        });
        gallery.setAttribute('tabindex', '0');
        gallery.setAttribute('role', 'region');
        gallery.setAttribute('aria-label', 'Project image gallery');

        // Touch drag support
        let isDown = false, startX, scrollLeft;
        gallery.addEventListener('mousedown', (e) => { isDown = true; startX = e.pageX - gallery.offsetLeft; scrollLeft = gallery.scrollLeft; gallery.style.cursor = 'grabbing'; gallery.style.scrollSnapType = 'none'; });
        gallery.addEventListener('mouseleave', () => { isDown = false; gallery.style.cursor = ''; gallery.style.scrollSnapType = 'x mandatory'; });
        gallery.addEventListener('mouseup', () => { isDown = false; gallery.style.cursor = ''; gallery.style.scrollSnapType = 'x mandatory'; });
        gallery.addEventListener('mousemove', (e) => { if (!isDown) return; e.preventDefault(); const x = e.pageX - gallery.offsetLeft; const walk = (x - startX) * 1.5; gallery.scrollLeft = scrollLeft - walk; });
    })();
    </script>

</div>
@endsection
