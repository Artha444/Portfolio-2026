@extends('admin.layout')

@section('header_title', 'Skills')

@section('content')
<div class="mb-6 flex justify-between items-center">
    <div>
        <h2 class="text-xl font-bold text-slate-800">All Skills</h2>
        <p class="text-sm text-slate-500 mt-1">Manage your programming languages and tools.</p>
    </div>
    <a href="{{ route('admin.skills.create') }}" class="inline-flex items-center gap-2 bg-indigo-600 hover:bg-indigo-700 text-white font-semibold py-2.5 px-5 rounded-lg transition-colors shadow-sm">
        <span class="material-symbols-outlined text-[20px]">add</span>
        New Skill
    </a>
</div>

<div class="mb-6 flex gap-4">
    <div class="bg-indigo-50 border border-indigo-100 rounded-xl p-4 flex-1">
        <div class="text-sm text-indigo-600 font-semibold mb-1">Top Row Skills</div>
        <div class="text-2xl font-bold text-indigo-900">{{ $topCount }}</div>
    </div>
    <div class="bg-emerald-50 border border-emerald-100 rounded-xl p-4 flex-1">
        <div class="text-sm text-emerald-600 font-semibold mb-1">Bottom Row Skills</div>
        <div class="text-2xl font-bold text-emerald-900">{{ $bottomCount }}</div>
    </div>
</div>

<div class="bg-white shadow-[0_2px_10px_-3px_rgba(6,81,237,0.1)] border border-slate-100 rounded-2xl overflow-hidden">
    <div class="overflow-x-auto">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="bg-slate-50/50 border-b border-slate-100 text-xs uppercase tracking-wider text-slate-500 font-semibold">
                    <th class="py-4 px-6">ID</th>
                    <th class="py-4 px-6">Skill Name</th>
                    <th class="py-4 px-6">Position</th>
                    <th class="py-4 px-6 text-right">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-100 text-sm">
                @forelse($skills as $skill)
                <tr class="hover:bg-slate-50/50 transition-colors group">
                    <td class="py-4 px-6 text-slate-400 font-medium">#{{ $skill->id }}</td>
                    <td class="py-4 px-6">
                        <div class="font-bold text-slate-800 flex items-center gap-3">
                            <div class="w-8 h-8 rounded bg-slate-100 flex items-center justify-center text-slate-500 font-bold text-xs uppercase">
                                {{ substr($skill->name, 0, 2) }}
                            </div>
                            {{ $skill->name }}
                        </div>
                    </td>

                    <td class="py-4 px-6">
                        <span class="inline-flex items-center px-2.5 py-1 rounded-full text-[11px] font-semibold tracking-wide uppercase 
                            {{ $skill->row_position == 'top' ? 'bg-indigo-50 text-indigo-600' : 'bg-emerald-50 text-emerald-600' }}">
                            {{ $skill->row_position == 'top' ? 'Top Row' : 'Bottom Row' }}
                        </span>
                    </td>
                    <td class="py-4 px-6">
                        <div class="flex items-center justify-end gap-3 opacity-0 group-hover:opacity-100 transition-opacity">
                            <a href="{{ route('admin.skills.edit', $skill) }}" class="p-2 text-slate-400 hover:text-indigo-600 hover:bg-indigo-50 rounded-lg transition-colors" title="Edit">
                                <span class="material-symbols-outlined text-[20px]">edit</span>
                            </a>
                            <form action="{{ route('admin.skills.destroy', $skill) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this skill?');" class="inline-block">
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
                        <span class="material-symbols-outlined text-4xl text-slate-300 mb-3 block">code_off</span>
                        <p class="font-medium">No skills found.</p>
                        <p class="text-sm mt-1">Get started by adding a new skill.</p>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
