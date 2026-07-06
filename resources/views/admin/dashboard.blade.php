@extends('admin.layout')

@section('header_title', 'Dashboard Overview')

@section('content')
<div class="mb-8">
    <h2 class="text-2xl font-bold text-slate-800 mb-2">Welcome back, Artha!</h2>
    <p class="text-slate-500">Here's what's happening with your portfolio today.</p>
</div>

<!-- Stats Grid -->
<div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
    <!-- Projects Stat -->
    <div class="bg-white rounded-2xl p-6 shadow-[0_2px_10px_-3px_rgba(6,81,237,0.1)] border border-slate-100 flex items-center justify-between hover:shadow-[0_8px_30px_rgb(0,0,0,0.04)] transition-all duration-300">
        <div>
            <p class="text-sm font-semibold text-slate-500 uppercase tracking-wider mb-1">Total Projects</p>
            <h3 class="text-4xl font-bold text-slate-800">{{ $projectCount ?? 0 }}</h3>
        </div>
        <div class="w-14 h-14 rounded-full bg-indigo-50 flex items-center justify-center">
            <span class="material-symbols-outlined text-indigo-600 text-[32px]">work</span>
        </div>
    </div>

    <!-- Skills Stat -->
    <div class="bg-white rounded-2xl p-6 shadow-[0_2px_10px_-3px_rgba(6,81,237,0.1)] border border-slate-100 flex items-center justify-between hover:shadow-[0_8px_30px_rgb(0,0,0,0.04)] transition-all duration-300">
        <div>
            <p class="text-sm font-semibold text-slate-500 uppercase tracking-wider mb-1">Total Skills</p>
            <h3 class="text-4xl font-bold text-slate-800">{{ $skillCount ?? 0 }}</h3>
        </div>
        <div class="w-14 h-14 rounded-full bg-emerald-50 flex items-center justify-center">
            <span class="material-symbols-outlined text-emerald-600 text-[32px]">code</span>
        </div>
    </div>
</div>

<!-- Quick Actions -->
<div class="bg-white rounded-2xl p-6 md:p-8 shadow-[0_2px_10px_-3px_rgba(6,81,237,0.1)] border border-slate-100">
    <h3 class="text-lg font-bold text-slate-800 mb-4">Quick Actions</h3>
    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
        <a href="{{ route('admin.projects.create') }}" class="group flex items-center gap-4 p-4 rounded-xl border border-slate-200 hover:border-indigo-300 hover:bg-indigo-50 transition-all duration-300">
            <div class="w-10 h-10 rounded-lg bg-indigo-100 text-indigo-600 flex items-center justify-center group-hover:bg-indigo-600 group-hover:text-white transition-colors">
                <span class="material-symbols-outlined text-[20px]">add</span>
            </div>
            <div>
                <h4 class="text-sm font-bold text-slate-800 group-hover:text-indigo-700">Add New Project</h4>
                <p class="text-xs text-slate-500 mt-0.5">Publish a new case study</p>
            </div>
        </a>

        <a href="{{ route('admin.skills.create') }}" class="group flex items-center gap-4 p-4 rounded-xl border border-slate-200 hover:border-emerald-300 hover:bg-emerald-50 transition-all duration-300">
            <div class="w-10 h-10 rounded-lg bg-emerald-100 text-emerald-600 flex items-center justify-center group-hover:bg-emerald-600 group-hover:text-white transition-colors">
                <span class="material-symbols-outlined text-[20px]">add</span>
            </div>
            <div>
                <h4 class="text-sm font-bold text-slate-800 group-hover:text-emerald-700">Add New Skill</h4>
                <p class="text-xs text-slate-500 mt-0.5">Showcase a new tool or language</p>
            </div>
        </a>
    </div>
</div>
@endsection
