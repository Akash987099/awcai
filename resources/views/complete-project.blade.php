@extends('layout.app')

@section('content')

<div class="bg-slate-50 py-14">
    <div class="container mx-auto px-4">

        <!-- Heading -->
        <div class="text-center mb-14">
            <span class="text-blue-600 font-semibold tracking-widest uppercase text-sm">
                Our Completed Work
            </span>

            <h1 class="text-4xl md:text-5xl font-bold text-gray-900 mt-3">
                Successfully Delivered Projects
            </h1>

            <p class="text-gray-500 max-w-2xl mx-auto mt-4">
                Explore premium websites, dashboards, apps and software solutions
                we have completed for our valuable clients.
            </p>
        </div>

        <!-- Stats -->
        <div class="grid md:grid-cols-4 gap-6 mb-14">

            <div class="bg-white rounded-2xl p-6 shadow-sm text-center">
                <h2 class="text-3xl font-bold text-blue-600">15+</h2>
                <p class="text-gray-500 mt-2">Projects Delivered</p>
            </div>

            <div class="bg-white rounded-2xl p-6 shadow-sm text-center">
                <h2 class="text-3xl font-bold text-green-600">15+</h2>
                <p class="text-gray-500 mt-2">Happy Clients</p>
            </div>

            <div class="bg-white rounded-2xl p-6 shadow-sm text-center">
                <h2 class="text-3xl font-bold text-purple-600">2+</h2>
                <p class="text-gray-500 mt-2">Years Experience</p>
            </div>

            <div class="bg-white rounded-2xl p-6 shadow-sm text-center">
                <h2 class="text-3xl font-bold text-orange-600">24/7</h2>
                <p class="text-gray-500 mt-2">Support</p>
            </div>

        </div>

        <!-- Projects -->
        <div class="grid md:grid-cols-3 sm:grid-cols-2 gap-8">

            <div class="group bg-white rounded-3xl overflow-hidden shadow hover:shadow-2xl transition duration-500">
                <div class="relative overflow-hidden">
                    <img src="{{asset('assets/img/projects/complete/braj.png')}}"
                        class="w-full h-64 object-cover group-hover:scale-110 transition duration-700">
                </div>

                <div class="p-6">
                    <h3 class="text-2xl font-bold text-gray-800 mb-3">
                        Braj India Travel
                    </h3>

                    <p class="text-gray-500 mb-5">
                    A comprehensive website for brajindiatravel.com. The website provides information about the travel agency's services, destinations, and packages.
                    </p>

                    <div class="flex justify-between items-center">
                        <span class="text-sm text-gray-400">Completed 2026</span>

                        <a href="https://brajindiatravel.com"
                            class="text-purple-600 font-semibold hover:text-purple-800">
                            View →
                        </a>
                    </div>
                </div>
            </div>

            <div class="group bg-white rounded-3xl overflow-hidden shadow hover:shadow-2xl transition duration-500">
                <div class="relative overflow-hidden">
                    <img src="{{asset('assets/img/projects/complete/samyank.png')}}"
                        class="w-full h-64 object-cover group-hover:scale-110 transition duration-700">
                </div>

                <div class="p-6">
                    <h3 class="text-2xl font-bold text-gray-800 mb-3">
                        Samyak Physiotherapy Center
                    </h3>

                    <p class="text-gray-500 mb-5">
                    A comprehensive website for Samyak Physiotherapy Center. The website provides information about the center's services, facilities, and staff.
                    </p>

                    <div class="flex justify-between items-center">
                        <span class="text-sm text-gray-400">Completed 2026</span>

                        <a href="https://samyakphysiotherapycenter.in"
                            class="text-purple-600 font-semibold hover:text-purple-800">
                            View →
                        </a>
                    </div>
                </div>
            </div>

            <div class="group bg-white rounded-3xl overflow-hidden shadow hover:shadow-2xl transition duration-500">
                <div class="relative overflow-hidden">
                    <img src="{{asset('assets/img/projects/complete/raghuja_web.png')}}"
                        class="w-full h-64 object-cover group-hover:scale-110 transition duration-700">
                </div>

                <div class="p-6">
                    <h3 class="text-2xl font-bold text-gray-800 mb-3">
                        Raghuja Social Welfare Foundation
                    </h3>

                    <p class="text-gray-500 mb-5">
                    A comprehensive website for Raghuja Social Welfare Foundation. The website provides information about the foundation's initiatives, programs, and services.
                    </p>

                    <div class="flex justify-between items-center">
                        <span class="text-sm text-gray-400">Completed 2026</span>

                        <a href="https://raghujasocialwelfarefoundation.com/"
                            class="text-purple-600 font-semibold hover:text-purple-800">
                            View →
                        </a>
                    </div>
                </div>
            </div>

            <div class="group bg-white rounded-3xl overflow-hidden shadow hover:shadow-2xl transition duration-500">
                <div class="relative overflow-hidden">
                    <img src="{{asset('assets/img/projects/complete/pdc.png')}}"
                        class="w-full h-64 object-cover group-hover:scale-110 transition duration-700">
                </div>

                <div class="p-6">
                    <h3 class="text-2xl font-bold text-gray-800 mb-3">
                            PD Cancer CareInstitute
                    </h3>

                    <p class="text-gray-500 mb-5">
                    A comprehensive website for PD Cancer Care Institute. The website provides information about the institute's services, programs, and initiatives.
                    </p>

                    <div class="flex justify-between items-center">
                        <span class="text-sm text-gray-400">Completed 2026</span>

                        <a href="https://pdcancercareinstitute.com/"
                            class="text-purple-600 font-semibold hover:text-purple-800">
                            View →
                        </a>
                    </div>
                </div>
            </div>

            <div class="group bg-white rounded-3xl overflow-hidden shadow hover:shadow-2xl transition duration-500">
                <div class="relative overflow-hidden">
                    <img src="{{asset('assets/img/projects/complete/atoz.png')}}"
                        class="w-full h-64 object-cover group-hover:scale-110 transition duration-700">
                </div>

                <div class="p-6">
                    <h3 class="text-2xl font-bold text-gray-800 mb-3">
                        AtoZ Hotel
                    </h3>

                    <p class="text-gray-500 mb-5">
                    A comprehensive website for AtoZ Hotel. The website provides information about the hotel's rooms, services, and amenities.
                    </p>

                    <div class="flex justify-between items-center">
                        <span class="text-sm text-gray-400">Completed 2026</span>

                        <a href="https://atozhotel.in/"
                            class="text-purple-600 font-semibold hover:text-purple-800">
                            View →
                        </a>
                    </div>
                </div>
            </div>

             <div class="group bg-white rounded-3xl overflow-hidden shadow hover:shadow-2xl transition duration-500">
                <div class="relative overflow-hidden">
                    <img src="{{asset('assets/img/projects/complete/heaven-cafe.png')}}"
                        class="w-full h-64 object-cover group-hover:scale-110 transition duration-700">
                </div>

                <div class="p-6">
                    <h3 class="text-2xl font-bold text-gray-800 mb-3">
                        Heaven Cafe Food Delivery Website
                    </h3>

                    <p class="text-gray-500 mb-5">
                        Full food ordering app with wallet, live order tracking
                        and secure checkout.
                    </p>

                    <div class="flex justify-between items-center">
                        <span class="text-sm text-gray-400">Completed 2026</span>

                        <a href="https://cafe.awcai.cloud/"
                            class="text-green-600 font-semibold hover:text-green-800">
                            View →
                        </a>
                    </div>
                </div>
            </div>

            <!-- Card -->
            <div class="group bg-white rounded-3xl overflow-hidden shadow hover:shadow-2xl transition duration-500">
                <div class="relative overflow-hidden">
                    <img src="{{asset('assets/img/projects/complete/heaven-cart.png')}}"
                        class="w-full h-64 object-cover group-hover:scale-110 transition duration-700">

                    {{-- <div class="absolute top-4 left-4 bg-blue-600 text-white text-xs px-4 py-2 rounded-full">
                        Ecommerce
                    </div> --}}
                </div>

                <div class="p-6">
                    <h3 class="text-2xl font-bold text-gray-800 mb-3">
                        Heaven Cart Online Store
                    </h3>

                    <p class="text-gray-500 mb-5">
                        Modern online shopping platform with payment gateway,
                        order tracking and admin panel.
                    </p>

                    <div class="flex justify-between items-center">
                        <span class="text-sm text-gray-400">Completed 2026</span>

                        <a href="https://heaven-kart.vercel.app/"
                            class="text-blue-600 font-semibold hover:text-blue-800">
                            View →
                        </a>
                    </div>
                </div>
            </div>

            <!-- Card -->
            <div class="group bg-white rounded-3xl overflow-hidden shadow hover:shadow-2xl transition duration-500">
                <div class="relative overflow-hidden">
                    <img src="{{asset('assets/img/projects/complete/indra-mart.png')}}"
                        class="w-full h-64 object-cover group-hover:scale-110 transition duration-700">

                    {{-- <div class="absolute top-4 left-4 bg-purple-600 text-white text-xs px-4 py-2 rounded-full">
                        Dashboard
                    </div> --}}
                </div>

                <div class="p-6">
                    <h3 class="text-2xl font-bold text-gray-800 mb-3">
                        Indra Mart Mall Management website
                    </h3>

                    <p class="text-gray-500 mb-5">
                        Comprehensive mall management system with tenant
                        management, billing and reporting features.
                    </p>

                    <div class="flex justify-between items-center">
                        <span class="text-sm text-gray-400">Completed 2025</span>

                        <a href="https://indramart.org/"
                            class="text-purple-600 font-semibold hover:text-purple-800">
                            View →
                        </a>
                    </div>
                </div>
            </div>

            <div class="group bg-white rounded-3xl overflow-hidden shadow hover:shadow-2xl transition duration-500">
                <div class="relative overflow-hidden">
                    <img src="{{asset('assets/img/projects/complete/mahila.png')}}"
                        class="w-full h-64 object-cover group-hover:scale-110 transition duration-700">
                </div>

                <div class="p-6">
                    <h3 class="text-2xl font-bold text-gray-800 mb-3">
                    Mahila Udyamita Vikas Sangathan
                    </h3>

                    <p class="text-gray-500 mb-5">
                    A comprehensive website for the Mahila Udyamita Vikas Sangathan, an organization dedicated to empowering women entrepreneurs. The website features information about the organization's mission, programs, and initiatives, as well as resources for women entrepreneurs.
                    </p>

                    <div class="flex justify-between items-center">
                        <span class="text-sm text-gray-400">Completed 2025</span>

                        <a href="https://mahilaudyamitavikassangathan.com/"
                            class="text-purple-600 font-semibold hover:text-purple-800">
                            View →
                        </a>
                    </div>
                </div>
            </div>

            <div class="group bg-white rounded-3xl overflow-hidden shadow hover:shadow-2xl transition duration-500">
                <div class="relative overflow-hidden">
                    <img src="{{asset('assets/img/projects/complete/mangal-hospital.png')}}"
                        class="w-full h-64 object-cover group-hover:scale-110 transition duration-700">
                </div>

                <div class="p-6">
                    <h3 class="text-2xl font-bold text-gray-800 mb-3">
                    Dr. Navneet Agrawal (Mangal Hospital) website
                    </h3>

                    <p class="text-gray-500 mb-5">
                    A comprehensive website for Dr. Navneet Agrawal's medical practice at Mangal Hospital. The website provides information about the doctor's expertise, patient care services, and hospital facilities.
                    </p>

                    <div class="flex justify-between items-center">
                        <span class="text-sm text-gray-400">Completed 2025</span>

                        <a href="https://drnavneetcancer.com/"
                            class="text-purple-600 font-semibold hover:text-purple-800">
                            View →
                        </a>
                    </div>
                </div>
            </div>

            <div class="group bg-white rounded-3xl overflow-hidden shadow hover:shadow-2xl transition duration-500">
                <div class="relative overflow-hidden">
                    <img src="{{asset('assets/img/projects/complete/green_house.png')}}"
                        class="w-full h-64 object-cover group-hover:scale-110 transition duration-700">
                </div>

                <div class="p-6">
                    <h3 class="text-2xl font-bold text-gray-800 mb-3">
                    Green House CBWTF
                    </h3>

                    <p class="text-gray-500 mb-5">
                    A comprehensive website for the Green House CBWTF, an organization focused on environmental sustainability and waste management. The website features information about the organization's mission, programs, and initiatives, as well as resources for the community.
                    </p>

                    <div class="flex justify-between items-center">
                        <span class="text-sm text-gray-400">Completed 2025</span>

                        <a href="https://greenhousecbwtf.com/"
                            class="text-purple-600 font-semibold hover:text-purple-800">
                            View →
                        </a>
                    </div>
                </div>
            </div>

            <div class="group bg-white rounded-3xl overflow-hidden shadow hover:shadow-2xl transition duration-500">
                <div class="relative overflow-hidden">
                    <img src="{{asset('assets/img/projects/complete/expert-care.png')}}"
                        class="w-full h-64 object-cover group-hover:scale-110 transition duration-700">
                </div>

                <div class="p-6">
                    <h3 class="text-2xl font-bold text-gray-800 mb-3">
                    Dr. Mayank Agarwal
                    </h3>

                    <p class="text-gray-500 mb-5">
                    A comprehensive website for Dr. Mayank Agarwal's medical practice. The website provides information about the doctor's expertise, patient care services, and hospital facilities.
                    </p>

                    <div class="flex justify-between items-center">
                        <span class="text-sm text-gray-400">Completed 2025</span>

                        <a href="https://neuromayankag.com/"
                            class="text-purple-600 font-semibold hover:text-purple-800">
                            View →
                        </a>
                    </div>
                </div>
            </div>

            <div class="group bg-white rounded-3xl overflow-hidden shadow hover:shadow-2xl transition duration-500">
                <div class="relative overflow-hidden">
                    <img src="{{asset('assets/img/projects/complete/kgn-enterprises.png')}}"
                        class="w-full h-64 object-cover group-hover:scale-110 transition duration-700">
                </div>

                <div class="p-6">
                    <h3 class="text-2xl font-bold text-gray-800 mb-3">
                    kgn Enterprises
                    </h3>

                    <p class="text-gray-500 mb-5">
                    A comprehensive website for kgn Enterprises, a leading company in its industry. The website showcases the company's products, services, and commitment to excellence.
                    </p>

                    <div class="flex justify-between items-center">
                        <span class="text-sm text-gray-400">Completed 2025</span>

                        <a href="https://www.kgnenterprises.org.in/"
                            class="text-purple-600 font-semibold hover:text-purple-800">
                            View →
                        </a>
                    </div>
                </div>
            </div>

            <div class="group bg-white rounded-3xl overflow-hidden shadow hover:shadow-2xl transition duration-500">
                <div class="relative overflow-hidden">
                    <img src="{{asset('assets/img/projects/complete/pradeep-deb.png')}}"
                        class="w-full h-64 object-cover group-hover:scale-110 transition duration-700">
                </div>

                <div class="p-6">
                    <h3 class="text-2xl font-bold text-gray-800 mb-3">
                    DR. Pradeep Deb
                    </h3>

                    <p class="text-gray-500 mb-5">
                    A comprehensive website for DR. Pradeep Deb's medical practice. The website provides information about the doctor's expertise, patient care services, and hospital facilities.
                    </p>

                    <div class="flex justify-between items-center">
                        <span class="text-sm text-gray-400">Completed 2025</span>

                        <a href="https://drpradeepdeb.com/"
                            class="text-purple-600 font-semibold hover:text-purple-800">
                            View →
                        </a>
                    </div>
                </div>
            </div>

            <div class="group bg-white rounded-3xl overflow-hidden shadow hover:shadow-2xl transition duration-500">
                <div class="relative overflow-hidden">
                    <img src="{{asset('assets/img/projects/complete/kargil-hospital.png')}}"
                        class="w-full h-64 object-cover group-hover:scale-110 transition duration-700">
                </div>

                <div class="p-6">
                    <h3 class="text-2xl font-bold text-gray-800 mb-3">
                    Kargil Hospital
                    </h3>

                    <p class="text-gray-500 mb-5">
                    A comprehensive website for Kargil Hospital. The website provides information about the hospital's services, facilities, and medical staff.
                    </p>

                    <div class="flex justify-between items-center">
                        <span class="text-sm text-gray-400">Completed 2025</span>

                        <a href="https://kargilhospital.com/"
                            class="text-purple-600 font-semibold hover:text-purple-800">
                            View →
                        </a>
                    </div>
                </div>
            </div>

            <div class="group bg-white rounded-3xl overflow-hidden shadow hover:shadow-2xl transition duration-500">
                <div class="relative overflow-hidden">
                    <img src="{{asset('assets/img/projects/complete/adinath-builders.png')}}"
                        class="w-full h-64 object-cover group-hover:scale-110 transition duration-700">
                </div>

                <div class="p-6">
                    <h3 class="text-2xl font-bold text-gray-800 mb-3">
                    Adinath Builders
                    </h3>

                    <p class="text-gray-500 mb-5">
                    A comprehensive website for Adinath Builders. The website provides information about the company's projects, services, and team.
                    </p>

                    <div class="flex justify-between items-center">
                        <span class="text-sm text-gray-400">Completed 2025</span>

                        <a href="https://www.adinathbuilders.com/"
                            class="text-purple-600 font-semibold hover:text-purple-800">
                            View →
                        </a>
                    </div>
                </div>
            </div>

            <div class="group bg-white rounded-3xl overflow-hidden shadow hover:shadow-2xl transition duration-500">
                <div class="relative overflow-hidden">
                    <img src="{{asset('assets/img/projects/complete/jrr-waste-management.png')}}"
                        class="w-full h-64 object-cover group-hover:scale-110 transition duration-700">
                </div>

                <div class="p-6">
                    <h3 class="text-2xl font-bold text-gray-800 mb-3">
                    JRR Waste Management Pvt. Ltd.
                    </h3>

                    <p class="text-gray-500 mb-5">
                    A comprehensive website for JRR Waste Management Pvt. Ltd. The website provides information about the company's projects, services, and team.
                    </p>

                    <div class="flex justify-between items-center">
                        <span class="text-sm text-gray-400">Completed 2022</span>

                        <a href="https://www.jrrwmpl.in/"
                            class="text-purple-600 font-semibold hover:text-purple-800">
                            View →
                        </a>
                    </div>
                </div>
            </div>

            <div class="group bg-white rounded-3xl overflow-hidden shadow hover:shadow-2xl transition duration-500">
                <div class="relative overflow-hidden">
                    <img src="{{asset('assets/img/projects/complete/ddesire.png')}}"
                        class="w-full h-64 object-cover group-hover:scale-110 transition duration-700">
                </div>

                <div class="p-6">
                    <h3 class="text-2xl font-bold text-gray-800 mb-3">
                    Ddesire Shoes
                    </h3>

                    <p class="text-gray-500 mb-5">
                    A comprehensive website for Ddesire Shoes. The website provides shoes for men and women.
                    </p>

                    <div class="flex justify-between items-center">
                        <span class="text-sm text-gray-400">Completed 2024</span>

                        <a href="https://ddesire.in/"
                            class="text-purple-600 font-semibold hover:text-purple-800">
                            View →
                        </a>
                    </div>
                </div>
            </div>

        </div>

        <!-- Bottom CTA -->
        <div class="text-center mt-14">
            <a href="#"
                class="inline-block bg-blue-600 hover:bg-blue-700 text-white px-8 py-4 rounded-full text-lg font-semibold shadow-lg">
                Start Your Project
            </a>
        </div>

    </div>
</div>

@endsection