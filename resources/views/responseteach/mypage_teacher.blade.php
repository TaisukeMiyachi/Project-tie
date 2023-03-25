<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>mypage_student.blade.php</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=M+PLUS+Rounded+1c&display=swap" rel="stylesheet">
    <!-- <link href="https://cdn.tailwindcss.com" rel="stylesheet"> -->

</head>
<style>
    div {
        font-family: 'M PLUS Rounded 1c', sans-serif;
    }
    #name {
        font-family: 'M PLUS Rounded 1c', sans-serif;
    }
</style>
<body class="w-full h-full bg-yellow-50">
    <!-- ヘッダー -->
    <nav class="w-full bg-gray-800 h-20 shadow-lg">
        <div class="flex">
            <div id="header-left" class="w-1/3 flex start flex items-center text-white mt-3 ml-20 font-bold">
                 <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <x-responsive-nav-link :href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
            <div id="header-right" class="lg:items-right w-2/3">
                <div class="flex justify-end text-center mt-4">
                    <a href="#" class="flex items-center font-semibold text-white shadow-sm mr-5" >出したメッセージ一覧
                    </a>
                    <!-- <a href="{{ route('message.create') }}" 
                                class="shadow-lg bg-orange-500 shadow-orange-500/50 text-white rounded-full border-4 border-gray-300 px-4 py-2 text-xl w-50 h-12 font-bold mr-20">
                                メッセージを書く
                    </a> -->
                </div>
            </div>
        </div>
    </nav>
    <!-- body -->
    <section class="w-80% h-screen bg-sand-50">
        <div class="mx-4 pt-5 flex justify-center text-gray-400" style="font-size: 48px;">
            {{ Auth::user()->name }}先生のMy Page
        </div>

        <div class="flex flex-wrap justify-center mx-auto mb-4">
         @foreach ($data as $message)
            <div class="mt-5 w-full md:w-1/3 lg:w-1/3 p-4 letter relative">
                <div id= "name" class="absolute top-0 text-2xl font-serif leading-tight">{{ $message->user->name }}さんから</div>
                 @if($message->image_name)
                        <img src="{{ asset('storage/images/'.$message->image_name)}}" class="mx-auto" style="height:300px;">
                    @endif   
                <div class="h-64 md:h-80 lg:h-96 bg-white bg-opacity-80 flex items-start justify-start p-12">
                       <p class="text-2xl font-serif leading-tight">{{ $message->message }}</p>
                    </div>
                    <form method="GET" action="{{ route('responseteach.create') }}">
                        @csrf
                        <div class="flex justify-center">
                            <input type="hidden" name="message" value="{{ $message }}">
                            <button type="submit" class="px-4 py-2 text-white bg-blue-500 hover:bg-blue-600 rounded">返信する</button>
                        </div>
                    </form>
                </div>
        @endforeach
            </div>
        </div>
</body>

</html>