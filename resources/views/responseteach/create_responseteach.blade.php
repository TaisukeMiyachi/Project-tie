
<!DOCTYPE html>
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
                <a href="{{ route('mypageteach') }}"
                    class="ml-5 rounded-md bg-indigo-600 px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                    戻る
                </a>

            </div>
        </nav>
        <!-- メイン -->
        <form class="mb-6" action="{{ route('message.store') }}" method="POST">
            @csrf
            <p>先生からの返信（作成）</p>
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

</html>