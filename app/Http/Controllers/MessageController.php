<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Models\Message;
use App\Http\Requests\MessageRequest;

class MessageController extends Controller
{
    
    //My page（生徒用）
    public function mypagestu()
    {
        return view('message.mypage_student');
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

        $message -> message = $request -> message;
        $message -> student_id = auth() -> user() -> id;
        if(request('image')){
            $original = request() -> file("image") -> getClientoriginalName();
            $name = date("Ymd_His")."_".$original;
            // $message -> image_name = $name;
            request() -> file("image") -> move("storage/images", $name);
            $message -> image_name = $name;
        }

        $message -> save();

        return redirect() -> route('checkqr');
        
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
