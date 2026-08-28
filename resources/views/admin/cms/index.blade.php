@extends('admin.layout.app')
@section('content')
    <div class="p-4 sm:ml-64">
        <div class="p-4 rounded-lg dark:border-gray-700 mt-14">

            <div class="bg-white dark:bg-gray-800 rounded-lg shadow p-4">
                <div class="flex flex-col md:flex-row justify-between items-center mb-4 gap-2">
                    <h2 class="text-xl font-semibold text-gray-800 dark:text-white">CMS</h2>
                    <div class="flex items-center gap-2">
                        <a href="{{ route('admin.cms.add') }}"
                            class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-md text-sm">+ Add</a>
                        <input type="text" id="searchInput" placeholder="Search..."
                            class="px-3 py-2 border border-gray-300 rounded-md dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                    </div>
                </div>
                <div class="overflow-x-auto">
                    <table id="userTable" class="min-w-full table-auto border border-gray-200 dark:border-gray-700">
                        <thead class="bg-gray-100 dark:bg-gray-700">
                            <tr>
                                <th class="px-4 py-2 text-left text-sm font-semibold text-gray-700 dark:text-white">#</th>
                                <th class="px-4 py-2 text-left text-sm font-semibold text-gray-700 dark:text-white">Name</th>
                                <th class="px-4 py-2 text-left text-sm font-semibold text-gray-700 dark:text-white">Actions
                                </th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                            @forelse ($cms as $index => $item)
                                <tr class="hover:bg-gray-50 dark:hover:bg-gray-700">
                                    <td class="px-4 py-2 text-sm text-gray-800 dark:text-gray-300">
                                        {{ $cms->firstItem() + $index }}
                                    </td>
                                    <td class="px-4 py-2 text-sm text-gray-800 dark:text-gray-300">{{ $item->name }}</td>
                                    <td class="px-4 py-2 text-sm">
                                        <a href="{{ route('admin.cms.edit', $item->id) }}"
                                            class="text-blue-600 hover:underline dark:text-blue-400"><x-icon
                                                type="edit" /></a>
                                        <button class="text-red-600 hover:underline dark:text-red-400 delete-btn"
                                            data-id="{{ $item->id }}"
                                            data-url="{{ route('admin.cms.delete', $item->id) }}">
                                            <x-icon type="delete" />
                                        </button>

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
                        {{ $cms->links('pagination::tailwind') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
