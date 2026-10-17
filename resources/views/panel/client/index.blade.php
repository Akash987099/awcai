@extends('panel.client.layout.app')

@section('content')
    @php
        $client = Auth::guard('client')->user();
        $isAdmin = $client && $client->role_id == 1;

        $sections = $isAdmin
            ? [
                [
                    'title' => 'Staff Management',
                    'count' => 0,
                    'route' => 'panel.customer.index',
                    'icon' => 'users',
                    'color' => 'blue',
                ],
                [
                    'title' => 'Access Tokens',
                    'count' => '→',
                    'route' => 'panel.tokens',
                    'icon' => 'shield',
                    'color' => 'purple',
                ],
            ]
            : [
                [
                    'title' => 'Products',
                    'count' => $products,
                    'route' => 'panel.product.index',
                    'icon' => 'box',
                    'color' => 'teal',
                ],
                [
                    'title' => 'Services',
                    'count' => $services,
                    'route' => 'panel.client-services.index',
                    'icon' => 'services',
                    'color' => 'blue',
                ],
                [
                    'title' => 'Blogs',
                    'count' => $blogs,
                    'route' => 'panel.client-blogs.index',
                    'icon' => 'blogs',
                    'color' => 'orange',
                ],
                [
                    'title' => 'Articles',
                    'count' => $articles,
                    'route' => 'panel.client-articles.index',
                    'icon' => 'articles',
                    'color' => 'purple',
                ],
                [
                    'title' => 'News',
                    'count' => $news,
                    'route' => 'panel.client-news.index',
                    'icon' => 'news',
                    'color' => 'blue',
                ],
                [
                    'title' => 'FAQs',
                    'count' => $faqs,
                    'route' => 'panel.client-faqs.index',
                    'icon' => 'faq',
                    'color' => 'green',
                ],
                [
                    'title' => 'CMS Pages',
                    'count' => $cms,
                    'route' => 'panel.client-cms.index',
                    'icon' => 'pages',
                    'color' => 'purple',
                ],
                [
                    'title' => 'About Us',
                    'count' => '→',
                    'route' => 'panel.about.index',
                    'icon' => 'about',
                    'color' => 'orange',
                ],
                [
                    'title' => 'Slider Images',
                    'count' => $slider,
                    'route' => 'panel.slider.index',
                    'icon' => 'slider',
                    'color' => 'pink',
                ],
                [
                    'title' => 'Website Settings',
                    'count' => '→',
                    'route' => 'panel.settings.show',
                    'icon' => 'settings',
                    'color' => 'teal',
                ],
                [
                    'title' => 'Reviews',
                    'count' => $review,
                    'route' => 'panel.pnc-reviews.index',
                    'icon' => 'reviews',
                    'color' => 'orange',
                ],
                [
                    'title' => 'Videos',
                    'count' => $videos,
                    'route' => 'panel.pnc-videos.index',
                    'icon' => 'videos',
                    'color' => 'blue',
                ],
            ];
    @endphp

    <main class="cp-main">

        {{-- Clickable Small Boxes --}}
        <section class="mini-dashboard-grid">

            @foreach ($sections as $section)
                <a href="{{ route($section['route']) }}" class="mini-dashboard-card mini-{{ $section['color'] }}">

                    <div class="mini-card-top">

                        <span class="mini-card-icon">

                            @switch($section['icon'])
                                @case('box')
                                    <svg viewBox="0 0 24 24">
                                        <path d="m12 3 9 5-9 5-9-5 9-5Z" />
                                        <path d="m3 8 9 5 9-5" />
                                        <path d="M3 8v9l9 5 9-5V8M12 13v9" />
                                    </svg>
                                @break

                                @case('services')
                                    <svg viewBox="0 0 24 24">
                                        <path d="m12 3 2.5 6.5L21 12l-6.5 2.5L12 21l-2.5-6.5L3 12l6.5-2.5L12 3Z" />
                                    </svg>
                                @break

                                @case('blogs')
                                    <svg viewBox="0 0 24 24">
                                        <path d="M5 3h14v18H5zM8 7h8M8 11h8M8 15h5" />
                                    </svg>
                                @break

                                @case('articles')
                                    <svg viewBox="0 0 24 24">
                                        <path d="M5 3h14v18H5zM8 7h8M8 11h8M8 15h6" />
                                    </svg>
                                @break

                                @case('news')
                                    <svg viewBox="0 0 24 24">
                                        <rect x="3" y="4" width="18" height="16" rx="2" />
                                        <path d="M7 8h4v4H7zM14 8h4M14 12h4M7 16h11" />
                                    </svg>
                                @break

                                @case('faq')
                                    <svg viewBox="0 0 24 24">
                                        <circle cx="12" cy="12" r="9" />
                                        <path d="M9.5 9a2.5 2.5 0 1 1 4.5 1.5c-1 1-2 1-2 3M12 17h.01" />
                                    </svg>
                                @break

                                @case('pages')
                                    <svg viewBox="0 0 24 24">
                                        <rect x="3" y="3" width="18" height="18" rx="2" />
                                        <path d="M3 9h18M9 21V9" />
                                    </svg>
                                @break

                                @case('about')
                                    <svg viewBox="0 0 24 24">
                                        <circle cx="12" cy="12" r="9" />
                                        <path d="M12 11v5M12 8h.01" />
                                    </svg>
                                @break

                                @case('slider')
                                    <svg viewBox="0 0 24 24">
                                        <rect x="3" y="3" width="18" height="18" rx="2" />
                                        <circle cx="8.5" cy="8.5" r="1.5" />
                                        <path d="m21 15-5-5L5 21" />
                                    </svg>
                                @break

                                @case('settings')
                                    <svg viewBox="0 0 24 24">
                                        <circle cx="12" cy="12" r="3" />
                                        <path
                                            d="M19.4 15a8 8 0 0 0 0-6l1.5-1.2-2-3.4-1.9.7a8 8 0 0 0-5-1.8L11.5 1h-4l-.5 2.3a8 8 0 0 0-2.5 1.4l-2-.7-2 3.4L2 8.6a8 8 0 0 0 0 6l-1.5 1.2 2 3.4 2-.7a8 8 0 0 0 2.5 1.4l.5 2.3h4l.5-2.3a8 8 0 0 0 2.5-1.4l1.9.7 2-3.4L19.4 15Z"
                                            transform="translate(2 0) scale(.83)" />
                                    </svg>
                                @break

                                @case('reviews')
                                    <svg viewBox="0 0 24 24">
                                        <path d="m12 3 2.8 5.7 6.2.9-4.5 4.4 1.1 6.2-5.6-3-5.6 3 1.1-6.2L3 9.6l6.2-.9L12 3Z" />
                                    </svg>
                                @break

                                @case('videos')
                                    <svg viewBox="0 0 24 24">
                                        <rect x="3" y="5" width="18" height="14" rx="2" />
                                        <path d="m10 9 5 3-5 3z" />
                                    </svg>
                                @break

                                @case('users')
                                    <svg viewBox="0 0 24 24">
                                        <path d="M16 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2" />
                                        <circle cx="10" cy="7" r="4" />
                                        <path d="M20 21v-2a4 4 0 0 0-3-3.87M16 3.13a4 4 0 0 1 0 7.75" />
                                    </svg>
                                @break

                                @case('shield')
                                    <svg viewBox="0 0 24 24">
                                        <path d="M12 22s8-4 8-11V5l-8-3-8 3v6c0 7 8 11 8 11Z" />
                                        <path d="m9 12 2 2 4-4" />
                                    </svg>
                                @break
                            @endswitch

                        </span>

                        <span class="mini-card-arrow">↗</span>

                    </div>

                    <div class="mini-card-details">
                        <span class="mini-card-title">
                            {{ $section['title'] }}
                        </span>

                        <strong class="mini-card-count">
                            {{ $section['count'] }}
                        </strong>
                    </div>

                    <div class="mini-card-bottom">
                        <span>
                            {{ is_numeric($section['count']) ? 'Total ' . strtolower($section['title']) : 'Manage settings' }}
                        </span>

                        <span class="mini-card-line"></span>
                    </div>

                </a>
            @endforeach

        </section>

        {{-- Support Strip --}}
        <section class="cp-support-strip">
            <div class="cp-support-icon">i</div>

            <div class="cp-support-content">
                <strong>Need a hand?</strong>
                <p>Our support team is here to help with your clinic portal.</p>
            </div>

            <a href="mailto:support@aryawebinnovations.com">
                Contact support <span>&rarr;</span>
            </a>
        </section>

    </main>

    <style>
        .cp-dashboard {
            padding: 24px 28px 35px;
            color: #15394c;
        }

        /* Welcome banner */
        .cp-welcome {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 22px;
            padding: 29px 32px;
            border-radius: 18px;
            background: linear-gradient(115deg, #143f51, #176c6d);
            box-shadow: 0 10px 26px rgba(19, 66, 79, .10);
        }

        .cp-welcome-label {
            display: flex;
            align-items: center;
            gap: 8px;
            color: #8ce9dd;
            font-size: 10px;
            font-weight: 800;
            letter-spacing: 1.5px;
        }

        .cp-live-dot {
            width: 7px;
            height: 7px;
            border-radius: 50%;
            background: #59e0c2;
        }

        .cp-welcome h1 {
            margin: 16px 0 8px;
            color: #fff;
            font-size: clamp(23px, 2.6vw, 32px);
            font-weight: 650;
            letter-spacing: -1px;
        }

        .cp-welcome-content>p {
            margin: 0;
            color: #d0e5e9;
            font-size: 12px;
            line-height: 1.8;
        }

        .cp-welcome-status {
            display: flex;
            align-items: center;
            gap: 10px;
            flex-shrink: 0;
            padding: 12px 14px;
            border: 1px solid rgba(255, 255, 255, .16);
            border-radius: 13px;
            background: rgba(255, 255, 255, .08);
        }

        .cp-status-check {
            display: grid;
            place-items: center;
            width: 32px;
            height: 32px;
            border-radius: 50%;
            background: rgba(76, 226, 190, .17);
            color: #70f0cd;
            font-size: 19px;
        }

        .cp-welcome-status strong,
        .cp-welcome-status small {
            display: block;
        }

        .cp-welcome-status strong {
            color: #fff;
            font-size: 11px;
        }

        .cp-welcome-status small {
            margin-top: 4px;
            color: #c4e0e4;
            font-size: 10px;
        }

        /* Heading */
        .cp-dashboard-heading {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 12px;
            margin: 29px 0 17px;
        }

        .cp-heading-eyebrow {
            color: #078f8a;
            font-size: 9px;
            font-weight: 800;
            letter-spacing: 1.5px;
        }

        .cp-dashboard-heading h2 {
            margin: 7px 0 4px;
            color: #15394c;
            font-size: 23px;
            font-weight: 650;
            letter-spacing: -.6px;
        }

        .cp-dashboard-heading p {
            margin: 0;
            color: #85959e;
            font-size: 11px;
        }

        .cp-section-count {
            padding: 8px 11px;
            border: 1px solid #e2ebed;
            border-radius: 9px;
            background: #fff;
            color: #687f8a;
            font-size: 10px;
            white-space: nowrap;
        }

        /* Compact clickable cards */
        .mini-dashboard-grid {
            display: grid;
            grid-template-columns: repeat(4, minmax(0, 1fr));
            gap: 13px;
        }

        .mini-dashboard-card {
            --mini-accent: #078f8a;
            --mini-soft: #e7f7f4;

            display: flex;
            flex-direction: column;
            min-width: 0;
            min-height: 142px;
            padding: 15px;
            border: 1px solid #e5ecef;
            border-radius: 13px;
            background: #fff;
            text-decoration: none !important;
            box-shadow: 0 3px 12px rgba(20, 54, 70, .025);
            transition: transform .2s ease, box-shadow .2s ease,
                border-color .2s ease;
        }

        .mini-dashboard-card:hover {
            transform: translateY(-3px);
            border-color: var(--mini-accent);
            box-shadow: 0 8px 22px rgba(20, 54, 70, .075);
        }

        .mini-dashboard-card:focus-visible {
            outline: 2px solid var(--mini-accent);
            outline-offset: 3px;
        }

        .mini-card-top,
        .mini-card-details,
        .mini-card-bottom {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 8px;
        }

        .mini-card-icon {
            display: grid;
            place-items: center;
            width: 35px;
            height: 35px;
            flex-shrink: 0;
            border-radius: 10px;
            background: var(--mini-soft);
            color: var(--mini-accent);
            font-size: 18px;
            font-weight: 700;
        }

        .mini-card-icon svg {
            width: 19px;
            height: 19px;
            fill: none;
            stroke: currentColor;
            stroke-width: 1.7;
            stroke-linecap: round;
            stroke-linejoin: round;
        }

        .mini-card-arrow {
            color: #a0afb7;
            font-size: 16px;
            transition: transform .2s ease, color .2s ease;
        }

        .mini-dashboard-card:hover .mini-card-arrow {
            color: var(--mini-accent);
            transform: translate(2px, -2px);
        }

        .mini-card-details {
            margin-top: 13px;
        }

        .mini-card-title {
            color: #365365;
            font-size: 11px;
            font-weight: 650;
            line-height: 1.5;
        }

        .mini-card-count {
            color: #15394c;
            font-size: 23px;
            font-weight: 750;
            line-height: 1;
            letter-spacing: -.7px;
        }

        .mini-card-bottom {
            justify-content: flex-start;
            gap: 9px;
            margin-top: auto;
            padding-top: 11px;
            color: #92a1aa;
            font-size: 9px;
        }

        .mini-card-line {
            width: 19px;
            height: 2px;
            border-radius: 3px;
            background: var(--mini-soft);
            transition: width .2s ease, background .2s ease;
        }

        .mini-dashboard-card:hover .mini-card-line {
            width: 30px;
            background: var(--mini-accent);
        }

        /* Colour variations */
        .mini-teal {
            --mini-accent: #078f8a;
            --mini-soft: #e7f7f4;
        }

        .mini-blue {
            --mini-accent: #3478c5;
            --mini-soft: #edf4ff;
        }

        .mini-orange {
            --mini-accent: #d88932;
            --mini-soft: #fff3e4;
        }

        .mini-purple {
            --mini-accent: #8661c5;
            --mini-soft: #f2edfc;
        }

        .mini-green {
            --mini-accent: #32976d;
            --mini-soft: #e8f7ee;
        }

        .mini-pink {
            --mini-accent: #c75c91;
            --mini-soft: #fcecf4;
        }

        /* Support strip */
        .cp-support-strip {
            display: flex;
            align-items: center;
            gap: 13px;
            margin-top: 23px;
            padding: 15px 18px;
            border: 1px solid #e3ecee;
            border-radius: 13px;
            background: #fff;
        }

        .cp-support-icon {
            display: grid;
            place-items: center;
            width: 33px;
            height: 33px;
            flex-shrink: 0;
            border-radius: 10px;
            background: #e7f7f4;
            color: #078f8a;
            font-weight: 750;
        }

        .cp-support-content {
            flex: 1;
            min-width: 0;
        }

        .cp-support-content strong {
            display: block;
            color: #29485a;
            font-size: 11px;
        }

        .cp-support-content p {
            margin: 4px 0 0;
            color: #85959e;
            font-size: 10px;
            line-height: 1.6;
        }

        .cp-support-strip>a {
            color: #078f8a;
            font-size: 10px;
            font-weight: 700;
            text-decoration: none;
            white-space: nowrap;
        }

        .cp-support-strip>a:hover {
            text-decoration: underline;
        }

        @media (max-width: 1100px) {
            .mini-dashboard-grid {
                grid-template-columns: repeat(3, minmax(0, 1fr));
            }

            .cp-dashboard {
                padding: 22px 18px 30px;
            }
        }

        @media (max-width: 700px) {
            .mini-dashboard-grid {
                grid-template-columns: repeat(2, minmax(0, 1fr));
                gap: 10px;
            }

            .cp-dashboard {
                padding: 16px 12px 25px;
            }

            .cp-welcome {
                align-items: flex-start;
                flex-direction: column;
                gap: 18px;
                padding: 23px 20px;
            }

            .cp-welcome-status {
                width: 100%;
                box-sizing: border-box;
            }

            .cp-dashboard-heading h2 {
                font-size: 20px;
            }

            .mini-dashboard-card {
                min-height: 135px;
                padding: 12px;
            }

            .mini-card-title {
                font-size: 10px;
            }

            .mini-card-count {
                font-size: 21px;
            }

            .cp-support-strip {
                flex-wrap: wrap;
            }

            .cp-support-strip>a {
                margin-left: 46px;
            }
        }

        @media (prefers-reduced-motion: reduce) {

            .mini-dashboard-card,
            .mini-card-arrow,
            .mini-card-line {
                transition: none;
            }
        }
    </style>
@endsection
