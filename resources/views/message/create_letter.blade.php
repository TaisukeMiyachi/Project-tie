<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>create_letter</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=M+PLUS+Rounded+1c:wght@500&display=swap" rel="stylesheet">
</head>
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
</style>

<body class="bg-orange-50">
    <!-- ヘッダー -->
    <nav class="w-full bg-white shadow-lg">
        <div class="flex items-center  h-24 max-w-7xl mx-auto px-4 sm:px-6 lg:px-">
            <div id="header-left" class="w-1/3 flex start flex items-center text-gray-500 hover:text-gray-800 mt-2  font-bold">
                 <a href="{{ route('mypagestu') }}">
                    @csrf
                    @method('POST')
                    < 戻る</a>
            </div>

        </div>
    </nav>
<!-- メイン -->
    <div class="mt-40 h-full text-center">
  <form class="mb-6 mt-20" action="{{ route('presentation') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="id" value="{{$id}}" />
    <div class="sm:flex sm:justify-center sm:items-center">
      <div class="sm:w-20 sm:mr-3">
        <img src="{{ asset('images/12920_paint.png') }}" alt="">
      </div>
      <h2 class="font-bold mt-3 text-gray-500 text-sm sm:text-lg">
        お世話になった先生へメッセージを送りましょう。</br>ぜひ写真も送って近況を知らせてください。
    </h2>
      <div class="sm:w-20 sm:ml-3">
        <img src="{{ asset('images/12929_paint.png') }}" alt="">
      </div>
    </div>
    <div class="mx-auto max-w-2xl mt-10 px-4 sm:px-6 lg:max-w-7xl lg:px-8">
      <label class="block mb-10">
        <textarea class="px-4 py-4 resize-none w-full md:w-1/2 h-70 md:h-64 block rounded-md shadow-md focus:ring focus:ring-indigo-200 focus:ring-opacity-50 text-lg sm:text-sm sm:mx-auto sm:mt-10" name="message" id="" cols="30" rows="10" placeholder="メッセージを書いてください" type="text">{{ old('message') }}</textarea>
      </label>
      <form class="flex justify-center sm:mt-10">
        <input type="file" accept='image/*' name="image" onchange="previewImage(this);">
      </form>
      <div class="flex justify-center">
        <p>
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
  <x-primary-button type="submit" class="shadow-lg bg-orange-500 hover:bg-orange-600 active:bg-orange-700 text-white rounded-full border-4 border-gray-300 px-4 py-2 w-50 h-12 font-bold">
    <span class="text-xl">確 認</span>
  </x-primary-button>
</div>
    </form>
  </div>
</body>
</html>