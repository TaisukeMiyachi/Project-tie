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
        <form class="mb-6 mt-20" action="{{ route('res.presentation') }}" method="POST" enctype="multipart/form-data">
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