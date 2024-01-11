<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Checkout') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form method="POST" action="/checkout">
                        @csrf
                        <div class="p-2">
                            <p class="text-5xl">Parcel details</p>
                            <div class="bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-100 p-2">
                                <div class="hidden">
                                    Booking person name:
                                    <select
                                        class="grid-cols-1 bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-100"
                                        name='name'>
                                        <option value="@foreach ($users as $user){{ $user['name'] }} @endforeach">
                                            @foreach ($users as $user)
                                                {{ $user['name'] }}
                                            @endforeach
                                        </option>
                                    </select>
                                </div>

                                <div class="hidden">
                                    Booking person role:
                                    <select
                                        class="grid-cols-1 bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-100"
                                        name='role'>
                                        <option value="{{ $roles }}">
                                            {{ $roles }}
                                        </option>
                                    </select>
                                </div>

                                <div class="flex mr-12">
                                    Parcel from:
                                    <p>{{ $couriers['from'] }}</p>
                                    <select
                                        class="hidden grid-cols-1 bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-100"
                                        name='from'>
                                        <option value="{{ $couriers['from'] }}">
                                            {{ $couriers['from'] }}
                                        </option>
                                    </select>
                                </div>

                                <div class="flex mr-12">
                                    Parcel to:
                                    <p>{{ $couriers['to'] }}</p>
                                    <select
                                        class=" hidden grid-cols-1 bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-100"
                                        name='to'>
                                        <option value="{{ $couriers['to'] }}">
                                            {{ $couriers['to'] }}
                                        </option>
                                    </select>
                                </div>

                                <div class="flex mr-12">
                                    Parcel weight: <p>{{ $couriers->weight }}gm</p>
                                    <input type="number" step="0.01" value="{{ $couriers->weight }}" class="hidden"
                                        name="weight">
                                </div>

                                <div class="flex mr-12">
                                    Distance: <p>{{ $couriers->distance }}km</p>
                                    <input type="number" step="0.01" value="{{ $couriers->distance }}"
                                        class="hidden" name="distance">
                                </div>

                                <div class="flex mr-12">
                                    Paid amount: <p>₹{{ $paymentmethods->amount }}</p>
                                    <input type="hidden" name="parcel_amounts" value="{{ $paymentmethods->amount }}">
                                </div>

                                <div class="flex mr-12">
                                    Payment method: <p>{{ $paymentmethods['method'] }}</p>
                                    <select
                                        class="hidden grid-cols-1 bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-100"
                                        name='payment_method'>
                                        <option value="{{ $paymentmethods['method'] }}">
                                            {{ $paymentmethods['method'] }}
                                        </option>
                                    </select>
                                </div>

                                <div class="flex mr-12">
                                    payment status: <p>Paid</p>
                                    <select
                                        class="hidden grid-cols-1 bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-100"
                                        name='payment_status'>
                                        <option value="Paid">
                                            Paid
                                        </option>
                                    </select>
                                </div>

                                <div class="flex mr-12">
                                    <label for="tracking_id" class="mt-2">Tracking ID: </label>
                                    <input type="text" name="tracking_id" id="tracking_id"
                                        class="border-none w-full dark:bg-gray-800 text-white"
                                        placeholder="scan the barcode to generate tracking number" autofocus>
                                    @error('tracking_id')
                                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                    @enderror
                                </div>

                                <input type="hidden" value="{{ $paymentmethods->sender_name }}" name="sender_name"
                                    readonly>
                                <input type="hidden" value="{{ $paymentmethods->recipient_name }}"
                                    name="recipient_name" readonly>
                                <input type="hidden" value="{{ $paymentmethods->sender_number }}" name="sender_number"
                                    readonly>
                                <input type="hidden" value="{{ $paymentmethods->recipient_number }}"
                                    name="recipient_number" readonly>
                                <input type="hidden" value="{{ $paymentmethods->sender_address }}"
                                    name="sender_address" readonly>
                                <input type="hidden" value="{{ $paymentmethods->recipient_address }}"
                                    name="recipient_address" readonly>
                                <input type="hidden" value="{{ $updates[0]->status }}" name="current_status" readonly>
                                <input type="hidden" value="{{ $paymentmethods->from }}" name="current_location"
                                    readonly>
                                <input type="hidden" name="timeline_data" readonly>
                            </div>
                        </div>

                        <button type="submit"
                            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2">Checkout<span
                                class="text-white">¹</span></button>
                    </form>

                    <p class="text-blue-500 dark:text-yellow-500 text-sm"><span class="text-white">¹</span>&nbsp;Attach
                        the BAR CODE to the packed box.</p>
                </div>

                <div class="flex items-center justify-between bg-white dark:bg-gray-800 px-4 py-3 sm:px-6">
                    <nav class="flex" aria-label="Breadcrumb">
                        <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
                            <li class="inline-flex items-center">
                                <a href="/dashboard"
                                    class="inline-flex items-center text-sm font-medium text-green-500 hover:text-red-600 dark:hover:text-yellow-500">
                                    <svg class="w-3 h-3 me-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                        fill="currentColor" viewBox="0 0 20 20">
                                        <path
                                            d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z" />
                                    </svg>
                                    Book
                                </a>
                            </li>
                            <li>
                                <div class="flex items-center">
                                    <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="m1 9 4-4-4-4" />
                                    </svg>
                                    <a href="/payment"
                                        class="ms-1 text-sm font-medium text-green-500 hover:text-red-600 dark:hover:text-yellow-500"
                                        md:ms-2 dark:text-gray-400">Payment</a>
                                </div>
                            </li>
                            <li aria-current="page">
                                <div class="flex items-center">
                                    <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="m1 9 4-4-4-4" />
                                    </svg>
                                    <a href="/checkout"
                                        class="ms-1 text-sm font-medium md:ms-2 text-blue-500 hover:text-red-600 dark:hover:text-yellow-500">Checkout</a>
                                </div>
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
            <div class="pt-6">
                <a href="/payment">
                    <button
                        class="text-blue-700 hover:text-white border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 dark:border-blue-500 dark:text-blue-500 dark:hover:text-white dark:hover:bg-blue-500 dark:focus:ring-blue-800">Back</button>
                </a>
            </div>
        </div>
    </div>
</x-app-layout>
