<!DOCTYPE html>
<html lang="ja">
<!-- 省略 -->
<body class="bg-orange-50">
    <!-- メイン -->
     @csrf
    <div class="mt-0 h-full text-center">
        <img src="{{ asset('images/BlueBird.png') }}" alt="PNG Image" class="w-32 h-32 md:w-48 md:h-48 mx-auto my-8">
        <h1 id="name" class="font-bold mt-0 mb-4 text-gray-500 text-xl md:text-2xl">{{ $user_name }}さんからのメッセージ</h1>
        <div class="w-50 h-50 flex justify-center">
        @if($message->image_name)
            <div class="w-50 h-50 flex items-center justify-center">
                <img src="{{ asset('storage/images/'.$message->image_name)}}" class="mx-auto h-32 w-32 md:h-48 md:w-48 object-contain">
            </div>
        @else
            <div class="bg-gray-300 flex items-center justify-center h-32 w-32 md:h-48 md:w-48">
                <span class="text-gray-500 text-lg md:text-xl" style="text-align: center; line-height: 150px;">noimage</span>
            </div>
        @endif
        </div>

        <div class="w-full md:w-1/2 mx-auto">
            <label class="w-full h-full block flex justify-center mb-4">
                <textarea class="px-4 py-4 resize-none w-full h-70 md:h-64 block rounded-md shadow-md focus:ring focus:ring-indigo-200 focus:ring-opacity-50 text-lg" name="message" type="text" readonly>{{ $message->message }}</textarea>
            </label>
            <div class="text-center">
                <a href="{{ route('register2', ['id' => $id]) }}" class="ml-4 text-sm btn teacher-btn text-gray-700 dark:text-gray-500">アカウント登録へ</a>
            </div>
        </div>
    </div>
</body>
</html>