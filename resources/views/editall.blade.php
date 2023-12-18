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
                    <form action="/allorder" method="post">
                        @csrf
                        <input type="hidden" name="id" value="{{$checkouts['id']}}">

                        <div class="p-2">
                            <label for="users_name">User name: </label>
                            <input class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 w-auto p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" type="text" name="users_name" id="users_name" value="{{ $checkouts['users_name'] }}">
                        </div>

                        <div class="p-2">
                            <label for="from">From: </label>
                            <input class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 w-auto p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" type="text" name="from" id="from" value="{{ $checkouts['from'] }}">
                        </div>

                        <div class="p-2">
                            <label for="to">To: </label>
                            <input class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 w-auto p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" type="text" name="to" id="to" value="{{ $checkouts['to'] }}">
                        </div>

                        <div class="p-2">
                            <label for="weight">Weight: </label>
                            <input class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 w-auto p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" type="number" step="0.01" name="weight" id="weight" value="{{ $checkouts['weight'] }}">
                        </div>

                        <div class="p-2">
                            <label for="parcel_amount">Amount: </label>
                            <input class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 w-auto p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" type="number" name="parcel_amounts" id="parcel_amount" value="{{ $checkouts['parcel_amounts'] }}">
                        </div>

                        <div class="p-2">
                            <label for="payment_method">Payment method: {{ $checkouts->payment_method }} ||</label>
                            <input class="w-4 h-4 border-gray-300 focus:ring-2 focus:ring-blue-300 dark:focus:ring-blue-600 dark:focus:bg-blue-600 dark:bg-gray-700 dark:border-gray-600" type="radio" checked name="payment_method" id="upi" value="upi">
                            <label for="upi">UPI</label>
                            <input class="w-4 h-4 border-gray-300 focus:ring-2 focus:ring-blue-300 dark:focus:ring-blue-600 dark:focus:bg-blue-600 dark:bg-gray-700 dark:border-gray-600" type="radio" name="payment_method" id="card" value="card">
                            <label for="card">Card</label>
                        </div>

                        <div class="p-2">
                            <label for="payment_method">Payment status: {{ $checkouts->payment_status }}</label>
                            <select class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 w-auto p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" type="text" name="payment_status" id="payment_status" value="{{ $checkouts['payment_status'] }}">
                                <option value="Paid">Paid</option>
                                <option value="Unpaid">Unpaid</option>
                            </select>
                        </div>

                        <div class="p-2">
                            <label for="tracking_id">Tracking ID: </label>
                            <input class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 w-auto p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" type="number" name="tracking_id" id="tracking_id" value="{{ $checkouts['tracking_id'] }}">
                        </div>

                        <div class="p-2">
                            <label for="current_status">Current Status: {{ $checkouts->current_status }}</label>
                            <select class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 w-auto p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" name="current_status" id="current_status" required>
                                @foreach($statses as $statse)
                                <option value="{{$statse['status']}}">{{$statse['status']}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="p-2">
                            <label for="current_location">Current Location: </label>
                            <input type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 w-auto p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" name="current_location" id="current_location" required value="{{ $checkouts->current_location}}">
                        </div>

                        <script src="https://cdn.tiny.cloud/1/{{env('TINYMCE_API_KEY')}}/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>

                        <script>
                            tinymce.init({
                            selector: 'textarea#tinymce',
                            plugins: 'tinycomments mentions anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount checklist mediaembed casechange export formatpainter pageembed permanentpen footnotes advtemplate advtable advcode editimage tableofcontents mergetags powerpaste tinymcespellchecker autocorrect a11ychecker typography inlinecss',
                            toolbar: 'undo redo | blocks fontfamily fontsize | forecolor bold italic underline strikethrough | link image media table mergetags | align lineheight | tinycomments | checklist numlist bullist indent outdent | emoticons charmap | removeformat',
                            tinycomments_mode: 'embedded',
                            tinycomments_author: 'Author name',
                            mergetags_list: [
                                { value: 'First.Name', title: 'First Name' },
                                { value: 'Email', title: 'Email' },
                            ],
                            });
                        </script>
                        <div class="p-2">
                            <label for="tinymce">Remarks: </label>
                            <textarea class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 w-auto p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" name="remarks" id="tinymce" cols="20" rows="10">
                                {{ $checkouts['remarks'] }}
                            </textarea>
                        </div>

                        <div class="p-2">
                            <label for="feedback_image">Feedback Image: </label>
                            <img class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" name="tracking_id" src="{{ asset('storage/' . $checkouts->image) }}" alt="No feedback image" id="feedback_image">
                        </div>

                        <div class="p-2">
                            <label for="feedback_audio">Feedback Audio: </label>
                            <audio class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" id="feedback_audio" controls>
                                <source src="/storage/{{ $checkouts['voice'] }}">
                            </audio>
                        </div>

                        <button class="text-blue-700 hover:text-white border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 dark:border-blue-500 dark:text-blue-500 dark:hover:text-white dark:hover:bg-blue-500 dark:focus:ring-blue-800" type="submit">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
