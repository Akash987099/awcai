@extends('layout.app')

@section('title', 'UI UX Design Services | Arya Web Coding')
@section('meta_description', 'UI UX design services by Arya Web Coding for websites, mobile apps, dashboards, wireframes, prototypes, and conversion-friendly digital products.')
@section('canonical', route('service.ui-development'))

@section('content')
    @php
        $pageTitle = 'UI UX Design Services';
        $pageDescription = 'We create user-centered interfaces that are visually polished, easy to understand, and aligned with how real people browse, compare, decide, and take action.';
        $heroTag = 'Research, Interface, and Experience';
        $heroTitle = 'Thoughtful design that makes digital products easier to use';
        $heroDescription = 'From website pages and mobile app screens to dashboards and prototypes, our UI UX process balances brand personality with usability so your product feels intuitive from the first interaction.';
        $heroImage = 'assets/img/banner3.png';
        $heroPrimaryCta = ['label' => 'Discuss Design Needs', 'url' => url('contact-us')];
        $heroSecondaryCta = ['label' => 'View Portfolio', 'url' => route('complate_project')];

        $heroStats = [
            ['value' => 'UX', 'label' => 'Research', 'text' => 'Flows and layouts shaped around user intent, not only visual preference.'],
            ['value' => 'UI', 'label' => 'Consistency', 'text' => 'Balanced color, typography, spacing, and components across screens.'],
            ['value' => 'Proto', 'label' => 'Testing', 'text' => 'Wireframes and clickable prototypes to validate ideas before development.'],
            ['value' => 'Brand', 'label' => 'Fit', 'text' => 'Design systems that reflect your business identity and communication style.'],
        ];

        $serviceHighlights = [
            ['icon' => 'fas fa-pencil-ruler', 'title' => 'Interface Design', 'description' => 'Clean, modern interfaces for websites, apps, and dashboards that look polished and easy to navigate.'],
            ['icon' => 'fas fa-sitemap', 'title' => 'User Flow Strategy', 'description' => 'Logical journeys and screen relationships that help users complete actions with less confusion or friction.'],
            ['icon' => 'fas fa-object-group', 'title' => 'Wireframes and Prototypes', 'description' => 'Low and high fidelity design prototypes that help teams review structure and interactions before development.'],
            ['icon' => 'fas fa-mobile-screen-button', 'title' => 'App Design Systems', 'description' => 'Scalable mobile patterns, screen states, and reusable components for better product consistency.'],
            ['icon' => 'fas fa-chart-line', 'title' => 'Conversion-Oriented Pages', 'description' => 'Landing pages and service layouts designed to build trust and guide users toward enquiries or purchases.'],
            ['icon' => 'fas fa-magic', 'title' => 'Micro Interactions and Motion', 'description' => 'Purposeful hover states, transitions, and feedback patterns that make products feel more responsive and refined.'],
        ];

        $processSteps = [
            ['title' => 'Research and Content Understanding', 'description' => 'We study your business, user intent, and content priorities to understand what users need to see first and what actions matter most.'],
            ['title' => 'Wireframe and Information Structure', 'description' => 'Before visual styling, we define content hierarchy, layouts, and screen logic so each section has a clear purpose.'],
            ['title' => 'Visual Design and Prototype Review', 'description' => 'We craft the design system, screen styles, and interactive prototypes needed to evaluate the experience before build stage.'],
            ['title' => 'Developer Handoff and Refinement', 'description' => 'We support implementation with clear design intent and continue refining details so the final product feels cohesive.'],
        ];

        $deliverables = [
            ['title' => 'Wireframes for clarity', 'description' => 'Blueprints that show page structure, screen flow, and placement priorities before visual design is finalized.'],
            ['title' => 'High fidelity UI screens', 'description' => 'Pixel-ready layouts for websites, apps, and dashboards with clear spacing, typography, and component rules.'],
            ['title' => 'Prototype based feedback loops', 'description' => 'Clickable previews that help you review navigation, hierarchy, and screen-to-screen transitions earlier in the project.'],
            ['title' => 'Design consistency guidelines', 'description' => 'Reusable patterns that help future pages and screens stay aligned with your brand and product experience.'],
        ];

        $industries = ['SaaS Products', 'Healthcare', 'Education', 'Retail', 'Service Businesses', 'Finance Tools', 'Admin Dashboards', 'Startup MVPs'];

        $faqs = [
            ['question' => 'Do you design only, or also develop the final product?', 'answer' => 'We can do both. If you need only UI UX design, we can provide that separately, and if you want end-to-end execution, our development team can build it too.'],
            ['question' => 'Can you redesign a poor performing website or app interface?', 'answer' => 'Yes. We can review content structure, navigation, visual hierarchy, and usability issues to create a more effective and modern experience.'],
            ['question' => 'Will I be able to review the design before development?', 'answer' => 'Yes. We use wireframes and prototypes so you can understand the flow, request changes, and approve direction before full implementation starts.'],
            ['question' => 'Is UI UX useful for small businesses too?', 'answer' => 'Absolutely. Good UI UX helps small businesses appear more credible, improve enquiry quality, and reduce user confusion even on simple websites or smaller apps.'],
        ];

        $ctaTitle = 'Want your product to feel clearer, cleaner, and more trustworthy?';
        $ctaDescription = 'Share the screens, website pages, or product journey you want to improve. We will help design an experience that looks better and works better for your users.';
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
