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
    @media (min-width: 640px) {
    .w-1/2 {
        width: 48%;
    }
    }

    @media (min-width: 768px) {
    .md\:w-1/3 {
        width: 31.33%;
    }
    }

    @media (min-width: 1024px) {
    .lg\:w-1/4 {
        width: 23%;
    }
    }
    </style>
</head>

<body class="w-screen bg-orange-50">
    <!-- ヘッダー -->
    <nav class="bg-white shadow-lg">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-24">
            <!-- ログアウトボタン -->
            <div class="flex-shrink-0">
                @csrf
                <a class="text-gray-500 hover:text-gray-800" href="{{ route('logout') }}"
                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                {{ __('ログアウト') }}
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                @csrf
                </form>
            </div>
            <!-- ハンバーガーメニュー -->
            <div class="flex items-center sm:hidden">
                <button type="button" class="text-gray-500 hover:text-gray-800 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white" aria-expanded="false" aria-haspopup="true" onclick="toggleMenu()">
                <span class="sr-only">メニューを開く</span>
                <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
                </button>
            </div>
            <!-- メインメニュー -->
            <div class="hidden sm:flex sm:items-center">
                <div class="text-gray-500 hover:text-gray-800">マイページ</div>
                <div class="ml-4">
                <a href="#" id="index" class="text-gray-500 hover:text-gray-800 font-medium transition duration-150 ease-in-out">出したメッセージ一覧</a>
                </div>
                <form id="message" class="ml-4" action="{{ route('message.create') }}" method="GET"> 
                @foreach($data as $message)
                    <input type="hidden" name="id" value="{{ $message->send_to }}" />
                @endforeach
                <button type="submit" class="shadow-lg bg-orange-500 hover:bg-orange-600 shadow-orange-500/50 text-white rounded-full px-4 py-2 text-xl w-64 h-12 font-bold">
                    メッセージを書く
                </button>
                </form>
            </div>
            </div>
        </div>
        <!-- ハンバーガーメニューのコンテンツ -->
        <div class="hidden sm:hidden" id="menu">
            <div class="px-2 pt-2 pb-3 space-y-1">
            <div class="text-gray-500 hover:text-gray-800">マイページ</div>
            <a href="#" id="index" class="block text-gray-500 hover:text-gray-800 font-medium" ></a>
            <form id="message" action="{{ route('message.create') }}" method="GET"> 
                @foreach($data as $message)
                <input type="hidden" name="id" value="{{ $message->send_to }}" />
                @endforeach
                <button type="submit" class="block w-full text-left text-gray-500 hover:text-gray-800 font-medium py-2 px-3 rounded-md">
                メッセージを書く
                </button>
            </form>
            </div>
        </div>
    </nav>

<script>
  function toggleMenu() {
    var menu = document.getElementById("menu");
    if (menu.classList.contains("hidden")) {
      menu.classList.remove("hidden");
    } else {
      menu.classList.add("hidden");
    }
  }
</script>

    <!-- body -->
    <section class="w-80% mx-auto my-8 bg-orange-50 shadow-lg rounded-lg">
        <div id="name" class="mt-30 px-8 pt-40 text-gray-500 text-3xl font-bold text-center font-serif">{{ Auth::user()->name }}さんへ届いたメッセージ</div>    
            <div class="flex flex-wrap justify-between max-w-5xl mx-auto mt-10">
            @foreach ($data as $message)
                <div class="w-full sm:w-1/2 mt-10 mb-10 md:w-1/2 p-2 md:p-3 lg:p-4 letter relative rounded-lg overflow-hidden shadow-lg">
                    <div id="name" class="absolute top-0 text-lg font-serif leading-tight md:text-xl">{{ $message->user->name }}先生から</div>
                        <div class="w-50 h-50 flex justify-center">
                        @if($message->image_name)
                            <div class="w-40 h-40 flex items-center justify-center">
                                <img src="{{ asset('storage/images/'.$message->image_name)}}" class="mx-auto " style="height:150px; width:150px; object-fit: contain;" >
                            </div>
                        @else
                            <div class="bg-gray-300 flex items-center justify-center" style="height:150px; width:150px;">
                                <span class="text-gray-500 text-lg md:text-xl" style="text-align: center; line-height: 150px;">noimage</span>
                            </div>
                        @endif
                        </div>
                <div class="min-h-48 md:min-h-56 lg:min-h-64 bg-white bg-opacity-80 flex items-start justify-start p-4 md:p-6 lg:p-8" style="border-radius: 10px; flex-wrap: wrap;">
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
    </body>
</html>