@extends('panel.user.app')

@section('content')
@php
    $businessName = str($name ?? 'business')->replace(['-', '_'], ' ')->title()->toString();
    $gallery = [
        asset('assets/service/gallery1.jpg'),
        asset('assets/service/gallery2.jpg'),
        asset('assets/service/gallery3.jpg'),
        asset('assets/service/gallery4.jpg'),
        asset('assets/service/gallery5.jpg'),
        asset('panels/assortment-1868297_640.jpg'),
    ];
@endphp

<main class="pt-28">
    <section class="page-shell">
        <div class="rounded-[36px] bg-white p-6 shadow-sm md:p-10">
            <p class="text-sm font-semibold uppercase tracking-[0.24em] text-teal-600">Visual Gallery</p>
            <h1 class="mt-3 font-display text-4xl font-bold text-slate-900 md:text-5xl">{{ $businessName }} presented with a cleaner visual story.</h1>
            <p class="mt-5 max-w-3xl text-base leading-8 text-slate-600">
                Gallery sections work best when spacing, image ratios and hover treatment feel intentional. That makes the business appear more refined and more established.
            </p>
        </div>
    </section>

    <section class="page-shell mt-16">
        <div class="grid gap-5 md:grid-cols-2 xl:grid-cols-3">
            @foreach ($gallery as $image)
                <div class="group overflow-hidden rounded-[30px] border border-teal-100 bg-white p-3 shadow-sm">
                    <img src="{{ $image }}" alt="{{ $businessName }} gallery image" class="h-72 w-full rounded-[24px] object-cover transition duration-500 group-hover:scale-105">
                </div>
            @endforeach
        </div>
    </section>
</main>
@endsection
