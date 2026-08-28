@extends('panel.layout.app')

@section('content')
@php
    $services = [
        ['icon' => 'fa-store', 'title' => 'Retail Stores', 'desc' => 'Showcase product variety, location details and enquiry-friendly business pages.'],
        ['icon' => 'fa-hospital', 'title' => 'Clinics & Hospitals', 'desc' => 'Highlight specialties, visiting hours, trust signals and contact actions.'],
        ['icon' => 'fa-scissors', 'title' => 'Salon & Wellness', 'desc' => 'Feature packages, visual gallery and easy booking-ready contact flows.'],
        ['icon' => 'fa-utensils', 'title' => 'Food & Dining', 'desc' => 'Promote menus, ambience and local search visibility for hungry customers.'],
        ['icon' => 'fa-graduation-cap', 'title' => 'Education', 'desc' => 'Present courses, credibility and admission enquiries in one place.'],
        ['icon' => 'fa-building', 'title' => 'Professional Services', 'desc' => 'Make legal, finance and consulting services easier to discover and trust.'],
    ];

    $benefits = [
        'Clean business profile with stronger first impression',
        'Quick call, WhatsApp and enquiry CTAs',
        'Location and category based discoverability',
        'Consistent branding across all service pages',
    ];
@endphp

<main class="pt-28">
    <section class="section-shell">
        <div class="grid gap-8 overflow-hidden rounded-[36px] bg-white p-6 shadow-sm md:p-10 lg:grid-cols-[1fr_0.85fr]">
            <div>
                <p class="text-sm font-semibold uppercase tracking-[0.24em] text-orange-500">Service Directory</p>
                <h1 class="mt-3 font-display text-4xl font-bold text-slate-900 md:text-5xl">Well-structured category pages that make local businesses easier to find.</h1>
                <p class="mt-5 max-w-2xl text-base leading-8 text-slate-600">
                    These category flows are designed to help buyers browse confidently and help businesses look more trustworthy, complete and conversion-ready.
                </p>
                <div class="mt-8 grid gap-3 sm:grid-cols-2">
                    @foreach ($benefits as $benefit)
                        <div class="flex items-start gap-3 rounded-2xl bg-orange-50 px-4 py-3 text-sm font-medium text-slate-700">
                            <i class="fas fa-check mt-1 text-orange-500"></i>
                            <span>{{ $benefit }}</span>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="overflow-hidden rounded-[30px] bg-slate-950 p-3">
                <img src="{{ asset('panels/street-market-6538220_640.jpg') }}" alt="Service categories" class="h-full min-h-[320px] w-full rounded-[24px] object-cover">
            </div>
        </div>
    </section>

    <section class="section-shell mt-16">
        <div class="grid gap-5 md:grid-cols-2 xl:grid-cols-3">
            @foreach ($services as $service)
                <article class="rounded-[30px] border border-orange-100 bg-white p-6 shadow-sm transition hover:-translate-y-1 hover:shadow-glow">
                    <div class="flex h-14 w-14 items-center justify-center rounded-2xl bg-orange-50 text-2xl text-orange-500">
                        <i class="fas {{ $service['icon'] }}"></i>
                    </div>
                    <h2 class="mt-5 font-display text-2xl font-semibold text-slate-900">{{ $service['title'] }}</h2>
                    <p class="mt-3 text-sm leading-7 text-slate-600">{{ $service['desc'] }}</p>
                    <div class="mt-6 flex items-center justify-between">
                        <span class="text-sm font-semibold text-slate-500">Discovery ready</span>
                        <a href="#lead-form" class="text-sm font-semibold text-orange-500">Use this style</a>
                    </div>
                </article>
            @endforeach
        </div>
    </section>

    <section id="lead-form" class="section-shell mt-16">
        <div class="rounded-[36px] bg-orange-500 px-6 py-10 text-white md:px-10">
            <div class="flex flex-col gap-6 lg:flex-row lg:items-center lg:justify-between">
                <div>
                    <p class="text-sm font-semibold uppercase tracking-[0.24em] text-orange-100">Need this for your business?</p>
                    <h2 class="mt-3 font-display text-3xl font-bold md:text-4xl">We can turn any local business into a polished panel-ready page set.</h2>
                </div>
                <a href="{{ url('/panel') }}#lead-form" class="rounded-full bg-slate-950 px-6 py-3 text-sm font-semibold text-white transition hover:bg-slate-900">
                    Start your listing
                </a>
            </div>
        </div>
    </section>
</main>
@endsection
