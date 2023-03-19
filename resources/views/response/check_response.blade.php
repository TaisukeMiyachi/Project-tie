<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>check_response.blade.php</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
    function submitForms() {
        document.getElementById("response-form").submit();
        document.getElementById("mail-form").submit();
    }
    </script>
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
                {{ $data->message }}
            </div>

            @if($data->image_name)
                <img src="{{ asset('storage/images/'.$data->image_name)}}" class="mx-auto" style="height:300px;">
            @endif
            <div class="flex items-center justify-center mt-4">
                <form id="response-form" action="{{ route('response.store') }}" method="POST">
                    @csrf
                    <input type="hidden" name="message" value="{{ $data->message }}">
                    <input type="hidden" name="image_name" value="{{ $data->image_name }}">                    
                    <input type="hidden" name="send_to" value="{{ $data->send_to }}">
                    <x-primary-button class="ml-3">
                        {{ __('送る') }}
                    </x-primary-button>
                </form>
                <form id="mail-form" action="{{ route('mail.send') }}" method="POST">
                    @csrf
                    <input type="hidden" name="message" value="{{ $data->message }}">
                    <input type="hidden" name="image_name" value="{{ $data->image_name }}">                    
                    <input type="hidden" name="send_to" value="{{ $data->send_to }}">
                    <x-primary-button class="ml-3" onclick="submitForms();">
                        {{ __('送信') }}
                    </x-primary-button>
                </form>
            </div>
            
        </div>
</body>
</html>