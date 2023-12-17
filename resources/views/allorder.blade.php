<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('All Orders') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-full mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-2  text-gray-900 dark:text-gray-100">
                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                        <table class="w-full text-sm rtl:text-right text-gray-500 dark:text-gray-400 text-center">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-1 py-3">Time of booking</th>
                                    <th scope="col" class="px-1 py-3">Booking person name</th>
                                    <th scope="col" class="px-1 py-3">Booking person role</th>
                                    <th scope="col" class="px-1 py-3">From</th>
                                    <th scope="col" class="px-1 py-3">To</th>
                                    <th scope="col" class="px-1 py-3">Weight</th>
                                    <th scope="col" class="px-1 py-3">Parcel amount</th>
                                    <th scope="col" class="px-1 py-3">Payment method</th>
                                    <th scope="col" class="px-1 py-3">Payment Status</th>
                                    <th scope="col" class="px-1 py-3">Tracking ID</th>
                                    <th scope="col" class="px-1 py-3">Current Status</th>
                                    <th scope="col" class="px-1 py-3">Remarks</th>
                                    <th scope="col" class="px-1 py-3">Edit</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach($orders as $order)
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                    <td class="px-1 py-4">{{ $order->created_at->format('d-m-Y') }}</td>
                                    <td class="px-1 py-4">{{$order->users_name }}</td>
                                    <td class="px-1 py-4">{{ $order->role }}</td>
                                    <td class="px-1 py-4">{{ $order->from }}</td>
                                    <td class="px-1 py-4">{{ $order['to'] }}</td>
                                    <td class="px-1 py-4">{{ $order['weight'] }}</td>
                                    <td class="px-1 py-4">{{ $order->parcel_amounts }}</td>
                                    <td class="px-1 py-4">{{ $order['payment_method'] }}</td>
                                    <td class="px-1 py-4">{{ $order['payment_status'] }}</td>
                                    <td class="px-1 py-4">{{ $order['tracking_id'] }}</td>
                                    <td class="px-1 py-4">{{ $order['current_status'] }}</td>
                                    <td class="px-1 py-4">{!! $order['remarks'] !!}</td>
                                    <td class="px-6 py-4 text-right">
                                        <a href="{{"/adminedit/".$order['id']}}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    {{ $orders->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
