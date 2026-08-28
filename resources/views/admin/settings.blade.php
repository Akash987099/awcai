@extends('admin.layout.app')

@section('content')
    <div class="sm:ml-64">
        <div class="rounded-lg dark:border-gray-700 mt-14">
            
            <!-- Stats Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-6">

                <div class="relative overflow-hidden rounded-xl bg-white from-purple-50 to-violet-50 dark:from-gray-800 dark:to-gray-900 p-6 shadow-sm transition-all duration-300 hover:shadow-md border border-purple-100 dark:border-gray-700">
                    <a href="{{route('admin.setting.account')}}">
                    <div class="flex items-center justify-between">
                        <div class="space-y-2">
                            <p class="text-sm font-medium text-purple-600 dark:text-purple-400">Account Settings</p>
                            <p class=" font-bold text-gray-900 dark:text-white">Manage Account And UPI</p>
                        </div>
                        <div class="p-3 rounded-full bg-purple-100 dark:bg-purple-900/50">
                            <svg class="w-8 h-8 text-purple-600 dark:text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                    </div>
                    </a>
                </div>

                <!-- Users Card -->
                <div class="relative overflow-hidden rounded-xl bg-white from-blue-50 to-indigo-50 dark:from-gray-800 dark:to-gray-900 p-6 shadow-sm transition-all duration-300 hover:shadow-md border border-blue-100 dark:border-gray-700">
                    <div class="flex items-center justify-between">
                        <div class="space-y-2">
                            <p class="text-sm font-medium text-blue-600 dark:text-blue-400">Total Users</p>
                            <p class="text-3xl font-bold text-gray-900 dark:text-white">1,248</p>
                            <div class="flex items-center text-xs text-green-600 dark:text-green-400">
                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path>
                                </svg>
                                <span>12% increase</span>
                            </div>
                        </div>
                        <div class="p-3 rounded-full bg-blue-100 dark:bg-blue-900/50">
                            <svg class="w-8 h-8 text-blue-600 dark:text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                            </svg>
                        </div>
                    </div>
                </div>

                <!-- Vendors Card -->
                <div class="relative overflow-hidden rounded-xl bg-white from-green-50 to-emerald-50 dark:from-gray-800 dark:to-gray-900 p-6 shadow-sm transition-all duration-300 hover:shadow-md border border-green-100 dark:border-gray-700">
                    <div class="flex items-center justify-between">
                        <div class="space-y-2">
                            <p class="text-sm font-medium text-green-600 dark:text-green-400">Active Vendors</p>
                            <p class="text-3xl font-bold text-gray-900 dark:text-white">342</p>
                            <div class="flex items-center text-xs text-green-600 dark:text-green-400">
                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path>
                                </svg>
                                <span>5% increase</span>
                            </div>
                        </div>
                        <div class="p-3 rounded-full bg-green-100 dark:bg-green-900/50">
                            <svg class="w-8 h-8 text-green-600 dark:text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                            </svg>
                        </div>
                    </div>
                </div>

                <!-- Total Bookings Card -->
                <div class="relative overflow-hidden rounded-xl bg-white from-yellow-50 to-amber-50 dark:from-gray-800 dark:to-gray-900 p-6 shadow-sm transition-all duration-300 hover:shadow-md border border-yellow-100 dark:border-gray-700">
                    <div class="flex items-center justify-between">
                        <div class="space-y-2">
                            <p class="text-sm font-medium text-yellow-600 dark:text-yellow-400">Total Bookings</p>
                            <p class="text-3xl font-bold text-gray-900 dark:text-white">1,847</p>
                            <div class="flex items-center text-xs text-green-600 dark:text-green-400">
                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path>
                                </svg>
                                <span>8% increase</span>
                            </div>
                        </div>
                        <div class="p-3 rounded-full bg-yellow-100 dark:bg-yellow-900/50">
                            <svg class="w-8 h-8 text-yellow-600 dark:text-yellow-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                            </svg>
                        </div>
                    </div>
                </div>

                <!-- Today Bookings Card -->
                <div class="relative overflow-hidden rounded-xl bg-white from-red-50 to-pink-50 dark:from-gray-800 dark:to-gray-900 p-6 shadow-sm transition-all duration-300 hover:shadow-md border border-red-100 dark:border-gray-700">
                    <div class="flex items-center justify-between">
                        <div class="space-y-2">
                            <p class="text-sm font-medium text-red-600 dark:text-red-400">Today's Bookings</p>
                            <p class="text-3xl font-bold text-gray-900 dark:text-white">42</p>
                            <div class="flex items-center text-xs text-green-600 dark:text-green-400">
                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path>
                                </svg>
                                <span>3% increase</span>
                            </div>
                        </div>
                        <div class="p-3 rounded-full bg-red-100 dark:bg-red-900/50">
                            <svg class="w-8 h-8 text-red-600 dark:text-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                            </svg>
                        </div>
                    </div>
                </div>

                <!-- Active Now Card -->
                <div class="relative overflow-hidden rounded-xl bg-white from-blue-600 to-indigo-600 dark:from-blue-800 dark:to-indigo-800 p-6 shadow-sm transition-all duration-300 hover:shadow-md text-white">
                    <div class="flex items-center justify-between">
                        <div class="space-y-2">
                            <p class="text-sm font-medium text-blue-100">Active Now</p>
                            <p class="text-3xl font-bold">128</p>
                            <div class="flex items-center text-xs text-blue-200">
                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                                </svg>
                                <span>Live users</span>
                            </div>
                        </div>
                        <div class="p-3 rounded-full bg-blue-500/30">
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                            </svg>
                        </div>
                    </div>
                    <div class="absolute -bottom-4 -right-4 w-20 h-20 rounded-full bg-blue-500/20"></div>
                    <div class="absolute -bottom-2 -right-2 w-12 h-12 rounded-full bg-blue-400/30"></div>
                </div>
            </div>
        </div>
    </div>
@endsection