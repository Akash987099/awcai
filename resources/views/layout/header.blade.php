<!DOCTYPE html>
<html lang="en">
<head>
    @php
        $defaultTitle = 'AryaWeb innovations | Website Development, App Development & Digital Marketing Company';
        $defaultDescription = 'AryaWeb innovations is a professional IT company in Agra offering website development, app development, UI/UX design, eCommerce solutions, and digital marketing services.';
        $metaTitle = trim($__env->yieldContent('title', $defaultTitle));
        $metaDescription = trim($__env->yieldContent('meta_description', $defaultDescription));
        $metaKeywords = trim($__env->yieldContent('meta_keywords', 'AryaWeb innovations, website development company, app development company, digital marketing company, UI UX design, Laravel development, Agra IT company'));
        $metaImage = trim($__env->yieldContent('meta_image', asset('assets/img/about.jpg')));
        $canonicalUrl = trim($__env->yieldContent('canonical', url()->current()));
    @endphp
    <link rel="icon" type="image/jpg" href="{{ asset('assets/img/favicon.jpg') }}">
    <link rel="shortcut icon" href="{{ asset('assets/img/favicon.jpg') }}" type="image/png">
    <link rel="apple-touch-icon" href="{{ asset('assets/img/favicon.jpg') }}">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $metaTitle }}</title>
    <meta name="description" content="{{ $metaDescription }}">
    <meta name="keywords" content="{{ $metaKeywords }}">
    <meta name="robots" content="index,follow,max-image-preview:large,max-snippet:-1,max-video-preview:-1">
    <meta name="author" content="AryaWeb innovations">
    <link rel="canonical" href="{{ $canonicalUrl }}">

    <meta property="og:type" content="website">
    <meta property="og:site_name" content="AryaWeb innovations">
    <meta property="og:title" content="{{ $metaTitle }}">
    <meta property="og:description" content="{{ $metaDescription }}">
    <meta property="og:url" content="{{ $canonicalUrl }}">
    <meta property="og:image" content="{{ $metaImage }}">

    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="{{ $metaTitle }}">
    <meta name="twitter:description" content="{{ $metaDescription }}">
    <meta name="twitter:image" content="{{ $metaImage }}">

    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/common.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    @stack('meta')
