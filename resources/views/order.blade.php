<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Orders') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6  text-gray-900 dark:text-gray-100">
                    <table class="border">
                        <tr class="border">
                            <th class="border p-2">Time of booking</th>
                            <th class="border p-2">From</th>
                            <th class="border p-2">To</th>
                            <th class="border p-2">Amount</th>
                            <th class="border p-2">Payment Status</th>
                            <th class="border p-2">Tracking ID</th>
                            <th class="border p-2">Current Status</th>
                        </tr>
                        @foreach($checkouts as $checkout)
                            <tr class="border">
                                <td class="border p-2">{{ $checkout['created_at'] }}</td>
                                <td class="border p-2">{{ $checkout['from'] }}</td>
                                <td class="border p-2">{{ $checkout['to'] }}</td>
                                <td class="border p-2">{{ $checkout['parcel_amount'] }}</td>
                                <td class="border p-2">{{ $checkout['payment_status'] }}</td>
                                <td class="border p-2">{{ $checkout['tracking_id'] }}</td>
                        @endforeach
                                <td class="border p-2">Booked</td>
                            </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>