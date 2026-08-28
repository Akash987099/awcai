@extends('layout.app')
@section('title', 'AryaWeb innovations | Professional Website, App & Digital Marketing Company in Agra')
@section('meta_description', 'AryaWeb innovations is a professional IT company in Agra delivering website development, mobile app development, UI/UX design, eCommerce solutions, SEO, and digital marketing services for startups and businesses.')
@section('meta_keywords', 'AryaWeb innovations, website development company in Agra, app development company in Agra, SEO company in Agra, digital marketing agency in Agra, UI UX design company, eCommerce development, Laravel development')
@section('canonical', route('index'))
@section('meta_image', asset('assets/img/about.jpg'))
@section('content')

<style>
    .cta-surface {
            position: relative;
            overflow: hidden;
            background:
                linear-gradient(135deg, rgba(15, 23, 42, 0.92), rgba(8, 145, 178, 0.88)),
                url('{{ asset('assets/img/service1.png') }}');
            background-size: cover;
            background-position: center;
        }

        .cta-surface::before {
            content: "";
            position: absolute;
            inset: 0;
            background:
                radial-gradient(circle at 20% 20%, rgba(250, 204, 21, 0.14), transparent 26%),
                radial-gradient(circle at 80% 80%, rgba(255, 255, 255, 0.08), transparent 30%);
            pointer-events: none;
        }
</style>

{{-- <div class="hero-slide is-active absolute inset-0" data-hero-slide>
    <video class="hero-slide-media" autoplay muted loop playsinline preload="metadata"
        poster="{{ asset('assets/img/banner1.png') }}"
        >
        <source src="{{ asset('assets/videos/1992-153555258_small.mp4') }}" type="video/mp4">
    </video>
    <div class="hero-slide-overlay"></div>
    <div class="hero-slide-content">
        <span class="hero-slide-badge">Creative Technology</span>
        <h1 class="text-3xl md:text-5xl font-bold leading-tight">Arya Web Coding</h1>
        <p class="text-sm md:text-lg text-slate-200 max-w-2xl mx-auto">From business websites to mobile apps, we
            turn ideas into polished digital products with professional website development, mobile app development, UI/UX design, and digital marketing services.</p>
    </div>
</div> --}}
    <div class="pt-20 md:pt-16"></div>

    <section class="hero-slider relative overflow-hidden">

    <!-- Background Orbs -->
    <div class="hero-orb hero-orb-one hidden md:block"></div>
    <div class="hero-orb hero-orb-two hidden md:block"></div>

    <!-- Slider -->
    <div id="welcome-hero-slider" class="relative w-full h-[200px] sm:h-[300px] md:h-[400px] lg:h-[550px] ">

        <!-- Slide 1 -->
        <div class="hero-slide is-active absolute inset-0" data-hero-slide>
            <img src="{{ asset('assets/img/banner2.png') }}" class="w-full h-full object-fill object-center opacity-80"
                alt="AryaWeb innovations project showcase">
            <div class="hero-slide-overlay"></div>
        </div>

        <!-- Slide 2 -->
        <div class="hero-slide absolute inset-0 hidden" data-hero-slide>
            <img src="{{ asset('assets/img/banner4.png') }}" class="w-full h-full object-fill object-center opacity-80">
            <div class="hero-slide-overlay"></div>
        </div>

        <!-- Slide 3 -->
        <div class="hero-slide absolute inset-0 hidden" data-hero-slide>
            <img src="{{ asset('assets/img/banner5.png') }}" class="w-full h-full object-fill object-center opacity-80">
            <div class="hero-slide-overlay"></div>
        </div>

        <!-- Slide 4 -->
        <div class="hero-slide absolute inset-0 hidden" data-hero-slide>
            <img src="{{ asset('assets/img/banner3.png') }}" class="w-full h-full object-fill object-center opacity-80">
            <div class="hero-slide-overlay"></div>
        </div>

    </div>

    <!-- Dots -->
    <div class="absolute bottom-3 md:bottom-5 left-1/2 z-20 flex -translate-x-1/2 gap-2 md:gap-3">
        <button type="button" class="hero-dot is-active" data-hero-dot="0"></button>
        <button type="button" class="hero-dot" data-hero-dot="1"></button>
        <button type="button" class="hero-dot" data-hero-dot="2"></button>
        <button type="button" class="hero-dot" data-hero-dot="3"></button>
    </div>

