@php
    $slug = $name ?? request()->route('name') ?? 'business';
    $businessName = str($slug)->replace(['-', '_'], ' ')->title()->toString();
    $homeUrl = url('/panel/web/' . $slug);
    $aboutUrl = url('/panel/web/' . $slug . '/about');
    $servicesUrl = url('/panel/web/' . $slug . '/services');
    $contactUrl = url('/panel/web/' . $slug . '/contact');
@endphp
    <footer class="mt-20 overflow-hidden border-t border-teal-100 bg-slate-950 text-slate-200">
        <div class="page-shell pt-12">
            <div class="mb-10 grid gap-6 rounded-[30px] border border-white/10 bg-gradient-to-r from-teal-600 to-cyan-600 px-6 py-8 text-white shadow-soft lg:grid-cols-[1.1fr_0.9fr] lg:px-8">
                <div>
                    <p class="text-sm font-semibold uppercase tracking-[0.24em] text-teal-50">Stay Discoverable</p>
                    <h3 class="mt-3 font-display text-3xl font-bold">A better header, footer and search experience makes {{ $businessName }} feel more real and more premium.</h3>
                </div>
                <div class="flex flex-col gap-3 sm:flex-row lg:justify-end lg:self-center">
                    <a href="{{ $contactUrl }}" class="rounded-full bg-slate-950 px-6 py-3 text-center text-sm font-semibold text-white transition hover:bg-slate-900">Contact Now</a>
                    <a href="{{ $servicesUrl }}" class="rounded-full border border-white/40 px-6 py-3 text-center text-sm font-semibold text-white transition hover:bg-white/10">Explore Services</a>
                </div>
            </div>
        </div>
        <div class="page-shell grid gap-10 px-1 py-8 md:grid-cols-[1.2fr_0.8fr_1fr]">
            <div class="space-y-4">
                <div class="flex items-center gap-3">
                    <div class="flex h-11 w-11 items-center justify-center rounded-2xl bg-brand.secondary font-extrabold text-slate-950">
                        {{ strtoupper(substr($businessName, 0, 1)) }}
                    </div>
                    <div>
                        <p class="font-display text-xl font-semibold text-white">{{ $businessName }}</p>
                        <p class="text-sm text-slate-400">Presented via BizBharat</p>
                    </div>
                </div>
                <p class="max-w-xl text-sm leading-7 text-slate-400">
                    A modern local business page focused on clarity, trust and faster customer action. Designed to help visitors understand what you offer without friction.
                </p>
            </div>

            <div>
                <h3 class="font-display text-lg font-semibold text-white">Pages</h3>
                <div class="mt-4 grid gap-3 text-sm text-slate-400">
                    <a href="{{ $homeUrl }}" class="rounded-2xl border border-slate-800 px-4 py-3 transition hover:border-teal-400 hover:text-white">Home</a>
                    <a href="{{ $aboutUrl }}" class="rounded-2xl border border-slate-800 px-4 py-3 transition hover:border-teal-400 hover:text-white">About</a>
                    <a href="{{ $servicesUrl }}" class="rounded-2xl border border-slate-800 px-4 py-3 transition hover:border-teal-400 hover:text-white">Services</a>
                    <a href="{{ $contactUrl }}" class="rounded-2xl border border-slate-800 px-4 py-3 transition hover:border-teal-400 hover:text-white">Contact</a>
                </div>
            </div>

            <div>
                <h3 class="font-display text-lg font-semibold text-white">Get in Touch</h3>
                <div class="mt-4 space-y-3 text-sm text-slate-400">
                    <p><i class="fas fa-phone mr-2 text-brand.secondary"></i>+91 98709 92118</p>
                    <p><i class="fas fa-envelope mr-2 text-brand.secondary"></i>hello@bizbharat.in</p>
                    <p><i class="fas fa-location-dot mr-2 text-brand.secondary"></i>Agra, Uttar Pradesh, India</p>
                    <div class="flex gap-3 pt-3">
                        <a href="#" class="flex h-10 w-10 items-center justify-center rounded-full border border-slate-800 transition hover:border-teal-400 hover:text-white"><i class="fab fa-instagram"></i></a>
                        <a href="#" class="flex h-10 w-10 items-center justify-center rounded-full border border-slate-800 transition hover:border-teal-400 hover:text-white"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" class="flex h-10 w-10 items-center justify-center rounded-full border border-slate-800 transition hover:border-teal-400 hover:text-white"><i class="fab fa-whatsapp"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="border-t border-slate-800 py-5 text-center text-sm text-slate-500">
            <p>&copy; {{ date('Y') }} {{ $businessName }}. Powered by BizBharat.</p>
        </div>
    </footer>
</body>
</html>
