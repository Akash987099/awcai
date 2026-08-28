@extends('panel.user.app')

@section('content')
@php
    $businessName = str($name ?? 'business')->replace(['-', '_'], ' ')->title()->toString();
    $posts = [
        ['image' => asset('assets/blogs/web.jpg'), 'title' => 'How a cleaner business page improves enquiry quality', 'copy' => 'Visitors trust better structured pages because they can quickly understand value, contact options and proof points.'],
        ['image' => asset('assets/blogs/mobile.png'), 'title' => 'Why local brands need mobile-friendly pages first', 'copy' => 'Most visitors arrive from phones, so layout clarity and faster CTA placement directly improve lead capture.'],
        ['image' => asset('assets/blogs/seo.jpg'), 'title' => 'City-focused discovery can lift local visibility', 'copy' => 'Pages that align with service plus city intent often make it easier for nearby customers to choose you.'],
        ['image' => asset('assets/blogs/software.jpg'), 'title' => 'Trust signals that help visitors take action faster', 'copy' => 'Testimonials, clear services, gallery images and contact options reduce hesitation and improve conversion.'],
    ];
@endphp

<main class="pt-28">
    <section class="page-shell">
        <div class="rounded-[36px] bg-white p-6 shadow-sm md:p-10">
            <p class="text-sm font-semibold uppercase tracking-[0.24em] text-teal-600">Blogs & Insights</p>
            <h1 class="mt-3 font-display text-4xl font-bold text-slate-900 md:text-5xl">Content around {{ $businessName }} can feel more premium too.</h1>
            <p class="mt-5 max-w-3xl text-base leading-8 text-slate-600">
                Blog sections help your page look active, informative and more credible. They also give customers another reason to stay, scroll and trust your expertise.
            </p>
        </div>
    </section>

    <section class="page-shell mt-16 grid gap-6 md:grid-cols-2 xl:grid-cols-4">
        @foreach ($posts as $post)
            <article class="overflow-hidden rounded-[30px] border border-teal-100 bg-white shadow-sm transition hover:-translate-y-1 hover:shadow-soft">
                <img src="{{ $post['image'] }}" alt="{{ $post['title'] }}" class="h-52 w-full object-cover">
                <div class="p-6">
                    <h2 class="font-display text-2xl font-semibold text-slate-900">{{ $post['title'] }}</h2>
                    <p class="mt-3 text-sm leading-7 text-slate-600">{{ $post['copy'] }}</p>
                </div>
            </article>
        @endforeach
    </section>
</main>
@endsection
