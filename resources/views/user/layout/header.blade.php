<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <title>User Panel</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="{{ asset('assets/js/message.js') }}"></script>
    <script src="{{ asset('assets/js/search.js') }}"></script>
    <script src="{{ asset('assets/js/delete.js') }}"></script>
    <script src="{{ asset('assets/js/common.js') }}"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<body class="admin-shell">
    <div id="alert-container" class="fixed bottom-5 right-5 z-50 space-y-3"></div>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700&display=swap');

        :root {
            --admin-primary: #0f766e;
            --admin-primary-soft: #ccfbf1;
            --admin-shell-bg: #0b1220;
            --admin-panel-bg: #111b2e;
            --admin-sidebar-bg: #0f1728;
            --admin-sidebar-border: rgba(255, 255, 255, 0.08);
            --admin-text: #e7eefb;
            --admin-muted: #8aa0bf;
            --admin-surface: #121d32;
            --admin-border: rgba(138, 160, 191, 0.16);
            --admin-shadow: 0 22px 50px rgba(2, 8, 23, 0.28);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Outfit', sans-serif;
        }

        html {
            font-size: 15px;
        }

        body.admin-shell {
            color: var(--admin-text);
            background: var(--admin-shell-bg);
            min-height: 100vh;
            font-size: 0.95rem;
            line-height: 1.55;
        }

        .admin-layout-shell {
            position: relative;
            min-height: 100vh;
        }

        .admin-topbar {
            height: 5rem;
            backdrop-filter: blur(18px);
            background: var(--admin-panel-bg);
            border-bottom: 1px solid var(--admin-border);
            box-shadow: 0 8px 24px rgba(2, 8, 23, 0.16);
            z-index: 45;
        }

        .admin-sidebar {
            background: var(--admin-sidebar-bg);
            border-right: 1px solid var(--admin-sidebar-border);
            box-shadow: none;
        }

        .admin-sidebar::-webkit-scrollbar {
            width: 8px;
        }

        .admin-sidebar::-webkit-scrollbar-thumb {
            background: rgba(15, 118, 110, 0.72);
            border-radius: 999px;
            border: 2px solid transparent;
            background-clip: content-box;
        }

        .admin-sidebar::-webkit-scrollbar-track {
            background: rgba(255, 255, 255, 0.04);
            border-radius: 999px;
        }

        .admin-nav-link,
        .admin-nav-button {
            display: flex;
            align-items: center;
            gap: 0.9rem;
            width: 100%;
            padding: 0.95rem 1rem;
            border-radius: 1rem;
            color: #dce7f9;
            font-size: 0.94rem;
            font-weight: 500;
            letter-spacing: 0.01em;
            transition: all 0.22s ease;
        }

        .admin-nav-link:hover,
        .admin-nav-button:hover {
            background: rgba(20, 184, 166, 0.12);
            color: #fff;
            transform: translateX(2px);
        }

        .admin-nav-link.is-active,
        .admin-nav-button.is-active {
            background: linear-gradient(135deg, rgba(15, 118, 110, 0.58), rgba(20, 184, 166, 0.32));
            color: #fff;
            box-shadow: inset 0 0 0 1px rgba(153, 246, 228, 0.14);
        }

        .admin-submenu-link {
            display: flex;
            align-items: center;
            gap: 0.7rem;
            padding: 0.72rem 0.95rem;
            border-radius: 0.9rem;
            color: #aac0df;
            font-size: 0.89rem;
            transition: all 0.2s ease;
        }

        .admin-submenu-link:hover,
        .admin-submenu-link.is-active {
            background: rgba(20, 184, 166, 0.1);
            color: #fff;
        }

        .admin-section-label {
            padding: 0 0.95rem;
            margin-bottom: 0.75rem;
            color: rgba(148, 163, 184, 0.8);
            font-size: 0.69rem;
            font-weight: 600;
            letter-spacing: 0.18em;
            text-transform: uppercase;
        }

        .admin-content-card,
        .bg-white.dark\:bg-gray-800 {
            background: var(--admin-surface);
            border: 1px solid var(--admin-border);
            border-radius: 1.15rem;
            box-shadow: var(--admin-shadow);
        }

        .admin-shell .text-gray-800,
        .admin-shell .text-gray-900 {
            color: #e7eefb !important;
        }

        .admin-shell .text-gray-700,
        .admin-shell .text-gray-600,
        .admin-shell .text-gray-500 {
            color: #8aa0bf !important;
        }

        .admin-shell .border-gray-200,
        .admin-shell .border-gray-300 {
            border-color: rgba(138, 160, 191, 0.16) !important;
        }

        .admin-shell input,
        .admin-shell select,
        .admin-shell textarea {
            font-size: 0.92rem;
            border-radius: 0.85rem;
            background: #0f1728;
            border: 1px solid rgba(138, 160, 191, 0.18);
            color: #e7eefb;
        }

        .admin-shell input:focus,
        .admin-shell select:focus,
        .admin-shell textarea:focus {
            outline: none;
            border-color: rgba(20, 184, 166, 0.55);
            box-shadow: 0 0 0 3px rgba(20, 184, 166, 0.12);
        }

        .admin-shell table th {
            font-size: 0.82rem;
            letter-spacing: 0.01em;
        }

        .admin-shell table td {
            font-size: 0.9rem;
        }

        .admin-shell h1,
        .admin-shell h2,
        .admin-shell h3,
        .admin-shell h4 {
            letter-spacing: -0.02em;
        }

        .admin-shell .sm\:ml-40,
        .admin-shell .sm\:ml-64 {
            margin-left: 16rem;
            padding: 6.5rem 1.25rem 1.5rem;
            min-height: 100vh;
        }

        .admin-shell .p-4.sm\:ml-40,
        .admin-shell .p-4.sm\:ml-64 {
            padding: 6.5rem 1.25rem 1.5rem;
        }

        .admin-shell .mt-14 {
            margin-top: 0 !important;
        }

        .admin-shell .rounded-lg.dark\:border-gray-700 {
            border-radius: 1.5rem;
        }

        .admin-shell .bg-white {
            background: var(--admin-surface) !important;
            box-shadow: 0 18px 45px rgba(2, 8, 23, 0.24);
        }

        .admin-shell table {
            overflow: hidden;
            border-radius: 1rem;
        }

        .admin-shell .bg-gray-100 {
            background: #16233a !important;
        }

        .admin-shell .hover\:bg-gray-50:hover,
        .admin-shell .hover\:bg-gray-100:hover {
            background: rgba(20, 184, 166, 0.08) !important;
        }

        .admin-shell ::placeholder {
            color: #6f86a8;
        }

        @media (max-width: 639px) {
            .admin-shell .sm\:ml-40,
            .admin-shell .sm\:ml-64,
            .admin-shell .p-4.sm\:ml-40,
            .admin-shell .p-4.sm\:ml-64 {
                margin-left: 0;
                padding: 5.5rem 1rem 1rem;
            }
        }

        @media (min-width: 640px) {
            .admin-topbar {
                width: calc(100% - 16rem);
                margin-left: 16rem;
                border-left: 1px solid var(--admin-border);
            }
        }
    </style>
