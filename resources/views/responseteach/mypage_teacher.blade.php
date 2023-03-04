<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>mypage_student.blade.php</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-200">
    <section class="flex h-screen">
        <div class="text-center">
            <!-- ヘッダー -->
            <nav class="w-full mt-5">
                <div class="flex justify-between max-w-5xl mx-auto items-center">
                    <div class="">
                        <div class="mx-4 lg:flex lg:items-center">
                            <!-- ボタン設置     -->
                            <a href="#"
                                class="ml-5 rounded-md bg-indigo-600 px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                                ログアウト
                            </a>
                            <a href="#"
                                class="ml-5 rounded-md bg-indigo-600 px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                                出した手紙一覧
                            </a>
                            <a href="{{ route('message.create') }}"
                                class="ml-5 rounded-md bg-indigo-600 px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                                手紙を書く
                            </a>
                        </div>
                    </div>
                </div>
            </nav>
        </div>
        <p>mypage（先生）</p>
    </section>
     <a href="{{ route('responseteach.create') }}"
                                class="ml-5 rounded-md bg-indigo-600 px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                                返信する
    </a>
    <!-- MainContents[end] -->

</body>

</html>