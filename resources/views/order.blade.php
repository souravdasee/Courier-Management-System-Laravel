<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Orders') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-2  text-gray-900 dark:text-gray-100">
                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                        <table class="w-full text-sm rtl:text-right text-gray-500 dark:text-gray-400 text-center">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                        Time of booking
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        From
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        To
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Amount
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Payment Status
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Tracking ID
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Current Status
                                    </th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach($checkouts as $checkout)
                                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                        <td class="px-6 py-4">{{ $checkout['created_at'] }}</td>
                                        <td class="px-6 py-4">{{ $checkout['from'] }}</td>
                                        <td class="px-6 py-4">{{ $checkout['to'] }}</td>
                                        <td class="px-6 py-4">{{ $checkout['parcel_amounts'] }}</td>
                                        <td class="px-6 py-4">{{ $checkout['payment_status'] }}</td>
                                        <td class="px-6 py-4">{{ $checkout['tracking_id'] }}</td>
                                        <td class="px-6 py-4">{{ $checkout['current_status'] }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $checkouts->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
