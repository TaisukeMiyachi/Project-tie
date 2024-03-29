<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>check_letter</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=M+PLUS+Rounded+1c:wght@500&display=swap" rel="stylesheet">
</head>
<style>
    div,body {
            font-family: 'M PLUS Rounded 1c', sans-serif;
    }
    #name {
            font-family: 'M PLUS Rounded 1c', sans-serif;
    }
</style>
<body class="bg-orange-50">
    <!-- ヘッダー -->
    <nav class="w-full bg-white shadow-lg">
        <div class="flex items-center  h-24 max-w-7xl mx-auto px-4 sm:px-6 lg:px-">
            <div id="header-left" class="w-1/3 flex start flex items-center text-gray-500 mt-2  font-bold">
                 <a href="{{ route('message.create', ['id' => $data->user_id]) }}">
                    @csrf
                    @method('POST')
                    < 戻る</a>
            </div>
        </div>
    </nav>
        <!-- メイン -->
        @csrf
        <div class="mt-0 h-full text-center">
            <img src="{{ asset('images/BlueBird.png') }}" alt="PNG Image" width="200" height="200" style="margin: auto;">
            <h1 id="name" class="font-bold mt-50 mb-0 text-gray-500" style="font-size:24px;">{{ $data->name }}より、{{ $data->teacher_name }}先生へ</h1>
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
            
           <label class="w-full h-full block flex justify-center ">
                <textarea class="px-4 py-4 resize-none w-full sm:w-full md:w-1/2 h-70 md:h-64 block rounded-md shadow-md focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="message" type="text" style="font-size:20px">{{ $data->message }}</textarea>
           </label>
        

            <div class="flex items-center justify-center mt-4">
                <form action="{{ route('message.store') }}" method="POST">
                    
                    @csrf
                    <input type="hidden" name="message" value="{{ $data->message }}">
                    <input type="hidden" name="image_name" value="{{ $data->image_name }}">
                    <input type="hidden" name="teacher_name" value="{{ $data->teacher_name }}">
                    <x-primary-button class="ml-3" style="font-size:24px">
                        {{ __('QRコードを発行する') }}
                    </x-primary-button>
                </form>
            </div>
        </div>
</body>
</html>