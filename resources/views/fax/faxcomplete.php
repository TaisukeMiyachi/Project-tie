<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>教員へのメッセージ</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=M+PLUS+Rounded+1c:wght@500&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'M PLUS Rounded 1c', sans-serif;
            background-color: #FBEFEF;
        }

        .content {
            width: 80%;
            margin: 100px auto;
            padding: 20px;
            background-color: white;
            text-align: center;
            border-radius: 10px;
            box-shadow: 0px 0px 10px 0px rgba(0,0,0,0.1);
        }

        p {
            font-size: 24px;
            color: #333;
        }

        .mypage-btn {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 20px;
            color: white;
            background-color: #1E90FF;
            border-radius: 5px;
            text-decoration: none;
            transition: background-color 0.2s;
        }

        .mypage-btn:hover {
            background-color: #1C86EE;
        }
    </style>
</head>

<body>
    <div class="content">
        <p>送信完了しました。</p>
        <a href="{{ route('mypagestu') }}" class="mypage-btn">
            mypageへ
        </a>
    </div>
</body>

</html>
