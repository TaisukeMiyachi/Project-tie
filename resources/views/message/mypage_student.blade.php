<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>mypage_student.blade.php</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=M+PLUS+Rounded+1c:wght@500&display=swap" rel="stylesheet">

    <script src="https://cdn.tailwindcss.com"></script>
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
    #name,#message,#index {
        font-family: 'M PLUS Rounded 1c', sans-serif;
    }
    </style>
</head>

<body class="w-screen bg-orange-50">
    <!-- ヘッダー -->
    <nav class="w-full bg-white shadow-lg">
        <div class="flex items-center justify-between h-24 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center">
                <div class="flex-shrink-0">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <x-responsive-nav-link :href="route('logout')"
                                onclick="event.preventDefault();
                                        this.closest('form').submit();">
                            {{ __('Log Out') }}
                        </x-responsive-nav-link>
                    </form>
                </div>
            </div>
            <div class="flex">
                <div class="ml-4">
                    <a href="#" id="index" class="text-gray-500 hover:text-gray-800 font-medium transition duration-150 ease-in-out">出したメッセージ一覧</a>
                </div>
                <div id="message" class="ml-4"> 
                    <a href="{{ route('message.create') }}" class="shadow-lg bg-orange-500 hover:bg-orange-600 shadow-orange-500/50 text-white rounded-full  px-4 py-2 text-xl w-64 h-12 font-bold">
                        メッセージを書く
                    </a>
                </div>
            </div>
        </div>
    </nav>
    <!-- body -->
    <section class="w-80% mx-auto my-8 bg-orange-50 shadow-lg rounded-lg">
        <div id="name" class="mt-30 px-8 pt-40 text-gray-500 text-3xl font-bold text-center font-serif">ようこそ、{{ Auth::user()->name }}さんのマイページへ</div>
        <div class="px-8 py-6">
        
    <div class="flex flex-wrap justify-between max-w-5xl mx-auto mt-10">
    @foreach ($data as $message)
    <!-- {{$message -> user_id}} -->
        <div class="w-full sm:w-1/2 mt-10 mb-10 md:w-1/3 p-2 md:p-3 lg:p-4 letter relative rounded-lg overflow-hidden shadow-lg">
            <div id="name" class="absolute top-0 text-lg font-serif leading-tight md:text-xl">{{ $message->user->name }}さんから</div>
                <div class="w-50 h-50 flex justify-center">
            @if($message->image_name)
                <div class="w-40 h-40 flex items-center justify-center">
                    <img src="{{ asset('storage/images/'.$message->image_name)}}" class="mx-auto" style="height:150px; width:150px;" >
                </div>
            @else
                <div class="bg-gray-300 flex items-center justify-center" style="height:150px; width:150px;">
                    <span class="text-gray-500 text-lg md:text-xl" style="text-align: center; line-height: 150px;">noimage</span>
                </div>
            @endif
        </div>
            <div class="h-48 md:h-56 lg:h-64 bg-white bg-opacity-80 flex items-start justify-start p-4 md:p-6 lg:p-8" style="border-radius: 10px;">
    <p id="message" class="text-lg font-serif leading-tight md:text-xl">{{ $message->message }}</p>
</div>
            <form method="GET" action="{{ route('response.create') }}">
                @csrf
                <div class="flex justify-center">
                    <input type="hidden" name="message" value="{{ $message }}">
                    <input type="hidden" name="send_to" value="{{$message -> user_id}}">

                    <button type="submit" class="px-3 py-2 text-white bg-blue-500 hover:bg-blue-600 rounded-full text-sm md:text-base">返信する</button>
                </div>
            </form>
        </div>
    @endforeach
</div>
</div>

</body>
</html>