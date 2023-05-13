<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Models\Message;
use App\Models\User;
use App\Http\Requests\MessageRequest;
use Auth;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class MessageController extends Controller
{
    //My page（生徒用）
   public function mypagestu()
    {
        $user_id = auth()->user()->id;
        $type = User::where('id', $user_id)->value('usertype');

        // dd($type);
        if($type == 1){
            $data = Message::with('user')->where('send_to', $user_id)->orderBy('created_at', 'desc')->get();   
            return view('message.mypage_student', ['data' => $data]);
        } elseif ($type == 2) {
            $data = Message::with('user')->where('send_to', $user_id)->orderBy('created_at', 'desc')->get(); 
            return view('responseteach.mypage_teacher', ['data' => $data]);
        } else {
            return abort(403);
        }
    }

    //messageを作成
    public function create(Request $request)
    {
        $id = $request->input("id");
        // dd($id);
        return view('message.create_letter', ['id' => $id]);
    }

    //messageの確認
    public function check()
    {
        return view('message.check_letter');
    }

    
    public function index()
    {
       //
    }

    public function presentation(Request $request)
    {
        $inputs = $request -> validate([
            "message" => 'required',
            "image_name"=> 'image|max:1024'
        ]);
            
        $name = auth() -> user() -> name;

        $data = new Message();
        $data -> user_id = auth() -> user() -> id;
        $data -> message = $request -> message;
        $data -> teacher_name = $request -> teacher_name;
        $data -> send_to = $request -> send_to;
        $data -> name = $name;
       
        if(request('image')){
            $original = request() -> file("image") -> getClientoriginalName();
            $name = date("Ymd_His")."_".$original;
            request() -> file("image") -> move("storage/images", $name);
            $data -> image_name = $name;
        }
         
        return redirect()->route('checkqr')->with('data', $data);
    }

    //QRコードの確認
    public function checkqr(Request $request)
    {
        $data = $request->session()->get('data');
        return view('message.check_qr', compact('data'));
    }
    
    //dataを保存して、messageのIDを$lastIdとして取得
    public function store(MessageRequest $request)
    {        
        $message = new Message();

        $message->user_id = auth()->user()->id;
        $message->message = $request->message;
        $message->image_name = $request->image_name;
        $message->teacher_name = $request->teacher_name;

        $message->save();

        $lastId = Message::latest()->first()->id;

        $url = env('APP_URL')."/messageqr/{$lastId}"; // QRコードに表示するURL

        $userName = auth()->user()->name; // ログインユーザーの名前を取得
        
        return view('qrcode', [
            'qrcode' => QrCode::size(100)->generate($url),
            'userName' => $userName, // 取得したユーザー名をビューに渡す
            'teacherName' => $message->teacher_name,
        ]);
    }
    
    
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
