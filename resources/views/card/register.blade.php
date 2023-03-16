<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Card List') }}
        </h2>
    </x-slot>
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-0 sm:pt-0 bg-gray-100 dark:bg-gray-900">
        <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white dark:bg-gray-800 shadow-md overflow-hidden sm:rounded-lg">
            <div class="overflow-hidden bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form action="{{route('card.register')}}" method="post">
                        @csrf
                        <select name="user_id" id="user_id"
                            class="block px-3 py-3 pr-10 leading-tight text-gray-700 border border-gray-300 rounded w-full float-center bg-white-200 focus:outline-none focus:bg-white focus:border-gray-500">
                            <option></option>
                            @foreach ($users as $item)
                                <option value="{{ $item->id }}">{{ $item->id }}. {{ $item->email }} -
                                    {{ $item->name }}</option>
                            @endforeach
                        </select>
                        <br>
                        <input type="text" name="cid" id="cid" class="block my-3 px-3 py-2 pl-10 leading-tight text-gray-700 border border-gray-300 rounded w-full float-center bg-white-200 focus:outline-none focus:bg-white focus:border-gray-500">
                        <br>
                        <div class="max-w-md">
                            <div id="reader" class="w-fit" width="600px"></div>
                        </div>
                        <br>
                        <x-primary-button>{{ __('Register') }}</x-primary-button>

                    </form>

                </div>
            </div>
        </div>
    </div>
    <script src="{{asset("js/html5-qrcode.min.js")}}"></script>
    <script type="text/javascript">
        // This method will trigger user permissions
        Html5Qrcode.getCameras().then(devices => {
            /**
             * devices would be an array of objects of type:
             * { id: "id", label: "label" }
             */
            if (devices && devices.length) {
                var cameraId = devices[0].id;
                // .. use this to start scanning.
            }
        }).catch(err => {
            // handle err
        });

        function onScanSuccess(decodedText, decodedResult) {
            // handle the scanned code as you like, for example:
            console.log(`Code matched = ${decodedText}`, decodedResult);
            document.getElementById("cid").value = decodedText;
        }

        function onScanFailure(error) {
            // handle scan failure, usually better to ignore and keep scanning.
            // for example:
            // console.warn(`Code scan error = ${error}`);
        }

        let html5QrcodeScanner = new Html5QrcodeScanner(
            "reader", {
                fps: 10,
                qrbox: {
                    width: 250,
                    height: 250
                }
            },
            /* verbose= */
            false);
        html5QrcodeScanner.render(onScanSuccess, onScanFailure);
    </script>
</x-app-layout>
