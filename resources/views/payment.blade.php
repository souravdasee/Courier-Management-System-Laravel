<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Payment') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="grid grid-cols-4">
                        <div class="pr-10">
                            <p>Parcel details</p>
                            <div class="bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-100 border p-6">
                                <div><p>From: {{ $couriers['from'] }}</p></div>
                                <div><p>To: {{ $couriers['to'] }}</p></div>
                                <div><p>Weight: {{ $couriers['weight'] }}</p></div>
                            </div>
                        </div>

                        <div class="pr-10">
                            <p>Amount to pay</p>
                            <div class="bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-100">
                                <div class="border p-4">
                                    <p>Shipping Cost:@foreach ($parcelamounts as $parcelamount)₹{{ $parcelamount['price'] }}@endforeach</p>
                                    <p>Platform fee: ₹<?= 10 ?></p>
                                    <p>---------------------------</p>
                                    <p>Total amount to pay = @foreach ($parcelamounts as $parcelamount)₹{{ $parcelamount['price'] + 10 }}@endforeach</p>
                                </div>
                            </div>
                        </div>
                        <div class="grid grid-cols-2">
                            <p>Method to pay</p>
                            <form action="/payment" method="POST">
                                @csrf
                                <div>
                                    <select class="bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-100" name="method" required>
                                        <option value="upi">UPI</option>
                                        <option value="card">Card</option>
                                    </select>
                                </div>

                                <button type="submit" class="p-2 my-5 bg-white dark:bg-gray-800 text-blue-500 hover:text-black hover:bg-white hover:dark:bg-gray-600">Pay Now</button>
                            </form>
                        </div>
                    </div>

                    <a href="/dashboard">
                        <button class="p-2 my-5 bg-white dark:bg-gray-800 text-blue-500 hover:text-black hover:bg-white hover:dark:bg-gray-600">Back</button>
                    </a>
                </div>

                <div class="flex items-center justify-between bg-white dark:bg-gray-800 px-4 py-3 sm:px-6">
                    <div class="hidden sm:flex sm:flex-1 sm:items-center sm:justify-between">
                        <div>
                            <nav class="isolate inline-flex -space-x-px rounded-md shadow-sm" aria-label="Pagination">
                                <a href="/dashboard" class="relative inline-flex items-center px-4 py-2 text-sm font-semibold bg-green-400 dark:bg-green-700 text-gray-900 dark:text-gray-50 ring-1 ring-inset ring-gray-300  focus:outline-offset-0">Step 1</a>
                                <a class="relative inline-flex items-center px-4 py-2 text-sm font-semibold bg-blue-400 dark:bg-blue-700 text-gray-900 dark:text-gray-50 ring-2 ring-inset ring-black  focus:outline-offset-0">Step 2</a>
                                <a class="relative inline-flex items-center px-4 py-2 text-sm font-semibold text-gray-700 dark:text-gray-50 ring-1 ring-inset ring-gray-300  focus:outline-offset-0">Step 3</a>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
