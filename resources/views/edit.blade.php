<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 border text-gray-900 dark:text-gray-100">
                    <form action="/edit" method="post">
                        @csrf
                        <input type="hidden" name="id" value="{{$checkouts['id']}}">
                        <input class="bg-white dark:bg-gray-900" type="hidden" name="user_name" value="{{ $checkouts['user_name'] }}">
                        <input class="bg-white dark:bg-gray-900" type="hidden" name="from" value="{{ $checkouts['from'] }}">
                        <input class="bg-white dark:bg-gray-900" type="hidden" name="to" value="{{ $checkouts['to'] }}">
                        <input class="bg-white dark:bg-gray-900" type="hidden" name="weight" value="{{ $checkouts['weight'] }}">
                        <input class="bg-white dark:bg-gray-900" type="hidden" name="parcel_amount" value="{{ $checkouts['parcel_amount'] }}">
                        <input class="bg-white dark:bg-gray-900" type="hidden" checked name="payment_method" value="{{ $checkouts['payment_method'] }}">
                        <input class="bg-white dark:bg-gray-900" type="hidden" name="payment_status" value="{{ $checkouts['payment_status'] }}">
                        <input class="bg-white dark:bg-gray-900" type="hidden" name="tracking_id" value="{{ $checkouts['tracking_id'] }}">
                        <p>Tracking ID: {{ $checkouts['tracking_id'] }}</p>
                        Current Status: <select class="bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-100" name="current_status" autofocus required>
                            @foreach ($statses as $stats)
                                <option value="{{$stats['status']}}">{{$stats['status']}}</option>
                            @endforeach
                        </select>
                        <button class="border p-2 bg-blue-500" type="submit">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
