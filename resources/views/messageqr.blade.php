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
    #message{
        font-family: 'M PLUS Rounded 1c', sans-serif;        
    }
</style>

<body class="bg-orange-50">
    <!-- メイン -->
     @csrf
    <div class="mt-0 h-full text-center">
            <img src="{{ asset('images/BlueBird.png') }}" alt="PNG Image" width="200" height="200" style="margin: auto;">
            <h1 id="name" class="font-bold mt-50 mb-0 text-gray-500" style="font-size:24px;">{{ $user_name }}さんからのメッセージ</h1>
            <div class="w-50 h-50 flex justify-center">
            @if($message->image_name)
                <div class="w-50 h-50 flex items-center justify-center">
                    <img src="{{ asset('storage/images/'.$message->image_name)}}" class="mx-auto" style="height:200px; width:200px; object-fit: contain;" >
                </div>
            @else
                <div class="bg-gray-300 flex items-center justify-center" style="height:150px; width:150px;">
                    <span class="text-gray-500 text-lg md:text-xl" style="text-align: center; line-height: 150px;">noimage</span>
                </div>
            @endif
            </div>

           <label class="w-full h-full block flex justify-center mb-10">
                <textarea class="px-4 py-4 resize-none w-full sm:w-full md:w-1/2 h-70 md:h-64 block rounded-md shadow-md focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="message" type="text" style="font-size:20px">{{ $message->message }}</textarea>
            </label>
    </div>

        <div class="w-full md:w-1/2 mx-auto">
            <div class="text-center">
                <a href="{{ route('register2', ['id' => $id]) }}" class="ml-4 text-sm btn teacher-btn text-gray-700 dark:text-gray-500">はじめての方はこちらから</a>
            </div>
        </div>
        <div class="w-full md:w-1/2 mx-auto">
            <div class="text-center">
                <a href="{{ route('login3', ['id' => $id]) }}" class="ml-4 text-sm btn teacher-btn text-gray-700 dark:text-gray-500">アカウントをお持ちの方はこちらから</a>
            </div>
        </div>
    </div>
</body>
</html>