@extends('layout.app')

@section('title', $page['title'])
@section('meta_description', $page['meta_description'])
@section('canonical', $page['canonical'])

@section('content')
    <style>
        .career-shell {
            background:
                radial-gradient(circle at top left, rgba(251, 191, 36, 0.12), transparent 22%),
                radial-gradient(circle at right 10%, rgba(249, 115, 22, 0.12), transparent 24%),
                linear-gradient(180deg, #fffaf3 0%, #ffffff 40%, #f8fafc 100%);
        }

        .career-wrap {
            width: min(1220px, calc(100% - 2rem));
            margin: 0 auto;
        }

        .career-hero {
            position: relative;
            overflow: hidden;
            background: linear-gradient(135deg, #111827 0%, #7c2d12 56%, #ea580c 100%);
        }

        .career-hero::before {
            content: "";
            position: absolute;
            inset: 0;
            background-image:
                linear-gradient(rgba(255, 255, 255, 0.05) 1px, transparent 1px),
                linear-gradient(90deg, rgba(255, 255, 255, 0.05) 1px, transparent 1px);
            background-size: 42px 42px;
            mask-image: linear-gradient(145deg, rgba(0, 0, 0, 0.8), transparent 80%);
            pointer-events: none;
        }

        .career-glass {
            border: 1px solid rgba(255, 255, 255, 0.15);
            background: rgba(255, 255, 255, 0.09);
            backdrop-filter: blur(15px);
            box-shadow: 0 24px 70px rgba(17, 24, 39, 0.30);
        }

        .career-panel,
        .career-card {
            border: 1px solid rgba(148, 163, 184, 0.18);
            background: rgba(255, 255, 255, 0.95);
            box-shadow: 0 18px 44px rgba(15, 23, 42, 0.08);
        }

        .career-intro-panel {
            position: relative;
            overflow: hidden;
            border: 1px solid rgba(251, 146, 60, 0.24);
            background:
                radial-gradient(circle at top right, rgba(251, 191, 36, 0.14), transparent 26%),
                linear-gradient(180deg, rgba(255, 255, 255, 0.99), rgba(255, 247, 237, 0.96));
            box-shadow: 0 24px 56px rgba(15, 23, 42, 0.10);
        }

        .career-intro-panel::after {
            content: "";
            position: absolute;
            inset: 0 auto 0 0;
            width: 0.35rem;
            background: linear-gradient(180deg, #f97316 0%, #fb7185 100%);
        }

        .career-section-label {
            display: inline-flex;
            align-items: center;
            gap: 0.7rem;
            font-size: 0.74rem;
            font-weight: 800;
            letter-spacing: 0.28em;
            text-transform: uppercase;
            color: #c2410c;
        }

        .career-section-label::before {
            content: "";
            width: 2.2rem;
            height: 1px;
            background: linear-gradient(90deg, rgba(194, 65, 12, 0.95), rgba(194, 65, 12, 0.08));
        }

        .career-icon,
        .career-step-index {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 3rem;
            height: 3rem;
            border-radius: 1rem;
            color: #fff;
            background: linear-gradient(135deg, #f97316, #fb7185);
            box-shadow: 0 14px 32px rgba(249, 115, 22, 0.22);
        }

        .career-stat {
            border: 1px solid rgba(255, 255, 255, 0.14);
            background: rgba(255, 255, 255, 0.08);
        }

        .career-pill {
            display: inline-flex;
            align-items: center;
            border-radius: 9999px;
            border: 1px solid rgba(251, 146, 60, 0.18);
            background: rgba(255, 247, 237, 0.82);
            padding: 0.62rem 0.95rem;
            font-size: 0.76rem;
            font-weight: 700;
            color: #7c2d12;
        }

        @media (max-width: 767.98px) {
            .career-wrap {
                width: min(100% - 1rem, 1220px);
            }
        }
    </style>

    <div class="career-shell">
        <div class="pt-20 md:pt-16"></div>

        <section class="career-hero">
            <div class="career-wrap relative z-10 py-16 md:py-24">
                <div class="grid items-center gap-10 lg:grid-cols-[1.02fr_0.98fr]">
                    <div>
                        <span class="inline-flex rounded-full border border-white/15 bg-white/10 px-4 py-2 text-[0.72rem] font-semibold uppercase tracking-[0.28em] text-orange-100">
                            {{ $page['eyebrow'] }}
                        </span>
                        <h1 class="mt-6 max-w-4xl text-4xl font-bold font-heading leading-tight text-white md:text-6xl">
                            {{ $page['hero_title'] }}
                        </h1>
                        <p class="mt-6 max-w-3xl text-base leading-8 text-orange-50/92 md:text-lg">
                            {{ $page['hero_description'] }}
                        </p>

                        <div class="mt-8 flex flex-col gap-4 sm:flex-row">
                            <a href="mailto:aryawebcoding@gmail.com?subject=Career%20Application"
                                class="inline-flex items-center justify-center rounded-2xl bg-white px-6 py-3 text-sm font-semibold text-slate-900 transition duration-300 hover:bg-orange-50">
                                Apply By Email
                            </a>
                            <a href="{{ route('contact.index') }}"
                                class="inline-flex items-center justify-center rounded-2xl border border-white/18 bg-white/10 px-6 py-3 text-sm font-semibold text-white transition duration-300 hover:bg-white hover:text-slate-900">
                                Talk To Our Team
                            </a>
                        </div>

                        <div class="mt-10 grid gap-4 sm:grid-cols-3">
                            @foreach ($page['stats'] as $stat)
                                <div class="career-stat rounded-2xl p-4 text-white">
                                    <div class="text-lg font-bold">{{ $stat['value'] }}</div>
                                    <div class="mt-1 text-[0.7rem] uppercase tracking-[0.22em] text-orange-100/90">{{ $stat['label'] }}</div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="career-glass rounded-[2rem] p-5 md:p-6">
                        <div class="rounded-[1.7rem] bg-slate-950/55 p-6 text-white">
                            <p class="text-xs font-semibold uppercase tracking-[0.26em] text-orange-200">Team Snapshot</p>
                            <h2 class="mt-3 text-3xl font-bold">People who enjoy making useful work</h2>
                            <p class="mt-4 text-sm leading-7 text-slate-200/92">
                                Hum aise logon ke saath kaam karna pasand karte hain jo ownership lete hain, user experience ko seriously lete hain, aur real client problems solve karne mein interest rakhte hain.
                            </p>

                            <div class="mt-6 space-y-4">
                                @foreach ($page['benefits'] as $benefit)
                                    <div class="rounded-2xl border border-white/10 bg-white/5 p-4">
                                        <div class="flex items-start gap-4">
                                            <div class="career-icon h-12 w-12 flex-shrink-0">
                                                <i class="fas {{ $benefit['icon'] }}"></i>
                                            </div>
                                            <div>
                                                <h3 class="text-lg font-bold text-white">{{ $benefit['title'] }}</h3>
                                                <p class="mt-2 text-sm leading-7 text-slate-200/88">{{ $benefit['description'] }}</p>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="py-10 md:py-14">
            <div class="career-wrap">
                <div class="career-intro-panel rounded-[2rem] p-7 md:p-10">
                    <div class="grid gap-8 lg:grid-cols-[1.02fr_0.98fr] lg:items-center">
                        <div>
                            <span class="career-section-label">Why Join</span>
                            <h2 class="mt-4 max-w-3xl text-3xl font-bold font-heading leading-tight text-slate-900 md:text-5xl">
                                A workplace shaped around learning, shipping, and improving together
                            </h2>
                            <p class="mt-4 max-w-2xl text-sm leading-8 text-slate-600 md:text-base">
                                Hum aise team environment par focus karte hain jahan real project exposure ke saath growth aur responsibility dono milen.
                            </p>
                        </div>
                        <div class="rounded-[1.6rem] border border-orange-100 bg-white/80 p-5 md:p-6 text-sm leading-8 text-slate-600 md:text-base">
                            Yeh page sirf hiring notice nahi hai. Isko is tarah design kiya gaya hai ki candidates ko team culture, role clarity, aur application flow ek premium, professional format mein samajh aaye.
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="py-10 md:py-16">
            <div class="career-wrap">
                <div class="text-center">
                    <span class="career-section-label justify-center">Open Roles</span>
                    <h2 class="mt-4 text-3xl font-bold font-heading text-slate-900 md:text-5xl">Current opportunities to build with us</h2>
                </div>

                <div class="mt-12 grid gap-6 md:grid-cols-2">
                    @foreach ($page['roles'] as $role)
                        <article class="career-card rounded-[1.8rem] p-7">
                            <div class="flex flex-wrap items-center gap-3">
                                <span class="career-pill">{{ $role['type'] }}</span>
                                <span class="career-pill">{{ $role['experience'] }}</span>
                            </div>
                            <h3 class="mt-6 text-2xl font-bold text-slate-900">{{ $role['title'] }}</h3>
                            <p class="mt-3 text-sm leading-8 text-slate-600">{{ $role['description'] }}</p>

                            <div class="mt-6 flex flex-wrap gap-2">
                                @foreach ($role['skills'] as $skill)
                                    <span class="career-pill">{{ $skill }}</span>
                                @endforeach
                            </div>

                            <a href="mailto:aryawebcoding@gmail.com?subject={{ rawurlencode('Application for ' . $role['title']) }}"
                                class="mt-6 inline-flex items-center gap-2 text-sm font-semibold text-orange-600 transition hover:text-orange-700">
                                Apply for this role
                                <i class="fas fa-arrow-right text-xs"></i>
                            </a>
                        </article>
                    @endforeach
                </div>
            </div>
        </section>

        <section class="py-8 md:py-12">
            <div class="career-wrap">
                <div class="grid gap-8 lg:grid-cols-[0.96fr_1.04fr]">
                    <div class="career-panel rounded-[2rem] p-8 md:p-10">
                        <span class="career-section-label">What You Get</span>
                        <h2 class="mt-4 text-3xl font-bold font-heading text-slate-900 md:text-5xl">An environment where contribution matters</h2>
                        <div class="mt-8 grid gap-5">
                            @foreach ($page['benefits'] as $benefit)
                                <div class="rounded-[1.5rem] border border-slate-200 bg-slate-50 p-5">
                                    <div class="flex items-start gap-4">
                                        <div class="career-icon">
                                            <i class="fas {{ $benefit['icon'] }}"></i>
                                        </div>
                                        <div>
                                            <h3 class="text-xl font-bold text-slate-900">{{ $benefit['title'] }}</h3>
                                            <p class="mt-2 text-sm leading-8 text-slate-600">{{ $benefit['description'] }}</p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="career-panel rounded-[2rem] p-8 md:p-10">
                        <span class="career-section-label">Hiring Flow</span>
                        <h2 class="mt-4 text-3xl font-bold font-heading text-slate-900 md:text-5xl">A simple process that respects your time</h2>
                        <div class="mt-8 grid gap-5">
                            @foreach ($page['steps'] as $index => $step)
                                <div class="rounded-[1.5rem] border border-orange-100 bg-orange-50/60 p-5">
                                    <div class="flex items-start gap-4">
                                        <div class="career-step-index">{{ $index + 1 }}</div>
                                        <div>
                                            <h3 class="text-xl font-bold text-slate-900">{{ $step['title'] }}</h3>
                                            <p class="mt-2 text-sm leading-8 text-slate-600">{{ $step['description'] }}</p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <div class="mt-8 rounded-[1.6rem] bg-slate-950 px-6 py-6 text-white">
                            <h3 class="text-2xl font-bold font-heading">Ready to apply?</h3>
                            <p class="mt-3 text-sm leading-8 text-slate-200/90">
                                Apna resume, portfolio, ya short introduction `aryawebcoding@gmail.com` par bhejiye. Subject mein role ka naam mention kar dein for faster review.
                            </p>
                            <div class="mt-5 flex flex-col gap-3 sm:flex-row">
                                <a href="mailto:aryawebcoding@gmail.com?subject=Career%20Application%20-%20Arya%20Web%20Coding"
                                    class="inline-flex items-center justify-center rounded-2xl bg-white px-5 py-3 text-sm font-semibold text-slate-900 transition hover:bg-orange-50">
                                    Send Application
                                </a>
                                <a href="{{ route('contact.index') }}"
                                    class="inline-flex items-center justify-center rounded-2xl border border-white/15 bg-white/10 px-5 py-3 text-sm font-semibold text-white transition hover:bg-white hover:text-slate-900">
                                    Contact Us First
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
