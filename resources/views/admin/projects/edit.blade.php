@extends('admin.layout')

@section('header_title', 'Edit Project')

@section('content')
<div class="mb-6 flex justify-between items-center">
    <div>
        <h2 class="text-xl font-bold text-slate-800">Edit Project: <span class="text-indigo-600">{{ $project->title }}</span></h2>
        <p class="text-sm text-slate-500 mt-1">Update the details of your project below.</p>
    </div>
    <a href="{{ route('admin.projects.index') }}" class="inline-flex items-center gap-2 text-slate-500 hover:text-slate-800 transition-colors text-sm font-medium">
        <span class="material-symbols-outlined text-[18px]">arrow_back</span>
        Back to Projects
    </a>
</div>

<form action="{{ route('admin.projects.update', $project) }}" method="POST" enctype="multipart/form-data" class="space-y-6" id="edit-form">
    @csrf
    @method('PUT')

    <div class="grid grid-cols-1 xl:grid-cols-3 gap-6 items-start">

        {{-- === KOLOM KIRI: Form Fields === --}}
        <div class="xl:col-span-2 space-y-6">

            {{-- Card: Detail Project --}}
            <div class="bg-white shadow-[0_2px_10px_-3px_rgba(6,81,237,0.08)] border border-slate-100 rounded-2xl p-6">
                <h3 class="text-sm font-bold text-slate-400 uppercase tracking-wider mb-5">Detail Proyek</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                    <div class="md:col-span-2">
                        <label class="block text-sm font-semibold text-slate-700 mb-1.5" for="title">Project Title</label>
                        <input class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-lg focus:bg-white focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-all sm:text-sm" id="title" name="title" type="text" value="{{ old('title', $project->title) }}" required>
                        @error('title') <p class="text-red-500 text-xs mt-1.5">{{ $message }}</p> @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-slate-700 mb-1.5" for="category">Category</label>
                        <input class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-lg focus:bg-white focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-all sm:text-sm" id="category" name="category" type="text" value="{{ old('category', $project->category) }}" required>
                        @error('category') <p class="text-red-500 text-xs mt-1.5">{{ $message }}</p> @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-slate-700 mb-1.5" for="tags">Tags <span class="text-slate-400 font-normal">(comma-separated)</span></label>
                        <input class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-lg focus:bg-white focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-all sm:text-sm" id="tags" name="tags" type="text" value="{{ old('tags', is_array($project->tags) ? implode(', ', $project->tags) : $project->tags) }}" required>
                        @error('tags') <p class="text-red-500 text-xs mt-1.5">{{ $message }}</p> @enderror
                    </div>

                    <div class="md:col-span-2">
                        <label class="block text-sm font-semibold text-slate-700 mb-1.5" for="description">Description</label>
                        <textarea class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-lg focus:bg-white focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-all sm:text-sm" id="description" name="description" rows="5" required>{{ old('description', $project->description) }}</textarea>
                        @error('description') <p class="text-red-500 text-xs mt-1.5">{{ $message }}</p> @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-slate-700 mb-1.5" for="link">Live Link <span class="text-slate-400 font-normal">(Optional)</span></label>
                        <input class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-lg focus:bg-white focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-all sm:text-sm" id="link" name="link" type="url" value="{{ old('link', $project->link) }}">
                        @error('link') <p class="text-red-500 text-xs mt-1.5">{{ $message }}</p> @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-slate-700 mb-1.5" for="board_position">Board Position</label>
                        <select class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-lg focus:bg-white focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-all sm:text-sm" id="board_position" name="board_position">
                            <option value="none" {{ old('board_position', $project->board_position) == 'none' ? 'selected' : '' }}>Tidak Ditampilkan (None)</option>
                            <option value="center" {{ old('board_position', $project->board_position) == 'center' ? 'selected' : '' }}>Tengah (Center - Main)</option>
                            <option value="top_left" {{ old('board_position', $project->board_position) == 'top_left' ? 'selected' : '' }}>Pojok Kiri Atas (Top Left)</option>
                            <option value="top_right" {{ old('board_position', $project->board_position) == 'top_right' ? 'selected' : '' }}>Pojok Kanan Atas (Top Right)</option>
                            <option value="bottom_left" {{ old('board_position', $project->board_position) == 'bottom_left' ? 'selected' : '' }}>Pojok Kiri Bawah (Bottom Left)</option>
                            <option value="bottom_right" {{ old('board_position', $project->board_position) == 'bottom_right' ? 'selected' : '' }}>Pojok Kanan Bawah (Bottom Right)</option>
                        </select>
                        @error('board_position') <p class="text-red-500 text-xs mt-1.5">{{ $message }}</p> @enderror
                    </div>
                </div>
            </div>

            {{-- Card: Gambar Proyek --}}
            <div class="bg-white shadow-[0_2px_10px_-3px_rgba(6,81,237,0.08)] border border-slate-100 rounded-2xl p-6">
                <h3 class="text-sm font-bold text-slate-400 uppercase tracking-wider mb-2">Gambar Proyek</h3>
                <p class="text-xs text-slate-500 mb-5">Klik gambar untuk menjadikannya sebagai <strong>Cover</strong>. Cover akan ditampilkan di halaman utama & daftar proyek.</p>

                {{-- Upload Input --}}
                <label for="images" class="block w-full cursor-pointer border-2 border-dashed border-slate-200 hover:border-indigo-400 rounded-xl p-5 text-center transition-colors duration-200 bg-slate-50 hover:bg-indigo-50/50 mb-5">
                    <span class="material-symbols-outlined text-3xl text-slate-400 block mb-1">cloud_upload</span>
                    <span class="text-sm font-semibold text-slate-600">Klik untuk upload gambar baru</span>
                    <span class="text-xs text-slate-400 block mt-1">PNG, JPG, GIF max 10MB. Biarkan kosong untuk tetap memakai gambar saat ini.</span>
                    <input class="hidden" id="images" name="images[]" type="file" multiple accept="image/*">
                </label>
                @error('images') <p class="text-red-500 text-xs mt-1.5 mb-3">{{ $message }}</p> @enderror
                @error('images.*') <p class="text-red-500 text-xs mt-1.5 mb-3">{{ $message }}</p> @enderror

                {{-- Grid Gambar --}}
                <div id="image-preview-container" class="grid grid-cols-2 md:grid-cols-3 gap-3">
                    @if($project->images)
                        @foreach($project->images as $image)
                        @php $isCover = ($project->cover_image == $image); @endphp
                        <div class="image-card relative group rounded-xl overflow-hidden border-2 transition-all duration-200 cursor-pointer {{ $isCover ? 'border-indigo-500 ring-2 ring-indigo-500/30' : 'border-slate-200 hover:border-indigo-300' }}"
                             data-image-path="{{ $image }}"
                             onclick="selectCover(this)">

                            {{-- Hidden inputs --}}
                            <input type="hidden" name="existing_images[]" value="{{ $image }}">
                            <input type="radio" name="cover_image" value="{{ $image }}" class="sr-only cover-radio" {{ $isCover ? 'checked' : '' }}>

                            {{-- Gambar --}}
                            <img src="{{ asset('storage/' . $image) }}"
                                 alt="Project image"
                                 class="w-full aspect-video object-cover block"
                                 onerror="this.parentElement.classList.add('border-red-300'); this.style.display='none'; this.nextElementSibling && (this.nextElementSibling.style.display='flex');">
                            <div class="hidden w-full aspect-video items-center justify-center bg-red-50 text-red-400 text-xs font-mono">[FILE NOT FOUND]</div>

                            {{-- Cover Badge --}}
                            <div class="cover-badge absolute top-2 left-2 flex items-center gap-1 bg-indigo-600 text-white text-[10px] font-bold px-2 py-0.5 rounded-full shadow {{ $isCover ? 'flex' : 'hidden' }}">
                                <span class="material-symbols-outlined text-[12px]" style="font-size:12px">star</span>
                                COVER
                            </div>

                            {{-- Overlay saat hover --}}
                            <div class="cover-overlay absolute inset-0 bg-indigo-600/0 group-hover:bg-indigo-600/10 transition-all duration-200 flex items-center justify-center">
                                <div class="cover-click-hint opacity-0 group-hover:opacity-100 transition-opacity bg-white/90 text-indigo-700 text-[10px] font-bold px-2 py-1 rounded-full">
                                    Jadikan Cover
                                </div>
                            </div>

                            {{-- Tombol Hapus --}}
                            <button type="button"
                                    onclick="event.stopPropagation(); deleteImagePreview(this)"
                                    class="delete-btn absolute top-2 right-2 w-7 h-7 items-center justify-center bg-red-500 text-white rounded-full text-sm font-bold opacity-0 group-hover:opacity-100 transition-opacity shadow-md hover:bg-red-600 hidden group-hover:flex z-10"
                                    title="Hapus gambar">
                                &times;
                            </button>
                        </div>
                        @endforeach
                    @else
                        <p class="text-slate-400 text-sm col-span-full text-center py-4">Belum ada gambar untuk proyek ini.</p>
                    @endif
                </div>
            </div>
        </div>

        {{-- === KOLOM KANAN: Cover Preview & Aksi === --}}
        <div class="xl:col-span-1 space-y-6">

            {{-- Card: Preview Cover --}}
            <div class="bg-white shadow-[0_2px_10px_-3px_rgba(6,81,237,0.08)] border border-slate-100 rounded-2xl p-5 sticky top-6">
                <h3 class="text-sm font-bold text-slate-400 uppercase tracking-wider mb-4">Preview Cover</h3>

                <div class="relative w-full aspect-video rounded-xl overflow-hidden bg-slate-100 border-2 border-dashed border-slate-200 mb-4" id="cover-preview-frame">
                    @php $currentCover = $project->cover_image ?? ($project->images[0] ?? null); @endphp
                    @if($currentCover)
                    <img id="cover-preview-img"
                         src="{{ asset('storage/' . $currentCover) }}"
                         alt="Cover preview"
                         class="w-full h-full object-cover">
                    @else
                    <div id="cover-preview-img" class="w-full h-full flex flex-col items-center justify-center text-slate-400">
                        <span class="material-symbols-outlined text-4xl mb-1">image</span>
                        <span class="text-xs">Belum ada cover</span>
                    </div>
                    @endif

                    {{-- Cover label --}}
                    <div class="absolute bottom-2 left-2 right-2 flex items-center gap-1.5 bg-black/50 backdrop-blur-sm text-white text-[11px] font-semibold px-2.5 py-1.5 rounded-lg">
                        <span class="material-symbols-outlined text-[14px] text-yellow-400">star</span>
                        <span>Gambar ini akan tampil di card proyek</span>
                    </div>
                </div>

                <div class="bg-indigo-50 border border-indigo-100 rounded-xl p-3 mb-5">
                    <p class="text-xs text-indigo-700 leading-relaxed">
                        <strong>Cara memilih cover:</strong> Klik salah satu gambar di panel kiri. Gambar yang dipilih akan ditampilkan di card proyek pada halaman utama dan daftar proyek.
                    </p>
                </div>

                {{-- Tombol Aksi --}}
                <div class="flex flex-col gap-2.5">
                    <button type="submit"
                            class="w-full px-6 py-3 bg-indigo-600 hover:bg-indigo-700 text-white text-sm font-bold rounded-xl shadow-sm transition-colors focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 flex items-center justify-center gap-2">
                        <span class="material-symbols-outlined text-[18px]">save</span>
                        Simpan Perubahan
                    </button>
                    <a href="{{ route('admin.projects.index') }}"
                       class="w-full px-6 py-3 text-sm font-semibold text-slate-600 hover:bg-slate-100 rounded-xl transition-colors text-center">
                        Batal
                    </a>
                </div>
            </div>
        </div>

    </div>