</section>


    <div class="logo-marquee">
        <div class="logo-marquee--gradient"></div>
        <div class="logo-marquee--marquee">
            <div class="logo-marquee--marquee-group">
                <img src="{{ asset('assets/img/partners/indra_mart.png') }}" alt="Indra Mart">
                <img src="{{ asset('assets/img/partners/aws_logo.png') }}" alt="Finflip India">
                <img src="{{ asset('assets/img/partners/digi.jpg') }}" alt="Digi">
                <img src="{{ asset('assets/img/partners/mahila.webp') }}" alt="Mahila udyam">
                <img src="{{ asset('assets/img/partners/mds.png') }}" alt="MDS">
                <img src="{{ asset('assets/img/partners/ddesire.webp') }}" alt="Ddesire shoes">
                <img src="{{ asset('assets/img/partners/kargil.webp') }}" alt="Kargil Hospital">
                <img src="{{ asset('assets/img/partners/nisha.webp') }}" alt="Nisha Hair Salon">
                <img src="{{ asset('assets/img/partners/logo.webp') }}" alt="Dr. Pradeep Deb">
                <img src="{{ asset('assets/img/partners/kds.webp') }}" alt="KDS">
                <img src="{{ asset('assets/img/partners/tiwari.jpg') }}" alt="Tiwari Brothers">
                <img src="{{ asset('assets/img/partners/hrinv.png') }}" alt="HRMS">
                <img src="{{ asset('assets/img/partners/1723259429.png') }}" alt="aws">
                <img src="{{ asset('assets/img/greenhouse.jpg') }}" alt="green house">
            </div>
            <div aria-hidden="true" class="logo-marquee--marquee-group">
                <img src="{{ asset('assets/img/partners/indra_mart.png') }}" alt="Indra Mart">
                <img src="{{ asset('assets/img/partners/aws_logo.png') }}" alt="Finflip India">
                <img src="{{ asset('assets/img/partners/digi.jpg') }}" alt="Digi">
                <img src="{{ asset('assets/img/partners/mahila.webp') }}" alt="Mahila udyam">
                <img src="{{ asset('assets/img/partners/mds.png') }}" alt="MDS">
                <img src="{{ asset('assets/img/partners/ddesire.webp') }}" alt="Ddesire shoes">
                <img src="{{ asset('assets/img/partners/kargil.webp') }}" alt="Kargil Hospital">
                <img src="{{ asset('assets/img/partners/nisha.webp') }}" alt="Nisha Hair Salon">
                <img src="{{ asset('assets/img/partners/logo.webp') }}" alt="Dr. Pradeep Deb">
                <img src="{{ asset('assets/img/partners/kds.webp') }}" alt="KDS">
                <img src="{{ asset('assets/img/partners/tiwari.jpg') }}" alt="Tiwari Brothers">
                <img src="{{ asset('assets/img/partners/hrinv.png') }}" alt="HRMS">
                <img src="{{ asset('assets/img/partners/1723259429.png') }}" alt="aws">
                <img src="{{ asset('assets/img/greenhouse.jpg') }}" alt="green house">
            </div>
        </div>
    </div>

    <section id="about" class="section-shell welcome-surface-soft">
        <div class="container relative overflow-hidden mx-auto px-4">
            <div class="text-center mb-12">
                <h2 class="section-heading font-bold text-primary mb-4">
                    About AryaWeb Innovations
                </h2>
                <div class="section-divider"></div>
            </div>

            <div class="flex flex-col md:flex-row items-center">
                <div class="md:w-1/2 mb-10 md:mb-0">
                    <img src="{{ asset('assets/img/about-us.png') }}" alt="AryaWeb Innovations"
                        class="rounded-lg shadow-lg mx-auto">
                </div>

                <div class="md:w-1/2 md:pl-12">
                    <h2 class="text-xl font-semibold text-primary mb-4">
                        From YouTube Tutorials to a Full-Service IT Company
                    </h2>
                    <p class="section-subtext mb-6">
                        <strong>AryaWeb innovations</strong> began as a passion project on YouTube — a place where aspiring
                        developers could learn web development through clear, practical, and hands-on tutorials. Over time,
                        the channel grew into a trusted name for high-quality tech education in Hindi, empowering thousands
                        of learners across India and beyond.
                    </p>
                    <p class="section-subtext mb-6">
                        Today, AryaWeb innovations has evolved into a full-fledged <strong>IT company</strong>, offering
                        professional services in <strong>website development</strong>, <strong>app development</strong>,
                        <strong>UI/UX design</strong>, <strong>digital marketing</strong>, and more. We bring together our
                        educational roots and technical expertise to deliver solutions that are not only functional but also
                        future-ready.
                    </p>

                    <div class="grid grid-cols-2 gap-4 mb-8">
                        <div class="uniform-stat p-4 rounded-lg border-l-4 border-accent">
                            <div class="text-2xl font-bold text-primary">1.5K+</div>
                            <div class="text-gray-600">YouTube Subscribers</div>
                        </div>
                        <div class="uniform-stat p-4 rounded-lg border-l-4 border-accent">
                            <div class="text-2xl font-bold text-primary">50+</div>
                            <div class="text-gray-600">Projects Delivered</div>
                        </div>
                    </div>

                    <a href="{{ route('about-us') }}" class="text-primary font-semibold hover:text-accent flex items-center">
                        Learn More About Our Journey
                        <i class="fas fa-arrow-right ml-2"></i>
                    </a>
                </div>
            </div>

            <!-- ✨ Decorative Gradient Circle -->
            <div
                class="absolute -bottom-8 -right-8 w-40 h-40 rounded-full bg-gradient-to-tr from-pink-400/30 to-purple-500/20 blur-2xl">
            </div>

            <!-- 🌊 Decorative SVG Wave Lines -->
            <div class="absolute bottom-0 left-0 opacity-30 pointer-events-none">
                <svg width="162" height="91" viewBox="0 0 162 91" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <g opacity="0.3">
                        <path opacity="0.45"
                            d="M1 89.9999C8 77.3332 27.7 50.7999 50.5 45.9999C79 39.9999 95 41.9999 106 30.4999C117 18.9999 126 -3.50014 149 -3.50014C172 -3.50014 187 4.99986 200.5 -8.50014C214 -22.0001 210.5 -46.0001 244 -37.5001C270.8 -30.7001 307.167 -45 322 -53"
                            stroke="url(#paint0_linear_1028_603)"></path>
                        <path opacity="0.45"
                            d="M43 64.9999C50 52.3332 69.7 25.7999 92.5 20.9999C121 14.9999 137 16.9999 148 5.49986C159 -6.00014 168 -28.5001 191 -28.5001C214 -28.5001 229 -20.0001 242.5 -33.5001C256 -47.0001 252.5 -71.0001 286 -62.5001C312.8 -55.7001 349.167 -70 364 -78"
                            stroke="url(#paint1_linear_1028_603)"></path>
                        <path opacity="0.45"
                            d="M4 73.9999C11 61.3332 30.7 34.7999 53.5 29.9999C82 23.9999 98 25.9999 109 14.4999C120 2.99986 129 -19.5001 152 -19.5001C175 -19.5001 190 -11.0001 203.5 -24.5001C217 -38.0001 213.5 -62.0001 247 -53.5001C273.8 -46.7001 310.167 -61 325 -69"
                            stroke="url(#paint2_linear_1028_603)"></path>
                        <path opacity="0.45"
                            d="M41 40.9999C48 28.3332 67.7 1.79986 90.5 -3.00014C119 -9.00014 135 -7.00014 146 -18.5001C157 -30.0001 166 -52.5001 189 -52.5001C212 -52.5001 227 -44.0001 240.5 -57.5001C254 -71.0001 250.5 -95.0001 284 -86.5001C310.8 -79.7001 347.167 -94 362 -102"
                            stroke="url(#paint3_linear_1028_603)"></path>
                    </g>
                    <defs>
                        <linearGradient id="paint0_linear_1028_603" x1="291.35" y1="12.1032" x2="179.211"
                            y2="237.617" gradientUnits="userSpaceOnUse">
                            <stop offset="0.328125" stop-color="#fff" />
                            <stop offset="1" stop-color="#fff" stop-opacity="0" />
                        </linearGradient>
                        <linearGradient id="paint1_linear_1028_603" x1="333.35" y1="-12.8968" x2="221.211"
                            y2="212.617" gradientUnits="userSpaceOnUse">
                            <stop offset="0.328125" stop-color="#fff" />
                            <stop offset="1" stop-color="#fff" stop-opacity="0" />
                        </linearGradient>
                        <linearGradient id="paint2_linear_1028_603" x1="294.35" y1="-3.89678" x2="182.211"
                            y2="221.617" gradientUnits="userSpaceOnUse">
                            <stop offset="0.328125" stop-color="#fff" />
                            <stop offset="1" stop-color="#fff" stop-opacity="0" />
                        </linearGradient>
                        <linearGradient id="paint3_linear_1028_603" x1="331.35" y1="-36.8968" x2="219.211"
                            y2="188.617" gradientUnits="userSpaceOnUse">
                            <stop offset="0.328125" stop-color="#fff" />
                            <stop offset="1" stop-color="#fff" stop-opacity="0" />
                        </linearGradient>
                    </defs>
                </svg>
            </div>
        </div>
    </section>

    <section class="section-shell welcome-surface">
    <div class="container relative overflow-hidden mx-auto px-4">

        <!-- Heading -->
        <div class="text-center mb-12">
            <h2 class="section-heading font-bold text-primary mb-4">
                AI-Powered Innovation
            </h2>
            <div class="section-divider"></div>
        </div>

        <!-- Content -->
        <div class="flex flex-col md:flex-row items-center">

            <!-- LEFT CONTENT -->
            <div class="md:w-1/2 md:pr-12 order-2 md:order-1">

                <h2 class="text-xl font-semibold text-primary mb-4">
                    Transforming Businesses with Artificial Intelligence
                </h2>

                <p class="section-subtext mb-6">
                    At <strong>AryaWeb innovations</strong>, we leverage the power of Artificial Intelligence to deliver
                    intelligent, scalable, and future-ready digital solutions. Our AI-driven approach helps businesses
                    automate processes, enhance decision-making, and create personalized user experiences.
                </p>

                <p class="section-subtext mb-6">
                    From machine learning models to smart automation systems, we integrate cutting-edge AI technologies
                    into web and mobile applications—ensuring efficiency, innovation, and measurable growth.
                </p>

                <!-- Stats -->
                <div class="grid grid-cols-2 gap-4 mb-8">
                    <div class="uniform-stat p-4 rounded-lg border-l-4 border-accent">
                        <div class="text-2xl font-bold text-primary">20+</div>
                        <div class="text-gray-600">AI Solutions Delivered</div>
                    </div>
                    <div class="uniform-stat p-4 rounded-lg border-l-4 border-accent">
                        <div class="text-2xl font-bold text-primary">95%</div>
                        <div class="text-gray-600">Client Satisfaction</div>
                    </div>
                </div>

                <a href="#" class="text-primary font-semibold hover:text-accent flex items-center">
                    Explore Our AI Services
                    <i class="fas fa-arrow-right ml-2"></i>
                </a>
            </div>

            <!-- RIGHT IMAGE -->
            <div class="md:w-1/2 mb-10 md:mb-0 order-1 md:order-2">
                <img src="{{ asset('assets/img/ai.png') }}" 
                     alt="AI Technology"
                     class="rounded-lg shadow-lg mx-auto">
            </div>

        </div>

        <!-- Decorative Circle -->
        <div class="absolute -top-8 -left-8 w-40 h-40 rounded-full bg-gradient-to-tr from-blue-400/30 to-purple-500/20 blur-2xl"></div>

    </div>
