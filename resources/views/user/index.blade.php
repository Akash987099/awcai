@extends('user.layout.app')

@section('content')
    <div class="sm:ml-40">
        <div class="rounded-lg dark:border-gray-700 mt-14">


            <!-- Stats Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-6">
                <!-- Users Card -->
                <div
                    class="relative overflow-hidden rounded-xl bg-white from-blue-50 to-indigo-50 dark:bg-gray-800 p-6 shadow-sm transition-all duration-300 hover:shadow-md border border-blue-100 dark:border-gray-700">
                    <div class="flex items-center justify-between">
                        <div class="space-y-2">
                            <p class="text-sm font-medium text-blue-600 dark:text-blue-400">Total Products</p>
                            <p class="text-3xl font-bold text-gray-900 dark:text-white">3</p>
                            <div class="flex items-center text-xs text-green-600 dark:text-green-400">
                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path>
                                </svg>
                            </div>
                        </div>
                        <div class="p-3 rounded-full bg-blue-100 dark:bg-blue-900/50">
                            <svg class="w-8 h-8 text-blue-600 dark:text-blue-400" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                            </svg>
                        </div>
                    </div>
                </div>

                <!-- Vendors Card -->
                <div
                    class="relative overflow-hidden rounded-xl bg-white from-green-50 to-emerald-50 dark:bg-gray-800  p-6 shadow-sm transition-all duration-300 hover:shadow-md border border-green-100 dark:border-gray-700">
                    <div class="flex items-center justify-between">
                        <div class="space-y-2">
                            <p class="text-sm font-medium text-green-600 dark:text-green-400">Active Product</p>
                            <p class="text-3xl font-bold text-gray-900 dark:text-white">3</p>
                            <div class="flex items-center text-xs text-green-600 dark:text-green-400">
                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path>
                                </svg>
                                <span>5% increase</span>
                            </div>
                        </div>
                        <div class="p-3 rounded-full bg-green-100 dark:bg-green-900/50">
                            <svg class="w-8 h-8 text-green-600 dark:text-green-400" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4">
                                </path>
                            </svg>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <div class="rounded-lg dark:border-gray-700 mt-14">

            <div class="bg-white dark:bg-gray-800 rounded-lg shadow p-4">
                <div class="flex flex-col md:flex-row justify-between items-center mb-4 gap-2">
                    <h2 class="text-xl font-semibold text-gray-800 dark:text-white">My Projects</h2>
                    <div class="flex items-center gap-2">
                        <input type="text" id="searchInput" placeholder="Search..."
                            class="px-3 py-2 border border-gray-300 rounded-md dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                    </div>
                </div>
                <div class="overflow-x-auto">
                    <table id="userTable" class="min-w-full table-auto border border-gray-200 dark:border-gray-700">
                        <thead class="bg-gray-100 dark:bg-gray-700">
                            <tr>
                                <th class="px-4 py-2 text-left text-sm font-semibold text-gray-700 dark:text-white">#</th>
                                <th class="px-4 py-2 text-left text-sm font-semibold text-gray-700 dark:text-white">Project Name</th>
                                <th class="px-4 py-2 text-left text-sm font-semibold text-gray-700 dark:text-white">Amount</th>
                                <th class="px-4 py-2 text-left text-sm font-semibold text-gray-700 dark:text-white">Ref. No.</th>
                                <th class="px-4 py-2 text-left text-sm font-semibold text-gray-700 dark:text-white">Date</th>
                                <th class="px-4 py-2 text-left text-sm font-semibold text-gray-700 dark:text-white">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                            @forelse ($projects as $index => $item)
                                <tr class="hover:bg-gray-50 dark:hover:bg-gray-700">
                                    <td class="px-4 py-2 text-sm text-gray-800 dark:text-gray-300">
                                        {{ $projects->firstItem() + $index }}
                                    </td>
                                    <td class="px-4 py-2 text-sm text-gray-800 dark:text-gray-300">{{ $item->project_name ?? '-' }}</td>
                                    <td class="px-4 py-2 text-sm text-gray-800 dark:text-gray-300">{{ $item->amount ?? '-' }}</td>
                                    <td class="px-4 py-2 text-sm text-gray-800 dark:text-gray-300">{{ $item->ref_no ?? '-' }}</td>
                                    <td class="px-4 py-2 text-sm text-gray-800 dark:text-gray-300">{{ $item->created_at ?? '-' }}</td>
                                    <td class="px-4 py-2 text-sm text-gray-800 dark:text-gray-300">
                                        @if ($item->status == 1)
                                            <a href="{{ $item->download_link ?? '' }}"
                                            class="text-blue-600 hover:underline dark:text-blue-400">Download</a>
                                        @else 
                                        Awaiting Payment Approval
                                        @endif
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center text-gray-500 dark:text-gray-300 py-4">No
                                        No record found.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                    <div class="mt-4">
                        {{ $projects->links('pagination::tailwind') }}
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
