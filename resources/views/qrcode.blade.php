<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QR Code</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.15/dist/tailwind.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=M+PLUS+Rounded+1c:wght@500&display=swap" rel="stylesheet">
</head>
<style>
    div,body {
            font-family: 'M PLUS Rounded 1c', sans-serif;
    }
    #text {
            font-family: 'M PLUS Rounded 1c', sans-serif;
    }

    body {
        width: 210mm;
        height: 297mm;
        margin: 0 auto;
        font-size: 16px;
    }
</style>

<body class=" bg-gray-100">
    <!-- QRコード表示部分 -->
    <div class="max-w-7xl mx-auto py-12 sm:px-6 lg:px-8 text-center">
        <div class="px-4 py-6 bg-white shadow-lg rounded-lg">
            <h1 class="text-3xl font-bold text-gray-900 mb-10">Web Pigeon</h1>
            <h1 class="text-3xl font-bold text-gray-900 mb-10">（　　　　　　）先生へ</h1>
            <h2 class="text-gray-600 ">{{ $userName }}さんよりメッセージが届いています。</h2>
            <h2 class="text-gray-600 ">下のQRコードをスキャンして確認してください。</h2>
            <h2 class="text-gray-600 ">また、アカウントを作成していただければ、返信をすることもできます。</h2>
            <h2 class="text-gray-600 mb-6">ぜひアカウントの登録をお願いします。</h2>
            <div class="flex justify-center items-center">
            {{ $qrcode }}
            </div>
            <h2 class="text-gray-600 mt-10">（お願い）</h2>
            <h3 class="text-gray-600 ">もし先生が転・退任、退職等で学校を離れておられる場合</h3>
            <h3 class="text-gray-600 ">所在をご存知の方がいらっしゃいましたら</h3>
            <h3 class="text-gray-600 ">このQRコードをFAX等でお渡しいただけると幸いです。</h3>
            <h3 class="text-gray-600 mb-10">卒業生からの想いを繋いであげてください。</h3>

        </div>
        <div class="flex justify-between items-center">
            <button onclick="window.print()" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mt-0 ml-0">
                印刷する
            </button>
            <a href="{{ route('mypagestu') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mt-0 ml-4">
                mypageへ
            </a>
        </div>
    </div>
</body>
</html>