</section>

    <section class="insight-section section-shell">
        <div class="container relative z-10 mx-auto px-4">
            <div class="max-w-3xl text-center mx-auto mb-12">
                <span class="inline-flex items-center rounded-full border border-sky-200 bg-white/80 px-4 py-2 text-xs font-semibold uppercase tracking-[0.28em] text-sky-700 shadow-sm">
                    Smart Growth Partner
                </span>
                <h2 class="welcome-display-title font-bold text-slate-900 mt-5">
                    Digital products with stronger design, faster launch, and long-term growth in mind
                </h2>
                <p class="mt-4 text-base md:text-lg text-slate-600">
                    We do more than build pages. We shape complete digital journeys with strategy, product thinking,
                    performance, and brand-focused visuals that help businesses stand out.
                </p>
            </div>

            <div class="grid gap-6 md:grid-cols-2 xl:grid-cols-4">
                <div class="feature-glow-card interactive-card rounded-3xl p-6">
                    <div class="mb-4 inline-flex h-14 w-14 items-center justify-center rounded-2xl bg-sky-100 text-2xl text-sky-700">
                        <i class="fas fa-bolt"></i>
                    </div>
                    <h3 class="text-xl font-bold text-slate-900">Fast Delivery Flow</h3>
                    <p class="mt-3 text-sm md:text-base leading-7 text-slate-600">
                        Structured sprints, milestone updates, and clean development cycles keep projects moving
                        quickly without losing quality.
                    </p>
                </div>

                <div class="feature-glow-card interactive-card rounded-3xl p-6 floating-accent">
                    <div class="mb-4 inline-flex h-14 w-14 items-center justify-center rounded-2xl bg-emerald-100 text-2xl text-emerald-700">
                        <i class="fas fa-palette"></i>
                    </div>
                    <h3 class="text-xl font-bold text-slate-900">Visual Brand Depth</h3>
                    <p class="mt-3 text-sm md:text-base leading-7 text-slate-600">
                        Better color systems, stronger typography, and conversion-focused UI patterns give your brand
                        a more premium feel.
                    </p>
                </div>

                <div class="feature-glow-card interactive-card rounded-3xl p-6">
                    <div class="mb-4 inline-flex h-14 w-14 items-center justify-center rounded-2xl bg-amber-100 text-2xl text-amber-700">
                        <i class="fas fa-chart-line"></i>
                    </div>
                    <h3 class="text-xl font-bold text-slate-900">Growth-Ready Stack</h3>
                    <p class="mt-3 text-sm md:text-base leading-7 text-slate-600">
                        SEO, analytics, and scalable code architecture are considered from day one so your product is
                        ready to grow.
                    </p>
                </div>

                <div class="feature-glow-card interactive-card rounded-3xl p-6 floating-accent" style="animation-delay: -3s;">
                    <div class="mb-4 inline-flex h-14 w-14 items-center justify-center rounded-2xl bg-rose-100 text-2xl text-rose-700">
                        <i class="fas fa-headset"></i>
                    </div>
                    <h3 class="text-xl font-bold text-slate-900">Reliable Support</h3>
                    <p class="mt-3 text-sm md:text-base leading-7 text-slate-600">
                        From launch fixes to future enhancements, we stay available with practical support that keeps
                        things stable.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <section class="section-shell welcome-surface">
        <div class="container mx-auto px-4">
            <div class="metric-panel p-6 md:p-10">
                <div class="grid gap-8 lg:grid-cols-[1.2fr_0.8fr] items-center">
                    <div>
                        <span class="inline-flex items-center rounded-full border border-white/20 bg-white/10 px-4 py-2 text-xs font-semibold uppercase tracking-[0.26em] text-sky-100">
                            Performance Snapshot
                        </span>
                        <h2 class="mt-5 text-3xl md:text-5xl font-bold leading-tight">
                            Designed to look modern and built to perform where it matters
                        </h2>
                        <p class="mt-4 max-w-2xl text-sm md:text-lg text-slate-100/90 leading-7">
                            Every project is shaped around speed, trust, and usability. That means better first
                            impressions, smoother navigation, and stronger digital confidence for your audience.
                        </p>
                    </div>

                    <div class="glass-card rounded-3xl p-5 md:p-7 text-slate-900">
                        <div class="space-y-5">
                            <div>
                                <div class="flex items-center justify-between text-sm font-semibold">
                                    <span>UI polish and clarity</span>
                                    <span>94%</span>
                                </div>
                                <div class="metric-bar mt-2"><span style="width: 94%;"></span></div>
                            </div>
                            <div>
                                <div class="flex items-center justify-between text-sm font-semibold">
                                    <span>Launch readiness</span>
                                    <span>91%</span>
                                </div>
                                <div class="metric-bar mt-2"><span style="width: 91%;"></span></div>
                            </div>
                            <div>
                                <div class="flex items-center justify-between text-sm font-semibold">
                                    <span>Scalable development setup</span>
                                    <span>96%</span>
                                </div>
                                <div class="metric-bar mt-2"><span style="width: 96%;"></span></div>
                            </div>
                        </div>

                        <div class="grid grid-cols-3 gap-4 mt-7">
                            <div class="rounded-2xl bg-slate-50 p-4 text-center">
                                <div class="text-2xl font-bold text-slate-900">50+</div>
                                <div class="mt-1 text-xs uppercase tracking-[0.2em] text-slate-500">Projects</div>
                            </div>
                            <div class="rounded-2xl bg-slate-50 p-4 text-center">
                                <div class="text-2xl font-bold text-slate-900">24/7</div>
                                <div class="mt-1 text-xs uppercase tracking-[0.2em] text-slate-500">Support</div>
                            </div>
                            <div class="rounded-2xl bg-slate-50 p-4 text-center">
                                <div class="text-2xl font-bold text-slate-900">100%</div>
                                <div class="mt-1 text-xs uppercase tracking-[0.2em] text-slate-500">Custom</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section-shell welcome-surface-soft">
        <div class="container mx-auto px-4">
            <div class="text-center mb-12">
                <span class="inline-flex items-center rounded-full border border-teal-200 bg-teal-50 px-4 py-2 text-xs font-semibold uppercase tracking-[0.28em] text-teal-700">
                    Launch Journey
                </span>
                <h2 class="section-heading font-bold text-slate-900 mt-5">
                    How we take your idea from concept to confident release
                </h2>
                <p class="mt-4 max-w-3xl mx-auto text-base md:text-lg text-slate-600">
                    A clear process reduces delays, keeps communication simple, and helps your website or app come to
                    life with fewer surprises.
                </p>
            </div>

            <div class="grid gap-6 lg:grid-cols-3">
                <div class="timeline-card interactive-card rounded-3xl p-7">
                    <div class="timeline-badge">01</div>
                    <h3 class="mt-5 text-2xl font-bold text-slate-900">Discover</h3>
                    <p class="mt-3 text-slate-600 leading-7">
                        We understand your business goals, user needs, and feature priorities so the project starts
                        with real clarity.
                    </p>
                </div>

                <div class="timeline-card interactive-card rounded-3xl p-7">
                    <div class="timeline-badge">02</div>
                    <h3 class="mt-5 text-2xl font-bold text-slate-900">Design & Build</h3>
                    <p class="mt-3 text-slate-600 leading-7">
                        We craft interfaces, apply strong colors and typography, and build responsive experiences with
                        clean modern code.
                    </p>
                </div>

                <div class="timeline-card interactive-card rounded-3xl p-7">
                    <div class="timeline-badge">03</div>
                    <h3 class="mt-5 text-2xl font-bold text-slate-900">Launch & Grow</h3>
                    <p class="mt-3 text-slate-600 leading-7">
                        After testing and deployment, we help refine performance, visibility, and future features so
                        the product keeps improving.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <section class="section-shell welcome-surface-soft">
        <div class="container mx-auto px-4">
            <!-- Heading -->

            <div class="text-center mb-12">
                <h2 class="section-heading font-bold text-primary mb-4">Our Specialized IT Services</h2>
                <div class="section-divider"></div>
                <p class="mt-4 text-gray-600 max-w-2xl mx-auto">At AryaWeb innovations, we combine creative design and modern
                    technology to build powerful digital experiences. From websites to apps, we’ve got your IT needs
                    covered.</p>
            </div>

            <!-- Cards Grid -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">

                <!-- Card 1: Web Development -->
                <div
                    class="uniform-card interactive-card p-6 flex flex-col justify-between text-center">
                    <div>
                        <div class="text-primary text-4xl mb-4">
                            <i class="fas fa-code"></i>
                        </div>
                        <h3 class="text-xl font-semibold mb-3">Web Development</h3>
                        <p class="text-gray-600 mb-4">
                            Custom websites built with the latest technologies like Laravel,
                            React, and Tailwind CSS for performance and scalability.
                        </p>
                    </div>

                    <a href="{{ route('service.web-development') }}" class="text-accent font-semibold mt-auto inline-block hover:underline">
                        View More →
                    </a>

                    <div class="absolute -top-6 -left-6 w-24 h-24 rounded-full bg-green-400/20"></div>
                    <div class="absolute -bottom-6 -right-6 w-24 h-24 rounded-full bg-green-500/20"></div>
                </div>


                <!-- Card 2: App Development -->
                <div
                    class="uniform-card interactive-card p-6 flex flex-col justify-between text-center">
                    <div>
                        <div class="text-primary text-4xl mb-4">
                            <i class="fas fa-mobile-alt"></i>
                        </div>
                        <h3 class="text-xl font-semibold mb-3">App Development</h3>
                        <p class="text-gray-600 mb-4">Cross-platform mobile applications using Flutter, React Native, and
                            native solutions tailored to your business needs.</p>
                    </div>
                    <a href="{{ route('service.app-development') }}"
                        class="text-accent font-semibold mt-auto inline-block hover:underline">View More →</a>
                    <div class="absolute -top-6 -left-6 w-24 h-24 rounded-full bg-green-400/20"></div>
                    <div class="absolute -bottom-6 -right-6 w-24 h-24 rounded-full bg-green-500/20"></div>
                </div>

                <!-- Card 3: UI/UX Design -->
                <div
                    class="uniform-card interactive-card p-6 flex flex-col justify-between text-center">
                    <div>
                        <div class="text-primary text-4xl mb-4">
                            <i class="fas fa-pencil-ruler"></i>
                        </div>
                        <h3 class="text-xl font-semibold mb-3">UI/UX Design</h3>
                        <p class="text-gray-600 mb-4">Engaging and user-friendly interfaces designed for optimal experience
                            across all devices and platforms.</p>
                    </div>
                    <a href="{{ route('service.ui-development') }}" class="text-accent font-semibold mt-auto inline-block hover:underline">View More
                        →</a>
                    <div class="absolute -top-6 -left-6 w-24 h-24 rounded-full bg-green-400/20"></div>
                    <div class="absolute -bottom-6 -right-6 w-24 h-24 rounded-full bg-green-500/20"></div>
                </div>

                <!-- Card 4: Digital Marketing -->
                <div
                    class="uniform-card interactive-card p-6 flex flex-col justify-between text-center">
                    <div>
                        <div class="text-primary text-4xl mb-4">
                            <i class="fas fa-bullhorn"></i>
                        </div>
                        <h3 class="text-xl font-semibold mb-3">Digital Marketing</h3>
                        <p class="text-gray-600 mb-4">Grow your online presence with SEO, content marketing, PPC ads, and
                            social media strategies tailored for results.</p>
                    </div>
                    <a href="{{ route('digital-marketing.overview') }}"
                        class="text-accent font-semibold mt-auto inline-block hover:underline">View More →</a>
                    <div class="absolute -top-6 -left-6 w-24 h-24 rounded-full bg-green-400/20"></div>
                    <div class="absolute -bottom-6 -right-6 w-24 h-24 rounded-full bg-green-500/20"></div>
                </div>

                <!-- Card 5: E-Commerce Solutions -->
                <div
                    class="uniform-card interactive-card p-6 flex flex-col justify-between text-center">
                    <div>
                        <div class="text-primary text-4xl mb-4">
                            <i class="fas fa-shopping-cart"></i>
                        </div>
                        <h3 class="text-xl font-semibold mb-3">E-Commerce Solutions</h3>
                        <p class="text-gray-600 mb-4">Powerful, secure, and scalable online stores using platforms like
                            WooCommerce, Shopify, or custom Laravel solutions.</p>
                    </div>
                    <a href="{{ url('ecommerce') }}" class="text-accent font-semibold mt-auto inline-block hover:underline">View
                        More →</a>
                    <div class="absolute -top-6 -left-6 w-24 h-24 rounded-full bg-green-400/20"></div>
                    <div class="absolute -bottom-6 -right-6 w-24 h-24 rounded-full bg-green-500/20"></div>
                </div>

                <!-- Card 6: Technical Training -->
                <div
                    class="uniform-card interactive-card p-6 flex flex-col justify-between text-center">
                    <div>
                        <div class="text-primary text-4xl mb-4 text-center">
                            <i class="fas fa-chalkboard-teacher"></i>
                        </div>
                        <h3 class="text-xl font-semibold mb-3 text-center">Technical Training</h3>
                        <p class="text-gray-600 mb-4">Learn coding from experts! We provide training in HTML, CSS,
                            JavaScript, PHP, Laravel, and more through YouTube and private batches.</p>
                    </div>
                    <a href="{{ url('training') }}" class="text-accent font-semibold mt-auto inline-block hover:underline">View
                        More →</a>
                    <div class="absolute -top-6 -left-6 w-24 h-24 rounded-full bg-green-400/20"></div>
                    <div class="absolute -bottom-6 -right-6 w-24 h-24 rounded-full bg-green-500/20"></div>
                </div>

            </div>
        </div>
    </section>

    <section id="appointment" class="section-shell cta-surface text-white">
        <div class="container relative z-10 mx-auto px-4 text-center">
            <h6 class="text-3xl md:text-4xl font-bold mb-6">
                Build Your Next Big Idea with <span>AryaWeb innovations</span>
            </h6>
            <p class="max-w-3xl mx-auto text-lg mb-8">
                From stunning websites to powerful mobile apps, our expert team delivers
                <strong>custom development, UI/UX design, and digital marketing</strong> solutions
                that help startups and businesses grow online. Let’s discuss your project and turn
                your vision into reality.
            </p>

            <div class="flex flex-col sm:flex-row justify-center space-y-4 sm:space-y-0 sm:space-x-4">
                <a href="#contact" onclick="openModal()"
                    class="bg-accent hover:bg-yellow-600 px-8 py-4 rounded-lg font-semibold text-lg transition duration-300 booking-button">
                    <i class="fas fa-calendar-check mr-2"></i> Get a Free Consultation
                </a>
            </div>
        </div>
    </section>

    <section class="section-shell welcome-surface">
        <main class="max-w-screen-xl mx-auto px-4">
            <div class="text-center mb-12">
                <h2 class="section-heading font-bold text-primary mb-4">Latest Projects & UI Kits</h2>
                <div class="section-divider"></div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">

                @foreach ($projects as $key => $val)
                    <div
                        class="max-w-xs uniform-card interactive-card overflow-hidden">
                        <a href="{{ route('project.index', $val->project_url) }}">
                            <img src="{{ asset($val->thumnail ?? 'assets/img/projects/hq720.jpg') }}"
                                alt="Parking Lot Management System" class="w-full h-48 object-contain">
                        </a>
                        <div class="p-4">

                            <div class="flex items-center justify-between mb-2">
                                <h3 class="text-base font-bold text-gray-800">{{ $val->name ?? '' }}</h3>
                                <span class="text-sm font-bold text-gray-600">Sales: {{ sales($val->id) }}</span>
                            </div>

                            <div class="flex items-center justify-between mb-3">
                                <div class="flex text-yellow-400 space-x-1">
                                    @for ($i = 1; $i <= 5; $i++)
                                        @if ($i <= rating($val->id))
                                            <i class="fas fa-star text-sm"></i>
                                        @else
                                            <i class="far fa-star text-sm text-gray-300"></i>
                                        @endif
                                    @endfor
                                </div>

                                <a href="{{ $val->preview_link }}" target="_blank"
                                    class="px-3 py-1 text-xs font-semibold border border-gray-300 rounded-md text-gray-600 hover:bg-gray-100">
                                    Live Preview
                                </a>
                            </div>

                            <div class="flex items-center justify-between border-t pt-3">
                                <div class="flex items-center space-x-1 text-sm text-red-500 font-semibold">
                                    {!! category($val->category)->icon !!}
                                    <span>{{ category($val->category)->name }}</span>
                                </div>
                                <div class="flex items-center">
                                    <span class="text-gray-500 text-sm line-through mr-2">₹{{ $val->actual_price }}</span>
                                    <span class="text-primary font-bold text-lg">₹{{ $val->price }}</span>
                                </div>
                            </div>

                        </div>
                    </div>
                @endforeach
            </div>
        </main>
    </section>

    <section class="section-shell welcome-surface-soft">
        <div class="container mx-auto px-4">
            <!-- Heading -->

            <div class="text-center mb-12">
                <h2 class="section-heading font-bold text-primary mb-4">Product Categories</h2>
                <div class="section-divider"></div>
                <p class="mt-4 text-gray-600 max-w-2xl mx-auto">Explore our collection of premium templates, UI kits, and
                    source codes for developers and designers.</p>
            </div>

            <!-- Grid Layout -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">

                @foreach ($category as $key => $item)
                    <div
                        class="uniform-card interactive-card p-6 flex flex-col justify-between">
                        <div>
                            <div class="text-primary text-4xl mb-4 text-center">{!! $item->icon !!}</div>
                            <h3 class="text-xl font-semibold text-center mb-2">{{ $item->name }}</h3>
                            <p class="text-gray-600 text-center">{{ $item->title }}</p>
                        </div>

                        <a href="{{ url('laravel-products') }}"
                            class="text-accent font-semibold mt-4 inline-block hover:underline text-center">
                            View More →
                        </a>
                        <div class="absolute -top-6 -left-6 w-24 h-24 rounded-full bg-green-400/20"></div>
                        <div class="absolute -bottom-6 -right-6 w-24 h-24 rounded-full bg-green-500/20"></div>
                    </div>
                @endforeach

            </div>
        </div>
    </section>
    <section class="section-shell-tight welcome-surface">
        <div class="max-w-7xl mx-auto px-4 text-center">
            <!-- Heading -->

            <div class="text-center mb-12">
                <h2 class="section-heading font-bold text-primary mb-4">How We Empower Your Success</h2>
                <div class="section-divider"></div>
                <p class="mt-4 text-gray-600 max-w-2xl mx-auto"> Our systematic approach transforms your ideas into
                    real-world digital solutions. From brainstorming to launch, we walk with you through every stage.</p>
            </div>

            <!-- Timeline -->
            <div
                class="relative grid grid-cols-2 sm:grid-cols-3 md:grid-cols-6 gap-y-12 md:gap-y-0 gap-x-4 md:gap-x-6 items-start">

                <!-- Step -->
                <div class="flex flex-col items-center text-center group">
                    <div
                        class="bg-blue-600 h-[56px] w-[56px] text-white p-4 rounded-full shadow-lg mb-4 transition transform group-hover:scale-110">
                        <i class="fas fa-lightbulb text-xl"></i>
                    </div>
                    <h4 class="font-semibold text-sm md:text-base text-blue-800">Idea Generation</h4>
                </div>

                <div class="flex flex-col items-center text-center group">
                    <div
                        class="bg-blue-600 text-white h-[56px] w-[56px] p-4 rounded-full shadow-lg mb-4 transition transform group-hover:scale-110">
                        <i class="fas fa-search text-xl"></i>
                    </div>
                    <h4 class="font-semibold text-sm md:text-base text-blue-800">Research</h4>
                </div>

                <div class="flex flex-col items-center text-center group">
                    <div
                        class="bg-blue-600 text-white h-[56px] w-[56px] p-4 rounded-full shadow-lg mb-4 transition transform group-hover:scale-110">
                        <i class="fas fa-pencil-ruler text-xl"></i>
                    </div>
                    <h4 class="font-semibold text-sm md:text-base text-blue-800">UI/UX Design</h4>
                </div>

                <div class="flex flex-col items-center text-center group">
                    <div
                        class="bg-blue-600 text-white h-[56px] w-[56px] p-4 rounded-full shadow-lg mb-4 transition transform group-hover:scale-110">
                        <i class="fas fa-code text-xl"></i>
                    </div>
                    <h4 class="font-semibold text-sm md:text-base text-blue-800">Development</h4>
                </div>

                <div class="flex flex-col items-center text-center group">
                    <div
                        class="bg-blue-600 text-white h-[56px] w-[56px] p-4 rounded-full shadow-lg mb-4 transition transform group-hover:scale-110">
                        <i class="fas fa-globe text-xl"></i>
                    </div>
                    <h4 class="font-semibold text-sm md:text-base text-blue-800">Domain & Hosting</h4>
                </div>

                <div class="flex flex-col items-center text-center group">
                    <div
                        class="bg-blue-600 text-white h-[56px] w-[56px] p-4 rounded-full shadow-lg mb-4 transition transform group-hover:scale-110">
                        <i class="fas fa-rocket text-xl"></i>
                    </div>
                    <h4 class="font-semibold text-sm md:text-base text-blue-800">Success</h4>
                </div>
            </div>
        </div>
    </section>

    <section class="section-shell-tight welcome-surface-soft">
        <div class="max-w-5xl mx-auto px-4 text-center">
            <!-- Heading -->


            <div class="text-center mb-12">
                <h2 class="section-heading font-bold text-primary mb-4">Our Unique Work Process</h2>
                <div class="section-divider"></div>
                <p class="mt-4 text-gray-600 max-w-2xl mx-auto">
                    We build strong client relationships through clarity, collaboration, and delivery excellence. Here’s how
                    we bring your vision to life.
                </p>
            </div>

            <!-- Timeline Container -->
            <div class="relative border-l-4 border-dotted border-blue-300 ml-6">

                <!-- Step 1 -->
                <div class="mb-12 flex flex-col md:flex-row items-center md:items-start md:ml-6">
                    <!-- Icon + Step -->
                    <div class="flex-shrink-0 mb-4 md:mb-0 md:mr-6 flex flex-col items-center">
                        <div
                            class="bg-blue-600 text-white w-10 h-10 flex items-center justify-center rounded-full font-bold shadow-md">
                            01</div>
                        <div class="bg-blue-100 p-3 rounded-full mt-3">
                            <i class="fas fa-comments text-blue-600 text-xl"></i>
                        </div>
                    </div>
                    <!-- Content -->
                    <div class="text-left">
                        <h4 class="text-lg font-bold text-blue-900 mb-2">Discuss</h4>
                        <p class="text-gray-600 text-sm">
                            We begin with in-depth discussions to fully understand your business goals, audience, and
                            expectations.
                        </p>
                    </div>
                </div>

                <!-- Step 2 -->
                <div class="mb-12 flex flex-col md:flex-row-reverse items-center md:items-start md:ml-6">
                    <div class="flex-shrink-0 mb-4 md:mb-0 md:ml-6 flex flex-col items-center">
                        <div
                            class="bg-blue-600 text-white w-10 h-10 flex items-center justify-center rounded-full font-bold shadow-md">
                            02</div>
                        <div class="bg-blue-100 p-3 rounded-full mt-3">
                            <i class="fas fa-handshake text-blue-600 text-xl"></i>
                        </div>
                    </div>
                    <div class="text-left md:text-right">
                        <h4 class="text-lg font-bold text-blue-900 mb-2">Deal</h4>
                        <p class="text-gray-600 text-sm">
                            With a mutual understanding, we finalize the proposal and align on timelines, budget, and
                            deliverables.
                        </p>
                    </div>
                </div>

                <!-- Step 3 -->
                <div class="mb-12 flex flex-col md:flex-row items-center md:items-start md:ml-6">
                    <div class="flex-shrink-0 mb-4 md:mb-0 md:mr-6 flex flex-col items-center">
                        <div
                            class="bg-blue-600 text-white w-10 h-10 flex items-center justify-center rounded-full font-bold shadow-md">
                            03</div>
                        <div class="bg-blue-100 p-3 rounded-full mt-3">
                            <i class="fas fa-cogs text-blue-600 text-xl"></i>
                        </div>
                    </div>
                    <div class="text-left">
                        <h4 class="text-lg font-bold text-blue-900 mb-2">Develop</h4>
                        <p class="text-gray-600 text-sm">
                            Our expert team crafts your solution with precision using cutting-edge technologies and best
                            practices.
                        </p>
                    </div>
                </div>

                <!-- Step 4 -->
                <div class="flex flex-col md:flex-row-reverse items-center md:items-start md:ml-6">
                    <div class="flex-shrink-0 mb-4 md:mb-0 md:ml-6 flex flex-col items-center">
                        <div
                            class="bg-blue-600 text-white w-10 h-10 flex items-center justify-center rounded-full font-bold shadow-md">
                            04</div>
                        <div class="bg-blue-100 p-3 rounded-full mt-3">
                            <i class="fas fa-box-open text-blue-600 text-xl"></i>
                        </div>
                    </div>
                    <div class="text-left md:text-right">
                        <h4 class="text-lg font-bold text-blue-900 mb-2">Deliver</h4>
                        <p class="text-gray-600 text-sm">
                            We ensure a smooth launch and deliver a complete, high-quality project that exceeds your
                            expectations.
                        </p>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <section id="appointment" class="section-shell cta-surface text-white">
        <div class="container relative z-10 mx-auto px-4 text-center">
            <h6 class="text-3xl md:text-4xl font-bold mb-6">
                Build Your Next Big Idea with <span>AryaWeb innovations</span>
            </h6>
            <p class="max-w-3xl mx-auto text-lg mb-8">
                From stunning websites to powerful mobile apps, our expert team delivers
                <strong>custom development, UI/UX design, and digital marketing</strong> solutions
                that help startups and businesses grow online. Let’s discuss your project and turn
                your vision into reality.
            </p>

            <div class="flex flex-col sm:flex-row justify-center space-y-4 sm:space-y-0 sm:space-x-4">
                <a href="#contact" onclick="openModal()"
                    class="bg-accent hover:bg-yellow-600 px-8 py-4 rounded-lg font-semibold text-lg transition duration-300 booking-button">
                    <i class="fas fa-calendar-check mr-2"></i> Get a Free Consultation
                </a>
            </div>
        </div>
    </section>

    <section class="section-shell welcome-surface">
    <div class="container mx-auto px-4">

        <!-- Heading -->
        <div class="text-center mb-12">
            <h2 class="section-heading font-bold text-primary mb-4">
                Technologies
            </h2>
            <div class="section-divider"></div>
        </div>

        <!-- Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">

            @foreach ($technology as $key => $item)
                <div
                    class="tech-card uniform-card interactive-card p-6 text-center">

                    <!-- Image -->
                    <div class="mb-4 flex justify-center">
                        <img src="{!! $item->icon !!}" 
                             alt="{{ $item->name }}" 
                             class="w-20 h-20 object-contain mx-auto pointer-events-none select-none">
                    </div>

                    <!-- Title -->
                    <h3 class="text-xl font-semibold text-dark mb-3">
                        {{ $item->name }}
                    </h3>

                    <!-- Decorative Elements -->
                    <div class="absolute -top-6 -left-6 w-24 h-24 rounded-full bg-green-400/20"></div>
                    <div class="absolute -bottom-6 -right-6 w-24 h-24 rounded-full bg-green-500/20"></div>

                </div>
            @endforeach

        </div>
    </div>
