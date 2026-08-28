@extends('layout.app')

@section('content')
    @php
        $bannerFallback = 'https://images.unsplash.com/photo-1551650975-87deedd944c3?auto=format&fit=crop&w=1600&q=80';
        $bannerPath = $project->banner ?? null;
        $bannerUrl = $bannerPath
            ? (\Illuminate\Support\Str::startsWith($bannerPath, ['http://', 'https://']) ? $bannerPath : asset($bannerPath))
            : $bannerFallback;
        $categoryName = optional(category($project->category))->name ?? 'Digital Product';
        $previewLink = $project->preview_link ?? null;
        $actualPrice = $project->actual_price ?? null;
        $discount = $actualPrice && $actualPrice > $project->price ? $actualPrice - $project->price : null;
        $screenshotCount = $screenshot->count();
    @endphp

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Manrope:wght@400;500;600;700;800&family=Outfit:wght@500;600;700;800&display=swap');

        .project-showcase {
            --ink: #102542;
            --ink-soft: #5b6b82;
            --surface: #f7f4ee;
            --surface-strong: #efe6d6;
            --card: rgba(255, 255, 255, 0.9);
            --line: rgba(16, 37, 66, 0.12);
            --brand: #d66d3d;
            --brand-deep: #8c3d1f;
            --accent: #1f7a72;
            --shadow: 0 24px 60px rgba(16, 37, 66, 0.14);
            font-family: 'Manrope', sans-serif;
            color: var(--ink);
            background:
                radial-gradient(circle at top left, rgba(214, 109, 61, 0.18), transparent 32%),
                radial-gradient(circle at top right, rgba(31, 122, 114, 0.18), transparent 28%),
                linear-gradient(180deg, #fffaf4 0%, #f7f4ee 52%, #ffffff 100%);
        }

        .project-showcase h1,
        .project-showcase h2,
        .project-showcase h3 {
            font-family: 'Outfit', sans-serif;
        }

        .project-hero {
            position: relative;
            overflow: hidden;
            background-color: #102542;
            background-image:
                linear-gradient(90deg, rgba(8, 20, 36, 0.88) 0%, rgba(8, 20, 36, 0.74) 34%, rgba(8, 20, 36, 0.42) 58%, rgba(8, 20, 36, 0.76) 100%),
                url('{{ $bannerUrl }}');
            background-repeat: no-repeat;
            background-position: center center, center center;
            background-size: cover, contain;
        }

        .project-hero::before,
        .project-hero::after {
            content: '';
            position: absolute;
            border-radius: 9999px;
            filter: blur(10px);
            opacity: 0.85;
        }

        .project-hero::before {
            width: 18rem;
            height: 18rem;
            right: -4rem;
            top: 4rem;
            background: radial-gradient(circle, rgba(214, 109, 61, 0.45), transparent 68%);
        }

        .project-hero::after {
            width: 14rem;
            height: 14rem;
            left: -3rem;
            bottom: -2rem;
            background: radial-gradient(circle, rgba(31, 122, 114, 0.45), transparent 68%);
        }

        .glass-card {
            background: rgba(255, 255, 255, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.18);
            backdrop-filter: blur(14px);
            box-shadow: 0 16px 50px rgba(0, 0, 0, 0.18);
        }

        .info-card,
        .gallery-card,
        .detail-card {
            background: var(--card);
            border: 1px solid var(--line);
            box-shadow: var(--shadow);
        }

        .section-label {
            letter-spacing: 0.18em;
            text-transform: uppercase;
            font-size: 0.75rem;
            font-weight: 800;
            color: var(--brand-deep);
        }

        .description-body {
            color: var(--ink-soft);
            line-height: 1.9;
        }

        .description-body p,
        .description-body ul,
        .description-body ol {
            margin-bottom: 1rem;
        }

        .description-body ul,
        .description-body ol {
            padding-left: 1.25rem;
        }

        .shot-frame {
            position: relative;
            overflow: hidden;
            border-radius: 1.5rem;
            background: linear-gradient(180deg, #fff, #f7f1e7);
            border: 1px solid rgba(16, 37, 66, 0.08);
            box-shadow: 0 18px 40px rgba(16, 37, 66, 0.12);
            transition: transform 0.35s ease, box-shadow 0.35s ease;
        }

        .shot-frame:hover {
            transform: translateY(-6px);
            box-shadow: 0 24px 48px rgba(16, 37, 66, 0.16);
        }

        .shot-frame img {
            width: 100%;
            display: block;
        }

        .mesh-strip {
            background-image:
                linear-gradient(rgba(255, 255, 255, 0.8), rgba(255, 255, 255, 0.8)),
                linear-gradient(90deg, rgba(16, 37, 66, 0.05) 1px, transparent 1px),
                linear-gradient(rgba(16, 37, 66, 0.05) 1px, transparent 1px);
            background-size: auto, 28px 28px, 28px 28px;
        }

        @media (max-width: 768px) {
            .project-hero {
                background-image:
                    linear-gradient(180deg, rgba(8, 20, 36, 0.84) 0%, rgba(8, 20, 36, 0.68) 42%, rgba(8, 20, 36, 0.84) 100%),
                    url('{{ $bannerUrl }}');
                background-position: center top, center top;
                background-size: cover, cover;
            }

        }
    </style>

    <div class="project-showcase pt-10 md:pt-14">
        <section class="project-hero text-white">
            <div class="container mx-auto px-4 py-10 md:py-14 relative z-10">
                <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-12 items-center">
                    <div class="lg:col-span-7">
                        <span class="inline-flex items-center rounded-full border border-white/20 bg-white/10 px-4 py-2 text-xs font-semibold uppercase tracking-[0.24em] text-white/90">
                            Premium Project Showcase
                        </span>

                        <h1 class="mt-6 text-4xl md:text-6xl font-extrabold leading-tight">
                            {{ $project->name }}
                        </h1>

                        <div class="mt-8 flex flex-wrap gap-3 text-sm">
                            <span class="rounded-full bg-white/10 px-4 py-2 font-semibold text-white/90">
                                <i class="fas fa-layer-group mr-2 text-orange-300"></i>{{ $categoryName }}
                            </span>
                            <span class="rounded-full bg-white/10 px-4 py-2 font-semibold text-white/90">
                                <i class="fas fa-images mr-2 text-emerald-300"></i>{{ $screenshotCount }} Screenshots
                            </span>
                            <span class="rounded-full bg-white/10 px-4 py-2 font-semibold text-white/90">
                                <i class="fas fa-shield-alt mr-2 text-yellow-300"></i>Ready To Deploy
                            </span>
                        </div>

                        <div class="mt-10 flex flex-col sm:flex-row gap-4">
                            <a href="{{ route('user.login') }}"
                                class="inline-flex items-center justify-center rounded-2xl bg-[#d66d3d] px-7 py-4 text-base font-bold text-white transition duration-300 hover:bg-[#bf5d32]">
                                <i class="fas fa-shopping-cart mr-2"></i> Purchase Now - ₹{{ number_format($project->price) }}
                            </a>

                            @if ($previewLink)
                                <a href="{{ $previewLink }}" target="_blank" rel="noopener noreferrer"
                                    class="inline-flex items-center justify-center rounded-2xl border border-white/25 bg-white/8 px-7 py-4 text-base font-bold text-white transition duration-300 hover:bg-white/14">
                                    <i class="far fa-eye mr-2"></i> Live Preview
                                </a>
                            @endif
                        </div>
                    </div>

                    <div class="lg:col-span-5 space-y-6">
                        <div class="glass-card rounded-[2rem] p-6 md:p-8">
                            <div class="flex items-start justify-between gap-4">
                                <div>
                                    <p class="text-sm uppercase tracking-[0.24em] text-white/60">Project Price</p>
                                    <div class="mt-3 flex items-end gap-3">
                                        <span class="text-4xl md:text-5xl font-extrabold">₹{{ number_format($project->price) }}</span>
                                        @if ($actualPrice && $actualPrice > $project->price)
                                            <span class="pb-1 text-lg text-white/55 line-through">₹{{ number_format($actualPrice) }}</span>
                                        @endif
                                    </div>
                                </div>

                                @if ($discount)
                                    <span class="rounded-full bg-emerald-400/20 px-4 py-2 text-sm font-semibold text-emerald-200">
                                        Save ₹{{ number_format($discount) }}
                                    </span>
                                @endif
                            </div>

                            <div class="mt-8 grid grid-cols-2 gap-4">
                                <div class="rounded-2xl bg-white/8 p-4">
                                    <p class="text-xs uppercase tracking-[0.18em] text-white/55">Category</p>
                                    <p class="mt-2 text-base font-semibold text-white">{{ $categoryName }}</p>
                                </div>
                                <div class="rounded-2xl bg-white/8 p-4">
                                    <p class="text-xs uppercase tracking-[0.18em] text-white/55">Preview</p>
                                    <p class="mt-2 text-base font-semibold text-white">{{ $previewLink ? 'Available' : 'On Request' }}</p>
                                </div>
                                <div class="rounded-2xl bg-white/8 p-4">
                                    <p class="text-xs uppercase tracking-[0.18em] text-white/55">Delivery</p>
                                    <p class="mt-2 text-base font-semibold text-white">Instant Access</p>
                                </div>
                                <div class="rounded-2xl bg-white/8 p-4">
                                    <p class="text-xs uppercase tracking-[0.18em] text-white/55">Format</p>
                                    <p class="mt-2 text-base font-semibold text-white">Source Included</p>
                                </div>
                            </div>

                            <div class="mt-8 rounded-2xl border border-white/12 bg-black/10 p-4 text-sm leading-7 text-white/75">
                                Clean presentation, clear pricing, and a stronger first impression for your product page.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="mesh-strip py-14 md:py-20">
            <div class="container mx-auto px-4">
                <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-start">
                    <div class="lg:col-span-8">
                        <div class="info-card rounded-[2rem] p-6 md:p-10">
                            <p class="section-label">Project Overview</p>
                            <h2 class="mt-3 text-3xl md:text-4xl font-bold">
                                Built to present {{ $project->name }} with more confidence
                            </h2>
                            <div class="description-body mt-6 text-base md:text-lg">
                                {!! $project->description ?? '' !!}
                            </div>
                        </div>
                    </div>

                    <div class="lg:col-span-4">
                        <div class="detail-card rounded-[2rem] p-6 md:p-8">
                            <p class="section-label">Quick Highlights</p>
                            <div class="mt-6 space-y-4">
                                <div class="rounded-2xl bg-[#fff8f1] p-4">
                                    <div class="flex items-center gap-3">
                                        <div class="flex h-12 w-12 items-center justify-center rounded-2xl bg-[#d66d3d] text-white">
                                            <i class="fas fa-bolt"></i>
                                        </div>
                                        <div>
                                            <h3 class="font-bold text-lg">Fast Decision Making</h3>
                                            <p class="text-sm text-slate-500">Pricing and value proposition stay visible and clear.</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="rounded-2xl bg-[#f3fbfa] p-4">
                                    <div class="flex items-center gap-3">
                                        <div class="flex h-12 w-12 items-center justify-center rounded-2xl bg-[#1f7a72] text-white">
                                            <i class="fas fa-mobile-alt"></i>
                                        </div>
                                        <div>
                                            <h3 class="font-bold text-lg">Responsive Layout</h3>
                                            <p class="text-sm text-slate-500">Desktop aur mobile dono par section flow balanced rahega.</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="rounded-2xl bg-[#f8f6ff] p-4">
                                    <div class="flex items-center gap-3">
                                        <div class="flex h-12 w-12 items-center justify-center rounded-2xl bg-[#102542] text-white">
                                            <i class="fas fa-camera-retro"></i>
                                        </div>
                                        <div>
                                            <h3 class="font-bold text-lg">Visual Proof</h3>
                                            <p class="text-sm text-slate-500">Screenshots ko cleaner gallery style mein showcase kiya gaya hai.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <a href="{{ route('user.login') }}"
                                class="mt-8 inline-flex w-full items-center justify-center rounded-2xl bg-[#102542] px-6 py-4 text-center text-base font-bold text-white transition duration-300 hover:bg-[#0b1a2f]">
                                Continue To Purchase
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="py-14 md:py-20">
            <div class="container mx-auto px-4">
                <div class="flex flex-col md:flex-row md:items-end md:justify-between gap-4 mb-10">
                    <div>
                        <p class="section-label">Preview Gallery</p>
                        <h2 class="mt-3 text-3xl md:text-4xl font-bold">See the interface before you buy</h2>
                    </div>
                    <p class="max-w-2xl text-base text-slate-500 leading-7">
                        Real screens help your visitors understand the quality, flow, and polish of the final product.
                    </p>
                </div>

                @if ($screenshotCount > 0)
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 md:gap-8">
                        @foreach ($screenshot as $index => $val)
                            <div class="shot-frame p-3 md:p-4">
                                <div class="flex items-center justify-between px-2 pb-3">
                                    <span class="text-xs font-bold uppercase tracking-[0.24em] text-slate-400">
                                        Screen {{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}
                                    </span>
                                    <span class="h-3 w-3 rounded-full bg-[#d66d3d]"></span>
                                </div>
                                <img src="{{ asset($val->image ?? 'assets/img/about.jpg') }}"
                                    alt="{{ $project->name }} screenshot {{ $index + 1 }}"
                                    class="rounded-[1rem]">
                            </div>
                        @endforeach
                    </div>
                @else
                    <div class="gallery-card rounded-[2rem] p-8 md:p-12 text-center">
                        <div class="mx-auto flex h-16 w-16 items-center justify-center rounded-full bg-[#fff1ea] text-[#d66d3d]">
                            <i class="fas fa-image text-2xl"></i>
                        </div>
                        <h3 class="mt-5 text-2xl font-bold">Screenshots coming soon</h3>
                        <p class="mt-3 text-slate-500 max-w-xl mx-auto leading-7">
                            Is project ke preview images abhi available nahi hain, lekin aap purchase ya live preview ke through details dekh sakte hain.
                        </p>
                    </div>
                @endif
            </div>
        </section>
    </div>
@endsection
