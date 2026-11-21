@extends('layouts.app')

@section('title', 'Doctors')
@section('breadcrumb', 'Doctors')

@section('content')
    <div class="mb-7 flex flex-col gap-5 sm:flex-row sm:items-end sm:justify-between">
        <div>
            <p class="cp-kicker">Care team</p>
            <h1 class="mt-2 text-[32px] font-extrabold tracking-[-0.035em] text-[#17352c]">Doctors</h1>
            <p class="mt-2 text-[13px] text-[#71807c]">Practitioners, rooms, and license details.</p>
        </div>
        <a href="{{ route('doctors.create') }}" class="cp-primary inline-flex h-10 items-center justify-center gap-2 rounded-[9px] px-4 text-[13px] font-extrabold">
            <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><path stroke-linecap="round" d="M12 5v14m-7-7h14"/></svg>
            Add doctor
        </a>
    </div>

    <div class="mb-6 grid grid-cols-1 gap-4 sm:grid-cols-3">
        <section class="cp-card px-5 py-4">
            <p class="text-[11px] font-bold text-[#7e8d88]">Active practitioners</p>
            <div class="mt-2 flex items-end justify-between">
                <p class="text-[26px] font-extrabold tracking-tight text-[#17352c]">{{ $doctors->count() }}</p>
                <span class="mb-1 flex h-8 w-8 items-center justify-center rounded-[9px] bg-[#e7f2ed] text-[#176b55]">
                    <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M16 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2M14 7a4 4 0 1 1-8 0 4 4 0 0 1 8 0Z"/></svg>
                </span>
            </div>
        </section>
        <section class="cp-card px-5 py-4">
            <p class="text-[11px] font-bold text-[#7e8d88]">Rooms assigned</p>
            <div class="mt-2 flex items-end justify-between">
                <p class="text-[26px] font-extrabold tracking-tight text-[#17352c]">{{ $doctors->filter(fn($doctor) => $doctor->specialtyDetail?->clinic_room)->count() }}</p>
                <span class="mb-1 rounded-full border border-[#bdd4ca] bg-[#edf6f1] px-2.5 py-1 text-[10px] font-extrabold text-[#286b57]">Ready</span>
            </div>
        </section>
        <section class="cp-card px-5 py-4">
            <p class="text-[11px] font-bold text-[#7e8d88]">Directory status</p>
            <div class="mt-2 flex items-end justify-between">
                <p class="text-[17px] font-extrabold text-[#17352c]">{{ $doctors->isEmpty() ? 'Setup needed' : 'Up to date' }}</p>
                <span class="mb-1 h-2 w-2 rounded-full {{ $doctors->isEmpty() ? 'bg-[#c58a34]' : 'bg-[#4d9a78]' }}"></span>
            </div>
        </section>
    </div>

    @if ($doctors->isEmpty())
        <section class="cp-card px-6 py-16 text-center">
            <div class="mx-auto flex h-14 w-14 items-center justify-center rounded-[14px] bg-[#edf3f0] text-[#176b55]">
                <svg class="h-7 w-7" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M16 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2m16 0v-2a4 4 0 0 0-3-3.87M14 3.13a4 4 0 0 1 0 7.75M14 7a4 4 0 1 1-8 0 4 4 0 0 1 8 0Z"/>
                </svg>
            </div>
            <h2 class="mt-5 text-[16px] font-extrabold text-[#17352c]">No doctors yet</h2>
            <p class="mx-auto mt-2 max-w-sm text-[13px] leading-6 text-[#71807c]">Add your first practitioner and specialty information to begin.</p>
            <a href="{{ route('doctors.create') }}" class="cp-primary mt-6 inline-flex h-10 items-center rounded-[9px] px-4 text-[13px] font-extrabold">Add your first doctor</a>
        </section>
    @else
        <div class="grid grid-cols-1 gap-4 md:grid-cols-2 xl:grid-cols-3">
            @foreach ($doctors as $doctor)
                <article class="cp-card overflow-hidden transition duration-200 hover:-translate-y-0.5 hover:shadow-[0_16px_38px_rgba(31,62,52,.09)]">
                    <div class="flex items-start gap-4 border-b border-[#edf2ef] p-5">
                        <div class="cp-avatar flex h-12 w-12 shrink-0 items-center justify-center rounded-[12px] text-[14px] font-extrabold">
                            {{ collect(explode(' ', $doctor->name))->map(fn ($part) => mb_substr($part, 0, 1))->take(2)->join('') }}
                        </div>
                        <div class="min-w-0 flex-1">
                            <h2 class="truncate text-[14px] font-extrabold text-[#17352c]">{{ $doctor->name }}</h2>
                            <p class="mt-1 truncate text-[12px] text-[#71807c]">{{ $doctor->email }}</p>
                        </div>
                        <span class="mt-1 h-2 w-2 shrink-0 rounded-full bg-[#63a78b]"></span>
                    </div>
                    <div class="space-y-4 p-5">
                        <p class="cp-kicker !text-[9px]">Specialty details</p>
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <p class="text-[10px] font-bold text-[#8a9894]">License</p>
                                <p class="mt-1 break-all text-[12px] font-extrabold text-[#40514c]">{{ $doctor->specialtyDetail?->license_number ?? 'Not provided' }}</p>
                            </div>
                            <div>
                                <p class="text-[10px] font-bold text-[#8a9894]">Clinic room</p>
                                <p class="mt-1 text-[12px] font-extrabold text-[#40514c]">{{ $doctor->specialtyDetail?->clinic_room ?? 'Not assigned' }}</p>
                            </div>
                        </div>
                    </div>
                </article>
            @endforeach
        </div>
    @endif
@endsection
