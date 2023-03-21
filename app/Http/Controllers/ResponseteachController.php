<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Models\Response;
use App\Models\Message;
use App\Models\User;
use SendGrid;
use SendGrid\Mail\Mail;




class ResponseteachController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function mypageteach()
    {
        $user_id = auth()->user()->id;
        $data = Message::with('user')->where('send_to', $user_id)->get();   
        return view('responseteach.mypage_teacher', ['data' => $data]);
    }

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
        return response()->view('responseteach.create_responseteach', ['data' => $data]);
    }

    public function presentation(Request $request)
    {
        $inputs = $request -> validate([
            "message" => 'required',
            "image_name"=> 'image|max:1024'
        ]);
        
        // dd($request);

        $data = new Message();

        $data -> user_id = auth() -> user() -> id;
        $data -> message = $request -> message;
        $data -> send_to = $request -> send_to;
// dd($data->send_to);
        if(request('image')){
            $original = request() -> file("image") -> getClientoriginalName();
            $name = date("Ymd_His")."_".$original;
            request() -> file("image") -> move("storage/images", $name);
            $data -> image_name = $name;
        }
         
        return redirect()->route('checkresteach')->with('data', $data);
    }
    //responseをcheck
    public function checkres(Request $request)
    {
        
        $data = $request->session()->get('data');
        return view('responseteach.check_responseteach', compact('data'));
        
        // $latestRecord = Message::latest('updated_at')->first();

        // return response()->view('response.check_response', ['latestRecord' => $latestRecord]);
    //  dd($laltestRecord);   
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $inputs = $request -> validate([
        //     "message" => 'required',
        //     "image_name"=> 'image|max:1024'
        // ]);
        
        // dd($request -> send_to);

        $message = new Message();

        $message -> user_id = auth() -> user() -> id;
        $message -> message = $request -> message;
        $message -> send_to = $request -> send_to;
        $message -> image_name = $request->image_name;
        // if(request('image')){
        //     $original = request() -> file("image") -> getClientoriginalName();
        //     $name = date("Ymd_His")."_".$original;
        //     request() -> file("image") -> move("storage/images", $name);
        //     $message -> image_name = $name;
        // }
    // dd($message->image_name);
        $message -> save();

         $user = User::find($request -> send_to);
            $address = $user->email;
                // dd($address);
            //SendGrid
            $email = new Mail();
            $email->setFrom('taisuke.m.lotus.elise@gmail.com', '教員へのメッセージ');
            $email->setSubject("生徒・教員からのメッセージ");
            $email->addTo($address);
    // dd($email);
            $fixedContent
                = "{$user->name} 先生からメッセージが届いてます。下のurlからログインして確認しましょう。
                https://gsacademy-fdev05.sakura.ne.jp/project/";
            $email->addContent("text/plain", $fixedContent);
    // dd($email);
            $apiKey = getenv('SENDGRID_API_KEY');
            $sendGrid = new \SendGrid($apiKey);
            // $sendgrid = new SendGrid(env('SENDGRID_API_KEY'));
    // dd($sendGrid);
            $response = $sendGrid->send($email);
// dd($message);
            
        return view('mail.mailcompleteteach', compact('request', 'user'));
        //メール送信を書く

        // return redirect(route(""));
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
