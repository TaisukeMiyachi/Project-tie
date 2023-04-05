<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>メッセージ送信完了</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=M+PLUS+Rounded+1c:wght@500&display=swap" rel="stylesheet">
</head>
<style>
    div,body {
        font-family: 'M PLUS Rounded 1c', sans-serif;
    }
</style>

<body class="bg-orange-50">
    <div class="container mx-auto px-4 py-24 flex flex-col items-center">
        <img src="{{ asset('images/BlueBird.png') }}" alt="PNG Image" width="200" height="200" style="margin: 30px auto;">
        <p class="text-xl">メッセージを送りました。</p>
        
        <div class="mt-8">
            <a href="{{ route('mypageteach') }}" class="bg-orange-500 hover:bg-orange-700 text-white font-bold py-2 px-4 rounded">
                mypageへ
            </a>
        </div>
    </div>
</body>

</html>

