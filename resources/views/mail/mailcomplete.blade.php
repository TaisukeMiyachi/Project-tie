<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>メッセージ送信完了</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-orange-50">
    <div class="container mx-auto px-4 py-24">
        <h1 class="text-4xl font-bold mb-8">メッセージ送信完了</h1>
        <p class="text-xl">メッセージを送りました。</p>
        <p>{{$user->id}}</p>
       
        <div class="mt-8">
            <a href="{{ route('mypagestu') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                mypageへ
            </a>
        </div>
    </div>
</body>

</html>