</section>

   <section class="section-shell welcome-surface-soft">
    <main class="max-w-screen-xl mx-auto px-4">

        <div class="flex flex-col sm:flex-row items-center justify-between mb-8">
                <div class="text-center sm:text-left mb-4 sm:mb-0">
                    <h2 class="section-heading font-bold text-primary mb-2">
                        Blogs
                    </h2>
                    <div class="section-divider sm:mx-0"></div>
                </div>
                <a href="/blog" class="text-accent font-semibold hover:underline text-sm sm:text-base">
                    View More →
                </a>
            </div>

        <!-- Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">

            @foreach ($blogs as $key => $val)
                <div class="uniform-card interactive-card overflow-hidden transition duration-300 group">

                    <!-- Image -->
                    <div class="overflow-hidden">
                        <img src="{{ asset($val->image) }}" 
                             alt="{{ $val->name }}"
                             class="w-full h-48 object-fill transition duration-300 group-hover:scale-105">
                    </div>

                    <!-- Content -->
                    <div class="p-5">

                        <!-- Title -->
                        <h3 class="text-lg font-semibold text-dark mb-3 leading-snug line-clamp-2">
                            {{ $val->name }}
                        </h3>

                        <!-- Button -->
                        <a href="{{ url('laravel-products') }}"
                           class="inline-flex items-center gap-2 text-accent font-medium hover:underline text-sm">
                            View More
                            <span class="transition group-hover:translate-x-1">→</span>
                        </a>

                    </div>
                </div>
            @endforeach

        </div>

    </main>
