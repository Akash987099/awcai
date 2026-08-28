@php
    $isRoute = fn (...$patterns) => request()->routeIs(...$patterns);
@endphp

<aside id="logo-sidebar"
    class="admin-sidebar fixed top-0 left-0 z-40 h-screen w-64 -translate-x-full pt-0 transition-transform sm:translate-x-0"
    aria-label="Sidebar">
    <div class="flex h-full flex-col">
        <div class="flex h-20 items-center border-b border-white/10 px-4">
            <a href="{{ route('user.index') }}" class="block">
                <div class="rounded-2xl border border-white/10 bg-white/5 px-4 py-3 shadow-sm">
                    <p class="text-3xl font-semibold italic tracking-tight text-teal-300">AWC</p>
                    <p class="mt-1 text-xs font-semibold uppercase tracking-[0.32em] text-emerald-200/70">User Panel</p>
                </div>
            </a>
        </div>

        <div class="admin-sidebar flex-1 overflow-y-auto px-4 py-4">
            <div class="mb-6">
                <p class="admin-section-label">Overview</p>
                <ul class="space-y-2">
                    <li>
                        <a href="{{ route('user.index') }}" class="admin-nav-link {{ $isRoute('user.index') ? 'is-active' : '' }}">
                            <svg class="h-5 w-5 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                                    d="M3.75 10.5 12 3l8.25 7.5v9a1.5 1.5 0 0 1-1.5 1.5h-3.75v-6h-6v6H5.25a1.5 1.5 0 0 1-1.5-1.5v-9Z" />
                            </svg>
                            <span>Dashboard</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('user.project.project') }}"
                            class="admin-nav-link {{ $isRoute('user.project.project') ? 'is-active' : '' }}">
                            <svg class="h-5 w-5 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                                    d="M3.75 6.75A2.25 2.25 0 0 1 6 4.5h4.5a2.25 2.25 0 0 1 1.591.659l1.5 1.5A2.25 2.25 0 0 0 15.182 7.5H18A2.25 2.25 0 0 1 20.25 9.75v8.25A2.25 2.25 0 0 1 18 20.25H6A2.25 2.25 0 0 1 3.75 18V6.75Z" />
                            </svg>
                            <span>Projects</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('user.invoices') }}" class="admin-nav-link {{ $isRoute('user.invoices') ? 'is-active' : '' }}">
                            <svg class="h-5 w-5 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                                    d="M7.5 3.75h9A2.25 2.25 0 0 1 18.75 6v12A2.25 2.25 0 0 1 16.5 20.25h-9A2.25 2.25 0 0 1 5.25 18V6A2.25 2.25 0 0 1 7.5 3.75Zm2.25 4.5h4.5m-4.5 3h4.5m-4.5 3h3" />
                            </svg>
                            <span>Invoices</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('user.review.index') }}" class="admin-nav-link {{ $isRoute('user.review.*') ? 'is-active' : '' }}">
                            <svg class="h-5 w-5 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                                    d="m11.48 3.499 2.103 4.261 4.703.684-3.403 3.317.803 4.684L11.48 14.23l-4.206 2.215.803-4.684-3.403-3.317 4.703-.684 2.103-4.261Z" />
                            </svg>
                            <span>Review</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</aside>