</form>

@push('scripts')
<script>
    // =============================================
    // FUNGSI: Pilih gambar sebagai cover
    // =============================================
    function selectCover(card) {
        // Skip jika mengklik tombol hapus
        if (event.target.closest('.delete-btn')) return;

        const container = document.getElementById('image-preview-container');
        const allCards = container.querySelectorAll('.image-card');

        // Reset semua card
        allCards.forEach(c => {
            c.classList.remove('border-indigo-500', 'ring-2', 'ring-indigo-500/30');
            c.classList.add('border-slate-200');
            const badge = c.querySelector('.cover-badge');
            if (badge) badge.classList.add('hidden');
            const radio = c.querySelector('.cover-radio');
            if (radio) radio.checked = false;
        });

        // Highlight card yang dipilih
        card.classList.add('border-indigo-500', 'ring-2', 'ring-indigo-500/30');
        card.classList.remove('border-slate-200');
        const badge = card.querySelector('.cover-badge');
        if (badge) badge.classList.remove('hidden');
        const radio = card.querySelector('.cover-radio');
        if (radio) radio.checked = true;

        // Update preview cover di kanan
        const img = card.querySelector('img');
        updateCoverPreview(img ? img.src : null);
    }

    // =============================================
    // FUNGSI: Update gambar preview di kolom kanan
    // =============================================
    function updateCoverPreview(src) {
        const frame = document.getElementById('cover-preview-frame');
        let previewImg = document.getElementById('cover-preview-img');

        if (src) {
            if (previewImg && previewImg.tagName === 'IMG') {
                previewImg.src = src;
            } else {
                // Ganti placeholder dengan gambar
                const newImg = document.createElement('img');
                newImg.id = 'cover-preview-img';
                newImg.src = src;
                newImg.alt = 'Cover preview';
                newImg.className = 'w-full h-full object-cover';
                if (previewImg) previewImg.replaceWith(newImg);
                else frame.prepend(newImg);
            }
        }
    }

    // =============================================
    // FUNGSI: Hapus gambar dari DOM
    // =============================================
    function deleteImagePreview(button) {
        if (!confirm('Hapus gambar ini? Gambar akan dihapus permanen saat kamu menyimpan perubahan.')) {
            return;
        }

        const card = button.closest('.image-card');
        const wasCover = card.querySelector('.cover-radio')?.checked;

        card.remove();

        // Jika gambar yang dihapus adalah cover, otomatis pilih gambar pertama
        if (wasCover) {
            const firstCard = document.querySelector('#image-preview-container .image-card');
            if (firstCard) {
                selectCover(firstCard);
            } else {
                // Tidak ada gambar tersisa
                const frame = document.getElementById('cover-preview-frame');
                const previewImg = document.getElementById('cover-preview-img');
                if (previewImg) {
                    const placeholder = document.createElement('div');
                    placeholder.id = 'cover-preview-img';
                    placeholder.className = 'w-full h-full flex flex-col items-center justify-center text-slate-400';
                    placeholder.innerHTML = '<span class="material-symbols-outlined text-4xl mb-1">image</span><span class="text-xs">Belum ada cover</span>';
                    previewImg.replaceWith(placeholder);
                }
            }
        }
    }

    // =============================================
    // FUNGSI: Preview gambar baru yang di-upload
    // =============================================
    document.getElementById('images').addEventListener('change', function(event) {
        const previewContainer = document.getElementById('image-preview-container');
        const files = event.target.files;

        // Hapus pratinjau gambar BARU sebelumnya
        previewContainer.querySelectorAll('[data-new-image-preview="1"]').forEach(n => n.remove());

        if (files && files.length > 0) {
            Array.from(files).forEach((file, index) => {
                const reader = new FileReader();
                reader.onload = function(e) {
                    const card = document.createElement('div');
                    card.className = 'image-card relative group rounded-xl overflow-hidden border-2 border-dashed border-indigo-300 transition-all duration-200 cursor-pointer hover:border-indigo-400';
                    card.setAttribute('data-new-image-preview', '1');
                    card.setAttribute('onclick', 'selectCoverNew(this, ' + index + ')');

                    const img = document.createElement('img');
                    img.src = e.target.result;
                    img.alt = 'New image preview';
                    img.className = 'w-full aspect-video object-cover block';

                    const newBadge = document.createElement('div');
                    newBadge.className = 'absolute top-2 left-2 bg-indigo-500 text-white text-[10px] font-bold px-2 py-0.5 rounded-full';
                    newBadge.textContent = 'NEW';

                    const coverBadge = document.createElement('div');
                    coverBadge.className = 'cover-badge hidden absolute top-8 left-2 flex items-center gap-1 bg-indigo-600 text-white text-[10px] font-bold px-2 py-0.5 rounded-full shadow';
                    coverBadge.innerHTML = '<span class="material-symbols-outlined" style="font-size:12px">star</span> COVER';

                    const radio = document.createElement('input');
                    radio.type = 'radio';
                    radio.name = 'cover_image';
                    radio.value = 'new_' + index;
                    radio.className = 'sr-only cover-radio';

                    const overlay = document.createElement('div');
                    overlay.className = 'cover-overlay absolute inset-0 bg-indigo-600/0 group-hover:bg-indigo-600/10 transition-all duration-200 flex items-center justify-center';
                    overlay.innerHTML = '<div class="cover-click-hint opacity-0 group-hover:opacity-100 transition-opacity bg-white/90 text-indigo-700 text-[10px] font-bold px-2 py-1 rounded-full">Jadikan Cover</div>';

                    card.appendChild(img);
                    card.appendChild(newBadge);
                    card.appendChild(coverBadge);
                    card.appendChild(radio);
                    card.appendChild(overlay);
                    previewContainer.appendChild(card);
                };
                reader.readAsDataURL(file);
            });
        }
    });

    // Pilih cover dari gambar baru (NEW)
    function selectCoverNew(card, index) {
        const container = document.getElementById('image-preview-container');
        const allCards = container.querySelectorAll('.image-card');

        allCards.forEach(c => {
            c.classList.remove('border-indigo-500', 'ring-2', 'ring-indigo-500/30');
            c.classList.add('border-slate-200');
            const badge = c.querySelector('.cover-badge');
            if (badge) badge.classList.add('hidden');
            const radio = c.querySelector('.cover-radio');
            if (radio) radio.checked = false;

            // Kembalikan border dashed untuk new images
            if (c.hasAttribute('data-new-image-preview')) {
                c.classList.remove('border-slate-200');
                c.classList.add('border-dashed', 'border-indigo-300');
            }
        });

        card.classList.add('border-indigo-500', 'ring-2', 'ring-indigo-500/30');
        card.classList.remove('border-dashed', 'border-indigo-300', 'border-slate-200');
        const badge = card.querySelector('.cover-badge');
        if (badge) badge.classList.remove('hidden');
        const radio = card.querySelector('.cover-radio');
        if (radio) radio.checked = true;

        const img = card.querySelector('img');
        updateCoverPreview(img ? img.src : null);
    }
</script>
@endpush
@endsection