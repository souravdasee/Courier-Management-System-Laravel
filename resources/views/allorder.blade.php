<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('All Orders') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6  text-gray-900 dark:text-gray-100">
                    <table class="border">
                        <tr class="border">
                            <th class="border p-2">Time of booking</th>
                            <th class="border p-2">Booking person name</th>
                            <th class="border p-2">From</th>
                            <th class="border p-2">To</th>
                            <th class="border p-2">Weight</th>
                            <th class="border p-2">Parcel amount</th>
                            <th class="border p-2">Payment method</th>
                            <th class="border p-2">Payment Status</th>
                            <th class="border p-2">Tracking ID</th>
                            <th class="border p-2">Current Status</th>
                            <th class="border p-2">Edit</th>
                        </tr>
                        @foreach($orders as $order)
                            <tr class="border">
                                <td class="border p-2">{{ $order['created_at'] }}</td>
                                <td class="border p-2">{{ $order['user_name'] }}</td>
                                <td class="border p-2">{{ $order['from'] }}</td>
                                <td class="border p-2">{{ $order['to'] }}</td>
                                <td class="border p-2">{{ $order['weight'] }}</td>
                                <td class="border p-2">{{ $order['parcel_amount'] }}</td>
                                <td class="border p-2">{{ $order['payment_method'] }}</td>
                                <td class="border p-2">{{ $order['payment_status'] }}</td>
                                <td class="border p-2">{{ $order['tracking_id'] }}</td>
                                <td class="border p-2">{{ $order['current_status'] }}</td>
                                <td class="border p-2"><a href={{"/adminedit/".$order['id']}} class="bg-blue-500 p-2">Edit</a></td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
