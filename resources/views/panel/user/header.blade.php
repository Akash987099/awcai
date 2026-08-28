@php
    $slug = $name ?? request()->route('name') ?? 'business';
    $businessName = str($slug)->replace(['-', '_'], ' ')->title()->toString();
    $homeUrl = url('/panel/web/' . $slug);
    $aboutUrl = url('/panel/web/' . $slug . '/about');
    $servicesUrl = url('/panel/web/' . $slug . '/services');
    $blogsUrl = url('/panel/web/' . $slug . '/blogs');
    $galleryUrl = url('/panel/web/' . $slug . '/gallery');
    $contactUrl = url('/panel/web/' . $slug . '/contact');
    $navLinks = [
        ['label' => 'Home', 'route' => $homeUrl],
        ['label' => 'About', 'route' => $aboutUrl],
        ['label' => 'Services', 'route' => $servicesUrl],
        ['label' => 'Blogs', 'route' => $blogsUrl],
        ['label' => 'Gallery', 'route' => $galleryUrl],
        ['label' => 'Contact', 'route' => $contactUrl],
    ];
@endphp
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $businessName }} | BizBharat</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;500;600;700;800&family=Outfit:wght@500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    
    <style>
        html {
            scroll-behavior: smooth;
        }

        body {
            font-family: 'Manrope', sans-serif;
            background:
                radial-gradient(circle at top right, rgba(20, 184, 166, 0.12), transparent 24rem),
                radial-gradient(circle at left, rgba(14, 165, 233, 0.10), transparent 22rem),
                #f8fafc;
            color: #111827;
        }

        .page-shell {
            width: min(1180px, calc(100% - 1.5rem));
            margin-inline: auto;
        }

        .glass-nav {
            background:
                linear-gradient(135deg, rgba(255, 255, 255, 0.88), rgba(255, 255, 255, 0.72));
            backdrop-filter: blur(20px);
        }

        .mesh-card {
            background:
                radial-gradient(circle at top right, rgba(20, 184, 166, 0.18), transparent 10rem),
                linear-gradient(135deg, rgba(15, 118, 110, 0.08), rgba(14, 165, 233, 0.03));
        }
    </style>
</head>
<body>
    <div class="fixed inset-x-0 top-0 z-50">
        <div class="page-shell pt-4">
            <nav x-data="{ open: false }" class="glass-nav rounded-[30px] border border-white/80 px-4 py-3 shadow-soft md:px-6">
                <div class="flex items-center justify-between gap-4">
                    <a href="{{ $homeUrl }}" class="flex items-center gap-3">
                        <div class="flex h-12 w-12 items-center justify-center rounded-2xl bg-brand.primary text-lg font-extrabold text-white">
                            {{ strtoupper(substr($businessName, 0, 1)) }}
                        </div>
                        <div>
                            <p class="font-display text-lg font-semibold text-brand.ink">{{ $businessName }}</p>
                            <p class="text-xs font-medium uppercase tracking-[0.28em] text-slate-500">Featured business page</p>
                        </div>
                    </a>

                    <div class="hidden min-w-0 flex-1 items-center justify-center px-4 xl:flex">
                        <div class="mesh-card flex w-full max-w-md items-center gap-3 rounded-full border border-teal-100 px-4 py-2">
                            <i class="fas fa-magnifying-glass text-sm text-teal-600"></i>
                            <input type="text" placeholder="Search services, products, categories..." class="w-full bg-transparent text-sm font-medium text-slate-700 outline-none placeholder:text-slate-400">
                            <button type="button" class="rounded-full bg-brand.primary px-3 py-1.5 text-xs font-semibold text-white">
                                Search
                            </button>
                        </div>
                    </div>

                    <div class="hidden items-center gap-2 lg:flex">
                        @foreach ($navLinks as $link)
                            <a href="{{ $link['route'] }}" class="rounded-full px-4 py-2 text-sm font-semibold text-slate-700 transition hover:bg-white hover:text-brand.primary">
                                {{ $link['label'] }}
                            </a>
                        @endforeach
                    </div>

                    <div class="hidden items-center gap-3 md:flex">
                        <a href="{{ $contactUrl }}" class="rounded-full border border-brand.line bg-white px-4 py-2 text-sm font-semibold text-brand.ink transition hover:border-brand.primary hover:text-brand.primary">
                            Call Back Request
                        </a>
                        <a href="#contact-form" class="rounded-full bg-brand.ink px-5 py-2.5 text-sm font-semibold text-white transition hover:bg-slate-800">
                            Send Enquiry
                        </a>
                    </div>

                    <button @click="open = !open" type="button" class="inline-flex h-11 w-11 items-center justify-center rounded-2xl border border-slate-200 text-slate-700 lg:hidden">
                        <i class="fas" :class="open ? 'fa-times' : 'fa-bars'"></i>
                    </button>
                </div>

                <div x-show="open" x-transition class="mt-4 space-y-2 border-t border-slate-200 pt-4 lg:hidden">
                    <div class="mesh-card flex items-center gap-3 rounded-[24px] border border-teal-100 px-4 py-3">
                        <i class="fas fa-magnifying-glass text-sm text-teal-600"></i>
                        <input type="text" placeholder="Search services..." class="w-full bg-transparent text-sm font-medium text-slate-700 outline-none placeholder:text-slate-400">
                    </div>
                    @foreach ($navLinks as $link)
                        <a href="{{ $link['route'] }}" class="block rounded-2xl px-4 py-3 text-sm font-semibold text-slate-700 hover:bg-white">
                            {{ $link['label'] }}
                        </a>
                    @endforeach
                    <a href="#contact-form" class="block rounded-2xl bg-brand.ink px-4 py-3 text-sm font-semibold text-white">Send Enquiry</a>
                </div>
            </nav>
        </div>
    </div>
