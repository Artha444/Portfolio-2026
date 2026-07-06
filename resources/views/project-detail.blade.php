@extends('layouts.app')

@section('content')
<div data-barba="container" data-barba-namespace="project-detail">

    {{-- Styles injected inside Barba container so they work both on hard-refresh AND Barba navigation --}}
    <style>
        .project-hero {
            padding: 140px 32px 40px;
            max-width: 1280px;
            margin: 0 auto;
        }
        .project-hero .year {
            font-size: 13px;
            font-weight: 600;
            letter-spacing: 0.1em;
            text-transform: uppercase;
            color: #00668a;
            margin-bottom: 12px;
        }
        .project-hero h1 {
            font-family: 'Hanken Grotesk', sans-serif;
            font-size: clamp(40px, 6vw, 72px);
            font-weight: 800;
            line-height: 1.1;
            letter-spacing: -0.04em;
            color: #1a1a2e;
            margin-bottom: 24px;
            max-width: 900px;
        }
        .project-hero .category {
            display: inline-block;
            padding: 6px 16px;
            border: 1px solid rgba(26,26,46,0.15);
            border-radius: 999px;
            font-size: 13px;
            font-weight: 500;
            color: #4a4a5a;
        }

        /* ── Gallery ── */
        .project-gallery {
            width: 100%;
            display: flex;
            gap: 24px;
            overflow-x: auto;
            scroll-snap-type: x mandatory;
            padding: 0 32px 60px;
            -webkit-overflow-scrolling: touch;
            scrollbar-width: none;
        }
        .project-gallery::-webkit-scrollbar { display: none; }

        .gallery-item {
            scroll-snap-align: center;
            flex-shrink: 0;
            width: 85vw;
            max-width: 900px;
            aspect-ratio: 16/9;
            border-radius: 24px;
            overflow: hidden;
            box-shadow: 0 20px 40px rgba(26,26,46,0.08);
            background: #e5e5e5;
        }
        .gallery-item img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        /* ── Back Button ── */
        .back-link {
            position: fixed;
            top: 90px;
            left: 32px;
            z-index: 101;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 8px 18px;
            background: rgba(255,255,255,0.85);
            backdrop-filter: blur(12px);
            border-radius: 999px;
            box-shadow: 0 4px 16px rgba(26,26,46,0.08);
            color: #1a1a2e;
            text-decoration: none;
            font-size: 14px;
            font-weight: 600;
            transition: background 0.3s, color 0.3s, box-shadow 0.3s;
        }
        .back-link:hover {
            background: #1a1a2e;
            color: #fff;
            box-shadow: 0 8px 24px rgba(26,26,46,0.18);
        }

        /* ── Content ── */
        .project-content {
            max-width: 900px;
            margin: 0 auto;
            padding: 40px 32px;
        }
        .project-content .tagline {
            font-family: 'Hanken Grotesk', sans-serif;
            font-size: 28px;
            font-weight: 500;
            line-height: 1.3;
            letter-spacing: -0.02em;
            color: #1a1a2e;
            margin-bottom: 48px;
            max-width: 700px;
        }
        .project-content .description {
            font-size: 17px;
            line-height: 1.8;
            color: #4a4a5a;
            margin-bottom: 56px;
        }

        /* ── Meta ── */
        .project-meta {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 40px;
            padding: 48px 0;
            border-top: 1px solid rgba(26,26,46,0.06);
            border-bottom: 1px solid rgba(26,26,46,0.06);
            margin-bottom: 56px;
        }
        .project-meta label {
            font-size: 12px;
            font-weight: 600;
            letter-spacing: 0.08em;
            text-transform: uppercase;
            color: rgba(26,26,46,0.3);
            display: block;
            margin-bottom: 12px;
        }
        .project-meta .tech-list {
            display: flex;
            flex-wrap: wrap;
            gap: 8px;
        }
        .project-meta .tech-list span {
            padding: 6px 14px;
            background: rgba(26,26,46,0.04);
            border-radius: 999px;
            font-size: 13px;
            color: #1a1a2e;
        }

        /* ── Features ── */
        .features { margin-bottom: 80px; }
        .features h3 {
            font-family: 'Hanken Grotesk', sans-serif;
            font-size: 20px;
            font-weight: 600;
            letter-spacing: -0.02em;
            margin-bottom: 24px;
            color: #1a1a2e;
        }
        .features ul {
            list-style: none;
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 12px;
        }
        .features ul li {
            padding: 12px 16px;
            background: rgba(26,26,46,0.02);
            border-radius: 8px;
            font-size: 15px;
            color: #4a4a5a;
            display: flex;
            align-items: center;
            gap: 10px;
        }
        .features ul li::before {
            content: '';
            width: 4px;
            height: 4px;
            border-radius: 50%;
            background: #1a1a2e;
            flex-shrink: 0;
        }

        /* ── Related Projects ── */
        .related-section {
            max-width: 1280px;
            margin: 0 auto;
            padding: 80px 32px 120px;
        }
        .related-section h2 {
            font-family: 'Hanken Grotesk', sans-serif;
            font-size: 32px;
            font-weight: 700;
            letter-spacing: -0.03em;
            color: #1a1a2e;
            margin-bottom: 40px;
        }
        .related-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 24px;
        }
        .related-card {
            text-decoration: none;
            display: block;
            border-radius: 12px;
            overflow: hidden;
            background: #fff;
            border: 1px solid rgba(26,26,46,0.06);
            transition: transform 0.4s cubic-bezier(0.22,1,0.36,1), box-shadow 0.4s;
        }
        .related-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 16px 40px rgba(26,26,46,0.06);
        }
        .related-card .thumb {
            aspect-ratio: 16/10;
            background: #f0f0f3;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
        }
        .related-card .thumb img { width: 100%; height: 100%; object-fit: cover; transition: transform 0.5s; }
        .related-card:hover .thumb img { transform: scale(1.05); }
        .related-card .info { padding: 20px; }
        .related-card .info .r-year { font-size: 12px; color: rgba(26,26,46,0.3); letter-spacing: 0.05em; text-transform: uppercase; }
        .related-card .info .r-title { font-family: 'Hanken Grotesk', sans-serif; font-size: 18px; font-weight: 600; letter-spacing: -0.02em; color: #1a1a2e; margin-top: 4px; }
        .related-card .info .r-category { font-size: 13px; color: rgba(26,26,46,0.4); margin-top: 4px; }

        .placeholder-icon {
            color: rgba(26,26,46,0.08);
            font-size: 48px;
            font-family: 'Material Symbols Outlined';
        }

        /* ── Responsive ── */
        @media (max-width: 767px) {
            .project-content { padding: 40px 20px; }
            .project-content .tagline { font-size: 22px; }
            .project-meta { grid-template-columns: 1fr; }
            .features ul { grid-template-columns: 1fr; }
            .related-grid { grid-template-columns: 1fr; gap: 16px; }
            .related-section { padding: 40px 20px 80px; }
            .back-link { top: 80px; left: 20px; }
            .project-hero { padding: 130px 20px 30px; }
            .project-gallery { padding: 0 20px 40px; }
        }
        @media (min-width: 768px) and (max-width: 1023px) {
            .related-grid { grid-template-columns: repeat(2, 1fr); }
        }
    </style>

    {{-- Back Button --}}
    <a href="/" class="back-link">
        <span class="material-symbols-outlined" style="font-size:18px">arrow_back</span>
        Back
    </a>

    {{-- Hero --}}
    <div class="project-hero">
        <div class="year">{{ $project->created_at->format('Y') }}</div>
        <h1>{{ $project->title }}</h1>
        <div class="category">{{ $project->category }}</div>
    </div>

    {{-- Horizontal Gallery --}}
    <div class="project-gallery">
        @php
            $images = !empty($project->images) ? $project->images : [];
        @endphp
        @foreach($images as $img)
            <div class="gallery-item">
                <img src="{{ asset('storage/' . $img) }}" alt="{{ $project->title }} screenshot">
            </div>
        @endforeach
    </div>

    {{-- Content --}}
    <div class="project-content">
        <div class="tagline">{{ $project->category }}</div>
        <div class="description">{{ $project->description }}</div>

        <div class="project-meta">
            <div>
                <label>Technologies</label>
                <div class="tech-list">
                    @if(!empty($project->tags))
                        @foreach($project->tags as $t)
                            <span>{{ $t }}</span>
                        @endforeach
                    @endif
                </div>
            </div>
            <div>
                <label>Year</label>
                <div style="font-size:17px;color:#1a1a2e;font-weight:500">{{ $project->created_at->format('Y') }}</div>
            </div>
        </div>

        @if(!empty($project->link))
        <div class="features">
            <h3>Project Link</h3>
            <ul>
                <li><a href="{{ $project->link }}" target="_blank" style="color: #00668a; text-decoration: underline;">{{ $project->link }}</a></li>
            </ul>
        </div>
        @endif
    </div>

    {{-- Related Projects --}}
    @if($related->count())
    <section class="related-section">
        <h2>Other Projects</h2>
        <div class="related-grid">
            @foreach($related as $r)
                <a href="/project/{{ $r->id }}" class="related-card">
                    <div class="thumb">
                        @if(!empty($r->images) && isset($r->images[0]))
                            <img src="{{ asset('storage/' . $r->images[0]) }}" alt="{{ $r->title }}">
                        @else
                            <span class="material-symbols-outlined placeholder-icon">grid_view</span>
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

</div>
@endsection
