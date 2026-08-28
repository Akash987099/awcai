@extends('panel.user.app')

@section('content')
@php
    $businessName = str($name ?? 'business')->replace(['-', '_'], ' ')->title()->toString();
    $services = [
        ['title' => 'Consultation & Guidance', 'desc' => 'Explain your process upfront so customers know what happens after they contact you.'],
        ['title' => 'Core Service Packages', 'desc' => 'Showcase your best offers with cleaner summaries and stronger clarity.'],
        ['title' => 'Custom Requests', 'desc' => 'Allow customers to ask for tailored requirements without confusion.'],
        ['title' => 'After-Service Support', 'desc' => 'Highlight reliability beyond the first transaction to increase trust.'],
    ];
@endphp

<main class="pt-28">
    <section class="page-shell">
        <div class="rounded-[36px] bg-white p-6 shadow-sm md:p-10">
            <p class="text-sm font-semibold uppercase tracking-[0.24em] text-teal-600">Service Highlights</p>
            <h1 class="mt-3 font-display text-4xl font-bold text-slate-900 md:text-5xl">Services from {{ $businessName }} presented with more clarity and conversion focus.</h1>
            <p class="mt-5 max-w-3xl text-base leading-8 text-slate-600">
                A strong services page should make your offer simple to understand, easy to compare and quick to act on. This design does exactly that.
            </p>
        </div>
    </section>

    <section class="page-shell mt-16 grid gap-5 md:grid-cols-2">
        @foreach ($services as $service)
            <article class="rounded-[30px] border border-teal-100 bg-white p-6 shadow-sm transition hover:-translate-y-1 hover:shadow-soft">
                <div class="flex items-center gap-3">
                    <div class="flex h-12 w-12 items-center justify-center rounded-2xl bg-teal-50 text-teal-600">
                        <i class="fas fa-check"></i>
                    </div>
                    <h2 class="font-display text-2xl font-semibold text-slate-900">{{ $service['title'] }}</h2>
                </div>
                <p class="mt-4 text-sm leading-7 text-slate-600">{{ $service['desc'] }}</p>
            </article>
        @endforeach
    </section>

    <section class="page-shell mt-16">
        <div class="rounded-[36px] bg-teal-50 px-6 py-10 md:px-10">
            <h2 class="font-display text-3xl font-bold text-slate-900">Need a stronger service presentation?</h2>
            <p class="mt-4 max-w-3xl text-sm leading-7 text-slate-600">
                This section structure can support pricing, service tiers, timelines, FAQs and CTA blocks so your visitors move forward without hesitation.
            </p>
        </div>
    </section>
</main>
@endsection
