@extends('user.layout.app')

@section('content')
    <div class="sm:ml-40">
        <div class="rounded-lg dark:border-gray-700 mt-14">

            <div class="bg-white dark:bg-gray-800 rounded-lg shadow p-4">
                <div class="flex flex-col md:flex-row justify-between items-center mb-6 gap-2">
                    <h2 class="text-xl font-semibold text-gray-800 dark:text-white">Add</h2>

                    <a href="{{ route('admin.role.index') }}"
                        class="bg-gray-200 hover:bg-gray-300 text-gray-800 px-4 py-2 rounded-md text-sm dark:bg-gray-700 dark:text-white dark:hover:bg-gray-600">
                        ← Back to List
                    </a>
                </div>

                <form action="{{ route('user.review.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="purchase_id" value="{{ $purchase->id }}">
                    <input type="hidden" name="project_id" value="{{ $purchase->project_id }}">

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="flex flex-col">
                            <label for="name" class="text-sm font-medium text-gray-700 dark:text-gray-200">Name</label>
                            <input type="text" name="name" value="{{ $project->name }}" id="name"
                                placeholder="Enter Details" readonly
                                class="mt-1 px-4 py-2 border border-gray-300 rounded-md dark:bg-gray-700 dark:text-white dark:border-gray-600 focus:ring-blue-500 focus:border-blue-500">
                        </div>

                        <div class="flex flex-col">
                            <label for="name"
                                class="text-sm font-medium text-gray-700 dark:text-gray-200">Amount</label>
                            <input type="text" name="name" value="{{ $purchase->amount }}" id="name"
                                placeholder="Enter Details" readonly
                                class="mt-1 px-4 py-2 border border-gray-300 rounded-md dark:bg-gray-700 dark:text-white dark:border-gray-600 focus:ring-blue-500 focus:border-blue-500">
                        </div>

                        <div class="flex flex-col">
                            <label for="name" class="text-sm font-medium text-gray-700 dark:text-gray-200">Ref
                                No.</label>
                            <input type="text" name="name" value="{{ $purchase->ref_no }}" id="name"
                                placeholder="Enter Details" readonly
                                class="mt-1 px-4 py-2 border border-gray-300 rounded-md dark:bg-gray-700 dark:text-white dark:border-gray-600 focus:ring-blue-500 focus:border-blue-500">
                        </div>

                        <div class="flex flex-col">
                            <label for="name" class="text-sm font-medium text-gray-700 dark:text-gray-200">Payment
                                Mode</label>
                            <input type="text" name="name" value="{{ $purchase->payment_mode }}" id="name"
                                placeholder="Enter Details" readonly
                                class="mt-1 px-4 py-2 border border-gray-300 rounded-md dark:bg-gray-700 dark:text-white dark:border-gray-600 focus:ring-blue-500 focus:border-blue-500">
                        </div>

                        <div class="flex flex-col">
                            <label for="name"
                                class="text-sm font-medium text-gray-700 dark:text-gray-200">Rating</label>

                            <select name="rating" id="rating" required
                                class="mt-1 px-4 py-2 border border-gray-300 rounded-md dark:bg-gray-700 dark:text-white dark:border-gray-600 focus:ring-blue-500 focus:border-blue-500">

                                <option value="1" {{ isset($review) && $review->rating == 1 ? 'selected' : '' }}>1
                                </option>
                                <option value="2" {{ isset($review) && $review->rating == 2 ? 'selected' : '' }}>2
                                </option>
                                <option value="3" {{ isset($review) && $review->rating == 3 ? 'selected' : '' }}>3
                                </option>
                                <option value="4" {{ isset($review) && $review->rating == 4 ? 'selected' : '' }}>4
                                </option>
                                <option value="5" {{ isset($review) && $review->rating == 5 ? 'selected' : '' }}>5
                                </option>

                            </select>
                        </div>


                        <div class="flex flex-col">
                            <label for="name"
                                class="text-sm font-medium text-gray-700 dark:text-gray-200">Message</label>
                            <textarea type="text" name="message" value="{{ $purchase->payment_mode }}" id="message"
                                placeholder="Enter Details"
                                class="mt-1 px-4 py-2 border border-gray-300 rounded-md dark:bg-gray-700 dark:text-white dark:border-gray-600 focus:ring-blue-500 focus:border-blue-500">{!! $review->description ?? '-' !!}</textarea>
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
