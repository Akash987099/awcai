@php
    $user = Auth::guard('user')->user();
    $profileImage = !empty($user?->profile_image)
        ? asset($user->profile_image)
        : 'https://flowbite.com/docs/images/people/profile-picture-5.jpg';
@endphp

<nav class="admin-topbar fixed top-0 z-50 w-full">
    <div class="h-full px-4 lg:px-6">
        <div class="flex h-full items-center justify-between gap-4">
            <div class="flex h-full min-w-0 items-center gap-3">
                <button data-drawer-target="logo-sidebar" data-drawer-toggle="logo-sidebar" aria-controls="logo-sidebar"
                    type="button"
                    class="inline-flex h-11 w-11 items-center justify-center rounded-2xl border border-white/10 bg-white/5 text-slate-100 shadow-sm transition hover:bg-white/10 focus:outline-none focus:ring-2 focus:ring-teal-300 sm:hidden">
                    <span class="sr-only">Open sidebar</span>
                    <svg class="h-5 w-5" aria-hidden="true" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                            d="M4 7h16M4 12h16M4 17h10" />
                    </svg>
                </button>

                <div class="hidden min-w-0 sm:block">
                    <p class="text-sm text-slate-400">User <span class="mx-1 text-slate-600">/</span> Panel</p>
                    <h1 class="truncate text-2xl font-semibold text-white">Dashboard</h1>
                </div>

                <a href="{{ route('user.index') }}" class="flex items-center gap-3 sm:hidden">
                    <div
                        class="flex h-12 w-12 items-center justify-center rounded-2xl bg-gradient-to-br from-teal-700 to-emerald-500 text-sm font-bold text-white shadow-lg shadow-teal-700/20">
                        AWC
                    </div>
                </a>
            </div>

            <div class="flex items-center gap-3">
                <div class="flex items-center gap-3 rounded-2xl border border-white/10 bg-white/5 px-2 py-2 shadow-sm">
                    <button type="button" class="flex items-center gap-3 rounded-xl px-2 focus:outline-none"
                        aria-expanded="false" data-dropdown-toggle="dropdown-user">
                        <div class="flex h-11 w-11 items-center justify-center rounded-2xl bg-teal-700 text-sm font-bold text-white">
                            {{ strtoupper(substr($user?->name ?? 'U', 0, 1)) }}
                        </div>
                        <img class="hidden h-11 w-11 rounded-2xl border border-slate-200 object-cover" src="{{ $profileImage }}"
                            alt="user photo">
                        <div class="hidden text-left sm:block">
                            <p class="text-[0.68rem] uppercase tracking-[0.18em] text-slate-400">Signed in as</p>
                            <p class="text-sm font-semibold text-white">{{ $user?->name ?? 'Guest' }}</p>
                        </div>
                    </button>
                </div>

                <button class="hidden h-11 w-11 items-center justify-center rounded-2xl border border-white/10 bg-white/5 text-slate-200 transition hover:bg-white/10 lg:inline-flex">
                    <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                            d="M10.5 6h9m-9 6h9m-9 6h9M4.5 6h.008v.008H4.5V6Zm0 6h.008v.008H4.5V12Zm0 6h.008v.008H4.5V18Z" />
                    </svg>
                </button>

                <div class="z-50 hidden w-72 overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-2xl"
                    id="dropdown-user">
                    <div class="bg-gradient-to-r from-teal-700 to-emerald-500 px-5 py-4 text-white">
                        <p class="text-xs font-semibold uppercase tracking-[0.2em] text-emerald-100">Signed In</p>
                        <p class="mt-1 text-base font-semibold">{{ $user?->name ?? 'Guest' }}</p>
                        <p class="text-sm text-emerald-100">{{ $user?->email }}</p>
                    </div>
                    <div class="px-5 py-4">
                        <p class="text-xs font-semibold uppercase tracking-[0.18em] text-slate-400">Status</p>
                        <p class="mt-2 text-sm text-slate-600">Your user session is active.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</nav>
