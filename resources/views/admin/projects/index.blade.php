@extends('admin.layout')

@section('header_title', 'Projects')

@section('content')
<div class="mb-6 flex justify-between items-center">
    <div>
        <h2 class="text-xl font-bold text-slate-800">All Projects</h2>
        <p class="text-sm text-slate-500 mt-1">Manage your portfolio projects.</p>
    </div>
    <a href="{{ route('admin.projects.create') }}" class="inline-flex items-center gap-2 bg-indigo-600 hover:bg-indigo-700 text-white font-semibold py-2.5 px-5 rounded-lg transition-colors shadow-sm">
        <span class="material-symbols-outlined text-[20px]">add</span>
        New Project
    </a>
</div>

<div class="bg-white shadow-[0_2px_10px_-3px_rgba(6,81,237,0.1)] border border-slate-100 rounded-2xl overflow-hidden">
    <div class="overflow-x-auto">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="bg-slate-50/50 border-b border-slate-100 text-xs uppercase tracking-wider text-slate-500 font-semibold">
                    <th class="py-4 px-6">ID</th>
                    <th class="py-4 px-6">Title</th>
                    <th class="py-4 px-6">Category</th>
                    <th class="py-4 px-6 text-right">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-100 text-sm">
                @forelse($projects as $project)
                <tr class="hover:bg-slate-50/50 transition-colors group">
                    <td class="py-4 px-6 text-slate-400 font-medium">#{{ $project->id }}</td>
                    <td class="py-4 px-6">
                        <div class="font-bold text-slate-800">{{ $project->title }}</div>
                    </td>
                    <td class="py-4 px-6">
                        <span class="inline-flex items-center px-2.5 py-1 rounded-full text-[11px] font-semibold tracking-wide uppercase bg-slate-100 text-slate-600">
                            {{ $project->category }}
                        </span>
                    </td>
                    <td class="py-4 px-6">
                        <div class="flex items-center justify-end gap-3 opacity-0 group-hover:opacity-100 transition-opacity">
                            <a href="{{ route('admin.projects.edit', $project) }}" class="p-2 text-slate-400 hover:text-indigo-600 hover:bg-indigo-50 rounded-lg transition-colors" title="Edit">
                                <span class="material-symbols-outlined text-[20px]">edit</span>
                            </a>
                            <form action="{{ route('admin.projects.destroy', $project) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this project?');" class="inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="p-2 text-slate-400 hover:text-red-600 hover:bg-red-50 rounded-lg transition-colors" title="Delete">
                                    <span class="material-symbols-outlined text-[20px]">delete</span>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="py-12 px-6 text-center text-slate-500">
                        <span class="material-symbols-outlined text-4xl text-slate-300 mb-3 block">inbox</span>
                        <p class="font-medium">No projects found.</p>
                        <p class="text-sm mt-1">Get started by creating a new project.</p>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
