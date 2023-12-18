<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Book a Shipment') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form action="/book" method="POST">
                        @csrf

                        <div>
                            <div class="grid grid-cols-3">
                                <div class="p-2">
                                    <p>Sender's Name:<span class="text-red-500">*</span></p>
                                    <input type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" name="sender_name" placeholder="Enter sender's name" required>
                                </div>

                                <div class="p-2">
                                    <p>Recipient's Name:<span class="text-red-500">*</span></p>
                                    <input type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" name="recipient_name" placeholder="Enter recipient's name" required>
                                </div>

                                <div class="p-2">
                                    <p>Parcel Item Type</p>
                                    <input class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" type="text" name="item_type" placeholder="(E.g.: Electronic, Household, Books, etc.)">
                                </div>
                            </div>

                            <div class="grid grid-cols-3">
                                <div class="p-2">
                                    <p>From<span class="text-red-500">*</span></p>
                                    <select class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" name="from" autofocus required>
                                        @foreach ($locations as $location)
                                            <option value="{{$location['location']}}">{{$location['location']}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="p-2">
                                    <p>To<span class="text-red-500">*</span></p>
                                    <select class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" name="to" required>
                                        @foreach ($locations as $location)
                                            <option value="{{$location['location']}}">{{$location['location']}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="p-2">
                                    <p>Weight<span class="text-red-500">*</span>(in KGs)</p>
                                    <input class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" type="number" name="weight" step="0.01" placeholder="max upto 2 decimals" required>
                                </div>
                            </div>

                            <div class="grid grid-cols-2">
                                <div class="p-2">
                                    <p>Sender's Address<span class="text-red-500">*</span></p>
                                    <textarea class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" name="sender_address" required></textarea>
                                </div>

                                <div class="p-2">
                                    <p>Recipient's Address<span class="text-red-500">*</span></p>
                                    <textarea class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" name="recipient_address" required></textarea>

                                </div>
                            </div>
                        </div>

                        <button type="submit" class="text-blue-700 hover:text-white border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 dark:border-blue-500 dark:text-blue-500 dark:hover:text-white dark:hover:bg-blue-500 dark:focus:ring-blue-800">Next</button>
                    </form>
                </div>

                <div class="flex items-center justify-between bg-white dark:bg-gray-800 px-4 py-3 sm:px-6">
                    <nav class="flex" aria-label="Breadcrumb">
                        <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
                          <li class="inline-flex items-center">
                            <a href="/dashboard" class="inline-flex items-center text-sm font-medium text-blue-500 hover:text-red-600 dark:hover:text-yellow-500">
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
                              <span class="ms-1 text-sm font-medium text-gray-700 md:ms-2 dark:text-gray-400">Payment</span>
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
