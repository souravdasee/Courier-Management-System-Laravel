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
                            <p class="p-2">Method to pay</p>
                            <form action="/payment" method="POST">
                                @csrf
                                <div class="p-2">
                                    <select class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" name="method" required>
                                        <option value="UPI">UPI</option>
                                        <option value="Card">Card</option>
                                    </select>
                                </div>

                                <button type="submit" class="text-blue-700 hover:text-white border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 dark:border-blue-500 dark:text-blue-500 dark:hover:text-white dark:hover:bg-blue-500 dark:focus:ring-blue-800">Pay Now</button>
                            </form>
                        </div>
                    </div>

                    <a href="/dashboard">
                        <button class="text-blue-700 hover:text-white border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 dark:border-blue-500 dark:text-blue-500 dark:hover:text-white dark:hover:bg-blue-500 dark:focus:ring-blue-800">Back</button>
                    </a>
                </div>

                <div class="flex items-center justify-between bg-white dark:bg-gray-800 px-4 py-3 sm:px-6">
                    <nav class="flex" aria-label="Breadcrumb">
                        <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
                          <li class="inline-flex items-center">
                            <a href="/dashboard" class="inline-flex items-center text-sm font-medium text-green-500 hover:text-red-600 dark:hover:text-yellow-500">
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
                              <a href="/payment" class="ms-1 text-sm font-medium text-blue-500 hover:text-red-600 dark:hover:text-yellow-500"  md:ms-2 dark:text-gray-400">Payment</a>
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
