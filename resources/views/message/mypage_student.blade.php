<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>mypage_student.blade.php</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="w-full h-screen bg-gray-200">
    <!-- ヘッダー -->
    <nav class="w-full bg-gray-800 h-20 shadow-lg">
        <div class="flex">
            <div id="header-left" class="w-1/3 flex start flex items-center text-white mt-3 ml-20 font-bold">
                 <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    @method('POST')
                    < ログアウト</form>
            </div>
            
            <div id="header-right" class="lg:items-right w-2/3">
                
                <div class="flex justify-end text-center mt-4">
                    <a href="#" class="flex items-center font-semibold text-white shadow-sm mr-5" >出したメッセージ一覧
                    </a>
                    <a href="{{ route('message.create') }}"
                                class="shadow-lg bg-orange-500 shadow-orange-500/50 text-white rounded-full border-4 border-gray-300 px-4 py-2 text-xl w-50 h-12 font-bold mr-20">
                                メッセージを書く
                    </a>
                </div>
            </div>
        </div>
    </nav>
    <!-- body -->
    <section class="w-80% h-screen bg-orange-50">
            <div class="mx-4 pt-5 flex justify-center text-gray-400" style="font-size: 48px;">
                {{ Auth::user()->name }}のMy Page
            </div>
            <section id="" class="w-1/4 h-1/3 bg-gray-300 m-5 border-3">
                <div class="w-3/4 h-3/4 border-width:1px">
                </div>
                <x-primary-button class="ml-3">
                    <a href="{{ route('response.create') }}">{{ __('返信する') }}</a>
                </x-primary-button>
            </section>
            <section id="" class="w-1/4 h-1/3 bg-gray-300 m-5 border-3">
                <div class="w-3/4 h-3/4 border-width:1px">

                </div>
                <x-primary-button class="ml-3">
                    <a href="{{ route('response.create') }}">{{ __('返信する') }}</a>
                </x-primary-button>
            </section>
        </section>
    <!-- </section> -->
</body>

</html>