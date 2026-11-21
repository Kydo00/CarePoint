<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Overview') | CarePoint</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>
<body class="min-h-screen bg-[#f3f7f5] font-sans text-[#12211d] antialiased" x-data="{ sidebarOpen: false }" @keydown.escape.window="sidebarOpen = false">
    <div class="cp-shell min-h-screen">
        <div x-cloak x-show="sidebarOpen" x-transition.opacity class="fixed inset-0 z-40 bg-[#102a24]/45 backdrop-blur-sm lg:hidden" @click="sidebarOpen = false"></div>

        <aside
            class="cp-sidebar fixed inset-y-0 left-0 z-50 flex w-72 flex-col text-white transition-transform duration-300 lg:translate-x-0"
            :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full'"
            aria-label="Main navigation"
        >
            <div class="flex h-20 items-center gap-3 px-6">
                <a href="{{ route('doctors.index') }}" class="flex items-center gap-3">
                    <span class="flex h-10 w-10 items-center justify-center rounded-[12px] border border-white/15 bg-white/10 text-[#9ed1bd] shadow-[0_8px_24px_rgba(0,0,0,.12)]">
                        <svg class="h-6 w-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" aria-hidden="true">
                            <path stroke-linecap="round" d="M12 4v16M4 12h16"/>
                            <rect x="3" y="3" width="18" height="18" rx="5"/>
                        </svg>
                    </span>
                    <span>
                        <span class="block text-[17px] font-extrabold tracking-tight">CarePoint</span>
                        <span class="mt-0.5 block text-[10px] font-bold uppercase tracking-[0.16em] text-[#91aaa1]">Clinical operations</span>
                    </span>
                </a>
                <button type="button" class="ml-auto rounded-lg p-2 text-[#91aaa1] hover:bg-white/10 hover:text-white lg:hidden" @click="sidebarOpen = false" aria-label="Close navigation">
                    <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" aria-hidden="true"><path stroke-linecap="round" d="m6 6 12 12M18 6 6 18"/></svg>
                </button>
            </div>

            <div class="mx-6 h-px bg-white/8"></div>

            <div class="px-4 pt-7">
                <p class="px-3 text-[10px] font-extrabold uppercase tracking-[0.19em] text-[#779087]">Workspace</p>
                <nav class="mt-3 space-y-1.5">
                    <a href="{{ route('doctors.index') }}" @click="sidebarOpen = false" class="cp-nav-link flex items-center gap-3 rounded-[10px] px-3 py-3 text-sm font-bold transition {{ request()->routeIs('doctors.*', 'home') ? 'active' : '' }}">
                        <svg class="h-[18px] w-[18px]" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M16 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2m16 0v-2a4 4 0 0 0-3-3.87M14 3.13a4 4 0 0 1 0 7.75M14 7a4 4 0 1 1-8 0 4 4 0 0 1 8 0Z"/></svg>
                        Doctors
                    </a>
                    <a href="{{ route('patients.index') }}" @click="sidebarOpen = false" class="cp-nav-link flex items-center gap-3 rounded-[10px] px-3 py-3 text-sm font-bold transition {{ request()->routeIs('patients.*') ? 'active' : '' }}">
                        <svg class="h-[18px] w-[18px]" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M20 21a8 8 0 0 0-16 0m12-13a4 4 0 1 1-8 0 4 4 0 0 1 8 0Z"/></svg>
                        Patients
                    </a>
                    <a href="{{ route('appointments.index') }}" @click="sidebarOpen = false" class="cp-nav-link flex items-center gap-3 rounded-[10px] px-3 py-3 text-sm font-bold transition {{ request()->routeIs('appointments.*') ? 'active' : '' }}">
                        <svg class="h-[18px] w-[18px]" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" aria-hidden="true"><rect x="3" y="5" width="18" height="16" rx="2"/><path stroke-linecap="round" d="M16 3v4M8 3v4M3 10h18"/></svg>
                        Appointments
                    </a>
                </nav>
            </div>

            <div class="mt-auto px-4 pb-5">
                <div class="rounded-[14px] border border-white/8 bg-white/[0.045] p-4">
                    <div class="flex items-center gap-3">
                        <div class="cp-avatar flex h-9 w-9 items-center justify-center rounded-[10px] text-xs font-extrabold">
                            {{ collect(explode(' ', auth()->user()->name))->map(fn ($part) => mb_substr($part, 0, 1))->take(2)->join('') }}
                        </div>
                        <div class="min-w-0">
                            <p class="truncate text-xs font-bold text-white">{{ auth()->user()->name }}</p>
                            <p class="mt-0.5 truncate text-[10px] text-[#91aaa1]">{{ auth()->user()->email }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </aside>

        <div class="min-h-screen lg:pl-72">
            <header class="cp-header sticky top-0 z-30">
                <div class="flex h-16 items-center gap-4 px-4 sm:px-6 lg:px-10">
                    <button type="button" class="rounded-[9px] p-2 text-[#60706b] hover:bg-[#edf3f0] lg:hidden" @click="sidebarOpen = true" aria-label="Open navigation">
                        <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" aria-hidden="true"><path stroke-linecap="round" d="M4 6h16M4 12h16M4 18h16"/></svg>
                    </button>
                    <div class="flex min-w-0 items-center gap-2 text-sm">
                        <span class="hidden text-[12px] font-semibold text-[#8a9894] sm:inline">CarePoint</span>
                        <svg class="hidden h-3.5 w-3.5 text-[#bdc8c4] sm:block" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="m9 18 6-6-6-6"/></svg>
                        <span class="truncate text-[13px] font-extrabold text-[#20352f]">@yield('breadcrumb', 'Overview')</span>
                    </div>
                    <div class="ml-auto flex items-center gap-3">
                        <span class="hidden rounded-full border border-[#dce7e3] bg-[#f7faf8] px-3 py-1.5 text-[11px] font-bold text-[#6c7d78] md:inline">Clinic workspace</span>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="cp-secondary inline-flex h-9 items-center gap-2 rounded-[9px] px-3 text-[12px] font-extrabold transition">
                                <svg class="h-3.5 w-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M10 17l5-5-5-5M15 12H3m6-8h10a2 2 0 0 1 2 2v16a2 2 0 0 1-2 2H9"/></svg>
                                Logout
                            </button>
                        </form>
                    </div>
                </div>
            </header>

            <main class="mx-auto max-w-[1400px] px-4 py-7 sm:px-6 lg:px-10 lg:py-9">
                @if (session('success'))
                    <div x-data="{ visible: true }" x-show="visible" x-transition class="mb-6 flex items-start justify-between gap-4 rounded-[12px] border border-[#bdd4ca] bg-[#edf6f1] px-4 py-3 text-sm font-semibold text-[#276b57]" role="status">
                        <span>{{ session('success') }}</span>
                        <button type="button" class="text-[#276b57]/70 hover:text-[#276b57]" @click="visible = false" aria-label="Dismiss notification">Dismiss</button>
                    </div>
                @endif
                @yield('content')
            </main>
        </div>
    </div>
</body>
</html>
