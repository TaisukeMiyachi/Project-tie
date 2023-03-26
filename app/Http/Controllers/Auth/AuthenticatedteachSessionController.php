<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;


class AuthenticatedteachSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.loginteach');
    }


    
    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();
        
        $request->session()->regenerate();

        // return redirect()->intended(RouteServiceProvider::HOME);
        return redirect("mypageteach");
    }

 
//     protected function create(array $data)
// {
//     $user = User::create([
//         'name' => $data['name'],
//         'email' => $data['email'],
//         'password' => Hash::make($data['password']),
//     ]);

    // ここで新しいアカウントのIDを取得します。
    // $new_account_id = $user->id;

    // URLからmessage_idを取得し、send_toカラムを更新します。
//     $message_id = request('message_id');
//     if ($message_id) {
//         $message = Message::find($message_id);
//         if ($message) {
//             $message->send_to = $new_account_id;
//             $message->save();
//         }
//     }

//     return $user;
// }
    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
