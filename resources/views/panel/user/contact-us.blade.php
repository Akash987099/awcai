@extends('panel.user.app')

@section('content')
@php
    $businessName = str($name ?? 'business')->replace(['-', '_'], ' ')->title()->toString();
@endphp

<main class="pt-28">
    <section class="page-shell">
        <div class="grid gap-8 rounded-[36px] bg-white p-6 shadow-sm md:p-10 lg:grid-cols-[0.9fr_1.1fr]">
            <div>
                <p class="text-sm font-semibold uppercase tracking-[0.24em] text-teal-600">Contact {{ $businessName }}</p>
                <h1 class="mt-3 font-display text-4xl font-bold text-slate-900 md:text-5xl">Make it easy for customers to reach you from any device.</h1>
                <p class="mt-5 text-base leading-8 text-slate-600">
                    A strong contact page keeps details clean, readable and action-oriented so visitors can call, message or submit an enquiry without friction.
                </p>
                <div class="mt-8 space-y-4">
                    <div class="rounded-[24px] bg-teal-50 p-5">
                        <p class="text-sm font-semibold text-slate-900">Phone</p>
                        <p class="mt-1 text-sm text-slate-600">+91 98709 92118</p>
                    </div>
                    <div class="rounded-[24px] bg-slate-50 p-5">
                        <p class="text-sm font-semibold text-slate-900">Email</p>
                        <p class="mt-1 text-sm text-slate-600">hello@bizbharat.in</p>
                    </div>
                    <div class="rounded-[24px] bg-slate-50 p-5">
                        <p class="text-sm font-semibold text-slate-900">Address</p>
                        <p class="mt-1 text-sm text-slate-600">Agra, Uttar Pradesh, India</p>
                    </div>
                </div>
            </div>

            <form id="contact-form" class="grid gap-4 rounded-[30px] bg-slate-50 p-6 md:grid-cols-2">
                <input type="text" placeholder="Your name" class="rounded-2xl border border-slate-200 bg-white px-4 py-3 outline-none transition focus:border-teal-400">
                <input type="tel" placeholder="Mobile number" class="rounded-2xl border border-slate-200 bg-white px-4 py-3 outline-none transition focus:border-teal-400">
                <input type="email" placeholder="Email address" class="rounded-2xl border border-slate-200 bg-white px-4 py-3 outline-none transition focus:border-teal-400 md:col-span-2">
                <input type="text" placeholder="Subject" class="rounded-2xl border border-slate-200 bg-white px-4 py-3 outline-none transition focus:border-teal-400 md:col-span-2">
                <textarea rows="5" placeholder="Tell us about your requirement" class="rounded-2xl border border-slate-200 bg-white px-4 py-3 outline-none transition focus:border-teal-400 md:col-span-2"></textarea>
                <button type="button" class="rounded-2xl bg-teal-600 px-5 py-3 font-semibold text-white transition hover:bg-teal-500 md:col-span-2">
                    Send Enquiry
                </button>
            </form>
        </div>
    </section>

    <section class="page-shell mt-16 overflow-hidden rounded-[36px] border border-teal-100 bg-white p-3 shadow-sm">
        <iframe
            src="https://www.google.com/maps/embed?pb=!1m23!1m12!1m3!1d88570.52000894143!2d77.9196809385397!3d27.19605321265067!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m8!3e6!4m0!4m5!1s0x3974771ffaa1238f%3A0xac11d6bf5c5d98e7!2sShop%20No%2012-A%2C%20Akhilesh%20Tower%2C%20Hotel%20Solitaire%20Complex%20Hari%20parwat%20Crossing%2C%20Mahatma%20Gandhi%20Rd%2C%20Agra%2C%20Uttar%20Pradesh%20282002!3m2!1d27.1960773!2d78.00208239999999!5e1!3m2!1sen!2sin!4v1758121368875!5m2!1sen!2sin"
            width="100%"
            height="420"
            style="border:0;"
            allowfullscreen=""
            loading="lazy"
            referrerpolicy="no-referrer-when-downgrade"
            class="rounded-[30px]">
        </iframe>
    </section>
</main>
@endsection
