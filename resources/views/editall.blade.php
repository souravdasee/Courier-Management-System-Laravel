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
                        User name: <input class="bg-white dark:bg-gray-900" type="text" name="user_name" value="{{ $checkouts['user_name'] }}">
                        From: <input class="bg-white dark:bg-gray-900" type="text" name="from" value="{{ $checkouts['from'] }}">
                        To: <input class="bg-white dark:bg-gray-900" type="text" name="to" value="{{ $checkouts['to'] }}">
                        Weight: <input class="bg-white dark:bg-gray-900" type="number" name="weight" value="{{ $checkouts['weight'] }}">
                        Amount: <input class="bg-white dark:bg-gray-900" type="number" name="parcel_amount" value="{{ $checkouts['parcel_amount'] }}">
                        Parcel amount: <input class="bg-white dark:bg-gray-900" type="number" checked name="parcel_amount" value="{{ $checkouts['parcel_amount'] }}">
                        Payment method: UPI<input class="bg-white dark:bg-gray-900" type="radio" checked name="payment_method" value="upi"><br>Card<input class="bg-white dark:bg-gray-900" type="radio" name="payment_method" value="card">
                        Payment status: <input class="bg-white dark:bg-gray-900" type="text" name="payment_status" value="{{ $checkouts['payment_status'] }}">
                        Tracking ID: <input class="bg-white dark:bg-gray-900" type="number" name="tracking_id" value="{{ $checkouts['tracking_id'] }}">
                        {{-- <input class="bg-white dark:bg-gray-900" type="" name="" value="">Current Status: {{$checkouts['current_status']}} --}}
                        Current Status: <select class="bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-100" name="current_status" autofocus required>
                            @foreach ($statses as $stats)
                                <option value="{{$stats['status']}}">{{$stats['status']}}</option>
                            @endforeach
                        </select>

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
                        Remarks: <textarea class="bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-100" name="remarks" id="tinymce" cols="20" rows="10">
                            {{ $checkouts['remarks'] }}
                        </textarea>
                        <button class="border p-2 bg-blue-500" type="submit">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
