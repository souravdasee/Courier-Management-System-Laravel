<x-app-layout>
    <x-slot name="header">
        <x-sub-menu />
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                        <form action="/status/receive" method="post">
                            @csrf
                            <input type="text" name="tracking_id"
                                class="w-full rounded-2xl dark:bg-gray-800 text-black dark:text-white"
                                placeholder="scan the barcode to receive item" autofocus>
                            @error('tracking_id')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror

                            <div class="flex mb-2">
                                <textarea name="current_location" id="placeName"
                                    class="w-full bg-gray-50 dark:bg-gray-800 text-black hidden dark:text-white border-none" readonly>{{ $locations[0]->city }}</textarea>
                            </div>
                            @error('current_location')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror


                            <div>
                                <input type="text" name="current_status" value="Received" class="hidden" readonly>
                                @error('current_status')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <input type="hidden" name="location_timeline" readonly>

                            <button type="submit" class="hidden"></button>
                        </form>
                        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                            <table class="w-full text-sm rtl:text-right text-gray-500 dark:text-gray-400 text-center">
                                <thead
                                    class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                    <tr>
                                        <th scope="col" class="px-6 py-3">
                                            Tracking ID
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Current Status
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Current Location
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Destination
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($checkouts as $checkout)
                                        <tr
                                            class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                            <td class="px-6 py-4">{{ $checkout->tracking_id }}</td>
                                            <td class="px-6 py-4">{{ $checkout->current_status }}</td>
                                            <td class="px-6 py-4">{{ $checkout->current_location }}</td>
                                            <td class="px-6 py-4">{{ $checkout->to }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        {{ $checkouts->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <x-flash />
</x-app-layout>
