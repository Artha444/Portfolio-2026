@extends('admin.layout')

@section('header_title', 'Message Details')

@section('content')
<div class="mb-6 flex justify-between items-center">
    <div>
        <h2 class="text-xl font-bold text-slate-800">Message from {{ $message->name }}</h2>
        <p class="text-sm text-slate-500 mt-1">Received on {{ $message->created_at->format('F d, Y \a\t h:i A') }}</p>
    </div>
    <a href="{{ route('admin.messages.index') }}" class="inline-flex items-center gap-2 text-slate-500 hover:text-slate-800 transition-colors">
        <span class="material-symbols-outlined text-[20px]">arrow_back</span>
        Back to Inbox
    </a>
</div>

<div class="bg-white shadow-[0_2px_10px_-3px_rgba(6,81,237,0.1)] border border-slate-100 rounded-2xl overflow-hidden max-w-4xl">
    <div class="p-6 md:p-8">
        <div class="flex items-start justify-between border-b border-slate-100 pb-6 mb-6">
            <div class="flex items-center gap-4">
                <div class="w-12 h-12 rounded-full bg-indigo-100 text-indigo-700 flex items-center justify-center text-lg font-bold">
                    {{ strtoupper(substr($message->name, 0, 1)) }}
                </div>
                <div>
                    <h3 class="font-bold text-slate-800 text-lg">{{ $message->name }}</h3>
                    <div class="flex items-center gap-2 text-sm text-slate-500">
                        <span class="material-symbols-outlined text-[16px]">mail</span>
                        <a href="mailto:{{ $message->email }}" class="hover:text-indigo-600 transition-colors">{{ $message->email }}</a>
                    </div>
                </div>
            </div>
            
            <a href="mailto:{{ $message->email }}?subject=Reply%20from%20Artha.dev" class="inline-flex items-center gap-2 px-5 py-2.5 bg-indigo-600 hover:bg-indigo-700 text-white text-sm font-semibold rounded-lg shadow-sm transition-all focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                <span class="material-symbols-outlined text-[18px]">reply</span>
                Reply via Email
            </a>
        </div>
        
        <div class="prose prose-slate max-w-none">
            <div class="text-slate-700 leading-relaxed whitespace-pre-wrap font-medium p-4 bg-slate-50 rounded-xl border border-slate-100">
{{ $message->message }}
            </div>
        </div>
        
        <div class="mt-8 pt-6 border-t border-slate-100 flex justify-end">
            <form action="{{ route('admin.messages.destroy', $message) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this message?');">
                @csrf
                @method('DELETE')
                <button type="submit" class="inline-flex items-center gap-2 px-5 py-2.5 bg-white border border-red-200 hover:bg-red-50 text-red-600 text-sm font-semibold rounded-lg transition-colors">
                    <span class="material-symbols-outlined text-[18px]">delete</span>
                    Delete Message
                </button>
            </form>
        </div>
    </div>
</div>
@endsection
