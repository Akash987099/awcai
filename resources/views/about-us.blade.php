@extends('layout.app')
@section('title', 'About AryaWeb Innovations | Website Development, App Development & Digital Solutions')
@section('meta_description', 'Learn about AryaWeb Innovations, our journey, mission, values, and how we help businesses grow with websites, apps, UI UX design, and digital marketing.')
@section('content')
    <div class="pt-20 md:pt-16"></div>

    <style>
        .about-shell {
            padding-top: 3rem;
            padding-bottom: 3rem;
        }

        .about-surface {
            position: relative;
            overflow: hidden;
            background:
                radial-gradient(circle at top left, rgba(14, 165, 233, 0.12), transparent 26%),
                radial-gradient(circle at bottom right, rgba(20, 184, 166, 0.10), transparent 28%),
                linear-gradient(180deg, #f8fbff 0%, #ffffff 100%);
        }

        .about-surface-soft {
            position: relative;
            overflow: hidden;
            background:
                radial-gradient(circle at top right, rgba(56, 189, 248, 0.10), transparent 24%),
                linear-gradient(180deg, #f8fafc 0%, #eff6ff 100%);
        }

        .about-title {
            font-size: clamp(2.2rem, 3.8vw, 4.4rem);
            line-height: 1.05;
            letter-spacing: -0.03em;
        }

        .about-heading {
            font-size: clamp(1.9rem, 2.6vw, 3rem);
            line-height: 1.15;
            letter-spacing: -0.02em;
        }

        .about-divider {
            height: 0.25rem;
            width: 5rem;
            border-radius: 9999px;
            margin-left: auto;
            margin-right: auto;
            background: linear-gradient(90deg, #0ea5e9 0%, #14b8a6 50%, #f59e0b 100%);
        }

        .about-copy {
            font-size: 1rem;
            line-height: 1.85;
            color: #475569;
        }

        .about-card {
            position: relative;
            overflow: hidden;
            border: 1px solid rgba(148, 163, 184, 0.16);
            border-radius: 1.5rem;
            background: linear-gradient(180deg, #ffffff 0%, #f8fbff 100%);
            box-shadow: 0 16px 40px rgba(15, 23, 42, 0.08);
            transition: transform 0.35s ease, box-shadow 0.35s ease;
        }

        .about-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 26px 50px rgba(15, 23, 42, 0.12);
        }

        .about-card::after {
            content: "";
            position: absolute;
            inset: auto -1.75rem -1.75rem auto;
            width: 6rem;
            height: 6rem;
            border-radius: 9999px;
            background: radial-gradient(circle, rgba(14, 165, 233, 0.16), rgba(14, 165, 233, 0));
            pointer-events: none;
        }

        .about-glass {
            border: 1px solid rgba(255, 255, 255, 0.55);
            background: rgba(255, 255, 255, 0.78);
            backdrop-filter: blur(14px);
            box-shadow: 0 20px 45px rgba(15, 23, 42, 0.10);
        }

        .about-metric {
            border-radius: 1.25rem;
            border: 1px solid rgba(148, 163, 184, 0.14);
            background: rgba(255, 255, 255, 0.9);
            box-shadow: 0 12px 30px rgba(15, 23, 42, 0.05);
        }

        .about-cta {
            position: relative;
            overflow: hidden;
            background:
                linear-gradient(135deg, rgba(15, 23, 42, 0.94), rgba(8, 145, 178, 0.86)),
                url('{{ asset('assets/img/service1.png') }}');
            background-size: cover;
            background-position: center;
        }

        .about-cta::before {
            content: "";
            position: absolute;
            inset: 0;
            background:
                radial-gradient(circle at 18% 20%, rgba(250, 204, 21, 0.14), transparent 24%),
                radial-gradient(circle at 80% 80%, rgba(255, 255, 255, 0.08), transparent 28%);
            pointer-events: none;
        }
    </style>

    <section class="about-shell about-surface">
        <div class="container mx-auto px-4">
            <div class="grid items-center gap-10 lg:grid-cols-[1.05fr_0.95fr]">
                <div>
                    <span
                        class="inline-flex rounded-full border border-sky-200 bg-white/80 px-4 py-2 text-xs font-semibold uppercase tracking-[0.28em] text-sky-700 shadow-sm">
                        About AryaWeb Innovations
                    </span>
                    <h1 class="about-title mt-5 font-bold text-slate-900">
                        Building digital experiences that are modern, useful, and ready for growth.
                    </h1>
                    <p class="about-copy mt-5 max-w-2xl">
                        AryaWeb Innovations
                        started with one simple goal — to make technology easy to understand and use. What started as
                        educational content and helpful guidance for learners has now become a complete digital company that
                        helps businesses create websites, apps, and marketing solutions with confidence.
                    </p>
                    <p class="about-copy mt-4 max-w-2xl">
                        We work with startups, local businesses, creators, and growing companies that want clean design,
                        scalable development, and reliable support from a team that understands both creativity and
                        execution.
                    </p>

                    <div class="mt-8 grid grid-cols-2 gap-4 md:max-w-xl">
                        <div class="about-metric p-4">
                            <div class="text-2xl font-bold text-primary">50+</div>
                            <div class="mt-1 text-sm text-slate-500">Projects Delivered</div>
                        </div>
                        <div class="about-metric p-4">
                            <div class="text-2xl font-bold text-primary">1.5K+</div>
                            <div class="mt-1 text-sm text-slate-500">YouTube Community</div>
                        </div>
                    </div>
                </div>

                <div class="relative">
                    <div class="about-glass rounded-[2rem] p-4 md:p-6">
                        <img src="{{ asset('assets/img/about.jpg') }}" alt="AryaWeb Innovations team and workspace"
                            class="w-full rounded-[1.5rem] object-cover shadow-lg">
                    </div>

                    <div
                        class="about-glass absolute -bottom-6 left-4 right-4 rounded-[1.5rem] p-5 md:left-auto md:right-6 md:w-72">
                        <div class="text-sm font-semibold uppercase tracking-[0.2em] text-sky-700">Core Focus</div>
                        <p class="mt-2 text-sm leading-7 text-slate-600">
                            Strong websites, useful apps, brand-focused UI, and digital systems that help businesses move
                            faster online.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="about-shell about-surface-soft">
        <div class="container mx-auto px-4">
            <div class="mx-auto max-w-3xl text-center mb-12">
                <h2 class="about-heading font-bold text-slate-900">How Our Journey Evolved</h2>
                <div class="about-divider mt-4"></div>
                <p class="about-copy mt-5">
                    Our story is rooted in teaching, building projects, and improving with every project. That foundation
                    still
                    shapes how we work today.
                </p>
            </div>

            <div class="grid gap-6 lg:grid-cols-3">
                <div class="about-card p-7">
                    <div
                        class="inline-flex h-14 w-14 items-center justify-center rounded-2xl bg-sky-100 text-2xl text-sky-700">
                        <i class="fas fa-play-circle"></i>
                    </div>
                    <h3 class="mt-5 text-2xl font-bold text-slate-900">Started with Teaching</h3>
                    <p class="about-copy mt-3">
                        AryaWeb Innovations gained recognition by helping students and aspiring developers learn web
                        development in a practical and accessible way.
                    </p>
                </div>

                <div class="about-card p-7">
                    <div
                        class="inline-flex h-14 w-14 items-center justify-center rounded-2xl bg-emerald-100 text-2xl text-emerald-700">
                        <i class="fas fa-laptop-code"></i>
                    </div>
                    <h3 class="mt-5 text-2xl font-bold text-slate-900">Grew into Services</h3>
                    <p class="about-copy mt-3">
                        With growing trust came client work across websites, mobile apps, UI UX design, SEO, and tailored
                        business solutions.
                    </p>
                </div>

                <div class="about-card p-7">
                    <div
                        class="inline-flex h-14 w-14 items-center justify-center rounded-2xl bg-amber-100 text-2xl text-amber-700">
                        <i class="fas fa-rocket"></i>
                    </div>
                    <h3 class="mt-5 text-2xl font-bold text-slate-900">Now Focused on Growth</h3>
                    <p class="about-copy mt-3">
                        We now combine design quality, development speed, and business thinking to deliver more complete
                        digital growth support.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <section class="about-shell about-surface">
        <div class="container mx-auto px-4">
            <div class="grid gap-6 lg:grid-cols-2">
                <div class="about-card p-8">
                    <span
                        class="inline-flex rounded-full bg-sky-100 px-4 py-2 text-xs font-semibold uppercase tracking-[0.24em] text-sky-700">
                        Our Mission
                    </span>
                    <h2 class="mt-5 text-3xl font-bold text-slate-900">Make digital growth simpler and more
                        effective</h2>
                    <p class="about-copy mt-4">
                        Our mission is to help businesses, creators, and startups build a meaningful digital presence with
                        solutions that are practical, attractive, and ready to scale.
                    </p>
                </div>

                <div class="about-card p-8">
                    <span
                        class="inline-flex rounded-full bg-emerald-100 px-4 py-2 text-xs font-semibold uppercase tracking-[0.24em] text-emerald-700">
                        Our Vision
                    </span>
                    <h2 class="mt-5 text-3xl font-bold text-slate-900">Become a trusted digital partner for
                        modern brands</h2>
                    <p class="about-copy mt-4">
                        We aim to be known for combining education, innovation, and quality work so clients receive not just
                        development services, but real long-term value.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <section class="about-shell about-surface-soft">
        <div class="container mx-auto px-4">
            <div class="mx-auto max-w-3xl text-center mb-12">
                <h2 class="about-heading font-bold text-slate-900">Why Businesses Choose to Work With Us</h2>
                <div class="about-divider mt-4"></div>
                <p class="about-copy mt-5">
                    We focus on results, clear communication, and a smooth process so clients feel confident from start to
                    finish.
                </p>
            </div>

            <div class="grid gap-6 md:grid-cols-2 xl:grid-cols-4">
                <div class="about-card p-6">
                    <div class="text-3xl text-sky-600"><i class="fas fa-bolt"></i></div>
                    <h3 class="mt-4 text-xl font-bold text-slate-900">Fast Communication</h3>
                    <p class="about-copy mt-3 text-sm">
                        Clear updates and simple communication make every stage easier to manage.
                    </p>
                </div>

                <div class="about-card p-6">
                    <div class="text-3xl text-emerald-600"><i class="fas fa-pencil-ruler"></i></div>
                    <h3 class="mt-4 text-xl font-bold text-slate-900">Better Visual Quality</h3>
                    <p class="about-copy mt-3 text-sm">
                        We create polished interfaces with stronger structure, spacing, and brand feel.
                    </p>
                </div>

                <div class="about-card p-6">
                    <div class="text-3xl text-amber-600"><i class="fas fa-layer-group"></i></div>
                    <h3 class="mt-4 text-xl font-bold text-slate-900">Custom Solutions</h3>
                    <p class="about-copy mt-3 text-sm">
                        Every product is shaped around your business goals instead of forced templates.
                    </p>
                </div>

                <div class="about-card p-6">
                    <div class="text-3xl text-rose-600"><i class="fas fa-handshake"></i></div>
                    <h3 class="mt-4 text-xl font-bold text-slate-900">Long-Term Support</h3>
                    <p class="about-copy mt-3 text-sm">
                        We stay available after launch for updates, enhancements, and practical support.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <section class="about-shell about-surface">
        <div class="container mx-auto px-4">
            <div class="mx-auto max-w-3xl text-center mb-12">
                <h2 class="about-heading font-bold text-slate-900">How We Work</h2>
                <div class="about-divider mt-4"></div>
                <p class="about-copy mt-5">
                    A clean process helps us deliver stronger results without confusion or unnecessary delays.
                </p>
            </div>

            <div class="grid gap-6 lg:grid-cols-4">
                <div class="about-card p-6">
                    <div class="text-sm font-bold uppercase tracking-[0.24em] text-sky-700">01</div>
                    <h3 class="mt-4 text-xl font-bold text-slate-900">Discover</h3>
                    <p class="about-copy mt-3 text-sm">We understand your idea, audience, and project goals.</p>
                </div>

                <div class="about-card p-6">
                    <div class="text-sm font-bold uppercase tracking-[0.24em] text-emerald-700">02</div>
                    <h3 class="mt-4 text-xl font-bold text-slate-900">Plan</h3>
                    <p class="about-copy mt-3 text-sm">We define structure, design direction, and development priorities.
                    </p>
                </div>

                <div class="about-card p-6">
                    <div class="text-sm font-bold uppercase tracking-[0.24em] text-amber-700">03</div>
                    <h3 class="mt-4 text-xl font-bold text-slate-900">Build</h3>
                    <p class="about-copy mt-3 text-sm">Our team develops the solution with attention to polish and
                        usability.</p>
                </div>

                <div class="about-card p-6">
                    <div class="text-sm font-bold uppercase tracking-[0.24em] text-rose-700">04</div>
                    <h3 class="mt-4 text-xl font-bold text-slate-900">Launch & Support</h3>
                    <p class="about-copy mt-3 text-sm">We help go live smoothly and continue improving where needed.</p>
                </div>
            </div>
        </div>
    </section>

    <section class="about-shell about-cta text-white">
        <div class="container relative z-10 mx-auto px-4">
            <div class="mx-auto max-w-4xl text-center">
                <span
                    class="inline-flex rounded-full border border-white/15 bg-white/10 px-4 py-2 text-xs font-semibold uppercase tracking-[0.26em] text-sky-100">
                    Ready to Build
                </span>
                <h2 class="mt-5 text-3xl font-bold leading-tight md:text-5xl">
                    Let’s create something strong, modern, and useful for your business
                </h2>
                <p class="mt-4 text-sm leading-8 text-slate-100/90 md:text-lg">
                    Whether you need a website, app, redesign, or digital marketing support, AryaWeb Innovations is ready to
                    help you move forward with clarity.
                </p>
                <div class="mt-8 flex flex-col justify-center gap-4 sm:flex-row">
                    <a href="tel:+919870992118"
                        class="rounded-2xl bg-white px-7 py-3.5 font-semibold text-slate-900 transition hover:bg-slate-100">
                        <i class="fas fa-phone-alt mr-2"></i> Call Us
                    </a>
                    <a href="{{ route('index') }}"
                        class="rounded-2xl border border-white/20 bg-white/10 px-7 py-3.5 font-semibold text-white transition hover:bg-white hover:text-slate-900">
                        Back to Home
                    </a>
                </div>
            </div>
        </div>
    </section>
@endsection