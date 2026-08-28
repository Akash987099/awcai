    <footer class="mt-20 border-t border-orange-100 bg-slate-950 text-slate-200">
        <div class="section-shell grid gap-10 px-1 py-14 md:grid-cols-[1.3fr_0.7fr_0.9fr]">
            <div class="space-y-4">
                <div class="flex items-center gap-3">
                    <div class="flex h-11 w-11 items-center justify-center rounded-2xl bg-brand.primary font-extrabold text-slate-950">BB</div>
                    <div>
                        <p class="font-display text-xl font-semibold text-white">BizBharat</p>
                        <p class="text-sm text-slate-400">Smart local business discovery</p>
                    </div>
                </div>
                <p class="max-w-xl text-sm leading-7 text-slate-400">
                    BizBharat helps customers discover verified local businesses and helps business owners get a cleaner digital presence, more enquiries, and better trust.
                </p>
            </div>

            <div>
                <h3 class="font-display text-lg font-semibold text-white">Quick Links</h3>
                <div class="mt-4 space-y-3 text-sm text-slate-400">
                    <a href="{{ url('/panel') }}" class="block transition hover:text-white">Home</a>
                    <a href="{{ url('/panel/services') }}" class="block transition hover:text-white">Service Categories</a>
                    <a href="#lead-form" class="block transition hover:text-white">Add Your Business</a>
                </div>
            </div>

            <div>
                <h3 class="font-display text-lg font-semibold text-white">Contact</h3>
                <div class="mt-4 space-y-3 text-sm text-slate-400">
                    <p><i class="fas fa-phone mr-2 text-brand.secondary"></i>+91 98709 92118</p>
                    <p><i class="fas fa-envelope mr-2 text-brand.secondary"></i>support@bigbharat.in</p>
                    <p><i class="fas fa-location-dot mr-2 text-brand.secondary"></i>Agra, Uttar Pradesh, India</p>
                </div>
            </div>
        </div>
        <div class="border-t border-slate-800 py-5 text-center text-sm text-slate-500">
            <p>&copy; {{ date('Y') }} BizBharat. All rights reserved.</p>
        </div>
    </footer>
</body>
</html>
