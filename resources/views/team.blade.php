@extends('layout.app')

@section('title', 'Our Team | AryaWeb ')
@section('meta_description', 'Meet the AryaWeb  team behind our website development, app development, UI UX design, and digital marketing solutions.')
@section('content')
    <div class="pt-24 md:pt-20"></div>

    <style>
        .team-shell {
            padding-top: 3rem;
            padding-bottom: 3rem;
        }

        .team-surface {
            position: relative;
            overflow: hidden;
            background:
                radial-gradient(circle at top left, rgba(14, 165, 233, 0.12), transparent 26%),
                radial-gradient(circle at bottom right, rgba(20, 184, 166, 0.10), transparent 28%),
                linear-gradient(180deg, #f8fbff 0%, #ffffff 100%);
        }

        .team-surface-soft {
            position: relative;
            overflow: hidden;
            background:
                radial-gradient(circle at top right, rgba(56, 189, 248, 0.10), transparent 24%),
                linear-gradient(180deg, #f8fafc 0%, #eff6ff 100%);
        }

        .team-title {
            font-size: clamp(2.2rem, 3.8vw, 4.4rem);
            line-height: 1.05;
            letter-spacing: -0.03em;
        }

        .team-heading {
            font-size: clamp(1.9rem, 2.6vw, 3rem);
            line-height: 1.15;
            letter-spacing: -0.02em;
        }

        .team-divider {
            height: 0.25rem;
            width: 5rem;
            border-radius: 9999px;
            margin-left: auto;
            margin-right: auto;
            background: linear-gradient(90deg, #0ea5e9 0%, #14b8a6 50%, #f59e0b 100%);
        }

        .team-copy {
            font-size: 1rem;
            line-height: 1.8;
            color: #475569;
        }

        .team-card {
            position: relative;
            overflow: hidden;
            border: 1px solid rgba(148, 163, 184, 0.16);
            border-radius: 1.5rem;
            background: linear-gradient(180deg, #ffffff 0%, #f8fbff 100%);
            box-shadow: 0 16px 40px rgba(15, 23, 42, 0.08);
            transition: transform 0.35s ease, box-shadow 0.35s ease;
        }

        .team-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 24px 50px rgba(15, 23, 42, 0.12);
        }

        .team-card::after {
            content: "";
            position: absolute;
            inset: auto -1.75rem -1.75rem auto;
            width: 6rem;
            height: 6rem;
            border-radius: 9999px;
            background: radial-gradient(circle, rgba(14, 165, 233, 0.15), rgba(14, 165, 233, 0));
            pointer-events: none;
        }

        .team-glass {
            border: 1px solid rgba(255, 255, 255, 0.55);
            background: rgba(255, 255, 255, 0.8);
            backdrop-filter: blur(14px);
            box-shadow: 0 20px 45px rgba(15, 23, 42, 0.10);
        }

        .team-metric {
            border-radius: 1.25rem;
            border: 1px solid rgba(148, 163, 184, 0.14);
            background: rgba(255, 255, 255, 0.92);
            box-shadow: 0 12px 30px rgba(15, 23, 42, 0.05);
        }

        .team-cta {
            position: relative;
            overflow: hidden;
            background:
                linear-gradient(135deg, rgba(15, 23, 42, 0.94), rgba(8, 145, 178, 0.86)),
                url('{{ asset('assets/img/service1.png') }}');
            background-size: cover;
            background-position: center;
        }

        .team-cta::before {
            content: "";
            position: absolute;
            inset: 0;
            background:
                radial-gradient(circle at 18% 20%, rgba(250, 204, 21, 0.14), transparent 24%),
                radial-gradient(circle at 80% 80%, rgba(255, 255, 255, 0.08), transparent 28%);
            pointer-events: none;
        }
    </style>

    <section class="team-shell team-surface">
        <div class="container mx-auto px-4">
            <div class="grid items-center gap-10 lg:grid-cols-[1.05fr_0.95fr]">
                <div>
                    <span class="inline-flex rounded-full border border-sky-200 bg-white/80 px-4 py-2 text-xs font-semibold uppercase tracking-[0.28em] text-sky-700 shadow-sm">
                        Meet Our Team
                    </span>
                    <h1 class="text-3xl text-left mt-5 font-bold text-slate-900">
                        The Team Behind the Growth
                    </h1>
                    <p class="team-copy mt-5 max-w-2xl">
                        AryaWeb  is powered by a team that values creativity, clean execution, and strong client relationships.
                        From leadership and planning to design, development, and support, every role contributes to building better digital experiences.
                    </p>
                    <p class="team-copy mt-4 max-w-2xl">
                        We work collaboratively to turn ideas into websites, applications, and marketing systems that feel polished, useful, and ready to grow with your business.
                    </p>

                    <div class="mt-8 grid grid-cols-2 gap-4 md:max-w-xl">
                        <div class="team-metric p-4">
                            <div class="text-2xl font-bold text-primary">{{ count($leadership) + count($team['members']) + 1 }}</div>
                            <div class="mt-1 text-sm text-slate-500">Core Team Members</div>
                        </div>
                        <div class="team-metric p-4">
                            <div class="text-2xl font-bold text-primary">Multi-Role</div>
                            <div class="mt-1 text-sm text-slate-500">Design, Build, Support</div>
                        </div>
                    </div>
                </div>

                <div class="relative">
                    <div class="team-glass rounded-[2rem] p-4 md:p-6">
                        <img src="{{ asset('assets/img/team.png') }}" alt="AryaWeb  team"
                            class="w-full rounded-[1.5rem] object-cover shadow-lg">
                    </div>

                    <div class="team-glass absolute -bottom-6 left-4 right-4 rounded-[1.5rem] p-5 md:left-auto md:right-6 md:w-72">
                        <div class="text-sm font-semibold uppercase tracking-[0.2em] text-sky-700">Team Strength</div>
                        <p class="mt-2 text-sm leading-7 text-slate-600">
                            A balanced team structure with leadership, coordination, and hands-on development support.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="team-shell team-surface-soft">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="mx-auto max-w-3xl text-center mb-12">
                <h2 class="team-heading font-bold text-slate-900">Leadership Team</h2>
                <div class="team-divider mt-4"></div>
                <p class="team-copy mt-5">
                    The leadership team sets direction, supports quality decisions, and ensures every project moves with clarity and accountability.
                </p>
            </div>

            <div class="grid gap-8 md:grid-cols-2">
                @foreach ($leadership as $leader)
                    <div class="team-card p-6 md:p-7">
                        <div class="flex items-start gap-4">
                            <div class="flex h-16 w-16 shrink-0 items-center justify-center rounded-2xl bg-gradient-to-br {{ $leader['accent'] }} text-xl font-bold text-white shadow-lg">
                                {{ strtoupper(substr($leader['name'], 0, 1)) }}
                            </div>
                            <div>
                                <!-- <p class="text-xs font-semibold uppercase tracking-[0.3em] text-slate-500">{{ $leader['short_role'] }}</p> -->
                                <h2 class="mt-1 text-2xl font-bold text-slate-900">{{ $leader['name'] }}</h2>
                                <p class="mt-1 text-sm font-medium text-slate-600">{{ $leader['role'] }}</p>
                            </div>
                        </div>
                        <div class="mt-5 grid gap-3 text-sm text-slate-600">
                            <div class="rounded-2xl bg-slate-50 px-4 py-3">
                                <span class="font-semibold text-slate-900">Experience:</span> {{ $leader['experience'] }}
                            </div>
                            <div class="rounded-2xl bg-slate-50 px-4 py-3">
                                <span class="font-semibold text-slate-900">Focus:</span> {{ $leader['focus'] }}
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="mx-auto mt-10 max-w-2xl">
                <div class="team-card p-6 md:p-7">
                    <div class="flex items-start gap-4">
                        <div class="flex h-16 w-16 shrink-0 items-center justify-center rounded-2xl bg-gradient-to-br {{ $manager['accent'] }} text-xl font-bold text-white shadow-lg">
                            {{ strtoupper(substr($manager['name'], 0, 1)) }}
                        </div>
                        <div>
                            <p class="text-xs font-semibold uppercase tracking-[0.3em] text-emerald-600">{{ $manager['short_role'] }}</p>
                            <h2 class="mt-1 text-2xl font-bold text-slate-900">{{ $manager['name'] }}</h2>
                            <p class="mt-1 text-sm font-medium text-slate-600">{{ $manager['role'] }}</p>
                        </div>
                    </div>
                    <div class="mt-5 grid gap-3 text-sm text-slate-600">
                        <div class="rounded-2xl bg-slate-50 px-4 py-3">
                            <span class="font-semibold text-slate-900">Experience:</span> {{ $manager['experience'] }}
                        </div>
                        <div class="rounded-2xl bg-slate-50 px-4 py-3">
                            <span class="font-semibold text-slate-900">Focus:</span> {{ $manager['focus'] }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="team-shell team-surface">
        <div class="container mx-auto px-4">
            <div class="mx-auto max-w-3xl text-center mb-12">
                <h2 class="team-heading font-bold text-slate-900">Development Team</h2>
                <div class="team-divider mt-4"></div>
                <p class="team-copy mt-5">
                    Our developers build the systems that bring ideas to life with structure, performance, and practical functionality.
                </p>
            </div>

            <div class="team-card p-6 md:p-8">
                <div class="flex flex-col gap-4 border-b border-slate-100 pb-5 md:flex-row md:items-center md:justify-between">
                    <div>
                        <!-- <p class="text-xs font-semibold uppercase tracking-[0.3em] text-slate-400">Team Name</p> -->
                        <h3 class="mt-2 text-2xl font-bold text-slate-400 font-bold text-slate-900">{{ $team['group'] }}</h3>
                    </div>
                    <span class="inline-flex rounded-full bg-slate-900 px-4 py-2 text-xs font-semibold uppercase tracking-[0.2em] text-white">
                        {{ count($team['members']) }} Developers
                    </span>
                </div>

                <div class="mt-6 grid gap-5 md:grid-cols-2 xl:grid-cols-4">
                    @foreach ($team['members'] as $member)
                        <div class="rounded-[1.5rem] border border-slate-200 bg-slate-50/80 p-5 transition duration-300 hover:-translate-y-1 hover:shadow-lg">
                            <div class="flex items-start gap-4">
                                <div class="flex h-14 w-14 shrink-0 items-center justify-center rounded-2xl bg-gradient-to-br {{ $member['accent'] }} text-lg font-bold text-white">
                                    {{ strtoupper(substr($member['name'], 0, 1)) }}
                                </div>
                                <div class="min-w-0">
                                    <h4 class="text-lg font-bold text-slate-900">{{ $member['name'] }}</h4>
                                    <p class="text-sm font-medium text-slate-600">{{ $member['role'] }}</p>
                                </div>
                            </div>
                            <div class="mt-4 grid gap-2 text-sm text-slate-600">
                                <p><span class="font-semibold text-slate-900">Experience:</span> {{ $member['experience'] }}</p>
                                <p><span class="font-semibold text-slate-900">Focus:</span> {{ $member['focus'] }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    <section class="team-shell team-surface-soft">
        <div class="container mx-auto px-4">
            <div class="mx-auto max-w-3xl text-center mb-12">
                <h2 class="team-heading font-bold text-slate-900">What Makes Our Team Different</h2>
                <div class="team-divider mt-4"></div>
                <p class="team-copy mt-5">
                    We focus on collaboration, clean delivery, and a practical work style that keeps projects moving without confusion.
                </p>
            </div>

            <div class="grid gap-6 md:grid-cols-2 xl:grid-cols-4">
                <div class="team-card p-6">
                    <div class="text-3xl text-sky-600"><i class="fas fa-comments"></i></div>
                    <h3 class="mt-4 text-xl font-bold text-slate-900">Clear Communication</h3>
                    <p class="team-copy mt-3 text-sm">
                        We stay aligned through simple updates, transparent planning, and practical discussion.
                    </p>
                </div>

                <div class="team-card p-6">
                    <div class="text-3xl text-emerald-600"><i class="fas fa-object-group"></i></div>
                    <h3 class="mt-4 text-xl font-bold text-slate-900">Design + Development Sync</h3>
                    <p class="team-copy mt-3 text-sm">
                        Better teamwork between visuals and development leads to cleaner end results.
                    </p>
                </div>

                <div class="team-card p-6">
                    <div class="text-3xl text-amber-600"><i class="fas fa-clock"></i></div>
                    <h3 class="mt-4 text-xl font-bold text-slate-900">Reliable Execution</h3>
                    <p class="team-copy mt-3 text-sm">
                        We prioritize structure and consistency so delivery stays smooth and dependable.
                    </p>
                </div>

                <div class="team-card p-6">
                    <div class="text-3xl text-rose-600"><i class="fas fa-arrows-rotate"></i></div>
                    <h3 class="mt-4 text-xl font-bold text-slate-900">Continuous Improvement</h3>
                    <p class="team-copy mt-3 text-sm">
                        Every project teaches us something new, and we keep refining the way we build.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <section class="team-shell team-surface">
        <div class="container mx-auto px-4">
            <div class="mx-auto max-w-3xl text-center mb-12">
                <h2 class="team-heading font-bold text-slate-900">How Our Team Supports Client Projects</h2>
                <div class="team-divider mt-4"></div>
                <p class="team-copy mt-5">
                    A project becomes stronger when planning, execution, and support are handled with proper coordination.
                </p>
            </div>

            <div class="grid gap-6 lg:grid-cols-4">
                <div class="team-card p-6">
                    <div class="text-sm font-bold uppercase tracking-[0.24em] text-sky-700">01</div>
                    <h3 class="mt-4 text-xl font-bold text-slate-900">Planning</h3>
                    <p class="team-copy mt-3 text-sm">We understand the goal, scope, and priority of each client requirement.</p>
                </div>

                <div class="team-card p-6">
                    <div class="text-sm font-bold uppercase tracking-[0.24em] text-emerald-700">02</div>
                    <h3 class="mt-4 text-xl font-bold text-slate-900">Design Direction</h3>
                    <p class="team-copy mt-3 text-sm">Layouts, user flow, and visual language are shaped before development moves deeper.</p>
                </div>

                <div class="team-card p-6">
                    <div class="text-sm font-bold uppercase tracking-[0.24em] text-amber-700">03</div>
                    <h3 class="mt-4 text-xl font-bold text-slate-900">Execution</h3>
                    <p class="team-copy mt-3 text-sm">The team builds, reviews, and improves features with focus on quality and usability.</p>
                </div>

                <div class="team-card p-6">
                    <div class="text-sm font-bold uppercase tracking-[0.24em] text-rose-700">04</div>
                    <h3 class="mt-4 text-xl font-bold text-slate-900">Support</h3>
                    <p class="team-copy mt-3 text-sm">We stay involved through launch, improvements, and ongoing project needs.</p>
                </div>
            </div>
        </div>
    </section>

    <section class="team-shell team-cta text-white">
        <div class="container relative z-10 mx-auto px-4">
            <div class="mx-auto max-w-4xl text-center">
                <span class="inline-flex rounded-full border border-white/15 bg-white/10 px-4 py-2 text-xs font-semibold uppercase tracking-[0.26em] text-sky-100">
                    Work With Us
                </span>
                <h2 class="mt-5 text-3xl font-bold leading-tight md:text-5xl">
                    A strong team makes every digital project feel more confident
                </h2>
                <p class="mt-4 text-sm leading-8 text-slate-100/90 md:text-lg">
                    If you want a team that values clarity, quality, and practical execution, AryaWeb  is ready to support your next project.
                </p>
                <div class="mt-8 flex flex-col justify-center gap-4 sm:flex-row">
                    <a href="tel:+919870992118"
                        class="rounded-2xl bg-white px-7 py-3.5 font-semibold text-slate-900 transition hover:bg-slate-100">
                        <i class="fas fa-phone-alt mr-2"></i> Contact Team
                    </a>
                    <a href="{{ route('about-us') }}"
                        class="rounded-2xl border border-white/20 bg-white/10 px-7 py-3.5 font-semibold text-white transition hover:bg-white hover:text-slate-900">
                        Learn About Us
                    </a>
                </div>
            </div>
        </div>
    </section>
@endsection
