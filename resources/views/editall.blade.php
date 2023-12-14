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

                        <div>
                            <label for="user_name">User name: </label>
                            <input class="bg-white dark:bg-gray-900" type="text" name="user_name" id="user_name" value="{{ $checkouts['user_name'] }}">
                        </div>

                        <div>
                            <label for="from">From: </label>
                            <input class="bg-white dark:bg-gray-900" type="text" name="from" id="from" value="{{ $checkouts['from'] }}">
                        </div>

                        <div>
                            <label for="to">To: </label>
                            <input class="bg-white dark:bg-gray-900" type="text" name="to" id="to" value="{{ $checkouts['to'] }}">
                        </div>

                        <div>
                            <label for="weight">Weight: </label>
                            <input class="bg-white dark:bg-gray-900" type="number" name="weight" id="weight" value="{{ $checkouts['weight'] }}">
                        </div>

                        <div>
                            <label for="parcel_amount">Amount: </label>
                            <input class="bg-white dark:bg-gray-900" type="number" name="parcel_amount" id="parcel_amount" value="{{ $checkouts['parcel_amount'] }}">
                        </div>

                        <div>
                            <label for="payment_method">Payment method: </label>
                                <label for="upi">UPI</label>
                                <input class="bg-white dark:bg-gray-900" type="radio" checked name="payment_method" id="upi" value="upi">
                                <label for="card">Card</label>
                                <input class="bg-white dark:bg-gray-900" type="radio" name="payment_method" id="card" value="card">
                        </div>

                        <div>
                            <label for="payment_method">Payment status: </label>
                            <input class="bg-white dark:bg-gray-900" type="text" name="payment_status" id="payment_status" value="{{ $checkouts['payment_status'] }}">
                        </div>

                        <div>
                            <label for="tracking_id">Tracking ID: </label>
                            <input class="bg-white dark:bg-gray-900" type="number" name="tracking_id" id="tracking_id" value="{{ $checkouts['tracking_id'] }}">
                        </div>

                        <div>
                            <label for="current_status">Current Status: </label>
                            <select class="bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-100" name="current_status" id="current_status" autofocus required>
                                @foreach($statses as $statse)
                                <option value="{{$statse['status']}}">{{$statse['status']}}</option>
                                @endforeach
                            </select>
                        </div>

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
                        <div>
                            <label for="tinymce">Remarks: </label>
                            <textarea class="bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-100" name="remarks" id="tinymce" cols="20" rows="10">
                                {{ $checkouts['remarks'] }}
                            </textarea>
                        </div>

                        <div>
                            <label for="tracking_id">Feedback Image: </label>
                            <img class="bg-white dark:bg-gray-900" name="tracking_id" src="/storage/{{ $checkouts['image'] }}" alt="No feedback image">
                        </div>

                        <button class="border p-2 bg-blue-500" type="submit">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
