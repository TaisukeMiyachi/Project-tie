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
                <p>手紙（チェック）</p>
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
                <div class="flex items-center justify-center mt-4">
                <x-primary-button class="ml-3">
                    <a href="{{ route('checkqr') }}">{{ __('QRコードを作成する') }}</a>
                </x-primary-button>
                </div>
                </form>
            </div>
        </div>
    </body>
</html>