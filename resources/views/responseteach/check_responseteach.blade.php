<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>check_responseteach.blade.php</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-orange-50">
    <!-- ヘッダー -->
    <nav class="w-full bg-gray-800 h-20 shadow-lg">
        <div class="flex">
            <div id="header-left" class="w-1/3 flex start flex items-center text-white mt-7 ml-20 font-bold">
                 <a href="{{ route('mypagestu') }}">
                    @csrf
                    @method('POST')
                    < 戻る</a>
            </div>
        </div>
    </nav>
        <!-- メイン -->
        @csrf
        <div class="mx-auto max-w-2xl px-4 sm:py-24 sm:px-6 lg:max-w-7xl lg:px-8">
            <div class="bg-cover bg-center h-screen" style="background-image: url('/images/paper-47838_1280.png')">
                {{ $latestRecord->message }}
            </div>

            @if($latestRecord->image_name)
                <img src="{{ asset('storage/images/'.$latestRecord->image_name)}}" class="mx-auto" style="height:300px;">
            @endif
            <form action="{{ route('mail.send') }}" method="POST">
                @csrf
                <input type="hidden" name="message" value="{{ $latestRecord->message }}">

                @if($latestRecord->image_name)
                    <input type="hidden" name="image_name" value="{{ $latestRecord->image_name }}">
                @endif

                <!-- 追加: send_to をフォームに追加 -->
                <input type="hidden" name="send_to" value="{{ $latestRecord->send_to }}">
                
                <div class="flex items-center justify-center mt-4">
                    <x-primary-button class="ml-3">
                        {{ __('送る') }}
                    </x-primary-button>
                </div>
            </form>
        </div>
</body>
</html>