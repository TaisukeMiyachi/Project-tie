<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Message;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use Illuminate\Support\Facades\DB;

class RegisteredTeacherController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create($id): View
    {
        // dd($id);
        return view('auth.registerteach', compact('id'));
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);
        //usertype => 2 (教員)
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'usertype' => 2,
        ]);

        event(new Registered($user));

        // usersテーブルから、最後に追加されたレコードのidを取得する
        $lastid = DB::table('users')->latest('id')->value('id');

        // messageテーブルから、idが$request->idであるレコードを取得する
        $message = Message::where('id', $request->id)->first();

        // send_toカラムを更新する
        $message->send_to = $lastid;
        $message->save();

        Auth::login($user);

        // return redirect(RouteServiceProvider::HOME);
        return redirect(route("mypageteach"));
    }
}
