@extends('admin.layout')

@section('header_title', 'Edit Project')

@section('content')
<div class="mb-6 flex justify-between items-center">
    <div>
        <h2 class="text-xl font-bold text-slate-800">Edit Project: {{ $project->title }}</h2>
        <p class="text-sm text-slate-500 mt-1">Update the details of your project.</p>
    </div>
    <a href="{{ route('admin.projects.index') }}" class="inline-flex items-center gap-2 text-slate-500 hover:text-slate-800 transition-colors">
        <span class="material-symbols-outlined text-[20px]">arrow_back</span>
        Back to Projects
    </a>
</div>

<div class="bg-white shadow-[0_2px_10px_-3px_rgba(6,81,237,0.1)] border border-slate-100 rounded-2xl overflow-hidden p-6 md:p-8 max-w-4xl">
    <form action="{{ route('admin.projects.update', $project) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf
        @method('PUT')
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label class="block text-sm font-semibold text-slate-700 mb-2" for="title">Project Title</label>
                <input class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-lg focus:bg-white focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-all sm:text-sm" id="title" name="title" type="text" value="{{ old('title', $project->title) }}" required>
                @error('title') <p class="text-red-500 text-xs mt-1.5">{{ $message }}</p> @enderror
            </div>

            <div>
                <label class="block text-sm font-semibold text-slate-700 mb-2" for="category">Category</label>
                <input class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-lg focus:bg-white focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-all sm:text-sm" id="category" name="category" type="text" value="{{ old('category', $project->category) }}" required>
                @error('category') <p class="text-red-500 text-xs mt-1.5">{{ $message }}</p> @enderror
            </div>
        </div>

        <div>
            <label class="block text-sm font-semibold text-slate-700 mb-2" for="tags">Tags <span class="text-slate-400 font-normal">(comma-separated)</span></label>
            <input class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-lg focus:bg-white focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-all sm:text-sm" id="tags" name="tags" type="text" value="{{ old('tags', is_array($project->tags) ? implode(', ', $project->tags) : $project->tags) }}" required>
            @error('tags') <p class="text-red-500 text-xs mt-1.5">{{ $message }}</p> @enderror
        </div>

        <div>
            <label class="block text-sm font-semibold text-slate-700 mb-2" for="description">Description</label>
            <textarea class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-lg focus:bg-white focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-all sm:text-sm" id="description" name="description" rows="5" required>{{ old('description', $project->description) }}</textarea>
            @error('description') <p class="text-red-500 text-xs mt-1.5">{{ $message }}</p> @enderror
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label class="block text-sm font-semibold text-slate-700 mb-2" for="link">Live Link <span class="text-slate-400 font-normal">(Optional)</span></label>
                <input class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-lg focus:bg-white focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-all sm:text-sm" id="link" name="link" type="url" value="{{ old('link', $project->link) }}">
                @error('link') <p class="text-red-500 text-xs mt-1.5">{{ $message }}</p> @enderror
            </div>

            <div>
                <label class="block text-sm font-semibold text-slate-700 mb-2" for="images">Project Images <span class="text-slate-400 font-normal">(leave blank to keep current)</span></label>
                <input class="w-full px-4 py-2 bg-slate-50 border border-slate-200 rounded-lg focus:bg-white focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-all sm:text-sm file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100" id="images" name="images[]" type="file" multiple accept="image/*">
                @error('images') <p class="text-red-500 text-xs mt-1.5">{{ $message }}</p> @enderror
                @error('images.*') <p class="text-red-500 text-xs mt-1.5">{{ $message }}</p> @enderror
            </div>
        </div>

        <div class="pt-4 flex items-center justify-end gap-3 border-t border-slate-100 mt-6">
            <a href="{{ route('admin.projects.index') }}" class="px-5 py-2.5 text-sm font-semibold text-slate-600 hover:bg-slate-100 rounded-lg transition-colors">
                Cancel
            </a>
            <button class="px-6 py-2.5 bg-indigo-600 hover:bg-indigo-700 text-white text-sm font-semibold rounded-lg shadow-sm transition-colors focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" type="submit">
                Save Changes
            </button>
        </div>
    </form>
</div>
@endsection
