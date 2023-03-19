<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Models\Response;
use App\Models\Message;

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
         
        return redirect()->route('checkres')->with('data', $data);
    }
    //responseをcheck
    public function checkres(Request $request)
    {
        
        $data = $request->session()->get('data');
        return view('response.check_response', compact('data'));
        
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
