<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="rounded-2xl border text-gray-900 dark:text-gray-100">
                    <form id="audioForm" action="/edit" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" value="{{$checkouts['id']}}">

                        <p class="p-2">Sender Name: {{ $checkouts->sender_name }}</p>
                        <p class="p-2">Sender Number: {{ $checkouts->sender_number }}</p>
                        <p class="p-2">Recipient Name: {{ $checkouts->recipient_name }}</p>
                        <p class="p-2">Recipient Number: {{ $checkouts->recipient_number }}</p>
                        <p class="p-2">From: {{ $checkouts->from }}</p>
                        <p class="p-2">To: {{ $checkouts->to }}</p>
                        <p class="p-2">Tracking ID: {{ $checkouts->tracking_id }}</p>
                        <p class="p-2">Payment Method: {{ $checkouts->payment_method }}</p>
                        <p class="p-2">Parcel Amount: {{ $checkouts->parcel_amounts }}</p>

                        <div class="p-2">
                            <label for="current_status">Current Status: {{ $checkouts->current_status }}</label>
                            <select class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 w-auto p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" name="current_status" autofocus required>
                                @foreach ($statses as $stats)
                                    <option value="{{$stats['status']}}">{{$stats['status']}}</option>
                                @endforeach
                            </select>
                            @error('current_status')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="p-2">
                            <label for="current_location">Current Location: </label>
                            <input class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 w-auto p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" type="text" name="current_location" id="current_location" value="{{ $checkouts->current_location }}">
                            @error('current_location')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="p-2">
                            <button type="submit" class="text-blue-700 hover:text-white border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 dark:border-blue-500 dark:text-blue-500 dark:hover:text-white dark:hover:bg-blue-500 dark:focus:ring-blue-800">Change</button>
                        </div>
                    </form>
                </div>
            </div>
            <a href="/status"><button type="button" class="m-2 text-blue-700 hover:text-white border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 dark:border-blue-500 dark:text-blue-500 dark:hover:text-white dark:hover:bg-blue-500 dark:focus:ring-blue-800">Back</button></a>
        </div>
    </div>
</x-app-layout>
