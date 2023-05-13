<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use App\Models\User;
use App\Models\Message;

class LoginteachController extends Controller
{
    public function create($id): View
    {
        // dd($id);
        return view('auth.loginteachsecond', compact('id'));
    }

    public function store(Request $request): RedirectResponse
    {
        
        //Usersテーブルから、emailが$request->emailであるレコードを取得する
        $teacher = User::where('email', $request->email)->first();
        
        //idを取得する
        $teacherid = $teacher->id;

        // messageテーブルから、idが$request->idであるレコードを取得する
        $message = Message::where('id', $request->id)->first();

        // send_toカラムを更新する
        $message->send_to = $teacherid;
        $message->save();

        Auth::login($teacher);

        // return redirect(RouteServiceProvider::HOME);
        return redirect(route("mypageteach"));
    }

}
