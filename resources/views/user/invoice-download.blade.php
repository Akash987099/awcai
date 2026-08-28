<style>
    @import url(https://fonts.bunny.net/css?family=alata:400);

    body {
        background-color: #f3f4f6;
        font-family: "Alata", sans-serif;
    }
</style>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.debug.js"
    integrity="sha384-NaWTHo/8YCBYJ59830LTz/P4aQZK1sS0SneOgAvhsIl3zBu8r9RevNg5lHCHAuQ/" crossorigin="anonymous">
</script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css">
<div class="max-w-3xl mx-auto p-6 bg-white rounded shadow-sm my-6" id="invoice">

    <div class="grid grid-cols-2 items-center">
        <div>
            <img src="{{ asset('assets/img/logo.png') }}" alt="company-logo" class="bg-gray-800" height="100"
                width="100">
        </div>

        <div class="text-right">
            <p>
                Arya Web Coding.
            </p>
            <p class="text-gray-500 text-sm">
                aryawebcoding@gmail.com
            </p>
            <p class="text-gray-500 text-sm mt-1">
                +91-9870992118
            </p>
            <p class="text-gray-500 text-sm mt-1">
                PAN: KOGPK2424P
            </p>
            <p class="text-gray-500 text-sm mt-1">
                Address: Pavitra Marriage home nh2 reoad tundla Agra
            </p>
        </div>
    </div>

    <!-- Client info -->
    <div class="grid grid-cols-2 items-center mt-8">
        <div>
            <p class="font-bold text-gray-800">
                Bill to :
            </p>
            <p class="text-gray-500">
                {{ $projects->username }}
            </p>
            <p class="text-gray-500">
                {{ $projects->email }}
            </p>
        </div>

        <div class="text-right">
            <p class="">
                Invoice number:
                <span class="text-gray-500">INV-{{ str_pad($projects->id, 5, '0', STR_PAD_LEFT) }}</span>
            </p>
            <p>
                Invoice date: <span class="text-gray-500">{{ \Carbon\Carbon::now()->format('d/m/Y') }}</span>
                <br />
                Payment date: <span
                    class="text-gray-500">{{ \Carbon\Carbon::parse($projects->created_at)->format('d/m/y') }}</span>
            </p>
        </div>
    </div>

    <!-- Invoice Items -->
    <div class="-mx-4 mt-8 flow-root sm:mx-0">
        <table class="min-w-full">
            <colgroup>
                <col class="w-full sm:w-1/2">
                <col class="sm:w-1/6">
                <col class="sm:w-1/6">
                <col class="sm:w-1/6">
            </colgroup>
            <thead class="border-b border-gray-300 text-gray-900">
                <tr>
                    <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-0">
                        Name</th>
                    <th scope="col"
                        class="hidden px-3 py-3.5 text-right text-sm font-semibold text-gray-900 sm:table-cell">Actual
                        Amount</th>
                    <th scope="col"
                        class="hidden px-3 py-3.5 text-right text-sm font-semibold text-gray-900 sm:table-cell">Discount
                    </th>
                    <th scope="col"
                        class="hidden px-3 py-3.5 text-right text-sm font-semibold text-gray-900 sm:table-cell">Price
                    </th>
                    <th scope="col" class="py-3.5 pl-3 pr-4 text-right text-sm font-semibold text-gray-900 sm:pr-0">
                        Amount</th>
                </tr>
            </thead>
            <tbody>
                <tr class="border-b border-gray-200">
                    <td class="max-w-0 py-5 pl-4 pr-3 text-sm sm:pl-0">
                        <div class="font-medium text-gray-900">{{ $projects->project_name }}</div>
                    </td>
                    <td class="hidden px-3 py-5 text-right text-sm text-gray-500 sm:table-cell">
                        {{ number_format($projects->actual_price) }}
                    </td>

                    <td class="hidden px-3 py-5 text-right text-sm text-gray-500 sm:table-cell">
                        {{ number_format($projects->actual_price - $projects->price) }}
                    </td>

                    <td class="hidden px-3 py-5 text-right text-sm text-gray-500 sm:table-cell">
                        {{ number_format($projects->price) }}
                    </td>

                    <td class="py-5 pl-3 pr-4 text-right text-sm text-gray-500 sm:pr-0">
                        {{ number_format($projects->price) }}
                    </td>
                </tr>
            </tbody>
            <tfoot>
                <tr>
                    <th scope="row" colspan="4"
                        class="hidden pl-4 pr-3 pt-6 text-right text-sm font-normal text-gray-500 sm:table-cell sm:pl-0">
                        Subtotal</th>
                    <th scope="row" class="pl-6 pr-3 pt-6 text-left text-sm font-normal text-gray-500 sm:hidden">
                        Subtotal</th>
                    <td class="pl-3 pr-6 pt-6 text-right text-sm text-gray-500 sm:pr-0">{{ number_format($projects->price) }}</td>
                </tr>
                <tr>
                    <th scope="row" colspan="4"
                        class="hidden pl-4 pr-3 pt-4 text-right text-sm font-normal text-gray-500 sm:table-cell sm:pl-0">
                        Discount</th>
                    <th scope="row" class="pl-6 pr-3 pt-4 text-left text-sm font-normal text-gray-500 sm:hidden">
                        Discount</th>
                    <td class="pl-3 pr-6 pt-4 text-right text-sm text-gray-500 sm:pr-0">{{ number_format($projects->actual_price - $projects->price) }}</td>
                </tr>
                <tr>
                    <th scope="row" colspan="4"
                        class="hidden pl-4 pr-3 pt-4 text-right text-sm font-semibold text-gray-900 sm:table-cell sm:pl-0">
                        Total</th>
                    <th scope="row" class="pl-6 pr-3 pt-4 text-left text-sm font-semibold text-gray-900 sm:hidden">
                        Total</th>
                    <td class="pl-3 pr-4 pt-4 text-right text-sm font-semibold text-gray-900 sm:pr-0">{{ number_format($projects->price) }}.00</td>
                </tr>
            </tfoot>
        </table>
    </div>

    <!--  Footer  -->
   <div class="border-t-2 pt-4 text-xs text-gray-500 text-center mt-16">
    This is a computer-generated invoice and does not require a physical signature or stamp.
</div>


</div>

<!-- <button type="button" id="btn" class="">Print</button> -->
