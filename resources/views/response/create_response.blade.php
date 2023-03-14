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
                 <a href="{{ route('mypageteach') }}">
                    @csrf
                    @method('POST')
                    < 戻る</a>
            </div>

        </div>
    </nav>
<!-- メイン -->
    <div class="h-full text-center">
        <form class="mb-6 mt-20" action="{{ route('response.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <p class="font-bold mt-50 text-gray-500" style="font-size:24px;">
                {{ $data -> user -> name }}先生への返信を作成しましょう。
            </p>
            <input type="hidden" name="send_to" value="{{ $data-> user -> id }}" />
            <div class="mx-auto max-w-2xl py-16 px-4 sm:py-24 sm:px-6 lg:max-w-7xl lg:px-8">
                <label class=" w-full h-full block flex justify-center mb-10">
                    <textarea class="resize-none w-40 md:w-1/2 h-70 md:h-64 block rounded-md shadow-md focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="message" id="" cols="30" rows="10" placeholder="手紙を書いてください" type="text" style="font-size:20px">{{ old('message') }}</textarea>
                </label>
                <form class="mt-10">
                    <input type="file" accept='image/*' name="image" onchange="previewImage(this);">
                </form>
                <div class="flex justify-center">
                    <p>
                        <!-- Preview:<br> -->
                        <img id="preview" src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="
                            style="max-width:200px;">
                    </p>
                </div>
                <x-input-error class="mb-4" :messages="$errors->all()"/>
                <script>
                    function previewImage(obj) {
                        var fileReader = new FileReader();
                        fileReader.onload = (function () {
                            document.getElementById('preview').src = fileReader.result;
                        });
                        fileReader.readAsDataURL(obj.files[0]);
                    }
                </script>
                <div class="flex items-center justify-center mt-4">
                    <x-primary-button type="submit" class="shadow-lg bg-orange-500 shadow-orange-500/50 text-white rounded-full border-4 border-gray-300 px-4 py-2 text-xl w-50 h-12 font-bold mr-20">
                        内容を確認する
                    </x-primary-button>
                </div>
            </div>  
        </form>
    </div>
</body>
</html>
<!-- <!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>create_response.blade.php</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-200">
    <!-- <section class="flex h-screen"> -->
    <div class="text-center">
        <!-- ヘッダー -->
        <nav class="w-full mt-5">
            <div class="flex justify-between max-w-5xl mx-auto items-center">
                <a href="{{ route('mypagestu') }}"
                    class="ml-5 rounded-md bg-indigo-600 px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                    戻る
                </a>

            </div>
        </nav>
        <!-- メイン -->
        <form class="mb-6" action="{{ route('message.store') }}" method="POST">
            @csrf
            <p>生徒からの返信（作成）</p>
            <div class="mx-auto max-w-2xl py-16 px-4 sm:py-24 sm:px-6 lg:max-w-7xl lg:px-8">
                <label class="block">
                    <span class="text-gray-700"></span>
                    <textarea cols="30" rows="15"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                        rows="3" placeholder="手紙を書いてください" type="text" name="message">
                    </textarea>
                </label>
            <form class="mt-5">
                <input type="file" accept='image/*' onchange="previewImage(this);">
            </form>
            <p>
                Preview:<br>
                <img id="preview" src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="
                    style="max-width:200px;">
            </p>
            <script>
                function previewImage(obj) {
                    var fileReader = new FileReader();
                    fileReader.onload = (function () {
                        document.getElementById('preview').src = fileReader.result;
                    });
                    fileReader.readAsDataURL(obj.files[0]);
                }
            </script>
            
                        <!-- <div class="flex flex-col mb-4">
              <x-input-label for="tweet" :value="__('Tweet')" />
              <x-text-input id="tweet" class="block mt-1 w-full" type="text" name="tweet" :value="old('tweet')" required autofocus />
              <x-input-error :messages="$errors->get('tweet')" class="mt-2" />
            </div>
            <div class="flex flex-col mb-4">
              <x-input-label for="description" :value="__('Description')" />
              <x-text-input id="description" class="block mt-1 w-full" type="text" name="description" :value="old('description')" required autofocus />
              <x-input-error :messages="$errors->get('description')" class="mt-2" />
            </div> -->
            <div class="flex items-center justify-center mt-4">
              <x-primary-button class="ml-3">
                <a href="{{ route('checkres') }}">{{ __('内容を確認する') }}</a>
              </x-primary-button>
            </div>

            <!-- <div class="mt-6 grid grid-cols-1 gap-y-10 gap-x-6 sm:grid-cols-2 lg:grid-cols-4 xl:gap-x-8">
                    <a href="#"
                        class="rounded-md bg-indigo-600 px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                        内容を確認する
                    </a>
                </div> -->
            </form>

            <!-- 返信手紙表示エリア -->
        </div>
    </div>

    

</body>

</html> -->