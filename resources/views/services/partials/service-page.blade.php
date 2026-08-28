@php
    $pageTitle = $pageTitle ?? 'Service Page';
    $pageDescription = $pageDescription ?? '';
    $heroTag = $heroTag ?? 'Digital Services';
    $heroTitle = $heroTitle ?? $pageTitle;
    $heroDescription = $heroDescription ?? '';
    $heroImage = $heroImage ?? 'assets/img/banner2.png';
    $heroPrimaryCta = $heroPrimaryCta ?? ['label' => 'Start Project', 'url' => url('contact-us')];
    $heroSecondaryCta = $heroSecondaryCta ?? ['label' => 'View Work', 'url' => route('complate_project')];
    $heroStats = $heroStats ?? [];
    $serviceHighlights = $serviceHighlights ?? [];
    $processSteps = $processSteps ?? [];
    $deliverables = $deliverables ?? [];
    $industries = $industries ?? [];
    $faqs = $faqs ?? [];
    $ctaTitle = $ctaTitle ?? 'Ready to build with us?';
    $ctaDescription = $ctaDescription ?? 'Tell us about your requirements and we will help you shape the right solution.';
@endphp

<style>
    .service-shell {
        background:
            radial-gradient(circle at top left, rgba(14, 165, 233, 0.08), transparent 26%),
            radial-gradient(circle at bottom right, rgba(16, 185, 129, 0.08), transparent 24%),
            linear-gradient(180deg, #f8fbff 0%, #ffffff 100%);
    }

    .service-hero {
        position: relative;
        overflow: hidden;
        background:
            radial-gradient(circle at top left, rgba(56, 189, 248, 0.18), transparent 24%),
            radial-gradient(circle at bottom right, rgba(16, 185, 129, 0.18), transparent 22%),
            linear-gradient(135deg, #020617 0%, #0f172a 45%, #0b3a53 100%);
    }

    .service-hero::before {
        content: "";
        position: absolute;
        inset: 0;
        background:
            radial-gradient(circle at top right, rgba(56, 189, 248, 0.24), transparent 28%),
            radial-gradient(circle at bottom left, rgba(251, 191, 36, 0.16), transparent 24%);
        pointer-events: none;
    }

    .service-hero::after {
        content: "";
        position: absolute;
        inset: 0;
        background-image:
            linear-gradient(rgba(148, 163, 184, 0.1) 1px, transparent 1px),
            linear-gradient(90deg, rgba(148, 163, 184, 0.1) 1px, transparent 1px);
        background-size: 44px 44px;
        mask-image: linear-gradient(135deg, rgba(0, 0, 0, 0.55), transparent 80%);
        pointer-events: none;
    }

    .service-chip {
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        border-radius: 9999px;
        border: 1px solid rgba(255, 255, 255, 0.18);
        background: rgba(255, 255, 255, 0.08);
        padding: 0.7rem 1rem;
        font-size: 0.72rem;
        font-weight: 700;
        letter-spacing: 0.18em;
        text-transform: uppercase;
        color: #dbeafe;
        backdrop-filter: blur(10px);
        position: relative;
        z-index: 1;
    }

    .service-hero-visual {
        position: relative;
        min-height: 340px;
    }

    .service-orbit {
        position: absolute;
        border-radius: 9999px;
        border: 1px solid rgba(255, 255, 255, 0.08);
        background: rgba(255, 255, 255, 0.03);
        backdrop-filter: blur(12px);
        box-shadow: 0 22px 44px rgba(15, 23, 42, 0.22);
    }

    .service-orbit-one {
        top: 12%;
        right: 12%;
        width: 220px;
        height: 220px;
    }

    .service-orbit-two {
        bottom: 8%;
        left: 6%;
        width: 170px;
        height: 170px;
    }

    .service-orbit-three {
        top: 42%;
        right: 38%;
        width: 110px;
        height: 110px;
    }

    .service-metric-panel {
        position: absolute;
        z-index: 2;
        border: 1px solid rgba(255, 255, 255, 0.12);
        background: rgba(15, 23, 42, 0.55);
        backdrop-filter: blur(16px);
        box-shadow: 0 24px 48px rgba(15, 23, 42, 0.24);
    }

    .service-metric-panel-main {
        top: 16%;
        left: 4%;
        max-width: 280px;
    }

    .service-metric-panel-side {
        right: 0;
        bottom: 14%;
        max-width: 220px;
    }

    .service-signal-bar {
        overflow: hidden;
        height: 0.6rem;
        border-radius: 9999px;
        background: rgba(255, 255, 255, 0.08);
    }

    .service-signal-bar span {
        display: block;
        height: 100%;
        border-radius: inherit;
        background: linear-gradient(90deg, #22c55e 0%, #38bdf8 50%, #facc15 100%);
    }

    .service-floating-pill {
        position: absolute;
        z-index: 2;
        display: inline-flex;
        align-items: center;
        gap: 0.55rem;
        border-radius: 9999px;
        border: 1px solid rgba(255, 255, 255, 0.12);
        background: rgba(255, 255, 255, 0.08);
        padding: 0.75rem 1rem;
        font-size: 0.85rem;
        color: #e2e8f0;
        backdrop-filter: blur(12px);
    }

    .service-floating-pill-top {
        top: 4%;
        left: 34%;
    }

    .service-floating-pill-bottom {
        bottom: 2%;
        left: 28%;
    }

    @media (max-width: 1023.98px) {
        .service-hero-visual {
            min-height: 280px;
            margin-top: 1.5rem;
        }

        .service-metric-panel-main {
            left: 0;
        }

        .service-metric-panel-side {
            right: 2%;
        }
    }

    @media (max-width: 767.98px) {
        .service-hero-visual {
            min-height: 240px;
        }

        .service-orbit-one {
            width: 160px;
            height: 160px;
            right: 8%;
        }

        .service-orbit-two {
            width: 120px;
            height: 120px;
            left: 0;
        }

        .service-orbit-three {
            width: 80px;
            height: 80px;
            right: 36%;
        }

        .service-metric-panel-main,
        .service-metric-panel-side {
            max-width: 200px;
        }

        .service-floating-pill {
            font-size: 0.78rem;
            padding: 0.65rem 0.85rem;
        }
    }

    .service-stat-card,
    .service-card,
    .service-process-card,
    .service-faq-card {
        border: 1px solid rgba(148, 163, 184, 0.18);
        box-shadow: 0 16px 40px rgba(15, 23, 42, 0.08);
    }

    .service-card {
        background: linear-gradient(180deg, #ffffff 0%, #f8fbff 100%);
    }

    .service-process-card {
        position: relative;
        overflow: hidden;
        background: #ffffff;
    }

    .service-process-card::before {
        content: "";
        position: absolute;
        inset: auto -15% -30% auto;
        width: 8rem;
        height: 8rem;
        border-radius: 9999px;
        background: radial-gradient(circle, rgba(14, 165, 233, 0.14), rgba(14, 165, 233, 0));
    }

    .service-step-badge {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 3rem;
        height: 3rem;
        border-radius: 1rem;
        background: linear-gradient(135deg, #0284c7, #0f766e);
        color: #ffffff;
        font-size: 1rem;
        font-weight: 700;
        box-shadow: 0 12px 28px rgba(14, 165, 233, 0.22);
    }

    .service-deliverable-item {
        position: relative;
        padding-left: 1.7rem;
    }

    .service-deliverable-item::before {
        content: "";
        position: absolute;
        left: 0;
        top: 0.65rem;
        width: 0.75rem;
        height: 0.75rem;
        border-radius: 9999px;
        background: linear-gradient(135deg, #14b8a6, #0ea5e9);
        box-shadow: 0 0 0 5px rgba(20, 184, 166, 0.12);
    }

    .service-industry-pill {
        border: 1px solid rgba(14, 165, 233, 0.12);
        background: rgba(255, 255, 255, 0.82);
        box-shadow: 0 12px 24px rgba(15, 23, 42, 0.05);
    }

    .service-cta-panel {
        position: relative;
        overflow: hidden;
        background:
            linear-gradient(135deg, rgba(15, 23, 42, 0.96), rgba(8, 145, 178, 0.9)),
            url('{{ asset('assets/img/service1.png') }}');
        background-size: cover;
        background-position: center;
    }

    .service-cta-panel::before {
        content: "";
        position: absolute;
        inset: 0;
        background:
            radial-gradient(circle at 15% 20%, rgba(250, 204, 21, 0.16), transparent 22%),
            radial-gradient(circle at 85% 80%, rgba(255, 255, 255, 0.12), transparent 24%);
        pointer-events: none;
    }
</style>

<div class="service-shell">
    <div class="pt-20 md:pt-16"></div>

    <section class="service-hero">
        <div class="container relative z-10 mx-auto px-4 py-16 md:py-24">
            <div class="grid items-center gap-10 lg:grid-cols-[1.15fr_0.85fr]">
                <div>
                    <span class="service-chip">{{ $heroTag }}</span>
                    <h1 class="mt-5 max-w-3xl text-4xl font-bold font-heading leading-tight text-white md:text-6xl">
                        {{ $heroTitle }}
                    </h1>
                    <p class="mt-5 max-w-2xl text-base leading-8 text-slate-100 md:text-lg">
                        {{ $heroDescription }}
                    </p>

                    <div class="mt-8 flex flex-col gap-4 sm:flex-row">
                        <a href="{{ $heroPrimaryCta['url'] }}"
                            class="inline-flex items-center justify-center rounded-2xl bg-emerald-500 px-6 py-3 text-sm font-semibold text-white transition duration-300 hover:bg-emerald-400">
                            {{ $heroPrimaryCta['label'] }}
                        </a>
                        <a href="{{ $heroSecondaryCta['url'] }}"
                            class="inline-flex items-center justify-center rounded-2xl border border-white/20 bg-white/10 px-6 py-3 text-sm font-semibold text-white transition duration-300 hover:bg-white hover:text-slate-900">
                            {{ $heroSecondaryCta['label'] }}
                        </a>
                    </div>
                </div>

                <div class="service-hero-visual">
                    <div class="service-orbit service-orbit-one"></div>
                    <div class="service-orbit service-orbit-two"></div>
                    <div class="service-orbit service-orbit-three"></div>

                    <div class="service-floating-pill service-floating-pill-top">
                        <span class="inline-flex h-2.5 w-2.5 rounded-full bg-emerald-400"></span>
                        Strategy to launch
                    </div>

                    <div class="service-metric-panel service-metric-panel-main rounded-[1.75rem] p-6 text-white">
                        <p class="text-sm uppercase tracking-[0.28em] text-sky-200">Execution Snapshot</p>
                        <h3 class="mt-3 text-2xl font-bold">Clear planning, polished delivery</h3>
                        <p class="mt-3 text-sm leading-7 text-slate-200/90">
                            Every project is shaped to balance design quality, technical stability, and business goals.
                        </p>
                        <div class="mt-5 space-y-4">
                            <div>
                                <div class="mb-2 flex items-center justify-between text-xs uppercase tracking-[0.18em] text-slate-300">
                                    <span>User Experience</span>
                                    <span>92%</span>
                                </div>
                                <div class="service-signal-bar"><span style="width: 92%"></span></div>
                            </div>
                            <div>
                                <div class="mb-2 flex items-center justify-between text-xs uppercase tracking-[0.18em] text-slate-300">
                                    <span>Performance</span>
                                    <span>88%</span>
                                </div>
                                <div class="service-signal-bar"><span style="width: 88%"></span></div>
                            </div>
                        </div>
                    </div>

                    <div class="service-metric-panel service-metric-panel-side rounded-[1.5rem] p-5 text-white">
                        <p class="text-sm font-semibold uppercase tracking-[0.22em] text-emerald-200">Focus Areas</p>
                        <div class="mt-4 space-y-3">
                            @foreach (array_slice($heroStats, 0, 3) as $stat)
                                <div class="service-stat-card rounded-2xl bg-white/10 p-4 text-white">
                                    <div class="text-xl font-bold">{{ $stat['value'] }}</div>
                                    <div class="mt-1 text-xs uppercase tracking-[0.18em] text-sky-100">{{ $stat['label'] }}</div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="service-floating-pill service-floating-pill-bottom">
                        <span class="inline-flex h-2.5 w-2.5 rounded-full bg-sky-400"></span>
                        Design, build, support
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-14 md:py-20">
        <div class="container mx-auto px-4">
            <div class="mx-auto max-w-3xl text-center">
                <span class="text-sm font-semibold uppercase tracking-[0.28em] text-sky-700">What We Offer</span>
                <h2 class="mt-4 text-3xl font-bold font-heading text-slate-900 md:text-5xl">{{ $pageTitle }}</h2>
                <p class="mt-4 text-base leading-8 text-slate-600 md:text-lg">{{ $pageDescription }}</p>
            </div>

            <div class="mt-12 grid gap-6 md:grid-cols-2 xl:grid-cols-3">
                @foreach ($serviceHighlights as $highlight)
                    <article class="service-card rounded-[1.75rem] p-7">
                        <div class="inline-flex h-12 w-12 items-center justify-center rounded-2xl bg-sky-100 text-xl text-sky-700">
                            <i class="{{ $highlight['icon'] }}"></i>
                        </div>
                        <h3 class="mt-5 text-xl font-bold text-slate-900">{{ $highlight['title'] }}</h3>
                        <p class="mt-3 text-sm leading-7 text-slate-600">{{ $highlight['description'] }}</p>
                    </article>
                @endforeach
            </div>
        </div>
    </section>

    <section class="bg-slate-950/95 py-14 md:py-20">
        <div class="container mx-auto px-4">
            <div class="grid gap-10 lg:grid-cols-[0.9fr_1.1fr]">
                <div>
                    <span class="text-sm font-semibold uppercase tracking-[0.28em] text-teal-300">Our Process</span>
                    <h2 class="mt-4 text-3xl font-bold font-heading text-white md:text-5xl">
                        Structured execution from idea to launch
                    </h2>
                    <p class="mt-4 max-w-xl text-base leading-8 text-slate-300">
                        We keep projects clear, collaborative, and measurable so you know what is happening at each stage.
                    </p>
                </div>

                <div class="grid gap-5">
                    @foreach ($processSteps as $index => $step)
                        <article class="service-process-card rounded-[1.5rem] p-6">
                            <div class="flex flex-col gap-4 sm:flex-row sm:items-start">
                                <span class="service-step-badge">{{ $index + 1 }}</span>
                                <div>
                                    <h3 class="text-xl font-bold text-slate-900">{{ $step['title'] }}</h3>
                                    <p class="mt-3 text-sm leading-7 text-slate-600">{{ $step['description'] }}</p>
                                </div>
                            </div>
                        </article>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    <section class="py-14 md:py-20">
        <div class="container mx-auto px-4">
            <div class="grid gap-8 lg:grid-cols-[1fr_0.95fr]">
                <div class="service-card rounded-[1.9rem] p-8 md:p-10">
                    <span class="text-sm font-semibold uppercase tracking-[0.28em] text-emerald-700">Project Deliverables</span>
                    <h2 class="mt-4 text-3xl font-bold font-heading text-slate-900 md:text-4xl">
                        What you can expect from our team
                    </h2>
                    <div class="mt-8 grid gap-5">
                        @foreach ($deliverables as $deliverable)
                            <div class="service-deliverable-item">
                                <h3 class="text-lg font-semibold text-slate-900">{{ $deliverable['title'] }}</h3>
                                <p class="mt-2 text-sm leading-7 text-slate-600">{{ $deliverable['description'] }}</p>
                            </div>
                        @endforeach
                    </div>
                </div>

                <div class="rounded-[1.9rem] border border-sky-100 bg-gradient-to-br from-sky-50 via-white to-emerald-50 p-8 md:p-10">
                    <span class="text-sm font-semibold uppercase tracking-[0.28em] text-sky-700">Industries We Support</span>
                    <h2 class="mt-4 text-3xl font-bold font-heading text-slate-900 md:text-4xl">
                        Solutions shaped for real business workflows
                    </h2>
                    <p class="mt-4 text-sm leading-7 text-slate-600">
                        We adapt the same strong technical foundation for different industries, customer journeys, and business goals.
                    </p>

                    <div class="mt-8 flex flex-wrap gap-3">
                        @foreach ($industries as $industry)
                            <span class="service-industry-pill rounded-full px-4 py-3 text-sm font-medium text-slate-700">
                                {{ $industry }}
                            </span>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="bg-slate-50 py-14 md:py-20">
        <div class="container mx-auto px-4">
            <div class="mx-auto max-w-3xl text-center">
                <span class="text-sm font-semibold uppercase tracking-[0.28em] text-sky-700">FAQs</span>
                <h2 class="mt-4 text-3xl font-bold font-heading text-slate-900 md:text-5xl">
                    Common questions before starting
                </h2>
            </div>

            <div class="mx-auto mt-12 grid max-w-4xl gap-5">
                @foreach ($faqs as $faq)
                    <article class="service-faq-card rounded-[1.5rem] bg-white p-6">
                        <h3 class="text-lg font-bold text-slate-900">{{ $faq['question'] }}</h3>
                        <p class="mt-3 text-sm leading-7 text-slate-600">{{ $faq['answer'] }}</p>
                    </article>
                @endforeach
            </div>
        </div>
    </section>

    <section class="py-14 md:py-20">
        <div class="container mx-auto px-4">
            <div class="service-cta-panel rounded-[2rem] px-6 py-10 md:px-10 md:py-14">
                <div class="relative z-10 grid gap-8 lg:grid-cols-[1fr_auto] lg:items-center">
                    <div>
                        <h2 class="text-3xl font-bold font-heading text-white md:text-5xl">{{ $ctaTitle }}</h2>
                        <p class="mt-4 max-w-2xl text-base leading-8 text-slate-100/90">{{ $ctaDescription }}</p>
                    </div>

                    <div class="flex flex-col gap-4 sm:flex-row lg:flex-col">
                        <a href="{{ url('contact-us') }}"
                            class="inline-flex items-center justify-center rounded-2xl bg-white px-6 py-3 text-sm font-semibold text-slate-900 transition duration-300 hover:bg-slate-100">
                            Contact Us
                        </a>
                        <a href="tel:+919870992118"
                            class="inline-flex items-center justify-center rounded-2xl border border-white/20 bg-white/10 px-6 py-3 text-sm font-semibold text-white transition duration-300 hover:bg-white hover:text-slate-900">
                            Call +91 98709 92118
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
