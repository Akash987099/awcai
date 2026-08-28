@extends('layout.app')

@section('title', $page['title'])
@section('meta_description', $page['meta_description'])
@section('canonical', $page['canonical'])

@section('content')
    <style>
        .contact-shell {
            background:
                radial-gradient(circle at top left, rgba(34, 197, 94, 0.10), transparent 22%),
                radial-gradient(circle at top right, rgba(14, 165, 233, 0.12), transparent 24%),
                linear-gradient(180deg, #f7fbff 0%, #ffffff 42%, #eff6ff 100%);
        }

        .contact-wrap {
            width: min(1220px, calc(100% - 2rem));
            margin: 0 auto;
        }

        .contact-hero {
            position: relative;
            overflow: hidden;
            background: linear-gradient(135deg, #082f49 0%, #0f766e 48%, #0f172a 100%);
        }

        .contact-hero::before,
        .contact-hero::after {
            content: "";
            position: absolute;
            border-radius: 9999px;
            pointer-events: none;
        }

        .contact-hero::before {
            inset: -4rem auto auto -2rem;
            width: 15rem;
            height: 15rem;
            background: radial-gradient(circle, rgba(255, 255, 255, 0.16), rgba(255, 255, 255, 0));
        }

        .contact-hero::after {
            inset: auto -3rem -5rem auto;
            width: 18rem;
            height: 18rem;
            background: radial-gradient(circle, rgba(45, 212, 191, 0.26), rgba(45, 212, 191, 0));
        }

        .contact-glass {
            border: 1px solid rgba(255, 255, 255, 0.16);
            background: rgba(255, 255, 255, 0.08);
            backdrop-filter: blur(16px);
            box-shadow: 0 24px 70px rgba(8, 47, 73, 0.32);
        }

        .contact-card,
        .contact-panel {
            border: 1px solid rgba(148, 163, 184, 0.18);
            background: rgba(255, 255, 255, 0.94);
            box-shadow: 0 18px 44px rgba(15, 23, 42, 0.08);
        }

        .contact-intro-panel {
            position: relative;
            overflow: hidden;
            border: 1px solid rgba(125, 211, 252, 0.28);
            background:
                radial-gradient(circle at top right, rgba(45, 212, 191, 0.10), transparent 28%),
                linear-gradient(180deg, rgba(255, 255, 255, 0.98), rgba(248, 250, 252, 0.98));
            box-shadow: 0 24px 56px rgba(15, 23, 42, 0.10);
        }

        .contact-intro-panel::after {
            content: "";
            position: absolute;
            inset: 0 auto 0 0;
            width: 0.35rem;
            background: linear-gradient(180deg, #0ea5e9 0%, #14b8a6 100%);
        }

        .contact-icon {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 3.25rem;
            height: 3.25rem;
            border-radius: 1rem;
            color: #fff;
            background: linear-gradient(135deg, #0ea5e9, #14b8a6);
            box-shadow: 0 14px 32px rgba(14, 165, 233, 0.22);
        }

        .contact-section-label {
            display: inline-flex;
            align-items: center;
            gap: 0.7rem;
            font-size: 0.74rem;
            font-weight: 800;
            letter-spacing: 0.28em;
            text-transform: uppercase;
            color: #0f766e;
        }

        .contact-section-label::before {
            content: "";
            width: 2.2rem;
            height: 1px;
            background: linear-gradient(90deg, rgba(15, 118, 110, 0.95), rgba(15, 118, 110, 0.08));
        }

        .contact-stat {
            border: 1px solid rgba(255, 255, 255, 0.14);
            background: rgba(255, 255, 255, 0.08);
        }

        .contact-list li::before {
            content: "";
            width: 0.55rem;
            height: 0.55rem;
            margin-top: 0.65rem;
            border-radius: 9999px;
            background: linear-gradient(135deg, #0ea5e9, #14b8a6);
            flex-shrink: 0;
        }

        @media (max-width: 767.98px) {
            .contact-wrap {
                width: min(100% - 1rem, 1220px);
            }
        }
    </style>

    <div class="contact-shell">
        <div class="pt-20 md:pt-16"></div>

        <section class="contact-hero">
            <div class="contact-wrap relative z-10 py-16 md:py-24">
                <div class="grid items-center gap-10 lg:grid-cols-[1.04fr_0.96fr]">
                    <div>
                        <span class="inline-flex rounded-full border border-white/15 bg-white/10 px-4 py-2 text-[0.72rem] font-semibold uppercase tracking-[0.28em] text-sky-100">
                            {{ $page['eyebrow'] }}
                        </span>
                        <h1 class="mt-6 max-w-4xl text-4xl font-bold font-heading leading-tight text-white md:text-6xl">
                            {{ $page['hero_title'] }}
                        </h1>
                        <p class="mt-6 max-w-3xl text-base leading-8 text-slate-100/92 md:text-lg">
                            {{ $page['hero_description'] }}
                        </p>

                        <div class="mt-8 flex flex-col gap-4 sm:flex-row">
                            <a href="#contact-form"
                                class="inline-flex items-center justify-center rounded-2xl bg-emerald-400 px-6 py-3 text-sm font-semibold text-slate-950 transition duration-300 hover:-translate-y-0.5 hover:bg-emerald-300">
                                Send Your Enquiry
                            </a>
                            <a href="{{ route('complate_project') }}"
                                class="inline-flex items-center justify-center rounded-2xl border border-white/18 bg-white/10 px-6 py-3 text-sm font-semibold text-white transition duration-300 hover:bg-white hover:text-slate-900">
                                See Our Projects
                            </a>
                        </div>

                        <div class="mt-10 grid gap-4 sm:grid-cols-3">
                            @foreach ($page['stats'] as $stat)
                                <div class="contact-stat rounded-2xl p-4 text-white">
                                    <div class="text-lg font-bold">{{ $stat['value'] }}</div>
                                    <div class="mt-1 text-[0.7rem] uppercase tracking-[0.22em] text-slate-200">{{ $stat['label'] }}</div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="contact-glass rounded-[2rem] p-5 md:p-6">
                        <div class="rounded-[1.7rem] bg-slate-950/55 p-6 text-white">
                            <div class="flex items-center justify-between gap-4">
                                <div>
                                    <p class="text-xs font-semibold uppercase tracking-[0.26em] text-emerald-200">Direct Reach</p>
                                    <h2 class="mt-3 text-3xl font-bold">Talk to the right team faster</h2>
                                </div>
                                <div class="contact-icon">
                                    <i class="fas fa-headset"></i>
                                </div>
                            </div>

                            <div class="mt-6 space-y-4">
                                @foreach ($page['contact_cards'] as $card)
                                    <div class="rounded-2xl border border-white/10 bg-white/5 p-4">
                                        <div class="text-sm font-semibold text-white">{{ $card['title'] }}</div>
                                        <p class="mt-2 text-sm leading-7 text-slate-200/88">{{ $card['description'] }}</p>
                                        <div class="mt-3 space-y-1 text-sm text-emerald-100">
                                            @foreach ($card['lines'] as $line)
                                                <div>{{ $line }}</div>
                                            @endforeach
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
            <div class="contact-wrap">
                <div class="contact-intro-panel rounded-[2rem] p-7 md:p-10">
                    <div class="grid gap-8 lg:grid-cols-[1.05fr_0.95fr] lg:items-center">
                        <div>
                            <span class="contact-section-label">What We Can Help With</span>
                            <h2 class="mt-4 max-w-3xl text-3xl font-bold font-heading leading-tight text-slate-900 md:text-5xl">
                                One place to discuss product, design, development, or growth
                            </h2>
                            <p class="mt-4 max-w-2xl text-sm leading-8 text-slate-600 md:text-base">
                                Agar aapko exact service clear nahi hai, tab bhi yeh section simple starting point deta hai. Hum requirement samajhkar sahi direction recommend kar sakte hain.
                            </p>
                        </div>
                        <ul class="contact-list rounded-[1.6rem] border border-sky-100 bg-white/80 p-5 md:p-6 space-y-3 text-sm leading-8 text-slate-600">
                            @foreach ($page['highlights'] as $highlight)
                                <li class="flex gap-3">{{ $highlight }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </section>

        <section class="py-10 md:py-16">
            <div class="contact-wrap">
                <div class="grid gap-6 md:grid-cols-3">
                    @foreach ($page['contact_cards'] as $card)
                        <article class="contact-card rounded-[1.8rem] p-7">
                            <div class="contact-icon">
                                <i class="fas {{ $card['icon'] }}"></i>
                            </div>
                            <h3 class="mt-6 text-2xl font-bold text-slate-900">{{ $card['title'] }}</h3>
                            <p class="mt-3 text-sm leading-8 text-slate-600">{{ $card['description'] }}</p>
                            <div class="mt-5 space-y-2 text-sm font-medium text-slate-800">
                                @foreach ($card['lines'] as $line)
                                    <div>{{ $line }}</div>
                                @endforeach
                            </div>
                        </article>
                    @endforeach
                </div>
            </div>
        </section>

        <section id="contact-form" class="py-8 md:py-12">
            <div class="contact-wrap">
                <div class="grid gap-8 lg:grid-cols-[0.92fr_1.08fr]">
                    <div class="contact-panel rounded-[2rem] p-8 md:p-10">
                        <span class="contact-section-label">Simple Process</span>
                        <h2 class="mt-4 text-3xl font-bold font-heading text-slate-900 md:text-5xl">Clear communication before we build anything</h2>
                        <div class="mt-8 space-y-5">
                            @foreach ($page['process'] as $index => $step)
                                <div class="rounded-[1.5rem] border border-slate-200 bg-slate-50 p-5">
                                    <div class="text-sm font-semibold uppercase tracking-[0.22em] text-teal-700">Step {{ $index + 1 }}</div>
                                    <h3 class="mt-2 text-xl font-bold text-slate-900">{{ $step['title'] }}</h3>
                                    <p class="mt-2 text-sm leading-8 text-slate-600">{{ $step['description'] }}</p>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="contact-panel rounded-[2rem] p-8 md:p-10">
                        <span class="contact-section-label">Quick Enquiry</span>
                        <h2 class="mt-4 text-3xl font-bold font-heading text-slate-900 md:text-5xl">Share your requirement and we will get back to you</h2>
                        <p class="mt-4 text-sm leading-8 text-slate-600">
                            Aap apni website, app, design, ya marketing requirement yahan share kar sakte hain. Form directly existing enquiry flow ke saath connected hai.
                        </p>

                        <form class="quickEnquiryForm mt-8 space-y-6" id="quickEnquiryForm" method="POST">
                            @csrf
                            <div class="grid gap-6 md:grid-cols-2">
                                <div>
                                    <label for="name" class="mb-2 block text-sm font-medium text-slate-700">Full Name *</label>
                                    <input type="text" id="name" name="name" required
                                        class="w-full rounded-2xl border border-slate-200 px-4 py-3 text-slate-900 outline-none transition focus:border-sky-400 focus:ring-2 focus:ring-sky-100"
                                        placeholder="Your full name">
                                </div>
                                <div>
                                    <label for="email" class="mb-2 block text-sm font-medium text-slate-700">Email *</label>
                                    <input type="email" id="email" name="email" required
                                        class="w-full rounded-2xl border border-slate-200 px-4 py-3 text-slate-900 outline-none transition focus:border-sky-400 focus:ring-2 focus:ring-sky-100"
                                        placeholder="you@example.com">
                                </div>
                            </div>

                            <div class="grid gap-6 md:grid-cols-2">
                                <div>
                                    <label for="phone" class="mb-2 block text-sm font-medium text-slate-700">Phone *</label>
                                    <input type="tel" id="phone" name="phone" required
                                        class="w-full rounded-2xl border border-slate-200 px-4 py-3 text-slate-900 outline-none transition focus:border-sky-400 focus:ring-2 focus:ring-sky-100"
                                        placeholder="+91 98xxxxxxx">
                                </div>
                                <div>
                                    <label for="subject" class="mb-2 block text-sm font-medium text-slate-700">Subject *</label>
                                    <input type="text" id="subject" name="subject" required
                                        class="w-full rounded-2xl border border-slate-200 px-4 py-3 text-slate-900 outline-none transition focus:border-sky-400 focus:ring-2 focus:ring-sky-100"
                                        placeholder="Project discussion">
                                </div>
                            </div>

                            <div>
                                <label for="message" class="mb-2 block text-sm font-medium text-slate-700">Message *</label>
                                <textarea id="message" name="message" rows="5" required
                                    class="w-full rounded-[1.5rem] border border-slate-200 px-4 py-3 text-slate-900 outline-none transition focus:border-sky-400 focus:ring-2 focus:ring-sky-100"
                                    placeholder="Tell us what you want to build and what outcome you are aiming for"></textarea>
                            </div>

                            <button type="submit"
                                class="inline-flex items-center justify-center rounded-2xl bg-slate-950 px-6 py-3 text-sm font-semibold text-white transition duration-300 hover:bg-teal-700">
                                Send Enquiry
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
