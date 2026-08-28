@extends('panel.user.app')

@section('content')
@php
    $businessName = str($name ?? 'business')->replace(['-', '_'], ' ')->title()->toString();
    $contactUrl = url('/panel/web/' . ($name ?? 'business') . '/contact');
    $servicesUrl = url('/panel/web/' . ($name ?? 'business') . '/services');
    $offerings = [
        'Fast response on calls and WhatsApp',
        'Clear pricing or package consultation',
        'Trusted local service with digital support',
    ];
    $stats = [
        ['value' => '4.9/5', 'label' => 'Customer satisfaction'],
        ['value' => '500+', 'label' => 'Completed enquiries'],
        ['value' => 'Same Day', 'label' => 'Average callback'],
    ];
@endphp

<main class="pt-28">
    <section class="page-shell">
        <div class="grid gap-8 overflow-hidden rounded-[36px] bg-slate-950 px-6 py-10 text-white shadow-soft md:px-10 md:py-14 lg:grid-cols-[1.1fr_0.9fr]">
            <div>
                <span class="inline-flex rounded-full border border-white/10 bg-white/10 px-4 py-2 text-xs font-semibold uppercase tracking-[0.24em] text-teal-100">
                    Featured Local Business
                </span>
                <h1 class="mt-5 font-display text-4xl font-extrabold leading-tight md:text-6xl">{{ $businessName }}</h1>
                <p class="mt-5 max-w-2xl text-base leading-8 text-slate-300 md:text-lg">
                    A refined local business page that helps visitors quickly understand your strengths, browse services and reach out with confidence.
                </p>
                <div class="mt-8 flex flex-col gap-3 sm:flex-row">
                    <a href="{{ $contactUrl }}" class="rounded-full bg-teal-500 px-6 py-3 text-sm font-semibold text-white transition hover:bg-teal-400">
                        Book an Enquiry
                    </a>
                    <a href="{{ $servicesUrl }}" class="rounded-full border border-white/15 px-6 py-3 text-sm font-semibold text-white transition hover:bg-white/10">
                        View Services
                    </a>
                </div>
                <div class="mt-8 space-y-3">
                    @foreach ($offerings as $offering)
                        <div class="flex items-center gap-3 text-sm text-slate-300">
                            <i class="fas fa-circle-check text-teal-300"></i>
                            <span>{{ $offering }}</span>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="grid gap-4">
                <div class="overflow-hidden rounded-[30px] border border-white/10 p-3">
                    <img src="{{ asset('panels/indian-boy-2431906_640.jpg') }}" alt="{{ $businessName }}" class="h-72 w-full rounded-[24px] object-cover md:h-80">
                </div>
                <div class="grid gap-4 sm:grid-cols-3">
                    @foreach ($stats as $stat)
                        <div class="rounded-[24px] bg-white/10 p-4">
                            <div class="font-display text-2xl font-bold text-white">{{ $stat['value'] }}</div>
                            <p class="mt-2 text-sm text-slate-300">{{ $stat['label'] }}</p>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    <section class="page-shell mt-16 grid gap-8 lg:grid-cols-[0.95fr_1.05fr]">
        <div class="rounded-[32px] border border-teal-100 bg-white p-6 shadow-sm md:p-8">
            <p class="text-sm font-semibold uppercase tracking-[0.24em] text-teal-600">About {{ $businessName }}</p>
            <h2 class="mt-3 font-display text-3xl font-bold text-slate-900">Built to create trust before the first call.</h2>
            <p class="mt-4 text-sm leading-7 text-slate-600">
                This page structure gives your business a stronger digital first impression with a polished hero section, service clarity, gallery support and a cleaner contact path.
            </p>
            <div class="mt-8 grid gap-4 sm:grid-cols-2">
                <div class="rounded-[24px] bg-teal-50 p-5">
                    <h3 class="text-lg font-semibold text-slate-900">Local visibility</h3>
                    <p class="mt-2 text-sm leading-6 text-slate-600">Better presentation for nearby customers discovering your business online.</p>
                </div>
                <div class="rounded-[24px] bg-slate-50 p-5">
                    <h3 class="text-lg font-semibold text-slate-900">Lead focused</h3>
                    <p class="mt-2 text-sm leading-6 text-slate-600">Calls, enquiry and trust cues are placed where visitors naturally look.</p>
                </div>
            </div>
        </div>

        <div class="rounded-[32px] border border-teal-100 bg-white p-6 shadow-sm md:p-8">
            <p class="text-sm font-semibold uppercase tracking-[0.24em] text-teal-600">Why customers choose you</p>
            <div class="mt-6 grid gap-4 md:grid-cols-2">
                <div class="rounded-[24px] border border-slate-100 p-5">
                    <i class="fas fa-bolt text-2xl text-teal-500"></i>
                    <h3 class="mt-4 text-lg font-semibold text-slate-900">Quick response</h3>
                    <p class="mt-2 text-sm leading-6 text-slate-600">Immediate contact pathways reduce drop-offs and improve conversion.</p>
                </div>
                <div class="rounded-[24px] border border-slate-100 p-5">
                    <i class="fas fa-shield-heart text-2xl text-teal-500"></i>
                    <h3 class="mt-4 text-lg font-semibold text-slate-900">Trust cues</h3>
                    <p class="mt-2 text-sm leading-6 text-slate-600">A cleaner design improves credibility for first-time visitors.</p>
                </div>
                <div class="rounded-[24px] border border-slate-100 p-5">
                    <i class="fas fa-images text-2xl text-teal-500"></i>
                    <h3 class="mt-4 text-lg font-semibold text-slate-900">Visual proof</h3>
                    <p class="mt-2 text-sm leading-6 text-slate-600">Gallery and service sections help visitors understand what to expect.</p>
                </div>
                <div class="rounded-[24px] border border-slate-100 p-5">
                    <i class="fas fa-location-dot text-2xl text-teal-500"></i>
                    <h3 class="mt-4 text-lg font-semibold text-slate-900">Location friendly</h3>
                    <p class="mt-2 text-sm leading-6 text-slate-600">Ideal for city-level discovery and local search-driven enquiries.</p>
                </div>
            </div>
        </div>
    </section>

    <section class="page-shell mt-16">
        <div class="rounded-[36px] bg-teal-600 px-6 py-10 text-white md:px-10">
            <div class="flex flex-col gap-6 lg:flex-row lg:items-center lg:justify-between">
                <div>
                    <p class="text-sm font-semibold uppercase tracking-[0.24em] text-teal-100">Next Step</p>
                    <h2 class="mt-3 font-display text-3xl font-bold md:text-4xl">Want this business page to work harder for you?</h2>
                    <p class="mt-3 max-w-2xl text-sm leading-7 text-teal-50">Use the contact page to capture more enquiries and make every visitor action-oriented.</p>
                </div>
                <a href="{{ $contactUrl }}" class="rounded-full bg-slate-950 px-6 py-3 text-sm font-semibold text-white transition hover:bg-slate-900">
                    Open Contact Page
                </a>
            </div>
        </div>
    </section>
</main>
@endsection
