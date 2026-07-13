<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Portfolio</title>
    <!-- Tailwind CSS via CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    
    <!-- Alpine.js for basic interactivity if needed -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background-color: #f8fafc; /* Tailwind slate-50 */
        }
        .material-symbols-outlined {
            font-variation-settings:
            'FILL' 1,
            'wght' 400,
            'GRAD' 0,
            'opsz' 24
        }
        /* Custom scrollbar */
        ::-webkit-scrollbar {
            width: 8px;
            height: 8px;
        }
        ::-webkit-scrollbar-track {
            background: transparent;
        }
        ::-webkit-scrollbar-thumb {
            background: #cbd5e1;
            border-radius: 4px;
        }
        ::-webkit-scrollbar-thumb:hover {
            background: #94a3b8;
        }
    </style>
</head>
<body class="text-slate-800 antialiased h-screen flex overflow-hidden">

    <!-- Sidebar -->
    <aside class="w-64 bg-slate-900 text-white flex flex-col transition-all duration-300 relative z-20">
        <div class="h-16 flex items-center px-6 border-b border-slate-800">
            <span class="text-xl font-bold tracking-tight text-white flex items-center gap-2">
                <span class="material-symbols-outlined text-indigo-400">dashboard</span>
                Admin Panel
            </span>
        </div>

        <nav class="flex-1 px-4 py-6 space-y-2 overflow-y-auto">
            <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-3 px-4 py-3 rounded-lg transition-colors {{ request()->routeIs('admin.dashboard') ? 'bg-indigo-600 text-white' : 'text-slate-300 hover:bg-slate-800 hover:text-white' }}">
                <span class="material-symbols-outlined text-[20px]">home</span>
                <span class="font-medium text-sm">Overview</span>
            </a>
            
            <p class="px-4 pt-4 pb-2 text-xs font-semibold text-slate-500 uppercase tracking-wider">Manage Content</p>

            <a href="{{ route('admin.projects.index') }}" class="flex items-center gap-3 px-4 py-3 rounded-lg transition-colors {{ request()->routeIs('admin.projects.*') ? 'bg-indigo-600 text-white' : 'text-slate-300 hover:bg-slate-800 hover:text-white' }}">
                <span class="material-symbols-outlined text-[20px]">work</span>
                <span class="font-medium text-sm">Projects</span>
            </a>

            <a href="{{ route('admin.skills.index') }}" class="flex items-center gap-3 px-4 py-3 rounded-lg transition-colors {{ request()->routeIs('admin.skills.*') ? 'bg-indigo-600 text-white' : 'text-slate-300 hover:bg-slate-800 hover:text-white' }}">
                <span class="material-symbols-outlined text-[20px]">code</span>
                <span class="font-medium text-sm">Skills</span>
            </a>

            <p class="px-4 pt-4 pb-2 text-xs font-semibold text-slate-500 uppercase tracking-wider">Communication</p>

            <a href="{{ route('admin.messages.index') }}" class="flex items-center justify-between px-4 py-3 rounded-lg transition-colors {{ request()->routeIs('admin.messages.*') ? 'bg-indigo-600 text-white' : 'text-slate-300 hover:bg-slate-800 hover:text-white' }}">
                <div class="flex items-center gap-3">
                    <span class="material-symbols-outlined text-[20px]">inbox</span>
                    <span class="font-medium text-sm">Messages</span>
                </div>
                @php
                    $unreadCount = \App\Models\Message::where('is_read', false)->count();
                @endphp
                @if($unreadCount > 0)
                <span class="bg-indigo-500 text-white text-[10px] font-bold px-2 py-0.5 rounded-full">{{ $unreadCount }}</span>
                @endif
            </a>
        </nav>

        <div class="p-4 border-t border-slate-800">
            <a href="{{ route('welcome') }}" target="_blank" class="flex items-center gap-3 px-4 py-3 rounded-lg text-slate-300 hover:bg-slate-800 hover:text-white transition-colors">
                <span class="material-symbols-outlined text-[20px]">open_in_new</span>
                <span class="font-medium text-sm">View Live Site</span>
            </a>
        </div>
    </aside>

    <!-- Main Content wrapper -->
    <div class="flex-1 flex flex-col h-screen overflow-hidden relative z-10">
        <!-- Top Navbar -->
        <header class="h-16 bg-white border-b border-slate-200 flex items-center justify-between px-6 z-10">
            <div>
                <h1 class="text-xl font-semibold text-slate-800">@yield('header_title', 'Dashboard')</h1>
            </div>
            <div class="flex items-center gap-6">
                <div class="flex items-center gap-2">
                    <div class="w-9 h-9 rounded-full bg-indigo-100 text-indigo-700 flex items-center justify-center font-bold">
                        A
                    </div>
                    <div class="hidden md:block">
                        <p class="text-sm font-semibold text-slate-700">Artha Admin</p>
                    </div>
                </div>
                <div class="border-l border-slate-200 pl-6">
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="text-sm font-medium text-slate-500 hover:text-red-600 transition-colors flex items-center gap-2">
                            <span class="material-symbols-outlined text-[18px]">logout</span>
                            Logout
                        </button>
                    </form>
                </div>
            </div>
        </header>

        <!-- Main scrollable area -->
        <main class="flex-1 overflow-x-hidden overflow-y-auto bg-slate-50 p-6 md:p-8">
            <div class="max-w-7xl mx-auto">
                <!-- Alerts -->
                @if(session('success'))
                    <div class="mb-6 bg-emerald-50 border border-emerald-200 text-emerald-800 px-4 py-3 rounded-xl flex items-center gap-3 shadow-sm">
                        <span class="material-symbols-outlined text-emerald-500">check_circle</span>
                        <span class="text-sm font-medium">{{ session('success') }}</span>
                    </div>
                @endif
                @if(session('error'))
                    <div class="mb-6 bg-red-50 border border-red-200 text-red-800 px-4 py-3 rounded-xl flex items-center gap-3 shadow-sm">
                        <span class="material-symbols-outlined text-red-500">error</span>
                        <span class="text-sm font-medium">{{ session('error') }}</span>
                    </div>
                @endif

                <!-- Content Slot -->
                @yield('content')
            </div>
        </main>
    </div>

    @stack('scripts')
</body>
</html>
