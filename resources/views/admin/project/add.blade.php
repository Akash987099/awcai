@extends('admin.layout.app')

@section('content')
    <div class="p-4 sm:ml-64">
        <div class="p-4 rounded-lg dark:border-gray-700 mt-14">

            <div class="bg-white dark:bg-gray-800 rounded-lg shadow p-4">
                <div class="flex flex-col md:flex-row justify-between items-center mb-6 gap-2">
                    <h2 class="text-xl font-semibold text-gray-800 dark:text-white">Add</h2>

                    <a href="{{ route('admin.category.index') }}"
                        class="bg-gray-200 hover:bg-gray-300 text-gray-800 px-4 py-2 rounded-md text-sm dark:bg-gray-700 dark:text-white dark:hover:bg-gray-600">
                        ← Back to List
                    </a>
                </div>

                <form action="{{ route('admin.project.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="flex flex-col">
                            <label for="name" class="text-sm font-medium text-gray-700 dark:text-gray-200">Project
                                Name</label>
                            <input type="text" name="name" id="name" placeholder="Enter Details" required
                                class="mt-1 px-4 py-2 border border-gray-300 rounded-md dark:bg-gray-700 dark:text-white dark:border-gray-600 focus:ring-blue-500 focus:border-blue-500">
                        </div>

                        <div class="flex flex-col">
                            <label for="name" class="text-sm font-medium text-gray-700 dark:text-gray-200">Project URL
                                Name</label>
                            <input type="text" name="project_url" id="name" placeholder="Enter Details" required
                                class="mt-1 px-4 py-2 border border-gray-300 rounded-md dark:bg-gray-700 dark:text-white dark:border-gray-600 focus:ring-blue-500 focus:border-blue-500">
                        </div>

                        <div class="flex flex-col">
                            <label for="name" class="text-sm font-medium text-gray-700 dark:text-gray-200">Project
                                Preview Link</label>
                            <input type="text" name="preview_link" id="name" placeholder="Enter Details" required
                                class="mt-1 px-4 py-2 border border-gray-300 rounded-md dark:bg-gray-700 dark:text-white dark:border-gray-600 focus:ring-blue-500 focus:border-blue-500">
                        </div>

                        <div class="flex flex-col">
                            <label for="name" class="text-sm font-medium text-gray-700 dark:text-gray-200">Project Base
                                Price</label>
                            <input type="text" name="base_price" id="name" placeholder="Enter Details" required
                                class="mt-1 px-4 py-2 border border-gray-300 rounded-md dark:bg-gray-700 dark:text-white dark:border-gray-600 focus:ring-blue-500 focus:border-blue-500">
                        </div>

                        <div class="flex flex-col">
                            <label for="name" class="text-sm font-medium text-gray-700 dark:text-gray-200">Project
                                Actual Price</label>
                            <input type="text" name="actual_price" id="name" placeholder="Enter Details" required
                                class="mt-1 px-4 py-2 border border-gray-300 rounded-md dark:bg-gray-700 dark:text-white dark:border-gray-600 focus:ring-blue-500 focus:border-blue-500">
                        </div>

                        <div class="flex flex-col">
                            <label for="name" class="text-sm font-medium text-gray-700 dark:text-gray-200">Thumnail
                                Image</label>
                            <input type="file" name="thumnail" id="name" placeholder="Enter Details" required
                                class="mt-1 px-4 py-2 border border-gray-300 rounded-md dark:bg-gray-700 dark:text-white dark:border-gray-600 focus:ring-blue-500 focus:border-blue-500">
                        </div>

                        <div class="flex flex-col">
                            <label for="name" class="text-sm font-medium text-gray-700 dark:text-gray-200">Banner
                                Image</label>
                            <input type="file" name="banner" id="name" placeholder="Enter Details" required
                                class="mt-1 px-4 py-2 border border-gray-300 rounded-md dark:bg-gray-700 dark:text-white dark:border-gray-600 focus:ring-blue-500 focus:border-blue-500">
                        </div>

                        <div class="flex flex-col">
                            <label for="screenshort" class="text-sm font-medium text-gray-700 dark:text-gray-200">
                                Screenshot Images
                            </label>
                            <input type="file" name="screenshort[]" id="screenshort" multiple accept="image/*" required
                                class="mt-1 px-4 py-2 border border-gray-300 rounded-md 
               dark:bg-gray-700 dark:text-white dark:border-gray-600 
               focus:ring-blue-500 focus:border-blue-500">
                        </div>

                        <div class="flex flex-col">
                            <label for="name"
                                class="text-sm font-medium text-gray-700 dark:text-gray-200">Category</label>
                            <select type="text" name="category" id="name" placeholder="Enter Details" required
                                class="mt-1 px-4 py-2 border border-gray-300 rounded-md dark:bg-gray-700 dark:text-white dark:border-gray-600 focus:ring-blue-500 focus:border-blue-500">
                                <option value="">----Select Category----</option>
                                @foreach ($category as $key => $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="flex flex-col">
                            <label for="name"
                                class="text-sm font-medium text-gray-700 dark:text-gray-200">Technology</label>
                            <select type="text" name="project_technology" id="name" placeholder="Enter Details"
                                required
                                class="mt-1 px-4 py-2 border border-gray-300 rounded-md dark:bg-gray-700 dark:text-white dark:border-gray-600 focus:ring-blue-500 focus:border-blue-500">
                                <option value="">----Select Technology----</option>
                                @foreach ($technology as $key => $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </div>

                    </div>

                    <br>
                    <div class="grid grid-cols-1 md:grid-cols-1 gap-6">
                        <div class="flex flex-col">
                            <label for="name"
                                class="text-sm font-medium text-gray-700 dark:text-gray-200">Description</label>
                            <textarea type="text" rows="10" name="description" id="name" placeholder="Enter Details" required
                                class="mt-1 px-4 py-2 border border-gray-300 rounded-md dark:bg-gray-700 dark:text-white dark:border-gray-600 focus:ring-blue-500 focus:border-blue-500"></textarea>
                        </div>
                    </div>


                    <div class="mt-6">
                        <button type="submit"
                            class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-md text-sm">
                            Save
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<script>
    CKEDITOR.replace('description', {
        height: 300,
        removeButtons: 'PasteFromWord'
    });
</script>

@endsection
