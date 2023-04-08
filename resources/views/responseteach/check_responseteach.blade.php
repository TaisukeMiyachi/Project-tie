<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>check_responseteach</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=M+PLUS+Rounded+1c:wght@500&display=swap" rel="stylesheet">
</head>

<style>
    nav {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        z-index: 9999;
    }
    div,body {
        font-family: 'M PLUS Rounded 1c', sans-serif;
    }
    #message{
        font-family: 'M PLUS Rounded 1c', sans-serif;        
    }
</style>

    <body class="bg-orange-50">
        <!-- ヘッダー -->
        <nav class="w-full bg-white shadow-lg">
            <div class="flex items-center  h-24 max-w-7xl mx-auto px-4 sm:px-6 lg:px-">
                <div id="header-left" class="w-1/3 flex start flex items-center text-gray-500 mt-2  font-bold">
                    <a href="{{ route('mypageteach') }}">
                        @csrf
                        @method('POST')
                        < 戻る
                    </a>
                </div>
            </div>
        </nav>
        <section class="mt-40 h-full text-center">
                <img src="{{ asset('images/BlueBird.png') }}" alt="PNG Image" width="200" height="200" style="margin: 30px auto;">
                    <h1 id="name" class="font-bold mt-50 mb-0 text-gray-500" style="font-size:24px;">{{ $data->name }}さんへ</h1>
                <div class="w-50 h-50 flex justify-center">
                @if($data->image_name)
                    <div class="w-50 h-50 flex items-center justify-center">
                        <img src="{{ asset('storage/images/'.$data->image_name)}}" class="mx-auto" style="height:150px; width:150px; object-fit: contain;" >
                    </div>
                @else
                    <div class="bg-gray-300 flex items-center justify-center" style="height:150px; width:150px;">
                        <span class="text-gray-500 text-lg md:text-xl" style="text-align: center; line-height: 150px;">noimage</span>
                    </div>
                @endif
                </div>
            <label class="w-full h-full block flex justify-center mb-10">
                    <textarea class="px-4 py-4 resize-none w-full sm:w-full md:w-1/2 h-70 md:h-64 block rounded-md shadow-md focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="message" type="text" style="font-size:20px">{{ $data->message }}</textarea>
                </label>
        </section>
        <div class="flex items-center justify-center mt-4">
            <form id="response-form" action="{{ route('responseteach.store') }}" method="POST">
            @csrf
                <input type="hidden" name="message" value="{{ $data->message }}">
                <input type="hidden" name="image_name" value="{{ $data->image_name }}">                    
                <input type="hidden" name="send_to" value="{{ $data->send_to }}">            
                    <button type="submit" class="ml-3 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    {{ __('送信') }}
                    </button>
            </form>
        </div>
        <script>
            function submitForms() {
            document.getElementById("response-form").submit();
            }
        </script>      
    </body>
</html>