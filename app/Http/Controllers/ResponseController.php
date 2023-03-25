<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Models\Response;
use App\Models\Message;
use App\Models\User;
use SendGrid;
use SendGrid\Mail\Mail;




class ResponseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    //responseを作成
    public function create(Request $request)
    {
        $data = json_decode($request->input('message'));
        // dd($data);
        return response()->view('response.create_response', ['data' => $data]);
        
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
        $data -> send_to = $request -> send_to;
        $data -> name    = $request -> name;
// dd($request);
        if(request('image')){
            $original = request() -> file("image") -> getClientoriginalName();
            $name = date("Ymd_His")."_".$original;
            request() -> file("image") -> move("storage/images", $name);
            $data -> image_name = $name;
        }
         
        return redirect()->route('checkres')->with('data', $data);
    }
    
    public function checkres(Request $request)
    {    
        $data = $request->session()->get('data');
        // dd($data);
        return view('response.check_response', compact('data'));   
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $message = new Message();
        $message -> user_id = auth() -> user() -> id;
        $message -> message = $request -> message;
        $message -> send_to = $request -> send_to;
        $message -> image_name = $request->image_name;
        
        $message -> save();
// dd($message);
         $user = User::find($request -> send_to);
        //  dd($user);
        $address = $user->email;
         
        $email = new Mail();
        $email->setFrom('taisuke.m.lotus.elise@gmail.com', '教員へのメッセージ');
        $email->setSubject("生徒・教員からのメッセージ");
        $email->addTo($address);
    
        $fixedContent
                = "{$user->name} さんからメッセージが届いてます。下のurlからログインして確認しましょう。
                https://gsacademy-fdev05.sakura.ne.jp/project/";
        $email->addContent("text/plain", $fixedContent);
    
        $apiKey = getenv('SENDGRID_API_KEY');
        $sendGrid = new \SendGrid($apiKey);
           
        $response = $sendGrid->send($email);

        return view('mail.mailcomplete', compact('request', 'user'));
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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
