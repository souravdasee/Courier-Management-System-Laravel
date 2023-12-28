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
                    <form id="audioForm" action="/delivery" method="post" enctype="multipart/form-data">
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
                            <label for="payment_status">Payment Status: {{ $checkouts->payment_status }}</label>
                            <select class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 w-auto p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" name="payment_status" autofocus required>
                                    <option value="Paid">Paid</option>
                                    <option value="Unpaid">Unpaid</option>
                            </select>
                            @error('payment_status')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="p-2">
                            <label for="current_status">Current Status: {{ $checkouts->current_status }}</label>
                            <select class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 w-auto p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" name="current_status" autofocus required>
                                <option value="Delivered">Delivered</option>
                                <option value="Undelivered">Undelivered</option>
                            </select>
                            @error('current_status')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="p-2">
                            <label for="image">Image: </label>
                            <input accept="image/*" type="file" name="image" class="w-auto text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400">
                            @error('image')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>


                        <div class="p-2">
                            <input accept="audio/*" type="file" name="voice" id="audioInput" class="hidden">
                            <button type="button" onclick="toggleRecording()" class="text-blue-700 hover:text-white border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 dark:border-blue-500 dark:text-blue-500 dark:hover:text-white dark:hover:bg-blue-500 dark:focus:ring-blue-800" >Record feedback & Update</button>
                            <script>
                                let chunks = [];
                                let mediaRecorder;
                                let stream;
                                let isRecording = false;

                                function startRecording() {
                                navigator.mediaDevices.getUserMedia({ audio: true })
                                    .then(function(userStream) {
                                    stream = userStream;
                                    mediaRecorder = new MediaRecorder(stream);
                                    mediaRecorder.ondataavailable = function(e) {
                                        chunks.push(e.data);
                                    };
                                    mediaRecorder.start();
                                    })
                                    .catch(function(err) {
                                    console.log('The following getUserMedia error occurred: ' + err);
                                    });
                                }

                                function stopRecording() {
                                if (mediaRecorder && mediaRecorder.state === 'recording') {
                                    mediaRecorder.stop();
                                    if (stream) {
                                    const tracks = stream.getTracks();
                                    tracks.forEach(track => track.stop());
                                    }
                                    setTimeout(submitAudio, 500); // Delay submission by 500ms to ensure recording finishes
                                }
                                }

                                function downloadRecording() {
                                if (chunks.length === 0) {
                                    console.log('No recording available.');
                                    return;
                                }

                                const blob = new Blob(chunks, { type: 'audio/wav' });
                                const url = URL.createObjectURL(blob);
                                const a = document.createElement('a');
                                a.href = url;
                                a.download = 'recording.wav';
                                document.body.appendChild(a);
                                a.click();
                                window.URL.revokeObjectURL(url);
                                chunks = []; // Clear recorded chunks after download
                                }

                                function toggleRecording() {
                                if (!isRecording) {
                                    startRecording();
                                    document.querySelector('button').innerText = 'Stop';
                                    isRecording = true;
                                } else {
                                    stopRecording();
                                    document.querySelector('button').innerText = 'Record';
                                }
                                }

                                function submitAudio() {
                                if (chunks.length === 0) {
                                    console.log('No recording available.');
                                    return;
                                }

                                const blob = new Blob(chunks, { type: 'audio/wav' });
                                const file = new File([blob], 'recording.wav');
                                const fileList = new DataTransfer();
                                fileList.items.add(file);

                                const audioInput = document.getElementById('audioInput');
                                audioInput.files = fileList.files;

                                document.getElementById('audioForm').submit();
                                }
                            </script>
                            @error('voice')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </form>
                </div>
            </div>
            <a href="/delivery"><button type="button" class="m-2 text-blue-700 hover:text-white border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 dark:border-blue-500 dark:text-blue-500 dark:hover:text-white dark:hover:bg-blue-500 dark:focus:ring-blue-800" >Back</button></a>
        </div>
    </div>
</x-app-layout>
