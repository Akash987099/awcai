@php
    $isRoute = fn (...$patterns) => request()->routeIs(...$patterns);
@endphp

<aside id="logo-sidebar"
    class="admin-sidebar fixed top-0 left-0 z-40 h-screen w-64 -translate-x-full pt-0 transition-transform sm:translate-x-0"
    aria-label="Sidebar">
    <div class="flex h-full flex-col">
        <div class="flex h-20 items-center border-b border-white/10 px-4">
            <a href="{{ route('admin.index') }}" class="block">
                <div class="rounded-2xl border border-white/10 bg-white/5 px-4 py-3 shadow-sm">
                    <p class="text-3xl font-semibold italic tracking-tight text-teal-300">AWC</p>
                    <p class="mt-1 text-xs font-semibold uppercase tracking-[0.32em] text-emerald-200/70">Admin Panel</p>
                </div>
            </a>
        </div>

        <div class="admin-sidebar flex-1 overflow-y-auto px-4 py-4">
            <div class="mb-6">
                <p class="admin-section-label">Overview</p>
                <ul class="space-y-2">
                    <li>
                        <a href="{{ route('admin.index') }}" class="admin-nav-link {{ $isRoute('admin.index') ? 'is-active' : '' }}">
                            <svg class="h-5 w-5 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                                    d="M3.75 10.5 12 3l8.25 7.5v9a1.5 1.5 0 0 1-1.5 1.5h-3.75v-6h-6v6H5.25a1.5 1.5 0 0 1-1.5-1.5v-9Z" />
                            </svg>
                            <span>Dashboard</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.setting.index') }}"
                            class="admin-nav-link {{ $isRoute('admin.setting.*') ? 'is-active' : '' }}">
                            <svg class="h-5 w-5 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                                    d="M10.5 6h9m-9 6h9m-9 6h9M4.5 6h.008v.008H4.5V6Zm0 6h.008v.008H4.5V12Zm0 6h.008v.008H4.5V18Z" />
                            </svg>
                            <span>Settings</span>
                        </a>
                    </li>
                </ul>
            </div>

            <div class="mb-6">
                <p class="admin-section-label">Management</p>
                <ul class="space-y-2">
                    <li>
                        @php $apiOpen = $isRoute('admin.country.*', 'admin.state.*', 'admin.district.*', 'admin.tehsil.*'); @endphp
                        <button type="button" class="admin-nav-button {{ $apiOpen ? 'is-active' : '' }}" aria-controls="api"
                            data-collapse-toggle="api">
                            <svg class="h-5 w-5 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                                    d="M7.5 7.5h9m-9 4.5h9m-9 4.5h5.25M4.5 6A1.5 1.5 0 0 1 6 4.5h12A1.5 1.5 0 0 1 19.5 6v12A1.5 1.5 0 0 1 18 19.5H6A1.5 1.5 0 0 1 4.5 18V6Z" />
                            </svg>
                            <span class="flex-1 text-left">API Master</span>
                            <svg class="h-3.5 w-3.5 transition {{ $apiOpen ? 'rotate-180' : '' }}" fill="none"
                                viewBox="0 0 10 6" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="m1 1 4 4 4-4" />
                            </svg>
                        </button>
                        <ul id="api" class="{{ $apiOpen ? '' : 'hidden' }} space-y-2 pl-4 pt-2">
                            <li><a href="{{ route('admin.country.index') }}"
                                    class="admin-submenu-link {{ $isRoute('admin.country.*') ? 'is-active' : '' }}">Country</a></li>
                            <li><a href="{{ route('admin.state.index') }}"
                                    class="admin-submenu-link {{ $isRoute('admin.state.*') ? 'is-active' : '' }}">State</a></li>
                            <li><a href="{{ route('admin.district.index') }}"
                                    class="admin-submenu-link {{ $isRoute('admin.district.*') ? 'is-active' : '' }}">District</a></li>
                            <li><a href="{{ route('admin.tehsil.index') }}"
                                    class="admin-submenu-link {{ $isRoute('admin.tehsil.*') ? 'is-active' : '' }}">Tehsils</a></li>
                        </ul>
                    </li>

                    <li>
                    @php $emailOpen = $isRoute('admin.template.*', 'admin.salutation.*', 'admin.contact.*'); @endphp
                    <button type="button" class="admin-nav-button {{ $emailOpen ? 'is-active' : '' }}"
                        aria-controls="email_market" data-collapse-toggle="email_market">
                        <svg class="h-5 w-5 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                                d="M21.75 8.25v7.5A2.25 2.25 0 0 1 19.5 18h-15a2.25 2.25 0 0 1-2.25-2.25v-7.5m19.5 0A2.25 2.25 0 0 0 19.5 6h-15a2.25 2.25 0 0 0-2.25 2.25m19.5 0v.243a2.25 2.25 0 0 1-.97 1.855l-7.5 5.143a2.25 2.25 0 0 1-2.56 0L3.22 10.348a2.25 2.25 0 0 1-.97-1.855V8.25" />
                        </svg>
                        <span class="flex-1 text-left">Email</span>
                        <svg class="h-3.5 w-3.5 transition {{ $emailOpen ? 'rotate-180' : '' }}" fill="none"
                            viewBox="0 0 10 6" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="m1 1 4 4 4-4" />
                        </svg>
                    </button>
                    <ul id="email_market" class="{{ $emailOpen ? '' : 'hidden' }} space-y-2 pl-4 pt-2">
                        <li><a href="{{ route('admin.template.index') }}"
                                class="admin-submenu-link {{ $isRoute('admin.template.*') ? 'is-active' : '' }}">Templates</a></li>
                        <li><a href="{{ route('admin.salutation.index') }}"
                                class="admin-submenu-link {{ $isRoute('admin.salutation.*') ? 'is-active' : '' }}">Salutation</a></li>
                        <li><a href="{{ route('admin.contact.index') }}"
                                class="admin-submenu-link {{ $isRoute('admin.contact.*') ? 'is-active' : '' }}">Contact User</a></li>
                    </ul>
                    </li>

                    <li>
                    @php $panelOpen = $isRoute('admin.category.*', 'admin.service.*', 'admin.role.*', 'admin.customer.*'); @endphp
                    <button type="button" class="admin-nav-button {{ $panelOpen ? 'is-active' : '' }}"
                        aria-controls="members" data-collapse-toggle="members">
                        <svg class="h-5 w-5 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                                d="M18 18.75a3 3 0 0 0 3-3V8.25a3 3 0 0 0-3-3H6a3 3 0 0 0-3 3v7.5a3 3 0 0 0 3 3h12Zm-9.75-8.25h7.5M8.25 14.25h4.5" />
                        </svg>
                        <span class="flex-1 text-left">Panels</span>
                        <svg class="h-3.5 w-3.5 transition {{ $panelOpen ? 'rotate-180' : '' }}" fill="none"
                            viewBox="0 0 10 6" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="m1 1 4 4 4-4" />
                        </svg>
                    </button>
                    <ul id="members" class="{{ $panelOpen ? '' : 'hidden' }} space-y-2 pl-4 pt-2">
                        <li><a href="{{ route('admin.category.index') }}"
                                class="admin-submenu-link {{ $isRoute('admin.category.*') ? 'is-active' : '' }}">Categories</a></li>
                        <li><a href="{{ route('admin.service.index') }}"
                                class="admin-submenu-link {{ $isRoute('admin.service.*') ? 'is-active' : '' }}">Services</a></li>
                        <li><a href="{{ route('admin.role.index') }}"
                                class="admin-submenu-link {{ $isRoute('admin.role.*') ? 'is-active' : '' }}">Role</a></li>
                        <li><a href="{{ route('admin.customer.index') }}"
                                class="admin-submenu-link {{ $isRoute('admin.customer.index', 'admin.customer.add', 'admin.customer.edit') ? 'is-active' : '' }}">Customer</a></li>
                        <li><a href="{{ route('admin.customer.charge') }}"
                                class="admin-submenu-link {{ $isRoute('admin.customer.charge', 'admin.customer.charge-add') ? 'is-active' : '' }}">Registration Charge</a></li>
                    </ul>
                    </li>

                    <li>
                    @php $tokenOpen = $isRoute('admin.token.*'); @endphp
                    <button type="button" class="admin-nav-button {{ $tokenOpen ? 'is-active' : '' }}"
                        aria-controls="tokens" data-collapse-toggle="tokens">
                        <svg class="h-5 w-5 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                                d="M12 6v12m4.5-9H9.75a2.25 2.25 0 1 0 0 4.5h4.5a2.25 2.25 0 1 1 0 4.5H7.5" />
                        </svg>
                        <span class="flex-1 text-left">Tokens</span>
                        <svg class="h-3.5 w-3.5 transition {{ $tokenOpen ? 'rotate-180' : '' }}" fill="none"
                            viewBox="0 0 10 6" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="m1 1 4 4 4-4" />
                        </svg>
                    </button>
                    <ul id="tokens" class="{{ $tokenOpen ? '' : 'hidden' }} space-y-2 pl-4 pt-2">
                        <li><a href="{{ route('admin.token.index') }}"
                                class="admin-submenu-link {{ $isRoute('admin.token.index', 'admin.token.add', 'admin.token.edit') ? 'is-active' : '' }}">Tokens</a></li>
                        <li><a href="{{ route('admin.token.transfer') }}"
                                class="admin-submenu-link {{ $isRoute('admin.token.transfer') ? 'is-active' : '' }}">Transfer</a></li>
                        <li><a href="{{ route('admin.token.transfer-details') }}"
                                class="admin-submenu-link {{ $isRoute('admin.token.transfer-details') ? 'is-active' : '' }}">Transfer Details</a></li>
                    </ul>
                    </li>

                    <li>
                    @php $projectOpen = $isRoute('admin.project_category.*', 'admin.technology.*', 'admin.project.*'); @endphp
                    <button type="button" class="admin-nav-button {{ $projectOpen ? 'is-active' : '' }}"
                        aria-controls="projects" data-collapse-toggle="projects">
                        <svg class="h-5 w-5 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                                d="M3.75 6.75A2.25 2.25 0 0 1 6 4.5h4.5a2.25 2.25 0 0 1 1.591.659l1.5 1.5A2.25 2.25 0 0 0 15.182 7.5H18A2.25 2.25 0 0 1 20.25 9.75v8.25A2.25 2.25 0 0 1 18 20.25H6A2.25 2.25 0 0 1 3.75 18V6.75Z" />
                        </svg>
                        <span class="flex-1 text-left">Projects</span>
                        <svg class="h-3.5 w-3.5 transition {{ $projectOpen ? 'rotate-180' : '' }}" fill="none"
                            viewBox="0 0 10 6" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="m1 1 4 4 4-4" />
                        </svg>
                    </button>
                    <ul id="projects" class="{{ $projectOpen ? '' : 'hidden' }} space-y-2 pl-4 pt-2">
                        <li><a href="{{ route('admin.project_category.index') }}"
                                class="admin-submenu-link {{ $isRoute('admin.project_category.*') ? 'is-active' : '' }}">Category</a></li>
                        <li><a href="{{ route('admin.technology.index') }}"
                                class="admin-submenu-link {{ $isRoute('admin.technology.*') ? 'is-active' : '' }}">Technologies</a></li>
                        <li><a href="{{ route('admin.project.index') }}"
                                class="admin-submenu-link {{ $isRoute('admin.project.*') ? 'is-active' : '' }}">Projects</a></li>
                    </ul>
                    </li>
                </ul>
            </div>

            <div>
                <p class="admin-section-label">Content</p>
                <ul class="space-y-2">
                    <li><a href="{{ route('admin.blog.index') }}"
                            class="admin-nav-link {{ $isRoute('admin.blog.*') ? 'is-active' : '' }}">
                            <svg class="h-5 w-5 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                                    d="M6.75 5.25h10.5A2.25 2.25 0 0 1 19.5 7.5v9A2.25 2.25 0 0 1 17.25 18.75H6.75A2.25 2.25 0 0 1 4.5 16.5v-9a2.25 2.25 0 0 1 2.25-2.25Zm0 4.5h10.5M9 9.75h.008v.008H9V9.75Zm0 3h.008v.008H9v-.008Zm0 3h.008v.008H9v-.008Z" />
                            </svg>
                            <span>Blogs</span>
                        </a></li>
                    <li><a href="{{ route('admin.article.index') }}"
                            class="admin-nav-link {{ $isRoute('admin.article.*') ? 'is-active' : '' }}">
                            <svg class="h-5 w-5 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                                    d="M7.5 5.25h9A2.25 2.25 0 0 1 18.75 7.5v9A2.25 2.25 0 0 1 16.5 18.75h-9A2.25 2.25 0 0 1 5.25 16.5v-9A2.25 2.25 0 0 1 7.5 5.25Zm2.25 3h4.5m-4.5 3h4.5m-4.5 3h3" />
                            </svg>
                            <span>Articles</span>
                        </a></li>
                    <li><a href="{{ route('admin.project-sale') }}"
                            class="admin-nav-link {{ $isRoute('admin.project-sale') ? 'is-active' : '' }}">
                            <svg class="h-5 w-5 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                                    d="M12 8.25v7.5m3-4.5h-6M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                            </svg>
                            <span>Project Sale</span>
                        </a></li>
                    <li><a href="{{ route('admin.visit') }}"
                            class="admin-nav-link {{ $isRoute('admin.visit') ? 'is-active' : '' }}">
                            <svg class="h-5 w-5 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                                    d="M2.25 12S5.25 6.75 12 6.75 21.75 12 21.75 12 18.75 17.25 12 17.25 2.25 12 2.25 12Zm9.75 2.25A2.25 2.25 0 1 0 12 9.75a2.25 2.25 0 0 0 0 4.5Z" />
                            </svg>
                            <span>Visit User</span>
                        </a></li>
                    <li><a href="{{ route('admin.tracking') }}"
                            class="admin-nav-link {{ $isRoute('admin.tracking') ? 'is-active' : '' }}">
                            <svg class="h-5 w-5 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                                    d="M9 19.5 3.75 14.25l5.25-5.25m6 10.5 5.25-5.25-5.25-5.25" />
                            </svg>
                            <span>Tracking</span>
                        </a></li>
                    <li>
                        @php $reportOpen = $isRoute('admin.txn.*'); @endphp
                        <button type="button" class="admin-nav-button {{ $reportOpen ? 'is-active' : '' }}"
                            aria-controls="reports" data-collapse-toggle="reports">
                            <svg class="h-5 w-5 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                                    d="M3.75 3.75h16.5v16.5H3.75V3.75Zm4.5 10.5V9.75m4.5 4.5V6.75m4.5 7.5v-3" />
                            </svg>
                            <span class="flex-1 text-left">Reports</span>
                            <svg class="h-3.5 w-3.5 transition {{ $reportOpen ? 'rotate-180' : '' }}" fill="none"
                                viewBox="0 0 10 6" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="m1 1 4 4 4-4" />
                            </svg>
                        </button>
                        <ul id="reports" class="{{ $reportOpen ? '' : 'hidden' }} space-y-2 pl-4 pt-2">
                            <li><a href="{{ route('admin.txn.index') }}"
                                    class="admin-submenu-link {{ $isRoute('admin.txn.*') ? 'is-active' : '' }}">User Transaction</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</aside>
