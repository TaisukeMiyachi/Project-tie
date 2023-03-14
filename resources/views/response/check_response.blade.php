<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>create_response.blade.php</title>
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
            <!-- {{ $latestRecord->student_id }} -->
            <div class="bg-cover bg-center h-screen" style="background-image: url('/images/paper-47838_1280.png')">
                {{ $latestRecord->message }}
            </div>
            <!-- <textarea cols="30" rows="15"
                            class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                              style="font-size:30px; background-image: url('/images/paper-47838_1280.png') ">
                {{ $latestRecord->message }}        
            </textarea> -->
            @if($latestRecord->image_name)
                <img src="{{ asset('storage/images/'.$latestRecord->image_name)}}" class="mx-auto" style="height:300px;">
            @endif
            <div class="flex items-center justify-center mt-4">
              <x-primary-button class="ml-3">
                <a href="{{ route('checkqr') }}">{{ __('印刷') }}</a>
              </x-primary-button>
            </div>
        </div>
</body>
</html>