<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Models\Message;
use App\Models\User;
use App\Http\Requests\MessageRequest;
use Auth;

class MessageController extends Controller
{
    
    //My page（生徒用）
    public function mypagestu()
    {
        $user_id = auth()->user()->id;
        $data = Message::with('user')->where('send_to', $user_id)->get();   
        // $user_id = auth() -> user() -> id;
        // dd($student_id);
        // $data = Message::with('user')->where('user_id', $user_id)->get();
        // $name = User::where('id', $student_id)->get();
        // dd($data);
        return view('message.mypage_student', ['data' => $data]);
    }

    //messageを作成
    public function create()
    {
        return view('message.create_letter');
    }

    //messageの確認
    public function check()
    {
        return view('message.check_letter');
    }

    //QRコードの確認
    public function checkqr()
    {
        $latestRecord = Message::latest('updated_at')->first();

        return response()->view('message.check_qr', ['latestRecord' => $latestRecord]);
        // $latestRecord = DB::table('messages')->latest()->first();
        // dd($latestRecord);
        // return response()->view('message.check_qr', ['latestRecord' => $latestRecord]);
    }


    public function index()
    {
        //
    }

    
    public function store(MessageRequest $request)
    {
        $inputs = $request -> validate([
            "message" => 'required',
            "image_name"=> 'image|max:1024'
        ]);
        
        $message = new Message();

        $message -> user_id = auth() -> user() -> id;
        $message -> message = $request -> message;
        
        if(request('image')){
            $original = request() -> file("image") -> getClientoriginalName();
            $name = date("Ymd_His")."_".$original;
            // $message -> image_name = $name;
            request() -> file("image") -> move("storage/images", $name);
            $message -> image_name = $name;
        }

        $message -> save();

        //メール送信を書く


        return redirect(route("checkqr"));
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
