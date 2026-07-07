@extends('admin.layout')

@section('header_title', 'Messages')

@section('content')
<div class="mb-6 flex justify-between items-end">
    <div>
        <h2 class="text-xl font-bold text-slate-800">Inbox</h2>
        <p class="text-sm text-slate-500 mt-1">Manage messages sent from your portfolio contact form.</p>
    </div>
</div>

<div class="bg-white shadow-[0_2px_10px_-3px_rgba(6,81,237,0.1)] border border-slate-100 rounded-2xl overflow-hidden">
    @if($messages->count() > 0)
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-slate-50/50 border-b border-slate-100">
                        <th class="py-4 px-6 text-xs font-semibold text-slate-500 uppercase tracking-wider">Status</th>
                        <th class="py-4 px-6 text-xs font-semibold text-slate-500 uppercase tracking-wider">Name</th>
                        <th class="py-4 px-6 text-xs font-semibold text-slate-500 uppercase tracking-wider">Email</th>
                        <th class="py-4 px-6 text-xs font-semibold text-slate-500 uppercase tracking-wider">Date</th>
                        <th class="py-4 px-6 text-xs font-semibold text-slate-500 uppercase tracking-wider text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    @foreach($messages as $message)
                    <tr class="hover:bg-slate-50/80 transition-colors {{ !$message->is_read ? 'bg-indigo-50/30' : '' }}">
                        <td class="py-4 px-6">
                            @if(!$message->is_read)
                                <span class="inline-flex items-center gap-1 px-2.5 py-1 rounded-full text-xs font-medium bg-indigo-100 text-indigo-700">
                                    <span class="w-1.5 h-1.5 rounded-full bg-indigo-500"></span>
                                    New
                                </span>
                            @else
                                <span class="inline-flex items-center gap-1 px-2.5 py-1 rounded-full text-xs font-medium bg-slate-100 text-slate-600">
                                    Read
                                </span>
                            @endif
                        </td>
                        <td class="py-4 px-6">
                            <p class="text-sm font-semibold text-slate-800 {{ !$message->is_read ? 'font-bold' : '' }}">{{ $message->name }}</p>
                        </td>
                        <td class="py-4 px-6">
                            <p class="text-sm text-slate-600">{{ $message->email }}</p>
                        </td>
                        <td class="py-4 px-6">
                            <p class="text-sm text-slate-500">{{ $message->created_at->format('M d, Y') }}</p>
                            <p class="text-xs text-slate-400">{{ $message->created_at->format('H:i') }}</p>
                        </td>
                        <td class="py-4 px-6 text-right">
                            <div class="flex items-center justify-end gap-2">
                                <a href="{{ route('admin.messages.show', $message) }}" class="p-2 text-slate-400 hover:text-indigo-600 hover:bg-indigo-50 rounded-lg transition-colors" title="View Message">
                                    <span class="material-symbols-outlined text-[20px]">visibility</span>
                                </a>
                                <form action="{{ route('admin.messages.destroy', $message) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this message?');" class="inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="p-2 text-slate-400 hover:text-red-600 hover:bg-red-50 rounded-lg transition-colors" title="Delete Message">
                                        <span class="material-symbols-outlined text-[20px]">delete</span>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @else
        <div class="p-12 text-center flex flex-col items-center justify-center">
            <div class="w-16 h-16 bg-slate-50 rounded-full flex items-center justify-center mb-4 text-slate-300">
                <span class="material-symbols-outlined text-4xl">inbox</span>
            </div>
            <h3 class="text-lg font-semibold text-slate-800">No messages yet</h3>
            <p class="text-sm text-slate-500 mt-1 max-w-sm">When someone contacts you through your portfolio, their messages will appear here.</p>
        </div>
    @endif
</div>
@endsection
