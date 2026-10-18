@extends('layout.app')

@section('title', $page['seoTitle'])
@section('meta_description', $page['metaDescription'])
@section('meta_keywords', $page['metaKeywords'])
@section('canonical', $page['canonical'])

@section('content')
    @php
        extract($page);
        $heroPrimaryCta = ['label' => 'Discuss Your Requirements', 'url' => route('contact.index')];
        $heroSecondaryCta = ['label' => 'View Our Projects', 'url' => route('complate_project')];
    @endphp

    @include('services.partials.service-page')

    <script type="application/ld+json">
    {!! json_encode([
        '@context' => 'https://schema.org',
        '@type' => 'Service',
        'name' => $pageTitle,
        'description' => $metaDescription,
        'url' => $canonical,
        'areaServed' => ['@type' => 'City', 'name' => 'Agra'],
        'provider' => ['@type' => 'Organization', 'name' => 'Arya Web Coding', 'url' => route('index')],
    ], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) !!}
    </script>
    <script type="application/ld+json">
    {!! json_encode([
        '@context' => 'https://schema.org',
        '@type' => 'FAQPage',
        'mainEntity' => array_map(fn ($faq) => ['@type' => 'Question', 'name' => $faq['question'], 'acceptedAnswer' => ['@type' => 'Answer', 'text' => $faq['answer']]], $faqs),
    ], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) !!}
    </script>
@endsection
