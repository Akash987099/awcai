@extends('panel.layout.app')

@section('content')
@php
    $stats = [
        ['value' => '25K+', 'label' => 'Monthly local searches'],
        ['value' => '350+', 'label' => 'Growing business categories'],
        ['value' => '24x7', 'label' => 'Lead-friendly digital presence'],
    ];

    $cities = ['Agra', 'Delhi', 'Noida', 'Jaipur', 'Lucknow', 'Indore', 'Pune', 'Surat'];
@endphp

<main class="pt-28">
    <section class="section-shell">
        <div class="hero-grid relative overflow-hidden rounded-[36px] bg-slate-950 px-6 py-12 text-white shadow-glow md:px-10 md:py-16">
            <div class="absolute inset-0 bg-[radial-gradient(circle_at_top_right,_rgba(249,115,22,0.38),_transparent_24rem)]"></div>
            <div class="absolute -left-20 bottom-0 h-52 w-52 rounded-full bg-orange-500/20 blur-3xl"></div>
            <div class="relative grid items-center gap-10 lg:grid-cols-[1.15fr_0.85fr]">
                <div>
                    <span class="inline-flex rounded-full border border-white/15 bg-white/10 px-4 py-2 text-xs font-semibold uppercase tracking-[0.28em] text-orange-200">
                        Discover • Compare • Connect
                    </span>
                    <h1 class="mt-6 max-w-3xl font-display text-4xl font-extrabold leading-tight md:text-6xl">
                        Local business discovery, redesigned for trust and faster enquiries.
                    </h1>
                    <p class="mt-5 max-w-2xl text-base leading-8 text-slate-300 md:text-lg">
                        BizBharat helps customers find the right service provider and gives businesses a polished digital storefront with category visibility, reviews, and conversion-focused pages.
                    </p>
                    <div class="mt-8 flex flex-col gap-3 sm:flex-row">
                        <a href="{{ route('panel.service') }}" class="rounded-full bg-orange-500 px-6 py-3 text-sm font-semibold text-white transition hover:bg-orange-400">
                            Browse Services
                        </a>
                        <a href="#lead-form" class="rounded-full border border-white/20 px-6 py-3 text-sm font-semibold text-white transition hover:bg-white/10">
                            Get Free Listing
                        </a>
                    </div>
                    <div class="mt-10 grid gap-4 sm:grid-cols-3">
                        @foreach ($stats as $stat)
                            <div class="rounded-3xl border border-white/10 bg-white/5 p-4">
                                <div class="font-display text-2xl font-bold text-white">{{ $stat['value'] }}</div>
                                <p class="mt-2 text-sm leading-6 text-slate-300">{{ $stat['label'] }}</p>
                            </div>
                        @endforeach
                    </div>
                </div>

                <div class="grid gap-4">
                    <div class="overflow-hidden rounded-[30px] border border-white/10 bg-white/10 p-3">
                        <img src="{{ asset('panels/market-7094635_640.jpg') }}" alt="BizBharat marketplace" class="h-72 w-full rounded-[24px] object-cover md:h-80">
                    </div>
                    <div class="grid gap-4 sm:grid-cols-2">
                        <div class="rounded-[28px] bg-white p-5 text-slate-900">
                            <p class="text-xs font-semibold uppercase tracking-[0.28em] text-slate-500">For Buyers</p>
                            <p class="mt-3 text-lg font-semibold">Shortlist verified vendors faster</p>
                        </div>
                        <div class="rounded-[28px] border border-white/10 bg-white/10 p-5">
                            <p class="text-xs font-semibold uppercase tracking-[0.28em] text-orange-200">For Sellers</p>
                            <p class="mt-3 text-lg font-semibold">Turn visits into calls, WhatsApp and form leads</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section-shell mt-16">
        <div class="flex items-end justify-between gap-4">
            <div>
                <p class="text-sm font-semibold uppercase tracking-[0.24em] text-orange-500">Popular Categories</p>
                <h2 class="mt-3 font-display text-3xl font-bold text-slate-900 md:text-4xl">Explore business verticals</h2>
            </div>
            <a href="{{ route('panel.service') }}" class="text-sm font-semibold text-slate-600 transition hover:text-orange-500">See all services</a>
        </div>

        <div class="mt-8 grid gap-4 sm:grid-cols-2 lg:grid-cols-4 xl:grid-cols-6">
            @foreach ($category->take(11) as $item)
                <a href="{{ route('panel.service') }}" class="group rounded-[28px] border border-orange-100 bg-white p-5 shadow-sm transition hover:-translate-y-1 hover:border-orange-300 hover:shadow-glow">
                    <div class="flex h-14 w-14 items-center justify-center rounded-2xl bg-orange-50 text-2xl text-orange-500 transition group-hover:bg-orange-500 group-hover:text-white">
                        {!! $item->icon !!}
                    </div>
                    <h3 class="mt-5 text-base font-semibold text-slate-900">{{ $item->name }}</h3>
                    <p class="mt-2 text-sm leading-6 text-slate-500">Digital profile, discovery and lead support.</p>
                </a>
            @endforeach
        </div>
    </section>

    <section class="section-shell mt-16">
        <div class="rounded-[36px] border border-orange-100 bg-white px-6 py-8 shadow-sm md:px-8">
            <div class="flex flex-col gap-6 md:flex-row md:items-end md:justify-between">
                <div>
                    <p class="text-sm font-semibold uppercase tracking-[0.24em] text-orange-500">Top Cities</p>
                    <h2 class="mt-3 font-display text-3xl font-bold text-slate-900">Launch where your customers already search</h2>
                </div>
                <p class="max-w-2xl text-sm leading-7 text-slate-600">
                    Build a stronger city-based presence so customers can discover your business in the locations that matter most.
                </p>
            </div>
            <div class="mt-8 grid gap-4 sm:grid-cols-2 lg:grid-cols-4">
                @foreach ($cities as $city)
                    <div class="rounded-[26px] bg-orange-50/70 p-5">
                        <div class="flex items-center justify-between">
                            <h3 class="text-lg font-semibold text-slate-900">{{ $city }}</h3>
                            <span class="rounded-full bg-white px-3 py-1 text-xs font-semibold text-orange-500">Active</span>
                        </div>
                        <p class="mt-3 text-sm leading-6 text-slate-600">Local SEO pages, trust-focused business listings and service visibility.</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <section class="section-shell mt-16 grid gap-8 lg:grid-cols-2">
        <div class="rounded-[34px] border border-orange-100 bg-white p-6 shadow-sm md:p-8">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-semibold uppercase tracking-[0.24em] text-orange-500">Recent Blogs</p>
                    <h2 class="mt-3 font-display text-3xl font-bold text-slate-900">Growth ideas for modern businesses</h2>
                </div>
            </div>
            <div class="mt-8 space-y-4">
                @foreach ($blogs as $val)
                    <article class="grid gap-4 rounded-[26px] bg-slate-50 p-4 md:grid-cols-[150px_1fr]">
                        <img src="{{ asset($val->image) }}" alt="{{ $val->name }}" class="h-32 w-full rounded-[20px] object-cover">
                        <div>
                            <h3 class="text-lg font-semibold text-slate-900">{{ $val->name }}</h3>
                            <p class="mt-2 text-sm leading-6 text-slate-600">Useful strategies for stronger branding, discovery and enquiry generation.</p>
                        </div>
                    </article>
                @endforeach
            </div>
        </div>

        <div class="rounded-[34px] border border-orange-100 bg-white p-6 shadow-sm md:p-8">
            <p class="text-sm font-semibold uppercase tracking-[0.24em] text-orange-500">Recent Articles</p>
            <h2 class="mt-3 font-display text-3xl font-bold text-slate-900">Helpful reads for decision makers</h2>
            <div class="mt-8 grid gap-4">
                @foreach ($articles as $val)
                    <article class="rounded-[26px] border border-slate-100 p-5 transition hover:border-orange-200 hover:bg-orange-50/40">
                        <div class="flex items-start gap-4">
                            <img src="{{ asset($val->image) }}" alt="{{ $val->name }}" class="h-20 w-20 rounded-2xl object-cover">
                            <div>
                                <h3 class="text-lg font-semibold text-slate-900">{{ $val->name }}</h3>
                                <p class="mt-2 text-sm leading-6 text-slate-600">Practical guidance for scaling online visibility, leads and brand trust.</p>
                            </div>
                        </div>
                    </article>
                @endforeach
            </div>
        </div>
    </section>

    <section id="lead-form" class="section-shell mt-16">
        <div class="grid gap-8 overflow-hidden rounded-[36px] bg-slate-950 px-6 py-10 text-white md:px-10 lg:grid-cols-[0.9fr_1.1fr]">
            <div>
                <p class="text-sm font-semibold uppercase tracking-[0.24em] text-orange-300">Grow With BizBharat</p>
                <h2 class="mt-3 font-display text-3xl font-bold md:text-4xl">List your business and start collecting high-intent leads.</h2>
                <p class="mt-4 max-w-xl text-sm leading-7 text-slate-300">
                    We help service providers present their business professionally with category pages, contact actions and city-ready visibility.
                </p>
            </div>
            <form class="grid gap-4 rounded-[30px] bg-white p-6 text-slate-900 shadow-glow md:grid-cols-2">
                <input type="text" placeholder="Business name" class="rounded-2xl border border-slate-200 px-4 py-3 outline-none transition focus:border-orange-400">
                <input type="text" placeholder="Owner name" class="rounded-2xl border border-slate-200 px-4 py-3 outline-none transition focus:border-orange-400">
                <input type="tel" placeholder="Mobile number" class="rounded-2xl border border-slate-200 px-4 py-3 outline-none transition focus:border-orange-400">
                <input type="text" placeholder="City" class="rounded-2xl border border-slate-200 px-4 py-3 outline-none transition focus:border-orange-400">
                <textarea placeholder="Tell us about your service" rows="4" class="md:col-span-2 rounded-2xl border border-slate-200 px-4 py-3 outline-none transition focus:border-orange-400"></textarea>
                <button type="button" class="md:col-span-2 rounded-2xl bg-orange-500 px-5 py-3 font-semibold text-white transition hover:bg-orange-400">
                    Request Free Listing
                </button>
            </form>
        </div>
    </section>
</main>
@endsection
