@extends('layout.app')

@section('title', 'Web Development Services | Arya Web Coding')
@section('meta_description', 'Custom web development services by Arya Web Coding for business websites, portals, eCommerce stores, and scalable web applications.')
@section('canonical', route('service.web-development'))

@section('content')
    @php
        $pageTitle = 'Web Development Services';
        $pageDescription = 'We design and build fast, scalable, and business-focused websites that help brands look credible, work smoothly, and convert visitors into enquiries or customers.';
        $heroTag = 'Business Websites and Portals';
        $heroTitle = 'Modern websites built for speed, trust, and growth';
        $heroDescription = 'From company profiles and landing pages to eCommerce and custom dashboards, we create web experiences that are easy to manage, mobile friendly, and ready to support your next stage of business growth.';
        $heroImage = 'assets/img/banner2.png';
        $heroPrimaryCta = ['label' => 'Request a Website', 'url' => url('contact-us')];
        $heroSecondaryCta = ['label' => 'See Our Projects', 'url' => route('complate_project')];

        $heroStats = [
            ['value' => '100%', 'label' => 'Responsive', 'text' => 'Layouts optimized for mobile, tablet, and desktop screens.'],
            ['value' => 'SEO', 'label' => 'Ready', 'text' => 'Clean structure and performance-focused pages that support discovery.'],
            ['value' => 'CMS', 'label' => 'Manageable', 'text' => 'Easy content updates for banners, pages, products, and key information.'],
            ['value' => '24/7', 'label' => 'Support', 'text' => 'Reliable maintenance and help after your website goes live.'],
        ];

        $serviceHighlights = [
            ['icon' => 'fas fa-laptop-code', 'title' => 'Custom Business Websites', 'description' => 'Professional websites tailored to your business goals, services, audience, and brand identity.'],
            ['icon' => 'fas fa-store', 'title' => 'eCommerce Development', 'description' => 'Online stores with product management, secure checkout, order flow, and conversion-focused shopping journeys.'],
            ['icon' => 'fas fa-layer-group', 'title' => 'Landing Pages and Microsites', 'description' => 'Focused pages for campaigns, product launches, offers, and lead generation with clear user actions.'],
            ['icon' => 'fas fa-users-cog', 'title' => 'Custom Portals and Dashboards', 'description' => 'Admin panels, CRM-style tools, and workflow systems that reduce manual work and centralize operations.'],
            ['icon' => 'fas fa-tachometer-alt', 'title' => 'Performance Optimization', 'description' => 'Faster page speed, lighter assets, and technical improvements for a smoother browsing experience.'],
            ['icon' => 'fas fa-shield-alt', 'title' => 'Maintenance and Security', 'description' => 'Regular monitoring, bug fixes, content updates, and security improvements to keep your site healthy.'],
        ];

        $processSteps = [
            ['title' => 'Discovery and Planning', 'description' => 'We understand your business model, target users, required pages, and functional needs before shaping the right website structure.'],
            ['title' => 'Wireframe and Interface Direction', 'description' => 'We map the main sections, user journeys, and visual style so the website feels organized and brand-aligned from the start.'],
            ['title' => 'Development and Integrations', 'description' => 'Our team builds the frontend and backend, connects forms, payments, dashboards, or APIs, and ensures the site works reliably.'],
            ['title' => 'Testing and Launch Support', 'description' => 'Before launch, we review responsiveness, speed, forms, navigation, and final content so your website goes live with confidence.'],
        ];

        $deliverables = [
            ['title' => 'Clean page architecture', 'description' => 'Structured home, about, service, product, and contact flows that help visitors find what they need quickly.'],
            ['title' => 'Responsive UI components', 'description' => 'Reusable banners, cards, forms, and content sections designed to stay polished across all screen sizes.'],
            ['title' => 'Admin or content update support', 'description' => 'Optional backend modules or streamlined update workflows so your team can manage content with less dependency.'],
            ['title' => 'Search and conversion foundations', 'description' => 'On-page best practices, enquiry CTAs, and practical content layouts that support visibility and lead generation.'],
        ];

        $industries = ['Healthcare', 'Education', 'Real Estate', 'Retail', 'Local Services', 'Manufacturing', 'Startups', 'Professional Firms'];

        $faqs = [
            ['question' => 'What type of websites do you build?', 'answer' => 'We build business websites, portfolio sites, service websites, eCommerce stores, web applications, dashboards, and custom portals based on your exact requirements.'],
            ['question' => 'Will my website work properly on mobile devices?', 'answer' => 'Yes. Every website we build is designed to be responsive so it performs well on smartphones, tablets, laptops, and larger screens.'],
            ['question' => 'Can you redesign an existing website?', 'answer' => 'Yes. We can improve outdated layouts, fix user experience issues, restructure content, and modernize the visual design without losing your core business message.'],
            ['question' => 'Do you provide hosting or post-launch maintenance?', 'answer' => 'We can guide you on hosting, deployment, updates, and regular maintenance so your website remains secure, updated, and stable after launch.'],
        ];

        $ctaTitle = 'Need a website that looks professional and performs reliably?';
        $ctaDescription = 'Share your goals, required pages, and preferred features. We will help you choose the right website structure, technology, and rollout plan for your business.';
    @endphp

    @include('services.partials.service-page', compact(
        'pageTitle',
        'pageDescription',
        'heroTag',
        'heroTitle',
        'heroDescription',
        'heroImage',
        'heroPrimaryCta',
        'heroSecondaryCta',
        'heroStats',
        'serviceHighlights',
        'processSteps',
        'deliverables',
        'industries',
        'faqs',
        'ctaTitle',
        'ctaDescription'
    ))
@endsection
