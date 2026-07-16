@props([
    'caption' => 'signed · software engineer',
    'sublabel' => 'portfolio — 2026',
    'year' => '2026',
])

{{-- Wrapper div untuk memastikan pemusatan dan skala yang tepat di dalam hero section --}}
<div {{ $attributes->merge(['class' => 'artha-sig-wrap']) }}>
    <svg class="artha-signature" viewBox="0 0 460 180" xmlns="http://www.w3.org/2000/svg">
        {{-- soft ink-bleed ghost layer for hand-drawn depth --}}
        <text x="231.6" y="122.4" class="artha-stroke-layer artha-ghost">Artha Keandre</text>

        {{-- main signature, reveals left-to-right like it's being written --}}
        <g class="artha-reveal">
            <text x="230" y="120" class="artha-stroke-layer">Artha
                Keandre
            </text>
        </g>

        {{-- Elemen flourish, nib, dll. telah dihapus sesuai permintaan --}}
    </svg>
</div>

@once
    @push('styles')
    <style>
        /* Variabel warna tetap dipertahankan untuk styling teks */
        :root {
            --artha-ink: #1c2541;
            --artha-ink-soft: #33436e;
        }

        .artha-sig-wrap{
            position: relative;
            width: 100%;
            display: flex;
            justify-content: center;
        }

        svg.artha-signature{
            width: 100%;
            height: auto;
            max-width: 460px; /* Disesuaikan agar lebih besar */
            overflow: visible;
            /* Menghapus warna latar belakang dan bayangan dari komponen */
            background: none;
            box-shadow: none;
        }

        .artha-stroke-layer{
            font-family: 'Beau Rivage', cursive; /* Pastikan font ini di-load di layout utama */
            font-size: 112px;
            text-anchor: middle;
            fill: var(--artha-ink);
        }

        .artha-stroke-layer.artha-ghost{
            fill: var(--artha-ink-soft);
            opacity: 0.16;
            transform: translate(1.6px, 2.4px) rotate(0.4deg);
        }

        .artha-reveal{
            clip-path: inset(0 100% 0 0);
            animation: artha-write 1.6s cubic-bezier(0.65, 0, 0.35, 1) 0.3s forwards;
            /* Menambahkan penundaan agar muncul setelah lingkaran tergambar */
            animation-delay: 1.5s;
        }

        @keyframes artha-write{ to{ clip-path: inset(0 0% 0 0); } }

        @media (prefers-reduced-motion: reduce){
            .artha-reveal{ clip-path: inset(0 0% 0 0); animation: none; }
        }
    </style>
    @endpush
@endonce