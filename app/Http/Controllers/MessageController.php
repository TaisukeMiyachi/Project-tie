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
    public function create()
    {
        return view('message.create_letter');
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
        
        $data = new Message();

        $data -> user_id = auth() -> user() -> id;
        $data -> message = $request -> message;

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
    
    public function store(MessageRequest $request)
    {        
        $message = new Message();

        $message -> user_id = auth() -> user() -> id;
        $message -> message = $request -> message;    
        $message -> image_name = $request->image_name;
        
        $message -> save();

        return view("mail.mailcomplete");
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
