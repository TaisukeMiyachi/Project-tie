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
    // $datauser = $data -> user;
    // dd($datauser);
    return response()->view('response.create_response', ['data' => $data]);
}

    //responseをcheck
    public function checkres()
    {
        $latestRecord = Message::latest('updated_at')->first();

        return response()->view('response.check_response', ['latestRecord' => $latestRecord]);
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $inputs = $request -> validate([
            "message" => 'required',
            "image_name"=> 'image|max:1024'
        ]);
        
        // dd($request);

        $message = new Message();

        $message -> user_id = auth() -> user() -> id;
        $message -> message = $request -> message;
        $message -> send_to = $request -> send_to;
        
        if(request('image')){
            $original = request() -> file("image") -> getClientoriginalName();
            $name = date("Ymd_His")."_".$original;
            // $message -> image_name = $name;
            request() -> file("image") -> move("storage/images", $name);
            $message -> image_name = $name;
        }

        $message -> save();

        
        //メール送信を書く

        return redirect(route("checkres"));
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
