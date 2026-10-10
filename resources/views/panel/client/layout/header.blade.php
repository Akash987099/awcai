<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>AWC Care | Clinic Portal</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&family=Manrope:wght@600;700;800&display=swap"
        rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet"
        href="{{ asset('assets/css/client-portal.css') }}?v={{ filemtime(public_path('assets/css/client-portal.css')) }}">
    <link rel="stylesheet"
        href="{{ asset('assets/css/client-settings.css') }}?v={{ filemtime(public_path('assets/css/client-settings.css')) }}">
    <link rel="stylesheet"
        href="{{ asset('assets/css/client-slider.css') }}?v={{ filemtime(public_path('assets/css/client-slider.css')) }}">
    <link rel="stylesheet"
        href="{{ asset('assets/css/client-services.css') }}?v={{ filemtime(public_path('assets/css/client-services.css')) }}">
    <link rel="stylesheet"
        href="{{ asset('assets/css/sidebar-scroll.css') }}?v={{ filemtime(public_path('assets/css/sidebar-scroll.css')) }}">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/41.4.2/classic/ckeditor.js"></script>
    <script src="{{ asset('assets/js/message.js') }}"></script>
    <script src="{{ asset('assets/js/search.js') }}"></script>
    <script src="{{ asset('assets/js/delete.js') }}"></script>
    <script src="{{ asset('assets/js/common.js') }}"></script>
    <script src="{{ asset('assets/js/rich-text-editor.js') }}" defer></script>
</head>

<body class="client-portal">
    <div id="alert-container" class="cp-alerts"></div>
