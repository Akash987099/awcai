@extends('layout.app')

@section('title', $page['title'])
@section('meta_description', $page['meta_description'])
@section('canonical', $page['canonical'])

@section('content')
    <style>
        .marketing-shell {
            --mk-ink: #0f172a;
            --mk-soft-ink: #334155;
            --mk-cream: #fff8ef;
            --mk-peach: #ffe3bf;
            --mk-gold: #f59e0b;
            --mk-orange: #f97316;
            --mk-coral: #ea580c;
            --mk-navy: #111827;
            --mk-deep: #1e1b4b;
            background:
                radial-gradient(circle at top left, rgba(249, 115, 22, 0.12), transparent 24%),
                radial-gradient(circle at right 10%, rgba(245, 158, 11, 0.12), transparent 22%),
                linear-gradient(180deg, #fff8ef 0%, #fffdf8 30%, #f8fafc 100%);
        }

        .marketing-shell .marketing-container {
            width: min(1220px, calc(100% - 2rem));
            margin: 0 auto;
        }

        .marketing-hero {
            position: relative;
            overflow: hidden;
            background:
                radial-gradient(circle at 18% 18%, rgba(251, 191, 36, 0.22), transparent 20%),
                radial-gradient(circle at 82% 28%, rgba(249, 115, 22, 0.20), transparent 22%),
                linear-gradient(135deg, #0f172a 0%, #111827 34%, #312e81 72%, #9a3412 100%);
        }

        .marketing-hero::before {
            content: "";
            position: absolute;
            inset: 0;
            background:
                linear-gradient(rgba(255, 255, 255, 0.06) 1px, transparent 1px),
                linear-gradient(90deg, rgba(255, 255, 255, 0.06) 1px, transparent 1px);
            background-size: 54px 54px;
            mask-image: linear-gradient(140deg, rgba(0, 0, 0, 0.78), transparent 78%);
            pointer-events: none;
        }

        .marketing-hero::after {
            content: "";
            position: absolute;
            inset: auto auto -7rem -4rem;
            width: 16rem;
            height: 16rem;
            border-radius: 9999px;
            background: radial-gradient(circle, rgba(255, 255, 255, 0.14), rgba(255, 255, 255, 0));
            filter: blur(8px);
            pointer-events: none;
        }

        .marketing-glass {
            border: 1px solid rgba(255, 255, 255, 0.14);
            background: rgba(255, 255, 255, 0.08);
            backdrop-filter: blur(18px);
            box-shadow: 0 24px 70px rgba(15, 23, 42, 0.24);
        }

        .marketing-panel,
        .marketing-card,
        .marketing-process-card,
        .marketing-faq-card,
        .marketing-link-card {
            border: 1px solid rgba(148, 163, 184, 0.16);
            box-shadow: 0 18px 48px rgba(15, 23, 42, 0.08);
        }

        .marketing-panel {
            background: rgba(255, 255, 255, 0.92);
            backdrop-filter: blur(12px);
        }

        .marketing-card {
            position: relative;
            overflow: hidden;
            background: linear-gradient(180deg, rgba(255, 255, 255, 0.98), rgba(255, 247, 237, 0.88));
        }

        .marketing-card::before {
            content: "";
            position: absolute;
            inset: auto -8% -35% auto;
            width: 8rem;
            height: 8rem;
            border-radius: 9999px;
            background: radial-gradient(circle, rgba(249, 115, 22, 0.12), rgba(249, 115, 22, 0));
        }

        .marketing-section-label {
            display: inline-flex;
            align-items: center;
            gap: 0.65rem;
            font-size: 0.74rem;
            font-weight: 800;
            letter-spacing: 0.28em;
            text-transform: uppercase;
            color: #c2410c;
        }

        .marketing-section-label::before {
            content: "";
            width: 2.25rem;
            height: 1px;
            background: linear-gradient(90deg, rgba(249, 115, 22, 0.85), rgba(249, 115, 22, 0.05));
        }

        .marketing-orb {
            position: absolute;
            border-radius: 9999px;
            border: 1px solid rgba(255, 255, 255, 0.12);
            background: rgba(255, 255, 255, 0.05);
        }

        .marketing-orb-one {
            top: 8%;
            right: 9%;
            width: 14rem;
            height: 14rem;
        }

        .marketing-orb-two {
            bottom: 6%;
            right: 34%;
            width: 7rem;
            height: 7rem;
        }

        .marketing-orb-three {
            top: 38%;
            left: 8%;
            width: 5.5rem;
            height: 5.5rem;
        }

        .marketing-data-card {
            position: relative;
            border: 1px solid rgba(255, 255, 255, 0.14);
            background: linear-gradient(180deg, rgba(15, 23, 42, 0.78), rgba(30, 41, 59, 0.62));
            box-shadow: 0 22px 55px rgba(15, 23, 42, 0.24);
        }

        .marketing-kpi {
            border: 1px solid rgba(255, 255, 255, 0.12);
            background: rgba(255, 255, 255, 0.06);
        }

        .marketing-signal {
            height: 0.65rem;
            border-radius: 9999px;
            background: rgba(255, 255, 255, 0.08);
            overflow: hidden;
        }

        .marketing-signal span {
            display: block;
            height: 100%;
            border-radius: inherit;
            background: linear-gradient(90deg, #f59e0b 0%, #f97316 55%, #fb7185 100%);
        }

        .marketing-floating-chip {
            position: absolute;
            display: inline-flex;
            align-items: center;
            gap: 0.6rem;
            border-radius: 9999px;
            border: 1px solid rgba(255, 255, 255, 0.12);
            background: rgba(255, 255, 255, 0.09);
            padding: 0.8rem 1rem;
            color: #fff7ed;
            font-size: 0.85rem;
            backdrop-filter: blur(14px);
        }

        .marketing-floating-top {
            top: 1rem;
            left: 1rem;
        }

        .marketing-floating-bottom {
            right: 1rem;
            bottom: 1rem;
        }

        .marketing-pillar-icon,
        .marketing-process-index,
        .marketing-deliverable-index,
        .marketing-related-icon {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 3rem;
            height: 3rem;
            border-radius: 1rem;
            background: linear-gradient(135deg, #f97316, #fb7185);
            color: #ffffff;
            box-shadow: 0 14px 34px rgba(249, 115, 22, 0.24);
        }

        .marketing-spotlight-card {
            position: relative;
            overflow: hidden;
            background: linear-gradient(140deg, #ffffff 0%, #fff7ed 100%);
            border: 1px solid rgba(251, 146, 60, 0.18);
            box-shadow: 0 18px 40px rgba(234, 88, 12, 0.08);
        }

        .marketing-spotlight-card::after {
            content: "";
            position: absolute;
            inset: 0 0 auto auto;
            width: 7rem;
            height: 7rem;
            background: radial-gradient(circle, rgba(251, 191, 36, 0.18), rgba(251, 191, 36, 0));
            transform: translate(35%, -25%);
        }

        .marketing-process-strip {
            background:
                radial-gradient(circle at top left, rgba(251, 191, 36, 0.16), transparent 20%),
                linear-gradient(135deg, #111827 0%, #1f2937 50%, #7c2d12 100%);
        }

        .marketing-process-card {
            background: linear-gradient(180deg, rgba(255, 255, 255, 0.98), rgba(255, 248, 240, 0.92));
        }

        .marketing-link-card {
            position: sticky;
            top: 6.5rem;
            background: linear-gradient(180deg, rgba(255, 255, 255, 0.98), rgba(255, 251, 235, 0.94));
        }

        .marketing-link-group {
            border: 1px solid rgba(251, 146, 60, 0.14);
            background: rgba(255, 247, 237, 0.78);
        }

        .marketing-link-pill {
            display: inline-flex;
            align-items: center;
            border-radius: 9999px;
            border: 1px solid rgba(251, 146, 60, 0.18);
            background: rgba(255, 255, 255, 0.96);
            padding: 0.7rem 0.95rem;
            font-size: 0.76rem;
            font-weight: 700;
            color: #334155;
            transition: 180ms ease;
        }

        .marketing-link-pill:hover {
            transform: translateY(-2px);
            border-color: rgba(249, 115, 22, 0.4);
            color: #c2410c;
            box-shadow: 0 10px 22px rgba(249, 115, 22, 0.12);
        }

        .marketing-deliverable {
            display: grid;
            grid-template-columns: auto 1fr;
            gap: 1rem;
            border: 1px solid rgba(226, 232, 240, 0.8);
            background: linear-gradient(180deg, #ffffff 0%, #fffaf5 100%);
        }

        .marketing-related-item {
            border: 1px solid rgba(251, 146, 60, 0.12);
            background: rgba(255, 255, 255, 0.92);
            transition: 180ms ease;
        }

        .marketing-related-item:hover {
            transform: translateY(-3px);
            border-color: rgba(249, 115, 22, 0.34);
            box-shadow: 0 18px 32px rgba(249, 115, 22, 0.10);
        }

        .marketing-faq-card {
            background: linear-gradient(180deg, rgba(255, 255, 255, 0.98), rgba(248, 250, 252, 0.96));
        }

        .marketing-cta {
            position: relative;
            overflow: hidden;
            background:
                radial-gradient(circle at 15% 20%, rgba(251, 191, 36, 0.18), transparent 24%),
                radial-gradient(circle at 80% 78%, rgba(255, 255, 255, 0.16), transparent 24%),
                linear-gradient(135deg, #111827 0%, #7c2d12 54%, #f97316 100%);
        }

        .marketing-cta::before {
            content: "";
            position: absolute;
            inset: 0;
            background-image:
                linear-gradient(rgba(255, 255, 255, 0.05) 1px, transparent 1px),
                linear-gradient(90deg, rgba(255, 255, 255, 0.05) 1px, transparent 1px);
            background-size: 44px 44px;
            opacity: 0.65;
        }

        @media (max-width: 1023.98px) {
            .marketing-link-card {
                position: static;
            }
        }

        @media (max-width: 767.98px) {
            .marketing-shell .marketing-container {
                width: min(100% - 1rem, 1220px);
            }

            .marketing-orb-one {
                width: 9rem;
                height: 9rem;
            }

            .marketing-orb-two {
                width: 5rem;
                height: 5rem;
            }

            .marketing-orb-three {
                width: 4rem;
                height: 4rem;
            }

            .marketing-floating-chip {
                position: static;
                margin-top: 1rem;
                width: fit-content;
            }
        }
    </style>

    <div class="marketing-shell">
        <div class="pt-20 md:pt-16"></div>

        <section class="marketing-hero">
            <div class="marketing-container relative z-10 py-16 md:py-24">
                @if (!empty($breadcrumbs))
                    <div class="mb-8 flex flex-wrap items-center gap-2 text-sm text-orange-100/85">
                        @foreach ($breadcrumbs as $breadcrumb)
                            <a href="{{ $breadcrumb['url'] }}" class="transition hover:text-white">{{ $breadcrumb['label'] }}</a>
                            @if (!$loop->last)
                                <span class="text-orange-200/70">/</span>
                            @endif
                        @endforeach
                    </div>
                @endif

                <div class="grid items-center gap-10 lg:grid-cols-[1.05fr_0.95fr]">
                    <div class="relative">
                        <span class="inline-flex rounded-full border border-white/15 bg-white/10 px-4 py-2 text-[0.72rem] font-semibold uppercase tracking-[0.28em] text-orange-100">
                            {{ $page['eyebrow'] }}
                        </span>
                        <h1 class="mt-6 max-w-4xl text-4xl font-bold font-heading leading-tight text-white md:text-6xl">
                            {{ $page['hero_title'] }}
                        </h1>
                        <p class="mt-6 max-w-3xl text-base leading-8 text-orange-50/95 md:text-lg">
                            {{ $page['hero_description'] }}
                        </p>

                        <div class="mt-8 flex flex-col gap-4 sm:flex-row">
                            <a href="{{ route('digital-marketing.overview') }}"
                                class="inline-flex items-center justify-center rounded-2xl bg-orange-500 px-6 py-3 text-sm font-semibold text-white transition duration-300 hover:-translate-y-0.5 hover:bg-orange-400">
                                Digital Marketing Home
                            </a>
                            <a href="{{ route('complate_project') }}"
                                class="inline-flex items-center justify-center rounded-2xl border border-white/18 bg-white/10 px-6 py-3 text-sm font-semibold text-white transition duration-300 hover:bg-white hover:text-slate-900">
                                See Our Projects
                            </a>
                        </div>
                    </div>

                    <div class="relative min-h-[420px]">
                        <div class="marketing-orb marketing-orb-one"></div>
                        <div class="marketing-orb marketing-orb-two"></div>
                        <div class="marketing-orb marketing-orb-three"></div>

                        <div class="marketing-floating-chip marketing-floating-top">
                            <span class="inline-flex h-2.5 w-2.5 rounded-full bg-amber-300"></span>
                            Channel strategy aligned
                        </div>

                        <div class="marketing-glass rounded-[2rem] p-5 md:p-6">
                            <div class="marketing-data-card rounded-[1.75rem] p-6 text-white">
                                <div class="flex items-start justify-between gap-4">
                                    <div>
                                        <p class="text-xs font-semibold uppercase tracking-[0.24em] text-orange-200">{{ $page['hero_badge'] }}</p>
                                        <h2 class="mt-3 text-3xl font-bold">Performance cockpit</h2>
                                    </div>
                                    <div class="inline-flex h-14 w-14 items-center justify-center rounded-2xl bg-white/10 text-2xl text-orange-200">
                                        <i class="fas fa-wave-square"></i>
                                    </div>
                                </div>

                                <p class="mt-4 text-sm leading-7 text-slate-200/95">
                                    {{ $page['summary'] }}
                                </p>

                                <div class="mt-6 space-y-4">
                                    <div>
                                        <div class="mb-2 flex items-center justify-between text-[0.68rem] uppercase tracking-[0.24em] text-orange-100/85">
                                            <span>Traffic Quality</span>
                                            <span>92%</span>
                                        </div>
                                        <div class="marketing-signal"><span style="width: 92%"></span></div>
                                    </div>
                                    <div>
                                        <div class="mb-2 flex items-center justify-between text-[0.68rem] uppercase tracking-[0.24em] text-orange-100/85">
                                            <span>Message Clarity</span>
                                            <span>88%</span>
                                        </div>
                                        <div class="marketing-signal"><span style="width: 88%"></span></div>
                                    </div>
                                    <div>
                                        <div class="mb-2 flex items-center justify-between text-[0.68rem] uppercase tracking-[0.24em] text-orange-100/85">
                                            <span>Conversion Readiness</span>
                                            <span>84%</span>
                                        </div>
                                        <div class="marketing-signal"><span style="width: 84%"></span></div>
                                    </div>
                                </div>

                                <div class="mt-6 grid gap-4 sm:grid-cols-2">
                                    @foreach ($page['stat_cards'] as $stat)
                                        <div class="marketing-kpi rounded-2xl p-4">
                                            <div class="text-xl font-bold text-white">{{ $stat['value'] }}</div>
                                            <div class="mt-1 text-[0.68rem] uppercase tracking-[0.22em] text-orange-100/90">{{ $stat['label'] }}</div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>

                        <div class="marketing-floating-chip marketing-floating-bottom">
                            <span class="inline-flex h-2.5 w-2.5 rounded-full bg-rose-300"></span>
                            Design, growth, and conversion in one flow
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="-mt-8 pb-8 md:-mt-12 md:pb-10">
            <div class="marketing-container">
                <div class="marketing-panel rounded-[2rem] p-6 md:p-8">
                    <div class="grid gap-6 lg:grid-cols-[1fr_0.95fr] lg:items-center">
                        <div>
                            <span class="marketing-section-label">Growth Framework</span>
                            <h2 class="mt-4 text-3xl font-bold font-heading text-slate-900 md:text-5xl">A sharper, more premium presentation for every marketing page</h2>
                        </div>
                        <p class="text-sm leading-8 text-slate-600 md:text-base">
                            Yeh section ab sirf content list nahi lagta. Isko is tarah shape kiya gaya hai ki visitors ko premium agency feel aaye, service depth samajh aaye, aur related pages tak move karna effortless lage.
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <section class="py-10 md:py-16">
            <div class="marketing-container">
                <div class="grid gap-8 lg:grid-cols-[1fr_0.86fr]">
                    <div>
                        <span class="marketing-section-label">Core Pillars</span>
                        <h2 class="mt-4 max-w-3xl text-3xl font-bold font-heading text-slate-900 md:text-5xl">The page now feels built around strategy, not templates</h2>

                        <div class="mt-10 grid gap-6 md:grid-cols-2">
                            @foreach ($page['pillars'] as $pillar)
                                <article class="marketing-card rounded-[1.9rem] p-7">
                                    <div class="marketing-pillar-icon">
                                        <i class="fas fa-bullseye"></i>
                                    </div>
                                    <h3 class="mt-6 text-2xl font-bold text-slate-900">{{ $pillar['title'] }}</h3>
                                    <p class="mt-3 text-sm leading-8 text-slate-600">{{ $pillar['description'] }}</p>
                                </article>
                            @endforeach
                        </div>
                    </div>

                    <aside class="marketing-link-card rounded-[2rem] p-7 md:p-8">
                        <span class="marketing-section-label">Explore Routes</span>
                        <h2 class="mt-4 text-3xl font-bold font-heading text-slate-900">Active digital marketing navigation</h2>
                        <p class="mt-4 text-sm leading-7 text-slate-600">
                            Har category aur child page ko grouped format mein rakha gaya hai, jisse dropdown aur page exploration dono zyada useful feel karte hain.
                        </p>

                        <div class="mt-8 space-y-4">
                            @foreach ($sections as $section)
                                <div class="marketing-link-group rounded-[1.6rem] p-4">
                                    <a href="{{ $section['url'] }}" class="text-base font-bold text-slate-900 transition hover:text-orange-600">
                                        {{ $section['title'] }}
                                    </a>
                                    <div class="mt-4 flex flex-wrap gap-2">
                                        @foreach ($section['children'] as $child)
                                            <a href="{{ $child['url'] }}" class="marketing-link-pill">
                                                {{ $child['title'] }}
                                            </a>
                                        @endforeach
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </aside>
                </div>
            </div>
        </section>

        @if (!empty($page['spotlight_links']))
            <section class="py-8 md:py-12">
                <div class="marketing-container">
                    <div class="text-center">
                        <span class="marketing-section-label justify-center">Spotlight Links</span>
                        <h2 class="mt-4 text-3xl font-bold font-heading text-slate-900 md:text-5xl">Jump into the exact page your visitor is looking for</h2>
                    </div>

                    <div class="mt-12 grid gap-6 md:grid-cols-2 xl:grid-cols-3">
                        @foreach ($page['spotlight_links'] as $link)
                            <article class="marketing-spotlight-card rounded-[1.75rem] p-7">
                                <div class="inline-flex rounded-full border border-orange-200 bg-white/90 px-3 py-1 text-[0.68rem] font-semibold uppercase tracking-[0.24em] text-orange-600">
                                    Page Route
                                </div>
                                <h3 class="mt-5 text-2xl font-bold text-slate-900">{{ $link['title'] }}</h3>
                                <p class="mt-3 text-sm leading-8 text-slate-600">{{ $link['description'] }}</p>
                                <a href="{{ $link['url'] }}" class="mt-6 inline-flex items-center gap-2 text-sm font-semibold text-orange-600 transition hover:text-orange-700">
                                    Open Page
                                    <i class="fas fa-arrow-right text-xs"></i>
                                </a>
                            </article>
                        @endforeach
                    </div>
                </div>
            </section>
        @endif

        <section class="marketing-process-strip py-16 md:py-20">
            <div class="marketing-container">
                <div class="flex flex-col gap-4 md:flex-row md:items-end md:justify-between">
                    <div>
                        <span class="inline-flex text-xs font-semibold uppercase tracking-[0.28em] text-amber-200">Execution Flow</span>
                        <h2 class="mt-4 max-w-3xl text-3xl font-bold font-heading text-white md:text-5xl">The process section now reads like a proper premium workflow</h2>
                    </div>
                    <p class="max-w-xl text-sm leading-8 text-orange-100/85">
                        Har step ko visually separate kiya gaya hai taaki planning, launch, aur optimization ek strong business process jaisa lage.
                    </p>
                </div>

                <div class="mt-12 grid gap-5 lg:grid-cols-4">
                    @foreach ($page['process'] as $index => $step)
                        <article class="marketing-process-card rounded-[1.7rem] p-6">
                            <div class="marketing-process-index">
                                {{ $index + 1 }}
                            </div>
                            <h3 class="mt-5 text-xl font-bold text-slate-900">{{ $step['title'] }}</h3>
                            <p class="mt-3 text-sm leading-8 text-slate-600">{{ $step['description'] }}</p>
                        </article>
                    @endforeach
                </div>
            </div>
        </section>

        <section class="py-16 md:py-20">
            <div class="marketing-container">
                <div class="grid gap-8 lg:grid-cols-[1fr_0.9fr]">
                    <div class="marketing-panel rounded-[2rem] p-8 md:p-10">
                        <span class="marketing-section-label">Deliverables</span>
                        <h2 class="mt-4 text-3xl font-bold font-heading text-slate-900 md:text-5xl">What this structure gives your brand</h2>

                        <div class="mt-8 grid gap-5">
                            @foreach ($page['deliverables'] as $deliverable)
                                <div class="marketing-deliverable rounded-[1.5rem] p-5">
                                    <div class="marketing-deliverable-index">
                                        <i class="fas fa-check"></i>
                                    </div>
                                    <div>
                                        <h3 class="text-lg font-bold text-slate-900">{{ $deliverable['title'] }}</h3>
                                        <p class="mt-2 text-sm leading-8 text-slate-600">{{ $deliverable['description'] }}</p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="marketing-panel rounded-[2rem] p-8 md:p-10">
                        <span class="marketing-section-label">Related Pages</span>
                        <h2 class="mt-4 text-3xl font-bold font-heading text-slate-900 md:text-5xl">Keep visitors moving inside the right section</h2>
                        <p class="mt-4 text-sm leading-8 text-slate-600">
                            Related links ko ab better hierarchy aur stronger hover state ke saath design kiya gaya hai, jisse section depth clearly feel hoti hai.
                        </p>

                        <div class="mt-8 space-y-4">
                            @foreach ($relatedPages as $relatedPage)
                                <a href="{{ $relatedPage['url'] }}" class="marketing-related-item flex gap-4 rounded-[1.5rem] p-5">
                                    <div class="marketing-related-icon">
                                        <i class="fas fa-compass"></i>
                                    </div>
                                    <div>
                                        <div class="text-base font-bold text-slate-900">{{ $relatedPage['title'] }}</div>
                                        <div class="mt-2 text-sm leading-7 text-slate-600">{{ $relatedPage['description'] }}</div>
                                    </div>
                                </a>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="py-8 md:py-12">
            <div class="marketing-container">
                <div class="text-center">
                    <span class="marketing-section-label justify-center">FAQs</span>
                    <h2 class="mt-4 text-3xl font-bold font-heading text-slate-900 md:text-5xl">Clean answers, stronger trust, less page friction</h2>
                </div>

                <div class="mx-auto mt-12 grid max-w-5xl gap-5">
                    @foreach ($page['faqs'] as $faq)
                        <article class="marketing-faq-card rounded-[1.7rem] p-6 md:p-7">
                            <h3 class="text-xl font-bold text-slate-900">{{ $faq['question'] }}</h3>
                            <p class="mt-3 text-sm leading-8 text-slate-600">{{ $faq['answer'] }}</p>
                        </article>
                    @endforeach
                </div>
            </div>
        </section>

        <section class="py-16 md:py-20">
            <div class="marketing-container">
                <div class="marketing-cta rounded-[2.2rem] px-6 py-10 md:px-10 md:py-14">
                    <div class="relative z-10 grid gap-8 lg:grid-cols-[1fr_auto] lg:items-center">
                        <div>
                            <span class="inline-flex text-xs font-semibold uppercase tracking-[0.28em] text-orange-100">Ready To Launch</span>
                            <h2 class="mt-4 text-3xl font-bold font-heading text-white md:text-5xl">{{ $page['cta']['title'] }}</h2>
                            <p class="mt-4 max-w-2xl text-base leading-8 text-orange-50/92">{{ $page['cta']['description'] }}</p>
                        </div>

                        <div class="flex flex-col gap-4 sm:flex-row lg:flex-col">
                            <a href="{{ route('digital-marketing.overview') }}"
                                class="inline-flex items-center justify-center rounded-2xl bg-white px-6 py-3 text-sm font-semibold text-slate-900 transition duration-300 hover:bg-orange-50">
                                View All Marketing Pages
                            </a>
                            <a href="{{ url('contact-us') }}"
                                class="inline-flex items-center justify-center rounded-2xl border border-white/18 bg-white/10 px-6 py-3 text-sm font-semibold text-white transition duration-300 hover:bg-white hover:text-slate-900">
                                Contact Us
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
