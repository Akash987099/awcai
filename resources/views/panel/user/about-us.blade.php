@extends('panel.user.app')

@section('content')
@php
    $businessName = str($name ?? 'business')->replace(['-', '_'], ' ')->title()->toString();
    $values = [
        ['title' => 'Reliable communication', 'desc' => 'Clear updates and easy reachability improve trust from the first interaction.'],
        ['title' => 'Quality presentation', 'desc' => 'A polished profile helps visitors understand your professionalism instantly.'],
        ['title' => 'Customer-first flow', 'desc' => 'Every page is designed so a visitor can move from interest to enquiry naturally.'],
    ];
@endphp

<main class="pt-28">
    <section class="page-shell">
        <div class="grid gap-8 rounded-[36px] bg-white p-6 shadow-sm md:p-10 lg:grid-cols-[0.95fr_1.05fr]">
            <div class="overflow-hidden rounded-[30px]">
                <img src="{{ asset('assets/img/about.jpg') }}" alt="{{ $businessName }}" class="h-full min-h-[320px] w-full object-cover">
            </div>
            <div>
                <p class="text-sm font-semibold uppercase tracking-[0.24em] text-teal-600">About The Brand</p>
                <h1 class="mt-3 font-display text-4xl font-bold text-slate-900 md:text-5xl">{{ $businessName }} with a more trusted and modern online identity.</h1>
                <p class="mt-5 text-base leading-8 text-slate-600">
                    This page is crafted to tell your story clearly, establish credibility quickly and help visitors feel confident before they contact you.
                </p>
                <p class="mt-4 text-base leading-8 text-slate-600">
                    Whether your business serves a local neighborhood or a wider city audience, a consistent page design makes your offer feel more premium and more dependable.
                </p>
            </div>
        </div>
    </section>

    <section class="page-shell mt-16">
        <div class="grid gap-5 md:grid-cols-3">
            @foreach ($values as $value)
                <article class="rounded-[30px] border border-teal-100 bg-white p-6 shadow-sm">
                    <div class="flex h-14 w-14 items-center justify-center rounded-2xl bg-teal-50 text-teal-600">
                        <i class="fas fa-star"></i>
                    </div>
                    <h2 class="mt-5 font-display text-2xl font-semibold text-slate-900">{{ $value['title'] }}</h2>
                    <p class="mt-3 text-sm leading-7 text-slate-600">{{ $value['desc'] }}</p>
                </article>
            @endforeach
        </div>
    </section>

    <section class="page-shell mt-16">
        <div class="rounded-[36px] bg-slate-950 px-6 py-10 text-white md:px-10">
            <p class="text-sm font-semibold uppercase tracking-[0.24em] text-teal-200">Brand Promise</p>
            <h2 class="mt-3 font-display text-3xl font-bold md:text-4xl">Your digital page should feel as strong as your real-world service.</h2>
            <p class="mt-4 max-w-3xl text-sm leading-7 text-slate-300">
                A better designed about page turns a generic listing into a more believable business presence. That confidence often becomes the difference between a bounce and a serious enquiry.
            </p>
        </div>
    </section>
</main>
@endsection
