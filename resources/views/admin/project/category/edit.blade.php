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

                <form action="{{ route('admin.project_category.update') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" value="{{$category->id}}" name="id">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="flex flex-col">
                            <label for="name" class="text-sm font-medium text-gray-700 dark:text-gray-200">Project Name</label>
                            <input type="text" name="name" id="name" placeholder="Enter Details" required value="{{$category->name}}"
                                class="mt-1 px-4 py-2 border border-gray-300 rounded-md dark:bg-gray-700 dark:text-white dark:border-gray-600 focus:ring-blue-500 focus:border-blue-500">
                        </div>

                        <div class="flex flex-col">
                            <label for="name" class="text-sm font-medium text-gray-700 dark:text-gray-200">title</label>
                            <input type="text" name="title" id="name" placeholder="Enter Details" required value="{{$category->title}}"
                                class="mt-1 px-4 py-2 border border-gray-300 rounded-md dark:bg-gray-700 dark:text-white dark:border-gray-600 focus:ring-blue-500 focus:border-blue-500">
                        </div>

                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-1 gap-6 p-2">
                        <div class="flex flex-col">
                            <label for="name" class="text-sm font-medium text-gray-700 dark:text-gray-200">iocn</label>
                            <textarea type="text" name="icon" id="name" placeholder="Enter Details" required
                                class="mt-1 px-4 py-2 border border-gray-300 rounded-md dark:bg-gray-700 dark:text-white dark:border-gray-600 focus:ring-blue-500 focus:border-blue-500">{{$category->icon}}</textarea>
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
@endsection
