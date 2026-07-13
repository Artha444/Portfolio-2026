@extends('admin.layout')

@section('header_title', 'Create Project')

@section('content')
<div class="mb-6 flex justify-between items-center">
    <div>
        <h2 class="text-xl font-bold text-slate-800">Add New Project</h2>
        <p class="text-sm text-slate-500 mt-1">Publish a new project to your portfolio.</p>
    </div>
    <a href="{{ route('admin.projects.index') }}" class="inline-flex items-center gap-2 text-slate-500 hover:text-slate-800 transition-colors">
        <span class="material-symbols-outlined text-[20px]">arrow_back</span>
        Back to Projects
    </a>
</div>

<div class="bg-white shadow-[0_2px_10px_-3px_rgba(6,81,237,0.1)] border border-slate-100 rounded-2xl overflow-hidden p-6 md:p-8 max-w-4xl">
    <form action="{{ route('admin.projects.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label class="block text-sm font-semibold text-slate-700 mb-2" for="title">Project Title</label>
                <input class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-lg focus:bg-white focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-all sm:text-sm" id="title" name="title" type="text" value="{{ old('title') }}" placeholder="e.g. E-Commerce Redesign" required>
                @error('title') <p class="text-red-500 text-xs mt-1.5">{{ $message }}</p> @enderror
            </div>

            <div>
                <label class="block text-sm font-semibold text-slate-700 mb-2" for="category">Category</label>
                <input class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-lg focus:bg-white focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-all sm:text-sm" id="category" name="category" type="text" value="{{ old('category') }}" placeholder="e.g. Web Development" required>
                @error('category') <p class="text-red-500 text-xs mt-1.5">{{ $message }}</p> @enderror
            </div>
        </div>

        <div>
            <label class="block text-sm font-semibold text-slate-700 mb-2" for="tags">Tags <span class="text-slate-400 font-normal">(comma-separated)</span></label>
            <input class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-lg focus:bg-white focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-all sm:text-sm" id="tags" name="tags" type="text" value="{{ old('tags') }}" placeholder="e.g. Laravel, Vue, Tailwind" required>
            @error('tags') <p class="text-red-500 text-xs mt-1.5">{{ $message }}</p> @enderror
        </div>

        <div>
            <label class="block text-sm font-semibold text-slate-700 mb-2" for="description">Description</label>
            <textarea class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-lg focus:bg-white focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-all sm:text-sm" id="description" name="description" rows="5" placeholder="Describe the project..." required>{{ old('description') }}</textarea>
            @error('description') <p class="text-red-500 text-xs mt-1.5">{{ $message }}</p> @enderror
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label class="block text-sm font-semibold text-slate-700 mb-2" for="link">Live Link <span class="text-slate-400 font-normal">(Optional)</span></label>
                <input class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-lg focus:bg-white focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-all sm:text-sm" id="link" name="link" type="url" value="{{ old('link') }}" placeholder="https://...">
                @error('link') <p class="text-red-500 text-xs mt-1.5">{{ $message }}</p> @enderror
            </div>

            <div>
                <label class="block text-sm font-semibold text-slate-700 mb-2" for="board_position">Posisi Papan Info (Board Position)</label>
                <select class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-lg focus:bg-white focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-all sm:text-sm" id="board_position" name="board_position">
                    <option value="none" {{ old('board_position') == 'none' ? 'selected' : '' }}>Tidak Ditampilkan (None)</option>
                    <option value="center" {{ old('board_position') == 'center' ? 'selected' : '' }}>Tengah (Center - Main)</option>
                    <option value="top_left" {{ old('board_position') == 'top_left' ? 'selected' : '' }}>Pojok Kiri Atas (Top Left)</option>
                    <option value="top_right" {{ old('board_position') == 'top_right' ? 'selected' : '' }}>Pojok Kanan Atas (Top Right)</option>
                    <option value="bottom_left" {{ old('board_position') == 'bottom_left' ? 'selected' : '' }}>Pojok Kiri Bawah (Bottom Left)</option>
                    <option value="bottom_right" {{ old('board_position') == 'bottom_right' ? 'selected' : '' }}>Pojok Kanan Bawah (Bottom Right)</option>
                </select>
                @error('board_position') <p class="text-red-500 text-xs mt-1.5">{{ $message }}</p> @enderror
            </div>
        </div>

        <div>
            <label class="block text-sm font-semibold text-slate-700 mb-2" for="images">Project Images</label>
            <input class="w-full px-4 py-2 bg-slate-50 border border-slate-200 rounded-lg focus:bg-white focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-all sm:text-sm file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100" id="images" name="images[]" type="file" multiple required accept="image/*">
            @error('images') <p class="text-red-500 text-xs mt-1.5">{{ $message }}</p> @enderror
            @error('images.*') <p class="text-red-500 text-xs mt-1.5">{{ $message }}</p> @enderror
            {{-- Container untuk pratinjau gambar --}}
            <div id="image-preview-container" class="mt-4 grid grid-cols-2 md:grid-cols-4 gap-4"></div>
        </div>

        <div class="pt-4 flex items-center justify-end gap-3 border-t border-slate-100 mt-6">
            <a href="{{ route('admin.projects.index') }}" class="px-5 py-2.5 text-sm font-semibold text-slate-600 hover:bg-slate-100 rounded-lg transition-colors">
                Cancel
            </a>
            <button class="px-6 py-2.5 bg-indigo-600 hover:bg-indigo-700 text-white text-sm font-semibold rounded-lg shadow-sm transition-colors focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" type="submit">
                Create Project
            </button>
        </div>
    </form>
</div>

@push('scripts')
<script>
    document.getElementById('images').addEventListener('change', function(event) {
        const previewContainer = document.getElementById('image-preview-container');
        previewContainer.innerHTML = ''; // Kosongkan pratinjau sebelumnya
        const files = event.target.files;

        if (files) {
            Array.from(files).forEach((file, index) => {
                const reader = new FileReader();

                reader.onload = function(e) {
                    // Buat wrapper untuk setiap gambar dan tombol radio
                    const wrapper = document.createElement('div');
                    wrapper.className = 'relative border-2 border-slate-200 p-2 rounded-lg';

                    // Buat elemen gambar
                    const img = document.createElement('img');
                    img.src = e.target.result;
                    img.className = 'w-full h-auto object-cover rounded-md aspect-video';

                    // Buat label untuk tombol radio
                    const radioLabel = document.createElement('label');
                    radioLabel.className = 'absolute top-2 right-2 flex items-center space-x-2 bg-white/80 backdrop-blur-sm px-2 py-1 rounded-full text-xs cursor-pointer border border-slate-300 hover:bg-indigo-50';

                    // Buat tombol radio
                    const radio = document.createElement('input');
                    radio.type = 'radio';
                    radio.name = 'cover_image_index'; // Ini akan dikirim ke controller
                    radio.value = index;
                    radio.className = 'w-4 h-4 text-indigo-600 border-gray-300 focus:ring-indigo-500';
                    if (index === 0) {
                        radio.checked = true; // Otomatis pilih gambar pertama sebagai default
                    }

                    radioLabel.appendChild(radio);
                    radioLabel.append(' Cover'); // Tambahkan teks "Cover"
                    wrapper.appendChild(img);
                    wrapper.appendChild(radioLabel);
                    previewContainer.appendChild(wrapper);
                }

                reader.readAsDataURL(file);
            });
        }
    });
</script>
@endpush
@endsection