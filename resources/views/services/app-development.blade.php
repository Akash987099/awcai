@extends('layout.app')

@section('title', 'App Development Services | Arya Web Coding')
@section('meta_description', 'Mobile app development services by Arya Web Coding for Android, iOS, hybrid apps, backend systems, and ongoing support.')
@section('canonical', route('service.app-development'))

@section('content')
    @php
        $pageTitle = 'App Development Services';
        $pageDescription = 'We build dependable mobile applications that combine strong design, smooth performance, and practical business logic for startups, service brands, and growing companies.';
        $heroTag = 'Android, iOS, and Cross Platform';
        $heroTitle = 'Apps that feel smooth, useful, and ready for real users';
        $heroDescription = 'Whether you need a customer-facing mobile app, an internal workflow tool, or a marketplace-style product, we help turn your idea into a launch-ready app with the right features, backend, and user experience.';
        $heroImage = 'assets/img/banner4.png';
        $heroPrimaryCta = ['label' => 'Plan My App', 'url' => url('contact-us')];
        $heroSecondaryCta = ['label' => 'Explore Our Work', 'url' => route('complate_project')];

        $heroStats = [
            ['value' => 'Android', 'label' => 'Ready', 'text' => 'Performance-first mobile experiences built for modern Android devices.'],
            ['value' => 'iOS', 'label' => 'Compatible', 'text' => 'Cross-platform and platform-aware app flows for Apple users as well.'],
            ['value' => 'API', 'label' => 'Integrated', 'text' => 'Secure backend connectivity for login, payments, data sync, and automation.'],
            ['value' => 'Live', 'label' => 'Scalable', 'text' => 'A strong technical base to support future features, updates, and growth.'],
        ];

        $serviceHighlights = [
            ['icon' => 'fas fa-mobile-alt', 'title' => 'Custom Mobile Applications', 'description' => 'Apps built around your business model, user needs, and functional priorities instead of generic templates.'],
            ['icon' => 'fas fa-sync-alt', 'title' => 'Cross Platform Development', 'description' => 'Efficient builds for Android and iOS using a shared codebase where it makes sense for speed and budget.'],
            ['icon' => 'fas fa-palette', 'title' => 'Mobile UI and UX', 'description' => 'Clear navigation, intuitive screens, and polished interactions that make the app easier to use and trust.'],
            ['icon' => 'fas fa-server', 'title' => 'Backend and Admin Panels', 'description' => 'Reliable server-side architecture, databases, dashboards, and controls to manage your app data smoothly.'],
            ['icon' => 'fas fa-plug', 'title' => 'Third Party Integrations', 'description' => 'Payment gateways, maps, push notifications, chat, OTP, analytics, and external service integrations as needed.'],
            ['icon' => 'fas fa-tools', 'title' => 'App Updates and Maintenance', 'description' => 'Support for bug fixes, improvements, new modules, and ongoing version updates after release.'],
        ];

        $processSteps = [
            ['title' => 'Requirement Mapping', 'description' => 'We define the app purpose, user roles, essential screens, and operational logic so the product scope stays realistic and focused.'],
            ['title' => 'Prototype and Flow Design', 'description' => 'We shape the app journey, key screens, and action flows to reduce confusion and improve usability before development begins.'],
            ['title' => 'Development and Quality Checks', 'description' => 'Our team builds the app, backend, and admin functions while reviewing performance, stability, and core user journeys during the process.'],
            ['title' => 'Launch and Iteration', 'description' => 'After testing and release preparation, we help with deployment guidance and future improvements based on real user feedback.'],
        ];

        $deliverables = [
            ['title' => 'Core app screens and navigation', 'description' => 'Well-planned dashboards, login flows, profile sections, booking or shopping journeys, and other primary app modules.'],
            ['title' => 'Backend connectivity', 'description' => 'User authentication, APIs, notifications, and database structure required to make the application useful and manageable.'],
            ['title' => 'Admin monitoring tools', 'description' => 'Optional dashboards to track users, manage data, review transactions, or support operations from one place.'],
            ['title' => 'Release and support readiness', 'description' => 'Testing support, bug tracking, update planning, and practical help to keep the application stable after it goes live.'],
        ];

        $industries = ['Logistics', 'Healthcare', 'Education', 'On-Demand Services', 'Ecommerce', 'Finance', 'Field Teams', 'Local Businesses'];

        $faqs = [
            ['question' => 'Do you build apps for both Android and iPhone?', 'answer' => 'Yes. We can build for Android, iOS, or cross-platform depending on your audience, feature set, and budget priorities.'],
            ['question' => 'Can you create an admin panel with the app?', 'answer' => 'Yes. Many app projects also need a backend or dashboard to manage users, orders, content, reports, or settings, and we can build that too.'],
            ['question' => 'How do you handle future updates?', 'answer' => 'We support maintenance, bug fixes, UI refinements, and feature updates so your app can improve over time instead of staying static.'],
            ['question' => 'Can you help if I only have an idea and not full requirements?', 'answer' => 'Yes. We can help convert a rough idea into a clear feature list, user flow, and practical launch plan before development starts.'],
        ];

        $ctaTitle = 'Planning a mobile app for customers or internal operations?';
        $ctaDescription = 'Tell us the app idea, target users, and must-have features. We will help shape the scope, development approach, and rollout path that best fits your business.';
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
