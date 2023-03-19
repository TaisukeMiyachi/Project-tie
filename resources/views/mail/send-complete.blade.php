@extends('layouts.app')

@section('content')
    <div class="flex justify-center items-center h-screen">
        <div class="bg-white p-8 rounded-lg shadow-lg">
            <div class="text-center">
                <h2 class="text-lg font-medium mb-4">メール送信完了</h2>
                <p class="mb-6">メールが正常に送信されました。ご利用いただきありがとうございます。</p>
                <a href="{{ url('/') }}" class="text-white bg-blue-500 hover:bg-blue-600 py-2 px-4 rounded-lg">トップページに戻る</a>
            </div>
        </div>
    </div>
@endsection