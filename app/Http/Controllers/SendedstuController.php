<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;
use App\Models\User;
use App\Models\Response;

class SendedstuController extends Controller
{
         public function index(Request $request)
    {
        $name = auth() -> user() -> name;

        $data = new Message();
        $data -> user_id = auth() -> user() -> id;
        $data -> messages = Message::where('user_id', $request -> id)
                    ->orderBy('send_to', 'desc')
                    ->get();
        
        
        if(request('image')){
            $original = request() -> file("image") -> getClientoriginalName();
            $name = date("Ymd_His")."_".$original;
            request() -> file("image") -> move("storage/images", $name);
            $data -> image_name = $name;
        }
         
        // return redirect()->route('checkqr')->with('data', $data);
        return view('message.sendedstu', ['data' => $data]);
    }

}


