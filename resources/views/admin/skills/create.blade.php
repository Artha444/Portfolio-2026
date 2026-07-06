@extends('admin.layout')

@section('header_title', 'Create Skill')

@section('content')
<div class="mb-6 flex justify-between items-center">
    <div>
        <h2 class="text-xl font-bold text-slate-800">Add New Skill</h2>
        <p class="text-sm text-slate-500 mt-1">Add a new tool or language to your arsenal.</p>
    </div>
    <a href="{{ route('admin.skills.index') }}" class="inline-flex items-center gap-2 text-slate-500 hover:text-slate-800 transition-colors">
        <span class="material-symbols-outlined text-[20px]">arrow_back</span>
        Back to Skills
    </a>
</div>

<div class="bg-white shadow-[0_2px_10px_-3px_rgba(6,81,237,0.1)] border border-slate-100 rounded-2xl overflow-hidden p-6 md:p-8 max-w-2xl">
    <form action="{{ route('admin.skills.store') }}" method="POST" class="space-y-6">
        @csrf
        
        <div>
            <label class="block text-sm font-semibold text-slate-700 mb-2" for="name">Skill Name</label>
            <input class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-lg focus:bg-white focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-all sm:text-sm" id="name" name="name" type="text" value="{{ old('name') }}" placeholder="e.g. PHP, Figma, Vue.js" required>
            @error('name') <p class="text-red-500 text-xs mt-1.5">{{ $message }}</p> @enderror
        </div>

        <div>
            <label class="block text-sm font-semibold text-slate-700 mb-2" for="type">Skill Type</label>
            <div class="relative">
                <select class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-lg focus:bg-white focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-all sm:text-sm appearance-none" id="type" name="type" required>
                    <option value="" disabled selected>Select a category...</option>
                    <option value="development" {{ old('type') == 'development' ? 'selected' : '' }}>Development</option>
                    <option value="design_tool" {{ old('type') == 'design_tool' ? 'selected' : '' }}>Design Tool</option>
                </select>
                <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-4 text-slate-500">
                    <span class="material-symbols-outlined text-[20px]">expand_more</span>
                </div>
            </div>
            @error('type') <p class="text-red-500 text-xs mt-1.5">{{ $message }}</p> @enderror
        </div>

        <div class="pt-4 flex items-center justify-end gap-3 border-t border-slate-100 mt-6">
            <a href="{{ route('admin.skills.index') }}" class="px-5 py-2.5 text-sm font-semibold text-slate-600 hover:bg-slate-100 rounded-lg transition-colors">
                Cancel
            </a>
            <button class="px-6 py-2.5 bg-indigo-600 hover:bg-indigo-700 text-white text-sm font-semibold rounded-lg shadow-sm transition-colors focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" type="submit">
                Add Skill
            </button>
        </div>
    </form>
</div>
@endsection
