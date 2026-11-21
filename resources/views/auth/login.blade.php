<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Sign in | CarePoint</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen bg-[#f3f7f5] font-sans antialiased">
    <main class="grid min-h-screen lg:grid-cols-[minmax(430px,.88fr)_minmax(520px,1.12fr)]">
        <section class="cp-auth cp-auth-grid relative hidden overflow-hidden px-12 py-10 text-[#17352c] lg:flex lg:flex-col">
            <div class="absolute right-[-160px] top-[-180px] h-[420px] w-[420px] rounded-full border border-[#176b55]/10"></div>
            <div class="absolute bottom-[-220px] left-[-180px] h-[480px] w-[480px] rounded-full border border-[#176b55]/10"></div>

            <a href="{{ route('login') }}" class="relative z-10 flex items-center gap-3">
                <span class="flex h-11 w-11 items-center justify-center rounded-[12px] border border-[#bfd4cc] bg-white text-[#176b55] shadow-[0_8px_24px_rgba(31,62,52,.08)]">
                    <svg class="h-7 w-7" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" aria-hidden="true"><path stroke-linecap="round" d="M12 4v16M4 12h16"/><rect x="3" y="3" width="18" height="18" rx="5"/></svg>
                </span>
                <span>
                    <span class="block text-xl font-extrabold tracking-tight">CarePoint</span>
                    <span class="block text-[9px] font-bold uppercase tracking-[0.18em] text-[#71807c]">Clinical operations</span>
                </span>
            </a>

            <div class="relative z-10 my-auto max-w-[520px]">
                <p class="cp-kicker">Care team portal</p>
                <h1 class="mt-5 max-w-[480px] text-[52px] font-extrabold leading-[1.02] tracking-[-0.045em]">A clear view of every visit.</h1>
                <p class="mt-6 max-w-md text-[15px] leading-7 text-[#5f716b]">Coordinate doctors, patients, and appointments in one precise, dependable workspace.</p>
                <div class="mt-10 grid max-w-md grid-cols-3 gap-3">
                    <div class="rounded-[14px] border border-[#d2e0da] bg-white/80 p-4">
                        <p class="text-[18px] font-extrabold">One view</p>
                        <p class="mt-1 text-[11px] text-[#71807c]">Entire care schedule</p>
                    </div>
                    <div class="rounded-[14px] border border-[#d2e0da] bg-white/80 p-4">
                        <p class="text-[18px] font-extrabold">Fast</p>
                        <p class="mt-1 text-[11px] text-[#71807c]">Daily workflow</p>
                    </div>
                    <div class="rounded-[14px] border border-[#d2e0da] bg-white/80 p-4">
                        <p class="text-[18px] font-extrabold">Secure</p>
                        <p class="mt-1 text-[11px] text-[#71807c]">Account access</p>
                    </div>
                </div>
            </div>
            <p class="relative z-10 text-[11px] font-semibold text-[#71807c]">CarePoint Clinic Management</p>
        </section>

        <section class="relative flex items-center justify-center px-5 py-8 sm:px-10">
            <div class="absolute right-7 top-7 hidden items-center gap-2 text-[13px] text-[#82908c] sm:flex">
                <span>New to CarePoint?</span>
                <a href="{{ route('register') }}" class="font-extrabold text-[#176b55] hover:text-[#11523f]">Create account</a>
            </div>
            <div class="w-full max-w-[420px]">
                <div class="mb-8 flex items-center gap-3 lg:hidden">
                    <span class="flex h-10 w-10 items-center justify-center rounded-[11px] bg-[#176b55] text-white">
                        <svg class="h-6 w-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" aria-hidden="true"><path stroke-linecap="round" d="M12 4v16M4 12h16"/><rect x="3" y="3" width="18" height="18" rx="5"/></svg>
                    </span>
                    <span class="text-lg font-extrabold text-[#1a3a31]">CarePoint</span>
                </div>
                <p class="cp-kicker">Account access</p>
                <h2 class="mt-3 text-[36px] font-extrabold tracking-[-0.04em] text-[#17352c]">Welcome back</h2>
                <p class="mt-2 text-[14px] text-[#71807c]">Sign in to open your clinic workspace.</p>

                <form method="POST" action="{{ route('login') }}" class="mt-8 space-y-5" onsubmit="const button=this.querySelector('[type=submit]'); button.disabled=true; button.querySelector('.button-label').textContent='Signing in...';">
                    @csrf
                    @if ($errors->has('email'))
                        <div class="rounded-[10px] border border-[#ecc9c3] bg-[#fbefed] px-4 py-3 text-[13px] font-semibold text-[#9a5147]" role="alert">{{ $errors->first('email') }}</div>
                    @endif
                    <div>
                        <label class="mb-2 block text-[13px] font-extrabold text-[#40514c]" for="email">Email address</label>
                        <input class="cp-field h-12 px-4 text-[14px]" id="email" name="email" type="email" value="{{ old('email') }}" required autofocus autocomplete="email" placeholder="name@clinic.com">
                    </div>
                    <div>
                        <label class="mb-2 block text-[13px] font-extrabold text-[#40514c]" for="password">Password</label>
                        <input class="cp-field h-12 px-4 text-[14px]" id="password" name="password" type="password" required autocomplete="current-password" placeholder="Enter your password">
                    </div>
                    <label class="flex cursor-pointer items-center gap-2.5 text-[13px] font-semibold text-[#71807c]">
                        <input class="h-4 w-4 rounded border-[#cbd7d3] text-[#176b55] focus:ring-[#9dc4b6]" type="checkbox" name="remember" value="1">
                        Keep me signed in
                    </label>
                    <button class="cp-primary flex h-12 w-full items-center justify-center gap-2 rounded-[10px] px-5 text-[13px] font-extrabold disabled:cursor-not-allowed disabled:opacity-60" type="submit">
                        <span class="button-label">Sign in</span>
                        <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M5 12h14m-5-5 5 5-5 5"/></svg>
                    </button>
                </form>
                <p class="mt-7 text-center text-[13px] text-[#82908c] sm:hidden">New to CarePoint? <a href="{{ route('register') }}" class="font-extrabold text-[#176b55]">Create account</a></p>
            </div>
        </section>
    </main>
</body>
</html>