</head>
<body class="overflow-x-hidden">
    @php
        $navLink = function (bool $active = false): string {
            return $active
                ? 'block rounded-2xl px-4 py-3 text-sm font-semibold text-white bg-white/18 shadow-[inset_0_1px_0_rgba(255,255,255,0.12)] md:rounded-none md:bg-transparent md:px-2 md:py-2 md:text-cyan-200 md:shadow-none'
                : 'block rounded-2xl px-4 py-3 text-sm font-medium text-slate-100 transition duration-200 hover:bg-white/10 hover:text-white md:rounded-none md:px-2 md:py-2 md:hover:bg-transparent md:hover:text-cyan-200';
        };

        $navButton = function (bool $active = false): string {
            return $active
                ? 'flex w-full items-center justify-between rounded-2xl px-4 py-3 text-sm font-semibold text-white bg-white/18 shadow-[inset_0_1px_0_rgba(255,255,255,0.12)] md:w-auto md:rounded-none md:bg-transparent md:px-2 md:py-2 md:text-cyan-200 md:shadow-none'
                : 'flex w-full items-center justify-between rounded-2xl px-4 py-3 text-sm font-medium text-slate-100 transition duration-200 hover:bg-white/10 hover:text-white md:w-auto md:rounded-none md:px-2 md:py-2 md:hover:bg-transparent md:hover:text-cyan-200';
        };

        $submenuLink = 'block rounded-xl px-4 py-3 text-sm font-medium text-slate-100 transition duration-200 hover:bg-white/10 hover:text-white md:rounded-md md:px-4 md:py-2 md:text-slate-700 md:hover:bg-gray-100 md:hover:text-slate-900';
        $submenuSectionLink = 'flex items-center justify-between rounded-xl px-4 py-3 text-sm font-semibold text-white/95 transition duration-200 hover:bg-white/10 hover:text-white md:rounded-md md:px-4 md:py-2 md:text-slate-800 md:hover:bg-gray-100';
    @endphp
    <style>
        .awc-nav {
            background: linear-gradient(135deg, #4f0585 0%, #6d28d9 54%, #2563eb 100%);
            border-bottom: 1px solid rgba(255, 255, 255, 0.08);
            box-shadow: 0 16px 42px rgba(55, 7, 101, 0.28);
        }

        .awc-nav-panel {
            background: linear-gradient(180deg, rgba(88, 28, 135, 0.98), rgba(49, 15, 91, 0.96));
            border: 1px solid rgba(255, 255, 255, 0.12);
            box-shadow: 0 22px 48px rgba(15, 23, 42, 0.34);
            backdrop-filter: blur(18px);
            max-height: calc(100vh - 5.5rem);
            overflow-y: auto;
            overscroll-behavior: contain;
            -webkit-overflow-scrolling: touch;
        }

        .awc-submenu {
            background: rgba(15, 23, 42, 0.2);
            border: 1px solid rgba(255, 255, 255, 0.1);
        }

        .awc-submenu-nested {
            border-left: 1px solid rgba(125, 211, 252, 0.22);
        }

        @media (min-width: 768px) {
            .awc-nav-panel {
                background: transparent;
                border: 0;
                box-shadow: none;
                backdrop-filter: none;
                max-height: none;
                overflow-y: visible;
            }

            .awc-submenu {
                background: #fff;
                border-color: rgba(229, 231, 235, 1);
            }

            .awc-submenu-nested {
                border-left: 0;
            }
        }
    </style>
   
  <nav class="awc-nav fixed top-0 left-0 w-full z-50">
    <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto pt-1 px-2">
        <!-- Brand -->
        <a href="{{ route('index') }}" class="flex items-center space-x-3 rtl:space-x-reverse">
            <img src="{{asset('assets/img/logo.png')}}" class="h-16">
        </a>

        <div class="flex items-center gap-4 md:order-2">
            <a href="{{route('user.login')}}" class="hidden md:inline-block bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 px-4 rounded-lg transition duration-300 booking-button">
                My Account
            </a>

            <button id="navbar-toggle" data-collapse-toggle="navbar-it" type="button"
                class="inline-flex h-11 w-11 items-center justify-center rounded-2xl border border-white/15 bg-white/10 text-sm text-white shadow-lg transition duration-200 hover:bg-white/20 focus:outline-none focus:ring-2 focus:ring-cyan-200 md:hidden"
                aria-controls="navbar-it" aria-expanded="false">
                <span class="sr-only">Open main menu</span>
                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M1 1h15M1 7h15M1 13h15"/>
                </svg>
            </button>
        </div>

        <!-- Menu Items -->
        <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-it">
            <ul class="awc-nav-panel mt-4 flex flex-col gap-2 rounded-[1.75rem] p-4 font-medium md:mt-0 md:flex-row md:items-center md:gap-1 md:p-0 rtl:space-x-reverse">

                <li class="md:hidden">
                    <a href="{{route('user.login')}}" class="block rounded-2xl bg-white px-4 py-3 text-center text-sm font-semibold text-purple-800 shadow-lg transition duration-200 hover:bg-cyan-50">
                        My Account
                    </a>
                </li>

                <li>
                    <a href="{{ route('index') }}" class="{{ $navLink(request()->routeIs('index')) }}">Home</a>
                </li>

                <li>
                    <a href="{{ route('about-us') }}" class="{{ $navLink(request()->routeIs('about-us')) }}">About Us</a>
                </li>

                <li>
                    <a href="{{ route('team') }}" class="{{ $navLink(request()->routeIs('team')) }}">Team</a>
                </li>

                <!-- Services -->
                <li class="relative group">
                    <button type="button" class="{{ $navButton(request()->routeIs('service.*')) }} mobile-submenu-toggle">
                        Services
                        <svg class="w-4 h-4 ml-1" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 10.94l3.71-3.71a.75.75 0 111.06 1.06l-4.24 4.24a.75.75 0 01-1.06 0L5.25 8.27a.75.75 0 01-.02-1.06z" clip-rule="evenodd" />
                        </svg>
                    </button>
                    <ul class="awc-submenu hidden mt-2 w-full space-y-1 rounded-2xl p-2 md:absolute md:z-10 md:mt-2 md:block md:w-48 md:space-y-0 md:rounded-md md:p-0 md:invisible md:opacity-0 group-hover:visible group-hover:opacity-100 transition-all duration-200">
                        <li><a href="{{route('service.web-development')}}" class="{{ $submenuLink }}">Web Development</a></li>
                        <li><a href="{{route('service.app-development')}}" class="{{ $submenuLink }}">App Development</a></li>
                        <li><a href="{{route('service.ui-development')}}" class="{{ $submenuLink }}">UI/UX Design</a></li>
                        <li><a href="{{route('digital-marketing.overview')}}" class="{{ $submenuLink }}">Digital Marketing</a></li>
                    </ul>
                </li>

                <!-- Projects -->
                <li class="relative group">
                    <button type="button" class="{{ $navButton(request()->routeIs('complate_project') || request()->routeIs('project.*')) }} mobile-submenu-toggle">
                        Projects
                        <svg class="w-4 h-4 ml-1" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 10.94l3.71-3.71a.75.75 0 111.06 1.06l-4.24 4.24a.75.75 0 01-1.06 0L5.25 8.27a.75.75 0 01-.02-1.06z" clip-rule="evenodd" />
                        </svg>
                    </button>
                    <ul class="awc-submenu hidden mt-2 w-full space-y-1 rounded-2xl p-2 md:absolute md:z-10 md:mt-2 md:block md:w-48 md:space-y-0 md:rounded-md md:p-0 md:invisible md:opacity-0 group-hover:visible group-hover:opacity-100 transition-all duration-200">
                        <li><a href="{{route('projects.index')}}" class="{{ $submenuLink }}">Projects</a></li>    
                        <li><a href="{{route('complate_project')}}" class="{{ $submenuLink }}">Completed</a></li>
                        <li><a href="#" class="{{ $submenuLink }}">Ongoing</a></li>
                        <li><a href="#" class="{{ $submenuLink }}">Client Showcase</a></li>
                    </ul>
                </li>

                <!-- Digital Marketing -->
                <li class="relative group">
                    <button type="button" class="{{ $navButton(request()->routeIs('digital-marketing.*')) }} mobile-submenu-toggle">
                        Digital Marketing
                        <svg class="w-4 h-4 ml-1" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 10.94l3.71-3.71a.75.75 0 111.06 1.06l-4.24 4.24a.75.75 0 01-1.06 0L5.25 8.27a.75.75 0 01-.02-1.06z" clip-rule="evenodd" />
                        </svg>
                    </button>

                    <ul class="awc-submenu hidden mt-2 w-full space-y-1 rounded-2xl p-2 md:absolute md:z-10 md:mt-2 md:block md:w-56 md:space-y-0 md:rounded-md md:p-0 md:invisible md:opacity-0 group-hover:visible group-hover:opacity-100 transition-all duration-200">
                        <li><a href="{{ route('digital-marketing.overview') }}" class="{{ $submenuLink }}">Overview</a></li>

                        <li class="relative group/sub">
                            <a href="{{ route('digital-marketing.section', ['section' => 'seo']) }}" class="{{ $submenuSectionLink }}">
                                SEO
                                <svg class="w-3 h-3 ml-2" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M7.21 14.77a.75.75 0 010-1.06L10.94 10 7.21 6.29a.75.75 0 111.06-1.06l4.24 4.24a.75.75 0 010 1.06l-4.24 4.24a.75.75 0 01-1.06 0z" clip-rule="evenodd" />
                                </svg>
                            </a>
                            <ul class="awc-submenu-nested mt-2 ml-3 space-y-1 pl-3 md:absolute md:left-full md:top-0 md:ml-1 md:mt-0 md:w-56 md:space-y-0 md:rounded-md md:border md:border-gray-200 md:bg-white md:pl-0 md:shadow-md md:invisible md:opacity-0 group-hover/sub:visible group-hover/sub:opacity-100 transition-all duration-200">
                                <li><a href="{{ route('digital-marketing.item', ['section' => 'seo', 'page' => 'on-page-seo']) }}" class="{{ $submenuLink }}">On-Page SEO</a></li>
                                <li><a href="{{ route('digital-marketing.item', ['section' => 'seo', 'page' => 'off-page-seo']) }}" class="{{ $submenuLink }}">Off-Page SEO</a></li>
                                <li><a href="{{ route('digital-marketing.item', ['section' => 'seo', 'page' => 'technical-seo']) }}" class="{{ $submenuLink }}">Technical SEO</a></li>
                                <li><a href="{{ route('digital-marketing.item', ['section' => 'seo', 'page' => 'local-seo']) }}" class="{{ $submenuLink }}">Local SEO</a></li>
                            </ul>
                        </li>

                        <li class="relative group/sub">
                            <a href="{{ route('digital-marketing.section', ['section' => 'search-engine-marketing']) }}" class="{{ $submenuSectionLink }}">
                                Search Engine Marketing (SEM)
                                <svg class="w-3 h-3 ml-2" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M7.21 14.77a.75.75 0 010-1.06L10.94 10 7.21 6.29a.75.75 0 111.06-1.06l4.24 4.24a.75.75 0 010 1.06l-4.24 4.24a.75.75 0 01-1.06 0z" clip-rule="evenodd" />
                                </svg>
                            </a>
                            <ul class="awc-submenu-nested mt-2 ml-3 space-y-1 pl-3 md:absolute md:left-full md:top-0 md:ml-1 md:mt-0 md:w-56 md:space-y-0 md:rounded-md md:border md:border-gray-200 md:bg-white md:pl-0 md:shadow-md md:invisible md:opacity-0 group-hover/sub:visible group-hover/sub:opacity-100 transition-all duration-200">
                                <li><a href="{{ route('digital-marketing.item', ['section' => 'search-engine-marketing', 'page' => 'google-ads-ppc-campaigns']) }}" class="{{ $submenuLink }}">Google Ads (PPC campaigns)</a></li>
                                <li><a href="{{ route('digital-marketing.item', ['section' => 'search-engine-marketing', 'page' => 'bing-ads']) }}" class="{{ $submenuLink }}">Bing Ads</a></li>
                                <li><a href="{{ route('digital-marketing.item', ['section' => 'search-engine-marketing', 'page' => 'display-advertising']) }}" class="{{ $submenuLink }}">Display advertising</a></li>
                            </ul>
                        </li>

                        <li class="relative group/sub">
                            <a href="{{ route('digital-marketing.section', ['section' => 'social-media']) }}" class="{{ $submenuSectionLink }}">
                                Social Media
                                <svg class="w-3 h-3 ml-2" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M7.21 14.77a.75.75 0 010-1.06L10.94 10 7.21 6.29a.75.75 0 111.06-1.06l4.24 4.24a.75.75 0 010 1.06l-4.24 4.24a.75.75 0 01-1.06 0z" clip-rule="evenodd" />
                                </svg>
                            </a>
                            <ul class="awc-submenu-nested mt-2 ml-3 space-y-1 pl-3 md:absolute md:left-full md:top-0 md:ml-1 md:mt-0 md:w-56 md:space-y-0 md:rounded-md md:border md:border-gray-200 md:bg-white md:pl-0 md:shadow-md md:invisible md:opacity-0 group-hover/sub:visible group-hover/sub:opacity-100 transition-all duration-200">
                                <li><a href="{{ route('digital-marketing.item', ['section' => 'social-media', 'page' => 'facebook-instagram']) }}" class="{{ $submenuLink }}">Facebook & Instagram</a></li>
                                <li><a href="{{ route('digital-marketing.item', ['section' => 'social-media', 'page' => 'linkedin']) }}" class="{{ $submenuLink }}">LinkedIn</a></li>
                                <li><a href="{{ route('digital-marketing.item', ['section' => 'social-media', 'page' => 'twitter-x']) }}" class="{{ $submenuLink }}">Twitter (X)</a></li>
                                <li><a href="{{ route('digital-marketing.item', ['section' => 'social-media', 'page' => 'pinterest-snapchat']) }}" class="{{ $submenuLink }}">Pinterest & Snapchat</a></li>
                            </ul>
                        </li>

                        <li class="relative group/sub">
                            <a href="{{ route('digital-marketing.section', ['section' => 'content-marketing']) }}" class="{{ $submenuSectionLink }}">
                                Content Marketing
                                <svg class="w-3 h-3 ml-2" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M7.21 14.77a.75.75 0 010-1.06L10.94 10 7.21 6.29a.75.75 0 111.06-1.06l4.24 4.24a.75.75 0 010 1.06l-4.24 4.24a.75.75 0 01-1.06 0z" clip-rule="evenodd" />
                                </svg>
                            </a>
                            <ul class="awc-submenu-nested mt-2 ml-3 space-y-1 pl-3 md:absolute md:left-full md:top-0 md:ml-1 md:mt-0 md:w-56 md:space-y-0 md:rounded-md md:border md:border-gray-200 md:bg-white md:pl-0 md:shadow-md md:invisible md:opacity-0 group-hover/sub:visible group-hover/sub:opacity-100 transition-all duration-200">
                                <li><a href="{{ route('digital-marketing.item', ['section' => 'content-marketing', 'page' => 'blog-writing-optimization']) }}" class="{{ $submenuLink }}">Blog writing & optimization</a></li>
                                <li><a href="{{ route('digital-marketing.item', ['section' => 'content-marketing', 'page' => 'video-content-marketing']) }}" class="{{ $submenuLink }}">Video content marketing</a></li>
                                <li><a href="{{ route('digital-marketing.item', ['section' => 'content-marketing', 'page' => 'infographics-visual-content']) }}" class="{{ $submenuLink }}">Infographics & visual content</a></li>
                                <li><a href="{{ route('digital-marketing.item', ['section' => 'content-marketing', 'page' => 'case-studies-whitepapers-ebooks']) }}" class="{{ $submenuLink }}">Case studies, whitepapers, eBooks</a></li>
                            </ul>
                        </li>

                        <li class="relative group/sub">
                            <a href="{{ route('digital-marketing.section', ['section' => 'email-marketing']) }}" class="{{ $submenuSectionLink }}">
                                Email Marketing
                                <svg class="w-3 h-3 ml-2" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M7.21 14.77a.75.75 0 010-1.06L10.94 10 7.21 6.29a.75.75 0 111.06-1.06l4.24 4.24a.75.75 0 010 1.06l-4.24 4.24a.75.75 0 01-1.06 0z" clip-rule="evenodd" />
                                </svg>
                            </a>
                            <ul class="awc-submenu-nested mt-2 ml-3 space-y-1 pl-3 md:absolute md:left-full md:top-0 md:ml-1 md:mt-0 md:w-56 md:space-y-0 md:rounded-md md:border md:border-gray-200 md:bg-white md:pl-0 md:shadow-md md:invisible md:opacity-0 group-hover/sub:visible group-hover/sub:opacity-100 transition-all duration-200">
                                <li><a href="{{ route('digital-marketing.item', ['section' => 'email-marketing', 'page' => 'newsletter-campaigns']) }}" class="{{ $submenuLink }}">Newsletter campaigns</a></li>
                                <li><a href="{{ route('digital-marketing.item', ['section' => 'email-marketing', 'page' => 'automated-email-sequences']) }}" class="{{ $submenuLink }}">Automated email sequences</a></li>
                                <li><a href="{{ route('digital-marketing.item', ['section' => 'email-marketing', 'page' => 'lead-nurturing-campaigns']) }}" class="{{ $submenuLink }}">Lead nurturing campaigns</a></li>
                            </ul>
                        </li>

                        <li class="relative group/sub">
                            <a href="{{ route('digital-marketing.section', ['section' => 'influencer-marketing']) }}" class="{{ $submenuSectionLink }}">
                                Influencer Marketing
                                <svg class="w-3 h-3 ml-2" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M7.21 14.77a.75.75 0 010-1.06L10.94 10 7.21 6.29a.75.75 0 111.06-1.06l4.24 4.24a.75.75 0 010 1.06l-4.24 4.24a.75.75 0 01-1.06 0z" clip-rule="evenodd" />
                                </svg>
                            </a>
                            <ul class="awc-submenu-nested mt-2 ml-3 space-y-1 pl-3 md:absolute md:left-full md:top-0 md:ml-1 md:mt-0 md:w-56 md:space-y-0 md:rounded-md md:border md:border-gray-200 md:bg-white md:pl-0 md:shadow-md md:invisible md:opacity-0 group-hover/sub:visible group-hover/sub:opacity-100 transition-all duration-200">
                                <li><a href="{{ route('digital-marketing.item', ['section' => 'influencer-marketing', 'page' => 'partnering-with-influencers']) }}" class="{{ $submenuLink }}">Partnering with influencers</a></li>
                                <li><a href="{{ route('digital-marketing.item', ['section' => 'influencer-marketing', 'page' => 'affiliate-marketing-programs']) }}" class="{{ $submenuLink }}">Affiliate marketing programs</a></li>
                            </ul>
                        </li>

                        <li class="relative group/sub">
                            <a href="{{ route('digital-marketing.section', ['section' => 'pay-per-click-advertising']) }}" class="{{ $submenuSectionLink }}">
                                Pay-Per-Click (PPC) Advertising
                                <svg class="w-3 h-3 ml-2" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M7.21 14.77a.75.75 0 010-1.06L10.94 10 7.21 6.29a.75.75 0 111.06-1.06l4.24 4.24a.75.75 0 010 1.06l-4.24 4.24a.75.75 0 01-1.06 0z" clip-rule="evenodd" />
                                </svg>
                            </a>
                            <ul class="awc-submenu-nested mt-2 ml-3 space-y-1 pl-3 md:absolute md:left-full md:top-0 md:ml-1 md:mt-0 md:w-56 md:space-y-0 md:rounded-md md:border md:border-gray-200 md:bg-white md:pl-0 md:shadow-md md:invisible md:opacity-0 group-hover/sub:visible group-hover/sub:opacity-100 transition-all duration-200">
                                <li><a href="{{ route('digital-marketing.item', ['section' => 'pay-per-click-advertising', 'page' => 'google-ads']) }}" class="{{ $submenuLink }}">Google Ads</a></li>
                                <li><a href="{{ route('digital-marketing.item', ['section' => 'pay-per-click-advertising', 'page' => 'facebook-instagram-ads']) }}" class="{{ $submenuLink }}">Facebook/Instagram Ads</a></li>
                                <li><a href="{{ route('digital-marketing.item', ['section' => 'pay-per-click-advertising', 'page' => 'youtube-ads']) }}" class="{{ $submenuLink }}">YouTube Ads</a></li>
                            </ul>
                        </li>

                        <li class="relative group/sub">
                            <a href="{{ route('digital-marketing.section', ['section' => 'video-marketing']) }}" class="{{ $submenuSectionLink }}">
                                Video Marketing
                                <svg class="w-3 h-3 ml-2" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M7.21 14.77a.75.75 0 010-1.06L10.94 10 7.21 6.29a.75.75 0 111.06-1.06l4.24 4.24a.75.75 0 010 1.06l-4.24 4.24a.75.75 0 01-1.06 0z" clip-rule="evenodd" />
                                </svg>
                            </a>
                            <ul class="awc-submenu-nested mt-2 ml-3 space-y-1 pl-3 md:absolute md:left-full md:top-0 md:ml-1 md:mt-0 md:w-56 md:space-y-0 md:rounded-md md:border md:border-gray-200 md:bg-white md:pl-0 md:shadow-md md:invisible md:opacity-0 group-hover/sub:visible group-hover/sub:opacity-100 transition-all duration-200">
                                <li><a href="{{ route('digital-marketing.item', ['section' => 'video-marketing', 'page' => 'youtube-optimization']) }}" class="{{ $submenuLink }}">YouTube optimization</a></li>
                                <li><a href="{{ route('digital-marketing.item', ['section' => 'video-marketing', 'page' => 'short-form-video-content']) }}" class="{{ $submenuLink }}">Short-form video content</a></li>
                                <li><a href="{{ route('digital-marketing.item', ['section' => 'video-marketing', 'page' => 'video-ads']) }}" class="{{ $submenuLink }}">Video ads</a></li>
                            </ul>
                        </li>

                        <li class="relative group/sub">
                            <a href="{{ route('digital-marketing.section', ['section' => 'conversion-rate-optimization']) }}" class="{{ $submenuSectionLink }}">
                                Conversion Rate Optimization (CRO)
                                <svg class="w-3 h-3 ml-2" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M7.21 14.77a.75.75 0 010-1.06L10.94 10 7.21 6.29a.75.75 0 111.06-1.06l4.24 4.24a.75.75 0 010 1.06l-4.24 4.24a.75.75 0 01-1.06 0z" clip-rule="evenodd" />
                                </svg>
                            </a>
                            <ul class="awc-submenu-nested mt-2 ml-3 space-y-1 pl-3 md:absolute md:left-full md:top-0 md:ml-1 md:mt-0 md:w-56 md:space-y-0 md:rounded-md md:border md:border-gray-200 md:bg-white md:pl-0 md:shadow-md md:invisible md:opacity-0 group-hover/sub:visible group-hover/sub:opacity-100 transition-all duration-200">
                                <li><a href="{{ route('digital-marketing.item', ['section' => 'conversion-rate-optimization', 'page' => 'landing-page-design-testing']) }}" class="{{ $submenuLink }}">Landing page design & testing</a></li>
                                <li><a href="{{ route('digital-marketing.item', ['section' => 'conversion-rate-optimization', 'page' => 'a-b-testing']) }}" class="{{ $submenuLink }}">A/B testing</a></li>
                                <li><a href="{{ route('digital-marketing.item', ['section' => 'conversion-rate-optimization', 'page' => 'funnel-optimization']) }}" class="{{ $submenuLink }}">Funnel optimization</a></li>
                            </ul>
                        </li>

                        <li class="relative group/sub">
                            <a href="{{ route('digital-marketing.section', ['section' => 'analytics-reporting']) }}" class="{{ $submenuSectionLink }}">
                                Analytics & Reporting
                                <svg class="w-3 h-3 ml-2" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M7.21 14.77a.75.75 0 010-1.06L10.94 10 7.21 6.29a.75.75 0 111.06-1.06l4.24 4.24a.75.75 0 010 1.06l-4.24 4.24a.75.75 0 01-1.06 0z" clip-rule="evenodd" />
                                </svg>
                            </a>
                            <ul class="awc-submenu-nested mt-2 ml-3 space-y-1 pl-3 md:absolute md:left-full md:top-0 md:ml-1 md:mt-0 md:w-56 md:space-y-0 md:rounded-md md:border md:border-gray-200 md:bg-white md:pl-0 md:shadow-md md:invisible md:opacity-0 group-hover/sub:visible group-hover/sub:opacity-100 transition-all duration-200">
                                <li><a href="{{ route('digital-marketing.item', ['section' => 'analytics-reporting', 'page' => 'google-analytics-setup-monitoring']) }}" class="{{ $submenuLink }}">Google Analytics setup & monitoring</a></li>
                                <li><a href="{{ route('digital-marketing.item', ['section' => 'analytics-reporting', 'page' => 'campaign-performance-reports']) }}" class="{{ $submenuLink }}">Campaign performance reports</a></li>
                                <li><a href="{{ route('digital-marketing.item', ['section' => 'analytics-reporting', 'page' => 'roi-tracking']) }}" class="{{ $submenuLink }}">ROI tracking</a></li>
                            </ul>
                        </li>

                        <li class="relative group/sub">
                            <a href="{{ route('digital-marketing.section', ['section' => 'online-reputation-management']) }}" class="{{ $submenuSectionLink }}">
                                Online Reputation Management
                                <svg class="w-3 h-3 ml-2" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M7.21 14.77a.75.75 0 010-1.06L10.94 10 7.21 6.29a.75.75 0 111.06-1.06l4.24 4.24a.75.75 0 010 1.06l-4.24 4.24a.75.75 0 01-1.06 0z" clip-rule="evenodd" />
                                </svg>
                            </a>
                            <ul class="awc-submenu-nested mt-2 ml-3 space-y-1 pl-3 md:absolute md:left-full md:top-0 md:ml-1 md:mt-0 md:w-56 md:space-y-0 md:rounded-md md:border md:border-gray-200 md:bg-white md:pl-0 md:shadow-md md:invisible md:opacity-0 group-hover/sub:visible group-hover/sub:opacity-100 transition-all duration-200">
                                <li><a href="{{ route('digital-marketing.item', ['section' => 'online-reputation-management', 'page' => 'review-monitoring-response']) }}" class="{{ $submenuLink }}">Review monitoring & response</a></li>
                                <li><a href="{{ route('digital-marketing.item', ['section' => 'online-reputation-management', 'page' => 'brand-reputation-building']) }}" class="{{ $submenuLink }}">Brand reputation building</a></li>
                            </ul>
                        </li>

                        <li class="relative group/sub">
                            <a href="{{ route('digital-marketing.section', ['section' => 'mobile-marketing']) }}" class="{{ $submenuSectionLink }}">
                                Mobile Marketing
                                <svg class="w-3 h-3 ml-2" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M7.21 14.77a.75.75 0 010-1.06L10.94 10 7.21 6.29a.75.75 0 111.06-1.06l4.24 4.24a.75.75 0 010 1.06l-4.24 4.24a.75.75 0 01-1.06 0z" clip-rule="evenodd" />
                                </svg>
                            </a>
                            <ul class="awc-submenu-nested mt-2 ml-3 space-y-1 pl-3 md:absolute md:left-full md:top-0 md:ml-1 md:mt-0 md:w-56 md:space-y-0 md:rounded-md md:border md:border-gray-200 md:bg-white md:pl-0 md:shadow-md md:invisible md:opacity-0 group-hover/sub:visible group-hover/sub:opacity-100 transition-all duration-200">
                                <li><a href="{{ route('digital-marketing.item', ['section' => 'mobile-marketing', 'page' => 'sms-campaigns']) }}" class="{{ $submenuLink }}">SMS campaigns</a></li>
                                <li><a href="{{ route('digital-marketing.item', ['section' => 'mobile-marketing', 'page' => 'push-notifications']) }}" class="{{ $submenuLink }}">Push notifications</a></li>
                                <li><a href="{{ route('digital-marketing.item', ['section' => 'mobile-marketing', 'page' => 'in-app-advertising']) }}" class="{{ $submenuLink }}">In-app advertising</a></li>
                            </ul>
                        </li>
                    </ul>
                </li>


                <li>
                    <a href="{{ route('technologies') }}" class="{{ $navLink(request()->routeIs('technologies')) }}">Technologies</a>
                </li>

                <li>
                    <a href="{{ route('quiz.index') }}" class="{{ $navLink(request()->routeIs('quiz.index')) }}">Quiz</a>
                </li>

                <li>
                    <a href="{{ route('career.index') }}" class="{{ $navLink(request()->routeIs('career.index')) }}">Career</a>
                </li>

                <li>
                    <a href="{{ route('contact.index') }}" class="{{ $navLink(request()->routeIs('contact.index')) }}">Contact Us</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const mobileButton = document.getElementById('navbar-toggle');
        const mobileNavbar = document.getElementById('navbar-it');

        if (mobileButton && mobileNavbar) {
            mobileButton.addEventListener('click', () => {
                const isExpanded = mobileButton.getAttribute('aria-expanded') === 'true';
                mobileNavbar.classList.toggle('hidden');
                mobileButton.setAttribute('aria-expanded', String(!isExpanded));
            });
        }

        const submenuButtons = document.querySelectorAll('.mobile-submenu-toggle');
        submenuButtons.forEach((button) => {
            button.addEventListener('click', () => {
                if (window.innerWidth >= 768) {
                    return;
                }

                const menu = button.nextElementSibling;
                const icon = button.querySelector('svg');

                submenuButtons.forEach((otherButton) => {
                    if (otherButton === button) {
                        return;
                    }

                    const otherMenu = otherButton.nextElementSibling;
                    const otherIcon = otherButton.querySelector('svg');

                    otherMenu?.classList.add('hidden');
                    otherIcon?.classList.remove('rotate-180');
                });

                menu?.classList.toggle('hidden');
                icon?.classList.toggle('rotate-180');
            });
        });
    });
