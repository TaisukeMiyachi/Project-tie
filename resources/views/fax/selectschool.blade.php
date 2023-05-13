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
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
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

  #cityTable {
            display: none;
            margin: 0 auto;
            border-collapse: collapse;
            width: 50%;
            table-layout: fixed;
        }

        #cityTable th,
        #cityTable td {
            border: 1px solid black;
            padding: 8px;
            text-align: center;
        }
    
</style>

<body class="bg-orange-50">
    <!-- ヘッダー -->
    <nav class="w-full bg-white shadow-lg">
        <div class="flex items-center h-24 max-w-7xl mx-auto px-4 sm:px-6 lg:px-">
            <div id="header-left" class="w-full flex start flex items-center text-gray-500 mt-2 font-bold">
                <a href="{{ route('mypagestu') }}">
                    @csrf
                    @method('POST')
                    < 戻る</a>
            </div>
        </div>
    </nav>
    <!-- メイン -->
    <div class="mt-40 h-full text-center">
        <form class="mb-6 mt-20" action="{{ route('complete') }}" method="POST" enctype="multipart/form-data">
            @csrf
            
            <div class="flex justify-center mt-10">
                <div class="w-20 mr-3">
                    <img src="{{ asset('images/12920_paint.png') }}" alt="">
                </div>
                <p class="font-bold mt-50 text-gray-500" style="font-size:24px;">
                送りたい学校を選択してください。
                </p>
                <div class="w-20 ml-3">
                    <img src="{{ asset('images/12929_paint.png') }}" alt="">
                </div>
            </div>
            <div class="mx-auto max-w-2xl mt-10  px-4  sm:px-6 lg:max-w-7xl lg:px-8">
                <p class="font-bold mt-50 text-gray-500" style="font-size:24px;">
                都道府県
                </p>

                <!-- 都道府県のプルダウン -->
            
            <select name="prefecture" class="form-select" id="prefecture-select" onchange="showCityOptions(this.value)">
                <!-- options -->
                <option value="">選択してください</option>
                                <option value="北海道">北海道</option>
                                <option value="青森県">青森県</option>
                                <option value="岩手県">岩手県</option>
                                <option value="宮城県">宮城県</option>
                                <option value="秋田県">秋田県</option>
                                <option value="山形県">山形県</option>
                                <option value="福島県">福島県</option>
                                <option value="茨城県">茨城県</option>
                                <option value="栃木県">栃木県</option>
                                <option value="群馬県">群馬県</option>
                                <option value="埼玉県">埼玉県</option>
                                <option value="千葉県">千葉県</option>
                                <option value="東京都">東京都</option>
                                <option value="神奈川県">神奈川県</option>
                                <option value="新潟県">新潟県</option>
                                <option value="富山県">富山県</option>
                                <option value="石川県">石川県</option>
                                <option value="福井県">福井県</option>
                                <option value="山梨県">山梨県</option>
                                <option value="長野県">長野県</option>
                                <option value="岐阜県">岐阜県</option>
                                <option value="静岡県">静岡県</option>
                                <option value="愛知県">愛知県</option>
                                <option value="三重県">三重県</option>
                                <option value="滋賀県">滋賀県</option>
                                <option value="京都府">京都府</option>
                                <option value="大阪府">大阪府</option>
                                <option value="兵庫県">兵庫県</option>
                                <option value="奈良県">奈良県</option>
                                <option value="和歌山県">和歌山県</option>
                                <option value="鳥取県">鳥取県</option>
                                <option value="島根県">島根県</option>
                                <option value="岡山県">岡山県</option>
                                <option value="広島県">広島県</option>
                                <option value="山口県">山口県</option>
                                <option value="徳島県">徳島県</option>
                                <option value="香川県">香川県</option>
                                <option value="愛媛県">愛媛県</option>
                                <option value="高知県">高知県</option>
                                <option value="福岡県">福岡県</option>
                                <option value="佐賀県">佐賀県</option>
                                <option value="長崎県">長崎県</option>
                                <option value="熊本県">熊本県</option>
                                <option value="大分県">大分県</option>
                                <option value="宮崎県">宮崎県</option>
                                <option value="鹿児島県">鹿児島県</option>
                                <option value="沖縄県">沖縄県</option>
            </select>
        

     <div class="container mx-auto px-4 py-4">
        <div style="display: flex; justify-content: center; align-items: center;">
            <div> 
                <select id="city-select" style="display: none;" onchange="showFukuokaCityInfo()">
                    <option value="">市町村を選んでください</option>
                    <option value="fukuoka">福岡市</option>
                    <option value="北九州市">北九州市</option>
                    <option value="久留米市">久留米市</option>
                    <option value="大牟田市">大牟田市</option>
                    <option value="直方市">直方市</option>
                    <option value="飯塚市">飯塚市</option>
                    <option value="田川市">田川市</option>
                    <option value="柳川市">柳川市</option>
                </select>
            </div>
        </div>

        <div id="fukuoka-city-info" class="grid grid-cols-4 gap-4 mt-4" style="display: none;">
            <!-- ここに福岡市の情報を表示する -->
            
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-4 gap-4">
                <div class="card bg-white shadow rounded-lg p-4 hover:bg-gray-200 relative" onclick="changeColor(this)">
                    <h3 class="text-xl font-semibold mb-2">青葉中学校</h3>
                    <p>092-691-9629</p>
                </div>


                <div class="card bg-white shadow rounded-lg p-4 hover:bg-gray-200 relative" onclick="changeColor(this)">
                    <h3 class="text-xl font-semibold mb-2">香椎第一中学校</h3>
                    <p>092-681-0766</p>
                    
                </div>
                <div class="card bg-white shadow rounded-lg p-4 hover:bg-gray-200 relative" onclick="changeColor(this)">
                    <h3 class="text-xl font-semibold mb-2">香椎第二中学校</h3>
                    <p>092-661-2019</p>
                </div>
                <div class="card bg-white shadow rounded-lg p-4 hover:bg-gray-200 relative" onclick="changeColor(this)">
                    <h3 class="text-xl font-semibold mb-2">梅林中学校</h3>
                    <p>092-871-7113</p>
                </div>
                <div class="card bg-white shadow rounded-lg p-4 hover:bg-gray-200 relative" onclick="changeColor(this)">
                    <h3 class="text-xl font-semibold mb-2">片江中学校</h3>
                    <p>092-871-6256</p>
                </div>
                <div class="card bg-white shadow rounded-lg p-4 hover:bg-gray-200 relative" onclick="changeColor(this)">
                    <h3 class="text-xl font-semibold mb-2">城西中学校</h3>
                    <p>092-852-7145</p>
                </div>
                <div class="card bg-white shadow rounded-lg p-4 hover:bg-gray-200 relative" onclick="changeColor(this)">
                    <h3 class="text-xl font-semibold mb-2">城南中学校</h3>
                    <p>092-821-4834</p>
                </div>
                <div class="card bg-white shadow rounded-lg p-4 hover:bg-gray-200 relative" onclick="changeColor(this)">
                    <h3 class="text-xl font-semibold mb-2">長尾中学校</h3>
                    <p>092-871-6680</p>
                </div>
                <div class="card bg-white shadow rounded-lg p-4 hover:bg-gray-200 relative" onclick="changeColor(this)">
                    <h3 class="text-xl font-semibold mb-2">西福岡中学校</h3>
                    <p>092-821-5334</p>
                </div>
                <div class="card bg-white shadow rounded-lg p-4 hover:bg-gray-200 relative" onclick="changeColor(this)">
                    <h3 class="text-xl font-semibold mb-2">原中学校</h3>
                    <p>092-801-4690</p>
                </div>
                <div class="card bg-white shadow rounded-lg p-4 hover:bg-gray-200 relative" onclick="changeColor(this)">
                    <h3 class="text-xl font-semibold mb-2">原中央中学校</h3>
                    <p>092-845-5451</p>
                </div>
                <div class="card bg-white shadow rounded-lg p-4 hover:bg-gray-200 relative" onclick="changeColor(this)">
                    <h3 class="text-xl font-semibold mb-2">百道中学校</h3>
                    <p>092-821-1739</p>
                </div>
                <div class="card bg-white shadow rounded-lg p-4 hover:bg-gray-200 relative" onclick="changeColor(this)">
                    <h3 class="text-xl font-semibold mb-2">内浜中学校</h3>
                    <p>092-882-3866</p>
                </div>
                <div class="card bg-white shadow rounded-lg p-4 hover:bg-gray-200 relative" onclick="changeColor(this)">
                    <h3 class="text-xl font-semibold mb-2">姪浜中学校</h3>
                    <p>092-881-1039</p>
                </div>
            </div>
        </div>
    </div>
            <!-- 他の市町村をここに追加 -->
        </select><!-- カードコンポーネントのコードをここに挿入 -->
        </div>
    </div>
    <div class="flex items-center justify-center mt-4">
                    <div class="flex justify-center mt-4">
                        <button class=" bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded">FAXを送る</button>
                    </div>
                </div>

    </form>
    <script>
        function changeColor(element) {
                element.style.backgroundColor = "#ADD8E6"; // この色は任意のものに変更できます
            }

        function showFukuokaCityInfo() {
            const citySelect = document.getElementById('city-select');
            const fukuokaCityInfo = document.getElementById('fukuoka-city-info');

            if (citySelect.value === 'fukuoka') {
                fukuokaCityInfo.style.display = 'block';
            } else {
                fukuokaCityInfo.style.display = 'none';
            }
        }
        function showTable() {
            const citySelect = document.querySelector('select[name="city"]');
            const cityTable = document.getElementById('cityTable');

            if (citySelect.value === "福岡市") {
                cityTable.style.display = 'block';
            } else {
                cityTable.style.display = 'none';
            }
        }

        const cards = document.querySelectorAll('.bg-white');
        
            cards.forEach(card => {
                const faxButton = card.querySelector('button');
                card.addEventListener('click', () => {
                    faxButton.classList.toggle('hidden');
                });
            });
        
        function showCityOptions(prefecture) {
            var fukuokaCities = document.getElementById('city-select');
            
            // まず全ての市町村を非表示にする
            fukuokaCities.style.display = "none";
            
            // 選択された都道府県に応じて市町村を表示
            if(prefecture === "福岡県") {
                fukuokaCities.style.display = "block";
            }
            // 他の都道府県も同様に処理
        }
       

    </script>
                
            </div>
        </form>
    </div>
</body>
</html>