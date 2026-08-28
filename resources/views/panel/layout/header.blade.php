<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BizBharat Panel</title>
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
                radial-gradient(circle at top left, rgba(249, 115, 22, 0.14), transparent 28rem),
                radial-gradient(circle at right, rgba(251, 191, 36, 0.14), transparent 26rem),
                #fffaf5;
            color: #0f172a;
        }

        .glass-panel {
            background: rgba(255, 255, 255, 0.72);
            backdrop-filter: blur(18px);
        }

        .section-shell {
            width: min(1180px, calc(100% - 1.5rem));
            margin-inline: auto;
        }

        .hero-grid {
            background-image:
                linear-gradient(rgba(255, 255, 255, 0.08) 1px, transparent 1px),
                linear-gradient(90deg, rgba(255, 255, 255, 0.08) 1px, transparent 1px);
            background-size: 24px 24px;
        }
    </style>
</head>
<body>
    <div class="fixed inset-x-0 top-0 z-50">
        <div class="section-shell pt-4">
            <nav x-data="{ open: false }" class="glass-panel rounded-[28px] border border-white/70 px-4 py-3 shadow-glow md:px-6">
                <div class="flex items-center justify-between gap-4">
                    <a href="{{ url('/panel') }}" class="flex items-center gap-3">
                        <div class="flex h-11 w-11 items-center justify-center rounded-2xl bg-brand.ink text-lg font-extrabold text-white">
                            BB
                        </div>
                        <div>
                            <p class="font-display text-lg font-semibold leading-none text-brand.ink">BizBharat</p>
                            <p class="text-xs font-medium uppercase tracking-[0.28em] text-slate-500">Business Discovery</p>
                        </div>
                    </a>

                    <div class="hidden min-w-0 flex-1 items-center justify-center px-4 xl:flex">
                        <div class="flex w-full max-w-md items-center gap-3 rounded-full border border-orange-100 bg-white/80 px-4 py-2">
                            <i class="fas fa-magnifying-glass text-sm text-orange-500"></i>
                            <input type="text" placeholder="Search businesses, categories, city..." class="w-full bg-transparent text-sm font-medium text-slate-700 outline-none placeholder:text-slate-400">
                            <button type="button" class="rounded-full bg-brand.primary px-3 py-1.5 text-xs font-semibold text-white">Search</button>
                        </div>
                    </div>

                    <div class="hidden items-center gap-2 lg:flex">
                        <a href="{{ url('/panel') }}" class="rounded-full px-4 py-2 text-sm font-semibold text-slate-700 transition hover:bg-white hover:text-brand.ink">Home</a>
                        <a href="{{ url('/panel/services') }}" class="rounded-full px-4 py-2 text-sm font-semibold text-slate-700 transition hover:bg-white hover:text-brand.ink">Services</a>
                    </div>

                    <div class="hidden items-center gap-3 md:flex">
                        <a href="{{ url('/panel/services') }}" class="rounded-full border border-brand.line bg-white px-4 py-2 text-sm font-semibold text-brand.ink transition hover:border-brand.primary hover:text-brand.primary">
                            Explore Categories
                        </a>
                        <a href="#lead-form" class="rounded-full bg-brand.ink px-5 py-2.5 text-sm font-semibold text-white transition hover:bg-slate-800">
                            Free Listing
                        </a>
                    </div>

                    <button @click="open = !open" type="button" class="inline-flex h-11 w-11 items-center justify-center rounded-2xl border border-slate-200 text-slate-700 md:hidden">
                        <i class="fas" :class="open ? 'fa-times' : 'fa-bars'"></i>
                    </button>
                </div>

                <div x-show="open" x-transition class="mt-4 space-y-2 border-t border-slate-200 pt-4 md:hidden">
                    <div class="flex items-center gap-3 rounded-[24px] border border-orange-100 bg-white px-4 py-3">
                        <i class="fas fa-magnifying-glass text-sm text-orange-500"></i>
                        <input type="text" placeholder="Search businesses..." class="w-full bg-transparent text-sm font-medium text-slate-700 outline-none placeholder:text-slate-400">
                    </div>
                    <a href="{{ url('/panel') }}" class="block rounded-2xl px-4 py-3 text-sm font-semibold text-slate-700 hover:bg-white">Home</a>
                    <a href="{{ url('/panel/services') }}" class="block rounded-2xl px-4 py-3 text-sm font-semibold text-slate-700 hover:bg-white">Services</a>
                    <a href="#lead-form" class="block rounded-2xl bg-brand.ink px-4 py-3 text-sm font-semibold text-white">Free Listing</a>
                </div>
            </nav>
        </div>
    </div>
