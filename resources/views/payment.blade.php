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
                    @if($couriers->sender_address === $couriers->recipient_address)
                        <p class="p-4">Sorry, Please choose different location of delivery and pickup</p>
                    @else

                    <p class="text-2xl">Parcel details</p>
                    <div class="pr-10">
                        <div class="p-4 bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-100">
                            <div><p><span class="underline">From </span>: {{ $couriers->from }}</p></div>
                            <div><p><span class="underline">To </span>: {{ $couriers->to }}</p></div>
                            <div><p><span class="underline">Weight </span>: {{ $couriers->weight }} gm</p></div>
                            <div><p><span class="underline">Distance </span>: {{ $couriers->distance }} KM</p></div>
                        </div>
                    </div>

                    <div class="pr-10">
                        <p class="text-2xl" >Amount to pay</p>
                        <div class="p-4 bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-100">
                            <p><span class="underline">Shipping Cost </span>: ₹{{ $parcelamounts }}</p>
                            <p><span class="underline">Platform fee</span>: ₹<?= 10 ?></p>
                            <p>--------------------</p>
                            <p>Total amount to pay = ₹{{ $parcelamounts + 10 }}</p>
                        </div>
                    </div>
                    <div class="grid grid-cols-2">
                        <p class="p-2">Method to pay</p>
                        <form action="/payment" method="POST">
                            @csrf
                            <div class="p-2">
                                <select class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" name="method" required>
                                    <option value="UPI">UPI</option>
                                    <option value="Card">Card</option>
                                </select>
                            </div>
                            <input type="hidden" value="{{ $couriers->sender_name }}" name="sender_name" readonly>
                            <input type="hidden" value="{{ $couriers->recipient_name }}" name="recipient_name" readonly>
                            <input type="hidden" value="{{ $couriers->weight }}" name="weight" readonly>
                            <input type="hidden" value="{{ $couriers->sender_number }}" name="sender_number" readonly>
                            <input type="hidden" value="{{ $couriers->recipient_number }}" name="recipient_number" readonly>
                            <input type="hidden" value="{{ $couriers->from }}" name="from" readonly>
                            <input type="hidden" value="{{ $couriers->to }}" name="to" readonly>
                            <input type="hidden" value="{{ $couriers->sender_address }}" name="sender_address" readonly>
                            <input type="hidden" value="{{ $couriers->recipient_address }}" name="recipient_address" readonly>
                            <input type="hidden" value="{{ $couriers->distance }}" name="distance" readonly>
                            <input type="hidden" value="{{ $parcelamounts + 10 }}" name="amount" readonly>

                            <button type="submit" class="p-2 text-blue-700 hover:text-white border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 dark:border-blue-500 dark:text-blue-500 dark:hover:text-white dark:hover:bg-blue-500 dark:focus:ring-blue-800">Pay Now</button>
                        </form>
                    </div>
                    @endif

                    <a href="/book">
                        <button class="text-blue-700 hover:text-white border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 dark:border-blue-500 dark:text-blue-500 dark:hover:text-white dark:hover:bg-blue-500 dark:focus:ring-blue-800">Back</button>
                    </a>
                </div>

                <div class="flex items-center justify-between bg-white dark:bg-gray-800 px-4 py-3 sm:px-6">
                    <nav class="flex" aria-label="Breadcrumb">
                        <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
                            <li class="inline-flex items-center">
                                <a href="/book" class="inline-flex items-center text-sm font-medium text-green-500 hover:text-red-600 dark:hover:text-yellow-500">
                                    <svg class="w-3 h-3 me-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z"/>
                                    </svg>
                                    Book
                                </a>
                            </li>
                            <li>
                                <div class="flex items-center">
                                    <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                                    </svg>
                                    <a href="/payment" class="ms-1 text-sm font-medium text-blue-500 hover:text-red-600 dark:hover:text-yellow-500 md:ms-2 dark:text-gray-400">Payment</a>
                                </div>
                            </li>
                            <li aria-current="page">
                                <div class="flex items-center">
                                    <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                                    </svg>
                                    <span class="ms-1 text-sm font-medium text-gray-500 md:ms-2 dark:text-gray-400">Checkout</span>
                                </div>
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
