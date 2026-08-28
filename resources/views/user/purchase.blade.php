@extends('user.layout.app')
@section('content')
    <div class="sm:ml-40">
        <div class="rounded-lg dark:border-gray-700 mt-14">

            <div class="bg-white dark:bg-gray-800 rounded-lg shadow p-4 md:p-6">
                <div class="flex flex-col md:flex-row justify-between items-center mb-6 gap-2">
                    <h2 class="text-xl font-semibold text-gray-800 dark:text-white">Purchase</h2>

                    <a href="{{ route('user.project.purchase-payment') }}"
                        class="bg-gray-200 hover:bg-gray-300 text-gray-800 px-4 py-2 rounded-md text-sm dark:bg-gray-700 dark:text-white dark:hover:bg-gray-600">
                        ← Back to List
                    </a>
                </div>

                <!-- Note Section -->
                <div class="mb-8 p-4 bg-blue-50 border border-blue-100 rounded-lg dark:bg-blue-900/20 dark:border-blue-800">
                    <p class="text-sm text-blue-700 dark:text-blue-300 font-medium">
                        <span class="font-bold">{{$project->name ?? '-'}}</span>
                    </p>
                </div>

                <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                    <!-- Left Column: Form -->
                    <div>
                        <form action="{{ route('user.project.purchase-payment') }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf

                            <input type="hidden" name="project_id" value="{{$project->id}}">

                            <div class="space-y-6">
                                <!-- Payment Mode Selection -->
                                <div class="flex flex-col">
                                    <label class="text-sm font-medium text-gray-700 dark:text-gray-200 mb-2">Payment
                                        Mode</label>
                                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                                        <label
                                            class="flex items-center p-3 border border-gray-300 dark:border-gray-600 rounded-lg cursor-pointer hover:bg-gray-50 dark:hover:bg-gray-700">
                                            <input type="radio" name="payment_mode" value="online"
                                                class="h-4 w-4 text-blue-600 focus:ring-blue-500" checked>
                                            <span class="ml-2 text-sm text-gray-700 dark:text-gray-300">Online
                                                E-Transfer</span>
                                        </label>
                                        <label
                                            class="flex items-center p-3 border border-gray-300 dark:border-gray-600 rounded-lg cursor-pointer hover:bg-gray-50 dark:hover:bg-gray-700">
                                            <input type="radio" name="payment_mode" value="bank"
                                                class="h-4 w-4 text-blue-600 focus:ring-blue-500">
                                            <span class="ml-2 text-sm text-gray-700 dark:text-gray-300">Bank Transfer</span>
                                        </label>
                                    </div>
                                </div>

                                <!-- Amount and Reference Number -->
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                    <div class="flex flex-col">
                                        <label for="amount"
                                            class="text-sm font-medium text-gray-700 dark:text-gray-200 mb-2">Amount</label>
                                        <input type="number" name="amount" id="amount"
                                            placeholder="" value="{{$project->price}}" readonly
                                            class="px-4 py-3 border border-gray-300 rounded-lg dark:bg-gray-700 dark:text-white dark:border-gray-600 focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                                    </div>

                                    <div class="flex flex-col">
                                        <label for="ref_no"
                                            class="text-sm font-medium text-gray-700 dark:text-gray-200 mb-2">Ref No</label>
                                        <input type="text" name="ref_no" id="ref_no"
                                            placeholder="Enter reference number" required
                                            class="px-4 py-3 border border-gray-300 rounded-lg dark:bg-gray-700 dark:text-white dark:border-gray-600 focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                                    </div>
                                </div>

                                <!-- Bank Selection (Conditional) -->
                                <div id="bankSelection" class="hidden flex flex-col">
                                    <label for="bank"
                                        class="text-sm font-medium text-gray-700 dark:text-gray-200 mb-2">Bank</label>
                                    <input type="text" name="bank" id="bank"
                                        placeholder="Please Enter your bank name"
                                        class="px-4 py-3 border border-gray-300 rounded-lg dark:bg-gray-700 dark:text-white dark:border-gray-600 focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                                </div>

                                <!-- QR Code (Conditional) -->
                                <div id="qrSection" class="flex-col">
                                    <label class="text-sm font-medium text-gray-700 dark:text-gray-200 mb-2">QR Code</label>
                                    <div
                                        class="border-2 border-dashed border-gray-300 dark:border-gray-600 rounded-lg p-8 text-center">
                                        <div class="flex flex-col items-center justify-center">
                                            <div
                                                class="w-48 h-48 bg-gray-100 dark:bg-gray-700 flex items-center justify-center rounded-lg mb-4">
                                                <!-- QR Code Placeholder -->
                                                <div class="text-center">
                                                    <div class="w-32 h-32 mx-auto bg-white p-2 rounded">
                                                        <!-- Simple QR pattern representation -->
                                                        <div class="grid grid-cols-5 gap-1">
                                                            <div class="col-span-5">
                                                                <img src="{{ asset('assets/img/paytm_payment_qr.jpg') }}"
                                                                    alt="PayTM Payment QR Code"
                                                                    class="w-full h-auto object-contain rounded-lg">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <p class="text-xs text-gray-500 dark:text-gray-400 mt-2">Scan QR Code to
                                                        Pay</p>
                                                </div>
                                            </div>
                                            <p class="text-sm text-gray-600 dark:text-gray-400">Scan this QR code with your
                                                UPI app to complete payment</p>
                                        </div>
                                    </div>
                                </div>

                                <!-- Remarks -->
                                <div class="flex flex-col">
                                    <label for="remarks"
                                        class="text-sm font-medium text-gray-700 dark:text-gray-200 mb-2">Remarks</label>
                                    <textarea name="remarks" id="remarks" rows="3" placeholder="Enter any remarks (optional)"
                                        class="px-4 py-3 border border-gray-300 rounded-lg dark:bg-gray-700 dark:text-white dark:border-gray-600 focus:ring-2 focus:ring-blue-500 focus:border-blue-500"></textarea>
                                </div>

                                <!-- Submit Button -->
                                <div class="pt-4">
                                    <button type="submit"
                                        class="bg-blue-600 hover:bg-blue-700 text-white px-8 py-3 rounded-lg text-sm font-medium transition duration-200 w-full sm:w-auto">
                                        Submit Request
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>

                    <!-- Right Column: Bank Account Details -->
                    <div>
                        <div
                            class="bg-gray-50 dark:bg-gray-700/50 rounded-lg border border-gray-200 dark:border-gray-600 p-6">
                            <h3
                                class="text-lg font-semibold text-blue-700 dark:text-blue-300 mb-4 pb-3 border-b border-gray-200 dark:border-gray-600">
                                Bank Account Details
                            </h3>

                            <div class="space-y-4">
                                <div>
                                    <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Bank Name</p>
                                    <p class="text-blue-700 dark:text-blue-300 font-medium">ICICI Bank Limited</p>
                                </div>

                                <div>
                                    <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Account Holder Name</p>
                                    <p class="text-blue-700 dark:text-blue-300 font-medium">Akash Kumar</p>
                                </div>

                                <div>
                                    <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Account Number</p>
                                    <p class="text-blue-700 dark:text-blue-300 font-medium">337401505256</p>
                                </div>

                                <div>
                                    <p class="text-sm font-medium text-gray-500 dark:text-gray-400">IFSC Code</p>
                                    <p class="text-blue-700 dark:text-blue-300 font-medium">ICIC0003374</p>
                                </div>

                                <div>
                                    <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Branch</p>
                                    <p class="text-blue-700 dark:text-blue-300 font-medium">3374 New Delhi Kapasheda Delhi</p>
                                </div>
                            </div>

                            <!-- Important Note -->
                            <div
                                class="mt-8 p-4 bg-amber-50 border border-amber-100 rounded-lg dark:bg-amber-900/20 dark:border-amber-800">
                                <p class="text-sm text-amber-700 dark:text-amber-300">
                                    <span class="font-bold">Important:</span> Please include the Reference Number in the
                                    payment description when transferring funds.
                                </p>
                            </div>
                        </div>

                        <!-- Request Summary -->
                        <div
                            class="mt-6 bg-gray-50 dark:bg-gray-700/50 rounded-lg border border-gray-200 dark:border-gray-600 p-6">
                            <h3 class="text-lg font-semibold text-blue-700 dark:text-blue-300 mb-4">Request Summary</h3>

                            <div class="space-y-3">
                                <div class="flex justify-between items-center">
                                    <span class="text-gray-600 dark:text-gray-400">Payment Mode:</span>
                                    <span class="text-gray-800 dark:text-white font-medium">Online E-Transfer</span>
                                </div>
                                <div class="flex justify-between items-center">
                                    <span class="text-gray-600 dark:text-gray-400">Amount:</span>
                                    <span class="text-gray-800 dark:text-white font-medium">₹ {{$project->price}}.00</span>
                                </div>
                                <div class="flex justify-between items-center">
                                    <span class="text-gray-600 dark:text-gray-400">Status:</span>
                                    <span
                                        class="px-2 py-1 text-xs font-medium bg-gray-100 text-gray-800 rounded dark:bg-gray-600 dark:text-gray-200">Pending</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Toggle between QR code and bank selection based on payment mode
        document.addEventListener('DOMContentLoaded', function() {
            const paymentModeRadios = document.querySelectorAll('input[name="payment_mode"]');
            const bankSelection = document.getElementById('bankSelection');
            const qrSection = document.getElementById('qrSection');

            function togglePaymentSections() {
                const selectedMode = document.querySelector('input[name="payment_mode"]:checked').value;

                if (selectedMode === 'bank') {
                    bankSelection.classList.remove('hidden');
                    qrSection.classList.add('hidden');
                } else {
                    bankSelection.classList.add('hidden');
                    qrSection.classList.remove('hidden');
                }
            }

            // Add event listeners to radio buttons
            paymentModeRadios.forEach(radio => {
                radio.addEventListener('change', togglePaymentSections);
            });

            // Initialize on page load
            togglePaymentSections();

            // Update amount in summary
            const amountInput = document.getElementById('amount');
            const amountDisplay = document.querySelector(
                '.flex.justify-between.items-center:nth-child(2) .text-gray-800');

            amountInput.addEventListener('input', function() {
                if (this.value) {
                    amountDisplay.textContent = `₹ ${parseInt(this.value).toLocaleString('en-IN')}.00`;
                } else {
                    amountDisplay.textContent = '₹ 0.00';
                }
            });
        });
    </script>

    <style>
        /* Custom styling for better appearance */
        input[type="number"]::-webkit-inner-spin-button,
        input[type="number"]::-webkit-outer-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        input[type="number"] {
            -moz-appearance: textfield;
        }

        .border-dashed {
            border-style: dashed;
        }
    </style>
@endsection
