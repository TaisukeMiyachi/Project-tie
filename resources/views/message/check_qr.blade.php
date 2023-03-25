<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>check_letter</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-orange-50">
    <!-- ヘッダー -->
    <nav class="w-full bg-gray-800 h-20 shadow-lg">
        <div class="flex">
            <div id="header-left" class="w-1/3 flex start flex items-center text-white mt-7 ml-20 font-bold">
                 <a href="{{ route('message.create') }}">
                    < 戻る  check_qr</a>
            </div>
        </div>
    </nav>
        <!-- メイン -->
        @csrf
        <div class="w-full sm:w-1/2 mt-10 mb-10 md:w-1/3 p-2 md:p-3 lg:p-4 letter relative rounded-lg overflow-hidden shadow-lg">
            <div id="name" class="absolute top-0 text-lg font-serif leading-tight md:text-xl">{{ $message->user->name }}さんから</div>
                <div class="w-50 h-50 flex justify-center">
            @if($message->image_name)
                <div class="w-40 h-40 flex items-center justify-center">
                    <img src="{{ asset('storage/images/'.$data->image_name)}}" class="mx-auto" style="height:150px; width:150px;" >
                </div>
            @else
                <div class="bg-gray-300 flex items-center justify-center" style="height:150px; width:150px;">
                    <span class="text-gray-500 text-lg md:text-xl" style="text-align: center; line-height: 150px;">noimage</span>
                </div>
            @endif
        </div>
            <div class="h-48 md:h-56 lg:h-64 bg-white bg-opacity-80 flex items-start justify-start p-4 md:p-6 lg:p-8" style="border-radius: 10px;">
                <p id="message" class="text-lg font-serif leading-tight md:text-xl">{{ $data->message }}</p>
            </div>
        <section class="mx-auto w-full px-4 py-12 sm:px-6 lg:max-w-7xl lg:px-8" style="">
            <div class="w-full flex flex-col items-center">
                @if($data->image_name)
                    <img src="{{ asset('storage/images/'.$data->image_name)}}" class="mx-auto" style="height:300px;">
                @endif
                    <div class="h-72 mt-5 w-90 md:w-1/3 lg:w-1/3 p-4 text-center bg-white">
                    {{ $data->message }}
                    </div>
            </div>
        </section>
            <div class="flex items-center justify-center mt-4">
                <form action="{{ route('message.store') }}" method="POST">
                    @csrf
                    <input type="hidden" name="message" value="{{ $data->message }}">
                    <input type="hidden" name="image_name" value="{{ $data->image_name }}">
                    <x-primary-button class="ml-3">
                        {{ __('送る') }}
                    </x-primary-button>
                </form>
            </div>
        </div>
</body>
</html>