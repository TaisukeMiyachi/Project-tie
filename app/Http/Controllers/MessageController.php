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
        return response()->view('message.check_qr');
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
        // dd($request->image);
        $message = new Message();
        $message -> message = $request -> message;
        $message -> student_id = auth() -> user() -> id;

        if(request('image')){
            $name = request() -> file("image") -> getClientoriginalName();
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