</section>

    <section class="section-shell welcome-surface">
        <main class="max-w-screen-xl mx-auto px-4">
            <div class="flex flex-col sm:flex-row items-center justify-between mb-8">
                <div class="text-center sm:text-left mb-4 sm:mb-0">
                    <h2 class="section-heading font-bold text-primary mb-2">
                        Top Articles
                    </h2>
                    <div class="section-divider sm:mx-0"></div>
                </div>
                <a href="/blog" class="text-accent font-semibold hover:underline text-sm sm:text-base">
                    View More →
                </a>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">

                @foreach ($articles as $key => $val)
                    <div class="uniform-card interactive-card overflow-hidden">
                        <img src="{{ asset($val->image) }}" alt="Custom Web Development"
                            class="w-full h-48 object-cover">
                        <div class="p-4">
                            <h3 class="text-lg font-semibold text-dark mb-3 leading-snug line-clamp-2">
                            {{ $val->name }}
                        </h3>
                            <a href="{{ url('laravel-products') }}"
                           class="inline-flex items-center gap-2 text-accent font-medium hover:underline text-sm">
                            View More
                            <span class="transition group-hover:translate-x-1">→</span>
                        </a>
                        </div>
                    </div>
                @endforeach

            </div>
        </main>
    </section>

    <section class="section-shell welcome-surface-soft px-4 min-h-screen">
        <div class="max-w-screen-xl mx-auto">
            <h2 class="section-heading font-bold text-center mb-6 text-primary">Top News</h2>

            <div class="flex flex-col md:flex-row justify-center gap-4 mb-6">
                <input id="searchInput" type="text" placeholder="Search news..."
                    class="w-full md:w-1/3 px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500">

                <select id="categorySelect"
                    class="w-full md:w-1/4 px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <option value="general">General</option>
                    <option value="world">World</option>
                    <option value="nation">Nation</option>
                    <option value="business">Business</option>
                    <option value="technology">Technology</option>
                    <option value="entertainment">Entertainment</option>
                    <option value="sports">Sports</option>
                    <option value="science">Science</option>
                    <option value="health">Health</option>
                </select>
            </div>

            <div id="newsContainer" class="flex flex-wrap justify-center gap-6"></div>

            <div id="statusMessage" class="text-center mt-6 text-gray-600"></div>
        </div>
    </section>

    <section id="appointment" class="section-shell cta-surface text-white">
        <div class="relative z-10 max-w-screen-md mx-auto px-4">
            <!-- Heading -->
            <div class="text-center mb-10">
                <h2 class="section-heading font-bold text-white mb-4">Frequently Asked Questions</h2>
                <div class="section-divider"></div>
            </div>

            <!-- FAQ Items -->
            <div class="space-y-4" x-data="{ open: null }">

                <!-- FAQ 1 -->
                <div class="border border-gray-200 rounded-2xl bg-white/95 shadow">
                    <button @click="open === 1 ? open = null : open = 1"
                        class="w-full flex justify-between items-center px-5 py-4 text-left focus:outline-none">
                        <span class="font-semibold text-gray-800">Do you provide custom website development?</span>
                        <svg :class="open === 1 ? 'rotate-180' : ''" class="w-5 h-5 text-gray-500 transition-transform"
                            fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                    <div x-show="open === 1" x-collapse class="px-5 pb-4 text-gray-600 text-sm">
                        Yes, AryaWeb innovations specializes in building custom, responsive,
                        and SEO-friendly websites tailored to your business needs.
                    </div>
                </div>

                <!-- FAQ 2 -->
                <div class="border border-gray-200 rounded-2xl bg-white/95 shadow">
                    <button @click="open === 2 ? open = null : open = 2"
                        class="w-full flex justify-between items-center px-5 py-4 text-left focus:outline-none">
                        <span class="font-semibold text-gray-800">Do you create mobile applications?</span>
                        <svg :class="open === 2 ? 'rotate-180' : ''" class="w-5 h-5 text-gray-500 transition-transform"
                            fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                    <div x-show="open === 2" x-collapse class="px-5 pb-4 text-gray-600 text-sm">
                        Absolutely! We develop Android and iOS apps with clean UI/UX
                        and robust functionality to enhance your customer engagement.
                    </div>
                </div>

                <!-- FAQ 3 -->
                <div class="border border-gray-200 rounded-2xl bg-white/95 shadow">
                    <button @click="open === 3 ? open = null : open = 3"
                        class="w-full flex justify-between items-center px-5 py-4 text-left focus:outline-none">
                        <span class="font-semibold text-gray-800">Can you handle e-commerce projects?</span>
                        <svg :class="open === 3 ? 'rotate-180' : ''" class="w-5 h-5 text-gray-500 transition-transform"
                            fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                    <div x-show="open === 3" x-collapse class="px-5 pb-4 text-gray-600 text-sm">
                        Yes, we create secure and scalable e-commerce websites with
                        payment gateways, inventory management, and user-friendly dashboards.
                    </div>
                </div>

                <!-- FAQ 4 -->
                <div class="border border-gray-200 rounded-2xl bg-white/95 shadow">
                    <button @click="open === 4 ? open = null : open = 4"
                        class="w-full flex justify-between items-center px-5 py-4 text-left focus:outline-none">
                        <span class="font-semibold text-gray-800">Do you offer digital marketing services?</span>
                        <svg :class="open === 4 ? 'rotate-180' : ''" class="w-5 h-5 text-gray-500 transition-transform"
                            fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                    <div x-show="open === 4" x-collapse class="px-5 pb-4 text-gray-600 text-sm">
                        Yes, AryaWeb innovations provides SEO, social media management,
                        and paid ad campaigns to help your brand grow online.
                    </div>
                </div>

                <!-- FAQ 5 -->
                <div class="border border-gray-200 rounded-2xl bg-white/95 shadow">
                    <button @click="open === 5 ? open = null : open = 5"
                        class="w-full flex justify-between items-center px-5 py-4 text-left focus:outline-none">
                        <span class="font-semibold text-gray-800">What is your typical project timeline?</span>
                        <svg :class="open === 5 ? 'rotate-180' : ''" class="w-5 h-5 text-gray-500 transition-transform"
                            fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                    <div x-show="open === 5" x-collapse class="px-5 pb-4 text-gray-600 text-sm">
                        Timelines vary by project complexity, but most websites are
                        completed within 4–6 weeks and mobile apps within 8–12 weeks.
                    </div>
                </div>

            </div>
        </div>
    </section>

    <section class="section-shell welcome-surface">
        <div class="text-center mb-12">
            <h2 class="section-heading font-bold text-primary mb-4">Quick Enquiry</h2>
            <div class="section-divider"></div>
        </div>
        <div class="container mx-auto form-container equal-height-container">
            <div class="image-container w-full lg:w-2/5 bg-gray-800 hidden lg:block">
                <img src="{{ asset('assets/blogs/contact.jpg') }}" alt="Customer Service">
            </div>

            <div class="w-full lg:w-3/5 bg-white py-8 px-6 md:px-10">

                <form class="space-y-6 quickEnquiryForm" id="quickEnquiryForm" method="POST">
                    @csrf
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Name *</label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <i class="fas fa-user text-gray-400"></i>
                                </div>
                                <input type="text" id="name" name="name"
                                    class="input-focus pl-10 w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500"
                                    placeholder="Your full name" required>
                            </div>
                        </div>

                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email *</label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <i class="fas fa-envelope text-gray-400"></i>
                                </div>
                                <input type="email" id="email" name="email"
                                    class="input-focus pl-10 w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500"
                                    placeholder="Your email address" required>
                            </div>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="phone" class="block text-sm font-medium text-gray-700 mb-1">Phone *</label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <i class="fas fa-phone text-gray-400"></i>
                                </div>
                                <input type="tel" id="phone" name="phone"
                                    class="input-focus pl-10 w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500"
                                    placeholder="Your phone number" required>
                            </div>
                        </div>

                        <div>
                            <label for="subject" class="block text-sm font-medium text-gray-700 mb-1">Subject *</label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <i class="fas fa-edit text-gray-400"></i>
                                </div>
                                <input type="text" id="subject" name="subject"
                                    class="input-focus pl-10 w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500"
                                    placeholder="Enter subject" required>
                            </div>
                        </div>

                    </div>

                    <div>
                        <label for="message" class="block text-sm font-medium text-gray-700 mb-1">Leave a Message for us
                            *</label>
                        <div class="relative">
                            <div class="absolute top-3 left-3 pointer-events-none">
                                <i class="fas fa-comment text-gray-400"></i>
                            </div>
                            <textarea id="message" rows="4" name="message"
                                class="input-focus pl-10 w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500"
                                placeholder="Tell us how we can help you..." required></textarea>
                        </div>
                    </div>

                    <div class="pt-4">
                        <button type="submit"
                            class=" w-full py-3 px-4 text-white font-semibold rounded-lg shadow-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 booking-button">
                            <i class="fas fa-paper-plane mr-2"></i> Send Message
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </section>

    {{-- <section class="bg-white-100">
        <div class="container-fluid mx-auto">
            <div class="grid grid-cols-1 md:grid-cols-1 items-center">

                <div>
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m23!1m12!1m3!1d88570.52000894143!2d77.9196809385397!3d27.19605321265067!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m8!3e6!4m0!4m5!1s0x3974771ffaa1238f%3A0xac11d6bf5c5d98e7!2sShop%20No%2012-A%2C%20Akhilesh%20Tower%2C%20Hotel%20Solitaire%20Complex%20Hari%20parwat%20Crossing%2C%20Mahatma%20Gandhi%20Rd%2C%20Agra%2C%20Uttar%20Pradesh%20282002!3m2!1d27.1960773!2d78.00208239999999!5e1!3m2!1sen!2sin!4v1758121368875!5m2!1sen!2sin"
                        width="100%" height="450" style="border:0; box-shadow: 0 4px 10px rgba(0,0,0,0.1);"
                        allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
                    </iframe>
                </div>

            </div>
        </div>
    </section> --}}

    <script>
        const API_KEY = "43e3ba231d775023e458e5719a48c411";
        let searchTerm = "India";
        let category = "general";

        async function fetchNews() {
            const container = document.getElementById("newsContainer");
            const status = document.getElementById("statusMessage");
            container.innerHTML = "";
            status.textContent = "Loading news...";

            try {
                const url = `/fetch-news?q=${searchTerm}&topic=${category}`;
                const res = await fetch(url);
                const data = await res.json();

                if (data.articles && data.articles.length > 0) {
                    status.textContent = "";
                    data.articles.forEach(article => {
                        const card = document.createElement("div");
                        card.className =
                            "max-w-sm bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition-shadow";

                        card.innerHTML = `
                        ${article.image ? `<img src="${article.image}" alt="${article.title}" class="w-full h-48 object-cover">` : ""}
                        <div class="p-4">
                            <h3 class="text-lg font-semibold mb-2">${article.title}</h3>
                            <p class="text-gray-600 text-sm mb-3">${article.description ? article.description.slice(0, 100) + "..." : ""}</p>
                            <a href="${article.url}" target="_blank" rel="noopener noreferrer"
                               class="text-blue-600 hover:underline text-sm font-medium">
                               Read full article →
                            </a>
                        </div>
                    `;
                        container.appendChild(card);
                    });
                } else {
                    status.textContent = "No news found.";
                }
            } catch (error) {
                console.error("API Error:", error);
                status.textContent = "Failed to fetch news.";
            }
        }

        document.getElementById("searchInput").addEventListener("input", e => {
            searchTerm = e.target.value || "India";
            fetchNews();
        });

        document.getElementById("categorySelect").addEventListener("change", e => {
            category = e.target.value;
            fetchNews();
        });

        fetchNews();
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const slider = document.getElementById('welcome-hero-slider');
            if (!slider) {
                return;
            }

            const slides = Array.from(slider.querySelectorAll('[data-hero-slide]'));
            const dots = Array.from(document.querySelectorAll('[data-hero-dot]'));
            const prevButton = document.querySelector('[data-hero-prev]');
            const nextButton = document.querySelector('[data-hero-next]');
            let currentIndex = 0;
            let autoPlayId = null;

            const syncVideoPlayback = (activeIndex) => {
                slides.forEach((slide, index) => {
                    const video = slide.querySelector('video');
                    if (!video) {
                        return;
                    }

                    if (index === activeIndex) {
                        video.play().catch(() => {});
                    } else {
                        video.pause();
                        video.currentTime = 0;
                    }
                });
            };

            const showSlide = (index) => {
                slides.forEach((slide, slideIndex) => {
                    const isActive = slideIndex === index;
                    slide.classList.toggle('hidden', !isActive);
                    slide.classList.toggle('is-active', isActive);
                });

                dots.forEach((dot, dotIndex) => {
                    dot.classList.toggle('is-active', dotIndex === index);
                    dot.setAttribute('aria-current', dotIndex === index ? 'true' : 'false');
                });

                currentIndex = index;
                syncVideoPlayback(index);
            };

            const nextSlide = () => showSlide((currentIndex + 1) % slides.length);
            const prevSlide = () => showSlide((currentIndex - 1 + slides.length) % slides.length);
            const restartAutoPlay = () => {
                window.clearInterval(autoPlayId);
                autoPlayId = window.setInterval(nextSlide, 5000);
            };

            prevButton?.addEventListener('click', () => {
                prevSlide();
                restartAutoPlay();
            });

            nextButton?.addEventListener('click', () => {
                nextSlide();
                restartAutoPlay();
            });

            dots.forEach((dot, index) => {
                dot.addEventListener('click', () => {
                    showSlide(index);
                    restartAutoPlay();
                });
            });

            showSlide(0);
            restartAutoPlay();

            document.querySelectorAll('section').forEach((section) => {
                section.classList.add('welcome-section');
            });

            const revealTargets = [
                ...document.querySelectorAll('section h2, section h3, section p, section .grid > div, section .shadow-md, section .shadow-lg, section img, section form, section iframe, .logo-marquee')
            ];

            revealTargets.forEach((element, index) => {
                if (element.closest('#welcome-hero-slider')) {
                    return;
                }

                element.classList.add('reveal-in');

                if (element.matches('img, iframe')) {
                    element.classList.add('reveal-scale');
                } else if (index % 3 === 0) {
                    element.classList.add('reveal-left');
                } else if (index % 3 === 1) {
                    element.classList.add('reveal-right');
                }

                if (element.matches('.shadow-md, .shadow-lg, .grid > div')) {
                    element.classList.add('interactive-card');
                }

                if (element.matches('img')) {
                    element.classList.add('interactive-image');
                }
            });

            const reduceMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
            if (reduceMotion) {
                revealTargets.forEach((element) => element.classList.add('is-visible'));
                return;
            }

            const revealObserver = new IntersectionObserver((entries) => {
                entries.forEach((entry) => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('is-visible');
                        revealObserver.unobserve(entry.target);
                    }
                });
            }, {
                threshold: 0.16,
                rootMargin: '0px 0px -60px 0px'
            });

            revealTargets.forEach((element, index) => {
                element.style.transitionDelay = `${Math.min(index % 6, 5) * 70}ms`;
                revealObserver.observe(element);
            });
        });
    </script>
    <script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@graph": [
    {
      "@type": "Organization",
      "@id": "{{ route('index') }}#organization",
      "name": "AryaWeb innovations",
      "url": "{{ route('index') }}",
      "logo": "{{ asset('assets/img/logo.png') }}",
      "image": "{{ asset('assets/img/about.jpg') }}",
      "email": "aryawebcoding@gmail.com",
      "telephone": ["+91 9870992118", "+91 7906948573", "+91 8533074414"],
      "address": {
        "@type": "PostalAddress",
        "streetAddress": "Pavitra Marriage home NH-2 road",
        "addressLocality": "Agra",
        "addressRegion": "Uttar Pradesh",
        "addressCountry": "IN"
      },
      "sameAs": [
        "https://wa.me/919870992118"
      ]
    },
    {
      "@type": "WebSite",
      "@id": "{{ route('index') }}#website",
      "url": "{{ route('index') }}",
      "name": "AryaWeb innovations",
      "publisher": {
        "@id": "{{ route('index') }}#organization"
      },
      "potentialAction": {
        "@type": "SearchAction",
        "target": "{{ route('index') }}?q={search_term_string}",
        "query-input": "required name=search_term_string"
      }
    },
    {
      "@type": "LocalBusiness",
      "@id": "{{ route('index') }}#localbusiness",
      "name": "AryaWeb innovations",
      "url": "{{ route('index') }}",
      "image": "{{ asset('assets/img/about.jpg') }}",
      "telephone": "+91 9870992118",
      "email": "aryawebcoding@gmail.com",
      "address": {
        "@type": "PostalAddress",
        "streetAddress": "Pavitra Marriage home NH-2 road",
        "addressLocality": "Agra",
        "addressRegion": "Uttar Pradesh",
        "addressCountry": "IN"
      },
      "areaServed": "India",
      "priceRange": "$$",
      "founder": "AryaWeb innovations",
      "makesOffer": [
        {
          "@type": "Offer",
          "itemOffered": {
            "@type": "Service",
            "name": "Website Development"
          }
        },
        {
          "@type": "Offer",
          "itemOffered": {
            "@type": "Service",
            "name": "Mobile App Development"
          }
        },
        {
          "@type": "Offer",
          "itemOffered": {
            "@type": "Service",
            "name": "UI/UX Design"
          }
        },
        {
          "@type": "Offer",
          "itemOffered": {
            "@type": "Service",
            "name": "Digital Marketing"
          }
        }
      ]
    }
  ]
}
</script>
    <script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "ItemList",
  "itemListElement": [
    @foreach($projects as $index => $val)
    {
      "@type": "Product",
      "name": "{{ $val->name }}",
      "description": "{!! $val->description !!}",
      "image": "{{ asset($val->thumnail ?? 'assets/img/projects/hq720.jpg') }}",
      "brand": {
        "@type": "category",
        "name": "{{category($val->category)->name}}"
      },
      "offers": {
        "@type": "Offer",
        "priceCurrency": "INR",
        "price": "{{ $val->price }}",
        "availability": "https://schema.org/InStock",
        "url": "{{ $val->preview_link }}"
      }
    }@if(!$loop->last),@endif
    @endforeach
  ]
}
</script>
@endsection