</script>

    <!-- Modal Backdrop -->
    <div id="modalBackdrop" class="fixed inset-0 bg-black bg-opacity-50 z-50 hidden transition-opacity duration-300 opacity-0 flex items-center justify-center p-4">
        <!-- Modal Container -->
        <div class="bg-white rounded-xl shadow-2xl w-full max-w-4xl max-h-[90vh] overflow-y-auto transform transition-transform duration-300 scale-95" id="modalContainer">
            <!-- Modal Header -->
            <div class="flex items-center justify-between p-6 border-b border-gray-200">
                <h3 class="text-2xl font-bold text-gray-800">Enquiry Form</h3>
                <button onclick="closeModal()" class="text-gray-400 hover:text-gray-600 transition-colors duration-200">
                    <i class="fas fa-times text-2xl"></i>
                </button>
            </div>
            
            <!-- Modal Body -->
            <div class="p-6">
                <p class="text-gray-600 mb-6">Please fill out the form below and we'll get back to you as soon as possible.</p>
                
                <form class="space-y-6">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="firstName" class="block text-sm font-medium text-gray-700 mb-1">Full Name</label>
                            <input type="text" id="firstName" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors duration-300" placeholder="Enter your first name">
                        </div>
                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email Address</label>
                            <input type="email" id="email" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors duration-300" placeholder="Enter your email address">
                        </div>
                    </div>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="phone" class="block text-sm font-medium text-gray-700 mb-1">Phone Number</label>
                            <input type="tel" id="phone" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors duration-300" placeholder="Enter your phone number">
                        </div>
                        <div>
                            <label for="phone" class="block text-sm font-medium text-gray-700 mb-1">Subject</label>
                            <input type="tel" id="phone" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors duration-300" placeholder="Enter your phone number">
                        </div>
                    </div>
                    
                    <div>
                        <label for="message" class="block text-sm font-medium text-gray-700 mb-1">Message</label>
                        <textarea id="message" rows="4" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors duration-300" placeholder="Please provide details of your enquiry"></textarea>
                    </div>
                </form>
            </div>
            
            <!-- Modal Footer -->
            <div class="flex justify-end space-x-4 p-6 border-t border-gray-200">
                <button onclick="closeModal()" class="px-5 py-2.5 rounded-lg border border-gray-300 text-gray-700 hover:bg-gray-50 transition-colors duration-300 font-medium">
                    Cancel
                </button>
                <button class="px-5 py-2.5 rounded-lg bg-blue-600 hover:bg-blue-700 text-white transition-colors duration-300 font-medium shadow-md">
                    Submit Enquiry
                </button>
            </div>
        </div>
    </div>

    

    <script>
        function openModal() {
            const backdrop = document.getElementById('modalBackdrop');
            const modal = document.getElementById('modalContainer');
            
            backdrop.classList.remove('hidden');
            setTimeout(() => {
                backdrop.classList.remove('opacity-0');
                modal.classList.remove('scale-95');
            }, 10);
        }
        
        function closeModal() {
            const backdrop = document.getElementById('modalBackdrop');
            const modal = document.getElementById('modalContainer');
            
            backdrop.classList.add('opacity-0');
            modal.classList.add('scale-95');
            
            setTimeout(() => {
                backdrop.classList.add('hidden');
            }, 300);
        }
        
        // Close modal when clicking outside of modal content
        document.getElementById('modalBackdrop').addEventListener('click', function(e) {
            if (e.target === this) {
                closeModal();
            }
        });
        
        // Close modal with Escape key
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape' && !document.getElementById('modalBackdrop').classList.contains('hidden')) {
                closeModal();
            }
        });
    </script>
